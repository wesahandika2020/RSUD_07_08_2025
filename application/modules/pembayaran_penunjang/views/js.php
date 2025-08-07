<script>
	$(function() {
		getListPembayaran(1);

		$('#btn-search').click(function() {
			resetData();
			$('#modal-search').modal('show');
		});

		$('#btn-reload').click(function() {
			resetData();
			getListPembayaran(1);
		})

		$("#tanggal-awal, #tanggal-akhir").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
	})

	function resetData() {
		$('#form-search')[0].reset();
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
	}

	function getListPembayaran(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("keuangan/api/keuangan/get_list_rekap_billing") ?>/page/' + page + '/jenis/langsung',
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPembayaran(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-data tbody').empty();

				$.each(data.data, function(i, v) {
					let status = '';
					if (v.status_billing === 'Batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-times mr-1"></i> Batal</span></h5>';
					} else {
						if (v.lunas === 'Belum') {
							// belum lunas
							if (parseInt(v.diskon_asuransi) === 100) {
								status = '<em class="blinker"> Cetak Rincian Biaya</em>';
							} else {
								status = '<em class="blinker"><i class="fas fa-spinner fa-spin"></i> Belum Lunas</em>';
							}
						} else {
							status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
						}
					}

					let spesialisasi = '';
					if (v.spesialisasi !== '') {
						spesialisasi = '(' + v.spesialisasi + ')';
					}

					if (v.status_terlayani === 'Belum') {
						status_terlayani = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if (v.status_terlayani === 'Batal') {
						status_terlayani = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					} else {
						status_terlayani = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${v.id_pasien}</td>
							<td>${v.nama}</td>
							<td>${v.jenis_layanan} ${spesialisasi}</td>
							<td class="center">${status_terlayani}</td>
							<td class="center">${v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '')}</td>
							<td class="center">${status}</td>
							<td class="right aksi">
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk melakukan pembayaran" onclick="inputPembayaran(${v.id}, '${((v.cara_bayar !== 'Asuransi' ? v.cara_bayar : v.penjamin))}', '${v.jenis_layanan}')"><i class="fas fa-money-bill-alt mr-1"></i>Bayar</button>
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk melihat riwayat pembayaran" onclick="historyPembayaran(${v.id})"><i class="fas fa-history mr-1"></i>History</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html);
				});
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function paging(page) {
		getListPembayaran(page);
	}
</script>