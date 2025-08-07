<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">Setting Broadcast Informasi</div>
			<div class="card-body">
				<?= form_open('', 'id=form-informasi role=form class=form-horizontal') ?>
				<input type="hidden" id="id" name="id">
				<div class="form-group">
					<label>Pesan</label>
					<textarea name="pesan" id="pesan" class="form-control" rows="4"></textarea>
				</div>
				<div class="form-group">
					<label>Status</label>
					<?= form_dropdown('status', array('Off' => 'Off', 'On' => 'On'), array(), 'id=status class="form-control col-lg-2"') ?>
				</div>
				<?= form_close() ?>
				<button type="button" class="btn btn-info" onclick="updateInformasi()"><i class="fas fa-save mr-1"></i>Update</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("informasi/get_informasi") ?>',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {
					$('#id').val(data.id);
					$('#pesan').val(data.pesan);
					$('#status').val(data.status);
				}
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	});

	function updateInformasi() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("informasi/simpan_informasi") ?>',
			data: $('#form-informasi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('warning', 'Peringatan', data.message);
				} else {
					swalAlert('success', 'Berhasil', data.message);
				}

				setTimeout(function(){ location.reload(); }, 500);
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, e.statusText);
			},
		});
	}
</script>