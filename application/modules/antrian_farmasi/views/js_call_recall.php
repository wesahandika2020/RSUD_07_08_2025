<?php $this->load->view( 'js' ) ?>
<script>
	if (typeof CallRecallFarmasi !== 'function') {
		window.CallRecallFarmasi = class extends BaseClass {

			constructor() {
				super();
				this.warp = $('#warp-call-recall-farmasi');
				this.modalCallAntran = $('#modal-call-antrean');
				this.baseUrl = "<?= base_url( 'antrian_farmasi/api/antrian_farmasi/' ) ?>";
				this.audioUrl = "<?=resource_url()?>audio";
			}

			init() {
				this.events()
				this.initDatepicker()
				this.initNamaPoli()
				this.getCallPasien(1)
			}

			events() {
				this.warp.on('click', '#bt-search', () => this.handleSearchModalOpen())
				this.warp.on('click', '.btn-recall-pasien, .btn-call-pasien', (e) => this.handleCallAndRecall(e))
				this.warp.on('click', '.btn-pasien-hadir', (e) => this.handlePasienHadir(e))
				this.warp.on('change', '#jenis-antrian', () => this.handleFilterAntrian())

				this.modalCallAntran.on('click', '.btn-panggil', () => this.handleSimpanCallAntrean())

				$('#btn-cari-antrian').on('click', () => this.handleCariAntrian())
			}

			async handleFilterAntrian() {
				await this.getCallPasien(1)
			}

			handleSearchModalOpen() {
				$('#modal-search').modal('show');
				$('#modal-search-label').html('Parameter Pencarian');
			}

			initDatepicker() {
				$('#tanggal-awal, #tanggal-akhir').datepicker({
					format: 'dd/mm/yyyy',
					endDate: this.date
				}).on('changeDate', function () {
					$(this).datepicker('hide')
				});
			}

			initNamaPoli() {
				const _this = this;
				$('#nm-poli').select2({
					width: '100%',
					ajax: {
						url: "<?= base_url( 'antrian_farmasi/api/antrian_farmasi/kode_bpjs' ) ?>",
						dataType: 'json',
						quietMillis: 100,
						data: function (term, page) { // page is the one-based page number tracked by Select2
							return {
								q: term, //search term
								page: page, // page number
							};
						},
						results: function (data, page) {
							const more = (page * 20) < data.total; // whether or not there are more results available

							// notice we return the value of more so Select2 knows if more results can be loaded
							return {
								results: data.data,
								more
							};
						}
					},
					formatResult: function (data) {
						let kode = '';
						if (data.kode !== '') {
							kode = '<b>' + data.kode + '</b> - ';
						}
						return kode + data.nama;
					},
					formatSelection: function (data) {
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

			async getCallPasien(p) {
				$('#page-now').val(p);

				try {
					const url = this.baseUrl + 'data_panggil_pasien'
					const {data, limit, jumlah, page} = await this.ajaxGet(`${url}/p/${p}`, $('#form_search').serialize() + '&jenis_antrian=' + $('#jenis-antrian').val());

					if ((p > 1) && (data.length === 0)) {
						await this.getCallPasien(p - 1);
						return false;
					}

					$('#pagination').html(pagination(jumlah, limit, page, 1));
					$('#summary').html(page_summary(jumlah, data.length, limit, page));
					const table = $('#table-panggil-pasien tbody')
					table.empty();

					let call = '';

					for (const [index, value] of data.entries()) {
						let no = ((index + 1) + ((page - 1) * limit));

						let statusPanggilan = '';

						const callRecallPayload = {
							id: value.id,
							no: value.nomor_antrean,
							call: value.panggilan_pasien,
							p
						}

						const pasienHadirPayload = JSON.stringify({id: value.id, p})

						if ((value.panggilan_pasien === 'Call' | value.panggilan_pasien === 'Recall') && value.pasien_hadir === 'Dilayani') {
							call = `<button type="button" class="btn btn-secondary btn-xxs btn-recall-pasien" data='${JSON.stringify({
								...callRecallPayload,
								type: 'recall'
							})}'><i class="fas fa-sign m-r-5"></i>Recall</button>`;
							statusPanggilan = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Hadir</span></h5>';
						} else if (value.panggilan_pasien === 'Call' && value.pasien_hadir === 'Hadir') {
							call = `<button type="button" class="btn btn-secondary btn-xxs btn-recall-pasien" data='${JSON.stringify({...callRecallPayload, type: 'recall'})}'>
										<i class="fas fa-sign m-r-5"></i>Recall
									</button>
									<button type="button" class="btn btn-secondary btn-xxs btn-pasien-hadir" data=${pasienHadirPayload}>
										<i class="fas fa-sign m-r-5"></i>Pasien Hadir
									</button>`;
							statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Call</i></span>';
						} else if (value.panggilan_pasien === 'Recall' && value.pasien_hadir === 'Hadir') {
							call = `<button type="button" class="btn btn-secondary btn-xxs btn-recall-pasien" data='${JSON.stringify({...callRecallPayload, type: 'recall'})}'>
										<i class="fas fa-sign m-r-5"></i>Recall
									</button>
									<button type="button" class="btn btn-secondary btn-xxs btn-pasien-hadir" data=${pasienHadirPayload}>
										<i class="fas fa-sign m-r-5"></i>Pasien Hadir
									</button>`;
							statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Recall</i></span>';
						} else {
							call = `<button type="button" class="btn btn-secondary btn-xxs btn-call-pasien" data='${JSON.stringify({
								...callRecallPayload,
								type: 'call'
							})}'><i class="fas fa-sign m-r-5"></i>Call</button>`;
							statusPanggilan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Dipanggil</i></span>';
						}

						let html = `<tr>
							<td class="center">${no}</td>
							<td class="center">${value.no_rm}</td>
							<td class="center">${value.nomor_antrean}</td>
							<td class="center">${value.poli}</td>
							<td class="center">${value.nama_dokter}</td>
							<td class="center">${value.loket || ''}</td>
							<td class="center">${statusPanggilan}</td>
							<td class="right">
								${call}
							</td>
						</tr>`;
						table.append(html);
					}
				} catch (error) {
					console.log(error);
					accessFailed(error.status);
				}
			}

			async handleCallAndRecall(e) {
				const {id, no, call, p, type} = JSON.parse($(e.target).attr('data'));

				try {
					const url = this.baseUrl + 'delay_panggilan';

					const data = await this.ajaxGet(url)

					if (data.status === '0') {
						$('#page-call').val(p);
						$('#id-antrean').val(id);
						$('#nomor-antrean').val(no);
						const tipePanggil = $('#tipe-panggil');
						tipePanggil.html('');

						$('#call-antrean').val(type === 'call' ? 'Belum Dipanggil' : call);

						const panggil = `<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
											<i class="fas fa-times-circle"></i> Batal
										</button>
										<button type="button" class="btn btn-info waves-effect btn-panggil">
											<i class="fas fa-plus-circle"></i> Panggil ${type !== 'call' ? 'Ulang' : ''}
										</button>`;
						tipePanggil.append(panggil);

						this.modalCallAntran.modal('show');
					} else {
						const alert = await swal.fire({
							title: 'Penundaan Panggilan',
							html: 'Waktu Tunda Panggilan Masih Berjalan',
							icon: 'question',
							showCancelButton: true,
							confirmButtonText: '<i class="fas fa-save"></i> Tunggu',
							cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
							reverseButtons: true,
							allowOutsideClick: false
						})

						if (!alert?.value) return;

						const url = this.baseUrl + 'cek_waktu_delay'
						const dataDelay = await this.ajaxPost(url);

						if (typeof dataDelay.metaData === 'undefined') return;

						if (dataDelay.metaData.code === 201) {
							swalAlert('warning', 'Waktu Tunggu', dataDelay.metaData.message);
							return;
						}

						messageCustom(dataDelay.metaData.message, 'Success');
						await this.getCallPasien(p);
					}

				} catch (error) {
					console.log(error);
					accessFailed(error)
				}
			}

			async handleSimpanCallAntrean() {
				this.modalCallAntran.modal('hide')

				const alert = await swal.fire({
					title: 'Konfirmasi',
					html: 'Apakah anda ingin memanggil Pasien ini ?',
					icon: 'question',
					showCancelButton: true,
					confirmButtonText: '<i class="fas fa-save"></i> Panggil',
					cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
					reverseButtons: true,
					allowOutsideClick: false
				})

				if (!alert?.value) return;

				try {
					const url = this.baseUrl + 'simpan_call_antrean';
					const data = await this.ajaxPost(url, $('#form-call-antrean').serialize())

					if (typeof data.metaData === 'undefined') return;

					const listAudio = [
						`${this.audioUrl}/${data.metaData.huruf_audio}.wav`,
						`${this.audioUrl}/loket.wav`,
						`${this.audioUrl}/${data.metaData.c}.wav`,
					];

					const urutanAudio = data.metaData.urutan_audio.filter((data) => data !== '');

					for (let [index, value] of urutanAudio.entries()) {
						listAudio.splice(1 + index++, 0, `${this.audioUrl}/${value}.wav`);
					}

					const audio = new Audio();
					audio.src = `${this.audioUrl}/nourut.wav`;
					await audio.play();

					let currentAudio = 0;
					audio.onended = () => {
						if (currentAudio !== listAudio.length) {
							audio.src = listAudio[currentAudio];
							audio.play();
						}
						currentAudio++;
					}

					messageCustom(data.metaData.message, 'Success');
					await this.getCallPasien($('#page-call').val());
				} catch (error) {
					console.log(error);
					accessFailed(error)
				}
			}

			async handlePasienHadir(e) {
				const alert = await swal.fire({
					title: 'Konfirmasi',
					html: 'Apakah Pasien sudah Hadir ?',
					icon: 'question',
					showCancelButton: true,
					confirmButtonText: '<i class="fas fa-save"></i> Hadir',
					cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
					reverseButtons: true,
					allowOutsideClick: false
				})

				if (!alert?.value) return;

				try {
					const {id, p} = JSON.parse($(e.target).attr('data'))
					const url = this.baseUrl + 'simpan_kehadiran_pasien';
					const payloadData = {
						id_hadir: id,
					}
					const data = await this.ajaxPost(url, payloadData);

					messageCustom(data.metaData.message, 'Success');
					await this.getCallPasien(p);
				} catch {
					messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
				}
			}

			handleCariAntrian() {
				this.getCallPasien(1);
				$('#modal-search').modal('hide');
			}
		}
	}

	$(function () {
		new CallRecallFarmasi().init()

	})

	function paging(page) {
		new CallRecallFarmasi().getCallPasien(page)
	}
</script>
