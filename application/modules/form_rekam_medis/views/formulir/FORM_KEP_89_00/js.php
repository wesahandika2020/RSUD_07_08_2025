<script>
    // ICPMK

    // NAMA DOKTER 
    $('#dokter-icpmk').select2c({
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
            return data.nama;
        }
    });

    // NAMA PERAWAT
    $('#perawat-1-icpmk, #perawat-2-icpmk').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term,
                page) { // page is the one-based page number tracked by Select2
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

    function lihatFORM_KEP_89_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        window.open('<?= base_url('pendaftaran_igd/cetak_form_icpmk/') ?>' + layanan.id, 'Cetak Surat Informed Consent PMK', 'width=' + dWidth + ', height=' +
        dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_89_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakFormPMK(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_89_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakFormPMK(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakFormPMK(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal-informed-pmk').modal('show');

        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $('#id-layanan-pendaftaran-icpmk').val(id_layanan_pendaftaran);
		$('#id-pendaftaran-icpmk').val(id_pendaftaran);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_form_informed_consent_pmk") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('#modal-informed-pmk').modal('show');

                const data = response.informed_constant_pmk.data
                const pasien = response.informed_constant_pmk.pendaftaran.pasien
                const penanggung_jawab = response.informed_constant_pmk.penanggung_jawab  
                resetFormPMK(); 
                $('#id-pasien-icpmk').val(pasien.id);  
                $('#nama-by-icpmk').val(pasien.nama).prop('readOnly', true);

                $('#usia-by-icpmk').val(data?.usia_by_icpmk);
                $('#nama-ort-icpmk').val(data?.nama_ort_icpmk);
                $('#alamat-icpmk').val(data?.alamat_icpmk);

                if (data?.hubungan_ayah_icpmk == 'Ayah') { $('#hubungan-ayah-icpmk').prop('checked', true) }
                if (data?.hubungan_ibu_icpmk == 'Ibu') { $('#hubungan-ibu-icpmk').prop('checked', true) }
                if (data?.hubungan_nenek_icpmk == 'Nenek') { $('#hubungan-nenek-icpmk').prop('checked', true) }
                if (data?.hubungan_kakek_icpmk == 'Kakek') { $('#hubungan-kakek-icpmk').prop('checked', true) }
                $('#hubungan-lainya-icpmk').val(data?.hubungan_lainya_icpmk);
                $('#tanggal-icpmk').val(data?.tanggal_icpmk);
                $('#perawat-1-icpmk').val(data?.perawat_1_icpmk);   
                $('#s2id_perawat-1-icpmk a .select2c-chosen').html(data?.nama_perawat_1);
                $('#perawat-2-icpmk').val(data?.perawat_2_icpmk);   
                $('#s2id_perawat-2-icpmk a .select2c-chosen').html(data?.nama_perawat_2);
                $('#dokter-icpmk').val(data?.dokter_icpmk);   
                $('#s2id_dokter-icpmk a .select2c-chosen').html(data?.nama_dokter);
                // console.log(data.dokter_doa);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });


    }

    function CetakSuratInformedConsentPMK() {

        if ($('#tanggal-icpmk').val() === '') {
            syams_validation('#tanggal-icpmk', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-icpmk');
        }

        if ($('#perawat-1-icpmk').val() === '') {
            syams_validation('#perawat-1-icpmk', 'Nama Perawat Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#perawat-1-icpmk');
        }

        if ($('#perawat-2-icpmk').val() === '') {
            syams_validation('#perawat-2-icpmk', 'Nama Perawat Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#perawat-2-icpmk');
        }

        if ($('#dokter-icpmk').val() === '') {
            syams_validation('#dokter-icpmk', 'Nama Dokter Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#dokter-icpmk');
        }
        const id = $('#id-layanan-pendaftaran-icpmk').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_form_icpmk') ?>',
            data: $('#informed-pmk').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_form_icpmk/') ?>' + id, 'Cetak Surat Informed Consent PMK', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    // $('#modal-informed-pmk').modal('hide');

                    showListForm($('#id-pendaftaran-icpmk').val(), $('#id-layanan-pendaftaran-icpmk').val(), $('#id-pasien-icpmk').val());
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

    function resetFormPMK() {
        $('#informed-pmk')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);            
    }

</script>