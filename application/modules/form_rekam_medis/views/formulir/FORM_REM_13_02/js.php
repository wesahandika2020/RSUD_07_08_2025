<script>
	// PTK BARU
    function lihatFORM_REM_13_02(data) {
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
        window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_tindakan_kedokteran/') ?>' + layanan.id,
                    'Cetak Persetujuan Tindakan Kedokteran', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				
    }

    function editFORM_REM_13_02(data) {
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
        cetakPersetujuanTindakanKedokteran(details,action);
    }

    function tambahFORM_REM_13_02(data) {
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
        cetakPersetujuanTindakanKedokteran(details,action);
    }

    function cetakPersetujuanTindakanKedokteran(details,action) {
        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();

		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_kedokteran') ?>/id/' +
				detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPersetujuanTindakanKedokteran();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-persetujuan-tindakan-kedokteran-title').html(
					`<b>Form Persetujuan Tindakan Kedokteran</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`
				);
				$('#nama-keluarga-mptk').val(data.nama_keluarga);
				$('#tanggal-lahir-mptk').val(datefmysql(data.tanggal_lahir));
                $('#id-pasien-form-mptk').val(detail[1]);
                $('#id-pendaftaran-form-mptk').val(detail[12]);
				$('#id-layanan-pendaftaran-form-mptk').val(detail[0]);
				$('#alamat-form-rekam-medis-mptk').val(data.alamat);
				$('#hubungan-keluarga-mptk').val(data.hubungan_keluarga);
				$('#tindakan-mptk').val(data.tindakan);
				$('#id-saksi-1-mptk').val(data.id_saksi_1);
				$('#s2id_saksi-1-mptk a .select2c-chosen').html(data.nama_saksi_1);
				$('#id-keluwarga').val(data.id_keluwarga);

				// $('#id-saksi-2-mptk').val(data.id_saksi_2);
				// $('#s2id_saksi-2-mptk a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya-mptk").checked = true;
					// Disabled fields
					$("#nama-keluarga-mptk").prop("disabled", true);
					$("#tanggal-lahir-mptk").prop("disabled", true);
					$("#laki-laki-mptk").prop("disabled", true);
					$("#perempuan-mptk").prop("disabled", true);
					$("#alamat-form-rekam-medis-mptk   ").prop("disabled", true);
					$("#hubungan-keluarga-mptk").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak-mptk").checked = true;
					// Undisabled fields
					$("#nama-keluarga-mptk").prop("disabled", false);
					$("#tanggal-lahir-mptk").prop("disabled", false);
					$("#laki-laki-mptk").prop("disabled", false);
					$("#perempuan-mptk").prop("disabled", false);
					$("#alamat-form-rekam-medis-mptk   ").prop("disabled", false);
					$("#hubungan-keluarga-mptk").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki-mptk").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan-mptk").checked = true;
				}

				$('#modal-persetujuan-tindakan-kedokteran').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalPersetujuanTindakanKedokteran() {
		// Set default fields
		$('#id-layanan-pendaftaran-form-mptk').val('');
		$('#nama-keluarga-mptk').val('');
		$('#tanggal-lahir-mptk').val('');
		$('#alamat-form-rekam-medis-mptk').val('');
		$('#hubungan-keluarga-mptk').val('');
		$('#tindakan-mptk').val('');
		$('#id-saksi-1-mptk').val('');
		$('#id-keluwarga').val('');
		// $('#id-saksi-2-mptk').val('');
		$('#s2id_saksi-1-mptk a .select2c-chosen').html('Silahkan dipilih');
		// $('#s2id_saksi-2-mptk a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki-mptk").checked = false;
		document.getElementById("perempuan-mptk").checked = false;
		document.getElementById("is-pasien-ya-mptk").checked = false;
		document.getElementById("is-pasien-tidak-mptk").checked = false;

		// Undisabled fields
		$("#nama-keluarga-mptk").prop("disabled", false);
		$("#tanggal-lahir-mptk").prop("disabled", false);
		$("#laki-laki-mptk").prop("disabled", false);
		$("#perempuan-mptk").prop("disabled", false);
		$("#alamat-form-rekam-medis-mptk").prop("disabled", false);
		$("#hubungan-keluarga-mptk").prop("disabled", false);
	}

</script>