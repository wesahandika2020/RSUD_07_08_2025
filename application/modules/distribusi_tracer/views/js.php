<script src="<?php echo resource_url() ?>assets/js/jquery.animateNumber.min.js"></script>
<script>
	$(document).scannerDetection({
		timeBeforeScanTest: 200, // wait for the next character for upto 200ms
		avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
		preventDefault: false,
		endChar: [13],
		onComplete: function(barcode, qty) {
			console.log($('#modal-distribusi-tracer').hasClass('in'))
			if ($('#modal-distribusi-tracer').hasClass('in') === false) {
				$('#modal-distribusi-tracer').modal('show')
			}

			$('#no-rm').val(barcode)
			$('#form-distribusi-tracer').submit()

		},
		onError: function(string, qty) {
			console.log('error ' + string)
		}
	})
	$(function() {
		getListDataDistribusiTracer(1)
		getDataSummaryTracer()
		$('#status').change(function() {
			getListDataDistribusiTracer(1)
		})

		$('#btn-add').click(function() {
			resetForm()
			$('#modal-distribusi-tracer').modal('show')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$("#tanggal-awal, #tanggal-akhir").datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#btn-reload').click(function() {
			resetData()
			getDataSummaryTracer()
			getListDataDistribusiTracer(1)
		})

		$('#btn-change').click(function() {
			var no_rm = $('#no-rm').val()
			changeStatus(no_rm)
		})

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#form-detail').submit(function() {
			return false;
		})

		$('#form-distribusi-tracer').submit(function() {
			var no_rm = $('#no-rm').val()
			changeStatus(no_rm)
			return false;
		})
	})

	function resetData() {
		$('#form-search')[0].reset()
		$('#tanggal-awal, #tanggal-akhir').val('<?php echo date('d/m/Y') ?>')
	}

	function resetForm() {
		$('#no-rm').val('')
		$('#no_rm_label').html('No. RM')
		$('#reg_label').html('No. Register')
		$('#pasien_label').html('Pasien')
		$('#waktu_order_label').html('Waktu Order')
		$('#tujuan_label').html('Tujuan')
		$('#posisi_label').html('Posisi Terakhir')
		$('#cara_bayar_label').html('Cara Bayar')
		$('#status_label').html('Status')
	}

	function getListDataDistribusiTracer(page) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('distribusi_tracer/api/distribusi_tracer/get_list_distribusi_tracer') ?>/page/' + page,
			data: $('#form-search').serialize() + '&status=' + $('#status').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataDistribusiTracer(page - 1)
					return false;
				};

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				let detail = '';
				let status = '';
				let btnCetakTracer = '';
				let btnEditButton = '';
				$.each(data.data, function(i, v) {

					// ready
					if (v.status === 'ready') {
						status = '<h5 class="mb-0"><span class="label label-success"><i class="fas fa-fw fa-check mr-1"></i>Ready</span></h5>';
						// distributed
					} else if (v.status === 'distributed') {
						status = '<h5 class="mb-0"><span class="label label-warning"><i class="fas fa-fw fa-shopping-cart mr-1"></i>Distributed</span></h5>';
						// returned
					} else if (v.status === 'returned') {
						status = '<h5 class="mb-0"><span class="label label-danger"><i class="fas fa-fw fa-stop mr-1"></i>Returned</span></h5>';
						// order
					} else if (v.status === 'order') {
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
						// pending
					} else {
						btnCetakTracer = '<button type="button" title="Klik untuk mencetak Tracer" class="btn btn-secondary btn-xs" onclick="cetakTracer(' + v.id + ')"><i class="fas fa-print"></i></button>';
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
					}

					<?php if ($showeditbutton) : ?>
						btnEditButton = '<button type="button" title="Klik untuk mengedit status" class="btn btn-secondary btn-xs" onclick="editStatus(' + v.id + ', \'' + v.status + '\')"><i class="fas fa-edit"></i></button>';
					<?php endif; ?>

					detail = /* html */ `
						<table>
							<tr><td>No. Register</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${v.no_register}</td></tr>
							<tr><td>Waktu Order</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${((v.waktu_order !== null)?datetimefmysql(v.waktu_order):'')}</td></tr>
							<tr><td>Waktu Berkas Siap</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${((v.waktu_ready !== null)?datetimefmysql(v.waktu_ready):'')}</td></tr>
							<tr><td>Waktu Berkas Tiba</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${((v.waktu_distribusi !== null)?datetimefmysql(v.waktu_distribusi):'')}</td></tr>
							<tr><td>Waktu Berkas Kembali</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${((v.waktu_return !== null)?datetimefmysql(v.waktu_return):'')}</td></tr>
							<tr><td>Cara Bayar</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${v.tipe_pembayaran}</td></tr>
							<tr><td>Lama Tunggu Periksa</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${v.waiting_ready_time}</td></tr>
							<tr><td>Lama Penyedian Berkas</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td>${v.waiting_exam_time}</td></tr>
						</table>
					`;

					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu_order !== null ? datetimefmysql(v.waktu_order) : '-')}</td>
							<td class="wrapper left">${v.no_rm}</td>
							<td class="left">${v.nama_pasien}</td>
							<td class="left">${v.status_pasien}</td>
							<td class="left">${v.destination}</td>
							<td class="left">${v.position}</td>
							<td class="left">${v.waiting_ready_time}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="Detail" data-content="${detail}"><i class="fas fa-eye mr-1"></i></button>
								${btnEditButton}
								${btnCetakTracer}
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
				$('.mypopover').popover({
					html: true,
					trigger: 'hover',
					sanitize: false,
				})
			},
			complete: function() {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function paging(page) {
		getListDataDistribusiTracer(page)
	}

	function getDataSummaryTracer() {
		$('.progress-bar').css({
			'width': '0%'
		})
		$('.info_persen_berkas').html("0%")
		$('.info_num_berkas').html("0")
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('distribusi_tracer/api/distribusi_tracer/get_data_summary_tracer') ?>',
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let result = data.data.list;
				$('#order_count').animateNumber({
					number: result.order.jumlah
				}, 4000)
				$('#ready_count').animateNumber({
					number: result.ready.jumlah
				}, 4000)
				$('#dist_count').animateNumber({
					number: result.distributed.jumlah
				}, 4000)
				$('#return_count').animateNumber({
					number: result.returned.jumlah
				}, 4000)

				$('#order_percen').html(result.order.persentase)
				$('#ready_percen').html(result.ready.persentase)
				$('#dist_percen').html(result.distributed.persentase)
				$('#return_percen').html(result.returned.persentase)

				$('#order_bar_percen').css({
					'width': result.order.persentase
				})
				$('#ready_bar_percen').css({
					'width': result.ready.persentase
				})
				$('#dist_bar_percen').css({
					'width': result.distributed.persentase
				})
				$('#return_bar_percen').css({
					'width': result.returned.persentase
				})
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function changeStatus(no_rm) {
		if (no_rm === '') {
			syams_validation('#no-rm', 'No. RM harus diisi.')
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('distribusi_tracer/api/distribusi_tracer/change_status_document_tracer') ?>',
			data: 'no_rm=' + no_rm,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status) {
					$('#no_rm_label').html(data.tracer.no_rm)
					$('#reg_label').html(data.tracer.no_register)
					$('#pasien_label').html(data.tracer.nama_pasien)
					$('#waktu_order_label').html(datetimefmysql(data.tracer.waktu_order))
					$('#tujuan_label').html(data.tracer.destination)
					$('#posisi_label').html(data.last_position)
					$('#cara_bayar_label').html(data.tracer.tipe_pembayaran)

					var status = '';
					if (data.tracer.status === 'ready') {
						status = '<h5 class="mb-0"><span class="label label-success"><i class="fas fa-fw fa-check mr-1"></i>Ready</span></h5>';
					} else if (data.tracer.status === 'returned') {
						status = '<h5 class="mb-0"><span class="label label-danger"><i class="fas fa-fw fa-stop mr-1"></i>Returned</span></h5>';
					}
					$('#status_label').html(status)
					messageCustom(data.message, 'Success')
				} else {
					swalAlert('info', 'Information', data.message)
				}

				$('#no-rm').val('')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function editStatus(id, status) {
		bootbox.dialog({
			title: "Edit Status",
			message: '<div class="row">  ' +
				'<div class="col-lg-12"> ' +
				'<form class="form-horizontal" id="formeditstatus"> ' +
				'<div class="form-group row"> ' +
				'<label class="col-lg-2 col-form-label right">Status</label> ' +
				'<div class="col-lg-9">' +
				'<select class="form-control" id="status_edit" name="status">' +
				'<option value="pending">Pending</option>' +
				'<option value="order">Order</option>' +
				'<option value="ready">Ready</option>' +
				'<option value="distributed">Distributed</option>' +
				'<option value="returned">Returned</option>' +
				'</status>' +
				' </div> ' +
				'</div> ' +
				'</div> </div>' +
				'</form> </div>  </div>',
			buttons: {
				success: {
					label: '<i class="fas fa-save"></i> Simpan',
					className: "btn-info",
					callback: function() {
						var statuss = $('#status_edit').val()
						updateStatus(id, statuss)
					}
				}
			}
		})

		$('#status_edit').val(status)

		$('#formeditstatus').submit(function() {
			var statuss = $('#status_edit').val()
			updateStatus(id, statuss)
			$('.bootbox').modal('hide')
			return false;
		})
	}

	function updateStatus(id, status) {
		$.ajax({
			type : 'POST',
			url: '<?php echo base_url("distribusi_tracer/api/distribusi_tracer/update_status_tracer") ?>',
			data: 'id=' + id + '&status=' + status,
			cache: false,
			dataType : 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				var title = 'Edit Status';
				if (data.status) {
					swalAlert('success', title, data.message)
					getListDataDistribusiTracer(1)
				}else{
					swalAlert('error', title, data.message)                                    
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e){
				accessFailed(e.status)
			}
		})
	}

	function cetakTracer(id) {
		window.open('<?= base_url() ?>distribusi_tracer/cetak_tracer?id=' + id, 'Cetak Kartu Tracer', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

</script>
