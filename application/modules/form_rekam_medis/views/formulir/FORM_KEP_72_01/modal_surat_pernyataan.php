<!-- // SP_WE  -->
<div class="modal fade" id="modal-surat-pernyataan" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-surat-pernyataan-title"><b>FORM SURAT PERNYATAAN</b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-surat-pernyataan class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sp">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sp">
				<input type="hidden" name="id_pasien" id="id-pasien-sp">				
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_keperawatan">
								<div class="surat-pernyataan">                                
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
                                                <input type="text" name="nama_kel_sp" id="nama-kel-sp"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="umur_kel_sp" id="umur-kel-sp"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="jk_kel_sp" id="jk-kel-sp"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>                            
                                        <tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
												<textarea name="alamat_kel_sp" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-kel-sp"></textarea>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No KTP</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="no_ktp_kel_sp" id="no-ktp-kel-sp"class="custom-form clear-input d-inline-block col-lg-5">
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="25%">Terhadap</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="checkbox" name="saya_sendiri_kel_sp"id="saya-sendiri-kel-sp" value="Saya Sendiri"class="mr-1"> Saya Sendiri 
                                                <input type="checkbox" name="anak_kel_sp"id="anak-kel-sp" value="Anak"class="mr-1 ml-2"> Anak
                                                <input type="checkbox" name="istri_kel_sp"id="istri-kel-sp" value="Istri"class="mr-1 ml-2"> Istri
                                                <input type="checkbox" name="suami_kel_sp"id="suami-kel-sp" value="Suami"class="mr-1 ml-2"> Suami 
                                                <input type="checkbox" name="ayah_kel_sp"id="ayah-kel-sp" value="Ayah"class="mr-1 ml-2"> Ayah
                                                <input type="checkbox" name="ibu_kel_sp"id="ibu-kel-sp" value="Ibu"class="mr-1 ml-2"> Ibu &nbsp;&nbsp;
                                                Lainya <input type="text" name="lainya_kel_sp" id="lainya-kel-sp"class="custom-form clear-input d-inline-block col-lg-5">
                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
                                            <td class="bold" width="48%"> </td>
                                        </tr>
                                        <tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="nama_ps_sp" class="custom-form col-lg-3" id="nama-ps-sp" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="umur_ps_sp" id="umur-ps-sp"class="custom-form clear-input d-inline-block col-lg-5" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="jk_ps_sp" id="jk-ps-sp"class="custom-form clear-input d-inline-block col-lg-5" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
												<textarea name="alamat_ps_sp" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-ps-sp" disabled></textarea>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No KTP</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="no_ktp_ps_sp" id="no-ktp-ps-sp"class="custom-form clear-input d-inline-block col-lg-5" disabled>
											</td>
										</tr>
                                        <tr>
                                            <td class="bold" width="25%">Dengan ini menyatakan dengan sesungguhnya</td>
											<td class="bold" width="2%"></td>
                                            <td class="bold" width="48%"> </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%">Terhadap</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="checkbox" name="mengajukan_sp"id="mengajukan-sp" value="1"class="mr-1"> Mengajukan permintaan Susu Formula 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="menolak_sp"id="menolak-sp" value="1"class="mr-1"> Menolak Rujuk 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="dirawat_sp"id="dirawat-sp" value="1"class="mr-1"> Dirawat sementara di IGD 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="perawatan_sp"id="perawatan-sp" value="1"class="mr-1"> Perawatan di intensif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="perawatan_dgn_sp"id="perawatan-dgn-sp" value="1"class="mr-1"> Perawatan dengan pelayanan dan fasilitas rawat inap 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="menolak_pp_sp"id="menolak-pp-sp" value="1"class="mr-1"> Menolak Pemeriksaan Penunjang  
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
											<td width="48%">
                                                <input type="checkbox" name="lainya_sp"id="lainya-sp" value="1"class="mr-1"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="25%"></td>
											<td class="bold" width="2%"></td>
                                            <td width="48%">
												<textarea name="dg_alasan_sp" cols="30" rows="3" class="form-control clear-input custom-textarea" id="dg-alasan-sp"></textarea>
											</td>
                                        </tr>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td class="bold" width="60%"> Menyatakan bahwa saya telah mendapat penjelasan dari dokter atau petugas kesehatan mengenai kondisi pasien saat ini, saya menerima segala resiko yang mungkin terjadi dan tidak akan menuntut pihak rumah sakit apabila terjadi hal-hal yang tidak diinginkan berkaitan dengan kondisi pasien.</td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="60%"> Dengan Alasan : <br>
                                                <textarea name="dg_alasan_sp_1" cols="30" rows="3" class="form-control clear-input custom-textarea" id="dg-alasan-sp-1"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
											<td class="bold" width="25%">Tanggal</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
												<input type="date" name="tgl_sp" class="custom-form col-lg-3" id="tgl-sp">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Saksi 1</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="saksi_1_sp" class="select2c-input ml-2" id="saksi-1-sp">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Saksi 2</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="saksi_2_sp" class="select2c-input ml-2" id="saksi-2-sp">
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Dokter ybs</td>
											<td class="bold" width="2%">:</td>
											<td width="48%">
                                                <input type="text" name="dokter_sp" class="select2c-input ml-2" id="dokter-sp">
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
				<button type="button" class="btn btn-info" onclick="CetakSuratPernyataan()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->


				