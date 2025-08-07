<div class="row">
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Tanggal</label>
			<input type="text" name="tanggal" id="tanggal2" class="form-control" placeholder="Tanggal Pulang">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Jenis Pelayanan</label>
			<?php echo form_dropdown('jenis_pelayanan', $jenis_pelayanan, [], 'id="jenis_pelayanan2" class="form-control"') ?>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Status Klaim</label>
			<?php echo form_dropdown('status_klaim', $status_klaim, [], 'id="status_klaim2" class="form-control"') ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" id="btn_search2" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari Data</button>
		<button type="button" id="btn_reload2" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover info-table color-table mt-2" id="table_data2">
				<thead>
					<tr>
						<th width="3%" class="center nowrap">No.</th>
						<th width="10%" class="nowrap">Inacbg</th>
						<th width="15%" class="nowrap">Peserta</th>
						<th width="10%" class="nowrap">Biaya</th>
						<th width="5%" class="center nowrap">Kelas Rawat</th>
						<th width="10%" class="nowrap">No. FPK</th>
						<th width="10%" class="nowrap">No. SEP</th>
						<th width="10%" class="center nowrap">Poli</th>
						<th width="10%" class="center nowrap">Status</th>
						<th width="10%" class="center nowrap">Tgl Pulang</th>
						<th width="10%" class="center nowrap">Tgl SEP</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css"
        href="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
<script src="<?php echo resource_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo resource_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

<script>
	$(function () {
		$('#btn_search2').click(function () {
			let stop = false
			if ($('#tanggal2').val() === '') {
				syams_validation('#tanggal2', 'Tanggal Pulang harus diisi!')
				stop = true
			}
			if ($('#jenis_pelayanan2').val() === '') {
				syams_validation('#jenis_pelayanan2', 'Jenis pelayanan harus dipilih!')
				stop = true
			}
			if ($('#status_klaim2').val() === '') {
				syams_validation('#status_klaim2', 'Status Klaim harus dipilih!')
				stop = true
			}
			if (stop) {
				return false
			}

			getListMonitoringKlaim()
		})

		$('#btn_reload2').click(function() {
			$('.form-control').val('')
			$('#table_data2 tbody').empty()
		})

		$('#tanggal2').datepicker({
			zIndexOffset: 999,
            format: 'dd/mm/yyyy',
            endDate: new Date(),
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })

		$('.form-control').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function getListMonitoringKlaim() {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM."get_data_monitoring_klaim") ?>',
			data: 'tanggal='+$('#tanggal2').val()+'&jenis_pelayanan='+$('#jenis_pelayanan2').val()+'&status_klaim='+$('#status_klaim2').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('#table_data2 tbody').empty()

				if (data.metaData.code === '200') {
					if (data.response !== null) {
						if (data.response.klaim.length > 0) {
							var no = 1;
							$.each(data.response.klaim, function(i, v) {
								var html = `
									<tr>
										<td class="center nowrap">${no++}</td>
										<td class="nowrap">${v.Inacbg}</td>
										<td class="nowrap">${v.peserta}</td>
										<td class="nowrap">${v.biaya}</td>
										<td class="center nowrap">${v.kelasRawat}</td>
										<td class="nowrap">${v.noFPK}</td>
										<td class="nowrap">${v.noSEP}</td>
										<td class="center nowrap">${v.poli !== null ? v.poli : '-'}</td>
										<td class="center nowrap">${v.status}</td>
										<td class="center nowrap">${datefmysql(v.tglPulang)}</td>
										<td class="center nowrap">${datefmysql(v.tglSep)}</td>
									</tr>
								`;
	
								$('#table_data2 tbody').append(html)
							})

							$('#table_data2').DataTable();
							
						}
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			}
		})
	}
</script>