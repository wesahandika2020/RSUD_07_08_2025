<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function () {
		getListDataHasilRadiologi(1)
		$('#btn-print-hasil').css('display', 'none')

		$('#btn-search').click(function () {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function () {
			resetAllData()
			getListDataHasilRadiologi(1)
		})

		$('#jenis-radiologi').change(function () {
			getListDataHasilRadiologi(1)
		})

		$('#status-hasil').change(function () {
			getListDataHasilRadiologi(1)
		})

		$('#dokter-auto').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>'
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})

		$('#dokterhide').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>'
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})

		$('#radiografer-auto').select2c({ //tambahan lina
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: '19',
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
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>'
				return markup
			},
			formatSelection: function (data) {
				return data.nama
			},
		})

		$('#hasil-field, #kesan-field, #anjuran-field, #finding-field, #impression-field').summernote({
			height: 200,
			focus: true,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontname', ['fontname']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
			],
			callbacks: {
				onPaste: function (e) {
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text')

					e.preventDefault()

					// Firefox fix
					setTimeout(function () {
						document.execCommand('insertText', false, bufferText)
					}, 10)
				},
			},
		})

		$('.form-control').keyup(function () {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.select2-input').change(function () {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function getListDataHasilRadiologi (page) {
		$('#page-now').val(page)

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/get_list_hasil_radiologi") ?>/page/' + page,
			data: $('#form-search').serialize() + '&jenis_radiologi=' + $('#jenis-radiologi').val() + '&status_hasil=' + $('#status-hasil').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataHasilRadiologi(page - 1)
					return false
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function (i, v) {

					let status_keluar = ''
					let batal_status = ''
					let disabled = ''
					let disabledCancel = 'disabled'

					if (v.tindak_lanjut !== null) {
						disabled = 'disabled'
						disabledCancel = ''
					}			

					if (v.tanggal_keluar === null) {
						disabled_resep = ''
					}
					else {
						disabled_resep = 'disabled'
					}		

					if (v.jenis_layanan === 'Radiologi') {

						status_keluar = `<a class="dropdown-item ${disabled} waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, 0, ${v.id_dokter_pjwb}, '${v.dokter_penanggung_jawab}', 'Radiologi')"><i class="fas fa-fw fa-arrow-circle-right mr-1"></i>Status Keluar</a>`

						if (disabled === 'disabled') {

							batal_status = `<a class="dropdown-item ${disabledCancel} btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarRadiologi(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})"><i class="fas fa-fw fa-times-circle mr-1"></i>Pembatalan Status Keluar</a>`
						}

					}

					let detail = v.id_layanan_pendaftaran + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter_penanggung_jawab + '#' + v.id_dokter_pjwb + '#' +
						((v.tanggal_lahir !== null) ? hitungUmur(v.tanggal_lahir) : '') + '#' + v.jenis_layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#radiologi'

					let dokterRadiologi = ''

					if (v.dokter_radiologi !== undefined) {
						for (let [idx, val] of JSON.parse(v.dokter_radiologi).entries()) {
							if(val !== null){
								dokterRadiologi += `<span>${JSON.parse(v.dokter_radiologi).length <= 1 ? '' : `-`} ${val.dokter === '-' ? '-' : val.dokter}</span>`;
							} else {

								dokterRadiologi += `<span>-</span>`;
							}
						}
					}

					if (v.tindak_lanjut == 'cco sementara it') {
						disabled_resep = ''
					}
					
					tindak_lanjut = '';
					v.tindak_lanjut != null ? tindak_lanjut =v.tindak_lanjut : '';
					v.tindak_lanjut == 'cco sementara it' ? tindak_lanjut ='Cco Sementara Billing' : '';
					
					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="center nowrap">${v.no_register}</td>
							<td class="center nowrap">${v.kode}</td>
							<td>${((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '')}</td>
							<td>${v.id_pasien}</td>
							<td>${v.nama}</td>
							<td>${v.dokter_penanggung_jawab}</td>
							<td>${v.jenis_layanan} ${v.layanan}</td>
							<td style="display: flex; flex-direction: column">${dokterRadiologi}</td>
							<td>${v.jenis_radiologi}</td>
							<td>${((v.waktu_hasil !== null) ? datetimefmysql(v.waktu_hasil) : '')}</td>
							<td class="nowrap">${tindak_lanjut}</td>
							<td class="right aksi">
							<div style="display:flex;justify-content:flex-end">
								<div class="dropdown">
									<button ${disabled_resep} type="button" class="btn btn-secondary btn-xs mr-1" title="Klik untuk input resep" onclick="inputResep('${detail}')">
                                        <i class="fas fa-plus-circle mr-1"></i> Resep
                                    </button>	
									<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-cog mr-1"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, ${v.id})"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Hasil</a>			
										${status_keluar}
										${batal_status}																			
									</div>
								</div>
							</div>																
						</tr>
					`

					$('#table-data tbody').append(html)
				})

			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})
	}

	function paging (page) {
		getListDataHasilRadiologi(page)
	}

	function resetAllData () {
		location.reload()
	}

	function detailPemeriksaan (id_pendaftaran, id_layanan_pendaftaran, id_radiologi) {
		$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran)
		$('#id-pendaftaran').val(id_pendaftaran)

		getRequestRadiologi(id_radiologi)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				let pasien = ''
				pasien = data.pasien
				if (pasien !== null) {

					let kelamin = ''
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki'
					}
					else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan'
					}

					let umur = ''
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')'
					}

					$('#id-pasien').val(pasien.id_pasien) //tambahan lina
					$('#no-rm-detail').text(pasien.id_pasien + " / " + pasien.no_register)
					$('#no-telp-detail').text(pasien.telp)
					$('#nama-detail').text(pasien.nama)
					$('#alamat-detail').text(pasien.alamat)
					$('#kelamin-detail').text(kelamin)
					$('#umur-detail').text(umur)
					$('#nama-pjwb-detail').text(pasien.nama_pjwb)
					$('#alamat-pjwb-detail').text(pasien.alamat_pjwb)
					$('#telp-pjwb-detail').text(pasien.telp_pjwb)
					$('#instansi-perujuk-detail').text(pasien.instansi_perujuk)
					$('#tenaga-medis-perujuk-detail').text(pasien.nadis_perujuk)
					$('#asal-layanan').text(pasien.keterangan)
				}

				let layanan = ''

				layanan = data.layanan
				if (layanan !== null) {
					let kelasTindakan = layanan.kelas
					let jenisTindakan = layanan.jenis_layanan
					if (jenisTindakan !== 'Rawat Inap') {
						jenisTindakan = 'Rawat Jalan'
						kelasTindakan = '<?= $kelas_tindakan ?>'
					}
				}

				$('#modal-detail-pemeriksaan').modal('show')
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})
	}

	function getRequestRadiologi (id_radiologi) {
		$('#hasil-pemeriksaan-radiologi').empty()
		let accountGroup = "<?= $this->session->userdata('account_group') ?>"

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/get_permintaan_pemeriksaan_radiologi") ?>/id/' + id_radiologi,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				if (data !== null) {
					$('#id-radiologi').val(data.id)
					$('#no-radiologi-detail').text(data.kode)

					let number = 0
					$.each(data.detail, function (i, value) {
						let html = /* html */ `
							<div class="row mt-3">
								<div class="col-md-12">
									<div class="widget">
										<div class="widget-header">
											<div class="title">
												<h6><i class="fas fa-angle-right mr-1"></i><b>${i}</b></h6>
											</div>
										</div>
										<div class="widget-body">
											<table class="table table-hover table-striped table-sm color-table info-table">
												<thead>
													<tr>
														<th width="10%">Accession</th>
														<th width="20%">Nama Layanan</th>
														<th width="20%">Dokter</th>
														<th width="15%">Radiografer</th>
														<th width="20%">Hasil Radiologi</th>
														<th width="15%"></th>
													</tr>
												</thead>
						`
						let pacs = '';
						let cetakExp = '';
						let refreshData = '';

						$.each(value, function (j, x) {
							if (x.hasil !== '' && x.hasil !== null) {
								$('#btn-print-hasil').css('display', '')
							}

							cetakExp = `<button type="button" class="btn btn-secondary btn-xs" onclick="viewExpertise('${x.accessnumber}', ${x.id}, ${id_radiologi})" ><i class="fas fa-print m-r-5"></i>Expertise</button>`;
							pacs = `<button type="button" class="btn btn-secondary btn-xs" onclick="viewPacs('${x.accessnumber}', ${x.id}, ${id_radiologi})"><i class="fas fa-eye m-r-5"></i>PACS</button>`;
							refreshData = `<button type="button" class="btn btn-secondary btn-xs" onclick="viewPacs('${x.accessnumber}', ${x.id}, ${id_radiologi})"><i class="fas fa-history m-r-5"></i>Refresh</button>`;

							html += /* html */ `
								<tbody>
									<tr>
										<td>${x.accessnumber}</td>
										<td>${x.layanan_radiologi}</td>
										<td>${x.dokter}</td>
										<td>${x.radiografer}</td>
										<td>${x.hasil}</td>
										<td class="aksi right">
											${cetakExp}
											${pacs}
											<button type="button" class="btn btn-secondary btn-xs" onclick="editHasilRadiologi('${x.accessnumber}', ${x.id}, ${x.id_root})"><i class="fa fa-edit mr-1"></i>Edit Hasil</button>
											${refreshData}
											<button type="button" class="btn btn-secondary btn-xs" onclick="editAccession(${x.id}, ${id_radiologi})"><i class="fa fa-edit mr-1"></i>Edit Accession</button>
											${accountGroup === 'Admin' | accountGroup === 'Radiologi' | accountGroup === 'Radiologi Gigi' | accountGroup === 'Koordinator Radiologi' ?
												`<button type="button" class="btn btn-secondary btn-xs" onclick="hapusItemRadiologi(this, ${x.id})"><i class="fa fa-trash-alt mr-1"></i>Hapus Item</button>`
												: ``
											}
										</td>
									</tr>
								</tbody>
							`
						})

						html += /* html */ `
											</table>
										</div>
									</div>
								</div>
							</div>						
						`

						$('#hasil-pemeriksaan-radiologi').append(html)
						number++
					})
				}
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})
	}

	function viewPacs(uid, xid, idRadio) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/viewPacs") ?>',
			data: 'uid=' + uid + '&xid=' + xid,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {

				if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                    	messageCustom(data.metaData.message, 'Error')
	                    getRequestRadiologi(idRadio);
                        
                        

                    } else {

                    	messageCustom(data.metaData.message, 'Success')
                        getRequestRadiologi(idRadio);
						
                    }

                }
				
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})

	}

	function viewExpertise(uid, xid, idRadio) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/viewExpertise") ?>',
			data: 'uid=' + uid + '&xid=' + xid,
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {

				if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                    	messageCustom(data.metaData.message, 'Error')
	                    getRequestRadiologi(idRadio);
                        
                        

                    } else {

                    	messageCustom(data.metaData.message, 'Success')
                        getRequestRadiologi(idRadio);
                        showUrl(data.metaData.url);
						
                    }

                }
				
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})

	}

	function showUrl(url) {
		window.open(url, '_blank');
	}

	function cetakPemeriksaan (id_radiologi) {
		window.open('<?= base_url() ?>hasil_radiologi/printing_pemeriksaan_radiologi/' + id_radiologi, 'Cetak List Pemeriksaan Radiologi',
			'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y)
	}

	function cetakHasilRadiologi () {
		let id_radiologi = $('#id-radiologi').val()
		window.open('<?= base_url() ?>hasil_radiologi/printing_hasil_radiologi/' + id_radiologi, 'Cetak Hasil Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y)
	}

	function editHasilRadiologi (uid, id_detail_radiologi, id_layanan) {
		syams_validation_remove('#dokter-auto')
		if (id_layanan !== 1664) {
			resetHasil()
			$('#id-detail-radiologi').val(id_detail_radiologi)
			$.ajax({
				type: 'GET',
				url: '<?= base_url("pelayanan/api/pelayanan/get_detail_radiologi") ?>/id/' + id_detail_radiologi,
				cache: false,
				dataType: 'JSON',
				success: function (data) {
					$('#layanan-edit').text(data.layanan_radiologi)
					$('#dokter-auto').val(data.id_dokter)
					$('#s2id_dokter-auto a .select2-chosen').html(data.dokter)
					$('#radiografer-auto').val(data.id_radiografer)
					$('#s2id_radiografer-auto a .select2-chosen').html(data.radiografer)

					$('#hasil-field').summernote('code', data.hasil)
					$('#kesan-field').summernote('code', data.kesan)
					$('#anjuran-field').summernote('code', data.anjuran)
					$('#id-layanan-radiologi').val(data.id_layanan)
					$('#modal-hasil-radiologi').modal('show')
				},
			})
		}
		else {
			openHasilEcho(id_detail_radiologi)
		}

		bridgingHasilPacs(uid, id_detail_radiologi);
	}

	function bridgingHasilPacs(uid, xid){

		$('#bridging-expertise').empty();

		$.ajax({

	    	type: 'GET',
	        url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/curlExspertise") ?>',
			data: 'uid=' + uid + '&xid=' + xid,
			cache: false,
	        dataType: 'json',
	        beforeSend: function() {
	            showLoader()
	        },
	        success: function(data) {

	        	let html = '';

	        	if(typeof data.metaData !== 'undefined'){

                    html = data.metaData.message;

                    $('#bridging-expertise').append(html);

                }

	        },
	        complete: function() {
	            hideLoader()
	        },
	        error: function(data) {
	        },

	    });

	}

	function resetHasil () {
		$('.hasil-input, #id-detail-radiologi, #id-layanan-radiologi').val('')
		$('#hasil-field, #kesan-field, #anjuran-field').summernote('code', '')
		$('#layanan-edit').text('')
	}

	function konfirmasiSimpanHasil () {
		let stop = false

		if ($('#dokter-auto').val() === '') {
			syams_validation('#dokter-auto', 'Pilih dokter terlebih dahulu')
			stop = true
		}

		if (stop) {
			return false
		}

		Swal.fire({
			title: 'Konfirmasi Simpan Hasil',
			html: 'Apakah anda yakin ingin mengentrikan <br> data hasil radiologi ini ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
		}).then((result) => {
			if (result.value) {
				simpanHasil()
			}
		})
	}

	function simpanHasil () {
		let hasil = $('#hasil-field').summernote('code')
		let kesan = $('#kesan-field').summernote('code')
		let anjuran = $('#anjuran-field').summernote('code')

		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/simpan_hasil_radiologi") ?>',
			data: $('#form-hasil-radiologi').serialize() + '&hasil=' + hasil + '&kesan=' + kesan + '&anjuran=' + anjuran + '&id_radiologi=' + $('#id-radiologi').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				if (data.status === false) {
					messageAddFailed()
				}
				else {
					messageAddSuccess()
				}

				getRequestRadiologi($('#id-radiologi').val())
				getListDataHasilRadiologi(1)
				$('#modal-hasil-radiologi').modal('hide')
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				swalAlert('error', e.status, e.statusText)
			},
		})
	}

	function hapusItemRadiologi (object, id) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: 'Apakah anda yakin ingin akan menghapus item pemeriksaan radiologi ? <br> Menghapus item pemeriksaan akan mengubah billing yang sudah tercatat',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/hapus_pemeriksaan_radiologi_detail") ?>/' + id,
					cache: false,
					dataType: 'JSON',
					success: function (data) {
						if (data.status === false) {
							messageCustom(data.message, 'Info')
						}
						else {
							removeMe(object)
							messageCustom(data.message, 'Success')
						}
					},
					error: function (e) {
						messageCustom('Terjadi Kesalahan saat hapus item pemeriksaan radiologi', 'Error')
					},
				})
			}
		})
	}

	function removeMe (el) {
		var parent = el.parentNode.parentNode
		parent.parentNode.removeChild(parent)
	}

	function bhpRadiologi () {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/get_detail_bhp") ?>/id/' + $('#id-layanan-pendaftaran').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				$('#table-list-bhp tbody').empty()
				$.each(data, function (i, v) {
					if (v.id !== null) {
						let j = $('.tr-rows').length + 1
						let nama = new String(v.nama_barang)

						let htmlRead = /* html */ `
                            <tr class="tr-rows">
                                <td class="center">${j}</td>
								<td class="left">${v.nama_barang}</td>
								<td class="center">${v.status}</td>
								<td class="center">${v.jumlah}</td>
                                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="konfrimHapusBhp(${v.id},${v.id_barang},${v.jumlah})"><i class="fa fa-trash-alt"></i></button></td>
                            </tr>
                        `

						$('#table-list-bhp tbody').append(htmlRead)

					}
				})
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				accessFailed(e.status)
			},
		})

		$('#modal-add-label').html('BHP Radiologi')
		$('#modal-add').modal('show')
	}

	function konfrimHapusBhp (id, id_barang, jumlah) {
		bootbox.dialog({
			message: 'Anda yakin akan menghapus BHP ini ?',
			title: 'Konfirmasi',
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: 'btn-secondary',
					callback: function () {

					},
				},
				simpan: {
					label: '<i class="fas fa-check-circle mr-1"></i>Ya',
					className: 'btn-info',
					callback: function () {
						hapusBhp(id, id_barang, jumlah)
					},
				},
			},
		})
	}

	function hapusBhp (id, id_barang, jumlah) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/hapus_bhp_radiologi") ?>',
			data: {
				id: id,
				id_barang: id_barang,
			},
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success')
					bhpRadiologi()
					updateStokBhp('masuk', id, id_barang, jumlah)
					resetFormBhp()
				}
				else {
					messageCustom(data.message, 'Error')
				}
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error')
			},
		})
	}

	$('#bhp_radiologi').select2c({
		ajax: {
			url: "<?= base_url('hasil_radiologi/api/hasil_radiologi/get_bhp_radiologi') ?>",
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
				return { results: data.data, more: more }
			},
		},
		formatResult: function (data) {
			var markup = '<b>' + data.nama_barang + '</b><br/> Stok :<i>' + data.stok
			return markup
		},
		formatSelection: function (data) {
			$('#id-barang').val(data.id)
			$('#nama-barang').val(data.nama_barang)
			$('#stok').val(data.stok)

			return data.nama_barang
		},
	})

	function simpanBhpRadiologi () {
		if ($('#bhp_radiologi').val() == '') {
			swalAlert('warning', 'Validasi', 'Barang BHP tidak boleh kosong !')
			return false
		}

		if ($('#bhp-status').val() == '') {
			swalAlert('warning', 'Validasi', 'Status tidak boleh kosong !')
			return false
		}

		if ($('#bhp-jumlah').val() == '') {
			swalAlert('warning', 'Validasi', 'Jumlah tidak boleh kosong !')
			return false
		}

		if ($('#stok').val() <= $('#bhp-jumlah').val()) {
			swalAlert('warning', 'Validasi', 'Stok tidak cukup')
			return false
		}

		let idlayanan = ''
		if ($('#id-layanan-pendaftaran').val() !== '') {
			idlayanan = 'id_layanan_pendaftaran/' + $('#id-layanan-pendaftaran').val()
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url('hasil_radiologi/api/hasil_radiologi/simpan_bhpradiologi/') ?>' + idlayanan,
			cache: false,
			data: $('#form-tambah-bhp').serialize(),
			dataType: 'JSON',
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success')
					bhpRadiologi()
					updateStokBhp('keluar', '', '', '')
					resetFormBhp()
				}
				else {
					messageCustom(data.message, 'Error')
				}
			},
			error: function (e) {
				messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
			},
		})
	}

	function updateStokBhp (kondisi, id, id_barang, jumlah) {
		kondisi = 'kondisi/' + kondisi
		id = '/id/' + id
		id_barang = '/id_barang/' + id_barang
		jml = '/jml/' + jumlah

		$.ajax({
			type: 'POST',
			url: '<?= base_url('hasil_radiologi/api/hasil_radiologi/update_stokbhp/') ?>' + kondisi + id + id_barang + jml,
			cache: false,
			data: $('#form-tambah-bhp').serialize(),
			dataType: 'JSON',
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success')
				}
				else {
					messageCustom(data.message, 'Error')
				}
				bhpRadiologi()
			},
			error: function (e) {
				messageCustom(e.status + ' | Gagal menyimpan data!', 'Error')
			},
		})
	}

	function resetFormBhp () {
		$('#id-barang, #stok, #bhp-status, #bhp-jumlah').val('')
		$('.select2c-input').val('')
		$('.select2c-chosen').html('')
	}

	function riwayatDiagnosisRad () {
		$('#wizard-form-rad').bwizard()
		let id_pendaftaran = $('#id-pendaftaran').val()
		let id_layanan = $('#id-layanan-pendaftaran').val()

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			success: function (data) {

				let pasien = data.pasien
				let umur = ''

				if (pasien.tanggal_lahir !== null) {

					umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')'

				}

				$('#identitas-pasien-diagnosis-rad').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur)

				if (data.diagnosa.length > 0) {
					showPADiagnosisRad(data.diagnosa)
				}
				else {
					$('#table-diagnosis tbody').empty()
				}

				$('#modal-pa-diagnosis').modal('show')
				$('#modal-pa-diagnosis-label').html('Riwayat Diagnosis Pasien')
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {

			},
		})
	}

	function showPADiagnosisRad (data) {
		$('#table-pa-diagnosis tbody').empty()
		if (data !== null) {
			$.each(data, function (i, v) {
				let number = $('.number-diag').length
				let kodeDiagnosa = ''
				let diagnosa = ''
				let num = (++i)
				let dokter = v.dokter
				let diagnosa_klinis = (v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak'
				let check_prioritas = v.prioritas
				let diagnosa_banding = v.diagnosa_banding
				let diagnosa_akhir = (v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak'
				let penyebab_kematian = (v.penyebab_kematian == 1) ? 'Ya' : 'Tidak'
				let button_hapus = ''

				if (v.diangnosa_manual == 1) {
					diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                                <input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}`
				}
				else {
					diagnosa = `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                                <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`
					kodeDiagnosa = v.golongan_sebab_sakit.substr(0, 3)
				}

				if (v.log != '0') {
					num = `<s> ${num} </s>`
					dokter = `<s> ${dokter} </s>`
					diagnosa = `<s> ${diagnosa} </s>`
					diagnosa_klinis = `<s> ${diagnosa_klinis} </s>`
					check_prioritas = `<s> ${check_prioritas} </s>`
					diagnosa_banding = `<s> ${diagnosa_banding} </s>`
					diagnosa_akhir = `<s> ${diagnosa_akhir} </s>`
					penyebab_kematian = `<s> ${penyebab_kematian} </s>`
					button_hapus = `disabled`
				}

				let html = /* html */ `
                    <tr>
                        <td class="number-diag center">
                            <input type="hidden"> ${num}
                            <input type="hidden"">
                        </td>
                        <td class="nowrap">
                            ${dokter}
                        </td>
                        
                        <td>
                            ${diagnosa}
                        </td>
                        <td>
                            ${diagnosa_klinis}
                        </td>
                        <td>
                            ${check_prioritas}
                        </td>
                        <td>
                            ${(diagnosa_banding)}
                        </td>
                        <td>
                            ${diagnosa_akhir}
                        </td>
                        <td>
                            ${penyebab_kematian}
                        </td>
                    </tr>
                `

				$('#table-pa-diagnosis tbody').append(html)
			})

		}
	}

	function editAccession(id, idRadiologi) {
        $('#id-detail').val('');
        $('#acc-number').val('');
        $('#id-radio').val('');
        
        let accNumb = '';

        $.ajax({
            type: 'GET',
            url: '<?= base_url('hasil_radiologi/api/hasil_radiologi/ambil_data_acc') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                accNumb = data.metaData.data;

                $('#id-detail').val(id);
                $('#id-radio').val(idRadiologi);
                $('#acc-number').val(accNumb.accessnumber);
                $('#modal-acc-number').modal('show');
                $('#modal-acc-number-label').html('Form Edit Accession Number');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function simpanAccNumber () {
		let stop = false

		if ($('#acc-number').val() === '') {
			syams_validation('#acc-number', 'Silakan isi Accession Number Terlebih Dahulu')
			stop = true
		}

		if (stop) {
			return false
		}

		syams_validation_remove('#acc-number')

		Swal.fire({
			title: 'Konfirmasi Acc Number',
			html: 'Apakah anda yakin ingin mengubah <br>Accession Number ini ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
		}).then((result) => {
			if (result.value) {
				simpanAccessionNumber()
			}
		})
	}

	function simpanAccessionNumber () {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/simpan_accession_number") ?>',
			data: $('#form-acc-number').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader()
			},
			success: function (data) {
				console.log(data);
				if (data.status === 'gagal') {
					messageCustom(data.message, 'Error')
				} else {

					detailPemeriksaan (data.id_pendaftaran, data.id_layanan, data.id_radiologi)
					messageCustom(data.message, 'Success')
				}

				$('#modal-acc-number').modal('hide')
			},
			complete: function () {
				hideLoader()
			},
			error: function (e) {
				swalAlert('error', e.status, e.statusText)
			},
		})
	}

</script>
