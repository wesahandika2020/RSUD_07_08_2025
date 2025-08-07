<div id="rad_modal" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-rad-label" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-rad-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formrad role=form class=form-horizontal') ?>
                    <input type="hidden" name="tarif_tindakan" id="tarif_tindakan_rad"/>
                    <input type="hidden" name="id_layanan_asal_rad" id="id_layanan_asal_rad"/>
                    <input type="hidden" id="hd_item_rad"/>
                    <input type="hidden" id="hd_item_rad_label"/>
                    
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Dokter Perujuk</label>
                        <div class="col">
                            <input type="text" name="dokter_rujuk_rad" class="select2-input" id="dokter_rujuk_rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Jenis</label>
                        <div class="col">
                            <?= form_dropdown('jenis_rad', array('Radiologi' => 'Radiologi', 'Cath Lab' => 'Cath Lab', 'Endoskopi' => 'Endoskopi'), array('Radiologi'), 'id=jenis_rad class=form-control') ?>
                            <!-- <input type="text" name="jenis_rad" id="jenis_rad" class="form-control" value="Radiologi" readonly> -->
                        </div>  
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan_radiologi">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Keterangan Klinis</label>
                        <div class="col">
                            <input type="text" name="keterangan_order_rad" class="form-control" id="keterangan_order_rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Berat Badan</label>
                        <div class="col">
                            <input type="text" name="bb_rad" class="form-control" id="bb-rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Cito</label>
                        <div class="col-1" style="flex: 0 0 5.33333%;">
                            <input type="checkbox" name="is_cito" class="form-control" id="is_cito_rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="add_radiologi()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-rad">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Pemeriksaan</th>
                                <th class="center">Berat Badan</th>
                                <th class="center">Keterangan</th>
                                <th class="center">Item</th>
                                <th class="center">Tarif</th>
                                <th class="center">Cito</th>
                                <th class="center"></th>
                            </tr>
                        </thead>
                        <tbody>                                    
                        </tbody>
                    </table>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpan_request_rad()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="daftar-rad" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-daftar-rad-label" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-daftar-rad-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formdaftarrad role=form class=form-horizontal') ?>
                    <input type="hidden" name="id_pendaftaran" id="id-daftar-rad" />
                    <input type="hidden" name="id_layanan" id="id-daftar-layanan" />
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Berat Badan</label>
                        <div class="col-6">
                            <input type="text" name="daftar_bb_rad" class="form-control" id="daftar-bb-rad">
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanRad()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
    
    $tindakan_radiologi = $jenis_tindakan;
    if($tindakan_radiologi === 'Intensive Care'){

        $tind_rad = 'Rawat Inap';

    } else {

        $tind_rad = $jenis_tindakan;
    } 

?>

<script>
    $(function() {
        var KELAS_TINDAKAN = '<?= $kelas_tindakan ?>';
        var JENIS_TINDAKAN = '<?= $tind_rad ?>';

        if (JENIS_TINDAKAN='Medical Check Up') {
            JENIS_TINDAKAN='Rawat Jalan';
        }

        $('#tindakan_radiologi').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kelas: KELAS_TINDAKAN,
                        jenis_tindakan: JENIS_TINDAKAN,
                        jenis_pemeriksaan: 'Pelayanan Radiologi',
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var total = data.total;
                var kelas = (data.kelas !== null)?((', kelas ')+data.kelas):((data.id !== '')?'Semua Kelas':'');
                var jenis = (data.jenis !== null)?('<br/>'+data.jenis+'<br/>'):'<br/>';
                
                var markup = '<b>'+data.layanan+'</b>'+jenis+data.bobot+kelas+'<br/>'+numberToCurrency(total);
                return markup;
            },
            formatSelection: function(data){
                $('#tarif_tindakan_rad').val(data.total);
                var kelas = (data.kelas !== null)?(', kelas ')+data.kelas:'';
                var jenis = (data.jenis !== null)?data.jenis:'';
                var result = data.layanan+', '+jenis+', '+data.bobot+kelas;
                if (data.id === '') {
                    result = '';
                }
                return result;
            }
        });

        $('#dokter_rujuk_rad').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#bb-rad').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#daftar-bb-rad').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    })

    function validasiDesimal(input) {
      const kasihRegex = /^\d+(\.\d{1,2})?$/;
      return kasihRegex.test(input);
    }

    function request_rad(){
		let account_group  = '<?= $this->session->userdata('account_group') ?>';
        // if ($('#tindaklanjut').val() !== '' && account_group !== 'Admin' ) {
		if (($('#tindaklanjut').val() !== '') && (account_group !== 'Admin' ) && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')  ) {
            syams_validation('#tambah-rad', 'Pasien sudah pulang, tidak dapat order Radiologi..');
            return false;
        }
		
        $('#id_layanan_asal_rad').val($('#id-layanan').val());
        $('#modal-rad-label').html('Permintaan Pemeriksaan Radiologi');
        $('#tindakan_radiologi, #tarif_tindakan_rad').val('');
        $('#bb-rad').val('');
        $('#s2id_tindakan_radiologi a .select2-chosen').html('');
        $('#dokter_rujuk_rad').val($('#dokter').val());
        $('#s2id_dokter_rujuk_rad a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
        $('#rad_modal').modal('show');
        $('#table-rad tbody').empty();
        klik = null;
        
        var JENIS_TINDAKAN = '<?= $tind_rad ?>';

        $.ajax({
            type : 'GET',
            url: '<?= base_url("order_radiologi/api/order_radiologi/data_bb") ?>',
            data: 'jenis='+JENIS_TINDAKAN + '&id_layanan=' + $('#id-layanan').val(),
            cache: false,
            dataType : 'json',
            success: function(data) {

                if(data !== 'Nodata'){

                    if(data.berat_badan !== null && data.berat_badan !== ''){

                        $('#bb-rad').val(data.berat_badan);
                        messageCustom('Data Berat Badan Pasien Tersedia', 'Success');
                        syams_validation_remove('#bb-rad');

                    } else {

                        messageCustom('Data Berat Badan Pasien Tidak Tersedia, Silakan input manual', 'Error');
                        syams_validation('#bb-rad', 'Silakan isi Berat Badan Pasien terlebih dahulu!!');

                    }

                } else {

                    messageCustom('Data Berat Badan Pasien Tidak Tersedia, Silakan input manual', 'Error');
                    syams_validation('#bb-rad', 'Silakan isi Berat Badan Pasien terlebih dahulu!!');

                }
               
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }

    function orderRad(){
        
        $('#modal-daftar-rad-label').html('Permintaan Pemeriksaan Radiologi');
        $('#daftar-bb-rad').val('');
        $('#daftar-rad').modal('show');
        klik = null;

        var JENIS_TINDAKAN = '<?= $tind_rad ?>';

        $.ajax({
            type : 'GET',
            url: '<?= base_url("order_radiologi/api/order_radiologi/data_bb") ?>',
            data: 'jenis='+JENIS_TINDAKAN + '&id_layanan=' + $('#id-layanan').val(),
            cache: false,
            dataType : 'json',
            success: function(data) {

                if(data !== 'Nodata'){

                    if(data.berat_badan !== null && data.berat_badan !== ''){

                        $('#bb-rad').val(data.berat_badan);
                        $('#daftar-bb-rad').val(data.berat_badan);
                        messageCustom('Data Berat Badan Pasien Tersedia', 'Success');
                        syams_validation_remove('#bb-rad');

                    } else {

                        messageCustom('Data Berat Badan Pasien Tidak Tersedia, Silakan input manual', 'Error');
                        syams_validation('#bb-rad', 'Silakan isi Berat Badan Pasien terlebih dahulu!!');

                    }

                } else {

                    messageCustom('Data Berat Badan Pasien Tidak Tersedia, Silakan input manual', 'Error');
                    syams_validation('#bb-rad', 'Silakan isi Berat Badan Pasien terlebih dahulu!!');

                }
               
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }

    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function validasiString(input) {
        // Menghilangkan spasi di awal dan akhir string
        var trimmedInput = input.trim();

        // Memeriksa apakah string setelah di-trim memiliki panjang lebih dari 3 karakter
        if (trimmedInput.length > 3) {
            // String valid
            return true;
        } else {
            // String tidak valid
            return false;
        }
    }
    
    function add_radiologi(){
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_rad').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#dokter_rujuk_rad').val() === '') {
            syams_validation('#dokter_rujuk_rad', 'Dokter harus diisi!');
            stop = true;   
        };

        if ($('#bb-rad').val() === '') {
            syams_validation('#bb-rad', 'Berat Badan Pasien harus diisi!');
            stop = true;   
        };

        if ($('#tindakan_radiologi').val() === '') {
            syams_validation('#tindakan_radiologi', 'Pemeriksaan harus diisi!');
            stop = true; 

        };

        if (validasiDesimal($('#bb-rad').val()) === false) {
            syams_validation('#bb-rad', 'Silakan isi dengan Angka atau Desimal maksimal 2 angka di belakang koma');
            stop = true; 

        };

        if ($('#keterangan_order_rad').val() === '') {
            syams_validation('#keterangan_order_rad', 'Keterangan Klinis Pasien harus diisi!');
            stop = true;   
        };

        if(validasiString($('#keterangan_order_rad').val()) === false){

            syams_validation('#keterangan_order_rad', 'Silakan isi Keterangan Klinis dengan Benar dan lebih dari 3 karakter');
            stop = true;

        }

        if (stop) {
            return false;
        };

        syams_validation_remove('#bb-rad');
        syams_validation_remove('#dokter_rujuk_rad');
        syams_validation_remove('#tindakan_radiologi');
        syams_validation_remove('#keterangan_order_rad');

        var str = '';
        var numb = $('.number_tindakan_rad').length;
        
        var tindakan = $('#s2id_tindakan_radiologi a .select2-chosen').html();
        var id_tindakan = $('#tindakan_radiologi').val();
        var tarif = $('#tarif_tindakan_rad').val();
        var keterangan = $('#keterangan_order_rad').val(); //tambahan lina radiologi
        var itemdata = $('#hd_item_rad').val();
        var itemlabel = $('#hd_item_rad_label').val();
        var beratBadan = $('#bb-rad').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="number_tindakan_rad" align="center">'+ (++numb) +'</td>'+
            '<td align="center"><input type="hidden" name="tindakan_rad[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td align="center"><input type="hidden" name="berat_badan[]" value="'+beratBadan+'"/>'+beratBadan+'</td>'+
            '<td align="center"><input type="hidden" name="keterangan[]" value="'+keterangan+'"/>'+keterangan+'</td>'+ //tambahan lina radiologi
            '<td align="center"><input type="hidden" name="item_rad_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="center"><input type="hidden" name="item_rad[]" value="'+itemdata+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button>'+
            '</tr>';

        $('#table-rad tbody').append(str);
        $('#is_cito_rad').prop('checked', false);
        $('#s2id_tindakan_radiologi a .select2-chosen').html('');
        $('#tindakan_radiologi').val('');
        $('#keterangan_order_rad').val(''); //tambahan lina radiologi
        $('#tarif_tindakan_rad').val('');
        $('#hd_item_rad').val('');
        $('#hd_item_rad_label').val('');
        if(beratBadan === null || beratBadan === ''){
            $('#bb-rad').val('');
        }
    }

    function simpan_request_rad(){
        var id_layanan_pendaftaran = $('#id_layanan_asal_rad').val();
        var id_dokter = $('#dokter_rujuk_rad').val();
        var stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter_rujuk_rad', 'Dokter harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
            if (klik === null) {
                klik = $.ajax({
                    type : 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/order_radiologi") ?>/',
                    data: $('#formrad').serialize()+'&id_layanan='+id_layanan_pendaftaran+'&dokter='+id_dokter,
                    cache: false,
                    dataType : 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        var tipe = 'Success';
                        if (data.status === false) {
                            tipe = 'Error';
                        }
                        
                        messageCustom(data.message, tipe);
                        
                        $('input[type=checkbox]').removeAttr('checked');
                        $('#rad_modal').modal('hide');
                        get_pemeriksaan_rad(id_layanan_pendaftaran);
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e){
                        messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
                    }
                });
            }       
        }else{
            messageCustom('Dokter Harus Dipilih', 'Info');
        }
        
    }

    function simpanRad(){
        var idLayananPendaftaran = $('#id-daftar-layanan').val();
        var idDaftar = $('#id-daftar-rad').val();

        if ($('#daftar-bb-rad').val() === '') {
            syams_validation('#daftar-bb-rad', 'Silakan Isi Berat Badan Terlebih dahulu...');
            return false;
        }

        if (validasiDesimal($('#daftar-bb-rad').val()) === false) {
            syams_validation('#daftar-bb-rad', 'Silakan isi dengan Angka atau Desimal maksimal 2 angka di belakang koma');
            return false;

        };

        syams_validation_remove('#daftar-bb-rad');
        
        if ((idLayananPendaftaran !== '')) {
            if (klik === null) {
                klik = $.ajax({
                    type : 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/daftarRad") ?>/',
                    data: $('#formdaftarrad').serialize()+'&idLayananPendaftaran='+idLayananPendaftaran,
                    cache: false,
                    dataType : 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(data.metaData.code !== 200){

                            swalAlert('warning', data.metaData.code, data.metaData.message);

                        } else {

                            messageCustom(data.metaData.message, 'Success');
                            $('#daftar-rad').modal('hide');
                            detailPendaftaran(idDaftar, 1);
                            
                        }
                    
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e){
                        messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
                    }
                });
            }       
        }else{
            messageCustom('Dokter Harus Dipilih', 'Info');
        }
        
    }
    
    function get_pemeriksaan_rad(id_layanan){
        $('#req_rad').empty();
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_radiologi_detail") ?>/id/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v){
                        var hapus_rad = '';
                        if (v.waktu_hasil === null) {
                        };

                        str = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td>'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>'+v.dokter+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Radiografer</strong></td><td>'+v.radiografer+'</td></tr>'+
                                    '<tr><td width="15%"></td>'+
                                        '<td></td>' 
                                        // '<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_radiologi('+v.id+')"><i class="fa fa-print"></i> Nota Order</button>'+
                                        // '<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_radiologi('+v.id+')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>'+
                                    '</tr>'+
                                    hapus_rad+
                                  '</table>';
                            $('#req_rad').append(str);

                        str = '<table class="table table-hover table-striped table-sm color-table info-table">'+
                                    '<thead><tr>'+
                                            '<th width="15%" class="left">Layanan</th>'+
                                            '<th width="40%" class="left"></th>'+
                                            '<th width="40%" class="left">Status</th>'+
                                            '<th align="center" width="5%"></th>'+
                                    '</tr></thead><tbody>';
                       

                        $.each(v.detail, function(j, x){
                              str += '<tr>'+
                                    '<td><b>'+ j +'</b></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '</tr>';
                            
                            var hapus = '';
                            $.each(x, function(k, z){
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                str += '<tr>'+
                                    '<td></td>'+
                                    '<td>'+z.layanan_radiologi+'</td>'+
                                    '<td>'+z.konfirmasi+'</td>'+
                                    '<td align="center">'+hapus+'</td>'+
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_rad').append(str);
                    });

                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }
</script>