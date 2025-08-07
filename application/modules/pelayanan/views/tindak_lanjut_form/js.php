<script>
    $(function() {

        $(':checkbox[readonly]').click(function() {
            return false;
        });

        $('#tindak-lanjut').change(function() {
            $('.ranap, .rujuk, .kondisi, .igd-area').hide();
            $('#kondisi-keluar').val('Hidup');

            if ($(this).val() === 'Rawat Inap' | $(this).val() === 'Kebidanan') {
                $('.ranap').show();
                $('#pindah-ruang').prop('checked', false)
            }

            if ($(this).val() === 'Intensive Care') {
                $('.icare').show();
            }

            if ($(this).val() === 'RS Lain') {
                $('.kondisi').show();
                $('.rujuk').show();
            }

            if ($(this).val() === 'IGD') {
                $('.igd-area').show();
            }

            if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                $('.kondisi').show();

                if ($(this).val() === 'Pemulasaran Jenazah') {
                    $("#kondisi-keluar option[value='Hidup']").hide()
                    $("#kondisi-keluar option[value='Meninggal < 48 Jam']").show()
                    $("#kondisi-keluar option[value='Meninggal > 48 Jam']").show()
                    $('#kondisi-keluar').val('Meninggal < 48 Jam')

                } else {
                    $("#kondisi-keluar option[value='Hidup']").show()
                    $("#kondisi-keluar option[value='Meninggal < 48 Jam']").hide()
                    $("#kondisi-keluar option[value='Meninggal > 48 Jam']").hide()
                    $('#kondisi-keluar').val('Hidup')
                }

                if ($('#jenis-layanan').val() === 'Rawat Inap') {
                    cekDiagnosaAkhir();
                }
            }

            if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Pulang') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pemulasaran Jenazah') | ($(this).val() === 'RS Lain') | ($(this).val() === 'IGD') | ($(this).val() === 'Rawat Inap')) {
                cekBHPOperasi($('#id-layanan-pendaftaran').val());
            }
        });

        // SELECT2 AUTO
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

        $('#dokter-ranap').select2({
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

        $('#dokter-dpjp').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '10',
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

        $('#bangsal-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/bangsal_ranap_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/>' + data.kode;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#kondisi-keluar').change(function() {
            $('.mati').hide();
            if ($(this).val() === 'Meninggal' | $(this).val() === 'Meninggal < 48 Jam' | $(this).val() === 'Meninggal > 48 Jam') {
                $('.mati').show();
            }
        });

        $('#skd-id-unit-layanan-tujuan').select2({
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
                $('#skd-bpjs-unit-layanan-tujuan').val(data.kode_bpjs);
                return data.nama;
            }
        });

        $('#skd-id-unit-layanan-tujuan').change(function() {
            risetFormSuratKontrolDoker('datainputedit');
            if ($('#skd-id-unit-layanan-tujuan').val() === $('#skd-id-unit-layanan-asal').val()) {
                $('.kontrol').show();
                $('.internal').hide(); //kontrol
            } else {
                $('.kontrol').hide();
                $('.internal').show(); // internal  
            }
        });

        $('#skd-tanggal-kontrol').on('change', function() {
            if ($('#kadaluarsa-rujukan').text() != '') {
                tgl_rujukan = date2mysql($('#kadaluarsa-rujukan').text());
                tgl_kontrol = date2mysql($('#skd-tanggal-kontrol').val());
                isAktif = tgl_rujukan >= tgl_kontrol;
                $('#cek-tgl-rujukan').html(`<h4><b>Status Rujukan saat Kontrol : ${isAktif ? 'AKTIF</b> </h4>' : '<b style="color:red">TIDAK AKTIF</b></b> </h4>'}`);
            } else {
                $('#cek-tgl-rujukan').html(``);
            }
        });

        $('#skd-tanggal-kontrol, #skd-id-unit-layanan-tujuan').on('change', function() {
            if ($('#skd-id-unit-layanan-tujuan').val() != '' && $('#skd-tanggal-kontrol').val() != '') {
                getJadwalDokter($('#skd-id-unit-layanan-tujuan').val(), $('#skd-tanggal-kontrol').val());
                $('#skd-kuota').html('');
            } else {
                $('#skd-kuota').html('<i style="color:red;">Data dokter tidak dapat ditampilkan. Pilih POLIKLINIK TUJUAN dan TANGGAL KONTROL.</i>');
            }
        });

        $('#skd-id-dokter-tujuan').change(function() {
			$('#skd-id-jadwal-dokter').val( $('#skd-id-dokter-tujuan option:selected').attr('data-target') );
            $('#skd-id-dokter-tujuan').val() != '' ? getKodeBPJSDokter($('#skd-id-dokter-tujuan').val()) : $('#skd-bpjs-dokter-tujuan').val('');
            checkJmlPasienBooking(date2mysql($('#skd-tanggal-kontrol').val()), $('#skd-id-unit-layanan-tujuan').val(), $('#skd-id-dokter-tujuan').val());
        });

        $('#skd-tanggal-kontrol').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '+0d'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

    });

    function formTindakLanjut(id_pendaftaran, id_layanan_pendaftaran, resep, id_dokter, nama_dokter, layanan, jenis = '', id_penjamin = '', status_terlayani = null, triase_igd = null) {

        $('#id_penjamin').val(id_penjamin);
        $('#layanan_tl').val(layanan);
        if (jenis === '') {
            if (id_dokter === null) {
                swalAlert('warning', 'Validasi', 'Dokter DPJP harus diisi terlebih dahulu !');
                return false;
            }
        }
        $('#dokter-ranap, #bangsal-auto, #id-pendaftaran-inap, #layanan-inap, #rhm-id-layanan-pendaftaran, #id-layanan-pendaftaran').val('');
        $('#rhm-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
        $('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
        $('#s2id_dokter-ranap a .select2-chosen').html(nama_dokter);
        $('#dokter-ranap').val(id_dokter);
        $('#s2id_dokter-dpjp a .select2-chosen').html('Pilih Dokter DPJP');
        $('#s2id_bangsal-auto a .select2-chosen').html('Pilih Bangsal Tujuan');
        $('.ranap, .rujuk, .kondisi, .igd-area').hide();
        $('.kondisi').show();
        $('#tanpa-resep').val(resep);

        $('#id-pendaftaran-inap').val(id_pendaftaran);
        // $('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
        $('#id-layanan-pendaftaran2').val(id_layanan_pendaftaran);

        if (layanan === 'Rehab Medik') {

            //14062021 
            $('#footer-rehab').html('');
            //end14062021

            let html = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjutRehab()"><i class="fas fa-plus-circle"></i> Checkout</button>';

            $('#footer-rehab').append(html);

        } else if (layanan === 'Laboratorium') {

            //15032022
            $('#footer-rehab').html('');
            //15032022

            let html = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjutLaboratorium()"><i class="fas fa-plus-circle"></i> Checkout</button>';

            $('#footer-rehab').append(html);

        } else if (layanan === 'Radiologi') {

            //15032022
            $('#footer-rehab').html('');
            //15032022

            let html = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjutRadiologi()"><i class="fas fa-plus-circle"></i> Checkout</button>';

            $('#footer-rehab').append(html);

        } else if (layanan === 'IGD') {


            if (status_terlayani !== null && status_terlayani === 'Belum') {
                swalAlert('warning', 'Peringatan', 'Pasien belum dilakukan pemeriksaan. Silahkan input diagnosa');
                reeturn;
            }

			if (triase_igd !== '1') {
                swalAlert('warning', 'Peringatan', 'Form Triase IGD belum diinput. Silahkan input Form Triase dan Pengkajian Awal IGD [FORM-KEP-26-04]');
                reeturn;
            }
			
            //15032022
            $('#footer-rehab').html('');
            //15032022

            let html = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjut()"><i class="fas fa-plus-circle"></i> Checkout</button>';

            $('#footer-rehab').append(html);

        } else {

            //14062021 
            $('#footer-rehab').html('');
            //end14062021

            let html = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjut()"><i class="fas fa-plus-circle"></i> Checkout</button>';

            $('#footer-rehab').append(html);

        }

        $('#modal-tindak-lanjut').modal('show');
    }

    function cekDiagnosaAkhir() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#id-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    openFormDiagnosaAkhir($('#id-layanan-pendaftaran').val());
                    return false;
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        })
    }

    function cekBHPOperasi(id_layanan_pendaftaran) {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_status_bhp_operasi") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            async: false,
            success: function(data) {
                if (data.status === false) {
                    swal({
                        html: true,
                        title: 'Warning',
                        text: data.message,
                        type: "warning"
                    });
                }
            }

        })
    }

    function openFormDiagnosaAkhir(id_layanan_pendaftaran) {
        $('#id-layanan-pendaftaran-akhir').val(id_layanan_pendaftaran);
    }

    function simpanTindakLanjut() {
        if ($('#tindak-lanjut').val() === 'RS Lain') {

            if ($('#instansi-rujukan').val() === '') {
                syams_validation('#instansi-rujukan', 'Instansi Rujukan harus diisi...');
                return false;
            }

            syams_validation_remove('#instansi-rujukan');

            if ($('#keterangan-rujukan').val() === '') {
                syams_validation('#keterangan-rujukan', 'Keterangan Rujukan harus diisi...');
                return false;
            }

            syams_validation_remove('#keterangan-rujukan');
        }

        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#id-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
					messageCustom('Diagnosa belum terisi, silahkan isi diagnosa !', 'Info');
                    // if ($('#jenis-layanan').val() === 'Rawat Inap' | $('#jenis-layanan').val() === 'Intensive Care') {
                    //     if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                    //         openFormDiagnosaAkhir($('#id-layanan-pendaftaran').val());
                    //     } else {
                    //         konfirmasiSimpanTindakLanjut();
                    //     }
                    // } else {
                    //     konfirmasiSimpanTindakLanjut();
                    // }
                } else {
                    konfirmasiSimpanTindakLanjut();
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        });
    }

    function simpanTindakLanjutRehab() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#rhm-id-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    if ($('#jenis-layanan').val() === 'Rawat Inap' | $('#jenis-layanan').val() === 'Intensive Care') {
                        if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                            openFormDiagnosaAkhir($('#rhm-layanan-pendaftaran').val());
                        } else {
                            konfirmasiSimpanTindakLanjutRehab();
                        }
                    } else {
                        konfirmasiSimpanTindakLanjutRehab();
                    }
                } else {
                    konfirmasiSimpanTindakLanjutRehab();
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        });
    }

    function simpanTindakLanjutLaboratorium() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#rhm-id-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    if ($('#jenis-layanan').val() === 'Rawat Inap' | $('#jenis-layanan').val() === 'Intensive Care') {
                        if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                            openFormDiagnosaAkhir($('#rhm-layanan-pendaftaran').val());
                        } else {
                            konfirmasiSimpanTindakLanjutLaboratorium();
                        }
                    } else {
                        konfirmasiSimpanTindakLanjutLaboratorium();
                    }
                } else {
                    konfirmasiSimpanTindakLanjutLaboratorium();
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        });
    }

    function simpanTindakLanjutRadiologi() {
        $.ajax({
            url: '<?= base_url("pelayanan/api/pelayanan/cek_diagnosa_akhir") ?>/id/' + $('#rhm-id-layanan-pendaftaran').val(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    if ($('#jenis-layanan').val() === 'Rawat Inap' | $('#jenis-layanan').val() === 'Intensive Care') {
                        if (($(this).val() === 'Pulang APS') | ($(this).val() === 'Atas Izin Dokter') | ($(this).val() === 'Melarikan Diri') | ($(this).val() === 'Pulang Paksa') | ($(this).val() === 'Pulang') | ($(this).val() === 'Pemulasaran Jenazah')) {
                            openFormDiagnosaAkhir($('#rhm-layanan-pendaftaran').val());
                        } else {
                            konfirmasiSimpanTindakLanjutRadiologi();
                        }
                    } else {
                        konfirmasiSimpanTindakLanjutRadiologi();
                    }
                } else {
                    konfirmasiSimpanTindakLanjutRadiologi();
                }
            },
            error: function(e) {
                messageCustom('Gagal Mengakses Data', 'Error');
            }
        });
    }

    function konfirmasiSimpanTindakLanjut() {
        var stop = false;
        if ($('#tindak-lanjut').val() === '') {
            syams_validation('#tindak-lanjut', 'Kolom cara keluar harus diisi');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tindak_lanjut") ?>/' + '<?= $jenis_tindak_lanjut ?>',
            data: $('#form-tindak-lanjut').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    // if ($('#tindak-lanjut').val() === 'Atas Izin Dokter' || $('#tindak-lanjut').val() === 'Pulang APS') {
                    //     pembuatanSuratKontrol(data.id_pendaftaran, data.id_layanan_pendaftaran)
                    // }

                    $('#modal-tindak-lanjut').modal('hide');
                    getListPemeriksaan($('#page_now').val(), '');
                    messageCustom(data.message, 'Success');
                    $('#id_penjamin').val() == '1' ? formSuratKontrolDoker(data.id_pendaftaran, data.id_layanan_pendaftaran, 'dokter') : '';
                } else {
                    modalDialogKonfirmasiResep(data.id_pendaftaran, data.id_layanan_pendaftaran, data.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function konfirmasiSimpanTindakLanjutLaboratorium() {
        var stop = false;
        if ($('#tindak-lanjut').val() === '') {
            syams_validation('#tindak-lanjut', 'Kolom cara keluar harus diisi');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tindak_lanjut") ?>/' + '<?= $jenis_tindak_lanjut ?>',
            data: $('#form-tindak-lanjut').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    $('#modal-tindak-lanjut').modal('hide');
                    getListDataHasilLaboratorium($('#page-now').val());
                    messageCustom(data.message, 'Success');
                } else {
                    modalDialogKonfirmasiResep(data.id_pendaftaran, data.id_layanan_pendaftaran, data.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function konfirmasiSimpanTindakLanjutRehab() {
        var stop = false;
        if ($('#tindak-lanjut').val() === '') {
            syams_validation('#tindak-lanjut', 'Kolom cara keluar harus diisi');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tindak_lanjut_rehab") ?>/' + '<?= $jenis_tindak_lanjut ?>',
            data: $('#form-tindak-lanjut').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    $('#modal-tindak-lanjut').modal('hide');
                    getListPemeriksaan($('#page_now').val(), '');
                    messageCustom(data.message, 'Success');
                } else {
                    modalDialogKonfirmasiResep(data.id_pendaftaran, data.id_layanan_pendaftaran, data.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function konfirmasiSimpanTindakLanjutRadiologi() {
        var stop = false;
        if ($('#tindak-lanjut').val() === '') {
            syams_validation('#tindak-lanjut', 'Kolom cara keluar harus diisi');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_tindak_lanjut") ?>/' + '<?= $jenis_tindak_lanjut ?>',
            data: $('#form-tindak-lanjut').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    $('#modal-tindak-lanjut').modal('hide');
                    getListDataHasilRadiologi($('#page-now').val());
                    messageCustom(data.message, 'Success');
                } else {
                    modalDialogKonfirmasiResep(data.id_pendaftaran, data.id_layanan_pendaftaran, data.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function modalDialogKonfirmasiResep(id_pendaftaran, id_layanan_pendafaran, message) {
        bootbox.dialog({
            message: message,
            title: "Warning!",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle"></i> Tidak',
                    className: "btn-secondary",
                    callback: function() {
                        $('#modal-tindak-lanjut').modal('hide');
                    }
                },
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> Ya',
                    className: "btn-info",
                    callback: function() {
                        $('#tanpa-resep').val('Ya');
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluar(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar pasien",
            title: "Pembatalan Status Keluar!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarMcu(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar pasien",
            title: "Pembatalan Status Keluar!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarLaboratorium(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar pasien",
            title: "Pembatalan Status Keluar!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListDataHasilLaboratorium($('#page-now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarRadiologi(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar pasien",
            title: "Pembatalan Status Keluar!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListDataHasilRadiologi($('#page-now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanKonsulKlinik(id_pendaftaran, id_layanan_pendaftaran) {
        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan Konsul Klinik pasien",
            title: "Pembatalan Konsul Klinik!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_konsul_klinik") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            data: {
                                jenis_layanan: JENIS_LAYANAN
                            },
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan konsul klinik', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan konsul klinik', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function statusKeluarSementara(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut === 'null') {
            messageCustom('Pasien belum dipulangkan', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/status_keluar_sementara") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function statusKeluarSementaraIt(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut === 'null') {
            messageCustom('Pasien belum dipulangkan', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/status_keluar_sementara_it") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarSementara(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut !== 'cco sementara' && tindak_lanjut !== 'cco sementara it') {
            messageCustom('Pasien tidak dengan status pulang CCO SEMENTARA ', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar_sementara") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function statusKeluarSementaraMcu(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut === 'null') {
            messageCustom('Pasien belum dipulangkan', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/status_keluar_sementara_mcu") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function pembatalanStatusKeluarSementaraMcu(id_pendaftaran, id_layanan_pendaftaran, tindak_lanjut) {

        if (tindak_lanjut !== 'cco sementara' && tindak_lanjut !== 'cco sementara it') {
            messageCustom('Pasien tidak dengan status pulang CCO SEMENTARA ', 'Info');
            return false;
        }

        bootbox.dialog({
            message: "Klik OK untuk melakukan pembatalan status keluar SEMENTARA !",
            title: "Pembatalan Status Keluar Sementara!",
            buttons: {
                konfirmasi: {
                    label: '<i class="fas fa-check-circle"></i> OK',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            url: '<?= base_url("pelayanan/api/pelayanan/pembatalan_status_keluar_sementara_mcu") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader()
                            },
                            success: function(data) {
                                getListPemeriksaan($('#page_now').val());
                                messageCustom('Berhasil melakukan pembatalan status keluar SEMENTARA', 'Success');
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Gagal melakukan pembatalan status keluar SEMENTARA', 'Error');
                            }
                        });
                    }
                }
            }
        });
    }

    function formSuratKontrolDoker(id_pendaftaran, id_layanan_pendaftaran, petugas) {
        $('#skd-petugas').val(petugas);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_detail_pasien_skd") ?>/' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#skd-id-unit-layanan-tujuan').select2('readonly', false);
                if (data.id_penjamin == '1' && data.id_unit_layanan == '45') {
                    id_unit = '30';
                    nama_unit = 'Penyakit Dalam';
                } else {
                    if (data.jenis_layanan == 'Hemodialisa') {
                        id_unit = '59';
                        nama_unit = 'Hemodialisa';
                        $('#skd-id-unit-layanan-tujuan').select2('readonly', true);
                    } else {
                        id_unit = data.id_unit_layanan;
                        nama_unit = data.layanan;
                    }
                }
              
                if ($('#skd-petugas').val() != 'ns') {
                    risetFormSuratKontrolDoker('auto');
                    risetFormSuratKontrolDoker('datainput');
                }
                $('#skd-btn-riwayat').empty();
                $('#skd-btn-riwayat').append(': <button type="button" title="Riwayat Kontrol Pasien" class="btn btn-secondary btn-xxs" onclick="riwayatSKD(\'' + data.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Kontrol Pasien</button>');
                $('#skd-btn-riwayat-reload').empty();
                $('#skd-btn-riwayat-reload').append('<button type="button" class="btn btn-secondary waves-effect" onclick="reloadDataSKDRiwayat(\'' + data.id_pasien + '\')"><i class="fas fa-history"></i> Reload Data</button>');
                $('#skd-id-pendaftaran').val(id_pendaftaran);
                $('#skd-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                $('#skd-id-penjamin').val(data.id_penjamin);

                $('#skd-id-pasien').val(data.id_pasien);
                $('#skd-id-pasien-tampil').text(data.id_pasien);
                $('#skd-nama-pasien').text(data.nama_pasien);
                $('#skd-umur').text(data.tanggal_lahir !== null ? hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')' : '');

                $('#skd-penjamin').text(data.penjamin);
                $('#skd-penjamin-nobpjs').text(data.no_polish);
                const skdRujukan = data.poli_rujukan !== null && data.tgl_kadaluarsa !== null

                // $('#skd-rujukan').text(data.poli_rujukan ? `${data.poli_rujukan} (${data.no_rujukan}) ` : data.no_rujukan);
                $('#skd-rujukan-poli').text(data.poli_rujukan ? `${data.poli_rujukan}` : '');
                $('#skd-rujukan').text(data.no_rujukan ? ` (${data.no_rujukan}) ` : '');
                $('#skd-rujukan-kode-bpjs-poli').text(data.rujukan_kode_poli ? `${data.rujukan_kode_poli}` : '');

                if (data.tgl_kadaluarsa != null) {
                    if (data.bridgingBpjs == true) {
                        $('#kadaluarsa-rujukan').text(datefmysql(data.tgl_kadaluarsa) );
                    } else {
                        $('#kadaluarsa-rujukan').text(datefmysql(data.tgl_kadaluarsa) );
                    }
                    $('#faskes-asal-rujukan').text(' (' + data.asal_rujukan + ')');
                } else {
                    $('#kadaluarsa-rujukan').html('');
                    $('#faskes-asal-rujukan').html('<i style="color:red">No Rujukan Tidak Ada / Kadaluarsa. Hubungi Pendaftaran</i>');
                }

                if (data.bridgingBpjs) {
                    $('#icon-bridging').removeClass().addClass('label label-danger').attr('title', 'Data Rujukan dari Bridging BPJS'); // BPJS
                } else {
                    $('#icon-bridging').removeClass().addClass('label label-info').attr('title', 'Data Rujukan dari SIMRS'); // SIMRS
                }

                $('#skd-nosep').val(data.no_sep);

                $('#skd-id-dokter-asal').val(data.id_dokter);
                $('#skd-dokter-asal').text(data.nama_dokter);
                $('#skd-waktu-layanan-asal').text(data.waktu_layanan);

                $('#skd-bpjs-unit-layanan-asal').val(data.kode_bpjs_poli);
                $('#skd-id-unit-layanan-asal').val(id_unit);
                $('#skd-unit-layanan-asal').text(nama_unit);
                data.no_sep != null ? sep = '(' + data.no_sep + ')' : sep = '';
                $('#skd-sep-asal').text(sep);

                data.kontrol_pasca_ranap == '1' ? kontrol_pasca_ranap = '<b>Iya</b>' : kontrol_pasca_ranap = 'Tidak';
                $('#skd-pasca-ranap').html(kontrol_pasca_ranap);

                $('#skd-bpjs-unit-layanan-tujuan').val(data.kode_bpjs_poli);
                $('#skd-id-unit-layanan-tujuan').val(id_unit);
                $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html(nama_unit);

                if ($('#skd-id-unit-layanan-tujuan').val() != '' && $('#skd-tanggal-kontrol').val() != '') {
                    getJadwalDokter($('#skd-id-unit-layanan-tujuan').val(), $('#skd-tanggal-kontrol').val());
                } else {
                    $('#skd-id-dokter-tujuan').val('')
                }
				
				if ($('#skd-unit-layanan-asal').text() != 'Hemodialisa') {				
					// if ($('#skd-rujukan-kode-bpjs-poli').text() == $('#skd-bpjs-unit-layanan-asal').val() ) {
					if (($('#skd-rujukan-kode-bpjs-poli').text() == $('#skd-bpjs-unit-layanan-asal').val() ) || $('#skd-rujukan-poli').text() == 'B20' ) {	
						$('#skd-cek-poli').html('');
						$('#skd-id-unit-layanan-tujuan').select2('readonly', false);
						console.log('Poli Rujukan dan Poliklinik sama. '+$('#skd-rujukan-kode-bpjs-poli').text()+'='+$('#skd-bpjs-unit-layanan-asal').val());
					} else {
						$('#skd-cek-poli').html('<i style="color:red;"><h4><b>Poli Rujukan tidak sama, tidak bisa merubah tujuan poliklinik!</b></h4><h6>Jika tetap ingin kontrol ke beda poli, silahkan arahkan pasien ke Konter Surat Kontrol (Kong harun / Wita).</h6></i>');
						$('#skd-id-unit-layanan-tujuan').select2('readonly', true);
						console.log('Poli Rujukan dan Poliklinik tidak sama! tidak bisa pilih poli tujuan. '+$('#skd-rujukan-kode-bpjs-poli').text()+'<>'+$('#skd-bpjs-unit-layanan-asal').val());
					}
				}
				
				$('#skd-rujukan-kode-bpjs-poli').text() == '' ? $('#skd-cek-poli').html('') : '';
				
                $('.kontrol').show();
                $('.internal').hide();

                // Input Jawaban Surat Kontrol Internal
                if (data.id_kontrol_pengirim !== null) {
                    $('#skdi-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                    $('#skdi-id-pasien-tampil').text(data.id_pasien);
                    $('#skdi-nama-pasien').text(data.nama_pasien);
                    $('#skdi-umur').text(data.tanggal_lahir !== null ? hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')' : '');
                    getDataSKDI(data.id_kontrol_pengirim);
                }

                petugas == 'dokter' ? getDataSKD(id_layanan_pendaftaran) : '';
                $('#modal-surat-kontrol-dokter').modal('show');
				
				$('#skd-btn-cek-sep-asal').empty();
                var groupAccount = '<?= $this->session->userdata('account_group') ?>';
                if (groupAccount == 'Admin') {
                    let cek_sep_asal = '<button type="button" class="btn btn-secondary btn-xxs" onclick="getSEPAsal(\'' + data.no_polish + '\',\'' + data.no_sep + '\',\'' + data.kontrol_pasca_ranap + '\',\'' + data.kode_booking + '\')" style="margin-left: 5px;"><i class="fas fa-fw fa-search m-r-5"></i> Cek SEP Asal</button>';
                    $('#skd-btn-cek-sep-asal').append(cek_sep_asal);
                }
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil detail data Pasien');
            }
        });
    }

    function showFormInternal(id) {
        $('#modal-surat-kontrol-dokter-internal').modal('show');
    }

    function getDataSKDI(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_skd_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#skdi-id').val(data.id);
                $('#skdi-id-jawab').val(data.id_skd_internal);
                $('#skdi-unit-layanan-asal').text(data.spesialisasi_asal);
                $('#skdi-dokter-asal').text(data.dokter_asal);
                $('#skdi-tglkunjung-asal').text(data.tanggal_daftar);

                if (data.jenis_bantuan != null) {
                    var jb = JSON.parse(data.jenis_bantuan);
                    if (jb.konsul == '1') {
                        $('#skdi-konsul').prop('checked', true)
                    }
                    if (jb.raber == '1') {
                        $('#skdi-raber').prop('checked', true)
                    }
                    if (jb.alih == '1') {
                        $('#skdi-alih').prop('checked', true)
                    }
                }
                $('#skdi-dirawat-dengan').val(data.dirawat_dengan != '' ? data.dirawat_dengan : '');
                $('#skdi-keterangan').val(data.keterangan != '' ? data.keterangan : '');
                $('#skdi-hasil-pemeriksaan').val(data.pemeriksaan != '' ? data.pemeriksaan : '');
                $('#skdi-saran').val(data.saran != '' ? data.saran : '');
                risetFormSuratKontrolDoker('autointernal');

                let status_jawab = '';
                if (data.id_skd_internal !== null) {
                    status_jawab = ' <span class="blinker"><i style="color:green"><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i> Sudah</i></span>';
                    $('#modal-surat-kontrol-dokter-internal').modal('hide');
                } else {
                    status_jawab = ' <span class="blinker"><i style="color:red"><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i> Belum</i></span>';
                    // $('#skd-petugas').val() == 'dokter' ? $('#modal-surat-kontrol-dokter-internal').modal('show') : $('#modal-surat-kontrol-dokter-internal').modal('hide');
                }
                let disabled_skdi = '';
                $('#skd-petugas').val() != 'dokter' ? disabled_skdi = 'disabled' : disabled_skdi = '';
                let kontrol_pengirim = '<td class="bold">Jawab Kontrol Internal</td>' +
                    '<td> : <button ' + disabled_skdi + ' type="button" class="btn btn-secondary btn-xxs" onclick="showFormInternal(' + data.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i> Jawab Kontrol Internal</button>' + status_jawab + '</td>';
                $('#skd-btn-kontrol-pengirim').empty();
                $('#skd-btn-kontrol-pengirim').append(kontrol_pengirim);
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data Surat Keteranan Kontrol Internal');
            }
        });
    }

    function reloadDataSKD() {
        getDataSKD($('#skd-id-layanan-pendaftaran').val());
    }

    function konfirmasiSimpanSKD() {
        if ($('#skd-pasca-ranap').text() == 'Iya') {
            swalAlert('info', 'Pasien Pasca Ranap', 'Tidak dapat membuat SKK, Pasien menggunakan Rujukan Pasca Rawat Inap. Silahkan arahkan pasien untuk membuat rujukan dan melakukan booking dengan rujukan tersebut.');
        } else {

            var stop = false;
            if ($('#skd-id-unit-layanan-tujuan').val() == '') {
                syams_validation('#s2id_skd-id-unit-layanan-tujuan', 'Tujuan poliklinik tidak boleh kosong');
                stop = true;
            }

            if ($('#skd-tanggal-kontrol').val() == '') {
                syams_validation('#skd-tanggal-kontrol', 'Tanggal tujuan kontrol tidak boleh kosong');
                stop = true;
            }

            if (stop) {
                return false;
            }

            const nama_penjamin = $('#skd-penjamin').html().split(' ')
            if (nama_penjamin[0] == 'BPJS') {
                // const rujukan_kode_poli = $('#skd-rujukan').html().split(') ')
                // const rujukan_nama_poli = $('#skd-rujukan').html().split(' (')
                poli_tujuan = $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html();
                if ($('#skd-rujukan-poli').html() != 'undefined') {
                    if ($('#skd-rujukan-poli').html() != $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html() ) {
                        bootbox.dialog({
                            title: "Konfirmasi Buat SKK",
                            message: "Poli tujuan Kontrol (" + $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html() + ") tidak sama dengan Poli Rujukan (" + $('#skd-rujukan-poli').html() + "). Apakah tetap membuat SKK ?",
                            buttons: {
                                cancel: {
                                    label: '<i class="fas fa-window-close"></i> Batal',
                                    className: 'btn-secondary'
                                },
                                confirm: {
                                    label: '<i class="fas fa-check"></i> Buat SKK',
                                    className: 'btn-info',
                                    callback: function() {
                                        SimpanSKD();
                                    }
                                }
                            }
                        });
                    } else {
                        // BPJS, rujukan ada respon, poli sama
						//if((poli_tujuan == 'Hemodialisa') || (poli_tujuan == 'Rehab Medik') || ($('#skd-preoperasi').prop('checked')) ) {
                            SimpanSKD();
                        //} else {
                        //    if($('#skd-id').val() !== ''){
                        //        getTanggalKontrol($('#skd-id-pasien').val(),date2mysql($('#skd-tanggal-kontrol').val()), $('#skd-tglsebelum').val());
                        //    } else {
                        //        getTanggalKontrol($('#skd-id-pasien').val(),date2mysql($('#skd-tanggal-kontrol').val()));
                        //    }
                        //}
                    }
                } else {
                    // BPJS, Rujukan tidak ada respon
					//if((poli_tujuan == 'Hemodialisa') || (poli_tujuan == 'Rehab Medik') || ($('#skd-preoperasi').prop('checked')) ) {
						SimpanSKD();
					//} else {
					//    if($('#skd-id').val() !== ''){
					//        getTanggalKontrol($('#skd-id-pasien').val(),date2mysql($('#skd-tanggal-kontrol').val()), $('#skd-tglsebelum').val());
					//    } else {
					//        getTanggalKontrol($('#skd-id-pasien').val(),date2mysql($('#skd-tanggal-kontrol').val()));
					//    }
					//}
                }
            } else {
                //Selain BPJS       
                SimpanSKD();
            }
        }
    }

    function SimpanSKD() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_surat_kontrol_dokter") ?>',
            data: $('#form-surat-kontrol-dokter').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    data.skbcode != '200' ? messageCustom(data.skbmessage, 'Info') : '';

                    if ($('#skd-petugas').val() != 'ns') {
                        getDataSKD($('#skd-id-layanan-pendaftaran').val());
                        risetFormSuratKontrolDoker('auto')
                        risetFormSuratKontrolDoker('datainput');
                    } else {
                        $('#modal-surat-kontrol-dokter').modal('hide');
                    }
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function konfirmasiSimpanSKDI() {
        var stop = false;
        if ($('#skdi-hasil-pemeriksaan').val() == '') {
            syams_validation('#skdi-hasil-pemeriksaan', 'Hasil pemeriksaan tidak boleh kosong');
            stop = true;
        }

        if ($('#skdi-saran').val() == '') {
            syams_validation('#skdi-saran', 'Saran tidak boleh kosong');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_surat_kontrol_dokter_internal") ?>',
            data: $('#form-surat-kontrol-dokter-interna').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                messageCustom('Simpan Jawaban Surat Kontrol Internal Berhasil', 'Success');
                getDataSKDI($('#skdi-id').val(), 'dokter');
                risetFormSuratKontrolDoker('autointernal');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        })
    }

    function batalSKD() {
        risetFormSuratKontrolDoker('auto');
        risetFormSuratKontrolDoker('datainput');
    }

    function setUbahDataInternal() {
        $('#skdi-hasil-pemeriksaan').attr('readonly', false);
        $('#skdi-saran').attr('readonly', false);
        $('#btn-simpan-skdi').empty();
        $('#btn-simpan-skdi').append('<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanSKDI()"><i class="fas fa-plus-circle"></i> Simpan Perubahan</button>');
    }

    function risetFormSuratKontrolDoker(type) {
        if (type == 'autointernal') {
            if ($('#skdi-id-jawab').val() != '') {
                $('#skdi-hasil-pemeriksaan').attr('readonly', true);
                $('#skdi-saran').attr('readonly', true);
                $('#btn-simpan-skdi').empty();
                $('#btn-simpan-skdi').append('<button type="button" class="btn btn-info waves-effect" onclick="setUbahDataInternal()"><i class="fas fa-plus-circle"></i> Ubah Data</button>');
            } else {
                $('#skdi-hasil-pemeriksaan').attr('readonly', false);
                $('#skdi-saran').attr('readonly', false);
                $('#btn-simpan-skdi').empty();
                $('#btn-simpan-skdi').append('<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanSKDI()"><i class="fas fa-plus-circle"></i> Tambah Data</button>');
            }
        }

        if (type == 'auto') {
            $('#skd-btn-kontrol-pengirim').empty();
            $('#skd-btn-cek-sep-asal').empty();
            $('#btn-simpan-skd').empty();
            $('#btn-simpan-skd').append('<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanSKD()"><i class="fas fa-plus-circle"></i> Tambah Data</button>');

            $('#skd-id').val('');
            $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html($('#skd-unit-layanan-asal').html());
            $('#skd-id-unit-layanan-tujuan').val($('#skd-id-unit-layanan-asal').val());
            $('#skd-bpjs-unit-layanan-tujuan').val($('#skd-bpjs-unit-layanan-asal').val());

            $('#skd-tanggal-kontrol').val('<?= date('d/m/Y', strtotime("+1 days")) ?>');
            $('#skd-prb').prop('checked', false);
            $('#skd-preoperasi').prop('checked', false);

            if ($('#skd-id-unit-layanan-tujuan').val() != '' && $('#skd-tanggal-kontrol').val() != '') {
                getJadwalDokter($('#skd-id-unit-layanan-tujuan').val(), $('#skd-tanggal-kontrol').val());
            } else {
                $('#skd-id-dokter-tujuan').val('')
            }
			$('#skd-tglsebelum').val('');
			
            $('.kontrol').show(); // kontrol
            $('.internal').hide(); // kontrol
        }

        if (type == 'delete') {
            $('#skd-id').val('');
            $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html('');
            $('#skd-id-unit-layanan-tujuan').val('');
            $('#skd-bpjs-unit-layanan-tujuan').val('');
            $('#skd-bpjs-dokter-tujuan').val('');
            $('#skd-id-dokter-tujuan').val('');
            $('#skd-tanggal-kontrol').val('');
            $('#skd-prb').prop('checked', false);
            $('#skd-preoperasi').prop('checked', false);
        }

        if (type == 'datainput') {
            $('#skd-id').val('');
            $('#skd-alasan-kontrol').val('');
            $('#skd-tindak-lanjut').val('');
            $('#skd-konsul').prop('checked', false);
            $('#skd-raber').prop('checked', false);
            $('#skd-alih').prop('checked', false);
            $('#skd-dirawat-dengan').val('');
            $('#skd-keterangan').val('');
            $('#skd-prb').prop('checked', false);
            $('#skd-preoperasi').prop('checked', false);
            $('#skd-kuota').html('')
            $('#skd-jml-booking').html('');
            $('#skd-jml-booking-pending').html('');
        }

        if (type == 'datainputedit') {
            $('#skd-alasan-kontrol').val('');
            $('#skd-tindak-lanjut').val('');
            $('#skd-konsul').prop('checked', false);
            $('#skd-raber').prop('checked', false);
            $('#skd-alih').prop('checked', false);
            $('#skd-dirawat-dengan').val('');
            $('#skd-keterangan').val('');
            $('#skd-prb').prop('checked', false);
            $('#skd-preoperasi').prop('checked', false);
            $('#skd-kuota').html('')
            $('#skd-jml-booking').html('');
            $('#skd-jml-booking-pending').html('');
        }

    }

    function getJadwalDokter(id_spesialisasi, tanggal) {
        if (id_spesialisasi !== undefined && tanggal !== undefined) {
            let html        = '';
            let shift_poli  = '';
            let shift_waktu = '';
            $('#skd-bpjs-dokter-tujuan').val('');

            $.ajax({
                url: '<?= base_url('pelayanan/api/pelayanan/get_jadwal_spesialisasi') ?>',
                data: 'id_spesialisasi=' + id_spesialisasi + '&tanggal=' + tanggal,
                type: 'GET',
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    $.each(data, function(i, v) {
                        shift_poli = v.shift_poli !== null ? v.shift_poli : 'Pagi';
                        shift_waktu = v.time_start !== null ? ', JAM ' + v.time_start+'-'+v.time_end : '';
                        html += '<option value="' + v.id + '" data-target="'+v.id_jadwal_dokter+'">' + shift_poli + ' - ' + v.dokter + ' (Kuota : ' + v.kuota +' ) '+'</option>';
                    });
                    
                    $('#skd-id-dokter-tujuan').html(html);
                    $('#skd-id-dokter-tujuan').val() != null ? getKodeBPJSDokter($('#skd-id-dokter-tujuan').val()) : $('#skd-bpjs-dokter-tujuan').val('');
                    
                    $('#skd-id-jadwal-dokter').val( $('#skd-id-dokter-tujuan option:selected').attr('data-target') );

                    checkJmlPasienBooking(date2mysql(tanggal), id_spesialisasi, $('#skd-id-dokter-tujuan').val());
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }
    }

    function getKodeBPJSDokter(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_bpjs_dokter_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#skd-bpjs-dokter-tujuan').val(data.kode_bpjs);
            },
        });
    }

    function checkJmlPasienBooking(tanggal, id_poli, id_dokter) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("booking_poliklinik/api/booking_poliklinik/check_jumlah_pasien_booking") ?>',
            data: {
                tanggal,
                id_poli,
                id_dokter,
            },
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.status) {
                    $('#skd-jml-booking').html('Jml Pasien Booking : ' + data.pasien_booking);
                    $('#skd-jml-booking-pending').html('Jml Pasien Booking (Pending / SKK) : ' + data.pasien_booking_pending);
                } else {
                    $('#skd-jml-booking').html('');
                    $('#skd-jml-booking-pending').html('');
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined) {
                    swalAlert('warning', 'Warning!', e.responseJSON.message);
                    return;
                }
                accessFailed(e.status);
            },
        });
    }

    function getDataSKD(id_layanan_pendaftran) {
        $('#table_skd tbody').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pelayanan/api/pelayanan/get_data_skd') ?>/' + id_layanan_pendaftran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                let detail 			= '';
                let optionShow 		= '';
                let optionButton 	= '';
                let disabledButton 	= '';
                let booking 		= '';
                let kode_booking 	= '';
                let optionSkb 		= '';
                let showResponBpjs 	= '';

                $.each(data.data, function(i, v) {
                    if (v.id !== null) {
                        showResponBpjs = ` <tr><td colspan='2'><i>- Respon BPJS - </i></td></tr>
                                            <tr><td><b>Code </b>&nbsp;</td>    <td> : ` + (v.skb_code !== null ? v.skb_code : '-') + ` </td></tr>
                                            <tr><td><b>Message </b>&nbsp;</td> <td> : ` + (v.skb_message !== null ? v.skb_message : '-') + ` </td></tr>`;

                        if (v.jenis == 'Surat Kontrol') {
                            detail = `<table>
                                      <tr><td><b>Alasan Kontrol</b>&nbsp;</td><td> : ` + (v.alasan_kontrol !== null ? v.alasan_kontrol : '-') + `</td></tr>
                                      <tr><td><b>Rencana Tindak</b>&nbsp;</td><td> : ` + (v.rencana_tindak_lanjut !== null ? v.rencana_tindak_lanjut : '-') + ` </td></tr>
                                      ` + showResponBpjs + `
                                      </table>`;
                        } else if (v.jenis == 'Surat Kontrol Internal') {
                            let jenis_bantuan = '';
                            if (v.jenis_bantuan != null) {
                                var jb = JSON.parse(v.jenis_bantuan);
                                if (jb.konsul == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Konsultasi' : jenis_bantuan = jenis_bantuan + ' & Konsultasi'
                                }
                                if (jb.raber == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Perawatan bersama' : jenis_bantuan = jenis_bantuan + ' & Perawatan bersama'
                                }
                                if (jb.alih == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Alih rawat' : jenis_bantuan = jenis_bantuan + ' & Alih rawat'
                                }
                            }
                            detail = `<table>
                                      <tr><td><b>Jenis Bantuan </b>&nbsp;</td><td> : ` + (jenis_bantuan !== '' ? jenis_bantuan : '-') + `</td></tr>
                                      <tr><td><b>Dirawat Dengan </b>&nbsp;</td><td> : ` + (v.dirawat_dengan !== null ? v.dirawat_dengan : '-') + ` </td></tr>
                                      <tr><td><b>Keterangan </b>&nbsp;</td><td> : ` + (v.keterangan !== null ? v.keterangan : '-') + ` </td></tr>
                                      ` + showResponBpjs + `
                                      </table>`;
                        } else {
                            detail = ``;
                        }
                        $('#skd-petugas').val() == 'dokter' ? disabledButton = '' : disabledButton = 'disabled';
                        optionShow = '<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="' + v.jenis + '" data-content="' + detail + '"><i class="fas fa-eye"></i> </button>';
                        optionButton = '<button ' + disabledButton + ' type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editDataSKD(\'' + v.id + '\')" title="Klik untuk EDIT"><i class="fas fa-edit"></i></button> ' +
                            '<button ' + disabledButton + ' type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteDataSKD(\'' + v.id + '\',\'' + id_layanan_pendaftran + '\',\'' + v.no_skb + '\',' + data.page + ')" title="Klik untuk HAPUS"><i class="fas fa-trash"></i></button> ';

                        if ((v.poli_asal == v.poli_tujuan) && (v.no_skb == null)) {
                            optionSkb = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="cekSKB(\'' + v.skb_code + '\',\'' + v.skb_message + '\',\'' + v.id_pendaftaran + '\',\'' + id_layanan_pendaftran + '\',\'' + v.tanggal + '\',\'' + v.id + '\')" title="Klik untuk mengecek SKB" style="margin-left: 5px;"><b>SKB</b></button> ';
                        }

                        if(v.lokasi_data=='mobile'){
                            kode_booking = v.kode_booking_bynoreferensi != null ? 'MJKN '+v.kode_booking_bynoreferensi : '' ;

                            if (v.status_booking_bynoreferens === 'Check In') {
                                booking = '<h6><span class="badge badge-success">Check In</span></h6>';
                            } else if (v.status_booking_bynoreferens === 'Booking') {
                                booking = '<h6><span class="badge badge-warning">Booking</span></h6>';
                            } else if (v.status_booking_bynoreferens === 'Batal') {
                                booking = '<h6><span class="badge badge-danger">Batal</span></h6>';
                            } else {
                                booking = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                            }

                        } else {
                            kode_booking = v.kode_booking != null ? 'APM '+v.kode_booking : '' ;

                            if (v.status_booking === 'Check In') {
                                booking = '<h6><span class="badge badge-success">Check In</span></h6>';
                            } else if (v.status_booking === 'Booking') {
                                booking = '<h6><span class="badge badge-warning">Booking</span></h6>';
                            } else if (v.status_booking === 'Batal') {
                                booking = '<h6><span class="badge badge-danger">Batal</span></h6>';
                            } else {
                                booking = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                            }
                        }
                    }

                    if ($('#kadaluarsa-rujukan').text().trim() !== '') {
                        let tgl_rujukan_str = $('#kadaluarsa-rujukan').text().trim();
                        let tgl_kontrol_str = v.tanggal.trim();

                        let tgl_rujukan_parts = tgl_rujukan_str.includes('/') ? tgl_rujukan_str.split('/') : tgl_rujukan_str.split('-');
                        let tgl_kontrol_parts = tgl_kontrol_str.includes('/') ? tgl_kontrol_str.split('/') : tgl_kontrol_str.split('-');

                        let tgl_rujukan = new Date(tgl_rujukan_parts[2], tgl_rujukan_parts[1] - 1, tgl_rujukan_parts[0]); // Tahun, Bulan (0-indexed), Hari
                        let tgl_kontrol = new Date(tgl_kontrol_parts[2], tgl_kontrol_parts[1] - 1, tgl_kontrol_parts[0]);

                        isAktif = tgl_rujukan >= tgl_kontrol;
                        status_rujukan = isAktif ? '' : '<br><b style="color:red">(Rujukan Exp)</b>';
                    } else {
                        status_rujukan = '<br><b style="color:blue">(Rujukan Tidak Ada)</b>';
                    }
					
					let shift_poli = '';
                    if((v.shift_poli !== null) && (v.id !== null)){
                        shift_poli = v.shift_poli == 'Pagi' ?  
                            '<span class="label label-success" style="font-size: small;">Pagi ' + v.time_start + ' - ' + v.time_end+'</span>' 
                            :'<span class="label label-primary" style="font-size: small;">Sore ' + v.time_start + ' - ' + v.time_end+'</span>';
                    } else if((v.shift_poli == null) && (v.id !== null)){
                        shift_poli = "<font color='#ff0000'><b><i>kosong</i></b>";
                    } else {
                        shift_poli = "-";
                    }

                    var html = /* html */
                        '<tr>' +
                        '<th class="center">' + ++i + '</th>' +
                        '<th class="left">' + v.jenis + '</th>' +
                        '<th class="center"><b style="background-color:#DAF5FF;">' + v.tanggal + '</b>' + status_rujukan + '</th>' +
                        '<th class="center"><b style="background-color:#DAF5FF;">' + v.poli_tujuan + '</b></th>' +
                        '<th class="center"><b style="background-color:#DAF5FF;">' + shift_poli + '</b></th>' +  
                        '<th class="center"><b style="background-color:#DAF5FF;">' + (v.dokter_tujuan !== null ? v.dokter_tujuan : '-') + '</b></th>' +
                        '<th class="center">' + v.prb + '</th>' +
                        '<th class="center">' + (v.is_preoperasi == 1 ? 'Ya' : 'Tidak') + '</th>' +
                        '<th class="center">' + (v.no_skb !== null ? v.no_skb : '-') + '</th>' +
                        '<th class="center">' + v.created_date + '</th>' +
                        '<th class="center">' + v.nama_user + '</th>' +
                        '<th class="center">' + booking + '</th>' +
                        '<th class="center">' + kode_booking + '</th>' +
                        '<th align="right">' + optionShow + (v.status_booking !== null ? '' : optionButton) + optionSkb + '</th>' +
                        '</tr>';
                    $('#table_skd tbody').append(html);
                })

                $('.mypopover').popover({
                    html: true,
                    trigger: 'hover',
                    sanitize: false,
                });

            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data SKK');
            }
        });
    }

    function getDataSKDRiwayat(id_pasien) {
        $('#table_skd_riwayat tbody').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pelayanan/api/pelayanan/get_data_skd_riwayat') ?>/' + id_pasien,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                let title = '';
                let detail = '';
                let detailInternal = '';
                let optionButtonDetail = '';

                $.each(data.data, function(i, v) {
                    if (v.id !== null) {
                        if (v.jenis == 'Surat Kontrol') {
                            detail = `<table>
                                      <tr><td><b>Alasan Kontrol</b>&nbsp;</td><td> : ` + (v.alasan_kontrol !== null ? v.alasan_kontrol : '-') + `</td></tr>
                                      <tr><td><b>Rencana Tindak</b>&nbsp;</td><td> : ` + (v.rencana_tindak_lanjut !== null ? v.rencana_tindak_lanjut : '-') + ` </td></tr>
                                      </table>`;
                        } else if (v.jenis == 'Surat Kontrol Internal') {
                            let jenis_bantuan = '';
                            if (v.jenis_bantuan != null) {
                                var jb = JSON.parse(v.jenis_bantuan);
                                if (jb.konsul == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Konsultasi' : jenis_bantuan = jenis_bantuan + ' & Konsultasi'
                                }
                                if (jb.raber == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Perawatan bersama' : jenis_bantuan = jenis_bantuan + ' & Perawatan bersama'
                                }
                                if (jb.alih == '1') {
                                    jenis_bantuan == '' ? jenis_bantuan = 'Alih rawat' : jenis_bantuan = jenis_bantuan + ' & Alih rawat'
                                }
                            }

                            if (v.id_kontrol_jawab != null) {
                                title = ' & Jawaban';
                                detailJawab = ` <tr><td colspan='2'><i>- Jawaban kontrol internal - </i></td></tr>
                                                <tr><td><b>Hasil Pemeriksaan </b>&nbsp;</td>    <td> : ` + (v.pemeriksaan !== null ? v.pemeriksaan : '-') + ` </td></tr>
                                                <tr><td><b>Saran </b>&nbsp;</td>                <td> : ` + (v.saran !== null ? v.saran : '-') + ` </td></tr>`;
                            } else {
                                detailJawab = `<tr><td colspan='2'><i style='color:red;'>- Kontrol internal belum dijawab - </i></td></tr>`;
                            }
                            detail = `<table>
                                      <tr><td><b>Jenis Bantuan </b>&nbsp;</td>      <td> : ` + (jenis_bantuan !== '' ? jenis_bantuan : '-') + `</td></tr>
                                      <tr><td><b>Dirawat Dengan </b>&nbsp;</td>     <td> : ` + (v.dirawat_dengan !== null ? v.dirawat_dengan : '-') + ` </td></tr>
                                      <tr><td><b>Keterangan </b>&nbsp;</td>         <td> : ` + (v.keterangan !== null ? v.keterangan : '-') + ` </td></tr>
                                      ` + detailJawab + `
                                      </table>`;
                        } else {
                            detail = ``;
                        }
                        optionButtonDetail = '<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="' + v.jenis + '" data-content="' + detail + '"><i class="fas fa-eye"></i> Detail' + title + '</button>';
                    }

                    var html = /* html */
                        '<tr>' +
                        '<th class="center">' + ++i + '</th>' +
                        '<th class="center">' + (v.tanggal_daftar !== null ? v.tanggal_daftar : '-') + '</th>' +
                        '<th class="left">' + v.jenis + '</th>' +
                        '<th class="center">' + v.tanggal + '</th>' +
                        '<th class="center">' + (v.poli_asal !== null ? v.poli_asal : '-') + '</th>' +
                        '<th class="center">' + (v.dokter_asal !== null ? v.dokter_asal : '-') + '</th>' +
                        '<th class="center">' + v.poli_tujuan + '</th>' +
                        '<th class="center">' + (v.dokter_tujuan !== null ? v.dokter_tujuan : '-') + '</th>' +
                        '<th class="center">' + v.prb + '</th>' +
                        '<th class="center">' + v.created_date + '</th>' +
                        '<th class="center">' + v.nama_user + '</th>' +
                        '<th align="right">' +
                        optionButtonDetail +
                        '</th>' +
                        '</tr>';
                    $('#table_skd_riwayat tbody').append(html);
                })

                $('.mypopover').popover({
                    html: true,
                    trigger: 'hover',
                    sanitize: false,
                });

            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data SKK');
            }
        });
    }

    function editDataSKD(id) {

        if ($('#skd-petugas').val() != 'ns') {
            risetFormSuratKontrolDoker('delete');
            risetFormSuratKontrolDoker('datainput');
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_skd_id") ?>/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#btn-simpan-skd').empty();
                $('#btn-simpan-skd').append('<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanSKD()"><i class="fas fa-plus-circle"></i> Simpan Perubahan</button>');

                $('#skd-id').val(data.id);
                $('#s2id_skd-id-unit-layanan-tujuan a .select2-chosen').html(data.spesialisasi_tujuan);
                $('#skd-bpjs-unit-layanan-tujuan').val(data.bpjs_spesialisasi_tujuan);
                $('#skd-id-unit-layanan-tujuan').val(data.id_spesialisasi);
                $('#skd-tanggal-kontrol').val(datefmysql(data.tanggal));
                $('#skd-noskb').val(data.no_skb);
				$('#skd-tglsebelum').val(data.tanggal);

                data.prb == '1' ? $('#skd-prb').prop('checked', true) : $('#skd-prb').prop('checked', false);
                data.is_preoperasi == 1 ? $('#skd-preoperasi').prop('checked', true) : $('#skd-preoperasi').prop('checked', false);
                getJadwalDokter($('#skd-id-unit-layanan-tujuan').val(), $('#skd-tanggal-kontrol').val());

                if ($('#skd-id-unit-layanan-asal').val() == data.id_spesialisasi) {
                    $('#skd-alasan-kontrol').val(data.alasan_kontrol != '' ? data.alasan_kontrol : '');
                    $('#skd-tindak-lanjut').val(data.rencana_tindak_lanjut != '' ? data.rencana_tindak_lanjut : '');
                    $('.kontrol').show();
                    $('.internal').hide(); //kontrol
                } else {
                    if (data.jenis_bantuan != null) {
                        var jb = JSON.parse(data.jenis_bantuan);
                        if (jb.konsul == '1') {
                            $('#skd-konsul').prop('checked', true)
                        }
                        if (jb.raber == '1') {
                            $('#skd-raber').prop('checked', true)
                        }
                        if (jb.alih == '1') {
                            $('#skd-alih').prop('checked', true)
                        }
                    }
                    $('#skd-dirawat-dengan').val(data.dirawat_dengan != '' ? data.dirawat_dengan : '');
                    $('#skd-keterangan').val(data.keterangan != '' ? data.keterangan : '');
                    $('.kontrol').hide();
                    $('.internal').show(); //internal
                }
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data Detail Surat Keteranan Kontrol');
            }
        });
    }

    function deleteDataSKD(id, id_layanan_pendaftran, no_skb, p) {
        bootbox.dialog({
            title: "Konfirmasi Hapus",
            message: "Apakah anda yakin ingin menghapus data ini ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Hapus',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('pelayanan/api/pelayanan/delete_data_skd') ?>/id/' + id + '/no_skb/' + no_skb,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                // data.skbcode == '200' ? messageRespon=data.message+' '+data.skbmessage : messageRespon=data.message;
                                messageCustom(data.message, 'Success');

                                getDataSKD(id_layanan_pendaftran);
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

    function riwayatSKD(id) {
        getDataSKDRiwayat(id);
        $('#modal-surat-kontrol-dokter-riwayat').modal('show');
    }

    function reloadDataSKDRiwayat(id) {
        getDataSKDRiwayat(id);
    }

    function cekSKB(skb_code, skb_message, id_pendaftaran, id_layanan_pendaftran, tanggal, id_surat_kontrol) {

        $('#skb-cek-id-surat-kontrol').val(id_surat_kontrol);
        skd_rujukan_poli = $('#skd-rujukan-poli').text();
        skd_rujukan_kode_bpjs_poli = $('#skd-rujukan-kode-bpjs-poli').text();
        $('#skb-cek-bpjs-poli').html(skd_rujukan_poli + ` `);
        $('#skb-cek-kode-bpjs-poli').html(skd_rujukan_kode_bpjs_poli ? `(` + skd_rujukan_kode_bpjs_poli + `)` : '');

        skd_sep_asal = $('#skd-sep-asal').html();
        skd_sep_asal = skd_sep_asal.replace(/[()]/g, '');
        $('#skb-cek-sep-asal').html(skd_sep_asal);

        $('#skb-respon-code').html('');
        $('#skb-respon-message').html('');
        $('#skb-nama-cek').html('');
        $('#skb-norm-cek').html('');
        $('#skb-cek-id-pasien').val('');
        $('#skb-nokartu-cek').html('');
        $('#skb-cek-no-kartu').val('');
        $('#skb-tglkontrol-cek').html('');
        $('#skb-cek-notif').html('');

        $('#skb-respon-code').html(skb_code);
        $('#skb-respon-message').html(skb_message);
        $('#skb-nama-cek').html($('#skd-nama-pasien').html());
        $('#skb-norm-cek').html($('#skd-id-pasien-tampil').html());
        $('#skb-cek-id-pasien').val($('#skd-id-pasien-tampil').html());
        $('#skb-nokartu-cek').html($('#skd-penjamin-nobpjs').html());
        $('#skb-cek-no-kartu').val($('#skd-penjamin-nobpjs').html());
        $('#skb-cek-id-pendaftaran').val(id_pendaftaran);
        $('#skb-cek-id-layanan-pendaftaran').val(id_layanan_pendaftran);
        $('#skb-tglkontrol-cek').html(tanggal);
        $('#modal_surat_ket_kontrol_skb_cek').modal('show');
    }

    function btn_cek_skb_byNoBpjs() {
        $('#skb-cek-notif').html('');
        no_kartu_bpjs = $('#skb-nokartu-cek').html();

        skd_rujukan_kode_bpjs_poli = $('#skb-cek-kode-bpjs-poli').html();
        skd_rujukan_kode_bpjs_poli = skd_rujukan_kode_bpjs_poli.replace(/[()]/g, '');

        skd_sep_asal = $('#skd-sep-asal').html();
        skd_sep_asal = skd_sep_asal.replace(/[()]/g, '');
        $('#skb-cek-sep-asal').html(skd_sep_asal);

        flag_skb = false;
		
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(URL_VCLAIM . 'get_list_surat_kontrol_by_no_kartu') ?>',
            data: 'no_kartu=' + no_kartu_bpjs,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
            },
            success: function(data) {
                console.log(data);
                if (data.metaData.code === "200") {
                    if (data.response !== null) {

                        $.each(data.response.list, function(i, v) {
                            if (skd_sep_asal == v.noSepAsalKontrol) {
                                $('#skb-no-cek').val(v.noSuratKontrol);
                                $('#skb-nama').val(v.nama);
                                $('#skb-jenis-kontrol').val(v.namaJnsKontrol);
                                $('#skb-poli').val(v.namaPoliTujuan);
                                $('#skb-dokter-cek').val(v.namaDokter);
                                $('#skb-tgl-kontrol-cek').val(v.tglRencanaKontrol);
                                $('#skb-cek-jenis-kontrol').val(v.jnsKontrol);
								$('#cek-sep-asal-notif').html('');
                                flag_skb = true;
                            }

                            if(flag_skb == false){
                                $('#cek-sep-asal-notif').html('Data SKB tidak ada, Silahkan buat SKB terlebih dahulu!');
                            }
                        })

                    } else {
                        $('#skb-cek-notif').html('Gagal mendapatkan data, Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                    }
                } else {
                    $('#skb-cek-notif').html(data.metaData.message + ' (' + data.metaData.code + ')');
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {

            }
        })
    }

    function SimpanDataSKBCek() {

        var stop = false;
        if ($('#skb-no-cek').val() == '') {
            syams_validation('#skb-no-cek', 'No SKB kosong, Tekan tombol "Cek SKB" terlebih dahulu !');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $('#skb-tgl-kontrol-notif').html('');
        tanggal_simrs = $('#skb-tglkontrol-cek').html();
        tanggal_simrs = tanggal_simrs.split('-');
        tanggal_simrs = tanggal_simrs[0] + tanggal_simrs[1] + tanggal_simrs[2]

        tanggal_bpjs = $('#skb-tgl-kontrol-cek').val();
        tanggal_bpjs = tanggal_bpjs.split('-');
        tanggal_bpjs = tanggal_bpjs[2] + tanggal_bpjs[1] + tanggal_bpjs[0]

        if (tanggal_simrs != tanggal_bpjs) {
            $('#skb-tgl-kontrol-notif').html('Tgl SKB berbeda, Silahkan edit terlebih dahulu !');
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('surat_ket_kontrol/api/surat_ket_kontrol/simpan_skb_cek') ?>',
                data: $('#form_surat_ket_kontrol_skb_cek').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageEditSuccess();
                        $('#modal_surat_ket_kontrol_skb_cek').modal('hide');
                        reloadDataSKD();
                    } else {
                        messageEditFailed();
                    }
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }
    }
	
	function getSEPAsal(no_polish, no_sep_asal,isPascaRanap,kodebpjs) {        
        $('#csa-is-pasca-ranap').val(isPascaRanap);
        $('#csa-kode-bpjs').val(kodebpjs);
        $('#csa-nopolish').html(no_polish);
        $('#csa-sep-asal').html(no_sep_asal);
        $('#cek-sep-asal-notif').html('');
        $('#csa-nosep').html('');
        $('#csa-tgl-sep').html('');
        $('#csa-poli').html('');
        $('#csa-norujukan').html('');
        $('#csa-poli-rujukan').html('');
        $('#csa-asal-rujukan').html(''); 
        $('#btn-set-pasca-ranap').html(''); 

        $('#modal_cek_sep_asal').modal('show');
    }

    function btn_cek_sep_asal() {
        $('#cek-sep-asal-notif').html('');
        no_kartu_bpjs = $('#csa-nopolish').html();
        no_sep_asal   = $('#csa-sep-asal').html();
        flag_sep = false;

        $.ajax({
            type: 'GET',            
            url: '<?= base_url(URL_VCLAIM."get_history_sep") ?>/nokartu/' + no_kartu_bpjs,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
            },
            success: function(data) {
                console.log(data);
                if (data.metaData.code === "200") {
                    if (data.response !== null) {   

                        $.each(data.response.histori, function(i, v) {
                            if (no_sep_asal == v.noSep) {
                                $('#csa-nosep').html(v.noSep);
                                $('#csa-tgl-sep').html(v.tglSep);
                                $('#csa-poli').html(v.poli);
                                $('#csa-norujukan').html(v.noRujukan);                               
                                $('#cek-sep-asal-notif').html('');
                                flag_sep = true;

                                if(v.noRujukan != ''){
                                    btn_cek_sep_asal_getRujukan(v.noRujukan);
									
                                    if($('#csa-is-pasca-ranap').val() == '1'){
                                        let btn_set_pasca_ranap = '<button type="button" class="btn btn-info waves-effect" onclick="setPascaRanap(\'' + $('#csa-kode-bpjs').val() + '\')" style="margin-left: 5px;">Ubah Pasca Ranap ke TIDAK!</button>';                    
                                        $('#btn-set-pasca-ranap').html(btn_set_pasca_ranap); 
                                    }
                                }
                            }

                            if(flag_sep == false){
                                $('#cek-sep-asal-notif').html('Data SEP tidak ada, silahkan dicoba lain waktu !');
                            }
                        })

                    } else {
                        $('#cek-sep-asal-notif').html('Gagal mendapatkan data SEP, Respon Kosong. Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                    }
                } else {
                    $('#cek-sep-asal-notif').html('Gagal mendapatkan data SEP. Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {

            }
        })
    }

    function btn_cek_sep_asal_getRujukan(no_rujukan) {
        $('#cek-sep-asal-notif').html('');
        flag_rujukan = false;

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_rujukan") ?>/norujukan/' + no_rujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
            },
            success: function(data) {
                console.log(data);
                if (data.metaData.code === "200") {
                    if (data.response !== null) {   
                        $('#csa-poli-rujukan').html(data.response.rujukan.poliRujukan.nama);
                        $('#csa-asal-rujukan').html(data.response.rujukan.provPerujuk.nama);                            
                        $('#cek-sep-asal-notif').html('');       
                    } else {
                        $('#cek-sep-asal-notif').html('Gagal mendapatkan data Rujukan F1, Respon Kosong. Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                    }
                } else {
                    btn_cek_sep_asal_getRujukanRS(no_rujukan);
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {

            }
        })
    }

    function btn_cek_sep_asal_getRujukanRS(no_rujukan) {
        $('#cek-sep-asal-notif').html('');
        flag_rujukan = false;

        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_rujukan") ?>/norujukan/' + no_rujukan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
            },
            success: function(data) {
                console.log(data);
                if (data.metaData.code === "200") {
                    if (data.response !== null) {   
                        $('#csa-poli-rujukan').html(data.response.rujukan.poliRujukan.nama);
                        $('#csa-asal-rujukan').html(data.response.rujukan.provPerujuk.nama);                            
                        $('#cek-sep-asal-notif').html('');       
                    } else {
                        $('#cek-sep-asal-notif').html('Gagal mendapatkan data Rujukan F2, Respon Kosong. Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                    }
                } else {
                    $('#cek-sep-asal-notif').html('Gagal mendapatkan data Rujukan F2. Silahkan coba kembali. ' + data.metaData.message + ' (' + data.metaData.code + ')');
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {

            }
        })
    }
	
	function setPascaRanap(id) {
        bootbox.dialog({
            title: "Konfirmasi Ubah Pasca Ranap ke TIDAK!",
            message: "Apakah anda yakin ingin mengubah Pasca Ranap ke TIDAK ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Ubah',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url("pelayanan/api/pelayanan/set_pasca_ranap") ?>/id/' + id ,			
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageCustom(data.message, 'Success');
                                getDataSKD(id_layanan_pendaftran);
                            },
                            error: function(e) {
                                messageEditFailed();
                            }
                        });
                    }
                }
            }
        });
    }
	
	function getTanggalKontrol(id_pasien, tgl_rencana, tgl_sebelum = null) {
        console.log('getTanggalKontrol', id_pasien, tgl_rencana, tgl_sebelum);
        if (id_pasien) {
            $.ajax({
                url: '<?= base_url('pelayanan/api/pelayanan/cek_tanggal_kontrol') ?>',
                data: 'id_pasien=' + id_pasien + '&tgl_rencana=' + tgl_rencana + (tgl_sebelum ? '&tgl_sebelum=' + tgl_sebelum : ''),
                type: 'GET',
                cache: false,
                dataType: 'JSON',
                success: function(data) {                    
                    if (!data.status) {
                        swalAlert('info', 'Gagal Tambah SKK', 'Pasien sudah melakukan <b>'+data.message+'</b> pada tanggal <b>' + data.data.tanggal_kunjungan + '</b> ke <b>Poli '+
                                             data.data.nama_poli+'</b> (dengan selisih <b>'+data.data.selisih+' hari</b>). <br><br>Silahkan pilih tanggal lain (minimal selisih 7 hari) !');
                    } else {
                        SimpanSKD();
                    }
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }
    }

	
</script>