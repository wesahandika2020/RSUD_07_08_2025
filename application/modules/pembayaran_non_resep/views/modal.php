<div id="modal-unit-kasir" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Setting Unit Kasir</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-unit-kasir class=form-horizontal role=form') ?>
				<input type="hidden" name="id_pembayaran" id="id-pembayaran">
				<div class="form-group">
					<label class="col-lg-12 control-label"><em>Silahkan pilih posisi unit kasir anda sekarang</em></label>
					<div class="col-lg-12">
						<?= form_dropdown('unit_kasir', $unit_kasir, array(), 'class="form-control" id=unit-kasir') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="simpanUnitKasir()"><i class="fas fa-check-circle mr-1"></i>Set</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="pembeli-search" class="col-3 col-form-label">Nama Pembeli</label>
                    <div class="col">
                        <input type="text" name="pembeli" id="pembeli-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status-search" class="col-3 col-form-label">Status</label>
                    <div class="col">
						<select name="status" id="status-search" class="form-control">
							<option value="">Pilih</option>
							<option value="Belum">Belum Lunas</option>
							<option value="Sudah">Lunas</option>
						</select>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPembayaran(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<div id="modal-pembayaran" class="modal fade">
	<div class="modal-dialog" style="max-width:40%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Pembayaran Penjualan Non Resep</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-pembayaran class=form-horizontal role=form') ?>
				<input type="hidden" name="id_penjualan" id="id-penjualan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-md-4 col-form-label right mt-2">Sisa Tagihan</label>
                            <div class="col-md-8">
                                <div style="font-size:30px">Rp. <span id="nominal-detail"></span></div>
                            </div>
                            <input type="hidden" name="nominal" id="nominal">
                        </div>
                        <div class="form-group row tight">
                            <label class="col-md-4 col-form-label right">Total Bayar</label>
                            <div class="input-group-mixing col-md-8">
                                <div class="input-group-mixing-prepend">Rp.</div>
                                <input type="text" name="bayar" class="form-control" id="bayar" onkeyup="convertToCurrency(this)">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row tight">
                            <label class="col-md-4 col-form-label right">Jumlah Uang Diterima</label>
                            <div class="input-group-mixing col-md-8">
                                <div class="input-group-mixing-prepend">Rp.</div>
                                <input type="text" name="serah" class="form-control validate-input" id="serah" onkeyup="convertToCurrency(this)">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row tight">
                            <label class="col-md-4 col-form-label right mt-2">Jumlah Uang Kembalian</label>
                            <div class="col-md-8">
                                <div style="font-size:30px">Rp. <span id="kembalian-detail"></span></div>
                            </div>
                            <input type="hidden" name="kembalian" id="kembalian">
                        </div>
                    </div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanPembayaran()" id="simpan-pembayaran"><i class="fas fa-check-circle mr-1"></i>Bayar</button>
			</div>
		</div>
	</div>
</div>