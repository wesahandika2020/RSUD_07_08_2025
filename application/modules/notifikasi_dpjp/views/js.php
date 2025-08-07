<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('notifikasi_dpjp/api/notifikasi_dpjp') ?>';
	var jenisPenjamin = 0;

	getDataNotif(1);

	// Format Tanggal
	$('#tanggal-awal-notif-dpjp, #tanggal-akhir-notif-dpjp, #tanggal-harian-notif-dpjp').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-notif-dpjp').change(function() {
		if ($('#periode-laporan-notif-dpjp').val() == 'Harian') {
			$('.harian-notif-dpjp, #tanggal-harian-notif-dpjp').show();
			$('.bulanan-notif-dpjp, .rentang-waktu-notif-dpjp').hide();
		}
		if ($('#periode-laporan-notif-dpjp').val() == 'Bulanan') {
			$('.bulanan-notif-dpjp, #bulan-notif-dpjp, #tahun-notif-dpjp').show();
			$('.harian-notif-dpjp, .rentang-waktu-notif-dpjp, #tanggal-awal-notif-dpjp, #tanggal-akhir-notif-dpjp').hide();
		}
		if ($('#periode-laporan-notif-dpjp').val() == 'Rentang Waktu') {
			$('.rentang-waktu-notif-dpjp, #tanggal-awal-notif-dpjp, #tanggal-akhir-notif-dpjp').show();
			$('.harian-notif-dpjp, #tanggal-harian-notif-dpjp, .bulanan-notif-dpjp, #bulan-notif-dpjp, #tahun-notif-dpjp').hide();
		}
	});


	$('#dokter-notif-dpjp').select2({
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
			var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#btn-reload').click(function() {
		resetFormNotifDpjp();
		getDataNotif(1);
	})

	$('#bt-search').click(function() {
		resetFormNotifDpjp();
		$('#modal-search-notif-dpjp').modal('show');
	})

	function resetFormNotifDpjp() {
		$('#periode-laporan-notif-dpjp').val('Harian');
		$('#bulan-notif-dpjp').val('<?= date('m') ?>');
		$('#tahun-notif-dpjp').val('<?= date('Y') ?>');
		$('.harian-notif-dpjp, #tanggal-harian-notif-dpjp').show();
		$('#tanggal-awal-notif-dpjp, #tanggal-akhir-notif-dpjp, #tanggal-harian-notif-dpjp').val('<?= date('d/m/Y') ?>');
		$('#dokter-notif-dpjp').val('');
		$('.bulan-notif-dpjp, #bulan-notif-dpjp, #tahun-notif-dpjp, .rentang-waktu-notif-dpjp').hide();
		$('#s2id_dokter-notif-dpjp a .select2-chosen').html('Pilih Dokter');
	}

	function cekDateTime(id, form) {
		// ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				// nilai hari antara 1 s.d 31
				if (regs[1] < 1 || regs[1] > 31) {
					alert("Nilai tidak valid untuk hari: " + regs[1]);
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
				// nilai bulan antara 1 s.d 12
				if (regs[2] < 1 || regs[2] > 12) {
					alert("Nilai tidak valid untuk bulan: " + regs[2]);
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
				// nilai tahun antara 2000 s.d sekarang
				if (regs[3] < 2022 || regs[3] > ((new Date()).getFullYear())) {
					alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + 2022 + " dan " + (((new Date()).getFullYear())));
					syams_validation(id, 'Format Tanggal tidak sesuai');
					return false;
				}
			} else {
				syams_validation(id, 'Format Tanggal tidak sesuai');
				return false;
			}
		}
	}

	function cekTahun(form){
		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				return regs[3];
			}
		}
	}

	function cekBulanTahun(form){
		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
		if (form !== '') {
			if (regs = form.match(re)) {
				return regs[3]+'-'+regs[2]+'-'+regs[1];
			}
		}
	}

	function getDataNotif(page) {
		$('#page-now').val(page);
		var periodeLaporan = '';
		var tanggalAwal = '';
		var tanggalAkhir = '';
		var tanggalHarian = '';
		var bulanTahunAwal = '';
		var bulanTahunAkhir = '';
		var periksaBulan = '';
		var periksaTahun = '';
		var bulanSekarang = '';
		var tahunSekarang = '';
		var tahunAwal = '';
		var tahunAkhir = '';
		var tanggalHariIni = '';

		// Menampilkan tanggal atau bulan saat ini sebagai default
		var x = new Date();
		var date = x.getDate();
		var month = x.getMonth() + 1; // bulan dimulai dari 0
		var year = x.getFullYear();

		// Format tanggal untuk memastikan 2 digit pada bulan dan tanggal
		month = month < 10 ? '0' + month : month;
		date = date < 10 ? '0' + date : date;

		// Defaultkan tanggal sekarang
		tanggalHariIni = year + '-' + month + '-' + date;

		// Menetapkan nilai default pada input jika belum ada nilai
		$('#tanggal-harian-notif-dpjp').val($('#tanggal-harian-notif-dpjp').val() || tanggalHariIni);
		$('#tanggal-awal-notif-dpjp').val($('#tanggal-awal-notif-dpjp').val() || tanggalHariIni);
		$('#tanggal-akhir-notif-dpjp').val($('#tanggal-akhir-notif-dpjp').val() || tanggalHariIni);
		$('#bulan-notif-dpjp').val($('#bulan-notif-dpjp').val() || month);
		$('#tahun-notif-dpjp').val($('#tahun-notif-dpjp').val() || year);

		$('#table-notifikasi-dpjp tbody').show();
		periodeLaporan = $('#periode-laporan-notif-dpjp').val();

		if (periodeLaporan === 'Rentang Waktu') {
			let cekTanggalAwal = $('#tanggal-awal-notif-dpjp').val();
			let cekTanggalAkhir = $('#tanggal-akhir-notif-dpjp').val();

			tahunAwal = cekTahun(cekTanggalAwal);
			tahunAkhir = cekTahun(cekTanggalAkhir);

			bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
			bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

			if (tahunAwal === undefined) {
				syams_validation('#tanggal-awal-notif-dpjp', 'Tanggal Awal tidak terdefinisi');
				return false;
			}

			if (tahunAkhir === undefined) {
				syams_validation('#tanggal-akhir-notif-dpjp', 'Tanggal Akhir tidak terdefinisi');
				return false;
			}

			if (bulanTahunAwal > bulanTahunAkhir) {
				syams_validation('#tanggal-awal-notif-dpjp', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
				return false;
			}

			if (parseInt(tahunAwal) > parseInt(tahunAkhir)) {
				syams_validation('#tanggal-awal-notif-dpjp', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
				return false;
			}

			if (parseInt(tahunAwal) < 2022) {
				syams_validation('#tanggal-awal-notif-dpjp', 'Tahun Awal Tidak boleh Kurang dari 2022');
				return false;
			}

			if (parseInt(tahunAkhir) > new Date().getFullYear()) {
				syams_validation('#tanggal-akhir-notif-dpjp', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
				return false;
			}

			tanggalAwal = cekDateTime('#tanggal-awal-notif-dpjp', cekTanggalAwal);
			tanggalAkhir = cekDateTime('#tanggal-akhir-notif-dpjp', cekTanggalAkhir);

			syams_validation_remove('#tanggal-awal-notif-dpjp');
			syams_validation_remove('#tanggal-akhir-notif-dpjp');
		}

		if (periodeLaporan === 'Harian') {
			tanggalHarian = $('#tanggal-harian-notif-dpjp').val();

			tahunAwal = cekTahun(tanggalHarian);
			bulanTahunAwal = cekBulanTahun(tanggalHarian);

			if (parseInt(tahunAwal) < 2022) {
				syams_validation('#tanggal-harian-notif-dpjp', 'Tahun Awal Tidak boleh Kurang dari 2022');
				return false;
			}

			if (parseInt(tahunAwal) > new Date().getFullYear()) {
				syams_validation('#tanggal-harian-notif-dpjp', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
				return false;
			}

			if (bulanTahunAwal > tanggalHariIni) {
				syams_validation('#tanggal-harian-notif-dpjp', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
				return false;
			}

			syams_validation_remove('#tanggal-harian-notif-dpjp');
		}

		if (periodeLaporan === 'Bulanan') {
			periksaBulan = $('#bulan-notif-dpjp').val();
			periksaTahun = $('#tahun-notif-dpjp').val();

			bulanSekarang = new Date().getMonth() + 1;
			tahunSekarang = new Date().getFullYear();

			if (parseInt(periksaTahun) < 2023) {
				if (parseInt(periksaBulan) < 3) {
					syams_validation('#bulan-notif-dpjp', 'Bulan Tidak Boleh Kurang dari Bulan Maret 2022');
					return false;
				}
			}

			if (parseInt(periksaTahun) > new Date().getFullYear()) {
				syams_validation('#tahun-notif-dpjp', 'Tahun Tidak Boleh Lebih Dari Tahun Sekarang');
				return false;
			}

			if (parseInt(periksaTahun) === new Date().getFullYear() && (parseInt(periksaBulan) > (new Date().getMonth() + 1))) {
				syams_validation('#bulan-notif-dpjp', 'Belum ada Data di Bulan tersebut');
				return false;
			}

			syams_validation_remove('#tahun-notif-dpjp');
			syams_validation_remove('#bulan-notif-dpjp');
		}

		openData();

		// cek data dari form
		// var formData = $('#form-search-notif-dpjp').serialize();
		// console.log('Form data:', formData);

		$.ajax({
			type: 'GET',
			url: '<?= base_url('notifikasi_dpjp/api/notifikasi_dpjp/get_list_notifikasi_dpjp') ?>/page/' + page,
			data: $('#form-search-notif-dpjp').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {    

				if (typeof data.data === 'undefined' || data.data === null) {
					messageCustom('Tidak Ada Data', 'Error');
					return false;
				}

				if ((page - 1) & (data.data.length === 0)) {
					getDataNotif(page - 1);
					return false;
				}

				$('#pagination-notif-dpjp').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary-notif-dpjp').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table-notifikasi-dpjp tbody').show();
				$('#table-notifikasi-dpjp tbody').empty();
				$('#table-notifikasi-dpjp tfoot').empty();

				$.each(data.data, function(a, value) {			

					let status_kirim = '';
					if (value.status_kirim === 'Belum' || value.status_kirim === '' || value.status_kirim === null) {
						status_kirim = `<span><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Dikirim</span>`;
					} else if (value.status_kirim === 'Batal') {
						status_kirim = `<h5><span class="badge badge-danger">Batal</span></h5>`;
					} else if (value.status_kirim === 'Terkirim') {
						status_kirim = `<h5><span class="badge badge-success">Sukses</span></h5>`;
					}

					let html = `
						<tr>
							<td class="center">${(a + 1) + ((data.page - 1) * data.limit)}</td>
							<td class="center">${datetimefmysql(value.tanggal_layanan)}</td>
							<td class="center">${value.nama_dokter}</td>
							<td class="center">${value.hp_dokter ? value.hp_dokter : '-'}</td>
							<td class="center">${status_kirim}</td>
							<td class="center">
								<button 
									class="btn btn-xs btn-success"
									onclick="sendWhatsApp('${value.id_dokter}', '${value.tanggal_layanan}')">
									<i class="fab fa-whatsapp"></i>
								</button>
							</td>
						</tr>
					`;

					$('#table-notifikasi-dpjp tbody').append(html);
				});

			},
			complete: function() {
				hideLoader();
				$('#modal-search-notif-dpjp').modal('hide');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	// Fungsi untuk menghasilkan daftar pasien
	function generatePatientList(pasien) {
		let list = '';
		pasien.forEach((item, index) => {
			list += `${index + 1}. ${item.nomor_rm} - ${item.nama_pasien}\n`;
		});
		return encodeURIComponent(list.trim()); // Escape untuk URL
	}

	// Fungsi untuk mengirim pesan WhatsApp
	function sendWhatsApp(id_dokter, tanggal) {
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url('notifikasi_dpjp/api/notifikasi_dpjp/get_pasien_notif_dpjp') ?>',
			data: { id_dokter: id_dokter, tanggal: tanggal },
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				
				if (data.length > 0) {
					let namaDokter = data[0].nama_dokter;

					// Format tanggal layanan
					let tanggalLayanan = new Date(data[0].tanggal);
					let tanggalLayananFormatted = tanggalLayanan.toLocaleDateString('id-ID', {
						day: '2-digit',
						month: 'long',
						year: 'numeric'
					});

					// Tambahkan 1 hari ke tanggal layanan
					let tanggalPlusSatu = new Date(tanggalLayanan);
					tanggalPlusSatu.setDate(tanggalLayanan.getDate() + 1);
					let tanggalPlusSatuFormatted = tanggalPlusSatu.toLocaleDateString('id-ID', {
						day: '2-digit',
						month: 'long',
						year: 'numeric'
					});

					// Format daftar pasien
					let pasienText = '';
					data.forEach((pasien, index) => {
						pasienText += `${index + 1}. ${pasien.nomor_rm} - ${pasien.nama_pasien} di ${pasien.kamar}\n`;
					});

					// Rangkai pesan
					let message = 
						`Selamat Pagi, ${namaDokter}\n\n` +
						`Jumlah pasien baru anda di Instalasi Rawat Inap Rumah Sakit Umum Daerah Kota Tangerang hari ini, tanggal ${tanggalLayananFormatted} jam 07:00 sampai tanggal ${tanggalPlusSatuFormatted} jam 06:59 berjumlah ${data.length} Pasien.\n` +
						`${pasienText}\n\n` +
						`Disclaimer:\n` +
						`1. Pesan ini dikirimkan oleh mesin. Mohon untuk tidak membalas pesan yang dikirimkan oleh nomor ini.\n` +
						`2. Mohon untuk tidak meneruskan pesan ke orang lain, sebab data yang terkandung di dalam pesan WhatsApp ini bersifat rahasia medis.`;

					// Encode pesan ke dalam URL
					let encodedMessage = encodeURIComponent(message);

					// Nomor WhatsApp (jika tersedia)
					let phoneNumber = data[0].hp_dokter;

					if (!phoneNumber) {
						Swal.fire({
							icon: 'warning',
							title: 'Nomor Tidak Ditemukan',
							text: 'Nomor WhatsApp dokter tidak ditemukan!',
							confirmButtonText: 'OK'
						});
						return;
					}

					// Ganti awalan 08 dengan 628 jika diperlukan
					if (phoneNumber.startsWith('08') || phoneNumber.startsWith('+628')) {
						phoneNumber = '628' + phoneNumber.substring(2);
					}
					// console.log(phoneNumber); // Debug untuk memastikan URL benar

					// Buat URL wa.me
					let whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

					// testing kirim WhatsApp ke nomor Mba Lina
					// let whatsappUrl = `https://wa.me/6281389457964?text=${encodedMessage}`;

					// Buka tautan WhatsApp
					window.open(whatsappUrl, '_blank');

					// Simpan status pengiriman ke database
					$.ajax({
						type: 'POST',
						url: '<?= base_url('notifikasi_dpjp/api/notifikasi_dpjp/simpan_status_pengiriman') ?>',
						data: {
							id_dokter: data[0].id_dokter,
							tanggal: data[0].tanggal,
							status: 'Terkirim'
						},
						dataType: 'JSON',
						success: function(response) {
							if (response.status === 'success') {
								console.log('Status pengiriman berhasil disimpan.');
								getDataNotif(1);
							} else {
								console.error('Gagal menyimpan status pengiriman:', response.message);
							}
						},
						error: function(e) {
							console.error('Error saat menyimpan status pengiriman:', e);
						}
					});
				}
				else {
					Swal.fire({
						icon: 'warning', // Ikon untuk pesan (warning, error, success, info, question)
						title: 'Data Tidak Ditemukan',
						text: 'Data pasien tidak ditemukan!',
						confirmButtonText: 'OK' // Teks pada tombol konfirmasi
					});
					return;
				}

			},
			complete: function() {
				hideLoader()
				$('#modal-search-notif-dpjp').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})

	}

	function openData() {
		// lap terima resep
		$('#table-notifikasi-dpjp tbody').hide()
		$('#table-notifikasi-dpjp tbody, #table-notifikasi-dpjp tfoot').empty();
		$('#modal-search-notif-dpjp').modal('hide');
	}

	function paging(page) {
		new getDataNotif(page)
	}

</script>