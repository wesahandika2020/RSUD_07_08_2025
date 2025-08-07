<!-- Modal Pengkodean -->
<div id="modal-pengkodean" class="modal fade" role="dialog" data-backdrop="static"
	aria-labelledby="modal-pengkodean-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-pengkodean-label"></h4>
				<button id="btn-close-pengkodean" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">

				<!-- Nama Form -->
				<?= form_open('', 'id=form-pengkodean role=form class="form-horizontal form-custom"') ?>

				<!-- Input Hidden Form -->
				<input type="hidden" id="page-anamnesa">
				<input type="hidden" id="page-diagnosa">
				<input type="hidden" id="page-tindakan">
				<input type="hidden" id="page-diagnosa-history">
				<input type="hidden" id="page-diagnosa-history">
				<input type="hidden" id="id-pasien">
				<input type="hidden" id="id-dokter">
				<input type="hidden" id="id-layanan-pendaftaran">
				<input type="hidden" id="id-pendaftaran">
				<input type="hidden" id="id-spesialis">
				<input type="hidden" id="id-konsul">
				<input type="hidden" id="no-ktp-pasien">
				<input type="hidden" id="jenis-rawat">

				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Tanggal Pelayanan</td>
									<td width="80%">: <span id="tanggal-pelayanan"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Nama Pasien</td>
									<td width="80%">: <span id="nama-pasien"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">No. RM</td>
									<td width="80%">: <span id="no-rm"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Riwayat Rekam Medis <i>(Baru)</i></td>
									<td width="80%">: <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Riwayat Rekam Medis</td>
									<td width="80%">: <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Riwayat Pasien SIMRS Lama</td>
									<td width="80%">: <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatPasienSimrsLama()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Pasien SIMRS Lama</button></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Tempat Pelayanan</td>
									<td width="80%">: <span id="tempat-pelayanan"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Dokter</td>
									<td width="80%">: <span id="dokter"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Asal Kunjungan</td>
									<td width="80%">: <span id="asal-kunjungan"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Cetak Resume Medis</td>
									<!-- <td width="80%"><button type="button" class="btn btn-secondary btn-xxs" onclick="cetakResumeMedis('13')"><i class="fas fa-eye m-r-5"></i>Cetak Resume Medis</button></td> -->
									<td width="10%"><button type="button" class="btn btn-secondary btn-xxs" id="btn-resume-medis"><i class="fas fa-print m-r-5"></i>Resume Medis</button></td>
								</tr>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard-form">
								<!-- Tab bwizard -->
								<ol>									
									<li>Diagnosa</li>
									<li>Tindakan</li>
									<li>Resep</li>									
								</ol>

								<!-- Data bwizard -->								

								<!-- Tab Wizard Diagnosa -->
								<div class="form-diagnosa">
									<!-- <button type="button"  class="btn btn-info waves-effect" onclick="addNewDiagnosa()"><i class="fa fa-plus"></i> Diagnosa</button> -->
									<input type="hidden" id="id-layanan-pendaftaran-form-diagnosa">
									<div id="data-diagnosa"></div>
								</div>

								<!-- Data Tindakan -->
								<div class="form-tindakan">
									<div class="form-group row tight">
										<label class="col-1 col-form-label">Filter Tindakan</label>
										<div class="col-4">
											<select name="filter-tindakan" class="custom-select reset-select" id="filter_tindakan">
												<option value="">Semua Tindakan</option>
											</select>
										</div>										
									</div>
									<div id="data-tindakan"></div>
								</div>
								
								<!-- Data Resep -->
								<div class="form-resep">
									<h4 class="center"><strong>- HISTORY RESEP PASIEN -</strong></h4>
                                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-data-resep">
                                        <thead>
                                            <tr>
                                                <th class="center" width="3%">No</th>
                                                <th class="center" width="5%">No. Resep</th>
                                                <th class="center" width="7%">Tanggal</th>
                                                <th class="left" width="20%">Nama Dokter</th>
                                                <th class="left" width="10%">Pelayanan</th>
                                                <th class="left" width="35%">Nama Barang</th>
                                                <th class="center" width="5%">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPengkodean()"><i
						class="fas fa-save"></i> Simpan</button> -->
			</div>
		</div>
	</div>
</div>
<!-- End Modal Pengkodean -->
