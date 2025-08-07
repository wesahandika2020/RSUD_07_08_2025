<script>
    $(function() {
        let jenisPenjamin = '';
        let account_group = "<?= $this->session->userdata('account_group') ?>";

        if (account_group !== 'Pendaftaran' && account_group !== 'Admin Rekam Medis' && account_group !== 'Rekam Medis') {

            if (window.localStorage) {
                if (!localStorage.getItem('firstLoad')) {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                } else
                    localStorage.removeItem('firstLoad');
            }

        }



        if (account_group !== 'Security') {
            getListPendaftaran(1, '');
        }

        $('#klinik').change(function() {
            getListPendaftaran(1, '');
        });

        $('#shifpoli').change(function() {
            getListPendaftaran(1, '');
        });

        $('#modal_pendaftaran').on('shown.bs.modal', function() {
            $('#domisili').focus();
        });

        $('.penjamin_group, .asuransi_field').hide();

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

        $('#modal_pendaftaran').on('shown.bs.modal', function() {
            $('#no_identitas').focus();
        });

        // btn tambah
        $('#bt_tambah_data').click(function() {
            resetAllForm();
            $('#kode-booking-bpjs, #kode-booking-online').val('');

            //Wa Security
            if (account_group === 'Security') {
                //tambahan      
                $('#disabilitas').attr('disabled', true);
                $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                //end_tambahan      
            }
            $('#penjamin').select2('readonly', true);
            $('#domisili').val('');
            $('#bt_search_nik').hide();
            $('#no_identitas').prop('readonly', true);
            $('.reset-field, .reset-select, #cara_bayar').prop('disabled', true);
            $('#modal_pendaftaran').modal('show');
            $('#modal_pendaftaran_label').html('Form Entri Pendaftaran Poliklinik');

            //Start Set domain default kota tangerang
            $('#domisili').val('1');
            resetAllForm();
            $('#asal_masuk').val(2);
            $('#bt_search_nik').show();
            $('#no_identitas').prop('readonly', false);
            $('#provinsi, #kabupaten').prop('readonly', true);
            $('#provinsi').children().not(':first').remove();
            $('#kabupaten').children().not(':first').remove();
            $('#provinsi').append(new Option("BANTEN", "36"));
            $('#kabupaten').append(new Option("KOTA TANGERANG", "71"));
            $("#provinsi option[value='36']").prop("selected", true);
            $("#kabupaten option[value='71']").prop("selected", true);
            getKecamatan(36, 71);
            syams_validation_remove(this);
            $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
            //End Set domain default kota tangerang
        });

        // btn search data
        $('#bt_search_data').click(function() {
            $('#modal_search_pendaftaran').modal('show');
            $('#modal_search_pendaftaran_label').html('Parameter Pencarian');
        });

        // btn reload data
        $('#bt_reload_data').click(function() {
            resetAllForm();

            if (accountGroup === 'Security') {
                $('#nik_search').val('');
                $('#table_data tbody').empty();
            } else {
                getListPendaftaran(1, '');
            }

        });

        $("#tanggal_awal, #tanggal_akhir, #tanggal_lahir_search").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        // btn cek nik
        $('#bt_cek_nik').click(function() {
            if ($('#no_identitas').val() === '') {
                syams_validation('#no_identitas', 'Silahkan masukkan no identitas terlebih dahulu');
                $('#no_identitas').focus();
                return false;
            }

            let nik = '/nik/' + $('#no_identitas').val();
            let no_nik = $('#no_identitas').val();
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
                        nikResetAllForm();
                        $('#no_identitas').val(no_nik);

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
                        $('#tanggal_lahir').val(field.TGL_LHR);
                        // $('#tanggal_lahir').datepicker('setDate', tanggal_lahir);

                        $('#tempat_lahir').val(field.TMPT_LHR);

                        let kode_pos = '';
                        if (field.KODE_POS == null) {
                            kode_pos = '';
                        } else {
                            kode_pos = field.KODE_POS;
                        }

                        $('#alamat').val(field.ALAMAT);
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
                        }).prop('selected', 'selected').change();

                        let pekerjaan = field.JENIS_PKRJN;
                        $('#pekerjaan option').map(function() {
                            if ($(this).text() == pekerjaan.toUpperCase()) return this;
                        }).prop('selected', 'selected').change();

                        $('#agama').val(field.AGAMA);
                        $('#pernikahan').val(field.STAT_KWN);
                        $('#ayah').val(field.NAMA_LGKP_AYAH);
                        $('#ibu').val(field.NAMA_LGKP_IBU);

                        $('#telp').focus();
                        syams_validation_remove('.custom-select, .form-control');
                        $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pekerjaan, #pendidikan, #pernikahan, #ayah, #ibu').prop('readonly', true);
                        messageCustom(data.data.message, 'Success');
                    } else if (data.data.success === false) {
                        swalCustom('warning', 'Informasi NIK', data.data.message);
                        resetAllForm();
                        $('#no_identitas').prop('readonly', false).focus()
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
                getNopolishPasien(no_rm, id_pj, '#no_polish');
            }
        });

        // tanggal lahir
        // $("#tanggal_lahir").datepicker({
        //     format: 'dd/mm/yyyy',
        //     endDate: "1d"
        // }).on('changeDate', function() {
        //     var tgl = $(this).val();
        //     $('#umur_label').html('');
        //     if (tgl !== '') {
        //         var umur = hitungUmur(date2mysql(tgl));
        //         $('#umur_label').html(umur);
        //     }
        //
        //     $(this).datepicker('hide');
        // });

        $('#tanggal_lahir').change(function() {
            const tgl = $(this).val()
            $('#umur_label').html('')
            if (tgl !== '') {
                const umur = hitungUmur(tgl)
                $('#umur_label').html(umur)
            }
        })

        //Wa Security
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (accountGroup === 'Security') {
            // domisili     
            $('#domisili').change(function() {
                if ($('#domisili').val() == 1) {
                    resetAllForm();
                    $('#asal_masuk').val(2);
                    $('#bt_search_nik').show();
                    $('#provinsi, #kabupaten').prop('readonly', true);
                    getProvinsi(no_prop = 36, nama_prop = 'BANTEN');
                    getKabupaten(36, no_kab = 71, nama_kab = 'KOTA TANGERANG');
                    getKecamatan(36, 71);
                    syams_validation_remove(this);
                    $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
                    //tambahan
                    $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);
                    $('#disabilitas').attr('disabled', true);
                    $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                    //end_tambahan

                } else {
                    resetAllForm();
                    $('#asal_masuk').val(2);
                    $('#bt_search_nik').hide();
                    $('#no_identitas').prop('readonly', false);
                    getProvinsi();
                    $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #alamat, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);
                    syams_validation_remove(this);
                    $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
                    //tambahan
                    $('#bt_cek_nik, #no_identitas, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);
                    $('#disabilitas').attr('disabled', true);
                    $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                    //end_tambahan
                }
            });
        } else {
            // domisili
            $('#domisili').change(function() {
                if ($('#domisili').val() == 1) {
                    resetAllForm();
                    $('#asal_masuk').val(2);
                    $('#bt_search_nik').show();
                    $('#no_identitas').prop('readonly', false);
                    $('#provinsi, #kabupaten').prop('readonly', true);
                    $('#provinsi').children().not(':first').remove();
                    $('#kabupaten').children().not(':first').remove();
                    $('#provinsi').append(new Option("BANTEN", "36"));
                    $('#kabupaten').append(new Option("KOTA TANGERANG", "71"));
                    $("#provinsi option[value='36']").prop("selected", true);
                    $("#kabupaten option[value='71']").prop("selected", true);
                    getKecamatan(36, 71);
                    syams_validation_remove(this);
                    $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
                } else {
                    resetAllForm();
                    $('#asal_masuk').val(2);
                    $('#bt_search_nik').hide();
                    $('#no_identitas').prop('readonly', false);
                    getProvinsi();
                    $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #alamat, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);
                    syams_validation_remove(this);
                    $('.reset-field, .reset-select, #cara_bayar').prop('disabled', false);
                }
            });
        }

        // cara bayar
        $('#cara_bayar').change(function() {
            jenisPenjamin = $(this).val();
            $('#no_polish, #penjamin').val('');
            $('#s2id_penjamin a .select2-chosen').html('');
            if ($(this).val() !== 'Tunai') {
                $('.penjamin_group, .asuransi_field').show();
                if (($(this).val() === 'Karyawan') | ($(this).val() === 'Gratis')) {
                    $('.asuransi_field').hide();
                }
            } else {
                $('.penjamin_group').hide();
                $('.asuransi_field').hide();
            }
        });

        // No RM Auto
        $('#no_rm').select2({
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '</b>' + ' ( ' + data.tanggal_lahir + ' )  ' + data.no_identitas + ' <br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                fillDataPasien(data);
                //cek_pelunasan(data.id);
                return data.id;
            }
        });

        // No RM Lama Auto
        $('#no_rm_lama').select2({
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

        // Layanan Auto
        $('#layanan_auto').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#kode_poli').val(data.kode_bpjs);
                getDokterSpesialis(data.id);
                return data.nama;
            }
        });

        // Layanan Antri Auto
        $('#layanan_antri').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                getDokterSpesialis(data.id);
                return data.nama;
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

        // Instansi Auto
        $('#instansi_rujukan').select2({
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

        $('#layanan_edit').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                if ($('#unitkerja-edit').is(':checked')) $('#id-poli-edit').val(data.id);
                return data.nama;
            }
        });

        $('#unitkerja-edit').on('change', function() {
            if ($(this).is(':checked') === false) {
                $('#id-poli-edit').val('');
            } else {
                $('#id-poli-edit').val($('#layanan_edit').val());
            }
        })

        $('#dpjp_edit').select2({
            ajax: {
                url: "<?= base_url('pendaftaran_poli/api/pendaftaran_poli/get_dokter_spesialisasi') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        id_dokter: $('#id-poli-edit').val(),
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
                const kuota = Math.abs(parseInt(data.kuota) - parseInt(data.jml_kunjung))
                var markup = `<span class="${kuota === 0 ? 'text-error' : ''}"><b>${data.nama}</b><br/><i><b>${data.shift_poli}</b> - ${data.spesialisasi} - ( ${data.jml_kunjung} / ${data.kuota} )</i> - ${kuota === 0 ? 'Full' : ''}</span>`
                return markup;
            },
            formatSelection: function(data) {
                $('#id-jadwal-dokter').val(data.id_jadwal_dokter);
                return data.nama;
            }
        });

        $('#layanan_auto').change(function() {
            let tanggal = $('#tanggal').html();
            getAntrianKlinik(tanggal, $(this).val(), '#antrian', '#no_antrian', );
        });

        $('#layanan_antri').change(function() {
            let tanggal = $('#tanggal').html();
            getAntrianKlinik(tanggal, $(this).val(), '#antrian_lain', '#no_antrian_lain', );
        });

        // Wilayah
        $('#provinsi').change(function() {
            let no_prop = $('#provinsi').val();
            let nama_prop = $('#provinsi option:selected').text();
            if (no_prop) {
                $('#nama_provinsi').val(nama_prop);
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
                $('#nama_kabupaten').val(nama_kab);
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
                $('#nama_kecamatan').val(nama_kec);
                getKelurahan(no_prop, no_kab, no_kec);
            } else {
                $('#kelurahan').empty();
            }
            // $('#kelurahan').prop('readonly', false);
        });

        $('#kelurahan').change(function() {
            let nama_kel = $('#kelurahan option:selected').text();
            $('#nama_kelurahan').val(nama_kel);
        })

        // Etnis dan Hamkom Hide
        $('.etnis_lainnya').hide();
        $('.hamkom_lainnya').hide();

        $('#etnis').change(function() {
            if ($('#etnis').val() == 17) {
                $('.etnis_lainnya').show();
                $('#etnis_lainnya').focus();
            } else {
                $('.etnis_lainnya').hide();
                $('#etnis_lainnya').val('');
            }
        });

        $('#hamkom').change(function() {
            if ($('#hamkom').val() == 'Lain - lain') {
                $('.hamkom_lainnya').show();
                $('#hamkom_lainnya').focus();
            } else {
                $('.hamkom_lainnya').hide();
                $('#hamkom_lainnya').val('');
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
                $('.hamkom_lainnya').hide();
                $('#hamkom_lainnya').val('');
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // TOMBOL BUAT SEP
        $('#bt_buat_sep').click(function() {
            let nopol = $('#no_polish').val();
            let kode_poli = $('#kode_poli').val();
            let no_rujukan = $('#no_rujukan').val();

            if (kode_poli === '') {
                swalAlert('warning', 'Validasi', 'Anda belum memilih klinik tujuan');
            } else if (no_rujukan !== '') {
                getRujukan(no_rujukan, $('#no_rm').val(), 'poli', $('#s2id_layanan a .select2-chosen').html(), nopol);
            } else if (nopol === '') {
                bootbox.dialog({
                    message: 'Anda belum memasukkan No. Polis. <br> mencari peserta menggunakan NIK',
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


    });

    // Form Antri Klinik Lain
    function openFormAntri(id_pendaftaran) {
        resetAntri();
        $('#modal_antri_klinik').modal('show');
        $('#modal_antri_klinik_label').html('Form Antri Klinik');
        $('#id_pendaftaran_antri').val(id_pendaftaran);
    }

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

                $('#provinsi, #provinsi-mpu').html(html);

                if (no_prop) {
                    $('#provinsi, #provinsi-mpu').val(no_prop);
                }

                if (nama_prop) {
                    $('#nama_provinsi').val(nama_prop);
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

                $('#kabupaten, #kabupaten-mpu').html(html);

                if (no_kab) {
                    $('#kabupaten, #kabupaten-mpu').val(no_kab);
                }

                if (nama_kab) {
                    $('#nama_kabupaten').val(nama_kab);
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

                $('#kecamatan, #kecamatan-mpu').html(html);

                if (no_kec) {
                    $('#kecamatan, #kecamatan-mpu').val(no_kec);
                }

                if (nama_kec) {
                    $('#nama_kecamatan').val(nama_kec);
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

                $('#kelurahan, #kelurahan-mpu').html(html);

                if (no_kel) {
                    $('#kelurahan, #kelurahan-mpu').val(no_kel);
                }

                if (nama_kel) {
                    $('#nama_kelurahan').val(nama_kel);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    //Wa Security Dokter Spesialis      
    function getDokterSpesialis(id_spesialisasi = null, id_dokter = null) {
        $.ajax({
            // url: '<?= base_url('masterdata/api/masterdata_auto/get_dokter_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
            url: '<?= base_url('masterdata/api/masterdata_auto/get_dokter_spesialisasi_jadwal') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';


                if (data.length === undefined) {
                    html += '<option value="' + data.id + '"><b>' + data.dokter + '</b> - <small>' + data.spesialisasi + ' ' + data.jml_terlayani + '</small></option>';

                } else {
                    html += '<option value="">Pilih Dokter</option>';
                    $.each(data, function(i, v) {
                        html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi + ' ' + v.jml_terlayani + '</small></option>';
                    });
                }



                $('#dokter, #dokter_antri').html(html);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function getBPJSSpesialis(id_spesialisasi = null, id_dokter = null) {

        $.ajax({
            url: '<?= base_url('pendaftaran/api/pendaftaran/get_bpjs_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                let html = '';

                $('#layanan_auto').val(data.id_spesialisasi);
                $('#kode_poli').val(id_spesialisasi);
                $('#kode_dokter_temp').val(data.kode_bpjs);
                $('#dokter_temp').val(data.dokter);
                $('#s2id_layanan_auto a .select2-chosen').html(data.spesialisasi);
                let tanggal = $('#tanggal').html();
                getAntrianKlinik(tanggal, data.id_spesialisasi, '#antrian', '#no_antrian');

                if (data.length === undefined) {

                    html += '<option value="' + data.id + '"><b>' + data.dokter + '</b> - <small>' + data.spesialisasi + ' ' + data.jml_terlayani + '</small></option>';

                } else {

                    html += '<option value="">Pilih Dokter</option>';
                    $.each(data, function(i, v) {
                        html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi + ' ' + v.jml_terlayani + '</small></option>';
                    });


                }

                $('#dokter, #dokter_antri').html(html);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function nikResetAllForm() {
        $('#umur_label').html('');
        $('#no_identitas').prop('readonly', true);
        $('#s2id_no_rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        // $('.reset-field, .reset-select, .select2-input').val('');
        $('#tanggal_akhir').val('<?= date("d/m/Y"); ?>');
        $('#no_rm_lama, #no_rm').val('');
        $('#s2id_no_rm_lama a .select2-chosen').html('No. RM Pasien Data Lama');
        $('#s2id_no-rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        $('#nama_search, #carabayar_search, #no_register_search, #user_search_poli, #no_rm_search, #klinik, #shifpoli, #tanggal_lahir_search, #nik_search, #alamat_search').val('');
        // syams_validation_remove('.reset-field, .reset-select, .select2-input');
        $('#s2id_instansi_rujukan a .select2-chosen').html('Instansi Perujuk');
        $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #alamat, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);

        $('#disabilitas').prop('checked', false).change()

        resetAllLogoProfilPasien();
    }

    function resetAllForm() {
        // $('#tanggal_lahir').datepicker('add');
        $('#antrian').html('');
        $('#umur_label').html('');
        $('#cara_bayar').val('Tunai');
        $('#no_identitas').prop('readonly', true);
        $('.penjamin_group, .asuransi_field').hide();
        $('#s2id_no_rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        $('.reset-field, .reset-select, .select2-input').val('');
        $('#tanggal_akhir').val('<?= date("d/m/Y"); ?>');
        $('#s2id_layanan_auto a .select2-chosen').html('Tempat Layanan');
        $('#no_rm_lama, #no_rm').val('');
        $('#s2id_no_rm_lama a .select2-chosen').html('No. RM Pasien Data Lama');
        $('#s2id_no-rm a .select2-chosen').html('<b style="color:red">No. RM Pasien</b>');
        $('#nama_search, #carabayar_search, #no_register_search, #user_search_poli, #no_rm_search, #klinik, #shifpoli, #tanggal_lahir_search, #nik_search, #alamat_search, #layanan_auto, #dokter').val('');
        syams_validation_remove('.reset-field, .reset-select, .select2-input');
        $('#s2id_instansi_rujukan a .select2-chosen').html('Instansi Perujuk');
        $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #alamat, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);

        $('#disabilitas').prop('checked', false).change()

        $('#cara_bayar').val('Asuransi').change();
        $('#penjamin').select2('readonly', false);
        $('#penjamin').val('1');
        $('#s2id_penjamin a .select2-chosen').html('BPJS');
        $('#penjamin-search').val('');
        $('#s2id_penjamin-search a .select2-chosen').html('- Semua Pemjamin -');

        resetAllLogoProfilPasien();
    }

    function resetAntri() {
        $('#no_antrian_lain').html('');
        $('#antrian_lain, #layanan_antri').val('');
        $('#s2id_layanan_antri a .select2-chosen').html('Pilih Klinik');
        syams_validation_remove('.validate_input');
    }

    function salinPenanggungJawab() {
        $('#nik_pjwb_finansial').val($('#nik_pjwb').val());
        $('#nama_pjwb_finansial').val($('#nama_pjwb').val());
        $('#kelamin_pjwb_finansial').val($('#kelamin_pjwb').val());
        $('#telp_pjwb_finansial').val($('#telp_pjwb').val());
        $('#alamat_pjwb_finansial').val($('#alamat_pjwb').val());
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

    function getNopolishAntrean(no_rm, id_pj, element, bpjs) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_nopolish_pasien') ?>/id/' + no_rm + '/penjamin/' + id_pj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $(element).val(data.no_polish);

                if (data.no_polish === '') {

                    $(element).val(bpjs);

                } else {

                    $(element).val(data.no_polish);

                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function getAntrianKlinik(tanggal, id_unit, element_html, element_value) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/get_antrian_poli') ?>',
            data: 'tanggal=' + tanggal + '&id_unit=' + id_unit,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $(element_html).html(data.no_antrian);
                $(element_value).val(data.no_antrian);
            }
        });
    }



    //Wa Security
    function fillDataPasien(data) {
        $('#is-pegawai-rsud').prop('checked', data.is_pegawai_rsud === '1');

        $('#no_rm_bpjs').val(data.id);
        $('#no_rm2_bpjs').val(data.id);
        $('#no_identitas').val(data.no_identitas);
        $('#nama').val(data.nama);
        $('#kelamin').val(data.kelamin);
        $('#tempat_lahir').val(data.tempat_lahir);
        // $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '');
        $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? data.tanggal_lahir : '');
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
        $('#no_rt').val(data.no_rt);
        $('#no_rw').val(data.no_rw);
        // otomatis get no polish   
        let id_pj = $('#penjamin').val();
        if ((data.id !== '') && (id_pj !== '')) {
            getNopolishPasien(data.id, id_pj, '#no_polish');
        }
        $('#etnis').val(data.id_etnis);
        if (data.id_etnis == 17) {
            $('.etnis_lainnya').show();
            $('#etnis_lainnya').val(data.etnis_lainnya);
        }
        if (data.disabilitas == 1) {
            $('#disabilitas').prop('checked', true);
            $('#disabilitas').val(data.disabilitas);
            $('.hamkom').show();
            if (data.hamkom !== '') {
                $('#hamkom').val(data.hamkom);
                if (data.hamkom == 'Lain - lain') {
                    $('.hamkom_lainnya').show();
                    $('#hamkom_lainnya').val(data.hamkom_lainnya);
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
        $('#umur_label').html(umur);
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
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        $('#nama').prop('readonly', true);
        $('#no_identitas').val() != '' ? $('#no_identitas').prop('readonly', true) : $('#no_identitas').prop('readonly', false);
        if ($('#tanggal_lahir').val() != '') {
            $('#tanggal_lahir').prop('readonly', true);
            // $('#tanggal_lahir').datepicker('remove');
        } else {
            $('#tanggal_lahir').prop('readonly', false);
            // $('#tanggal_lahir').datepicker('add');
        }

        if (accountGroup === 'Security' && data.status_rm_pasien === 'Lama') {

            $('#id-wa').val(data.id_wa);
            $('#layanan_auto').val(data.id_unit_layanan);
            $('#s2id_layanan_auto a .select2-chosen').html(data.nama_layanan);
            getDokterSpesialis(data.id_spesialis, data.id_dokter);
            let tanggal = $('#tanggal').html();
            getAntrianKlinik(tanggal, data.id_spesialis, '#antrian', '#no_antrian');


            if ((data.id !== '') && (id_pj !== '')) {
                getNopolishPasien(data.id, id_pj, '#no_polish');
            }

            let jenisBayar = '';

            $('#penjamin').val('');
            $('#s2id_penjamin a .select2-chosen').html('');

            if (data.cara_bayar !== null | data.cara_bayar !== '') {

                $('#cara_bayar').val(data.cara_bayar);

                jenisBayar = data.cara_bayar;

                if (jenisBayar !== 'Tunai') {
                    $('.penjamin_group, .asuransi_field').show();
                    if ((jenisBayar === 'Karyawan') | (jenisBayar === 'Gratis')) {
                        $('.asuransi_field').hide();
                    }

                    $('#penjamin').val(data.id_penjamin);

                    if (data.id_penjamin !== null | data.id_penjamin !== '') {

                        dataJenisPenjamin(data.id_penjamin);

                    }

                } else {
                    $('.penjamin_group').hide();
                    $('.asuransi_field').hide();
                }

            }


            $('#daftar-wa').val('daftar');
            $('#no_rujukan').val(data.no_rujukan);
            $('#statuspasien').val(data.status_pasien);
            $('#no_rt').val(data.no_rt);
            $('#no_rw').val(data.no_rw);
            $('#no_rumah').val(data.no_rumah);
            $('#kode_pos').val(data.kode_pos);
            $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);

            $('#kelamin, #tempat_lahir, #telp').prop('disabled', false); // dibuka agar pasien bisa merubah sendiri

            if (data.id_etnis == null) {
                $('#provinsi, #kabupaten, #kecamatan, #kelurahan, #etnis').prop('disabled', false);
            } else {
                $('#provinsi, #kabupaten, #kecamatan, #kelurahan, #etnis').prop('disabled', true);
            }

            $('#disabilitas').attr('disabled', true);
            $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
        }
        if (accountGroup === 'Security' && data.status_rm_pasien === 'Baru') {
            $('#layanan_auto').val(data.id_unit_layanan);
            $('#s2id_layanan_auto a .select2-chosen').html(data.nama_layanan);
            getDokterSpesialis(data.id_spesialis, data.id_dokter);
            let tanggal = $('#tanggal').html();
            getAntrianKlinik(tanggal, data.id_spesialis, '#antrian', '#no_antrian');

            if ((data.id !== '') && (data.id_penjamin !== '')) {
                getNopolishPasien(data.id, data.id_penjamin, '#no_polish');
            }

            let jenisBayar = '';

            $('#penjamin').val('');
            $('#s2id_penjamin a .select2-chosen').html('');

            if (data.cara_bayar !== null | data.cara_bayar !== '') {

                $('#cara_bayar').val(data.cara_bayar);

                jenisBayar = data.cara_bayar;

                if (jenisBayar !== 'Tunai') {
                    $('.penjamin_group, .asuransi_field').show();
                    if ((jenisBayar === 'Karyawan') | (jenisBayar === 'Gratis')) {
                        $('.asuransi_field').hide();
                    }

                    $('#penjamin').val(data.id_penjamin);

                    if (data.id_penjamin !== null | data.id_penjamin !== '') {

                        dataJenisPenjamin(data.id_penjamin);

                    }

                } else {
                    $('.penjamin_group').hide();
                    $('.asuransi_field').hide();
                }


            }

            $('#daftar-wa').val('daftar');
            $('#id-wa').val(data.id_wa);
            $('#no_rujukan').val(data.no_rujukan);
            $('#statuspasien').val(data.status_pasien);
            $('#no_rt').val(data.no_rt);
            $('#no_rw').val(data.no_rw);
            $('#no_rumah').val(data.no_rumah);
            $('#kode_pos').val(data.kode_pos);
            $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);

            $('#kelamin, #tempat_lahir, #telp').prop('disabled', false); // dibuka agar pasien bisa merubah sendiri

            if (data.id_etnis == null) {
                $('#provinsi, #kabupaten, #kecamatan, #kelurahan, #etnis').prop('disabled', false);
            } else {
                $('#provinsi, #kabupaten, #kecamatan, #kelurahan, #etnis').prop('disabled', true);
            }

            $('#disabilitas').attr('disabled', true);
            $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
        }
    }

    function dataJenisPenjamin(id) {

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/data_jenis_penjamin') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#s2id_penjamin a .select2-chosen').html((data.nama !== null | data.nama !== '') ? data.nama : '');

            }
        });

    }

    function fillDataAntrean(data) {

        $('#layanan_auto').select2('readonly', true);
        $('#dokter').prop('disabled', true);

        $('#no_rm_bpjs').val('');
        $('#no_rm2_bpjs').val('');
        $('#no_identitas').val('');
        $('#nama').val('');
        $('#kelamin').val('');
        $('#tempat_lahir').val('');
        $('#tanggal_lahir').val('');
        $('#alamat').val('');
        $('#telp').val('');
        $('#kelurahan').val('');
        $('#agama').val('');
        $('#goldarah').val('');
        $('#pendidikan').val('');
        $('#pekerjaan').val('');
        $('#hamkom').val('');
        $('#pernikahan').val('');
        $('#ayah').val('');
        $('#ibu').val('');
        $('#cara_bayar').val((data.status_jkn === 'JKN') ? 'Asuransi' : 'Tunai');

        $('#penjamin').val('');
        $('#s2id_penjamin a .select2-chosen').html('');

        if (data.status_jkn === 'JKN') {

            $('#penjamin').val(1);

            if (data.jenis_penjamin !== null | data.jenis_penjamin !== '') {

                dataJenisPenjamin(1);

            }

            if (data.no_kartu !== null | data.no_kartu !== '') {

                $('#no_polish').val(data.no_kartu);

            }

            if (data.no_referensi !== null | data.no_referensi !== '') {

                $('#no_rujukan').val(data.no_referensi);

            }

            if (data.status_jkn === 'JKN') {
                $('.penjamin_group, .asuransi_field').show();
            } else {
                $('.penjamin_group').hide();
                $('.asuransi_field').hide();
            }

        } else {

            $('#penjamin').val('');
            $('#s2id_penjamin a .select2-chosen').html('');
            $('#no_polish, #no_rujukan').val('');
            $('.penjamin_group').hide();
            $('.asuransi_field').hide();

        }

        getBPJSSpesialis(data.kode_bpjs_poli, data.kode_bpjs_dokter);

        // otomatis get no polish
        $('#etnis').val('');

        if (data.kebutuhan === '1') {
            $('#disabilitas').prop('checked', true);
            $('#disabilitas').val(data.kebutuhan);

            $('.hamkom').show();

        } else {
            $('#disabilitas').prop('checked', false);
            $('#disabilitas').val('');

            $('.hamkom').hide();
            if (data.hamkom === '') {
                $('#hamkom').val('');
            }
        }

        $('#umur_label').html('');

        if (data.id !== null | data.id !== '') {

            $.ajax({
                type: 'GET',
                url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/data_pasien_antrean') ?>',
                data: 'id=' + data.id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    $('#no_rm_bpjs').val(data.id);
                    $('#no_rm2_bpjs').val(data.id);
                    $('#no_identitas').val(data.no_identitas);
                    $('#nama').val(data.nama);
                    $('#kelamin').val(data.kelamin);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    // $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '');
                    $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? data.tanggal_lahir : '');
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
                    $('#no_rm').val(data.id);
                    $('#s2id_no_rm a .select2-chosen').html(data.id);
                    // otomatis get no polish   
                    let id_pj = $('#penjamin').val();
                    if ((data.id !== '') && (id_pj !== '')) {
                        getNopolishPasien(data.id, id_pj, '#no_polish');
                    }
                    $('#etnis').val(data.id_etnis);
                    if (data.id_etnis == 17) {
                        $('.etnis_lainnya').show();
                        $('#etnis_lainnya').val(data.etnis_lainnya);
                    }
                    if (data.disabilitas == 1) {
                        $('#disabilitas').prop('checked', true);
                        $('#disabilitas').val(data.disabilitas);
                        $('.hamkom').show();
                        if (data.hamkom !== '') {
                            $('#hamkom').val(data.hamkom);
                            if (data.hamkom == 'Lain - lain') {
                                $('.hamkom_lainnya').show();
                                $('#hamkom_lainnya').val(data.hamkom_lainnya);
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
                    $('#umur_label').html(umur);
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

                }
            });

        }

        resetAllLogoProfilPasien();

    }

    function fillDataPasienLama(data) {
        $('#no_rm_bpjs').val(data.id);
        $('#no_identitas').val(data.no_identitas);
        $('#nama').val(data.nama);
        $('#kelamin').val(data.kelamin);
        $('#tempat_lahir').val(data.tempat_lahir);
        // $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '');
        $('#tanggal_lahir').val((data.tanggal_lahir !== null) ? data.tanggal_lahir : '');
        $('#alamat').val(data.alamat);
        $('#goldarah').val(data.gol_darah);
        $('#agama').val(ucwords(data.agama.toLowerCase()));
        $('#telp').val(data.telp);
        $('#pendidikan').val(data.id_pendidikan);
        $('#pekerjaan').val(data.id_pekerjaan);

        let umur = hitungUmur(data.tanggal_lahir);
        $('#umur_label').html(umur);
    }

    // Konfirmasi Simpan Data
    function konfirmasiSimpanDataPendaftaran() {
        if ($('#domisili').val() == '') {
            syams_validation('#domisili', 'Silahkan pilih domisili terlebih dahulu');
            return false;
        }

        if ($('#no_identitas').val() === '') {
            syams_validation('#no_identitas', 'Silahkan isi NIK pasien');
            $('#telp').focus();
            return false;
        }

        if ($('#telp').val() === '') {
            syams_validation('#telp', 'Silahkan isi No Telepon terlebih dahulu');
            $('#telp').focus();
            return false;
        }

        const regexNoHp = /^(\+62|62|0)8[1-9][0-9]{6,10}$/gm;
        if (!regexNoHp.test($('#telp').val())) {
            syams_validation('#telp', 'Format No Telepon tidak valid');
            $('#telp').focus();
            return false;
        }

        const regexNik = /^\d{16}$/gm;
        if (!regexNik.test($('#no_identitas').val())) {
            syams_validation('#no_identitas', 'Format NIK tidak valid');
            $('#no_identitas').focus();
            return false;
        }

        if ($('#no_rt').val() === '') {
            syams_validation('#no_rt', 'Silahkan isi No RT terlebih dahulu');
            $('#no_rt').focus();
            return false;
        }

        if ($('#no_rw').val() === '') {
            syams_validation('#no_rw', 'Silahkan isi No RW terlebih dahulu');
            $('#no_rw').focus();
            return false;
        }

        if ($('#penjamin').val() === '1') {

            if ($('#no_polish').val() === '') {

                syams_validation('#no_polish', 'Silahkan isi No Kartu BPJS terlebih dahulu');
                return false;
                $('#no_polish').focus();

            }

            if ($('#no_rujukan').val() === '') {

                syams_validation('#no_rujukan', 'Silahkan isi No Rujukan terlebih dahulu');
                return false;
                $('#no_rujukan').focus();

            }

        }

        klik = null;
        bootbox.dialog({
            message: "Anda yakin akan mengentri pendaftaran ?",
            title: "Simpan Pendaftaran Poliklinik",
            buttons: {
                batal: {
                    label: '<i class="fa fa-refresh"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fa fa-check"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanDataPendaftaran();
                    }
                }
            }
        });
    }

    // Simpan Data Pendaftaran
    function simpanDataPendaftaran() {

        //Wa Security
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (accountGroup === 'Security') {
            $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', false);
            $('#disabilitas').attr('disabled', false);
            $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', false);
        }
        $('#dokter').prop('disabled', false);

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pendaftaran/api/pendaftaran/simpan_pendaftaran') ?>',
            data: $('#form_pendaftaran').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.validasi == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    showErrorValidate('#no_identitas', 'no_identitas', data);
                    showErrorValidate('#nama', 'nama', data);
                    showErrorValidate('#kelamin', 'kelamin', data);
                    showErrorValidate('#tanggal_lahir', 'tanggal_lahir', data);
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
                    showErrorValidate('#layanan_auto', 'layanan', data);
                    showErrorValidate('#penjamin', 'penjamin', data);

                    //Wa Security
                    let accountGroup = "<?= $this->session->userdata('account_group') ?>";
                    if (accountGroup === 'Security') {
                        $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);
                        $('#disabilitas').attr('disabled', true);
                        $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status == false) {
                        bootbox.dialog({
                            message: data.message,
                            title: "Pendaftaran Gagal",
                            buttons: {
                                batal: {
                                    label: '<i class=" fas fa-times-circle"></i> Close',
                                    className: "btn-danger",
                                    callback: function() {

                                    }
                                }

                            }
                        });
                    } else {
                        messageAddSuccess();
                        //Wa Security
                        let statusDaftar = $('#daftar-wa').val();
                        if (accountGroup === 'Security' && statusDaftar === 'daftar') {
                            let idWa = '';
                            idWa = $('#id-wa').val();
                            if (idWa !== null) {
                                let idData = data.id;
                                $.ajax({
                                    type: 'POST',
                                    url: '<?= base_url('pendaftaran/api/pendaftaran/simpan_daftar_wa') ?>',
                                    data: $('#form_pendaftaran').serialize(),
                                    cache: false,
                                    dataType: 'JSON',
                                    beforeSend: function() {
                                        showLoader();
                                    },
                                    success: function(data) {
                                        // getListPendaftaran(1, idData);       
                                        // resetAllForm();      
                                        $('#modal_pendaftaran').modal('hide');
                                    },
                                    complete: function() {
                                        hideLoader();
                                    },
                                    error: function(e) {
                                        swalAlert('warning', 'Validasi', 'Gagal melakukan pendaftaran, silahkan hubungi IT Management');
                                        if (accountGroup === 'Security') {
                                            $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);
                                            $('#disabilitas').attr('disabled', true);
                                            $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                                        }
                                    }
                                });
                            }
                        }

                        if (accountGroup === 'Security') {
                            cariDataPendaftaran(); // Untuk get pasien terakhr daftar, pencarian by NIK
                        } else {
                            getListPendaftaran(1, data.id);
                        }

                        resetAllForm();
                        $('#modal_pendaftaran').modal('hide');
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalAlert('warning', 'Validasi', 'Gagal melakukan pendaftaran, silahkan hubungi IT Management');
                //Wa Security
                if (accountGroup === 'Security') {
                    $('#bt_cek_nik, #no_identitas, #bt_cek_nik, #nama, #statuspasien, #kelamin, #tempat_lahir, #tanggal_lahir, #alamat, #no_rt, #no_rw, #no_rumah, #kode_pos, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #goldarah, #pendidikan, #pekerjaan, #pernikahan, #ayah, #ibu, #telp, #etnis, #cara_bayar, #no_polish, #no_rujukan, #no_sep, #bt_buat_sep, #asal_masuk, #nadis_perujuk, #keterangan_asal_masuk, #nik_pjwb, #nama_pjwb, #kelamin_pjwb, #telp_pjwb, #alamat_pjwb, #nik_pjwb_finansial, #nama_pjwb_finansial, #kelamin_pjwb_finansial, #telp_pjwb_finansial, #alamat_pjwb_finansial, #salin-pgjb').prop('disabled', true);
                    $('#disabilitas').attr('disabled', true);
                    $('#no_rm, #layanan_auto, #penjamin, #instansi_rujukan').select2('readonly', true);
                }
            }
        });
    }


    function getListPendaftaran(p, id) {
        $('#page_now').val(p);
        let filter = '&layanan=' + $('#klinik').val() + '&shifpoli=' + $('#shifpoli').val();

        var idd = ''
        if (id !== undefined || id !== '') {
            id = '&id=' + id;
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/get_list_pendaftaran_poli') ?>/page/' + p + '/jenis_pendaftaran/Poliklinik',
            data: $('#form_search_pendaftaran').serialize() + filter + idd,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPendaftaran(p - 1, '');
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#jml_pasien_baru').html(data.pasien_baru);
                $('#jml_pasien_lama').html(data.pasien_lama);
                $('#jml_pasien_batal').html(data.pasien_batal);

                $('#table_data tbody').empty();
                let html = '';
                let status = '';
                let status_terlayani = '';
                let btn_sep = '';
                let disabled = '';

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let detail = v.id_layanan_pendaftaran + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v
                        .id_dokter + '#' + v.jenis_layanan + '#' + v
                        .id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#rajal';

                    if (v.status === 'Baru') {
                        status = '<h5><span class="label label-info"><i class="fas fa-plus-circle"></i> Pasien ' + v.status + '</span></h5>';
                    } else if (v.status === 'Lama') {
                        status = '<h5><span class="label label-success"><i class="fas fa-history"></i> Pasien ' + v.status + '</span></h5>';
                    } else if (v.status === 'Batal') {
                        status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle"></i> ' + v.status + '</span></h5>';
                    }

                    if (v.status_terlayani === 'Belum') {
                        status_terlayani = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                    } else if (v.status_terlayani === 'Batal') {
                        status_terlayani = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                    } else {
                        status_terlayani = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
                    }

                    disabled = '';
                    if (v.tanggal_keluar !== null) {
                        disabled = 'disabled';
                    }

                    btn_sep = '';
                    if ((v.no_sep === null) && (v.no_polish !== '') && (v.cara_bayar === 'Asuransi')) {
                        btn_sep = '<button type="button" title="Klik untuk membuat SEP" class="btn btn-secondary btn-xs waves-effect waves-light nowrap mr-1" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id_layanan_pendaftaran + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.klinik + '\', \'' + v.no_rujukan + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.dokter + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</button> ';
                    } else if ((v.no_sep !== null) && (v.no_polish !== '')) {
                        btn_sep = '<button type="button" title="Klik untuk cetak SEP" class="btn btn-secondary btn-xs waves-effect waves-light nowrap mr-1" onclick="cetakNotaSEP(\'' + v.no_sep + '\')"><i class="fas fa-print m-r-5"></i> Cetak SEP</button> ';
                    } else {
                        btn_sep = '';
                    }

                    let details = v.id + '#' + v.nama + '#' + v.no_register + '#' + v.telp;

                    title_alasanbatal = '';
                    if (v.status === 'Batal') {
                        if (v.alasan_batal !== null) {
                            title_alasanbatal = 'title="Alasan Batal : ' + v.alasan_batal + '"';
                        } else {
                            title_alasanbatal = '';
                        }
                    }

                    let account_group = "<?= $this->session->userdata('account_group') ?>";
                    let buttonOpsion = '';
                    let buttonResetBatal = '';
                    if (account_group === 'Security') {
                        buttonOpsion =
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakBerkasPendaftaran(\'' + v.id + '\', \'' + v.id_pasien + '\', ' + data.page + ')"><i class="fas fa-print"></i> Cetak Berkas Pendaftaran</a>';
                    } else {
                        buttonOpsion =
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPendaftaran(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-eye"></i> Detail Pendaftaran</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakBerkasPendaftaran(\'' + v.id + '\', \'' + v.id_pasien + '\', ' + data.page + ')"><i class="fas fa-print"></i> Cetak Berkas Pendaftaran</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormRekamMedis(\'' + detail + '\', \'' + v.id_pasien + '\', ' + data.page + ', ' + v.id + ',' + v.id_layanan_pendaftaran + ')"><i class="fas fa-print"></i> Cetak Form Rekam Medis</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoPolish(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_polish !== null) ? v.no_polish : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit No. Kartu BPJS</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoSEP(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit No. SEP BPJS</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editPenaggungJawab(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit Penangung Jawab</a>' +
                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalPendaftaran(\'' + v.id + '\', ' + data.page + ', ' + v.id_resep + ')"><i class="fas fa-trash"></i> Batal Pendaftaran</a>';
                    }
                    if (v.status === 'Batal') {
                        if (account_group === 'Admin' || account_group === 'Admin Rekam Medis') {
                            buttonResetBatal =
                                '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="resetBatalPendaftaran(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-undo"></i> Reset Batal Pendaftaran</a>';
                            buttonOpsion += buttonResetBatal;
                        }
                    }

                    let background_color = '';
                    v.no_identitas.length == 16 ? '' : background_color = 'style="background-color:#f8f9c0;"';

                    let tanggal_keluar = ((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '');
                    let onclik_tanggal_keluar = '';
                    if (account_group === 'Admin') {
                        onclik_tanggal_keluar = `onclick="editTglKeluar('${v.id}', '${tanggal_keluar}')" style="text-decoration: underline"`;
                    }

                    let klinik = ((v.shift_poli !== null) ? '<b>' + v.shift_poli + '</b> - ' : '') + ((v.klinik !== null) ? v.klinik : '');

                    let html = '<tr ' + background_color + '>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_register + '</td>' +
                        '<td class="center">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td class="center">' + ((v.no_identitas !== null) ? v.no_identitas : '') + '</td>' +
                        '<td class="center">' + v.id_pasien + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td class="center"><span class="pointer" ' + onclik_tanggal_keluar + ' title="Klik untuk mengedit tanggal keluar">' + tanggal_keluar + '</span></td>' +
                        '<td>' + klinik + '</td>' +
                        '<td>' + v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' (' + v.penjamin + ')' : '') + '</td>' +
                        '<td>' + ((v.no_sep !== null) ? v.no_sep : '') + '</td>' +
                        '<td>' + ((v.no_rujukan !== null) ? v.no_rujukan : '') + '</td>' +
                        '<td class="nowrap center">' + status + '</td>' +
                        '<td class="nowrap center" ' + title_alasanbatal + ' >' + status_terlayani + '</td>' +
                        '<td>' + v.nama_user + '</td>' +
                        '<td class="right" style="display:flex;float:right">' +
                        btn_sep +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        buttonOpsion +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }

    function editTglKeluar(id, tanggal_keluar) {
        bootbox.dialog({
            title: 'Edit Tanggal Keluar',
            message: /* html */ `
                <div class="row">
                    <div class="col-lg-12">
                        <form class="horizontal" id="form-edit-tanggal-keluar">
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="text" name="waktu" id="tanggal-keluar-input-edit" value="${tanggal_keluar}" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            `,

            buttons: {
                success: {
                    label: '<i class="fas fa-save mr-2"></i>Simpan',
                    className: 'btn-info',
                    callback: function() {
                        let waktuInputEdit = $('#tanggal-keluar-input-edit').val();
                        simpanWaktuTglKeluar(id, waktuInputEdit);
                    }
                }
            }
        });

        $('#tanggal-keluar-input-edit').datetimepicker({
            format: 'DD/MM/YYYY HH:mm'
        }).on('changeDate', function() {
            $(this).datetimepicker('hide');
        });

        $('#form-edit-tanggal-keluar').submit(function() {
            let waktuInputEdits = $('#tanggal-keluar-input-edit').val();
            simpanWaktuTglKeluar(id, waktuInputEdits);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanWaktuTglKeluar(id, waktu) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_waktu_tanggal_keluar") ?>',
            data: 'id=' + id + '&waktu=' + datetime2mysql(waktu),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val(), '');
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function cariDataPendaftaran() {
        getListPendaftaran(1, '');
        $('#modal_search_pendaftaran').modal('hide');
    }

    function paging(p, tab) {
        if (tab == 1) {
            getListPendaftaran(p, '');
        } else if (tab == 2) {
            pencarianAdvancedPasienList(p);
        }
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
                    $('#id_pendaftaran_pjwb').val(hasil.id);
                    $('#s2id_instansi_rujukan_edit a .select2-chosen').html(hasil.instansi_perujuk);
                    $('#instansi_rujukan_edit').val(hasil.id_instansi_perujuk);
                    $('#nadis_perujuk_edit').val(hasil.nadis_perujuk);
                    $('#nik_pjwb_edit').val(hasil.nik_pjwb);
                    $('#nama_pjwb_edit').val(hasil.nama_pjwb);
                    $('#kelamin_pjwb_edit').val(hasil.kelamin_pjwb);
                    $('#alamat_pjwb_edit').val(hasil.alamat_pjwb);
                    $('#tgl_lahir_pjwb_edit').val(hasil.tgl_lahir_pjwb);
                    $('#hubungan_pjwb_edit').val(hasil.hubungan_pjwb);
                    $('#telp_pjwb_edit').val(hasil.telp_pjwb);
                    $('#nik_pjwb_finansial_edit').val(hasil.nik_pjwb_finansial);
                    $('#nama_pjwb_finansial_edit').val(hasil.nama_pjwb_finansial);
                    $('#kelamin_pjwb_finansial_edit').val(hasil.kelamin_pjwb_finansial);
                    $('#alamat_pjwb_finansial_edit').val(hasil.alamat_pjwb_finansial);
                    $('#telp_pjwb_finansial_edit').val(hasil.telp_pjwb_finansial);

                    $('#modal_edit_pjawab').modal('show');
                    $('#modal_edit_pjawab_label').html('Form Edit Pendaftaran');
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

        $('#btn_cetak_label_ranap').click(function() {
            cetakLabelRanap(id_pasien);
        });
    }

    function cetakLabelRanap(id_pasien) {
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('medical_record/cetak_label_ranap/') ?>' + id_pasien, 'Cetak Label Ranap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

    function cetakResumeMedis(id) {
        bootbox.dialog({
            message: "Apakah yang menandatangani adalah pasien sendiri?",
            title: "Tanda Tangan Pasien",
            buttons: {
                tidak: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        window.open('<?= base_url('pendaftaran_poli/cetak_resume_medis/') ?>' + id + '/tidak', 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
                    }
                },
                ya: {
                    label: '<i class="fas fa-check"></i>  Ya',
                    className: "btn-success",
                    callback: function() {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        window.open('<?= base_url('pendaftaran_poli/cetak_resume_medis/') ?>' + id + '/ya', 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
                    }
                }
            }
        });
    }


    // SPR XXNX +++ 
    function cetakSuratPengantarRawat(details, id) {
        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/surat_pengantar_rawat') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetSuratPengantarRawat();
                $('#modal-surat-pengantar-rawat-title').html(`<b>Form Surat Pengantar Rawat</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-layanan-pendaftaran-spr').val(detail[0]);
                $('#id-pendaftaran-spr').val(id);
                $('#id-users').val(data.id_users);

                if (data.operasi_spr === '1') {
                    document.getElementById("operasi-spr").checked = true;
                }
                if (data.odc_spr === '1') {
                    document.getElementById("odc-spr").checked = true;
                }
                if (data.rawat_inap_spr === '1') {
                    document.getElementById("rawat-inap-spr").checked = true;
                }


                // OLD
                // if (data.is_pasien_spr === '1') {
                // 	document.getElementById("is-pasien-spr-1").checked = true;
                // 	// Disabled fields
                // 	$("#nama-pasien-spr").prop("disabled", true);
                // 	$("#j-spr-1").prop("disabled", true);
                // 	$("#j-spr-2").prop("disabled", true);
                // 	$("#no-rm-spr").prop("disabled", true);
                // 	$("#umur-spr").prop("disabled", true);
                // } else if (data.is_pasien_spr === '0') {
                // 	document.getElementById("is-pasien-spr-2").checked = true;
                // 	// Undisabled fields
                // 	$("#nama-pasien-spr").prop("disabled", false);
                // 	$("#j-spr-1").prop("disabled", false);
                // 	$("#j-spr-2").prop("disabled", false);
                // 	$("#no-rm-spr").prop("disabled", false);
                // 	$("#umur-spr").prop("disabled", false);
                // }

                // BARU
                if (data.is_pasien_spr === '1') {
                    document.getElementById("is-pasien-spr-1").checked = true;
                    // Disabled fields
                    $("#nama-pasien-spr").prop("disabled", true);
                    $("#j-spr-1").prop("disabled", true);
                    $("#j-spr-2").prop("disabled", true);
                    $("#no-rm-spr").prop("disabled", true);
                    $("#umur-spr").prop("disabled", true);
                } else if (data.is_pasien_spr === '0') {
                    // document.getElementById("is-pasien-spr-2").checked = true;
                    // Undisabled fields
                    $("#nama-pasien-spr").prop("disabled", true);
                    $("#j-spr-1").prop("disabled", true);
                    $("#j-spr-2").prop("disabled", true);
                    $("#no-rm-spr").prop("disabled", true);
                    $("#umur-spr").prop("disabled", true);
                }
                if (data.j_spr == 'Laki-laki') {
                    document.getElementById("j-spr-1").checked = true;
                } else if (data.j_spr == 'Perempuan') {
                    document.getElementById("j-spr-2").checked = true;
                }

                $('#diagnosis-spr').val(data.diagnosis_spr);
                if (data.infeksi_spr === '1') {
                    document.getElementById("infeksi-spr").checked = true;
                }
                if (data.non_infeksi_spr === '1') {
                    document.getElementById("non-infeksi-spr").checked = true;
                }
                $('#dokter-spr').val(data.dokter_spr);
                $('#s2id_dokter-spr a .select2c-chosen').html(data.nama_dokter_1);
                $('#jto-spr').val(data.jto_spr);
                $('#gto-spr').val(data.gto_spr);
                if (data.cito_spr === '1') {
                    document.getElementById("cito-spr").checked = true;
                }
                if (data.tidak_cito_spr === '1') {
                    document.getElementById("tidak-cito-spr").checked = true;
                }
                if (data.icu_spr === '1') {
                    document.getElementById("icu-spr").checked = true;
                }
                if (data.hcu_spr === '1') {
                    document.getElementById("hcu-spr").checked = true;
                }
                if (data.pcu_spr === '1') {
                    document.getElementById("pcu-spr").checked = true;
                }
                if (data.nicu_spr === '1') {
                    document.getElementById("nicu-spr").checked = true;
                }
                if (data.vk_spr === '1') {
                    document.getElementById("vk-spr").checked = true;
                }
                if (data.perinatologi_spr === '1') {
                    document.getElementById("perinatologi-spr").checked = true;
                }
                if (data.ruang_perawatan_spr === '1') {
                    document.getElementById("ruang-perawatan-spr").checked = true;
                }
                $('#rp-spr').val(data.rp_spr);
                if (data.isolasi_spr === '1') {
                    document.getElementById("isolasi-spr").checked = true;
                }
                if (data.lain_lain_spr === '1') {
                    document.getElementById("lain-lain-spr").checked = true;
                }
                $('#ll-spr').val(data.ll_spr);
                $('#tanggal-dokter-spr').val(data.tanggal_dokter_spr);
                $('#ttd-dokter-spr').val(data.ttd_dokter_spr);
                $('#s2id_ttd-dokter-spr a .select2c-chosen').html(data.nama_dokter_2);
                if (data.ceklis_dokter_spr === '1') {
                    document.getElementById("ceklis-dokter-spr").checked = true;
                }
                $('#catatan-pendaftaran-spr').val(data.catatan_pendaftaran_spr);
                $('#tanggal-petugas-spr').val(data.tanggal_petugas_spr);
                if (data.ceklis_petugas_spr === '1') {
                    document.getElementById("ceklis-petugas-spr").checked = true;
                }
                $('#id-petugas-pendaftaran-spr').val(data.id_petugas_pendaftaran_spr);
                $('#s2id_id-petugas-pendaftaran-spr a .select2c-chosen').html(data.nama_petugas_pendaftaran);
                $('#modal_surat_pengantar_rawat').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // SPR XXNX +++
    function resetSuratPengantarRawat() {
        // console.log('test dobble9');
        // $('#btn_surat_pengantar_rawat').unbind('click');   // GUnakan BTN ini JIka ada yang komplen Fungsi untuk mereset semua Data yang di tampilkan
        $('#form_surat_keterangan_pengantar_rawat').val('');
        $('#id-layanan-pendaftaran-spr').val('');
        $('#id-users').val('');
        $('#nama-pasien-spr').val('');
        $('#no-rm-spr').val('');
        $('#umur-spr').val('');
        $('#diagnosis-spr').val('');
        $('#dokter-spr').val('');
        $('#jto-spr').val('');
        $('#gto-spr').val('');
        $('#rp-spr').val('');
        $('#ll-spr').val('');
        $('#tanggal-dokter-spr').val('');
        $('#ttd-dokter-spr').val('');
        $('#catatan-pendaftaran-spr').val('');
        $('#tanggal-petugas-spr').val('');
        $('#id-petugas-pendaftaran-spr').val('');

        document.getElementById("operasi-spr").checked = false;
        document.getElementById("odc-spr").checked = false;
        document.getElementById("rawat-inap-spr").checked = false;
        document.getElementById("j-spr-1").checked = false;
        document.getElementById("j-spr-2").checked = false;
        document.getElementById("infeksi-spr").checked = false;
        document.getElementById("non-infeksi-spr").checked = false;
        document.getElementById("cito-spr").checked = false;
        document.getElementById("tidak-cito-spr").checked = false;
        document.getElementById("icu-spr").checked = false;
        document.getElementById("hcu-spr").checked = false;
        document.getElementById("pcu-spr").checked = false;
        document.getElementById("nicu-spr").checked = false;
        document.getElementById("vk-spr").checked = false;
        document.getElementById("perinatologi-spr").checked = false;
        document.getElementById("ruang-perawatan-spr").checked = false;
        document.getElementById("isolasi-spr").checked = false;
        document.getElementById("lain-lain-spr").checked = false;
        document.getElementById("ceklis-dokter-spr").checked = false;
        document.getElementById("ceklis-petugas-spr").checked = false;

        // $("#nama-pasien-spr").prop("disabled", false);
        // $("#j-spr-1").prop("disabled", false);
        // $("#j-spr-2").prop("disabled", false);
        // $("#no-rm-spr").prop("disabled", false);
        // $("#umur-spr").prop("disabled", false);

        $("#nama-pasien-spr").prop("disabled", true);
        $("#j-spr-1").prop("disabled", true);
        $("#j-spr-2").prop("disabled", true);
        $("#no-rm-spr").prop("disabled", true);
        $("#umur-spr").prop("disabled", true);
    }



    function cetakTataTertibPasien(details) {
        let detail = details.split('#');

        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('pendaftaran_poli/cetak_tata_tertib_pasien/') ?>' + detail[0], 'Cetak Tata Tertib Pasien', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakSuratKeteranganKematian(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalSuratKeteranganKematian();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-pendaftaran-skk').val(detail[0]);
                $('#id-pemeriksa-skk').val(data.id_pemeriksa);
                $('#nomor-surat-kematian-skk').val(data.nomor_surat_kematian);
                $('#nomor-urut-kematian-skk').val(data.nomor_urut_kematian);
                $('#nomor-kk-skk').val(data.nomor_kk);
                $('#alamat-meninggal-skk').val(data.alamat_meninggal);
                $('#kode-kematian-skk').val(data.kode_kematian);
                $('#yang-melapor-skk').val(data.yang_melapor);
                $('#ktp-skk').val(data.ktp);
                $('#waktu-pemeriksaan-skk').val(datetimefmysql(data.waktu_pemeriksaan));

                $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html(data.nama_pemeriksa);

                if (data.tempat_meninggal == 'Rumah Sakit') {
                    document.getElementById("rs-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah Bersalin') {
                    document.getElementById("rb-skk").checked = true;
                } else if (data.tempat_meninggal == 'Puskesmas') {
                    document.getElementById("puskesmas-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah') {
                    document.getElementById("rumah-skk").checked = true;
                } else if (data.tempat_meninggal == 'Lain-lain') {
                    document.getElementById("lain-lain-skk").checked = true;
                }

                if (data.jenis_pemeriksaan == 'Visum') {
                    document.getElementById("visum-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Otopsi') {
                    document.getElementById("otopsi-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Tidak divisum') {
                    document.getElementById("tidak-divisum-skk").checked = true;
                }

                if (data.sebab_kematian == 'Sakit') {
                    document.getElementById("sakit-skk").checked = true;
                } else if (data.sebab_kematian == 'Bersalin') {
                    document.getElementById("bersalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Lahir Mati') {
                    document.getElementById("lahir-mati-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Lalu Lintas') {
                    document.getElementById("kecelakaan-lalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Industri') {
                    document.getElementById("kecelakaan-industri-skk").checked = true;
                } else if (data.sebab_kematian == 'Bunuh Diri') {
                    document.getElementById("bunuh-diri-skk").checked = true;
                } else if (data.sebab_kematian == 'Pembunuhan/Penganiayaan') {
                    document.getElementById("pembunuhan-skk").checked = true;
                } else if (data.sebab_kematian == 'Lain-lain') {
                    document.getElementById("lain-lain-sebab-kematian-skk").checked = true;
                } else if (data.sebab_kematian == 'Tidak Dapat Ditentukan') {
                    document.getElementById("tidak-dapat-ditentukan-skk").checked = true;
                }

                if (data.dikubur == 'Tangerang') {
                    document.getElementById("tangerang-skk").checked = true;
                } else if (data.dikubur == 'Luar Tangerang') {
                    document.getElementById("luar-tangerang-skk").checked = true;
                }

                if (data.awetkan == 1) {
                    document.getElementById("diawetkan-skk").checked = true;
                } else if (data.awetkan == 0) {
                    document.getElementById("tidak-diawetkan-skk").checked = true;
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

    function cetakVisumEtRepertum(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_visum_et_repertum') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalVisumEtRepertum();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-visum-et-repertum-title').html(`<b>Form Visum Et Repertum</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-pendaftaran-ver').val(detail[0]);
                $('#id-dokter-jaga-idg-ver').val(data.id_dokter_igd);
                $('#nomor-visum-ver').val(data.nomor_visum);
                $('#nomor-surat-ver').val(data.nomor_surat);
                $('#tahun-surat-ver').val(data.tahun_surat);
                $('#diperiksa-ver').val(datetimefmysql(data.diperiksa));
                $('#diterima-ver').val(datetimefmysql(data.diterima));
                $('#nomor-polisi-ver').val(data.nomor_polisi);
                $('#ditandatangani-oleh-ver').val(data.ditandatangani_oleh);
                $('#pangkat-ver').val(data.pangkat);
                $('#nrp-ver').val(data.nrp);
                $('#berat-badan-ver').val(data.berat_badan);
                $('#panjang-badan-ver').val(data.panjang_badan);
                $('#warna-kulit-ver').val(data.warna_kulit);
                $('#warna-pelangi-mata-ver').val(data.warna_pelangi_mata);
                $('#warna-rambut-ver').val(data.warna_rambut);
                $('#warna-pakaian-ver').val(data.warna_pakaian);
                $('#bahan-pakaian-ver').val(data.bahan_pakaian);
                $('#merk-pakaian-ver').val(data.merk_pakaian);
                $('#ukuran-pakaian-ver').val(data.ukuran_pakaian);
                $('#gambar-lambang-pakaian-ver').val(data.gambar_lambang_pakaian);
                $('#warna-celana-ver').val(data.warna_celana);
                $('#ukuran-celana-ver').val(data.ukuran_celana);
                $('#merk-celana-ver').val(data.merk_celana);
                $('#perhiasan-ver').val(data.perhiasan);
                $('#lain-lain-identitas-pasien-ver').val(data.lain_lain_identitas_pasien);
                $('#tubuh-ver').val(data.tubuh);
                $('#anggota-gerak-atas-kanan-ver').val(data.anggota_gerak_atas_kanan);
                $('#anggota-gerak-atas-kiri-ver').val(data.anggota_gerak_atas_kiri);
                $('#anggota-gerak-bawah-kanan-ver').val(data.anggota_gerak_bawah_kanan);
                $('#anggota-gerak-bawah-kiri-ver').val(data.anggota_gerak_bawah_kiri);
                $('#alis-mata-ver').val(data.alis_mata);
                $('#bulu-mata-ver').val(data.bulu_mata);
                $('#selaput-kelopak-mata-ver').val(data.selaput_kelopak_mata);
                $('#selaput-bening-mata-ver').val(data.selaput_biji_mata);
                $('#selaput-biji-mata-ver').val(data.selaput_biji_mata);
                $('#bentuk-pupil-mata-ver').val(data.bentuk_pupil);
                $('#ukuran-pupil-mata-ver').val(data.ukuran_pupil);
                $('#garis-tengah-pupil-mata-ver').val(data.garis_tengah);
                $('#garis-kanan-pupil-mata-ver').val(data.garis_kanan);
                $('#garis-kiri-pupil-mata-ver').val(data.garis_kiri);
                $('#pelangi-mata-ver').val(data.pelangi_mata);
                $('#kesimpulan-ver').val(data.kesimpulan);
                $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html(data.nama_dokter_jaga_igd);
                $("#bulan-surat-ver").val(data.bulan_surat).change();

                if (data.ciri_rambut == 'Pendek') {
                    document.getElementById("pendek-ver").checked = true;
                } else if (data.ciri_rambut == 'Panjang') {
                    document.getElementById("panjang-ver").checked = true;
                }

                if (data.keadaan_gizi == 'Kurang') {
                    document.getElementById("kurang-ver").checked = true;
                } else if (data.keadaan_gizi == 'Cukup') {
                    document.getElementById("cukup-ver").checked = true;
                } else if (data.keadaan_gizi == 'Lebih') {
                    document.getElementById("lebih-ver").checked = true;
                }

                if (data.pakaian == 'Baju lengan panjang') {
                    document.getElementById("pakaian-lengan-panjang-ver").checked = true;
                } else if (data.pakaian == 'Baju lengan pendek') {
                    document.getElementById("pakaian-lengan-pendek-ver").checked = true;
                }

                if (data.tampak_pakaian == 'Ada darah') {
                    document.getElementById("ada-darah-ver").checked = true;
                } else if (data.tampak_pakaian == 'Tidak ada darah') {
                    document.getElementById("tidak-ada-darah-ver").checked = true;
                }

                if (data.bentuk_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = true;
                } else if (data.bentuk_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = true;
                }

                if (data.permukaan_kulit_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                } else if (data.permukaan_kulit_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                }

                if (data.lubang_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-hidung-ver").checked = true;
                } else if (data.lubang_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = true;
                }

                if (data.bentuk_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = true;
                } else if (data.bentuk_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = true;
                }

                if (data.permukaan_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = true;
                } else if (data.permukaan_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = true;
                }

                if (data.lubang_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-telinga-ver").checked = true;
                } else if (data.lubang_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = true;
                }

                if (data.bibir_atas == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bibir-atas-ver").checked = true;
                } else if (data.bibir_atas == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = true;
                }

                if (data.celana == 'Celana panjang') {
                    document.getElementById("celana-panjang-ver").checked = true;
                } else if (data.celana == 'Rok') {
                    document.getElementById("rok-ver").checked = true;
                } else if (data.celana == 'Kain') {
                    document.getElementById("kain-ver").checked = true;
                }

                if (data.tato == 'Tidak') {
                    document.getElementById("tato-tidak-ada-ver").checked = true;
                } else if (data.tato == 'Ada') {
                    document.getElementById("tato-ada-ver").checked = true;
                    $('#posisi-tato-ver').val(data.posisi_tato);
                    $("#posisi-tato-ver").prop("disabled", false);
                }

                if (data.jaringan_parut == 'Tidak') {
                    document.getElementById("jaringan-parut-tidak-ada-ver").checked = true;
                } else if (data.jaringan_parut == 'Ada') {
                    document.getElementById("jaringan-parut-ada-ver").checked = true;
                    $('#posisi-jaringan-parut-ver').val(data.posisi_jaringan_parut);
                    $("#posisi-jaringan-parut-ver").prop("disabled", false);
                }

                if (data.tahi_lalat == 'Tidak') {
                    document.getElementById("tahi-lalat-tidak-ada-ver").checked = true;
                } else if (data.tahi_lalat == 'Ada') {
                    document.getElementById("tahi-lalat-ada-ver").checked = true;
                    $('#posisi-tahi-lalat-ver').val(data.posisi_tahi_lalat);
                    $("#posisi-tahi-lalat-ver").prop("disabled", false);
                }

                if (data.tanda_lahir == 'Tidak') {
                    document.getElementById("tanda-lahir-tidak-ada-ver").checked = true;
                } else if (data.tanda_lahir == 'Ada') {
                    document.getElementById("tanda-lahir-ada-ver").checked = true;
                    $('#posisi-tanda-lahir-ver').val(data.posisi_tanda_lahir);
                    $("#posisi-tanda-lahir-ver").prop("disabled", false);
                }

                if (data.cacat_fisik == 'Tidak') {
                    document.getElementById("cacat-fisik-tidak-ada-ver").checked = true;
                } else if (data.cacat_fisik == 'Ada') {
                    document.getElementById("cacat-fisik-ada-ver").checked = true;
                    $('#posisi-cacat-fisik-ver').val(data.posisi_cacat_fisik);
                    $("#posisi-cacat-fisik-ver").prop("disabled", false);
                }

                if (data.daerah_berambut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = true;
                } else if (data.daerah_berambut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-daerah-berambut-ver").checked = true;
                    $('#kelainan-daerah-berambut-ver').val(data.kelainan_daerah_rambut);
                    $("#kelainan-daerah-berambut-ver").prop("disabled", false);
                }

                if (data.bentuk_kepala == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = true;
                } else if (data.bentuk_kepala == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = true;
                    $('#kelainan-bentuk-kepala-ver').val(data.kelainan_bentuk_kepala);
                    $("#kelainan-bentuk-kepala-ver").prop("disabled", false);
                }

                if (data.wajah == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-wajah-ver").checked = true;
                } else if (data.wajah == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-wajah-ver").checked = true;
                    $('#kelainan-wajah-ver').val(data.kelainan_wajah);
                    $("#kelainan-wajah-ver").prop("disabled", false);
                }

                if (data.leher == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-leher-ver").checked = true;
                } else if (data.leher == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-leher-ver").checked = true;
                    $('#kelainan-leher-ver').val(data.kelainan_leher);
                    $("#kelainan-leher-ver").prop("disabled", false);
                }

                if (data.bahu == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bahu-ver").checked = true;
                } else if (data.bahu == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bahu-ver").checked = true;
                    $('#kelainan-bahu-ver').val(data.kelainan_bahu);
                    $("#kelainan-bahu-ver").prop("disabled", false);
                }

                if (data.dada == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dada-ver").checked = true;
                } else if (data.dada == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dada-ver").checked = true;
                    $('#kelainan-dada-ver').val(data.kelainan_dada);
                    $("#kelainan-dada-ver").prop("disabled", false);
                }

                if (data.punggung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-punggung-ver").checked = true;
                } else if (data.punggung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-punggung-ver").checked = true;
                    $('#kelainan-punggung-ver').val(data.kelainan_punggung);
                    $("#kelainan-punggung-ver").prop("disabled", false);
                }

                if (data.perut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-perut-ver").checked = true;
                } else if (data.perut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-perut-ver").checked = true;
                    $('#kelainan-perut-ver').val(data.kelainan_perut);
                    $("#kelainan-perut-ver").prop("disabled", false);
                }

                if (data.bokong == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bokong-ver").checked = true;
                } else if (data.bokong == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bokong-ver").checked = true;
                    $('#kelainan-bokong-ver').val(data.kelainan_bokong);
                    $("#kelainan-bokong-ver").prop("disabled", false);
                }

                if (data.dubur == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dubur-ver").checked = true;
                } else if (data.dubur == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dubur-ver").checked = true;
                    $('#kelainan-dubur-ver').val(data.kelainan_dubur);
                    $("#kelainan-dubur-ver").prop("disabled", false);
                }

                $('#modal-visum-et-repertum').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function detailPendaftaran(id, p) {
        $('#table_detail tbody').empty();

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

                    $('#id_pendaftaran').val(id);
                    $('#no_rm_bpjs').val(detail.id);
                    $('#no_rm2_bpjs').val(detail.id);
                    $('#nama_detail').html(detail.nama);
                    $('#no_rm_detail').html(detail.no_rm);
                    $('#no_rm_lama_detail').html(detail.rm_lama);
                    $('#alamat_detail').html(detail.alamat);
                    $('#kelamin_detail').html(kelamin);
                    $('#tgl_lahir_umur_detail').html(umur);
                    $('#umur_detail').html(umur);
                    $('#telp_detail').html(detail.telp);

                    $('#instansi_perujuk_detail').html(detail.instansi_perujuk);
                    $('#nadis_perujuk_detail').html(detail.nadis_perujuk);

                    $('#nik_pjwb_detail').html(detail.nik_pjwb);
                    $('#nama_pjwb_detail').html(detail.nama_pjwb);
                    $('#kelamin_pjwb_detail').html(detail.kelamin_pjwb);
                    $('#alamat_pjwb_detail').html(detail.alamat_pjwb);
                    $('#telp_pjwb_detail').html(detail.telp_pjwb);

                    $('#nik_pjwb_detail_finansial').html(detail.nik_pjwb_finansial);
                    $('#nama_pjwb_detail_finansial').html(detail.nama_pjwb_finansial);
                    $('#kelamin_pjwb_detail_finansial').html(detail.kelamin_pjwb_finansial);
                    $('#alamat_pjwb_detail_finansial').html(detail.alamat_pjwb_finansial);
                    $('#telp_pjwb_detail_finansial').html(detail.telp_pjwb_finansial);

                    let cekDataTrue = '<i class="fas fa-fw fa-check m-l-5 text-success" title="Data Sesuai"></i>';
                    let cekDataFalse = '<i class="fas fa-fw fa-times m-l-5 text-danger" title="Data Tidak Sesuai"></i>';
                    let getCekIcon = (flag) => flag ? cekDataTrue : cekDataFalse;

                    let htmlAntrian = `
                            <b>Kode Booking:</b> ${detail.kode_booking_antrian_bpjs ?? '-'} ${getCekIcon(detail.cek_kode_booking)}<br>
                            <b>No RM:</b>  ${detail.id_pasien_antrian_bpjs ?? '-'} ${getCekIcon(detail.cek_id_pasien)}<br>
                            <b>No. Kartu BPJS:</b>  ${detail.no_kartu_antrian_bpjs ?? '-'} ${getCekIcon(detail.cek_no_polish)}<br>
                            <b>No. Rujukan:</b>  ${detail.no_referensi ?? '-'} ${getCekIcon(detail.cek_no_rujukan)}`;
                    $('#data_antrian_bpjs').html(htmlAntrian);

                    // Layanan
                    let html = '';
                    let bt_antri = '';
                    let no_polish = '';
                    let bt_edit_rujuk = '';
                    let bt_edit_klinik = '';
                    let bt_edit_hakkelas = '';
                    let account_group = '<?= $this->session->userdata('account_group') ?>';

                    if (data.layanan.length > 0) {
                        $.each(data.layanan, function(i, v) {
                            if (v.jenis_layanan == 'Poliklinik') {
                                bt_antri = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + detail.id + ',' + v.id + ')"><i class="fa fa-print"></i> Cetak</button>';
                                bt_edit_hakkelas = '<button title="Klik untuk menampilkan dialog ubah Hak Kelas" type="button" class="btn btn-secondary btn-xxs" onclick="editHakKelas(' + v.id_pendaftaran + ',\'' + detail.hak_kelas + '\')"><i class="fa fa-edit"></i> Edit Hak Kelas</button>';
                            } else {
                                bt_antri = '';
                                bt_edit_hakkelas = '';
                            }

                            if (account_group === 'Admin' || account_group === 'Pendaftaran' || account_group === 'Admin Rekam Medis' || account_group === 'Rekam Medis') {
                                bt_edit_klinik = `<button title="Klik untuk menampilkan dialog ubah klinik" type="button" class="btn btn-secondary btn-xxs" onclick="editKlinik(${v.id}, '${v.layanan}', ${v.id_unit_layanan})"><i class="fa fa-edit"></i> Edit</button>`;
                            }


                            bt_edit_rujuk = '<button title="Klik untuk mengedit nomor rujukan" type="button" class="btn btn-secondary btn-xxs" onclick="editNoRujukan(' + v.id_pendaftaran + ',\'' + v.no_rujukan + '\')"><i class="fa fa-edit"></i> Edit</button>';


                            html = '<tr>' +
                                '<td>' + v.jenis_layanan + '</td>' +
                                '<td>' + ((v.layanan !== null) ? v.layanan : '') + '&nbsp;&nbsp; ' + bt_edit_klinik + '</td>' +
                                '<td>' + ((v.dokter !== null) ? v.dokter : '-') + '</td>' +
                                '<td>' + ((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '') + '</td>' +
                                '<td>' + v.cara_bayar + ' ' + ((v.id_penjamin !== null) ? '(' + v.penjamin + ')' : '') + '</td>' +
                                '<td>' + ((detail.hak_kelas !== null || detail.hak_kelas !== '') ? '<b>Hak Kelas: </b>' + detail.hak_kelas : '-') + '&nbsp;&nbsp; ' + bt_edit_hakkelas + '</td>' +
                                '<td>' + ((v.no_polish !== null) ? v.no_polish : '-') + '</td>' +
                                '<td>' + ((v.no_rujukan !== null) ? v.no_rujukan : '') + '&nbsp;&nbsp; ' + bt_edit_rujuk + '</td>' +
                                '<td>' + ((v.no_sep !== null) ? v.no_sep : '-') + '</td>' +
                                '<td>Antrian Ke - ' + v.no_antrian + '&nbsp;&nbsp; ' + bt_antri + '</td>' +
                                '</tr>';
                            $('#table_detail tbody').append(html);
                        });
                    }

                    // Btn Antri Klinik Lain
                    $('#btn_antri_poli').click(function() {
                        openFormAntri(detail.id);
                    });

                    $('#modal_detail_pendaftaran').modal('show');
                    $('#modal_detail_pendaftaran_label').html('Detail Pendaftaran Poliklinik');
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

    function editHakKelas(id_pendaftaran, hak_kelas) {
        $('#id_pendaftaran_hakkelas').val(id_pendaftaran);
        $('#hak_kelas_asal').html((hak_kelas == 'null' ? '-' : hak_kelas));
        $('#modal_edit_hakkelas').modal('show');
        $('#modal_edit_hakkelas_label').html('Edit Hak Kelas');
    }

    function simpanEditHakKelas() {
        var stop = false;

        if ($('#hak_kelas_edit').val() === '') {
            syams_validation('#hak_kelas_edit', 'Hak Kelas tujuan harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran_igd/api/pendaftaran_igd/edit_hak_kelas") ?>/',
            data: $('#form_edit_hakkelas').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    messageCustom('Berhasil edit Hak Kelas', 'Success');
                } else {
                    messageCustom('Gagal edit Hak Kelas', 'Success');
                }

                $('#modal_edit_hakkelas').modal('hide');
                $('#modal_detail_pendaftaran').modal('hide');
                getListPendaftaran($('#page_now').val(), '');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function editKlinik(id_layanan_pendaftaran, layanan, id_unit_layanan = null) {
        $('#unitkerja-edit').show();
        $('#layanan_edit').val('');
        $('#s2id_layanan_edit a .select2-chosen').html('');

        if (id_unit_layanan) {
            $('#layanan_edit').val(id_unit_layanan).select2('readonly', true);
            $('#s2id_layanan_edit a .select2-chosen').html(layanan);
        }

        $('#unitkerja-edit').click().click().hide()

        $('#dpjp_edit').val('');
        $('#s2id_dpjp_edit a .select2-chosen').html('');

        $('#id_layanan_pendaftaran_edit').val(id_layanan_pendaftaran);
        $('#label_unit_edit').html(layanan);

        $('#modal_edit_klinik').modal('show');
        $('#modal_edit_klinik_label').html('Edit Klinik');
    }

    function simpanEditKlinik() {
        var stop = false;

        if ($('#layanan_edit').val() === '') {
            syams_validation('#layanan_edit', 'Klinik tujuan harus diisi!');
            stop = true;
        };


        if (stop) {
            return false;
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran_poli/api/pendaftaran_poli/edit_klinik") ?>/',
            data: $('#form_edit_klinik').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    messageCustom('Berhasil edit klinik', 'Success');
                } else {
                    messageCustom('Gagal edit klinik', 'Success');
                }

                $('#modal_edit_klinik').modal('hide');
                $('#modal_detail_pendaftaran').modal('hide');
                getListPendaftaran($('#page_now').val(), '');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function editNoRujukan(id_pendaftaran, no_rujukan = null) {

        $('#id_pendaftaran_edit').val(id_pendaftaran);
        $('#no_rujukan_edit').val((no_rujukan !== null) ? no_rujukan : '');

        $('#id_pasien_edit').val('');
        $('#no_kartu_edit').val('');
        $('#nama_pasien_edit').val('');
        $('#asal_faskes_edit').val('');
        $('#tgl_rujukan_edit').val('');
        $('#tgl_rujukan_exp_edit').val('');
        $('#kode_poli_rujukan_edit').val('');
        $('#poli_rujukan_edit').val('');
        $('#btn_simpan_rujukan').html(``);

        $('#modal_edit_no_rujukan').modal('show');
        $('#modal_edit_no_rujukan_label').html('Edit No. Rujukan');
    }

    function cekRujukan() {
        var no_rujukan = $('#no_rujukan_edit').val();
        if (no_rujukan === '') {
            syams_validation('#no_rujukan_edit', 'No rujukan harus diisi!');
            return false;
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_rujukan_by_no_rujukan") ?>/' + no_rujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.response && data.response.rujukan) {
                    rujukan = data.response.rujukan;
                    let tgl_exp = '';

                    if (rujukan.tglKunjungan !== null) {
                        let tglKunjungan = new Date(rujukan.tglKunjungan);
                        tglKunjungan.setDate(tglKunjungan.getDate() + 90);
                        tgl_exp = tglKunjungan.toISOString().split('T')[0];
                    }

                    $('#id_pasien_edit').val((rujukan.peserta.mr.noMR !== null) ? rujukan.peserta.mr.noMR : '');
                    $('#no_kartu_edit').val((rujukan.peserta.noKartu !== null) ? rujukan.peserta.noKartu : '');
                    $('#nama_pasien_edit').val((rujukan.peserta.nama !== null) ? rujukan.peserta.nama : '');
                    $('#asal_faskes_edit').val((rujukan.provPerujuk.nama !== null) ? rujukan.provPerujuk.nama : '');
                    $('#tgl_rujukan_edit').val((rujukan.tglKunjungan !== null) ? rujukan.tglKunjungan : '');
                    $('#tgl_rujukan_exp_edit').val(tgl_exp);
                    $('#kode_poli_rujukan_edit').val((rujukan.poliRujukan.kode !== null) ? rujukan.poliRujukan.kode : '');
                    $('#poli_rujukan_edit').val((rujukan.poliRujukan.nama !== null) ? rujukan.poliRujukan.nama : '');
                    $('#btn_simpan_rujukan').html(`<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiEditNoRujukan()"><i class="fas fa-save"></i> Update</button>`);
                    //    simpanEditNoRujukan

                    messageCustom('No rujukan ditemukan', 'Success');

                } else {
                    $('#id_pasien_edit').val('');
                    $('#no_kartu_edit').val('');
                    $('#nama_pasien_edit').val('');
                    $('#asal_faskes_edit').val('');
                    $('#tgl_rujukan_edit').val('');
                    $('#tgl_rujukan_exp_edit').val('');
                    $('#kode_poli_rujukan_edit').val('');
                    $('#poli_rujukan_edit').val('');
                    $('#btn_simpan_rujukan').html(``);
                    messageCustom('No rujukan tidak ditemukan', 'Info');
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
            url: '<?= base_url("pendaftaran_poli/api/pendaftaran_poli/edit_data_rujukan") ?>/',
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
                $('#modal_detail_pendaftaran').modal('hide');
                getListPendaftaran($('#page_now').val(), '');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function antriPoliklinik() {
        var stop = false;
        var id_pendaftaran = $('#id_pendaftaran_antri').val();

        if ($('#layanan_antri').val() === '') {
            syams_validation('#layanan_antri', 'Layanan harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran/api/pendaftaran/entri_antrian") ?>/poliklinik',
            data: $('#form_antri_klinik').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                $('#modal_antri_klinik').modal('hide');
                $('#modal_detail_pendaftaran').modal('hide');
                messageAddSuccess();
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    function batalPendaftaran(id, page, idResep) {
        if (idResep !== null) {
            swalAlert('warning', 'Warning!', 'Pasien sudah menerima resep, Tidak bisa dibatalkan. Silahkan Retur resep terlebih dahulu!');
            return;
        }

        $('#id').val(id);
        $('#modal-ket-batal-pendaftaran').modal('show');
        $('#title-form-pembatalan').html('Pembatalan Pendaftaran Poliklinik');
    }

    function resetBatalPendaftaran(id, page) {
        bootbox.dialog({
            message: "Anda yakin akan melakukan Reset pembatalan pendaftaran?",
            title: "Reset Pembatalan Pendaftaran",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-undo"></i>  Ya! Reset',
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pendaftaran/api/pendaftaran/reset_batal_pendaftaran") ?>/id/' + id,
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    getListPendaftaran($('#page_now').val(), '');
                                } else {
                                    customAlert('Reset Pembatalan Pendaftaran', data.message);
                                }

                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan Reset pembatalan pendaftaran', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function simpanKetPembatalanPendaftran() {

        if ($('#keterangan_batal').val() === '') {
            syams_validation('#keterangan_batal', 'Kolom dokter harus diisi.');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran/api/pendaftaran/batal_pendaftaran_ket") ?>',
            data: $('#form-batal-pendaftaran').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.status) {
                    $('#modal-ket-batal-pendaftaran').modal('hide');
                    getListPendaftaran($('#page_now').val(), '');
                    messageCustom('Pembatalan Pendaftaran Poli Berhasil Dilakukan', 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Pembatalan Pendaftaran Poli Gagal Dilakukan', 'Error');
            },
        });
    }

    /*function batalPendaftaran(id) {
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
                            url: '<--?= base_url("pendaftaran/api/pendaftaran/batal_pendaftaran") ?>/id/' + id,
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
    }*/

    // function pembuatanSEP(no_rm, id_layanan, nopol, kode_poli, layanan, no_rujukan, kode_bpjs_dokter = '', dokter = '') {
    //     $('#no_rm_bpjs').val(no_rm);
    //     $('#no_rm2_bpjs').val(no_rm);
    //     $('#kode_poli').val(kode_poli);
    //     $('#id_layanan_pendaftaran_bpjs').val(id_layanan);
    //     $('#nokartu_bpjs').val(nopol);

    //     $('#kode_dokter_temp').val(kode_bpjs_dokter);
    //     $('#dokter_temp').val(dokter);

    //     if (no_rujukan !== 'null') {
    //         getRujukan(no_rujukan, no_rm, 'poli', layanan);
    //     } else {
    //         if (nopol === '') {
    //             swalAlert('warning', 'Validasi', 'Peserta belum memasukkan no. kartu asuransi');
    //         } else {
    //             getDataPesertaBPJS(nopol, 'nopolish', 'poli', layanan, no_rm);
    //         }
    //     }
    // }

    function pembuatanSEP(no_rm, id_layanan, nopol, kode_poli, layanan, no_rujukan, kode_bpjs_dokter = '', dokter = '') {

        $('#no_rm_bpjs').val(no_rm);
        $('#no_rm2_bpjs').val(no_rm);
        $('#kode_poli').val(kode_poli);
        $('#id_layanan_pendaftaran_bpjs').val(id_layanan);
        $('#nokartu_bpjs').val(nopol);

        $('#kode_dokter_temp').val(kode_bpjs_dokter);
        $('#dokter_temp').val(dokter);

        if (no_rujukan !== 'null') {
            // getRujukan(no_rujukan, no_rm, 'poli', layanan);
            getRujukan(no_rujukan, no_rm, 'poli', layanan, nopol);
        } else {
            if (nopol === '') {
                swalAlert('warning', 'Validasi', 'Peserta belum memasukkan no. kartu asuransi');
            } else {
                getDataPesertaBPJS(nopol, 'nopolish', 'poli', layanan, no_rm);
            }
        }
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

    function resetModalSuratKeteranganKematian() {
        // Set default fields
        $('#id-pendaftaran-skk').val('');
        $('#id-pemeriksa-skk').val('');
        $('#nomor-surat-kematian-skk').val('');
        $('#nomor-urut-kematian-skk').val('');
        $('#nomor-kk-skk').val('');
        $('#alamat-meninggal-skk').val('');
        $('#waktu-pemeriksaan-skk').val('');
        $('#kode-kematian-skk').val('');
        $('#yang-melapor-skk').val('');
        $('#ktp-skk').val('');
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

    function resetModalVisumEtRepertum() {
        // Set default fields
        $('#id-pendaftaran-ver').val('');
        $('#id-dokter-jaga-idg-ver').val('');
        $('#nomor-visum-ver').val('');
        $('#nomor-surat-ver').val('');
        $('#tahun-surat-ver').val('');
        $('#nomor-polisi-ver').val('');
        $('#ditandatangani-oleh-ver').val('');
        $('#pangkat-ver').val('');
        $('#nrp-ver').val('');
        $('#berat-badan-ver').val('');
        $('#panjang-badan-ver').val('');
        $('#warna-kulit-ver').val('');
        $('#warna-pelangi-mata-ver').val('');
        $('#warna-rambut-ver').val('');
        $('#warna-pakaian-ver').val('');
        $('#bahan-pakaian-ver').val('');
        $('#merk-pakaian-ver').val('');
        $('#ukuran-pakaian-ver').val('');
        $('#gambar-lambang-pakaian-ver').val('');
        $('#warna-celana-ver').val('');
        $('#ukuran-celana-ver').val('');
        $('#merk-celana-ver').val('');
        $('#perhiasan-ver').val('');
        $('#lain-lain-identitas-pasien-ver').val('');
        $('#tubuh-ver').val('');
        $('#anggota-gerak-atas-kanan-ver').val('');
        $('#anggota-gerak-atas-kiri-ver').val('');
        $('#anggota-gerak-bawah-kanan-ver').val('');
        $('#anggota-gerak-bawah-kiri-ver').val('');
        $('#alis-mata-ver').val('');
        $('#bulu-mata-ver').val('');
        $('#selaput-kelopak-mata-ver').val('');
        $('#selaput-bening-mata-ver').val('');
        $('#selaput-biji-mata-ver').val('');
        $('#bentuk-pupil-mata-ver').val('');
        $('#ukuran-pupil-mata-ver').val('');
        $('#garis-tengah-pupil-mata-ver').val('');
        $('#garis-kanan-pupil-mata-ver').val('');
        $('#garis-kiri-pupil-mata-ver').val('');
        $('#pelangi-mata-ver').val('');
        $('#kesimpulan-ver').val('');
        $('#posisi-tato-ver').val('');
        $('#posisi-jaringan-parut-ver').val('');
        $('#posisi-tahi-lalat-ver').val('');
        $('#posisi-tanda-lahir-ver').val('');
        $('#posisi-cacat-fisik-ver').val('');
        $('#kelainan-daerah-berambut-ver').val('');
        $('#kelainan-bentuk-kepala-ver').val('');
        $('#kelainan-wajah-ver').val('');
        $('#kelainan-leher-ver').val('');
        $('#kelainan-bahu-ver').val('');
        $('#kelainan-dada-ver').val('');
        $('#kelainan-punggung-ver').val('');
        $('#kelainan-perut-ver').val('');
        $('#kelainan-bokong-ver').val('');
        $('#kelainan-dubur-ver').val('');
        $("#bulan-surat-ver").val('Januari').change();
        $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html('');

        // Unchecked fields     
        document.getElementById("pendek-ver").checked = false;
        document.getElementById("panjang-ver").checked = false;
        document.getElementById("kurang-ver").checked = false;
        document.getElementById("cukup-ver").checked = false;
        document.getElementById("lebih-ver").checked = false;
        document.getElementById("pakaian-lengan-panjang-ver").checked = false;
        document.getElementById("pakaian-lengan-pendek-ver").checked = false;
        document.getElementById("ada-darah-ver").checked = false;
        document.getElementById("tidak-ada-darah-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("celana-panjang-ver").checked = false;
        document.getElementById("rok-ver").checked = false;
        document.getElementById("kain-ver").checked = false;
        document.getElementById("tato-tidak-ada-ver").checked = false;
        document.getElementById("tato-ada-ver").checked = false;
        document.getElementById("jaringan-parut-tidak-ada-ver").checked = false;
        document.getElementById("jaringan-parut-ada-ver").checked = false;
        document.getElementById("tahi-lalat-tidak-ada-ver").checked = false;
        document.getElementById("tahi-lalat-ada-ver").checked = false;
        document.getElementById("tanda-lahir-tidak-ada-ver").checked = false;
        document.getElementById("tanda-lahir-ada-ver").checked = false;
        document.getElementById("cacat-fisik-tidak-ada-ver").checked = false;
        document.getElementById("cacat-fisik-ada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-wajah-ver").checked = false;
        document.getElementById("ada-kelainan-wajah-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-leher-ver").checked = false;
        document.getElementById("ada-kelainan-leher-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bahu-ver").checked = false;
        document.getElementById("ada-kelainan-bahu-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dada-ver").checked = false;
        document.getElementById("ada-kelainan-dada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-punggung-ver").checked = false;
        document.getElementById("ada-kelainan-punggung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-perut-ver").checked = false;
        document.getElementById("ada-kelainan-perut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bokong-ver").checked = false;
        document.getElementById("ada-kelainan-bokong-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dubur-ver").checked = false;
        document.getElementById("ada-kelainan-dubur-ver").checked = false;

        // Disabled fields
        $("#posisi-tato-ver").prop("disabled", true);
        $("#posisi-jaringan-parut-ver").prop("disabled", true);
        $("#posisi-tahi-lalat-ver").prop("disabled", true);
        $("#posisi-tanda-lahir-ver").prop("disabled", true);
        $("#posisi-cacat-fisik-ver").prop("disabled", true);
        $("#kelainan-daerah-berambut-ver").prop("disabled", true);
        $("#kelainan-bentuk-kepala-ver").prop("disabled", true);
        $("#kelainan-wajah-ver").prop("disabled", true);
        $("#kelainan-leher-ver").prop("disabled", true);
        $("#kelainan-bahu-ver").prop("disabled", true);
        $("#kelainan-dada-ver").prop("disabled", true);
        $("#kelainan-punggung-ver").prop("disabled", true);
        $("#kelainan-perut-ver").prop("disabled", true);
        $("#kelainan-bokong-ver").prop("disabled", true);
        $("#kelainan-dubur-ver").prop("disabled", true);
    }

    function editNoPolish(id_layanan, no_polish, page) {
        var polish = no_polish;
        if (polish === 'null') {
            polish = '';
        }

        bootbox.dialog({
            title: "Edit No. Polis",
            message: `<div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" id="formeditpolish">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="name">No. Polis</label>
                                        <div class="col-lg-9">
                                            <input id="no_polish_edit" name="nopolish" type="text" value="${polish}" placeholder="No. Polis" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_polish_edit = $('#no_polish_edit').val();
                        simpanNoPolish(id_layanan, no_polish_edit);

                    }
                }
            }
        });

        $('#formeditpolish').submit(function() {
            var no_polish_edit = $('#no_polish_edit').val();
            simpanNoPolish(id_layanan, no_polish_edit);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanNoPolish(id_layanan, nopolish) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM . "update_no_polish") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan + '&nopolish=' + nopolish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val(), '');
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function editNoPolish(id_layanan, no_polish, page) {
        var polish = no_polish;
        if (polish === 'null') {
            polish = '';
        }

        bootbox.dialog({
            title: "Edit No. Polis",
            message: `<div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" id="formeditpolish">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="name">No. Polis</label>
                                        <div class="col-lg-9">
                                            <input id="no_polish_edit" name="nopolish" type="text" value="${polish}" placeholder="No. Polis" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_polish_edit = $('#no_polish_edit').val();
                        simpanNoPolish(id_layanan, no_polish_edit);

                    }
                }
            }
        });

        $('#formeditpolish').submit(function() {
            var no_polish_edit = $('#no_polish_edit').val();
            simpanNoPolish(id_layanan, no_polish_edit);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanNoPolish(id_layanan, nopolish) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM . "update_no_polish") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan + '&nopolish=' + nopolish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val());
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function editNoSEP(id_layanan, no_sep, page) {
        var sep = no_sep;
        if (sep === 'null') {
            sep = '';
        }

        bootbox.dialog({
            title: "Edit No. SEP",
            message: `<div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" id="formeditsep">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="name">No. SEP</label>
                                        <div class="col-lg-9">
                                            <input id="no_sep_edit" name="nosep" type="text" value="${sep}" placeholder="No. SEP" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_sep_edit = $('#no_sep_edit').val();
                        simpanNoSEP(id_layanan, no_sep_edit);

                    }
                }
            }
        });

        $('#formeditsep').submit(function() {
            var no_sep_edit = $('#no_sep_edit').val();
            simpanNoSEP(id_layanan, no_sep_edit);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanNoSEP(id_layanan, no_sep) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM . "update_no_sep") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan + '&no_sep=' + no_sep,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    getListPendaftaran($('#page_now').val(), '');
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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

    function cetakFormRekamMedis(details, id_pasien, data, id, id_layanan_pendaftaran) {
        $('#modal_cetak_form_rekam_medis').modal('show');
        $('#modal_cetak_form_rekam_medis_label').html('Cetak Form Rekam Medis');

        $('#btn_identitas_pasien').click(function() {
            cetakIdentitasPasien(details);
        });

        $('#btn_pasien_umum').click(function() {
            cetakPasienUmum(details);
        });

        $('#btn_ringkasan_riwayat_masuk_dan_keluar').click(function() {
            cetakRingkasanRiwayatMasukDanKeluar(details);
        });

        // SPR XXNX
        $('#btn_surat_pengantar_rawat').click(function() {
            cetakSuratPengantarRawat(details, id);
        });


        $('#btn_tata_tertib_pasien').click(function() {
            cetakTataTertibPasien(details);
        });

        $('#btn_surat_persetujuan_rawat_inap').click(function() {
            cetakSuratPersetujuanRawatInap(id, id_layanan_pendaftaran);
        });

        $('#btn_formulir_edukasi_pasien_dan_kluwarga_terintergrasi').click(function() {
            entriEdukasi(id, id_layanan_pendaftaran)
        });
    }

    function cetakIdentitasPasien(details) {
        let detail = details.split('#');
        window.open('<?= base_url('pendaftaran_poli/cetak_identitas_pasien/') ?>' + detail[0], 'Identitas Pasien', 'width=' +
            dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakPasienUmum(details) {
        let detail = details.split('#')

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/check_persetujuan_umum') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(response) {
                const data = response.data
                const penanggung_jawab = response.penanggung_jawab
                // Set all values first
                resetModalPersetujuanUmum()

                $('#nama-keluarga-mpu').val(penanggung_jawab?.nama_pjwb)
                $('#alamat-form-rekam-medis-mpu').val(penanggung_jawab?.alamat_pjwb)
                $('#no-hp-mpu').val(penanggung_jawab?.telp_pjwb)
                $('#no-ktp-mpu').val(penanggung_jawab?.nik_pjwb)
                $('#tanggal-lahir-mpu').val(penanggung_jawab ? datefmysql(penanggung_jawab.tgl_lahir_pjwb) : '')
                $('#hubungan-keluarga-mpu').val(penanggung_jawab?.hubungan_pjwb)

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-persetujuan-umum-title').html(
                    `<b>Form Persetujuan Umum</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}`,
                )

                $('#id-layanan-pendaftaran-form-mpu').val(detail[0])
                $('#is-pasien-tidak-mpu').click()

                if (data?.is_pasien === '1') {
                    document.getElementById('is-pasien-ya-mpu').checked = true
                    // Disabled fields
                    $('#nama-keluarga-mpu').prop('disabled', true)
                    $('#tanggal-lahir-mpu').prop('disabled', true)
                    $('#laki-laki-mpu').prop('disabled', true)
                    $('#perempuan-mpu').prop('disabled', true)
                    $('#alamat-form-rekam-medis-mpu').prop('disabled', true)
                    $('#hubungan-keluarga-mpu').prop('disabled', true)
                    $('#no-rt-mpu').prop('disabled', true)
                    $('#no-rw-mpu').prop('disabled', true)
                    $('#provinsi-mpu').prop('disabled', true)
                    $('#kabupaten-mpu').prop('disabled', true)
                    $('#kecamatan-mpu').prop('disabled', true)
                    $('#kelurahan-mpu').prop('disabled', true)
                    $('#no-ktp-mpu').prop('disabled', true)
                    $('#no-hp-mpu').prop('disabled', true)
                } else if (data?.is_pasien === '0') {
                    document.getElementById('is-pasien-tidak-mpu').checked = true
                    // Undisabled fields
                    $('#nama-keluarga-mpu').prop('disabled', false)
                    $('#tanggal-lahir-mpu').prop('disabled', false)
                    $('#laki-laki-mpu').prop('disabled', false)
                    $('#perempuan-mpu').prop('disabled', false)
                    $('#alamat-form-rekam-medis-mpu   ').prop('disabled', false)
                    $('#hubungan-keluarga-mpu').prop('disabled', false)
                    $('#no-rt-mpu').prop('disabled', false)
                    $('#no-rw-mpu').prop('disabled', false)
                    $('#provinsi-mpu').prop('disabled', false)
                    $('#kabupaten-mpu').prop('disabled', false)
                    $('#kecamatan-mpu').prop('disabled', false)
                    $('#kelurahan-mpu').prop('disabled', false)
                    $('#no-ktp-mpu').prop('disabled', false)
                    $('#no-hp-mpu').prop('disabled', false)

                    $('#nama-keluarga-mpu').val(data.nama_keluarga)
                    $('#tanggal-lahir-mpu').val(datefmysql(data.tanggal_lahir))
                    $('#alamat-form-rekam-medis-mpu').val(data.alamat)
                    $('#hubungan-keluarga-mpu').val(data.hubungan_keluarga)
                    $('#no-rt-mpu').val(data.no_rt)
                    $('#no-rw-mpu').val(data.no_rw)
                    getProvinsi()
                    if (data.provinsi) {
                        getKabupaten(data.provinsi)
                    }
                    if (data.provinsi && data.kota) {
                        getKecamatan(data.provinsi, data.kota)
                    }
                    if (data.provinsi && data.kota && data.kecamatan) {
                        getKelurahan(data.provinsi, data.kota, data.kecamatan)
                    }
                    setTimeout(() => {
                        $('#provinsi-mpu').val(data.provinsi).click()
                        $('#kabupaten-mpu').val(data.kota).click()
                        $('#kecamatan-mpu').val(data.kecamatan).click()
                        $('#kelurahan-mpu').val(data.kelurahan).click()
                    }, 500)
                    $('#no-ktp-mpu').val(data.no_identitas)
                    $('#no-hp-mpu').val(data.no_hp)
                }

                if (data?.kelamin_pasien == 'L' || penanggung_jawab?.kelamin_pjwb == 'L') {
                    document.getElementById('laki-laki-mpu').checked = true
                } else if (data?.kelamin_pasien == 'P' || penanggung_jawab?.kelamin_pjwb == 'P') {
                    document.getElementById('perempuan-mpu').checked = true
                }

                $('#modal-persetujuan-umum').modal('show')
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalPersetujuanUmum() {
        // Set default fields
        $('#id-layanan-pendaftaran-form-mpu').val('');
        $('#nama-keluarga-mpu').val('');
        $('#tanggal-lahir-mpu').val('');
        $('#alamat-form-rekam-medis-mpu').val('');
        $('#hubungan-keluarga-mpu').val('');
        $('#no-rt-mpu').val('');
        $('#no-rw-mpu').val('');
        $('#provinsi').val('');
        $('#kabupaten').val('');
        $('#kecamatan').val('');
        $('#kelurahan').val('');

        // Unchecked fields
        document.getElementById("laki-laki-mpu").checked = false;
        document.getElementById("perempuan-mpu").checked = false;
        document.getElementById("is-pasien-ya-mpu").checked = false;
        document.getElementById("is-pasien-tidak-mpu").checked = false;

        // Undisabled fields
        $("#nama-keluarga-mpu").prop("disabled", false);
        $("#tanggal-lahir-mpu").prop("disabled", false);
        $("#laki-laki-mpu").prop("disabled", false);
        $("#perempuan-mpu").prop("disabled", false);
        $("#alamat-form-rekam-medis-mpu").prop("disabled", false);
        $("#hubungan-keluarga-mpu").prop("disabled", false);
        $('#no-rt-mpu').prop("disabled", false);
        $('#no-rw-mpu').prop("disabled", false);
        $('#provinsi').prop("disabled", false);
        $('#kabupaten').prop("disabled", false);
        $('#kecamatan').prop("disabled", false);
        $('#kelurahan').prop("disabled", false);
    }

    function cetakRingkasanRiwayatMasukDanKeluar(details) {
        let detail = details.split('#');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/check_ringkasan_riwayat_masuk_dan_keluar') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalRingkasanRiwayatMasukDanKeluar();
                $('#id-layanan-pendaftaran-form-mrrmdk').val(detail[0]);
                $('#indikasi').val(data.indikasi)
                $('#keterangan-khusus').val(data.keterangan_khusus)

                for (let i = 0; i < 4; i++) {
                    if (data[`dpjp_utama_${i+1}`] !== null && data[`dpjp_utama_${i+1}`] !== undefined) {
                        const htmlDpjpUtama = `
						<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis dpjp-utama">
							<input type="text" name="dpjp_utama[]" id="dpjp-utama${i}" class="mb-2">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPUtama(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#dpjp-utama').append(htmlDpjpUtama)
                        $('#dpjp-utama' + i).val(data[`dpjp_utama_${i+1}`])
                        $('#dpjp-utama' + i).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term, page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
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
                                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            },
                        })

                        $(`#s2id_dpjp-utama${i} a .select2c-chosen`).html(data[`nama_dpjp_utama_${i+1}`])
                    }
                }

                for (let i = 0; i < 4; i++) {
                    if (data[`dpjp_tambahan_${i+1}`] !== null && data[`dpjp_tambahan_${i+1}`] !== undefined) {
                        const htmlDpdpTambahan = `
						<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis dpjp-tambahan">
							<input type="text" name="dpjp_tambahan[]" id="dpjp-tambahan${i}" class="mb-2">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPTambahan(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#dpjp-tambahan').append(htmlDpdpTambahan)
                        $('#dpjp-tambahan' + i).val(data[`dpjp_tambahan_${i+1}`])
                        $('#dpjp-tambahan' + i).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term, page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
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
                                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })

                        $(`#s2id_dpjp-tambahan${i} a .select2c-chosen`).html(data[`nama_dpjp_tambahan_${i+1}`])
                    }
                }

                for (let i = 0; i < 4; i++) {
                    console.log(data[`tgl_alih_rawat_${i+1}`])
                    if (data[`tgl_alih_rawat_${i+1}`] !== null && data[`tgl_alih_rawat_${i+1}`] !== undefined) {
                        const html = `
						<div id="dinamic3${i}" style="display: flex; gap: 1rem;" class="dinamic3 nadis tgl-alih-rawat">
							<input type="text" name="tgl_alih_rawat[]" id="tgl-alih-rawat${i}" class="mb-2 custom-form col-lg-3" value="${datefmysql(data[`tgl_alih_rawat_${i+1}`])}">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeTglAlihRawat(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#tgl-alih-rawat').append(html)
                        $('#tgl-alih-rawat' + i).datepicker({
                            format: 'dd/mm/yyyy',
                            endDate: new Date(),
                        }).on('changeDate', function() {
                            $(this).datepicker('hide')
                        });
                    }
                }

                $('#modal-cetak-ringkasan-riwayat-masuk-dan-keluar').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalRingkasanRiwayatMasukDanKeluar() {
        $('#indikasi').val('')
        $('#keterangan-khusus').val('')
        $('#dpjp-utama').empty()
        $('#dpjp-tambahan').empty()
        $('#tgl-alih-rawat').empty()
    }

    function cetakTataTertibPasien(details) {
        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_poli/api/pendaftaran_poli/check_tata_tertib') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                const data = response.data
                const penanggung_jawab = response.penanggung_jawab
                // Reset all values first
                resetModalTataTertib();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-tata-tertib-title').html(
                    `<b>Form Tata Tertib</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#id-layanan-pendaftaran-ttb').val(detail[0]);
                $('#nama-keluarga-ttb').val(data?.nama_keluarga ?? penanggung_jawab.nama_pjwb);
                $('#no-telp-ttb').val(data?.no_telp ?? penanggung_jawab.telp_pjwb);

                if (data?.is_pasien == 1) {
                    document.getElementById("is-pasien-ttb-ya").checked = true;
                } else if (data?.is_pasien == 0) {
                    document.getElementById("is-pasien-ttb-tidak").checked = true;
                }

                $('#modal_tata_tertib').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
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

    function konfirmasiEditNoRujukan() {
        var stop = false;

        if ($('#no_rujukan_edit').val() === '') {
            syams_validation('#no_rujukan_edit', 'No rujukan harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pendaftaran_poli/api/pendaftaran_poli/edit_norujukan_bridging") ?>/',
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
                $('#modal_detail_pendaftaran').modal('hide');
                getListPendaftaran($('#page_now').val(), '');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }
</script>