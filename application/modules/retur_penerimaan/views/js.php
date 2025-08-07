<script>
	$(function() {
		getListReturPenerimaan(1)

		$('#tanggal-retur, #tempo, #tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#btn-add').click(function() {
			reloadData()
			$('#modal-retur-penerimaan').modal('show')
		})

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('.form-control, .custom-form').keyup(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this)
            }
		})
		
		$('.select2c-input, .select2-input, .custom-form').change(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this)
            }
        })

		$('#supplier-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/supplier_auto') ?>",
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

		$('#no-faktur-auto').select2c({
            ajax: {
                url: "<?= base_url('inventory/api/inventory_auto/nomor_faktur_penerimaan_auto') ?>",
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
                var markup = data.no_faktur+'<br/>'+data.supplier;
                return markup;
            }, 
            formatSelection: function(data){
				if (data.id !== '') {
					$('#table-list tbody').empty()
					$('#supplier').val(data.supplier)
					$('#id-supplier').val(data.id_supplier)
					$('#id-penerimaan').val(data.id_penerimaan)
					getListPenerimaan(data.id)
				}
                
                return data.no_faktur;
            }
        })
		
		$('#btn-reload').click(function() {
			reloadData()
			getListReturPenerimaan(1)
		})
	})

	function getListPenerimaan(id_penerimaan) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('inventory/api/inventory/get_detail_penerimaan') ?>/id/' + id_penerimaan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(result) {
				$.each(result, function(i, data) {
					let html = /* html */ `
						<tr class="rows">
							<td class="center">${i + 1}</td>
							<td>${data.nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${i}" value="${data.id_barang}" class="id-barang"></td>
							<td class="center">${data.kemasan}<input type="hidden" name="id_kemasan[]" id="id-kemasan${i}" value="${data.id_kemasan}" class="id-kemasan"></td>
							<td><input type="text" name="nobatch[]" id="nobatch${i}" value="${data.no_batch}" class="custom-form nobatch" readonly></td>
							<td class="center"><input type="text" name="ed[]" id="ed${i}" value="${datefmysql(data.expired)}" class="custom-form ed" readonly></td>
							<td class="center"><input type="text" name="jml_asli[]" id="jml-asli${i}" class="custom-form jml-asli center" placeholder="Jumlah" onkeypress="return hanyaAngka(event)" value="${data.jumlah}" readonly></td>
							<td class="center"><input type="text" name="jml[]" id="jml${i}" class="custom-form jml center" placeholder="Jumlah" onkeypress="return hanyaAngka(event)" value="${data.jumlah}"></td>
							<td class="center"><input type="text" name="hpp[]" id="hpp${i}" class="custom-form hpp right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)" value="${money_format(data.harga)}" readonly></td>
							<td class="center"><input type="text" name="diskon_rp[]" id="disc-rp${i}" class="custom-form disc-rp right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)" value="${money_format(data.diskon_rupiah)}" readonly></td>
							<td class="center"><input type="text" name="diskon_pr[]" id="disc-pr${i}" class="custom-form disc-pr center" onkeypress="return hanyaAngka(event)" value="${money_format(data.diskon_persen)}" readonly></td>
							<td class="center"><input type="text" name="keterangan[]" id="keterangan${i}" class="custom-form keterangan" placeholder="Keterangan Retur..."></td>
							<td class="wrapper right">
								<button type="button" class="btn btn-danger btn-xs" onclick="removeElement(this);"><i class="fas fa-trash-alt"></i></button>
							</td>
						</tr>
					`;
					$('#table-list tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function removeElement(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent)
        var jumlah = $('.rows').length-1;
        var col = 0;
        for (i = 0; i <= jumlah; i++) {
            $('.rows:eq('+col+')').children('td:eq(0)').html(i+1)
            $('.rows:eq('+col+')').children('td:eq(2)').children('.id-barang').attr('id','id-barang'+i)
            $('.rows:eq('+col+')').children('td:eq(3)').children('.id-kemasan').attr('id','id-kemasan'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.nobatch').attr('id','nobatch'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.ed').attr('id','ed'+i)
            $('.rows:eq('+col+')').children('td:eq(6)').children('.jml-asli').attr('id','jml-asli'+i)
            $('.rows:eq('+col+')').children('td:eq(6)').children('.jml').attr('id','jml'+i)
            $('.rows:eq('+col+')').children('td:eq(7)').children('.hpp').attr('id','hpp'+i)
            $('.rows:eq('+col+')').children('td:eq(8)').children('.disc-rp').attr('id','disc-rp'+i)
            $('.rows:eq('+col+')').children('td:eq(9)').children('.disc-pr').attr('id','disc-pr'+i)
            $('.rows:eq('+col+')').children('td:eq(10)').children('.keterangan').attr('id','keterangan'+i)
            col++;
        }
    }

	function reloadData() {
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('#table-list tbody').empty()
		$('#no-faktur-auto').val('')
		$('#s2id_no-faktur-auto a .select2c-chosen').html('Pilih Faktur...')
		$('#tanggal-retur').val('<?= date('d/m/Y') ?>')
		syams_validation_remove('.select2-input')
		syams_validation_remove('.custom-form')
	}

	function getListReturPenerimaan(page) {
		$('#page-now').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("retur_penerimaan/api/retur_penerimaan/get_list_retur_penerimaan") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListReturPenerimaan(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				
				$.each(data.data, function(i, v) {

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${datefmysql(v.tanggal)}</td>
							<td>${v.no_faktur}</td>
							<td>${v.supplier}</td>
							<td>${v.nama_barang}</td>
							<td class="center">${v.jumlah}</td>
							<td class="center">${v.kemasan}</td>
							<td class="center">${datefmysql(v.expired)}</td>
							<td class="right">${v.diskon_pr}</td>
                            <td class="right">${money_format(v.diskon_rp)}</td>
							<td class="right wrapper">
								<button type="button" class="btn btn-secondary btn-xs" onclick="cetakReturPenerimaan(${v.id})"><i class="fas fa-print"></i></button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deleteReturPenerimaan(${v.id}, ${data.page})"><i class="fas fa-trash-alt"></i></button>
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
			},
		})
	}

	function paging (page) {
		getListReturPenerimaan(page)
	}

	function simpanReturPenerimaan()
	{
		if ($('#no-faktur-auto').val() === '') {
			syams_validation('#no-faktur-auto', 'Silahkan Pilih No. Faktur terlebih dahulu')
			return false;
		}
		let jml = $('.rows').length;
		if (jml === 0) {
			swalAlert('warning', 'Validasi', 'Kemasan Barang harus diisi minimal 1 data!');
			return false;
		}
		for (let i = 0; i < jml; i++) {
			if ($('#jml-asli' + i).val() < $('#jml' + i).val()) {
				swalAlert('warning', 'Validasi', 'Jumlah barang yang diretur tidak boleh melebihi jumlah barang yang diterima!');
				return false;
			}
			if ($('#keterangan' + i).val() === '') {
				syams_validation('#keterangan' + i, 'Keterangan retur harap diisi!')
				return false;
			}
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data retur penerimaan ini ?",
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
					url: '<?php echo base_url('retur_penerimaan/api/retur_penerimaan/simpan_retur_penerimaan') ?>',
					data: $('#form-retur-penerimaan').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageAddSuccess()
							getListReturPenerimaan(1);
							$('#modal-retur-penerimaan').modal('hide')
						} else {
							messageAddFailed()
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menyimpan retur penerimaan', 'Error')
					}
				})
			}
		})
	}

	function deleteReturPenerimaan(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin akan menghapus data retur penerimaan ini ?",
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
					url: '<?php echo base_url('retur_penerimaan/api/retur_penerimaan/delete_retur_penerimaan') ?>/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageDeleteSuccess()
							getListReturPenerimaan(page);
						} else {
							messageDeleteFailed()
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus retur penerimaan', 'Error')
					}
				})
			}
		})
	}

	function cetakReturPenerimaan(id) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight= $(window).height();
		let dHeight= wHeight * 1;
		let x = screen.width/2 - dWidth/2;
		let y = screen.height/2 - dHeight/2;
		window.open('<?= base_url() ?>retur_penerimaan/printing_bukti_retur_penerimaan?id=' + id,'Cetak Bukti Retur Penerimaan Barang','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}
</script>