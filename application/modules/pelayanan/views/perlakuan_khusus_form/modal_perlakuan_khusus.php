<script>
	function settingPerlakuanKhusus(id_pasien) {
		$('[name="id_pasien"]').val(id_pasien)
		$('input[name="pasien_potensi_komplain"], input[name="pasien_pemilik_rs"], input[name="pasien_pejabat"]').prop('checked', false)
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan/get_profil_pasien') ?>/id/' + id_pasien,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.data !== null) {
					$('input[name="id_profil_pasien"]').val(data.data.id);
					if (data.data.is_potensi_komplain !== null) { $('input[name="pasien_potensi_komplain"]').prop('checked', true) }
					if (data.data.is_pemilik_rs !== null) { $('input[name="pasien_pemilik_rs"]').prop('checked', true) }
					if (data.data.is_pasien_pejabat !== null) { $('input[name="pasien_pejabat"]').prop('checked', true) }
				}
				$('#modal-perlakuan-khusus').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function updatePerlakuanKhusus() {
		$.ajax({
			type: 'PUT',
			url: '<?= base_url('pelayanan/api/pelayanan/update_profil_pasien') ?>',
			data: $('#form-perlakuan-khusus').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					messageCustom(data.message, 'Success');
					$('#modal-perlakuan-khusus').modal('hide');
				}

			},
			error: function (e) {
				messageCustom('Terjadi Kesalahan Sistem', 'Error');
			}
		})
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal-perlakuan-khusus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal-perlakuan-khusus" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-perlakuan-khusus"><i class="fas fa-fw fa-thumbtack mr-1"></i>Set Perlakuan Khusus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-perlakuan-khusus class=form-horizontal') ?>
					<input type="hidden" name="id_profil_pasien">
					<input type="hidden" name="id_pasien">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group tight">
								<input type="checkbox" name="pasien_potensi_komplain" id="pasien-komplain" value="Ya" class="mr-1"><label for="pasien-komplain">Pasien Potensi Komplain</label>
							</div>
							<div class="form-group tight">
								<input type="checkbox" name="pasien_pemilik_rs" id="pemilik-rs" value="Ya" class="mr-1"><label for="pemilik-rs">Pasien Adalah Pemilik Rumah Sakit</label>
							</div>
							<div class="form-group tight">
								<input type="checkbox" name="pasien_pejabat" id="pasien-pejabat" value="Ya" class="mr-1"><label for="pasien-pejabat">Pasien Adalah Pejabat</label>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="updatePerlakuanKhusus()"><i class="fas fa-fw fa-save mr-1"></i>Update</button>
			</div>
		</div>
	</div>
</div>