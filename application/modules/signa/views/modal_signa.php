<!-- Modal Signa Obat -->
<div id="modal_signa" class="modal fade" role="dialog" aria-labelledby="modal_signa_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_signa_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_signa'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="signa" class="col-3 col-form-label">Aturan Pakai Obat</label>
                    <div class="col">
                        <input class="form-control" type="text" name="signa" id="signa" placeholder="Aturan Pakai Obat">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="keterangan" class="col-3 col-form-label">Keterangan</label>
                    <div class="col">
                        <textarea class="form-control" type="text" name="keterangan" id="keterangan" placeholder="Deskripsi Aturan Pakai"></textarea>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="jml_pemberian" class="col-3 col-form-label">Jumlah Pemberian</label>
                    <div class="col">
                        <input class="form-control" type="number" min="0" name="jml_pemberian" id="jml_pemberian" placeholder="Jumlah Pemberian Obat Selama 1 Hari">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dosis_pemberian" class="col-3 col-form-label">Dosis Pemberian</label>
                    <div class="col">
                        <input class="form-control" type="number" min="0" pattern="[0-9]+([\.,][0-9]+)?" step="0.001" name="dosis_pemberian" id="dosis_pemberian" placeholder="Dosis Pemberian Obat Dalam Sekali Waktu">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataSignaObat()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Signa Obat -->