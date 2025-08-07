<script>
	$(function() {
		getListPemusnahanLogistik(1)

		$('#btn-search').click(function() {
			$('#modal-search').modal('show')
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#logistik-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: $('#kategori-logistik-search').val()
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
			reloadData()
			$('#table-logistik-order tbody').empty()
			getListLogistikED(1)
			$('#modal-pemusnahan-logistik').modal('show')
		})

		$('#pencarian-logistik').keyup(function() {
			getListLogistikED(1)
		})

		$('#btn-reload').click(function() {
			reloadData()
			getListPemusnahanLogistik(1)
		})
	})

	function reloadData() {
		$('#form-search')[0].reset()
		$('#s2id_logistik-search a .select2c-chosen').html('Pilih Logistik...')
		$('#pencarian-logistik').val('')
		$('#table-logistik-order tbody').empty()
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

	function getListLogistikED(page) {
		$.ajax({
			type:'GET',
			url: '<?php echo base_url('pemusnahan_logistik/api/pemusnahan_logistik/get_list_logistik_ed/page/') ?>' + page,
			data: 'nama_logistik=' + $('#pencarian-logistik').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(result) {

				if(result.data !== undefined){
					if ((page - 1) & (result.data.length === 0)) {
						getListLogistikED(page - 1)
						return false;
					}

					$('#pb-pagination').html(pagination(result.jumlah, result.limit, result.page, 2))
					$('#pb-summary').html(page_summary(result.jumlah, result.data.length, result.limit, result.page))

					$('#table-logistik-pemusnahan tbody').empty()
					let totalJml = 0;
					let totalHrg = 0;
					$.each(result.data, function(i, data) {
						let totalHarga = data.harga * data.jumlah;
						let detail = data.nama_logistik+'#'+data.id_barang+'#'+data.nama_kemasan+'#'+data.sisa+'#'+data.id_stok+'#'+data.ed; 
						let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((result.page - 1) * result.limit))}</td>
								<td>${data.nama_logistik}</td>
								<td class="center">${konvTanggal(data.waktu)}</td>
								<td class="center">${data.sisa}</td>
								<td class="right">${money_format(data.hpp)}</td>
								<td class="right">${money_format(data.sisa * data.hpp)}</td>
								<td class="right">
									<button type="button" title="Klik untuk menambahkan ke daftar pemusnahan Logistik" class="btn btn-secondary btn-xs" onclick="addLogistikToListPemusnahan('${detail}'); return false;"><i class="fas fa-sign-in-alt"></i></button>
								</td>
							</tr>
						`;

						$('#table-logistik-pemusnahan tbody').append(html)
						totalJml = parseInt(totalJml) + parseInt(data.jumlah);
	               		totalHrg = totalHrg + totalHarga;
					})
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function addLogistikToListPemusnahan(detail) {

		let data = detail.split('#')
		let jml = $('#rows').length;

		for (let i = 0; i <= jml; i++) {
			let idLogistik = $('#id-logistik' + i).val()
			let ed = $('#ed' + i).val()
			if (idLogistik === data[1] && ed === data[4]) {
				swalAlert('warning', 'Validasi', 'Data Logistik sudah di inputkan!'); return false;
			}
		}

		let html = /* html */ `
			<tr class="rows">
				<td class="center">${jml + 1}</td>
				<td>${data[0]}</td>
				<td class="right">${data[3]}</td>
				<td>
					${data[2]}
					<input type="hidden" name="id_logistik[]" id="id-logistik${jml}" value="${data[1]}" class="id-logistik">
				</td>
				<td>
					<input type="hidden" name="ed[]" id="ed${jml}" value="${data[4]}" class="ed">
					<input type="hidden" name="expired[]" id="expired${jml}" value="${data[5]}" class="expired">
					<input type="text" name="jumlah[]" id="jumlah${jml}" value="${data[3]}" class="jml center custom-form" size="15">
				</td>
				<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="removeList(this)"><i class="fa fa-trash-alt"></i></button></td>
			</tr>
		`;

		$('#table-logistik-order tbody').append(html)
	}

	function removeList(el) {
		let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent)
        let jumlah = $('.rows').length;
        let col = 0;
        for (i = 0; i <= jumlah; i++) {
            $('.rows:eq('+col+')').children('td:eq(0)').html(i+1)
			$('.rows:eq('+col+')').children('td:eq(3)').children('.id-logistik').attr('id','id-logistik'+i)
            $('.rows:eq('+col+')').children('td:eq(4)').children('.ed').attr('id','ed'+i)
            $('.rows:eq('+col+')').children('td:eq(4)').children('.jumlah').attr('id','jumlah'+i)
            col++;
        }
	}

	function konfirmasiSimpanPemusnahanLogistik() {
		let jml = $('.rows').length;
		if (jml === 0) {
			swalAlert('warning', 'Validasi', 'Data Logistik belum ada yang dipilih / dimasukkan!')
			return false;
		}
		swal.fire({
			title: 'Konfirmasi Simpan',
 			html: "Apakah anda yakin akan menyimpan data pemusnahan Logistik ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanPemusnahanLogistik()
			}
		})
	}

	function simpanPemusnahanLogistik() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pemusnahan_logistik/api/pemusnahan_logistik/simpan_pemusnahan_logistik") ?>',
			data: $('#form-pemusnahan-logistik').serialize(),
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
				getListPemusnahanLogistik(1)
				$('#modal-pemusnahan-logistik').modal('hide')
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan data pemusnahan Logistik', 'Error')
			},
		})
	}

	function getListPemusnahanLogistik(page) {
		$.ajax({
			type:'GET',
			url: '<?php echo base_url('pemusnahan_logistik/api/pemusnahan_logistik/get_list_pemusnahan_logistik/page/') ?>' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPemusnahanLogistik(page - 1)
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data tbody').empty()
				$.each(data.data, function(i, val) {
					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center wrapper">${val.kode}</td>
							<td class="center wrapper">${datetimefmysql(val.tanggal)}</td>
							<td class="left">${val.unit}</td>
							<td class="left">${val.nama_user}</td>
							<td class="right wrapper">
								<button type="button" class="btn btn-secondary btn-xs" onclick="cetakBuktiPemusnahan(${val.id})"><i class="fas fa-print mr-1"></i>Cetak Bukti</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="deletePemusnahan(${val.id}, ${data.page})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html)
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

	function paging(page, tab){
        switch(tab){
            case 1:
                getListPemusnahanLogistik(page);
            break;
            case 2:
                getListLogistikED(page);
            break;
            default:
            break;
        }
    }

	function deletePemusnahan(id, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
 			html: "Apakah anda yakin akan menghapus data pemusnahan Logistik ini ?",
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
					url: '<?= base_url("pemusnahan_logistik/api/pemusnahan_logistik/delete_pemusnahan_logistik/id/") ?>' + id,
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
						getListPemusnahanLogistik(page)
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Gagal menghapus data pemusnahan Logistik', 'Error')
					},
				})
			}
		})
	}

	function cetakBuktiPemusnahan(id_pemusnahan) {
		var wWidth = $(window).width()
        var dWidth = wWidth * 1;
        var wHeight= $(window).height()
        var dHeight= wHeight * 1;
        var x = screen.width/2 - dWidth/2;
        var y = screen.height/2 - dHeight/2;
        window.open('<?= base_url() ?>pemusnahan_logistik/printing_bukti_pemusnahan?id='+id_pemusnahan,'Cetak Bukti Pemusnahan Logistik','width='+dWidth+', height='+dHeight+', left='+x+',top='+y)
	}
</script>