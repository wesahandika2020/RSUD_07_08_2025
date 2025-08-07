<!-- // SPPPMK PERBAIKAN -->
<div class="modal fade" id="modal_surat_pernyataan_persetujuan_pmk" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 85%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_surat_pernyataan_persetujuan_pmk_title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-surat-pernyataan-persetujuan-pmk class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-spppmk">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-spppmk">
					<input type="hidden" name="id_pasien" id="id-pasien-spppmk">	
					<input type="hidden" name="id_spppmk" id="id-spppmk">
					<input type="hidden" name="action" id="action-spppmk">
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="surat-pernyataan-persetujuan-pmk">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="23%">Apakah form ditandatangani oleh pasien sendiri?<span class="text-red">*</span></td>
												<td width="1%">:</td>
												<td width="60%">
													<input type="radio" name="is_pasien" id="is-pasien-spppmk-ya" value="1" class="mr-1">Ya
													<input type="radio" name="is_pasien" id="is-pasien-spppmk-tidak" value="0" class="mr-1 ml-2">Tidak
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Nama </td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="namaspppmk" id="namaspppmk"class="custom-form clear-input d-inline-block col-lg-5">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Jenis Kelamin</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="jkpenangungjawabspppmk" id="jkpenangungjawabspppmk"class="custom-form clear-input d-inline-block col-lg-5">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Tanggal Lahir </td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="umurttlspppmk" id="umurttlspppmk"class="custom-form clear-input d-inline-block col-lg-5">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">NIK</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nikspppmk" id="nikspppmk"class="custom-form clear-input d-inline-block col-lg-5">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Alamat Rumah</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="alamatspppmk" id="alamatspppmk"class="custom-form clear-input d-inline-block col-lg-12">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">No. Telepon/Hp	</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="notelponspppmk" id="notelponspppmk"class="custom-form clear-input d-inline-block col-lg-5"> 
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Menyatakan dengan sesungguhnya dari </td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="checkbox" name="sayasendirispppmk"id="sayasendirispppmk" value="saya sendiri"class="mr-1"> saya sendiri 
													<input type="checkbox" name="sebagaiorangtuaspppmk"id="sebagaiorangtuaspppmk" value="sebagai orang tua"class="mr-1 ml-2"> sebagai orang tua 
													<input type="checkbox" name="keluargaspppmk"id="keluargaspppmk" value="keluarga"class="mr-1 ml-2"> keluarga  
													<input type="checkbox" name="walispppmk"id="walispppmk" value="wali dari"class="mr-1 ml-2"> wali dari :
													<input type="text" name="darispppmk" id="darispppmk"class="custom-form clear-input d-inline-block col-lg-4"> 
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Nama</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<!-- <input type="text" name="namapasienspppmk" id="namapasienspppmk"class="custom-form clear-input d-inline-block col-lg-5"disabled> -->
													<span id="namapasienspppmk"></span>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Jenis Kelamin</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<!-- <input type="text" name="jkspppmk" id="jkspppmk"class="custom-form clear-input d-inline-block col-lg-5"disabled> -->
													<span id="jkspppmk"></span>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Umur/Tempat Tanggal Lahir</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<!-- <input type="text" name="umurttlpspppmk" id="umurttlpspppmk"class="custom-form clear-input d-inline-block col-lg-5"disabled> -->
													<span id="umurttlpspppmk"></span>
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Dengan ini menyatakan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="checkbox" name="setujuspppmk"id="setujuspppmk" value="SETUJU"class="mr-1"> Setuju 
													<input type="checkbox" name="menolakspppmk"id="menolakspppmk" value="MENOLAK"class="mr-1 ml-2"> Menolak
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">PMI Tujuan</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="pmitujuanspppmk" id="pmitujuanspppmk"class="custom-form clear-input d-inline-block col-lg-4">
												</td>
											</tr>
											<tr>
												<td class="bold" width="15%">Dokter/pelaksana</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="dokterspppmk" class="select2c-input ml-2" id="dokterspppmk">
												</td>
											</tr>                                 
											<tr>
												<td class="bold" width="15%">Tanggal</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="tanggalspppmk" class="custom-form col-lg-2" id="tanggalspppmk">
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
									<button type="button" class="btn btn-info mr-1" onclick="simpanSuratPernyataanPersetujuanpmk()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Surat Persetujuan</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanSuratPernyataanPersetujuanpmk()" id="btn_update_spppmk"> <i class="fas fa-edit mr-1"></i>Update Surat Persetujuan</button>
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
							<table class="table table-sm table-striped table-bordered" id="table-list-spppmk">
								<thead style="background-color: #B0C4DE;">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="10%" class="center">Nama Pasien</th>
										<th width="10%" class="center">Nama Penanggung Jawab</th>
										<th width="10%" class="center">Nama Dokter</th>
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