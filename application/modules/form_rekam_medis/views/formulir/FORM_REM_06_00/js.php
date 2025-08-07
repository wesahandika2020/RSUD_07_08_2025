<script>
    // KEMATIAN
    function lihatFORM_REM_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'lihat';
        window.open('<?= base_url('pendaftaran_poli/cetak_surat_keterangan_kematian/') ?>' + pasien.id, 'Cetak Surat Keterangan kematian', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_REM_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'edit';
        cetakSuratKeteranganKematianERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_REM_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'tambah';
        cetakSuratKeteranganKematianERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function cetakSuratKeteranganKematianERM(id_pendaftaran, id_layanan_pendaftaran, action) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let pasien = data.pasien;
                let layanan = data.layanan;
                let surat_keterangan_kematian = data.surat_keterangan_kematian;
                // Set all values first
                resetModalSuratKeteranganKematianERM();

                $('#id-pendaftaran-skk').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-skk').val(id_layanan_pendaftaran);
                $('#id-pasien-skk').val(data.pasien.id_pasien);

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${pasien.id_pasien}, Nama: ${pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${pasien.telp}</b></i>`);

                if (surat_keterangan_kematian !== null) {
                    $('#id-pemeriksa-skk').val(surat_keterangan_kematian.id_pemeriksa);
                    $('#nomor-surat-kematian-skk').val(surat_keterangan_kematian.nomor_surat_kematian);
                    $('#nomor-urut-kematian-skk').val(surat_keterangan_kematian.nomor_urut_kematian);
                    $('#nomor-kk-skk').val(surat_keterangan_kematian.nomor_kk);
                    // $('#waktu-meninggal').val(datetimefmysql(surat_keterangan_kematian.waktu_meninggal));
                    $('#waktu-meninggal').val((surat_keterangan_kematian.waktu_meninggal !== null ?datetimefmysql(surat_keterangan_kematian.waktu_meninggal) : '<?= date('d/m/Y H:i:s') ?>'));
                    $('#alamat-meninggal-skk').val(surat_keterangan_kematian.alamat_meninggal);
                    $('#kode-kematian-skk').val(surat_keterangan_kematian.kode_kematian);
                    $('#yang-melapor-skk').val(surat_keterangan_kematian.yang_melapor);
                    $('#ktp-skk').val(surat_keterangan_kematian.ktp);
                    // $('#waktu-pemeriksaan-skk').val(datetimefmysql(surat_keterangan_kematian.waktu_pemeriksaan));
                    $('#waktu-pemeriksaan-skk').val((surat_keterangan_kematian.waktu_pemeriksaan !== null ?datetimefmysql(surat_keterangan_kematian.waktu_pemeriksaan) : '<?= date('d/m/Y H:i:s') ?>'));
                    $('#dokter-pemeriksa-skk').val(surat_keterangan_kematian.id_pemeriksa);
                    $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html(surat_keterangan_kematian.nama_pemeriksa);

                    if (surat_keterangan_kematian.tempat_meninggal == 'Rumah Sakit') {
                        document.getElementById("rs-skk").checked = true;
                    } else if (surat_keterangan_kematian.tempat_meninggal == 'Rumah Bersalin') {
                        document.getElementById("rb-skk").checked = true;
                    } else if (surat_keterangan_kematian.tempat_meninggal == 'Puskesmas') {
                        document.getElementById("puskesmas-skk").checked = true;
                    } else if (surat_keterangan_kematian.tempat_meninggal == 'Rumah') {
                        document.getElementById("rumah-skk").checked = true;
                    } else if (surat_keterangan_kematian.tempat_meninggal == 'Lain-lain') {
                        document.getElementById("lain-lain-skk").checked = true;
                    }

                    if (surat_keterangan_kematian.jenis_pemeriksaan == 'Visum') {
                        document.getElementById("visum-skk").checked = true;
                    } else if (surat_keterangan_kematian.jenis_pemeriksaan == 'Otopsi') {
                        document.getElementById("otopsi-skk").checked = true;
                    } else if (surat_keterangan_kematian.jenis_pemeriksaan == 'Tidak divisum') {
                        document.getElementById("tidak-divisum-skk").checked = true;
                    }

                    if (surat_keterangan_kematian.sebab_kematian == 'Sakit') {
                        document.getElementById("sakit-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Bersalin') {
                        document.getElementById("bersalin-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Lahir Mati') {
                        document.getElementById("lahir-mati-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Kecelakaan Lalu Lintas') {
                        document.getElementById("kecelakaan-lalin-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Kecelakaan Industri') {
                        document.getElementById("kecelakaan-industri-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Bunuh Diri') {
                        document.getElementById("bunuh-diri-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Pembunuhan/Penganiayaan') {
                        document.getElementById("pembunuhan-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Lain-lain') {
                        document.getElementById("lain-lain-sebab-kematian-skk").checked = true;
                    } else if (surat_keterangan_kematian.sebab_kematian == 'Tidak Dapat Ditentukan') {
                        document.getElementById("tidak-dapat-ditentukan-skk").checked = true;
                    }

                    if (surat_keterangan_kematian.dikubur == 'Tangerang') {
                        document.getElementById("tangerang-skk").checked = true;
                    } else if (surat_keterangan_kematian.dikubur == 'Luar Tangerang') {
                        document.getElementById("luar-tangerang-skk").checked = true;
                    }

                    if (surat_keterangan_kematian.awetkan == 1) {
                        document.getElementById("diawetkan-skk").checked = true;
                    } else if (surat_keterangan_kematian.awetkan == 0) {
                        document.getElementById("tidak-diawetkan-skk").checked = true;
                    }
                }

                $('#modal-surat-keterangan-kematian').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalSuratKeteranganKematianERM() {
        // Set default fields
        // $('#id-pendaftaran-skk').val('');
        $('#id-pemeriksa-skk').val('');
        $('#nomor-surat-kematian-skk').val('');
        $('#nomor-urut-kematian-skk').val('');
        $('#waktu-meninggal').val('<?= date('d/m/Y H:i') ?>');
        $('#nomor-kk-skk').val('');
        $('#alamat-meninggal-skk').val('');
        $('#waktu-pemeriksaan-skk').val('<?= date('d/m/Y H:i') ?>');
        $('#kode-kematian-skk').val('');
        $('#yang-melapor-skk').val('');
        $('#ktp-skk').val('');
        $('#dokter-pemeriksa-skk').val('');
        $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("rs-skk").checked = false;
        document.getElementById("rb-skk").checked = false;
        document.getElementById("puskesmas-skk").checked = false;
        document.getElementById("rumah-skk").checked = false;
        document.getElementById("lain-lain-skk").checked = false;
        document.getElementById("visum-skk").checked = false;
        document.getElementById("otopsi-skk").checked = false;
        document.getElementById("tidak-divisum-skk").checked = false;
        document.getElementById("sakit-skk").checked = false;
        document.getElementById("bersalin-skk").checked = false;
        document.getElementById("lahir-mati-skk").checked = false;
        document.getElementById("kecelakaan-lalin-skk").checked = false;
        document.getElementById("kecelakaan-industri-skk").checked = false;
        document.getElementById("bunuh-diri-skk").checked = false;
        document.getElementById("pembunuhan-skk").checked = false;
        document.getElementById("lain-lain-sebab-kematian-skk").checked = false;
        document.getElementById("tidak-dapat-ditentukan-skk").checked = false;
        document.getElementById("tangerang-skk").checked = false;
        document.getElementById("luar-tangerang-skk").checked = false;
        document.getElementById("diawetkan-skk").checked = false;
        document.getElementById("tidak-diawetkan-skk").checked = false;
    }
</script>