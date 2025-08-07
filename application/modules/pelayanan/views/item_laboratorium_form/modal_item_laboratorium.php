<script>
    var JENIS_TINDAKAN = '';
    var KELAS_TINDAKAN = '';
    $(function(){
        $('#tindakan-laboratorium').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kelas: KELAS_TINDAKAN,
                        jenis_pemeriksaan: 'Pelayanan Laboratorium',
                        jenis_tindakan: JENIS_TINDAKAN, 
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
                $('#tarif-tindakan-laboratorium').val(data.total);
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;
                
                if (data.id !== '') {
                    showItemLaboratorium(data.id_layanan);
                }else{
                    result = '';
                }
                return result;
            }
        });
    });


    function checkAll(){
        $(".check-item-lab").each( function() {
            $(this).attr("checked",'checked');
        });
    }

    function uncheckAll(){
        $(".check-item-lab").each( function() {
            $(this).removeAttr('checked');
        });
    }

    function showItemLaboratorium(id_layanan){
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_item_laboratorium") ?>/id_layanan/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.status) {
                    if (data.data.length > 0) {
                        $('#table-item-lab tbody').empty(); var checked = '';
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
                                        '<input type="checkbox" '+checked+' name="itemdata" value="'+ v.id+'|'+v.item +'" class="check-item-lab" />';
                                    '</td>'+
                                '</tr>;'
                            $('#table-item-lab tbody').append(str);

                        });
                        if (checked === 'checked') {
                            simpanItemLab();
                        }else{
                            $('#modal-item-laboratorium').modal('show');    
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

    function simpanItemLab(){
        var formitemlab = $('#form-item-lab').serializeArray();
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

            $('#hd-item-lab').val(str);
            $('#hd-item-lab-label').val(str_label);
            $('#modal-item-laboratorium').modal('hide');
        }else{
            swalAlert('warning', 'Peringatan', 'Anda belum memilih item pemeriksaan laboratorium!');
        }
    }

    function tambahRequestLaboratorium() {
        $('#modal-laboratorium').modal('show');
        $('#tindakan-laboratorium, #tarif-tindakan-laboratorium').val('');
        $('#s2id_tindakan-laboratorium a .select2-chosen').html('');
        $('#table-laboratorium tbody').empty();
    }

    function addLaboratorium(){
        
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is-cito-lab').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#tindakan-laboratorium').val() === '') {
            syams_validation('#tindakan-laboratorium', 'Pemeriksaan harus diisi!');
            stop = true;   
        };
        
        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number-tindakan-laboratorium').length;
        
        var tindakan = $('#s2id_tindakan-laboratorium a .select2-chosen').html();
        var id_tindakan = $('#tindakan-laboratorium').val();
        var tarif = $('#tarif-tindakan-laboratorium').val();
        var itemdata = $('#hd-item-lab').val();
        var itemlabel = $('#hd-item-lab-label').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="number-tindakan-laboratorium" align="center">'+ (++numb) +'</td>'+
            '<td><input type="hidden" name="tindakan_laboratorium[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td><input type="hidden" name="item_laboratorium_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="right"><input type="hidden" name="item_laboratorium[]" value="'+itemdata+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapusList(this);"><i class="fas fa-trash-alt"></i></button>'+
            '</tr>';

        $('#table-laboratorium tbody').append(str);
        $('#is-cito-lab').prop('checked', false);
        $('#tindakan-laboratorium').val('');
        $('#s2id_tindakan-laboratorium a .select2-chosen').html('');
        $('#hd-item-lab').val('');
        $('#hd-item-lab-label').val('');
    }

    function hapusList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function konfirmasiSimpanItemLaboratorium() {
        let id_laboratorium = $('#id-laboratorium').val();
        if (id_laboratorium === '') {
            messageCustom('Terjadi kesalah pada aplikasi', 'Error');
        } else {
            Swal.fire({
                title: 'Konfirmasi',
                html: "Apakah anda yakin ingin menambah item laboratorium ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanItemLaboratorium(id_laboratorium);
                }
            })
        }
    }

    function simpanItemLaboratorium(id_laboratorium) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/simpan_item_pemeriksaan_laboratorium") ?>',
            data: $('#form-lab').serialize() + '&id_laboratorium=' + id_laboratorium,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let statusTransaction = 'Error';
                if (data.status === true) {
                    statusTransaction = 'Success';
                }

                messageCustom(data.message, statusTransaction);
                $('input[type=checkbox]').prop('checked', false);
                $('#modal-laboratorium').modal('hide');
                getRequestLaboratorium(id_laboratorium);
            }, 
            error: function(e) {
                messageCustom('Gagal tambah item pemeriksaan laboratorium', 'Error');
            }
        })
    }
</script>

<div id="modal-laboratorium" class="modal fade">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Item Pemeriksaan Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-lab role=form class=form-horizontal') ?>
                <input type="hidden" name="tarif_tindakan" id="tarif-tindakan-laboratorium"/>
                <input type="hidden" id="hd-item-lab"/>
                <input type="hidden" id="hd-item-lab-label"/>

                <div class="form-group row tight">
                    <label class="col-2 col-form-label">Pemeriksaan</label>
                    <div class="col">
                        <input type="text" name="tindakan" class="select2-input" id="tindakan-laboratorium">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-2 col-form-label">Cito</label>
                    <div class="col-1" style="flex: 0 0 5.33333%;">
                        <input type="checkbox" name="is_cito" class="form-control" id="is-cito-lab">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-2 col-form-label"></label>
                    <div class="col">
                        <button type="button" class="btn btn-info" onclick="addLaboratorium()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                    </div>
                </div>
                <table width="100%" class="table table-hover table-striped table-sm color-table info-table" id="table-laboratorium" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="40%" class="left">Pemeriksaan</th>
                        <th width="35%" class="left">Item</th>
                        <th width="15%" class="right">Tarif</th>
                        <th width="5%" class="right">Cito</th>
                        <th width="5%" class="right"></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanItemLaboratorium()"><i class="fas fa-plus-circle"></i> Entri</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-item-laboratorium" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Item Pemeriksaan Laboratorium</h4>
            </div>
            <div class="modal-body">
                <div class="form-toolbar">
                    <div class="toolbar-left">
                        <?= form_button('', '<i class="fa fa-list"></i> Check All' ,'onclick=checkAll() class="btn btn-info waves-effect"')?>
                        <?= form_button('', '<i class="fa fa-list-alt"></i> Uncheck All' ,'onclick=uncheckAll() class="btn btn-info waves-effect"')?>
                    </div>
                </div>
                <?= form_open('','id=form-item-lab role=form class=form-horizontal') ?>
                <p>Check &checkmark; untuk memilih item pemeriksaan laboratorium yang akan diorder</p>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table-item-lab">
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanItemLab()"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->