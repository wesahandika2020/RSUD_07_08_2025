<!-- Modal Kamar -->
<div id="modal-kamar" class="modal fade" role="dialog" aria-labelledby="modal-kamar-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kamar-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-kamar'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="bangsal" class="col col-form-label">Bangsal</label>
                    <div class="col-9">
                        <input class="select2-input" type="text" name="bangsal" id="bangsal" placeholder="Pilih Bangsal">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kelas" class="col col-form-label">Kelas</label>
                    <div class="col-9">
                        <?= form_dropdown('kelas', $kelas, array(), 'class=form-control id=kelas') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode-kelas-bed" class="col col-form-label">Kode Kelas BPJS</label>
                    <div class="col-9">
                        <?= form_dropdown('kode_kelas_bed', $kode_kelas_bed, array(), 'class=form-control id=kode-kelas-bed') ?>
                    </div>
                </div>
                <div class="form-group row tight no-kamar">
                    <label for="no-kamar" class="col col-form-label">No Kamar</label>
                    <div class="col-9">
                        <input class="form-control" type="number" min="1" name="no_kamar" id="no-kamar">
                    </div>
                </div>
                <div class="form-group row tight jml-kamar">
                    <label for="jumlah-kamar" class="col col-form-label">Jumlah Kamar</label>
                    <div class="col-9">
                        <input class="form-control" type="number" min="1" value="1" name="jumlah_kamar" id="jumlah-kamar">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="keterangan" class="col col-form-label">Keterangan</label>
                    <div class="col-9">
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataKamar()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kamar -->