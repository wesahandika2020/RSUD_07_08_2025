<!-- Modal Edit Status Pasien -->
<div id="modal_edit_status_pasien" class="modal fade" role="dialog" aria-labelledby="modal_edit_status_pasien_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_status_pasien_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" class="col-lg-12" style="padding: 1.5rem 2rem 1.5rem 2rem">
                <?= form_open('','id=form_edit_status_pasien role=form class=form-horizontal') ?> <!-- hidden -->
                    <input type="hidden" name="id_pendaftaran_wa"  id="id-pendaftaran-wa">
                    <input type="hidden" name="id_pasien"  id="id-pasien">
                    
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" >No KTP  </label>                          
                        <label class="col-lg-10 col-form-label" id="noktp-detail"></label>   

                        <label class="col-lg-2 col-form-label" >Nama  </label>                       
                        <label class="col-lg-10 col-form-label" id="nama-detail"></label>   

                        <label class="col-lg-2 col-form-label" >Status  </label>                       
                        <label class="col-lg-10 col-form-label" id="status-detail"></label>   
                    </div>
                    
                    <hr>

                    <div class="form-group row">

                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <?= form_dropdown('jenis_kasus', array('' => 'Pilih', 'Baru' => 'Baru', 'Lama' => 'Lama'), array(), 'id=jenis-kasus class=custom-form') ?>
                        </div>

                        <label class="col-md-2 col-form-label">Pilih Pasien</label>
                        <div class="col-md-10">
                            <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien...">
                        </div>

                        <label class="col-md-2 col-form-label"></label>
                        <label class="col-md-10 col-form-label" id="note-pilihan"></label>


                    </div>
                   
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanEditStatus()"><i class="fas fa-save mr-1"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Status Pasien -->