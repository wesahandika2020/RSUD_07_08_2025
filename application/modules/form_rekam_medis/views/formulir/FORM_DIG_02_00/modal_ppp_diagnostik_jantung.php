<!-- // PPPDJ -->
<div class="modal fade" id="modal_ppp_diagnostik_jantung" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 82%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-ppp-diagnostik-jantung-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-ppp-diagnostik-jantung class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pppdj">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pppdj">
					<input type="hidden" name="id_pasien" id="id-pasien-pppdj">
					<input type="hidden" name="id_pppdj" id="id-pppdj">
					<input type="hidden" name="action" id="action-pppdj">
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">	
									<!-- <div class="form-modal">  kalau pakek yang ini di LIHATYA hilang inputanya 																	 -->
									<div class="form-ppp-diagnostik-jantung">
										<table class="table table-no-border table-sm table-striped">
                                            <tr>
												<td colspan="3">Bersama ini kami mohon dapat dilakukan pemeriksaan/tes :</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="1%"></td>
												<td width="60%">
													<input type="checkbox" name="ekg_pppdj" id="ekg-pppdj" value="1" class="mr-1">EKG standar 12 lead
												</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="1%"></td>
												<td width="60%">
													<input type="checkbox" name="ekokardiorafi_pppdj" id="ekokardiorafi-pppdj" value="1" class="mr-1">Ekokardiografi
												</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="1%"></td>
												<td width="60%">
													<input type="checkbox" name="carotis_pppdj" id="carotis-pppdj" value="1" class="mr-1">Carotis Vetebralis Duplex Sonography
												</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="1%"></td>
												<td width="60%">
                                                    <input type="checkbox" name="tradmil_pppdj" id="tradmil-pppdj" value="1" class="mr-1">Treadmill: Metode: Bruce / Modifikasi / Lain-lain 
                                                    <input type="text" name="lain_pppdj" id="lain-pppdj"class="custom-form clear-input d-inline-block col-lg-5">
												</td>
											</tr>
                                        </table>

										<table class="table table-no-border table-sm table-striped">
                                            <tr>
												<td colspan="4">Terhadap Pasien/ Klien,</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">Nama</td>
												<td width="1%">:</td>
												<td width="60%">
													<span id="namapasien-pppdj"></span>
												</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">Usia</td>
												<td width="1%">:</td>
												<td width="60%">
													<span id="usia-pppdj"></span>
												</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">Jenis Kelamin</td>
												<td width="1%">:</td>
												<td width="60%">
													<span id="jeniskelamin-pppdj"></span>
												</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">No.RM</td>
												<td width="1%">:</td>
												<td width="60%">
													<span id="norm-pppdj"></span>
												</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">Ruang</td>
												<td width="1%">:</td>
												<td width="60%">
													<span id="ruang-pppdj"></span>
												</td>
											</tr>
											<tr>
												<td width="1%"></td>
												<td width="5%">Diagnosa Kerja</td>
												<td width="1%">:</td>
												<td width="60%">
                                                    <textarea name="diagnosa_pppdj" cols="30" rows="3" class="form-control clear-input custom-textarea" id="diagnosa-pppdj"></textarea>
												</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="5%">Tanggal</td>
												<td width="1%">:</td>
												<td width="60%">
                                                    <input type="text" name="tanggal_pppdj" id="tanggal-pppdj"class="custom-form clear-input d-inline-block col-lg-1">
												</td>
											</tr>
                                            <tr>
												<td width="1%"></td>
												<td width="5%">Dokter Pemeriksa</td>
												<td width="1%">:</td>
												<td width="60%">
                                                    <input type="text" name="dokter_pemeriksa_pppdj" id="dokter-pemeriksa-pppdj" class="select2c-input ml-2">
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
									<button type="button" class="btn btn-primary mr-1" onclick="simpanPppDiagnostikJantung()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Formulir</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanPppDiagnostikJantung()" id="btn_update_pppdj"> <i class="fas fa-edit mr-1"></i>Update Formulir</button>
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
							<table class="table table-sm table-striped table-bordered" id="table-list-pppdj">
								<thead style="background-color:rgb(210, 226, 247);">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="15%" class="center">Nama Pasien</th>
										<th width="15%" class="center">Dokter Pemeriksa</th>
										<!-- <th width="15%" class="center">Petugas</th> -->
										<th width="20%" class="center">Alat</th>
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
