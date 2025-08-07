<div class="row">
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Tanggal</label>
			<input type="text" name="tanggal" id="tanggal1" class="form-control" placeholder="Tanggal SEP">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Jenis Pelayanan</label>
			<?php echo form_dropdown('jenis_pelayanan', $jenis_pelayanan, [], 'id="jenis_pelayanan1" class="form-control"') ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" id="btn_search1" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari Data</button>
		<button type="button" id="btn_reload1" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover info-table color-table mt-2" id="table_data1">
				<thead>
					<tr>
						<th width="3%" class="center nowrap">No.</th>
						<th width="15%" class="nowrap">Nama</th>
						<th width="10%" class="nowrap">No. Kartu</th>
						<th width="15%" class="nowrap">No. SEP</th>
						<th width="10%" class="nowrap">No. Rujukan</th>
						<th width="5%" class="nowrap">Diagnosa</th>
						<th width="10%" class="nowrap">Jenis Pelayanan</th>
						<th width="5%" class="center nowrap">Kelas Rawat</th>
						<th width="10%" class="center nowrap">Poli</th>
						<th width="10%" class="center nowrap">Tgl Pulang SEP</th>
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
		$('#btn_search1').click(function () {
			let stop = false
			if ($('#tanggal1').val() === '') {
				syams_validation('#tanggal1', 'Tanggal SEP harus diisi!')
				stop = true
			}
			if ($('#jenis_pelayanan1').val() === '') {
				syams_validation('#jenis_pelayanan1', 'Jenis pelayanan harus dipilih!')
				stop = true
			}
			if (stop) {
				return false
			}

			getListMonitoringKunjungan()
		})

		$('#btn_reload1').click(function() {
			$('.form-control').val('')
			$('#table_data1 tbody').empty()
		})

		$('#tanggal1').datepicker({
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

	function getListMonitoringKunjungan() {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM."get_data_monitoring_kunjungan") ?>',
			data: 'tanggal='+$('#tanggal1').val()+'&jenis_pelayanan='+$('#jenis_pelayanan1').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				if (data.metaData.code === '200') {
					if (data.response !== null) {
						if (data.response.sep.length > 0) {
							var no = 1;
							$('#table_data1 tbody').empty()
							$.each(data.response.sep, function(i, v) {
								var html = `
									<tr>
										<td class="center">${no++}</td>
										<td>${v.nama}</td>
										<td>${v.noKartu}</td>
										<td>${v.noSep}</td>
										<td>${v.noRujukan}</td>
										<td>${v.diagnosa}</td>
										<td>${v.jnsPelayanan}</td>
										<td class="center">${v.kelasRawat}</td>
										<td class="center">${v.poli !== null ? v.poli : '-'}</td>
										<td class="center nowrap">${v.tglPlgSep}</td>
										<td class="center nowrap">${v.tglSep}</td>
									</tr>
								`;
	
								$('#table_data1 tbody').append(html)
							})	

							$('#table_data1').DataTable();
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