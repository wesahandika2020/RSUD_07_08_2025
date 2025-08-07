<!-- // DOA_D_O_A  -->
<div class="modal fade" id="modal-form-doa" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-form-doa-title"><b>FORM SURAT KETERANGAN (DOA /<em> Death On Arrival</em>)</b></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-doa class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-doa">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-doa">
				<input type="hidden" name="id_pasien" id="id-pasien-doa">				
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_igd">
								<div class="form-doa">                                
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
											<td class="bold" width="25%">Dengan ini menerangkan bahwa </td>
											<td class="bold" width="1%"></td>
											<td width="48%"></td>
										</tr>
										<tr>
											<td class="bold" width="25%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_doa" class="custom-form" id="nama-doa" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">No. Rekam Medis</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_rm_doa" class="custom-form clear-input col-lg-3" id="no-rm-doa"disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%"> Tempat Tanggal lahir</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="ttl_doa" class="custom-form col-lg-8" id="ttl-doa" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Umur</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="umur_doa" class="custom-form clear-input col-lg-3" id="umur-doa" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="25%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jk_doa" class="custom-form clear-input col-lg-3" id="jk-doa"disabled>
											</td>
										</tr>
                                        </td>
											</td>
										</tr>
                                       
										<tr>
											<td class="bold" width="25%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="alamat_doa" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-doa"disabled></textarea>
											</td>
										</tr>
                               
                                        <tr>
                                            <td class="bold" width="25%">Tiba di Instalasi Gawat Darurat RSUD Kota Tangerang dalam keadaan sudah meninggal dunia.</td>
											<td class="bold" width="1%"></td>
                                            <td class="bold" width="48%"> </td>
                                        </tr>
                        
                                        <tr>
											<td class="bold" width="25%">Pada Tanggal</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_doa" class="custom-form col-lg-3" id="tanggal-doa">
											</td>
										</tr>
										<tr>
											<td class="bold" width="25%">Pukul</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="pukul_doa" class="custom-form col-lg-3" id="pukul-doa">
											</td>
										</tr> 
                                        <tr>
											<td class="bold" width="25%">Tanggal Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="date" name="tanggal_surat_doa" class="custom-form col-lg-3" id="tanggal-surat-doa">
											</td>
										</tr>  
                                        <tr>
											<td class="bold" width="25%">Dokter Pemeriksa</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
                                                <input type="text" name="dokter_doa" class="select2c-input ml-2" id="dokter-doa">
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
				<button type="button" class="btn btn-info" onclick="CetakSuratKeteranganDOA()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->







				

				