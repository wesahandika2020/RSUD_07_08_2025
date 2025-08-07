<!-- Modal Batal Pendaftaran Rajal -->
<div id="modal-batal-pendaftaran-poli" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Pendaftaran Poli</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-pendaftaran-poli'); ?>
				<div class="form-group tight">
					<input type="hidden" name="id" id="id">
                    <label class="col col-form-label">Keterangan Pembatalan</label>
                    <div class="col-lg-12">
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan pembatalan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanPendaftranPoli()"><i class="fas fa-check-circle mr-1"></i>Batalkan Pendaftaran</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Pendaftaran Rajal  -->