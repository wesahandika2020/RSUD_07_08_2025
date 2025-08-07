<script>
	$(function() {
		getListPenerimaanReturDistribusi(1)
		$('#btn-add').click(function() {
            dateTimeX('waktu-real', 'html')
            resetData()
            $('input[name=waktu_retur_penerimaan]').attr('id','waktu-retur-penerimaan')
			$('#modal-penerimaan-retur-distribusi').modal('show')
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
			getListPenerimaanReturDistribusi(1)
		})

		$('#remove-waktu-real').click(function(){
            $('input[name=waktu_penerimaan_retur_distribusi]').removeAttr('disabled').val('')
            $('#waktu-penerimaan-retur-distribusi').datetimepicker({format: 'DD/MM/YYYY HH:mm'})
        })

        $('.select2c-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
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

		$('#no-retur-distribusi-auto').select2c({
            width: '100%',
            ajax: {
                url: "<?= base_url('inventory/api/inventory_auto/no_retur_distribusi_auto') ?>",
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
                var markup = 'Nomor: '+data.id+', Unit '+data.unit_retur+', Waktu '+datetimefmysql(data.waktu);
                if (data.id === '') {
                    markup = '&nbsp;';
                }
                return markup;
            }, 
            formatSelection: function(data) {
                if (data.id !== '') {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url('penerimaan_retur_distribusi/api/penerimaan_retur_distribusi/get_penerimaan_retur_distribusi') ?>/id/'+data.id,
                        success: function(data) {
                            $('#table-list tbody').html('');
                            $.each(data, function(i, val) {
                                $.each(val.detail, function(j, v) {
                                    var str = '<tr class="rows">'+
                                            '<td align=center>'+(j+1)+'</td>'+
                                            '<td>'+v.nama_barang+'</td>'+
                                            '<td align="right">'+v.jumlah+'</td>'+
                                            // '<td>'+v.kemasan+'</td>'+
                                            '</tr>';
                                    $('#table-list tbody').append(str);
                                });
                            });
                        }
                    });
                    var markup = 'Nomor: '+data.id+', Unit '+data.unit_retur+', Waktu '+datetimefmysql(data.waktu);
                    if (data.id === '') {
                        markup = '&nbsp;';
                    }
                    return markup;
                } else {
                    $('#table-list tbody').empty();
                }
            }
        })
	})

	function resetData() {
		$('#table-list tbody').empty()
		$('#form-penerimaan-retur-distribusi')[0].reset()
		$('#s2id_unit a .select2-chosen').html('Pilih Retur Dari...')
		$('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
	}

	function getListPenerimaanReturDistribusi(page) {
        $('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('penerimaan_retur_distribusi/api/penerimaan_retur_distribusi/get_list_penerimaan_retur_distribusi') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListPenerimaanReturDistribusi(page - 1)
                    return false;
                };
                
                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let html = '<tr>'+
									'<td class="center">'+((i + 1) + ((data.page - 1) * (data.limit)))+'</td>'+
									'<td>'+datetimefmysql(v.waktu_diterima)+'</td>'+
									'<td class="center">'+v.id+'</td>'+
									'<td>'+v.unit_retur+'</td>'+
									'<td>'+datetimefmysql(v.waktu)+'</td>'+
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
									'<td><i>'+v.nama_account+'</i></td>'+
								'</tr>';
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
        getListPenerimaanReturDistribusi(page)
    }

    function simpanPenerimaanReturDistribusi() {
        let jmlPacking = $('.rows').length
        if ($('#no-retur-distribusi-auto').val() === '') {
            syams_validation('#no-retur-distribusi-auto', 'Nomor retur distribusi harus dipilih!')
            return false;
        }
        if (jmlPacking === 0) {
            swalAlert('warning', 'Validasi', 'Tidak ada data retur distribusi yang dipilih!')
            return false;
        }

        swal.fire({
			title: 'Konfirmasi Retur Penerimaan',
			html: "Apakah anda yakin akan menerima retur barang distribusi ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('penerimaan_retur_distribusi/api/penerimaan_retur_distribusi/simpan_penerimaan_retur_distribusi') ?>',
                    data: $('#form-penerimaan-retur-distribusi').serialize(),
                    cache: false,
                    dataType:'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        let type = 'Error';
                        if (data.status) {
                            type = 'Success';
                            getListPenerimaanReturDistribusi(1)
                            $('#modal-penerimaan-retur-distribusi').modal('hide')
                        }
                        messageCustom(data.message, type)
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan, Gagal menyimpan penerimaan retur distribusi', 'Error')
                    }
                })
			}
		})
    }
</script>