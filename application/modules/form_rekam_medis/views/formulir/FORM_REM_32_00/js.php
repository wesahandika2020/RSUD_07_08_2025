<script>
    function lihatFORM_REM_32_00(data) {
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
        window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_tindakan_anestesi/') ?>' + layanan.id,
                    'Cetak Persetujuan Tindakan Anestesi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_REM_32_00(data) {
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
        cetakPersetujuanTindakanAnestesi(details,action);
    }

    function tambahFORM_REM_32_00(data) {
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
        cetakPersetujuanTindakanAnestesi(details,action);
    }

    function cetakPersetujuanTindakanAnestesi(details,action) {

        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();3

		let detail = details.split('#');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_anestesi') ?>/id/' + detail[
				0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetModalPersetujuanTindakanAnestesi();

				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-persetujuan-tindakan-anestesi-title').html(
					`<b>Form Persetujuan Tindakan Anestesi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
				);
				$('#nama-keluarga-mpta').val(data.nama_keluarga);
				$('#tanggal-lahir-mpta').val(datefmysql(data.tanggal_lahir));
                $('#id-pasien-form-mpta').val(detail[1]);
                $('#id-pendaftaran-form-mpta').val(detail[12]);
				$('#id-layanan-pendaftaran-form-mpta').val(detail[0]);
				$('#alamat-form-rekam-medis-mpta').val(data.alamat);
				$('#hubungan-keluarga-mpta').val(data.hubungan_keluarga);
				$('#tindakan-mpta').val(data.tindakan);
				$('#id-saksi-1-mpta').val(data.id_saksi_1);
				$('#id-saksi-2-mpta').val(data.id_saksi_2);
				$('#s2id_saksi-1-mpta a .select2c-chosen').html(data.nama_saksi_1);
				$('#s2id_saksi-2-mpta a .select2c-chosen').html(data.nama_saksi_2);

				if (data.is_pasien === '1') {
					document.getElementById("is-pasien-ya-mpta").checked = true;
					// Disabled fields
					$("#nama-keluarga-mpta").prop("disabled", true);
					$("#tanggal-lahir-mpta").prop("disabled", true);
					$("#laki-laki-mpta").prop("disabled", true);
					$("#perempuan-mpta").prop("disabled", true);
					$("#alamat-form-rekam-medis-mpta   ").prop("disabled", true);
					$("#hubungan-keluarga-mpta").prop("disabled", true);
				} else if (data.is_pasien === '0') {
					document.getElementById("is-pasien-tidak-mpta").checked = true;
					// Undisabled fields
					$("#nama-keluarga-mpta").prop("disabled", false);
					$("#tanggal-lahir-mpta").prop("disabled", false);
					$("#laki-laki-mpta").prop("disabled", false);
					$("#perempuan-mpta").prop("disabled", false);
					$("#alamat-form-rekam-medis-mpta   ").prop("disabled", false);
					$("#hubungan-keluarga-mpta").prop("disabled", false);
				}

				if (data.jenis_kelamin == 'Laki-laki') {
					document.getElementById("laki-laki-mpta").checked = true;
				} else if (data.jenis_kelamin == 'Perempuan') {
					document.getElementById("perempuan-mpta").checked = true;
				}

				$('#modal_persetujuan_tindakan_anestesi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}
	
	function resetModalPersetujuanTindakanAnestesi() {
		// Set default fields
		$('#id-layanan-pendaftaran-form-mpta').val('');
		$('#nama-keluarga-mpta').val('');
		$('#tanggal-lahir-mpta').val('');
		$('#alamat-form-rekam-medis-mpta').val('');
		$('#hubungan-keluarga-mpta').val('');
		$('#tindakan-mpta').val('');
		$('#id-saksi-1-mpta').val('');
		$('#id-saksi-2-mpta').val('');
		$('#s2id_saksi-1-mpta a .select2c-chosen').html('Silahkan dipilih');
		$('#s2id_saksi-2-mpta a .select2c-chosen').html('Silahkan dipilih');

		// Unchecked fields
		document.getElementById("laki-laki-mpta").checked = false;
		document.getElementById("perempuan-mpta").checked = false;
		document.getElementById("is-pasien-ya-mpta").checked = false;
		document.getElementById("is-pasien-tidak-mpta").checked = false;

		// Undisabled fields
		$("#nama-keluarga-mpta").prop("disabled", false);
		$("#tanggal-lahir-mpta").prop("disabled", false);
		$("#laki-laki-mpta").prop("disabled", false);
		$("#perempuan-mpta").prop("disabled", false);
		$("#alamat-form-rekam-medis-mpta").prop("disabled", false);
		$("#hubungan-keluarga-mpta").prop("disabled", false);
	}
</script>