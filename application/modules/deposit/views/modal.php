<div class="modal fade" id="modal-deposit">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:80%;">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Tambah Deposit</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6">
						<?= form_open('', 'id=form-deposit role=form class=form-horizontal') ?>
							<div class="form-group row tight">
								<label class="col-form-label col-lg-4 right">No. RM / Pasien</label>
								<div class="col-lg-8">
									<input type="text" name="no_rm" id="no-rm" class="select2-input validasi">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-form-label col-lg-4 right mt-2">Sisa Deposit</label>
								<div class="col-lg-8">
									<span id="sisa-deposit-detail" style="font-size:30px"></span>
									<input type="hidden" name="sisa_deposit" id="sisa-deposit">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-form-label col-lg-4 right">Jenis Transaksi</label>
								<div class="col-lg-8">
									<?= form_dropdown('jenis_transaksi', $jenis_transaksi, array(), 'id=jenis-transaksi class="form-control validasi" required') ?>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">Jumlah</label>
								<div class="input-group-mixing col-md-8">
									<div class="input-group-mixing-prepend">Rp.</div>
									<input type="text" name="total" class="form-control validasi" id="total" onkeyup="convertToCurrency(this)" placeholder="Jumlah" required>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-form-label col-lg-4 right">Keterangan</label>
								<div class="col-lg-8">
									<textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Keterangan"></textarea>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-form-label col-lg-4 right"></label>
								<div class="col-lg-8">
									<button type="button" class="btn btn-info" onclick="simpanDeposit()"><i class="fas fa-fw fa-plus-circle mr-1"></i>Simpan</button>
								</div>
							</div>
						<?= form_close() ?>
					</div>
					<div class="col-lg-6">
						<table class="table table-sm table-striped noborder">
							<tr>
								<td class="noborder" width="30%"><strong>No. RM</strong></td>
								<td class="noborder" width="70%"><span class="detail-pasien" id="norm-detail"></span></td>
							</tr>
							<tr>
								<td class="noborder"><strong>Nama</strong></td>
								<td class="noborder"><span class="detail-pasien" id="nama-detail"></span></td>
							</tr>
							<tr>
								<td class="noborder"><strong>Alamat</strong></td>
								<td class="noborder"><span class="detail-pasien" id="alamat-detail"></span></td>
							</tr>
							<tr>
								<td class="noborder"><strong>Kelamin</strong></td>
								<td class="noborder"><span class="detail-pasien" id="kelamin-detail"></span></td>
							</tr>
							<tr>
								<td class="noborder"><strong>Umur/Tgl. Lahir</strong></td>
								<td class="noborder"><span class="detail-pasien" id="umur-detail"></span></td>
							</tr>
						</table>
					</div>
					<hr>
					<div class="col-lg-12">
						<div id="deposit-content"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 600px">
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
                        <input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no-rm-search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama-search" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-search" class="form-control">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDeposit(1)"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->