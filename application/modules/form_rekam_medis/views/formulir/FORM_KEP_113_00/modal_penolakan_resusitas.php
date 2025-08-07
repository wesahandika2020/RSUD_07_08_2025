
<!-- // PRDNR-->
<div class="modal fade" id="modal-penolakan-resusitas" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
				<div class="title">
					<h5 id="modal-penolakan-resusitas-title"><b>FORM PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)</b></h5>
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?= form_open('', 'id=form-penolakan-resusitas class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-prdnr">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-prdnr">
				<input type="hidden" name="id_pasien" id="id-pasien-prdnr">	
				<input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-form"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="norm-pasien-form"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ttl-pasien-form"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-pasien-form"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="form-penolakan-resusitas">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"id="btn-expand-all-prdnr"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"id="btn-collapse-all-prdnr"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr>
										<br>    
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-penolakan-resusitas-1"><i class="fas fa-expand mr-1"></i>Expand</button>FORM PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse" id="data-penolakan-resusitas-1">
                                            <table class="table table-sm" style="margin-top: -15px">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
															<thead>
                                                                <tr>
                                                                    <th class="center" colspan="4"><b></b></th>
                                                                </tr>
																<tr>
                                                                    <th width="20%" class="center"></th>
                                                                    <th width="20%" class="center"></th>
                                                                    <th width="20%" class="center"><b>Pemberian Informasi</b></th>
                                                                    <th width="20%" class="center"></th>
                                                                    <th width="20%" class="center"></th>                   
                                                                </tr>
                                                                <tr>
                                                                    <th width="15%" class="center"><b>Dokter Pelaksana Tindakan</b></th>
                                                                    <th width="20%" class="center">
																		<input type="text" name="dokter_pelaksana" class="select2c-input ml-2" id="dokter-pelaksana">
																	</th>                 
                                                                </tr>
                                                                <tr>
                                                                    <th width="15%" class="center"><b>Pemberi Informasi</b></th>
                                                                    <th width="20%" class="center">
																		<input type="text" name="dokter_pemberi" class="select2c-input ml-2" id="dokter-pemberi">
																	</th>                 
                                                                </tr>
                                                                <tr>
                                                                    <th width="15%" class="center"><b>Penerima Informasi</b></th>
                                                                    <th width="20%" class="center">
																		<input type="text" maxlength="100" name="penerima_form_1" class="custom-form" id="penerima-form-1">
																	</th>                 
                                                                </tr>
                                                            </thead>
														</table>                                                     
														<table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="4"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="5%" class="center"><b>No.</b></th>
                                                                    <th width="20%" class="center"><b>Jenis Informasi</b></th>
                                                                    <th width="50%" class="center"><b>Isi Informasi</b></th>
                                                                    <th width="8%" class="center"><b>Tanda (v)</b></th>                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center">1.</td>
                                                                    <td>Diagnosis Kerja & Diagnosis Banding (WD & DD)</td>
                                                                    <td class="center">
																		<textarea name="diagnosis_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="diagnosis-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_1"id="tanda-form-1" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">2.</td>
                                                                    <td>Alasan DNR</td>
                                                                    <td class="center">
																		<textarea name="alasan_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="alasan-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_2"id="tanda-form-2" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">3.</td>
                                                                    <td>Tata Cara Uraian Singkat prosedur dan tahapan yang penting</td>
                                                                    <td class="center">
																		<textarea name="tata_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="tata-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_3"id="tanda-form-3" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">4.</td>
                                                                    <td>Tujuan</td>
                                                                    <td class="center">
																		<textarea name="tujuan_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="tujuan-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_4"id="tanda-form-4" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">5.</td>
                                                                    <td>Resiko dan komplikasi</td>
                                                                    <td class="center">
																		<textarea name="resiko_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="resiko-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_5"id="tanda-form-5" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">6.</td>
                                                                    <td>Prognosis prognosis vital, prognosis fungsi dan prognosis kesembuhan</td>
                                                                    <td class="center">
																		<textarea name="prognosis_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="prognosis-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_6"id="tanda-form-6" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">7.</td>
                                                                    <td>Alternatif & Resiko pilihan Pengobatan/pelaksanaan</td>
                                                                    <td class="center">
																		<textarea name="alternatif_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="alternatif-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_7"id="tanda-form-7" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                                <tr>
                                                                    <td class="center">8.</td>
                                                                    <td>Hal lain yang akan di lakukan untuk menyelamatkan pasien peluasan tindakan konsultasi selama tindakan Resusitas</td>
                                                                    <td class="center">
																		<textarea name="hal_form" cols="30" rows="2" class="form-control clear-input custom-textarea" id="hal-form"></textarea>
                                                                    </td>  
																	<td class="center">
																		<input type="checkbox" name="tanda_form_8"id="tanda-form-8" value="1"class="mr-1">
                                                                    </td>                                                                                                                                         
                                                                </tr>
                                                           </tbody>
                                                        </table>
														</table>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
															<button type="button" class="btn btn-info" onclick="CetakPenolakanResusitas()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
														</div>
                                                    </td>
                                                </tr>                                                    
                                            </table>
                                        </div>												
										<table class="table table-no-border table-sm table-striped"
											style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button"
														data-toggle="collapse"
														data-target="#data-penolakan-resusitas-2"><i
														class="fas fa-expand mr-1"></i>Expand</button>PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse" id="data-penolakan-resusitas-2">
											<table class="table table-no-border table-sm table-striped">
												<tr>
													<td class="bold" width="25%">Apakah form ditandatangani oleh pasien sendiri? </td>
													<td class="bold" width="1%"></td>
													<td width="48%">
														<input type="radio" name="pr_prdnr"id="pr-prdnr-1" class="mr-1" value="ya" > Ya
														<input type="radio" name="pr_prdnr"id="pr-prdnr-2" class="mr-1" value="tidak" checked> Tidak 
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Nama Keluarga / Wali</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="text" name="nama_prdnr" class="custom-form" id="nama-prdnr">
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Tanggal lahir</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="date" name="tgl_lahir_prdnr" class="custom-form clear-input col-lg-2" id="tgl-lahir-prdnr">
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Jenis Kelamin</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<div class="input-group">
															<input type="radio" name="jk_prdnr" id="jk-prdnr-1" value="Laki-laki" class="mr-1">Laki-laki 
															<input type="radio" name="jk_prdnr" id="jk-prdnr-2" value="Perempuan" class="mr-1 ml-2">Perempuan 
														</div>
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Alamat</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<textarea name="alamat_prdnr" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alamat-prdnr"></textarea>
													</td>
												</tr>
												
												<tr>
													<td class="bold" width="25%">Hubungan Keluarga</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="text" maxlength="16" name="hubungan_keluarga_prdnr" class="custom-form" id="hubungan-keluarga-prdnr">
													</td>
												</tr>

												<tr>
													<td class="bold" width="25%">Dengan ini menyatakan penolakan untuk dilakukan tindakan</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<textarea name="tindakan_prdnr" cols="30" rows="3" class="form-control clear-input custom-textarea" id="tindakan-prdnr"></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Dokter</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="text" name="dokter_prdnr" class="select2c-input ml-2" id="dokter-prdnr">
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Saksi 1</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="text" name="perawat_prdnr_1" class="select2c-input ml-2" id="perawat-prdnr-1">
													</td>
												</tr>
												<tr>
													<td class="bold" width="25%">Saksi 2</td>
													<td class="bold" width="1%">:</td>
													<td width="48%">
														<input type="text" name="perawat_prdnr_2" class="select2c-input ml-2" id="perawat-prdnr-2">
													</td>
												</tr>
											</table>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
												<button type="button" class="btn btn-info" onclick="CetakFormPenolakanResusitas()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
											</div>
										</div>	
                                        <div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Exit / Close</button>
										</div>										
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- // PRDNR LIHAT -->
<div class="modal fade" id="modal-penolakan-resusitas-lihat" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
				<div class="title">
					<h5 id="modal-penolakan-resusitas-lihat-title"><b>FORM PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)</b></h5>
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?= form_open('', 'id=form-penolakan-resusitas-lihat class="form-horizontal"') ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="form-penolakan-resusitas-lihat">
                                    <table class="table table-no-border table-sm table-striped">
										<br>    
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" onclick="cetakFormSuratPenolakanResusitas()">
														<i class="fas fa-print mr-1"></i>CETAK FORM PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)
													</button>
												</td>												
                                            </tr>
                                        </table>
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" onclick="cetakSuratPenolakanResusitas()">
														<i class="fas fa-print mr-1"></i>CETAK PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)
													</button>
												</td>												
                                            </tr>
                                        </table>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
										</div>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
