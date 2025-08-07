<div class="modal fade" id="modal_tata_tertib_rm" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-tata-tertib-title-rm"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_tata_tertib_rm class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-ttb-rm">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-tata-tertib">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td class="bold" colspan="2">Apakah form ditandatangani oleh pasien sendiri?</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="radio" name="is_pasien" id="is-pasien-ttb-ya-rm" value="1" class="mr-0">
                                                        <label for="is-pasien-ttb-ya">Ya</label>
													<input type="radio" name="is_pasien" id="is-pasien-ttb-tidak-rm" value="0" class="mr-0 ml-2">
                                                        <label for="is-pasien-ttb-tidak">Tidak</label>
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2">Nama kelurga / wali</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="nama_keluarga" class="custom-form" id="nama-keluarga-ttb-rm">
												</td>
											</tr>
											<tr>
												<td class="bold" colspan="2">No. Hanphone</td>
												<td class="bold" width="1%">:</td>
												<td width="48%">
													<input type="text" name="no_telp" class="custom-form" id="no-telp-ttb-rm">
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanTataTertibRm()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>