<!-- Modal -->
<div class="modal fade" id="modal_medical_certificate">
	<div class="modal-dialog" style="max-width:55%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_medical_certificate_label">PEMBUATAN SURAT KETERANGAN DOKTER</h5>
					<h6 class="modal-title text-muted"><small>(Medical Certificate)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_medical_certificate class=form-horizontal') ?>
				<input type="hidden" name="id" id="id">
				<div class="form-group row tight">
					<label for="pasien_auto" class="col-lg-3 col-form-label">Pasien</label>
					<div class="col-lg-6">
						<input type="text" name="pasien" id="pasien_auto" class="select2-input">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="tanggal_visite" class="col-lg-3 col-form-label">Tanggal Visite</label>
					<div class="col-lg-4">
						<input type="text" name="tanggal_visite" id="tanggal_visite" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">Keterangan</label>
					<div class="col-lg-9">
						<input type="checkbox" id="keterangan_istirahat" value="Istirahat" class="mr-1" checked>
						<label for="keterangan_istirahat">Perlu istirahat karena sakit</label>
					</div>
					<label class="col-lg-3 col-form-label"></label>
					<div class="col-lg-4">
						<input type="text" name="tanggal_start_istirahat" id="tanggal_start_istirahat" class="form-control">
					</div>
					<div class="col-lg-1">
						<div class="mt-2">s/d</div>
					</div>
					<div class="col-lg-4">
						<input type="text" name="tanggal_end_istirahat" id="tanggal_end_istirahat" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">&nbsp;</label>
					<div class="col-lg-9">
						<input type="checkbox" id="keterangan_dirawat" value="Dirawat" class="mr-1">
						<label for="keterangan_dirawat">Dirawat inap di Rumah Sakit Umum Daerah Kota Tangerang karena sakit</label>
					</div>
					<label class="col-lg-3 col-form-label"></label>
					<div class="col-lg-4">
						<input type="text" name="tanggal_start_dirawat" id="tanggal_start_dirawat" class="form-control">
					</div>
					<div class="col-lg-1">
						<div class="mt-2">s/d</div>
					</div>
					<div class="col-lg-4">
						<input type="text" name="tanggal_end_dirawat" id="tanggal_end_dirawat" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">&nbsp;</label>
					<div class="col-lg-9">
						<input type="checkbox" id="keterangan_persalinan" value="Persalinan" class="mr-1">
						<label for="keterangan_persalinan">Perkiraan Persalinan</label>
					</div>
					<label class="col-lg-3 col-form-label"></label>
					<div class="col-lg-4">
						<input type="text" name="tanggal_start_persalinan" id="tanggal_start_persalinan" class="form-control">
					</div>
					<div class="col-lg-1">
						<div class="mt-2">s/d</div>
					</div>
					<div class="col-lg-4">
						<input type="text" name="tanggal_end_persalinan" id="tanggal_end_persalinan" class="form-control">
					</div>
				</div>
<!--				<div class="form-group row tight">-->
<!--					<label class="col-lg-3 col-form-label">Tanggal Bed Rest</label>-->
<!--					<div class="col-lg-4">-->
<!--						<input type="text" name="tanggal_start" id="tanggal_start" class="form-control">-->
<!--					</div>-->
<!--					<div class="col-lg-1">-->
<!--						<div class="mt-2">s/d</div>-->
<!--					</div>-->
<!--					<div class="col-lg-4">-->
<!--						<input type="text" name="tanggal_end" id="tanggal_end" class="form-control">-->
<!--					</div>-->
<!--				</div>-->

				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">Nota Bene</label>
					<div class="col-lg-9">
						<textarea name="nota_bene" id="nota_bene" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">Notes</label>
					<div class="col-lg-9">
						<textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpanMedicalCertificate()"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>
