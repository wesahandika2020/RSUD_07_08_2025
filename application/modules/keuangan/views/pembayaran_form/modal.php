<?php $this->load->view('keuangan/pembayaran_form/js') ?>

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

<div id="modal-pembayaran" class="modal fade">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><b>Form Pembayaran</b></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" style="min-height:450px">
				<?= form_open('', 'id=form-pembayaran class=form-horizontal role=form') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
				<input type="hidden" name="thebill" id="thebill">

				<div class="row">
					<div class="col-lg-5">
						<table class="table table-striped table-sm color-table info-table">
							<thead>
								<tr>
									<th colspan="7" class="center"><i class="fas fa-user mr-1"></i>Data Pasien</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="16%">No. RM</td>
									<td width="1%">:</td>
									<td width="20%"><strong><span id="no-rm-detail"></span></strong></td>
									<td width="10%"></td>
									<td width="16%">Nama</td>
									<td width="1%">:</td>
									<td width="30%"><strong><span id="nama-detail"></span></strong></td>
								</tr>
								<tr>
									<td>No. Register</td>
									<td>:</td>
									<td><strong><span id="no-register-detail"></span></strong></td>
									<td></td>
									<td>Kelamin</td>
									<td>:</td>
									<td><strong><span id="kelamin-detail"></span></strong></td>
								</tr>
								<tr>
									<td>Cara Bayar</td>
									<td>:</td>
									<td><strong><span id="cara-bayar-detail"></span></strong></td>
									<td></td>
									<td>No.Telp</td>
									<td>:</td>
									<td><strong><span id="telp-detail"></span></strong></td>
								</tr>
							</tbody>
						</table>
						<div class="row">
							<div class="col-lg-12 mb-n3">
								<div class="form-group row">
									<label class="col-md-4 col-form-label right"></label>
									<div class="col-md-8 right">
										<button type="button" class="btn btn-info btn-xs" onclick="refreshDataTagihan()"><i class="fas fa-sync-alt mr-1"></i>Update Data Tagihan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12" id="group-deposit">
								<h4>Deposit</h4>
								<input type="hidden" name="id_pasien" id="id-pasien">
								<input type="hidden" name="nominal_deposit" id="nominal-deposit">
								<div class="form-group row tight">
									<label class="col-md-4 col-form-label right">Sisa Deposit</label>
									<div class="input-group-mixing col-md-8">
										<div class="input-group-mixing-prepend">Rp.</div>
										<input type="text" id="detail-deposit" class="form-control" disabled>
									</div>
								</div>
								<div class="form-group row tight">
									<label class="col-md-4 col-form-label right"></label>
									<div class="col-md-8">
										<div class="custom-control custom-checkbox m-t-5 m-b-5">
											<input type="checkbox" name="pakai_deposit" class="custom-control-input" value="ya" id="pakai-deposit">
											<label class="custom-control-label" for="pakai-deposit"><i>Pakai Deposit</i></label>
										</div>
									</div>
								</div>
								<div class="form-group row tight nominal-deposit">
									<label class="col-md-4 col-form-label right">Nominal</label>
									<div class="input-group-mixing col-md-8">
										<div class="input-group-mixing-prepend">Rp.</div>
										<input type="text" name="bayar_deposit" class="form-control" id="bayar-deposit" onkeyup="convertToCurrency(this)">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<h4>Pembayaran</h4>
								<div class="form-group row tight">
									<label class="col-md-4 col-form-label right">Transaksi</label>
									<div class="col-md-8">
										<?= form_dropdown('transaksi', $transaksi, array(($layanan === 'Rawat Inap' ? $layanan : '')), 'class="form-control validate-input" id="transaksi"') ?>
									</div>
								</div>
								<div class="form-group row tight metode-pembayaran">
									<label class="col-md-4 col-form-label right">Metode Pembayaran</label>
									<div class="col-md-8">
										<?= form_dropdown('metode_pembayaran', $metode_pembayaran, array('4'), 'class="form-control validate-input" id="metode-pembayaran"') ?>
									</div>
								</div>
								<div class="form-group row tight pembayaran-piutang">
									<div class="col-md-4"></div>
									<div class="col-md-8">
										<div class="custom-control custom-checkbox mr-sm-2 mb-3">
											<input type="hidden" class="custom-control-input" name="is_piutang" id="piutang-pasien">
											<input type="checkbox" class="custom-control-input" id="cek-piutang-pasien">
											<label class="custom-control-label" for="cek-piutang-pasien">Pasien Piutang</label>
										</div>
									</div>
								</div>
								
								<!-- is-perbaikan-waktu -->
								<div class="form-group row tight perbaikan-waktu">
									<div class="col-md-4"></div>
									<div class="col-md-8">
										<div class="custom-control custom-checkbox mr-sm-2 mb-3">
											<input type="checkbox" class="custom-control-input" name="perbaikan_waktu" value="0" id="perbaikan-waktu">
											<label class="custom-control-label" for="perbaikan-waktu">Is Perbaikan Waktu Bayar</label>
										</div>
									</div>
								</div>
								<div class="form-group row tight waktu-perbaikan" style="display:none">
									<label class="col-md-4 col-form-label right">Waktu Perbaikan</label>
									<div class="col-md-8">
										<input type="text" name="waktu_perbaikan" id="waktu-perbaikan" class="form-control validate-input">
									</div>
								</div>
								
								<div class="form-group row tight no-transaksi-metode" style="display:none">
									<label class="col-md-4 col-form-label right">No. Referensi/Kartu</label>
									<div class="col-md-8">
										<input type="text" name="no_transaksi_metode" id="no-transaksi-metode" class="form-control validate-input">
									</div>
								</div>
								<hr>
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
								<div class="form-group row tight">
									<label class="col-md-4 col-form-label right">Ditanggung Penjamin</label>
									<div class="input-group-mixing col-md-8">
										<div class="input-group-mixing-prepend">Rp.</div>
										<input type="text" name="reimburse" class="form-control" id="reimburse" onkeyup="convertToCurrency(this)">
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
								<!-- <div class="form-group row tight">
									<label class="col-md-4 col-form-label right">Terima Dari</label>
									<div class="col-md-8">
										<input type="text" name="diterima_dari" id="diterima-dari" class="form-control">
									</div>
								</div> -->
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
					</div>
					<div class="col-lg-7">
						<h3 style="font-weight:500" class="mb-3"><i class="fas fa-fw fa-th-list mr-1"></i>Detail Rincian Tagihan</h3>
						<div id="detail-area" class="scroll-area" style="height:510px"></div>
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

<div id="modal-history-pembayaran" class="modal fade">
	<div class="modal-dialog" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-fw fa-info mr-1"></i>Data History Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" style="min-height:200px">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<div id="history-pembayaran-content"></div>
						</div>
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
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_register_search" class="col-3 col-form-label">No. Register</label>
                    <div class="col">
                        <input type="text" name="no_register" id="no-register-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
                    <div class="col">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nik_search" class="col-3 col-form-label">NIK</label>
                    <div class="col">
                        <input type="text" name="nik" id="nik-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama_search" class="col-3 col-form-label">Nama</label>
                    <div class="col">
                        <input type="text" name="nama" id="nama-search" class="form-control">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status_search" class="col-3 col-form-label">Status</label>
                    <div class="col">
						<select name="status_bayar" id="status-search" class="form-control">
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