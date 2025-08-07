<!-- // PSPMP -->
<script>
    function lihatFORM_KEP_120_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {s
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'lihat';
        window.open('<?= base_url("rawat_inap/cetak_surat_pengkajian_pasien_muslim/") ?>' + layanan.id_pendaftaran,
                    'Cetak Pengkajian Spiritual Pasien', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_120_00(data) {
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
        cetakPengkajianPasienMuslim(id, layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_KEP_120_00(data) {
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
        cetakPengkajianPasienMuslim(id, layanan.id_pendaftaran, layanan.id, action);
    }

    function cetakPengkajianPasienMuslim(id, id_pendaftaran, layanan, action) {
        // $('#modal_pengkajian_spiritual_pasien_pulang').modal('show');

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

        $.ajax({
            type: 'GET',
            // url: '<!?= base_url('rawat_inap/api/rawat_inap/pengkajian_spiritual_pasien') ?>/id/' + id,
            url: '<?= base_url("rawat_inap/api/rawat_inap/pengkajian_spiritual_pasien") ?>/id/' + id_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                resetModalPengkajianPasienMuslim();

                $('#modal-pengkajian-spiritual-pasien-pulang-title').html(
                    `<b>Form Pengkajian Spiritual Pasien</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );

                // $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-layanan-pendaftaran-spiritual').val(layanan);
                $('#id-pendaftaran-spiritual').val(id_pendaftaran);

                // $('#id-pendaftaran-spiritual').val(id);
                if (data.pengkajian_spiritual_pasien.length != 0) {
                    $('#nama-keluarga-spiritual').val(data.pengkajian_spiritual_pasien[0].pasien_keluarga);
                    // $('#hubungan-keluarga-spiritual').val(data.pengkajian_spiritual_pasien[0]
                    //     .hubungan_keluarga);
                    $('#saran-rencana-tindak-selanjutnya-spiritual').val(data.pengkajian_spiritual_pasien[0]
                        .saran_rencana_tindak_selanjutnya);

                    if (data.pengkajian_spiritual_pasien[0].is_pasien == '1') {
                        document.getElementById("is-pasien-ya-spiritual").checked = true;
                        $("#nama-keluarga-spiritual").prop("disabled", true);
                        $("#hubungan-keluarga-spiritual").prop("disabled", true);
                    } else if (data.pengkajian_spiritual_pasien[0].is_pasien == '0') {
                        document.getElementById("is-pasien-tidak-spiritual").checked = true;
                        $("#nama-keluarga-spiritual").prop("disabled", false);
                        $("#hubungan-keluarga-spiritual").prop("disabled", false);
                    }

                    if (data.pengkajian_spiritual_pasien[0].kondisi_ibadah == 'Disiplin') {
                        document.getElementById("kondisi-pasien-disiplin-spiritual").checked = true;
                    } else if (data.pengkajian_spiritual_pasien[0].kondisi_ibadah == 'Kadang-kadang') {
                        document.getElementById("kondisi-pasien-kadang-spiritual").checked = true;
                    } else if (data.pengkajian_spiritual_pasien[0].kondisi_ibadah == 'Tidak') {
                        document.getElementById("kondisi-pasien-tidak-spiritual").checked = true;
                    }

                    if (data.pengkajian_spiritual_pasien[0].kondisi_psiko_spiritual == 'Menerima') {
                        document.getElementById("kondisi-psiko-menerima-spiritual").checked = true;
                    } else if (data.pengkajian_spiritual_pasien[0].kondisi_psiko_spiritual == 'Mengeluh') {
                        document.getElementById("kondisi-psiko-mengeluh-spiritual").checked = true;
                    } else if (data.pengkajian_spiritual_pasien[0].kondisi_psiko_spiritual == 'Menolak') {
                        document.getElementById("kondisi-psiko-menolak-spiritual").checked = true;
                    }

                    if (data.pengkajian_spiritual_pasien[0].edukasi_islam == 'Bimbingan Rohani') {
                        document.getElementById("edukasi-islam-bimroh-spiritual").checked = true;
                    } else if (data.pengkajian_spiritual_pasien[0].edukasi_islam ==
                        'Bimbingan Wanita Muslimah') {
                        document.getElementById("edukasi-islam-bimwas-spiritual").checked = true;
                    }

                }                
                // console.log(data.pengkajian_spiritual_pasien[0]);

                $('#modal_pengkajian_spiritual_pasien_pulang').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }
	
	function resetModalPengkajianPasienMuslim() {
		
		$('#id-pendaftaran-spiritual').val('');
		$('#nama-keluarga-spiritual').val('');
		$('#tanggal-lahir-spiritual').val('');
		$('#saran-rencana-tindak-selanjutnya-spiritual').val('');
	
		document.getElementById("is-pasien-ya-spiritual").checked = false;
		document.getElementById("is-pasien-tidak-spiritual").checked = false;
		document.getElementById("kondisi-pasien-disiplin-spiritual").checked = false;
		document.getElementById("kondisi-pasien-kadang-spiritual").checked = false;
		document.getElementById("kondisi-pasien-tidak-spiritual").checked = false;
		document.getElementById("kondisi-psiko-menerima-spiritual").checked = false;
		document.getElementById("kondisi-psiko-mengeluh-spiritual").checked = false;
		document.getElementById("kondisi-psiko-menolak-spiritual").checked = false;
		document.getElementById("edukasi-islam-bimroh-spiritual").checked = false;
		document.getElementById("edukasi-islam-bimwas-spiritual").checked = false;
	
		$("#nama-keluarga").prop("disabled", false);
		$("#tanggal-lahir").prop("disabled", false);
		$("#laki-laki").prop("disabled", false);
		$("#perempuan").prop("disabled", false);
		$("#alamat-form-rekam-medis	").prop("disabled", false);
		// $("#hubungan-keluarga").prop("disabled", false);
	}
</script>