<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <input type="hidden" name="id" id="id">
                <div class="form-group row">
                    <label for="awal" class="col-3 col-form-label right">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('01/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori-barang-search" class="col-3 col-form-label right">Kategori Barang</label>
                    <div class="col">
						<select name="kategori_barang" id="kategori-barang-search" class="form-control">
							<option value="">Semua ...</option>
							<?php foreach ($kategori_barang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
						</select>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-3 col-form-label right">Barang</label>
                    <div class="col">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="transaksi-search" class="col-3 col-form-label right">Nama Transaksi</label>
                    <div class="col">
						<?= form_dropdown('transaksi', $transaksi, array(), 'id=transaksi-search class=form-control') ?>
                    </div>
				</div>
				<div class="form-group row">
                    <label for="unit-search" class="col-3 col-form-label right">Unit</label>
                    <div class="col">
                        <input type="text" name="unit" id="unit-search" class="select2-input" placeholder="Pilih Unit...">
                    </div>
				</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListStok(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->