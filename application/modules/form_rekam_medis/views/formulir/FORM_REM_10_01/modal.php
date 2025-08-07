<div class="modal fade" id="modal_surat_pengantar_rawat_rm" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surat-pengantar-rawat-title-rm"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_keterangan_pengantar_rawat_rm class="form-horizontal"') ?>
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-spr-rm">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-spr-rm">
					<input type="hidden" name="id_psien" id="id-pasien-spr-rm">
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-surat-pengantar-rawat">
										<table class="table table-no-border table-sm table-striped">
                                            <!-- <tr>
                                                <td width="25%"><b>Dengan Hormat,</b></td>
                                                <td width="1%"><b></b></td>
                                            </tr>  -->
                                            <tr>
                                                <td width="25%"><b>Apakah form ditandatangani oleh pasien sendiri?</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="radio" name="is_pasien_spr"id="is-pasien-spr-1-rm" class="mr-1" value="1" checked> Ya
                                                    <!-- <input type="radio" name="is_pasien_spr"id="is-pasien-spr-2" class="mr-1 ml-3" value="0" checked> Benar  -->
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b>Mohon diberikan Perawatan dan atau disiapkan untuk </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="operasi_spr" id="operasi-spr-rm" value="1" class="mr-1"> Operasi
                                                    <input type="checkbox" name="odc_spr"id="odc-spr-rm" value="1" class="mr-1 ml-5"> (ODC) One Day Care
                                                    <input type="checkbox" name="rawat_inap_spr"id="rawat-inap-spr-rm" value="1" class="mr-1 ml-5"> Rawat Inap
                                                </td>
                                            </tr> 

                                            <tr>
                                                <td width="25%"><b>Nama Pasien </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="nama-pasien-spr"></span></td> -->
                                                <td>
                                                    <input type="text" name="nama_pasien_spr"id="nama-pasien-spr-rm" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Jenis Kelamin</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="j-spr"></span></td> -->
                                                <td>
                                                    <input type="radio" name="j_spr"id="j-spr-1-rm" value="Laki-laki" class="mr-1 ml-1" disabled> Laki - laki
                                                    <input type="radio" name="j_spr"id="j-spr-2-rm" value="Perempuan" class="mr-1 ml-5" disabled> Perempuan                                  
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>No. RM </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="no-rm-spr"></span></td> -->
                                                <td>
                                                    <input type="text" name="no_rm_spr"id="no-rm-spr-rm" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Umur </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="umur-spr"></span> Tahun</td> -->
                                                <td>
                                                    <input type="text" name="umur_spr"id="umur-spr-rm" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                     Tahun
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Diagnosis </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <!-- <input type="text" name="diagnosis_spr"id="diagnosis-spr-rm" class="custom-form clear-input d-inline-block col-lg-3 mx-1"> -->
                                                    <textarea name="diagnosis_spr"id="diagnosis-spr-rm" rows="2" class="form-control clear-input"></textarea>
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="infeksi_spr"id="infeksi-spr-rm" value="1" class="mr-1 ml-1"> Infeksi
                                                    <input type="checkbox" name="non_infeksi_spr"id="non-infeksi-spr-rm" value="1" class="mr-1 ml-5"> Non Infeksi
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Dokter yang merawat</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="dokter_spr"id="dokter-spr-rm" class="select2c-input ml-2">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Jenis tindakan / Operasi</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="jto_spr"id="jto-spr-rm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Golongan Tindakan / Operasi </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="gto_spr"id="gto-spr-rm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>    
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="cito_spr"id="cito-spr-rm" value="1" class="mr-1 ml-1"> Cito
                                                    <input type="checkbox" name="tidak_cito_spr"id="tidak-cito-spr-rm" value="1" class="mr-1 ml-5"> Tidak Cito
                                                </td> 
										    </tr>                 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td></td>
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Ruang yang Dituju</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="icu_spr" id="icu-spr-rm" value="1" class="mr-1"> ICU
                                                    <input type="checkbox" name="hcu_spr"id="hcu-spr-rm" value="1" class="mr-1 ml-5"> HCU
                                                    <input type="checkbox" name="pcu_spr"id="pcu-spr-rm" value="1" class="mr-1 ml-5"> PICU
                                                    <input type="checkbox" name="nicu_spr"id="nicu-spr-rm" value="1" class="mr-1 ml-5"> NICU
                                                    <input type="checkbox" name="vk_spr"id="vk-spr-rm" value="1" class="mr-1 ml-5"> VK
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="perinatologi_spr" id="perinatologi-spr-rm" value="1" class="mr-1"> Perinatologi
                                                    <input type="checkbox" name="ruang_perawatan_spr"id="ruang-perawatan-spr-rm" value="1" class="mr-1 ml-5"> Ruang Perawatan
                                                    <input type="text" name="rp_spr"id="rp-spr-rm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="isolasi_spr" id="isolasi-spr-rm" value="1" class="mr-1"> Isolasi
                                                    <input type="checkbox" name="lain_lain_spr"id="lain-lain-spr-rm" value="1" class="mr-1 ml-5"> Lain- lain
                                                    <input type="text" name="ll_spr"id="ll-spr-rm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td>
                                            </tr> 
										</table>
                                        <p></p>
                                        <br>
                                        <div class="row">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td width="45%" class="center">
                                                    </td>                                                   
                                                    <td width="45%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_dokter_spr"
                                                        id="tanggal-dokter-spr-rm"class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">Dokter Pengirim,</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center"><input type="text" name="ttd_dokter_spr"
                                                        id="ttd-dokter-spr-rm" class="select2c-input ml-2">
													</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        Nama Jelas & Tanda Tangan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_dokter_spr"
                                                            id="ceklis-dokter-spr-rm" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <p></p>
                                        <br>
                                        <div class="col-lg-12">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td>
                                                        <b>Catatan Pendaftaran :</b>
                                                        <br>
                                                        <br>
                                                        <textarea name="catatan_pendaftaran_spr"id="catatan-pendaftaran-spr-rm" rows="4"
                                                            class="form-control clear-input"placeholder="catatan pendaftaran"></textarea>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td width="45%" class="center">
                                                    </td>                                                   
                                                    <td width="45%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_petugas_spr"
                                                        id="tanggal-petugas-spr-rm" class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">Petugas Pendaftaran,</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center"><input type="text" name="id_petugas_pendaftaran_spr"
                                                        id="id-petugas-pendaftaran-sprt" class="select2c-input ml-2">
													</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        Tanda Tangan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_petugas_spr"
                                                            id="ceklis-petugas-spr-rm" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" id="btn-simpan" class="btn btn-info" onclick="simpanFormSuratPengantarRawatRm()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>