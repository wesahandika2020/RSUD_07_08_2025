<!-- Modal Search -->
<div id="modal_search" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 35%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_search'); ?>
                <input type="hidden" name="id" id="id_search">
                <div class="form-group row tight">
                    <label for="no_rm" class="col col-form-label">No. RM</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no_rm_search" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nik" class="col col-form-label">NIK</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nik" onkeypress="return hanyaAngka(event)" id="nik_search" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama" class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama_search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kelamin" class="col col-form-label">Jenis Kelamin</label>
                    <div class="col-9">
                        <?= form_dropdown('kelamin', $kelamin, array(), 'class="custom-select col-5" id=$kelamin_search') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Umur</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="umur" onkeypress="return hanyaAngka(event)" id="umur_search" placeholder="Umur">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Telepon</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="telp" onkeypress="return hanyaAngka(event)" id="telp_search" maxlength="13" placeholder="Telepon">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">No BPJS</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="nobpjs" onkeypress="return hanyaAngka(event)" id="nobpjs_search" maxlength="13" placeholder="No BPJS">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="text" class="col col-form-label">Status</label>
                    <div class="col-9">
                        <?= form_dropdown('status', ['' => 'Pilih Status', 'Hidup' => 'Hidup', 'Meninggal' => 'Meninggal'], array(), 'class="custom-select col-5" id=status_search') ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataPasien(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->