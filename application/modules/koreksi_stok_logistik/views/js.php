<script>
	$(function() {
		$.cookie('syam_cookie', '<?= UPDATE_KEY ?>')
		getListStokLogistik(1)
		$('#btn-search').click(function(){
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: "dd/mm/yyyy"
		}).on('changeDate', function(){
			$(this).datepicker('hide')
		})

		$('#btn-reload').click(function() {
			resetData()
			getListStokLogistik(1)
		})

		$('#btn-add').click(function() {
			resetData()
			$('#modal-koreksi-stok').modal('show')
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
						jenissppb: $('#jenisbarang2').val()
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
                url: "<?= base_url('laporan_inventori_logistik/api/laporan_inventori_logistik/barang_pembelian') ?>",
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
                $.getJSON('<?= base_url('inventori_rt/api/inventori_rt/get_ed_barang') ?>?id_barang='+data.id, function(data){
                	$('#ed').html('')
                    if (data === null) {
						$('#ed').append("<option value=''>Pilih Tanggal...</option>")
                    } else {
                    	console.log(data);
                        $.each(data.data, function (index, value) {
                            $('#ed').append("<option value='"+value.id_stok+"'>"+konvTanggal(value.waktu)+"</option>").change()
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

		$('#tambahkan').click(function() {
			let id_barang = $('#barang-auto').val()
			let nama_barang = $('#s2id_barang-auto a .select2-chosen').html()
			let ed = $('#ed').val()
			let expired = $('#expired').val()
			let sisa = $('#sisa').val()
			let kenyataan = $('#kenyataan').val()
			let penyesuaian = $('#penyesuaian').val()
			let alasan = $('#alasan').val()
			entriNewTableRow(id_barang, nama_barang, ed, sisa, kenyataan, penyesuaian, alasan, expired)
		})

		$('#ed').change(function() {
			let id_barang = $('#barang-auto').val()
			let ed = $('#ed').val()
			cekTanggalTerima(id_barang, ed);
			cekExpired(ed);
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url('inventori_rt/api/inventori_rt/sisa_barang_koreksi_stok') ?>',
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

		// $('#btn-print').click(function() {
		// 	$('#modal-print').modal('show')
		// })
	})

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

	function getListStokLogistik(page, id_koreksi_stok) {
		var id = '';
		if (id_koreksi_stok !== undefined) {
			id = id_koreksi_stok;
		}
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('koreksi_stok_logistik/api/koreksi_stok_logistik/get_list_stok_logistik/page/') ?>' + page + '/id/' + id ,
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
									'<td class="right">'+((parseFloat(v.masuk) === 0) ? '-' + v.keluar:v.masuk)+'</td>'+
									'<td>'+v.kemasan+'</td>'+
									'<td class="center">'+datefmysql(v.ed)+'</td>'+
									'<td><i>'+v.nama_account+'</i></td>'+
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

	function resetData() {
		$('#table-list tbody').empty()
		$('#form-koreksi-stok')[0].reset()
		$('#s2id_barang-auto a .select2-chosen').html('Pilih Barang...')
		$('#tanggal-awal').val('<?= date('01/m/Y') ?>')
		$('#tanggal-akhir').val('<?= date('d/m/Y') ?>')
	}

	function hitungPenyesuaian() {
		if ($('#sisa').val() === '') {
			$('#sisa').val('0')
		}

		let sisa = parseFloat($('#sisa').val())
		let real = parseFloat($('#kenyataan').val())
		let penyesuaian = real - sisa;
		$('#penyesuaian').val(penyesuaian)
	}

	function cekTanggalTerima(id_barang, ed){

		$.ajax({
				type: 'GET',
				url: '<?php echo base_url('koreksi_stok_logistik/api/koreksi_stok_logistik/cek_stok_logistik') ?>',
				data: 'id_barang=' + id_barang + '&ed=' + ed,
				dataType: 'JSON',
				success: function(data) {

					$('#id-stok').val(data.id)
					$('#waktu-stok').val(data.waktu)
				
				}
			})

	}

	function cekExpired(id){

		$('#expired').empty();

		$.ajax({
				type: 'GET',
				url: '<?php echo base_url('koreksi_stok_logistik/api/koreksi_stok_logistik/cek_expired') ?>',
				data: 'id=' + id,
				dataType: 'JSON',
				success: function(data) {

					$('#expired').append("<option value='"+data.ed+"'>"+datefmysql(data.ed)+"</option>").change()
					
				}
			})

	}

	function entriNewTableRow(id_barang, nama_barang, ed, sisa, kenyataan, penyesuaian, alasan, expired) {
		if (id_barang === '') {
			syams_validation('#barang-auto', 'Pilih barang terlebih dahulu!')
			return false;
		}
		syams_validation_remove('#barang-auto')
		if($('#waktu-stok').val() === ''){
			syams_validation('#ed', 'Silakan Pilih Kembali Tanggal Penerimaan!')
			return false;
		}
		if($('#id-stok').val() === ''){
			syams_validation('#ed', 'Silakan Pilih Kembali Tanggal Penerimaan!')
			return false;
		}
		if (ed === '') {
			syams_validation('#ed', 'Tanggal Penerimaan tidak boleh kosong!')
			return false;
		}
		syams_validation_remove('#ed')
		if (kenyataan === '') {
			syams_validation('#kenyataan', 'Kenyataan tidak boleh kosong!')
			return false;
		}
		syams_validation_remove('#kenyataan')
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
				<td>${konvTanggal($('#waktu-stok').val())}<input type="hidden" name="ed[]" value="${$('#id-stok').val()}" class="ed" id="ed${jml}"></td>
				<td>${sisa}<input type="hidden" name="sisa[]" value="${sisa}" class="sisa" id="sisa${jml}"></td>
				<td>${kenyataan}<input type="hidden" name="tgl_expired[]" value="${expired}" class="expired" id="expired${jml}"></td>
				<td>${penyesuaian}<input type="hidden" name="penyesuaian[]" value="${penyesuaian}" class="penyesuaian" id="sisa${jml}"></td>
				<td>${alasan}<input type="hidden" name="alasan[]" value="${alasan}" class="alasan" id="alasan${jml}"></td>
				<td class="center">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;
		$('#table-list tbody').append(html)
		$('#barang-auto, #id-stok, #waktu-stok, #ed, #sisa, #kenyataan, #penyesuaian, #alasan').val('')
		$('#s2id_barang-auto a .select2-chosen').html('Pilih Barang...')
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
            $('.rows:eq('+col+')').children('td:eq(4)').attr('id','subtotal'+i)
            $('.rows:eq('+col+')').children('td:eq(5)').children('.penyesuaian').attr('id','penyesuaian'+i)
            $('.rows:eq('+col+')').children('td:eq(6)').children('.alasan').attr('id','alasan'+i)
            col++;
        }
    }

	function simpanKoreksiStok() {
		let jml = $('.rows').length
		if (jml === 0) {
			swalAlert('error', 'Validasi', 'Tidak ada barang yang dientrikan, silahkan isi form terlebih dahulu!')
			return false;
		}

		validateKeyAccess()
	}

	function validateKeyAccess() {
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
                        var inputPass = $('#password').val()
                        if (inputPass === '') {
                            syams_validation('#password','Kolom password tidak boleh kosong !') 
							return false;
                        }

                        if (passSave !== inputPass) {
                            syams_validation('#password','Password yang anda masukkan salah !') 
							return false;
						}
						
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url('koreksi_stok_logistik/api/koreksi_stok_logistik/simpan_koreksi_stok_logistik') ?>',
							data: $('#form-koreksi-stok').serialize(),
							beforeSend: function() {
								showLoader()
							},
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success')
									getListStokLogistik(1)
									$('#modal-koreksi-stok').modal('hide')
								}
							},
							complete: function() {
								hideLoader()
							},
							error: function(e) {
								messageCustom('Terjadi Kesalahan, Gagal Menyimpan Data Koreksi Stok', 'Error')
							}
						})
                    }
                }
            }
        })
	}

	function cetakKoreksiStok() {
		var wWidth = $(window).width()
        var dWidth = wWidth * 1;
        var wHeight= $(window).height()
        var dHeight= wHeight * 1;
        var x = screen.width/2 - dWidth/2;
        var y = screen.height/2 - dHeight/2;
        var kategori = $('#jenis-barang').val()
        window.open('<?php echo base_url() ?>koreksi_stok_logistik/printing_koreksi_stok_logistik/'+kategori,'Cetak Lembar Koreksi Stok','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}

	function cetakExcelKoreksiStok() {
		location.href = '<?php echo base_url('koreksi_stok_logistik/export_koreksi_stok_logistik') ?>?' + $('#form-search').serialize()
	}
</script>