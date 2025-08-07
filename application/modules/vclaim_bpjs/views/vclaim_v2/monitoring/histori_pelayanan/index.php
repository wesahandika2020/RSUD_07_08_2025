<div class="row">
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Range Tanggal Awal</label>
			<input type="text" name="tanggal_awal" id="tanggal_awal3" class="form-control" placeholder="Tanggal Awal">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Range Tanggal Akhir</label>
			<input type="text" name="tanggal_akhir" id="tanggal_akhir3" class="form-control" placeholder="Tanggal Akhir">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>No. Kartu</label>
			<!-- <input type="text" name="no_kartu" id="no_kartu3" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="No. Kartu"> -->
			<input type="text" name="no_kartu" id="no_kartu3" class="form-control" placeholder="No. Kartu">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" id="btn_search3" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari Data</button>
		<button type="button" id="btn_reload3" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover info-table color-table mt-2" id="table_data3">
				<thead>
					<tr>
						<th width="3%" class="center nowrap">No.</th>
						<th width="10%" class="nowrap">Nama Peserta</th>
						<th width="10%" class="center nowrap">No. Kartu</th>
						<th width="10%" class="center nowrap">No. SEP</th>
						<th width="10%" class="center nowrap">No. Rujukan</th>
						<th width="15%" class="nowrap">Diagnosa</th>
						<th width="10%" class="center nowrap">Jenis Pelayanan</th>
						<th width="5%" class="center nowrap">Kelas Rawat</th>
						<th width="10%" class="center nowrap">PPK Pelayanan</th>
						<th width="10%" class="center nowrap">Poli</th>
						<th width="5%" class="center nowrap">Tgl Pulang SEP</th>
						<th width="5%" class="center nowrap">Tgl SEP</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('#btn_search3').click(function () {
			let stop = false
			if ($('#tanggal_awal3').val() === '') {
				syams_validation('#tanggal_awal3', 'Tanggal awal harus diisi!')
				stop = true
			}
			if ($('#tanggal_akhir3').val() === '') {
				syams_validation('#tanggal_akhir3', 'Tanggal akhir harus diisi!')
				stop = true
			}
			if ($('#no_kartu3').val() === '') {
				syams_validation('#no_kartu3', 'No. Kartu harus diisi!')
				stop = true
			}
			if (stop) {
				return false
			}

			getListMonitoringHistoriPelayanan()
		})

		$('#btn_reload3').click(function() {
			$('.form-control').val('')
			$('#table_data3 tbody').empty()
		})

		$('#tanggal_awal3, #tanggal_akhir3').datepicker({
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

	function getListMonitoringHistoriPelayanan() {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM."get_data_monitoring_histori_pelayanan") ?>',
			data: 'tanggal_awal='+$('#tanggal_awal3').val()+'&tanggal_akhir='+$('#tanggal_akhir3').val()+'&no_kartu='+$('#no_kartu3').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('#table_data3 tbody').empty()

				if (data.metaData.code === '200') {
					if (data.response !== null) {
						if (data.response.histori.length > 0) {
							var no = 1;
							$.each(data.response.histori, function(i, v) {
								var html = `
									<tr>
										<td class="nowrap center">${no++}</td>
										<td class="nowrap">${v.namaPeserta}</td>
										<td class="nowrap center">${v.noKartu}</td>
										<td class="nowrap center">${v.noSep}</td>
										<td class="nowrap center">${v.noRujukan}</td>
										<td class="nowrap">${v.diagnosa}</td>
										<td class="nowrap center">${v.jnsPelayanan}</td>
										<td class="center nowrap">${v.kelasRawat}</td>
										<td class="center nowrap">${v.ppkPelayanan}</td>
										<td class="center nowrap">${v.poli !== null ? v.poli : '-'}</td>
										<td class="center nowrap">${v.tglPlgSep !== null ? datefmysql(v.tglPlgSep) : '-'}</td>
										<td class="center nowrap">${v.tglSep !== null ? datefmysql(v.tglSep) : '-'}</td>
									</tr>
								`;
	
								$('#table_data3 tbody').append(html)
							})
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