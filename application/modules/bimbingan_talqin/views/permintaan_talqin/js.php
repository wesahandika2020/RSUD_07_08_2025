<script>
	$(function() {
		getListPermintaanTalqin(1)
		
		$('#btn-search1').click(function() {
			$('#modal-search1').modal('show')
		})

		$('#btn-reload1').click(function() {
			// resetDataJadwalOperasi()
			getListPermintaanTalqin(1)
		})

		$('.form-control, .select2-input').change(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control').keyup(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('#date-awal, #date-akhir').datetimepicker({
            format: 'DD/MM/YYYY HH:mm'
        }).on('changeDate', function() {
            $(this).datetimepicker('hide');
        })
    })

	function getListPermintaanTalqin(page) {
		$('#page-now1').val(page)
		$('#modal-search1').modal('hide')
		$.ajax({
			type: 'GET',
			url: '<?= base_url("bimbingan_talqin/api/Bimbingan_talqin/get_list_permintaan_bimbingan_talqin") ?>/page/' + page,
			data: $('#form-search1').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListPermintaanTalqin(page - 1)
                    return false;
                };
                
                $('#pagination1').html(pagination(data.jumlah, data.limit, data.page, 1))
				$('#summary1').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data1 tbody').empty()
				$.each(data.data, function(i, v) {
					let button = '';
					let background = '';
					let status = v.status;
					if (v.status === 'Request') {
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
					}
					if (v.status === 'Canceled') {
						background = 'style="background-color:#E46A76;color:#FFFFFF"';
						button = 'disabled';
					}
					if (v.status === 'Confirmed') {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						background = '';
						// button = 'disabled';
					}	

					let detail = v.waktu_order_talqin+'#'+v.id_pasien+'#'+v.nama_pasien+'#'+v.kelamin+'#'+hitungUmur(v.tanggal_lahir)+'#'+v.bed+'#'+v.kondisi_pasien_talqin+'#'+v.terapi_advice_talqin+'#'+v.id+'#'+v.status+'#'+v.alasan_pembatalan_talqin;

					let html = /* html */ `
						<tr ${background}>
						<td class="center wrapper">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu_order_talqin !== null ? datetimefmysql(v.waktu_order_talqin) : '-')}</td>
							<td class="wrapper center">${v.bed}</td>
							<td class="wrapper center">${v.id_pasien}</td>
							<td class="wrapper center">${v.nama_pasien}</td>
							<td class="wrapper center">${v.nama_perawat}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk konfirmasi" ${button} onclick="aktivitasTalqin('${detail}')"><i class="fas fa-arrow-circle-right"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk batal" ${button} onclick="batalTalqin(${v.id}, ${data.page})"><i class="fas fa-times"></i></button>
							</td>
						</tr>
					`;
					$('#table-data1 tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		})
	}

	function aktivitasTalqin(data) {
		let val = data.split('#');
		$('#tanggal-talqin').html(val[0]);
		$('#no-rm-talqin').html(val[1]);
		$('#nama-talqin').html(val[2]);
		$('#kelamin-talqin').html(val[3]);
		$('#umur-talqin').html(val[4]);
		$('#kamar-talqin').html(val[5]);
		$('#kondisi-pasien-talqin').html(val[6]);
		$('#terapi-advice-talqin').html(val[7]);
		$('#id-layanan-pendaftaran-talqin').val(val[8]);

		$('#status-permintaan').val((val[9] == 'Request' ? '' : val[9]))
		$('#alasan-dibatalkan-talqin').val(val[10] == 'null' ? '' : val[10])


		$('#modal-konfirm-talqin').modal('show')
	}

	function konfirmasiPermintaanTalqin() {
		syams_validation_remove('.form-control')
		syams_validation_remove('.select2-input')
		if ($('#status-permintaan').val() === '') {
			syams_validation('#status-permintaan', 'Status permintaan harus dipilih!'); return false;
		}
		if (($('#status-permintaan').val() === 'Canceled') && ($('#alasan-dibatalkan-talqin').val() === ' ')) {
			syams_validation('#alasan-dibatalkan-talqin', 'Alasan pembatalan tidak boleh kosong!'); return false;
		}
		if ($('#status-permintaan').val() === 'Confirmed') {					
		}
		swal.fire({
			title: 'Konfirmasi Permintaan',
			html: "Anda yakin ingin menyimpan data konfirmasi bimbingan talqin ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('bimbingan_talqin/api/bimbingan_talqin/simpan_konfirmasi_talqin') ?>',
					data: $('#form-konfirm-talqin').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListPermintaanTalqin($('#page-now1').val())
							$('#modal-konfirm-talqin').modal('hide')
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan order talqin', 'Error')
					}
				})
			}
		})
	}

    
</script>