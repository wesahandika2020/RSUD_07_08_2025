<input type="hidden" id="jenis-form-resep">
<!-- Modal Form Resep -->
<div id="modal-form-resep" class="modal bounceInLeft animated" data-backdrop="static" role="dialog">
	<div class="modal-dialog" style="max-width:98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-form-resep-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-add-resep role=form class=form-horizontal') ?>
				<input type="hidden" name="asal_input_resep">
				<input type="hidden" id="id-layanan-pendaftaran-for-resep">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- Nav Tabs -->
							<ul class="nav nav-tabs" id="resep-tab" role="tablist">
								<li class="nav-item" id="form-resep">
									<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
										<span class="hidden-sm-up"><i class="fas fa-tablets"></i></span>
										<span class="hidden-xs-down">Form Input Resep</span>
									</a>
								</li>
								<li class="nav-item" id="data-resep">
									<a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
										<span class="hidden-sm-up"><i class="fas fa-table"></i></span>
										<span class="hidden-xs-down">Data History Resep</span>
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content tabcontent-border">
								<div class="tab-pane p-20 active" id="tab1" role="tabpanel">
									<table width="100%" cellspacing="0" class="table-no-border">
										<tr valign="top">
											<td width="40%" style="border-right:1px solid #DEE2E6; padding-right:20px">
												<!-- Data Form Input Resep -->
												<div class="alert alert-info" id="info-resep">
													<strong>Info!</strong> Pasien terakhir mendapatkan resep <b id="tanggal-resep-last"></b>. Klik <u id="klikdisini" style="color:#000; cursor:pointer;">disini</u>
													untuk melihat.
												</div>

												<input type="hidden" name="id" id="id">
												<input type="hidden" name="id_pk" id="id-pk">
												<input type="hidden" name="pasien" id="pasienhide">
												<input type="hidden" id="id-penjamin-pasien">
												<input type="hidden" id="harga-jual-barang">
												<input type="hidden" name="id_penunjang" id="id-penunjang">
												<input type="hidden" name="jenis_penunjang" id="jenis-penunjang">
												<input type="hidden" id="sisa-stok">
												<input type="hidden" id="id-sediaan">

												<table width="100%" class="table table-striped table-hover table-sm" cellspacing="0">
													<tbody>
														<tr valign="top">
															<td width="29%"><b>Waktu Sekarang</b></td>
															<td width="1%">:</td>
															<td width="70%"><b id="tanggal-resep-realtime"></b></td>
														</tr>
														<tr valign="top">
															<td><b>Tanggal Resep</b></td>
															<td>:</td>
															<td>
																<span>
																	<input type="text" name="tanggal_resep" tabindex="0" data-index="1" class="custom-form" id="tanggal-resep" value="<?= date("d/m/Y H:i:s") ?>" style="width:180px; float:left; margin-right:10px;" />
																</span>
																<span>
																	<button class="btn btn-secondary btn-xs" id="remove-autodate" type="button"><i class="fa fa-times-circle"></i> Manual date</button>
																</span>
															</td>
														</tr>
														<tr>
															<td><b>Jenis Resep</b></td>
															<td>:</td>
															<td>
																<button class="btn btn-secondary jenis_resep" type="button" value="1">Racikan</button>
																<button class="btn btn-info jenis_resep" type="button" value="0">Non-Racikan</button>
																<input type="hidden" id="jenis-resep" value="0">
															</td>
														</tr>
														<tr valign="top">
															<td><b>No. R /</b></td>
															<td>:</td>
															<td>
																<input type="number" name="no_r" tabindex="1" min="1" max="100" data-index="1" class="custom-form" id="no-r" value="1" style="width:300px;" readonly />
															</td>
														</tr>
														<tr valign="top">
															<td><b>Obat</b></td>
															<td>:</td>
															<td>
																<span><input type="text" name="nama" tabindex="2" data-index="2" class="select2c-input" id="barang-auto" style="width:300px"></span>
																<span><input type="hidden" id="kategori-barang" /></span>
																<span><input type="hidden" id="adm-r-barang" /></span>
															</td>
														</tr>
														<tr valign="top" class="hide">
															<td><b>Kekuatan</b></td>
															<td>:</td>
															<td>
																<div style="display:flex;">
																	<div>
																		<input type="text" name="kekuatan" class="custom-form" data-index="3" id="kekuatan" onblur="hitungJmlPakai()" readonly="readonly">
																	</div>
																	<span class="input-group-custom satuan-kekuatan" style="padding: 0 12px;"></span>
																</div>
															</td>
														</tr>
														<tr valign="top" class="hide">
															<td><b>Dosis Racik</b></td>
															<td>:</td>
															<td>
																<div style="display:flex;">
																	<div>
																		<input type="text" name="dosisracik" tabindex="4" data-index="4" class="custom-form" id="dosisracik" onkeypress="return hanyaAngka(event)">
																	</div>
																	<span class="input-group-custom satuan-kekuatan" style="padding: 0 12px;"></span>
																</div>
															</td>
														</tr>
														<tr valign="top">
															<td><b>Permintaan</b></td>
															<td>:</td>
															<td>
																<input type="number" min="0" name="permintaan" tabindex="5" data-index="5" class="custom-form" id="permintaan" onblur="hitungJmlPakai()" style="width: 300px;" />
															</td>
														</tr>
														<tr valign="top" class="hide">
															<td><b>Jumlah Tebus</b></td>
															<td>:</td>
															<td>
																<input type="text" name="jml_tebus" readonly="readonly" class="custom-form" id="jml-tebus" onblur="hitungJmlPakai()" style="width:300px;">
															</td>
														</tr>
														<tr valign="top" class="hide">
															<td><b>Jumlah Pakai</b></td>
															<td>:</td>
															<td>
																<input type="text" name="jumlah" class="custom-form" id="jumlah" readonly="readonly" style="width:100px;">
															</td>
														</tr>
														<tr valign="top" class="showhide aturanpakai-hidden">
															<td><b>Aturan Pakai</b></td>
															<td>:</td>
															<td style="display: flex; flex-direction: column; gap: .5rem">
																<div class="form-check">
																	<input type="checkbox" class="form-check-input" name="aturan_pakai_manual" id="aturan-pakai-manual">
																	<label for="aturan-pakai-manual">Aturan pakai manual</label>
																</div>
																<div style="display: flex; gap: .5rem">
																	<div class="aturanpakai-auto">
																		<input type="text" tabindex="6" data-index="6" class="select2c-input" id="aturanpakai-auto" style="width:300px;">
																	</div>
																	<div class="hide ket-aturan-pakai-manual">
																		<input type="text" id="ket-aturan-pakai-manual" name="ket_aturan_pakai_manual" class="custom-form hide">
																	</div>
																	<select name="timing" tabindex="10" data-index="10" class="custom-form" id="timing" style="width:200px;">

																	</select>
																</div>
															</td>
														</tr>
														<tr valign="top" class="showhide aturanpakai-hidden hide">
															<td><b>Waktu Pemberian</b></td>
															<td>:</td>
															<td id="load-jam-minum">
															</td>
														</tr>
														<tr valign="top" class="hide">
															<td><b>Aturan Pakai</b></td>
															<td>:</td>
															<td>
																<span><input type="hidden" name="aturanpakai" tabindex="8" data-index="8" class="custom-form" id="aturanpakai" style="width:80px; float:left; margin-right:5px;" placeholder="ex: S3DD1"></span>
																<span><input type="text" name="aturanpakai2" tabindex="9" data-index="9" class="custom-form" id="aturanpakai2" style="width:152px; float:left; margin-right:5px;" placeholder="ex: 3x1 Hari 1 Tablet"></span>
																<span>
																	<select name="timing" tabindex="10" data-index="10" class="custom-form" id="timing" style="width:72px;">
																		
																	</select>
																</span>
															</td>
														</tr>
														<tr valign="top" class="obkrs">
															<td><b>Obat Kronis</b></td>
															<td>:</td>
															<td>
																<span>
																	<select name="obatkronis" tabindex="10" data-index="10" class="custom-form" id="obatkronis" style="width:72px;">
																		<option value="0">Tidak</option>
																		<option value="1">Ya</option>
																	</select>
																</span>
															</td>
														</tr>
														<tr valign="top">
															<td><b>Keterangan</b></td>
															<td>:</td>
															<td>
																<span>
																	<textarea name="keterangan_resep" id="keterangan-resep" class="custom-form" style="width: 300px;"></textarea>
																</span>
															</td>
														</tr>
														<tr valign="top" class="" style="display:none;">
															<td><b>Iter / Diulang</b></td>
															<td>:</td>
															<td>
																<input type="hidden" name="iterasi" min="0" max="5" class="custom-form" value="0" id="iterasi" style="width:300px;">
															</td>
														</tr>
														<tr valign="top" class="" style="display:none;">
															<td><b>Pembuatan</b></td>
															<td>:</td>
															<td>
																<input type="hidden" name="cara_pembuatan" class="custom-form" id="cara-pembuatan" style="width: 300px;" />
															</td>
														</tr>
														<?php
														$var_pelarut = array();
														if (isset($item_pelarut)) :
															foreach ($item_pelarut as $value) :
																$var_pelarut[] = "<div class='checkbox'><label><input type='checkbox' value='" . $value . "' class='pelarut'> " . $value . "<label/></div>";
															endforeach;
														endif;
														$pelarut = implode(
															'',
															$var_pelarut
														) . '<br/><button id=\'tambahkan-pelarut\' type=\'button\' class=\'btn btn-default btn-xs\'><i class=\'fas fa-plus-circle\'></i>Tambahkan</button>';
														?>
														<tr valign="top">
															<td></td>
															<td></td>
															<td>
																<button type="button" class="btn btn-info btn-xs" tabindex="11" data-index="11" onclick="addToResep();" id="pilih">
																	<i class="fas fa-arrow-circle-right"></i> Tambahkan
																</button>
																<?php if (isset($item_pelarut)) : ?>
																	<button type="button" id="add-pelarut" class="btn btn-secondary pull-right btn-xs" title="Ceklist untuk menambahkan" tabindex="12" data-trigger="focus" data-toggle="popover" data-content="<?= $pelarut ?>">
																		<i class="fas fa-plus"></i> Pelarut
																	</button>
																<?php endif ?>
															</td>
														</tr>
														<tr>
															<td colspan="3"></td>
														</tr>
													</tbody>
												</table>
												<!-- End Data Form Input Resep -->
											</td>
											<td width="60%" style="padding-left:5px; border-left:1px dashed #333; padding-left:20px;">
												<table width="100%" class="table table-striped table-hover table-sm">
													<tbody>
														<tr>
															<td width="25%"><b>Dari Dokter</b></td>
															<td width="1%">:</td>
															<td width="74%">
																<input type="text" tabindex="13" name="dokter" class="select2c-input" id="dokterhide">
																<span style="float:right;"><?= ($hospital->kabupaten_kota !== null) ? $hospital->kabupaten_kota : 'Tangerang' ?>, <span id="tanggal-resep-label"></span></span>
															</td>
														</tr>
														<tr>
															<td><b>Untuk Pasien</b></td>
															<td>:</td>
															<td><strong id="pasien-auto"></strong> &nbsp; / <i id="jenis-pk"></i> / <span id="penjamin-pasien"></span></td>
														</tr>
														<tr>
															<td><b>Usia</b></td>
															<td>:</td>
															<td>
																<strong id="usia-pasien"></strong>
															</td>
														</tr>
														<tr id="salin-resep" style="display:none;">
															<td><b>Salin Resep</b></td>
															<td>:</td>
															<td>
																<input id="cp-id-resep" class="select2c-input" type="text" tabindex="13" name="cp_id_resep">
															</td>
														</tr>
														<tr class="hide">
															<td><b>Resep Terapi Pulang</b></td>
															<td>:</td>
															<td>
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="is-terapi-pulang">
																	<label class="custom-control-label" for="is-terapi-pulang"><span class="badge badge-info" style="font-size: 10px">Terapi Pulang</span></label>
																</div>
															</td>
														</tr>
														<tr id="resep-prioritas">

														</tr>
														<tr>
															<td colspan="3"></td>
														</tr>
													</tbody>
												</table>
												<!-- <hr style="margin:0"> -->
												<div id="res-resep-ranap"></div>
												<div id="list-resep"></div>
												<strong id="initialr"></strong>

												<?php if (isset($item_pelarut)) : ?>
													<table width="100%" class="table table-striped table-hover table-sm" style="margin-top:10px;">
														<tr>
															<td width="30%" class="right"><b>Pelarut :</b></td>
															<td width="70%">
																<input type="hidden" name="keterangan_pelarut" id="keterangan-pelarut">
																<span id="label-pelarut"></span>
															</td>
														</tr>
													</table>
												<?php endif ?>

												<table width="100%" class="table table-striped table-hover table-sm" style="margin-top:10px;">
													<tbody>
														<tr>
															<td width="70%" class="right"><b>Total Barang :</b></td>
															<td width="30%" class="right" id="total-harga-barang"></td>
															<input type="hidden" class="custom-form right" name=jasa id=jasa onblur="FormNum(this); totalHargaBarang()">
															<input type="hidden" id="total-resep">
														</tr>
														<tr>
															<td colspan="2"></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</table>
								</div>
								<div class="tab-pane p-20" id="tab2" role="tabpanel">
									<h4 class="center"><strong>- HISTORY RESEP PASIEN -</strong></h4>
									<div style="display: flex; gap: .5rem; margin-bottom: .5rem">
										<div>
											Obat : <input type="text" name="barang" id="barang-auto-history" class="select2c-input" placeholder="Pilih Barang...">
										</div>
										<div>
											<button type="button" class="btn btn-info btn-xs" id="btn-cari-resep-history">Cari</button>
										</div>
									</div>
									<input type="hidden" id="id-resep-history">
									<table class="table table-hover table-striped table-sm color-table info-table" id="table-data-resep">
										<thead>
											<tr>
												<th class="center" width="3%">No</th>
												<th class="center" width="5%">No. Resep</th>
												<th class="center" width="7%">Tanggal</th>
												<th class="left" width="15%">Nama Dokter</th>
												<th class="left" width="10%">Pelayanan</th>
												<th class="left" width="5%">No.R</th>
												<th class="left" width="25%">Nama Barang</th>
												<th class="center" width="5%">Jumlah</th>
												<th class="center" width="5%">Dosis Racik</th>
												<th class="left" width="10%">Aturan Pakai</th>
												<th class="center" width="10%">Keterangan</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>

									<div class="row">
										<div class="col">
											<div id="pagination-resep" class="float-left"></div>
											<div id="page-summary-resep" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" tabindex="14" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="last-press" tabindex="13" onclick="konfirmasiSimpanDataResep()"><i class="fas fa-save mr-1"></i>Simpan [F8]</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Form Resep -->