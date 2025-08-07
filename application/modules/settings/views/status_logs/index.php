<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">Konfigurasi Status Logs</div>
			<div class="card-body">
				<div class="form-group">
					<label>Ubah Status</label><br><br>
					<input type="radio" name="status" id="status-on" value="On">&nbsp;ON
					<input type="radio" name="status" id="status-off" value="Off">&nbsp;OFF
					<button class="btn btn-info ml-5" id="jam-server">Check Jam Server</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("settings/status_logs/get_konfigurasi_logs") ?>',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === 'On') {
					$('#status-on').attr('checked', true);
					$('#status-off').attr('checked', false);
				} else {
					$('#status-on').attr('checked', false);
					$('#status-off').attr('checked', true);
				}
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});

		$('input[name="status"]').click(function() {
			if ($(this).val() === 'On') {
				ubahStatus('On');
			} else {
				ubahStatus('Off');
			}
		});

		$('#jam-server').on('click', function() {
			$.get('<?= base_url("settings/status_logs/get_jam_server") ?>', function(data) {
				console.log(data)
			});
		})
	});

	function ubahStatus(status) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("settings/status_logs/ubah_status") ?>',
			data: {
				status: status
			},
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status) {
					messageCustom('Berhasil merubah konfigurasi logs', 'Success');
				} else {
					messageCustom('Gagal merubah konfigurasi logs', 'Error');
				}
			},
			error: function(e) {
				messageCustom('Gagal merubah konfigurasi logs', 'Error');
			},
		});
	}
</script>