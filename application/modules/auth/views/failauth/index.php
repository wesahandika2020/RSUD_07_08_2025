<?php $this->load->view('auth/_partials/head') ?>

<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<h1 class="center"><b>Authentication Block</b></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="bold">IP Address :</label>
					<input type="text" name="ip" class="form-control" placeholder="IP Address" onkeypress="return hanyaAngka(event)">
				</div>
				<div class="form-group">
					<button type="button" id="btn-search" class="btn btn-info btn-sm"><i class="fas fa-search mr-1"></i>Cari Log</button>
					<button type="button" id="btn-delete-all" class="btn btn-danger btn-sm" style="display:none"><i class="fas fa-trash-alt mr-1"></i>Hapus Semua</button>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<?php echo form_open('', 'id=form') ?>
					<table id="table-list" class="table table-sm table-striped table-hover">
						<thead class="thead-light">
							<tr>
								<th width="5%" class="center">
									<input type="checkbox" id="check-all">
								</th>
								<th width="20%" class="center bold">IP Address</th>
								<th width="20%" class="center bold">Tanggal Action</th>
								<th width="55%" class="center bold">Username</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(function() {
			$('.form-control').keyup(function() {
				if ($(this).val() !== '') {
					syams_validation_remove(this)
				}
			})

			$('#btn-search').click(function() {
				var ip = $('[name="ip"]').val()
				if (ip === '') {
					syams_validation('[name="ip"]', 'Masukkan IP terlebih dahulu')
					return false
				} else {
					validateIPaddress(ip)
				}

				getListLogFail(ip)
			})

			$("#check-all").click(function() { // Ketika user men-cek checkbox all      
				if ($(this).is(":checked")) // Jika checkbox all diceklis        
					$(".check-item").prop("checked", true) // ceklis semua checkbox dengan class "check-item"      
				else // Jika checkbox all tidak diceklis        
					$(".check-item").prop("checked", false) // un-ceklis semua checkbox dengan class "check-item"    
			})

			$('#btn-delete-all').click(function() {
				var checked = $(".check-item:checked").length;
				if (!checked) {
					alertLogin('Silhakan pilih salah satu atau beberapa yang ingin dihapus!', 'Error')
					return false
				}

				bootbox.dialog({
					message: 'Apakah anda yakin ingin menghapus log ini ?',
					title: "Konfirmasi",
					buttons: {
						batal: {
							label: '<i class="fas fa-times-circle mr-1"></i>Batal',
							className: "btn-secondary",
							callback: function() {
								
							}
						},
						konfirmasi: {
							label: '<i class="fas fa-paper-plane mr-1"></i>Ya',
							className: "btn-info",
							callback: function() {
								deleteLogFailAll()
							}
						}
					}
				})
			})
		})

		function validateIPaddress(ipaddress) {
			var ipFormat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
			if (ipaddress.match(ipFormat)) {
				return true
			}
			syams_validation('[name="ip"]', 'IP yang dimasukkan tidak sesuai format')
			return false
		}

		function getListLogFail(ip) {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('auth/get_list_log_fail') ?>',
				data: 'ip=' + ip,
				cache: false,
				dataType: 'JSON',
				success: function (data) {
					$('#table-list tbody').empty()
					if (data.length > 0) {
						$.each(data, function(i, v) {
							var html = `
								<tr>
									<td class="center">
										<input type="checkbox" name="id[]" class="check-item" value="${v.id}">
									</td>
									<td class="center">${v.ip}</td>
									<td class="center">${v.tgl_action}</td>
									<td class="center">${v.account}</td>
								</tr>
							`;

							$('#table-list tbody').append(html)
							$('#btn-delete-all').show()
						})
					} else {
						$('#btn-delete-all').hide()
					}
				},
				error: function (e) {
					accessFailed(e.status)
				}
			})
		}

		function deleteLogFailAll()
		{
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('auth/delete_all_log_fail') ?>',
				data: $('#form').serialize(),
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					if (data) {
						if (data.status === false) {
							alertLogin(data.message, 'Error')
						} else {
							alertLogin(data.message, 'Success')
							$('#check-all').prop("checked", false)
							getListLogFail($('[name="ip"]').val())
						}
					}
				},
				error: function(e) {

				}
			})
		}
	</script>
</body>

</html>