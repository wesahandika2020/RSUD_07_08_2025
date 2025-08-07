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
		$('#keyword-search').keyup(function() {
			getListRekapBilling(1)
		})
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
				console.log(data);
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

					let jenisLayanan = v.jenis_layanan
					if (jenisLayanan = ('')) {

					}

					let objectDownload = {
						id_radiologi: v.id_radiologi,
						id_laboratorium: v.id_laboratorium,
						jenis_lab: v.jenis_laboratorium,
						jenis_layanan: v.jenis_layanan
					}

					let paramDownload = JSON.stringify(objectDownload);

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '-')}</td>
							<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}</td>
							<td class="center">${v.id_pasien}</td>
							<td>${v.nama}</td>
							<td>${v.jenis_layanan} ${spesialisasi}</td>
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
                    ${'<!-- a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" ><i class="fas fa-donate"></i> e-Klaim</a -->'}
                    ${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id_layanan + ')"><i class="fas fa-book"></i> Riwayat Rekam Medis</a>'}
                    ${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="historyPembayaran('+v.id_pendaftaran+')"> <i class="fas fa-dollar-sign"></i> History Pembayaran</a>'}
                    ${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakRincianBilling('+v.id_pendaftaran+','+ v.id_layanan +')"><i class="fas fa-hand-holding-usd"></i> Rekap Billing</a>'}
										${((v.id_radiologi !== null) ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showRMHasilRadiologi('+v.id_radiologi+')"><i class="fas fa-print"></i> Hasil Radiologi</a>' : '')}
										${((v.id_laboratorium !== null & jenisLab == '1') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilLaboratoriumNew('+v.id_pendaftaran+')"><i class="fas fa-print"></i> Hasil Laboratorium</a>' : '')}
										${((v.id_laboratorium !== null & jenisLab == '2') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilLaboratoriumPA('+v.id_laboratorium+')"><i class="fas fa-print"></i> Hasil Laboratorium PA MANUAL</a>' : '')}
										${((v.id_laboratorium !== null & jenisLab == '2') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilLaboratorium('+v.id_laboratorium+')"><i class="fas fa-print"></i> Hasil Laboratorium PA LIS</a>' : '')}
										${((v.id_laboratorium !== null & jenisLab == '3') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakHasilLaboratoriumMB('+v.id_laboratorium+')"><i class="fas fa-print"></i> Hasil Laboratorium MB</a>' : '')}
										${v.jenis_layanan === 'Poliklinik' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRajal('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'Rawat Inap' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisRanap('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'Intensive Care' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIntensiveCare('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'IGD' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisIGD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'Hemodialisa' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'Pemulasaran Jenazah' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${v.jenis_layanan === 'Laboratorium' ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedisHD('+ v.id_layanan + ',' + v.id_pendaftaran +')"><i class="fas fa-print"></i> Resume Medis</a>' : ''}
										${((v.jenis_rawat === 'Inap') ? '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="printCPPT('+ v.id_pendaftaran + ',' + v.id_layanan +')"><i class="fas fa-print"></i> Cetak CPPT</a>' : '')}
										${'<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="downloadDokumen('+ v.id_pendaftaran + ',' + v.id_layanan + ',' + v.id_radiologi + ',' + v.id_laboratorium + ',' + jenisLab +')"><i class="fas fa-download"></i> Download Dokumen</a>'}
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
		window.open('<?= base_url('casemix/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}


	function cetakResumeMedisIGD(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function cetakResumeMedisHD(id_layanan, id_pendaftaran) {
		window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id_layanan + '/' + id_pendaftaran, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	// function downloadDokumen(id_pendaftaran, id_layanan) {
	// 	window.open('<?= base_url('casemix/download_dokumen/') ?>' + id_pendaftaran + '/' + id_layanan, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	// }

	function downloadDokumen(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan) {
		location.href = `<?= base_url('casemix/download_dokumen/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`;
	}

	function paging(page) {
		getListRekapBilling(page)
	}

	function hapusFileZip(file_name) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('casemix/api/casemix/hapus_dokumen_zip') ?>/file_name/' + file_name,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
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
		window.open('<?php echo base_url() ?>casemix/printing_hasil_laboratorium/' + id_pendaftaran, 'Cetak Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumPA(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_pa/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakHasilLaboratoriumMB(id_laboratorium) {
		window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_mb/' + id_laboratorium, 'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}
</script>