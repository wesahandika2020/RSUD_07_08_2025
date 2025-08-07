<!-- Modal Inform Consent Pasien -->
<div id="modal-consent" class="modal fade" role="dialog" aria-labelledby="modal-consent" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Consent Satu Sehat Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_consent role=form class=form-horizontal') ?>
                <input type="hidden" name="id_consent" id="id-consent" />
                <input type="hidden" name="page_consent" id="page-consent" />

                <div class="form-group row">
                    <div class="col-9">
                        <input type="checkbox" name="check_consent" id="check-consent" value="1" class="mr-1">Saya menjamin bahwa pasien sudah membaca dan menandatangani consent pembukaan data dari SATUSEHAT
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanConsent()"><i class="fas fa-check"></i> Konfirmasi</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Penjamin Pasien -->

<?php $this->load->view('js'); ?>
<?php $this->load->view('consent/js'); ?>