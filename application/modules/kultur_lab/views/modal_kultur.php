<!-- Modal Kultur -->
<div id="modal_kultur" class="modal fade" role="dialog" aria-labelledby="modal_kultur_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_kultur_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_kultur'); ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nama"  id="nama" placeholder="Nama kultur">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode" class="col col-form-label">Kode</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="kode"  id="kode" placeholder="Kode kultur">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="grup" class="col col-form-label">Grup</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="grup"  id="grup" placeholder="Grup kultur">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kode_lis" class="col col-form-label">Kode Lis</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="kode_lis"  id="kode_lis" placeholder="Kode LIS">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Jenis</label>
                    <div class="col-9">
                        <?= form_dropdown('jenis', ['Antibiotic' => 'Antibiotic', 'Organism' => 'Organism'], array(), 'class="custom-select col-5" id=jenis') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDatakultur()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kultur -->