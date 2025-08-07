<script>
    // DOA_D_O_A

    // NAMA DOKTER DOA
    $('#dokter-doa').select2c({
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

    $('#pukul-doa')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })

    function lihatFORM_KEP_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        window.open('<?= base_url('pendaftaran_igd/cetak_form_doa/') ?>' + layanan.id, 'Cetak Surat Keterangan DOA', 'width=' + dWidth + ', height=' +
        dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_KEP_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakFormDoa(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_06_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakFormDoa(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakFormDoa(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal-form-doa').modal('show');
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }
        $('#id-layanan-pendaftaran-doa').val(id_layanan_pendaftaran);
		$('#id-pendaftaran-doa').val(id_pendaftaran);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/form_doa") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('#modal-form-doa').modal('show');
                const data = response.sk_doa.data
                const pasien = response.sk_doa.pendaftaran.pasien
                const penanggung_jawab = response.sk_doa.penanggung_jawab        
                resetFormDoa(); 
                $('#id-pasien-doa').val(pasien.id);  
                $('#nama-doa').val(pasien.nama).prop('readOnly', true);
                $('#no-rm-doa').val(pasien.no_rm).attr('readonly', true);

                // Asumsikan pasien.tempat_lahir berisi tempat lahir pasien
                var tempat_lahir = pasien.tempat_lahir; // Misalnya 'Tangerang'
                var tanggal_lahir = pasien.tanggal_lahir; // Misalnya '2016-10-31'

                // Gabungkan tempat lahir dan tanggal lahir dengan format yang diinginkan
                var ttl_doa_value = tempat_lahir + ' / ' + tanggal_lahir;

                // Setel nilai input dan buat read-only
                $('#ttl-doa').val(ttl_doa_value).prop('readOnly', true);


                $('#umur-doa').val(pasien.umur_pasien).prop('readOnly', true);
                $('#jk-doa').val(pasien.kelamin).attr('readonly', true);
                $('#alamat-doa').val(pasien.alamat).prop('readonly',true);
                $('#tanggal-doa').val(data?.tanggal_doa);
                $('#pukul-doa').val(data?.pukul_doa);
                $('#tanggal-surat-doa').val(data?.tanggal_surat_doa);
                $('#dokter-doa').val(data?.dokter_doa);   
                $('#s2id_dokter-doa a .select2c-chosen').html(data?.nama_dokter);
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


    function CetakSuratKeteranganDOA() {
        if ($('#tanggal-doa').val() === '') {
            syams_validation('#tanggal-doa', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-doa');
        }
        if ($('#pukul-doa').val() === '') {
            syams_validation('#pukul-doa', 'Jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#pukul-doa');
        }
        if ($('#tanggal-surat-doa').val() === '') {
            syams_validation('#tanggal-surat-doa', 'Tanggal Surat diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-surat-doa');
        }
        if ($('#dokter-doa').val() === '') {
            syams_validation('#dokter-doa', 'Nama Dokter Belum di Pilih.....!');
            return false;
        } else {
            syams_validation_remove('#dokter-doa');
        }
        const id = $('#id-layanan-pendaftaran-doa').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_form_doa') ?>',
            data: $('#form-doa').serialize(),
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
                    window.open('<?= base_url('pendaftaran_igd/cetak_form_doa/') ?>' + id, 'Cetak Surat Keterangan DOA', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    // $('#modal-doa').modal('hide');
                    showListForm($('#id-pendaftaran-doa').val(), $('#id-layanan-pendaftaran-doa').val(), $('#id-pasien-doa').val());
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

    function resetFormDoa() {
        $('#form-doa')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#tanggal-doa').val('');              
        $('#pukul-doa').val('');    
        $('#tanggal-surat-doa').val('');              
    }



</script>