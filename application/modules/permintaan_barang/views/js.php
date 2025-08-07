<script>
	$(function() {
		getListPermintaanBarang(1)

		$('#btn-add').click(function() {
			reloadData()
			getListSisaStok(1)
			$('#modal-permintaan-barang').modal('show')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			getListPermintaanBarang(1)
			reloadData()
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
        })

		$('#pencarian-barang').keyup(function() {
			getListSisaStok(1)
			return false;
		})

		$('#tanggal-permintaan').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})
		
		$('#tanggal-permintaan').blur(function() {
            var value = $('#tanggal-permintaan-hide').val()
            if ($(this).val() === '') {
                $('#tanggal-permintaan').val(value)
            }
		})
		
		$('#unit').change(function() {
			let unit = $('#unit :selected').text()
			$('#unit-tujuan').html(unit)
		})

		$('.custom-form').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#barang-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
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
	})

	function changeCategory(val) {
        $('#kategori').val(val)
        getListSisaStok(1)
	}
	
	function getListSisaStok(page) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('permintaan_barang/api/permintaan_barang/get_list_barang_unit_sisa_stok') ?>/page/' + page,
			data: 'jenis=Akhir&abaikaned=on&keyword=' + $('#pencarian-barang').val() + '&kategori=' + $('#kategori-minta').val(),
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(result) {
				if ((page - 1) & (result.data.length === 0)) {
					getListSisaStok(page - 1)
					return false;
				}

				$('#bu-pagination').html(pagination(result.jumlah, result.limit, result.page, 2))
				$('#bu-summary').html(page_summary(result.jumlah, result.data.length, result.limit, result.page))

				$('#table-barang-unit tbody').empty()
				$.each(result.data, function(i, val) {
					let detail = val.nama_barang + '#' + val.id_kemasan + '#' + val.nama_kemasan + '#' + val.sisa + '#' + val.id;
					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((result.page - 1) * result.limit))}</td>
							<td class="wrapper">${val.nama_barang}</td>
							<td class="right sisa">${val.sisa}</td>
							<td class="wrapper">${(val.nama_kemasan !== null ? val.nama_kemasan : '')}</td>
							<td class="right">
								<button type="button" title="Klik untuk menambahkan ke daftar permintaan barang" class="btn btn-secondary btn-xs" onclick="addBarangToListPermintaan('${detail}')"><i class="fas fa-sign-in-alt"></i></button>
							</td>
						</tr>
					`;

					$('#table-barang-unit tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			}
		})
	}

	function addBarangToListPermintaan(detail) {
		let data = detail.split('#')
		if ($('#unit').val() === '') {
			syams_validation('#unit', 'Silahkan pilih unit tujuan terlebih dahulu')
			return false;
		}

		let jml = $('.rows-permintaan').length;
		for (let i = 0; i < jml; i++) {
			let id_kemasan = $('#kemasan' + i).val()
			if (id_kemasan === data[1]) {
				swalAlert('warning', 'Validasi', 'Data barang <b>' + data[0] + '</b> sudah di masukkan di nomor ' + (i + 1) + '!'); return false; 
			}
		}

		let html = /* html */ `
			<tr class="rows-permintaan">
				<td class="center">${(jml + 1)}</td>
				<td>${data[0]}</td>
				<td class="right" id="sisa-unit-tujuan${jml}"></td>
				<td class="center">${data[2]}<input type="hidden" name="kemasan[]" id="kemasan${jml}" value="${data[1]}" class="kemasan"></td>
				<td class="center"><input type="text" name="jumlah[]" id="jumlah${jml}" value="" class="jumlah custom-form center" size="15" placeholder="Jml" onkeypress="return hanyaAngka(event)"></td>
				<td class="center">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeListPermintaan(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-barang-order tbody').append(html)
		let id_unit = $('#unit').val()
		getSisaStokUnit(jml, id_unit, data[4])
	}

	function removeListPermintaan(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        let jumlah = $('.rows-permintaan').length;
        if (jumlah === 0) {
            $('#kategori_minta').removeAttr('disabled');
        }
        let col = 0;
        for (i = 0; i <= jumlah; i++) {
            $('.rows-permintaan:eq('+col+')').children('td:eq(0)').html(i+1);
            $('.rows-permintaan:eq('+col+')').children('td:eq(2)').attr('id', 'sisa-unit-tujuan'+i);
            $('.rows-permintaan:eq('+col+')').children('td:eq(3)').children('.kemasan').attr('id','kemasan'+i);
            $('.rows-permintaan:eq('+col+')').children('td:eq(4)').children('.jumlah').attr('id','jumlah'+i);
            col++;
        }
    }

	function getSisaStokUnit(i, id_unit, id_barang) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('sisa_stok/api/sisa_stok/get_data_sisa_stok') ?>/id_unit/' + id_unit + '/id_barang/' + id_barang,
			success: function(data) {
				// $('#sisa-unit-tujuan' + i).html(data)
				$('#sisa-unit-tujuan' + i).html('~')
			}
		})
	}

	function konfirmasiSimpanPermintaanBarang() {
		let jml = $('.rows-permintaan').length;
		if ($('#unit').val() === '') {
			syams_validation('#unit', 'Silahkan pilih unit tujuan terlebih dahulu')
			return false;
		}
		if ($('#tanggal-permintaan').val() === '') {
			syams_validation('#tanggal-permintaan', 'Tanggal permintaan harus diisi!')
			return false;
		}
		if (jml === 0) {
			swalAlert('warning', 'Validasi', 'Data barang belum ada yang dipilih / dimasukkan!')
			return false;
		}
		for (let i = 0; i < jml; i++) {
			let jumlah  = $('#jumlah' + i).val()
			if (jumlah === '' || jumlah === 0) {
				swalAlert('warning', 'Validasi', 'Jumlah permintaan harus diisi!')
				return false;
			}
		}
		swal.fire({
			title: 'Konfirmasi Simpan',
 			html: "Apakah anda yakin akan menyimpan data permintaan barang ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanPermintaanBarang()
			}
		})
	}

	function simpanPermintaanBarang() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("permintaan_barang/api/permintaan_barang/simpan_permintaan_barang") ?>',
			data: $('#form-permintaan-barang').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let type = 'Error';
				if (data.status) {
					type = 'Success';
				}
				messageCustom(data.message, type)
				getListPermintaanBarang(1)
				$('#modal-permintaan-barang').modal('hide')
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				if ($('#id').val() === '') {
					messageCustom('Terjadi Kesalahan, Gagal menyimpan data permintaan barang', 'Error')
				} else {
					messageCustom('Terjadi Kesalahan, Gagal mengubah data permintaan barang', 'Error')
				}
			},
		})
	}

	function reloadData() {
		$('#table-barang-order tbody').empty()
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('#s2id_barang-search a .select2-chosen').html('Pilih Barang...')
		$('#tanggal-permintaan, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
		$('#tanggal-awal').val('<?= date('01/m/Y') ?>')
	}

	function getListPermintaanBarang(page, id_barang) {
		$('#page-now').val(page)
		let id = '';
		if (id_barang !== undefined) {
			id = id_barang;
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url('permintaan_barang/api/permintaan_barang/get_list_permintaan_barang') ?>/page/' + page + '/id/' + id,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPermintaanBarang(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, val) {
					let detail = val.id+'#'+val.id_unit_tujuan+'#'+val.id_kategori_barang+'#'+val.tanggal_permintaan+'#'+val.tujuan;
					let disabled = val.tanggal_dikirim !== null ? 'disabled' : '';
					let html = /* html */ `
						<tr>
							<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${val.kode}</td>
							<td class="wrapper">${datefmysql(val.tanggal_permintaan)}</td>
							<td class="wrapper">${val.tujuan}</td>
							<td class="center"><i>${val.nama_user_minta}</i></td>
							<td class="wrapper right">
								<button type="button" title="Klik untuk mencetak bukti permintaan barang" class="btn btn-secondary btn-xs" onclick="printPermintaanBarang(${val.id})"><i class="fas fa-print mr-1"></i>Print Bukti</button>
								<button type="button" ${disabled} title="Klik untuk mengedit permintaan barang" class="btn btn-secondary btn-xs" onclick="editPermintaanBarang('${detail}')"><i class="fas fa-edit mr-1"></i>Edit</button>
								<button type="button" ${disabled} title="Klik untuk menghapus permintaan barang" class="btn btn-secondary btn-xs" onclick="deletePermintaanBarang(${val.id}, ${data.page})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
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

	function paging(page, tab) {
		switch (tab) {
			case 1:
				getListPermintaanBarang(page)
				break;
			case 2:
				getListSisaStok(page)
				break;
			default:
				break;
		}
	}

	function editPermintaanBarang(detail) {
		let data = detail.split('#')
		$('#id, #id-distribusi').val(data[0])
		$('#unit').val(data[1])
		$('#tanggal-permintaan, #tanggal-permintaan-hide').val(datefmysql(data[3]))

		let unit = $('#unit :selected').text()
		$('#unit-tujuan').html(unit)
		$.ajax({
			type: 'GET',
			url: '<?= base_url('permintaan_barang/api/permintaan_barang/get_permintaan_barang') ?>/id/' + data[0],
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(result) {
				$('#table-barang-order tbody').empty()
				$.each(result.data, function(jml, val) {
					let html = /* html */ `
						<tr class="rows-permintaan">
							<td class="center">${(jml + 1)}</td>
							<td>${val.nama_barang}<input type="hidden" name="id_barang[]" value="${val.id_barang}" class="id-barang" id="id-barang${jml}"></td>
							<td class="right" id="sisa-unit-tujuan${jml}">${val.sisa}</td>
							<td class="center">${val.kemasan}<input type="hidden" name="kemasan[]" id="kemasan${jml}" value="${val.id_kemasan}" class="kemasan"></td>
							<td class="center"><input type="text" name="jumlah[]" id="jumlah${jml}" value="${val.jumlah}" class="jumlah custom-form center" size="15" placeholder="Jml" onkeypress="return hanyaAngka(event)"></td>
							<td class="center">
								<button type="button" class="btn btn-secondary btn-xs" onclick="removeListPermintaan(this)"><i class="fas fa-trash-alt"></i></button>
							</td>
						</tr>
					`;
					$('#table-barang-order tbody').append(html)
					let id_unit = $('#unit').val()
					getSisaStokUnit(jml, data[1], val.id_barang)
				})
				$('#modal-permintaan-barang').modal('show')
			},
			complete: function() {
				hideLoader()
				getListSisaStok(1)
			}
		})
	}

	function deletePermintaanBarang(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "Apakah anda yakin akan menghapus data permintaan barang ini ?",
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
					url: '<?= base_url("permintaan_barang/api/permintaan_barang/delete_permintaan_barang") ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						let pageNow = $('#page-now').val()
						let page = pageNow;
						if (pageNow === undefined) {
							page = 1;
						}

						let type = 'Error';
						if (data.status) {
							type = 'Success';
						}
						messageCustom(data.message, type)
						getListPermintaanBarang(page)
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus data permintaan barang', 'Error')
					},
				})
			}
		})
	}

	function printPermintaanBarang(id, page) {
		let wWidth = $(window).width();
        let dWidth = wWidth * 1;
        let wHeight= $(window).height();
        let dHeight= wHeight * 1;
        let x = screen.width/2 - dWidth/2;
        let y = screen.height/2 - dHeight/2;
        window.open('<?= base_url() ?>permintaan_barang/printing_bukti_permintaan_barang?id=' + id,'Cetak Bukti Permintaan Barang','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}
</script>