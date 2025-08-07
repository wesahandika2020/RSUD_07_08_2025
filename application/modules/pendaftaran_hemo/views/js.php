<script>
    $(function() {
        let jenisPenjamin = '';
        getListPendaftaran(1, '');

        $('#modal-pendaftaran').on('shown.bs.modal', function() {
            $('#domisili').focus();
        });

        $('#modal-pendaftaran').on('shown.bs.modal', function() {
            $('#no-identitas').focus();
        });

        $('.penjamin-group, .asuransi-field').hide();

        $('.count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        // btn tambah
        $('#btn-tambah-data').click(function() {
            resetAllForm();
            $('#domisili').val('');
            $('#btn-search-nik').hide();
            $('#no-identitas').prop('readonly', true);
            $('.reset-field, .reset-select, #cara_bayar').prop('disabled', true);
            $('#modal-pendaftaran').modal('show');
            $('#modal-pendaftaran-label').html('Form Entri Pendaftaran Hemodialisa');
        });

        // btn search data
        $('#btn-search-data').click(function() {
            $('#modal-search').modal('show');
        });

        // btn reload data
        $('#btn-reload-data').click(function() {
            resetAllForm();
            getListPendaftaran(1, '');
        });

        $("#tanggal-awal, #tanggal-akhir, #tanggal-lahir-search").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        // btn cek nik
        $('#btn-cek-nik').click(function() {
            if ($('#no-identitas').val() === '') {
                syams_validation('#no-identitas', 'Silahkan masukkan no identitas terlebih dahulu');
                $('#no-identitas').focus();
                return false;
            }

            let nik = '/nik/' + $('#no-identitas').val();
            let no_nik = $('#no-identitas').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('registrations/api/registrations_auto/cek_nik') ?>' + nik,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (data.data.success === true) {

                        resetAllForm();
                        $('#no-identitas').val(no_nik);

                        if (data.count_simrs.count > 0) {
                            swalAlert('info', 'NIK Double', 'No NIK <b><font color="red"> SUDAH terdaftar </font></b> di SIMRS ! <br> Silahkan cek kembali data inputan anda !');
                        }

                        let field = data.data.decode[0];
                        $('#nama').val(field.NAMA_LGKP);

                        if (field.JENIS_KLMIN == 'Perempuan') {
                            $('#kelamin').val('P');
                        } else {
                            $('#kelamin').val('L');
                        }

                        if (field.GOL_DARAH == 'Tdk Th') {
                            $('#goldarah').val();
                        } else {
                            $('#goldarah').val(field.GOL_DARAH);
                        }

                        let str = field.TGL_LHR;
                        let str_split = str.split('-');
                        // let tanggal_lahir = str_split[2] + '/' + str_split[1] + '/' + str_split[0];
                        $('#tanggal-lahir').val(field.TGL_LHR);
                        // $('#tanggal-lahir').datepicker('setDate', tanggal_lahir);

                        $('#tempat-lahir').val(field.TMPT_LHR);

                        let kode_pos = '';
                        if (field.KODE_POS == null) {
                            kode_pos = '';
                        } else {
                            kode_pos = field.KODE_POS;
                        }

                        $('#alamat').val(field.ALAMAT + ' RT. 0' + field.NO_RT + '/0' + field.NO_RW + ' ' + field.NAMA_KEL + ' ' + field.NAMA_KEC + ' ' + field.NAMA_KAB + ' ' + field.NAMA_PROP + ' ' + kode_pos);
                        $('#no_rt').val('0' + field.NO_RT);
                        $('#no_rw').val('0' + field.NO_RW);
                        $('#kode_pos').val(kode_pos);

                        getProvinsi(field.NO_PROP, field.NAMA_PROP);
                        getKabupaten(field.NO_PROP, field.NO_KAB, field.NAMA_KAB);
                        getKecamatan(field.NO_PROP, field.NO_KAB, field.NO_KEC, field.NAMA_KEC);
                        getKelurahan(field.NO_PROP, field.NO_KAB, field.NO_KEC, field.NO_KEL, field.NAMA_KEL);

                        let pendidikan = field.PDDK_AKH;
                        $('#pendidikan option').map(function() {
                            if ($(this).text() == pendidikan) return this;
                        }).prop('selected', 'selected');

                        let pekerjaan = field.JENIS_PKRJN;
                        $('#pekerjaan option').map(function() {
                            if ($(this).text() == pekerjaan.toUpperCase()) return this;
                        }).prop('selected', 'selected');

                        $('#agama').val(field.AGAMA);
                        $('#pernikahan').val(field.STAT_KWN);
                        $('#ayah').val(field.NAMA_LGKP_AYAH);
                        $('#ibu').val(field.NAMA_LGKP_IBU);

                        $('#telp').focus();
                        syams_validation_remove('.custom-select, .form-control');
                        $('#nama, #kelamin, #tanggal-lahir, #tempat-lahir, #alamat, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pekerjaan, #pendidikan, #pernikahan, #ayah, #ibu').prop('readonly', true);
                        messageCustom(data.data.message, 'Success');
                    } else if (data.data.success === false) {
                        swalCustom('warning', 'Informasi NIK', data.data.message);
                        resetAllForm();
                        $('#no-identitas').prop('readonly', false).focus()
                    }
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Gagal menghubungi server dukcapil, Silahkan coba kembali', 'Error');
                }
            })
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.custom-select').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#statuspasien').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
                $('#telp').focus();
            }
        });

        $('#penjamin').change(function() {
            let no_rm = $('#no_rm').val();
            let id_pj = $(this).val();

            if ((no_rm !== '') && (id_pj !== '')) {
                getNopolishPasien(no_rm, id_pj, '#no-polish');
            }
        });

        // tanggal lahir
        // $("#tanggal-lahir").datepicker({
        //     format: 'dd/mm/yyyy',
        //     endDate: "1d"
        // }).on('changeDate', function() {
        //     var tgl = $(this).val();
        //     $('#umur-label').html('');
        //     if (tgl !== '') {
        //         var umur = hitungUmur(date2mysql(tgl));
        //         $('#umur-label').html(umur);
        //     }
        //
        //     $(this).datepicker('hide');
        // });

        $('#tanggal-lahir').change(function() {
            const tgl = $(this).val()
            $('#umur-label').html('')
            if (tgl !== '') {
                const umur = hitungUmur(tgl)
                $('#umur-label').html(umur)
            }
        })

        // domisili
        $('#domisili').change(function() {
            if ($('#domisili').val() == 1) {
                resetAllForm();
                $('#asal-masuk').val(2);
                $('#bt-search-nik').show();
                $('#no-identitas').prop('readonly', false);
                $('#provinsi, #kabupaten').prop('readonly', true);
                $('#provinsi').children().not(':first').remove();
                $('#kabupaten').children().not(':first').remove();
                $('#provinsi').append(new Option("BANTEN", "36"));
                $('#kabupaten').append(new Option("KOTA TANGERANG", "71"));
                $("#provinsi option[value='36']").prop("selected", true);
                $("#kabupaten option[value='71']").prop("selected", true);
                getKecamatan(36, 71);
                syams_validation_remove(this);
                $('.reset-field, .reset-select, #cara-bayar').prop('disabled', false);
            } else {
                resetAllForm();
                $('#asal-masuk').val(2);
                $('#bt-search-nik').hide();
                $('#no-identitas').prop('readonly', false);
                getProvinsi();
                $('#nama, #kelamin, #tanggal-lahir, #tempat-lahir, #alamat, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);
                syams_validation_remove(this);
                $('.reset-field, .reset-select, #cara-bayar').prop('disabled', false);
            }
        });

        // cara bayar
        $('#cara-bayar').change(function() {
            jenisPenjamin = $(this).val();
            $('#no-polish, #penjamin').val('');
            $('#s2id_penjamin a .select2-chosen').html('');
            if ($(this).val() !== 'Tunai') {
                $('.penjamin-group, .asuransi-field').show();
                if (($(this).val() === 'Karyawan') | ($(this).val() === 'Gratis')) {
                    $('.asuransi-field').hide();
                }
            } else {
                $('.penjamin-group').hide();
                $('.asuransi-field').hide();
            }
        });

        // No RM Auto
        $('#no-rm').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                fillDataPasien(data);
                //cek_pelunasan(data.id);
                return data.id;
            }
        });

        // No RM Lama Auto
        $('#no-rm-lama').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_lama_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                fillDataPasienLama(data);
                //cek_pelunasan(data.id);
                return data.id;
            }
        });

        // Penjamin Auto
        $('#penjamin').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: jenisPenjamin,
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

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

        // Instansi Auto
        $('#instansi-rujukan').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/instansi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama + '<br/><i>' + data.alamat + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#dpjp_edit').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        spesialisasi: ''
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                return data.nama;
            }
        });

        // Wilayah
        $('#provinsi').change(function() {
            let no_prop = $('#provinsi').val();
            let nama_prop = $('#provinsi option:selected').text();
            if (no_prop) {
                $('#nama-provinsi').val(nama_prop);
                getKabupaten(no_prop);
            } else {
                $('#kabupaten').empty();
                $('#kecamatan').empty();
                $('#kelurahan').empty();
            }
            // $('#kabupaten').prop('readonly', false);
        });

        $('#kabupaten').change(function() {
            let no_prop = $('#provinsi').val();
            let no_kab = $('#kabupaten').val();
            let nama_kab = $('#kabupaten option:selected').text();
            if (no_kab) {
                $('#nama-kabupaten').val(nama_kab);
                getKecamatan(no_prop, no_kab);
            } else {
                $('#kecamatan').empty();
                $('#kelurahan').empty();
            }
            // $('#kecamatan').prop('readonly', false);
        });

        $('#kecamatan').change(function() {
            let no_prop = $('#provinsi').val();
            let no_kab = $('#kabupaten').val();
            let no_kec = $('#kecamatan').val();
            let nama_kec = $('#kecamatan option:selected').text();
            if (no_kab) {
                $('#nama-kecamatan').val(nama_kec);
                getKelurahan(no_prop, no_kab, no_kec);
            } else {
                $('#kelurahan').empty();
            }
            // $('#kelurahan').prop('readonly', false);
        });

        $('#kelurahan').change(function() {
            let nama_kel = $('#kelurahan option:selected').text();
            $('#nama-kelurahan').val(nama_kel);
        })

        // Etnis dan Hamkom Hide
        $('.etnis-lainnya').hide();
        $('.hamkom-lainnya').hide();

        $('#etnis').change(function() {
            if ($('#etnis').val() == 17) {
                $('.etnis-lainnya').show();
                $('#etnis-lainnya').focus();
            } else {
                $('.etnis-lainnya').hide();
                $('#etnis-lainnya').val('');
            }
        });

        $('#hamkom').change(function() {
            if ($('#hamkom').val() == 'Lain - lain') {
                $('.hamkom-lainnya').show();
                $('#hamkom-lainnya').focus();
            } else {
                $('.hamkom-lainnya').hide();
                $('#hamkom-lainnya').val('');
            }
        });

        $('.hamkom').hide();
        $('#disabilitas').change(function() {
            $('#disabilitas').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#disabilitas').val(val);
            });

            if ($('#disabilitas').val() > 0) {
                $('.hamkom').show();
            } else {
                $('.hamkom').hide();
                $('#hamkom').val('');
                $('.hamkom-lainnya').hide();
                $('#hamkom-lainnya').val('');
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // select2 dokter
        $('#dokter').select2({
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
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
                return data.nama;
            }
        });

        // TOMBOL BUAT SEP
        $('#btn-buat-sep').click(function() {
            let nopol = $('#no_polish').val();
            let kode_poli = 'HDL';
            let no_rujukan = $('#no_rujukan').val();

            if (kode_poli === '') {
                swalAlert('warning', 'Validasi', 'Anda belum memilih klinik tujuan');
            } else if (no_rujukan !== '') {
                getRujukan(no_rujukan, $('#no_rm').val(), 'poli', $('#s2id_layanan a .select2-chosen').html(), nopol);
            } else if (nopol === '') {
                bootbox.dialog({
                    message: 'Anda belum memasukkan No. Polish. <br> mencari peserta menggunakan NIK',
                    title: 'Pencarian Data Peserta',
                    buttons: {
                        batal: {
                            label: '<i class="fas fa-window-close"></i> Batal',
                            className: "btn-secondary",
                            callback: function() {}
                        },
                        cari: {
                            label: '<i class="fas fa-search"></i> Cari',
                            className: "btn-info",
                            callback: function() {
                                var nik = $('#no_identitas').val();
                                if (nik !== '') {
                                    getDataPesertaBPJS(nik, 'nik');
                                } else {
                                    swalAlert('warning', 'Validasi', 'Anda belum mengisi NIK');
                                }
                                // end
                            }
                        }
                    }
                });
            } else {
                getDataPesertaBPJS(nopol, 'no_polish', 'poli', $('#s2id_layanan_auto a .select2-chosen').html(), $('#no_rm').val());
            }
        });
		
		// Penjamin Auto Search
        $('#penjamin-search').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: jenisPenjamin,
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

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
    });

    // All Provinsi
    function getProvinsi(no_prop = null, nama_prop = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_provinsi') ?>',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Provinsi</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_PROP + '">' + v.NAMA_PROP + '</option>';
                });

                $('#provinsi').html(html);

                if (no_prop) {
                    $('#provinsi').val(no_prop);
                }

                if (nama_prop) {
                    $('#nama-provinsi').val(nama_prop);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kabupaten
    function getKabupaten(no_prop, no_kab = null, nama_kab = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kabupaten') ?>/no_prop/' + no_prop,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kabupaten</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KAB + '">' + v.NAMA_KAB + '</option>';
                });

                $('#kabupaten').html(html);

                if (no_kab) {
                    $('#kabupaten').val(no_kab);
                }

                if (nama_kab) {
                    $('#nama-kabupaten').val(nama_kab);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kecamatan
    function getKecamatan(no_prop, no_kab, no_kec = null, nama_kec = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kecamatan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kecamatan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEC + '">' + v.NAMA_KEC + '</option>';
                });

                $('#kecamatan').html(html);

                if (no_kec) {
                    $('#kecamatan').val(no_kec);
                }

                if (nama_kec) {
                    $('#nama-kecamatan').val(nama_kec);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kelurahan
    function getKelurahan(no_prop, no_kab, no_kec, no_kel = null, nama_kel = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_list_kelurahan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab + '/no_kec/' + no_kec,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kelurahan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEL + '">' + v.NAMA_KEL + '</option>';
                });

                $('#kelurahan').html(html);

                if (no_kel) {
                    $('#kelurahan').val(no_kel);
                }

                if (nama_kel) {
                    $('#nama-kelurahan').val(nama_kel);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetAllForm() {
        // $('#tanggal-lahir').datepicker('add');
        $('#antrian').html('');
        $('#umur-label').html('');
        $('#cara-bayar').val('Tunai');
        $('#no-identitas').prop('readonly', true);
        $('.penjamin-group, .asuransi-field').hide();
        $('#s2id_no-rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        $('.reset-field, .reset-select, .select2-input').val('');
        $('#tanggal-akhir').val('<?= date("d/m/Y"); ?>');
        $('#s2id_layanan-auto a .select2-chosen').html('Tempat Layanan');
        $('#no_rm_lama, #no_rm').val('');
        $('#s2id_no_rm_lama a .select2-chosen').html('No. RM Pasien Data Lama');
        $('#s2id_no_rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        $('#nama-search, #no-register-search, #no-rm-search, #klinik, #tanggal-lahir-search, #nik-search, #alamat-search, #layanan-auto').val('');
        syams_validation_remove('.reset-field, .reset-select, .select2-input');
        $('#s2id_instansi-rujukan a .select2-chosen').html('Instansi Perujuk');
        $('#nama, #kelamin, #tanggal-lahir, #tempat-lahir, #alamat, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);

        $('#disabilitas').prop('checked', false).change()

        $('#cara_bayar').val('Asuransi').change();
        $('#penjamin').val('1');
        $('#s2id_penjamin a .select2-chosen').html('BPJS');
        $('#penjamin-search').val('');
		$('#s2id_penjamin-search a .select2-chosen').html('- Semua Pemjamin -');

        resetAllLogoProfilPasien();
    }

    function salinPenanggungJawab() {
        $('#nik-pjwb-finansial').val($('#nik-pjwb').val());
        $('#nama-pjwb-finansial').val($('#nama-pjwb').val());
        $('#kelamin-pjwb-finansial').val($('#kelamin-pjwb').val());
        $('#telp-pjwb-finansial').val($('#telp-pjwb').val());
        $('#alamat-pjwb-finansial').val($('#alamat-pjwb').val());
    }

    function getNopolishPasien(no_rm, id_pj, element) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_nopolish_pasien') ?>/id/' + no_rm + '/penjamin/' + id_pj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $(element).val(data.no_polish);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function fillDataPasien(data) {
        $('#no-rm-bpjs').val(data.id);
        $('#no-identitas').val(data.no_identitas);
        $('#nama').val(data.nama);
        $('#kelamin').val(data.kelamin);
        $('#tempat-lahir').val(data.tempat_lahir);
        // $('#tanggal-lahir').val((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '');
        $('#tanggal-lahir').val((data.tanggal_lahir !== null) ? data.tanggal_lahir : '');
        $('#alamat').val(data.alamat);
        $('#telp').val(data.telp);
        $('#kelurahan').val(data.id_kelurahan);
        $('#agama').val(data.agama);
        $('#goldarah').val(data.gol_darah);
        $('#pendidikan').val(data.id_pendidikan);
        $('#pekerjaan').val(data.id_pekerjaan);
        $('#hamkom').val(data.hamkom);
        $('#pernikahan').val(data.status_kawin);
        $('#ayah').val(data.nama_ayah);
        $('#ibu').val(data.nama_ibu);

        // otomatis get no polish
        let id_pj = $('#penjamin').val();
        if ((data.id !== '') && (id_pj !== '')) {
            getNopolishPasien(data.id, id_pj, '#no_polish');
        }

        $('#etnis').val(data.id_etnis);
        if (data.id_etnis == 17) {
            $('.etnis-lainnya').show();
            $('#etnis-lainnya').val(data.etnis_lainnya);
        }

        if (data.disabilitas == 1) {
            $('#disabilitas').prop('checked', true);
            $('#disabilitas').val(data.disabilitas);

            $('.hamkom').show();
            if (data.hamkom !== '') {
                $('#hamkom').val(data.hamkom);

                if (data.hamkom == 'Lain - lain') {
                    $('.hamkom-lainnya').show();
                    $('#hamkom-lainnya').val(data.hamkom_lainnya);
                }
            }
        } else {
            $('#disabilitas').prop('checked', false);
            $('#disabilitas').val('');

            $('.hamkom').hide();
            if (data.hamkom === '') {
                $('#hamkom').val('');
            }
        }

        if (data.no_prop !== null || data.no_kab !== null || data.no_kec !== null || data.no_kel !== null) {
            getProvinsi(data.no_prop, data.nama_prop);
            getKabupaten(data.no_prop, data.no_kab, data.nama_kab);
            if (data.no_kab === '71') {
                $('#domisili').val(1);
                $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
            } else {
                $('#domisili').val(2);
                $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
            }
            getKecamatan(data.no_prop, data.no_kab, data.no_kec, data.nama_kec);
            getKelurahan(data.no_prop, data.no_kab, data.no_kec, data.no_kel, data.nama_kel);
        }

        let umur = hitungUmur(data.tanggal_lahir);
        $('#umur-label').html(umur);

        resetAllLogoProfilPasien();
        if (data !== null) {
            // status profil pasien
            if (data.is_alergi == 'Ya') {
                $('.logo-pasien-alergi').show();
            }
            if (data.is_died == 'Ya') {
                $('.logo-pasien-meninggal').show();
            }
            if (data.is_hiv == 'Ya') {
                $('.logo-pasien-hiv-aids').show();
            }
            if (data.is_gonorrhea == 'Ya') {
                $('.logo-pasien-gonorrhea').show();
            }
            if (data.is_hepatitis == 'Ya') {
                $('.logo-pasien-hepatitis').show();
            }
            if (data.is_kusta == 'Ya') {
                $('.logo-pasien-kusta-lepra').show();
            }
            if (data.is_tbc == 'Ya') {
                $('.logo-pasien-tbc-kp').show();
            }
            if (data.is_pasien_pejabat == 'Ya') {
                $('.logo-pasien-pejabat').show();
            }
            if (data.is_pemilik_rs == 'Ya') {
                $('.logo-pasien-pemilik-rs').show();
            }
            if (data.is_potensi_komplain == 'Ya') {
                $('.logo-pasien-potensi-komplain').show();
            }
        }

        $('#nama').prop('readonly', true);
        $('#no-identitas').val() != '' ? $('#no-identitas').prop('readonly', true) : $('#no-identitas').prop('readonly', false);
        if ($('#tanggal-lahir').val() != '') {
            $('#tanggal-lahir').prop('readonly', true);
            // $('#tanggal-lahir').datepicker('remove');
        } else {
            $('#tanggal-lahir').prop('readonly', false);
            // $('#tanggal-lahir').datepicker('add');
        }
    }

    function fillDataPasienLama(data) {
        $('#no-rm-bpjs').val(data.id);
        $('#no-identitas').val(data.no_identitas);
        $('#nama').val(data.nama);
        $('#kelamin').val(data.kelamin);
        $('#tempat-lahir').val(data.tempat_lahir);
        // $('#tanggal-lahir').val((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '');
        $('#tanggal-lahir').val((data.tanggal_lahir !== null) ? data.tanggal_lahir : '');
        $('#alamat').val(data.alamat);
        $('#goldarah').val(data.gol_darah);
        $('#agama').val(ucwords(data.agama.toLowerCase()));
        $('#telp').val(data.telp);
        $('#pendidikan').val(data.id_pendidikan);
        $('#pekerjaan').val(data.id_pekerjaan);

        let umur = hitungUmur(data.tanggal_lahir);
        $('#umur-label').html(umur);
    }

    function getListPendaftaran(page, id) {
        $('#page_now').val(page);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran/api/pendaftaran/get_list_pendaftaran') ?>/page/' + page + '/jenis_pendaftaran/Hemodialisa',
            data: $('#form-search').serialize() + '&jenis_igd=Hemodialisa',
            // data: $('#form-search').serialize() + '&id=' + id + '&jenis_igd=Hemodialisa',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((page > 1) & (data.data.length === 0)) {
                    getListPendaftaran(page - 1, '');
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#jml-pasien-baru').html(data.pasien_baru);
                $('#jml-pasien-lama').html(data.pasien_lama);
                $('#jml-pasien-batal').html(data.pasien_batal);

                $('#table-data tbody').empty();
                let html = '';
                let status = '';
                let btn_sep = '';
                let disabled = '';

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    if (v.status === 'Baru') {
                        status = '<h5><span class="label label-info"><i class="fas fa-plus-circle"></i> Pasien ' + v.status + '</span></h5>';
                    } else if (v.status === 'Lama') {
                        status = '<h5><span class="label label-success"><i class="fas fa-history"></i> Pasien ' + v.status + '</span></h5>';
                    } else if (v.status === 'Batal') {
                        status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle"></i> ' + v.status + '</span></h5>';
                    }

                    disabled = '';
                    if (v.tanggal_keluar !== null) {
                        disabled = 'disabled';
                    }

                    btn_sep = '';
                    btn_edit_sep = '';
                    if ((v.no_sep === null) && (v.no_polish !== '') && (v.cara_bayar === 'Asuransi')) {
                        btn_sep = '<button type="button" title="Klik untuk membuat SEP" class="btn btn-secondary btn-xs waves-effect waves-light" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id_layanan_pendaftaran + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.klinik + '\', \'' + v.no_rujukan + '\' )"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</button> ';
                    } else if ((v.no_sep !== null) && (v.no_polish !== '')) {
                        btn_sep = '<button type="button" title="Klik untuk cetak SEP" class="btn btn-secondary btn-xs waves-effect waves-light" onclick="cetakNotaSEP(\'' + v.no_sep + '\')"><i class="fas fa-print m-r-5"></i> Cetak SEP</button> ';
                        btn_edit_sep = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoSEP(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit No. SEP BPJS</a>';
                    } else {
                        btn_sep = '';
                        btn_edit_sep = '';
                    }

					let background_color = '';					
                    v.no_rujukan != null ? '' : background_color = 'style="background-color:#f8f9c0;"';
                    v.no_sep != null ? ''     : background_color = 'style="background-color:#f8f9c0;"';
					

                    let html = '<tr '+background_color+'>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_register + '</td>' +
                        '<td class="center">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td class="center">' + ((v.no_rujukan !== null) ? v.no_rujukan : '') + '</td>' +
                        '<td class="center">' + ((v.no_sep !== null) ? v.no_sep : '') + '</td>' +
                        '<td class="center">' + v.id_pasien + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td class="nowrap">' + ((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '') + '</td>' +
                        '<td class="nowrap">IGD (' + v.jenis_igd + ')</td>' +
                        '<td>' + ((v.cara_bayar === 'Tunai') ? v.cara_bayar : v.penjamin) + '</td>' +
                        '<td class="center nowrap">' + status + '</td>' +
                        '<td>' + v.nama_user + '</td>' +
                        '<td class="right">' +
                        btn_sep +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPendaftaran(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-eye"></i> Detail Pendaftaran</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakBerkasPendaftaran(\'' + v.id + '\', \'' + v.id_pasien + '\', ' + data.page + ')"><i class="fas fa-print"></i> Cetak Berkas Pendaftaran</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoPolish(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_polish !== null) ? v.no_polish : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit No. Kartu BPJS</a>' +
						'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoSEP(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit No. SEP BPJS</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editPenaggungJawab(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit Penanggung Jawab</a>' +
                        btn_edit_sep +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalPendaftaran(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-trash"></i> Batal Pendaftaran</a>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table-data tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cariDataPendaftaran() {
        getListPendaftaran(1, '');
        $('#modal-search').modal('hide');
    }

    function paging(p, tab) {
        if (tab == 1) {
            getListPendaftaran(p, '');
        } else if (tab == 2) {
            pencarianAdvancedPasienList(p);
        }
    }

    // Konfirmasi Simpan Data
    function konfirmasiSimpanDataPendaftaran() {
        if ($('#domisili').val() == '') {
            syams_validation('#domisili', 'Silahkan pilih domisili terlebih dahulu');
            return false;
        }

        klik = null;
        swal.fire({
            title: 'Simpan Pendaftaran Hemodialisa',
            text: "Apakah anda yakin akan melakukan entri pendaftaran Hemodialisa ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanDataPendaftaran();
            }
        })
    }

    // Simpan Data Pendaftaran
    function simpanDataPendaftaran() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pendaftaran/api/pendaftaran/simpan_pendaftaran') ?>',
            data: $('#form-pendaftaran').serialize() + '&jenis_igd=Hemodialisa',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.validasi == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    showErrorValidate('#no-identitas', 'no-identitas', data);
                    showErrorValidate('#nama', 'nama', data);
                    showErrorValidate('#kelamin', 'kelamin', data);
                    showErrorValidate('#tanggal-lahir', 'tanggal-lahir', data);
                    showErrorValidate('#alamat', 'alamat', data);
                    showErrorValidate('#agama', 'agama', data);
                    showErrorValidate('#provinsi', 'provinsi', data);
                    showErrorValidate('#kabupaten', 'kabupaten', data);
                    showErrorValidate('#kecamatan', 'kecamatan', data);
                    showErrorValidate('#kelurahan', 'kelurahan', data);
                    showErrorValidate('#pendidikan', 'pendidikan', data);
                    showErrorValidate('#telp', 'telp', data);
                    showErrorValidate('#etnis', 'etnis', data);
                    showErrorValidate('#dokter', 'dokter', data);
                    showErrorValidate('#penjamin', 'penjamin', data);
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status == false) {
                        swalCustom('warning', 'Pendaftaran Gagal', data.message);
                    } else {
                        messageAddSuccess();
                        getListPendaftaran(1, data.id);

                        resetAllForm();
                        $('#modal-pendaftaran').modal('hide');
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom('error', 'Error', 'Gagal melakukan pendaftaran, silahkan hubungi IT Management');
            }
        });
    }

    function editPenaggungJawab(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pendaftaran/api/pendaftaran/get_pendaftaran_detail") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.pasien !== null) {
                    hasil = data.pasien;
                    $('#id-pendaftaran-pjwb').val(hasil.id);
                    $('#s2id_instansi-rujukan_edit a .select2-chosen').html(hasil.instansi_perujuk);
                    $('#instansi-rujukan-edit').val(hasil.id_instansi_perujuk);
                    $('#nadis-perujuk-edit').val(hasil.nadis_perujuk);
                    $('#nik-pjwb-edit').val(hasil.nik_pjwb);
                    $('#nama-pjwb-edit').val(hasil.nama_pjwb);
                    $('#kelamin-pjwb-edit').val(hasil.kelamin_pjwb);
                    $('#alamat-pjwb-edit').val(hasil.alamat_pjwb);
                    $('#telp-pjwb-edit').val(hasil.telp_pjwb);
                    $('#nik-pjwb-finansial-edit').val(hasil.nik_pjwb_finansial);
                    $('#nama-pjwb-finansial-edit').val(hasil.nama_pjwb_finansial);
                    $('#kelamin-pjwb-finansial-edit').val(hasil.kelamin_pjwb_finansial);
                    $('#alamat-pjwb-finansial-edit').val(hasil.alamat_pjwb_finansial);
                    $('#telp-pjwb-finansial-edit').val(hasil.telp_pjwb_finansial);

                    $('#modal-edit-pjawab').modal('show');
                    $('#modal-edit-pjawab-label').html('Form Edit Pendaftaran');
                } else {
                    accessFailed(404);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakBerkasPendaftaran(id, id_pasien = null, p) {
        $('#modal_cetak_pendaftaran').modal('show');
        $('#modal_cetak_pendaftaran_label').html('Cetak Berkas Pendaftaran');

        $('#btn_cetak_bukti_kunjungan').click(function() {
            cetakBuktiKunjungan(id);
        });

        $('#btn_cetak_kartu_pasien').click(function() {
            cetakKartuPasien(id, id_pasien);
        });

        $('#btn_cetak_label_berkas').click(function() {
            cetakLabelBerkas(id_pasien);
        });

        $('#btn_cetak_label_gelang').click(function() {
            cetakLabelGelang(id_pasien);
        });
    }

    function cetakLabelGelang(id_pasien) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('medical_record/cetak_label_gelang/') ?>' + id_pasien, 'Cetak Label Gelang', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakLabelBerkas(id_pasien, size) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('medical_record/cetak_label_berkas_rekam_medik/') ?>' + id_pasien, 'Cetak Label Berkas', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakKartuPasien(id, id_pasien) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('pendaftaran_poli/cetak_kartu_pasien_poli/') ?>' + id, 'Cetak Kartu Pasien', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakBuktiKunjungan(id) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('pendaftaran_poli/cetak_bukti_kunjungan_poli/') ?>' + id, 'Cetak Bukti Kunjungan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakAntrian(id_pendaftaran, id_layanan) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url() ?>pendaftaran_poli/cetak_no_antrian/' + id_pendaftaran + '/' + id_layanan, 'Cetak Nomor Antri Pemeriksaan Klinik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
    }

    function batalPendaftaran(id) {
        bootbox.dialog({
            message: "Anda yakin akan melakukan pembatalan pendaftaran?",
            title: "Pembatalan Pendaftaran",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash"></i>  Ya',
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pendaftaran/api/pendaftaran/batal_pendaftaran") ?>/id/' + id,
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    getListPendaftaran($('#page_now').val(), '');
                                } else {
                                    customAlert('Pembatalan Pendaftaran', data.message);
                                }

                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan pendaftaran', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function detailPendaftaran(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran/api/pendaftaran/get_pendaftaran_detail') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let umur = '';
                let kelamin = '';

                if (data.pasien !== null) {
                    var detail = data.pasien;
                    if (detail.kelamin === 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (detail.tanggal_lahir !== '') {
                        umur = datefmysql(detail.tanggal_lahir) + ' (' + hitungUmur(detail.tanggal_lahir) + ')';
                    }

                    $('#id-pendaftaran').val(id);
                    $('#no-rm-bpjs').val(detail.id);
                    $('#nama-detail').html(detail.nama);
                    $('#no-rm-detail').html(detail.no_rm);
                    $('#no-rm-lama-detail').html(detail.rm_lama);
                    $('#alamat-detail').html(detail.alamat);
                    $('#kelamin-detail').html(kelamin);
                    $('#tgl-lahir-umur-detail').html(umur);
                    $('#umur-detail').html(umur);
                    $('#telp_detail').html(detail.telp);

                    $('#instansi-perujuk-detail').html(detail.instansi_perujuk);
                    $('#nadis-perujuk-detail').html(detail.nadis_perujuk);

                    $('#nik-pjwb-detail').html(detail.nik_pjwb);
                    $('#nama-pjwb-detail').html(detail.nama_pjwb);
                    $('#kelamin-pjwb-detail').html(detail.kelamin_pjwb);
                    $('#alamat-pjwb-detail').html(detail.alamat_pjwb);
                    $('#telp-pjwb-detail').html(detail.telp_pjwb);

                    $('#nik-pjwb-detail-finansial').html(detail.nik_pjwb_finansial);
                    $('#nama-pjwb-detail-finansial').html(detail.nama_pjwb_finansial);
                    $('#kelamin-pjwb-detail-finansial').html(detail.kelamin_pjwb_finansial);
                    $('#alamat-pjwb-detail-finansial').html(detail.alamat_pjwb_finansial);
                    $('#telp-pjwb-detail-finansial').html(detail.telp_pjwb_finansial);

                    // Layanan
                    let html = '';
                    let bt_antri = '';
                    let no_polish = '';
                    let bt_edit_rujuk = '';
                    let bt_edit_klinik = '';

                    $('#table_detail tbody').empty();

                    if (data.layanan.length > 0) {
                        $.each(data.layanan, function(i, v) {
                            if (v.jenis_layanan == 'IGD') {
                                bt_antri = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + detail.id + ',' + v.id + ')"><i class="fa fa-print"></i> Cetak</button>';
                            } else {
                                bt_antri = '';
                            }

                            bt_edit_klinik = '<button title="Klik untuk menampilkan dialog ubah klinik" type="button" class="btn btn-secondary btn-xxs" onclick="editKlinik(' + v.id + ',\'' + v.layanan + '\')"><i class="fa fa-edit"></i> Edit</button>';

                            bt_edit_rujuk = '<button title="Klik untuk mengedit nomor rujukan" type="button" class="btn btn-secondary btn-xxs" onclick="editNoRujukan(' + v.id_pendaftaran + ',\'' + v.no_rujukan + '\')"><i class="fa fa-edit"></i> Edit</button>';


                            html = '<tr>' +
                                '<td>' + v.jenis_layanan + '</td>' +
                                // '<td>' + ((v.layanan !== null) ? v.layanan : '') + '&nbsp;&nbsp; ' + bt_edit_klinik + '</td>' +
                                // '<td>' + ((v.layanan !== null) ? v.layanan : '') + '</td>' +
                                '<td>' + ((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '') + '</td>' +
                                '<td>' + v.cara_bayar + ' ' + ((v.id_penjamin !== null) ? '(' + v.penjamin + ')' : '') + '</td>' +
                                '<td>' + ((v.no_polish !== null) ? v.no_polish : '-') + '</td>' +
                                '<td>' + ((v.no_rujukan !== null) ? v.no_rujukan : '') + '&nbsp;&nbsp; ' + bt_edit_rujuk + '</td>' +
                                '<td>' + ((v.no_sep !== null) ? v.no_sep : '-') + '</td>' +
                                // '<td>Antrian Ke - ' + v.no_antrian + '&nbsp;&nbsp; ' + bt_antri + '</td>' +
                                '</tr>';
                            $('#table_detail tbody').append(html);
                        });
                    }

                    $('#modal-detail-pendaftaran').modal('show');
                    $('#modal-detail-pendaftaran-label').html('Detail Pendaftaran Hemodialisa');

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

    function pembuatanSEP(no_rm, id_layanan, nopol, jenis_igd) {
        $('#no_rm_bpjs').val(no_rm);
        let kode_poli = 'IGD';
        if (jenis_igd === 'Hemodialisa') {
            kode_poli = 'HDL';
        }
        $('#kode_poli').val(kode_poli);
        $('#id_layanan_pendaftaran_bpjs').val(id_layanan);
        $('#nokartu_bpjs').val(nopol);

        if (nopol === '') {
            swalCustom('warning', 'Info', 'Peserta belum memasukkan no. kartu asuransi');
        } else {
            getDataPesertaBPJS(nopol, 'nopolish', 'igd', '', no_rm);
        }
    }

    function editNoRujukan(id_pendaftaran, no_rujukan = null) {

        $('#id_pendaftaran_edit').val(id_pendaftaran);
        $('#no_rujukan_edit').val((no_rujukan !== null) ? no_rujukan : '');

        $('#modal_edit_no_rujukan').modal('show');
        $('#modal_edit_no_rujukan_label').html('Edit No. Rujukan');
    }

    function simpanEditNoRujukan() {
        var stop = false;

        if ($('#no_rujukan_edit').val() === '') {
            syams_validation('#no_rujukan_edit', 'No rujukan harus diisi!');
            stop = true;
        };


        if (stop) {
            return false;
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran_poli/api/pendaftaran_poli/edit_no_rujukan") ?>/',
            data: $('#form_edit_no_rujukan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    messageCustom('Berhasil edit no rujukan', 'Success');
                } else {
                    messageCustom('Gagal edit no rujukan', 'Success');
                }

                $('#modal_edit_no_rujukan').modal('hide');
                // $('#modal-detail-pendaftaran').modal('hide');
                detailPendaftaran($('#id_pendaftaran_edit').val(), $('#page_now').val());
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function resetAllLogoProfilPasien() {
        $('.logo-pasien-alergi').hide();
        $('.logo-pasien-meninggal').hide();
        $('.logo-pasien-hiv-aids').hide();
        $('.logo-pasien-gonorrhea').hide();
        $('.logo-pasien-hepatitis').hide();
        $('.logo-pasien-kusta-lepra').hide();
        $('.logo-pasien-tbc-kp').hide();
        $('.logo-pasien-pejabat').hide();
        $('.logo-pasien-pemilik-rs').hide();
        $('.logo-pasien-potensi-komplain').hide();
    }
</script>