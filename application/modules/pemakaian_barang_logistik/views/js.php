<script>
	$(function() {
		getListPemakaianBarangLogistik(1)
		
		$('#btn-add').click(function() {
			resetData()
			$('#modal-pemakaian-barang-logistik').modal('show')
		})

		$('#barang-auto').select2c({
            width: '100%',
            ajax: {
                url: "<?= base_url('pemakaian_barang_logistik/api/pemakaian_barang_logistik/barang_with_stok_logistik') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        cekstok: true
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+' <br/>Stok : '+data.sisa;
                return markup;
            }, 
            formatSelection: function(data){
                if (parseFloat(data.sisa) <= 0) {
                    swalAlert('warning', 'Informasi', '<h2>Stok sudah habis</h2>') 
					return false;
                }
                $('#sisa').val(data.sisa_stok)
                $('#sisa-label').val(data.sisa)
                return data.nama+' Stok: '+data.sisa;
                
            }
        })

		$('#btn-search').click(function() {
			$('#form-search')[0].reset()
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#barang-search').select2({
            ajax: {
                url: "<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/barang_non_kategori') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: $('#kategori-barang-search').val()
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
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama+' '+data.kekuatan+' '+data.satuan_kekuatan;
            }
        })

		$('#btn-reload').click(function() {
			resetData()
			getListPemakaianBarangLogistik(1)
		})

		// tambah data pemakaian
		$('.add-data').click(function() {
			let id_barang = $('#barang-auto').val()
			let nama_barang = $('#s2id_barang-auto a .select2c-chosen').html()
			let sisa = parseFloat($('#sisa').val())
			let sisa_label = $('#sisa-label').val()
			let jumlah = $('#jumlah').val()

			if (id_barang === '') {
				syams_validation('#barang-auto', 'Nama barang belum dipilih!'); return false;
			}
			if (jumlah === '' || jumlah === '0') {
				syams_validation('#jumlah', 'Jumlah pakai tidak boleh kosong!'); return false;
			}
			if (parseFloat(sisa_label) < parseFloat(jumlah)) {
				syams_validation('#jumlah', 'Jumlah pakai tidak bisa melebihi sisa yang ada!'); return false;
			}
			syams_validation_remove('#barang-auto')
			syams_validation_remove('#jumlah')
			
			addNewData(id_barang, nama_barang, sisa_label, jumlah)
		})

		$('#jumlah').keydown(function(e) {
            if (e.keyCode === 13) {
                $('#pilih').click()
            }
        })
	})

	function resetData() {
		$('#s2id_barang-search a .select2-chosen').html('Pilih Barang...')
		$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
		$('input[type=name], input[type=hidden], select, textarea, #id').val('')
		$('#tanggal-awal, #tanggal-akhir').val('<?php echo date('d/m/Y') ?>')
		$('#jumlah').val(1)
		$('#table-list tbody').empty()
	}

	function konvTanggal(waktu) {
        if (waktu !== undefined && waktu !== null && waktu !== 'null') {
            var el = waktu.split(' ');
            var elem = el[0].split('-');
            var tahun = elem[0];
            var bulan = elem[1];
            var hari = elem[2];
            return hari + '/' + bulan + '/' + tahun;
        } else {
            return '';
        }

    }

	function getListPemakaianBarangLogistik(page) {
		$('#page-now').val(page)
		$.ajax({
			type:'GET',
			url: '<?php echo base_url('pemakaian_barang_logistik/api/pemakaian_barang_logistik/get_list_pemakaian_barang_logistik/page/') ?>' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPemakaianBarangLogistik(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, val) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center wrapper">${datetimefmysql(val.waktu)}</td>
							<td class="left">${val.nama_barang}</td>
							<td class="right">${val.keluar}</td>
							<td class="left">${val.satuan}</td>
							<td class="center"><i>${val.nama_user}</i></td>
							<td class="right wrapper">
								<button type="button" class="btn btn-secondary btn-xs" onclick="deletePemakaianBarangLogistik(${val.id}, ${data.page})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
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

	function paging(page) {
		getListPemakaianBarangLogistik(page)
	}

	function addNewData(id_barang, nama_barang, sisa, jumlah) {
		let jml = $('.rows').length;
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${jml + 1}</td>
				<td class="left">${nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${jml}" value="${id_barang}" class="id-barang"></td>
				<td class="center">${sisa}</td>
				<td class="center">${jumlah}<input type="hidden" name="jumlah[]" id="jumlah${jml}" value="${jumlah}" class="jumlah"></td>
				<td><button type="button" class="btn btn-secondary btn-xs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button></td>
			</tr>
		`;

		$('#table-list tbody').append(html)
		$('#barang-auto, #sisa, #sisa-label').val('')
		$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
		$('#jumlah').val('1')
	}

	function removeList(el) {
		let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent)
	}

	function simpanPemakaianBarangLogistik() {
		let jmlPacking = $('.rows').length;
		if (jmlPacking === 0) {
			swalAlert('warning', 'Validasi', 'Item barang untuk pemakaian belum dipilih')
			return false;
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
 			html: "Apakah anda yakin akan menyimpan data pemakaian barang logistik ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("pemakaian_barang_logistik/api/pemakaian_barang_logistik/simpan_pemakaian_barang_logistik") ?>',
					data: $('#form-pemakaian-barang-logistik').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
							getListPemakaianBarangLogistik(1)
							$('#modal-pemakaian-barang-logistik').modal('hide')
						}
						messageCustom(data.message, type)
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menyimpan data pemakaian barang logistik', 'Error')
					},
				})
			}
		})
	}

	function deletePemakaianBarangLogistik(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "Apakah anda yakin akan menghapus data pemakaian barang logistik ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("pemakaian_barang_logistik/api/pemakaian_barang_logistik/delete_pemakaian_barang_logistik/id/") ?>' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
							getListPemakaianBarangLogistik(page)
						}
						messageCustom(data.message, type)
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus data pemakaian barang logistik', 'Error')
					},
				})
			}
		})
	}

</script>