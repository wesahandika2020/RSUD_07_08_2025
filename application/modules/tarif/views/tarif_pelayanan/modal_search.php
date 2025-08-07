<!-- Modal Search Tarif Pelayanan -->
<div id="modal_search_tarif_pelayanan" class="modal fade" role="dialog" aria-labelledby="modal_search_tarif_pelayanan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_tarif_pelayanan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_search_tarif_pelayanan role=form class=form-horizontal') ?>
                <input name="id" type="hidden" id="id_layanan_search" />
                <div class="form-group row tight">
                    <label for="nama_search" class="col-3 col-form-label">Nama Layanan</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama_search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="layanan_auto_search" class="col-3 col-form-label">Layanan</label>
                    <div class="col">
                        <input type="text" name="layanan" id="layanan_auto_search" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="jenis_pemeriksaan_auto_search" class="col-3 col-form-label">Jenis Pemeriksaan</label>
                    <div class="col">
                        <input type="text" name="jenis_pemeriksaan" id="jenis_pemeriksaan_auto_search" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="instalasi_auto_search" class="col-3 col-form-label">Instalasi</label>
                    <div class="col">
                        <input type="text" name="instalasi" id="instalasi_auto_search" class="select2-input">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="kelas_search" class="col-3 col-form-label">Kelas</label>
                    <div class="col">
                        <?= form_dropdown('kelas', $kelas, array(), 'class=custom-select id=kelas_search') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="jenis_search" class="col-3 col-form-label">Jenis</label>
                    <div class="col">
                        <?= form_dropdown('jenis', $jenis, array(), 'class=custom-select id=jenis_search') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListTarifPelayanan(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search Tarif Pelayanan -->