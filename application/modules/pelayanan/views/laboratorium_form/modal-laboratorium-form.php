<div id="lab_modal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-lab-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formlab role=form class=form-horizontal') ?>
                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan-lab"/>
                    <!-- <input type="hidden" name="id_layanan_asal" id="id_layanan_asal"/> -->
                    <input type="hidden" id="hd_item_lab"/>
                    <input type="hidden" id="hd_item_lab_label"/>
                    
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Dokter Perujuk</label>
                        <div class="col">
                            <input type="text" name="dokter_rujuk" class="select2-input" id="dokter_rujuk">
                        </div>
                    </div>
                    <?php
                        $jenis_lab = array(
                            '292' => 'Patologi Klinik',  
                            '293' => 'Patologi Anatomi', 
                            '298' => 'Mikrobiologi',
                        );
                    ?>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Jenis</label>
                        <div class="col">
                            <?= form_dropdown(
                                'jenis',
                                $jenis_lab,
                                '292', // Set nilai default ke 'Patologi Klinik' (ID: 292)
                                'class="form-control" id="jenis_lab" style="width: 300px;" onchange="updateTindakanLab()"'
                            ) ?>
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan-ord-laboratorium">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Keterangan</label>
                        <div class="col">
                            <input type="text" name="keterangan_order_lab" class="form-control" id="keterangan_order_lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Cito</label>
                        <div class="col-1" style="flex: 0 0 5.33333%;">
                            <input type="checkbox" name="is_cito" class="form-control" id="is_cito_lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="add_laboratorium()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-lab">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Pemeriksaan</th>
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanOrderSysmex()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="item_lab_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Item Pemeriksaan Laboratorium</h4>
            </div>
            <div class="modal-body">
                <div class="form-toolbar">
                    <div class="toolbar-left">
                        <?= form_button('', '<i class="fa fa-list"></i> Check All' ,'onclick=check_all() class="btn btn-info waves-effect"')?>
                        <?= form_button('', '<i class="fa fa-list-alt"></i> Uncheck All' ,'onclick=uncheck_all() class="btn btn-info waves-effect"')?>
                    </div>
                </div>
                <?= form_open('','id=formitemlab role=form class=form-horizontal') ?>
                <p>Check &checkmark; untuk memilih item pemeriksaan laboratorium yang akan diorder</p>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table_item_lab">
                    <thead>
                        <tr>
                            <th align="center" width="5%">No.</th>
                            <th align="center" width="85%" class="center">Item</th>
                            <th align="center" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" onclick="simpan_item_lab()"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="gds_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Entri Pemeriksaan Gula Darah Sewaktu</h4>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formgds role=form class=form-horizontal') ?>
                <div class="col-lg-12">
                    <div class="form-group tight">
                        <label class="col-lg-2 control-label">Operator</label>
                        <div class="col-lg-9">
                            <input type="text" name="dokter" class="select2-input" id="operator_gds">
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-primary" onclick="save_gds()"><i class="fa fa-check"></i> Entri</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-tambah-item-lab" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tambah-item-lab-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formtambahitem role=form class=form-horizontal') ?>
                    <input type="hidden" name="id_order" id="id-update-order"/>
                    <input type="hidden" name="tarif_tindakan" id="tarif-tambah-item"/>
                    <input type="hidden" id="hd-item-lab"/>
                    <input type="hidden" id="hd-item-lab-label"/>
                    
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan-tambah-lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Keterangan</label>
                        <div class="col">
                            <input type="text" name="keterangan_order_lab" class="form-control" id="keterangan-tambah-item">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Cito</label>
                        <div class="col-1" style="flex: 0 0 5.33333%;">
                            <input type="checkbox" name="is_cito" class="form-control" id="cito-item-lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="tambahItem()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-tambah-item-lab">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="left">Pemeriksaan</th>
                                <th class="left">Keterangan</th>
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanItemTambahan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php

    $tindakan_laboratorium = $jenis_tindakan;

    if($tindakan_laboratorium === 'Intensive Care'){

        $tind_lab = 'Rawat Inap';

    } else if($tindakan_laboratorium === 'Medical Check Up'){

        $tind_lab = 'Rawat Jalan';

    } else {

        $tind_lab = $jenis_tindakan;
    } 

?>

<script>

	$(function(){

		var KELAS_TINDAKAN = '<?= $kelas_tindakan ?>';
        var JENIS_RAWAT = '<?= $tind_lab ?>';
        
        if (JENIS_RAWAT='Medical Check Up') {
            JENIS_RAWAT='Rawat Jalan';
        }

        $('#tindakan-tambah-lab').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kelas: KELAS_TINDAKAN,
                        jenis_tindakan: JENIS_RAWAT,
                        jenis_pemeriksaan: 'Pelayanan Laboratorium',
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
            formatSelection: function(data) {
                $('#tarif-tambah-item').val(data.total);
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;

                if (data.id !== '') {
                    show_item_laboratorium(data.id_layanan);
                } else {
                    result = '';
                }
                return result;
            }
        });

        $('#dokter_rujuk').select2({
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
    	})

        $(document).ready(function () {
            // Inisialisasi dengan nilai default 'Patologi Klinik'
            const defaultJenisLab = '292'; // ID dari 'Patologi Klinik'

            // Set dropdown ke nilai default
            $('#jenis_lab').val(defaultJenisLab).trigger('change');

            // Fungsi untuk memperbarui tindakan berdasarkan jenis_lab
            updateTindakanLab();

            // Ketika jenis_lab berubah
            $('#jenis_lab').on('change', function () {
                updateTindakanLab();
            });
        });

    function updateTindakanLab() {
        const selectedJenisLab = $('#jenis_lab').val(); // Ambil nilai terpilih
        let KELAS_TINDAKAN = '<?= $kelas_tindakan ?>';
        let JENIS_RAWAT = '<?= $tind_lab ?>';

        $('#tindakan-ord-laboratorium').select2({
        ajax: {
            url: "<?= base_url('pelayanan/api/pelayanan/tarif_pelayanan') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                        q: term, //search term
                        kelas: KELAS_TINDAKAN,
                        jenis_tindakan: JENIS_RAWAT,
                        jenis_pemeriksaan: 'Pelayanan Laboratorium', // Tetap gunakan 'Pelayanan Laboratorium'
                        jenis_lab: selectedJenisLab, // Filter berdasarkan jenis_lab
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
        formatSelection: function(data) {
            $('#tarif-tindakan-lab').val(data.total);
            var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
            var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;

            if (data.id !== '') {
                show_item_laboratorium(data.id_layanan);
            } else {
                result = '';
            }
            return result;
            },
        });
    }



    function orderLAB(){
        
        klik = null;

        swal.fire({
            title: 'Order Laboratorium',
            text: "Apakah Pasien akan Order ke Laboratorium ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanOrderLAB();
            }
        })
    }

    function simpanOrderLAB() {
        var id_layanan_pendaftaran = $('#id-layanan').val();
        var stop = false;

        if (stop) {
            return false;
        };

        if (id_layanan_pendaftaran !== '') {
            if (klik === null) {
                klik =  $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/daftarLAB") ?>',
                    data: '&id_layanan='+id_layanan_pendaftaran,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                                showLoader();
                            },
                    success: function (data) {
                        var tipe = 'Success';
                            if (data.status === false) {
                                tipe = 'error';
                            }
                            messageCustom(data.message, tipe);
                            
                            get_order_lab(id_layanan_pendaftaran);
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(e){
                        
                        get_order_lab(id_layanan_pendaftaran);
                        messageCustom('Gagal order pemeriksaan laboratorium', 'Error');

                    }
                });
            }

        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
    }

    function get_order_lab(id_layanan){
        $('#req_lab').empty();
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_pendaftaran_laboratorium") ?>/id/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {

                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v){
                    
                        str = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td>'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Status Order</strong></td><td>'+v.status+'</td></tr>'+
                                    '<tr><td width="15%"><strong>ONO</strong></td><td>'+v.ono+'</td></tr>'+
                                '</table><br/><hr/>';
                            $('#req_lab').append(str);
                    });

                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }

    function request_lab(){
		let account_group  = '<?= $this->session->userdata('account_group') ?>';
        // if ($('#tindaklanjut').val() !== '' && account_group !== 'Admin' ) {
        if (($('#tindaklanjut').val() !== '') && (account_group !== 'Admin' ) && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')  ) {
            syams_validation('#tambah-lab', 'Pasien sudah pulang, tidak dapat order Laboratorium.');
            return false;
        }

        // $('#id_layanan_asal').val($('#id-layanan').val());
        $('#modal-lab-label').html('Permintaan Pemeriksaan Laboratorium');
        $('#tindakan-ord-laboratorium, #tarif-tindakan-lab').val('');
        $('#s2id_tindakan-ord-laboratorium a .select2-chosen').html('');
        $('#dokter_rujuk').val($('#dokter').val());
        $('#s2id_dokter_rujuk a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
        $('#lab_modal').modal('show');
        $('#table-lab tbody').empty();
        klik = null;
	}

    function tambahItem(){
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#cito-item-lab').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#tindakan-tambah-lab').val() === '') {
            syams_validation('#tindakan-tambah-lab', 'Pemeriksaan harus diisi!');
            stop = true;   
        };
        
        if (stop) {
            return false;
        };

        syams_validation_remove('#tindakan-tambah-lab');

        var str = '';
        var numb = $('.nomor-lab').length;
        
        var tindakan = $('#s2id_tindakan-tambah-lab a .select2-chosen').html();
        var id_tindakan = $('#tindakan-tambah-lab').val();
        var tarif = $('#tarif-tambah-item').val();
        var keterangan = $('#keterangan-tambah-item').val(); //tambahan lina
        var itemdata = $('#hd-item-lab').val();
        var itemlabel = $('#hd-item-lab-label').val();
        
        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="nomor-lab" align="center">'+ (++numb) +'</td>'+
            '<td align="left"><input type="hidden" name="tindakan_lab[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td align="left"><input type="hidden" name="keterangan[]" value="'+keterangan+'"/>'+keterangan+'</td>'+ //tambahan lina
            '<td align="center"><input type="hidden" name="item_lab_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="right"><input type="hidden" name="item_lab[]" value="'+itemdata+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button></td>'+
            '</tr>';

        $('#table-tambah-item-lab tbody').append(str);
        $('#cito-item-lab').prop('checked', false);
        $('#tindakan-tambah-lab').val('');
        $('#keterangan-tambah-item').val('');
        $('#s2id_tindakan-tambah-lab a .select2-chosen').html('');
        $('#hd-item-lab').val('');
        $('#hd-item-lab-label').val('');
    }
	
	function show_item_laboratorium(id_layanan){
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_item_laboratorium") ?>/id_layanan/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.status) {
                    if (data.data.length > 0) {
                        $('#table_item_lab tbody').empty(); var checked = '';
                        if (data.data.length === 1) {
                            checked = 'checked';
                        }; 
                        $.each(data.data,function(i, v){

                            var highlight = 'odd';
                            if ((i % 2) == 1) {
                                highlight = 'even';
                            };

                            str = '<tr class="'+highlight+'">'+
                                    '<td align="center"><b>'+(i+1)+'</b></td>'+
                                    '<td align="center">'+v.item+'</td>'+
                                    '<td align="right" class="aksi">'+
                                        '<input type="checkbox" '+checked+' name="itemdata" value="'+ v.id+'|'+v.item +'" class="check_item_lab" />';
                                    '</td>'+
                                '</tr>;'
                            $('#table_item_lab tbody').append(str);

                        });
                        if (checked === 'checked') {
                            simpan_item_lab();
                        }else{
                            $('#item_lab_modal').modal('show');    
                        }
                    }else{
                        messageCustom(data.message, 'Info');
                    }
                }else{
                    messageCustom(data.message, 'Info');
                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }
    
    function simpan_item_lab(){
        var formitemlab = $('#formitemlab').serializeArray();
        var str = '[';
        var str_label = '';
        var buf = null;
        if (formitemlab.length > 0) {
            $.each(formitemlab, function(i, v){
                buf = v.value.split('|');
                str += buf[0];
                str_label += buf[1];
                if (i < (formitemlab.length - 1)) {
                    str += ',';
                    str_label += ', ';
                };
            });
            str += ']';

            $('#hd_item_lab').val(str);
            $('#hd_item_lab_label').val(str_label);
            $('#item_lab_modal').modal('hide');
        }else{
            bootbox.dialog({
              message: "Anda belum memilih item pemeriksaan laboratorium!",
              title: "Peringatan!",
              buttons: {
                hapus: {
                  label: '<i class="fa fa-check"></i>  OK',
                  className: "btn-primary",
                  callback: function() {
                    
                  }
                }
              }
            });  
        }
    }
    
    function check_all(){
        $(".check_item_lab").each( function() {
            $(this).attr("checked",'checked');
        });
    }

    function uncheck_all(){
        $(".check_item_lab").each( function() {
            $(this).removeAttr('checked');
        });
    }
    
    function add_laboratorium(){
        
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_lab').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#jenis_lab').val() === '' | $('#jenis_lab').val() === null) {
            syams_validation('#jenis_lab', 'Jenis Lab harus diisi!');
            stop = true;   
        };

        if ($('#tindakan-ord-laboratorium').val() === '') {
            syams_validation('#tindakan-ord-laboratorium', 'Pemeriksaan harus diisi!');
            stop = true;   
        };
        
        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_tindakan_lab').length;
        
        var tindakan = $('#s2id_tindakan-ord-laboratorium a .select2-chosen').html();
        var id_tindakan = $('#tindakan-ord-laboratorium').val();
        var tarif = $('#tarif-tindakan-lab').val();
        var keterangan = $('#keterangan_order_lab').val(); //tambahan lina
        var itemdata = $('#hd_item_lab').val();
        var itemlabel = $('#hd_item_lab_label').val();
        var jenisLab = $('#jenis_lab').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="number_tindakan_lab" align="center">'+ (++numb) +'</td>'+
            '<td align="center"><input type="hidden" name="jenis_lab[]" value="'+jenisLab+'"/><input type="hidden" name="tindakan_lab[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td align="center"><input type="hidden" name="keterangan[]" value="'+keterangan+'"/>'+keterangan+'</td>'+ //tambahan lina
            '<td align="center"><input type="hidden" name="item_lab_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="center"><input type="hidden" name="item_lab[]" value="'+itemdata+'" /><input type="hidden" name="item_lab[]" class="tarif-lab" value="'+tarif+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button></td>'+
            '</tr>';

        $('#table-lab tbody').append(str);
        $('#is_cito_lab').prop('checked', false);
        $('#tindakan-ord-laboratorium').val('');
        $('#keterangan_order_lab').val('');
        $('#jenis_lab').val('');
        $('#s2id_tindakan-ord-laboratorium a .select2-chosen').html('');
        $('#hd_item_lab').val('');
        $('#hd_item_lab_label').val('');

        fetch('<?= base_url('pelayanan/api/pelayanan/check_order_tarif_lab') ?>?id_layanan=' + $('#id-layanan').val())
			.then(response => response.json())
			.then(data => {
				let tarif = 0;
				$('.tarif-lab').each(function(){
					tarif += parseInt($(this).val());
				});

				const totalTarif = data.tarif + tarif;
				if(totalTarif > 100000 && (data.penjamin === '1' || data.penjamin === '11' || data.penjamin === '16')){
					swalAlert('warning', 'Validasi', `Mohon maaf order lab telah melebihi batas`);
				}
			});
    }
    
    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
	}

    function simpanOrderSysmex() {
        let id_layanan = $('#id-layanan').val();
        let id_layanan_pendaftaran = '';
        

        if(id_layanan === undefined){

            id_layanan_pendaftaran = $('#id-layanan-pendaftaran').val();

        } else {

            id_layanan_pendaftaran = id_layanan;
        }

        var id_dokter = $('#dokter_rujuk').val();
        var stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter_rujuk', 'Dokter harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
            if (klik === null) {
                klik =  $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/postLab") ?>',
                    data: $('#formlab').serialize()+'&id_layanan='+id_layanan_pendaftaran+'&dokter='+id_dokter,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                                showLoader();
                            },
                    success: function (data) {

                        var tipe = 'Success';
                            if (data.status === false) {
                                tipe = 'Error';
                            }
                            messageCustom(data.message, tipe);
                            
                            $('input[type=checkbox]').removeAttr('checked');
                            $('#lab_modal').modal('hide');
                            get_pemeriksaan_lab(id_layanan_pendaftaran);
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(e){
                        $('#lab_modal').modal('hide');
                        get_pemeriksaan_lab(id_layanan_pendaftaran);
                        messageCustom('Gagal Posting LIS atau Gagal order pemeriksaan laboratorium', 'Error');

                    }
                });
            }

        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
    }

    function simpanItemTambahan() {
        let idLab = $('#id-update-order').val();
        var idLayananPendaftaran = $('#id-layanan').val();
        
        if(idLab === undefined){

            swalAlert('warning', 'Validasi', 'Id Lab Silakan Lapor ke IT');
            return false;

        }

        if (idLab !== '') {
            if (klik === null) {
                klik =  $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/updateOrderLab") ?>',
                    data: $('#formtambahitem').serialize()+'&id_layanan='+idLayananPendaftaran,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                                showLoader();
                            },
                    success: function (data) {

                        if (typeof data.metaData !== 'undefined') {

                            if (data.metaData.code !== 200) {

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                get_pemeriksaan_lab(idLayananPendaftaran);
                            
                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                get_pemeriksaan_lab(idLayananPendaftaran);
                                $('#modal-tambah-item-lab').modal('hide');
                                

                            }



                        }
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(e){

                        console.log(e);
                        // messageCustom('Gagal order pemeriksaan laboratorium', 'Error');

                    }
                });
            }

        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
    }

    function simpan_request_lab(){
        var id_layanan_pendaftaran = $('#id-layanan').val();
        var id_dokter = $('#dokter_rujuk').val();
        var stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter_rujuk', 'Dokter harus diisi!');
            stop = true;
        };

        if (stop) {
            return false;
        };

        if ((id_layanan_pendaftaran !== '') & (id_dokter != '')) {
            if (klik === null) {
                klik = $.ajax({
                    type : 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/order_laboratorium") ?>/',
                    data: $('#formlab').serialize()+'&id_layanan='+id_layanan_pendaftaran+'&dokter='+id_dokter,
                    cache: false,
                    dataType : 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        var tipe = 'Success';
                        if (data.status === false) {
                            tipe = 'error';
                        }
                        messageCustom(data.message, tipe);
                        
                        $('input[type=checkbox]').removeAttr('checked');
                        $('#lab_modal').modal('hide');
                        get_pemeriksaan_lab(id_layanan_pendaftaran);
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e){
                        messageCustom('Gagal order pemeriksaan laboratorium', 'Error');
                    }
                });
            }       
        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
        
    }
    
    function get_pemeriksaan_lab(id_layanan){
        $('#req_lab').empty();
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_laboratorium_detail") ?>/id/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    var tambahItemLab = '';

                    $.each(data, function(i, v){

                        if (v.waktu_hasil === null) {
                        };

                        var statusLis = v.status_lab;

                        let getLis = '';
                        let postLis = '';
                        let getOno = '';
                        let viewOno = '';
                        let viewPostLIS = '';

                        if(statusLis === undefined)
                        {
                            getLis = '';
                            postLis = '';
                            viewOno = '';
                            viewPostLIS = '';

                        } else if(statusLis !== '201')
                        {
                            getLis = 'Gagal';
                            postLis = '';
                            viewPostLIS = '<td width="15%"></td><td width="40%">'+postLis+'</td><td width="40%"></td width="5%"><td></td>';
                            getOno = v.ono;

                            if((v.status_lab !== null && v.status_lab !== '') && (v.status === 'konfirm' | (v.tindak_lanjut !== null && v.tindak_lanjut !== ''))){

                                if(v.tindak_lanjut !== null && v.tindak_lanjut !== ''){

                                    viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Pasien Sudah Checkout</td><td width="5%"></td></tr>';

                                } else {

                                    viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Sudah Konfirmasi</td><td width="5%"></td></tr>';

                                }

                            } else if((v.status_lab === null | v.status_lab === '') && (v.status === 'konfirm' | (v.tindak_lanjut !== null && v.tindak_lanjut !== ''))){

                                if(v.tindak_lanjut !== null && v.tindak_lanjut !== ''){

                                    viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Pasien Sudah Checkout</td><td width="5%"></td></tr>';

                                } else {

                                    viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Sudah Konfirmasi</td><td width="5%"></td></tr>';

                                }

                            } else {

                                tambahItemLab = `<button type="button" class="btn btn-secondary btn-xs" title="Tombol untuk menambah item Lab" onclick="formTambahItemLab(` + v.id + `)"><i class="fas fa-edit mr-1"></i>Tambah Item Lab</button>`;
                                viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">'+tambahItemLab+'</td><td width="5%"></td></tr>';

                            }

                        } else if(statusLis === '201'){

                            getLis = 'Berhasil';
                            postLis = '';
                            viewPostLIS = '<td width="15%"></td><td width="40%">'+postLis+'</td><td width="40%"></td><td width="5%"></td>';
                            getOno = v.ono;
                            if(v.status === 'konfirm'){

                                viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Sudah Bridging dan Dikonfirmasi</td><td width="5%"></td></tr>';

                            } else {

                                viewOno = '<tr><td width="15%"><strong>ONO</strong></td><td width="40%">'+getOno+'</td><td width="40%">Sudah Bridging LIS</td><td width="5%"></td></tr>';
                            }

                        } else {

                            getLis = '';
                            postLis = '';
                            viewOno = '';
                            viewLis = '';
                            viewPostLIS = '';

                        }

                        str = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td width="40%">'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td width="40%"><td></td><td width="5%"></td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td width="40%">'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td><td width="40%"></td><td width="5%"></td></tr>'+
                                    '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td width="40%">'+v.dokter+'</td><td width="40%"></td><td width="5%"></td></tr>'+
                                    '<tr><td width="15%"><strong>Analis Laboratorium</strong></td><td width="40%">'+v.analis_lab+'</td><td width="40%"></td><td width="5%"></td></tr>'+
                                    viewOno+
                                    '</tr>'+
                                    '<tr>'+
                                        viewPostLIS
                                    '</tr>'+
                                  '</table>';
                            $('#req_lab').append(str);

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
                                str += '<tr>'+
                                    '<td></td>'+
                                    '<td>'+z.layanan_lab+'</td>'+
                                    '<td>'+z.konfirmasi+'</td>'+
                                    '<td align="center">'+hapus+'</td>'+
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_lab').append(str);
                    });

                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }

    function formTambahItemLab(idOrder){
        let account_group  = '<?= $this->session->userdata('account_group') ?>';
        // if ($('#tindaklanjut').val() !== '' && account_group !== 'Admin' ) {
        if (($('#tindaklanjut').val() !== '') && (account_group !== 'Admin' ) && ($('#tindaklanjut').val() !== 'cco sementara') && ($('#tindaklanjut').val() !== 'cco sementara it') && ($('#tindaklanjut').val() !== 'cco sementara billing')  ) {
            syams_validation('#tambah-lab', 'Pasien sudah pulang, tidak dapat order Laboratorium.');
            return false;
        }

        $('#modal-tambah-item-lab-label').html('Permintaan Pemeriksaan Laboratorium');
        $('#tindakan-tambah-lab, #tarif-tambah-item').val('');
        $('#id-update-order').val(idOrder);
        $('#s2id_tindakan-tambah-lab a .select2-chosen').html('');
        $('#modal-tambah-item-lab').modal('show');
        
        klik = null;
        

        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_detail_order_laboratorium") ?>/id/' + idOrder,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (data.item_pemeriksaan.length > 0) {
                    let totalBiaya = 0;
                    let renum = 0;
                    let totalNominal = 0;
                    $('#table-tambah-item-lab tbody').empty();
                    let html = '';
                    $.each(data.item_pemeriksaan, function(i, v) {
                        if (v.cito === 'ya') {
                            if (v.kelas === 'III') {
                                renum = 25;
                            } else {
                                renum = 20;
                            }

                            totalBiaya = ((renum / 100) * parseFloat(v.total)) + parseInt(v.total);
                        } else {
                            totalBiaya = v.total;
                        }

                        html = /* html */ `
                            <tr>
                                <td class="center">
                                    ${i + 1}
                                    <input type="hidden" name="tindakan_lab[]" value="${v.id}">
                                </td>
                                <td>${v.layanan}</td>
                                <td><input type="hidden" name="keterangan[]" value="${v.keterangan}">${v.keterangan}</td>
                                <td class="center">
                                    <input type="hidden" name="item_lab[]" value="${JSON.stringify(v.item_lab)}"><input type="hidden" name="item_lab_label[]" value="${v.item_lab_label}">
                                </td>
                                <td class="right">${numberToCurrency(totalBiaya)}</td>
                                <td class="center">
                                    <input type="hidden" name="cito[]" value="${v.cito}">${((v.cito == 'ya') ? '&checkmark;' : '')}
                                </td>
                                <td class="right"></td>
                            </tr>
                        `;

                        totalNominal += parseInt(totalBiaya);
                        $('#table-tambah-item-lab tbody').append(html);
                    });


                    $('.mypopover').popover({html: true, trigger: 'hover'});

                }

            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

    }

    function postingUlangLIS(id_lab, id_layanan) {
        if (id_lab !== '') {
            
            $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/postUlangLIS") ?>',
                    data: 'id_order_lab='+id_lab+'&id_layanan='+id_layanan,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                                showLoader();
                            },
                    success: function (data) {
                        var tipe = 'Success';
                            if (data.status === false) {
                                tipe = 'Error';
                            }
                            messageCustom(data.message, tipe);
                            
                            $('input[type=checkbox]').removeAttr('checked');
                            $('#lab_modal').modal('hide');
                            get_pemeriksaan_lab(id_layanan);
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(data){
                        let tipe = 'Error';
                        messageCustom(data.message, tipe);
                    }
                });
            
        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
    }
</script>