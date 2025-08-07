<script>
	$(function() {
		getListStokLogistik(1)
		$('#btn-add').click(function() {
			resetData();
			$('#alasan').val('Stok Awal Sistem');
			$('#modal-stok-opname').modal('show');
			$('#table-list tr.rows').empty();
	
		})

		$('#btn-reload').click(function() {
			resetData()
			getListStokLogistik(1)
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#ed, #ed-edit, #tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
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
				return data.nama_barang;
			}
		})

		$('#barang-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: $('#kategori-barang').val()
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
                $.getJSON('<?= base_url('barang/api/barang/get_kemasan_barang') ?>?id='+data.id, function(data){
                    $('#kemasan').html('');
                    if (data === null) {
                        alert('Kemasan tidak barang tidak tersedia !');
                    } else {
                        $.each(data, function (index, value) {
                            $('#kemasan').append("<option value='"+value.id_kemasan+"'>"+value.nama+"</option>");
                        });
                    }
                });
                $('#kemasan').focus();
                $('#jumlah').val('1');
                return data.nama+' '+(data.kekuatan !== null ? data.kekuatan: '')+' '+(data.satuan_kekuatan !== null ? data.satuan_kekuatan: '');
            }
		})

		$('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

		$('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

		$('#tambahkan').click(function() {
			let id_barang = $('#barang-auto').val()
			let nama_barang = $('#s2id_barang-auto a .select2-chosen').html()
			let pembayaran = $('#pembayaran').val()
			let jumlah = $('#jumlah').val()
			let id_kemasan = $('#kemasan').val()
			let no_batch = $('#no-batch').val()
			let alasan = $('#alasan').val()
			let ed = $('#ed').val()
			addToRecordList(id_barang, nama_barang, pembayaran, jumlah, id_kemasan, no_batch, alasan, ed)
		})

		$('#jumlah').keydown(function(e) {
            if (e.keyCode === 13) {
                $('#tambahkan').click()
            }
        })
	})

	function resetData() {
		$('#form-stok-opname')[0].reset()
		$('#form-search')[0].reset()
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
		$('#s2id_barang-search a .select2-chosen').html('Pilih Barang...')
		$('#s2id_barang-auto a .select2-chosen').html('Pilih Barang...')
	}

	function getListStokLogistik(page, id_stok_opname) {
		var id = '';
		if (id_stok_opname !== undefined) {
			id = id_stok_opname;
		}
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('stok_opname_logistik/api/stok_opname_logistik/get_list_stok_logistik/page/') ?>' + page + '/id/' + id ,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListStokLogistik(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let html = '<tr>'+
									'<td class="center">'+((i + 1) + ((data.page - 1) * (data.limit)))+'</td>'+
									'<td class="center">'+datetimefmysql(v.waktu)+'</td>'+
									'<td>'+v.nama_barang+'</td>'+
									'<td>'+((v.pembayaran !== null) ? v.pembayaran : '')+'</td>'+
									'<td class="right">'+v.masuk+'</td>'+
									'<td>'+(v.satuan !== null ? v.satuan : '')+'</td>'+
									'<td>'+v.no_batch+'</td>'+
									'<td class="center">'+datefmysql(v.ed)+'</td>'+
									'<td><i>'+v.nama_account+'</i></td>'+
									'<td class="right wrapper">'+
										'<button type="button" class="btn btn-secondary btn-xs mr-1" onclick="editStokLogistik('+v.id+', \''+v.nama_barang+'\')"><i class="fas fa-edit"></i></button>'+
										'<button type="button" class="btn btn-secondary btn-xs" onclick="hapusStokLogistik('+v.id+', '+data.page+')"><i class="fas fa-trash-alt"></i></button>'+
									'</td>'+
								'</tr>';
					$('#table-data tbody').append(html)
					no = v.id
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
		getListStokLogistik(page)
	}

	function addToRecordList(id_barang, nama_barang, pembayaran, jumlah, id_kemasan, no_batch, alasan, expired) {
		if (id_barang === '') {
			syams_validation('#barang-auto', 'Nama barang harus dipilih!')
			return false;
		}
		if (id_kemasan === '') {
			syams_validation('#kemasan', 'Kemasan harus dipilih!')
			return false;
		}
		if (jumlah === '' || parseFloat(jumlah) < 0) {
			syams_validation('#jumlah', 'Jumlah harus diisikan dengan nilai >= 0!')
			return false;
		}
		if (alasan === '') {
			syams_validation('#alasan', 'Alasan tidak boleh kosong!')
			return false;
		}
		let jml = $('.rows').length + 1;
		let kemasan = $('#kemasan option:selected').text()
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${jml}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" value="${id_barang}" class="id-barang" id="id-barang${jml}"></td>
				<td>${pembayaran}<input type="hidden" name="pembayaran[]" value="${pembayaran}" class="pembayaran" id="pembayaran${jml}"></td>
				<td class="center">${kemasan}<input type="hidden" name="id_kemasan[]" value="${id_kemasan}" class="id-kemasan" id="id-kemasan${jml}"></td>
				<td class="center">${no_batch}<input type="hidden" name="no_batch[]" value="${no_batch}" class="no-batch" id="no-batch${jml}"></td>
				<td class="center">${expired}<input type="hidden" name="expired[]" value="${expired}" class="expired" id="expired${jml}"></td>
				<td class="center">${jumlah}<input type="hidden" name="jumlah[]" value="${jumlah}" class="jumlah" id="jumlah${jml}"></td>
				<td>${alasan}<input type="hidden" name="alasan[]" value="${alasan}" class="alasan" id="alasan${jml}"></td>
				<td class="center">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-list').append(html)
		$('#alasan').val('Stok Awal Sistem')
		$('#barang-auto, #jumlah, kemasan, #no-batch, #ed').val('')
		$('#s2id_barang-auto a .select2-chosen').html('Pilih Barang...')
	}

	function removeMe(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
		var jumlah = $('.rows').length;
		var col = 0;
		for (i = 1; i <= jumlah; i++) {
			$('.rows:eq('+col+')').children('td:eq(0)').html(i);
			$('.rows:eq('+col+')').children('td:eq(1)').children('.id-barang').attr('id','id-barang'+i);
			$('.rows:eq('+col+')').children('td:eq(2)').children('.id-kemasan').attr('id','id-kemasan'+i);
			$('.rows:eq('+col+')').children('td:eq(3)').children('.no-batch').attr('id','no-batch'+i);
			$('.rows:eq('+col+')').children('td:eq(4)').children('.jumlah').attr('id','jumlah'+i);
			$('.rows:eq('+col+')').children('td:eq(5)').attr('id','ed'+i);
			$('.rows:eq('+col+')').children('td:eq(6)').attr('id','alasan'+i);
			col++;
		}
		
	}

	function konfirmasiSimpanStokLogistik(param) {
		if (param === 'add') {
			let jmlPacking = $('.rows').length;
			if (jmlPacking === 0) {
				swalAlert('warning', 'Validasi', 'Tidak ada barang yang dipilih.')
				return false;
			}
		} else {
			if ($('#jumlah-edit') === '' || parseFloat($('#jumlah-edit')) < 0) {
				syams_validation('#jumlah-edit', 'Jumlah harus diisikan dengan nilai >= 0!')
				return false;
			}
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data stok opname ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				if (param === 'add') {
					simpanStokLogistik()
				} else {
					updateStokLogistik()
				}
			}
		})
	}

	function simpanStokLogistik() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('stok_opname_logistik/api/stok_opname_logistik/simpan_stok_logistik') ?>',
			data: $('#form-stok-opname').serialize(),
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let page = $('#page').val()
				if (data.status) {
					messageAddSuccess()
					getListStokLogistik(page)
					$('#modal-stok-opname').modal('hide')
				} else {
					messageAddFailed()
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed()
			}
		})
	}

	function editStokLogistik(id, nama_barang) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('stok_opname_logistik/api/stok_opname_logistik/get_stok_logistik') ?>/id/' + id,
			success: function(data) {
				$('#id').val(data.id)
				$('#nama-barang').html('<b>'+nama_barang+'</b>')
				$('#jumlah-edit').val(data.masuk)
				$('#no-batch-edit').val(data.no_batch)
				$('#modal-stok-opname-edit').modal('show')
			}
		})
	}

	function updateStokLogistik() {
		$.ajax({
			type: 'PUT',
			url: '<?php echo base_url('stok_opname_logistik/api/stok_opname_logistik/update_stok_logistik') ?>',
			data: $('#form-stok-opname-edit').serialize(),
			success: function(data) {
				let page = $('#page').val()
				if (data.status) {
					messageEditSuccess()
					getListStokLogistik(page)
					$('#modal-stok-opname-edit').modal('hide')
				} else {
					messageEditFailed()
				}
			},
			error: function(e) {
				messageEditFailed()
			}
		})
	}

	function hapusStokLogistik(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin akan menghapus data stok opname ini ?",
			icon: 'warning',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?php echo base_url('stok_opname_logistik/api/stok_opname_logistik/delete_stok_logistik') ?>/id/' + id,
					success: function(data) {
						let page = $('#page').val()
						if (data.status) {
							messageDeleteSuccess()
							getListStokLogistik(page)
						} else {
							messageDeleteFailed()
						}
					},
					error: function(e) {
						messageDeleteFailed()
					}
				})
			}
		})
	}
</script>