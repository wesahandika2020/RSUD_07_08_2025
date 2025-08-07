<!-- Modal Search Pendaftaran Poliklinik -->
<div id="modal_search_pendaftaran" class="modal fade" role="dialog" aria-labelledby="modal_search_pendaftaran_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_pendaftaran_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search_pendaftaran role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id_layanan_search" />
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_register_search" class="col-3 col-form-label">No. Register</label>
                    <div class="col">
                        <input type="text" name="no_register" id="no_register_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no_rm_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nik_search" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_search" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="tanggal_lahir_search" class="col-3 col-form-label">Tanggal lahir</label>
                    <div class="col">
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="alamat_search" class="col-3 col-form-label">Alamat</label>
                    <div class="col">
                        <textarea name="alamat" id="alamat_search" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <!--<div class="form-group row tight">
                    <label for="carabayar_search" class="col-3 col-form-label">Cara Bayar</label>
                    <div class="col">
                        <input type="text" name="carabayar" id="carabayar_search" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row tight">
                    <label for="penjamin-search" class="col-3 col-form-label">Penjamin</label>
                    <div class="col">
                        <input type="text" name="penjamin_search" id="penjamin-search" class="select2-input">
                    </div>
                </div>
				<div class="form-group row tight">
                    <label for="carabayar_search" class="col-3 col-form-label">Status Dilayani</label>
                    <div class="col">
                        <select name="status_dilayani" class="form-control" id="status_dilayani_search">
                            <option value="">Pilih Status Dilayani</option>
                            <option value="Belum">Belum</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Batal">Batal</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="user_search_igd" class="col-3 col-form-label">Petugas</label>
                    <div class="col">
                        <input type="text" name="user" id="user_search_igd" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariDataPendaftaran()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Pendaftaran Poliklinik -->