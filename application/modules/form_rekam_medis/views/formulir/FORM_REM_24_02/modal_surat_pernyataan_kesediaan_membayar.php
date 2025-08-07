<!-- // SKKM  -->
<div class="modal fade" id="modal_surat_keterangan_kesediaan_membayar" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 75%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal_surat_keterangan_kesediaan_membayar_title"><b></b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-surat-keterangan-kesediaan-membayar class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skkm">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skkm">
				<input type="hidden" name="id_pasien" id="id-pasien-skkm">		
				<input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 		
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_keperawatan">
								<div class="surat-keterangan-kesediaan-membayar">                                
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
											<td class="bold" width="15%">Nama Pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="namapasienskkm" id="namapasienskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="umurskkm" id="umurskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">No. Rekam Medis</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="normskkm" id="normskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Saya yang bertanda tangan dibawah ini	:</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Nama </td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="namaskkm" id="namaskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">NIK</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="nikskkm" id="nikskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="alamatskkm" id="alamatskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="15%">No. Telepon/Hp	</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="notelponskkm" id="notelponskkm"class="custom-form clear-input d-inline-block col-lg-5"disabled>
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="15%">Hubungan dengan pasien</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="checkbox" name="suamiskkm"id="suamiskkm" value="1"class="mr-1"> Suami 
                                                <input type="checkbox" name="istriskkm"id="istriskkm" value="1"class="mr-1 ml-2"> Istri 
                                                <input type="checkbox" name="ayahskkm"id="ayahskkm" value="1"class="mr-1 ml-2"> Ayah 
                                                <input type="checkbox" name="ibuskkm"id="ibuskkm" value="1"class="mr-1 ml-2"> Ibu 
                                                <input type="checkbox" name="waliskkm"id="waliskkm" value="1"class="mr-1 ml-2"> Wali 
                                                <input type="checkbox" name="anakskkm"id="anakskkm" value="1"class="mr-1 ml-2"> Anak 
                                                <input type="checkbox" name="penanggungjawabskkm"id="penanggungjawabskkm" value="1"class="mr-1 ml-2"> Penanggung jawab, Sebutkan 
                                                <input type="text" name="sebutkanskkm" id="sebutkanskkm" class="custom-form clear-input d-inline-block col-lg-4" disabled>
                                            </td>
                                        </tr>
                                        <tr>
											<td class="bold" width="15%">Tanggal</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggalskkm" class="custom-form col-lg-2" id="tanggalskkm">
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
				<button type="button" class="btn btn-info" onclick="CetakSuratPernyataanKesediaanMembayar()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->			