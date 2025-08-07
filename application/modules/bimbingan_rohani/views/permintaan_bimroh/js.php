<script>
	$(function() {
		getListPermintaanBimroh(1)
		
		$('#btn-search1').click(function() {
			$('#modal-search1').modal('show')
		})

		$('#btn-reload1').click(function() {
			// resetPermintaanBimroh()
			getListPermintaanBimroh(1)
		})

		// select filter layanan
        $('#layanan').change(function() {
            getListPermintaanBimroh(1);
        });

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

	function getListPermintaanBimroh(page) {
		$('#page-now1').val(page)
		$('#modal-search1').modal('hide')
		$.ajax({
			type: 'GET',
			url: '<?= base_url("bimbingan_rohani/api/Bimbingan_rohani/get_list_permintaan_bimbingan_rohani") ?>/page/' + page,
			data: $('#form-search1').serialize() + '&layanan=' + $('#layanan').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListPermintaanBimroh(page - 1)
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

					let detail = v.waktu_order+'#'+v.id_pasien+'#'+v.nama_pasien+'#'+v.kelamin+'#'+hitungUmur(v.tanggal_lahir)+'#'+v.bed+'#'+v.kondisi_pasien+'#'+v.diagnosa_spiritual+'#'+v.terapi_tindak_lanjut+'#'+v.id+'#'+v.status+'#'+v.alasan_pembatalan_talqin;

					let html = /* html */ `
						<tr ${background}>
						<td class="center wrapper">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu_order !== null ? datetimefmysql(v.waktu_order) : '-')}</td>
							<td class="wrapper center">${v.bed}</td>
							<td class="wrapper center">${v.id_pasien}</td>
							<td class="wrapper center">${v.nama_pasien}</td>
							<td class="wrapper center">${v.nama_perawat}</td>
							<td class="wrapper center">${v.jenis}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" title="Klik untuk konfirmasi" ${button} onclick="aktivitasBimroh('${detail}')"><i class="fas fa-arrow-circle-right"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk batal" ${button} onclick="batalBimroh(${v.id}, ${data.page})"><i class="fas fa-times"></i></button>
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

	function batalBimroh(id) {
		swal.fire({
			title: 'Konfirmasi Pembatalan',
			html: "<b>Dengan pembatalan maka data pemeriksaan & tindakan di bimroh akan ikut terhapus</b><br/>Anda yakin membatalkan bimroh ini?",
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
					url: '<?= base_url('bimbingan_rohani/api/bimbingan_rohani/pembatalan_order_bimroh') ?>',
					data: 'id=' + id,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListPermintaanBimroh($('#page-now1').val())
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan order bimroh', 'Error')
					}
				})
			}
		})
	}

	function aktivitasBimroh(data) {
		let val = data.split('#');
		$('#tanggal-detail').html(val[0]);
		$('#no-rm-bimroh-detail').html(val[1]);
		$('#nama-bimroh-detail').html(val[2]);
		$('#kelamin-bimroh-detail').html(val[3]);
		$('#umur-bimroh-detail').html(val[4]);
		$('#kamar-bimroh-detail').html(val[5]);
		$('#kondisi-pasien-detail').html(val[6]);
		$('#diagnosa-bimroh-detail').html(val[7]);
		$('#tindak-lanjut-detail').html(val[8]);
		$('#id-layanan-pendaftaran-kb').val(val[9]);

		$('#status-permintaan').val((val[10] == 'Request' ? '' : val[10]));
		$('#alasan-dibatalkan-bimroh').val(val[11] == 'null' ? '' : val[11]);


		$('#modal-konfirm-bimroh').modal('show')
	}

	function formBimroh(id_pendaftaran, id_layanan_pendaftaran = '') {
		if (jenis === '') {
			if (id_dokter === null) {
				swalAlert('warning', 'Validasi', 'Konfirmasi Bimbingan Rohani');
				return false;
			}
		}

		$('#id-pendaftaran-inap').val(id_pendaftaran);
		$('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
		$('#modal-tindak-lanjut').modal('show');
	}
	
	function konfirmasiPermintaanBimroh() {
		syams_validation_remove('.form-control')
		syams_validation_remove('.select2-input')
		if ($('#status-permintaan').val() === '') {
			syams_validation('#status-permintaan', 'Status permintaan harus dipilih!'); return false;
		}
		if (($('#status-permintaan').val() === 'Canceled') && ($('#alasan-dibatalkan-bimroh').val() === ' ')) {
			syams_validation('#alasan-dibatalkan-bimroh', 'Alasan pembatalan tidak boleh kosong!'); return false;
		}
		if ($('#status-permintaan').val() === 'Confirmed') {					
		}
		swal.fire({
			title: 'Konfirmasi Permintaan',
			html: "Anda yakin ingin menyimpan data konfirmasi bimbingan rohani ini?",
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
					url: '<?= base_url('bimbingan_rohani/api/bimbingan_rohani/simpan_konfirmasi_bimroh') ?>',
					data: $('#form-konfirm-bimroh1').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success')
							getListPermintaanBimroh($('#page-now1').val())
							$('#modal-konfirm-bimroh').modal('hide')
						} else {
							messageCustom(data.message, 'Info')
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan pembatalan order bimroh', 'Error')
					}
				})
			}
		})
	}
</script>
