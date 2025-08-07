<script>
	$(function() {
		getListReturDistribusi(1)
		$('#btn-add').click(function() {
			resetData()
			$('#modal-retur-distribusi').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: "dd/mm/yyyy"
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			resetData()
			getListReturDistribusi(1)
		})

		$('#unit').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
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
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        })

		$('#barang').select2({
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
                $.getJSON('<?= base_url('barang/api/barang/get_ed_barang') ?>?id_barang='+data.id, function(data){
                    $('#ed').html('')
                    if (data === null) {
						$('#ed').append("<option value=''>Pilih Tanggal...</option>")
                    } else {
                        $.each(data, function (index, value) {
                            $('#ed').append("<option value='"+value.ed+"'>"+datefmysql(value.ed)+"</option>").change()
                        })
                    }
                })
                $('#kemasan').focus()
                $('#sisa').val('1')
                return data.nama;
            }
		})

		$('.form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control, select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#ed').change(function() {
			let id_barang = $('#barang').val()
			let ed = $('#ed').val()
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('inventory/api/inventory/sisa_barang_koreksi_stok') ?>',
				data: 'id_barang=' + id_barang + '&ed=' + ed,
				dataType: 'JSON',
				success: function(data) {
					if (ed !== '') {
						$('#sisa').val(data.sisa)
					} else {
						$('#sisa').val('0')
					}
				}
			})
		})

		$('#tambahkan').click(function() {
			let id_barang = $('#barang').val()
			let nama_barang = $('#s2id_barang a .select2-chosen').html()
			let ed = datefmysql($('#ed').val())
			let sisa = $('#sisa').val()
			let jumlah = $('#jumlah').val()
			let alasan = $('#alasan').val()

			entriNewTableRow(id_barang, nama_barang, ed, sisa, jumlah, alasan)
		})
	})

	function resetData() {
		$('#table-list tbody').empty()
		$('#form-retur-distribusi')[0].reset()
		$('#s2id_unit a .select2-chosen').html('Pilih Unit Retur...')
		$('#s2id_barang a .select2-chosen').html('Pilih Barang...')
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
	}

	function getListReturDistribusi(page, id_retur_distribusi) {
		var id = '';
		if (id_retur_distribusi !== undefined) {
			id = id_retur_distribusi;
		}
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('retur_distribusi/api/retur_distribusi/get_list_retur_distribusi/page/') ?>' + page + '/id/' + id ,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
				$('#page').val(page)
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListReturDistribusi(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let html = '<tr>'+
									'<td class="center">'+((i + 1) + ((data.page - 1) * (data.limit)))+'</td>'+
									'<td>'+datetimefmysql(v.waktu)+'</td>'+
									'<td class="center">'+v.id+'</td>'+
									'<td>'+v.unit_penerima+'</td>'+
									'<td><ul>';
									$.each(v.detail, function(j, x) {
										html += '<li>'+x.nama_barang+' ('+x.jumlah+')</li>';
									})
									html += '</ul></td>'+
									'<td class="center">';
									$.each(v.detail, function(j, x) {
										html += datefmysql(x.ed) + '<br>';
									})
									html += '</td>'+
									'<td><ul>';
									$.each(v.detail, function(j, x) {
										html += '<li>'+x.alasan+'</li>';
									})
									html += '</ul></td>'+
									'<td><i>'+v.account+'</i></td>'+
									// '<td class="right wrapper">'+
									// 	'<button type="button" class="btn btn-secondary btn-xs" onclick="hapusReturDistribusi('+v.id+', '+data.page+')"><i class="fas fa-trash-alt"></i></button>'+
									// '</td>'+
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
		getListReturDistribusi(page)
	}

	function entriNewTableRow(id_barang, nama_barang, ed, sisa, jumlah, alasan) {
		if (id_barang === '') {
			syams_validation('#barang', 'Pilih barang terlebih dahulu!')
			return false;
		}
		syams_validation_remove('#barang')
		if (ed === '') {
			syams_validation('#ed', 'Expired Date tidak boleh kosong!')
			return false;
		}
		syams_validation_remove('#ed')
		if (jumlah === '') {
			syams_validation('#jumlah', 'jumlah tidak boleh kosong!')
			return false;
		}
		syams_validation_remove('#jumlah')
		if (alasan === '') {
			syams_validation('#alasan', 'Alasan tidak boleh kosong!')
			return false;
		}
		syams_validation_remove('#alasan')
		let jml = $('.rows').length + 1
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${jml}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" value="${id_barang}" class="id-barang" id="id-barang${jml}"></td>
				<td>${ed}<input type="hidden" name="ed[]" value="${date2mysql(ed)}" class="ed" id="ed${jml}"></td>
				<td>${sisa}<input type="hidden" name="sisa[]" value="${sisa}" class="sisa" id="sisa${jml}"></td>
				<td>${jumlah}<input type="hidden" name="jumlah[]" value="${jumlah}" class="jumlah" id="sisa${jml}"></td>
				<td>${alasan}<input type="hidden" name="alasan[]" value="${alasan}" class="alasan" id="alasan${jml}"></td>
				<td class="center">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-list tbody').append(html)
		$('#barang, #ed, #sisa, #jumlah, #alasan').val('')
		$('#s2id_barang a .select2-chosen').html('Pilih Barang...')
	}

	function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent)
        var jumlah = $('.rows').length;
        var col = 0;
        for (i = 1; i <= jumlah; i++) {
            $('.rows:eq('+col+')').children('td:eq(0)').html(i)
            $('.rows:eq('+col+')').children('td:eq(1)').children('.id-barang').attr('id','id-barang'+i)
            $('.rows:eq('+col+')').children('td:eq(2)').children('.ed').attr('id','ed'+i)
            $('.rows:eq('+col+')').children('td:eq(3)').children('.sisa').attr('id','sisa'+i)
            $('.rows:eq('+col+')').children('td:eq(4)').children('.jumlah').attr('id','jumlah'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.alasan').attr('id','alasan'+i)
            col++;
        }
    }

	function simpanReturDistribusi() {
		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data retur distribusi ini ?",
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
					url: '<?= base_url("retur_distribusi/api/retur_distribusi/simpan_retur_distribusi") ?>',
					data: $('#form-retur-distribusi').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						let page = $('#page').val()
						if (data.status) {
							type = 'Success';
							getListReturDistribusi(page)
							$('#modal-retur-distribusi').modal('hide')
						}
						messageCustom(data.message, type)
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menyimpan data retur distribusi', 'Error')
					},
				})
			}
		})
	}
</script>