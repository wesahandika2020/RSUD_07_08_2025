<!-- <style>
	
	.table-freeze {
		height: 80vh;
		margin: 2rem 0;
		overflow: auto;
		scroll-snap-type: both mandatory;
		/* white-space: nowrap; */
	}

	.select2-container .select2-input {
		height: 200px;
	}

	.table-freeze .table {
		margin: 0;
		overflow: unset;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
	}

	th,
	td {
		padding: 1rem 2.5rem;
		text-align: left;
	}

	thead th,
	.freeze-top th {
		/* border-bottom: 1px solid #ccc; */
		font-weight: 600;
		top: 0;
		z-index: 1;
	}

	th.tp {
		background-color: #fff;
		z-index: 2;
	}

	tbody th {
		left: 0;
		text-align: left;
	}

	tbody th,
	th.tp {
		border-right: 1px solid #ccc;
	}

	tr {
		padding: 0;
	}

	td {
		color: #555;
		vertical-align: top;
	}

	tbody tr:nth-child(odd) th {
		background-color: #fff;
	}

	thead th,
	tbody tr:nth-child(even) th,
	tr:nth-child(even) td {
		background-color: #f4f4f4;
		/* striped background color */
	}

	thead th,
	tbody th {
		position: sticky;
		-webkit-position: sticky;
	}

	@media screen and (max-width: 680px) {
		.table-freeze {
			height: 70vh
		}
	}

	@media screen and (max-width: 480px) {
		.table-freeze {
			height: 60vh
		}
	}

	/* #table-data tbody tr td {
		font-size: 11px;
	} */
	#parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
	}

	/* #table-lap-mutasi-obat {
        width: 100% !important;
    } */
</style> -->

<style>
	.button-raduis-right {
		border-top-right-radius: 10px;
		border-bottom-right-radius: 10px;
		border-top-left-radius: 0px;
		border-bottom-left-radius: 0px;
		height: 38px;
	}
</style>

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('pemakaian_peralatan_medis/api/pemakaian_peralatan_medis') ?>';

	$(function() {
		$('#page-now').val();
		$('#tanggal-masuk-index').val();
		$('#bangsal-search').val();
		$('#keyword-search').val();
		$('#pasien-keluar').val();

		$('#s2id_kultur_search').attr('style="style="height: auto;"');


		$('#tanggal-masuk-index, #bangsal-search, #pasien-keluar').on('change keyup', function() {
			getListFormPPI(1);
		});

		$('#keyword-search').on('keyup', function() {
			getListFormPPI(1);
		});
	});

	resetForm();
	getListFormPPI(1);

	$('#btn-reload').click(function() {
		resetForm();
		getListFormPPI(1);
	});

	$('#btn-export').click(function() {
		window.open('<?= base_url('pemakaian_peralatan_medis/export_laporan_harian?') ?>' + 'keyword=' + $('#keyword-search').val() + '&tanggal_masuk=' + $('#tanggal-masuk-index').val() + '&bangsal_search=' + $('#bangsal-search').val() + '&pasien_keluar=' + $('#pasien-keluar').val());
	});

	function resetForm() {
		$('#tanggal-masuk-index').val('<?= date('Y-m-d') ?>');
		if ("<?= $this->session->userdata("account_group") ?>" == "Admin PPI" || "<?= $this->session->userdata("account_group") ?>" == "Admin") {
			$('#bangsal-search').val('');
		}
		$('#keyword-search').val('');
		$('#pasien-keluar').val('');
	}

	function getListFormPPI(page) {

		$.ajax({
			type: 'GET',
			url: baseUrl + '/get_list_form_ppi/page/' + page,
			data: 'keyword=' + $('#keyword-search').val() + '&tanggal_masuk=' + $('#tanggal-masuk-index').val() + '&bangsal_search=' + $('#bangsal-search').val() + '&pasien_keluar=' + $('#pasien-keluar').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if ((page - 1) & (data.data.length === 0)) {
					getListFormPPI(page - 1);
					return false;
				}

				$('#label-ppi').empty();

				let label_ppi = `
				<p><b>Ruangan/ Unit :</b> ${data.unit}</p>
				<p><b>Tanggal       :</b> ${indo_tgl($('#tanggal-masuk-index').val())}</p>
				`;

				$('#label-ppi').append(label_ppi);
				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				// $('.lap-rehab-medik, #table-lap-rehab-medik tbody').show()
				$('#table-peralatan-medis tbody').empty();
				$('#table-peralatan-medis tfoot').empty();

				$.each(data.data, function(i, v) {

					if (v.id_ppi == null ? btnColor = `btn-info" title="Input data PPI"` : btnColor = `btn-secondary" title="Edit data PPI"`);

					if ("<?= $this->session->userdata("account_group") ?>" == "Admin PPI" || "<?= $this->session->userdata("account_group") ?>" == "Admin") {
						if (v.id_ppi != null) {
							BtnHapus = `<button id="hapus-data-ppi" type="button" onclick="konfirmasiHapusPPI(${v.id_ppi}, ${data.page})" class="btn btn-sm btn-rounded btn-danger" title="Hapus data PPI"><i class="fas fa-fw fa-trash" style="display:contents;"></i></button>`;
						} else {
							BtnHapus = "";
						}
					} else {
						BtnHapus = "";
					}
					// let btnSimpan = `<button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-info"><i class="fas fa-fw fa-pencil-alt" style="display:contents;" title="Input data PPI"></i></button>`;
					// let btnUpdate = `<button type="button" class="btn btn-sm waves-effect waves-light btn-rounded btn-secondary"><i class="fas fa-fw fa-pencil-alt" style="display:contents;" title="Edit data PPI"></i></button>`;

					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.id_pasien}</td>
							<td class="left">${v.nama}</td>
							<td class="left">${v.bangsal}</td>
							<td class="center">${v.kelamin}</td>
							<td class="center">${v.umur}</td>
							<td class="center">${(v.ett == null ? '-' : v.ett)}</td>
							<td class="center">${(v.cvl == null ? '-' : v.cvl)}</td>
							<td class="center">${(v.ivl == null ? '-' : v.ivl)}</td>
							<td class="center">${(v.uc == null ? '-' : v.uc)}</td>
							<td class="center">${(v.tirah_baring == null ? '-' : v.tirah_baring)}</td>
							<td class="center">${(v.operasi == null ? '-' : v.operasi)}</td>

							<td class="center">${(v.vap == null ? '-' : v.vap)}</td>
							<td class="center">${(v.iadp == null ? '-' : v.iadp)}</td>
							<td class="center">${(v.plebitis == null ? '-' : v.plebitis)}</td>
							<td class="center">${(v.isk == null ? '-' : v.isk)}</td>
							<td class="center">${(v.dekubitus == null ? '-' : v.dekubitus)}</td>
							<td class="center">${(v.ido == null ? '-' : v.ido)}</td>

							<td class="center">${v?.kultur?.map(val => `${val.nama}.`)?.join('<br>')}</td>
							<td class="center">${v?.antiobika?.map(val => `${val.nama}.`)?.join('<br>')}</td>
							<td class="center">${(v.keterangan == null ? '-' : v.keterangan | v.keterangan == "" ? '-' : v.keterangan)}</td>
							<td class="center">
								<button id="input-data-ppi" type="button" onclick="InputDataPPI(${v.id_layanan}, '${$('#tanggal-masuk-index').val()}', ${v.id_ppi}, ${data.page})" class="btn btn-sm btn-rounded ${btnColor}><i class="fas fa-fw fa-pencil-alt" style="display:contents;"></i></button>
 								${BtnHapus}
							</td>
						</tr>
						`;

					$('#table-peralatan-medis tbody').append(html);
				})

				let = jumlah_pasien = 0;
				let = sum_ett = 0;
				let = sum_cvl = 0;
				let = sum_ivl = 0;
				let = sum_uc = 0;
				let = sum_tirah_baring = 0;
				let = sum_vap = 0;
				let = sum_iadp = 0;
				let = sum_isk = 0;
				let = sum_dekubitus = 0;
				let = sum_plebitis = 0;
				let = sum_operasi = 0;
				let = sum_ido = 0;
				let = count_kultur = 0;
				let = count_antiobika = 0;

				$.each(data.sum_data, function(i, v) {
					jumlah_pasien += parseInt(v.jumlah_pasien);
					sum_ett += parseInt(v.sum_ett);
					sum_cvl += parseInt(v.sum_cvl);
					sum_ivl += parseInt(v.sum_ivl);
					sum_uc += parseInt(v.sum_uc);
					sum_tirah_baring += parseInt(v.sum_tirah_baring);
					sum_vap += parseInt(v.sum_vap);
					sum_iadp += parseInt(v.sum_iadp);
					sum_isk += parseInt(v.sum_isk);
					sum_dekubitus += parseInt(v.sum_dekubitus);
					sum_plebitis += parseInt(v.sum_plebitis);
					sum_operasi += parseInt(v.sum_operasi);
					sum_ido += parseInt(v.sum_ido);
					count_kultur = parseInt(v.count_kultur);
					count_antiobika = parseInt(v.count_antiobika);
				})

				let html = /* html */ `
					<tr>
						<td colspan="4" class="right"><h6><b>Total</b></h6></td>
						<td colspan="2" class="center"><h6><b>${jumlah_pasien} /</b>${number_format(data.jumlah, 0, ',', '.')}</h6></td>
						<td class="center"><h6><b>${sum_ett}</b></h6></td>
						<td class="center"><h6><b>${sum_cvl}</b></h6></td>
						<td class="center"><h6><b>${sum_ivl}</b></h6></td>
						<td class="center"><h6><b>${sum_uc}</b></h6></td>
						<td class="center"><h6><b>${sum_tirah_baring}</b></h6></td>
						<td class="center"><h6><b>${sum_operasi}</b></h6></td>

						<td class="center"><h6><b>${sum_vap}</b></h6></td>
						<td class="center"><h6><b>${sum_iadp}</b></h6></td>
						<td class="center"><h6><b>${sum_plebitis}</b></h6></td>
						<td class="center"><h6><b>${sum_isk}</b></h6></td>
						<td class="center"><h6><b>${sum_dekubitus}</b></h6></td>
						<td class="center"><h6><b>${sum_ido}</b></h6></td>
						<td class="center"><h6><b>${count_kultur}</b></h6></td>
						<td class="center"><h6><b>${count_antiobika}</b></h6></td>
					</tr>
				`;
				$('#table-peralatan-medis tfoot').append(html);


			},
			complete: function() {
				hideLoader()
				// $('#modal-input-ppi').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})

	}

	function InputDataPPI(id_layanan, tanggal_input, id_ppi = null, page) {
		$.ajax({
			type: 'GET',
			url: baseUrl + '/get_data_ppi_by_id/' + id_layanan + '/' + tanggal_input + '/' + id_ppi,
			// data: $('#form-input-ppi').serialize,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				// $('input[type=text], #keyword').val('');
				// syams_validation_remove('.form-control, .select2-input');
				syams_validation_remove('#kultur_search');
				syams_validation_remove('#antiobika_search');
				$('#tanggal-masuk-index').val();
				$('#bangsal-search').val();
				$('#keyword-search').val();

				$('#modal-input-ppi-label, #tanggal-keluar-ppi, #btn-add-kultur').empty('');
				$('#umur-ppi, #ruang-ppi, #dokter-ppi, #tanggal-masuk-ppi, #btn-add-antiobika').empty('');
				$('#no-rm-ppi, #nama-pasien-ppi, #kelamin-ppi, #btn-simpan-ppi').empty('');
				$('#table-kultur-ppi tbody, #table-antiobika-ppi tbody, #btn-simpan-kultur-ppi, #btn-simpan-antiobika-ppi').empty();

				$('#modal-input-ppi').modal('show');
				// if ($('#id-ppi').val() !== "") {
				// 	$('#kultur-antiobika-tab').removeClass('disabled');
				// 	$('#modal-input-ppi-label').append('<b>FORM UBAH DATA PPI HARIAN</b>');
				// } else {
				// 	$('#kultur-antiobika-tab').addClass('disabled');
				// 	$('#modal-input-ppi-label').append('<b>FORM INPUT DATA PPI HARIAN</b>');
				// }

				let val = data.data[0];

				if (val.id_ppi == null) {
					$('#peralatan-ppi-tab').addClass('active');
					$('#input-peralatan-ppi').addClass('show active');
					$('#kultur-antiobika-tab').removeClass('active');
					$('#input-kultur-antiobika').removeClass('show active');
				}

				if (val.id_ppi !== null) {
					getLiistKulturAtiobika(val.id_ppi, page)
					$('#kultur-antiobika-tab').removeClass('disabled');
					$('#modal-input-ppi-label').append('<b>FORM UBAH DATA PPI HARIAN</b>');

					$('#peralatan-ppi-tab').removeClass('active');
					$('#input-peralatan-ppi').removeClass('show active');
					$('#kultur-antiobika-tab').addClass('active');
					$('#input-kultur-antiobika').addClass('show active');
				} else {
					$('#kultur-antiobika-tab').addClass('disabled');
					$('#modal-input-ppi-label').append('<b>FORM INPUT DATA PPI HARIAN</b>');

					$('#peralatan-ppi-tab').addClass('active');
					$('#input-peralatan-ppi').addClass('show active');
					$('#kultur-antiobika-tab').removeClass('active');
					$('#input-kultur-antiobika').removeClass('show active');
				}

				if ("<?= $this->session->userdata("account_group") ?>" == "Admin PPI" || "<?= $this->session->userdata("account_group") ?>" == "Admin") {
					let btn_kultur = `
								<button type="button" class="btn btn-info btn-xs mr-1" title="Klik untuk tambah data Kultur" onclick="addDataMaster('kultur', ${id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})">
									<i class="fas fa-plus-circle mr-1"></i>Tambah Masterdata Kultur
								</button>`;
					let btn_antiobika = `
								<button type="button" class="btn btn-info btn-xs mr-1" title="Klik untuk tambah data Antiobika" onclick="addDataMaster('antiobika', ${id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})">
									<i class="fas fa-plus-circle mr-1"></i>Tambah Masterdata Antiobika
								</button>`;

					$('#btn-add-kultur').append(btn_kultur)
					$('#btn-add-antiobika').append(btn_antiobika)
				}

				$('#id-ppi').val(val.id_ppi);
				$('#id_layanan_ppi').val(val.id_layanan);
				$('#id_bangsal').val(val.id_bangsal);

				$('#tanggal-keluar-ppi').append(": " + (val.waktu_keluar !== null ? datetimefmysql(val.waktu_keluar) : "-"));
				$('#umur-ppi').append(": " + val.umur);
				$('#ruang-ppi').append(": " + val.bangsal);
				$('#dokter-ppi').append(": " + (val.dokter !== null ? val.dokter : "-"));

				$('#tanggal-masuk-ppi').append(": " + datetimefmysql(val.waktu_masuk));
				$('#no-rm-ppi').append(": " + val.id_pasien);
				$('#nama-pasien-ppi').append(": " + val.nama);
				$('#kelamin-ppi').append(": " + (val.kelamin == 'L' ? 'Laki - Laki' : 'Perempuan'));

				$('#ett').val((val.ett !== null ? val.ett : "0"));
				$('#cvl').val((val.cvl !== null ? val.cvl : "0"));
				$('#ivl').val((val.ivl !== null ? val.ivl : "0"));
				$('#uc').val((val.uc !== null ? val.uc : "0"));
				$('#tirah_baring').val((val.tirah_baring !== null ? val.tirah_baring : "0"));
				$('#operasi').val((val.operasi !== null ? val.operasi : "0"));

				$('#vap').val((val.vap !== null ? val.vap : "0"));
				$('#iadp').val((val.iadp !== null ? val.iadp : "0"));
				$('#isk').val((val.isk !== null ? val.isk : "0"));
				$('#dekubitus').val((val.dekubitus !== null ? val.dekubitus : "0"));
				$('#plebitis').val((val.plebitis !== null ? val.plebitis : "0"));
				$('#ido').val((val.ido !== null ? val.ido : "0"));

				$('#kultur_search').val((val.id_kultur));
				$('#s2id_kultur_search a .select2-chosen').html((val.id_kultur !== null ? val.kultur : "-- Pilih Kultur --"))
				$('#antiobika_search').val((val.id_antiobika));
				$('#s2id_antiobika_search a .select2-chosen').html((val.id_antiobika !== null ? val.antiobika : "-- Pilih Antiobika --"))
				$('#keterangan').val((val.keterangan !== null ? val.keterangan : ""));

				let save_kultur = `
					<button type="button" class="btn btn-info waves-effect button-raduis-right" onclick="simpanKulturAntiobika('kultur', ${id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})">
						<i class="fas fa-plus-circle mr-1"></i> Simpan 
					</button>`;
				let save_antiobika = `
					<button type="button" class="btn btn-info waves-effect button-raduis-right" onclick="simpanKulturAntiobika('antiobika', ${id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})">
						<i class="fas fa-plus-circle mr-1"></i> Simpan 
					</button>`;

				$('#btn-simpan-kultur-ppi').append(save_kultur)
				$('#btn-simpan-antiobika-ppi').append(save_antiobika)

				// let html_kultur = `
				// 	<tr>
				// 		<td colspan="5" class="center"><b> -- Tidak Ada Data Kultur -- </b></td>
				// 	</tr>
				// `;

				// $('#table-kultur-ppi tbody').append(html_kultur);

				// let html_antiobika = `
				// 	<tr>
				// 		<td colspan="5" class="center"><b> -- Tidak Ada Data Antiobika -- </b></td>
				// 	</tr>
				// `;
				// $('#table-antiobika-ppi tbody').append(html_antiobika);

				if (val.id_ppi !== null) {
					$('#btn-simpan-ppi').append(`<button type="button" class="btn btn-secondary waves-effect" onclick="simpanPPI(${val.id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})"><i class="fas fa-save mr-1"></i> Update</button>`);
					// $('#btn-next-ppi').append(`<button type="button" class="btn btn-info waves-effect"><i class="fas fa-angle-double-right mr-1"></i> Next</button>`)
				} else {
					$('#btn-simpan-ppi').append(`<button type="button" class="btn btn-info waves-effect" onclick="simpanPPI(${val.id_layanan}, '${tanggal_input}', ${val.id_ppi}, ${page})"><i class="fas fa-save mr-1"></i> Simpan</button>`)
				}

				$('#btn-close-modal-ppi, btn-close-silang-modal-ppi').click(function() {
					$('#modal-input-ppi').modal('hide');
					getListFormPPI(page);
				});

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function getLiistKulturAtiobika(id_ppi, page) {
		$.ajax({
			type: 'GET',
			url: baseUrl + '/get_list_kulturantiobika/' + id_ppi,
			// data: $('#form-input-ppi').serialize,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#table-kultur-ppi tbody, #table-antiobika-ppi tbody').empty();

				if (data.data_kultur.length <= 0) {
					let html_kultur = `
						<tr>
							<td colspan="5" class="center"><b> -- Tidak Ada Data Kultur -- </b></td>
						</tr>
					`;
					$('#table-kultur-ppi tbody').append(html_kultur);
				} else {
					$.each(data.data_kultur, function(i, v) {
						let no = i + 1;
						let html_kultur = `
							<tr>
								<td class="center">${no++}</td>
								<td class="center">${v.tanggal}</td>
								<td class="left">${v.kultur}</td>
								<td class="center">${v.operator}</td>
								<td class="center">
									<button id="hapus-data-ppi" type="button" onclick="konfirHapusKulturAntiobika(${v.id}, ${id_ppi}, ${page})" class="btn btn-sm btn-rounded btn-danger" title="Hapus data"><i class="fas fa-fw fa-trash" style="display:contents;"></i></button>
								</td>
							</tr>
						`;
						$('#table-kultur-ppi tbody').append(html_kultur);
					});
				}

				if (data.data_antiobika.length <= 0) {
					let html_antiobika = `
						<tr>
							<td colspan="5" class="center"><b> -- Tidak Ada Data Antiobika -- </b></td>
						</tr>
					`;
					$('#table-antiobika-ppi tbody').append(html_antiobika);
				} else {
					$.each(data.data_antiobika, function(i, v) {
						let no = i + 1;
						let html_antiobika = `
							<tr>
								<td class="center">${no++}</td>
								<td class="center">${v.tanggal}</td>
								<td class="left">${v.antiobika}</td>
								<td class="center">${v.operator}</td>
								<td class="center">
									<button id="hapus-data-ppi" type="button" onclick="konfirHapusKulturAntiobika(${v.id}, ${id_ppi}, ${page})" class="btn btn-sm btn-rounded btn-danger" title="Hapus data"><i class="fas fa-fw fa-trash" style="display:contents;"></i></button>
								</td>
							</tr>
						`;
						$('#table-antiobika-ppi tbody').append(html_antiobika);
					});
				}

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	// function konfirmasiSimpanPPI(id_layanan_pendaftaran, tanggal_search, id_ppi = null, page) {
	// 	// if ($('#keterangan').val() == '') {
	// 	// 	syams_validation('#keterangan', 'Silahkan isi Keterangan terlebih dahulu');
	// 	// 	return false;
	// 	// }

	// 	bootbox.dialog({
	// 		message: "Anda yakin akan menyimpan data ini?",
	// 		title: "Konfirmasi",
	// 		buttons: {
	// 			batal: {
	// 				label: '<i class="fas fa-times-circle mr-1"></i>Batal',
	// 				className: "btn-secondary",
	// 				callback: function() {

	// 				}
	// 			},
	// 			simpan: {
	// 				label: '<i class="fas fa-check-circle mr-1"></i>Ya',
	// 				className: "btn-info",
	// 				callback: function() {
	// 					simpanPPI(id_layanan_pendaftaran, tanggal_search, id_ppi, page);
	// 				}
	// 			}
	// 		}
	// 	});
	// }

	function simpanPPI(id_layanan_pendaftaran, tanggal_search, id_ppi = null, page) {
		$.ajax({
			type: 'POST',
			url: baseUrl + '/simpan_form_ppi/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/tanggal_search/"' + tanggal_search + '"/id_ppi/' + id_ppi,
			data: $('#form-input-ppi').serialize(),
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status === true) {
					$('input[name=csrf_syam]').val(data.token);
					if (id_ppi !== null) {
						messageEditSuccess();
						// resetForm();
						InputDataPPI(id_layanan_pendaftaran, tanggal_search, id_ppi, page)
						getListFormPPI(page);
					} else {
						messageAddSuccess();
						// resetForm();
						InputDataPPI(id_layanan_pendaftaran, tanggal_search, id_ppi, page)
						getListFormPPI(page);
						$('#peralatan-ppi-tab').removeClass('active');
						$('#input-peralatan-ppi').removeClass('show active');
						$('#kultur-antiobika-tab').addClass('active');
						$('#input-kultur-antiobika').addClass('show active');
					}
					// $('#modal-input-ppi').modal('show');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageAddFailed();
			}
		});
	}

	function konfirmasiHapusPPI(id_ppi, page) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-refresh mr-2"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fa fa-trash mr-2"></i>Hapus',
					className: "btn-info",
					callback: function() {

						$.ajax({
							type: 'DELETE',
							url: baseUrl + '/hapus_kultur_antiobika' + '/id/' + 0 + '/id_ppi/' + id_ppi,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								HapusdataPPI(id_ppi, page);
								getListFormPPI(page);
							},
							error: function(e) {
								messageDeleteFailed();
								getListFormPPI(page);
							}
						});
					}
				}
			}
		});
	}

	function konfirHapusKulturAntiobika(id, id_ppi, page) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-refresh mr-2"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fa fa-trash mr-2"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: baseUrl + '/hapus_kultur_antiobika' + '/id/' + id + '/id_ppi/' + id_ppi,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								messageDeleteSuccess();
								getLiistKulturAtiobika(id_ppi);
							},
							error: function(e) {
								messageDeleteFailed();
								getLiistKulturAtiobika(id_ppi);

							}
						});
					}
				}
			}
		});
	}

	function HapusdataPPI(id_ppi, page) {
		$.ajax({
			type: 'DELETE',
			url: baseUrl + '/hapus_form_ppi' + '/id_ppi/' + id_ppi,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				messageDeleteSuccess();
				// getListFormPPI(page);
			},
			error: function(e) {
				messageDeleteFailed();
				// getListFormPPI(page);
			}
		});
	}

	// function HapusKulturAntiobika(id = null, id_ppi, page) {
	// 	$.ajax({
	// 		type: 'DELETE',
	// 		url: baseUrl + '/hapus_kultur_antiobika' + '/id/' + id + '/id_ppi/' + id_ppi,
	// 		cache: false,
	// 		dataType: 'JSON',
	// 		success: function(data) {
	// 			messageDeleteSuccess();
	// 			// return true;
	// 			// getLiistKulturAtiobika(id_ppi);
	// 			// getListFormPPI(page);
	// 		},
	// 		error: function(e) {
	// 			messageDeleteFailed();
	// 			// return false;
	// 			// getLiistKulturAtiobika(id_ppi);
	// 			// getListFormPPI(page);
	// 		}
	// 	});
	// }

	function addDataMaster(jenis, id_layanan, tanggal_input, id_ppi, page) {
		$('#modal-add-masterdata-ppi-label, #label-input-masterdata, #nama-masterdata, #btn-simpan-masterdata-ppi').empty('');
		$('#nama-masterdata').val('');
		syams_validation_remove('#nama-masterdata');

		$('#nama-masterdata').on('input', function() {
			$(this).val(function(index, value) {
				// return value.toUpperCase();
				return value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
					return letter.toUpperCase();
				});
			});
		});

		$('#modal-add-masterdata-ppi').modal('show');
		if (jenis == 'kultur') {
			$('#nama-masterdata').on('input', function() {
				$(this).val(function(index, value) {
					return value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
						return letter.toUpperCase();
					});
				});
			});

			$('#modal-add-masterdata-ppi-label').append('<b>FORM TAMBAH MASTERDATA KULTUR</b>');
			$('#label-input-masterdata').append('Nama Kultur');
			$('#nama-masterdata').attr('placeholder', 'Masukan Nama Kultur...');
			$('#btn-simpan-masterdata-ppi').append(`<button type="button" class="btn btn-success waves-effect" onclick="simpanMasterdataPPI('${jenis}', ${id_layanan}, '${tanggal_input}', ${id_ppi}, ${page})"><i class="fas fa-save mr-1"></i> Simpan Kultur</button>`);
		} else {
			$('#nama-masterdata').on('input', function() {
				$(this).val(function(index, value) {
					return value.toUpperCase();
				});
			});

			$('#modal-add-masterdata-ppi-label').append('<b>FORM TAMBAH MASTERDATA ANTIOBIKA</b>');
			$('#label-input-masterdata').append('Nama Antiobika');
			$('#nama-masterdata').attr('placeholder', 'Masukan Nama Antiobika...');
			$('#btn-simpan-masterdata-ppi').append(`<button type="button" class="btn btn-success waves-effect" onclick="simpanMasterdataPPI('${jenis}', ${id_layanan}, '${tanggal_input}', ${id_ppi}, ${page})"><i class="fas fa-save mr-1"></i> Simpan Antiobika</button>`);
		}
	}

	function simpanMasterdataPPI(jenis, id_layanan, tanggal_input, id_ppi, page) {
		if ($('#nama-masterdata').val() == '') {
			syams_validation('#nama-masterdata', 'Silahkan isi Nama terlebih dahulu');
			return false;
		}
		$.ajax({
			type: 'POST',
			url: baseUrl + '/simpan_masterdata_ppi/jenis/' + jenis + '/page/' + page,
			data: $('#form-input-masterdata-ppi').serialize(),
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status === false) {
					messageCustom('Gagal menyimpan data! <br>Data sudah tersimpan di <b>Database</b>', 'Error');
				} else {
					$('input[name=csrf_syam]').val(data.token);
					messageAddSuccess();

					$('#modal-add-masterdata-ppi').modal('hide');
					// $('#modal-input-ppi').modal('hide');

					InputDataPPI(id_layanan, tanggal_input, id_ppi, page)
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageAddFailed();
			}
		});
	}

	function simpanKulturAntiobika(jenis, id_layanan, tanggal_input, id_ppi, page) {
		if (jenis !== 'antiobika') {
			if ($('#kultur_search').val() == '') {
				syams_validation('#kultur_search', 'Silahkan pilih kultur terlebih dahulu');
				return false;
			}
		} else {
			if ($('#antiobika_search').val() == '') {
				syams_validation('#antiobika_search', 'Silahkan pilih antiobika terlebih dahulu');
				return false;
			}
		}

		$.ajax({
			type: 'POST',
			url: baseUrl + '/simpan_kultur_antiobika/jenis/' + jenis + '/page/' + page,
			data: $('#form-input-ppi').serialize(),
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status === true) {
					$('input[name=csrf_syam]').val(data.token);

					messageAddSuccess();
					getListFormPPI(page);
					InputDataPPI(id_layanan, tanggal_input, id_ppi, page)

					// $('#modal-add-masterdata-ppi').modal('hide');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageAddFailed();
			}
		});
	}

	$('#antiobika_search').select2({
		ajax: {
			url: baseUrl + "/antiobika_auto",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
				};
			},
			results: function(data, page) {
				// var more = (page * 20) < data.total; // whether or not there are more results available

				// notice we return the value of more so Select2 knows if more results can be loaded
				return {
					results: data.data,
					// more: more
				};
			}
		},
		formatResult: function(data) {
			var markup = '<b>' + data.nama + '</b>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	});

	$('#kultur_search').select2({
		ajax: {
			url: baseUrl + "/kultur_auto",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
				};
			},
			results: function(data, page) {
				// var more = (page * 20) < data.total; // whether or not there are more results available

				// notice we return the value of more so Select2 knows if more results can be loaded
				return {
					results: data.data,
					// more: more
				};
			}
		},
		formatResult: function(data) {
			var markup = '<b>' + data.nama + '</b>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	});

	function paging(page) {
		getListFormPPI(page);
	}
</script>