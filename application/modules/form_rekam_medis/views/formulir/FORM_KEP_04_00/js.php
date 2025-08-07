<script>
    // SKL
    function lihatFORM_KEP_04_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'lihat';
        window.open('<?= base_url('rawat_inap/cetak_surat_kenal_lahir/') ?>' + pasien.id, 'Cetak Surat Kenal Lahir', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_04_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'edit';
        cetakSuratKenalLahirERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_KEP_04_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'tambah';
        cetakSuratKenalLahirERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function cetakSuratKenalLahirERM(id, id_layanan_pendaftaran, action) {
        // $('#modal_surat_kenal_lahir_irm').modal('show');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rawat_inap/api/rawat_inap/surat_kenal_lahir') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetModalSuratKenalLahirERM();
                let pasien = data.pendaftaran_detail.pasien;

                $('#modal-surat-kenal-lahir-title').html(
                    `<b>Form Surat Kenal Lahir</b> | No. RM: ${pasien.id_pasien}, Nama: ${pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${pasien.telp}</b></i>`
                );

                $('#id-layanan-pendaftaran-surat-kenal-lahir').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-surat-kenal-lahir').val(id);
                $('#id-pasien-surat-kenal-lahir').val(pasien.id_pasien);          
                if (data.surat_kenal_lahir !== null) {
                    $('#no-surat-lahir').val(data.surat_kenal_lahir.no_surat_lahir)
                    $('#nama-skl').val(data.surat_kenal_lahir.id_ttd_skl)
                    $('#s2id_nama-skl a .select2c-chosen').html(data.surat_kenal_lahir.nama_skl_2);

                    $('#nama-bayi-skl').val(data.surat_kenal_lahir.nama_bayi_skl)
                    if (data.surat_kenal_lahir.jenis_kelamin_skl === 'laki-laki') {
                        $('#jenis-kelamin-skl-1').prop('checked', true).change()
                    }
                    if (data.surat_kenal_lahir.jenis_kelamin_skl === 'perempuan') {
                        $('#jenis-kelamin-skl-2').prop('checked', true).change()
                    }
                    $('#ibu-skl').val(data.surat_kenal_lahir.ibu_skl)
                    $('#nik-ektp-ibu').val(data.surat_kenal_lahir.nik_ektp_skl_ibu)
                    $('#gol-darah-ibu').val(data.surat_kenal_lahir.gol_darah_ibu)
                    $('#ayah-skl').val(data.surat_kenal_lahir.ayah_skl)
                    $('#nik-ektp-ayah').val(data.surat_kenal_lahir.nik_ektp_skl_ayah)
                    $('#gol-darah-ayah').val(data.surat_kenal_lahir.gol_darah_ayah)
                    $('#alamat-rumah-skl').val(data.surat_kenal_lahir.alamat_rumah_skl)
                    $('#pekerjaan-skl').val(data.surat_kenal_lahir.pekerjaan_skl)
                    $('#hari-skl').val(data.surat_kenal_lahir.hari_skl)
                    $('#tanggal-skl').val(data.surat_kenal_lahir.tanggal_skl);
                    $('#jam-skl').val(data.surat_kenal_lahir.jam_skl)
                    $('#proses-persalinan-skl-2').val(data.surat_kenal_lahir.proses_persalinan_skl_2)
                    $('#anak-yang-ke-skl-1').val(data.surat_kenal_lahir.anak_yang_ke_skl_1)
                    if (data.surat_kenal_lahir.kembar_skl === '1') {
                        $('#kembar-skl-1').prop('checked', true).change()
                    }
                    if (data.surat_kenal_lahir.kembar_skl === '0') {
                        $('#kembar-skl-2').prop('checked', true).change()
                    }
                    if (data.surat_kenal_lahir.proses_persalinan_skl_1 === '1') {
                        $('#proses-persalinan-skl-0').prop('checked', true).change()
                        $('#proses-persalinan-skl-2').val('')
                    }
                    if (data.surat_kenal_lahir.proses_persalinan_skl_1 === '0') {
                        $('#proses-persalinan-skl-1').prop('checked', true).change()
                    }

                    $('#panjang-skl').val(data.surat_kenal_lahir.panjang_skl)
                    $('#berat-badan-skl').val(data.surat_kenal_lahir.berat_badan_skl)
                    $('#lingkar-dada-skl').val(data.surat_kenal_lahir.lingkar_dada_skl)
                    $('#lingkar-kepala-skl').val(data.surat_kenal_lahir.lingkar_kepala_skl)
                    $('#lingkar-pinggang-skl').val(data.surat_kenal_lahir.lingkar_pinggang_skl)
                    $('#tanggal-dokter-skl').val(data.surat_kenal_lahir.tanggal_dokter);
                    $('#ttd-dokter-skl').val(data.surat_kenal_lahir.id_dokter);
                    $('#s2id_ttd-dokter-skl a .select2c-chosen').html(data.surat_kenal_lahir.nama_dokter);
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_1 === 'Ayah') {$('#hbng-keluarga-skl-1').prop('checked', true).change()}
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_2 === 'Ibu') {$('#hbng-keluarga-skl-2').prop('checked', true).change()}
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_3 === 'Kakek') {$('#hbng-keluarga-skl-3').prop('checked', true).change()}
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_4 === 'Nenek') {$('#hbng-keluarga-skl-4').prop('checked', true).change()}
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_5 === 'Adik') {$('#hbng-keluarga-skl-5').prop('checked', true).change()}
                    if (data.surat_kenal_lahir.hbng_keluarga_skl_6 === 'Kakak') {$('#hbng-keluarga-skl-6').prop('checked', true).change()}
                    $('#hbng-keluarga-lainya').val(data.surat_kenal_lahir.hbng_keluarga_lainya);


                }
                $('#modal_surat_kenal_lahir_irm').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    // SURAT KENAL LAHIR
    function resetModalSuratKenalLahirERM() {
        $('#no-surat-lahir').val('');
        $('#nama-skl').val('');
        $('#nama-bayi-skl').val('');
        $('#ibu-skl').val('');
        $('#nik-ektp-ibu').val('');
        $('#gol-darah-ibu').val('');
        $('#ayah-skl').val('');
        $('#nik-ektp-ayah').val('');
        $('#gol-darah-ayah').val('');
        $('#alamat-rumah-skl').val('');
        $('#pekerjaan-skl').val('');
        $('#hari-skl').val('');
        $('#tanggal-skl').val('');
        $('#jam-skl').val('');
        $('#proses-persalinan-skl-1').val('');
        $('#proses-persalinan-skl-2').val('');
        $('#anak-yang-ke-skl-1').val('');
        $('#panjang-skl').val('');
        $('#berat-badan-skl').val('');
        $('#lingkar-kepala-skl').val('');
        $('#lingkar-dada-skl').val('');
        $('#lingkar-pinggang-skl').val('');
        $('#tanggal-dokter-skl').val('');
        $('#ttd-pasien-skl').val('');
        $('#ttd-bidan-skl').val('');
        $('#ttd-dokter-skl').val('');
        $('#s2id_ttd-bidan-skl a .select2c-chosen').html('Silahkan Pilih Bidan');
        $('#s2id_nama-skl a .select2c-chosen').html('');
        $('#s2id_ttd-dokter-skl a .select2c-chosen').html('Silahkan Pilih Dokter');
        document.getElementById("jenis-kelamin-skl-1").checked = false;
        document.getElementById("jenis-kelamin-skl-2").checked = false;
        document.getElementById("kembar-skl-1").checked = false;
        document.getElementById("kembar-skl-2").checked = false;
    }



</script>