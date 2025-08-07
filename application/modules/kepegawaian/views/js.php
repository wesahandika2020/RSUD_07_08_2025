<script>
	function MasterPegawai () {
		this.baseUrl = "<?= base_url('kepegawaian/api/kepegawaian/') ?>"
		this.tableElPegawai = $('#table-pegawai')
		this.tableElJabatan = $('#table-jabatan')
		this.tableElProfesi = $('#table-profesi')
		this.tableElTenagaMedis = $('#table-tenaga-medis')
		this.tableElUnitKerja = $('#table-unit-kerja')

		this.warpTambah = $('#warp-tambah-pegawai')
		this.warpEdit = $('#warp-edit-pegawai')
		this.warpMaster = $('#warp-master-pegawai')

		this.modalTambahJabatan = $('#modal-jabatan')
		this.modalEditJabatan = $('#modal-edit-jabatan')
		this.modalTambahProfesi = $('#modal-tambah-profesi')
		this.modalEditProfesi = $('#modal-edit-profesi')
		this.modalTambahNadis = $('#modal-tambah-nadis')
		this.modalEditNadis = $('#modal-edit-nadis')
		this.modalTambahUnitKerja = $('#modal-tambah-unit-kerja')
		this.modalEditUnitKerja = $('#modal-edit-unit-kerja')

		this.modalTambahSkKepangkatan = $('#modal-tambah-sk-kepangkatan')
		this.modalTambahDaftarSusunanKeluarga = $('#modal-tambah-daftar-susunan-keluarga')
		this.modalTambahRiwayatJabatanPegawai = $('#modal-tambah-riwayat-jabatan-pegawai')
		this.modelEditDaftarSusunanKeluarga = $('#modal-edit-daftar-susunan-keluarga')
		this.modelEditRiwayatJabatanPegawai = $('#modal-edit-riwayat-jabatan-pegawai')

		this.tbDaftarPegawai = this.tableDaftarPegawai()
		this.tbJabatanPegawai = this.tableJabatanPegawai()
		this.tbProfesiPegawai = this.tableProfesiPegawai()
		this.tbTenagaMedis = this.tableTenagaMedis()
		this.tbUnitKerja = this.tableUnitKerja()
		this.noSusunanKeluarga = 1
		this.noTambahJabatan = 1
		this.noTambahSkKepangkatan = 1
	}

	MasterPegawai.prototype.ajaxGet = function (url, data = {}) {
		return $.get(url, data)
	}

	MasterPegawai.prototype.ajaxPost = function (url, data) {
		return $.post(url, data)
	}

	MasterPegawai.prototype.ajaxCustom = function (options) {
		return $.ajax(options)
	}

	MasterPegawai.prototype.init = function () {
		this.events()
		this.loadEventPageTambah()
		this.pegawaiAuto()
		this.spesialisasiAuto()
		this.profesiPegawai()
		this.unitKerja()
		this.eselon()
	}

	MasterPegawai.prototype.loadEventPageTambah = function () {
		const intervalId = setInterval(() => {
			if ($('#warp-tambah-pegawai, #warp-edit-pegawai').length > 0) {
				this.tempatLahirPegawai()
				this.jabatanPegawai()
				this.profesiPegawai()
				this.unitKerja()
				this.pangkatGolongan()
				clearInterval(intervalId)
			}
		}, 200)
	}

	MasterPegawai.prototype.events = function () {
		const $this = this
		$this.warpMaster.on('click', '.btn-edit-pegawai', this.handleEditPegawai)
		$this.warpMaster.on('click', '.btn-delete-pegawai', function () {$this.handleDeletePegawai($(this))})
		$this.warpMaster.on('click', '.btn-edit-jabatan', function () {$this.handleEditJabatan($(this))})
		$this.warpMaster.on('click', '.btn-delete-jabatan', function () {$this.handleDeleteJabatan($(this))})
		$this.warpMaster.on('click', '.btn-edit-profesi', function () {$this.handleShowModalEditProfesi($(this))})
		$this.warpMaster.on('click', '.btn-delete-profesi', function () {$this.handleDeleteProfesi($(this))})
		$this.warpMaster.on('click', '.btn-edit-nadis', function () {$this.handleShowEditNadis($(this))})
		$this.warpMaster.on('click', '.btn-delete-nadis', function () {$this.handleDeleteNadis($(this))})
		$this.warpMaster.on('click', '.btn-delete-unit-kerja', function () {$this.handleDeleteUnitKerja($(this))})
		$this.warpMaster.on('click', '.btn-edit-unit-kerja', function () {$this.handleShowEditUnitKerja($(this))})
		$this.warpMaster.on('click', '.btn-detail-pegawai', $this.handleDetailPegawai)

		$this.warpTambah.on('click', '#btn-tambah-pegawai', () => $this.handleTambahPegawai())
		$this.warpTambah.on('change', '#foto, #foto-kk, #fc-sk', $this.handleFoto)
		$this.warpTambah.on('input', '#no-kk, #nik', $this.handleInputNoKK)
		$this.warpTambah.on('change', 'input[name=\'jenis_asn\']', $this.jenisAsn)
		$this.warpTambah.on('input', '#gaji-pokok', $this.handleMoneyInput)
		$this.warpTambah.on('click', '#tambah-susunan-keluarga', () => $this.handleOpenModalSusunanKeluarga())
		$this.warpTambah.on('click', '#btn-tambah-riwayat-jabatan', () => $this.handleOpenModalRiwayatJabatan())
		$this.warpTambah.on('click', '#btn-tambah-sk-kepangkatan', () => $this.handleOpenModalSkKepangkatan())

		$this.warpEdit.on('click', '#btn-update-pegawai', () => $this.handleUpdatePegawai())
		$this.warpEdit.on('change', '#foto, #foto-kk', $this.handleFoto)
		$this.warpEdit.on('change', 'input[name=\'jenis_asn\']', $this.jenisAsn)
		$this.warpEdit.on('input', '#gaji-pokok', $this.handleMoneyInput)
		$this.warpEdit.on('click', '.btn-delete-susunan-keluarga-delete', function () { $this.handleDeleteSusunanKeluarga($(this)) })
		$this.warpEdit.on('click', '.btn-delete-riwayat-jabatan-pegawai', function () { $this.handleDeleteRiwayatJabatanPegawai($(this)) })
		$this.warpEdit.on('click', '#tambah-susunan-keluarga', () => $this.handleOpenModalSusunanKeluarga())
		$this.warpEdit.on('click', '#btn-tambah-riwayat-jabatan', () => $this.handleOpenModalRiwayatJabatan())
		$this.warpEdit.on('click', '.btn-edit-susunan-keluarga', function () { $this.handleOpenModalEditSusunanKeluaraga($(this)) })
		$this.warpEdit.on('click', '#btn-tambah-riwayat-jabatan', () => $this.handleOpenModalRiwayatJabatan())
		$this.warpEdit.on('click', '.btn-edit-riwayat-jabatan-pegawai', function () { $this.handleOpenModalEditRiwayatJabatan($(this)) })

		$this.modelEditDaftarSusunanKeluarga.on('click', '#btn-edit-susunan-keluarga', () => $this.handleEditSusunanKeluaraga())
		$this.modelEditRiwayatJabatanPegawai.on('click', '#btn-edit-riwayat-jabatan-pegawai', () => $this.handleEditRiwayatJabatanPegawai())

		$this.modalTambahJabatan.on('click', '#btn-tambah-jabatan', () => $this.handleTambahJabatan())
		$this.modalEditJabatan.on('click', '#btn-edit-jabatan', () => $this.handleSimpanEditJabatan())

		$this.modalTambahProfesi.on('click', '#btn-tambah-profesi', () => $this.handleSimpanProfesi())
		$this.modalEditProfesi.on('click', '#btn-edit-profesi', () => $this.handleSimpanEditProfesi())

		$this.modalTambahNadis.on('click', '#btn-tambah-nadis', () => $this.handleSimpanNadis())
		$this.modalEditNadis.on('click', '#btn-simpan-edit-nadis', () => $this.handleSimpanEditNadis())

		$this.modalTambahDaftarSusunanKeluarga.on('input', '#nik-keluarga', $this.handleInputNoKK)
		$this.modalTambahDaftarSusunanKeluarga.on('change', '#jenis-pekerjaan-keluarga', $this.handleChangeJenisPekerjaan)
		$this.modalTambahDaftarSusunanKeluarga.on('click', '#btn-tambah-susunan-keluarga', () => $this.handleTambahSusunanKeluarga())

		$('#table-susunan-keluarga').on('click', '.btn-delete-susunan-keluarga', function () {$this.handleRemoveList($(this))})
		$('#table-riwayat-jabatan').on('click', '.btn-delete-riwayat-jabatan', function () {$this.handleRemoveList($(this))})

		$this.modalTambahRiwayatJabatanPegawai.on('change', '#fc-sk-jabatan', $this.handleFoto)
		$this.modalTambahRiwayatJabatanPegawai.on('click', '#btn-tambah-riwayat-jabatan-pegawai', () => $this.handleTambahRiwayatJabatanPegawai())

		$this.modalTambahSkKepangkatan.on('change', '#fc-sk-kepangkatan', $this.handleFoto)
		$this.modalTambahSkKepangkatan.on('click', '#btn-tambah-sk-kepangkatan-pegawai', () => $this.handleTambahSkKepangkatan())

		$('#table-sk-kepangkatan').on('click', '.btn-delete-riwayat-jabatan', function () {$this.handleRemoveList($(this))})

		$this.modalTambahUnitKerja.on('click', '#btn-tambah-unit-kerja', () => $this.handleTambahUnitKerja())
		$this.modalEditUnitKerja.on('click', '#btn-edit-unit-kerja', () => $this.handleEditUnitKerja())
	}

	MasterPegawai.prototype.tableDaftarPegawai = function () {
		const options = {
			responsive: true,
			serverSide: true,
			dom: '<"my-table-header"fBl>t<"my-table-footer"ip>',
			buttons: {
				buttons: [
					{
						text: `<i class="fas fa-plus-square"></i> Tambah Pegawai`,
						className: 'btn-info mr-2  waves-effect waves-light',
						action: () => {
							loadMenu('kepegawaian/tambah_pegawai', 'Kepegawaian', '', 'Tambah Pegawai')
							this.loadEventPageTambah()
						},
					},
				],
				dom: {
					button: {
						className: 'btn',
					},
					buttonLiner: {
						tag: null,
					},
				},
			},
			order: [[3, 'asc']],
			ajax: {
				url: this.baseUrl + 'data_pegawai',
				// success: function (d) {
				// 	console.log(d)
				// }
			},
			columns: [
				{
					orderable: false, searchable: false, render: function (nTd, sData, oData, iRow, iCol) {
						return iRow.row + iRow.settings._iDisplayStart + 1
					},
				},
				{
					data: 'profil', name: 'Foto Profil', render: function (nTd, sData, oData, iRow, iCol) {
						const urlResurce = "<?= resource_url().'images/avatars/' ?>"
						const img = oData.profil ? `<img src="${urlResurce + oData.profil}" alt="pas foto"  width="150" height="150"/>` : '-'
						return img
					},
				},
				{
					orderable: false,
					render: function (nTd, sData, oData, iRow, iCol) {
						return `
						<div style="display: flex; flex-direction: column">
							<b>${oData.nama} (${oData.kelamin})</b>
							<div>${oData.tempat_lahir ?? '-'}, ${oData.tgl_lahir ?? '-'} <b>(${oData.nik ?? '-'})</b></div>
							<span>${oData.nip ?? '-'}</span>
							<span>${oData.tmt ?? '-'}</span>
						</div>
						`
					},
				},
				{ data: 'nama', name: 'nama', orderable: false },
				{
					render: function (nTd, sData, oData, iRow, iCol) {
						return `
							<button class="btn btn-success btn-xs waves-effect waves-light btn-detail-pegawai" data="${oData.id}"><i class="fas fa-eye mr-1"></i>detail</button>
							<button class="btn btn-info btn-xs waves-effect waves-light btn-edit-pegawai" data="${oData.id}"><i class="fas fa-edit mr-1"></i>edit</button>
							<button class="btn btn-danger btn-xs waves-effect waves-light btn-delete-pegawai" data="${oData.id}"><i class="fas fa-trash mr-1"></i>delete</button>`
					},
				},
			],
		}

		return this.tableElPegawai.dataTable(options)
	}

	MasterPegawai.prototype.tableJabatanPegawai = function () {
		const options = {
			responsive: true,
			serverSide: true,
			dom: '<"my-table-header"fBl>t<"my-table-footer"ip>',
			buttons: {
				buttons: [
					{
						text: `<i class="fas fa-plus-square"></i> Tambah Jabatan`,
						className: 'btn-info mr-2  waves-effect waves-light',
						action: () => {
							$('#formjabatan')[0].reset()
							$('#modal-jabatan-label').html('Tambah Jabatan')
							this.modalTambahJabatan.modal('show').find('#modal-edit-jabatan-label').html('Tambah Jabatan')
						},
					},
				],
				dom: {
					button: {
						className: 'btn',
					},
					buttonLiner: {
						tag: null,
					},
				},
			},
			order: [[1, 'asc']],
			ajax: {
				url: this.baseUrl + 'data_jabatan',
			},
			columns: [
				{
					orderable: false, searchable: false, render: function (nTd, sData, oData, iRow, iCol) {
						return iRow.row + iRow.settings._iDisplayStart + 1
					},
				},
				{ data: 'nama', name: 'nama' },
				{
					render: function (nTd, sData, oData, iRow, iCol) {
						return `<button class="btn btn-info btn-xs waves-effect waves-light btn-edit-jabatan" data='${JSON.stringify(
							oData)}'><i class="fas fa-edit"></i>edit</button><button class="btn btn-danger btn-xs waves-effect waves-light btn-delete-jabatan" data="${oData.id}"><i class="fas fa-trash"></i>delete</button>`
					},
				},
			],
		}

		return this.tableElJabatan.dataTable(options)
	}

	MasterPegawai.prototype.tableProfesiPegawai = function () {
		const options = {
			responsive: true,
			serverSide: true,
			dom: '<"my-table-header"fBl>t<"my-table-footer"ip>',
			buttons: {
				buttons: [
					{
						text: `<i class="fas fa-plus-square"></i> Tambah Profesi`,
						className: 'btn-info mr-2  waves-effect waves-light',
						action: () => {
							$('#form-tambah-profesi')[0].reset()
							$('#modal-tambah-profesi-label').html('Tambah Profesi')
							this.modalTambahProfesi.modal('show')
						},
					},
				],
				dom: {
					button: {
						className: 'btn',
					},
					buttonLiner: {
						tag: null,
					},
				},
			},
			order: [[1, 'asc']],
			ajax: {
				url: this.baseUrl + 'data_profesi',
			},
			columns: [
				{
					orderable: false, searchable: false, render: function (nTd, sData, oData, iRow, iCol) {
						return iRow.row + iRow.settings._iDisplayStart + 1
					},
				},
				{ data: 'nama', name: 'nama' },
				{
					render: function (nTd, sData, oData, iRow, iCol) {
						return `<button class="btn btn-info btn-xs waves-effect waves-light btn-edit-profesi" data='${JSON.stringify(
							oData)}'><i class="fas fa-edit"></i>edit</button><button class="btn btn-danger btn-xs waves-effect waves-light btn-delete-profesi" data="${oData.id}"><i class="fas fa-trash"></i>delete</button>`
					},
				},
			],
		}

		return this.tableElProfesi.dataTable(options)
	}

	MasterPegawai.prototype.tableTenagaMedis = function () {
		const options = {
			responsive: true,
			serverSide: true,
			dom: '<"my-table-header"fBl>t<"my-table-footer"ip>',
			buttons: {
				buttons: [
					{
						text: `<i class="fas fa-plus-square"></i> Tambah Tenaga Medis`,
						className: 'btn-info mr-2  waves-effect waves-light',
						action: () => {
							$('#form-tenaga-medis')[0].reset()
							$('#modal-tambah-nadis-label').html('Tambah Tenaga Medis')
							this.modalTambahNadis.modal('show')
						},
					},
				],
				dom: {
					button: {
						className: 'btn',
					},
					buttonLiner: {
						tag: null,
					},
				},
			},
			order: [[1, 'asc']],
			ajax: {
				url: this.baseUrl + 'data_tenaga_medis',
			},
			columns: [
				{
					orderable: false, searchable: false, render: function (nTd, sData, oData, iRow, iCol) {
						return iRow.row + iRow.settings._iDisplayStart + 1
					},
				},
				{ data: 'nama', name: 'nama' },
				{ data: 'profesi', name: 'profesi' },
				{ data: 'spesialisasi', name: 'spesialisasi' },
				{
					data: 'tgl_mulai_praktek', name: 'Tanggal Mulai Praktek', render: function (nTd, sData, oData, iRow, iCol) {
						return datefmysql(oData.tgl_mulai_praktek)
					},
				},
				{ data: 'kode_bpjs', name: 'Kode BPJS' },
				{
					render: function (nTd, sData, oData, iRow, iCol) {
						return `<button class="btn btn-info btn-xs waves-effect waves-light btn-edit-nadis" data='${JSON.stringify(
							oData)}'><i class="fas fa-edit"></i>edit</button><button class="btn btn-danger btn-xs waves-effect waves-light btn-delete-nadis" data="${oData.id}"><i class="fas fa-trash"></i>delete</button>`
					},
				},
			],
		}

		return this.tableElTenagaMedis.dataTable(options)
	}

	MasterPegawai.prototype.tableUnitKerja = function () {
		const options = {
			responsive: true,
			serverSide: true,
			dom: '<"my-table-header"fBl>t<"my-table-footer"ip>',
			buttons: {
				buttons: [
					{
						text: `<i class="fas fa-plus-square"></i> Tambah Unit Kerja`,
						className: 'btn-info mr-2  waves-effect waves-light',
						action: () => {
							$('#form-tambah-unit-kerja')[0].reset()
							$('#modal-tambah-unit-kerja-label').html('Tambah Unit Kerja')
							$('#s2id_unit-parent a .select2-chosen').html('Silahkan Pilih Unit Kerja')
							$('#s2id_eselon a .select2-chosen').html('Silahkan Pilih Eselon')
							this.modalTambahUnitKerja.modal('show')
						},
					},
				],
				dom: {
					button: {
						className: 'btn',
					},
					buttonLiner: {
						tag: null,
					},
				},
			},
			order: [[1, 'asc']],
			ajax: {
				url: this.baseUrl + 'data_unit_kerja',
			},
			columns: [
				{
					orderable: false, searchable: false, render: function (nTd, sData, oData, iRow, iCol) {
						return iRow.row + iRow.settings._iDisplayStart + 1
					},
				},
				{ data: 'kode', name: 'kode' },
				{ data: 'upt', name: 'upt' },
				{ data: 'nama', name: 'nama' },
				{ data: 'eselon', name: 'eselon' },
				{
					render: function (nTd, sData, oData, iRow, iCol) {
						return `<button class="btn btn-info btn-xs waves-effect waves-light btn-edit-unit-kerja" data='${JSON.stringify(
							oData)}'><i class="fas fa-edit"></i>edit</button><button class="btn btn-danger btn-xs waves-effect waves-light btn-delete-unit-kerja" data="${oData.id}"><i class="fas fa-trash"></i>delete</button>`
					},
				},
			],
		}

		return this.tableElUnitKerja.dataTable(options)
	}

	MasterPegawai.prototype.tempatLahirPegawai = function () {
		$('#tmp-lahir-pegawai, #tempat-lahir-keluarga, #tempat-lahir-keluarga-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih tempat lahir',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/kotakabupaten_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.provinsi + '</i>'
				return markup
			},
			formatSelection: function (data) {
				return data.nama + ', ' + data.provinsi
			},
		})
	}

	MasterPegawai.prototype.jabatanPegawai = function () {
		$('#jabatan-pegawai').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih jabatan pegawai',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/jabatan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				var markup = data.nama
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})
	}

	MasterPegawai.prototype.profesiPegawai = function () {
		$('#profesi-pegawai-auto, #profesi-auto, #profesi-auto-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih profesi pegawai',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/profesi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				var markup = data.nama
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})
	}

	MasterPegawai.prototype.handleTambahPegawai = async function () {
		if ($('#nama').val() === '') {
			$('#nama').focus()
			syams_validation('#nama', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama')
		}

		if ($('#tmp-lahir-pegawai').val() === '') {
			$('#tmp-lahir-pegawai').focus()
			syams_validation('#tmp-lahir-pegawai', 'Tempat lahir tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tmp-lahir-pegawai')
		}

		if ($('#tgl-lahir').val() === '') {
			$('#tgl-lahir').focus()
			syams_validation('#tgl-lahir', 'tanggal lahir tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tgl-lahir')
		}

		if ($('#jenis-kelamin').val() === '') {
			$('#jenis-kelamin').focus()
			syams_validation('#jenis-kelamin', 'jenis kelamin tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#jenis-kelamin')
		}

		if ($('#profesi-pegawai-auto').val() === '') {
			$('#profesi-pegawai-auto').focus()
			syams_validation('#profesi-pegawai-auto', 'profesi tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#profesi-pegawai-auto')
		}

		if ($('#jabatan-pegawai').val() === '') {
			$('#jabatan-pegawai').focus()
			syams_validation('#jabatan-pegawai', 'jabatan pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#jabatan-pegawai')
		}

		const url = this.baseUrl + 'simpan_pegawai'

		const formData = new FormData()

		const $forms = $('#form-tambah-pegawai')

		$forms.find(':input').each(function () {
			const $input = $(this)

			if ($input.attr('type') === 'file') {
				formData.append($input.attr('name'), $input.prop('files')[0])
			}

			if ($input.attr('type') === 'radio' && $input.is(':checked')) {
				formData.append($input.attr('name'), $input.val())
			}

			if ($input.attr('type') !== 'radio') {
				formData.append($input.attr('name'), $input.val())
			}
		})

		const options = {
			type: 'POST',
			url,
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
		}

		try {

			showLoader()
			const response = await this.ajaxCustom(options)
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/page_pegawai', 'Kepegawaian', '', 'Master Pegawai')
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleFoto = function () {
		const $this = $(this)
		const file = $(this).prop('files')[0]

		if (file.size > 1000000) {
			syams_validation($(this).parent().parent(), 'File yang diunggah terlalu besar ! | Maximal gambar 1 MB')
			return
		}
		else {
			syams_validation_remove($(this).parent().parent())
		}

		readURL(this)

		$this.siblings().html(file.name)
	}

	MasterPegawai.prototype.handleEditPegawai = async function () {
		const id = $(this).attr('data')
		loadMenu('kepegawaian/edit_pegawai/' + id, 'Kepegawaian', '', 'Edit Pegawai')
	}

	MasterPegawai.prototype.handleUpdatePegawai = async function () {
		if ($('#nama').val() === '') {
			$('#nama').focus()
			syams_validation('#nama', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama')
		}

		if ($('#tmp-lahir-pegawai').val() === '') {
			$('#tmp-lahir-pegawai').focus()
			syams_validation('#tmp-lahir-pegawai', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tmp-lahir-pegawai')
		}

		if ($('#tgl-lahir').val() === '') {
			$('#tgl-lahir').focus()
			syams_validation('#tgl-lahir', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tgl-lahir')
		}

		if ($('#jenis-kelamin').val() === '') {
			$('#jenis-kelamin').focus()
			syams_validation('#jenis-kelamin', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#jenis-kelamin')
		}

		if ($('#profesi-pegawai-auto').val() === '') {
			$('#profesi-pegawai-auto').focus()
			syams_validation('#profesi-pegawai-auto', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#profesi-pegawai-auto')
		}

		if ($('#jabatan-pegawai').val() === '') {
			$('#jabatan-pegawai').focus()
			syams_validation('#jabatan-pegawai', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#jabatan-pegawai')
		}

		const url = this.baseUrl + 'update_pegawai'

		const formData = new FormData()

		const $forms = $('#form-edit-pegawai')

		$forms.find(':input').each(function () {
			const $input = $(this)

			if ($input.attr('type') === 'file') {
				formData.append($input.attr('name'), $input.prop('files')[0])
			}

			if ($input.attr('type') === 'radio' && $input.is(':checked')) {
				formData.append($input.attr('name'), $input.val())
			}

			if ($input.attr('type') !== 'radio') {
				formData.append($input.attr('name'), $input.val())
			}
		})

		const options = {
			type: 'POST',
			url,
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
		}

		try {
			showLoader()
			const response = await this.ajaxCustom(options)
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/page_pegawai', 'Kepegawaian', '', 'Master Pegawai')
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleDeletePegawai = async function (el) {
		const alert = await swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda ingin menghapus pegawai ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> Hapus',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		})

		if (!alert.value) {
			return
		}

		const id = el.attr('data')
		const url = this.baseUrl + 'delete_pegawai'

		try {
			showLoader()
			const response = await this.ajaxPost(url, { id })
			messageCustom(response.message, 'Success')
			this.tbDaftarPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleTambahJabatan = async function () {
		if ($('#nama-jabatan').val() === '') {
			syams_validation('#nama-jabatan', 'Nama jabatan tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama-jabatan')
		}

		const url = this.baseUrl + 'simpan_jabatan'

		try {

			showLoader()
			const response = await this.ajaxPost(url, $('#formjabatan').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-jabatan').modal('hide')
			this.tbJabatanPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleEditJabatan = function (obj) {
		$('#formeditjabatan')[0].reset()
		const { id, nama } = JSON.parse(obj.attr('data'))

		$('#id-edit-jabatan').val(id)
		$('#nama-edit-jabatan').val(nama)
		$('#modal-edit-jabatan-label').html('Edit Jabatan')
		$('#btn-tambah-jabatan').html(`<i class="fas fa-save"></i> Update`)

		this.modalEditJabatan.modal('show')
	}

	MasterPegawai.prototype.handleSimpanEditJabatan = async function () {
		if ($('#nama-edit-jabatan').val() === '') {
			syams_validation('#nama-edit-jabatan', 'Nama jabatan tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama-edit-jabatan')
		}

		const url = this.baseUrl + 'update_jabatan'

		try {

			showLoader()
			const response = await this.ajaxPost(url, $('#formeditjabatan').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-edit-jabatan').modal('hide')
			this.tbJabatanPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleDeleteJabatan = async function (el) {
		const alert = await swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda ingin menghapus jabatan ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> Hapus',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		})

		if (!alert.value) {
			return
		}

		const id = el.attr('data')
		const url = this.baseUrl + 'delete_jabatan'

		try {
			showLoader()
			const response = await this.ajaxPost(url, { id })
			messageCustom(response.message, 'Success')
			this.tbJabatanPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleSimpanProfesi = async function () {
		if ($('#nama-profesi').val() === '') {
			syams_validation('#nama-profesi', 'Nama profesi tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama-profesi')
		}

		const url = this.baseUrl + 'simpan_profesi'

		try {
			showLoader()
			const response = await this.ajaxPost(url, $('#form-tambah-profesi').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-tambah-profesi').modal('hide')
			this.tbProfesiPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleSimpanEditProfesi = async function () {
		if ($('#nama-edit-profesi').val() === '') {
			syams_validation('#nama-edit-profesi', 'Nama profesi tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#nama-edit-profesi')
		}

		const url = this.baseUrl + 'update_profesi'

		try {
			showLoader()
			const response = await this.ajaxPost(url, $('#form-edit-profesi').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-edit-profesi').modal('hide')
			this.tbProfesiPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleShowModalEditProfesi = function (obj) {
		$('#formeditjabatan')[0].reset()
		const { id, nama } = JSON.parse(obj.attr('data'))

		$('#id-profesi').val(id)
		$('#nama-edit-profesi').val(nama)
		$('#modal-edit-profesi-label').html('Edit Profesi')

		this.modalEditProfesi.modal('show')
	}

	MasterPegawai.prototype.handleDeleteProfesi = async function (el) {
		const alert = await swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda ingin menghapus jabatan ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> Hapus',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		})

		if (!alert.value) {
			return
		}

		const id = el.attr('data')
		const url = this.baseUrl + 'delete_profesi'

		try {
			showLoader()
			const response = await this.ajaxPost(url, { id })
			messageCustom(response.message, 'Success')
			this.tbProfesiPegawai.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.pegawaiAuto = function () {
		$('#pegawai-auto, #pegawai-auto-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih spesialisasi',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/pegawai_nadis_auto') ?>",
				placeholder: 'Silahkan pilih pegawai',
				dataType: 'json',
				dropdownParent: $('#modal-tambah-nadis'),
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				var markup = data.nama + '<br/><i>' + ((data.jabatan !== null) ? data.jabatan : '') + '</i>'
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})
	}

	MasterPegawai.prototype.spesialisasiAuto = function () {
		$('#spesialisasi-auto, #spesialisasi-auto-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih spesialisasi',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				var markup = data.nama
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})
	}

	MasterPegawai.prototype.handleSimpanNadis = async function () {
		if ($('#pegawai-auto').val() === '') {
			syams_validation('#pegawai-auto', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#pegawai-auto')
		}

		if ($('#profesi-auto').val() === '') {
			syams_validation('#profesi-auto', 'Profesi pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#profesi-auto')
		}

		if ($('#tgl-mulai-praktek').val() === '') {
			syams_validation('#tgl-mulai-praktek', 'Tanggal praktek tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tgl-mulai-praktek')
		}

		const url = this.baseUrl + 'simpan_nadis'

		try {

			showLoader()
			const response = await this.ajaxPost(url, $('#form-tenaga-medis').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-tambah-nadis').modal('hide')
			this.tbTenagaMedis.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleShowEditNadis = function (obj) {
		$('#form-edit-tenaga-medis')[0].reset()
		const data = JSON.parse(obj.attr('data'))

		$('#id-nadis').val(data.id)
		$('#modal-edit-nadis-label').html('Edit Tenaga Medis')

		$('#s2id_pegawai-auto-edit a .select2-chosen').html(data.nama)
		$('#pegawai-auto-edit').val(data.id_pegawai)
		$('#s2id_profesi-auto-edit a .select2-chosen').html(data.profesi)
		$('#profesi-auto-edit').val(data.id_profesi)
		$('#s2id_spesialisasi-auto-edit a .select2-chosen').html(data.spesialisasi ?? '-')
		$('#spesialisasi-auto-edit').val(data.id_spesialisasi)
		$('#tgl-mulai-praktek-edit').val(data.tgl_mulai_praktek)
		$('#kode-bpjs-edit').val(data.kode_bpjs)
		$('#no-str-edit').val(data.nostr)
		$('#masb-nostr-edit').val(data.ed_no_str)
		$('#no-sip-edit').val(data.no_sip)
		$('#masb-nostr-edit').val(data.ed_no_sip)
		$('#no-sik-edit').val(data.no_sik)
		$('#masb-nosik-edit').val(data.ed_no_sik)

		$('#btn-tambah-jabatan').html(`<i class="fas fa-save"></i> Update`)

		this.modalEditNadis.modal('show')
	}

	MasterPegawai.prototype.handleSimpanEditNadis = async function () {
		if ($('#pegawai-auto-edit').val() === '') {
			syams_validation('#pegawai-auto', 'Nama pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#pegawai-auto')
		}

		if ($('#profesi-auto-edit').val() === '') {
			syams_validation('#profesi-auto', 'Profesi pegawai tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#profesi-auto')
		}

		if ($('#tgl-mulai-praktek-edit').val() === '') {
			syams_validation('#tgl-mulai-praktek', 'Tanggal praktek tidak boleh kosong')
			return
		}
		else {
			syams_validation_remove('#tgl-mulai-praktek')
		}

		const url = this.baseUrl + 'update_nadis'

		try {
			showLoader()
			const response = await this.ajaxPost(url, $('#form-edit-tenaga-medis').serialize())
			messageCustom(response.message, 'Success')
			$('#modal-edit-nadis').modal('hide')
			this.tbTenagaMedis.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleDeleteNadis = async function (el) {
		const alert = await swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda ingin menghapus tenaga medis ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> Hapus',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		})

		if (!alert.value) {
			return
		}

		const id = el.attr('data')
		const url = this.baseUrl + 'delete_nadis'

		try {
			showLoader()
			const response = await this.ajaxPost(url, { id })
			messageCustom(response.message, 'Success')
			this.tbTenagaMedis.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleInputNoKK = function () {
		$(this).val($(this).val().slice(0, 16))
	}

	MasterPegawai.prototype.jenisAsn = function () {
		const val = $(this).val()
		const tmt = $('#tmt')
		const golonganP3K = $('#golongan-pppk')
		const gajiPokok = $('#gaji-pokok')
		const noSk = $('#no-sk')
		const tglSk = $('#tgl-sk')
		const pejabatPenetap = $('#pejabat-penetap')
		const fcSk = $('#fc-sk')
		const tahun = $('#tahun')
		const bulan = $('#bulan')
		const formSkKepangkatan = $('#form-sk-kepangkatan')
		const akhirMasaKerja = $('#akhir-masa-kerja')

		tmt.val('').siblings().html('').parent().addClass('hide')
		golonganP3K.val('').parent().addClass('hide')
		gajiPokok.val('').parent().addClass('hide')
		noSk.val('').parent().addClass('hide')
		tglSk.val('').parent().addClass('hide')
		pejabatPenetap.val('').parent().addClass('hide')
		fcSk.val('').parent().siblings().html('').parent().addClass('hide')
		tahun.val('').parent().parent().addClass('hide')
		bulan.val('').parent().parent().addClass('hide')
		akhirMasaKerja.val('').parent().addClass('hide')
		formSkKepangkatan.hide()

		if (val === 'pns') {
			tmt.siblings().html('TMT PNS').parent().removeClass('hide')
			noSk.parent().removeClass('hide')
			tglSk.parent().removeClass('hide')
			pejabatPenetap.parent().removeClass('hide')
			fcSk.parent().siblings().html('FC. SK PNS').parent().removeClass('hide')
			formSkKepangkatan.show()
		}
		if (val === 'cpns') {
			tmt.siblings().html('TMT CPNS').parent().removeClass('hide')
			noSk.parent().removeClass('hide')
			tglSk.parent().removeClass('hide')
			pejabatPenetap.parent().removeClass('hide')
			fcSk.parent().siblings().html('FC. SK CPNS').parent().removeClass('hide')
			tahun.parent().parent().removeClass('hide')
			bulan.parent().parent().removeClass('hide')
			formSkKepangkatan.show()
		}
		if (val === 'pppk') {
			tmt.siblings().html('TMT PPPK').parent().removeClass('hide')
			golonganP3K.prop('selectedIndex', 0).parent().removeClass('hide')
			gajiPokok.parent().removeClass('hide')
			noSk.parent().removeClass('hide')
			tglSk.parent().removeClass('hide')
			pejabatPenetap.parent().removeClass('hide')
			fcSk.parent().siblings().html('FC. SK PPPK').parent().removeClass('hide')
			formSkKepangkatan.show()
		}
		if (val === 'tkk') {
			tmt.siblings().html('TMT TKK').parent().removeClass('hide')
			noSk.parent().removeClass('hide')
			tglSk.parent().removeClass('hide')
			pejabatPenetap.parent().removeClass('hide')
			fcSk.parent().siblings().html('FC. SK TKK').parent().removeClass('hide')
			formSkKepangkatan.hide()
		}

		akhirMasaKerja.parent().removeClass('hide')
	}

	MasterPegawai.prototype.handleMoneyInput = function () {
		let value = $(this).val()
		value = value.replace(/\D/g, '')
		value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.')
		$(this).val(value)
	}

	MasterPegawai.prototype.handleOpenModalSusunanKeluarga = function () {
		this.modalTambahDaftarSusunanKeluarga.modal('show').find('h4').html('Tambah Susunan Keluarga')
	}

	MasterPegawai.prototype.handleChangeJenisPekerjaan = function () {
		if ($(this).val() === 'lainnya') {
			$('#jenis-pekerjaan-keluarga-lainnya').parent().show()
		}
		else {
			$('#jenis-pekerjaan-keluarga-lainnya').parent().hide()
		}
	}

	MasterPegawai.prototype.handleTambahSusunanKeluarga = function () {
		const namaLengkap = $('#nama-lengkap').val()
		const nikKeluarga = $('#nik-keluarga').val()
		const jenisKelaminKeluarga = $('#jenis-kelamin-keluarga').val()
		const tempatLahirKeluarga = $('#tempat-lahir-keluarga').val()
		const namaTempatLahirKeluarga = $('#s2id_tempat-lahir-keluarga a .select2-chosen').html()
		const tanggalLahirKeluarga = $('#tanggal-lahir-keluarga').val()
		const pendidikanKeluarga = $('#pendidikan-keluarga').val()
		const jenisPekerjaanKeluarga = $('#jenis-pekerjaan-keluarga').val()
		const jenisPekerjaanLainnya = $('#jenis-pekerjaan-keluarga-lainnya').val()
		const html = `<tr>
			<td>${this.noSusunanKeluarga++}</td>
			<td>${namaLengkap}</td>
			<td class="center">${nikKeluarga}</td>
			<td class="center">${jenisKelaminKeluarga}</td>
			<td class="center">${namaTempatLahirKeluarga}, ${tanggalLahirKeluarga}</td>
			<td>${pendidikanKeluarga}</td>
			<td>
				${jenisPekerjaanKeluarga !== 'lainnya' ? jenisPekerjaanKeluarga : jenisPekerjaanLainnya}
				<input type="hidden" name="nomor_susunan_keluarga[]" value="${this.noSusunanKeluarga}">
				<input type="hidden" name="nama_lengkap[]" value="${namaLengkap}">
				<input type="hidden" name="nik_keluarga[]" value="${nikKeluarga}">
				<input type="hidden" name="jenis_kelamin_keluarga[]" value="${jenisKelaminKeluarga}">
				<input type="hidden" name="tempat_lahir_keluarga[]" value="${tempatLahirKeluarga}">
				<input type="hidden" name="tgl_lahir_keluarga[]" value="${tanggalLahirKeluarga}">
				<input type="hidden" name="pendidikan_keluarga[]" value="${pendidikanKeluarga}">
				<input type="hidden" name="jenis_pekerjaan_keluarga[]" value="${jenisPekerjaanKeluarga !== 'lainnya' ? jenisPekerjaanKeluarga : jenisPekerjaanLainnya}">
			</td>
			<td class="center"><button type="button" class="btn btn-danger btn-xxs btn-delete-susunan-keluarga"><i class="fas fa-trash-alt"></i></button></td>
		</tr>`

		$('#table-susunan-keluarga tbody').append(html)
		this.modalTambahDaftarSusunanKeluarga.modal('hide')
	}

	MasterPegawai.prototype.handleRemoveList = function (el) {
		el.parent().parent().remove()
		this.noSusunanKeluarga--
	}

	MasterPegawai.prototype.handleDeleteSusunanKeluarga = async function (el) {
		const { id_kk_detail, id_pegawai } = JSON.parse(el.attr('data'))

		const url = this.baseUrl + 'delete_susunan_keluarga'

		try {
			const response = await this.ajaxPost(url, { id: id_kk_detail })
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/edit_pegawai/' + id_pegawai, 'Kepegawaian', '', 'Edit Pegawai')
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
	}

	MasterPegawai.prototype.handleOpenModalRiwayatJabatan = function () {
		this.modalTambahRiwayatJabatanPegawai.modal('show').find('h4').html('Tambah Riwayat Jabatan Pegawai')
	}

	MasterPegawai.prototype.unitKerja = function () {
		$('#unit-kerja, #unit-kerja-edit, #unit-parent, #unit-parent-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih Unit Kerja',
			ajax: {
				url: "<?= base_url('kepegawaian/api/kepegawaian/unit_kerja_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				return `
				<b>${data.kode}</b><br>
				${data.upt}<br>
				${data.eselon}<br>
				${data.nama}<br>
				`
			},
			formatSelection: function (data) {
				$('#data-unit-kerja').val(JSON.stringify(data))

				return data.nama
			},
		})
	}

	MasterPegawai.prototype.handleTambahRiwayatJabatanPegawai = function () {
		const tmt = $('#tmt-jabatan').val()
		const unitKerja = $('#unit-kerja').val()
		const noSkJabatan = $('#no-sk-jabatan').val()
		const tglSkJabatan = $('#tgl-sk-jabatan').val()
		const pendandatanganSK = $('#penandatangan-sk-jabatan').val()
		const jenisJabatan = $('#jenis-jabatan-jabatan').val()
		const jabatan = $('#jabatan-jabatan').val()
		const jenjangJabatan = $('#Jenjang-jabatan-jabatan').val()
		const tugasTambahan = $('#tugas-tambahan-jabatan').val()
		const previewFoto = $('#preview-fc-sk-jabatan').attr('src')
		const dataUnitKerja = JSON.parse($('#data-unit-kerja').val())

		const file = $('#fc-sk-jabatan').prop('files')

		const html = `<tr>
			<td>${this.noTambahJabatan++}</td>
			<td><img class="preview" src="${previewFoto}" alt="Preview Gambar" width="350"></td>
			<td>${tmt}</td>
			<td>
				<span>${dataUnitKerja.upt}</span>
				<span>pada:</span>
				<span>${dataUnitKerja.nama}</span>
			</td>
			<td>
				<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
					<span>No. SK</span>
					<span>:</span>
					<span>${noSkJabatan}</span>

					<span>Tanggal SK</span>
					<span>:</span>
					<span>${tglSkJabatan}</span>

					<span>Penandatangan SK</span>
					<span>:</span>
					<span>${pendandatanganSK}</span>
				</div>
				<hr style="border: dashed 1px gray">
				<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
					<span>Jenis jabatan</span>
					<span>:</span>
					<span>${jenisJabatan}</span>

					<span>Jabatan</span>
					<span>:</span>
					<span>${jabatan}</span>

					<span>Jenjang Jabatan</span>
					<span>:</span>
					<span>${jenjangJabatan}</span>

					<span>Tugas Tambahan</span>
					<span>:</span>
					<span>${tugasTambahan}</span>
				</div>
			</td>
			<td class="center">
				<button type="button" class="btn btn-danger btn-xxs btn-delete-sk-kepangkatan"><i class="fas fa-trash-alt"></i></button>
				<input type="hidden" name="nomor_tambah_jabatan[]" value="${this.noTambahJabatan}">
				<input type="hidden" name="tmt_jabatan[]" value="${tmt}">
				<input type="hidden" name="unit_kerja[]" value="${unitKerja}">
				<input type="hidden" name="no_sk_jabatan[]" value="${noSkJabatan}">
				<input type="hidden" name="tgl_sk_jabatan[]" value="${tglSkJabatan}">
				<input type="hidden" name="penandatangan_sk[]" value="${pendandatanganSK}">
				<input type="hidden" name="jenis_jabatan[]" value="${jenisJabatan}">
				<input type="hidden" name="jabatan_jabatan[]" value="${jabatan}">
				<input type="hidden" name="jenjang_jabatan[]" value="${jenjangJabatan}">
				<input type="hidden" name="tugas_tambahan_jabatan[]" value="${tugasTambahan}">
				<input type="file" name="fc_sk_jabatan[]" hidden id="fc-sk-jabatan${this.noTambahJabatan}">
			</td>
		</tr>`

		$('#table-riwayat-jabatan tbody').append(html)
		$(`#fc-sk-jabatan${this.noTambahJabatan}`).prop('files', file)
		this.modalTambahRiwayatJabatanPegawai.modal('hide')
	}

	MasterPegawai.prototype.pangkatGolongan = function () {
		$('#pangkat-golongan').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih Pangkat / Golongan',
			ajax: {
				url: "<?= base_url('kepegawaian/api/kepegawaian/pangkat_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				return `${data.kode_golongan}/${data.kode_pangkat}, ${data.nama_pangkat}`
			},
			formatSelection: function (data) {
				return `${data.kode_golongan}/${data.kode_pangkat}, ${data.nama_pangkat}`
			},
		})
	}

	MasterPegawai.prototype.handleDeleteRiwayatJabatanPegawai = async function (el) {
		const { id_riwayat_jabatan, id_pegawai } = JSON.parse(el.attr('data'))

		const url = this.baseUrl + 'delete_riwayat_jabatan_pegawai'

		try {
			const response = await this.ajaxPost(url, { id: id_riwayat_jabatan })
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/edit_pegawai/' + id_pegawai, 'Kepegawaian', '', 'Edit Pegawai')
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
	}

	MasterPegawai.prototype.handleOpenModalEditSusunanKeluaraga = function (el) {
		const data = JSON.parse(el.attr('data'))

		this.modelEditDaftarSusunanKeluarga.modal('show').find('h4').html('Edit Susunan Keluarga')

		$('#nama-lengkap-edit').val(data.nama_lengkap)
		$('#nik-keluarga-edit').val(data.nik)
		$(`#jenis-kelamin-keluarga-edit`).val(data.jenis_kelamin)
		$(`#tempat-lahir-keluarga-edit`).val(data.tempat_lahir)
		$('#tanggal-lahir-keluarga-edit').val(data.tgl_lahir)
		$('#pendidikan-keluarga-edit').val(data.pendidikan)
		$('#jenis-pekerjaan-keluarga-edit').val(data.jenis_pekerjaan)
		$(`#s2id_tempat-lahir-keluarga-edit a .select2-chosen`).html(data.tmp_lahir)
		$('#id_kk_detail').val(data.id)
		$('#id_pegawai').val(data.id_pegawai)
	}

	MasterPegawai.prototype.handleEditSusunanKeluaraga = async function () {
		const url = this.baseUrl + 'update_susunan_keluarga'

		try {
			const response = await this.ajaxPost(url, $('#form-edit-daftar-susunan-keluarga').serialize())
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/edit_pegawai/' + response.data.id_pegawai, 'Kepegawaian', '', 'Edit Pegawai')
			$('#modal-edit-daftar-susunan-keluarga').modal('hide')
			$('.modal-backdrop').remove()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
	}

	MasterPegawai.prototype.handleOpenModalEditRiwayatJabatan = function (el) {
		const data = JSON.parse(el.attr('data'))

		this.modelEditRiwayatJabatanPegawai.modal('show').find('h4').html('Edit Riwayat Jabatan Pegawai')

		$('#tmt-jabatan-edit').val(data.tmt)
		$('#unit-kerja-edit').val(data.id_unit_kerja)
		$('#s2id_unit-kerja-edit a .select2-chosen').html(data.nama)
		$('#no-sk-jabatan-edit').val(data.no_sk)
		$('#tgl-sk-jabatan-edit').val(data.tgl_sk)
		$('#penandatangan-sk-jabatan-edit').val(data.penandatangan_sk)
		$('#jenis-jabatan-jabatan-edit').val(data.jenis_jabatan)
		$('#jabatan-jabatan-edit').val(data.jabatan)
		$('#jenjang-jabatan-jabatan-edit').val(data.jenjang)
		$('#tugas-tambahan-jabatan-edit').val(data.tugas_tambahan)
		$('#preview-fc-sk-jabatan-edit').attr('src', '<?= resource_url().'images/avatars/' ?>' + data.fc_sk)
		$('#id-riwayat-jabatan').val(data.id)
		$('#id-pegawai-riwayat-jabatan').val(data.id_pegawai)
	}

	MasterPegawai.prototype.handleEditRiwayatJabatanPegawai = async function () {
		const url = this.baseUrl + 'update_riwayat_jabatan_pegawai'

		try {
			const response = await this.ajaxPost(url, $('#form-edit-riwayat-jabatan-pegawai').serialize())
			messageCustom(response.message, 'Success')
			loadMenu('kepegawaian/edit_pegawai/' + response.data.id_pegawai, 'Kepegawaian', '', 'Edit Pegawai')
			$('#modal-edit-riwayat-jabatan-pegawai').modal('hide')
			$('.modal-backdrop').remove()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
	}

	MasterPegawai.prototype.handleDetailPegawai = async function () {
		const id = $(this).attr('data')
		loadMenu('kepegawaian/detail_pegawai/' + id, 'Kepegawaian', '', 'Detail Pegawai')
	}

	MasterPegawai.prototype.handleOpenModalSkKepangkatan = function () {
		this.modalTambahSkKepangkatan.modal('show').find('h4').html('Form SK. Kepangkatan')
	}

	MasterPegawai.prototype.handleTambahSkKepangkatan = function () {
		const tmt = $('#tmt-pangkat').val()
		const sk = $('#sk-pangkat').val()
		const noNota = $('#no-nota-bkn').val()
		const golongan = $('#pangkat-golongan').val()
		const namaGolongan = $('#s2id_pangkat-golongan a .select2-chosen').html()
		const tglSk = $('#tgl-sk-pangkat').val()
		const tglNota = $('#tgl-nota-bkn').val()
		const masaKerja = $('#masa-kerja-pangkat').val()
		const kenaikanPangkat = $('#jenis-kenaikan-pangkat').val()
		const kreditUtama = $('#angka-kredit-utama').val() !== '' ? parseFloat($('#angka-kredit-utama').val()) : 0
		const kreditTambahan = $('#angka-kredit-tambahan').val() !== '' ? parseFloat($('#angka-kredit-tambahan').val()) : 0
		const previewFoto = $('#preview-fc-sk-kepangkatan').attr('src')

		const file = $('#fc-sk-kepangkatan').prop('files')

		const html = `<tr>
			<td>${this.noTambahSkKepangkatan++}</td>
			<td>
				<div class="card" style="width: 177px; height: 236px">
					<img class="preview" src="${previewFoto}" alt="Preview Gambar" width="177" height="236">
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column">
					<span>${namaGolongan}</span>
					<span>${tmt}</span>
					<span><i>${kenaikanPangkat}</i></span>
				</div>
				<hr style="border: dashed 1px gray">
				<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
					<span>Nomor SK</span>
					<span>:</span>
					<span>${sk}</span>

					<span>Tanggal SK</span>
					<span>:</span>
					<span>${tglSk}</span>
				</div>
			</td>
			<td class="center">
				${parseFloat(kreditUtama + kreditTambahan)}
			</td>
			<td>
				<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
					<span>Pangkat/Gol.</span>
					<span>:</span>
					<span>${namaGolongan}</span>

					<span>TMT Pangkat</span>
					<span>:</span>
					<span>${tmt}</span>

					<span></span>
					<span></span>
					<span><i>${kenaikanPangkat}</i></span>
				</div>
				<hr style="border: dashed 1px gray">
				<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
					<span>Nomor SK</span>
					<span>:</span>
					<span>${sk}</span>

					<span>Tanggal SK</span>
					<span>:</span>
					<span>${tglSk}</span>
				</div>
			</td>
			<td class="center">
				<button type="button" class="btn btn-danger btn-xxs btn-delete-riwayat-jabatan"><i class="fas fa-trash-alt"></i></button>
				<input type="hidden" name="nomor_tambah_pangkat[]" value="${this.noTambahSkKepangkatan}">
				<input type="hidden" name="tmt_pangkat[]" value="${tmt}">
				<input type="hidden" name="no_sk_pangkat[]" value="${sk}">
				<input type="hidden" name="no_nota_bkn[]" value="${noNota}">
				<input type="hidden" name="golongan_pangkat[]" value="${golongan}">
				<input type="hidden" name="tgl_sk_pangkat[]" value="${tglSk}">
				<input type="hidden" name="tgl_nota_bkn[]" value="${tglNota}">
				<input type="hidden" name="masa_kerja_pangkat[]" value="${masaKerja}">
				<input type="hidden" name="kenaikan_pangkat[]" value="${kenaikanPangkat}">
				<input type="hidden" name="angka_kredit_utama[]" value="${kreditUtama}">
				<input type="hidden" name="angka_kredit_tambahan[]" value="${kreditTambahan}">
				<input type="file" name="fc_sk_pangkat[]" hidden id="fc-sk-kepangkatan${this.noTambahSkKepangkatan}">
			</td>
		</tr>`

		$('#table-sk-kepangkatan tbody').append(html)
		$(`#fc-sk-kepangkatan${this.noTambahSkKepangkatan}`).prop('files', file)
		this.modalTambahSkKepangkatan.modal('hide')
	}

	MasterPegawai.prototype.eselon = function () {
		$('#eselon, #eselon-edit').select2({
			theme: 'bootstrap4',
			placeholder: 'Silahkan pilih Eselon',
			ajax: {
				url: "<?= base_url('kepegawaian/api/kepegawaian/eselon_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					}
				},
				results: function (data, page) {
					var more = (page * 20) < data.total // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more,
					}
				},
			},
			formatResult: function (data) {
				return `<b>Eselon ${data.eselon}</b>`
			},
			formatSelection: function (data) {
				return `Eselon ${data.eselon}`
			},
		})
	}

	MasterPegawai.prototype.handleTambahUnitKerja = async function () {
		if ($('#nama-unit').val() === '') {
			syams_validation('#nama-unit', 'Nama pegawai tidak boleh kosong')
			$('#nama-unit').focus()
			return
		}
		else {
			syams_validation_remove('#nama-unit')
		}

		const url = this.baseUrl + 'simpan_unit_kerja'

		try {
			showLoader()
			const response = await this.ajaxPost(url, $('#form-tambah-unit-kerja').serialize() + '&eselon_text=' + $('#s2id_eselon a .select2-chosen').html())
			messageCustom(response.message, 'Success')
			$('#modal-tambah-unit-kerja').modal('hide')
			this.tbUnitKerja.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleDeleteUnitKerja = async function (el) {
		const alert = await swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda ingin menghapus unit kerja ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> Hapus',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false,
		})

		if (!alert.value) {
			return
		}

		const id = el.attr('data')
		const url = this.baseUrl + 'delete_unit_kerja'

		try {
			showLoader()
			const response = await this.ajaxPost(url, { id })
			messageCustom(response.message, 'Success')
			this.tbUnitKerja.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	MasterPegawai.prototype.handleShowEditUnitKerja = function (obj) {
		$('#form-edit-unit-kerja')[0].reset()
		const data = JSON.parse(obj.attr('data'))

		$('#id-unit-kerja').val(data.id)
		$('#modal-edit-unit-kerja-label').html('Edit Unit Kerja')

		$('#s2id_unit-parent-edit a .select2-chosen').html(data.upt_parent)
		$('#unit-parent-edit').val(data.id_parent)
		$('#s2id_eselon-edit a .select2-chosen').html(data.eselon)
		$('#nama-unit-edit').val(data.upt)
		$('#keterangan-edit').val(data.nama)

		this.modalEditUnitKerja.modal('show')
	}

	MasterPegawai.prototype.handleEditUnitKerja = async function () {
		if ($('#nama-unit').val() === '') {
			syams_validation('#nama-unit', 'Nama pegawai tidak boleh kosong')
			$('#nama-unit').focus()
			return
		}
		else {
			syams_validation_remove('#nama-unit')
		}

		const url = this.baseUrl + 'update_unit_kerja'

		try {
			showLoader()
			const response = await this.ajaxPost(url, $('#form-edit-unit-kerja').serialize() + '&eselon_text=' + $('#s2id_eselon a .select2-chosen').html())
			messageCustom(response.message, 'Success')
			$('#modal-edit-unit-kerja').modal('hide')
			this.tbUnitKerja.api().ajax.reload()
		}
		catch (e) {
			console.log(e)
			messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
		}
		hideLoader()
	}

	function readURL (input) {
		if (input.files && input.files[0]) {
			const reader = new FileReader()
			reader.onload = e => $(input).parents('.form-group').prev().find('.preview').attr('src', e.target.result).show()
			reader.readAsDataURL(input.files[0])
		}
	}

	$(function () {
		new MasterPegawai().init()
	})
</script>
