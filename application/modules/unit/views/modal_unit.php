<!-- Modal Unit -->
<div id="modal_unit" class="modal fade" role="dialog" aria-labelledby="modal_unit_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:600px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_unit_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formunit'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama"  id="nama" placeholder="Nama unit">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode" class="col col-form-label">Kode</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="kode"  id="kode" placeholder="Kode unit">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="acc" class="col col-form-label">Akronim</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="acc"  id="acc" placeholder="Akronim">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="isfarmasi" class="col col-form-label">Unit Farmasi</label>
                    <div class="col-9">
                        <?= form_dropdown('isfarmasi', ['0' => 'Tidak', '1' => 'Ya'], array(), 'class="custom-select col-5" id=isfarmasi') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="instalasi" class="col col-form-label">Instalasi</label>
                    <div class="col-9">
                        <input type="text" name="id_instalasi" id="instalasi" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status" class="col col-form-label">Status</label>
                    <div class="col-9">
                        <?= form_dropdown('status', ['1' => 'Aktif', '0' => 'Tidak Aktif'], array(), 'class="custom-select col-5" id=status') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataUnit()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Unit -->