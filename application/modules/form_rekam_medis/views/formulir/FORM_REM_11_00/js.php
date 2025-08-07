<script>
    function lihatFORM_REM_11_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        window.open('<?= base_url('pendaftaran_igd/cetak_persetujuan_rawat_inap/') ?>' + layanan.id, 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
            dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_REM_11_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        cetakSuratPengantarRawat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_REM_11_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        cetakSuratPengantarRawat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    // function cetakSuratPengantarRawat(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
    //     // var dialog = bootbox.dialog({
    //     //     message: "Apakah yang menandatangani adalah pasien sendiri?",
    //     //     title: "Tanda Tangan Pasien",
    //     //     buttons: {
    //     //         tidak: {
    //     //             label: '<i class="fas fa-window-close"></i> Tidak',
    //     //             className: "btn-secondary",
    //     //             callback: function() {
    //     //                 var dWidth = $(window).width();
    //     //                 var dHeight = $(window).height();
    //     //                 var x = screen.width / 2 - dWidth / 2;
    //     //                 var y = screen.height / 2 - dHeight / 2;

    //     //                 $('#modal-cetak-persetujuan-rawat-inap-rm').modal('show');
    //     //                 $('#id-layanan-pendaftaran-form-cpri-rm').val(id_layanan_pendaftaran);

    //     //                 getPersetujuanRawatInapRm(id_layanan_pendaftaran, id_pendaftaran, action, 'tidak')
    //     //                 dialog.modal('hide');
    //     //             }
    //     //         },
    //     //         ya: {
    //     //             label: '<i class="fas fa-check"></i>  Ya',
    //     //             className: "btn-success",
    //     //             callback: function() {
    //     //                 var dWidth = $(window).width();
    //     //                 var dHeight = $(window).height();
    //     //                 var x = screen.width / 2 - dWidth / 2;
    //     //                 var y = screen.height / 2 - dHeight / 2;

    //     //                 $('#modal-cetak-persetujuan-rawat-inap-rm').modal('show');
    //     //                 $('#id-layanan-pendaftaran-form-cpri-rm').val(id_layanan_pendaftaran);

    //     //                 getPersetujuanRawatInapRm(id_layanan_pendaftaran, id_pendaftaran, action, 'ya');
    //     //                 dialog.modal('hide');
    //     //             }
    //     //         }
    //     //     }
    //     // });
    //     $('#id-layanan-pendaftaran-form-cpri-rm').val(id_layanan_pendaftaran);

    //     getPersetujuanRawatInapRm(id_layanan_pendaftaran, id_pendaftaran, action);
    // }

    function cetakSuratPengantarRawat(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#saksi-search').select2c({
            ajax: {
                url: "<?= base_url('form_rekam_medis/api/form_rekam_medis/saksi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        // jenis: 15,
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                // var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $('#id-layanan-pendaftaran-form-cpri-rm').val(id_layanan_pendaftaran);
        $('#id-pendaftaran-form-cpri-rm').val(id_pendaftaran);
        // $('#is-pasien-ya-spri-rm').click()

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
                $('#modal-cetak-persetujuan-rawat-inap-rm').modal('show');

                const data = response.persetujuan_rawat_inap.data
                const pasien = response.persetujuan_rawat_inap.pendaftaran.pasien
                const penanggung_jawab = response.persetujuan_rawat_inap.penanggung_jawab

                $('#id-pasien-form-cpri-rm').val(pasien.id);

                resetPersetujuanUmumRawatInap();

                if (data === null) {
                    // $("input[name='kewaspadaan_pncs']").on('click', function() {
                    $('#tr_is_pasien').show();

                    $("#is-pasien-ya-spri-rm").on('click', function() {
                        $('#tr-hubungan-keluarga').hide()
                        $('#nama-fpri-poli-rm').val(pasien.nama).prop('readOnly', true);
                        $('#tanggal-lahir-fpri-rm').val(pasien.tanggal_lahir).prop('readOnly', true);
                        $('#jenis-kelamin-fpri-rm').val(pasien.kelamin).attr('readonly', true);
                        $('#alamat-fpri-rm').html(pasien.alamat).prop('readOnly', true);
                        $('#identitas-fpri-rm').val(pasien.no_identitas).prop('readOnly', true);
                        $('#dirawat-di-rm').val(data?.dirawat_di);
                        $('#saksi-search').val(data?.id_saksi);
                        $('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
                    });

                    $("#is-pasien-tidak-spri-rm").on('click', function() {
                        $('#tr-hubungan-keluarga').show()
                        $('#nama-fpri-poli-rm').val(data?.nama ?? penanggung_jawab?.nama_pjwb).prop('readOnly', false);
                        $('#tanggal-lahir-fpri-rm').val(data?.tanggal_lahir ?? penanggung_jawab?.tgl_lahir_pjwb).prop('readOnly', false);
                        $('#jenis-kelamin-fpri-rm').val(data?.jenis_kelamin ?? penanggung_jawab?.kelamin_pjwb).attr('readonly', false);
                        $('#alamat-fpri-rm').html(data?.alamat ?? penanggung_jawab?.alamat_pjwb).prop('readOnly', false);
                        $('#identitas-fpri-rm').val(data?.identitas ?? penanggung_jawab?.nik_pjwb).prop('readOnly', false);
                        $('#hubungan-keluarga-fpri-rm').val(data?.hubungan_keluarga ?? penanggung_jawab?.hubungan_pjwb);
                        $('#dirawat-di-rm').val(data?.dirawat_di);
                        $('#saksi-search').val(data?.id_saksi);
                        $('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
                    });

                    $('#is-pasien-tidak-spri-rm').click()

                } else {
                    $('#tr_is_pasien').hide();

                    $('#nama-fpri-poli-rm').val(data?.nama ?? penanggung_jawab?.nama_pjwb).prop('readonly', false);
                    $('#tanggal-lahir-fpri-rm').val(data?.tanggal_lahir ?? penanggung_jawab?.tgl_lahir_pjwb).prop('readonly', false);
                    $('#jenis-kelamin-fpri-rm').val(data?.jenis_kelamin ?? penanggung_jawab?.kelamin_pjwb).prop('readonly', false);
                    $('#alamat-fpri-rm').html(data?.alamat ?? penanggung_jawab?.alamat_pjwb).prop('readonly', false);
                    $('#identitas-fpri-rm').val(data?.identitas ?? penanggung_jawab?.nik_pjwb).prop('readonly', false);
                    $('#hubungan-keluarga-fpri-rm').val(data?.hubungan_keluarga ?? penanggung_jawab?.hubungan_pjwb).prop('readonly', false);
                    $('#dirawat-di-rm').val(data?.dirawat_di).prop('readonly', false);
                    $('#saksi-search').val(data?.id_saksi);
                    $('#s2id_saksi-search a .select2c-chosen').html(data?.nama_saksi);
                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakManualSuratPersetujuanRawatInapRm() {
        const id = $('#id-layanan-pendaftaran-form-cpri-rm').val();

        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/cetak_manual_surat_persetujuan_rawat_inap') ?>',
            data: $('#form-persetujuan-rawat-inap-rm').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_persetujuan_rawat_inap/') ?>' + id, 'Cetak Persetujuan Rawat Inap', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);

                    $('#modal-cetak-persetujuan-rawat-inap-rm').modal('hide');
                    showListForm($('#id-pendaftaran-form-cpri-rm').val(), $('#id-layanan-pendaftaran-form-cpri-rm').val(), $('#id-pasien-form-cpri-rm').val());
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetPersetujuanUmumRawatInap() {
        $('#nama-fpri-poli-rm').val('');
        $('#tanggal-lahir-fpri-rm').val('');
        $('#jenis-kelamin-fpri-rm').val('');
        $('#alamat-fpri-rm').html('');
        $('#identitas-fpri-rm').val('');
        $('#hubungan-keluarga-fpri-rm').val('');
        $('#saksi-search').val('');
        $('#s2id_saksi-search a .select2c-chosen').html('Pilih saksi');
    }
</script>