<!-- // KPEGD PERBAIKAN -->
<div class="modal fade" id="modal_keterangan_pasien_emergency" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 85%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_keterangan_pasien_emergency_title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-keterangan-pasien-emergency class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-kpegd">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-kpegd">
					<input type="hidden" name="id_pasien" id="id-pasien-kpegd">		
					<input type="hidden" name="id_kpegd" id="id-kpegd">
					<input type="hidden" name="action" id="action-kpegd">
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_keperawatan">																		
									<div class="keterangan-pasien-emergency">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td class="bold" width="15%">Jaminan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="checkbox" name="bpjskpegd"id="bpjskpegd" value="1"class="mr-1"> BPJS 
													<input type="checkbox" name="umumkpegd"id="umumkpegd" value="1"class="mr-1 ml-2"> UMUM 
													<input type="checkbox" name="lainkpegd"id="lainkpegd" value="1"class="mr-1 ml-2"> Lain-lain &nbsp;&nbsp;
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Nama Pasien</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<!-- <input type="text" name="namapasienkpegd" id="namapasienkpegd"class="custom-form clear-input d-inline-block col-lg-5"disabled> -->
													<span id="namapasienkpegd"></span>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Dokter Triase</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="doktertriasekpegd" class="select2c-input ml-2" id="doktertriasekpegd">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Diagnosa Masuk</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<label id="diagnosamasuk"></label>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Kegawatdaruratan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="checkbox" name="gawatdaruratkpegd"id="gawatdaruratkpegd" value="1"class="mr-1"> Gawat Darurat  
													<input type="checkbox" name="tgawatdaruratkpegd"id="tgawatdaruratkpegd" value="1"class="mr-1 ml-2"> Tidak Gawat Darurat 
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Pasien Asal Masuk</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="checkbox" name="datangsendirikpegd"id="datangsendirikpegd" value="1"class="mr-1"> Datang Sendiri 
													<input type="checkbox" name="klinikkpegd"id="klinikkpegd" value="1"class="mr-1 ml-2"> Klinik 
													<input type="checkbox" name="puskesmaskpegd"id="puskesmaskpegd" value="1"class="mr-1 ml-2"> Puskesmas 
													<input type="checkbox" name="rslainkpegd"id="rslainkpegd" value="1"class="mr-1 ml-2"> RS Lain 
													<input type="checkbox" name="danlainkpegd"id="danlainkpegd" value="1"class="mr-1 ml-2"> Dan Lain-lain &nbsp;&nbsp;
													<input type="text" name="danlainlainkpegd" id="danlainlainkpegd"class="custom-form clear-input d-inline-block col-lg-4" readonly>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Tanggal</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="tanggalkpegd" class="custom-form col-lg-2" id="tanggalkpegd">
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>

				<div class="row">
					<table width="100%">
						<tr>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-info mr-1" onclick="simpanSuratKeteranganPasienEmergency()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Surat Keterangan</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanSuratKeteranganPasienEmergency()" id="btn_update_kpegd"> <i class="fas fa-edit mr-1"></i>Update Surat Keterangan</button>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div>
				<div class="widget-body mt-4">
					<div class="row">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="table-list-kpegd">
								<thead style="background-color: #B0C4DE;">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="10%" class="center">Nama Pasien</th>
										<th width="10%" class="center">Dokter Triase</th>
										<th width="10%" class="center">Petugas</th>
										<th width="10%" class="center">Alat</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>		