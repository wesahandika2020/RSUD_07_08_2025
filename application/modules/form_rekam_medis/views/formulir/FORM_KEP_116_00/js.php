<script>
    // PPPK
    $('#geriatri-pppk-2').click(function() {
        // Tidak ada pengondisian, hanya memastikan #geriatri-pppk-3 aktif
        $('#geriatri-pppk-3').prop('readonly', false);
    });

    $('#geriatri-pppk-5').click(function() {
        $('#geriatri-pppk-6').prop('readonly', false);
    });

    $('#geriatri-pppk-14').click(function() {
        $('#geriatri-pppk-15').prop('readonly', false);
    });

    $('#geriatri-pppk-17').click(function() {
        $('#geriatri-pppk-18').prop('readonly', false);
    });

    $('#penyakitmenular-pppk-6').click(function() {
        $('#penyakitmenular-pppk-7').prop('readonly', false);
    });
    $('#penyakitmenular-pppk-8').click(function() {
        $('#penyakitmenular-pppk-9').prop('readonly', false);
    });

    $('#penyakitmenular-pppk-15').click(function() {
        $('#penyakitmenular-pppk-16').prop('readonly', false);
    });

    $('#penyakitmenular-pppk-22').click(function() {
        $('#penyakitmenular-pppk-23').prop('readonly', false);
    });

    $('#penyakitpenurunan-pppk-6').click(function() {
        $('#penyakitpenurunan-pppk-7').prop('readonly', false);
    });

    $('#penyakitpenurunan-pppk-8').click(function() {
        $('#penyakitpenurunan-pppk-9').prop('readonly', false);
    });

    $('#penyakitpenurunan-pppk-15').click(function() {
        $('#penyakitpenurunan-pppk-16').prop('readonly', false);
    });

    $('#penyakitpenurunan-pppk-18').click(function() {
        $('#penyakitpenurunan-pppk-19').prop('readonly', false);
    });

    $('#kekerasanpenganiayaan-pppk-1').click(function() {
        $('#kekerasanpenganiayaan-pppk-3, #kekerasanpenganiayaan-pppk-4, #kekerasanpenganiayaan-pppk-5, #kekerasanpenganiayaan-pppk-6').prop('readonly', false);
    });


    $('#modal_pengkajian_pasien_populasi_khusus').on('hide.bs.modal', function() {
        $('.collapse').removeClass('show')
        $('#form_pengkajian_pasien_populasi_khusus')[0].reset()
        $('.disabled').prop('disabled', true)
        $('#ttd-pppk').show()
        $('#ttd_pppk_verified').hide()
    })

    $('#tanggal-jam-pengkajian-ppk, #tanggal-pkkk').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false
            }
        }
    })

    $('#perawatpkkk').select2c({
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
    })

    function lihatFORM_KEP_116_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriPengkajianPasienPopulasiKhusus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_116_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriPengkajianPasienPopulasiKhusus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_116_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriPengkajianPasienPopulasiKhusus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    // ENTRI PENGKAJIAN AWAL NEONATUS AWAL
    function entriPengkajianPasienPopulasiKhusus(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal_pengkajian_pasien_populasi_khusus').modal('show');

        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_pasien_populasi_khusus") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                // console.log(data);
                resetFormPengkajianPasienPopulasiKhusus();
                $('#id-layanan-pendaftaran-pppk').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-pppk').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-pppk').val(data.pasien.id_pasien);
                    $('#nama-pasien-pppk').text(data.pasien.nama);
                    $('#norm-pppk').text(data.pasien.no_rm);
                    $('#ttl-pppk').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jk-pppk').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#waktu-masuk-ppk').val((data.pasien.tanggal_daftar !== null ? datetimefmysql(data.pasien.tanggal_daftar) : ''));
                }

                if (data.pengkajian_pasien_populasi_khusus !== null) {
                    $('#id-pppk').val(data.pengkajian_pasien_populasi_khusus.id);
                    $('#tanggal-jam-pengkajian-ppk').val((data.pengkajian_pasien_populasi_khusus.tanggal_jam_pengkajian_ppk !== null ? datetimefmysql(data.pengkajian_pasien_populasi_khusus.tanggal_jam_pengkajian_ppk) : '<?= date('d/m/Y H:i:s') ?>'));

                    const geriatri_pppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.geriatri_pppk); 
                    if (geriatri_pppk.geriatri_pppk_1 !== null) { $('#geriatri-pppk-1').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_2 !== null) { $('#geriatri-pppk-2').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_3 !== null) {$('#geriatri-pppk-3').val(geriatri_pppk.geriatri_pppk_3);}
                    if (geriatri_pppk.geriatri_pppk_4 !== null) { $('#geriatri-pppk-4').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_5 !== null) { $('#geriatri-pppk-5').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_6 !== null) {$('#geriatri-pppk-6').val(geriatri_pppk.geriatri_pppk_6);}
                    if (geriatri_pppk.geriatri_pppk_7 !== null) { $('#geriatri-pppk-7').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_8 !== null) { $('#geriatri-pppk-8').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_9 !== null) { $('#geriatri-pppk-9').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_10 !== null) { $('#geriatri-pppk-10').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_11 !== null) { $('#geriatri-pppk-11').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_12 !== null) { $('#geriatri-pppk-12').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_13 !== null) { $('#geriatri-pppk-13').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_14 !== null) { $('#geriatri-pppk-14').prop('checked', true)}
                    if (geriatri_pppk.geriatri_pppk_15 !== null) {$('#geriatri-pppk-15').val(geriatri_pppk.geriatri_pppk_15);}
                    if (geriatri_pppk.geriatri_pppk_16 !== null) { $('#geriatri-pppk-16').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_17 !== null) { $('#geriatri-pppk-17').prop('checked', true) }
                    if (geriatri_pppk.geriatri_pppk_18 !== null) {$('#geriatri-pppk-18').val(geriatri_pppk.geriatri_pppk_18);}

                    const penyakitmenular_pppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.penyakitmenular_pppk); 
                    if (penyakitmenular_pppk.penyakitmenular_pppk_1 !== null) { $('#penyakitmenular-pppk-1').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_2 !== null) { $('#penyakitmenular-pppk-2').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_3 !== null) { $('#penyakitmenular-pppk-3').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_4 !== null) { $('#penyakitmenular-pppk-4').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_5 !== null) { $('#penyakitmenular-pppk-5').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_6 !== null) { $('#penyakitmenular-pppk-6').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_7 !== null) {$('#penyakitmenular-pppk-7').val(penyakitmenular_pppk.penyakitmenular_pppk_7);}
                    if (penyakitmenular_pppk.penyakitmenular_pppk_8 !== null) { $('#penyakitmenular-pppk-8').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_9 !== null) {$('#penyakitmenular-pppk-9').val(penyakitmenular_pppk.penyakitmenular_pppk_9);}
                    if (penyakitmenular_pppk.penyakitmenular_pppk_10 !== null) { $('#penyakitmenular-pppk-10').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_11 !== null) { $('#penyakitmenular-pppk-11').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_12 !== null) { $('#penyakitmenular-pppk-12').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_13 !== null) { $('#penyakitmenular-pppk-13').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_14 !== null) { $('#penyakitmenular-pppk-14').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_15 !== null) { $('#penyakitmenular-pppk-15').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_16 !== null) {$('#penyakitmenular-pppk-16').val(penyakitmenular_pppk.penyakitmenular_pppk_16);}
                    if (penyakitmenular_pppk.penyakitmenular_pppk_17 !== null) { $('#penyakitmenular-pppk-17').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_18 !== null) { $('#penyakitmenular-pppk-18').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_19 !== null) { $('#penyakitmenular-pppk-19').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_20 !== null) { $('#penyakitmenular-pppk-20').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_21 !== null) { $('#penyakitmenular-pppk-21').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_22 !== null) { $('#penyakitmenular-pppk-22').prop('checked', true) }
                    if (penyakitmenular_pppk.penyakitmenular_pppk_23 !== null) {$('#penyakitmenular-pppk-23').val(penyakitmenular_pppk.penyakitmenular_pppk_23);}

                    const penyakitpenurunan_pppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.penyakitpenurunan_pppk); 
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_1 !== null) { $('#penyakitpenurunan-pppk-1').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_2 !== null) { $('#penyakitpenurunan-pppk-2').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_3 !== null) { $('#penyakitpenurunan-pppk-3').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_4 !== null) { $('#penyakitpenurunan-pppk-4').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_5 !== null) { $('#penyakitpenurunan-pppk-5').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_6 !== null) { $('#penyakitpenurunan-pppk-6').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_7 !== null) {$('#penyakitpenurunan-pppk-7').val(penyakitpenurunan_pppk.penyakitpenurunan_pppk_7);}
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_8 !== null) { $('#penyakitpenurunan-pppk-8').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_9 !== null) {$('#penyakitpenurunan-pppk-9').val(penyakitpenurunan_pppk.penyakitpenurunan_pppk_9);}
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_10 !== null) { $('#penyakitpenurunan-pppk-10').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_11 !== null) { $('#penyakitpenurunan-pppk-11').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_12 !== null) { $('#penyakitpenurunan-pppk-12').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_13 !== null) { $('#penyakitpenurunan-pppk-13').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_14 !== null) { $('#penyakitpenurunan-pppk-14').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_15 !== null) { $('#penyakitpenurunan-pppk-15').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_16 !== null) {$('#penyakitpenurunan-pppk-16').val(penyakitpenurunan_pppk.penyakitpenurunan_pppk_16);}
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_17 !== null) { $('#penyakitpenurunan-pppk-17').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_18 !== null) { $('#penyakitpenurunan-pppk-18').prop('checked', true) }
                    if (penyakitpenurunan_pppk.penyakitpenurunan_pppk_19 !== null) {$('#penyakitpenurunan-pppk-19').val(penyakitpenurunan_pppk.penyakitpenurunan_pppk_19);}

                    const kesehatanjiwa_pppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.kesehatanjiwa_pppk); 
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_1 !== null) { $('#kesehatanjiwa-pppk-1').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_2 !== null) { $('#kesehatanjiwa-pppk-2').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_3 !== null) { $('#kesehatanjiwa-pppk-3').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_4 !== null) { $('#kesehatanjiwa-pppk-4').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_5 !== null) { $('#kesehatanjiwa-pppk-5').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_6 !== null) { $('#kesehatanjiwa-pppk-6').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_7 !== null) { $('#kesehatanjiwa-pppk-7').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_8 !== null) { $('#kesehatanjiwa-pppk-8').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_9 !== null) { $('#kesehatanjiwa-pppk-9').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_10 !== null) { $('#kesehatanjiwa-pppk-10').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_11 !== null) { $('#kesehatanjiwa-pppk-11').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_12 !== null) { $('#kesehatanjiwa-pppk-12').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_13 !== null) { $('#kesehatanjiwa-pppk-13').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_14 !== null) { $('#kesehatanjiwa-pppk-14').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_15 !== null) { $('#kesehatanjiwa-pppk-15').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_16 !== null) { $('#kesehatanjiwa-pppk-16').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_17 !== null) { $('#kesehatanjiwa-pppk-17').prop('checked', true) }
                    if (kesehatanjiwa_pppk.kesehatanjiwa_pppk_18 !== null) { $('#kesehatanjiwa-pppk-18').prop('checked', true) }

                    const kekerasanpenganiayaan_pppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.kekerasanpenganiayaan_pppk); 
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_1 !== null) { $('#kekerasanpenganiayaan-pppk-1').prop('checked', true) }
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_2 !== null) { $('#kekerasanpenganiayaan-pppk-2').prop('checked', true) }
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_3 !== null) {$('#kekerasanpenganiayaan-pppk-3').val(kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_3);}
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_4 !== null) {$('#kekerasanpenganiayaan-pppk-4').val(kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_4);}
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_5 !== null) {$('#kekerasanpenganiayaan-pppk-5').val(kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_5);}
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_6 !== null) {$('#kekerasanpenganiayaan-pppk-6').val(kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_6);}
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_7 !== null) { $('#kekerasanpenganiayaan-pppk-7').prop('checked', true) }
                    if (kekerasanpenganiayaan_pppk.kekerasanpenganiayaan_pppk_8 !== null) { $('#kekerasanpenganiayaan-pppk-8').prop('checked', true) }
                    
                    const masalah_keppppk = JSON.parse(data.pengkajian_pasien_populasi_khusus.masalah_keppppk); 
                    if (masalah_keppppk.masalah_keppppk_1 !== null) { $('#masalah-keppppk-1').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_2 !== null) { $('#masalah-keppppk-2').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_3 !== null) { $('#masalah-keppppk-3').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_4 !== null) { $('#masalah-keppppk-4').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_5 !== null) { $('#masalah-keppppk-5').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_6 !== null) { $('#masalah-keppppk-6').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_7 !== null) { $('#masalah-keppppk-7').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_8 !== null) { $('#masalah-keppppk-8').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_9 !== null) { $('#masalah-keppppk-9').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_10 !== null) { $('#masalah-keppppk-10').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_11 !== null) { $('#masalah-keppppk-11').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_12 !== null) { $('#masalah-keppppk-12').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_13 !== null) { $('#masalah-keppppk-13').prop('checked', true) }
                    if (masalah_keppppk.masalah_keppppk_14 !== null) {$('#masalah-keppppk-14').val(masalah_keppppk.masalah_keppppk_14);}

                    $('#tanggal-pkkk').val((data.pengkajian_pasien_populasi_khusus.tanggal_pkkk !== null ?datetimefmysql(data.pengkajian_pasien_populasi_khusus.tanggal_pkkk) : '<?= date('d/m/Y H:i:s') ?>'));
                    $('#perawatpkkk').val(data.pengkajian_pasien_populasi_khusus.perawatpkkk);
                    $('#s2id_perawatpkkk a .select2c-chosen').html(data.pengkajian_pasien_populasi_khusus.perawat);

                    if (data.ttd_pppk !== null) {
                        $('#ttd-pppk').hide()
                        $('#ttd_pppk_verified').show()
                    } else {
                        $('#ttd-pppk').show()
                        $('#ttd_pppk_verified').hide()
                    }
                }
                $('#pppk-bed').text(bed);
                $('#modal_pengkajian_pasien_populasi_khusus').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function resetFormPengkajianPasienPopulasiKhusus() {
        $('#form_pengkajian_pasien_populasi_khusus')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
    }

    function konfirmasiSimpanPengkajianPasienPopulasiKhusus() {
        if ($('#tanggal-jam-pengkajian-ppk').val() === '') {
            syams_validation('#tanggal-jam-pengkajian-ppk', 'Tanggal dan Jam Belum diisi!');
            $('#tanggal-jam-pengkajian-ppk').focus();
            $('#bwizard_pppk').bwizard('show', '0');
            stop = true;
        }
        if ($('#tanggal-pkkk').val() === '') {
            syams_validation('#tanggal-pkkk', 'Tanggal dan Jam Belum diisi!');
            $('#tanggal-pkkk').focus();
            $('#bwizard_pppk').bwizard('show', '0');
            stop = true;
        }
        if ($('#perawatpkkk').val() === '') {
            syams_validation('#perawatpkkk', 'Nama perawat harus dipilih!');
            $('#bwizard_pppk').bwizard('show', '0');
            stop = true;
        }    
        if ($('#ttd-pppk').is(":visible")) {
            if ($('#ttd-pppk').is(":not(:checked)")) {
                swalAlert('warning', 'Signature Validation', ' Perawat belum mengisi Ceklis tanda tangan !!!');
                $('#bwizard_pppk').bwizard('show', '0');
                return false;
            }
        }

        var id_pppk = $('#id-pppk').val();
        if (id_pppk) {
            var text = 'Apakah anda yakin ingin mengupdate data ini ?';
            var btnTextConfirmPKKK = 'Update';
        } else {
            text = 'Apakah anda yakin ingin menyimpan data ini ?';
            btnTextConfirmPKKK = 'Simpan';
        }
        swal.fire({
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirmPKKK,
            cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPengkajianPasienPopulasiKhusus();
            }
        })
    }

    function simpanPengkajianPasienPopulasiKhusus() {
        var id_layanan_pendaftaran_pppk = $('#id-layanan-pendaftaran-pppk').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_data_pengkajian_pasien_populasi_khusus") ?>',
            data: $('#form_pengkajian_pasien_populasi_khusus').serialize() + '&id-layanan-pendaftaran-pppk=' + id_layanan_pendaftaran_pppk,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
                $('#modal_pengkajian_pasien_populasi_khusus').modal('hide');
                showListForm($('#id-pendaftaran-pppk').val(), $('#id-layanan-pendaftaran-pppk').val(), $('#id-pasien-pppk').val());
            },
            complete: function(data) {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

</script>