<!-- Modal Item Laboratorium -->
<div id="modal-item-laboratorium" class="modal fade">
    <div class="modal-dialog" style="max-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Item Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-item-laboratorium'); ?>
                <input type="hidden" name="id_layanan" id="id-layanan">
                <div class="form-group row tight">
                    <label class="col col-form-label">Item</label>
                    <div class="col-9">
                        <input type="text" name="item" id="item" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label"></label>
                    <div class="col-9">
                        <button type="button" class="btn btn-info" onclick="addItem()"><i class="fas fa-plus-circle mr-1"></i>Tambah</button>
                    </div>
                </div>
                <table class="table table-hover table-striped table-sm color-table info-table mt-3" id="table-item">
                    <thead>
                        <tr>
                            <th width="10%" class="center">No.</th>
                            <th width="80%">Item</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close(); ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataItemLaboratorium()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Item Laboratorium -->

<div id="nilai_modal" class="modal fade">
    <div class="modal-dialog" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Nilai Normal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formnormal role=form class=form-horizontal') ?>
                <input name="id_item_laboratorium" type="hidden" id="id_item_laboratorium"/>
                <div class="form-group row tight">
                    <label for="satuan" class="col-2 col-form-label">Satuan</label>
                    <div class="col-10">
                      <input type="text" name="satuan" class="select2-input" id="satuan">
                    </div>
                </div>
                <hr/>
                <h4>Nilai Normal</h4>
                <hr/>
                <div class="form-group row tight">
                    <label class="col-2 col-form-label">Kategori</label>
                    <div class="col-10">                
                        <?= form_dropdown('kategori_input', $kategori, array(), 'id=kategori class=custom-select') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-2 col-form-label">Rule</label>
                    <div class="col-2">
                      <input type="text" name="awal_input" value="" class="form-control" id="awal" placeholder="Nilai Awal">
                    </div>
                    <div class="col-4">
                        <?= form_dropdown('operator_input', $operator, array(), 'id=operator class=custom-select') ?>
                    </div>
                    <div class="col-2">
                      <input type="text" name="akhir_input" value="" class="form-control" id="akhir" placeholder="Nilai Akhir">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-10">
                       <button type="button" class="btn btn-info" onclick="add_rule()"><i class="fas fa-plus-circle mr-1"></i>Tambah Rule</button>
                    </div>
                </div>
                
                <table class="table table-hover table-striped table-sm color-table info-table mt-3" id="table-rule">  
                    <thead>
                        <tr>
                            <th width="5%" class="center">No.</th>
                            <th width="35%" class="center">Kategori</th>
                            <th width="20%" class="center">Nilai Awal</th>
                            <th width="20%" align="center">Operator</th>
                            <th width="20%" align="center">Nilai Akhir</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>                                    
                    </tbody>
                </table>       

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="save_data_normal()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="edit_item_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Item Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formedititem role=form class=form-horizontal') ?>
                <input name="id_item" type="hidden" id="id_item"/>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Item</label>
                    <div class="col-lg-12">
                      <input type="text" name="item" value="" class="form-control" id="item_edit">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kode LIS</label>
                    <div class="col-lg-12">
                      <input type="text" name="kode_lis" value="" class="form-control" id="kode_lis">
                    </div>
                </div>       
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info" onclick="edit_item_save()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->