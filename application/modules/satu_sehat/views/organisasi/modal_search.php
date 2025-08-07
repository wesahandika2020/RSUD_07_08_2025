<!-- Modal Search Sudah Integrasi Pasien -->
<div id="modal-search-org" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-org-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-org role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-organisasi-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="organisasi" class="col-3 col-form-label">Organisasi</label>
                    <div class="col">
                        <input type="text" name="id_organisasi" id="induk-organisasi" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataOrganisasi()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Pasien -->

<!-- Modal Layanan -->
<div id="modal-organisasi" class="modal fade" role="dialog" aria-labelledby="modal_organisasi_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-organisasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-tambah-organisasi role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id"/>

                <div class="form-group row tight edit_hide">
                    <label for="pilih_induk" class="col col-form-label">Sub Induk Organisasi</label>
                    <div class="col-9">
                        <input type="text" name="id_induk" id="pilih-induk" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="pilih_induk_organisasi" class="col col-form-label">Induk Organisasi</label>
                    <div class="col-9">
                        <input type="text" name="id_induk_organisasi" id="pilih-induk-organisasi" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col-3 col-form-label">Nama Organisasi</label>
                    <div class="col-6">
                        <input type="text" name="nama_organisasi" class="form-control" id="nama-organisasi" placeholder="Nama Organisasi">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanOrganisasi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->

<!-- Modal Layanan -->
<div id="modal-edit-organisasi" class="modal fade" role="dialog" aria-labelledby="modal_edit_organisasi_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-organisasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-edit-organisasi role=form class=form-horizontal') ?>
                <input name="id_organisasi" type="hidden" id="id-organisasi"/>

                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col-3 col-form-label">Nama Organisasi</label>
                    <div class="col-6">
                        <input type="text" name="nama_organisasi" class="form-control" id="nama-edit-organisasi" placeholder="Nama Organisasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status_aktif" class="col-3 col-form-label">Status Aktif</label>
                    <div class="col-6">
                        <?= form_dropdown('status_aktif', $organisasi, array(), 'class="custom-select reset-select" id=status-aktif') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditOrganisasi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->
