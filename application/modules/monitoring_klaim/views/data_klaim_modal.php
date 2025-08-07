<div class="row">
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Tanggal</label>
			<input type="text" name="tanggal" id="k_tanggal" class="form-control" placeholder="Tanggal Pulang">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Jenis Pelayanan</label>
			<?php echo form_dropdown('jenis_pelayanan', $jenis_pelayanan, [], 'id="k_jenpel" class="form-control"') ?>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group tight">
			<label>Status Klaim</label>
			<?php echo form_dropdown('status_klaim', $status_klaim, [], 'id="k_status" class="form-control"') ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" id="btn_search_klaim" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari Data</button>
		<button type="button" id="btn_download_klaim" class="btn btn-primary"><i class="fas fa-download mr-1"></i>Download Data Bridging</button>
		<button type="button" id="btn_reload_klaim" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-sm table-hover info-table color-table mt-2" id="table_data_klaim">
				<thead>
					<tr>
						<th class="center nowrap">No.</th>
						<th class="nowrap">Inacbg</th>
						<th class="nowrap">Peserta</th>
						<th class="nowrap">Biaya</th>
						<th class="center nowrap">Kelas Rawat</th>
						<th class="nowrap">No. FPK</th>
						<th class="nowrap">No. SEP</th>
						<th class="center nowrap">Poli</th>
						<th class="center nowrap">Status</th>
						<th class="center nowrap">Tgl Pulang</th>
						<th class="center nowrap">Tgl SEP</th>
						<th class="center nowrap">Tgl Buat</th>
						<th class="center nowrap">Tgl Ubah</th>
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
		$('#btn_search_klaim').click(function () {
			let stop = false
			if ($('#k_tanggal').val() === '') {
				syams_validation('#k_tanggal', 'Tanggal Pulang harus diisi!')
				stop = true
			}
			if ($('#k_jenpel').val() === '') {
				syams_validation('#k_jenpel', 'Jenis pelayanan harus dipilih!')
				stop = true
			}
			if ($('#k_status').val() === '') {
				syams_validation('#k_status', 'Status Klaim harus dipilih!')
				stop = true
			}
			if (stop) {
				return false
			}

			getListMonitoringKlaim()	
		})

		$('#btn_download_klaim').click(function () {
			let stop = false
			if ($('#k_tanggal').val() === '') {
				syams_validation('#k_tanggal', 'Tanggal Pulang harus diisi!')
				stop = true
			}
			if ($('#k_jenpel').val() === '') {
				syams_validation('#k_jenpel', 'Jenis pelayanan harus dipilih!')
				stop = true
			}
			if ($('#k_status').val() === '') {
				syams_validation('#k_status', 'Status Klaim harus dipilih!')
				stop = true
			}
			if (stop) {
				return false
			}

			konfirmasiDownloadKlaim()
		})
	
		$('#btn_reload_klaim').click(function() {
			$('.form-control').val('')
			$('#table_data_klaim tbody').empty()
		})

		$('#k_tanggal').datepicker({
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

	function konfirmasiDownloadKlaim() {
        bootbox.dialog({
            message: "Apakah anda yakin akan mendownload data klaim (bridging) ?",
            title: "Download data klaim",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close m-r-5"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-check-circle m-r-5"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        downloadKlaim();
                    }
                }
            }
        }); 
    }

	function downloadKlaim(){
        $.ajax({
            type : 'GET',
            url: '<?= base_url("monitoring_klaim/api/monitoring_klaim/download_klaim") ?>',
			data: 'tanggal='+$('#k_tanggal').val()+'&jenis_pelayanan='+$('#k_jenpel').val()+'&status_klaim='+$('#k_status').val(),
            cache: false,
            dataType : 'json',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    tipe = data.status;
                } else {
                    tipe = 'Info';
                }
                messageCustom(data.message, tipe);                                
                getListMonitoringKlaim();
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageCustom('Gagal Download Monitoring Klai '+e, 'Error');
            }
        });        
    }

	function getListMonitoringKlaim() {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("monitoring_klaim/api/monitoring_klaim/list_monitoring_klaim") ?>',
			data: 'tanggal='+$('#k_tanggal').val()+'&jenis_pelayanan='+$('#k_jenpel').val()+'&status_klaim='+$('#k_status').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('#table_data_klaim tbody').empty()
				var no = 1;
				if (data.data.length <= 0) {
					swalAlert('info', 'INFO', 'Data tidak ditemukan, Silahkan download data bridging !');
				} else {
					$.each(data.data, function(i, v) {
						inacbg 	= '<b>Kode : </b>' + v.inacbg_kode + '<br><b>Nama : </b>' + v.inacbg_nama;
						peserta = '<b>Nama : </b>' + v.peserta_nama + '<br><b>No. Kartu : </b>' + v.peserta_nokartu + '<br><b>No. MR : </b>' + v.peserta_norm;
						biaya 	= '<b>Pengajuan : </b>' + v.biaya_pengajuan + '<br><b>Setujui : </b>' + v.biaya_setujui + '<br><b>Tarif Gruper : </b>' + v.biaya_tarif_gruper + '<br><b>Tarif RS : </b>' + v.biaya_tarif_rs + '<br><b>Topup : </b>' + v.biaya_topup;
						// biaya 	= '<b>Pengajuan : </b>' + rupiah(v.biaya_pengajuann) + '<br><b>Setujui : </b>' + rupiah(v.biaya_setujui) + '<br><b>Tarif Gruper : </b>' + rupiah(v.biaya_tarif_gruper) + '<br><b>Tarif RS : </b>' + rupiah(v.biaya_tarif_rs) + '<br><b>Topup : </b>' + rupiah(v.biaya_topup);
						var html = `
							<tr>
								<td class="center nowrap">${no++}</td>
								<td class="nowrap">${inacbg}</td>
								<td class="nowrap">${peserta}</td>
								<td class="nowrap">${biaya}</td>
								<td class="center nowrap">${v.kelas_rawat}</td>
								<td class="nowrap">${v.nofpk}</td>
								<td class="nowrap">${v.nosep}</td>
								<td class="center nowrap">${v.poli !== null ? v.poli : '-'}</td>
								<td class="center nowrap">${v.status}</td>
								<td class="center nowrap">${datefmysql(v.tgl_pulang)}</td>
								<td class="center nowrap">${datefmysql(v.tgl_sep)}</td>
								<td class="center nowrap">${v.created_date !== null ? v.created_date : '-'}</td>
								<td class="center nowrap">${v.updated_date !== null ? v.updated_date : '-'}</td>
							</tr>
						`;
						$('#table_data_klaim tbody').append(html);						
					})
					$('#table_data_klaim').DataTable();
				}
			},
			complete: function () {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Data tidak ada', 'Info');
			},
		})
	}

	
</script>