<link rel="stylesheet" href="<?= resource_url() ?>assets/datetimepicker/css/bootstrap-datetimepicker.css">
<script src="<?= resource_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?= resource_url() ?>assets/datetimepicker/js/moment.js"></script>

<script>
	$('#waktu-masuk, #waktu-keluar').datetimepicker({
		format: 'DD/MM/YYYY HH:mm',
		pickSecond: false,
		pick12HourFormat: false  
	});

	function formWaktuIcare() {
		$('#modal-waktu-rawat').modal('show');
	}

	function updateWaktuRawat() {
		if ($('#waktu-masuk').val() === '') {
			syams_validation('#waktu-masuk', 'Waktu masuk harus diisi!');
			return false;
		}

		let id_layanan_pendaftaran = $('#id-layanan').val();
		let waktuMasuk = datetime2mysql($('#waktu-masuk').val());
		let waktuKeluar = '';

		if ($('#waktu-keluar').val() !== '') {
			waktuKeluar = datetime2mysql($('#waktu-keluar').val());
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("intensive_care/api/intensive_care/update_waktu_intensive_care") ?>',
			data: 'id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&waktu_masuk=' + waktuMasuk + '&waktu_keluar=' + waktuKeluar,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status === false) {
					messageCustom('Gagal mengubah waktu intensive care','Error');
				} else {
					messageCustom('Berhasil mengubah waktu intensive care', 'Success');
					$('#modal-waktu-rawat').modal('hide');
					$('#modal-pemeriksaan').modal('hide');
					getListPemeriksaan($('#page_now').val());
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Sistem', 'Error');
			}
		});
	}
</script>

<!-- Dialog Form Waktu Intensive Care-->
<div id="modal-waktu-rawat" class="modal fade">
	<div class="modal-dialog" style="max-width: 40%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Waktu Intensive Care</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<?= form_open('','id=form-waktu-rawat class=form-horizontal') ?>
				<div class="form-group row">
					<label class="col-lg-3 control-form-label">Waktu Rawat</label>
					<div class="col-lg-4">
						<input type="text" name="waktu_masuk" class="form-control" id="waktu-masuk" value="">
					</div>
					<div class="col-lg-1">
						<span style="margin-top:10px;">s.d</span>
					</div>
					<div class="col-lg-4">
						<input type="text" name="waktu_keluar" class="form-control" id="waktu-keluar" value="">
					</div>
				</div>

				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info" onclick="updateWaktuRawat()"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->