<script>
	$(function() {
		getListPenjualan(1, '')

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})
			
		$('#btn-add').click(function() {
			resetData()
			$('#modal-penjualan').modal('show')
		})

		$('#btn-search').click(function() {
			resetData()
			$('#modal-search').modal('show')
		})

		$('#btn-reload').click(function() {
			resetData()
			getListPenjualan(1, '')
		})

		$('#no-rm-search').select2({
			ajax: {
				url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available
	
					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
				return markup;
			},
			formatSelection: function(data) {
				return data.id + ' - ' + data.nama;
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
	
		$('#barang-auto').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/barang_with_stok_auto') ?>",
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
				let view = data.nama + ', <b>Sisa : </b>' + data.sisa + ', Harga : Rp.' + money_format(data.harga_jual)
				if (data.id === '') {
					view = '&nbsp';
				}
				var markup = view;
				return markup;
			}, 
			formatSelection: function(data){
				if (parseFloat(data.sisa) <= 0) {
					$('#barang-auto').val('')
					$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
					swalAlert('warning', 'Validasi', 'Stok Barang yang kosong tidak dapat digunakan!')
					return false;
				}
				$.getJSON('<?= base_url('barang/api/barang/get_kemasan_barang') ?>?id='+data.id, function(data){
					$('#kemasan').html('')
					if (data === null) {
						swalAlert('warning', 'Validasi', 'Kemasan tidak barang tidak tersedia !')
					} else {
						$.each(data, function (index, value) {
							$('#kemasan').append("<option value='"+value.id_kemasan+"'>"+value.nama+"</option>")
						})
					}
				})
				$('#kemasan').focus()
				$('#jumlah').val('1')
				return data.nama+' <b>Sisa : </b> '+data.sisa;
			}
		})
	
		$('#no-rm-auto').select2c({
			ajax: {
				url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available
	
					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
				return markup;
			},
			formatSelection: function(data) {
				$('#pembeli').val(data.nama)
				return data.id + ' - ' + data.nama;
			}
	
		})
	
		$('#add').click(function() {
			let id_barang = $('#barang-auto').val()
			let nama_barang = $('#s2id_barang-auto a .select2c-chosen').html()
			let id_kemasan = $('#kemasan').val()
			let jumlah = $('#jumlah').val()
			let permit = true;
	
			if (id_barang === '') {
				syams_validation('#barang-auto', 'Pilih barang terlebih dahulu'); return false;
			}
			if (id_kemasan === '') {
				syams_validation('#kemasan', 'Pilih kemasan terlebih dahulu'); return false;
			}
			$('.id-barang').each(function(i) {
				if (id_barang === $(this).val()) {
					permit = false;
					swalAlert('warning', 'Validasi', 'Barang dengan nama ' + nama_barang + ' sudah dimasukkan!'); return false;
				} 
			})

			if (permit === true) {
				addNewsRows(id_barang, nama_barang, id_kemasan, jumlah)
			}
	
			$('#barang-auto, #jumlah').val('')
			$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
			$('#kemasan').html('<option value=""></option>')
		})

		$('.select2c-input, .custom-form').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
		
		$('.custom-form').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function resetData() {
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('#tanggal-awal, #tanggal-akhir, #tanggal').val('<?= date('d/m/Y') ?>')
		$('#tanggal-penjualan').val('<?= date('Y-m-d') ?>')
		$('#unit-label').val('<?= $this->session->userdata('unit') ?>')
		$('.select2-chosen').html('')
		$('#barang-auto').val('')
		$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
		$('#no-rm-auto').val('')
		$('#s2id_no-rm-auto a .select2c-chosen').html('Pilih Pasien...')
		$('#table-list tbody').empty()
	}

	function addNewsRows(id_barang, nama_barang, id_kemasan, jumlah) {
		if (id_kemasan === null | id_kemasan === '') {
			swalAlert('warning', 'Validasi', 'Kemasan tidak boleh kosong!'); return false;
		}

		let i = $('.rows').length + 1;
		let kemasan = $('#kemasan option:selected').text()
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${i + 1}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${i}" value="${id_barang}" class="id-barang"></td>
				<td class="left">${kemasan}<input type="hidden" name="kemasan[]" id="kemasan${i}" class="kemasan"></td>
				<td class="center"><input type="text" name="jumlah[]" id="jumlah${i}" value="${jumlah}" class="custom-form jumlah center" placeholder="Jumlah" onkeypress="return hanyaAngka(event)"></td>
 				<td class="right"><span id="hargajual${i}"></span><input type="hidden" name="harga_jual[]" id="hja${i}" class="custom-form hja right"></td>
 				<td class="center"><input type="text" name="diskon_pr[]" id="diskon-pr${i}" class="custom-form diskon-pr right" onblur="hitungDiscRp(${i})" value="0"></td>
 				<td class="center"><input type="text" name="diskon_rp[]" id="diskon-rp${i}" class="custom-form diskon-rp right" onblur="hitungDiscPr(${i})" value="0"></td>
				<td class="center"><input type="text" name="subtotal[]" id="subtotal${i}" readonly class="custom-form subtotal right"></td>
				<td class="wrapper right">
					<button type="button" class="btn btn-danger btn-xs" onclick="removeElement(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-list tbody').append(html)
		$.ajax({
            url: '<?= base_url('pelayanan/api/pelayanan/get_detail_harga_barang_penjualan') ?>?id=' + id_barang + '&id_kemasan=' + id_kemasan,
            dataType: 'JSON',
            cache: false,
            success: function(data) {
				var subtotal = money_format(data.harga_jual_nr * jumlah)
                $('#hargajual' + i).html(money_format(data.harga_jual_nr))
                $('#hja' + i).val(money_format(data.harga_jual_nr))
                $('#subtotal' + i).val(subtotal)
                $('#kemasan' + i).val(data.id_packing)
                hitungEstimasi()
            }
		})
		$('#jumlah' + i).keyup(function() {
            var jum = parseFloat($(this).val())
            var hrg = parseFloat(money_format_save($('#hargajual' + i).html()))
            var disc = parseFloat(money_format_save($('#diskon-rp' + i).val()))
			var subtotal = jum * (hrg - disc)
            $('#subtotal' + i).val(money_format(subtotal))
            hitungEstimasi()
        });
	}

	function hitungEstimasi() {
        var jml_baris = $('.rows').length;
        var estimasi = 0;
        for (i = 1; i <= jml_baris; i++) {
            var subtotal = parseFloat(currencyToNumber($('#subtotal' + i).val()))
            estimasi = estimasi + subtotal;
        }
        var jasafarmasi = (($('#jasa-farmasi').val() !== '') ? $('#jasa-farmasi').val() : '0.00');
        
        var jasa  = parseFloat(currencyToNumber(jasafarmasi))
		var total = estimasi + jasa;
        $('#total').val(estimasi)
        $('#estimasi').html(money_format(total))
        hitungKembali()
    }

	function hitungKembali() {
        var total   = currencyToNumber($('#estimasi').html())
        var tunai   = currencyToNumber($('#tunai').val())
        var kembali = tunai - total;
        if (kembali < 0) {
            $('#kembali').html('<i>Pembayaran kurang</i>')
        } else {
            $('#kembali').html(numberToCurrency(kembali))
        }
	}
	
	function hitungDiscRp(i) {
		var diskon_pr = $('#diskon-pr' + i).val() / 100;
		var harga_jual= parseFloat(currencyToNumber($('#hja' + i).val()))
        var jumlah    = parseFloat($('#jumlah' + i).val())
		var disc_rp   = diskon_pr * harga_jual;
		$('#diskon-rp' + i).val(money_format(disc_rp))
		
		var subtotal  = (harga_jual - disc_rp) * jumlah;
        $('#subtotal' + i).val(money_format(subtotal))
        hitungEstimasi()
    }
    
    function hitungDiscPr(i) {
        var diskon_rp = parseFloat(currencyToNumber($('#diskon-rp' + i).val()))
        var harga_jual= parseFloat(currencyToNumber($('#hja' + i).val()))
        var jumlah    = parseFloat($('#jumlah' + i).val())
        var disc_pr   = (diskon_rp / harga_jual) * 100;
        $('#diskon-pr' + i).val(roundToTwo(disc_pr))
        
        var subtotal  = (harga_jual - diskon_rp) * jumlah;
        $('#subtotal' + i).val(money_format(subtotal))
        hitungEstimasi()
	}
	
	function removeElement(el) {
        
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jumlah = $('.rows').length;
        var col = 0;
        for (i = jumlah; i >= 1; i--) {
            $('.rows:eq('+col+')').children('td:eq(0)').html(i)
            $('.rows:eq('+col+')').children('td:eq(1)').children('.id-barang').attr('id','id-barang'+i)
            $('.rows:eq('+col+')').children('td:eq(2)').children('.kemasan').attr('id','kemasan'+i)
            $('.rows:eq('+col+')').children('td:eq(3)').children('.jumlah').attr('id','jumlah'+i)
            $('.rows:eq('+col+')').children('td:eq(4)').children('span').attr('id','hargajual'+i)
            $('.rows:eq('+col+')').children('td:eq(4)').children('.hargajual').attr('id','hja'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.diskon-pr').attr('id','diskon-pr'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.diskon-pr').attr('onblur','hitungDiscRp('+i+')')
            $('.rows:eq('+col+')').children('td:eq(6)').children('.diskon-rp').attr('id','diskon-rp'+i)
            $('.rows:eq('+col+')').children('td:eq(6)').children('.diskon-rp').attr('onblur','hitungDiscPr('+i+')')
            $('.rows:eq('+col+')').children('td:eq(7)').attr('id','subtotal'+i)
            
            col++;
        }
        hitungTotal();
        hitungEstimasi();
	}
	
	function hitungTotal() {
        var jml = $('rows').length;
        var ttl = 0;
        if (jml > 0) {
            for (i = 1; i <= jml; i++) {
                var subtotal = currencyToNumber($('#subtotal' + i).val())
                //alert(subtotal)
                ttl = ttl + subtotal;
            }
            $('#total').val(Math.ceil(ttl))
            $('#estimasi').html(money_format(ttl))
        } else {
            $('#estimasi').html('0')
        }
	}
	
	function konfirmasiSimpanPenjualan() {
		let jmlPacking = $('.rows').length;
		if (jmlPacking === 0) {
			swalAlert('warning', 'Validasi', 'Kemasan barang harus diisi minimal 1 data!')
			return false;
		}
		if ($('#pembeli').val() === '') {
			syams_validation('#pembeli', 'Nama pembeli tidak boleh kosong!')
			$('#pembeli').focus()
			return false;
		}
		if ($('#jasa-farmasi').val() === '') {
			syams_validation('#jasa-farmasi', 'Jasa farmasi harus diisi, jika tidak ada isikan 0!')
			$('#jasa-farmasi').focus()
			return false;
		}

		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data penjualan ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanPenjualan()
			}
		})
	}

	function simpanPenjualan() {
		let update = '';
		if($('#id').val() !== ''){
			update = '/id/'+ $('#id').val()
		}
						
		$.ajax({
			type: 'POST',
			url: '<?= base_url("penjualan_non_resep/api/penjualan_non_resep/simpan_penjualan") ?>' + update,
			data: $('#form-penjualan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let type = 'Error';
				if (data.status) {
					type = 'Success';
					getListPenjualan(1, data.id_penjualan)
					$('#modal-penjualan').modal('hide')
				} else {
					getListPenjualan(1, '')
				}
				messageCustom(data.message, type)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan data penjualan non resep', 'Error')
			},
		})
	}

	function getListPenjualan(page, id) {
		$('#page').val(page)
		$.ajax({
			type: 'GET',
			url: '<?= base_url("penjualan_non_resep/api/penjualan_non_resep/get_list_penjualan") ?>/page/' + page + '/id/' + id,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPenjualan(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				$('#table-data tbody').empty()
				
				$.each(data.data, function(i, v) {
					
					let status_terbayar = '';
					if (v.status_pembayaran !== '0') {
						status_terbayar = '<h5><span class="label label-success"><i class="fas fa-check-circle mr-1"></i>Lunas</span></h5>';
					}

					let table = '<i>Tidak Ada Data!</i>';
					if (v.detail_obat.length > 0) {
						table = /* html */ `
							<table class=table-list>
								<tr>
									<th width=3% style='text-align:center'>No.</th>
									<th width=50%>Nama Barang</th>
									<th width=10%>QTY</th>
									<th width=10% style='text-align:right'>Harga</th>
									<th width=10% style='text-align:right'>Disc</th>
									<th width=10% style='text-align:right'>Subtotal</th>
								</tr>`;
						
						let total = 0;
						$.each(v.detail_obat, function(x, val) {
							table += /* html */ `
								<tr>
									<td style='text-align:center'>${(++x)}</td>
									<td>${val.nama_barang}</td>
									<td>${val.qty}</td>
									<td style='text-align:right'>${money_format(val.harga_jual)}</td>
									<td style='text-align:right'>${money_format(val.disc_rp)}</td>
									<td style='text-align:right'>${money_format(val.subtotal)}</td>
								</tr>
							`;

							total += parseFloat(val.subtotal)
						})

						table += /* html */ `
							<tr style='background:#F4F4F4'>
								<td colspan=5 style='text-align:right'>TOTAL BARANG</td>
								<td style='text-align:right'>${money_format(total)}</td>
							</tr>
							<tr style='background:#F4F4F4'>
								<td colspan=5 style='text-align:right'>JASA FARMASI</td>
								<td style='text-align:right'>${money_format(v.toeslag)}</td>
							</tr>
							<tr style='background:#F4F4F4'>
								<td colspan=5 style='text-align:right'>TOTAL</td>
								<td style='text-align:right'>${money_format(parseFloat(v.toeslag) + total)}</td>
							</tr>
						`;

						table += /* html */ `
							</table>
						`;
					}

					let ID = '';
					let NUM = 0;
					if (ID !== v.id) {
						NUM++;
					}

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${datetimefmysql(v.waktu)}</td>
							<td class="wrapper center">${v.id_pasien !== null ? v.id_pasien : '-'}</td>
							<td class="left">${v.pembeli}</td>
							<td class="left">${((v.nama_group.length <= 60) ? v.nama_group : v.nama_group.substr(0, 60) + '...')}</td>
							<td class="right">${money_format(v.diskon)}</td>
							<td class="right">${money_format(v.toeslag)}</td>
							<td class="right">${money_format(parseFloat(v.total) + parseFloat(v.toeslag))}</td>
							<td class="center wrapper">${status_terbayar}</td>
							<td class="right">
								<button type="button" class="btn btn-secondary btn-xs" data-trigger="focus" data-toggle="popover" title="Nama : <b>${v.id_pasien}</b> ${v.pembeli}, Tanggal : ${datetimefmysql(v.waktu)}" data-content="${table}"><i class="fas fa-eye"></i></button>
								<div class="btn-group">
									<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown">
										<i class="fas fa-fw fa-cog"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="validationUpdate(${v.id}, ${data.page}, 'update')"><i class="fas fa-fw fa-edit mr-1"></i>Edit Data Penjualan</a>
										<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="printBuktiPenjualan(${v.id})"><i class="fas fa-fw fa-print mr-1"></i>Cetak Bukti Struk</a>
										<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="validationUpdate(${v.id}, ${data.page}, 'delete')"><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus Data Penjualan</a>
									</div>
								</div>
							</td>
						</tr>
					`;

					ID = v.id;
					$('#table-data tbody').append(html)

					let options = {
						placement: function (context, source) {
                            var position = $(source).position();

                            if (position.left > 515) {
                                return "left";
                            }

                            if (position.left < 515) {
                                return "right";
                            }

                            if (position.top < 110){
                                return "bottom";
                            }

                            return "top";
                        }, 
                        trigger: "hover",
						html : true,
						sanitize: false,
					}
					$('[data-toggle="popover"]').popover(options)
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

	function paging(page) {
		getListPenjualan(page)
	}

	function validationUpdate(id, page, type) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('pelayanan/api/pelayanan/check_history_pembayaran') ?>/table/sm_penjualan/id/' + id,
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('warning', 'Validasi', data.message)
				} else {
					if (type === 'update') {
						editDataPenjualan(id)
					} else if (type === 'delete') [
						deleteDataPenjualan(id, page)
					]
				}
			},
			complete: function() {
				hideLoader()
			}
		})
	}

	function editDataPenjualan(id) {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('pelayanan/api/pelayanan/get_data_penjualan') ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#id').val(id)
				let row = data.data[0]

				$('#no-rm-auto').val(row.id_pasien)
				$('#s2id_no-rm-auto a .select2c-chosen').html(row.nama_pasien)
				$('#pembeli').val(row.pembeli)
				$('#jasa-farmasi').val(money_format(row.toeslag))
				$('#tanggal-penjualan').val(datefmysql(row.tanggal_penjualan))
				$('#tanggal').val(datefmysql(row.tanggal_penjualan))
				$('#unit-label').val('<?php echo $this->session->userdata('unit') ?>')
				
				$('#table-list tbody').empty()
				$.each(data.data, function(i, val)	 {
					let html = /* html */ `
						<tr class="rows">
							<td class="center">${++i}</td>
							<td>${val.nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${i}" value="${val.id_barang}" class="id-barang"></td>
							<td class="left">${val.kemasan}<input type="hidden" name="kemasan[]" id="kemasan${i}" value="${val.id_kemasan}" class="kemasan"></td>
							<td class="center"><input type="text" name="jumlah[]" id="jumlah${i}" value="${val.qty}" class="custom-form jumlah center" placeholder="Jumlah" onkeypress="return hanyaAngka(event)"></td>
							<td class="right"><span id="hargajual${i}">${money_format(val.harga_jual)}</span><input type="hidden" name="harga_jual[]" id="hja${i}" value="${money_format(val.harga_jual)}" class="custom-form hja right"></td>
							<td class="center"><input type="text" name="diskon_pr[]" id="diskon-pr${i}" class="custom-form diskon-pr right" onblur="hitungDiscRp(${i})" value="${val.disc_pr}"></td>
							<td class="center"><input type="text" name="diskon_rp[]" id="diskon-rp${i}" class="custom-form diskon-rp right" onblur="hitungDiscPr(${i})" value="${money_format(val.disc_rp)}"></td>
							<td class="center"><input type="text" name="subtotal[]" id="subtotal${i}" value="${money_format((parseFloat(val.harga_jual) - parseFloat(val.disc_rp)) * val.qty)}" readonly class="custom-form subtotal right"></td>
							<td class="wrapper right">
								<button type="button" class="btn btn-danger btn-xs" onclick="removeElement(this)"><i class="fas fa-trash-alt"></i></button>
							</td>
						</tr>
					`;

					$('#table-list tbody').append(html)
					$('#jumlah' + i).keyup(function() {
						var jum = parseFloat($(this).val())
						var hrg = parseFloat(money_format_save($('#hargajual' + i).html()))
						var disc = parseFloat(money_format_save($('#diskon-rp' + i).val()))
						var subtotal = jum * (hrg - disc)
						$('#subtotal' + i).val(money_format(subtotal))
						hitungEstimasi()
					})
				})
				hitungTotal()
			},
			complete: function() {
				hitungEstimasi()
				$('#modal-penjualan').modal('show')
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function deleteDataPenjualan(id) {
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "Apakah anda yakin akan <br>menghapus data penjualan non resep ini ?",
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
					url: '<?= base_url("pelayanan/api/pelayanan/delete_data_penjualan") ?>' + '/id/' + id,
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
						getListPenjualan(page, '')
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus data detail penerimaan', 'Error')
					},
				})
			}
		})
	}

	function printBuktiPenjualan(id) {
		var wWidth = $(window).width();
        var dWidth = wWidth * 1;
        var wHeight= $(window).height();
        var dHeight= wHeight * 1;
        var x = screen.width/2 - dWidth/2;
        var y = screen.height/2 - dHeight/2;
        return window.open('<?= base_url() ?>penjualan_non_resep/printing_penjualan_non_resep/?id='+id,'Cetak Penjualan Non Resep','width='+dWidth+', height='+dHeight+', left='+x+',top='+y);
	}
</script>