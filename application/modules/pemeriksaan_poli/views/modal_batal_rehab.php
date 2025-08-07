<!-- Modal Tindak lanjut -->
<div id="modal-batal-rehab" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-batal-rehab-label">Edit Total Program Terapi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-batal-total role=form class=form-horizontal') ?>
                <input type="hidden" name="rhm_id_kunjungan" id="rhm-get-rehab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Program Terapi:</label>
                            <div class="col">
                                <div id="form-edit-rehab">

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                
                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-edit-rehab">
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tindak lanjut -->

<?php $this->load->view('pemeriksaan_poli/js') ?>