<div id="lab_modal" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-lab-label" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-lab-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formlab role=form class=form-horizontal') ?>
                    <input type="hidden" name="tarif_tindakan" id="tarif_tindakan_lab"/>
                    <input type="hidden" name="id_layanan_asal" id="id_layanan_asal"/>
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
                            '298' => 'Mikrobiologi'
                        );
                    ?>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Jenis</label>
                        <div class="col">
                            <?= form_dropdown('jenis', $jenis_lab, array(), 'class="form-control" id=jenis_lab style="width: 300px;"') ?>
                        </div>  
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan_laboratorium">
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpan_request_lab()"><i class="fas fa-save"></i> Simpan</button>
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                <button type="button" class="btn btn-primary" onclick="save_gds()"><i class="fa fa-check"></i> Entri</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->