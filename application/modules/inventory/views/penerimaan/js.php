<script>
	$(function () {
		$.cookie('syam_cookie', '<?= UPDATE_KEY ?>')
		$('#tanggal').datetimepicker({
			format: 'DD/MM/YYYY HH:mm'
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})

		$('#jatuh-tempo').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#no-penerimaan, input[name="subtotal[]"]').keypress(function(e) {
			e.preventDefault();
		});
	
		$('#supplier-auto').select2c({
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
	
		$('#barang-auto').select2c({
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
                // var markup = data.nama;
                var markup = data.nama+' '+(data.kekuatan !== null ? data.kekuatan: '')+' '+(data.satuan_kekuatan !== null ? data.satuan_kekuatan: '')+' '+(data.golongan_darah !== null ? ' <i>Gol. Darah ' + data.golongan_darah + '</i>' : '') +' '+(data.rhesus !== null ? ' <i>Rhesus ' + data.rhesus + '</i>': '');
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
                return data.nama+' '+(data.kekuatan !== null ? data.kekuatan: '')+' '+(data.satuan_kekuatan !== null ? data.satuan_kekuatan: '')+' '+(data.golongan_darah !== null ? ' <i>Gol. Darah ' + data.golongan_darah + '</i>' : '') +' '+(data.rhesus !== null ? ' <i>Rhesus ' + data.rhesus + '</i>': '');
            }
		})
		
		$('#jumlah').keydown(function(e) {
            if (e.keyCode === 13) {
                $('#add').click()
            }
		})
		
		$('#add').click(function() {
            var id_barang      = $('#barang-auto').val()
            var nama_barang    = $('#s2id_barang-auto a .select2c-chosen').html()
            var jumlah      = $('#jumlah').val()
            var id_kemasan  = $('#kemasan').val()
            if ($('#kategori-barang').val() === '') {
                syams_validation('#kategori-barang', 'Jenis barang harus dipilih !'); return false;
            }
            if (id_barang === '') {
                syams_validation('#barang-auto','Nama barang harus dipilih !'); return false;
            }
            if (id_kemasan === '') {
                syams_validation('#kemasan', 'Nama kemasan harus dipilih !'); return false;
            }
            if (jumlah === '') {
                syams_validation('#jumlah', 'Jumlah tidak boleh kosong !'); return false;
            }
            addNewRows(id_barang, nama_barang, jumlah, id_kemasan)
		})
		
		$('.custom-form, .select2c-input').change(function() {
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

	function addNewRows(id_barang, nama_barang, jumlah, id_kemasan) {
		if (id_kemasan === null | id_kemasan === '') {
			swalAlert('warning', 'Validasi', 'Kemasan tidak boleh kosong!'); return false;
		}

		let i = $('.rows').length;
		let kemasan = $('#kemasan option:selected').text()
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${i + 1}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" id="id-barang${i}" value="${id_barang}" class="id-barang"></td>
				<td class="center">${kemasan}<input type="hidden" name="id_kemasan[]" id="id-kemasan${i}" class="id-kemasan"></td>
				<td><input type="text" name="nobatch[]" id="nobatch${i}" class="custom-form nobatch"></td>
				<td class="center"><input type="text" name="ed[]" id="ed${i}" class="custom-form ed"></td>
				<td class="center"><input type="text" name="jml[]" id="jml${i}" value="${jumlah}" class="custom-form jml center" placeholder="Jumlah" onkeyup="hitungSubTotal(${i})" onkeypress="return hanyaAngka(event)"></td>
 				<td class="center"><input type="text" name="hna[]" id="hna${i}" class="custom-form hna right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)"></td>
 				<td class="center"><input type="text" name="diskon_rp[]" id="disc-rp${i}" class="custom-form disc-rp right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)"></td>
 				<td class="center"><input type="text" name="diskon_pr[]" id="disc-pr${i}" class="custom-form disc-pr center" onkeypress="return hanyaAngka(event)"></td>
				<td class="center"><input type="text" name="subtotal[]" id="subtotal${i}" readonly class="custom-form subtotal right"></td>
				<td class="wrapper right">
					<button type="button" class="btn btn-danger btn-xs" onclick="removeElement(this);"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-penerimaan tbody').append(html)
		$.ajax({
            url: '<?= base_url('inventory/api/inventory/get_detail_harga_barang_pemesanan') ?>?id=' + id_barang + '&id_kemasan=' + id_kemasan,
            dataType: 'JSON',
            cache: false,
            success: function(data) {
                $('#id-kemasan' + i).val(data.id_packing)
            }
        })
		$('#ed' + i).datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide')
		})
		$('#hna' + i).blur(function() {
			hitungSubTotal(i)
		})
		$('#disc-rp' + i).blur(function() {
			hitungSubTotal(i)
		})
		$('#disc-pr' + i).blur(function() {
			hitungSubTotal(i)
		})
		$('input[type=text]').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove($(this))
			}
		})
		$('input[type=text]').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove($(this))
			}
		})

		$('#barang-auto, #kemasan, #jumlah').val('')
		$('#s2id_barang-auto a .select2c-chosen').html('Pilih Barang...')
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
            $('.rows:eq('+col+')').children('td:eq(6)').children('.jml').attr('id','jml'+i)
            $('.rows:eq('+col+')').children('td:eq(6)').children('.jml').attr('onkeyup','hitungSubTotal('+i+')')
            $('.rows:eq('+col+')').children('td:eq(7)').children('.hna').attr('id','hna'+i)
            $('.rows:eq('+col+')').children('td:eq(8)').children('.disc-rp').attr('id','disc-rp'+i)
            $('.rows:eq('+col+')').children('td:eq(9)').children('.disc-pr').attr('id','disc-pr'+i)
            $('.rows:eq('+col+')').children('td:eq(10)').children('.subtotal').attr('id','subtotal'+i)
            col++;
        }
        hitungTotal()
    }

	function hitungSubTotal(i) {
        var harga   = currencyToNumber($('#hna'+i).val());
        var jml     = $('#jml'+i).val();
        if ($('#disc-rp'+i).val() === '') {
            $('#disc-rp'+i).val('0');
        }
        if ($('#disc-pr'+i).val() === '') {
            $('#disc-pr'+i).val('0');
        }
        var disc = 0;
        if ($('#disc-rp'+i).val() !== '0' && $('#disc-rp'+i).val() !== '0,00' && $('#disc-rp'+i).val() !== '') {
            disc = currencyToNumber($('#disc-rp'+i).val());
        } else {
            disc = (harga*jml)*($('#disc-pr'+i).val()/100);
        }
        var subtotal= (harga*jml)-disc;
        $('#subtotal'+i).val(money_format(subtotal));
        hitungTotal();
	}
	
	function hitungTotal() {
        var jml_baris = $('.rows').length - 1;
        var general_ttl = 0;
        if (jml_baris >= 0) {
            
            var total = 0;
            for (i = 0; i <= jml_baris; i++) {
                var subtotal = currencyToNumber($('#subtotal'+i).val());
                total = total + subtotal;
            }
            var ppn     = parseInt(currencyToNumber($('#ppn').val())) / 100;
			var materai = (isNaN(parseInt($('#materai').val())) ? 0 : parseInt(currencyToNumber($('#materai').val())))
            
            var disc_percent = $('#disc-pr').val()/100; // persentase diskon per faktur
            var diskon_ttl = 0;
            if (disc_percent !== '0') {
                var dp_total    = total * disc_percent;
                $('#disc-rp').val(numberToCurrency(parseInt(Math.ceil(dp_total))));
                diskon_ttl  = parseInt(currencyToNumber($('#disc-rp').val()));
            }
            else {
                diskon_ttl  = parseInt(currencyToNumber($('#disc-rp').val()));
			}
			// console.log(diskon_ttl+' - '+ppn+' - '+materai+' - '+disc_percent)
            var ppn_total   = (total-diskon_ttl) + ((total-diskon_ttl) * ppn); // total PPN faktur setelah ditambah dengan total barang
            var disc_ppn_ttl = ppn_total;
			general_ttl = disc_ppn_ttl + materai;
        }
        $('#total').val(money_format(total - diskon_ttl));
        $('#total-plus-ppn').val(money_format(general_ttl));
	}
	
	function konfirmasiSimpanPenerimaan() {
		let validasi = false;
		let jmlPacking = $('.rows').length;
		if ($('#jenis-penerimaan').val() === '') {
			// swalAlert('warning', 'Validasi', 'Jenis penerimaan harus dipilih!'); return false;
		}
		if ($('#supplier-auto').val() === '') {
			swalAlert('warning', 'Validasi', 'Nama supplier harus dipilih!'); return false;
		}
		if ($('#no-faktur').val() === '') {
			swalAlert('warning', 'Validasi', 'No. Faktur harus diisi!'); return false;
		}
		if (jmlPacking === 0) {
			swalAlert('warning', 'Validasi', 'Kemasan barang harus diisi minimal 1 data!'); return false;
		}
		for (let i = 0; i <= jmlPacking - 1; i++) {
			if ($('#ed' + i).val() === '' || $('#ed').val() === '00/00/0000') {
				syams_validation('#ed' + i, 'Ed tidak boleh kosong!'); validasi = true;
			}
			if ($('#jml' + i).val() === '') {
				syams_validation('#jml' + i, 'Jumlah tidak boleh kosong!'); validasi = true;
			}
			if ($('#hna' + i).val() === '') {
				syams_validation('#hna' + i, 'Harga beli tidak boleh kosong!'); validasi = true;
			}
		}
		if (validasi) {
			return false;
		}
		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan data penerimaan ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				if ($('#id').val() !== '') {
					validateSaveKey()
				} else {
					simpanPenerimaan()
				}
			}
		})
	}

	function validateSaveKey() {
        let passSave = $.cookie('syam_cookie')
        bootbox.dialog({
            message: "<b>Masukkan Password:</b> <input type='password' class='form-control' name='password' id='password'/>",
            title: 'Validasi Perubahan Data',
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                konfirmasi: {
                    label: '<i class="fas fa-unlock"></i> Validasi',
                    className: "btn-info",
                    callback: function() {
                        var inputPass = $('#password').val();
                        if (inputPass === '') {
                            syams_validation('#password','Kolom password tidak boleh kosong !'); return false;
                        }

                        if (passSave !== inputPass) {
                            syams_validation('#password','Password yang anda masukkan salah !'); return false;
						}
						
						simpanPenerimaan()
                    }
                }
            }
        })
    }

	function simpanPenerimaan() {
		let update = '';
		if($('#id').val() !== ''){
			update = '/id/'+ $('#id').val()
		}
						
		$.ajax({
			type: 'POST',
			url: '<?= base_url("inventory/api/inventory/simpan_penerimaan") ?>' + update,
			data: $('#form-penerimaan').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let type = 'Error';
				if (data.status) {
					type = 'Success';
					getListPenerimaan(1, data.id_penerimaan)
					$('#modal-penerimaan').modal('hide')
					setTimeout(function(){ location.reload() }, 500);
				} else {
					getListPenerimaan(1, '')
				}
				messageCustom(data.message, type)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan data penerimaan', 'Error')
			},
		})
	}

	function editPenerimaan(detail) {
		$('#table-penerimaan tbody').empty()
		let value = detail.split('#')

		$('#id').val(value[0])
		$('#jenis-penerimaan').val(value[1])
		if (value[1] === 'Langsung') {
			$('#tanggal-jatuh-tempo').hide()
		}
		$('#no-penerimaan').val(value[15])
		$('#tanggal').val(value[4])
		$('#supplier-auto').val(value[5])
		$('#s2id_supplier-auto a .select2c-chosen').html(value[6])
		$('#no-faktur').val(value[3])
		$('#tanggal-jatuh-tempo').val(value[7])
		$('#kategori-barang').val(value[13])
		// $('#disc-pr').val(value[10])
		// $('#disc-rp').val(value[11])
		$('#disc-pr').val(0)
		$('#disc-rp').val(0)
		$('#ppn').val(value[8])
		$('#total').val(value[12])
		
		// load detail penerimaan
		showDetailPenerimaan(value[0])

		$('#modal-penerimaan-title').html('Form Edit Penerimaan Barang')
		$('#modal-penerimaan').modal('show')
	}

	function showDetailPenerimaan(id_penerimaan) {
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
							<td><input type="text" name="nobatch[]" id="nobatch${i}" value="${data.no_batch}" class="custom-form nobatch"></td>
							<td class="center"><input type="text" name="ed[]" id="ed${i}" value="${datefmysql(data.expired)}" class="custom-form ed"></td>
							<td class="center"><input type="text" name="jml[]" id="jml${i}" class="custom-form jml center" placeholder="Jumlah" onkeyup="hitungSubTotal(${i})" onkeypress="return hanyaAngka(event)" value="${data.jumlah}"></td>
							<td class="center"><input type="text" name="hna[]" id="hna${i}" class="custom-form hna right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)" value="${money_format(data.harga)}"></td>
							<td class="center"><input type="text" name="diskon_rp[]" id="disc-rp${i}" class="custom-form disc-rp right" onblur="FormNum(this)" onkeypress="return hanyaAngka(event)" value="${money_format(data.diskon_rupiah)}"></td>
							<td class="center"><input type="text" name="diskon_pr[]" id="disc-pr${i}" class="custom-form disc-pr center" onkeypress="return hanyaAngka(event)" value="${data.diskon_persen}"></td>
							<td class="center"><input type="text" name="subtotal[]" id="subtotal${i}" readonly class="custom-form subtotal right"></td>
							<td class="wrapper right">`;
								// <button type="button" class="btn btn-danger btn-xs" onclick="deleteDetailPenerimaan(${data.id}, this)"><i class="fas fa-trash-alt"></i></button>
					html +=	/* html */
							`</td>
						</tr>
					`;
					$('#table-penerimaan tbody').append(html)
					hitungSubTotal(i)
					$('#ed' + i).datepicker({
						format: 'dd/mm/yyyy',
						changeYear: true,
						changeMonth: true,
						minDate: 0
					}).on('changeDate', function() {
						$(this).datepicker('hide')
					})
					$('#hna' + i).blur(function() {
						hitungSubTotal(i)
					})
					$('#disc-rp' + i).blur(function() {
						hitungSubTotal(i)
					})
					$('#disc-pr' + i).blur(function() {
						hitungSubTotal(i)
					})
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

	function deleteDetailPenerimaan(id, el) {
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "Apakah anda yakin akan <br>menghapus data detail ini ?",
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
					url: '<?= base_url("inventory/api/inventory/delete_detail_penerimaan") ?>' + '/id/' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						let type = 'Error';
						if (data.status) {
							type = 'Success';
							removeElement(el)
						}
						messageCustom(data.message, type)
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
</script>