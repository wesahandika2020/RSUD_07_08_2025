<script>
    $(function() {
        $('#surveilans-tanggal-ttd-perawat, #surveilans-tanggal-ttd-ipcn').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });
        $('#sirs-tanggal-antibiotik, #sirs-antibiotik-selesai, #sirs-tanggal-keluars, #sirs-tanggal-diagnosis-satu, #ek-tanggal-tindakan, #sirs-tanggal-mulai, #sirs-tanggal-selesai, #sirs-tanggal-pasang, #sirs-tanggal-lepas, #sirs-tanggal-diagnosis').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        let currentDate = new Date();


        $('#sirs-nama-antibiotika').select2c({
            minimumInputLength: 2,
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2

                    return {
                        q: term, //search term
                        page: page // page number
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
                var markup = data.nama;

                return markup;
            },
            formatSelection: function(data) {

                return data.nama;

            }
        });

        $('#sirs-ruang-rawat').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/kamar_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                getNoBed(data.id);
                return data.nama;
            }
        });

        function getNoBed(id_kamar) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data !== null) {
                        $('#no-bed').val(data.no_bed);
                    } else {
                        $('#no-bed').val('');
                    }

                    syams_validation_remove('#no-bed');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }

        $('#t-op-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#sm-top-lain').prop('disabled', false)
            } else {
                $('#sm-top-lain').val('').prop('disabled', true)
            }
        });

        $('#sirs-antibiotik').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-antibiotik-profilaksis').prop('disabled', false)
                $('#sirs-dosis-antibiotik').prop('disabled', false)
            } else {
                $('#sirs-antibiotik-profilaksis').val('').prop('disabled', true)
                $('#sirs-dosis-antibiotik').val('').prop('disabled', true)
            }
        });

        $('#sirs-antibiotik-satu').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-antibiotik-profilaksis-satu').prop('disabled', false)
                $('#sirs-dosis-antibiotik-satu').prop('disabled', false)
            } else {
                $('#sirs-antibiotik-profilaksis-satu').val('').prop('disabled', true)
                $('#sirs-dosis-antibiotik-satu').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-ido').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-ido').prop('disabled', false)
                $('#sirs-kultur-ido').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-ido').val('').prop('disabled', true)
                $('#sirs-kultur-ido').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-iad').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-iad').prop('disabled', false)
                $('#sirs-kultur-iad').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-iad').val('').prop('disabled', true)
                $('#sirs-kultur-iad').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-isk').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-isk').prop('disabled', false)
                $('#sirs-kultur-isk').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-isk').val('').prop('disabled', true)
                $('#sirs-kultur-isk').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-hap').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-hap').prop('disabled', false)
                $('#sirs-kultur-hap').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-hap').val('').prop('disabled', true)
                $('#sirs-kultur-hap').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-vap').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-vap').prop('disabled', false)
                $('#sirs-kultur-vap').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-vap').val('').prop('disabled', true)
                $('#sirs-kultur-vap').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-plebitis').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-plebitis').prop('disabled', false)
                $('#sirs-kultur-plebitis').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-plebitis').val('').prop('disabled', true)
                $('#sirs-kultur-plebitis').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-dekubitus').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-dekubitus').prop('disabled', false)
                $('#sirs-kultur-dekubitus').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-dekubitus').val('').prop('disabled', true)
                $('#sirs-kultur-dekubitus').val('').prop('disabled', true)
            }
        });

        $('#sirs-ada-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#sirs-komplikasi-lain').prop('disabled', false)
                $('#sirs-kultur-lain').prop('disabled', false)
            } else {
                $('#sirs-komplikasi-lain').val('').prop('disabled', true)
                $('#sirs-kultur-lain').val('').prop('disabled', true)
            }
        });

        $('#sirs-perawat-pasang').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#sirs-perawat-lepas').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#surveilans-perawat').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#perawat-mengover-pagi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-mengover-pagi-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-pagi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-menerima-pagi-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-mengover-sore').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-mengover-sore-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-sore').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-menerima-sore-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-mengover-malam').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-mengover-malam-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-malam').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-perawat-menerima-malam-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#surveilans-ipcn').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#dpjp-utama-pagi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-dpjp-utama-pagi-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#dokter-dpjp-sore').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-dokter-dpjp-sore-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#dokter-dpjp-malam').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $("#id-dokter-dpjp-malam-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#sirs-tindakan').select2c({
            ajax: {
                url: "<?= base_url('intensive_care/api/intensive_care/tindakan_icare') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var markup = '<b>' + data.layanan + '</b> <br/>' + data.layanan_parent;

                return markup;
            },
            formatSelection: function(data) {
                return data.layanan
            }
        });

    })

    function lihatFORM_KEP_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

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
                showLoader()
            },
            success: function(data) {
                console.log(data.surveilans2[0]);
                console.log(data.surveilans2[1]);
                resetFormEntriKeperawatan();

                $('#sirs-antibiotika-ya').click(function() {
                    if ($(this).is(":checked")) {
                        $('#sirs-tanggal-antibiotik, #sirs-dosis-antibiotika, #sirs-antibiotik-selesai')
                            .attr('disabled', false);
                        $('#sirs-nama-antibiotika').select2c('readonly', false);
                        $('#sirs-tanggal-antibiotik, #sirs-dosis-antibiotika, #sirs-antibiotik-selesai')
                            .val('');
                        $('#sirs-teknik-im, #sirs-teknik-iv, #sirs-teknik-oral, #sirs-teknik-drip, #sirs-teknik-sup, #sirs-teknik-lokal')
                            .prop('checked', false).change();
                    }
                });

                $('#sirs-antibiotika-tidak').click(function() {
                    if ($(this).is(":checked")) {
                        $('#sirs-tanggal-antibiotik, #sirs-dosis-antibiotika, #sirs-antibiotik-selesai')
                            .attr('disabled', true);
                        $('#sirs-nama-antibiotika').select2c('readonly', true);
                        $('#sirs-tanggal-antibiotik, #sirs-nama-antibiotika, #sirs-dosis-antibiotika, #sirs-antibiotik-selesai')
                            .val('');
                        $('#sirs-teknik-im, #sirs-teknik-iv, #sirs-teknik-oral, #sirs-teknik-drip, #sirs-teknik-sup, #sirs-teknik-lokal')
                            .prop('checked', false).change();
                    }
                });

                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);

                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }

                //SURVEILANS

                let surveilans = data.surveilans2[0];
                let surveilansLama = data.surveilans2[1];

                if ((surveilans !== null && surveilans !== undefined) || (surveilansLama !== null && surveilansLama !== undefined)) {
                    $('#sirs-diagnosis-operasi').val(surveilans && surveilans.sirs_diagnosis_operasi !== null ? surveilans.sirs_diagnosis_operasi : (surveilansLama && surveilansLama.sirs_diagnosis_operasi !== null ? surveilansLama.sirs_diagnosis_operasi : ''));
                    $('#sirs-diagnosis-masuk').val(surveilans && surveilans.sirs_diagnosis_masuk !== null ? surveilans.sirs_diagnosis_masuk : (surveilansLama && surveilansLama.sirs_diagnosis_masuk !== null ? surveilansLama.sirs_diagnosis_masuk : ''));

                    if ((surveilans && surveilans.sirs_pemakaian_antibiotika === 'ada') || (surveilansLama && surveilansLama.sirs_pemakaian_antibiotika === 'ada')) {
                        $('#sirs-antibiotika-ya').prop('checked', true).change();
                    } else {
                        $('#sirs-antibiotika-ya').prop('checked', false).change();
                    }

                    if ((surveilans && surveilans.sirs_pemakaian_antibiotika === 'tidak ada') || (surveilansLama && surveilansLama.sirs_pemakaian_antibiotika === 'tidak ada')) {
                        $('#sirs-antibiotika-tidak').prop('checked', true).change();
                    } else {
                        $('#sirs-antibiotika-tidak').prop('checked', false).change();
                    }

                    // sirs_perawat dan sirs_ipcn
                    if ((surveilans && surveilans.sirs_perawat !== null) || (surveilansLama && surveilansLama.sirs_perawat !== null)) {
                        $('#surveilans-perawat').val(surveilans && surveilans.sirs_perawat === null ? surveilansLama.sirs_perawat : surveilans.sirs_perawat);
                    } else {
                        $('#surveilans-perawat').val('');
                    }

                    if ((surveilans && surveilans.sirs_perawat !== null) || (surveilansLama && surveilansLama.sirs_perawat !== null)) {
                        $('#surveilans-perawat').select2c('readonly', true);
                        $('#s2id_surveilans-perawat a .select2c-chosen').html(surveilans && surveilans.p_surveilans === '' ? surveilansLama.p_surveilans : surveilans.p_surveilans);
                    }

                    if ((surveilans && surveilans.sirs_petugas !== null) || (surveilansLama && surveilansLama.sirs_petugas !== null)) {
                        $('#surveilans-ttd-petugas').hide();
                        $('#surveilans_ttd_petugas_verified').show();
                    }

                    if ((surveilans && surveilans.sirs_tanggal_ttd_perawat !== null) || (surveilansLama && surveilansLama.sirs_tanggal_ttd_perawat !== null)) {
                        $('#surveilans-tanggal-ttd-perawat').val(datetimefmysql(surveilans && surveilans.sirs_tanggal_ttd_perawat === null ? surveilansLama.sirs_tanggal_ttd_perawat : surveilans.sirs_tanggal_ttd_perawat));
                        $('#surveilans-tanggal-ttd-perawat').attr('disabled', true);
                    }

                    if ((surveilans && surveilans.sirs_ipcn !== null) || (surveilans && surveilans.sirs_ipcn !== 'undefined') || (surveilansLama && surveilansLama.sirs_ipcn !== null)) {
                        $('#surveilans-ipcn').val('');
                    } else {
                        $('#surveilans-ipcn').val(surveilans && surveilans.sirs_ipcn === null ? surveilansLama.sirs_ipcn : surveilans.sirs_ipcn);
                    }

                    if ((surveilans && surveilans.sirs_ipcn !== null) || (surveilansLama && surveilansLama.sirs_ipcn !== null)) {
                        $('#surveilans-ipcn').select2c('readonly', true);
                        $('#s2id_surveilans-ipcn a .select2c-chosen').html(surveilans && surveilans.ipcn_surveilans === '' ? surveilansLama.ipcn_surveilans : surveilans.ipcn_surveilans);
                    }

                    if ((surveilans && surveilans.sirs_ipcn_link !== null) || (surveilansLama && surveilansLama.sirs_ipcn_link !== null)) {
                        $('#surveilans-ipcn-link').hide();
                        $('#surveilans_ttd_ipcnlink_verified').show();
                    }

                    if ((surveilans && surveilans.sirs_tanggal_ttd_ipcn !== null) || (surveilansLama && surveilansLama.sirs_tanggal_ttd_ipcn !== null)) {
                        $('#surveilans-tanggal-ttd-ipcn').val(datetimefmysql(surveilans && surveilans.sirs_tanggal_ttd_ipcn === null ? surveilansLama.sirs_tanggal_ttd_ipcn : surveilans.sirs_tanggal_ttd_ipcn));
                        $('#surveilans-tanggal-ttd-ipcn').attr('disabled', true);
                    }

                    

                    if ((surveilans && surveilans.hbsag === 'Positif') || (surveilansLama && surveilansLama.hbsag === 'Positif')) {
                        $('#hbsag-positif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.hbsag === 'Negatif') || (surveilansLama && surveilansLama.hbsag === 'Negatif')) {
                        $('#hbsag-negatif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.hbsag === 'Tidak Diperiksa') || (surveilansLama && surveilansLama.hbsag === 'Tidak Diperiksa')) {
                        $('#hbsag-periksa').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.antihcv === 'Positif') || (surveilansLama && surveilansLama.antihcv === 'Positif')) {
                        $('#antihcv-positif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.antihcv === 'Negatif') || (surveilansLama && surveilansLama.antihcv === 'Negatif')) {
                        $('#antihcv-negatif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.antihcv === 'Tidak Diperiksa') || (surveilansLama && surveilansLama.antihcv === 'Tidak Diperiksa')) {
                        $('#antihcv-periksa').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.antihiv === 'Positif') || (surveilansLama && surveilansLama.antihiv === 'Positif')) {
                        $('#antihiv-positif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.antihiv === 'Negatif') || (surveilansLama && surveilansLama.antihiv === 'Negatif')) {
                        $('#antihiv-negatif').prop('checked', true).change();
                    } else if ((surveilans && surveilans.antihiv === 'Tidak Diperiksa') || (surveilansLama && surveilansLama.antihiv === 'Tidak Diperiksa')) {
                        $('#antihiv-periksa').prop('checked', true).change();
                    }


                    var kasusBedah = JSON.parse(surveilans.t_op === null ? surveilansLama.t_op : surveilans.t_op);
                    // Membuat objek yang memetakan nama properti dengan ID elemen HTML yang sesuai
                    var idMapping = {
                        t_op_ortopedi: '#t-op-ortopedi',
                        t_op_digestive: '#t-op-digestive',
                        t_op_plastik: '#t-op-plastik',
                        t_op_tumor: '#t-op-tumor',
                        t_op_urologi: '#t-op-urologi',
                        t_op_tht: '#t-op-tht',
                        t_op_anak: '#t-op-anak',
                        t_op_gilut: '#t-op-gilut',
                        t_op_vaskuler: '#t-op-vaskuler',
                        t_op_saraf: '#t-op-saraf',
                        t_op_mata: '#t-op-mata',
                        t_op_thorax: '#t-op-thorax',
                        t_op_obgyn: '#t-op-obgyn',
                        t_op_lain: '#t-op-lain',
                        sm_top_lain: '#sm-top-lain'
                    };
                    // Iterasi melalui properti kasusBedah dan mengatur properti yang sesuai jika nilainya tidak kosong
                    for (var prop in kasusBedah) {
                        if (kasusBedah[prop] !== '' && idMapping[prop]) {
                            $(idMapping[prop]).prop('checked', true);
                            if (prop === 't_op_lain') {
                                $(idMapping['sm_top_lain']).attr('disabled', false).val(kasusBedah.sm_top_lain);
                            }
                        }
                    }
                    // Menangani kasus khusus untuk 't_op_lain' jika nilainya kosong
                    if (kasusBedah.t_op_lain === '') {
                        $('#t-op-lain').prop('checked', false);
                        $('#sm-top-lain').attr('disabled', true);
                    }

                    if ((surveilans && surveilans.sirs_tanggal_diagnosis) || (surveilansLama && surveilansLama.sirs_tanggal_diagnosis !== null)) {
                        $('#sirs-tanggal-diagnosis').val(datefmysql(surveilans && surveilans.sirs_tanggal_diagnosis === null ? surveilansLama.sirs_tanggal_diagnosis : surveilans.sirs_tanggal_diagnosis));
                    }

                    if ((surveilans && surveilans.sirs_drain) || (surveilansLama && surveilansLama.sirs_drain === 'Positif')) {
                        $('#sirs-drain-ya').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_drain) || (surveilansLama && surveilansLama.sirs_drain === 'Negatif')) {
                        $('#sirs-drain-tidak').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_jenis_operasi) || (surveilansLama && surveilansLama.sirs_jenis_operasi === 'Bersih')) {
                        $('#sirs-jenis-operasi-bersih').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi) || (surveilansLama && surveilansLama.sirs_jenis_operasi === 'Bersih Tercemar')) {
                        $('#sirs-jenis-operasi-bersihcemar').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi) || (surveilansLama && surveilansLama.sirs_jenis_operasi === 'Tercemar')) {
                        $('#sirs-jenis-operasi-cemar').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi) || (surveilansLama && surveilansLama.sirs_jenis_operasi === 'Kotor')) {
                        $('#sirs-jenis-operasi-kotor').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_tindakan_operasi) || (surveilansLama && surveilansLama.sirs_tindakan_operasi === 'Cito')) {
                        $('#sirs-tindakan-operasi-cito').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_tindakan_operasi) || (surveilansLama && surveilansLama.sirs_tindakan_operasi === 'Elektif')) {
                        $('#sirs-tindakan-operasi-elektif').prop('checked', true).change();
                    }


                    var antibiotikProf = JSON.parse(surveilans.sirs_antibiotik === null ? surveilansLama.sirs_antibiotik : surveilans.sirs_antibiotik);
                    // Mengatur status checkbox sirs-antibiotik berdasarkan nilai antibiotikProf.sirs_antibiotik
                    $('#sirs-antibiotik').prop('checked', antibiotikProf.sirs_antibiotik !== '');
                    if (antibiotikProf.sirs_antibiotik_profilaksis !== '') {
                        $('#sirs-antibiotik-profilaksis').val(antibiotikProf.sirs_antibiotik_profilaksis);
                    }
                    if (antibiotikProf.sirs_dosis_antibiotik !== '') {
                        $('#sirs-dosis-antibiotik').val(antibiotikProf.sirs_dosis_antibiotik);
                    }
                    // Menangani status disabled untuk sirs-antibiotik-profilaksis
                    if (antibiotikProf.sirs_antibiotik !== '') {
                        $('#sirs-antibiotik-profilaksis').attr('disabled', false);
                    } else {
                        $('#sirs-antibiotik-profilaksis').attr('disabled', true);
                    }

                    if ((surveilans && surveilans.sirs_waktu_pemberian === 'preoperasi') || (surveilansLama && surveilansLama.sirs_waktu_pemberian === 'preoperasi')) {
                        $('#sirs-waktu-preoperasi').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_waktu_pemberian === 'selama') || (surveilansLama && surveilansLama.sirs_waktu_pemberian === 'selama')) {
                        $('#sirs-waktu-selama').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_waktu_pemberian === 'sesudah operasi') || (surveilansLama && surveilansLama.sirs_waktu_pemberian === 'sesudah operasi')) {
                        $('#sirs-waktu-sesudah').prop('checked', true).change();
                    }

                    $('#sirs-jam').val(surveilans && surveilans.sirs_jam !== null ? surveilans.sirs_jam : (surveilansLama && surveilansLama.sirs_jam !== null ? surveilansLama.sirs_jam : ''));
                    $('#sirs-menit').val(surveilans && surveilans.sirs_menit !== null ? surveilans.sirs_menit : (surveilansLama && surveilansLama.sirs_menit !== null ? surveilansLama.sirs_menit : ''));

                    if ((surveilans && surveilans.sirs_asascore === '1') || (surveilansLama && surveilansLama.sirs_asascore === '1')) {
                        $('#sirs-asascore-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore === '2') || (surveilansLama && surveilansLama.sirs_asascore === '2')) {
                        $('#sirs-asascore-dua').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore === '3') || (surveilansLama && surveilansLama.sirs_asascore === '3')) {
                        $('#sirs-asascore-tiga').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore === '4') || (surveilansLama && surveilansLama.sirs_asascore === '4')) {
                        $('#sirs-asascore-empat').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore === '5') || (surveilansLama && surveilansLama.sirs_asascore === '5')) {
                        $('#sirs-asascore-lima').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_tanggal_diagnosis_satu) || (surveilansLama && surveilansLama.sirs_tanggal_diagnosis_satu !== null)) {
                        $('#sirs-tanggal-diagnosis-satu').val(datefmysql(surveilans && surveilans.sirs_tanggal_diagnosis_satu === null ? surveilansLama.sirs_tanggal_diagnosis_satu : surveilans.sirs_tanggal_diagnosis_satu));
                    }

                    if ((surveilans && surveilans.sirs_drain_satu === 'Positif') || (surveilansLama && surveilansLama.sirs_drain_satu === 'Positif')) {
                        $('#sirs-drain-satu-ya').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_drain_satu === 'Negatif') || (surveilansLama && surveilansLama.sirs_drain_satu === 'Negatif')) {
                        $('#sirs-drain-satu-tidak').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_jenis_operasi_satu === 'Bersih') || (surveilansLama && surveilansLama.sirs_jenis_operasi_satu === 'Bersih')) {
                        $('#sirs-jenis-operasi-bersih-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi_satu === 'Bersih Tercemar') || (surveilansLama && surveilansLama.sirs_jenis_operasi_satu === 'Bersih Tercemar')) {
                        $('#sirs-jenis-operasi-bersihcemar-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi_satu === 'Tercemar') || (surveilansLama && surveilansLama.sirs_jenis_operasi_satu === 'Tercemar')) {
                        $('#sirs-jenis-operasi-cemar-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_jenis_operasi_satu === 'Kotor') || (surveilansLama && surveilansLama.sirs_jenis_operasi_satu === 'Kotor')) {
                        $('#sirs-jenis-operasi-kotor-satu').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_tindakan_operasi_satu === 'Cito') || (surveilansLama && surveilansLama.sirs_tindakan_operasi_satu === 'Cito')) {
                        $('#sirs-tindakan-operasi-cito-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_tindakan_operasi_satu === 'Elektif') || (surveilansLama && surveilansLama.sirs_tindakan_operasi_satu === 'Elektif')) {
                        $('#sirs-tindakan-operasi-elektif-satu').prop('checked', true).change();
                    }

                    var antibiotikProfSatu = JSON.parse(surveilans.sirs_antibiotik_satu === null ? surveilansLama.sirs_antibiotik_satu : surveilans.sirs_antibiotik_satu);
                    if (antibiotikProfSatu.sirs_antibiotik_satu !== '') {
                        $('#sirs-antibiotik-satu').prop('checked', true);
                    } else {
                        $('#sirs-antibiotik-satu').prop('checked', false);
                        $('#sirs-antibiotik-profilaksis-satu').prop('disabled', true);
                    }
                    if (antibiotikProfSatu.sirs_antibiotik_profilaksis_satu !== '') {
                        $('#sirs-antibiotik-profilaksis-satu').val(antibiotikProfSatu.sirs_antibiotik_profilaksis_satu);
                    }
                    if (antibiotikProfSatu.sirs_dosis_antibiotik_satu !== '') {
                        $('#sirs-dosis-antibiotik-satu').val(antibiotikProfSatu.sirs_dosis_antibiotik_satu);
                    }

                    if ((surveilans && surveilans.sirs_waktu_pemberian_satu === 'preoperasi') || (surveilansLama && surveilansLama.sirs_waktu_pemberian_satu === 'preoperasi')) {
                        $('#sirs-waktu-preoperasi-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_waktu_pemberian_satu === 'selama') || (surveilansLama && surveilansLama.sirs_waktu_pemberian_satu === 'selama')) {
                        $('#sirs-waktu-selama-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_waktu_pemberian_satu === 'sesudah operasi') || (surveilansLama && surveilansLama.sirs_waktu_pemberian_satu === 'sesudah operasi')) {
                        $('#sirs-waktu-sesudah-satu').prop('checked', true).change();
                    }

                    $('#sirs-jam-satu').val(surveilans && surveilans.sirs_jam_satu !== null ? surveilans.sirs_jam_satu : (surveilansLama && surveilansLama.sirs_jam_satu !== null ? surveilansLama.sirs_jam_satu : ''));
                    $('#sirs-menit-satu').val(surveilans && surveilans.sirs_menit_satu !== null ? surveilans.sirs_menit_satu : (surveilansLama && surveilansLama.sirs_menit_satu !== null ? surveilansLama.sirs_menit_satu : ''));

                    if ((surveilans && surveilans.sirs_asascore_satu === '1') || (surveilansLama && surveilansLama.sirs_asascore_satu === '1')) {
                        $('#sirs-asascore-satu-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore_satu === '2') || (surveilansLama && surveilansLama.sirs_asascore_satu === '2')) {
                        $('#sirs-asascore-dua-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore_satu === '3') || (surveilansLama && surveilansLama.sirs_asascore_satu === '3')) {
                        $('#sirs-asascore-tiga-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore_satu === '4') || (surveilansLama && surveilansLama.sirs_asascore_satu === '4')) {
                        $('#sirs-asascore-empat-satu').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_asascore_satu === '5') || (surveilansLama && surveilansLama.sirs_asascore_satu === '5')) {
                        $('#sirs-asascore-lima-satu').prop('checked', true).change();
                    }


                    if ((surveilans && surveilans.sirs_pemakaian_antibiotika !== '') || (surveilansLama && surveilansLama.sirs_pemakaian_antibiotika !== '')) {
                        var pemakaianAntibiotika = surveilans && surveilans.sirs_pemakaian_antibiotika || surveilansLama && surveilansLama.sirs_pemakaian_antibiotika;

                        if (pemakaianAntibiotika === 'ada') {
                            $('#sirs-antibiotika-ya').prop('checked', true).change();
                        } else if (pemakaianAntibiotika === 'tidak ada') {
                            $('#sirs-antibiotika-tidak').prop('checked', true).change();
                            $('#sirs-nama-antibiotika').select2c('readonly', true);
                            $('#sirs-tanggal-antibiotik, #sirs-dosis-antibiotika, #sirs-antibiotik-selesai')
                                .prop('disabled', true)
                                .val('');
                            $('#sirs-teknik-im, #sirs-teknik-iv, #sirs-teknik-oral, #sirs-teknik-drip, #sirs-teknik-sup, #sirs-teknik-lokal')
                                .prop('checked', false)
                                .change();
                        }
                    } else {
                        $('#sirs-antibiotika-ya').prop('checked', true).change();
                    }

                    if ((surveilans && surveilans.sirs_tirah_baring === 'ya') || (surveilansLama && surveilansLama.sirs_tirah_baring === 'ya')) {
                        $('#sirs-tirah-ya').prop('checked', true).change();
                    } else if ((surveilans && surveilans.sirs_tirah_baring === 'tidak') || (surveilansLama && surveilansLama.sirs_tirah_baring === 'tidak')) {
                        $('#sirs-tirah-tidak').prop('checked', true).change();
                    }


                    var sirsIdo = JSON.parse(surveilans.sirs_ido === null ? surveilansLama.sirs_ido : surveilans.sirs_ido);
                    if (sirsIdo.sirs_ido === 'ada') {
                        $('#sirs-ada-ido').prop('checked', true).change();
                    }
                    if (sirsIdo.sirs_ido === 'tidak ada') {
                        $('#sirs-tidak-ido').prop('checked', true).change();
                    }
                    if (sirsIdo.sirs_komplikasi_ido !== null) {
                        $('#sirs-komplikasi-ido').val(sirsIdo.sirs_komplikasi_ido);
                    } else {
                        $('#sirs-komplikasi-ido').val('');
                    }
                    if (sirsIdo.sirs_kultur_ido !== null) {
                        $('#sirs-kultur-ido').val(sirsIdo.sirs_kultur_ido);
                    } else {
                        $('#sirs-kultur-ido').val('');
                    }

                    var sirsIad = JSON.parse(surveilans.sirs_iad === null ? surveilansLama.sirs_iad : surveilans.sirs_iad);
                    if (sirsIad.sirs_iad === 'ada') {
                        $('#sirs-ada-iad').prop('checked', true).change()
                    }
                    if (sirsIad.sirs_iad === 'tidak ada') {
                        $('#sirs-tidak-iad').prop('checked', true).change()
                    }
                    if (sirsIad.sirs_komplikasi_iad !== null) {
                        $('#sirs-komplikasi-iad').val(sirsIad.sirs_komplikasi_iad)
                    } else {
                        $('#sirs-komplikasi-iad').val('')
                    }
                    if (sirsIad.sirs_kultur_iad !== null) {
                        $('#sirs-kultur-iad').val(sirsIad.sirs_kultur_iad)
                    } else {
                        $('#sirs-kultur-iad').val('')
                    }

                    var sirsIsk = JSON.parse(surveilans.sirs_isk === null ? surveilansLama.sirs_isk : surveilans.sirs_isk);
                    if (sirsIsk.sirs_isk === 'ada') {
                        $('#sirs-ada-isk').prop('checked', true).change()
                    }
                    if (sirsIsk.sirs_isk === 'tidak ada') {
                        $('#sirs-tidak-isk').prop('checked', true).change()
                    }
                    if (sirsIsk.sirs_komplikasi_isk !== null) {
                        $('#sirs-komplikasi-isk').val(sirsIsk.sirs_komplikasi_isk)
                    } else {
                        $('#sirs-komplikasi-isk').val('')
                    }
                    if (sirsIsk.sirs_kultur_isk !== null) {
                        $('#sirs-kultur-isk').val(sirsIsk.sirs_kultur_isk)
                    } else {
                        $('#sirs-kultur-isk').val('')
                    }

                    var sirsHap = JSON.parse(surveilans.sirs_hap === null ? surveilansLama.sirs_hap : surveilans.sirs_hap);
                    if (sirsHap.sirs_hap === 'ada') {
                        $('#sirs-ada-hap').prop('checked', true).change()
                    }
                    if (sirsHap.sirs_hap === 'tidak ada') {
                        $('#sirs-tidak-hap').prop('checked', true).change()
                    }
                    if (sirsHap.sirs_komplikasi_hap !== null) {
                        $('#sirs-komplikasi-hap').val(sirsHap.sirs_komplikasi_hap)
                    } else {
                        $('#sirs-komplikasi-hap').val('')
                    }
                    if (sirsHap.sirs_kultur_hap !== null) {
                        $('#sirs-kultur-hap').val(sirsHap.sirs_kultur_hap)
                    } else {
                        $('#sirs-kultur-hap').val('')
                    }

                    var sirsVap = JSON.parse(surveilans.sirs_vap === null ? surveilansLama.sirs_vap : surveilans.sirs_vap);
                    if (sirsVap.sirs_vap === 'ada') {
                        $('#sirs-ada-vap').prop('checked', true).change()
                    }
                    if (sirsVap.sirs_vap === 'tidak ada') {
                        $('#sirs-tidak-vap').prop('checked', true).change()
                    }
                    if (sirsVap.sirs_komplikasi_vap !== null) {
                        $('#sirs-komplikasi-vap').val(sirsVap.sirs_komplikasi_vap)
                    } else {
                        $('#sirs-komplikasi-vap').val('')
                    }
                    if (sirsVap.sirs_kultur_vap !== null) {
                        $('#sirs-kultur-vap').val(sirsVap.sirs_kultur_vap)
                    } else {
                        $('#sirs-kultur-vap').val('')
                    }

                    var sirsPlebitis = JSON.parse(surveilans.sirs_plebitis === null ? surveilansLama.sirs_plebitis : surveilans.sirs_plebitis);
                    if (sirsPlebitis.sirs_plebitis === 'ada') {
                        $('#sirs-ada-plebitis').prop('checked', true).change()
                    }
                    if (sirsPlebitis.sirs_plebitis === 'tidak ada') {
                        $('#sirs-tidak-plebitis').prop('checked', true).change()
                    }
                    if (sirsPlebitis.sirs_komplikasi_plebitis !== null) {
                        $('#sirs-komplikasi-plebitis').val(sirsPlebitis.sirs_komplikasi_plebitis)
                    } else {
                        $('#sirs-komplikasi-plebitis').val('')
                    }
                    if (sirsPlebitis.sirs_kultur_plebitis !== null) {
                        $('#sirs-kultur-plebitis').val(sirsPlebitis.sirs_kultur_plebitis)
                    } else {
                        $('#sirs-kultur-plebitis').val('')
                    }

                    var sirsDekubitus = JSON.parse(surveilans.sirs_dekubitus === null ? surveilansLama.sirs_dekubitus : surveilans.sirs_dekubitus );
                    if (sirsDekubitus.sirs_dekubitus === 'ada') {
                        $('#sirs-ada-dekubitus').prop('checked', true).change()
                    }
                    if (sirsDekubitus.sirs_dekubitus === 'tidak ada') {
                        $('#sirs-tidak-dekubitus').prop('checked', true).change()
                    }
                    if (sirsDekubitus.sirs_komplikasi_dekubitus !== null) {
                        $('#sirs-komplikasi-dekubitus').val(sirsDekubitus.sirs_komplikasi_dekubitus)
                    } else {
                        $('#sirs-komplikasi-dekubitus').val('')
                    }
                    if (sirsDekubitus.sirs_kultur_dekubitus !== null) {
                        $('#sirs-kultur-dekubitus').val(sirsDekubitus.sirs_kultur_dekubitus)
                    } else {
                        $('#sirs-kultur-dekubitus').val('')
                    }

                    var sirsLain = JSON.parse(surveilans.sirs_lain === null ? surveilansLama.sirs_lain : surveilans.sirs_lain);
                    if (sirsLain.sirs_lain === 'ada') {
                        $('#sirs-ada-lain').prop('checked', true).change()
                    }
                    if (sirsLain.sirs_lain === 'tidak ada') {
                        $('#sirs-tidak-lain').prop('checked', true).change()
                    }
                    if (sirsLain.sirs_komplikasi_lain !== null) {
                        $('#sirs-komplikasi-lain').val(sirsLain.sirs_komplikasi_lain)
                    } else {
                        $('#sirs-komplikasi-lain').val('')
                    }
                    if (sirsLain.sirs_kultur_lain !== null) {
                        $('#sirs-kultur-lain').val(sirsLain.sirs_kultur_lain)
                    } else {
                        $('#sirs-kultur-lain').val('')
                    }

                    // Keluar RS
                    if ((surveilans && surveilans.sirs_keluar_rs === 'keluar') || (surveilansLama && surveilansLama.sirs_keluar_rs === 'keluar')) {
                        $('#sirs-keluar-rs').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_keluar_rs === 'pindah') || (surveilansLama && surveilansLama.sirs_keluar_rs === 'pindah')) {
                        $('#sirs-keluar-pindah').prop('checked', true).change();
                    }
                    if ((surveilans && surveilans.sirs_keluar_rs === 'meninggal') || (surveilansLama && surveilansLama.sirs_keluar_rs === 'meninggal')) {
                        $('#sirs-keluar-meninggal').prop('checked', true).change();
                    }

                    // Tanggal Keluar RS
                    if ((surveilans && surveilans.sirs_tanggal_keluars !== null) || (surveilansLama && surveilansLama.sirs_tanggal_keluars !== null)) {
                        $('#sirs-tanggal-keluars').val(datefmysql(surveilans.sirs_tanggal_keluars ?? surveilansLama.sirs_tanggal_keluars));
                    }

                    // Sebab Keluar RS
                    if ((surveilans && surveilans.sirs_sebab_keluar !== null) || (surveilansLama && surveilansLama.sirs_sebab_keluar !== null)) {
                        $('#sirs-sebab-keluar').val(surveilans.sirs_sebab_keluar ?? surveilansLama.sirs_sebab_keluar);
                    } else {
                        $('#sirs-sebab-keluar').val('');
                    }

                    // Diagnosis Akhir
                    if ((surveilans && surveilans.sirs_diagnosis_akhir !== null) || (surveilansLama && surveilansLama.sirs_diagnosis_akhir !== null)) {
                        $('#sirs-diagnosis-akhir').val(surveilans.sirs_diagnosis_akhir ?? surveilansLama.sirs_diagnosis_akhir);
                    } else {
                        $('#sirs-diagnosis-akhir').val('');
                    }


                }

                if (typeof data.sirs_ruang_rawat !== 'undefined' | data.sirs_ruang_rawat !== null) {

                    showRuangRawat(data.sirs_ruang_rawat, id_pendaftaran, id_layanan_pendaftaran, bed);

                } else {

                    $('#table-ruang-rawat tbody').empty();

                }

                if (typeof data.sirs_pemasangan_alat !== 'undefined' | data.sirs_pemasangan_alat !== null) {

                    showPemasanganAlat(data.sirs_pemasangan_alat);

                } else {

                    $('#table-pemasangan-alat tbody').empty();

                }

                if (typeof data.sirs_pemakaian_antibiotika !== 'undefined' | data.sirs_pemakaian_antibiotika !==
                    null) {

                    showPemakaianAntibiotika(data.sirs_pemakaian_antibiotika);

                } else {

                    $('#table-pemakaian-antibiotika tbody').empty();

                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_entri_keperawatan_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function konfirmasiSimpanEntriKeperawatan() {

        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Survailens Infeksi Rumah Sakit?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriKeperawatan();
            }
        })

      
    }

    function simpanEntriKeperawatan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_surveilans") ?>',
            data: $('#form_entri_keperawatan').serialize(),
            // data: $('#form_entri_keperawatan').serialize() + '&grafik_mp=' + $('#data-chart-mp').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {
                        if (data.respon.add_show !== undefined) {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }
                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {

                                        }
                                    }

                                }
                            });
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_entri_keperawatan_rm').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
                    } else {
                        messageAddFailed();
                    }
                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    function cekDateTime(id, form) {
        // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

        re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
        if (form != '') {

            if (regs = form.match(re)) {
                // nilai hari antara 1 s.d 31
                if (regs[1] < 1 || regs[1] > 31) {
                    alert("Nilai tidak valid untuk hari: " + regs[1]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai bulan antara 1 s.d 12
                if (regs[2] < 1 || regs[2] > 12) {
                    alert("Nilai tidak valid untuk bulan: " + regs[2]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai tahun antara 2000 s.d sekarang
                if (regs[3] < ((new Date()).getFullYear()) - 1 || regs[3] > ((new Date()).getFullYear()) + 1) {
                    alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + (((new Date()).getFullYear()) -
                        1) + " dan " + (((new Date()).getFullYear()) + 1));
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }

            } else {

                syams_validation(id, 'Format Tanggal tidak sesuai');
                return false;

            }
        }

    }

    function showRuangRawat(data, id_pendaftaran, id_layanan_pendaftaran, bed) {

        $('#table-ruang-rawat tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                function formatTanggalPemantauan(waktu) {

                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                }

                function tanggalAja(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var el = waktu.split(' ');
                        var elem = el[0].split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                let selOp = '';

                if (accountGroup === 'Admin') {

                    // selOp = '<td width="2%" align="center">' + ((v.created_date !== null) ? formatTanggalPemantauan(
                    //     v.created_date) : '') + '</td><td width="2%" align="center">' + v.nama_ruang + '</td>';
                    selOp = `<td width="2%" align="center">${((v.created_date !== null) ? formatTanggalPemantauan(v.created_date) : '')}</td><td width="2%" align="center">${v.nama_ruang || v.ruang_rawat_text}</td>`;
                    selPetugas = '<td width="5%" align="center">' + ((v.nama_petugas !== null) ? v.nama_petugas :
                        '') + '</td>';

                } else {

                    selOp = '<td width="2%" align="center">' + v.nama_ruang + '</td>';
                    selPetugas = '';
                }

                let tanggal_ruang_mulai = tanggalAja(v.tanggal_mulai);
                let tanggal_ruang_selesai = tanggalAja(v.tanggal_selesai);


                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        ${selOp}
                        <td width="5%" align="center">${tanggal_ruang_mulai}</td>
                        <td width="5%" align="center">${tanggal_ruang_selesai}</td>
                        ${selPetugas}
                        <td width="3%" align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusRuangRawat(this, ${v.id})"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                `;
                $('#table-ruang-rawat tbody').append(html);
            })
        }

    }

    function showPemasanganAlat(data) {

        $('#table-pemasangan-alat tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                function formatTanggalPemasangan(waktu) {

                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                }

                function tanggalPasang(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var el = waktu.split(' ');
                        var elem = el[0].split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                let selOp = '';
                let selPetugas = '';

                if (accountGroup === 'Admin') {

                    selOp = '<td width="5%" align="center">' + ((v.created_date !== null) ? formatTanggalPemasangan(
                        v.created_date) : '') + '</td>';
                    selPetugas = '<td width="5%" align="center">' + ((v.nama_petugas !== null) ? v.nama_petugas :
                        '') + '</td>';

                } else {

                    selOp = '';
                    selPetugas = '';
                }

                let sirs_tanggal_pasang = ((v.sirs_tanggal_pasang !== null) ? tanggalPasang(v.sirs_tanggal_pasang) :
                    '');
                let sirs_tanggal_lepas = ((v.sirs_tanggal_lepas !== null) ? tanggalPasang(v.sirs_tanggal_lepas) :
                    '');


                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        ${selOp}
                        <td width="5%" align="center">${v.tindakan}</td>
                        <td width="5%" align="center">${sirs_tanggal_pasang}</td>
                        <td width="5%" align="center">${v.sirs_lokasi}</td>
                        <td width="5%" align="center">${v.sirs_alasan_pasang}</td>
                        <td width="5%" align="center">${((v.perawat_pasang !== null) ? v.perawat_pasang : '')}</td>
                        <td width="5%" align="center">${sirs_tanggal_lepas}</td>
                        <td width="5%" align="center">${(v.sirs_alasan_lepas == null ? '-' : v.sirs_alasan_lepas )}</td>
                        <td width="5%" align="center">${((v.perawat_lepas !== null) ? v.perawat_lepas : '')}</td>
                        ${selPetugas}
                        <td width="3%" align="center">
							<button type="button" class="btn btn-secondary btn-xs" onclick="hapusDataPasang(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>
							<button type="button" class="btn btn-secondary btn-xs" onclick="editDataPasang(${v.id})"><i class="fas fa-edit"></i></button>
						</td>
                    </tr>
                `;
                $('#table-pemasangan-alat tbody').append(html);
            })
        }

    }

    function showPemakaianAntibiotika(data) {

        $('#table-pemakaian-antibiotika tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                function formatWaktuEntriAntibiotika(waktu) {

                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                }

                function tanggalAntibiotika(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var el = waktu.split(' ');
                        var elem = el[0].split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                let selOp = '';
                let selPetugas = '';

                if (accountGroup === 'Admin') {

                    selOp = '<td width="5%" align="center">' + ((v.created_date !== null) ?
                        formatWaktuEntriAntibiotika(v.created_date) : '') + '</td>';
                    selPetugas = '<td width="5%" align="center">' + ((v.nama_petugas !== null) ? v.nama_petugas :
                        '') + '</td>';

                } else {

                    selOp = '';
                    selPetugas = '';
                }

                let sirs_tanggal_pemberian = ((v.sirs_tanggal_pemberian !== null) ? tanggalAntibiotika(v
                    .sirs_tanggal_pemberian) : '');
                let sirs_tanggal_selesai = ((v.sirs_tanggal_selesai !== null) ? tanggalAntibiotika(v
                    .sirs_tanggal_selesai) : '');

                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        ${selOp}
                        <td width="5%" align="center">${v.nama}</td>
                        <td width="5%" align="center">${v.sirs_dosis_antibiotik}</td>
                        <td width="5%" align="center">${sirs_tanggal_pemberian}</td>
                        <td width="5%" align="center">${sirs_tanggal_selesai}</td>
                        <td width="5%" align="center">${((v.sirs_teknik_antibiotik !== null) ? v.sirs_teknik_antibiotik : '')}</td>
                        ${selPetugas}
                        <td width="3%" align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusDataAntibiotik(this, ${v.id})"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                `;
                $('#table-pemakaian-antibiotika tbody').append(html);
            })
        }

    }

    function tambahRuangRawat() {
        if ($('#sirs-ruang-rawat').val() === '') {
            syams_validation('#sirs-ruang-rawat', 'Ruang tempat di rawat harus diisi.');
            return false;
        }

        if ($('#sirs-tanggal-mulai').val() === '') {
            syams_validation('#sirs-tanggal-mulai', 'Tanggal mulai rawat harus diisi.');
            return false;
        }

        // if ($('#sirs-tanggal-selesai').val() === '') {
        //     syams_validation('#sirs-tanggal-selesai', 'Tanggal selesai rawat harus diisi.');
        //     return false;
        // }

        let html = '';
        let number = $('.number-ruang-rawat').length;
        let tanggal_mulai = $('#sirs-tanggal-mulai').val();
        let tanggal_selesai = $('#sirs-tanggal-selesai').val();
        // let kamar = $('#s2id_sirs-ruang-rawat a .select2c-chosen').html();
        let kamar = $('#sirs-ruang-rawat-text').val();
        let id_kamar = $('#sirs-ruang-rawat').val();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        let cekTanggalMulai = cekDateTime('#sirs-tanggal-mulai', tanggal_mulai);
        // let cekTanggalSelesai = cekDateTime('#sirs-tanggal-selesai', tanggal_selesai);

        if (cekTanggalMulai === false) {

            syams_validation('#sirs-tanggal-mulai', 'Format Tanggal tidak sesuai(dd/mm/yyyy)');
            return false;

        }

        // if (cekTanggalSelesai === false) {

        //     syams_validation('#sirs-tanggal-selesai', 'Format Tanggal tidak sesuai(dd/mm/yyyy)');
        //     return false;

        // }

        syams_validation_remove('#sirs-ruang-rawat');
        syams_validation_remove('#sirs-tanggal-mulai');
        // syams_validation_remove('#sirs-tanggal-selesai');

        let selOp = '';

        if (accountGroup === 'Admin') {

            // selOp =
            //     '<td width="1%" align="center"></td><td width="5%"><input type="hidden" name="sirs_ruang_rawat[]" value="' +
            //     id_kamar + '">' + kamar + '</td>';
            selOp =
                '<td width="1%" align="center"></td><td width="5%"><input type="hidden" name="sirs_ruang_rawat[]" value="' +
                kamar + '">' + kamar + '</td>';

        } else {

            selOp = '<td width="5%"><input type="hidden" name="sirs_ruang_rawat[]" value="' + id_kamar + '">' + kamar +
                '</td>';
        }


        html = /* html */ `
            <tr>
                <td width="1%" class="number-ruang-rawat" align="center">${++number}</td>
                ${selOp}
                <td width="1%" align="center"><input type="hidden" name="sirs_tanggal_mulai[]" value="${tanggal_mulai}">${tanggal_mulai}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_tanggal_selesai[]" value="${tanggal_selesai}">${tanggal_selesai}</td>
                <td width="5%" align="center"><input type="hidden" name="sirs_petugas[]" value="<?= $this->session->userdata("id_translucent") ?>"></td>
                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#table-ruang-rawat tbody').append(html);


    }

    function tambahPemasanganAlat() {
        if ($('#sirs-tindakan').val() === '') {
            syams_validation('#sirs-tindakan', 'Tindakan harus diisi.');
            return false;
        }

        if ($('#sirs-lokasi').val() === '') {
            syams_validation('#sirs-lokasi', 'Lokasi wajib diisi.');
            return false;
        }

        if ($('#sirs-tanggal-pasang').val() === '') {
            syams_validation('#sirs-tanggal-pasang', 'Tanggal Pasang wajib diisi.');
            return false;
        }

        if ($('#sirs-alasan-pasang').val() === '') {
            syams_validation('#sirs-alasan-pasang', 'Alasan Pasang wajib diisi.');
            return false;
        }

        if ($('#sirs-perawat-pasang').val() === '') {
            syams_validation('#sirs-perawat-pasang', 'Nama Pemasang Alat wajib diisi.');
            return false;
        }


        let html = '';
        let number = $('.number-pemasangan-alat').length;
        let sirs_tindakan = $('#s2id_sirs-tindakan a .select2c-chosen').html();
        let id_sirs_tindakan = $('#sirs-tindakan').val();
        let lokasi = $('#sirs-lokasi').val();
        let tanggal_pasang = $('#sirs-tanggal-pasang').val();
        let alasan_pasang = $('#sirs-alasan-pasang').val();
        let tanggal_lepas = $('#sirs-tanggal-lepas').val();
        let alasan_lepas = $('#sirs-alasan-lepas').val();
        let sirs_perawat_pasang = $('#s2id_sirs-perawat-pasang a .select2c-chosen').html();
        let id_sirs_perawat_pasang = $('#sirs-perawat-pasang').val();
        let sirs_perawat_lepas = $('#s2id_sirs-perawat-lepas a .select2c-chosen').html();
        let id_sirs_perawat_lepas = $('#sirs-perawat-lepas').val();


        let cekTanggalPasang = cekDateTime('#sirs-tanggal-pasang', tanggal_pasang);
        let cekTanggalLepas = cekDateTime('#sirs-tanggal-lepas', tanggal_lepas);

        if (cekTanggalPasang === false) {

            syams_validation('#sirs-tanggal-pasang', 'Format Tanggal tidak sesuai(dd/mm/yyyy)');
            return false;

        }

        if (cekTanggalLepas === false) {

            syams_validation('#sirs-tanggal-lepas', 'Format Tanggal tidak sesuai(dd/mm/yyyy)');
            return false;

        }

        syams_validation_remove('#sirs-tanggal-pasang');
        syams_validation_remove('#sirs-tanggal-lepas');


        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        let selOp = '';

        if (accountGroup === 'Admin') {

            selOp =
                '<td width="1%" align="center"></td><td width="5%"><input type="hidden" name="sirs_tindakan[]" value="' +
                id_sirs_tindakan + '">' + sirs_tindakan + '</td>';

        } else {

            selOp = '<td width="5%"><input type="hidden" name="sirs_tindakan[]" value="' + id_sirs_tindakan + '">' +
                sirs_tindakan + '</td>';
        }


        html = /* html */ `
            <tr>
                <td width="1%" class="number-pemasangan-alat" align="center">${++number}</td>
                ${selOp}
                <td width="1%" align="center"><input type="hidden" name="sirs_tanggal_pasang[]" value="${tanggal_pasang}">${tanggal_pasang}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_lokasi[]" value="${lokasi}">${lokasi}</td>
                <td width="4%" align="center"><input type="hidden" name="sirs_alasan_pasang[]" value="${alasan_pasang}">${alasan_pasang}</td>
                <td width="2%" align="center"><input type="hidden" name="sirs_perawat_pasang[]" value="${id_sirs_perawat_pasang}">${sirs_perawat_pasang}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_tanggal_lepas[]" value="${tanggal_lepas}">${tanggal_lepas}</td>
                <td width="4%" align="center"><input type="hidden" name="sirs_alasan_lepas[]" value="${alasan_lepas}">${alasan_lepas}</td>
                <td width="2%" align="center"><input type="hidden" name="sirs_perawat_lepas[]" value="${id_sirs_perawat_lepas}">${sirs_perawat_lepas}</td>
                <td width="4%" align="center"><input type="hidden" name="sirs_pemasang_alat[]" value="<?= $this->session->userdata("id_translucent") ?>"></td>
                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#table-pemasangan-alat tbody').append(html);


    }

    function tambahPemakaianAntibiotik() {

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === undefined && $(
                '#sirs-nama-antibiotika').val() !== '') {

            syams_validation('#sirs-antibiotika-msg', 'Pilih Ada pada Pemakaian Antibiotika.');
            return false;

        }

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === 'ada' && $('#sirs-tanggal-antibiotik')
            .val() === '') {
            syams_validation('#sirs-tanggal-antibiotik', 'Tanggal Pemberian Antibiotik harus diisi.');
            return false;
        }

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === 'ada' && $('#sirs-nama-antibiotika')
            .val() === '') {
            syams_validation('#sirs-nama-antibiotika', 'Nama Antibiotik harus diisi.');
            syams_validation_remove('#sirs-tanggal-antibiotik');
            syams_validation_remove('#sirs-dosis-antibiotika');
            syams_validation_remove('#sirs-teknik-pemberian');
            return false;
        }

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === 'ada' && $('#sirs-dosis-antibiotika')
            .val() === '') {
            syams_validation('#sirs-dosis-antibiotika', 'Dosis Antibiotik harus diisi.');
            syams_validation_remove('#sirs-tanggal-antibiotik');
            syams_validation_remove('#sirs-nama-antibiotika');
            syams_validation_remove('#sirs-teknik-pemberian');
            return false;
        }

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === 'ada' && $(
                'input[type=radio][name=sirs_teknik_pemberian]:checked').val() === undefined) {
            syams_validation('#sirs-teknik-pemberian', 'Teknik Pemberian Antibiotik harus diisi.');
            syams_validation_remove('#sirs-tanggal-antibiotik');
            syams_validation_remove('#sirs-nama-antibiotika');
            syams_validation_remove('#sirs-dosis-antibiotika');
            return false;
        }

        if ($('input[type=radio][name=sirs_pemakaian_antibiotika]:checked').val() === 'tidak ada') {
            syams_validation('#sirs-antibiotika-msg', 'Pilih Ada pada Pemakaian Antibiotika.');
            return false;
        }

        syams_validation_remove('#sirs-tanggal-antibiotik');
        syams_validation_remove('#sirs-nama-antibiotika');
        syams_validation_remove('#sirs-dosis-antibiotika');
        syams_validation_remove('#sirs-teknik-pemberian');
        syams_validation_remove('#sirs-antibiotika-msg');

        let html = '';
        let number = $('.no-pakai-antibiotik').length;
        let tanggal_pemberian = $('#sirs-tanggal-antibiotik').val();
        let tanggal_selesai = $('#sirs-antibiotik-selesai').val();
        let antibiotika = $('#s2id_sirs-nama-antibiotika a .select2c-chosen').html();
        let id_antibiotika = $('#sirs-nama-antibiotika').val();
        let dosis = $('#sirs-dosis-antibiotika').val();
        let teknik_pemberian = $('input[type=radio][name=sirs_teknik_pemberian]:checked').val();
        let selAnti = '';
        let selAntiPetugas = '';

        if (teknik_pemberian !== undefined) {

            view_teknik_pemberian = teknik_pemberian;

        } else {

            view_teknik_pemberian = '-';

        }

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if (accountGroup === 'Admin') {

            selAnti =
                '<td width="1%" align="center"></td><td width="10%" align="center"><input type="hidden" name="sirs_nama_antibiotika[]" value="' +
                id_antibiotika + '">' + antibiotika + '</td>';
            selAntiPetugas =
                '<td width="5%"><input type="hidden" name="petugas_antibiotik[]" value="<?= $this->session->userdata("id_translucent") ?>"></td>';

        } else {

            selAnti =
                '<td width="10%"><input type="hidden" name="petugas_antibiotik[]" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="sirs_nama_antibiotika[]" value="' +
                id_antibiotika + '">' + antibiotika + '</td>';
            selAntiPetugas = '';

        }


        function tanggalAntibiotik(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0];
        }

        let kirim_tanggal_selesaiantibiotik = '';
        let kirim_tanggal_beriantibiotik = tanggalAntibiotik(tanggal_pemberian);

        if (tanggal_selesai !== '') {

            kirim_tanggal_selesaiantibiotik = tanggalAntibiotik(tanggal_selesai);

        } else {

            kirim_tanggal_selesaiantibiotik = '';

        }

        html = /* html */ `
            <tr>
                <td width="1%" class="no-pakai-antibiotik" align="center">${++number}</td>
                ${selAnti}
                <td width="1%" align="center"><input type="hidden" name="dosis_antibiotik[]" value="${dosis}">${dosis}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_tanggal_pemberian[]" value="${kirim_tanggal_beriantibiotik}">${tanggal_pemberian}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_antibiotik_tanggal_selesai[]" value="${kirim_tanggal_selesaiantibiotik}">${tanggal_selesai}</td>
                <td width="1%" align="center"><input type="hidden" name="sirs_teknik_pemberian_antibiotik[]" value="${teknik_pemberian}">${view_teknik_pemberian}</td>
                ${selAntiPetugas}
                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#table-pemakaian-antibiotika tbody').append(html);


    }

    function hapusRuangRawat(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_ruang_rawat") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Ruang Rawat', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function hapusDataPasang(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_data_pasang") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Data Pasang', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function editDataPasang(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/show_edit_pasang_alat") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    $('#sirs-edit-id').val(id);
                    $('#s2id_sirs-tindakan-edit a .select2c-chosen').html(data.data.tindakan);
                    $('#sirs-tindakan-edit').val(data.data.sirs_tindakan);
                    
                    $('#sirs-tanggal-pasang-edit').val(data.data.sirs_tanggal_pasang ? datefmysql(data.data.sirs_tanggal_pasang) : '');
                    $('#sirs-alasan-pasang-edit').val(data.data.sirs_alasan_pasang);
                    $('#sirs-lokasi-edit').val(data.data.sirs_lokasi);
                    $('#sirs-tanggal-lepas-edit').val(data.data.sirs_tanggal_lepas ? datefmysql(data.data.sirs_tanggal_lepas) : '');
                    $('#sirs-alasan-lepas-edit').val(data.data.sirs_alasan_lepas);

                    $('#s2id_sirs-perawat-pasang-edit a .select2c-chosen').html(data.data.perawat_pasang);
                    $('#sirs-perawat-pasang-edit').val(data.data.sirs_perawat_pasang);

                    $('#modal_edit_pemasangan_alat').modal('show');
                }
            },
            error: function(e) {
                messageDeleteFailed();
            }
        });

		$('#sirs-tindakan-edit').select2c({
			ajax: {
				url: "<?= base_url('intensive_care/api/intensive_care/tindakan_icare') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
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
				var markup = '<b>' + data.layanan + '</b> <br/>' + data.layanan_parent;

				return markup;
			},
			formatSelection: function(data) {
				return data.layanan
			}
		});

		$('#sirs-perawat-pasang-edit').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#c_profesi').val(),
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

        $('#sirs-perawat-lepas-edit').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#sirs-tanggal-pasang-edit, #sirs-tanggal-lepas-edit').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });
    }

    function simpanEditDataPasang(){
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_edit_pasang_alat") ?>',
            data: $('#form-edit-pemasangan-alat').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    $('#modal_edit_pemasangan_alat').modal('hide');
                    messageEditSuccess();

                    if (data.data !== null) {
                        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
                        $('#table-pemasangan-alat tbody').empty();

                        $.each(data.data, function(i, v) {
                            function formatTanggalPemasangan(waktu) {

                                var el = waktu.split(' ');
                                var elem_tgl = el[0].split('-');
                                var elem_waktu = el[1].split(':');
                                var tahun = elem_tgl[0];
                                var bulan = elem_tgl[1];
                                var hari = elem_tgl[2];
                                return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                            }

                            function tanggalPasang(waktu) {
                                if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                                    var el = waktu.split(' ');
                                    var elem = el[0].split('-');
                                    var tahun = elem[0];
                                    var bulan = elem[1];
                                    var hari = elem[2];
                                    return hari + '/' + bulan + '/' + tahun;
                                } else {
                                    return '';
                                }

                            }

                            let selOp = '';
                            let selPetugas = '';

                            if (accountGroup === 'Admin') {

                                selOp = '<td width="5%" align="center">' + ((v.created_date !== null) ? formatTanggalPemasangan(
                                    v.created_date) : '') + '</td>';
                                selPetugas = '<td width="5%" align="center">' + ((v.nama_petugas !== null) ? v.nama_petugas :
                                    '') + '</td>';

                            } else {

                                selOp = '';
                                selPetugas = '';
                            }

                            let sirs_tanggal_pasang = ((v.sirs_tanggal_pasang !== null) ? tanggalPasang(v.sirs_tanggal_pasang) :
                                '');
                            let sirs_tanggal_lepas = ((v.sirs_tanggal_lepas !== null) ? tanggalPasang(v.sirs_tanggal_lepas) :
                                '');


                            let html = /* html */ `
                                <tr>
                                    <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                                    ${selOp}
                                    <td width="5%" align="center">${v.tindakan}</td>
                                    <td width="5%" align="center">${sirs_tanggal_pasang}</td>
                                    <td width="5%" align="center">${v.sirs_lokasi}</td>
                                    <td width="5%" align="center">${v.sirs_alasan_pasang}</td>
                                    <td width="5%" align="center">${((v.perawat_pasang !== null) ? v.perawat_pasang : '')}</td>
                                    <td width="5%" align="center">${sirs_tanggal_lepas}</td>
                                    <td width="5%" align="center">${(v.sirs_alasan_lepas == null ? '-' : v.sirs_alasan_lepas )}</td>
                                    <td width="5%" align="center">${((v.perawat_lepas !== null) ? v.perawat_lepas : '')}</td>
                                    ${selPetugas}
                                    <td width="3%" align="center">
                                        <button type="button" class="btn btn-secondary btn-xs" onclick="hapusDataPasang(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>
                                        <button type="button" class="btn btn-secondary btn-xs" onclick="editDataPasang(${v.id})"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            `;

                            $('#table-pemasangan-alat tbody').append(html);
                        })
                    }
                }
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusDataAntibiotik(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_data_antibiotik") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Data Pasang', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    
    function resetFormEntriKeperawatan() {
        $('#form_entri_keperawatan')[0].reset();

        $('#perawat_medis, #verifikasi_dokter, #perawat-terapi, #surveilans-perawat, #surveilans-ipcn').select2c('readonly',
            false);
        $('#sirs-diagnosis-masuk, #ek_nama_dokter, #sirs-ruang-rawat, #sirs-tindakan, #sirs-perawat-pasang, #sirs-perawat-lepas')
            .val('');
        $('#ek_jam_pemberian').val('');
        $('#ek_jam_pemberian_satu').val('');
        $('#ek_jam_pemberian_dua').val('');
        $('#ek_jam_pemberian_tiga').val('');
        $('#ek_jam_pemberian_empat').val('');
        $('#ek_jam_pemberian_lima').val('');
        $('#ek-keterangan-catatan').val('');
        $('#ek-jam-pagi').val('');
        $('#ek-jam-sore').val('');
        $('#ek-jam-malam').val('');

        $('#ek_ttd_perawat, #surveilans-ttd-petugas').show();
        $('#plsp-ttd-petugas').show();
        $('#ek_ttd_verifikasi_dokter_dpjp').show();
        $('#ek_ttd_perawat_verified, #surveilans_ttd_petugas_verified, #surveilans_ttd_ipcnlink_verified').hide();
        $('#plsp_ttd_petugas_verified').hide();
        $('#ek_ttd_verifikasi_dokter_dpjp_verified').hide();

        $('#ek_ttd_pasien').show();
        $('#ek_ttd_pasien_verified').hide();
        $('#ek-hamdalah-malam, #ek-paraf-malam, #ek-cek-malam, #ek-bismillah-malam, #ek-hamdalah-sore, #ek-paraf-sore, #ek-cek-sore, #ek-bismillah-sore, #ek-hamdalah-pagi, #ek-paraf-pagi, #ek-cek-pagi, #ek-bismillah-pagi, #ek-waktu-pagi, #ek-waktu-siang, #ek-waktu-malam, #ek-waktu-pagi-dua, #ek-waktu-siang-dua, #ek-waktu-malam-dua, #ek-waktu-pagi-tiga, #ek-waktu-siang-tiga, #ek-waktu-malam-tiga, #ek-tambahan-status, #ek-tambahan-status-dua, #ek-tambahan-status-tiga, #hbsag-positif, #hbsag-negatif, #hbsag-periksa, #antihcv-positif, #antihcv-negatif, #antihcv-periksa, #antihiv-positif, #antihiv-negatif, #antihiv-periksa, #t-op-ortopedi, #t-op-digestive, #t-op-plastik, #t-op-tumor, #t-op-urologi, #t-op-tht, #t-op-anak, #t-op-gilut, #t-op-vaskuler, #t-op-saraf, #t-op-mata, #t-op-thorax, #t-op-obgyn, #t-op-lain, #sirs-drain-ya, #sirs-drain-tidak, #sirs-jenis-operasi-bersih, #sirs-jenis-operasi-bersihcemar, #sirs-jenis-operasi-cemar, #sirs-jenis-operasi-kotor, #sirs-tindakan-operasi-cito, #sirs-tindakan-operasi-elektif, #sirs-antibiotik, #sirs-waktu-preoperasi, #sirs-waktu-selama, #sirs-waktu-sesudah, #sirs-drain-satu-ya, #sirs-drain-satu-tidak, #sirs-jenis-operasi-bersih-satu, #sirs-jenis-operasi-bersihcemar-satu, #sirs-jenis-operasi-cemar-satu, #sirs-jenis-operasi-kotor-satu, #sirs-tindakan-operasi-cito-satu, #sirs-tindakan-operasi-elektif-satu, #sirs-antibiotik-satu')
            .prop('checked', false);

        $('#s2id_ek-masalah-keperawatan a .select2c-chosen').empty();
        $('#s2id_ek-tindakan-keperawatan a .select2c-chosen').empty();
        $('#s2id_ek-rencana-tindakan a .select2c-chosen').empty();
        $('#s2id_ek-catatan-tindakan a .select2c-chosen').empty();
        $('#s2id_ek-perawat-tindakan-pagi a .select2c-chosen').empty();
        $('#s2id_sirs-ruang-rawat a .select2c-chosen, #s2id_sirs-tindakan a .select2c-chosen, #s2id_sirs-perawat-pasang a .select2c-chosen, #s2id_sirs-perawat-lepas a .select2c-chosen')
            .empty();
        $('#ek-perawat-tindakan-malam, #ek-perawat-tindakan-sore, #ek-perawat-tindakan-pagi, #ek-catatan-tindakan, #ek-tanggal-catatan-tindakan, #ek-tindakan-keperawatan, #ek-masalah-keperawatan, #ek-tanggal-mulai, #ek-tanggal-selesai, #verifikasi_penerima, #ek_tanggal_ttd_perawat, #ek_tanggal_verifikasi_dokter, #ek_tanggal_verifikasi_penerima, #pundpn-tanggal-pengkajian, #plsp-tanggal-ttd-petugas, #ek-keterangan-tambahan, #ek-rencana-tindakan, #ek-tanggal-tindakan-satu, #ek-tanggal-tindakan-dua, #ek-tanggal-tindakan-tiga, #surveilans-tanggal-ttd-perawat, #surveilans-tanggal-ttd-ipcn, #sirs-tanggal-mulai, #sirs-tanggal-selesai, #sirs-tanggal-pasang, #sirs-alasan-pasang, #sirs-lokasi, #sirs-tanggal-lepas, #sirs-alasan-lepas, #sm-top-lain, #sirs-tanggal-diagnosis, #sirs-antibiotik-profilaksis, #sirs-tanggal-diagnosis-satu, #sirs-antibiotik-profilaksis-satu')
            .val('');

        $('#surveilans-tanggal-ttd-perawat, #surveilans-tanggal-ttd-ipcn, #verifikasi_penerima, #ek_tanggal_ttd_perawat, #ek_tanggal_verifikasi_dokter, #ek_tanggal_verifikasi_penerima, #plsp-tanggal-ttd-petugas')
            .attr('disabled', false);

        $('#ek-cek-tindakan-manual').prop('checked', false);
        $('#ek-catatan-tindakan-manual').val('');
        $('#catatan-tindakan').removeAttr('hidden');
        if ($('#ek-cek-tindakan-manual').prop('checked')) {
            $('#tindakan-manual').removeAttr('hidden');
            $('#catatan-tindakan').attr('hidden', true);
        } else {
            $('#catatan-tindakan').removeAttr('hidden');
            $('#tindakan-manual').attr('hidden', true);
        }

        // Pengkajian Ulang Resiko Jatuh Pasien Anak
        $('#s2id_purjpa-perawat a .select2c-chosen').empty();
        $('#purjpa-tanggal-pengkajian').val('');
        $('#purjpa-jumlah-skor').val('');
        $('#purjpa-perawat').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-purjpa').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // Pengkajian Ulang Resiko Jatuh Pasien lansia
        $('#s2id_purjpl-perawat a .select2c-chosen').empty();
        $('#purjpl-tanggal-pengkajian').val('');
        $('#purjpl-jumlah-skor').val('');
        $('#purjpl-perawat').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#purjpl-riwayat-jatuh, #purjpl-pasien-datang-karena-jatuh, #purjpl-jatuh-2-bulan-terakhir, #purjpl-mental, #purjpl-pasien-delirium, #purjpl-pasien-disorientasi, #purjpl-pasien-agitasi, #purjpl-penglihatan, #purjpl-pasien-kacamata, #purjpl-pasien-buram, #purjpl-pasien-glaukoma, #purjpl-berkemih, #purjpl-pasien-berkemih, #purjpl-transfer, #purjpl-mandiri, #purjpl-sedikit-bantuan, #purjpl-bantuan-nyata, #purjpl-bantuan-total, #purjpl-mobilitas, #purjpl-m-mandiri, #purjpl-m-sedikit-bantuan, #purjpl-kursi-roda, #purjpl-imobilisasi')
                .val('');
            $('#form-purjpl').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // Upaya Pencegahan Resiko Jatuh Pasien lansia
        $('#s2id_uprjpl-perawat-p a .select2c-chosen').empty();
        $('#s2id_uprjpl-perawat-s a .select2c-chosen').empty();
        $('#s2id_uprjpl-perawat-m a .select2c-chosen').empty();
        $('#uprjpl-tanggal-pengkajian').val('');
        $('#uprjpl-perawat-p').val('');
        $('#uprjpl-perawat-s').val('');
        $('#uprjpl-perawat-m').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-uprjpl').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)


        // UPRJPN
        // Upaya Pencegahan Resiko Jatuh Pada Neonatus
        $('#s2id_perawat-1 a .select2c-chosen').empty();
        $('#s2id_perawat-2 a .select2c-chosen').empty();
        $('#s2id_perawat-3 a .select2c-chosen').empty();
        $('#uprjpn-tanggal-pengkajian').val('');
        $('#perawat-1').val('');
        $('#perawat-2').val('');
        $('#perawat-3').val('');

        // For non-blocking code (Asyncronous) UPRJPN
        setTimeout(() => {
            $('#form-uprjpn').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)




        // CPDPO
        $('#s2id_nama-obat-rpo a .select2c-chosen').empty();
        $('#s2id_dokter-1-rpo a .select2c-chosen').empty();
        $('#s2id_dokter-2-rpo a .select2c-chosen').empty();
        $('#tanggal-rpo').val('');
        $('#tangggal-rpo').val('');        
        $('#nama-obat-rpo').val('');
        $('#dokter-1-rpo').val('');
        $('#dokter-2-rpo').val('');
        $('#alergii-1, #alergii-2')
            .prop('checked', false);
        // For non-blocking code (Asyncronous) 
        setTimeout(() => {
            $('#rute-rpo, #dosis-rpo, #frekuensi-rpo, #eso-rpo, #r-farmasi-rpo, #alergii-3')
                .val('');
            $('#form-rpo').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
        // Catatan Pemberian Dan Pemantauan Obat 

        // ILLIS
        $('#s2id_nama-obat-rpoo a .select2c-chosen').empty();
        $('#s2id_dokter-1-rpoo a .select2c-chosen').empty();
        $('#s2id_dokter-2-rpoo a .select2c-chosen').empty();
        $('#tanggal-rpoo').val('');
        $('#tangggal-rpoo').val('');        
        $('#nama-obat-rpoo').val('');
        $('#dokter-1-rpoo').val('');
        $('#dokter-2-rpoo').val('');
        $('#alergiii-1, #alergiii-2')
            .prop('checked', false);
        // For non-blocking code (Asyncronous) 
        setTimeout(() => {
            $('#rute-rpoo, #dosis-rpoo, #frekuensi-rpoo, #eso-rpoo, #r-farmasi-rpoo, #alergiii-3')
                .val('');
            $('#form-rpo-infus').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // WPT 
        $('#s2id_perawat-1-wpt a .select2c-chosen').empty();
        $('#tanggal-wpt').val('');      
        $('#perawat-1-wpt').val('');
        setTimeout(() => {
            $('#hari-wpt, #jam-wpt, #pasien-keluarga-wpt')
                .val('');
            $('#form-wpt').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

     
        // IWPT
        $('#s2id_perawat-2-wptt a .select2c-chosen').empty();
        $('#tanggal-wptt').val('');        
        $('#perawat-2-wptt').val('');
        setTimeout(() => {
            $('#hari-wptt, #jam-wptt, #pasien-keluarga-wptt')
                .val('');
            $('#form-wpt-infus').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)


        // MP-A
        // $('#tabel-mg .body-table').empty();
        // $('#tanggal-mp, #bb-mp, #tb-mp').val('');
        // setTimeout(() => {
        //     $('#form-monitoring-pasien').find('input').each(function() {
        //         if ($(this).is(':checked')) {
        //             $(this).prop('checked', false);
        //         }
        //     })
        // }, 100)


        // MPP-C
        // $('#s2id_perawat-mpp a .select2c-chosen').empty();
        // $('#s2id_perawat-mpp-edit a .select2c-chosen').empty();
        // $('#tgl-mpp').val('');
        // $('#tgl-mpp-edit').val('');

        // setTimeout(() => {
        //     $('#oral-mpp, #ngt-mpp, #paranteral-mpp, #paranteral-mppp, #produk-mpp, #input-mpp, #urin-mpp, #bab-mpp, #gastrik-mpp, #wsd-mpp, #iwl-mpp, #output-mpp,#tdarah-mpp, #saturasi-mppp, #toksigen-mpp, #skesadaran-mpp, #kategori-mpp, #pengawasan-mpp, #diit-mpp, #jam-mpp, #blance-cairan-mpp')
        //         .val('');
        //     $('#form-mpp').find('input').each(function() {
        //         if ($(this).is(':checked')) {
        //             $(this).prop('checked', false);
        //         }
        //     })
        // }, 100)
        // MONITORING PASIEN 
   


        // PKN SLET
        // Pengawasan Khusus Neonatus
        $('#s2id_obat-pkn a .select2c-chosen').empty();
        $('#s2id_obat-pkn-edit a .select2c-chosen').empty();
        $('#s2id_perawat-pkn a .select2c-chosen').empty();
        $('#s2id_perawat-pkn-edit a .select2c-chosen').empty();
        $('#tgl-pkn').val('');
        $('#tgl-pkn-edit').val('');

        setTimeout(() => {
            $('#bb-pkn, #lp-pkn, #tgl-pkn, #jam-pkn, #kesadaran-pkn, #pasien-pkn, #inkubator-pkn, #nadi-pkn, #rr-pkn, #modus-pkn, #peep-pkn, #buble-pkn,#fio2-pkn, #spo2-pkn, #flow-pkn, #air-pkn, #suhu-pkn, #line1-pkn, #line2-pkn, #plebitis-pkn, #oral-pkn, #jml-pkn, #muntah-pkn, #residu-pkn, #bak-pkn, #bab-pkn, #foto-therapy-pkn')
                .val('');
            $('#form-pkn').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
        // Pengawasan Khusus Neonatus



        // Upaya Pencegahan Resiko Jatuh Pasien anak
        $('#s2id_uprjpd-perawat-p a .select2c-chosen').empty();
        $('#s2id_uprjpd-perawat-s a .select2c-chosen').empty();
        $('#s2id_uprjpd-perawat-m a .select2c-chosen').empty();
        $('#uprjpd-tanggal-pengkajian').val('');
        $('#uprjpd-perawat-p').val('');
        $('#uprjpd-perawat-s').val('');
        $('#uprjpd-perawat-m').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-uprjpd').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // Upaya Pencegahan Resiko Jatuh Pasien anak
        $('#s2id_uprjpa-perawat-p a .select2c-chosen').empty();
        $('#s2id_uprjpa-perawat-s a .select2c-chosen').empty();
        $('#s2id_uprjpa-perawat-m a .select2c-chosen').empty();
        $('#uprjpa-tanggal-pengkajian').val('');
        $('#uprjpa-perawat-p').val('');
        $('#uprjpa-perawat-s').val('');
        $('#uprjpa-perawat-m').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-uprjpa').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // surgical ceklis reset form
        $('#ssc-dokter-operator,#ssc-dokter-anestesi,#ssc-premedikasi-obat,#ssc-antibiotik-obat,#ssc-perawat-sign-in,#ssc-perawat-time-out,#ssc-perawat-sign-out,#ssc-dokter-anestesi-sign-in,#ssc-dokter-anestesi-time-out,#ssc-dokter-anestesi-sign-out')
            .val('');

        $('#s2id_ssc-dokter-operator a .select2c-chosen,#s2id_ssc-dokter-anestesi a .select2c-chosen,#s2id_ssc-premedikasi-obat a .select2c-chosen,#s2id_ssc-antibiotik-obat a .select2c-chosen,#s2id_ssc-perawat-sign-in a .select2c-chosen,#s2id_ssc-perawat-time-out a .select2c-chosen,#s2id_ssc-perawat-sign-out a .select2c-chosen,#s2id_ssc-dokter-anestesi-sign-in a .select2c-chosen,#s2id_ssc-dokter-anestesi-time-out a .select2c-chosen,#s2id_ssc-dokter-anestesi-sign-out a .select2c-chosen')
            .empty();

        $('#ssc-alasan,#ssc-nama-tindakan,#ssc-tekanan-darah,#ssc-nadi,#ssc-pernafasan,#ssc-tanggal-obat,#ssc-penjelasan-keluarga-ket,#ssc-saturasi,#ssc-suhu,#ssc-obat-operasi-ya-alasan,#ssc-obat-operasi-tidak-alasan,#ssc-alergi-ket,#ssc-antibiotik-dosis,#ssc-kesadaran-sign-out,#ssc-jam-antibiotik-obat,#ssc-tekanan-darah-sign-out,#ssc-nadi-sign-out,#ssc-pernafasan-sign-out,#ssc-saturasi-sign-out,#ssc-suhu-sign-out,#ssc-skala-nyeri-sign-out,#ssc-jenis,#ssc-tanggal-sign-in,#ssc-tanggal-time-out,#ssc-tanggal-sign-out')
            .val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-ssc').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
                if ($(this).is(':disabled')) {
                    $(this).prop('disabled', false);
                }
            })
        }, 100)
    }


</script>