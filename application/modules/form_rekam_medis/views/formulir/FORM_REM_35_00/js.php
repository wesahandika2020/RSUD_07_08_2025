<script>


    function lihatFORM_REM_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        window.open('<?= base_url('pendaftaran_igd/cetak_surat_peryataan_pembaharuan_identitas_pasien/') ?>' + layanan.id, 'Cetak Surat Peryataan Pembaharuan Identitas Pasien', 'width=' + dWidth + ', height=' +
        dHeight + ', left=' + x + ', top=' + y);
        // SPPIP
    }

    function editFORM_REM_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        cetakSppip(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_REM_35_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        cetakSppip(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakSppip(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $('#id-layanan-pendaftaran-sppip').val(id_layanan_pendaftaran);
		$('#id-pendaftaran-sppip').val(id_pendaftaran);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/form_sppip") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                $('#modal-sppip').modal('show');
                const data = response.surat_peryataan_pembaharuan_identitas_pasien.data
                const pasien = response.surat_peryataan_pembaharuan_identitas_pasien.pendaftaran.pasien
                const penanggung_jawab = response.surat_peryataan_pembaharuan_identitas_pasien.penanggung_jawab
            
                $('#id-pasien-sppip').val(pasien.id);
                resetSuratperyataanpembaharuanidentitaspasien();       
                              
                    // $('#nama-sppiprm').val(data?.nama ?? penanggung_jawab?.nama_pjwb).prop('readOnly', false);
                    // $('#tanggal-sppiprm').val(data?.tanggal_lahir ?? penanggung_jawab?.tgl_lahir_pjwb).prop('readOnly', false);
                    // $('#umur-sppiprm').val(data?.umur_pjwb ?? penanggung_jawab?.umur).prop('readOnly', false);
                    // $('#kelamin-sppiprm').val(data?.jenis_kelamin ?? penanggung_jawab?.kelamin_pjwb).attr('readonly', false);
                    // $('#ktp-sppiprm').val(data?.identitas ?? penanggung_jawab?.nik_pjwb).prop('readOnly', false);
                    // $('#alamat-sppiprm').html(data?.alamat ?? penanggung_jawab?.alamat_pjwb).prop('readOnly', false);
                    // $('#hp-sppiprm').val(data?.telp ?? penanggung_jawab?.telp_pjwb).prop('readOnly', false);
                    // $('#hubungan-keluarga-sppiprm').val(data?.hubungan_pasien_sppip ?? penanggung_jawab?.hubungan_pjwb);

                    // $('#nama-sppip').val(data?.nama_sppip);
                    // $('#tgl-lahir-sppip').val(data?.tgl_lahir_sppip);
                    // $('#umur-sppip').val(data?.umur_sppip);
                    // data?.jk_sppip == 'Laki-laki' ? $('#jk-sppip-1').prop('checked', true) : $('#jk-sppip-1').prop('checked', false);
                    // data?.jk_sppip == 'Perempuan' ? $('#jk-sppip-2').prop('checked', true) : $('#jk-sppip-2').prop('checked', false);   
                    // $('#no-rm-sppip').val(data?.no_rm_sppip);
                    // $('#alamat-sppip').val(data?.alamat_sppip);
                    // $('#no-hp-sppip').val(data?.no_hp_sppip);              
                    // $('#tgl-sppip').val(data?.tgl_sppip);    

                    // console.log(pasien.alamat);

                    // BATAS SUCIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII

                    //  LANJUT BSOK AJAH YANG DI AJARIN KARIS
                     // console.log(data.surat_peryataan_pembaharuan_identitas_pasien[0].dokter); UNTUK MENCOBA CONSOLE
                    //  console.log(data.surat_peryataan_pembaharuan_identitas_pasien.alamat); 


                    $('#nama-sppiprm').val(data?.nama_sppip);
                    $('#tanggal-lahir-sppiprm').val(data?.tgl_lahir_sppip);
                    $('#umur-sppiprm').val(data?.umur_sppip);
                    data?.jk_sppip == 'Laki-laki' ? $('#jk-sppip-1').prop('checked', true) : $('#jk-sppip-1').prop('checked', false);
                    data?.jk_sppip == 'Perempuan' ? $('#jk-sppip-2').prop('checked', true) : $('#jk-sppip-2').prop('checked', false);  
                    $('#ktp-sppiprm').val(data?.no_ktp_sppip);
                    $('#alamat-sppiprm').val(data?.alamat_sppip);
                    $('#no-hp-sppiprm').val(data?.no_hp_sppip);                       
                    $('#hubungan-keluarga-sppiprm').val(data?.hubungan_pasien_sppip);
  
                    
                    
                    $('#nama-sppip').val(pasien.nama).prop('readOnly', true);
                    $('#tgl-lahir-sppip').val(pasien.tanggal_lahir).prop('readOnly', true);
                    $('#umur-sppip').val(pasien.umur_pasien).prop('readOnly', true);
                    $('#kelamin-sppip').val(pasien.kelamin).attr('readonly', true);
                    $('#no-rm-sppip').val(pasien.no_rm).attr('readonly', true);
                    $('#alamat-sppip').val(pasien.alamat).prop('readonly',true);
                    $('#no-hp-sppip').val(pasien.telp).prop('readOnly', true); 

                    $('#tgl-sppip').val(data?.tgl_sppip);
                    
                    // console.log(pasien);

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    function CetakSuratperyataanpembaharuanidentitaspasien() {

        if ($('#tgl-sppip').val() === '') {
            syams_validation('#tgl-sppip', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-sppip');
        }

        const id = $('#id-layanan-pendaftaran-sppip').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_sppip') ?>',
            data: $('#form-sppip').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_surat_peryataan_pembaharuan_identitas_pasien/') ?>' + id, 'Cetak Surat Peryataan Pembaharuan Identitas Pasien', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    // $('#modal-sppip').modal('hide');
                    showListForm($('#id-pendaftaran-sppip').val(), $('#id-layanan-pendaftaran-sppip').val(), $('#id-pasien-sppip').val());
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

    function resetSuratperyataanpembaharuanidentitaspasien() {
        $('#form-sppip')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);

        // $('#nama-sppip').val('');
        // $('#tgl-lahir-sppip').val('');
        // $('#umur-sppip').val('');
        // $('#jk-sppip').val('');
        // $('#no-rm-sppip').val('');
        // $('#alamat-sppip').val('');
        // $('#no-hp-sppip').val('');              
        // $('#tgl-sppip').val('');

        $('#nama-sppiprm').val('');
        $('#tgl-lahir-sppiprm').val('');
        $('#umur-sppiprm').val('');
        $('#ktp-sppiprm').val('');
        $('#alamat-sppiprm').val('');
        $('#no-hp-sppiprm').val('');              
        $('#hubungan-keluarga-sppiprm').val('');              
        $('#tgl-sppip').val('');

    }
</script>