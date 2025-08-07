<script>
    function lihatFORM_REM_08_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';

		cetakTataTertibPasien(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function editFORM_REM_08_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'edit';

		cetakTataTertibPasien(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function tambahFORM_REM_08_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'tambah';

		cetakTataTertibPasien(layanan.id_pendaftaran, layanan.id, bed, action);
	}

    function cetakTataTertibPasien(id_pendaftaran, id_layanan_pendaftaran, bed, action)  {
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                const pasien = response.pasien
                const penanggung_jawab = response.tata_tertib.penanggung_jawab
				const data = response.tata_tertib.data
                // Reset all values first
                resetModalTataTertib();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-tata-tertib-title-rm').html(
                    `<b>Form Tata Tertib</b> | No. RM: ${pasien.no_rm}, Nama: ${pasien.nama}`
                );
                $('#id-layanan-pendaftaran-ttb-rm').val(id_layanan_pendaftaran);
				$('#nama-keluarga-ttb-rm').val(data?.nama_keluarga ?? penanggung_jawab.nama_pjwb);
				$('#no-telp-ttb-rm').val(data?.no_telp ?? penanggung_jawab.telp_pjwb);

                if (data?.is_pasien == 1) {
                    document.getElementById("is-pasien-ttb-ya-rm").checked = true;
                } else if (data?.is_pasien == 0) {
                    document.getElementById("is-pasien-ttb-tidak-rm").checked = true;
                }

                $('#modal_tata_tertib_rm').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	// On change for radio button is pasien
	$('input[type=radio][name=is_pasien]').change(function(){ 
		// Conditions
		if (this.value == 1) {			
			// Set field to empty string
			$('#nama-keluarga-ttb').val('');
			$('#no-telp-ttb').val('');
			
			// Disabled fields			
			$( "#nama-keluarga-ttb" ).prop( "disabled", true );			
			$( "#no-telp-ttb" ).prop( "disabled", true );			
		} else if (this.value == 0) {
			// Undisabled fields			
			$( "#nama-keluarga-ttb" ).prop( "disabled", false );								
			$( "#no-telp-ttb" ).prop( "disabled", false );								
		}
	});

	function simpanTataTertibRm() {
		var id = $('#id-layanan-pendaftaran-ttb-rm').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_tata_tertib") ?>',
			data: $('#form_tata_tertib_rm').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_tata_tertib').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_tata_tertib_pasien/') ?>' + id, 'Cetak Tata Tertib', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}

    function resetModalTataTertib() {
        // Undisabled fields
        $("#nama-keluarga-ttb").prop("disabled", false);
        $("#no-telp-ttb").prop("disabled", false);

        // Set default fields
        $('#nama-keluarga-ttb').val('');
        $('#no-telp-ttb').val('');
        $('#id-layanan-pendaftaran-ttb').val('');

        // Unchecked fields
        document.getElementById("is-pasien-ttb-ya").checked = false;
        document.getElementById("is-pasien-ttb-tidak").checked = false;
    }
</script>