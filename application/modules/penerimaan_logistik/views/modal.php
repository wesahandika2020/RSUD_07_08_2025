<div class="modal fade" id="modal-penerimaan" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:99%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-penerimaan-title"></h5>
					<h6 class="modal-title text-muted" id="modal-sub-penerimaan-title"><small>(Pembelian Ke Supplier)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-penerimaan-inventori class=form-horizontal role=form') ?>
					<input type="hidden" name="jenis">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table width="100%" cellspacing="0" cellpadding="0" style="vertical-align:top !important" class="table table-sm">
									<tbody>
										<tr>
											<!-- Data Utama Form -->
											<td width="33%"> 
												<input type="hidden" name="id" id="id">
												<table width="100%" cellspacing="0" class="table table-striped table-sm mb-0">
													<tr>
														<td>Tanggal</td>
														<td>:</td>
														<td>
															<input type="text" name="tanggal" id="tanggal" class="custom-form" style="width:300px">
														</td>
													</tr>
													<tr>
														<td>Penerimaan</td>
														<td>:</td>
														<td>
															<?= form_dropdown('jenis_penerimaan', $jenis_penerimaan, array(), 'id=jenis-penerimaan class="custom-form" style="width:300px"') ?>
														</td>
													</tr>
													<tr>
														<td>Nama Penyedia</td>
														<td>:</td>
														<td>
															<input type="text" name="pabrik" id="pabrik-auto" class="select2c-input" placeholder="Pilih Penyedia..." style="width:300px">
														</td>
													</tr>
													<tr>
														<td>Sumber Anggaran</td>
														<td>:</td>
														<td>
															<?= form_dropdown('pembayaran', $pembayaran, array(), 'id=pembayaran class="custom-form" style="width:300px"') ?>
														</td>
													</tr>
												</table>
											</td>
											<td width="33%">
												<table width="100%" cellspacing="0" class="table table-striped table-sm mb-0">
													<tr>
														<td width="25%">No. Faktur</td>
														<td width="1%">:</td>
														<td width="74%">
															<input type="text" name="no_faktur" id="no-faktur" class="custom-form" style="width:300px" placeholder="No. Faktur...">
														</td>
													</tr>
													<tr>
														<td>Jatuh Tempo</td>
														<td>:</td>
														<td>
															<input type="text" name="jatuh_tempo" id="jatuh-tempo" class="custom-form" style="width:300px" value="">
														</td>
													</tr>
													<tr>
														<td>Jenis Barang</td>
														<td >:</td>
														<td >
															<select name="kategori_barang" id="kategori-barang" class="custom-form" style="width:300px">
																<?php foreach ($kategori_barang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
															</select>
														</td>
													</tr>
													<tr>
														<td>Keterangan</td>
														<td>:</td>
														<td>
															<input type="text" name="keterangan" id="keterangan" class="custom-form" style="width:300px" placeholder="Keterangan...">
														</td>
													</tr>
													<!-- <tr><td colspan="3">&nbsp;</td></tr> -->
												</table>
											</td>
											<td width="33%">
												<table width="100%" cellspacing="0" class="table table-striped table-sm mb-0">
													<tr>
														<td width="25%">Nama Barang</td>
														<td width="1%">:</td>
														<td width="74%">
															<input type="text" name="barang" id="barang-auto" class="select2c-input" placeholder="Pilih Barang..." style="width:300px">
														</td>
													</tr>
													<tr>
														<td>Kemasan</td>
														<td>:</td>
														<td>
															<select name="kemasan" id="kemasan" class="custom-form" style="width: 300px;">
																<option value="">Pilih ...</option>
																<?php //foreach ($satuan_kekuatan as $data) { echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; } ?>
															</select>
														</td>
													</tr>
													<tr>
														<td>Jumlah</td>
														<td>:</td>
														<td>
															<input type="text" name="jumlah" id="jumlah" class="custom-form" style="width:300px" placeholder="Jumlah..." onkeypress="return hanyaAngka(event)">
														</td>
													</tr>
													<!-- <tr><td colspan="3">&nbsp;</td></tr> -->
												</table>
											</td>
										</tr>
										<tr>
											<td colspan="3" class="right"><button class="btn btn-info btn-xxs" id="add" type="button"><i class="fas fa-arrow-circle-down mr-1"></i>Tambahkan Data</button></td>
										</tr>
									</tbody>
								</table>
								<table class="table table-hover table-striped table-sm color-table info-table" id="table-penerimaan" cellspacing="0" cellpadding="0">
									<thead>
										<tr>
											<th width="2%" class="center">No.</th>
											<th width="15%" class="left">Nama Barang</th>
											<th width="5%" class="center">Pembayaran</th>
											<th width="15%" class="left">Keterangan</th>
											<th width="8%" class="center">Satuan</th>
											<th width="7%" class="left">No Batch</th>
											<th width="8%" class="left">Expired</th>
											<th width="5%" class="left">Jumlah</th>
											<th width="10%" class="left">Harga @</th>
											<th width="7%" class="left">Disc Rp.</th>
											<th width="5%" class="left">Disc %</th>
											<th width="10%" class="left">SubTotal</th>
											<th width="3%"></th>
										</tr>
									</thead>
									<tbody></tbody>
									<tfoot>
										<tr>
											<td colspan="9" class="right">TOTAL</td>
											<td class="right" id="total-awal" style="font-weight:bold"></td>
											<td></td>
										</tr>
									</tfoot>
								</table>
								<table width="100%">
									<td width="33%"></td>
									<td width="33%"></td>
									<td width="33%">
										<table width="100%" cellspacing="0" class="table table-striped table-sm mb-0">
											<tr>
												<td width="25%">Diskon</td>
												<td width="1%">:</td>
												<td width="74%">
													<div class="input-groupc" style="width: 160px; float: left;">
														<span class="input-groupc-addon">%</span>
														<?= form_input('disc_pr', NULL, 'id=disc-pr style="width: 120px;" readonly class="custom-form" onkeyup="hitungTotal()"') ?>
													</div>
													<div class="input-groupc">
														<span class="input-groupc-addon">Rp</span>
														<?= form_input('disc_rp', NULL, 'id=disc-rp style="width: 120px;" readonly class="custom-form" onkeyup="hitungTotal()"') ?>
													</div>
												</td>
											</tr>
											<tr>
												<td>PPN</td>
												<td>:</td>
												<td>
													<div class="input-groupc">
														<span class="input-groupc-addon">%</span>
														<?= form_input('ppn', NULL, 'id=ppn maxlength="5" onblur="FormNum(this)" onkeyup="hitungTotal()" onkeypress="return hanyaAngka(event)" class="custom-form"  style="width: 280px"') ?>
													</div>
												</td>
											</tr>
											<tr>
												<td>Sub Total</td>
												<td >:</td>
												<td >
													<div class="input-groupc">
														<span class="input-groupc-addon">Rp</span>
														<?= form_input('total', NULL, 'id=total class="custom-form" readonly style="width: 280px"') ?>
													</div>
												</td>
											</tr>
											<tr>
												<td>Grand Total</td>
												<td>:</td>
												<td>
													<div class="input-groupc">
														<span class="input-groupc-addon">Rp</span>
														<?= form_input('', NULL, 'id="total-plus-ppn" class="custom-form" readonly style="width: 280px"') ?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</table>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanPenerimaan()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('inventori_rt/penerimaan/js') ?>