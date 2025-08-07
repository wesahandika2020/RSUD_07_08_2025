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