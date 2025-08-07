<script>
    function lihatFORM_KEP_74_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'lihat';
        window.open('<?= base_url('rawat_inap/cetak_form_pemberian_informasi_pasien/') ?>' + layanan.id, 'Cetak Formulir Pemberian Informasi Pasien dan Keluarga', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_74_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'edit';
        cetakPemberianInformasiKepadaPasienERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_KEP_74_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'tambah';
        cetakPemberianInformasiKepadaPasienERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function cetakPemberianInformasiKepadaPasienERM(id, id_layanan_pendaftaran, action) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rawat_inap/api/rawat_inap/pemberian_informasi_pasien') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetPemberianInformasiKepadaPasienERM();

                let informasi_pasien = data.pemberian_informasi_pasien;
                let pasien = data.pendaftaran_detail.pasien;

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#id-pendaftaran-informasi').val(id);
                $('#id-layanan-pendaftaran-informasi').val(id_layanan_pendaftaran);
                $('#id-pasien-informasi').val(pasien.id_pasien);

                $('#modal-pemberian-informasi-pasien-title').html(`<b>Form Pemberian Informasi Pasien & Keluarga</b> | No. RM: ${pasien.id_pasien}, Nama: ${pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${pasien.telp}</b></i>`);
                $('#unit-kerja-pemberian-informasi').val(data.pendaftaran_detail.layanan.bangsal + ' kelas ' + data.pendaftaran_detail.layanan.kelas + ' ruang ' + data.pendaftaran_detail.layanan.no_ruang + ' No.  Bed ' + data.pendaftaran_detail.layanan.no_bed);

                if (informasi_pasien.length !== 0) {
                    $('#nama-keluarga-informasi').val(informasi_pasien.keluarga);
                    $('#hubungan-keluarga-informasi').val(informasi_pasien.hubungan_keluarga);
                    $('#tanggal-waktu-pemberian-informasi').val(datetimefmysql(informasi_pasien.tanggal_waktu));
                    $('#materi-edukasi-pemberian-informasi').val(informasi_pasien.materi_edukasi);
                    $('#daftar-pertanyaan-pemberian-informasi').val(informasi_pasien.daftar_pertanyaan);
                    $('#id-dokter-informasi').val(data.id_dokter);
                    $('#s2id_dokter-informasi a .select2c-chosen').html(informasi_pasien.nama_dokter);
                } else {
                    $('#nama-keluarga-informasi').val(pasien.nama_pjwb);
                    $('#hubungan-keluarga-informasi').val(pasien.hubungan_pjwb);
                    $('#tanggal-waktu-pemberian-informasi').val('<?= date('d/m/Y H:i') ?>');
                    // $('#materi-edukasi-pemberian-informasi').val(pasien.materi_edukasi);
                    // $('#daftar-pertanyaan-pemberian-informasi').val(pasien.daftar_pertanyaan);
                    // $('#id-dokter-informasi').val(data.id_dokter);
                    // $('#s2id_dokter-informasi a .select2c-chosen').html(pasien.nama_dokter);
                }

                $('#modal_pemberian_informasi_pasien').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetPemberianInformasiKepadaPasienERM() {
        $('#nama-keluarga-informasi').val('');
        $('#hubungan-keluarga-informasi').val('');
        $('#tanggal-waktu-pemberian-informasi').val('<?= date('d/m/Y H:i') ?>');
        $('#materi-edukasi-pemberian-informasi').val('');
        $('#daftar-pertanyaan-pemberian-informasi').val('');
        $('#daftar-pertanyaan-pemberian-informasi').val('');
        $('#id-dokter-informasi').val('');
        $('#s2id_dokter-informasi a .select2c-chosen').html('Pilih Dokter');
    }
</script>