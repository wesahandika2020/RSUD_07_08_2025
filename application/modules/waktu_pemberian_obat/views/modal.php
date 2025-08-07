<!-- Modal Waktu Pemakaian Obat -->
<div id="modal_waktu_pemberian_obat" class="modal fade" role="dialog" aria-labelledby="modal_waktu_pemberian_obat_label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 800px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal_waktu_pemberian_obat_label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form_waktu_pemberian_obat'); ?>
				<input type="hidden" name="id" id="id">
				<div class="form-group row tight">
					<label for="kode" class="col-3 col-form-label">Kode</label>
					<div class="col">
						<input class="form-control" type="text" name="kode" id="kode" placeholder="AFT">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="waktu-pemberian" class="col-3 col-form-label">Timing</label>
					<div class="col">
						<input class="form-control" type="text" name="waktu_pemberian" id="waktu-pemberian" placeholder="Sore Hari">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="keterangan" class="col-3 col-form-label">Keterangan</label>
					<div class="col">
						<textarea class="form-control" type="text" name="keterangan" id="keterangan" placeholder="Deskripsi waktu pemberian"></textarea>
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-3 col-form-label" for="is-waktu-pemberian"><i>Is Waktu Pemberian</i></label>
					<div style="padding-left: 10px">
						<input type="checkbox" name="is_waktu_pemberian" class="form-control" id="is-waktu-pemberian" value="1"/>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="simpanDataWaktuPemberianObat()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Waktu Pemberian Obat -->
