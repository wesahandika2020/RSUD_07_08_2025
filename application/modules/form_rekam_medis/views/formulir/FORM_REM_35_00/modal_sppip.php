<!-- // SPPIP  -->
<div class="modal fade" id="modal-sppip" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-sppip-title"><b>FORM PERNYATAAN PEMBAHARUAN IDENTITAS PASIEN (RECALL IMPLANT)</b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-sppip class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sppip">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sppip">
				<input type="hidden" name="id_pasien" id="id-pasien-sppip">
                <!-- <input type="hidden" name="id_user" id="id-user"value="<!?= $this->session->userdata('id_translucent') ?>">   -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-sppip-p">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="25%">Saya yang bertanda tangan dibawah ini </td>
											<td class="bold" width="1%"></td>
											<td width="48%"></td>
										</tr>
                                        <br>
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_sppip" class="custom-form" id="nama-sppiprm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tgl_lahir_sppip" class="custom-form clear-input col-lg-3" id="tanggal-sppiprm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="umur_sppip" class="custom-form clear-input col-lg-3" id="umur-sppiprm">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<div class="input-group">
													<input type="radio" name="jk_sppip" id="jk-sppip-1" value="Laki-laki" class="mr-1">Laki-laki 
													<input type="radio" name="jk_sppip" id="jk-sppip-2" value="Perempuan" class="mr-1 ml-2">Perempuan 
                                           	 	</div>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No. KTP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_ktp_sppip" class="custom-form clear-input col-lg-3" id="ktp-sppiprm">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat_sppip" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-sppiprm"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">No. Telp / HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="no_hp_sppip" class="custom-form clear-input col-lg-3" id="no-hp-sppiprm">
											</td>
										</tr>
										<tr id="tr-hubungan-keluarga">
											<td class="bold" width="25%">Hubungan dengan pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="hubungan_pasien_sppip" class="custom-form clear-input col-lg-4" id="hubungan-keluarga-sppiprm">
											</td>
										</tr>
									</table>
                                    <table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="75%">Menyatakan dengan ini bersedia menginformasikan pembaruan no kontak serta alamat tempat tinggal terbaru terkait dengan pemasangan implant pada pasien atas nama </td>
										</tr>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama" class="custom-form" id="nama-sppip" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_lahir" class="custom-form col-lg-8" id="tgl-lahir-sppip" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="umur" class="custom-form clear-input col-lg-3" id="umur-sppip" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="kelamin" class="custom-form clear-input col-lg-3" id="kelamin-sppip"disabled>
											</td>
										</tr>
                                        </td>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No. Rekam Medik</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_rm" class="custom-form clear-input col-lg-3" id="no-rm-sppip"disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-sppip"disabled></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">No. Telp / HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="no_hp_sppip" maxlength="16" name="telp" class="custom-form clear-input col-lg-3" id="no-hp-sppip"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Tanggal</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tgl_sppip" class="custom-form col-lg-3" id="tgl-sppip">
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!--  // INI YANG BENAR -->
				<!-- <div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-sppip-p">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="25%">Saya yang bertanda tangan dibawah ini </td>
											<td class="bold" width="1%"></td>
											<td width="48%"></td>
										</tr>
                                        <br>
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama" class="custom-form" id="nama-sppiprm" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_lahir" class="custom-form clear-input col-lg-3" id="tanggal-sppiprm" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="umur" class="custom-form clear-input col-lg-3" id="umur-sppiprm" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="kelamin" class="custom-form clear-input col-lg-3" id="kelamin-sppiprm" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No. KTP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="ktp" class="custom-form clear-input col-lg-3" id="ktp-sppiprm" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-sppiprm" disabled></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">No. Telp / HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="hp" class="custom-form clear-input col-lg-3" id="hp-sppiprm" disabled>
											</td>
										</tr>
										<tr id="tr-hubungan-keluarga">
											<td class="bold" width="25%">Hubungan dengan pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" maxlength="16" name="hubungan_keluarga" class="custom-form clear-input col-lg-4" id="hubungan-keluarga-sppiprm" disabled>
											</td>
										</tr>
									</table>
                                    <table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="75%">Menyatakan dengan ini bersedia menginformasikan pembaruan no kontak serta alamat tempat tinggal terbaru terkait dengan pemasangan implant pada pasien atas nama </td>
										</tr>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_sppip" class="custom-form" id="nama-sppip">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tgl_lahir_sppip" class="custom-form col-lg-3" id="tgl-lahir-sppip">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="umur_sppip" class="custom-form clear-input col-lg-3" id="umur-sppip">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                            <div class="input-group">
                                                <input type="radio" name="jk_sppip" id="jk-sppip-1" value="Laki-laki" class="mr-1">Laki-laki 
                                                <input type="radio" name="jk_sppip" id="jk-sppip-2" value="Perempuan" class="mr-1 ml-2">Perempuan 
                                            </div>
                                        </td>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No. Rekam Medik</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_rm_sppip" class="custom-form clear-input col-lg-3" id="no-rm-sppip">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat_sppip" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-sppip"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">No. Telp / HP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="no_hp_sppip" maxlength="16" name="no_hp_sppip" class="custom-form clear-input col-lg-3" id="no-hp-sppip">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Tanggal</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tgl_sppip" class="custom-form col-lg-3" id="tgl-sppip">
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div> -->


				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="CetakSuratperyataanpembaharuanidentitaspasien()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->







				

				