<!-- Modal Instalasi -->
<div id="modal_instalasi" class="modal fade" role="dialog" aria-labelledby="modal_instalasi_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_instalasi_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=forminstalasi'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group tight">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Instalasi">
                </div>
                <div class="form-group tight">
                    <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode Instalasi">
                </div>
                <div class="form-group tight">
                    <input type="text" name="id_pegawai" id="kepala_instalasi" class="select2-input">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataInstalasi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Instalasi -->