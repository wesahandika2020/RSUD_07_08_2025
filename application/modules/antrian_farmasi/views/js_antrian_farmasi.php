<?php $this->load->view('js') ?>
<script>
	if (typeof AntrianFarmasi !== 'function') {
		window.AntrianFarmasi = class extends BaseClass {

			constructor() {
				super();
				this.warp = $('#warp-antrian-farmasi');
				this.modalListPoli = $('#modal-list-poli');
				this.baseUrl = "<?= base_url('antrian_farmasi/api/antrian_farmasi/') ?>";
				this.page = 1;
			}

			init() {
				this.events()
				this.showAntrianFarmasi(1)
				this.initDatepicker()
				this.initNamaPoli()
			}

			async showAntrianFarmasi(p) {
				const tableBody = $('#table-antrian-online tbody');
				tableBody.empty()
				this.page = p

				try {
					const url = this.baseUrl + 'data_antrian_farmasi'
					const {
						data,
						limit,
						jumlah,
						page
					} = await this.ajaxGet(`${url}/page/${p}/status-resep/${$('#status-resep').val()}`, $('#form_search').serialize())

					if ((p > 1) && (data.length === 0)) {
						await this.showAntrianFarmasi(p - 1);
						return false;
					}

					$('#pagination').html(pagination(jumlah, limit, page, 1));
					$('#summary').html(page_summary(jumlah, data.length, limit, page));
					tableBody.empty()

					for (const [index, value] of data.entries()) {
						const payload = JSON.stringify({
							id: value.id,
							tanggalKunjungan: value.tanggal_kunjungan,
							p
						})

						const payloadDetailWaktu = JSON.stringify({
							durasiTunggu: value.durasi_tunggu,
							durasiDilayani: value.durasi_dilayani
						})

						let btnSlesaiDilayani = ''

						// if (value.status_antrean === 'Dilayani' && value.waktu_diserahkan === null || value.status_antrean === 'Selesai' ) {
						// 	btnSlesaiDilayani = `
						// 	<a class="dropdown-item waves-effect btn-xs btn-selesai-dilayani" href="javascript:void(0)" data-id="${value.id}" data-page="${p}">
						// 		<i class="fas fa-fw fa-check-circle"></i> Pasien Menerima Resep
						// 	</a>`;
						// }

						let no = ((index + 1) + ((page - 1) * limit))

						const html = `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${value.no_rm}</td>
							<td class="center">${value.nomor_antrean}</td>
							<td class="center">${value.nama_pasien}</td>
							<td class="center">${value.poli}</td>
							<td class="left">${value.nama_dokter}</td>
							<td class="center">
								${value.waktu_diserahkan === null && value.status_antrean !== 'Batal'  && value.status_antrean !== null ? `<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>${value.status_antrean}</i></span>` : ``}
								${value.waktu_diserahkan !== null  ? `<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Pasien menerima resep</span></h5>` : ''}
								${value.status_antrean === 'Batal' ? `<h5><span class="label label-red">Batal</span></h5>` : ''}
							</td>
							<td class="center">${value.panggilan_pasien || ''}</td>
							<td class="center">${value.waktu_panggil || ''}</td>
							<td class="center">${value.loket || ''}</td>
							<td class="center">${value.is_cetak_semua ? '<i class="fas fa-check-circle"></i>' : '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Process</i></span>'}</td>
							<td class="center">${value.waktu_hadir}</td>
							<td class="center">${value.waktu_diserahkan || '-'}</td>
							<td class="right">
								<div class="btn-group">
									<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown" ${value.status_antrean === 'Batal' ? 'disabled' : ''}>
										<i class="fas fa-cog"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item waves-effect waves-light btn-xs btn-list-resep" href="javascript:void(0)" data='${value.id_layanan_pendaftaran}'>
											<i class="fas fa-list"></i> List resep
										</a>
										${btnSlesaiDilayani}
										<a class="dropdown-item waves-effect btn-xs btn-cetak-antrian" href="javascript:void(0)" data-id="${value.id}">
											<i class="fa fa-print"></i> Cetak Antrian
										</a>
										<a class="dropdown-item waves-effect waves-light btn-xs btn-batal-antrean" href="javascript:void(0)" data='${payload}'>
											<i class="fas fa-trash"></i> Batal Antrean
										</a>
										<a class="dropdown-item waves-effect waves-light btn-xs btn-detail-waktu" href="javascript:void(0)" data='${payloadDetailWaktu}'>
											<i class="far fa-clock"></i> Detail Waktu
										</a>
									</div>
								</div>
							</td>
						</tr>
						`;
						tableBody.append(html);
					}
				} catch (error) {
					accessFailed(error.status);
					console.log(error)
				}
			}

			async cekPoli(e) {
				const target = $(e.target)

				if (target.is('#no-rm')) {
					const input = $('#no-rm')
					const noRm = input.val();

					if (noRm > 8) {
						input.val(noRm.slice(0, 8));
					}
				}

				if ((e.which === 13 && target.is('#no-rm')) || (e.type === 'click' && target.is('#btn-add-antrian'))) {
					const input = $('#no-rm')
					const noRm = input.val();
					const modalTableBody = $('#modal-list-poli table tbody');
					modalTableBody.empty();

					if (!noRm) {
						messageCustom('Nomor rekam medis belum diisi', 'Error');
						return;
					}
					showLoader();

					const url = this.baseUrl + 'cek_poli_farmasi'

					try {
						const {
							data
						} = await this.ajaxGet(`${url}/no_rm/${noRm}`);

						if (data.length < 2 && data.length > 0) {
							await this.cekAntrian(null, {
								noRm,
								idPoli: data[0].id_poli,
								idResep: data[0].id_resep,
								idLayanan: data[0].id_layanan_pendaftaran
							})

							return;
						}

						for (const [index, value] of data.entries()) {
							const payload = JSON.stringify({
								noRm,
								idPoli: value.id_poli,
								idResep: value.id_resep,
								idLayanan: value.id_layanan_pendaftaran
							})
							let btnAksi = '';

							if (value.lunas === 'Belum' && value.penjamin == '9') {
								btnAksi = `<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Bayar</i></span>`;
							} else {
								btnAksi = `
								<buton class="btn waves-effect waves-light btn-info btn-tambah-antrian-farmasi ${value.id_antrian_farmasi === null ? '' : 'disabled'}" ${value.id_antrian_farmasi === null ? '' : 'disabled'} data='${payload}'>
									<i class="fas fa-print"></i> Cetak Antrian
								</buton>
								`
							}

							const html = `<tr>
								<td style="font-size: 18px">${index + 1}</td>
								<td style="font-size: 18px">${value.nama_pasien}</td>
								<td style="font-size: 18px">${value.poli}</td>
								<td style="font-size: 18px">${value.nama_dokter}</td>
								<td style="font-size: 18px">
									${value.status_antrean !== 'Selesai' && value.status_antrean !== 'Batal' && value.status_antrean !== null ? `<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>${value.status_antrean}</i></span>` : `-`}
									${value.status_antrean === 'Selesai' ? `<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Pasien menerima resep</span></h5>` : ''}
									${value.status_antrean === 'Batal' ? `<h5><span class="label label-red">Batal</span></h5>` : ''}
								</td>
								<td style="font-size: 18px">${value.tindak_lanjut === null ? '<span class="badge badge-danger">Belum Checkout</span>' : '<span class="badge badge-success">Sudah Checkout</span>'}</td>
								<td style="font-size: 18px">${btnAksi}</td>
							</tr>`;

							modalTableBody.append(html);
						}

						this.modalListPoli.modal('show');
						hideLoader();
					} catch (error) {
						hideLoader();

						if (error.status === 404 || error.status === 400 || error.status === 500) {
							swalAlert('info', 'INFO', `<b>${error.responseJSON.message?.toUpperCase()}</b>`)
						}
					}

					input.val('');
				}
			}

			getNoAntrian(idLayanan) {
				const url = this.baseUrl + 'get_no_antrian_farmasi';

				return this.ajaxGet(`${url}/id_layanan/${idLayanan}`)
			}

			tambahAntrian(data) {
				const url = this.baseUrl + 'tambah_antrian_farmasi';

				return this.ajaxPost(url, data);
			}

			getEstimasiDilayanin(tanggal, urutan) {
				const hitung = (urutan * 120000) - 120000;
				const konvWaktu = new Date(tanggal).getTime();

				return konvWaktu + 120000;
			}

			async cekAntrian(e, data = null) {
				showLoader();

				let dataPasien = null;

				if (data === null) {
					const target = $(e.target);
					if (target.is('[disabled]')) return;

					dataPasien = JSON.parse(target.attr('data'))

				} else {
					dataPasien = data
				}

				try {
					// Check Sudah Bayar
					await this.checkSudahBayar(dataPasien.idLayanan);

					// Check status keluar
					await this.checkStatusKeluar(dataPasien.idLayanan);

					// Get nomor antrian
					const responseGetNoAntrian = await this.getNoAntrian(dataPasien.idLayanan);

					// Tambah antrian
					const responseTambahAntrian = await this.tambahAntrian({
						...responseGetNoAntrian.metaData.response,
						racik: responseGetNoAntrian.metaData.response.racik ? 1 : 0,
						no_rm: dataPasien.noRm,
						id_poli: dataPasien.idPoli,
						id_layanan: dataPasien.idLayanan
					});

					messageCustom(responseTambahAntrian.message, 'Success');

					this.cetakAntrian(responseTambahAntrian.id_antrian)

					await this.showAntrianFarmasi(1)
					this.modalListPoli.modal('hide')
					hideLoader();
				} catch (error) {
					hideLoader();

					if (error.status === 404 || error.status === 400 || error.status === 500 && error.responseJSON.status !== 'status_keluar') {
						messageCustom(error.responseJSON.message, 'Error');
					}

					if (error.responseJSON.status === 'status_pasien') {
						swalAlert('info', 'INFO', `${error.responseJSON.message?.toUpperCase()}`)
						this.modalListPoli.modal('hide')
					}
				}

				$('#no-rm').val('').focus();
			}

			handleSearchModalOpen() {
				this.warp.off('blur', '#no-rm')
				$('#modal-search').modal('show');
				$('#modal-search-label').html('Parameter Pencarian');
			}

			handleFocusInputBarcode() {
				$('#no-rm').focus();
				this.warp.on('blur', '#no-rm', function() {
					$(this).focus()
				})
			}

			handleCetakAntrian(e) {
				const id = $(e.target).attr('data-id')

				this.cetakAntrian(id)
			}

			cetakAntrian(id) {
				const dWidth = $(window).width();
				const dHeight = $(window).height();
				const x = screen.width / 2 - dWidth / 2;
				const y = screen.height / 2 - dHeight / 2;

				window.open('<?= base_url() ?>antrian_farmasi/cetak_antrian/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
			}

			handleCetakCopyResep(e) {
				const idResep = $(e.target).attr('data-id-resep')
				const idAntrian = $(e.target).attr('data-id-antrian')
				const idLayanan = $(e.target).attr('data-id-layanan')

				const wWidth = $(window).width();
				const dWidth = wWidth * 1;
				const wHeight = $(window).height();
				const dHeight = wHeight * 1;
				const x = screen.width / 2 - dWidth / 2;
				const y = screen.height / 2 - dHeight / 2;
				window.open('<?= base_url('antrian_farmasi/cetak_copy_resep') ?>/' + idResep + '/' + idAntrian + '/1', 'Cetak Copy Resep', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);

				setTimeout(() => {
					this.handleViewListResep(null, idLayanan)
					this.showAntrianFarmasi(1)
				}, 1000)
			}

			handleBatalAtreanModalOpen(e) {
				this.warp.off('blur', '#no-rm')
				const {
					id,
					tanggalKunjungan,
					p
				} = JSON.parse($(e.target).attr('data'));
				$('#page-batal').val(p);
				$('#id-batal').val(id);
				$('#tanggal-kunjungan-batal').val(tanggalKunjungan);
				$('#modal-batal-antrean').modal('show');
			}

			async handleBatalAntrean() {
				$('#modal-batal-antrean').modal('hide');

				const alert = await swal.fire({
					title: 'Konfirmasi',
					html: 'Apakah anda ingin membatalkan Antrean pada pasien ini ?',
					icon: 'question',
					showCancelButton: true,
					confirmButtonText: '<i class="fas fa-save"></i> Simpan',
					cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
					reverseButtons: true,
					allowOutsideClick: false
				})

				if (!alert?.value) return;

				try {
					const payload = {
						id_batal: $('#id-batal').val(),
						keterangan_batal: $('#keterangan-batal').val()
					}

					const url = this.baseUrl + 'batal_antrian'
					const data = await this.ajaxPost(url, payload)

					messageCustom(data.message, 'Success');
					await this.showAntrianFarmasi($('#page-batal').val());
				} catch (error) {
					accessFailed(error.status);
				}
			}

			async handleSelesaiDilayani(e) {
				const id = $(e.target).attr('data-id')
				const page = $(e.target).attr('data-page')

				const alert = await swal.fire({
					title: 'Konfirmasi Penyerehan Resep',
					html: "Apakah anda yakin akan <b>MENYERAHKAN RESEP</b> ?",
					icon: 'warning',
					showCancelButton: true,
					buttonsStyling: true,
					confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Serahkan',
					cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Tidak',
					reverseButtons: true
				})

				if (!alert?.value) return;

				try {
					const url = this.baseUrl + 'selesai_dilayani'
					const data = await this.ajaxPost(url, {
						id
					})

					messageCustom(data.message, 'Success');
					await this.showAntrianFarmasi(page)
				} catch (error) {
					messageCustom(error.message, 'Error');
				}
			}

			handleCariAntrian() {
				this.showAntrianFarmasi(1);
				$('#modal-search').modal('hide');
			}

			async handleDetailResepTebus(e) {
				const id = $(e.target).attr('data-id')
				$('#modal-detail-resep-tebus').modal('show')
				$('#modal-detail-resep-tebus-label').html('<i class="fas fa-capsules mr-1"></i>Detail Resep Tebus')

				try {
					const url = "<?php echo base_url('pelayanan/api/pelayanan/get_resep_tebus') ?>/id/" + id
					$('#load-data-resep-tebus').html('')
					const response = await this.ajaxGet(url);

					let data = response.data[0]
					let total = 0;
					$('#id-pasien').val(data.id_pasien);

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
									<td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
									<td><b>:</b></td>
									<td><button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button></td>
								</tr>
								<tr>
									<td><b>Riwayat Rekam Medis Pasien</b></td>
									<td><b>:</b></td>
									<td colspan="3"><button type="button" class="btn btn-secondary btn-xxs btn-riwayat-rekam-medis"><i class="fas fa-eye m-r-5"></i>Riwayat Rekam Medis</button></td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><button type="button" class="btn btn-secondary btn-xs btn-cetak-bukti-pelayanan" data-id="${data.id_resep}""><i class="fas fa-print mr-1"></i>Cetak Bukti Pelayanan Resep</button></td>
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
									No. R/: <b>${v.no_r}</b> | Permintaan: ${v.resep_r_jumlah} | Aturan Pakai: ${v.aturan_pakai} / ${v.ket_aturan_pakai} | Iter: ${v.iter} | Cara Pembuatan: ${v.cara_pembuatan}
								</div>
								<div class="list-group-item list-theme">
									<table class="table table-sm table-striped table-hover">
										<tbody>
											<tr>
												<td width="25%"><i class="fas fa-flask mr-2"></i>Jumlah Tebus:</td>
												<td>${v.tebus_r_jumlah}</td>
												<td colspan="2">Admin Time (<i>Hari pertama pemberian</i>):</td>
											</tr>
											<tr>
												<td><i class="fas fa-flask mr-2"></i>Jumlah Pemberian Perhari:</td>
												<td>${v.ket_aturan_pakai}</td>
												<td>
													<div class="checkbox">
														<input type="checkbox" class="check${v.no_r} mr-1" value="Pagi" ${pagiChecked} disabled>Pagi
													</div>
												</td>
												<td>
													<div class="checkbox">
														<input type="checkbox" class="check${v.no_r} mr-1" value="Siang" ${siangChecked} disabled>Siang
													</div>
												</td>
											</tr>
											<tr>
												<td><i class="fas fa-flask mr-2"></i>Waktu Pemberian:</td>
												<td>${v.cara_pemberian} Makan</td>
												<td>
													<div class="checkbox">
														<input type="checkbox" class="check${v.no_r} mr-1" value="Sore" ${soreChecked} disabled>Sore
													</div>
												</td>
												<td>
													<div class="checkbox">
														<input type="checkbox" class="check${v.no_r} mr-1" value="Malam" ${malamChecked} disabled>Malam
													</div>
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
				} catch (error) {
					accessFailed(error.status);
					console.log(error)
				}
			}

			handleCetakEtiketResep(e) {
				const id = $(e.target).attr('data-id')

				let wWidth = $(window).width();
				let dWidth = wWidth * 1;
				let wHeight = $(window).height();
				let dHeight = wHeight * 1;
				let x = screen.width / 2 - dWidth / 2;
				let y = screen.height / 2 - dHeight / 2;
				window.open('<?= base_url('resep/printing_all_etiket') ?>/' + id, 'Cetak All Etiket', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
			}

			async handleRiwayatRekamMedis(e) {
				let no_rm = $('#id-pasien').val();
				$('#tabRiwayat a:last').tab('show');
				$('#riwayat-area').empty();

				try {
					const url = "<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien") ?>/id/" + no_rm;
					const data = await this.ajaxGet(url);
					this.showDataPasienR(data.pasien);
					this.showDataRiwayatKunjunganR(data.kunjungan);

					$('#modal-riwayat').modal('show');
				} catch (error) {
					accessFailed(error.status);
					console.log(error)
				}
			}

			showDataPasienR(pasien) {

				let kelamin = '';
				if (pasien.kelamin == 'L') {
					kelamin = 'Laki - laki';
				} else {
					kelamin = 'Perempuan';
				}

				let umur = '';

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

			showDataRiwayatKunjunganR(kunjungan) {
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

					let dpjp_nama = v.dpjp != null ? v.dpjp.nama : '';
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

			handleCetakBuktiPelayanan(e) {
				const id = $(e.target).attr('data-id')

				let wWidth = $(window).width();
				let dWidth = wWidth * 1;
				let wHeight = $(window).height();
				let dHeight = wHeight * 1;
				let x = screen.width / 2 - dWidth / 2;
				let y = screen.height / 2 - dHeight / 2;

				window.open('<?= base_url('resep/printing_bukti_pelayanan_obat') ?>/' + id + '/' + 1, 'Cetak Bukti Resep Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
			}

			secondsToHms(d) {
				d = Number(d);
				const h = Math.floor(d / 3600);
				const m = Math.floor(d % 3600 / 60);
				const s = Math.floor(d % 3600 % 60);

				const hDisplay = h > 0 ? h + (h == 1 ? " jam, " : " jam, ") : "";
				const mDisplay = m > 0 ? m + (m == 1 ? " menit, " : " menit, ") : "";
				const sDisplay = s > 0 ? s + (s == 1 ? " detik" : " detik") : "";
				return hDisplay + mDisplay + sDisplay;
			}

			handleViewDetailWaktu(e) {
				const {
					durasiTunggu,
					durasiDilayani
				} = JSON.parse($(e.target).attr('data'));

				$('#detail-waktu-tunggu b').html(this.secondsToHms(durasiTunggu))
				$('#detail-waktu-dilayani b').html(this.secondsToHms(durasiDilayani))
				$('#modal-detail-waktu').modal('show');
			}

			async handleViewListResep(e, idToPrint = null) {
				let id = null;
				if (e !== null) {
					id = $(e.target).attr('data');
				}
				if (idToPrint !== null) {
					id = idToPrint;
				}

				try {
					const url = this.baseUrl + 'get_list_resep';
					const data = await this.ajaxGet(`${url}/id_layanan_pendaftaran/${id}`)

					$('#modal-list-resep table tbody').empty();

					for (const [i, v] of data.data.entries()) {
						const html = /* html */ `
							<tr>
								<td>${i + 1}</td>
								<td class="center">${v.is_cetak === '1' ? '<i class="fas fa-check-circle"></i>' : '-'}</td>
								<td>${datetimefmysql(v.waktu)}</td>
								<td>${v.waktu_diserahkan !== null ? datetimefmysql(v.waktu_diserahkan) : '-'}</td>
								<td>
									<div style="display: flex; flex-direction: column; gap: .5rem">
										<button type="button" class="waves-effect btn btn-primary btn-xs btn-cetak-copy-resep" href="javascript:void(0)" data-id-resep="${v.id}" data-id-antrian="${v.id_antrian_farmasi}" data-id-layanan="${v.id_layanan_pendaftaran}">
											<i class="fa fa-print"></i> Cetak Copy Resep
										</button>
										<button type="button" class="waves-effect btn btn-warning btn-xs btn-riwayat-cetak-copy-resep" href="javascript:void(0)" data-id-resep="${v.id}">
											<i class="fas fa-history"></i> Riwayat Cetak Copy Resep
										</button>
										<button type="button" class="waves-effect btn btn-success btn-xs rounded btn-detail-resep-tabus" href="javascript:void(0)" data-id="${v.id_resep_tebus}">
											<i class="fas fa-fw fa-eye"></i> Detail Resep Tebus
										</button>
										<button type="button" class="waves-effect btn btn-secondary btn-xs rounded btn-cetak-e-tiket" href="javascript:void(0)" data-id="${v.id_resep_tebus}" data-page="${this.page}">
											<i class="fas fa-fw fa-print"></i> Cetak Semua E-Tiket
										</button>
										<button type="button" class="waves-effect btn btn-secondary btn-xs rounded btn-selesai-dilayani" href="javascript:void(0)" data-id="${v.id}" data-page="${this.page}">
											<i class="fas fa-fw fa-check-circle"></i> Pasien Menerima Resep
										</button>
									</div>
								</td>
							</tr>
						`;

						$('#modal-list-resep table tbody').append(html);
					}

					$('#modal-list-resep').modal('show');

				} catch (error) {
					console.log(error)
					accessFailed(error.status);
				}

			}

			async handleModalRiwayatCetakCopyResep(e) {
				const idResep = $(e.target).attr('data-id-resep');

				try {
					const url = this.baseUrl + 'get_list_history_cetak_copy_resep';
					const data = await this.ajaxGet(`${url}/id_resep/${idResep}`)

					$('#modal-history-cetak-copy-resep table tbody').empty();
					$('#modal-history-cetak-copy-resep-label').html('Riwayat Cetak Copy Resep')

					for (const [i, v] of data.data.entries()) {
						const html = /* html */ `
							<tr>
								<td>${i + 1}</td>
								<td>${v.nama}</td>
								<td>${v.tercetak_ke}</td>
								<td>${datetimefmysql(v.created_at)}</td>
							</tr>
						`;

						$('#modal-history-cetak-copy-resep table tbody').append(html);
					}

					$('#modal-history-cetak-copy-resep').modal('show');

				} catch (error) {
					console.log(error)
					accessFailed(error.status);
				}

			}

			events() {
				this.warp.on('click keypress', '#btn-add-antrian, #no-rm', (e) => this.cekPoli(e))
				this.warp.on('blur', '#no-rm', (e) => $(e.target).focus())
				this.warp.on('click', '#bt-search', () => this.handleSearchModalOpen())
				this.warp.on('click', '.btn-cetak-antrian', (e) => this.handleCetakAntrian(e))
				this.warp.on('click', '.btn-batal-antrean', (e) => this.handleBatalAtreanModalOpen(e))
				this.warp.on('click', '.btn-detail-waktu', (e) => this.handleViewDetailWaktu(e))
				this.warp.on('click', '.btn-list-resep', (e) => this.handleViewListResep(e))
				this.warp.on('change', '#status-resep', (e) => this.handleStatusResep(e))
				this.warp.on('click', '#btn-export', (e) => this.handleExport())

				const modalDetailResepTebus = $('#modal-detail-resep-tebus');
				modalDetailResepTebus.on('click', '.btn-riwayat-rekam-medis', (e) => this.handleRiwayatRekamMedis(e))
				modalDetailResepTebus.on('click', '.btn-cetak-bukti-pelayanan', (e) => this.handleCetakBuktiPelayanan(e))

				this.modalListPoli.on('click', '.btn-tambah-antrian-farmasi', (e) => this.cekAntrian(e))

				$('#modal-search').on('hidden.bs.modal', () => this.handleFocusInputBarcode())
				$('#simpan-batal-antrean').on('click', (e) => this.handleBatalAntrean(e))
				$('#modal-batal-antrean').on('hidden.bs.modal', () => this.handleFocusInputBarcode())

				$('#modal-list-resep').on('click', '.btn-cetak-copy-resep', (e) => this.handleCetakCopyResep(e))
				$('#modal-list-resep').on('click', '.btn-riwayat-cetak-copy-resep', (e) => this.handleModalRiwayatCetakCopyResep(e))
				$('#modal-list-resep').on('click', '.btn-detail-resep-tabus', (e) => this.handleDetailResepTebus(e))
				$('#modal-list-resep').on('click', '.btn-selesai-dilayani', (e) => this.handleSelesaiDilayani(e))
				$('#modal-list-resep').on('click', '.btn-cetak-e-tiket', (e) => this.handleCetakEtiketResep(e))

				$('#btn-cari-antrian').on('click', () => this.handleCariAntrian())
			}

			handleExport() {
				window.open('<?= base_url('antrian_farmasi/export_antrian?') ?>' + $('#form_search').serialize())
			}

			handleStatusResep(e) {
				this.showAntrianFarmasi(1)
			}

			initDatepicker() {
				$('#tanggal-awal, #tanggal-akhir').datepicker({
					format: 'dd/mm/yyyy',
					endDate: this.date
				}).on('changeDate', function() {
					$(this).datepicker('hide')
				});
			}

			initNamaPoli() {
				const _this = this;
				$('#nm-poli').select2({
					width: '100%',
					ajax: {
						url: "<?= base_url('antrian_farmasi/api/antrian_farmasi/kode_bpjs') ?>",
						dataType: 'json',
						quietMillis: 100,
						data: function(term, page) { // page is the one-based page number tracked by Select2
							return {
								q: term, //search term
								page: page, // page number
							};
						},
						results: function(data, page) {
							const more = (page * 20) < data.total; // whether or not there are more results available

							// notice we return the value of more so Select2 knows if more results can be loaded
							return {
								results: data.data,
								more
							};
						}
					},
					formatResult: function(data) {
						let kode = '';
						if (data.kode !== '') {
							kode = '<b>' + data.kode + '</b> - ';
						}
						return kode + data.nama;
					},
					formatSelection: function(data) {
						_this.searchDokterAntrian(data.id);
						return data.nama;
					}
				});
			}

			async searchDokterAntrian(id_spesialisasi = null) {
				try {
					const url = this.baseUrl + 'get_spesialisasi';
					const data = await this.ajaxGet(`${url}/id_spesialisasi/${id_spesialisasi}`)

					let html = '<option value="">Pilih Dokter</option>';
					for (const value of data) {
						html += `<option value="${value.id}"><b>${value.dokter}</b> - <small>${value.spesialisasi} ${value.jml_terlayani}</small></option>`
					}

					$('#nm-dokter').html(html);
				} catch (error) {
					accessFailed(error.status);
				}
			}

			checkStatusKeluar(idLayanan) {
				const url = this.baseUrl + 'check_status_keluar';
				return this.ajaxGet(`${url}/id_layanan/${idLayanan}`)
			}

			checkSudahBayar(idLayanan) {
				const url = this.baseUrl + 'check_sudah_bayar';
				return this.ajaxGet(`${url}/id_layanan/${idLayanan}`)
			}
		}
	}

	$(function() {
		new AntrianFarmasi().init()
	})

	function paging(page) {
		new AntrianFarmasi().showAntrianFarmasi(page)
	}
</script>
