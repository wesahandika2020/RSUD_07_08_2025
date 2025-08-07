<!-- Modal Search Sudah Integrasi Lokasi -->
<div id="modal-search-lokasi" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label-lokasi"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search-lokasi role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-organisasi-search" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataLokasi()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Sudah Integrasi Lokasi -->

<!-- Modal Search Kirim Integrasi Lokasi -->
<div id="modal-lokasi" class="modal fade" role="dialog" aria-labelledby="modal_lokasi_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-lokasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-tambah-lokasi role=form class=form-horizontal') ?>
               <input name="nama_tabel" type="hidden" id="nama-tabel"/>

                <div class="form-group row tight edit_hide">
                    <label for="pilih_induk_organisasi" class="col col-form-label">Induk Organisasi</label>
                    <div class="col-9">
                        <input type="text" name="id_induk_organisasi" id="pilih-lokasi-induk-organisasi" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="pilih_induk" class="col col-form-label">Sub Induk Organisasi</label>
                    <div class="col-9">
                        <input type="text" name="id_induk" id="pilih-organisasi-lokasi" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight edit_hide">
                    <label for="pilih_lokasi" class="col col-form-label">Sub Lokasi</label>
                    <div class="col-9">
                        <input type="text" name="id_lokasi" id="pilih-lokasi" class="select2-input">
                    </div>
                </div>
                 <div class="form-group row tight">
                    <label for="nama_lokasi" class="col col-form-label">Nama Lokasi</label>
                    <div class="col-9">
                        <input type="text" name="nama_lokasi" class="form-control" id="nama-lokasi" placeholder="Nama Lokasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="tipe_fisik" class="col col-form-label">Tipe Fisik</label>
                    <div class="col-9">
                        <input type="text" name="tipe_fisik" id="tipe-fisik" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col col-form-label">Kategori</label>
                    <div class="col-9">
                        <input type="text" name="kategori" id="kategori" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="lokasi_sistem" class="col col-form-label">Lokasi SIMRS</label>
                    <div class="col-9">
                        <input type="text" name="lokasi_sistem" id="lokasi-sistem" class="select2-input">
                    </div>
                </div> 
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanLokasi()"><i class="fas fa-plus-circle"></i> Tambah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Kirim Integrasi Lokasi -->

<!-- Modal Edit Lokasi -->
<div id="modal-edit-lokasi" class="modal fade" role="dialog" aria-labelledby="modal_edit_lokasi_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-lokasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-edit-lokasi role=form class=form-horizontal') ?>
                <input name="id_lokasi" type="hidden" id="id-lokasi"/>

                <div class="form-group row tight">
                    <label for="nama_organisasi" class="col-3 col-form-label">Nama Lokasi</label>
                    <div class="col-6">
                        <input type="text" name="nama_lokasi" class="form-control" id="nama-edit-lokasi" placeholder="Nama Lokasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status_aktif" class="col-3 col-form-label">Status Aktif</label>
                    <div class="col-6">
                        <?= form_dropdown('status_aktif', $lokasi, array(), 'class="custom-select reset-select" id=status-lokasi-aktif') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditLokasi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Lokasi -->
