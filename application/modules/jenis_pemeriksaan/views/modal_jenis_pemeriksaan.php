<!-- Modal Jenis Pemeriksaan -->
<div id="modal_jenis_pemeriksaan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_jenis_pemeriksaan_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_jenis_pemeriksaan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_jenis_pemeriksaan'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group tight">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Jenis Pemeriksaan">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataJenisPemeriksaan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Jenis Pemeriksaan -->