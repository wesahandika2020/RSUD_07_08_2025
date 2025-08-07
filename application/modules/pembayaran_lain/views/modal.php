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

<div class="modal fade" id="modal-pembayaran-lain">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:75%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Pembayaran Lain</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-pembayaran-lain class=form-horizontal role=form') ?>
				<input type="hidden" name="nominal" class="form-control" id="nominal" onkeyup="convertToCurrency(this)">
				<input type="hidden" name="id_pendaftaran" class="form-control" id="id-pendaftaran">
				<input type="hidden" name="id_layanan_pendaftaran" class="form-control" id="id-layanan-pendaftaran">
				<input type="hidden" name="nama" class="form-control" id="nama">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row tight attr-tarif">
							<label for="nama" class="col-form-label col-md-3 right">Item tarif</label>
							<div class="col-md-9">
								<input hidden type="text" name="tarif" id="tarif" class="select2-input" placeholder="Pilih Tarif">
							</div>
						</div>
						<div class="form-group row tight attr-tarif-manual">
							<label for="nama" class="col-form-label col-md-3 right">Item tarif</label>
							<div class="col-md-9">
								<input type="text" name="tarif_manual" id="tarif-manual" class="form-control validasi" placeholder="Masukan Item Tarif manual">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-form-label col-md-3 right"></label>
							<div class="col-md-9">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="is_manual" id="is-manual">
									<label class="custom-control-label sm" for="is-manual"><span class="col-form-label">Item Tarif Manual</span></label>
								</div>
							</div>
						</div>
						<div class="form-group row tight">
							<label for="nama" class="col-form-label col-md-3 right">Pasien</label>
							<div class="col-md-9">
								<input type="text" name="search_pasien" id="search-pasien" class="select2-input" placeholder="Cari Pasien">
							</div>
						</div>
						<!-- <div class="form-group row tight">
							<label for="nama" class="col-form-label col-md-3 right">Nama</label>
							<div class="col-md-9">
								<input type="text" name="nama" id="nama" class="form-control validasi" placeholder="Nama Pembayar">
							</div>
						</div> -->
						<div class="form-group row tight">
							<label for="nama" class="col-form-label col-md-3 right">Jumlah</label>
							<div class="col-md-9">
								<input type="number" name="jumlah" id="jumlah" value="1" min="1" max="100000" class="form-control validasi" placeholder="Jumlah">
							</div>
						</div>
						<div class="form-group row tight">
							<label for="nama" class="col-form-label col-md-3 right">Satuan</label>
							<div class="col-md-9">
								<?= form_dropdown('satuan', $satuan, array(), 'id=satuan class="form-control validasi"') ?>
							</div>
						</div>
						<div class="form-group row tight">
							<label for="nama" class="col-form-label col-md-3 right">Keterangan</label>
							<div class="col-md-9">
								<textarea name="keterangan" id="keterangan" rows="3" class="form-control validasi" placeholder="Keterangan"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row tight metode-pembayaran">
							<label class="col-md-4 col-form-label right">Metode Pembayaran</label>
							<div class="col-md-8">
								<?= form_dropdown('metode_pembayaran', $metode_pembayaran, array('4'), 'class="form-control validate-input" id="metode-pembayaran"') ?>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-md-4 col-form-label right">Total Bayar</label>
							<div class="input-group-mixing col-md-8">
								<div class="input-group-mixing-prepend">Rp.</div>
								<input type="text" name="bayar" class="form-control validasi" id="bayar" onkeyup="convertToCurrency(this)">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-md-4 col-form-label right">Pembulatan</label>
							<div class="input-group-mixing col-md-8">
								<div class="input-group-mixing-prepend">Rp.</div>
								<input type="text" name="pembulatan" class="form-control validasi" id="pembulatan">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-md-4 col-form-label right">Jumlah Uang Diterima</label>
							<div class="input-group-mixing col-md-8">
								<div class="input-group-mixing-prepend">Rp.</div>
								<input type="text" name="serah" class="form-control validasi" id="serah" onkeyup="convertToCurrency(this)">
							</div>
						</div>
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
				<button type="button" class="btn btn-info" onclick="simpanPembayaranLain()"><i class="fas fa-paper-plane mr-1"></i>Konfirmasi Bayar</button>
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
					<label for="tanggal-awal" class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="" placeholder="dd/mm/yyyy">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no-kwitansi-search" class="col-3 col-form-label">No. Kwitansi</label>
					<div class="col">
						<input type="text" name="no_kwitansi" id="no-kwitansi-search" class="form-control" placeholder="No. Kwitansi">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nama-search" class="col-3 col-form-label">Nama</label>
					<div class="col">
						<input type="text" name="nama" id="nama-search" class="form-control" placeholder="Nama Pembayar">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="tarif-search" class="col-3 col-form-label">Tarif</label>
					<div class="col">
						<input type="text" name="tarif" id="tarif-search" class="select2-input" placeholder="Pilih Tarif">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListPembayaranLain(1, '')"><i class="fas fa-search"></i> Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->