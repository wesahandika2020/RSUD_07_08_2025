<script>
	$(function() {
		getListSalinanResep(1)

		$('#btn-search').click(function() {
			resetData()
			$('#modal-search').modal('show')
		})

		$('#dokter-search').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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

		$('#pasien-search').select2({
			ajax: {
				url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
				var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
				return markup;
			},
			formatSelection: function(data) {
				// fillDataPasien(data);
				return data.id;
			}
		})

		$('#btn-reload').click(function() {
			resetData()
			getListSalinanResep(1)
		})

		$('#status_penyerahan').change(function() {
			getListSalinanResep(1);
		})

		$('#jenis_pelayanan').change(function() {
			getListSalinanResep(1);
		})
	})

	function resetData() {
		$('#form-search')[0].reset()
		$('#tanggal-awal, #tanggal-akhir').val('<?php echo date('d/m/Y') ?>')
	}

	function getListSalinanResep(page, id_resep = '') {
		$('#page').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("salinan_resep/api/salinan_resep/get_list_salinan_resep") ?>/page/' + page + '/id/' + id_resep,
			data: $('#form-search').serialize() + '&keyword=' + $('#keyword').val() + '&status_penyerahan=' + $('#status_penyerahan').val() + '&jenis_pelayanan=' + $('#jenis_pelayanan').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListSalinanResep(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()

				$.each(data.data, function(i, v) {

					let nama_layanan = v.jenis_layanan;
					if (v.spesialisasi !== null) {
						nama_layanan = v.spesialisasi
					}

					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum Dikirim</em>';
					if (v.id_penjualan !== null) {
						status = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Terlayani</span></h5>';
					}

					if (v.is_log == 1) {
						status = `<h5><span class="label label-danger"><i class="far fa-times-circle mr-1"></i>Batal</span></h5>`
					}

					let disabled = '';
					if (v.waktu_diserahkan !== null) {
						disabled = 'disabled pointer-block';
					}

					let waktuDiserahkan = ''
					if (v.waktu_diserahkan !== null && v.is_log != 1) {
						waktuDiserahkan = datetimefmysql(v.waktu_diserahkan)
					}
					if (v.is_log == 1) {
						waktuDiserahkan = `<h5><span class="label label-danger"><i class="far fa-times-circle mr-1"></i>Batal</span></h5>`
					}
					if (v.waktu_diserahkan === null) {
						waktuDiserahkan = '-'
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.id} / ${v.id_resep_tebus}</td> 
							<td class="center">${datefmysql(v.tanggal)}</td>
							<td>${v.dokter}</td>
							<td class="center">${v.no_rm}</td>
							<td>${v.pasien}</td>
							<td class="nowrap">${nama_layanan} <b>${(v.layanan_ok == 'OK' ? '<i class="fas fa-arrow-circle-right mr-1"></i>OK Central' : '')}</b></td>
							<td class="center">${v.cara_bayar}</td>
							<td class="center">${status}</td>
							<td class="center">${waktuDiserahkan}</td>
							<td class="right">`;

					let buttonSalinanResep = '';
					let batalMenyerahkanObat = '';
					if ('<?= $this->session->userdata('account_group') ?>' !== 'Casemix Obat') {
						buttonSalinanResep = `<a class="dropdown-item ${disabled} waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="serahkanResep(${v.id_penjualan}, '${v.pasien}', ${data.page})"><i class="fas fa-fw fa-hand-holding-heart mr-1 ml-1"></i>Serahkan Resep</a>`
						batalMenyerahkanObat = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalMenyerahkan(${v.id_penjualan}, ${data.page})"><i class="fas fa-times-circle mr-1 ml-1"></i>Batal Menyerahkan</a>`;
					}

					if (v.id_penjualan !== null) {
						html += /* html */ `
						<div class="btn-group">
							<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button>
							<div class="dropdown-menu">
								${buttonSalinanResep}
								<a class="dropdown-item ${disabled} waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakSemuaEtiket(${v.id_resep_tebus})"><i class="fas fa-fw fa-print mr-1 ml-1"></i>Cetak Semua E-Tiket</a>
								<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailResepTebus(${v.id_resep_tebus})"><i class="fas fa-fw fa-eye mr-1 ml-1"></i>Detail Resep Tebus</a>
								${batalMenyerahkanObat}
							</div>
						</div>
						`;
					} else {
						if (v.is_log != 1) {
							html += /* html */ `
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk penyerahan resep" onclick="detailResep(${v.id})"><i class="fas fa-dolly-flatbed mr-1"></i></button>
							`;
						} else {
							html += `
								<div class="btn-group">
									<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button>
									<div class="dropdown-menu">
										<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailResepTebus(${v.id_resep_tebus}, 1)"><i class="fas fa-fw fa-eye mr-1 ml-1"></i>Detail Resep Tebus</a>
									</div>
								</div>
								`;
						}
					}

					html += /* html */ `
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function paging(page) {
		getListSalinanResep(page)
	}

	function serahkanResep(id_penjualan, pasien, page) {
		swal.fire({
			title: 'Konfirmasi Penyerehan Resep',
			html: "Apakah anda yakin akan <b>MENYERAHKAN RESEP</b><br>atas nama pasien <b>" + pasien + "</b> ?",
			icon: 'warning',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Serahkan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Tidak',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'GET',
					url: '<?= base_url("salinan_resep/api/salinan_resep/valiadsi_penyerahan_resep") ?>' + '/id/' + id_penjualan,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
						}
						messageCustom(data.message, type)
						getListSalinanResep(page)
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menyerahkan resep', 'Error')
					},
				})
			}
		})
	}

	function riwayatRekamMedis() {
		let no_rm = $('#id-pasien').val();
		$('#tabRiwayat a:last').tab('show');
		$('#riwayat-area').empty();

		$.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien") ?>/id/' + no_rm,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				showDataPasienR(data.pasien);
				showDataRiwayatKunjunganR(data.kunjungan);

				$('#modal-riwayat').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});
	}

	function showDataPasienR(pasien) {

		let kelamin = '';
		if (pasien.kelamin == 'L') {
			kelamin = 'Laki - laki';
		} else {
			kelamin = 'Perempuan';
		}

		if (pasien.tanggal_lahir !== null) {
			umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
		}

		$('#judul-riwayat').html('<b>' + pasien.id + '</b> ' + pasien.nama);
		$('#no-rm-rm-detail').html(pasien.id);
		$('#nama-rm-detail').html(pasien.nama);
		$('#alamat-rm-detail').html(pasien.alamat);
		$('#kelamin-rm-detail').html(kelamin);
		$('#umur-rm-detail').html(umur);

		$('#tempat-lahir-rm-detail').html(pasien.tempat_lahir);
		$('#telp-rm-detail').html(pasien.telp);
		$('#no-identitas-rm-detail').html(pasien.no_identitas);

		$('#agama-rm-detail').html(pasien.agama);
		$('#golongan-darah-rm-detail').html(pasien.gol_darah);
		$('#pendidikan-rm-detail').html(pasien.pendidikan);
		$('#pekerjaan-rm-detail').html(pasien.pekerjaan);
		$('#status-kawin-rm-detail').html(pasien.status_kawin);

		$('#nama-ayah-rm-detail').html(pasien.nama_ayah);
		$('#nama-ibu-rm-detail').html(pasien.nama_ibu);

		$('#alergi-rm-detail').html(pasien.alergi);
	}

	function showDataRiwayatKunjunganR(kunjungan) {
		$('#list-kunjungan').empty();
		$.each(kunjungan, function(i, v) {
			if (i === 0) {
				$('#id-pendaftaran-rm').val(v.id);
			}

			let layanan = '';
			$.each(v.layanan, function(i, val) {
				let isLastIndex = false;
				if (i == (v.layanan.length - 1)) {
					isLastIndex = true;
				}
				layanan += `${val.ruang}${!isLastIndex ? ', ' : ''}`;
			})

			v.dpjp != null ? dpjp_nama = v.dpjp.nama : dpjp_nama = '';
			$('#list-kunjungan').append( /* html */ `
                <li class="li_side pointer" onclick="getDataKunjungan(${v.id}, this)">
                    <a style="font-size: 16pt; display: flex; flex-direction: column">
						${v.tanggal_kunjungan}
						<div style="font-weight: lighter; font-size: 12px">
							${dpjp_nama}(<span>${layanan}</span>)
						</div>
					</a>
                </li>      
            `);
		});
	}

	function cetakCopyResep(id_resep, log) {
		var wWidth = $(window).width();
		var dWidth = wWidth * 1;
		var wHeight = $(window).height();
		var dHeight = wHeight * 1;
		var x = screen.width / 2 - dWidth / 2;
		var y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_copy_resep') ?>/' + id_resep + '/1/' + log, 'Cetak Copy Resep', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakBuktiPelayanan(id_resep, pengambilan_ke) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight = $(window).height();
		let dHeight = wHeight * 1;
		let x = screen.width / 2 - dWidth / 2;
		let y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_bukti_pelayanan_obat') ?>/' + id_resep + '/' + pengambilan_ke, 'Cetak Bukti Resep Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakSemuaEtiket(id_resep) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight = $(window).height();
		let dHeight = wHeight * 1;
		let x = screen.width / 2 - dWidth / 2;
		let y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_all_etiket') ?>/' + id_resep, 'Cetak All Etiket', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function detailResepTebus(id, log = 0) {
		$('#modal-detail-resep-tebus').modal('show')
		$('#modal-detail-resep-tebus-label').html('<i class="fas fa-capsules mr-1"></i>Detail Resep Tebus')
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('pelayanan/api/pelayanan/get_resep_tebus') ?>/id/' + id + '/log/' + log,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#load-data-resep-tebus').html('')
			},
			success: function(val) {
				let data = val.data[0]
				let detail = data.id + '#' + datefmysql(data.tanggal) + '#' + data.dokter + '#' + data.nama_pasien + '#' + data.jenis_layanan + '#' + data.id_dokter + '#' + data.id_pasien + '#' + hitungUmur(data.tanggal_lahir) + '#' + data.id_penjamin + '#' + data.penjamin + '#' + data.cara_bayar;
				let total = 0;
				$('#id-pasien').val(data.id_pasien);
				const idResep = data.id_resep ?? data.id;
				let dataInfo = /* html */ `
					<input type="hidden" name="id_resep" value="${data.id}">
					<div class="col-md-3 mb-3">
						<table width="100%">
							<tr>
								<td width="30%"><b>No. Resep</b></td>
								<td width="2%"><b>:</b></td>
								<td width="68%">${data.id}</td>
							</tr>
							<tr>
								<td><b>Tanggal</b></td>
								<td><b>:</b></td>
								<td>${datefmysql(data.tanggal)}</td>
							</tr>
							<tr>
								<td><b>Dokter</b></td>
								<td><b>:</b></td>
								<td>${data.dokter}</td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td><b>Nama Pasien</b></td>
								<td><b>:</b></td>
								<td>${data.nama_pasien}</td>
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td><b>:</b></td>
								<td>${data.alamat_pasien}</td>
							</tr>
							<tr>
								<td><b>Layanan</b></td>
								<td><b>:</b></td>
								<td>${data.jenis_layanan}</td>
							</tr>
							<tr>
								<td><b>Total</b></td>
								<td><b>:</b></td>
								<td>
									Rp. <span id="total-resep"></span>
									<input type="hidden" name="total" id="total">
								</td>
							</tr>
							<tr>
								<td><b>Riwayat Rekam Medis Pasien <i>(Baru)</i></b></td>
								<td><b>:</b></td>
								<td><button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button></td>
							</tr>
							<tr>
								<td><b>Riwayat Rekam Medis Pasien</b></td>
								<td><b>:</b></td>
								<td colspan="3"><button type="button"class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedis(${data.no_rm}, 1)"><i class="fas fa-eye m-r-5"></i>Riwayat Rekam Medis</button></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3"><button type="button" class="btn btn-secondary btn-xs" onclick="cetakCopyResep(${idResep}, ${log})"><i class="fas fa-print mr-1"></i>Cetak Copy Resep</button></td>
							</tr>
							<tr>
								<td colspan="3"><button type="button" class="btn btn-secondary btn-xs" onclick="cetakBuktiPelayanan(${data.id_resep}, 1)"><i class="fas fa-print mr-1"></i>Cetak Bukti Pelayanan Resep</button></td>
							</tr>
						</table>
					</div>
				`;
				$('#load-data-resep-tebus').html(dataInfo)
				$.each(data.resep_r, function(i, v) {
					let adminTime = v.admin_time.split(',')
					let pagiChecked = '';
					let siangChecked = '';
					let soreChecked = '';
					let malamChecked = '';
					let tanggalPagi = '';
					let tanggalSiang = '';
					let tanggalSore = '';
					let tanggalMalam = '';
					for (let i = 0; i < adminTime.length; i++) {
						let timing = adminTime[i].replace(/\s/g, '')
						if (timing == 'Pagi') {
							pagiChecked = 'checked';
							// tanggalPagi = timing[1];
						}
						if (timing == 'Siang') {
							siangChecked = 'checked';
							// tanggalSiang = timing[1];
						}
						if (timing == 'Sore') {
							soreChecked = 'checked';
							// tanggalSore = timing[1];
						}
						if (timing == 'Malam') {
							malamChecked = 'checked';
							// tanggalMalam = timing[1];
						}
					}

					let html = /* html */ `
						<div class="col-md-12">
							<div class="list-group shadow-sm mb-3"> 
								<div class="list-group-item active">
									No. R/: <b>${v.no_r}</b> | Permintaan: ${v.resep_r_jumlah} | Aturan Pakai: ${v.aturan_pakai} / ${v.ket_aturan_pakai} | Iter: ${v.iter} ${v.sediaan ? `| Cara Pembuatan: ${v.sediaan}` : ''}
								</div>
								<div class="list-group-item list-theme">
									<table class="table table-sm table-striped table-hover">
										<tbody>
											<tr>
												<td width="25%"><i class="fas fa-flask mr-2"></i>Jumlah Tebus:</td>
												<td>${v.tebus_r_jumlah}</td>
												<td colspan="2"></td>
											</tr>
											<tr>												
												<td><i class="fas fa-flask mr-2"></i>Jumlah Pemberian Perhari:</td>
												<td>${v.ket_aturan_pakai}</td>
												<td>
													
												</td>
												<td>
													
												</td>
											</tr>
											<tr>												
												<td><i class="fas fa-flask mr-2"></i>Waktu Pemberian:</td>
												<td>${v.timing} (${v.admin_time})</td>
												<td>
													
												</td>
												<td>
													
												</td>
											</tr>											
											<tr>
												<td width="25%"><i class="fas fa-flask mr-2"></i>Keterangan:</td>
												<td>${v.keterangan_resep}</td>
											</tr>
										</tbody>
									</table>
									<input type="hidden" name="no_r${v.no_r}" value="${v.no_r}">
									<input type="hidden" name="jumlah_r[]" value="${v.no_r}">
									<table class="table table-sm table-striped table-hover color-table info-table" id="table-list-data-resep-tebus${v.no_r}">
										<thead>
											<tr>
												<th width="40%" class="left">Nama Barang</th>
												<th width="10%" class="center">Dosis Racik</th>
												<th width="10%" class="center">Jumlah Pakai</th>
												<th width="15%" class="right">Harga Jual</th>
												<th width="15%" class="right">Subtotal</th>
											</tr>
										</thead>
										<tbody></tbody>
										<tfoot></tfoot>
									</table>
								</div>
							</div>
						</div>
					`;
					$('#load-data-resep-tebus').append(html)
					let subTotal = 0;
					let obatKronis = '';
					$.each(v.resep_r_detail, function(j, x) {
						let cls = '';
						if (parseFloat(x.sisa) < parseFloat(x.jumlah_pakai)) {
							cls = 'blinker blinking';
						}
						if (x.kronis === '1') {
							obatKronis = '<span class="blinker"><i>Obat Kronis</i></span>';
						}
						let str = /* html */ `
							<tr class="rows${v.no_r}" id="rows${v.no_r}${j}">
								<td class="${cls}">
									${x.nama_barang} ${obatKronis}
									<input type="hidden" name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${j}" value="${v.id_barang}">
									<input type="hidden" id="sediaan-obat${v.no_r}${j}" value="${v.sediaan}">
								</td>
								<td class="center">
									<span class="${cls}" id="dosisracik${v.no_r}${j}">${x.dosis_racik}</span>
									<input type="hidden" name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${j}" value="${x.dosis_racik}">
								</td>
								<td class="center">${x.jumlah_pakai}</td>
								<td class="right">${money_format(x.jual_harga)}</td>
								<td class="right" id="subtotal${v.no_r}${j}">${money_format(x.jual_harga * x.jumlah_pakai)}</td>
							</tr>
						`;
						$('#table-list-data-resep-tebus' + v.no_r + ' tbody').append(str)
						subTotal = subTotal + (x.jual_harga * x.jumlah_pakai)
					})
					total = total + subTotal;
					let footer = /* html */ `
						<tr>
							<td colspan="4" class="right">Total R/</td>
							<td class="right" id="subtotal${v.no_r}">${money_format(subTotal)}</td>
						</tr>
					`;
					$('#table-list-data-resep-tebus' + v.no_r + ' tfoot').append(footer)

					$('#total').val(total)
					$('#total-resep').html(money_format(total))
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

	function batalMenyerahkan(id_penjualan, page) {
		swal.fire({
			title: 'Konfirmasi Batal',
			html: 'Apakah anda yakin ingin membatalkan resep ini ?',
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url('pelayanan/api/pelayanan/delete_penjualan') ?>/id/' + id_penjualan,
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status === true) {
							messageDeleteSuccess()
							getListSalinanResep(page)
						} else {
							messageDeleteFailed()
						}

						$('[data-toggle="popover"]').popover('hide')
					},
					complete: function() {
						hideLoader()
					},
				})
			}
		})
	}
</script>