 	<script>
 		// var tipedata = 'list';
 		$(function() {
 			getListFormulirRMPasien(1);

 			$('#bt_search').click(function() {
 				// resetAllDataFormRM();
 				$('#modal_search').modal('show');
 				$('#modal_search_label').html('Form Parameter Pencarian');
 				// getListFormulirRMPasien(1);
 			});

 			$('#bt_reload_data').click(function() {
 				resetAllDataFormRM();
 				getListFormulirRMPasien(1);
 			});

 			$('#keyword-search').keyup(debounceTime(function() {
 				getListFormulirRMPasien(1);
 				// return false;
 			}, 750))

 			$('#jenis-rawat').change(function() {
 				getListFormulirRMPasien(1);
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
 					let umur = '';
 					if (data.tanggal_lahir !== null) {
 						umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')';
 					}
 					$('#identitas-pasien-formulir').html(data.id + ' / ' + data.nama + ' / ' + umur);

 					$.getJSON('<?= base_url('form_rekam_medis/api/master_form_rekam_medis/tgl_kunjungan') ?>?idpasien=' + data.id, function(data) {
 						$('#tgl-search').val('');
 						$('#id_pendaftaran_search').val('');

 						if (data === null) {
 							$('#tgl-search').append("<option value=''>Pilih Tanggal...</option>")
 						} else {
 							$.each(data, function(index, value) {
 								$('#tgl-search').append("<option value='" + value.id + "'>" + value.tanggal + " - " + value.jenis_pendaftaran + "</option>").change()
 							})
 						}
 					})

 					$('#id_pasien_search').val(data.id);
 					return data.id + ' ' + data.nama;
 				}
 			})

 		});

 		function tutupLoadView() {
 			$('#load-view-formulir').empty();
 		}

 		function getListFormulirRMPasien(p) {
 			$('#page-now').val(p);
 			$.ajax({

 				type: 'GET',
 				url: '<?= base_url('form_rekam_medis/api/form_rekam_medis/list_data_kunjungan_pasien'); ?>/page/' + p,
 				data: 'keyword=' + $('#keyword-search').val() + '&jenis=' + $('#jenis-rawat').val() + '&' + $('#form_search').serialize(),
 				cache: false,
 				dataType: 'JSON',
 				beforeSend: function(data) {
 					showLoader();
 				},
 				success: function(data) {
 					if ((p > 1) & (data.data.length === 0)) {
 						getListFormulirRMPasien(p - 1);
 						return false;
 					}

 					$('#pagination_form').html(paginationForm(data.jumlah, data.limit, data.page, 1));
 					$('#summary_form').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
 					$('#table_form_pasien tbody').empty();

 					$.each(data.data, function(i, v) {
 						$(document).ready(function() {
 							// Tambahkan event listener untuk mengubah status ketika tombol diklik
 							$('#btn-expand-form-all' + v.id).click(function() {
 								// Toggle class "active" pada ikon berdasarkan aria-expanded
 								const isExpanded = $(this).attr('aria-expanded') === 'true';
 								$('#expand-icon' + v.id).toggleClass('active', isExpanded);

 								// Ubah teks tombol berdasarkan aria-expanded
 								$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
 								$(this).toggleClass('btn-danger', !isExpanded);
 								$(this).toggleClass('btn-info', isExpanded);

 								history.replaceState({}, document.title, window.location.pathname);
 							});
 						});

 						let btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.id + '"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
 						let btnListForm = '<a type="button" href="javascript:void(0)" onclick="showListForm(' + v.id + ', ' + v.id_layanan_pendaftaran + ', ' + v.id_pasien + ')" class="btn btn-xs btn-outline-info"><i class="fas fa-fw fa-list m-r-5"></i>List Form RM</a>';

 						let html = /* html */ `
					<tbody>
						<tr>
							<td style="font-weight:bold;" class="text-center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td style="font-weight:bold;" class="text-center">${v.id_pasien}</td>
              <td style="font-weight:bold;">${v.nama}</td>
              <td style="font-weight:bold;" class="text-center">${v.tanggal_daftar}</td>
              <td style="font-weight:bold;" class="text-center">${v.jenis_pendaftaran}</td>
              <td style="font-weight:bold;" class="text-center">${v.jenis_rawat}</td>
              <td style="font-weight:bold;" class="text-center">${v.jenis_pasien}</td>
              <td colspan="1"></td>
							<td class="wrapper right">
							${((v.layanan.length > 1) ? btnExpand : btnListForm)}
							</td>
						</tr>
						${'<tr style="font-size: xx-small;" id="show' + v.id + '" class="collapse">'}
							<td colspan="2" style="background-color: white; class="center"></td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Tanggal Layanan</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Jenis Layanan</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Cara Bayar</td>
							<td style="background-color: powderblue; font-weight:bold;" class="left">Nama Dokter</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Status Terlayani</td>
							<td style="background-color: powderblue; font-weight:bold;" class="center">Status Keluar</td>
							<td style="background-color: powderblue; font-weight:bold;" class="right"></td>
						</t>
					`;

 						let noo = 1;
 						$.each(v.layanan, function(key, val) {

 							if (val.status_terlayani === 'Belum') {
 								status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
 							} else if (val.status_terlayani === 'Batal') {
 								status = '<h5 style="margin-bottom: 0;"><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
 							} else {
 								status = '<h5 style="margin-bottom: 0;"><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
 							}

 							html += `
						${'<tr id="show' + v.id + '" class="collapse">'}
							<td colspan="2" style="background-color: white; class="center"></td>
							<td class="center">${val.tanggal_layanan}</td>
							<td class="center">${val.jenis_layanan}</td>
							<td class="center">${val.cara_bayar}</td>
							<td class="left">${val.nama_dokter}</td>
							<td class="center">${status}</td>
							<td class="center">${((val.status_keluar !== null) ? val.status_keluar : '-')}</td>
							<td class="right"><a type="button" href="javascript:void(0)" onclick="showListForm('${val.id_pendaftaran}', '${val.id}', '${val.no_rm}')" class="btn btn-xs btn-outline-success"><i class="fas fa-fw fa-list m-r-5"></i>List Form RM</a></td>
						</t>`;
 						});

 						html += `
					</tbody>
					`;

 						$('#table_form_pasien').append(html)
 					})

 					hideLoader();
 				},
 				error: function(e) {
 					accessFailed(e.status);
 					hideLoader();
 				}
 			});
 		}

 		function cariFormulir() {
 			$('#modal_search').modal('hide');
 			$('#modal_search_label').empty();
 			getListFormulirRMPasien(1);
 		}

 		function showListForm(id_pendaftaran, id_layanan, no_rm) {
 			page = $('#page-now').val();
 			let groupAccount = "<?= $this->session->userdata('account_group') ?>";
 			var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
 			// if (groupAccount == 'Admin') {
 			// 	profesi = 'Perawat';
 			// }

 			let dataModule = '';
 			if ($('#page-modules').val() !== "") {
 				dataModule = $('#page-modules').val();
 			}

 			const dataParams = {
 				id_pendaftaran: id_pendaftaran,
 				id_layanan: id_layanan,
 				no_rm: no_rm,
 				keyword_search: $('#keyword-form-search').val()
 			}

 			$.ajax({
 				type: 'GET',
 				url: '<?= base_url('form_rekam_medis/api/form_rekam_medis/data_list_form'); ?>/module/' + dataModule,
 				data: dataParams,
 				cache: false,
 				dataType: 'JSON',
 				beforeSend: function() {
 					showLoader()
 				},
 				success: function(data) {
 					let pasien = data.pasien;
 					let layanan = data.layanan;
 					let umur = '';

 					if (pasien.tanggal_lahir !== null) {
 						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
 					}

 					let tempatLayanan = (layanan.layanan !== null ? layanan.layanan : layanan.bangsal + layanan.bangsal_ic);

 					// $('#btn-tambah-form').click(function() {
 					// 	getListTambahFormulir(data.list_tambah_forms, 1);
 					// 	$('#modal_tambah_form').modal('show');
 					// 	$('#modal_tambah_form_label').html('Form Tambah Formulir Rekam Medis Pasien');
 					// });

 					// $('#keyword-form-search').keyup(debounce(function() {
 					// 	getListTambahFormulir(data.list_tambah_forms, 1, $('#keyword-form-search').val());
 					// }))

 					$('#modal-nama-pasien').html('<b>' + pasien.id_pasien + ' / ' + pasien.nama + '</b> / ' + umur);
 					$('#modal-kelamin').html(pasien.kelamin == 'L' ? 'Laki-laki' : 'Perempuan');
 					$('#modal-layanan').html(layanan.tanggal_layanan + ' <b>/ ' + tempatLayanan + '</b>');
 					$('#modal-dokter').html(layanan.dokter);

 					$('#table_list_form_pasien tbody').empty()
 					$('#btn-tambah-form').hide();

 					data.list_forms = data.list_forms.filter(function(item) {
 						return pasien.jenis_rawat === 'Jalan' || item.no_formulir !== 'FORM-PMD-33-00';
 					});

 					// if (groupAccount == 'Admin' | groupAccount == 'Admin PPI' | profesi == 'Dokter Umum' | profesi == 'Dokter Spesialis' | profesi == 'Bidan' | profesi == 'Perawat' | profesi == 'Fisioterapis' | profesi == 'Nutrisionis') {
 					// 	$('#btn-tambah-form').show();

 					// 	$('#btn-tambah-form').click(function() {
 					// 		getListTambahFormulir(1, data.list_tambah_forms, layanan.jenis_layanan);
 					// 		$('#keyword-form-search').val('');
 					// 		$('#modal_tambah_form').modal('show');
 					// 		$('#modal_tambah_form_label').html('Tambah Formulir Rekam Medis Pasien');
 					// 	});
 					// }

 					const allowedGroups = ['Admin', 'Admin PPI'];
 					const allowedProfesi = [
 						'Dokter Umum',
 						'Dokter Spesialis',
 						'Bidan',
 						'Perawat',
 						'Fisioterapis',
 						'Dokter Sub Spesialis',
 						'Nutrisionis',
 						'Ahli Gizi'
 					];

 					if (allowedGroups.includes(groupAccount) || allowedProfesi.includes(profesi)) {
 						const $btnTambah = $('#btn-tambah-form');

 						$btnTambah.show().off('click').on('click', function() {
 							getListTambahFormulir(1, data.list_tambah_forms, layanan.jenis_layanan);
 							$('#keyword-form-search').val('');
 							$('#modal_tambah_form').modal('show');
 							$('#modal_tambah_form_label').html('Tambah Formulir Rekam Medis Pasien');
 						});
 					}

 					if (data.list_forms.length == 0) {
 						let html = `
						<tr>
							<td style="background-color: grey; color: white;" colspan="5" class="center">TIDAK ADA DATA FORMULIR</td>
						</tr>
						`;

 						$('#table_list_form_pasien tbody').append(html)
 					}

 					let num = 1;
 					$.each(data.list_forms, function(i, v) {
 						let btnEdit = '';
 						let kodeFormulir = v.no_formulir.replace(/-/g, '_');

 						let finalKodeFormulir = kodeFormulir;
 						if (kodeFormulir === 'FORM_REM_01_01' && layanan.jenis_layanan === 'Intensive Care') {
 							finalKodeFormulir = 'FORM_REM_01_01_ICARE';
 						}

 						let btnLihat = `<button type="button" class="btn btn-secondary btn-xs" onclick="lihatFormulir('${finalKodeFormulir}', '${id_pendaftaran}', '${id_layanan}', '${no_rm}')"><i class="fas fa-eye""></i> Lihat</button> `;

 						// if (groupAccount == 'Admin' | groupAccount == 'Admin PPI' | profesi == 'Dokter Umum' | profesi == 'Dokter Spesialis' | profesi == 'Bidan' | profesi == 'Perawat' | profesi == 'Fisioterapis' | profesi == 'Nutrisionis' | profesi == 'Ahli Gizi' | groupAccount == 'Admin Verifikator Casemix') {
 						if (allowedGroups.includes(groupAccount) || allowedProfesi.includes(profesi) || groupAccount == 'Admin Verifikator Casemix') {
 							btnEdit = `<button type="button" class="btn btn-secondary btn-xs" onclick="editFormulir('${finalKodeFormulir}', '${id_pendaftaran}', '${id_layanan}', '${no_rm}')"><i class="fas fa-edit""></i> Edit</button> `;
 						}

 						if (finalKodeFormulir === 'FORM_PMD_33_00' ||
 							finalKodeFormulir === 'FORM_REM_09_04' ||
 							finalKodeFormulir === 'FORM_PMD_46a1_00' ||
 							finalKodeFormulir === 'FORM_PMD_46a2_00' ||
 							finalKodeFormulir === 'FORM_PMD_46a3_00' ||
 							finalKodeFormulir === 'FORM_PMD_46a4_00' ||
 							finalKodeFormulir === 'FORM_PMD_46a5_00' ||
 							finalKodeFormulir === 'FORM_PMD_46a6_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a1_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a2_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a3_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a4_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a5_00' ||
 							finalKodeFormulir === 'FORM_PMD_47a6_00' ||
 							finalKodeFormulir === 'FORM_KEP_124_00' ||
 							finalKodeFormulir === 'FORM_KEP_125_00' ||
 							finalKodeFormulir === 'FORM_IFRS_09_00'
 						) {
 							btnEdit = '';
 						}

 						let btnList = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-xs btn-outline-info" aria-expanded="false" id="btn-expand-form-all' + v.id + '"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-list mr-1"></i>List Form</a>';
 						let btnListForm = btnLihat + btnEdit;

 						$('#keyword-form-search').keyup(debounce(function() {
 							getListTambahFormulir(1, data.list_tambah_forms, layanan.jenis_layanan, $('#keyword-form-search').val());
 						}))

 						if (v.id_form !== null) {
 							let html = `
						<tr>
							<td class="center">${num++}</td>
							<td class="center">${v.no_formulir}</td>
							<td>${v.nama}</td>
							<td class="center">${(v.kategori_formulir !== null ? v.kategori_formulir : '-')}</td>
							<td class="right">
								${btnListForm}
							</td>
						</tr>
						`;

 							$('#table_list_form_pasien tbody').append(html)
 						}

 					})

 					$('#modal-list-form').modal('show');
 					$('#modal-list-form-label').html('List Form Rekam Medis Pasien');

 				},
 				complete: function() {
 					hideLoader()
 				},
 				error: function(e) {
 					accessFailed(e.status);
 				},
 			});

 		}


 		function getListTambahFormulir(page, dataList, jenaisLayanan, searchTerm = '') {
 			$('#page-now-tambah').val(page);

 			const itemsPerPage = 5;
 			const startIndex = (page - 1) * itemsPerPage;
 			const endIndex = startIndex + itemsPerPage;

 			// Filter data berdasarkan kata kunci pencarian
 			const filteredData = dataList.filter(item => {
 				const searchLower = searchTerm.toLowerCase();
 				return (
 					item.no_formulir.toLowerCase().includes(searchLower) ||
 					item.nama.toLowerCase().includes(searchLower)
 				);
 			});

 			const itemsToDisplay = filteredData.slice(startIndex, endIndex);
 			const tableBody = $('#table_tambah_form_pasien tbody');
 			tableBody.empty();

 			itemsToDisplay.forEach((v, i) => {
 				const rowNum = i + 1 + (page - 1) * itemsPerPage;
 				let kodeFormulir = v.no_formulir.replace(/-/g, '_');

 				let finalKodeFormulir = kodeFormulir;
 				if (kodeFormulir === 'FORM_REM_01_01' && jenaisLayanan === 'Intensive Care') {
 					finalKodeFormulir = 'FORM_REM_01_01_ICARE'; // Ubah kodeFormulir jika memenuhi kondisi
 				}

 				const idPendaftaran = v.id_pendaftaran;
 				const idLayananPendaftaran = v.id_layanan_pendaftaran;
 				const idPasien = v.id_pasien;

 				const row = `
            <tr>
                <td class="center">${rowNum}</td>
                <td class="center">${v.no_formulir}</td>
                <td>${v.nama}</td>
                <td class="center">${(v.kategori_formulir !== null ? v.kategori_formulir : '-')}</td>
                <td class="right">
                    <button type="button" class="btn btn-info btn-xs" onclick="tambahFormulirBaru('${finalKodeFormulir}', '${idPendaftaran}', '${idLayananPendaftaran}', '${idPasien}')"><i class="fas fa-plus"></i> Tambah Form</button>
                </td>
            </tr>
        `;
 				tableBody.append(row);
 			});

 			const totalItems = filteredData.length;
 			const totalPages = Math.ceil(totalItems / itemsPerPage);

 			$('#pagination_tambah').html(paginationAdd(totalItems, itemsPerPage, page, totalPages, JSON.stringify(filteredData)));
 			$('#summary_tambah').html(page_summary(totalItems, itemsToDisplay.length, itemsPerPage, page));
 		}


 		function tambahFormulirBaru(kodeFormulir, idPendaftaran, idLayananPendaftaran, idPasien) {
 			loadViewFormulir(kodeFormulir, function() {
 				const dataParams = {
 					id_pendaftaran: idPendaftaran,
 					id_layanan: idLayananPendaftaran,
 					no_rm: idPasien
 				}

 				$.ajax({
 					type: 'GET',
 					url: '<?= base_url('form_rekam_medis/api/form_rekam_medis/data_list_pasien'); ?>',
 					data: dataParams,
 					cache: false,
 					dataType: 'JSON',
 					beforeSend: function() {
 						showLoader()
 					},
 					success: function(data) {

 						// eval(`tambah${kodeFormulir}(${JSON.stringify(data)})`);
 						const dynamicFunctionName = `tambah${kodeFormulir}`;

 						if (typeof window[dynamicFunctionName] === 'function') {
 							window[dynamicFunctionName](data);
 						} else {
 							swalAlert('warning', 'Mohon Maaf!', 'Kode Formulir ' + kodeFormulir + ' belum tersedia, atau sedang dalam perbaikan.');
 							// alert(`Fungsi ${dynamicFunctionName} tidak terdefinisi.`);
 						}

 						$('#modal_tambah_form').modal('hide');

 					},
 					complete: function() {
 						hideLoader()
 					},
 					error: function(e) {
 						accessFailed(e.status);
 					},
 				});
 			});
 		}

 		function lihatFormulir(kodeFormulir, idPendaftaran, idLayananPendaftaran, idPasien) {
 			loadViewFormulir(kodeFormulir, function() {

 				const dataParams = {
 					id_pendaftaran: idPendaftaran,
 					id_layanan: idLayananPendaftaran,
 					no_rm: idPasien
 				}

 				$.ajax({
 					type: 'GET',
 					url: '<?= base_url('form_rekam_medis/api/form_rekam_medis/data_list_pasien'); ?>',
 					data: dataParams,
 					cache: false,
 					dataType: 'JSON',
 					beforeSend: function() {
 						showLoader()
 					},
 					success: function(data) {

 						const dynamicFunctionName = `lihat${kodeFormulir}`;

 						if (typeof window[dynamicFunctionName] === 'function') {
 							window[dynamicFunctionName](data);
 						} else {
 							swalAlert('warning', 'Mohon Maaf!', 'Kode Formulir ' + kodeFormulir + ' belum tersedia, atau sedang dalam perbaikan.');
 						}

 					},
 					complete: function() {
 						hideLoader()
 					},
 					error: function(e) {
 						accessFailed(e.status);
 					},
 				});
 			});
 		}

 		// // TAMBAHAN Wh untuk menghilangkan Bloked
 		// $(document).ready(function () { // Jalankan kode setelah halaman selesai dimuat
 		// 	$('.modal').on('shown.bs.modal', function () { // Ketika modal sudah muncul di layar
 		// 		let modal = $(this); // Simpan modal yang sedang ditampilkan dalam variabel modal
 		// 		setTimeout(() => { // Tunggu 100ms sebelum menghapus atribut yang menyebabkan error
 		// 			modal.removeAttr('aria-hidden').removeAttr('inert'); 
 		// 			// Hapus atribut 'aria-hidden' agar modal bisa diakses oleh screen reader
 		// 			// Hapus atribut 'inert' agar elemen dalam modal bisa difokuskan
 		// 		}, 100); // Delay 100ms untuk memastikan modal benar-benar sudah muncul
 		// 	});
 		// 	$('.modal').on('hidden.bs.modal', function () { // Ketika modal ditutup
 		// 		$(this).attr('inert', ''); // Tambahkan kembali atribut 'inert' agar elemen dalam modal tidak bisa diakses saat modal tertutup
 		// 	});
 		// });

 		function editFormulir(kodeFormulir, idPendaftaran, idLayananPendaftaran, idPasien) {
 			loadViewFormulir(kodeFormulir, function() {

 				const dataParams = {
 					id_pendaftaran: idPendaftaran,
 					id_layanan: idLayananPendaftaran,
 					no_rm: idPasien
 				}

 				$.ajax({
 					type: 'GET',
 					url: '<?= base_url('form_rekam_medis/api/form_rekam_medis/data_list_pasien'); ?>',
 					data: dataParams,
 					cache: false,
 					dataType: 'JSON',
 					beforeSend: function() {
 						showLoader()
 					},
 					success: function(data) {

 						const dynamicFunctionName = `edit${kodeFormulir}`;

 						if (typeof window[dynamicFunctionName] === 'function') {
 							window[dynamicFunctionName](data);
 						} else {
 							swalAlert('warning', 'Mohon Maaf!', 'Kode Formulir ' + kodeFormulir + ' belum tersedia, atau sedang dalam perbaikan.');
 						}

 					},
 					complete: function() {
 						hideLoader()
 					},
 					error: function(e) {
 						accessFailed(e.status);
 					},
 				});
 			});
 		}

 		function loadViewFormulir(kodeFormulir, callback) {
 			$('#load-view-formulir').empty();

 			$.ajax({
 				url: '<?php echo base_url(); ?>form_rekam_medis/api/form_rekam_medis/load_view/kode_formulir/' + kodeFormulir,
 				type: "GET",
 				success: function(data) {
 					$('#load-view-formulir').html(data);
 					callback();
 				}
 			});
 		}

 		function resetAllDataFormRM() {
 			$('#keyword-search, #jenis-rawat, #id_pasien_search, #tgl-search, #pasien-search, .select2-input, .form-control').val('');
 			$('#tgl-search').empty();
 			$('.select2-chosen').html('Pilih Pasien...');
 			getListFormulirRMPasien(1);
 		}

 		function paginationForm(total_data, limit, page, tab) {
 			var str = '';
 			var total_page = Math.ceil(total_data / limit);

 			var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingForm(1,' + tab + ')">First</a></li>';
 			var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingForm(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
 			var click_prev = '';
 			if (page > 1) {
 				click_prev = 'onclick="pagingForm(' + (page - 1) + ',' + tab + ')"';
 			};
 			var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

 			var click_next = '';
 			if (page < total_page) {
 				click_next = 'onclick="pagingForm(' + (page + 1) + ',' + tab + ')"';
 			};
 			var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

 			var page_numb = '';
 			var act_click = '';
 			var start = page - 2;
 			var finish = page + 2;
 			if (start < 1) {
 				start = 1;
 			}

 			if (finish > total_page) {
 				finish = total_page;
 			}

 			for (var p = start; p <= finish; p++) {

 				if (p !== page) {
 					page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingForm(' + p + ',' + tab + ')">' + p + '</a></li>';
 				} else {
 					page_numb += '<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:60px;"/><button type="button" class="btn btn-info btn-sm mb-1" title="Lompat ke halaman" onclick="gotopage(this, ' + tab + ')"><i class="fas fa-search"></i></button></li>' + '';
 				}

 			};



 			return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
 		}

 		function paginationAdd(total_data, limit, page, tab, dataList) {
 			var str = '';
 			var total_page = Math.ceil(total_data / limit);

 			var first = `<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick='paging2form(1, ${dataList})'>First</a></li>`;
 			var last = `<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick='paging2form(${((total_page === 0) ? 1 : total_page)}, ${dataList})'>Last</a></li>`;
 			var click_prev = '';
 			if (page > 1) {
 				click_prev = `onclick='paging2form(${(page - 1)}, ${dataList})'`;
 			};
 			var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

 			var click_next = '';
 			if (page < total_page) {
 				click_next = `onclick='paging2form(${(page + 1)}, ${dataList})'`;
 			};
 			var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

 			var page_numb = '';
 			var act_click = '';
 			var start = page - 2;
 			var finish = page + 2;
 			if (start < 1) {
 				start = 1;
 			}

 			if (finish > total_page) {
 				finish = total_page;
 			}

 			for (var p = start; p <= finish; p++) {

 				if (p !== page) {
 					page_numb += `<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick='paging2form(${p}, ${dataList})'>${p}</a></li>`;
 				} else {
 					page_numb += '<li><a style="cursor:pointer; background-color:#00C0C8; color: white; font-weight: 400;" class="page-link">' + page + '</a></li>' + '';
 					// page_numb += `<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="${page}" style="width:60px;"/><button type="button" class="btn btn-info btn-sm mb-1" title="Lompat ke halaman" onclick='gotopage2(this, ${data})'><i class="fas fa-search"></i></button></li>` + ``;
 				}

 			};

 			return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
 		}

 		function pagingForm(page) {
 			getListFormulirRMPasien(page)
 		}

 		function paging2form(page, dataList) {
 			getListTambahFormulir(page, dataList)
 		}

 		function debounce(func, timeout = 750) {
 			let timer;
 			return (...args) => {
 				clearTimeout(timer);
 				timer = setTimeout(() => {
 					func.apply(this, args);
 				}, timeout);
 			};
 		}

 		function debounceTime(func, timeout) {
 			let timer;
 			return (...args) => {
 				clearTimeout(timer);
 				timer = setTimeout(() => {
 					func.apply(this, args);
 				}, timeout);
 			};
 		}
 	</script>