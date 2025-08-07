<div class="row">
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Range Tanggal Awal</label>
			<input type="text" name="tanggal_awal" id="tanggal_awal4" class="form-control" placeholder="Tanggal Awal">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Range Tanggal Akhir</label>
			<input type="text" name="tanggal_akhir" id="tanggal_akhir4" class="form-control" placeholder="Tanggal Akhir">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Jenis Pelayanan</label>
			<?php 
				$jenis_pelayanan = array('1' => 'Rawat Inap', '2' => 'Rawat Jalan');
				echo form_dropdown('jenis_pelayanan', $jenis_pelayanan, [], 'id="jenis_pelayanan4" class="form-control"')
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" id="btn_search4" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari Data</button>
		<button type="button" id="btn_reload4" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover table-bordered info-table color-table mt-2" id="table_data4">
				<thead>
					<tr>
						<th></th>
						<th colspan="9" class="center"><b>SEP</b></th>
						<th></th>
						<th colspan="6" class="center"><b>Jasa Raharja</b></th>
					</tr>
					<tr>
						<th width="3%" class="center nowrap">No.</th>
						<th width="5%" class="center nowrap">No. MR</th>
						<th width="5%" class="nowrap">Nama Peserta</th>
						<th width="5%" class="center nowrap">No. Kartu</th>
						<th width="8%" class="center nowrap">No. SEP</th>
						<th width="5%" class="nowrap">Diagnosa</th>
						<th width="5%" class="center nowrap">Jenis Pelayanan</th>
						<th width="5%" class="center nowrap">Poli</th>
						<th width="5%" class="center nowrap">Tgl Pulang SEP</th>
						<th width="5%" class="center nowrap">Tgl SEP</th>
						<th width="2%"></th>
						<th width="5%" class="center nowrap">Tgl Kejadian</th>
						<th width="5%" class="center nowrap">No. Registrasi</th>
						<th width="5%" class="center nowrap">Status Dijamin</th>
						<th width="5%" class="center nowrap">Biaya Dijamin</th>
						<th width="5%" class="center nowrap">Plafon</th>
						<th width="5%" class="center nowrap">Jml Dibayar</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('#btn_search4').click(function () {
			let stop = false
			if ($('#tanggal_awal4').val() === '') {
				syams_validation('#tanggal_awal4', 'Tanggal awal harus diisi!')
				stop = true
			}
			if ($('#tanggal_akhir4').val() === '') {
				syams_validation('#tanggal_akhir4', 'Tanggal akhir harus diisi!')
				stop = true
			}
			if (stop) {
				return false
			}

			getListMonitoringKlaimJaminanRaharja()
		})

		$('#btn_reload4').click(function() {
			$('.form-control').val('')
			$('#table_data4 tbody').empty()
		})

		$('#tanggal_awal4, #tanggal_akhir4').datepicker({
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

	function getListMonitoringKlaimJaminanRaharja() {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM."get_data_monitoring_klaim_jaminan_raharja") ?>',
			data: 'tanggal_awal='+$('#tanggal_awal4').val()+'&tanggal_akhir='+$('#tanggal_akhir4').val()+'&jenis_pelayanan='+$('#jenis_pelayanan4').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('#table_data4 tbody').empty()

				if (data.metaData.code === '200') {
					if (data.response !== null) {
						if (data.response.jaminan.length > 0) {
							var no = 1;
							$.each(data.response.jaminan, function(i, v) {
								var html = `
									<tr>
										<td class="nowrap center">${no++}</td>
										<td class="nowrap center">${v.sep.noMR}</td>
										<td class="nowrap">${v.sep.namaPeserta}</td>
										<td class="nowrap center">${v.sep.noKartu !== null ? v.sep.noKartu : '-'}</td>
										<td class="nowrap center">${v.sep.noSEP}</td>
										<td class="nowrap">${v.sep.diagnosa}</td>
										<td class="nowrap center">${v.sep.jnsPelayanan}</td>
										<td class="center nowrap">${v.sep.poli !== null ? v.sep.poli : '-'}</td>
										<td class="center nowrap">${v.sep.tglPlgSEP !== null ? datefmysql(v.sep.tglPlgSEP) : '-'}</td>
										<td class="center nowrap">${v.sep.tglSEP !== null ? datefmysql(v.sep.tglSEP) : '-'}</td>
										<td></td>
										<td class="center nowrap">${v.jasaRaharja.tglKejadian !== null ? datefmysql(v.jasaRaharja.tglKejadian) : '-'}</td>
										<td class="center nowrap">${v.jasaRaharja.noRegister}</td>
										<td class="center nowrap">${v.jasaRaharja.ketStatusDijamin}</td>
										<td class="center nowrap">${numberToCurrency(v.jasaRaharja.biayaDijamin)}</td>
										<td class="center nowrap">${numberToCurrency(v.jasaRaharja.plafon)}</td>
										<td class="center nowrap">${numberToCurrency(v.jasaRaharja.jmlDibayar)}</td>
									</tr>
								`;
	
								$('#table_data4 tbody').append(html)
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