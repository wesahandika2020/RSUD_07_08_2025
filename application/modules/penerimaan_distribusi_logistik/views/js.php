<script>
	$(function() {
        getListPenerimaanDistribusi(1)
		$('#btn-search').click(function() {
            resetData()
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#no-distribusi-search').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('inventori_rt/api/inventori_rt_auto/nomor_distribusi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        status: 'all'
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.kode+' - '+data.unit+'<br/>'+datefmysql(data.tanggal);
                return markup;
            }, 
            formatSelection: function(data) {
                return data.kode+' - '+data.unit+'<br/>'+datefmysql(data.tanggal);
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

		$('#btn-add').click(function() {
            dateTimeX('waktu-real', 'html')
            resetData()
            $('input[name=waktu_penerimaan]').attr('id','waktu-penerimaan')
			$('#modal-penerimaan-distribusi').modal('show')
		})
		
		$('#no-distribusi-auto').select2c({
            width: '100%',
            ajax: {
                url: "<?= base_url('inventori_rt/api/inventori_rt_auto/nomor_distribusi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        status: ''
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.kode+' - '+data.unit_kirim+'<br/>'+datefmysql(data.tanggal_dikirim);
                return markup;
            }, 
            formatSelection: function(data) {
				if (data.id !== '') {
					$.ajax({
						type: 'GET',
						url: '<?php echo base_url('distribusi_logistik/api/distribusi_logistik/get_data_distribusi_logistik') ?>/id/' + data.id,
						success: function(data) {
							$('#table-list tbody').empty()
							$.each(data, function(i, v) {
								let html = /* html */ `
									<tr class="rows">
										<td class="center">${(i + 1)}</td>
										<td class="left">${v.nama_barang}</td>
										<td class="right">${v.jumlah_dikirim}</td>
										<td class="left">${v.kemasan}</td>
									</tr>
								`;
								$('#table-list tbody').append(html)
							})
						}
					})
					return data.kode+' - '+data.unit+'<br/>'+datefmysql(data.tanggal);
				} else {
					$('#table-list tbody').empty()
				}
            }
        })

        $('#remove-waktu-real').click(function(){
            $('input[name=waktu_penerimaan]').removeAttr('disabled').val('')
            $('#waktu-penerimaan').datetimepicker({format: 'DD/MM/YYYY HH:mm'})
        })

        $('.select2c-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

        $('#btn-reload').click(function() {
            resetData()
            getListPenerimaanDistribusi(1)
        })
    })
    
    function resetData() {
        $('#no-distribusi-auto').val('')
        $('#s2id_no-distribusi-auto a .select2c-chosen').html('Pilih No. Distribusi...')
        $('#input[type=text], input[type=hidden], select, textarea').val('')
        $('#table-list tbody').empty()
        $('#tanggal-awal').val('<?= date('01/m/Y') ?>')
        $('#tanggal-akhir').val('<?= date('d/m/Y') ?>')
    }

    function getListPenerimaanDistribusi(page) {
        $('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('penerimaan_distribusi_logistik/api/penerimaan_distribusi_logistik/get_list_penerimaan_distribusi') ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListPenerimaanDistribusi(page - 1)
                    return false;
                };
                
                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data tbody').empty()
				$.each(data.data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}</td>
							<td class="wrapper center">${(v.kode_dikirim !== null ? v.kode_dikirim : '-')}</td>
							<td class="left">${v.unit_tujuan}</td>
							<td class="left">${v.nama_barang}</td>
							<td class="right">${v.jumlah}</td>
							<td class="right">${v.jumlah_dikirim}</td>
							<td class="left">${v.kemasan}</td>
							<td class="center"><i>${v.nama_account}</i></td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" onclick
								="deletePenerimaanDistribusi(${v.id})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
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
        getListPenerimaanDistribusi(page)
    }

    function simpanPenerimaanDistribusi() {
        let jmlPacking = $('.rows').length
        if ($('#no-distribusi-auto').val() === '') {
            syams_validation('#no-distribusi-auto', 'Nomor distribusi harus dipilih!')
            return false;
        }
        if (jmlPacking === 0) {
            swalAlert('warning', 'Validasi', 'Tidak ada data distribusi yang dipilih!')
            return false;
        }

        swal.fire({
			title: 'Konfirmasi Penerimaan',
			html: "Apakah anda yakin akan menerima barang distribusi ini ?",
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
                    url: '<?php echo base_url('penerimaan_distribusi_logistik/api/penerimaan_distribusi_logistik/simpan_penerimaan_distribusi') ?>',
                    data: $('#form-penerimaan-distribusi').serialize(),
                    cache: false,
                    dataType:'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        let type = 'Error';
                        if (data.status) {
                            type = 'Success';
                            getListPenerimaanDistribusi(1)
                            $('#modal-penerimaan-distribusi').modal('hide')
                        }
                        messageCustom(data.message, type)
                        setTimeout(() => {
                            location.reload()
                        }, 500)
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan, Gagal menyimpan penerimaan distribusi', 'Error')
                    }
                })
			}
		})
    }

    function deletePenerimaanDistribusi(id) {
        swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin akan menghapus penerimaan barang distribusi ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'DELETE',
                    url: '<?php echo base_url('penerimaan_distribusi_logistik/api/penerimaan_distribusi_logistik/delete_penerimaan_distribusi') ?>/id/' + id,
                    dataType:'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        let type = 'Error';
                        if (data.status) {
                            type = 'Success';
                            getListPenerimaanDistribusi(1)
                        }
                        messageCustom(data.message, type)
                        setTimeout(() => {
                            location.reload()
                        }, 500)
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan, Gagal menghapus penerimaan distribusi', 'Error')
                    }
                })
			}
		})
    }
</script>