<div id="modal_search" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?= form_open('', 'id=form_search role=form class=form-horizontal') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tanggal</label>
                    <div class="col-lg-9">
                        <input type="text" name="tanggal_awal" value="<?= date('1/m/Y') ?>" class="form-control" id="tanggal_awal" placeholder="Tanggal Awal" style="width:145px; float:left; margin-right:10px;">
                        <input type="text" name="tanggal_akhir" value="<?= date('d/m/Y') ?>" class="form-control" id="tanggal_akhir" placeholder="Tanggal Akhir" style="width:145px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">No. Register</label>
                    <div class="col">
                        <input type="text" name="no_register" class="form-control" id="no_register_search" value="" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" class="form-control" id="no_rm_search" value="" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" class="form-control" id="nama_search" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Keterangan</label>
                    <div class="col">
                        <?= form_dropdown('keterangan', $keterangan, array(), 'class="form-control" id=keterangan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Layanan</label>
                    <div class="col">
                        <?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'class="form-control" id=jenis_layanan') ?>
                    </div>
                </div>

                <div class="form-group klinik_area lay_area">
                    <label class="col-lg-3 control-label">Klinik</label>
                    <div class="col">
                        <input type="text" name="klinik" class="select2-input" id="klinik">
                    </div>
                </div>

                <div class="form-group ranap_area lay_area">
                    <label class="col-lg-3 control-label">Bangsal</label>
                    <div class="col">
                        <input type="text" name="bangsal" class="select2-input" id="bangsal_auto">
                    </div>
                </div>

                <?php
                $jenis_igd[''] = 'Pilih';
                ?>
                <div class="form-group igd_area lay_area">
                    <label class="col-lg-3 control-label">Jenis IGD</label>
                    <div class="col">
                        <?= form_dropdown('jenis_igd', $jenis_igd, array(), 'class="form-control mousetrap validate_input" id=jenis_igd') ?>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-refresh"></i> Keluar</button>
                <button type="button" onclick="getListAdminLogs(1)" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
            </div>
            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->