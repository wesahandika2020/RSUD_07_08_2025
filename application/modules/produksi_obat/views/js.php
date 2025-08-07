<script>
	$(function(){
		getListProduksi(1);
		$('#obat-baru').click(function(){
			resetData();
			$('#modal-produksi-obat').modal('show')
		})

		$('#btn-search').click(function () {
			reloadData()
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListProduksi(1)
		})

		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show();
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show();
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide();
			}
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show();
				$('.bulanan, .rentang-waktu').hide();
			}
		});

		$('#bahan-produksi').select2c({
			ajax: {
				url: "<?= base_url('produksi_obat/api/produksi_obat/barang_with_stok3_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2

					var switcher    = $('#myonoffswitch').is(':checked');
					if (switcher === true) {
						id_penjamin = $('#id-penjamin-pasien').val();
					} else {
						id_penjamin = '';
					}
					return {
						q: term, //search term
						id_penjamin: id_penjamin,
						cekstok: true,
						jenis_pk: $('#jenis-pk').html(),
						is_farmasi: 'Ya',
						page: page // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = data.nama+', <br><b>Sisa:</b> '+data.sisa;
				// var markup = data.nama+', Harga: Rp.'+money_format(data.harga_jual);
				return markup;
			},
			formatSelection: function(data){
				if (parseFloat(data.sisa) <= 0) {
					$('#s2id_bahan-produksi a .select2c-chosen').html('');
					$('#bahan-produksi').val('');
					swalAlert('warning', 'Validasi', '<h4>Stok barang yang kosong tidak dapat digunakan !<h4>'); return false;
				}
				if (parseFloat(data.sisa) <= 0) {
					$('#kekuatan, #dosisracik, #satuan-kekuatan').val('');
					swalAlert('warning', 'Validasi', 'Barang dengan sisa stok 0 tidak dapat dipilih !'); return false;
				} else {
					if (data.kekuatan === null || data.kekuatan === '0' || data.kekuatan === '') {
						$('#kekuatan').val('1');
						$('#dosisracik').val('1');
						$('#satuan-kekuatan').html(data.satuan_kekuatan);
						hitungJmlPakai();
						$('#jumlah').focus();
					} else {
						$('#kemasan').focus();
						$('#kekuatan').val(data.kekuatan);
						$('#dosisracik').val(data.kekuatan);
						$('#satuan-kekuatan').html(data.satuan_kekuatan);
						hitungJmlPakai();
						$('#jumlah').focus();
					}
					$('#harga-jual-barang').val(data.harga_jual);
					$('#kategori-barang').val(data.id_kategori);
					$('#adm-r-barang').val(data.roa);

					if (data.id_kategori !== '1') {
						$('#load-jam-minum').empty();
						$('.showhide').hide();
						$('#aturanpakai, #aturanpakai2, #aturanpakai_auto, #timing, #cara-pembuatan').val('');
						$('#iterasi').val('0');
						$('.obkrs').hide();
					} else {
						if (data.roa === 'Topikal' || data.roa === 'Injeksi' || data.roa === 'Infus' || data.roa === 'Rektal') {
							$('#load-jam-minum').empty();
							$('.showhide').hide();
							$('#aturanpakai, #aturanpakai2, #aturanpakai_auto, #timing, #cara-pembuatan').val('');
							$('#iterasi').val('0');
						} else {
							$('.showhide').show();
							var jenis_form_resep = $('#jenis-form-resep').val();
							if (jenis_form_resep === 'Penunjang') {
								$('.aturanpakai-hidden').hide();
							}
						}

						$('.obkrs').show();
					}

					if (data.roa === 'Oral') {
						$('#timing').val('Sesudah');
					}
					$('#sisa-stok-bahan-produksi').val(parseFloat(data.sisa));
					$('#id-sediaan').val(data.id_sediaan);
					$('#id-stok-bahan-produksi').val(data.id_stok);
					return data.nama+', <b>Sisa:</b> '+data.sisa;
				}
			}
		});

		$('#hasil-produksi').select2c({
			ajax: {
				url: "<?= base_url('produksi_obat/api/produksi_obat/barang_with_stok2_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2

					var switcher    = $('#myonoffswitch').is(':checked');
					if (switcher === true) {
						id_penjamin = $('#id-penjamin-pasien').val();
					} else {
						id_penjamin = '';
					}
					return {
						q: term, //search term
						id_penjamin: id_penjamin,
						cekstok: true,
						jenis_pk: $('#jenis-pk').html(),
						is_farmasi: 'Ya',
						page: page // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = data.nama;
				// var markup = data.nama+', Harga: Rp.'+money_format(data.harga_jual);
				return markup;
			},
			formatSelection: function(data){
				$('#id-stok-hasil-produksi').val(data.id_stok);
				return data.nama
			}
		});

		$('#tambah-bahan-produksi').click(addBahanProduksi)
		$('#tambah-hasil-produksi').click(addHasilProduksi)
		$('#btn-simpan-produksi').click(simpanProduksiObat)
	})



	function hitungJmlPakai() {
		let dosis_racik = parseFloat($('#dosisracik').val());
		let jumlah_tbs  = parseFloat($('#jml-tebus').val());
		let kekuatan    = parseFloat($('#kekuatan').val());

		if (!isNaN(jumlah_tbs)) {
			let jumlah_pakai= (dosis_racik*jumlah_tbs)/kekuatan;
			let jml_pakai = isNaN(jumlah_pakai) ? '' : jumlah_pakai;
			$('#jumlah').val(roundToTwo(jml_pakai));
		}
	}

	function addBahanProduksi(){
		if($('#bahan-produksi').val() === ''){
			syams_validation('#bahan-produksi', 'Obat harus diisi');
			return false;
		}else{
			syams_validation_remove('#bahan-produksi');
		}

		if($('#qty-bahan-produksi').val() === ''){
			syams_validation('#qty-bahan-produksi', 'Quantity harus diisi');
			return false;
		}else{
			syams_validation_remove('#qty-bahan-produksi');
		}

		const namaBahanProduksiObat = $('#s2id_bahan-produksi a .select2c-chosen').html();
		const bahanProduksiObat = $('#bahan-produksi').val();
		const quantity = $('#qty-bahan-produksi').val();
		const sisaStok = $('#sisa-stok-bahan-produksi').val();
		const idStok = $('#id-stok-bahan-produksi').val();

		if(parseInt(quantity) > parseInt(sisaStok)){
			syams_validation('#qty-bahan-produksi', 'Quantity tidak bisa lebih besar dari sisa stok. Sisa stok: ' + sisaStok);
			return false;
		}else{
			syams_validation_remove('#qty-bahan-produksi');
		}

		$('#modal-no-bahan').val(parseInt($('#modal-no-bahan').val()) + 1);

		const html = `
			<tr>
				<td align="center">${$('#modal-no-bahan').val()}</td>
				<td>
					<input type="hidden" name="obat_bahan_produksi[]" value="${bahanProduksiObat}">${namaBahanProduksiObat}
				</td>
				<td align="center">
					<input type="hidden" name="quantity_bahan[]" value="${quantity}">${quantity}
				</td>
				<td align="center">
					<input type="hidden" name="id_stok_bahan[]" value="${idStok}">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
			</tr>
		`

		$('#table-bahan-produksi tbody').append(html);
	}

	function addHasilProduksi(){
		if($('#bahan-produksi').val() === ''){
			syams_validation('#hasil-produksi', 'Obat harus diisi');
			return false;
		}else{
			syams_validation_remove('#hasil-produksi');
		}

		if($('#qty-hasil-produksi').val() === ''){
			syams_validation('#qty-hasil-produksi', 'Quantity harus diisi');
			return false;
		}else{
			syams_validation_remove('#qty-hasil-produksi');
		}

		const namaHasilProduksiObat = $('#s2id_hasil-produksi a .select2c-chosen').html();
		const hasilProduksiObat = $('#hasil-produksi').val();
		const quantity = $('#qty-hasil-produksi').val();
		const idStok = $('#id-stok-hasil-produksi').val();
		$('#modal-no-hasil').val(parseInt($('#modal-no-hasil').val()) + 1);


		const html = `
			<tr>
				<td align="center">${$('#modal-no-hasil').val()}</td>
				<td>
					<input type="hidden" name="obat_hasil_produksi[]" value="${hasilProduksiObat}">${namaHasilProduksiObat}
				</td>
				<td align="center">
					<input type="hidden" name="quantity_hasil[]" value="${quantity}">${quantity}
				</td>
				<td align="center">
					<input type="hidden" name="id_stok_hasil[]" value="${idStok}">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
			</tr>
		`

		$('#table-hasil-produksi tbody').append(html);
	}

	function removeList(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	async function simpanProduksiObat(){
		const sweet = await swal.fire({
			title: 'Konfirmasi Penerimaan',
			html: "Apakah anda yakin akan menerima barang distribusi ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		})

		if(!sweet.value) return;

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('produksi_obat/api/produksi_obat/simpan_produksi_obat') ?>',
			data: $('#form-produksi').serialize(),
			cache: false,
			dataType:'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let type = 'Error';
				if (data.status) {
					type = 'Success';
					getListProduksi(1);
					$('#modal-produksi-obat').modal('hide')
				}
				messageCustom(data.message, type)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan penerimaan distribusi', 'Error')
			}
		})
	}

	function getListProduksi(page){
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('produksi_obat/api/produksi_obat/get_list_produksi') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				resetData();
				reloadData();

				if ((page > 1) && (data.data.length === 0)) {
					getListProduksi(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.date !== null ? datefmysql(v.date) : '-')}</td>
							<td class="center">${v.kode}</td>
							<td class="center">${number_format(v.total_bahan_produksi, 2, ',', '.')}</td>
							<td class="center">${number_format(v.total_hasil_produksi, 2, ',', '.')}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="showDetailProduksi(${v.id})"><i class="fas fa-eye mr-1"></i>Detail</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function showDetailProduksi(id){
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('produksi_obat/api/produksi_obat/get_detail_produksi_obat') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#table-detail-bahan-produksi tbody').empty()
				$('#table-detail-hasil-produksi tbody').empty()
				$.each(data.bahan, function(i, v) {
						let html = /* html */ `
						<tr>
							<td class="center">${i+1}</td>
							<td class="left">${v.nama}</td>
							<td class="center">${v.satuan}</td>
							<td class="center">${v.qty}</td>
							<td class="right">${number_format(v.harga_satuan, 2, ',', '.')}</td>
							<td class="right">${number_format(v.subtotal, 2, ',', '.')}</td>
						</tr>
					`;

					$('#table-detail-bahan-produksi tbody').append(html)
				})
				$.each(data.hasil, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${i+1}</td>
							<td class="left">${v.nama}</td>
							<td class="center">${v.satuan}</td>
							<td class="center">${v.qty}</td>
							<td class="right">${number_format(v.harga_satuan, 2, ',', '.')}</td>
							<td class="right">${number_format(v.subtotal, 2, ',', '.')}</td>
						</tr>
					`;

					$('#table-detail-hasil-produksi tbody').append(html)
				})

				$('#modal-detail-produksi-obat').modal('show')
			},
			complete: function() {
				hideLoader()
				$('#modal-search').modal('hide')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function resetData(){
		$('#s2id_hasil-produksi a .select2c-chosen').html('');
		$('#hasil-produksi').val('');
		$('#qty-hasil-produksi').val('');
		$('#id-stok-hasil-produksi').val('');
		$('#modal-no-hasil').val(0)
		$('#table-hasil-produksi tbody').empty();

		$('#s2id_bahan-produksi a .select2c-chosen').html('');
		$('#bahan-produksi').val('');
		$('#qty-bahan-produksi').val('');
		$('#sisa-stok-bahan-produksi').val('');
		$('#id-stok-bahan-produksi').val('');
		$('#modal-no-bahan').val(0)
		$('#table-bahan-produksi tbody').empty();
	}

	function reloadData() {
		$('#periode-laporan').val('Harian')
		$('.harian, #tanggal-harian').show();
		$('#tanggal-harian').val('<?= date('d/m/Y') ?>')
		$('.bulanan, #tahun, #bulan').hide()
		$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').hide();
	}
</script>
