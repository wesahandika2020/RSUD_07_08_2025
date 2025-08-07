<script>
    $(function() {
        let jenisBayar = '';

        getAntrianBPJS(1);

        let account_group = "<?= $this->session->userdata('account_group') ?>";

        if (account_group !== 'Pendaftaran' && account_group !== 'Admin Rekam Medis' && account_group !== 'Rekam Medis') {

            if (window.localStorage) {
                if (!localStorage.getItem('firstLoad')) {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                    getAntrianBPJS(1);
                } else
                    localStorage.removeItem('firstLoad');
            }

        }

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

        $('#filter-onsite').change(function() {
            getAntrianBPJS(1);
        });

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
                $('#kode-poli').val(data.kode_bpjs);
                getDokterSpesialis(data.id);
                return data.nama;
            }
        });

        $('.bpjs, .referensi, .jenis, .bayar, .jaminan').hide();
        $('#jenis-pasien').val('JKN');
        $('.jenis-loket, .kebutuhan-khusus, .bpjs, .dokter, .tanggal_periksa, .jenis, .data-antrian, .rujukan').hide();
        // $('.bpjs').show();
        // $('.referensi').show();
        // $('.jenis').show();
        $('.bayar, .jaminan').hide();
        $('#jenis-penjamin, #jenis-bayar').val('');
        $('#no-rm-antrian').ForceNumericOnly().val('').attr('maxlength', 8);
        $('#no-ktp-antrian').ForceNumericOnly().val('').attr('maxlength', 16);
        $('#no-bpjs-antrian').ForceNumericOnly().val('').attr('maxlength', 13);
        $('#no-hp-antrian').ForceNumericOnly().val('').attr('maxlength', 13);
        $('#no-rujukan-antrian').attr('maxlength', 19);

        $('#kebutuhan-khusus').change(function() {

            if ($(this).val() === 'Ya') {

                $('#jenis-loket').val('Prioritas');

                if ($('#jenis-pasien').val() === 'JKN') {

                    $('.dokter').show();
                    $('.bpjs').show();
                    $('.referensi').show();
                    $('.jenis').show();
                    $('.bayar, .jaminan').hide();
                    $('#jenis-penjamin, #jenis-bayar').val('');
                    // Add Wahyu
                    $('.data-pasien-baru').hide();

                } else {

                    $('.dokter').show();
                    $('.bayar').show();
                    $('.bpjs, .referensi, .jenis').hide();

                }

            }

        });

        // Add Wahyu
        $('#kode-poli').on('change', function() {
            if ($('#kode-poli').val() === '58') {
                $('.dokter').hide();
            } else {
                $('.dokter').show();
            }
        })
        // end

        $('#jenis-loket').change(function() {

            if ($(this).val() === 'Informasi') {
                $('.bpjs').hide();
                $('.jenis').hide();
                $('.dokter').hide();
                // Add Wahyu
                $('.kode-poli').hide();


            } else if ($(this).val() === 'Tunai') {

                // $('.dokter').show();
                $('.bayar').show();
                $('.bpjs, .referensi, .jenis').hide();
                // $('#jenis-pasien').val('NON JKN');
                // Add Wahyu
                $('.kode-poli').show();
                $('.rujukan, .data-antrian').hide();

            } else {
                // $('#jenis-pasien').val('JKN')
                $('.rujukan, .data-antrian').show();
                if ($('#jenis-pasien').val() === 'JKN') {

                    $('.dokter').show();
                    $('.bpjs').show();
                    $('.referensi').show();
                    $('.jenis').show();
                    $('.bayar, .jaminan').hide();
                    $('#jenis-penjamin, #jenis-bayar').val('');
                    // Add Wahyu
                    $('.data-pasien-baru').hide();

                } else {

                    $('.dokter').show();
                    $('.bayar').show();
                    $('.bpjs, .referensi, .jenis').hide();

                }

            }

        });


        $('#tanggal-dokter').val('<?= date("Y-m-d"); ?>');

        $('#jenis-pasien').change(function() {

            $('#nomor-kartu, #jenis-kunjungan, #nomor-referensi, #jenis-penjamin, #jenis-bayar').val('');

            if ($(this).val() === 'JKN') {
                // $('.bpjs').show();
                // $('.referensi').show();
                // $('.jenis').show();
                $('.identitas').show();
                $('.jenis-loket, .kebutuhan-khusus, .bpjs, .dokter, .kode-poli, .tanggal_periksa, .jenis').hide();
                $('.bayar, .jaminan').hide();
                $('#jenis-penjamin, #jenis-bayar').val('');
                $('#jenis-loket').val('');
                $('#btn-tambah-antrean, #btn-process').prop('hidden', true);
                $('#btn-cek-data').prop('hidden', false);

            }

            if ($(this).val() === 'NON JKN') {
                $('.bayar').show();
                $('.bpjs, .referensi, .jenis, .identitas').hide();
                $('.jenis-loket, .kebutuhan-khusus, .pasien-baru, .dokter, .kode-poli, .tanggal_periksa').show();
                $('#btn-tambah-antrean').prop('hidden', false);
                $('#btn-cek-data, #btn-process').prop('hidden', true);
                $('#jenis-loket').val('Tunai');

            }

        });

        // Tambahan wahyu
        $('input:checkbox').on('click', function() {
            const box = $(this)
            if (box.is(':checked')) {
                const group = 'input:checkbox[name=\'' + box.attr('name') + '\']'
                $(group).prop('checked', false)
                box.prop('checked', true)
            } else {
                box.prop('checked', false)
            }
        })

        $('.checkbox-identitas').on('change', function() {
            const inputIdentitas = $('#no-identitas-cek').val('')
            inputIdentitas.ForceNumericOnly().val('')

            if ($(this).attr('id') === 'no-rm' && $(this).is(':checked')) {
                $('#jenis-identitas').val('no_rm')
                inputIdentitas.prop('disabled', false).attr('maxlength', 8)
                $('#no-identitas-cek').attr('placeholder', 'Masukan Nomor RM');
            } else if ($(this).attr('id') === 'nik' && $(this).is(':checked')) {
                $('#jenis-identitas').val('nik')
                inputIdentitas.prop('disabled', false).attr('maxlength', 16)
                $('#no-identitas-cek').attr('placeholder', 'Masukan Nomor NIK');
            } else if ($(this).attr('id') === 'no-bpjs' && $(this).is(':checked')) {
                $('#jenis-identitas').val('no_bpjs')
                inputIdentitas.prop('disabled', false).attr('maxlength', 13)
                $('#no-identitas-cek').attr('placeholder', 'Masukan Nomor Kartu BPJS');
            } else {
                $('#jenis-identitas').val('')
                inputIdentitas.prop('disabled', true).removeAttr('maxlength')
                $('#no-identitas-cek').attr('placeholder', 'No Identitas');
            }
        })
        // end

        $('#checkin-pasien').click(function() {
            $('#modal-checkin-pasien').modal('show');
            $('#table-checkin-pasien tbody').empty();
            $('#label-data-pasien').html('Data Pasien : <b></b>');
        });

        $('#tambah-antrean-bpjs').click(function() {
            $('#modal-tambah-antrean').modal('show');
            $('#modal-tambah-antrean-label').html('Tambah Antrean');
            resetFormAntrian();
        });

        $('#bt-search').click(function() {
            $('#modal-search').modal('show');
            $('#modal-search-label').html('Parameter Pencarian');
        });

        $("#tanggal_awal, #tanggal_akhir, #tanggal-lahir-rm").datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');

        });

        let periksaDate = new Date();
        $('#tanggal_periksa').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(periksaDate.getFullYear(), periksaDate.getMonth() + 3, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }

        });

        $('#tanggal_periksa').change(function() {

            let tanggal = date2mysql($(this).val());
            $('#tanggal-dokter').val(tanggal);


        })

        $('#jenis-bayar').change(function() {
            jenisBayar = $(this).val()
            $('#jenis-penjamin').val('');
            $('#s2id_jenis-penjamin a .select2-chosen').html('Pilih Penjamin');
            if ($(this).val() !== 'Tunai') {
                $('.jaminan').show();
            } else {
                $('.jaminan').hide();
            }
        })

        $('#jenis-penjamin').select2({
            ajax: {
                url: "<?= base_url('antrian_bpjs/api/antrian_bpjs/jenis_penjamin') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: jenisBayar,
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
        })

        $('#nm-poli').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('antrian_bpjs/api/antrian_bpjs/kode_bpjs') ?>",
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
                searchDokterAntrian(data.id);
                return data.nama;
            }
        });

        $('#kode-poli').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('antrian_bpjs/api/antrian_bpjs/kode_bpjs') ?>",
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
                $('#kode-poli-bpjs').val(data.kode_bpjs);
                $('#nama-poli').val(data.nama);
                $('#id-poli').val(data.id);
                getDokterAntrian(data.id, $('#tanggal-dokter').val());
                return data.nama;
            }
        });

        $('#dokter-antrian').change(function() {

            let data = $('#dokter-antrian').val();
            let pisahData = '';

            if (typeof data !== undefined) {

                pisahData = data.split('/');

                $('#id-dokter-bpjs').val(pisahData[0]);
                $('#kode-bpjs-dokter').val(pisahData[1]);
                $('#nama-dokter-bpjs').val(pisahData[2]);
                $('#id-jadwal-dokter').val(pisahData[3]);
            }
        });

        $('#pasien-baru').change(function() {

            if ($(this).val() === '1') {
                $('#no-rm').val('').parent().addClass('hide');
                $('#nik').val('').parent().addClass('hide');
                $('#no-bpjs').val('').parent().removeClass('hide');
                $('#no-bpjs').prop('checked', true).change();
                $('.data-pasien-baru').show();
                // $('#s2id_no_rm a .select2-chosen').html('== Silakan Pilih Nomor RM ==');
            } else {
                $('#no-rm').val('').parent().removeClass('hide');
                $('#nik').val('').parent().removeClass('hide');
                $('#no-bpjs').val('').parent().addClass('hide');
                // $('#no-bpjs, #nik, #no-rm').prop('checked', false).change();
                $('#no-bpjs, #nik').prop('checked', false).change();
                $('#no-rm').prop('checked', true).change();
                $('.data-pasien-baru').hide();
            }

        });

        $('#btn-cek-nik').click(function() {
            if ($('#nik-identitas').val() === '') {
                syams_validation('#nik-identitas', 'Silakan masukkan no identitas terlebih dahulu');
                $('#nik-identitas').focus();
                return false;
            }

            let nik = '/nik/' + $('#nik-identitas').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('registrations/api/registrations_auto/cek_nik') ?>' + nik,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if (data.data.success === false && data.data.data === null) {

                        swalAlert('warning', 'Validasi', data.data.message);

                    } else {

                        messageCustom(data.data.message, 'Success');

                    }

                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Gagal menghubungi server dukcapil, Silakan coba kembali', 'Error');
                }
            })
        });

        $('#btn-reload').click(function() {
            getAntrianBPJS(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $("#tanggal-lahir").datepicker({
            format: 'dd/mm/yyyy',
            endDate: "1d"
        }).on('changeDate', function() {
            var tgl = $(this).val();
            $('#umur-label').html('');
            if (tgl !== '') {
                var umur = hitungUmur(date2mysql(tgl));
                $('#umur-label').html(umur);
            }

            $(this).datepicker('hide');
        });

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

        $('#klik-sep').click(function() {
            let nopol = $('#no_polish').val();
            let kode_poli = $('#kode_poli').val();
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

        $('#domisili').change(function() {
            if ($('#domisili').val() == 1) {
                resetModalDaftar();
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
                resetModalDaftar();
                $('#asal-masuk').val(2);
                $('#bt-search-nik').hide();
                $('#no-identitas').prop('readonly', false);
                getProvinsi();
                $('#nama, #kelamin, #tanggal-lahir, #tempat-lahir, #alamat, #provinsi, #kabupaten, #kecamatan, #kelurahan, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);
                syams_validation_remove(this);
                $('.reset-field, .reset-select, #cara-bayar').prop('disabled', false);
            }
        });

        $('#layanan_auto').change(function() {
            let tanggal = $('#tanggal').html();
            getAntrianKlinik(tanggal, $(this).val(), '#antrian', '#no-antrian', );
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
        $('.etnis_lainnya').hide();
        $('.hamkom_lainnya').hide();

        $('#etnis').change(function() {
            if ($('#etnis').val() == 17) {
                $('.etnis_lainnya').show();
                $('#etnis-lainnya').focus();
            } else {
                $('.etnis_lainnya').hide();
                $('#etnis-lainnya').val('');
            }
        });

        $('#hamkom').change(function() {
            if ($('#hamkom').val() == 'Lain - lain') {
                $('.hamkom_lainnya').show();
                $('#hamkom-lainnya').focus();
            } else {
                $('.hamkom_lainnya').hide();
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
                $('.hamkom_lainnya').hide();
                $('#hamkom-lainnya').val('');
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

    });

    jQuery.fn.ForceNumericOnly = function() {
        return this.each(function() {
            $(this).keydown(function(e) {
                let key = e.charCode || e.keyCode || 0
                const ctrl = e.ctrlKey ? e.ctrlKey : ((key === 17))
                return (
                    key === 8 ||
                    key === 46 ||
                    key === 9 ||
                    key === 13 ||
                    key === 110 ||
                    (ctrl && 86) ||
                    (ctrl && 67) ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105))
            })
        })
    }

    function getKodeBookingPasien() {

        $('#table-checkin-pasien tbody').empty();
        $('#label-data-pasien').html('Data Pasien : <b></b>');

        if ($('#input-kode').val() === '') {
            syams_validation('#input-kode', 'Silakan masukkan Kode Booking terlebih dahulu');
            $('#input-kode').focus();
            return false;
        }

        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/list_booking_pasien') ?>',
            data: $('#form-checkin-pasien').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                let checkIn = '';
                let cetakSEP = '';

                if (data !== 'Nodata') {

                    if (data.no_rm !== null && data.no_rm !== '') {

                        $('#label-data-pasien').html('Data Pasien : <b>' + data.no_rm + '/' + data.nik + '/' + data.nama + '/' + datefmysql(data.tgllahir) + '/' + data.alamat + '</b>');

                        if (data.status === 'Booking') {

                            checkIn = '<button type="button" class="btn btn-info btn-xxs" onclick="checkInPasien(' + data.id + ')"><i class="fas fa-sign m-r-5"></i>Check In</button>';
                            cetakSEP = '';

                        } else if (data.status === 'Check In') {

                            if (data.nosep !== null && data.nosep !== '') {

                                if (data.id_pendaftaran !== null && data.id_pendaftaran !== '') {

                                    checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>';

                                    cetakSEP = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakSEP(\'' + data.nosep + '\')"><i class="fa fa-print"></i>SEP</button>';

                                } else {

                                    checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="daftarKunjungan(' + data.id + ', \'' + data.nosep + '\')"><i class="fa fa-print"></i> Daftar</button>';
                                    cetakSEP = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakSEP(\'' + data.nosep + '\')"><i class="fa fa-print"></i>SEP</button>';

                                }

                            } else {

                                if (data.status_jkn === 'JKN') {

                                    checkIn = '<button type="button" class="btn btn-info btn-xxs" onclick="checkInPasien(' + data.id + ')"><i class="fas fa-sign m-r-5"></i>Check In</button><button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>';
                                    cetakSEP = '';


                                } else {

                                    checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + data.id_pendaftaran + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>';
                                    cetakSEP = '';

                                }

                            }

                        } else {

                            checkIn = '';
                            cetakSEP = '';

                        }

                        let html = '<tr>' +
                            '<td class="left">' + data.kode_booking + '</td>' +
                            '<td class="left">' + data.nama + '</td>' +
                            '<td class="left">' + data.poli + '</td>' +
                            '<td class="left">' + data.pegawai + '</td>' +
                            '<td class="left">' + ((data.no_sk !== null) ? data.no_sk : '') + '</td>' +
                            '<td class="left">' + ((data.nosep !== null) ? data.nosep : '') + '</td>' +
                            '<td class="left">' + ((data.id_pendaftaran !== null) ? 'Daftar' : '') + '</td>' +
                            '<td class="left">' + ((data.tanggal_kunjungan !== null) ? datefmysql(data.tanggal_kunjungan) : '') + '</td>' +
                            '<td class="left">' + ((data.status !== null) ? data.status : '') + '</td>' +
                            '<td class="right" style="display:flex;float:right">' +
                            checkIn +
                            cetakSEP +
                            '</td>' +
                            '</tr>';
                        $('#table-checkin-pasien tbody').append(html);

                    } else {

                        messageCustom('No RM Tidak Ada, Silakan Ke Loket Pendaftaran', 'Error');

                    }

                } else {

                    messageCustom('Tidak ada Jadwal Konsul untuk Kode Booking tersebut pada hari ini', 'Error');

                }

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function daftarKunjungan(id, nosep) {

        let pesan = 'Pendaftaran Pasien';
        let confirm_button = 'Daftar';

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/simpan_pendaftaran") ?>',
                    data: 'id=' + id + '&nosep=' + nosep,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code === 201 | data.metaData.code === '201') {

                                swalAlert('warning', data.metaData.code, data.metaData.message);


                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                getKodeBookingPasien();
                                getAntrianBPJS(1);

                            }



                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });

    }

    function checkInPasien(id, statusrm = null) {

        let pesan = 'Check In Pasien';
        let confirm_button = 'Check In';


        if (statusrm !== null) {

            $.ajax({
                type: 'GET',
                url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/checkin_pasien") ?>',
                data: 'id_booking=' + id + '&statusrm=' + statusrm,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if (typeof data.metaData !== 'undefined') {

                        if (data.metaData.code === 201 | data.metaData.code === '201') {

                            swalAlert('warning', data.metaData.code, data.metaData.message);
                            $('#pasien-text').html(data.metaData.p_text);

                        } else if (data.metaData.code === 202) {

                            messageCustom(data.metaData.konfirm, 'Success');
                            konfirmasiDataWA(id, data.metaData.message);
                            $('#pasien-text').html(data.metaData.p_text);
                            getKodeBookingPasien();
                            getAntrianBPJS(1);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            $('#pasien-text').html(data.metaData.p_text);
                            getKodeBookingPasien();
                            getAntrianBPJS(1);

                        }



                    }

                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                }
            })

        } else {

            swal.fire({
                title: 'Konfirmasi',
                html: pesan,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
                cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
                reverseButtons: true,
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/checkin_pasien") ?>',
                        data: 'id_booking=' + id + '&statusrm=' + statusrm,
                        cache: false,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(data) {

                            if (typeof data.metaData !== 'undefined') {

                                if (data.metaData.code === 201 | data.metaData.code === '201') {

                                    swalAlert('warning', data.metaData.code, data.metaData.message);
                                    $('#pasien-text').html(data.metaData.p_text);

                                } else if (data.metaData.code === 202) {

                                    messageCustom(data.metaData.konfirm, 'Success');
                                    konfirmasiDataWA(id, data.metaData.message, data.metaData.statusrm);
                                    $('#pasien-text').html(data.metaData.p_text);
                                    getKodeBookingPasien();
                                    getAntrianBPJS(1);

                                } else {

                                    messageCustom(data.metaData.message, 'Success');
                                    $('#pasien-text').html(data.metaData.p_text);
                                    getKodeBookingPasien();
                                    getAntrianBPJS(1);

                                }



                            }

                        },
                        complete: function() {
                            hideLoader();
                        },
                        error: function(e) {
                            messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                        }
                    })
                }
            });

        }

    }

    function konfirmasiDataWA(id, data, statusrm) {

        let pesan = '';

        if (typeof data.statusrm !== 'undefined') {

            pesan = '<table style="width: 100%"><tr><td class="left" style="font-size: 25px"><b>No. RM</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.id !== null) ? data.message.id : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>NIK</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.no_identitas !== null) ? data.message.no_identitas : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Nama</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.nama !== null) ? data.message.nama : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Tanggal Lahir</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.tanggal_lahir !== null) ? datefmysql(data.message.tanggal_lahir) : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Alamat</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.message.alamat !== null) ? data.message.alamat : '') + '</b></td></tr>';

        } else {

            pesan = '<table style="width: 100%"><tr><td class="left" style="font-size: 25px"><b>No. RM</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.id !== null) ? data.id : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>NIK</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.no_identitas !== null) ? data.no_identitas : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Nama</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.nama !== null) ? data.nama : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Tanggal Lahir</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.tanggal_lahir !== null) ? datefmysql(data.tanggal_lahir) : '') + '</b></td></tr><tr><td class="left" style="font-size: 25px"><b>Alamat</b></td><td class="left" style="font-size: 25px"><b> : </b></td><td class="left" style="font-size: 25px"><b>' + ((data.alamat !== null) ? data.alamat : '') + '</b></td></tr>';

        }

        let confirm_button = 'Benar';
        let controlButton = 'Salah';


        swal.fire({
            title: 'Apakah Data Anda di bawah ini Sudah Benar?',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            showDenyButton: true,
            showCloseButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-save"></i> ' + controlButton,
            reverseButtons: true,
            allowOutsideClick: false,
            customClass: {
                popup: 'custom-swal-popup'
            }
        }).then((result) => {

            if (result.value === true) {

                checkInPasien(id, 1);

            }

            if (result.dismiss === 'cancel') {


                if (typeof data.statusrm !== 'undefined') {

                    if (data.statusrm === 2) {

                        checkInPasien(id, 2);

                    } else {

                        messageCustom('Silakan ke Loket Pendaftaran untuk Registrasi', 'Error');

                    }

                } else {

                    messageCustom('Silakan ke Loket Pendaftaran untuk Registrasi', 'Error');

                }

            }

            if (result.dismiss === 'close') {

                swal.close();

            }

        });

    }

    function getDokterSpesialis(id_spesialisasi = null, id_dokter = null) {
        $.ajax({
            url: '<?= base_url('masterdata/api/masterdata_auto/get_dokter_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
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



                $('#dokter').html(html);
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

    function salinPGJB() {
        $('#nik-pjwb-finansial').val($('#nik-pjwb').val());
        $('#nama-pjwb-finansial').val($('#nama-pjwb').val());
        $('#kelamin-pjwb-finansial').val($('#kelamin-pjwb').val());
        $('#telp-pjwb-finansial').val($('#telp-pjwb').val());
        $('#alamat-pjwb-finansial').val($('#alamat-pjwb').val());
    }

    function resetModalDaftar() {
        $('#antrian').html('');
        $('#umur-label').html('');
        $('#kode-booking-bpjs, #kode-booking-online').val('');
        $('#cara-bayar').val('Tunai');
        $('#no-identitas').prop('readonly', true);
        $('.penjamin_group, .asuransi_field').hide();
        $('#s2id_no_rm a .select2-chosen').html('No. RM Pasien');
        $('.reset-field, .reset-select, .select2-input').val('');
        $('#tanggal-akhir').val('<?= date("d/m/Y"); ?>');
        $('#s2id_layanan_auto a .select2-chosen').html('Tempat Layanan');
        $('#no_rm_lama, #no_rm').val('');
        $('#s2id_no_rm_lama a .select2-chosen').html('No. RM Pasien Data Lama');
        $('#s2id_no_rm a .select2-chosen').html('No. RM Pasien');
        $('#nama_search, #carabayar_search, #no_register_search, #user_search_poli, #no_rm_search, #klinik, #tanggal_lahir_search, #nik_search, #alamat_search, #layanan_auto').val('');
        syams_validation_remove('.reset-field, .reset-select, .select2-input');
        $('#s2id_instansi-rujukan a .select2-chosen').html('Instansi Perujuk');
        $('#nama, #kelamin, #tanggal_lahir, #tempat_lahir, #alamat, #agama, #pernikahan, #ayah, #ibu').prop('readonly', false);

        $('#disabilitas').prop('checked', false).change()

        $('#cara-bayar').val('Asuransi').change();
        $('#penjamin').select2('readonly', false);
        $('#penjamin').val('1');
        $('#s2id_penjamin a .select2-chosen').html('BPJS');

        resetLogoPasien();
    }

    function resetLogoPasien() {
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

    function resetFormAntrian() {

        $('#jenis-identitas, #nomor-kartu, #tanggal-lahir, #nik-identitas, #no_rm, #jenis-bayar, #tanggal-lahir-rm, #no-hp, #nama-poli, #kode-bpjs-dokter, #kode-poli-bpjs, #id-poli, #nama-dokter-bpjs, #id-dokter-bpjs, #dokter-antrian, #nomor-referensi, .data-antrian, .rujukan').val('');
        $('#jenis-kunjungan').val('3');
        $('#jenis-penjamin, #kode-poli, #agama-antrian, #pendidikan-antrian').val('');
        $('#s2id_jenis-penjamin a .select2-chosen').html('== Silakan Pilih Jenis Penjamin ==');
        $('#s2id_no_rm a .select2-chosen').html('== No RM Pasien ==');
        $('#s2id_kode-poli a .select2-chosen').html('Tempat Layanan');
        $('#nik, #no-bpjs').prop('checked', false);
        $('#no-identitas-cek').attr('placeholder', 'No Identitas');
        $('#no-identitas-cek').val('').prop('disabled', true)
        $('#pasien-baru').val('0');
        $('#no-rm').prop('checked', true).change();
        $('#no-rm').val('').parent().removeClass('hide');
        $('#nik').val('').parent().removeClass('hide');
        $('#no-bpjs').val('').parent().addClass('hide');
        $('#no-identitas-cek').parent().parent().prop('hidden', false);
        // $('#btn-tambah-antrean').prop('hidden', true);
        // $('#btn-cek-data').prop('hidden', false);
        $('#jenis-pasien').val('JKN').change();
        $('.data-antrian, .rujukan, .data-pasien-baru').hide();
        $('#jenis-pasien, #pasien-baru').parent().parent().prop('hidden', false);
        $('#no-bpjs-antrian, #no-ktp-antrian').attr('readonly', false);
        // $('#select-rujukan').empty();
        // $('#kode-bpjs-dokter').attr('placeholder', 'Loading...');
        // $('.kode-poli').show();

    }

    function getDokterAntrian(id_spesialisasi = null, tanggal = null) {
        let html = '';
        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/tanggal/' + tanggal,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $.each(data, function(i, v) {

                    html += '<option value="' + v.id_tm + '/' + v.kode_bpjs_dokter + '/' + v.dokter + '/' + v.id_jadwal_dokter + '"><b>' + v.shift_poli + ' - ' + v.dokter + '</b> - <small> (' + v.jml_kunjung + '/' + v.kuota + ')</small></option>';

                });

                if (data[0] === undefined) {

                    $('#id-dokter-bpjs').val('');
                    $('#kode-bpjs-dokter').val('').attr('placeholder', '');
                    $('#nama-dokter-bpjs').val('');
                    $('#id-jadwal-dokter').val('');

                } else {

                    $('#id-dokter-bpjs').val(data[0].id_tm);
                    $('#kode-bpjs-dokter').val(data[0].kode_bpjs_dokter);
                    $('#nama-dokter-bpjs').val(data[0].dokter);
                    $('#id-jadwal-dokter').val(data[0].id_jadwal_dokter);

                }

                $('#dokter-antrian').html(html);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function searchDokterAntrian(id_spesialisasi = null) {
        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Dokter</option>';
                $.each(data, function(i, v) {
                    html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi + ' ' + v.jml_terlayani + '</small></option>';
                });

                $('#nm-dokter').html(html);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function cariDataAntrian() {
        getAntrianBPJS(1);
        $('#modal-search').modal('hide');
    }

    function paging(p) {

        getAntrianBPJS(p);

    }

    function getAntrianBPJS(p) {
        $('#page-now').val(p);
        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/data_antrian_bpjs') ?>/page/' + p,
            data: $('#form_search').serialize() + '&filter=' + $('#filter-onsite').val(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getAntrianBPJS(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-antrian-online tbody').empty();

                let checkIn = '';
                let batalAntrian = '';
                let disDropdown = '';
                let statusRespon = '';
                let cetakTiket = '';
                let dataWA = '';
                let cetakSEP = '';
                let cetakKunjungan = '';
                let cetak = '';
                let sudahCetak = '';

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));



                    if (v.status === 'Booking') {

                        if (v.status_respon === '200') {

                            checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="doCheckIn(' + v.id + ', \'' + v.kode_booking + '\', ' + p + ', \'' + v.lokasi_data + '\', \'' + v.kode_bpjs_poli + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.no_rm + '\', \'' + v.no_kartu + '\', \'' + v.no_referensi + '\')"><i class="fas fa-sign m-r-5"></i>Check In</button>';
                            // checkIn = '';
                            batalAntrian = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>';
                            statusRespon = '';
                            cetakTiket = '';
                            dataWA = '';
                            cetakSEP = '';
                            cetakKunjungan = '';
                            sudahCetak = '';


                        } else {

                            statusRespon = '<button type="button" class="btn btn-secondary btn-xxs" onclick="statusResponse(' + v.id + ',  ' + v.status_respon + ', \'' + v.kode_booking + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Kirim BPJS</button>';

                            checkIn = '';

                            batalAntrian = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>';
                            cetakTiket = '';
                            dataWA = '';
                            cetakSEP = '';
                            cetakKunjungan = '';
                            sudahCetak = '';

                        }

                        disDropdown = '';


                    } else if (v.status === 'Check In') {

                        if (v.lokasi_data === 'wa' && v.pasien_hadir !== 'Hadir') {

                            batalAntrian = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>';
                            checkIn = '';
                            statusRespon = '';
                            if (v.cetak !== null) {

                                cetak = parseInt(v.cetak);

                                if (cetak >= 1) {

                                    cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                    sudahCetak = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Tercetak ' + cetak + ' Kali</span></h5>';

                                } else {

                                    cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                    sudahCetak = '';

                                }

                            } else {

                                cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                sudahCetak = '';

                            }
                            dataWA = '<button type="button" class="btn btn-secondary btn-xxs" onclick="simpanKehadiran(' + v.id + ', \'' + v.kode_booking + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Hadir</button>';
                            cetakSEP = '';
                            cetakKunjungan = '';

                        } else {

                            if (v.lokasi_data === 'mobile') {

                                batalAntrian = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>';

                                if (v.id_pendaftaran !== null) {

                                    checkIn = '';
                                    cetakKunjungan = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakKunjungan(' + v.id_pendaftaran + ', ' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Bukti Kunjungan</button>';

                                } else {

                                    checkIn = '<button type="button" class="btn btn-secondary btn-xxs" onclick="mobileCheckin(\'' + v.lokasi_data + '\', \'' + v.kode_booking + '\', \'' + v.kode_bpjs_poli + '\', \'' + v.kode_bpjs_dokter + '\', \'' + v.no_rm + '\', \'' + v.no_kartu + '\' , \'' + v.no_referensi + '\', ' + p + ')"><i class="fas fa-sign m-r-5"></i>Cek Rujukan</button>';
                                    cetakKunjungan = '';

                                }

                                if (v.nosep !== null && v.nosep !== '') {

                                    cetakSEP = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakSEP(\'' + v.nosep + '\')"><i class="fa fa-print"></i>SEP</button>';
                                    cetakTiket = '';


                                } else {

                                    if (v.cetak !== null) {

                                        cetak = parseInt(v.cetak);

                                        if (cetak >= 1) {

                                            cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                            sudahCetak = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Tercetak ' + cetak + ' Kali</span></h5>';

                                        } else {

                                            cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                            sudahCetak = '';

                                        }

                                    } else {

                                        cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                        sudahCetak = '';

                                    }

                                }

                                statusRespon = '';
                                dataWA = '';

                            } else {

                                if (v.cetak !== null) {

                                    cetak = parseInt(v.cetak);

                                    if (cetak >= 1) {

                                        cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                        sudahCetak = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Tercetak ' + cetak + ' Kali</span></h5>';

                                    } else {

                                        cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                        sudahCetak = '';

                                    }

                                } else {

                                    cetakTiket = '<button type="button" class="btn btn-secondary btn-xxs" onclick="cetakAntrian(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                                    sudahCetak = '';

                                }

                                batalAntrian = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + p + ')"><i class="fas fa-trash"></i> Batal Antrean</a>';
                                checkIn = '';
                                statusRespon = '';
                                cetakSEP = '';
                                dataWA = '';
                                cetakKunjungan = '';

                            }

                        }

                        disDropdown = '';

                    } else {

                        checkIn = '';
                        batalAntrian = '';
                        disDropdown = 'disabled';
                        statusRespon = '';
                        cetakTiket = '';
                        dataWA = '';
                        cetakSEP = '';
                        cetakKunjungan = '';
                        sudahCetak = '';

                    }

                    let groupAccount = "<?= $this->session->userdata('account_group') ?>";
                    if (groupAccount === 'Humas' || groupAccount === 'Admin Humas') {
                        sudahCetak = '';
                        dataWA = '';
                        cetakSEP = '';
                        cetakKunjungan = '';
                        cetakTiket = '';
                        checkIn = '';
                        statusRespon = '';
                    }

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.kode_booking + '</td>' +
                        '<td class="center">' + ((v.no_kartu !== null) ? v.no_kartu : '-') + '</td>' +
                        '<td class="center">' + v.nomor_antrean + '</td>' +
                        '<td class="center">' + ((v.lokasi_data === 'mobile') ? 'Mobile JKN' : (v.lokasi_data === 'wa') ? 'WA' : 'Onsite') + '</td>' +
                        '<td class="left">' + ((v.poli !== null) ? v.poli : 'Informasi') + '</td>' +
                        '<td>' + ((v.nama_dokter !== null) ? v.nama_dokter : 'Informasi') + '</td>' +
                        '<td class="center">' + v.status + '</td>' +
                        '<td class="center">' + ((v.panggilan_pasien !== null) ? v.panggilan_pasien : '') + '</td>' +
                        '<td class="center">' + ((v.waktu_panggil !== null) ? datetimefmysql(v.waktu_panggil) : '') + '</td>' +
                        '<td class="center">' + ((v.loket_antrean !== null) ? v.loket_antrean : '') + '</td>' +
                        '<td class="center">' + ((v.pasien_hadir !== null) ? v.pasien_hadir : '') + '</td>' +
                        '<td class="center">' + ((v.waktu_hadir !== null) ? datetimefmysql(v.waktu_hadir) : '') + '</td>' +
                        '<td class="right" style="display:flex;float:right">' +
                        sudahCetak +
                        dataWA +
                        cetakSEP +
                        cetakKunjungan +
                        cetakTiket +
                        checkIn +
                        statusRespon +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown" ' + disDropdown + '><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPanggilan(' + v.id + ')"><i class="fas fa-trash"></i> Detail Panggilan</a>' +
                        batalAntrian +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table-antrian-online tbody').append(html);

                });

            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });

    }

    function cetakKunjungan(id_pendaftaran, id = null, p = null) {

        if (id !== null & p !== null) {

            $.ajax({
                type: 'POST',
                url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/cek_no_sep") ?>',
                data: 'id_pendaftaran=' + id_pendaftaran + '&id_antrian=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if (typeof data.metaData !== 'undefined') {

                        if (data.metaData.code === 201) {

                            messageCustom(data.metaData.message, 'Error');
                            getAntrianBPJS(p);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            getAntrianBPJS(p);

                        }

                    }

                    var dWidth = $(window).width();
                    var dHeight = $(window).height();
                    var x = screen.width / 2 - dWidth / 2;
                    var y = screen.height / 2 - dHeight / 2;

                    window.open('<?= base_url('pendaftaran_poli/cetak_bukti_kunjungan_poli/') ?>' + id_pendaftaran, 'Cetak Bukti Kunjungan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                }
            })

        } else {

            var dWidth = $(window).width();
            var dHeight = $(window).height();
            var x = screen.width / 2 - dWidth / 2;
            var y = screen.height / 2 - dHeight / 2;

            window.open('<?= base_url('pendaftaran_poli/cetak_bukti_kunjungan_poli/') ?>' + id_pendaftaran, 'Cetak Bukti Kunjungan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

        }

    }

    function cetakSEP(nosep) {
        if (nosep === null || nosep === "") {
            swalCustom('warning', 'Cetak SEP', 'No. SEP Tidak ada, Silahkan buat sep terlebih dahulu');
        } else {
            window.open('<?= base_url('antrian_bpjs/antrian_bpjs/') ?>nota_sep/' + nosep, 'Cetak Nota SEP Ver. 2.0');
        }

    }

    function mobileCheckin(lokasi, kodeBooking, kodePoli, kodeDokter, noRM, noKa, noRujuk, p) {

        let pesan = 'Pilih Rujukan';
        let confirm_button = 'Rujukan Baru';
        let controlButton = 'Kontrol';


        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            showDenyButton: true,
            showCloseButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-save"></i> ' + controlButton,
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {

            if (result.value === true) {

                if (noRujuk !== '') {

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/cek_no_rujukan") ?>',
                        data: 'norujuk=' + noRujuk + '&rm=' + noRM + '&kode=' + kodeBooking,
                        cache: false,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(data) {

                            if (typeof data.metaData !== 'undefined') {

                                if (data.metaData.code === 201) {

                                    messageCustom(data.metaData.message, 'Error');
                                    getAntrianBPJS(p);

                                } else {

                                    messageCustom('Status Rujukan Baru', 'Success');
                                    modalPendaftaran(lokasi, kodeBooking, kodePoli, kodeDokter, noRM, noKa, noRujuk, p);
                                    getAntrianBPJS(p);

                                }

                            }

                        },
                        complete: function() {
                            hideLoader();
                        },
                        error: function(e) {
                            messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                        }
                    })

                } else {

                    swalAlert('warning', 'Peringatan', 'Parameter Nomor Rujukan Pasien Mobile JKN Tidak Ada');

                }


            }

            if (result.dismiss === 'cancel') {

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/rujukan_kontrol") ?>',
                    data: 'kode=' + kodeBooking,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code === 201) {

                                messageCustom('Status Rujukan Lama, Silakan ke Loket Pendaftaran', 'Error');
                                getAntrianBPJS(p);

                            }

                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })

            }

            if (result.dismiss === 'close') {

                swal.close();

            }

        });

    }

    function modalPendaftaran(lokasi, kodeBooking, kodePoli, kodeDokter, noRM, noKa, noRujuk, p) {

        resetModalDaftar();

        $('#modal-pendaftaran').modal('show');

        $('#modal-pendaftaran').on('shown.bs.modal', function() {
            $('#domisili').focus();
        });

        $('#modal-pendaftaran').on('shown.bs.modal', function() {
            $('#no-identitas').focus();
        });

        getSEPSpesialis(kodePoli, kodeDokter);
        ambilDataRM(noRM);

        $('#penjamin').val(1);
        $('.penjamin_group, .asuransi_field').show();
        $('#no_rm').val(noRM);
        $('#no_rm_bpjs').val(noRM);
        $('#no_rm2_bpjs').val(noRM);
        $('#status-antrian').val('1');
        $('#page-antrian').val(p);
        $('#no_polish').val(noKa);
        $('#kode-booking-antrian').val(kodeBooking);
        $('#kode-booking-bpjs').val(kodeBooking);
        $('#kode-booking-online').val(kodeBooking);
        $('#no_rujukan').val(noRujuk);
        $('#lokasi-data').val(lokasi);


        $('#penjamin').select2('readonly', true);
        $('#domisili').val('');
        $('#bt-search-nik').hide();
        $('#no-identitas').prop('readonly', true);
        $('#no_rm').prop('readonly', true);
        $('#nama').prop('readonly', true);
        $('.reset-field, .reset-select, #cara-bayar').prop('disabled', true);
        $('#modal-pendaftaran').modal('show');
        $('#modal-pendaftaran-label').html('Form Entri Pendaftaran Poliklinik');

    }

    function konfirmasiSimpanPendaftaran() {
        if ($('#domisili').val() == '') {
            syams_validation('#domisili', 'Silahkan pilih domisili terlebih dahulu');
            return false;
        }

        if ($('#telp').val() === '') {
            syams_validation('#telp', 'Silahkan isi No Telepon terlebih dahulu');
            $('#telp').focus();
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
                        simpanDataDaftar();
                    }
                }
            }
        });
    }

    function simpanDataDaftar() {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pendaftaran/api/pendaftaran/simpan_pendaftaran') ?>',
            data: $('#form_pendaftaran').serialize() + '&check_in=' + 1,
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
                    showErrorValidate('#tanggal-lahir', 'tanggal_lahir', data);
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

                        getAntrianBPJS(1);

                        resetModalDaftar();
                        $('#modal-pendaftaran').modal('hide');
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalAlert('warning', 'Validasi', 'Gagal melakukan pendaftaran, silahkan hubungi IT Management');
            }
        });
    }

    function ambilDataRM(noRM) {

        let dataRm = '';

        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/cek_data_pasien') ?>/no_rm/' + noRM,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code === 201) {

                        messageCustom(data.metaData.message, 'Error');

                    } else {

                        dataRm = data.metaData.data;

                        $('#no-identitas').val(dataRm.no_identitas);
                        $('#nama').val(dataRm.nama);
                        $('#kelamin').val(dataRm.kelamin);
                        $('#tempat-lahir').val(dataRm.tempat_lahir);
                        $('#tanggal-lahir').val((dataRm.tanggal_lahir !== null) ? datefmysql(dataRm.tanggal_lahir) : '');
                        $('#alamat').val(dataRm.alamat);
                        $('#telp').val(dataRm.telp);
                        $('#kelurahan').val(dataRm.id_kelurahan);
                        $('#agama').val(dataRm.agama);
                        $('#goldarah').val(dataRm.gol_darah);
                        $('#pendidikan').val(dataRm.id_pendidikan);
                        $('#pekerjaan').val(dataRm.id_pekerjaan);
                        $('#hamkom').val(dataRm.hamkom);
                        $('#pernikahan').val(dataRm.status_kawin);
                        $('#ayah').val(dataRm.nama_ayah);
                        $('#ibu').val(dataRm.nama_ibu);
                        $('#etnis').val(dataRm.id_etnis);
                        if (dataRm.id_etnis == 17) {
                            $('.etnis_lainnya').show();
                            $('#etnis-lainnya').val(dataRm.etnis_lainnya);
                        }
                        if (dataRm.disabilitas == 1) {
                            $('#disabilitas').prop('checked', true);
                            $('#disabilitas').val(dataRm.disabilitas);
                            $('.hamkom').show();
                            if (dataRm.hamkom !== '') {
                                $('#hamkom').val(dataRm.hamkom);
                                if (dataRm.hamkom == 'Lain - lain') {
                                    $('.hamkom_lainnya').show();
                                    $('#hamkom-lainnya').val(dataRm.hamkom_lainnya);
                                }
                            }
                        } else {
                            $('#disabilitas').prop('checked', false);
                            $('#disabilitas').val('');
                            $('.hamkom').hide();
                            if (dataRm.hamkom === '') {
                                $('#hamkom').val('');
                            }
                        }
                        if (dataRm.no_prop !== null || dataRm.no_kab !== null || dataRm.no_kec !== null || dataRm.no_kel !== null) {
                            getProvinsi(dataRm.no_prop, dataRm.nama_prop);
                            getKabupaten(dataRm.no_prop, dataRm.no_kab, dataRm.nama_kab);
                            if (dataRm.no_kab === '71') {
                                $('#domisili').val(1);
                                $('.reset-field, .reset-select, #cara-bayar').prop('disabled', false);
                            } else {
                                $('#domisili').val(2);
                                $('.reset-field, .reset-select, #cara-bayar').prop('disabled', false);
                            }
                            getKecamatan(dataRm.no_prop, dataRm.no_kab, dataRm.no_kec, dataRm.nama_kec);
                            getKelurahan(dataRm.no_prop, dataRm.no_kab, dataRm.no_kec, dataRm.no_kel, dataRm.nama_kel);
                        }
                        let umur = hitungUmur(dataRm.tanggal_lahir);
                        $('#umur-label').html(umur);
                        resetLogoPasien();
                        if (dataRm !== null) {
                            // status profil pasien
                            if (dataRm.is_alergi == 'Ya') {
                                $('.logo-pasien-alergi').show();
                            }
                            if (dataRm.is_died == 'Ya') {
                                $('.logo-pasien-meninggal').show();
                            }
                            if (dataRm.is_hiv == 'Ya') {
                                $('.logo-pasien-hiv-aids').show();
                            }
                            if (dataRm.is_gonorrhea == 'Ya') {
                                $('.logo-pasien-gonorrhea').show();
                            }
                            if (dataRm.is_hepatitis == 'Ya') {
                                $('.logo-pasien-hepatitis').show();
                            }
                            if (dataRm.is_kusta == 'Ya') {
                                $('.logo-pasien-kusta-lepra').show();
                            }
                            if (dataRm.is_tbc == 'Ya') {
                                $('.logo-pasien-tbc-kp').show();
                            }
                            if (dataRm.is_pasien_pejabat == 'Ya') {
                                $('.logo-pasien-pejabat').show();
                            }
                            if (dataRm.is_pemilik_rs == 'Ya') {
                                $('.logo-pasien-pemilik-rs').show();
                            }
                            if (dataRm.is_potensi_komplain == 'Ya') {
                                $('.logo-pasien-potensi-komplain').show();
                            }
                        }

                    }

                }

            },
            error: function(e) {
                console.log(e);
                accessFailed(e.status);
            }
        });

    }

    function getSEPSpesialis(id_spesialisasi = null, id_dokter = null) {

        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_sep_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
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
                getSEPKlinik(tanggal, data.id_spesialisasi, '#antrian', '#no-antrian');

                if (data.length === undefined) {

                    html += '<option value="' + data.id + '"><b>' + data.dokter + '</b> - <small>' + data.spesialisasi + ' ' + data.jml_terlayani + '</small></option>';

                } else {

                    html += '<option value="">Pilih Dokter</option>';
                    $.each(data, function(i, v) {
                        html += '<option value="' + v.id + '"><b>' + v.dokter + '</b> - <small>' + v.spesialisasi + ' ' + v.jml_terlayani + '</small></option>';
                    });

                }

                $('#dokter').html(html);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function getSEPKlinik(tanggal, id_unit, element_html, element_value) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/get_sep_antrian') ?>',
            data: 'tanggal=' + tanggal + '&id_unit=' + id_unit,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $(element_html).html(data.no_antrian);
                $(element_value).val(data.no_antrian);
            }
        });
    }

    function simpanKehadiran(id, kode, p) {

        let pesan = 'Apakah Pasien sudah Hadir ?';
        let confirm_button = 'Hadir';
        let waktuHadir = new Date().getTime();


        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("panggil_pasien/api/panggil_pasien/simpan_kehadiran_pasien") ?>',
                    data: '&id_hadir=' + id + '&kode=' + kode + '&waktu_hadir=' + waktuHadir,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code === 201) {

                                swalAlert('warning', data.metaData.code, data.metaData.message);

                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                getAntrianBPJS(p);

                            }

                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });

    }

    function detailPanggilan(id) {
        $('#modal-detail-panggilan').modal('show');
        $('#table-panggilan-detail tbody').empty();

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/detail_panggilan') ?>/id_detail/' + id,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#modal_detail_panggilan_label').html('Data Detail Panggil Pasien');
                $('#kode-booking-detail').text(data.antrian.kode_booking);
                $('#no-antrean-detail').text(data.antrian.nomor_antrean);
                $('#dokter-tujuan-detail').text(data.antrian.nama_dokter);
                $('#poli-detail').text(data.antrian.poli);
                $('#status-antrean-detail').text(data.antrian.status);
                $('#loket-detail').text(data.antrian.loket_antrean);
                $('#waktu-panggil-detail').text(datetimefmysql(data.antrian.waktu_panggil));
                $('#status-panggilan-detail').text(data.antrian.panggilan_pasien);

                $.each(data.layanan, function(i, v) {

                    let html = '<tr>' +
                        '<td class="left">' + (++i) + '</td>' +
                        '<td class="left">' + v.jenis_panggilan + '</td>' +
                        '<td class="left">' + v.loket + '</td>' +
                        '<td class="left">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '') + '</td>' +
                        '</tr>';
                    $('#table-panggilan-detail tbody').append(html);

                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function doCheckIn(id, kode_booking, p, lokasi, kodePoli, kodeDokter, noRM, noKa, noRujuk) {

        let loCation = '';

        let pesan = 'Apakah anda ingin melakukan Check In pada pasien ini ?';
        let confirm_button = 'Check In';

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/lakukan_checkin") ?>',
                    data: 'id=' + id + '&kode_booking=' + kode_booking,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        loCation = lokasi;

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code !== 200) {

                                swalAlert('warning', data.metaData.code, data.metaData.message);


                            } else {

                                messageCustom('Check In Berhasil', 'Success');
                                getAntrianBPJS(p);

                                if (loCation === 'mobile') {

                                    mobileCheckin(loCation, kode_booking, kodePoli, kodeDokter, noRM, noKa, noRujuk);

                                }

                            }

                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });
    }

    function cariRM() {

        $('#modal-cari-rm').modal('show');
        $('#cari-nik-rm').val('');
        $('#tanggal-lahir-rm').val('');

    }

    function paging2(p) {
        getCariRM(p);
    }

    function batalAntrean(id, kode_booking, tanggal, id_dokter, p) {
        $('#page-batal').val(p);
        $('#kode-batal-booking').val(kode_booking);
        $('#tanggal-kunjungan-batal').val(tanggal);
        $('#kode-batal-dokter').val(id_dokter);
        $('#id-batal').val(id);
        $('#modal-batal-antrean').modal('show');

    }

    function simpanBatalAntrean() {
        $('#modal-batal-antrean').modal('hide');
        let pesan = 'Apakah anda ingin membatalkan Antrean pada pasien ini ?';
        let confirm_button = 'Simpan';
        let waktuBatal = new Date().getTime();

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/batal_antrian") ?>',
                    data: $('#form-batal-antrean').serialize() + '&waktu_batal=' + waktuBatal,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code === 201) {

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                getAntrianBPJS($('#page-batal').val());


                            } else {

                                messageCustom('Batal Antrian Berhasil', 'Success');
                                getAntrianBPJS($('#page-batal').val());
                            }



                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });

    }

    function validasiAntrianBPJS() {

        // Add Wahyu
        if ($('#jenis-loket').val() === 'Tunai' && $('#kode-poli').val() === '') {
            syams_validation('#kode-poli', 'Silakan Pilih Poli terlebih dahulu');
            $('#kode-poli').focus();
            return false;
        } else {
            syams_validation_remove($('#kode-poli'))
        }

        if ($('#jenis-loket').val() === 'Tunai' && $('#kode-poli').val() !== '58') { //Loket Informasi
            if ($('#dokter-antrian').val() === '' || $('#dokter-antrian').val() === null) {
                syams_validation('#dokter-antrian', 'Silakan Pilih Dokter terlebih dahulu');
                $('#dokter-antrian').focus();
                return false;
            } else {
                syams_validation_remove($('#dokter-antrian'))
            }
        }
        // End

        if ($('#jenis-pasien').val() === '') {
            syams_validation('#jenis-pasien', 'Silakan Pilih Jenis Pasien terlebih dahulu');
            $('#jenis-pasien').focus();
            return false;
        } else {
            syams_validation_remove($('#jenis-pasien'))
        }

        if ($('#jenis-loket').val() === '') {
            syams_validation('#jenis-loket', 'Silakan Pilih Jenis Loket terlebih dahulu');
            $('#jenis-loket').focus();
            return false;
        } else {
            syams_validation_remove($('#jenis-loket'))
        }

        if ($('#kebutuhan-khusus').val() === '') {
            syams_validation('#kebutuhan-khusus', 'Periksa Kembali Apakah Pasien berkebutuhan khusus');
            $('#kebutuhan-khusus').focus();
            return false;
        } else {
            syams_validation_remove($('#kebutuhan-khusus'))
        }

        if ($('#jenis-loket').val() !== 'Informasi' && $('#jenis-loket').val() !== 'Tunai') {

            if ($('#nama-poli').val() === '') {
                syams_validation('#kode-poli', 'Silakan masukkan kode poli terlebih dahulu');
                $('#kode-poli').focus();
                return false;
            } else {
                syams_validation_remove($('#kode-poli'))
            }

            if ($('#dokter-antrian').val() === '') {
                syams_validation('#dokter-antrian', 'Silakan masukkan Nama Dokter terlebih dahulu');
                $('#dokter-antrian').focus();
                return false;
            } else {
                syams_validation_remove($('#dokter-antrian'))
            }

            if ($('#tanggal_periksa').val() === '') {
                syams_validation('#tanggal_periksa', 'Silakan masukkan tanggal periksa terlebih dahulu');
                $('#tanggal_periksa').focus();
                return false;
            } else {
                syams_validation_remove($('#tanggal_periksa'))
            }

            if ($('#jenis-pasien').val() === 'JKN' && $('#jenis-kunjungan').val() === null) {
                syams_validation('#jenis-kunjungan', 'Silakan masukkan Jenis Kunjungan terlebih dahulu');
                $('#jenis-kunjungan').focus();
                return false;
            } else {
                syams_validation_remove($('#jenis-kunjungan'))
            }

            let tanggalPeriksa = $('#tanggal_periksa').val();
            let idDokterBPJS = $('#id-dokter-bpjs').val();

            cekTglPeriksa(tanggalPeriksa, idDokterBPJS);


        } else {

            if ($('#jenis-loket').val() !== 'Tunai' && $('#nama-poli').val() !== '' && $('#dokter-antrian').val() === '') {

                syams_validation('#dokter-antrian', 'Silakan masukkan Nama Dokter terlebih dahulu');
                $('#dokter-antrian').focus();
                return false;

            } else {

                let usia = $('#jenis-loket').val();

                let kebutuhanKhusus = $('#kebutuhan-khusus').val();

                let tanggalPeriksa = date2mysql($('#tanggal_periksa').val());

                Date.prototype.withoutTime = function() {
                    var d = new Date(this);
                    d.setHours(0, 0, 0, 0);
                    return d;
                }

                let tanggalSekarang = new Date().withoutTime();
                let tanggalSebelum = new Date(tanggalPeriksa).withoutTime();

                if (tanggalSebelum < tanggalSekarang) {

                    swalAlert('warning', 'Validasi', 'Tanggal sudah Lewat, silakan cek kembali untuk tanggal periksa');

                } else {

                    cekAntrianBPJS(usia, kebutuhanKhusus, tanggalPeriksa);

                }

            }

        }


    }

    function cekTglPeriksa(tanggal, id) {

        let tanggalPeriksa = date2mysql(tanggal);

        Date.prototype.withoutTime = function() {
            var d = new Date(this);
            d.setHours(0, 0, 0, 0);
            return d;
        }

        let tanggalSekarang = new Date().withoutTime();
        let tanggalSebelum = new Date(tanggalPeriksa).withoutTime();

        if (tanggalSebelum < tanggalSekarang) {

            swalAlert('warning', 'Validasi', 'Tanggal sudah Lewat, silakan cek kembali untuk tanggal periksa');

        }

        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/cek_tanggal_periksa') ?>/tanggal/' + tanggalPeriksa + '/id_dokter/' + id,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (data.metaData.code === 201) {

                    swalAlert('warning', 'Validasi', data.metaData.message);

                } else {

                    if (data.metaData.code === 200) {

                        let usia = $('#jenis-loket').val();

                        let kebutuhanKhusus = $('#kebutuhan-khusus').val();

                        cekAntrianBPJS(usia, kebutuhanKhusus, tanggalPeriksa);

                    }

                }

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function cekAntrianBPJS(usia, kebutuhan, tanggal_periksa) {
        const cekData = {
            cek_jenis_pasien: $('#jenis-pasien').val(),
            cek_no_hp: $('#no-hp-antrian').val(),
            cek_no_ktp: $('#no-ktp-antrian').val(),
            cek_no_rm: $('#no-rm-antrian').val(),
            cek_no_bpjs: $('#no-bpjs-antrian').val(),
            cek_kode_poli_bpjs: $('#kode-poli-bpjs').val()
        }

        $.ajax({
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/cek_antrian_bpjs') ?>/usia/' + usia + '/kebutuhan/' + kebutuhan + '/tanggal_periksa/' + tanggal_periksa,
            type: 'GET',
            data: cekData,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (data.metaData.length === 0 && data.jenisPasien == "JKN" && data.cekData.statusJKN == "JKN") {
                    swalAlert('warning', 'Gagal Menambah Antrian', 'Anda sudah memiliki kode booking <b>' + data.cekData.kodeBooking + '</b>');
                } else if (data.jenisPasien == "Duplikat") {
                    swalAlert('warning', 'Gagal Menambah Antrian', 'Anda memiliki kode booking <b>' + data.cekData.kodeBooking + '</b> dipoli yang sama. <b><i>Batalkan Kode Booking untuk menambah Antrian.</i></b>');
                } else {
                    tambahAntrianBPJS(tanggal_periksa, data.metaData.response);
                }

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

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

    function statusResponse(id, status, kode_booking, p) {

        let pesan = 'Apakah anda ingin mengirim ulang booking BPJS untuk pasien ini ?';
        let confirm_button = 'Booking Ulang';
        let tanggalTunggu = new Date().getTime();

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/booking_ulang') ?>/id/' + id,
                    type: 'GET',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (data.metaData.code === 200) {

                            bookingUlangBPJS(id);

                        } else {

                            swalAlert('warning', data.metaData.code, data.metaData.message);

                        }

                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }

                });

            }

        });

    }

    function bookingUlangBPJS(id) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/booking_kembali') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code !== 200) {

                        swalAlert('warning', data.metaData.code, data.metaData.message);


                    } else {

                        $('#modal-tambah-antrean').modal('hide');
                        getAntrianBPJS(1);
                        messageCustom('Booking Ulang BPJS Berhasil', 'Success');
                    }



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

    // Tambahan Wahyu
    function addAntrianPasienBaru() {
        const fields = [{
            id: '#agama-antrian',
            message: 'Agama tidak boleh kosong'
        }, {
            id: '#pendidikan-antrian',
            message: 'Pendidikan tidak boleh kosong'
        }];

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i];
            const input = $(field.id);

            if (input.val() === '') {
                syams_validation(input, field.message);
                return;
            } else {
                syams_validation_remove(input);
            }
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_bpjs/api/antrian_bridging/cek_data_bpjs_pasien_baru") ?>',
            data: $('#form-tambah-antrean').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                $('.data-pasien-baru').hide()

                let val = data.data[0].peserta;

                var tanggalLahir = val.tglLahir;
                var tanggalSekarang = new Date();
                var tanggalLahirObj = new Date(tanggalLahir);
                var usia = tanggalSekarang.getFullYear() - tanggalLahirObj.getFullYear();
                if (tanggalSekarang.getMonth() < tanggalLahirObj.getMonth() ||
                    (tanggalSekarang.getMonth() == tanggalLahirObj.getMonth() &&
                        tanggalSekarang.getDate() < tanggalLahirObj.getDate())) {
                    usia--; // Kurangi satu tahun jika belum mencapai hari ulang tahun
                }

                if (usia > 60 || usia < 12) {
                    document.getElementById('jenis-loket').value = 'Prioritas';
                }

                $('#jenis-pasien, #pasien-baru').parent().parent().prop('hidden', true);
                $('#tgl-lahir-antrian').val(val.tglLahir);

                $('#btn-process').prop('hidden', false);
                $('#btn-cek-data, #btn-tambah-antrean').prop('hidden', true);
                $('.identitas').hide();
                $('.data-antrian').show();

                $('#nama-pasien-antrian').val(val.nama).attr('readonly', true);
                $('#no-rm-antrian').val(val.no_rm_baru).attr('readonly', true);
                $('#no-ktp-antrian').val(val.nik).attr('readonly', true);
                $('#no-bpjs-antrian').val(val.noKartu).attr('readonly', true);
                $('#no-hp-antrian').val(val.mr.noTelepon);

                messageCustom(data.message, 'Success')
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
                    swalAlert('warning', 'Warning!', e.responseJSON.message)
                    return
                }

                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
                    swalAlert('error', 'Error!', e.responseJSON.message)
                }

                accessFailed(e.status)
            },
        })
    }

    $('#btn-cek-data').on('click', function() {
        if ($('#no-identitas-cek').val() === '') {
            syams_validation($('#no-identitas-cek'), 'No identitas tidak boleh kosong')
            return
        } else {
            syams_validation_remove($('#no-identitas-cek'))
        }
        syams_validation_remove($('#no-rm-antrian, #no-ktp-antrian, #no-bpjs-antrian, #no-hp-antrian, #agama-antrian, #pendidikan-antrian'))

        if ($('#pasien-baru').val() == 1) {
            addAntrianPasienBaru();
        } else {

            $('#select-rujukan').empty().val('').append('<option value="" disabled selected>Loading...</option>');

            $.ajax({
                type: 'POST',
                url: '<?= base_url("antrian_bpjs/api/antrian_bridging/cek_data") ?>',
                data: $('#form-tambah-antrean').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader()
                },
                success: function(data) {
                    let val = data.data;

                    if (val.umur_pasien > 60 || val.umur_pasien < 12) {
                        document.getElementById('jenis-loket').value = 'Prioritas';
                    }

                    $('#jenis-pasien, #pasien-baru').parent().parent().prop('hidden', true);
                    $('#tgl-lahir-antrian').val(val.tanggal_lahir);
                    if (val.id != null && val.no_identitas != null && val.no_polish != null && val.telp != null && val.id != "" && val.no_identitas != "" && val.no_polish != "" && val.telp != "") {
                        // showLoader();
                        cekRujukanBPJS(val.id, val.no_polish, val.id_penjamin_pasien);
                        // showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
                        // setTimeout(function() {
                        //     // cekRujukanBPJS(data);
                        // }, 3000);
                        // $('#select-rujukan').empty();
                        // $('#s2id_kode-poli a .select2-chosen').html('Loading...');
                        $('#btn-tambah-antrean').prop('hidden', false);
                        $('#btn-cek-data, #btn-process').prop('hidden', true);
                        $('.identitas, .bpjs').hide();
                        $('.kode-poli').show();
                        $('.jenis-loket, .kebutuhan-khusus, .dokter, .tanggal_periksa, .jenis, .data-antrian, .rujukan').show();

                        $('#nama-pasien-antrian').val(val.nama).attr('readonly', true);
                        $('#no-rm-antrian').val(val.id).attr('readonly', true);
                        $('#no-ktp-antrian').val(val.no_identitas);
                        $('#no-bpjs-antrian').val(val.no_polish);
                        $('#no-hp-antrian').val(val.telp);

                    } else {
                        $('#btn-process').prop('hidden', false);
                        $('#btn-cek-data, #btn-tambah-antrean').prop('hidden', true);
                        $('.identitas').hide();
                        $('.data-antrian').show();

                        $('#nama-pasien-antrian').val(val.nama).attr('readonly', true);
                        $('#no-rm-antrian').val(val.id).attr('readonly', true);
                        $('#no-ktp-antrian').val(val.no_identitas);
                        $('#no-bpjs-antrian').val(val.no_polish);
                        $('#no-hp-antrian').val(val.telp);
                    }

                    messageCustom(data.message, 'Success')
                },
                complete: function() {
                    hideLoader()
                },
                error: function(e) {
                    if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
                        swalAlert('warning', 'Warning!', e.responseJSON.message)
                        return
                    }

                    if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
                        swalAlert('error', 'Error!', e.responseJSON.message)
                    }

                    accessFailed(e.status)
                },
            })
        }

    })

    $('#btn-process').on('click', function() {
        const fields = [{
                id: '#no-rm-antrian',
                message: 'No. RM tidak boleh kosong'
            },
            {
                id: '#no-ktp-antrian',
                message: 'No. NIK tidak boleh kosong'
            },
            {
                id: '#no-bpjs-antrian',
                message: 'No. BPJS tidak boleh kosong'
            },
            {
                id: '#no-hp-antrian',
                message: 'No. HP tidak boleh kosong'
            }
        ];

        for (let i = 0; i < fields.length; i++) {
            const field = fields[i];
            const input = $(field.id);

            if (input.val() === '') {
                syams_validation(input, field.message);
                return;
            } else {
                syams_validation_remove(input);
            }
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_bpjs/api/antrian_bridging/update_data_pasien") ?>',
            data: $('#form-tambah-antrean').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                let val = data.data;

                if (val.umur_pasien > 60 || val.umur_pasien < 12) {
                    document.getElementById('jenis-loket').value = 'Prioritas';
                }

                $('#jenis-pasien, #pasien-baru').parent().parent().prop('hidden', true);

                cekRujukanBPJS(val.id, val.no_polish, val.id_penjamin_pasien);

                // $('#s2id_kode-poli a .select2-chosen').html('Loading...');
                $('#btn-tambah-antrean').prop('hidden', false);
                $('#btn-cek-data, #btn-process').prop('hidden', true);
                $('.identitas, .bpjs').hide();
                $('.kode-poli').show();
                $('.jenis-loket, .kebutuhan-khusus, .dokter, .tanggal_periksa, .jenis, .data-antrian, .rujukan').show();

                $('#nama-pasien-antrian').val(val.nama).attr('readonly', true);
                $('#no-rm-antrian').val(val.id).attr('readonly', true);
                $('#no-ktp-antrian').val(val.no_identitas);
                $('#no-bpjs-antrian').val(val.no_polish);
                $('#no-hp-antrian').val(val.telp);
                $('#tgl-lahir-antrian').val(val.tanggal_lahir);

                messageCustom(data.message, 'Success')
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
                    swalAlert('warning', 'Warning!', e.responseJSON.message)
                    return
                }

                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
                    swalAlert('error', 'Error!', e.responseJSON.message)
                }

                accessFailed(e.status)
            },
        })

    })

    function cekRujukanBPJS(noRM, noPolish, idPenjaminPasien) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_bpjs/api/antrian_bridging/cek_data_rujukan/no_rm/') ?>' + noRM + '/no_polish/' + noPolish + '/id_penjamin/' + idPenjaminPasien,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                // showLoader()
                showLoaderWithMessage('Pencarian data rujukan, Mohon Tunggu...')
            },
            success: function(data) {
                $('#select-rujukan').empty().val('');

                if (data == null) {
                    swalCustom('error', 'Koneksi Bermasalah', 'Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS');
                }
                // console.log(data.list_rujukan)
                $('#select-rujukan').append(`<option value="" disabled selected>Pilih No. Rujukan...</option>`);
                $.each(data.list_rujukan, function(index, value) {
                    var noRujukan = value.noKunjungan;
                    var kodePoliRujukan = value.kode_poli;
                    var poliRujukan = value.nama_poli;
                    var idPoli = value.id_poli_rujukan;
                    var is_fktp = value.is_rujukan_awal;
                    var is_rs = value.is_rujukan_rs;
                    // var nama = value.peserta.nama;
                    // lakukan sesuatu dengan data tersebut, misalnya menambahkan ke dalam <select>
                    $('#select-rujukan').append(`<option value='${JSON.stringify({
                        no_rujukan: noRujukan,
                        kode_poli_rujukan: kodePoliRujukan,
                        poli_rujukan: poliRujukan,
                        id_poli: idPoli,
                        is_fktp: is_fktp,
                        is_rs: is_rs
                    })}'> ${noRujukan} -  ${poliRujukan} </option>`);
                });

                let poli = data.list_rujukan[0].poliRujukan.nama;
                let namaPoli = poli.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')

                // $('#kode-poli').val(data.list_rujukan[0].id_poli_rujukan).change();
                // $('#s2id_kode-poli a .select2-chosen').html(namaPoli);

                // $('#kode-poli-bpjs').val(data.list_rujukan[0].poliRujukan.kode);
                // $('#nama-poli').val(data.list_rujukan[0].poliRujukan.nama);
                // $('#id-poli').val(data.list_rujukan[0].id_poli_rujukan);
                // getDokterAntrian(data.list_rujukan[0].id_poli_rujukan, $('#tanggal-dokter').val());

                $('#select-rujukan').on('change', function() {
                    const value = JSON.parse($(this).val())

                    $('#kode-poli').val(value.id_poli).change();
                    $('#s2id_kode-poli a .select2-chosen').html(value.poli_rujukan);

                    $('#kode-poli-bpjs').val(value.kode_poli_rujukan);
                    $('#id-poli').val(value.id_poli);
                    $('#no-rujukan-antrian').val(value.no_rujukan);

                    // Ubah input menjadi Capitalize Each Word
                    var namaPoli = value.poli_rujukan;
                    var words = namaPoli.split(' ');
                    for (var i = 0; i < words.length; i++) {
                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                    }
                    $('#nama-poli').val(words.join(' '));

                    getDokterAntrian(value.id_poli, $('#tanggal-dokter').val());

                    if (value.is_rs == 1) {
                        $('#jenis-kunjungan').val(4);
                    } else if (value.is_fktp == 1) {
                        $('#jenis-kunjungan').val(1);
                    } else {
                        $('#jenis-kunjungan').val(3);
                    }
                })



            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                $('#select-rujukan').empty().val('').append('<option value="" disabled selected>Data Rujukan Tidak Ada</option>');
                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
                    swalAlert('warning', 'Warning!', e.responseJSON.message)
                    return
                }

                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status === 500) {
                    swalAlert('error', 'Error!', e.responseJSON.message)
                }

                accessFailed(e.status)
            },
        });
    }
    // end

    function tambahAntrianBPJS(tanggal, data) {

        let antrian = data.urutan;
        let hitung = (antrian * 120000) - 120000;

        let waktuFull = tanggal + ' ' + '07' + ':' + '30' + ':' + '00';
        let konvWaktu = new Date(waktuFull).getTime();
        let hitungWaktu = konvWaktu + hitung;

        $('#estimasi-antrian').val(hitungWaktu);
        $('#kode-booking').val(data.kode_booking);
        $('#angka-antrian').val(data.angka_antrean);
        $('#nomor-antrian').val(data.nomor_antrean);
        $('#huruf-antrian').val(data.huruf_antrean);
        $('#usia-pasien').val(data.usia);

        konfirmasiTambahAntrian(tanggal, data);

    }

    function konfirmasiTambahAntrian(tanggal, data) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/tambah_antrian_bpjs') ?>',
            data: $('#form-tambah-antrean').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code !== 200) {

                        swalAlert('warning', data.metaData.code, data.metaData.message);


                    } else {
                        let val = data.dataAntrian;

                        $('#modal-tambah-antrean').modal('hide');
                        autoCheckIn(val.id, val.kode_booking);
                        // getAntrianBPJS(1);
                        messageCustom('Tambah Antrian Berhasil', 'Success');
                    }

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

    function autoCheckIn(id, kode_booking) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/lakukan_checkin") ?>',
            data: 'id=' + id + '&kode_booking=' + kode_booking,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (typeof data.metaData !== 'undefined') {
                    if (data.metaData.code !== 200) {
                        swalAlert('warning', data.metaData.code, data.metaData.message);
                    } else {
                        messageCustom('Check In Berhasil', 'Success');
                        cetakAntrian(id, 1)
                        // getAntrianBPJS(1);
                        // getAntrianBPJS(p);
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
            }
        })
    }

    function hitungLansia(tanggal) {

        var elem = tanggal.split('-');
        var tahun = elem[0];
        var bulan = elem[1];
        var hari = elem[2];

        var now = new Date();
        var day = now.getUTCDate();
        var month = now.getUTCMonth() + 1;
        var year = now.getYear() + 1900;

        tahun = year - tahun;
        bulan = month - bulan;
        hari = day - hari;

        var jumlahHari;
        var bulanTemp = (month == 1) ? 12 : month - 1;
        if (bulanTemp == 1 || bulanTemp == 3 || bulanTemp == 5 || bulanTemp == 7 || bulanTemp == 8 || bulanTemp == 10 || bulanTemp == 12) {
            jumlahHari = 31;
        } else if (bulanTemp == 2) {
            if (tahun % 4 == 0)
                jumlahHari = 29;
            else
                jumlahHari = 28;
        } else {
            jumlahHari = 30;
        }

        if (hari <= 0) {
            hari += jumlahHari;
            bulan--;
        }
        if (bulan < 0 || (bulan == 0 && tahun != 0)) {
            bulan += 12;
            tahun--;
        }
        if (tanggal === '0000-00-00') {
            return "-";
        } else {
            return tahun;
        }
    }

    function tambahCetakAntrean(id) {

        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/tambah_cetak_antrean') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (!data.status) {
                    alert('Gagal menambah jumlah cetakan')
                }
            },
            error: function(e) {
                alert('Gagal menambah jumlah cetakan')
            }
        })
    }

    function cetakAntrian(id, p) {


        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/cek_jumlah_cetak') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                let jmlCetak = data.cetak;
                if (jmlCetak !== '') {

                    totalCetak = parseInt(jmlCetak);

                    if (totalCetak >= 1) {

                        let pesan = ' Tiket Sudah Tercetak, Apakah ingin dicetak ulang?';
                        let confirm_button = 'Cetak';


                        swal.fire({
                            title: 'Cetak Ulang',
                            html: pesan,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
                            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
                            reverseButtons: true,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {

                                tambahCetakAntrean(id)
                                getAntrianBPJS(p);

                                const user = '<?= $this->session->userdata('nama') ?>';
                                let account_group = "<?= $this->session->userdata('account_group') ?>";

                                if (account_group == 'APM NS' || account_group == 'APM RAJAL ADMIN') {
                                    $.get("<?= base_url() ?>antrian_bpjs/api/antrian_bridging/direct_print_bukti_booking/" + id, function(data, status) {
                                        console.log(status)
                                    })
                                } else {
                                    const dWidth = $(window).width()
                                    const dHeight = $(window).height()
                                    const x = screen.width / 2 - dWidth / 2
                                    const y = screen.height / 2 - dHeight / 2

                                    window.open('<?= base_url() ?>antrian_bpjs/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
                                }

                                // window.open('<?= base_url() ?>antrian_bpjs/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);

                            }
                        });

                    } else {

                        tambahCetakAntrean(id)
                        getAntrianBPJS(p);

                        const user = '<?= $this->session->userdata('nama') ?>';
                        let account_group = "<?= $this->session->userdata('account_group') ?>";

                        if (account_group == 'APM NS' || account_group == 'APM RAJAL ADMIN') {
                            $.get("<?= base_url() ?>antrian_bpjs/api/antrian_bridging/direct_print_bukti_booking/" + id, function(data, status) {
                                console.log(status)
                            })
                        } else {
                            const dWidth = $(window).width()
                            const dHeight = $(window).height()
                            const x = screen.width / 2 - dWidth / 2
                            const y = screen.height / 2 - dHeight / 2

                            window.open('<?= base_url() ?>antrian_bpjs/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
                        }

                        // window.open('<?= base_url() ?>antrian_bpjs/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);

                    }

                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
            }

        });


    }
</script>

<style>
    .custom-swal-popup {
        width: 70% !important;
    }
</style>