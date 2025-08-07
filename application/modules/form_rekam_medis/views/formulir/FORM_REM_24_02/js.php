<script>    // SKKM
    // ini klaau bermasalah di hapus ajah. soalnya ketika edit yang disabled ini suka hilang isinya 
    $('#penanggungjawabskkm').click(function() {  // Ketika checkbox dengan ID 'penanggungjawabskkm' diklik
        if ($(this).is(":checked")) {             // Jika checkbox tersebut dicentang
            $('#sebutkanskkm').prop('disabled', false);  // Aktifkan input 'sebutkanskkm' (bisa diisi)
        } else {                                  // Jika checkbox tidak dicentang
            $('#sebutkanskkm').val('');           // Kosongkan nilai input 'sebutkanskkm'
            $('#sebutkanskkm').prop('disabled', true);  // Nonaktifkan input 'sebutkanskkm' (tidak bisa diisi)
        }
    });

    function lihatFORM_REM_24_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        window.open('<?= base_url('pendaftaran_igd/cetak_surat_keterangan_kesediaan_membayar/') ?>' + layanan.id, 'Cetak Surat Keterangan Kesediaan Membayar', 'width=' + dWidth + ', height=' +
        dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_REM_24_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakFormKPEGD(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_REM_24_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakFormKPEGD(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function cetakFormKPEGD(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal_surat_keterangan_kesediaan_membayar').modal('show');
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }       
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_surat_keterangan_kesediaan_membayar") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {  
                console.log(data);   
                resetFormSKKM(); 
                $('#id-layanan-pendaftaran-skkm').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-skkm').val(id_pendaftaran); 
                if (data.pasien !== null) {
                    $('#id-pasien-skkm').val(data.pasien.id_pasien);
                    $('#namapasienskkm').val(data.pasien.nama);
                    $('#umurskkm').val(data.pasien.umur_pasien);
                    $('#normskkm').val(data.pasien.no_rm);
                    $('#namaskkm').val(data.pasien.nama_pjwb);
                    $('#nikskkm').val(data.pasien.nik_pjwb);
                    $('#alamatskkm').val(data.pasien.alamat_pjwb);
                    $('#notelponskkm').val(data.pasien.telp_pjwb);
                }

                if (data.surat_keterangan_kesediaan_membayar !== null) {  
                    $('#id-pasien-skkm').val(data.surat_keterangan_kesediaan_membayar.id);  
                    if (data.surat_keterangan_kesediaan_membayar.suamiskkm == '1') { $('#suamiskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.istriskkm == '1') { $('#istriskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.ayahskkm == '1') { $('#ayahskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.ibuskkm == '1') { $('#ibuskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.waliskkm == '1') { $('#waliskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.anakskkm == '1') { $('#anakskkm').prop('checked', true) }
                    if (data.surat_keterangan_kesediaan_membayar.penanggungjawabskkm == '1') { $('#penanggungjawabskkm').prop('checked', true) }
                    $('#sebutkanskkm').val(data.surat_keterangan_kesediaan_membayar.sebutkanskkm);                                   
                    $('#tanggalskkm').val(data.surat_keterangan_kesediaan_membayar.tanggalskkm); 
                }  

                $('#modal_surat_keterangan_kesediaan_membayar_title').html(
                    `<b>FORM SURAT PERNYATAAN KESEDIAAN BERBAYAR</b> | No. RM: ${data.pasien.no_rm}, Nama: ${data.pasien.nama}`,
                )

                $('#modal_surat_keterangan_kesediaan_membayar').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function CetakSuratPernyataanKesediaanMembayar() {
        if ($('#tanggalskkm').val() === '') {
            syams_validation('#tanggalskkm', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggalskkm');
        }
        const id = $('#id-layanan-pendaftaran-skkm').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_form_surat_keterangan_kesediaan_membayar') ?>',
            data: $('#form-surat-keterangan-kesediaan-membayar').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_surat_keterangan_kesediaan_membayar/') ?>' + id, 'Cetak Surat Keterangan Kesediaan Membayar', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);
                    showListForm($('#id-pendaftaran-skkm').val(), $('#id-layanan-pendaftaran-skkm').val(), $('#id-pasien-skkm').val());
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

    function resetFormSKKM() {
        $('#form-surat-keterangan-kesediaan-membayar')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);       
    }

</script>