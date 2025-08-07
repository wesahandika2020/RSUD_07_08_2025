<!-- Modal Penjualan Non Resep -->
<div id="modal-penjualan" class="modal fade" data-backdrop="static" style="padding: 0 10px">
    <div class="modal-dialog" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-penjualan-label">Form Penjualan Non Resep / Langsung</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'id=form-penjualan role=form class=form-horizontal') ?>
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-6">
							<table width="100%">
								<tr>
									<td width="20%"><b>Tanggal</b></td>
									<td width="1%">:</td>
									<td width="79%">
										<input type="hidden" name="tanggal_penjualan" id="tanggal-penjualan" value="<?php echo date('Y-m-d') ?>">
										<div class="input-groupc" style="float:left">
											<input type="text" id="tanggal" class="custom-form" value="<?php echo date('d/m/Y') ?>" disabled style="width:100px">
											<span class="input-groupc-addon" style="margin-left:2px"><i class="fas fa-calendar"></i></span>
										</div>
										<input type="text" id="unit-label" class="custom-form" value="<?php echo $this->session->userdata('unit') ?>" disabled style="width:200px;margin-top:2px;font-style:oblique;">
									</td>
								</tr>
								<tr>
									<td><b>Nama Barang</b></td>
									<td>:</td>
									<td>
										<input type="text" name="barang" id="barang-auto" class="select2c-input" placeholder="Pilih Barang..." style="width:335px">
									</td>
								</tr>
								<tr>
									<td><b>Kemasan</b></td>
									<td>:</td>
									<td>
										<select name="kemasan" id="kemasan" class="custom-form" style="width:335px">
											<option value="">Pilih ...</option>
											<?php //foreach ($satuan_kekuatan as $data) { echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td><b>Jumlah</b></td>
									<td>:</td>
									<td>
										<input type="text" name="jumlah" id="jumlah" class="custom-form" style="width:335px" placeholder="Jumlah..." onkeypress="return hanyaAngka(event)">
									</td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table width="100%">
								<tr>
									<td width="30%"><b>No. RM, <small><i>Pilih jika pasien</i></small></b></td>
									<td width="1%">:</td>
									<td width="69%">
										<input type="text" name="no_rm" id="no-rm-auto" class="select2c-input" placeholder="Pilih Pasien..." style="width:335px">
									</td>
								</tr>
								<tr>
									<td><b>Nama Pasien</b></td>
									<td>:</td>
									<td>
										<input type="text" name="pembeli" id="pembeli" class="custom-form" placeholder="Nama Pembeli..." style="width:335px">
									</td>
								</tr>
								<tr>
									<td><b>Jasa Farmasi</b></td>
									<td>:</td>
									<td>
										<input type="text" name="jasa_farmasi" id="jasa-farmasi" class="custom-form" style="width:335px" placeholder="Jasa Farmasi..." onkeypress="return hanyaAngka(event)" onblur="FormNum(this); hitungEstimasi();">
									</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td><button type="button" class="btn btn-info btn-xs" id="add"><i class="fas fa-plus-circle mr-1"></i>Tambahkan</button></td>
								</tr>
							</table>
						</div>
						<div class="col-md-12 mt-2">
							<table width="100%" class="table table-sm table-stripped table-hover color-table info-table" id="table-list" cellpadding="0" cellspacing="0">
								<thead>
									<tr>
										<th width="3%">No.</th>
										<th width="34%" class="left">Nama Barang</th>
										<th width="10%">Satuan</th>
										<th width="10%">Jumlah</th>
										<th width="10%" class="right">Harga Jual</th>
										<th width="10%">Diskon (%)</th>
										<th width="10%">Diskon (Rp)</th>
										<th width="10%" class="right">SubTotal</th>
										<th width="3%"></th>
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<tr>
										<th colspan="7" class="right">Grand Total</th>
										<th class="right">
											<span id="estimasi" style="font-size:16px">0</span>
											<input type="hidden" name="total" id="total">
										</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPenjualan()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Penjualan Non Resep -->

<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <input name="tampilkan" type="hidden" id="tampilkan" value="Perfaktur">
                <div class="form-group row">
                    <label for="awal" class="col-md-3 col-form-label">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="no-rm-search" class="col-md-3 col-form-label">No. RM / Pasien</label>
                    <div class="col-md-9">
                        <input type="text" name="no_rm" id="no-rm-search" class="select2-input" placeholder="Pilih Pasien...">
                    </div>
				</div>
				<div class="form-group row">
                    <label for="pembeli-search" class="col-md-3 col-form-label">Nama Pembeli</label>
                    <div class="col-md-9">
                       <input type="text" name="pembeli" id="pembeli-search" class="form-control" placeholder="Nama Pembeli...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-md-3 col-form-label">Barang</label>
                    <div class="col-md-9">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPenjualan(1, '')"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->