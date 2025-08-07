<script>
	function ListBooking() {
		this.baseUrl = "<?= base_url('list_booking/api/list_booking/') ?>"
		this.warp = $('#warp-list-booking')
		this.modalEditBooking = $('#modal-edit-booking')
		this.modalBatalBooking = $('#modal-batal-booking')
		this.modalBatalBookingMjkn = $('#modal-batal-antrean')
	}

	function formatNoHpToInternational(noHp) {
		const hp = noHp.replaceAll(' ', '').replace('(', '').replace(')', '').replaceAll('.', '').replaceAll('-', '').trim()

		if (/[0-9]/.test(hp)) {
			if (hp.substring(0, 3) === '+62') {
				return hp
			}

			if (hp.charAt(0) === '0') {
				return '+62' + hp.substring(1)
			}
		} else {
			return hp
		}
	}

	ListBooking.prototype.ajaxGet = function(url, data = {}) {
		return $.get(url, data)
	}

	ListBooking.prototype.ajaxPost = function(url, data) {
		return $.post(url, data)
	}

	ListBooking.prototype.ajaxCustom = function(options) {
		return $.ajax(options)
	}

	ListBooking.prototype.init = function() {
		this.events()
		this.showListBooking(1)
		this.initDatepicker()
		this.initNamaPoli()
	}

	ListBooking.prototype.events = function() {
		const $this = this
		this.warp.on('click', '#bt-search', () => this.handleSearchModalOpen())
		this.warp.on('change', '#lokasi-data', () => this.handleFilterLokasi())
		this.warp.on('change', '#shift-poli', () => this.handleFilterShift())
		this.warp.on('click', '.btn-edit-booking', function() {
			$this.handleOpenModal($(this))
		})
		this.warp.on('click', '.btn-batal-booking', function() {
			$this.handleOpenModalBatal($(this))
		})
		this.warp.on('click', '.btn-batal-booking-mjkn', function() {
			$this.handleOpenModalBatalMjkn($(this))
		})
		this.warp.on('click', '.btn-pasien-click-whatsapp', (e) => this.handleClickWhatsapp(e))
		this.warp.on('click', '#btn-reload', () => this.reload())
		this.warp.on('click', '.btn-cetak-booking', function() {
			const id = $(this).attr('data')
			handleCetakAntrian(id)
		})

		this.modalEditBooking.on('change', '#tanggal-kunjungan-edit', function() {
			$this.getDokterAuto($(this))
		})
		this.modalEditBooking.on('click', '#btn-edit-booking', () => $this.handleEditBooking())
		this.modalEditBooking.on('hide.bs.modal', this.resetFieldEdit)

		this.modalBatalBooking.on('click', '#btn-batal-booking', () => $this.handleBatalBooking())


		$('#btn-cari').on('click', () => this.handleCari())
		this.warp.on('click', '#btn-export', () => this.handleExport())
	}

	ListBooking.prototype.handleExport = function() {
		window.open('<?= base_url('list_booking/export?') ?>' + $('#form-search').serialize() + '&lokasi=' + $('#lokasi-data').val() + '&shift=' + $('#shift-poli').val())	
	}
	
	ListBooking.prototype.showListBooking = async function(p) {
		const tableBody = $('#table-list-booking tbody')
		tableBody.empty()
		const accountGroup = "<?= $this->session->userdata('account_group') ?>";

		try {
			const url = this.baseUrl + 'list_booking'
			const {
				data,
				limit,
				jumlah,
				page
			} = await this.ajaxGet(`${url}/page/${p}`, $('#form-search').serialize() + '&lokasi=' + $('#lokasi-data').val() + '&shift=' + $('#shift-poli').val())

			if ((p > 1) && (data.length === 0)) {
				await this.showListBooking(p - 1)
				return
			}

			$('#pagination').html(pagination(jumlah, limit, page, 1))
			$('#summary').html(page_summary(jumlah, data.length, limit, page))

			for (const [index, value] of data.entries()) {
				let no = ((index + 1) + ((page - 1) * limit))

				let status = ''
				let title_alasanbatal = '';

				if (value.status_booking === 'Booking') {
					status = `<h5><span class="badge badge-warning">${value.status_booking}</span></h5>`
				} else if (value.status_booking === 'Check In') {
					status = `<h5><span class="badge badge-success">${value.status_booking}</span></h5>`
				} else if (value.status_booking === 'Batal') {
					status = `<h5><span class="badge badge-danger">${value.status_booking}</span></h5>`
					user_batal 	= value.user_batal != null ? value.user_batal : '-';
					waktu_batal = value.waktu_batal != null ? value.waktu_batal : '-';
					title_alasanbatal = 'title="Alasan Batal : ' + value.status_booking + '&#10;User : ' + user_batal + '&#10;Waktu : ' + waktu_batal + '" '
				}

				let status_terlayani = '';
				if (value.status_terlayani === 'Belum') {
					status_terlayani = `<span><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Dilayani</i></span>`;
				} else if (value.status_terlayani === 'Batal') {
					status_terlayani = `<h5><span class="badge badge-danger">Batal</span></h5>`
				} else if (value.status_terlayani === 'Sudah') {
					status_terlayani = `<h5><span class="badge badge-success">Sudah Dilayani</span></h5>`;
				} else {
					status_terlayani = `<span><i><i class="fas fa-fw fa-spinner fa-spin m-r-5" style="color:red"></i><b  style="color:red">Belum Daftar</b></i></span>`;
				}

				let hakAkses = '';
				let accountGroup = "<?= $this->session->userdata('account_group') ?>";
				if (accountGroup == 'Admin' || accountGroup == 'Kepala Instalasi Rawat Jalan' || accountGroup == 'Pendaftaran' || accountGroup == 'Nurse Station') {
					hakAkses = '';
				} else if( (accountGroup == 'Koordinator Rehabilitasi Medik' || accountGroup == 'Dokter Spesialis RM Rehab' ) && (value.id_poli == 34) ){
					hakAkses = '';
				} else {
					hakAkses = ' disabled ';
				}

				let btnEdit = '';
				if (value.status_booking !== 'Check In' && value.status_booking !== 'Batal' && (value.status_terlayani === 'Batal' || value.status_terlayani === null)) {
					btnEdit = `<button type="button" ` + hakAkses + ` class="btn waves-effect waves-light btn-xs btn-info btn-edit-booking" data='${JSON.stringify(value)}'><i class="far fa-edit"></i></button>`;
				}

				let btnBatal = '';
				if (value.status_terlayani === 'Batal' || value.status_terlayani === null) {
					btnBatal = `<button type="button" ` + hakAkses + ` class="btn waves-effect waves-light btn-xs btn-danger btn-batal-booking" data='${value.id_antrian_bpjs}'><i class="fas fa-trash"></i> Batal</button>`;
				}

				if (value.status_booking === 'Batal') {
					btnBatal = '';
				}
				
				let btnBatalMjkn = '';
				if (value.status_booking == 'Booking' && value.lokasi_data === 'mobile') {
					btnBatalMjkn = `<button type="button" ` + hakAkses + ` class="btn waves-effect waves-light btn-xs btn-danger btn-batal-booking-mjkn" data='${JSON.stringify(value)}'><i class="fas fa-trash"></i> Batal</button>`;
				}

				let aksi = '';

				if(value.lokasi_data === 'APM'){
					aksi = `<td>
					<button class="btn btn-xs btn-success btn-pasien-click-whatsapp" data-sent='${JSON.stringify(value)}'><i class="fab fa-whatsapp" data-sent='${JSON.stringify(value)}'></i></button>
						<button type="button" class="btn waves-effect waves-light btn-xs btn-secondary btn-cetak-booking" data='${value.id_antrian_bpjs}'><i class="fas fa-save"></i> Cetak</button>
						${btnEdit}
						${btnBatal}
					</td>`;
				} else if (value.lokasi_data === 'mobile') {
					aksi = `<td>
						<button type="button" class="btn waves-effect waves-light btn-xs btn-secondary btn-cetak-booking" data='${value.id_antrian_bpjs}'><i class="fas fa-save"></i> Cetak</button>
						${btnBatalMjkn}
					</td>`;
				}

				const html = `
				<tr>
					<td>${no}</td>
					<td>${value.kode_booking}</td>
					<td>${value.no_rm !== null ? value.no_rm : '-'}</td>
					<td>${value.no_polish !== null ? value.no_polish : '-'}</td>
					<td>${value.no_referensi !== null ? value.no_referensi : '-'}</td>
					<td>${value.jenis_kunjungan !== null ? value.jenis_kunjungan : '-'}</td>
					<td>${value.pasca_ranap}</td>
					<td>${value.nama !== null ? value.nama : '-'}</td>
					<td>${value.shift_poli ? `<b>${value.shift_poli}</b> -` : ''} ${value.nama_poli}</td>
					<td ${!value.id_jadwal_dokter ? 'style="color: red"':''}><span ${!value.id_jadwal_dokter ? 'data-toggle="tooltip" title="Jadwal Dokter Berubah, Edit booking untuk mengganti dokter!" class="blinker"' : ''}>${value.id_jadwal_dokter ? '' : "<i class='fas fa-exclamation'></i>"} ${value.nama_dokter}</span></td>
					<td class="center">${datefmysql(value.tanggal_kunjungan)}</td>
					<td class="center">${value.nama_penjamin}</td>
					<td class="center" ${title_alasanbatal}>${status}</td>
					<td class="center">${status_terlayani}</td>
					${aksi}
				</tr>
				`

				tableBody.append(html)
			}
		} catch (error) {

		}
	}

	ListBooking.prototype.handleSearchModalOpen = function() {
		$('#modal-search').modal('show')
		$('#modal-search-label').html('Parameter Pencarian')
	}

	ListBooking.prototype.handleCari = function() {
		this.showListBooking(1)
		$('#modal-search').modal('hide')
	}

	ListBooking.prototype.initNamaPoli = function() {
		const _this = this
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
					}
				},
				results: function(data, page) {
					const more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more,
					}
				},
			},
			formatResult: function(data) {
				let kode = ''
				if (data.kode !== '') {
					kode = '<b>' + data.kode + '</b> - '
				}
				return kode + data.nama
			},
			formatSelection: function(data) {
				_this.searchDokterAntrian(data.id)
				return data.nama
			},
		})
	}

	ListBooking.prototype.searchDokterAntrian = async function(id_spesialisasi = null) {
		try {
			const url = this.baseUrl + 'get_spesialisasi'
			const data = await this.ajaxGet(`${url}/id_spesialisasi/${id_spesialisasi}`)

			let html = '<option value="">Pilih Dokter</option>'
			for (const value of data) {
				html += `<option value="${value.id}"><b>${value.dokter}</b></option>`
			}

			$('#nm-dokter').html(html)
		} catch (error) {
			accessFailed(error.status)
		}
	}

	ListBooking.prototype.initDatepicker = function() {
		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy',
			endDate: this.date,
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})
	}

	ListBooking.prototype.handleOpenModal = async function(el) {
		const data = JSON.parse(el.attr('data'))
		const url = this.baseUrl + 'jadwal_dokter'
		const tglKunjungEdit = $('#tanggal-kunjungan-edit')
		tglKunjungEdit.datepicker('destroy')

		try {
			const response = await this.ajaxGet(url, {
				tgl_kunjung: data.tanggal_kunjungan,
				poli: data.id_poli
			})

			tglKunjungEdit.datepicker({
				format: 'dd/mm/yyyy',
				beforeShowDay: function(date) {
					const year = date.toLocaleString('default', {
						year: 'numeric',
					})
					const month = date.toLocaleString('default', {
						month: '2-digit',
					})
					const day = date.toLocaleString('default', {
						day: '2-digit',
					})
					const ymd = year + '-' + month + '-' + day

					if ($.inArray(ymd, response.jadwal_dokter) !== -1) {
						return {
							enabled: true,
						}
					} else {
						return {
							enabled: false,
						}
					}
				},
				daysOfWeekDisabled: [0],
			}).on('changeDate', function() {
				$(this).datepicker('hide')

				$('#dokter-rujukan').html('<option>Pilih Dokter</option>')
			}).on('hide', function(e) {
				e.stopPropagation()
			})

			let html = ''
			if (response.list_dokter.length > 0) {
				$.each(response.list_dokter, function(i, v) {
					const selected = data.id_dokter == v.id_dokter && parseInt(v.kuota) - parseInt(v.jml_kunjung) > 0 ? 'selected' : '';

					html += `<option value='${v.id}' ${selected} ${parseInt(v.kuota) - parseInt(v.jml_kunjung) <= 0 ? 'disabled style="color: red"' : ''}>${v.shift_poli} - ${v.nama_dokter} ( ${v.jml_kunjung} / ${v.kuota} ) ${parseInt(v.kuota) - parseInt(v.jml_kunjung) <= 0 ? '- Kuota Penuh' : ''}</option>`
				})
			}

			$('#dokter-rujukan-edit').append(html)
			$('#kode-booking-edit').val(data.kode_booking)
			$('#no-rm-edit').val(data.no_rm)
			$('#no-bpjs-edit').val(data.no_polish)
			$('#nama-pasien-edit').val(data.nama)
			$('#poli-tujuan-edit').val(data.nama_poli)
			$('#id-poli-awal-edit').val(data.id_poli)
			$('#id-dokter-awal-edit').val(data.id_dokter)
			$('#tanggal-awal-kontrol').val(data.tanggal_kunjungan)
			tglKunjungEdit.val(datefmysql(data.tanggal_kunjungan))
			$('#id-antrian-bpjs').val(data.id_antrian_bpjs)
			$('#id-penjamin').val(data.id_penjamin)
			$('#id-surat-kontrol').val(data.id_skd)
			$('#id-surat-kontrol-bpjs').val(data.idskb)
			$('#usia-pasien').val(data.usia_pasien)

			this.modalEditBooking.modal('show').find('h4').html('Edit Booking')
		} catch (e) {
			console.log(e)
		}
	}

	ListBooking.prototype.getDokterAuto = async function(el) {
		const url = "<?= base_url('booking_poliklinik/api/booking_poliklinik/get_dokter_spesialisasi') ?>"

		try {
			const response = await this.ajaxGet(url, {
				id_spesialisasi: $('#id-poli-awal-edit').val(),
				tanggal_booking: el.val()
			})

			$('#dokter-rujukan-edit').empty()
			let html = '<option value="">Pilih Dokter</option>'

			if (response.length > 0) {
				$.each(response, function(i, v) {
					html += `<option value='${v.id}' ${parseInt(v.kuota) - parseInt(v.jml_kunjung) === 0
						? 'disabled'
						: ''}>${v.shift_poli} - ${v.nama_dokter} ( ${v.jml_kunjung} / ${v.kuota} )</option>`
				})
			}

			$('#dokter-rujukan-edit').append(html)
		} catch (e) {
			console.log(e)
		}
	}

	ListBooking.prototype.resetFieldEdit = function() {
		$('#form-modal-edit-booking')[0].reset()
		$('#dokter-rujukan-edit').empty().append(`<option value="">Pilih Dokter</option>`)
	}

	ListBooking.prototype.handleClickWhatsapp = async function(e) {
		const data 	= JSON.parse($(e.target).attr('data-sent'))		
		try {
			const url = this.baseUrl + 'get_estimasi_pasien';
			const res = await this.ajaxGet(`${url}/${data.id_antrian_bpjs}`)
			
			let tanggal = new Date(data.tanggal_kunjungan);
			let opsi = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

			let tanggalFormatIndonesia = tanggal.toLocaleDateString('id-ID', opsi);
			const textWhatsaap = `Hai ${data.nama},
Mengingatkan jadwal *kontrol* hari *${tanggalFormatIndonesia}* ke Poli *${data.nama_poli}*. 
Kode Booking *${data.kode_booking}*, waktu Checkin *${res.data.estimated_time_start} WIB - ${res.data.estimated_time_end} WIB*. 

Kami tunggu kedatangannya di RSUD Kota Tangerang. Terimakasih
`
			const noHp = formatNoHpToInternational(data.telp)
			const link = `https://wa.me/${noHp}?text=${encodeURIComponent(textWhatsaap)}`
			window.open(link, '_blank')
		} catch (error) {
			console.error(error)
		}
	}

	ListBooking.prototype.getTanggalKontrol = async function() {
		const dataBooking = $('#form-modal-edit-booking').serializeArray();
		
		try {
			if(!['59', '34'].includes(dataBooking.find(v => v.name === 'id_poli_awal').value)){
				const response = await this.ajaxGet('<?= base_url('pelayanan/api/pelayanan/cek_tanggal_kontrol') ?>', {
					id_pasien: $('#no-rm-edit').val(),
					tgl_rencana: date2mysql(dataBooking.find(v => v.name === 'tanggal_kunjungan').value),
					tgl_sebelum: date2mysql(dataBooking.find(v => v.name === 'tanggal_awal_kontrol').value),
				})
				if (!response.status) {
					swalAlert('info', 'Gagal Simpan Booking', 'Pasien sudah melakukan <b>'+response.message+'</b> pada tanggal <b>' + response.data.tanggal_kunjungan + '</b> ke <b>Poli '+ response.data.nama_poli+'</b>. Silahkan pilih tanggal lain (minimal 8 hari dari kunjungan sebelumnya) !');
				} else {
					this.handleEditBooking()
				}
			}else{
				this.handleEditBooking()
			}
		} catch (e) {
			console.log(e)
			if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
				swalAlert('warning', 'Warning!', e.responseJSON.message)
				return
			}
			messageCustom('Gagal Melakukan Edit Pasien Booking', 'Error')
		}
    }


	ListBooking.prototype.handleEditBooking = async function() {
		const url = this.baseUrl + 'update_booking'
		showLoader()
		try {
			const response = await this.ajaxPost(url, $('#form-modal-edit-booking').serialize())
			messageCustom(response.message, 'Success')
			swalAlert('success', 'Berhasil!', `Kode booking pasien yang baru adalah ${response.kode_booking_baru}`)
			$('#modal-edit-booking').modal('hide')
			this.showListBooking(1)
		} catch (e) {
			console.log(e)
			if (e.responseJSON?.status === false && e.responseJSON?.status !== undefined && e.status !== 500) {
				swalAlert('warning', 'Warning!', e.responseJSON.message)
				return
			}
			messageCustom('Gagal Melakukan Edit Pasien Booking', 'Error')
		}
		hideLoader();
	}

	ListBooking.prototype.handleOpenModalBatal = async function(el) {
		const data = el.attr('data')
		$('#id-antrian-bpjs-batal').val(data)

		this.modalBatalBooking.modal('show').find('h4').html('Batal Booking')
	}
	
	ListBooking.prototype.handleOpenModalBatalMjkn = async function(el) {
		const data = JSON.parse(el.attr('data'))

		$('#kode-batal-booking').val(data.kode_booking);
        $('#tanggal-kunjungan-batal').val(data.tanggal_kunjungan);
        $('#kode-batal-dokter').val(data.id_dokter);
        $('#id-batal').val(data.id_antrian_bpjs);

		this.modalBatalBookingMjkn.modal('show').find('h4').html('Batal Booking MJKN')
	}

	ListBooking.prototype.handleBatalBooking = async function() {
		const url = this.baseUrl + 'batal_booking'
		const urlSep = '<?= base_url(URL_VCLAIM . "hapus_sep") ?>'
		showLoader()
		try {
			const response = await this.ajaxPost(url, $('#form-modal-batal-booking').serialize())

			if (response.data.no_sep !== null) {
				const options = {
					type: 'DELETE',
					url: urlSep,
					data: {
						no_sep: response.data.no_sep,
						id_pendaftaran: response.data.id_pendaftaran
					},
					dataType: 'JSON',
				}

				const batalSep = await this.ajaxCustom(options)

				if (batalSep.metaData.code !== 200) {
					messageCustom(batalSep.metaData.message, 'Error')
					return
				}
			}

			messageCustom(response.message, 'Success')
			$('#modal-batal-booking').modal('hide')
			this.showListBooking(1)
		} catch (e) {
			messageCustom('Gagal Melakukan Edit Pasien Booking', 'Error')
			console.log(e)
		}
		hideLoader()
	}

	ListBooking.prototype.handleFilterLokasi = function (){
		this.showListBooking(1)
	}

	ListBooking.prototype.handleFilterShift = function (){
		this.showListBooking(1)
	}

	ListBooking.prototype.reload = function() {
		this.showListBooking(1)
	}

	$(function() {
		new ListBooking().init()
	})

	function paging(page) {
		new ListBooking().showListBooking(page)
	}

	function handleCetakAntrian(id) {
		const dWidth = $(window).width()
		const dHeight = $(window).height()
		const x = screen.width / 2 - dWidth / 2
		const y = screen.height / 2 - dHeight / 2

		window.open('<?= base_url() ?>booking_poliklinik/cetak_bukti_boooking/' + id, 'Cetak Bukti Booking', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y)
	}
	
	function simpanBatalAntrean() {
        $('#modal-batal-antrean').modal('hide');
        let pesan = 'Apakah anda ingin membatalkan Antrean pada pasien ini ?';
        let confirm_button = 'Simpan';
        let waktuBatal = new Date().getTime();

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/batal_antrian") ?>',
                    data: $('#form-batal-antrean').serialize() + '&waktu_batal=' + waktuBatal,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if (typeof data.metaData !== 'undefined') {
                            if (data.metaData.code === 201) {
                                swalAlert('warning', data.metaData.code, data.metaData.message);
								new ListBooking().showListBooking(1)
                            } else {
                                messageCustom('Batal Antrian Berhasil', 'Success');
								new ListBooking().showListBooking(1)
                            }
                        }
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });
    }
</script>