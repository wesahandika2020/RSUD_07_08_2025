<script>
    // SP_WE

    // NAMA DOKTER 
    $('#dokter-sp').select2c({
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
    $('#saksi-1-sp, #saksi-2-sp').select2c({
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

    function lihatFORM_KEP_72_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        window.open('<?= base_url('pendaftaran_igd/cetak_form_surat_pernyataan/') ?>' + layanan.id, 'Cetak Surat Pernyataan', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);

    }

    function editFORM_KEP_72_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakFormSuratPernyataan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_72_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakFormSuratPernyataan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakFormSuratPernyataan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        // $('#modal-surat-pernyataan').modal('show');
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $('#id-layanan-pendaftaran-sp').val(id_layanan_pendaftaran);
		$('#id-pendaftaran-sp').val(id_pendaftaran);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_form_surat_pernyataan") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('#modal-surat-pernyataan').modal('show');

                const data = response.surat_pernyataan.data
                const pasien = response.surat_pernyataan.pendaftaran.pasien
                const penanggung_jawab = response.surat_pernyataan.penanggung_jawab  
                resetFormSuratPernyataan(); 
                $('#id-pasien-sp').val(pasien.id); 

                $('#nama-kel-sp').val(data?.nama_kel_sp);
                $('#umur-kel-sp').val(data?.umur_kel_sp);
                $('#jk-kel-sp').val(data?.jk_kel_sp);
                $('#alamat-kel-sp').val(data?.alamat_kel_sp);
                $('#no-ktp-kel-sp').val(data?.no_ktp_kel_sp);

                if (data?.saya_sendiri_kel_sp == 'Saya Sendiri') { $('#saya-sendiri-kel-sp').prop('checked', true) }
                if (data?.anak_kel_sp == 'Anak') { $('#anak-kel-sp').prop('checked', true) }
                if (data?.istri_kel_sp == 'Istri') { $('#istri-kel-sp').prop('checked', true) }
                if (data?.suami_kel_sp == 'Suami') { $('#suami-kel-sp').prop('checked', true) }
                if (data?.ayah_kel_sp == 'Ayah') { $('#ayah-kel-sp').prop('checked', true) }
                if (data?.ibu_kel_sp == 'Ibu') { $('#ibu-kel-sp').prop('checked', true) }
                $('#lainya-kel-sp').val(data?.lainya_kel_sp);

                $('#nama-ps-sp').val(pasien.nama).prop('readOnly', true);
                $('#umur-ps-sp').val(pasien.umur_pasien).prop('readOnly', true);
                $('#jk-ps-sp').val(pasien.kelamin).attr('readonly', true);
                $('#alamat-ps-sp').val(pasien.alamat).prop('readonly',true);
                $('#no-ktp-ps-sp').val(pasien.no_identitas).prop('readonly',true);
          
                if (data?.mengajukan_sp == '1') { $('#mengajukan-sp').prop('checked', true) }
                if (data?.menolak_sp == '1') { $('#menolak-sp').prop('checked', true) }
                if (data?.dirawat_sp == '1') { $('#dirawat-sp').prop('checked', true) }
                if (data?.perawatan_sp == '1') { $('#perawatan-sp').prop('checked', true) }
                if (data?.perawatan_dgn_sp == '1') { $('#perawatan-dgn-sp').prop('checked', true) }
                if (data?.menolak_pp_sp == '1') { $('#menolak-pp-sp').prop('checked', true) }
                if (data?.lainya_sp == '1') { $('#lainya-sp').prop('checked', true) }
                $('#dg-alasan-sp').val(data?.dg_alasan_sp);
                $('#dg-alasan-sp-1').val(data?.dg_alasan_sp_1);

                $('#tgl-sp').val(data?.tgl_sp);
                $('#saksi-1-sp').val(data?.saksi_1_sp);   
                $('#s2id_saksi-1-sp a .select2c-chosen').html(data?.nama_perawat_1);
                $('#saksi-2-sp').val(data?.saksi_2_sp);   
                $('#s2id_saksi-2-sp a .select2c-chosen').html(data?.nama_perawat_2);
                $('#dokter-sp').val(data?.dokter_sp);   
                $('#s2id_dokter-sp a .select2c-chosen').html(data?.nama_dokter);
                // console.log(data.dokter_sp);
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    function CetakSuratPernyataan() {

        if ($('#tgl-sp').val() === '') {
            syams_validation('#tgl-sp', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-sp');
        }

        if ($('#saksi-1-sp').val() === '') {
            syams_validation('#saksi-1-sp', 'Nama Perawat Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#saksi-1-sp');
        }

        if ($('#saksi-2-sp').val() === '') {
            syams_validation('#saksi-2-sp', 'Nama Perawat Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#saksi-2-sp');
        }

        if ($('#dokter-sp').val() === '') {
            syams_validation('#dokter-sp', 'Nama Dokter Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#dokter-sp');
        }

        const id = $('#id-layanan-pendaftaran-sp').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_form_surat_pernyataan') ?>',
            data: $('#form-surat-pernyataan').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_form_surat_pernyataan/') ?>' + id, 'Cetak Surat Pernyataan', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);

                    showListForm($('#id-pendaftaran-sp').val(), $('#id-layanan-pendaftaran-sp').val(), $('#id-pasien-sp').val());
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

    function resetFormSuratPernyataan() {
        $('#form-surat-pernyataan')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);            
    }


</script>