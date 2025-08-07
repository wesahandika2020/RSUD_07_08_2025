<script>
    function lihatFORM_KEP_100_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'lihat';
        window.open('<?= base_url("pemeriksaan_poli/cetak_skrining_resiko_jatuh_rajal/") ?>' + layanan.id,
                    'Cetak Skrining Resiko Jatuh Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_100_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'edit';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakCheklistSkriningResikoJatuhRajal(details,action);
    }

    function tambahFORM_KEP_100_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'tambah';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakCheklistSkriningResikoJatuhRajal(details,action);
    }

    function cetakCheklistSkriningResikoJatuhRajal(details, action) {

		$('#btn_simpan').hide();

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat' ) {
			$('#btn_simpan').show();
		} else {
			$('#btn_simpan').hide();
		}
		
		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_skrining_resiko_jatuh_rajal') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalSkrining();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-skrining-resiko-jatuh-rajal-title').html(
					`<b>Form Skrining Risiko Jatuh Rajal</b> |  No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);

				$('#id-pasien-sr').val(detail[1]);
				$('#id-pendaftaran-sr').val(detail[12]);
				$('#id-layanan-pendaftaran-sr').val(detail[0]);
				$('#id-petugas').val(data.id_petugas);
				$('#id-users').val(data.id_users);
				$('#s2id_petugas-skrining a .select2c-chosen').html(data.nama_petugas);
				$('#tanggal-skrining').val(data.tanggal_skrining);

				if (data.check_1 === '1') {
					document.getElementById("check-1").checked = true;
				}
				if (data.check_2 === '1') {
					document.getElementById("check-2").checked = true;
				}
				if (data.check_3 === '1') {
					document.getElementById("check-3").checked = true;
				}
				if (data.check_4 === '1') {
					document.getElementById("check-4").checked = true;
				}
				if (data.check_5 === '1') {
					document.getElementById("check-5").checked = true;
				}
				if (data.check_6 === '1') {
					document.getElementById("check-6").checked = true;
				}
				if (data.check_7 === '1') {
					document.getElementById("check-7").checked = true;
				}
				if (data.check_8 === '1') {
					document.getElementById("check-8").checked = true;
				}
				if (data.check_9 === '1') {
					document.getElementById("check-9").checked = true;
				}
				if (data.check_10 === '1') {
					document.getElementById("check-10").checked = true;
				}
				if (data.check_11 === '1') {
					document.getElementById("check-11").checked = true;
				}
				if (data.check_12 === '1') {
					document.getElementById("check-12").checked = true;
				}
				if (data.check_13 === '1') {
					document.getElementById("check-13").checked = true;
				}
				if (data.check_14 === '1') {
					document.getElementById("check-14").checked = true;
				}
				if (data.check_15 === '1') {
					document.getElementById("check-15").checked = true;
				}
				if (data.resiko_jatuh === '1') {
					document.getElementById("resiko-jatuh").checked = true;
				}
				if (data.tidak_resiko_jatuh === '1') {
					document.getElementById("tidak-resiko-jatuh").checked = true;
				}
				if (data.tanda_tangan === '1') {
					document.getElementById("tanda-tangan").checked = true;
				}
				if (data.stiker === '1') {
					document.getElementById("stiker").checked = true;
				}
				if (data.edukasi_resiko_jatuh === '1') {
					document.getElementById("edukasi-resiko-jatuh").checked = true;
				}
				if (data.edukasi_lokasi === '1') {
					document.getElementById("edukasi-lokasi").checked = true;
				}
				if (data.edukasi_pencegahan === '1') {
					document.getElementById("edukasi-pencegahan").checked = true;
				}

				$('#modal-skrining-resiko-jatuh-rajal').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }
	
	function resetModalSkrining() {
        // Set default fields
        $('#id-layanan-pendaftaran-sr').val('');
        $('#id-petugas').val('');
        $('#id-users').val('');
        $('#tanggal-skrining').val('');
        $('#s2id_petugas-skrining a .select2c-chosen').html('');

        // Undisabled fields
        $("#resiko-jatuh").prop("disabled", false);
        $("#tidak-resiko-jatuh").prop("disabled", false);

        // Unchecked fields
        document.getElementById("check-1").checked = false;
        document.getElementById("check-2").checked = false;
        document.getElementById("check-3").checked = false;
        document.getElementById("check-4").checked = false;
        document.getElementById("check-5").checked = false;
        document.getElementById("check-6").checked = false;
        document.getElementById("check-7").checked = false;
        document.getElementById("check-8").checked = false;
        document.getElementById("check-9").checked = false;
        document.getElementById("check-10").checked = false;
        document.getElementById("check-11").checked = false;
        document.getElementById("check-12").checked = false;
        document.getElementById("check-13").checked = false;
        document.getElementById("check-14").checked = false;
        document.getElementById("check-15").checked = false;
        document.getElementById("resiko-jatuh").checked = false;
        document.getElementById("tidak-resiko-jatuh").checked = false;
        document.getElementById("tanda-tangan").checked = false;
        document.getElementById("stiker").checked = false;
        document.getElementById("edukasi-resiko-jatuh").checked = false;
        document.getElementById("edukasi-lokasi").checked = false;
        document.getElementById("edukasi-pencegahan").checked = false;

    }
</script>