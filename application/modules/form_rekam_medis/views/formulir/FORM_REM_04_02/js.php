<!-- // FPTD -->
<script>
    function lihatFORM_REM_04_02(data) {
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
        window.open('<?= base_url('pemeriksaan_poli/cetak_penolakan_tindakan_kedokteran/') ?>' + layanan.id,
                    'Cetak Penolakan Tindakan Kedokteran', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);			
    }

    function editFORM_REM_04_02(data) {
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
        cetakPenolakanTindakanKedokteran(details,action);
    }

    function tambahFORM_REM_04_02(data) {
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
        cetakPenolakanTindakanKedokteran(details,action);
    }

    function cetakPenolakanTindakanKedokteran(details,action) {
        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();

		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_penolakan_tindakan_kedokteran') ?>/id/' + detail[
				0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPenolakanTindakanKedokteran();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-penolakan-tindakan-kedokteran-title').html(
					`<b>Form Penolakan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#nama-keluarga').val(data.nama_keluarga);
				$('#tanggal-lahir').val(datefmysql(data.tanggal_lahir));
                $('#id-pasien-form').val(detail[1]);
                $('#id-pendaftaran-form').val(detail[12]);
				$('#id-layanan-pendaftaran-form').val(detail[0]);
				$('#alamat-form-rekam-medis').val(data.alamat);
				$('#hubungan-keluarga').val(data.hubungan_keluarga);
				$('#tindakan').val(data.tindakan);
				$('#id-saksi-1').val(data.id_saksi_1);
				$('#id-saksi-2').val(data.id_saksi_2);
				$('#s2id_saksi-1 a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2 a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya").checked = true;
					// Disabled fields
					$("#nama-keluarga").prop("disabled", true);
					$("#tanggal-lahir").prop("disabled", true);
					$("#laki-laki").prop("disabled", true);
					$("#perempuan").prop("disabled", true);
					$("#alamat-form-rekam-medis    ").prop("disabled", true);
					$("#hubungan-keluarga").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak").checked = true;
					// Undisabled fields
					$("#nama-keluarga").prop("disabled", false);
					$("#tanggal-lahir").prop("disabled", false);
					$("#laki-laki").prop("disabled", false);
					$("#perempuan").prop("disabled", false);
					$("#alamat-form-rekam-medis    ").prop("disabled", false);
					$("#hubungan-keluarga").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan").checked = true;
				}

				$('#modal_penolakan_tindakan_kedokteran').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}
	
	function resetModalPenolakanTindakanKedokteran() {
        // Set default fields
        $('#id-layanan-pendaftaran-form').val('');
        $('#nama-keluarga').val('');
        $('#tanggal-lahir').val('');
        $('#alamat-form-rekam-medis').val('');
        $('#hubungan-keluarga').val('');
        $('#tindakan').val('');
        $('#id-saksi-1').val('');
        $('#id-saksi-2').val('');
        $('#s2id_saksi-1 a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2 a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("laki-laki").checked = false;
        document.getElementById("perempuan").checked = false;
        document.getElementById("is-pasien-ya").checked = false;
        document.getElementById("is-pasien-tidak").checked = false;

        // Undisabled fields
        $("#nama-keluarga").prop("disabled", false);
        $("#tanggal-lahir").prop("disabled", false);
        $("#laki-laki").prop("disabled", false);
        $("#perempuan").prop("disabled", false);
        $("#alamat-form-rekam-medis    ").prop("disabled", false);
        $("#hubungan-keluarga").prop("disabled", false);
    }
</script>