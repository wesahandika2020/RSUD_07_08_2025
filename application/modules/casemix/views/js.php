<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var totalBilling = 0;
	var totalAll = 0;
	var subTotal = 0;
	var jenisPenjamin = 0;

	$(function() {
		getListRekapBilling(1)

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})
		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})
		$('#btn-reload').click(function() {
			reloadData()
			getListRekapBilling(1)
		})
		$('#jenis-layanan').change(function() {
			getListRekapBilling(1)
		})
		$('#keyword-search').keyup(debounceTime(function() {
			if ($('#keyword-search').val() !== '') {
				// $('#tanggal-awal').val('')
				getListRekapBilling(1)
			} else {
				// $('#tanggal-awal').val('<?= date('d/m/Y') ?>')
				getListRekapBilling(1)
			}
		}, 750));
		$('.penjamin-group-search').hide()
		$('#cara-bayar-search').change(function() {
			jenisPenjamin = $(this).val()
			$('#penjamin-search').val('')
			$('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
			if ($(this).val() !== 'Tunai') {
				$('.penjamin-group-search').show()
			} else {
				$('.penjamin-group-search').hide()
			}
		})

		$('#penjamin-search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: jenisPenjamin,
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#dokter-search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#btn-expand-all').click(function() {
			$('.btn-collapse').click()
		})
	})

	function reloadData() {
		let filterLayanan = $('#jenis-layanan').val('rawat_jalan')
		$('#jenis-layanan').val('rawat_jalan')
		$('#id, #keyword-search').val('')
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
		$('#penjamin-search, #cara-bayar-search, #dokter-search, #keyword-search').val('')
		$('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
		$('#s2id_dokter-search a .select2-chosen').html('Pilih Dokter DPJP')
		$('.penjamin-group-search').hide()
		// syams_validation_remove('.form-control')
		// syams_validation_remove('.select2-input')
	}

	function getListRekapBilling(page) {
		$('#page-now').val(page)
		if ('<?= $this->session->userdata('account_group'); ?>' == 'Dokter Magang') {
			$('#page-modules').val('')
		}
		$.ajax({
			type: 'GET',
			url: '<?= base_url('casemix/api/casemix/get_list_casemix') ?>/page/' + page + '/jenis/' + $('#jenis-layanan').val(),
			data: $('#form-search').serialize() + '&keyword=' + $('#keyword-search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListRekapBilling(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-data tbody').empty();
				// console.log(data);
				$('#th-asal-kunjungan').hide();

				$.each(data.data, function(i, v) {

					let spesialisasi = '';
					if (v.spesialisasi !== '') {
						spesialisasi = '(' + v.spesialisasi + ')';
					}

					let radiologi = '';
					if (v.id_radiologi !== '') {
						radiologi = v.id_radiologi;
					}

					let jenisLab = '1';
					if (v.jenis_laboratorium === 'Patologi Anatomi') {
						jenisLab = '2';
					}
					if (v.jenis_laboratorium === 'Mikrobiologi') {
						jenisLab = '3';
					}

					if (v.status_terlayani === 'Belum') {
						status_layanan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if (v.status_terlayani === 'Batal') {
						status_layanan = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					} else {
						status_layanan = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					}

					let jenisLayanan = `'` + v.jenis_layanan + `'`;

					// btnDownload = ''
					// if ('<?= $this->session->userdata('unit'); ?>' === 'Sistem Informasi Manajemen') {
					btnDownload = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="downloadDokumen(' + v.id_pendaftaran + ',' + v.id_layanan + ',' + v.id_radiologi + ',' + v.id_laboratorium + ',' + jenisLab + ',' + jenisLayanan + ')"><i class="fas fa-download m-r-5"></i> Download Dokumen</a>';
					// }

					v.jml_id_pendaftaran == 1 ? asal_kunjungan = 'Pendaftaran' : asal_kunjungan = 'Konsul';

					let td_asal_kunjungan = '';
					if ($('#jenis-layanan').val() == 'hemodialisa') {
						$('#th-asal-kunjungan').show()
						td_asal_kunjungan = `<td class="center">${asal_kunjungan}</td>`;
					}

					let btnEklaim = '';
					if (v.id_penjamin == 1) {
						if (v.status_eklaim === null) {
							btnEklaim = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="entrieClaim('${v.id_layanan}' , '${v.id}' , '${v.no_polish}', '${v.jenis_rawat}')"><i class="fas fa-donate"></i> Belum Grouper</a>`;
						} else {
							btnEklaim = `<a class="dropdown-item waves-effect waves-light btn-xs" style="background-color: green" href="javascript:void(0)" onclick="entrieClaim('${v.id_layanan}' , '${v.id}' , '${v.no_polish}', '${v.jenis_rawat}')"><i class="fas fa-donate"></i> Sudah Grouper</a>`;
						}

					}

					// console.log('<?= $this->session->userdata('account_group'); ?>');
					let buttonOption = '';
					if ('<?= $this->session->userdata('account_group'); ?>' == 'Dokter Magang') {
						buttonOption = `
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id_layanan + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>'}
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id_layanan + ')"><i class="fas fa-book"></i> Riwayat Rekam Medis</a>'}
							${v.jenis_layanan === 'Poliklinik' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRajal('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Rawat Inap' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRanap('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Intensive Care' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIntensiveCare('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'IGD' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIGD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Hemodialisa' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Pemulasaran Jenazah' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Laboratorium' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${((v.jenis_rawat === 'Inap') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="printCPPT('+ v.id_pendaftaran + ',' + v.id_layanan +')"><i class="fas fa-print"></i> Cetak CPPT</a>' : '')}
						`;
					} else {
						buttonOption = `
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id_layanan + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>'}
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id_layanan + ')"><i class="fas fa-book"></i> Riwayat Rekam Medis</a>'}
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="historyPembayaran('+v.id_pendaftaran+')"> <i class="fas fa-dollar-sign"></i> History Pembayaran</a>'}
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakRincianBilling('+v.id_pendaftaran+','+ v.id_layanan +')"><i class="fas fa-hand-holding-usd"></i> Rekap Billing</a>'}
							${((v.id_radiologi !== null) ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showRMHasilRadiologi('+v.id_radiologi+')"><i class="fas fa-print"></i> Hasil Radiologi</a>' : '')}
							${((v.id_laboratorium !== null) ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilLaboratoriumNew('+v.id_pendaftaran+')"><i class="fas fa-print"></i> Hasil Laboratorium</a>' : '')}
							
							${v.jenis_layanan === 'Poliklinik' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRajal('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Rawat Inap' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRanap('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Intensive Care' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIntensiveCare('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'IGD' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIGD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Hemodialisa' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Pemulasaran Jenazah' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${v.jenis_layanan === 'Laboratorium' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
							${((v.jenis_rawat === 'Inap') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="printCPPT('+ v.id_pendaftaran + ',' + v.id_layanan +')"><i class="fas fa-print"></i> Cetak CPPT</a>' : '')}
							
							${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="uploadFileRM(' + v.id_pendaftaran + ',' + v.id_layanan + ', \'' + v.id_pasien + '\', \'CASEMIX\')"><i class="fas fa-upload m-r-5"></i> Upload File Rekam Medis</a>'}
							${btnDownload}
							${btnEklaim}
						`;
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '-')}</td>
							<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}</td>
							<td class="center">${v.id_pasien}</td>
							<td>${v.nama}</td>
							<td class="center">${v.jenis_layanan} ${spesialisasi}</td>
							${td_asal_kunjungan}
							<td>${v.dokter}</td>
							<td class="center">${v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '')}</td>
							<td class="center">${status_layanan}</td>
							<td class="center">${((v.status !== null) ? v.status : '-')}</td>
							<!-- td class="right">${money_format(v.tagihan)}</td -->
							<td class="right v-center">
                <div style="">
									<div class="dropdown">
										<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-fw fa-cog mr-1"></i>
										</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    ${buttonOption}
										</div>
									</div>
								</div>
							</td>
							<!-- td class="right aksi">
								<button type="button" title="Klik untuk melihat Detail Billing Pasien" class="btn btn-secondary btn-xs" onclick="detailBilling(${v.id})"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button>
							</td -->
						</tr>
					`;

					$('#table-data tbody').append(html);
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function printCPPT(id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url('pelayanan/printing_cppt/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Catatan Perkembangan Pasien Terintegrasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function showRMHasilRadiologi(id_radiologi) {
		window.open('<?php echo base_url() ?>hasil_radiologi/printing_hasil_radiologi/' + id_radiologi, 'Cetak Hasil Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakRincianBilling(id_pendaftaran) {
		window.open('<?= base_url() ?>rekap_billing/printing_rincian_billing/' + id_pendaftaran + '/print/', 'Cetak Rincian Billing', 'width=' + dWidth + ' height=' + dHeight + ', left=' + x + ',top=' + y)
	}

	function cetakResumeMedisIntensiveCare(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_intensive_care/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisRanap(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis_ranap/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisRajal(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}


	function cetakResumeMedisIGD(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisHD(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function downloadDokumen(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan) {
		window.open(`<?= base_url('folder_pasien/preview_dokumen/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	// function downloadDokumen(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan) {
	// 	showLoader();
	// 	$.get(`<?= base_url('folder_pasien/download_cppt/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, function(data) {
	// 		$.get(`<?= base_url('folder_pasien/download_resume/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, function(data) {
	// 			$.get(`<?= base_url('folder_pasien/download_billing/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, function(data) {
	// 				$.get(`<?= base_url('folder_pasien/download_radiologi/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, function(data) {
	// 					$.get(`<?= base_url('folder_pasien/download_laboratorium/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, function(data) {
	// 						downloadZIP(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan)
	// 					})
	// 				})
	// 			})
	// 		})
	// 	})

	// }

	function downloadZIP(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan) {
		location.href = `<?= base_url('folder_pasien/download_margepdf/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`;
		hideLoader();
		messageCustom('Data berhasil di download', 'Success');

	}

	function paging(page) {
		getListRekapBilling(page)
	}

	function historyPembayaran(id_pendaftaran) {
		$('#history-pembayaran-content').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url('keuangan/api/keuangan/get_data_history_pembayaran') ?>/id/' + id_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.length > 0) {
					let html = showContentHistoryPembayaran(data);
					$('#history-pembayaran-content').append(html);
					$('#modal-history-pembayaran').modal('show');
				} else {
					swalAlert('info', 'Informasi Pembayaran', 'Belum ada transaksi pembayaran, Silahkan lakukan pembayaran terlebih dahulu!');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function showContentHistoryPembayaran(data) {
		let html = /* html */ `
			<table class="table table-sm table-striped table-hover color-table info-table">
				<thead>
					<tr>
						<th width="3%" class="center">No.</th>
						<th width="10%" class="center">No. Kwitansi</th>
						<th width="12%" class="center">Waktu</th>
						<th width="13%" class="left">Transaksi</th>
						<th width="15%" class="left">Petugas Kasir</th>
						<th width="5%" class="center">Shift</th>
						<th width="10%" class="right">Tunai</th>
						<th width="10%" class="right">Non Tunai</th>
						<th></th>
					</tr>
				</thead>`;

		$.each(data, function(i, v) {
			let disabled = '';
			let activeStatus = '';
			if (v.status === 'Batal') {
				disabled = 'disabled';
				activeStatus = 'active-status';
			}

			let cetakNotaPembayaran = '';
			if (v.jenis_transaksi === 'Rawat Inap' | v.jenis_transaksi === 'IGD' | v.jenis_transaksi === 'Poliklinik') {
				cetakNotaPembayaran = 'onclick="cetakNotaPembayaran(' + v.id + ')"';
			} else {
				cetakNotaPembayaran = 'onclick="cetakNotaPoli(' + v.id + ')"';
			}

			let accountGroup = '<?= $this->session->userdata('account_group') ?>'

			html += /* html */ `
				<tbody>
					<tr>
						<td class="${activeStatus} center">${++i}</td>
						<td class="${activeStatus} center">${v.no_kwitansi}</td>
						<td class="${activeStatus} center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
						<td class="${activeStatus}">${v.jenis_transaksi}</td>
						<td class="${activeStatus}">${v.kasir}</td>
						<td class="${activeStatus} center">${v.shift}</td>
						<td class="${activeStatus} right"><b>${money_format(v.tunai)}</b></td>
						<td class="${activeStatus} right"><b>${money_format(v.non_tunai)}</b></td>
						<td class="${activeStatus} right aksi">
							<button type="button" class="btn btn-secondary btn-xs" ${cetakNotaPembayaran}><i class="fas fa-fw fa-print mr-1"></i>Nota</button>
							<button type="button" class="btn btn-secondary btn-xs" onclick="cetakKwitansiPembayaran(${v.id})"><i class="fas fa-fw fa-print mr-1"></i>Kwitansi</button>
						</td>

					</tr>
				</tbody>
			`;
		});

		html += /* html */ `
			</table>
			<br>
		`;

		return html;
	}

	function cetakKwitansiLangsung(id_history_pembayaran, transaksi) {
		if (transaksi === 'Rawat Inap' | transaksi === 'IGD' | transaksi === 'Poliklinik') {
			cetakNotaPembayaran(id_history_pembayaran);
		} else {
			cetakNotaPoli(id_history_pembayaran);
		}
	}

	function cetakNotaPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('casemix/printing_nota_pembayaran_all') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakKwitansiLangsung(id_history_pembayaran, transaksi) {
		if (transaksi === 'Rawat Inap' | transaksi === 'IGD' | transaksi === 'Poliklinik') {
			cetakNotaPembayaran(id_history_pembayaran);
		} else {
			cetakNotaPoli(id_history_pembayaran);
		}
	}

	function cetakNotaPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_nota_pembayaran_all') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakNotaPoli(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_nota_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Nota Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakKwitansiPembayaran(id_history_pembayaran, tanggal = '') {
		let param = '';
		if (tanggal !== '') {
			param = '&tanggal=' + date2mysql(tanggal);
		}

		window.open("<?php echo base_url('keuangan/pembayaran/printing_kwitansi_pembayaran') ?>?id_history_pembayaran=" + id_history_pembayaran + param, "Cetak Kwitansi Pembayaran", 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function detailPemeriksaan(id_pendaftaran, id_layanan) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let pasien = '';
				pasien = data.pasien;
				if (pasien !== null) {

					let kelamin = '';
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan';
					}

					let umur = '';
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#id-pasien').val(pasien.id_pasien);
					$('#no-rm').text(pasien.id_pasien);
					$('#no-register').text(pasien.no_register);
					$('#no-identitas').text(pasien.no_identitas);
					$('#nama').text(pasien.nama);
					$('#alamat').text(pasien.alamat);
					$('#kelamin').text(kelamin);
					$('#umur').text(umur);
					$('#nama-pjwb').text(pasien.nama_pjwb);
					$('#alamat-pjwb').text(pasien.alamat_pjwb);
					$('#telp-pjwb').text(pasien.telp_pjwb);
					$('#instansi-perujuk').text(pasien.instansi_perujuk);
					$('#tenaga-medis-perujuk').text(pasien.nadis_perujuk);
					$('#asal-layanan').text(pasien.keterangan);
				}

				$('#modal-detail-pemeriksaan').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function cetakHasilLaboratoriumNew(id_pendaftaran) {
		window.open('<?php echo base_url() ?>casemix/printing_hasil_laboratorium_new/' + id_pendaftaran, 'Cetak Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumPA(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_pa/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumMB(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_mb/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	// Eklaim

	function resetFormEklaim() {
		$('#hak_eclaim').val('');
		$('#button-footer').html('');
	}

	function pad(str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}

	function getPesertaByPolish(no_kartu) {

		noPolishBPJS = pad(no_kartu, 13);
		// alert(noPolishBPJS + '/' + no_kartu );

		$.ajax({
			type: 'GET',
			url: '<?= base_url(URL_VCLAIM . "get_peserta") ?>/nokartu/' + noPolishBPJS,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data !== null) {
					if (data.metaData.code === "200") {
						if (data.response !== null) {
							$('#hak_eclaim').val((data.response.peserta.hakKelas.keterangan = null ? '-' : data.response.peserta.hakKelas.keterangan));
						}
					} else {
						swalCustom('info', "Pencarian Peserta BPJS", data.metaData.message);
					}
				} else {
					swalCustom('error', "Koneksi Bermasalah", "Aplikasi tidak dapat terhubung dengan server BPJS. Silahkan hubungi pihak BPJS");
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function getDetailLayananPendaftaranEclaim(id_layanan, id, no_kartu, jenis_rawat) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pengkodean_icd_x/api/Eklaim/get_detail_layanan_eclaim") ?>/id_layanan_pendaftaran/' + id_layanan + '/id/' + id + '/nokartu/' + no_kartu + '/jenis_rawat/' + jenis_rawat,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},

			success: function(data) {

				if (data.eclaim.status_klaim == null) {
					html = /* html */ `
			<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Simpan</button>
		`;
					$('#button-footer').append(html);
				} else {
					html = /* html */ `
			<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
			<button type="button" class="btn btn-info waves-effect" title="Data Sudah diklaim" disabled><i class="fas fa-save"></i> Sudah di Klaim</button>
			<button type="button" class="btn btn-dark waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Update</button>
		`;
					$('#button-footer').append(html);
				}

				// Set the html of element
				$('#id-pasien-eclaim').val(data.pendaftaran.id_pasien);
				$('#id-dokter-eclaim').val(data.pendaftaran.id_dokter);
				$('#id-layanan-pendaftaran-eclaim').val(data.eclaim.id);
				$('#id-pendaftaran-eclaim').val(data.eclaim.id_pendaftaran);
				$('#no-ktp-pasien-eclaim').val(data.pendaftaran.no_identitas);
				$('#jenis-pendaftaran-eclaim').html(data.pendaftaran.jenis_layanan);

				if (data.eclaim.gender == '1') {
					$('#jk_eclaim').val('Laki-laki');
				} else {
					$('#jk_eclaim').val('Perempuan');
				}

				$('#tanggal-pelayanan-eclaim').html(datetimefmysql(data.eclaim.tgl_masuk));
				$('#nama-pasien-eclaim').html(data.pendaftaran.nama_pasien + ' / ' + data.pendaftaran.kelamin + ' / ' + hitungUmur(data.pendaftaran.tanggal_lahir));
				$('#no-rm-eclaim').html(data.pendaftaran.id_pasien);
				$('#tanggal-keluar-eclaim').html(datetimefmysql(data.eclaim.tgl_pulang));
				$('#dokter_eclaim').val(data.eclaim.nama_dokter);

				$('#cara_bayar').val(data.eclaim.nama_penjamin);
				$('#no_rm_eclaim').val(data.pendaftaran.id_pasien);
				// $('#jk_eclaim').val(data.pendaftaran.kelamin);

				$('#pelayanan_eclaim').val(data.eclaim.jenis_rawat);
				if (data.eclaim.jenis_rawat == '1') {
					$('#jenis_rawat_eclaim').val('Rawat Inap');
				} else {
					$('#jenis_rawat_eclaim').val('Rawat Jalan');
				}

				if (data.eclaim.tindak_lanjut == 'Atas Izin Dokter') {
					let discharge_status = 1;
				} else if (data.eclaim.tindak_lanjut == 'RS Lain') {
					let discharge_status = 2;
				} else if (data.eclaim.tindak_lanjut == 'Pulang APS') {
					let discharge_status = 3;
				} else if (data.eclaim.tindak_lanjut == 'Pemulasaran Jenazah') {
					let discharge_status = 4;
				} else {
					let discharge_status = 5;
				}

				var jenis_tarif = 'TARIF RS KELAS C PEMERINTAH',
					kode_tarif = 'CP';

				var selisihMenit = data.eclaim.selisih / 60,
					selisihJam = selisihMenit / 60,
					getMenit = selisihMenit - (selisihJam * 60);

				$('#tgl_lahir').val(data.eclaim.tgl_lahir);
				$('#icu_los').val(data.eclaim.icu_los);

				// $('#los_eclaim').val(data.eclaim.total_hari + ' hari');
				$('#dokter-eclaim').html(data.eclaim.nama_dokter);
				$('#adl_eclaim').val();
				$('#nomor_kartu').val(data.pendaftaran.no_polish);
				$('#nama_pasien').val(data.eclaim.nama_pasien);
				$('#kelas_rawat').val(data.eclaim.kelas_rawat);
				$('#cara_pulang_eclaim').val(data.eclaim.tindak_lanjut);
				$('#sub_active_eclaim').val();
				$('#no_sep_eclaim').val(data.eclaim.nomor_sep);
				$('#usia_eclaim').val(hitungUmur(data.pendaftaran.tanggal_lahir));
				$('#tgl_pulang').val(data.eclaim.tgl_pulang);
				// $('#hak_eclaim').val();
				$('#berat_lahir_eclaim').val((data.eclaim.berat_badan_lahir == null ? "0" : data.eclaim.berat_badan_lahir * 1000));
				$('#jenis_tarif_eclaim').val('TARIF RS KELAS C PEMERINTAH');
				$('#chronic_eclaim').val();

				let TarifRad = (data.eclaim.tarif_radiologi !== null ? parseInt(data.eclaim.tarif_radiologi) : 0);
				let TarifLab = (data.eclaim.tarif_laboratorium !== null ? parseInt(data.eclaim.tarif_laboratorium) : 0);
				let TarifKamar = (data.eclaim.tarif_kamar !== null ? parseInt(data.eclaim.tarif_kamar) : 0);
				let TarifAkomodasi = (data.eclaim.tarif_akomodasi !== null ? parseInt(data.eclaim.tarif_akomodasi) : 0);
				let TarifICare = (data.eclaim.tarif_intensive_care !== null ? parseInt(data.eclaim.tarif_intensive_care) : 0);
				let TarifDarah = (data.eclaim.tarif_pelayanan_darah !== null ? parseInt(data.eclaim.tarif_pelayanan_darah) : 0);
				let TarifHemo = (data.eclaim.tarif_hemodialisa !== null ? parseInt(data.eclaim.tarif_hemodialisa) : 0);
				let TarifKonsul = (data.eclaim.tarif_konsultasi !== null ? parseInt(data.eclaim.tarif_konsultasi) : 0);
				let TarifKeperawatan = (data.eclaim.tarif_keperawatan !== null ? parseInt(data.eclaim.tarif_keperawatan) : 0);
				let TarifTenagaAhli = (data.eclaim.tarif_tenaga_ahli !== null ? parseInt(data.eclaim.tarif_tenaga_ahli) : 0);
				let TarifRehab = (data.eclaim.tarif_rehabilitas !== null ? parseInt(data.eclaim.tarif_rehabilitas) : 0);
				let TarifNonBedah = (data.eclaim.tarif_non_bedah_vk !== null ? parseInt(data.eclaim.tarif_non_bedah_vk) : 0);
				let TarifBedah = (data.eclaim.tarif_bedah_ok !== null ? parseInt(data.eclaim.tarif_bedah_ok) : 0);
				let TarifObat = (data.eclaim.tarif_obat !== null ? parseInt(data.eclaim.tarif_obat) : 0);
				let TarifBHP = (data.eclaim.tarif_bhp !== null ? parseInt(data.eclaim.tarif_bhp) : 0);
				let TarifKronis = (data.eclaim.tarif_obat_kronis !== null ? parseInt(data.eclaim.tarif_obat_kronis) : 0);
				let TarifKemoterapi = (data.eclaim.tarif_obat_kemoterapi !== null ? parseInt(data.eclaim.tarif_obat_kemoterapi) : 0);
				let TarifAlkes = (data.eclaim.tarif_alkes !== null ? parseInt(data.eclaim.tarif_alkes) : 0);
				let TarifSewaAlat = (data.eclaim.tarif_sewa_alat !== null ? parseInt(data.eclaim.tarif_sewa_alat) : 0);
				let TarifAkomdasiRanap = TarifKamar ;
				let TarifKeperawatandanAkomodasi = TarifKeperawatan + TarifAkomodasi;
				
				if ($('#jenis-rawat').val() == 'Inap') {

					if (data.eclaim.waktu_icu !== null) {
						$('#label-los').html('ICU LOS');
						$('#los_eclaim').val(data.eclaim.selisih_hari + ' hari');
						$('#tgl-rawat').html('Tanggal Rawat ICU');
						$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					} else {
						$('#label-los').html('LOS');
						$('#los_eclaim').val(data.eclaim.selisih_hari + ' hari');
						$('#tgl-rawat').html('Tanggal Rawat');
						$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					}

					// $('#los_eclaim').val(data.eclaim.total_hari + ' hari');
					// $('#tanggal_rawat_eclaim').val(data.eclaim.waktu_ranap);
					$('#waktu_eclaim').val(data.eclaim.selisih_waktu);
					$('#kamar_eclaim').val(number_format(TarifAkomdasiRanap, 0, ',', '.'));
					let total_tarif = TarifSewaAlat + TarifAlkes + TarifKemoterapi + TarifKronis + TarifBHP + TarifObat + TarifLab + TarifRad + TarifKamar + TarifAkomodasi + TarifICare + TarifDarah + TarifHemo + TarifKonsul + TarifKeperawatan + TarifTenagaAhli + TarifRehab + TarifNonBedah + TarifBedah;
					$('#tarif_rs_eclaim').html(`<i><h3>Rp. ` + number_format(total_tarif, 0, ',', '.') + `, -</h3></i>`);
				} else {
					$('#los_eclaim').val('1 hari');
					$('#waktu_eclaim').val('(00:00) jam');
					$('#tanggal_rawat_eclaim').val(data.eclaim.tgl_masuk);
					$('#kamar_eclaim').val(number_format(TarifAkomdasiRanap, 0, ',', '.'));
					let total_tarif = TarifSewaAlat + TarifAlkes + TarifKemoterapi + TarifKronis + TarifBHP + TarifObat + TarifLab + TarifRad + TarifKamar + TarifAkomodasi + TarifICare + TarifDarah + TarifHemo + TarifKonsul + TarifKeperawatan + TarifTenagaAhli + TarifRehab + TarifNonBedah + TarifBedah;
					$('#tarif_rs_eclaim').html(`<i><h3>Rp. ` + number_format(total_tarif, 0, ',', '.') + `, -</h3></i>`);
				}

				$('#non_bedah_eclaim').val(number_format(TarifNonBedah, 0, ',', '.'));
				$('#radiologi_eclaim').val(number_format(TarifRad, 0, ',', '.'));
				$('#rehabilitas_eclaim').val(number_format(TarifRehab, 0, ',', '.'));
				$('#obat_eclaim').val(number_format(TarifObat, 0, ',', '.'));
				$('#prosedur_bedah_eclaim').val(number_format(TarifBedah, 0, ',', '.'));
				$('#keperawatan_eclaim').val(number_format(TarifKeperawatandanAkomodasi, 0, ',', '.'));
				$('#lab_eclaim').val(number_format(TarifLab, 0, ',', '.'));
				$('#konsultasi_eclaim').val(number_format(TarifKonsul, 0, ',', '.'));
				$('#penunjang_eclaim').val(number_format(TarifHemo, 0, ',', '.'));
				$('#darah_eclaim').val(number_format(TarifDarah, 0, ',', '.'));
				$('#intensif_eclaim').val(number_format(TarifICare, 0, ',', '.'));

				$('#tenaga_ahli_eclaim').val(number_format(TarifTenagaAhli, 0, ',', '.'));
				$('#alkes_eclaim').val(number_format(TarifAlkes, 0, ',', '.'));
				$('#obat_kronis_eclaim').val(number_format(TarifKronis, 0, ',', '.'));
				$('#bhp_eclaim').val(number_format(TarifBHP, 0, ',', '.'));
				$('#obat_kemo_eclaim').val(number_format(TarifKemoterapi, 0, ',', '.'));
				$('#sewa_alat_eclaim').val(number_format(TarifSewaAlat, 0, ',', '.'));

				$('#kode-diagnosa').html(data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('<br>') + data?.diagnosa_sekunder?.map(diag => `<br>${diag.code}`)?.join(''));
				$('#diagnosa-utama').html(data?.diagnosa_utama?.map(diag => `${diag.nama}<i> (Utama)</i>`)?.join('<br>') + data?.diagnosa_sekunder?.map(diag => `<br>${diag.nama}`)?.join(''));

				$('#kode-prosedur-tindakan').html(data?.prosedur_tindakan?.map(diag => `${diag.code}`)?.join('<br>') + data?.tindakan_ok?.map(diag => `<br>${diag.code}`)?.join('') + data?.tindakan_lab?.map(diag => `<br>${diag.code}`)?.join('') + data?.tindakan_rad?.map(diag => `<br>${diag.code}`)?.join(''));
				$('#prosedur-tindakan').html(data?.prosedur_tindakan?.map(diag => `${diag.nama}`)?.join('<br>') + data?.tindakan_ok?.map(diag => `<br>${diag.nama}`)?.join('') + data?.tindakan_lab?.map(diag => `<br>${diag.nama}`)?.join('') + data?.tindakan_rad?.map(diag => `<br>${diag.nama}`)?.join(''));

				$('#procedure').val((data?.prosedur_tindakan?.map(diag => `${diag.code}`)?.join('#')) + (data.tindakan_ok == null ? '' : data?.tindakan_ok?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_lab == null ? '' : data?.tindakan_lab?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_rad == null ? '' : data?.tindakan_rad?.map(diag => `#${diag.code}`)?.join('')));
				$('#diagnosa').val(data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('#') + data?.diagnosa_sekunder?.map(diag => `#${diag.code}`)?.join(''));

				// getListHistoryResepEclaim(1, data.pendaftaran.id_pasien);
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function entrieClaim(id_layanan, id, no_kartu, jenis_rawat) {
		resetFormEklaim();
		// $('#wizard-form').bwizard('show', '0');
		$('#id-layanan-pendaftaran-eclaim').val(id_layanan);
		$('#id-pendaftaran-eclaim').val(id);

		if (no_kartu !== null) {
			getPesertaByPolish(no_kartu);
			getDetailLayananPendaftaranEclaim(id_layanan, id, no_kartu, jenis_rawat);
			swalCustom('info', "Pastikan Koding Diagnosa dan Tindakan Sudah Sesuai!");
			$('#modal-eclaim').modal('show');
			$('#modal-eclaim-label').html('Form Penginputan Data Eclaim');
		} else {
			swalCustom('error', "Nomor Peserta BPJS Kosong!");
		}


	}
</script>