<script>
	$(function() {
		getListDistribusi(1)
		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListDistribusi(1)
		})
	})

	function reloadData() {
		$('#input[type=text], input[type=hidden], select').val('')
		$('#tanggal-awal-minta').val('<?= date('d/m/Y') ?>')
		$('#tanggal-akhir-minta').val('<?= date('d/m/Y') ?>')
	}

	function getListDistribusi(page) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('distribusi_barang_produksi/api/distribusi_barang_produksi/get_list_distribusi') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDistribusi(page - 1)
					return false;
				};

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let disabled = 'disabled';
					if (v.tanggal_dikirim !== null) {
						disabled = '';
					}

					let disabled_status = '';
					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum Dikirim</em>';
					if (v.tanggal_dikirim !== null) {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Sudah Dikirim</span></h5>'
						disabled_status = 'disabled';
					}

					let detail = v.id + '#' + v.unit_asal + '#' + datefmysql(v.tanggal_permintaan) + '#' + v.kode;
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.id}</td>
							<td class="wrapper center">${(v.kode_dikirim !== null ? v.kode_dikirim : '-')}</td>
							<td class="center">${(v.tanggal_permintaan !== null ? datefmysql(v.tanggal_permintaan) : '-')}</td>
							<td class="left">${v.unit_asal}</td>
							<td class="wrapper center">${status}</td>
							<td class="center">${(v.tanggal_dikirim !== null ? datefmysql(v.tanggal_dikirim) : '-')}</td>
							<td class="right">${money_format(parseFloat(v.total))}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" ${disabled_status} title="Klik untuk melakukan pendistribusian ke unit" onclick
								="distribusiPermintaan('${detail}')"><i class="fas fa-shipping-fast mr-1"></i>Kirim</button>
								<button type="button" class="btn btn-secondary btn-xs" ${disabled} title="Klik untuk cetak bukti pendistribusian ke unit" onclick
								="printDistribusi(${v.id})"><i class="fas fa-print mr-1"></i>Print</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
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
		getListDistribusi(page)
	}

	function distribusiPermintaan(detail) {
		let data = detail.split('#')
		$('#id').val(data[0])
		$('#kode-detail').html(data[3])
		$('#tanggal-permintaan-detail').html(data[2])
		$('#unit-asal, #unit-asal2').html(data[1])
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('permintaan_barang_produksi/api/permintaan_barang_produksi/get_permintaan_barang') ?>/id/' + data[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#table-distribusi tbody').empty()
				$.each(data.data, function(i, v) {
					let sisa = (v.sisa / v.isi_kemasan)
					let blinking = '';
					if (parseFloat(v.sisa) < parseFloat(v.jumlah)) {
						blinking = 'blinker blinking';
					}
					let html = /* html */ `
						<tr class="rows">
							<td class="${blinking} center">${i + 1}<input type="hidden" name="id_detail_distribusi[]" value="${v.id_detail_distribusi}"></td>
							<td class="${blinking}">${v.nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${i}" value="${v.id_barang}" class="id-barang"></td>
							<td class="${blinking} right" id="sisa-asal${i}">${v.sisa_asal}</td>
							<td class="${blinking} right" id="permohonan${i}">${v.jumlah}</td>
							<td class="${blinking}">${v.kemasan}<input type="hidden" name="id_kemasan[]" id="id-kemasan${i}" value="${v.id_kemasan}" class="id-kemasan"></td>
							<td class="${blinking} right" id="sisa-stok${i}">${v.sisa}</td>
							<td class="center"><input type="text" name="jumlah[]" id="jumlah${i}" class="jumlah center custom-form" size="10" onkeypress="return hanyaAngka(event)" value="${v.jumlah}" onkeyup="checkJumlahDisetujui(${i}, ${sisa})"></td>
						</tr>
					`;

					$('#table-distribusi tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
				$('#modal-distribusi').modal('show')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function checkJumlahDisetujui(i, sisa) {
		var permohonan = parseFloat($('#permohonan'+i).html())
		var jumlah     = parseFloat($('#jumlah'+i).val())
		if (permohonan < jumlah) {
			$('.rows:eq('+i+')').children('td:eq(1)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(2)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(3)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(4)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(5)').attr('class','blinker blinking')
			swalAlert('warning','Validasi','Jumlah disetujui tidak boleh melebihi jumlah permintaan !')
			$('#jumlah'+i).val(permohonan)
			return false;
		}
		else if (sisa < jumlah) {
			$('.rows:eq('+i+')').children('td:eq(1)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(2)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(3)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(4)').attr('class','blinker blinking')
			$('.rows:eq('+i+')').children('td:eq(5)').attr('class','blinker blinking')
		}
		else {
			$('.rows:eq('+i+')').children('td:eq(1)').removeAttr('class')
			$('.rows:eq('+i+')').children('td:eq(2)').removeAttr('class')
			$('.rows:eq('+i+')').children('td:eq(3)').removeAttr('class')
			$('.rows:eq('+i+')').children('td:eq(4)').removeAttr('class')
			$('.rows:eq('+i+')').children('td:eq(5)').removeAttr('class')
		}
	}

	function konfirmasiSimpanDistribusi() {
		let page = $('#page-now').val()
		let blinking = $('.blinking').length;
		if (parseFloat(blinking) > 0) {
			swalAlert('warning', 'Validasi', 'Masih ada stok untuk distribusi yang belum mencukupi!')
			return false;
		}
		let unit = $('#unit-asal').html()
		swal.fire({
			title: 'Konfirmasi Distribusi',
			html: "Apakah anda yakin akan mengirimkan barang ini <br> ke unit <b>"+unit+"</b> ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanDistribusi(page);
			}
		})
	}

	function simpanDistribusi(page) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('distribusi_barang_produksi/api/distribusi_barang_produksi/simpan_distribusi') ?>',
			data: $('#form-distribusi').serialize(),
			cache: false,
			dataType:'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status) {
					messageEditSuccess()
					getListDistribusi(page)
					$('#modal-distribusi').modal('hide')
				} else {
					messageEditFailed()
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal mengirimkan barang distribusi', 'Error')
			}
		})
	}

	function printDistribusi(id) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight= $(window).height();
		let dHeight= wHeight * 1;
		let x = screen.width/2 - dWidth/2;
		let y = screen.height/2 - dHeight/2;
		window.open('<?= base_url() ?>distribusi_barang_produksi/printing_bukti_distribusi?id=' + id,'Cetak Bukti Distribusi Barang','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}
</script>
