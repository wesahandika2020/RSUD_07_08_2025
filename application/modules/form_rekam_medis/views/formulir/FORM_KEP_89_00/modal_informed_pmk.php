<!-- // ICPMK  -->
<div class="modal fade" id="modal-informed-pmk" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-informed-pmk-title"><b>FORM INFORMED CONSENT PERAWATAN METODE KANGURU (PMK)</b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=informed-pmk class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-icpmk">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-icpmk">
				<input type="hidden" name="id_pasien" id="id-pasien-icpmk">				
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_keperawatan">
								<div class="informed-pmk">                                
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
											<td class="bold" width="25%">Saya yang bertanda tangan dibawah ini</td>
											<td class="bold" width="2%"></td>
											<td width="48%"></td>
										</tr>
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="nama_ort_icpmk" id="nama-ort-icpmk"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
												<textarea name="alamat_icpmk" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-icpmk"></textarea>
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="25%">Hubungan dengan pasien</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="checkbox" name="hubungan_ayah_icpmk"id="hubungan-ayah-icpmk" value="Ayah"class="mr-1"> Ayah 
                                                <input type="checkbox" name="hubungan_ibu_icpmk"id="hubungan-ibu-icpmk" value="Ibu"class="mr-1 ml-2"> Ibu
                                                <input type="checkbox" name="hubungan_nenek_icpmk"id="hubungan-nenek-icpmk" value="Nenek"class="mr-1 ml-2"> Nenek
                                                <input type="checkbox" name="hubungan_kakek_icpmk"id="hubungan-kakek-icpmk" value="Kakek"class="mr-1 ml-2"> Kakek &nbsp;&nbsp;
                                                Lain-lain <input type="text" name="hubungan_lainya_icpmk" id="hubungan-lainya-icpmk"class="custom-form clear-input d-inline-block col-lg-5">
                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td class="bold" width="25%">Mengijinkan kepada tim keperawatan dan dokter jaga untuk melakukan perawatan metode kanguru (PMK) intermiten/kontinyu terhadap </td>
											<td class="bold" width="2%">:</td>
                                            <td class="bold" width="48%"> </td>
                                        </tr>
                                        <tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="2%">: By</td>
											<td width="48%">
                                                <input type="text" name="nama_by_icpmk" class="custom-form col-lg-3" id="nama-by-icpmk" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="usia_by_icpmk" id="usia-by-icpmk"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Tanggal</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_icpmk" class="custom-form col-lg-3" id="tanggal-icpmk">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Saksi 1</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="perawat_1_icpmk" class="select2c-input ml-2" id="perawat-1-icpmk">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Saksi 2</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="perawat_2_icpmk" class="select2c-input ml-2" id="perawat-2-icpmk">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Dokter ybs</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="dokter_icpmk" class="select2c-input ml-2" id="dokter-icpmk">
											</td>
										</tr>                             
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="CetakSuratInformedConsentPMK()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->







				

				