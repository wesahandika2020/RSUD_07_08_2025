<!-- Modal Permintaan Logistik -->
<div id="modal-permintaan-logistik" class="modal fade" style="padding: 0 10px">
    <div class="modal-dialog" style="max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-permintaan-logistik-label">Form Permintaan Logistik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	<?php date_default_timezone_set('Asia/Jakarta'); ?>
				<?= form_open('', 'id=form-permintaan-logistik role=form class=form-horizontal') ?>
					<input type="hidden" name="id" id="id">
					<input type="hidden" name="kategori" id="kategori">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-striped table-sm">
								<tr>
									<td width="29%">Daftar Barang Logistik</td>
									<td width="1%">:</td>
									<td width="70%"><b><?= $this->session->userdata('unit') ?></b></td>
								</tr>
								<tr>
									<td>Kategori Barang</td>
									<td>:</td>
									<td>
										<select id="kategori-minta" class="custom-form">
											<option value="">Kategori Pencarian...</option>
											<?php foreach ($kategori_barang as $data) { echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Pencarian Barang</td>
									<td>:</td>
									<td><input type="text" class="custom-form" id="pencarian-logistik" placeholder="Ketikkan nama barang yang dicari..."></td>
								</tr>
							</table>
							<div class="table-responsive">
								<table id="table-logistik-unit" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th width="3%" class="center">No.</th>
											<th width="55%" class="left">Nama Barang</th>
											<th width="20%" class="right">Sisa (Inc ED)</th>
											<th width="18%" class="left">Satuan</th>
											<th width="5%"></th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
							<div id="bu-pagination" class="float-left"></div>
							<div id="bu-summary" class="float-right text-sm"></div>
						</div>
						<div class="col-md-6">
							<table class="table table-striped table-sm">
								<tr>
									<td width="29%">Permintaan Ke Logistik</td>
									<td width="1%">:</td>
									<td width="70%">
										<select id="unit" name="unit" class="custom-form">
											<option value="<?php echo $unit->id; ?>">Bagian Umum</option>
											<!-- <!?php foreach ($unit as $data) { echo '<option value="'.$data->id.'" selected>'.$data->nama.'</option>'; }?> -->
										</select>
									</td>
								</tr>
								<tr>
									<td>Tanggal Permintaan</td>
									<td>:</td>
									<td>
										<input type="text" name="tanggal_permintaan" id="tanggal-permintaan" class="custom-form" value="<?= date('d/m/Y') ?>">
										<input type="hidden" name="tanggal_permintaan_hide" id="tanggal-permintaan-hide">
									</td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
							</table>
							<div class="table-responsive">
								<table id="table-logistik-order" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th width="3%" class="center">No.</th>
											<th width="47%" class="left">Nama Barang</th>
											<th width="20%" class="left">Sisa Di <small id="unit-tujuan"></small></th>
											<th width="10%" class="center">Satuan</th>
											<th width="10%" class="center">Jumlah</th>
											<th width="5%"></th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPermintaanLogistik()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Permintaan Logistik -->

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
                <div class="form-group row">
                    <label for="awal" class="col-md-3 col-form-label right">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" autocomplete="off" id="tanggal-awal" class="form-control" value="<?= date('01/m/Y') ?>">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" autocomplete="off" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-md-3 col-form-label right">Barang</label>
                    <div class="col-md-9">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPermintaanLogistik(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->