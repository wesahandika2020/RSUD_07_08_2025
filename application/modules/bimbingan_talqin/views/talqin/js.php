<script>
	$(function() {
		$('#wizard2').bwizard()
		getListDataTalqin(1)

        $('.form-control, .custom-form .select2-input, .select2c-input').change(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#btn-search2').click(function() {
			$('#modal-search2').modal('show')
		})
		
		$('#btn-reload2').click(function() {
			resetDataTalqin()
			getListDataTalqin(1)
		})

		$('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide')
		})

		$('.timepicker').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            defaultTime: false,
            showInputs: false,
            disableFocus: true
        });


		$('.form-control, .custom-form').keyup(function(){
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})
	})

	function resetDataTalqin() {
        $('input[type=text], input[type=hidden], select, textarea').val('')
        $('a .select2c-chosen').html('')
        $('#tanggal-awal2, #tanggal-akhir2').val('<?= date('d/m/Y') ?>')
		$('#ttd_keluarga').prop('checked', true).attr('disabled', false);
		$('#ttd_petugaspendamping').prop('checked', true).attr('disabled', false);
	}

	function getListDataTalqin(page) {
    	$('#page-now2').val(page)
		$('#modal-search2').modal('hide')
        
		$.ajax({
			type: 'GET',
			url: '<?= base_url("bimbingan_talqin/api/bimbingan_talqin/get_list_data_talqin") ?>/page/' + page,
			data: $('#form-search2').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
                    getListDataTalqin(page - 1)
                    return false;
                };

                $('#pagination2').html(pagination(data.jumlah, data.limit, data.page, 2))
				$('#summary2').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
				
				$('#table-data2 tbody').empty()
				$.each(data.data, function(i, v) {
					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum</em>';


					let html = /* html */ `
						<tr>
                        <td class="center wrapper">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${(v.waktu_konfirmasi_talqin !== null ? datetimefmysql(v.waktu_konfirmasi_talqin) : '-')}</td>
							<td class="wrapper center">${v.bed}</td>
							<td class="wrapper center">${v.id_pasien}</td>
							<td class="wrapper center">${v.nama}</td>
							<td class="wrapper center">${v.nama_perawat}</td>
							<td class="wrapper right">
								<button type="button" class="btn btn-secondary btn-xs" onclick="cetakFormTalqin(${v.id},${v.id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>

							</td>
						</tr>
					`;
					$('#table-data2 tbody').append(html)
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

    function cetakFormTalqin(id, id_layanan_pendaftaran) {
        $('#modal_cetak_form_talqin').modal('show');
        $('#modal_cetak_form_talqin_label').html('Cetak Form Bimbingan Talqin');

		$('#btn_form_talqin').click(function() {
            cetakFormulirTalqin(id, id_layanan_pendaftaran);
        });     
    }

    function cetakFormulirTalqin(id, id_layanan_pendaftaran) { 
		$.ajax({
            type: 'GET',
            url: '<?= base_url('bimbingan_talqin/api/bimbingan_talqin/form_talqin') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				// Set all values first
				// resetPemberianInformasiKepadaPasien();

                $('#id-layanan-pendaftaran-cetak-talqin').val(id_layanan_pendaftaran);	 
				$('#modal-form-talqin-title').html(`<b>Formulir Permohonan Pendampingan Pasien Sakaratul Maut</b> | No. RM: ${data.id_pasien}, Nama: ${data.nama_pasien}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telepon}</b></i>`);
                $('#nama-pasien-talqin').val(data.nama_pasien);
                $('#tanggal-lahir-pasien-talqin').val(datefmysql(data.tanggal_lahir));
				$('#jenis-kelamin-pasien-talqin').val((data.jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
				$('#agama-pasien-talqin').val(data.agama);
				$('#alamat-pasien-talqin').val(data.alamat_pasien);                
                $('#kondisi-pasien-ranap-talqin').val(data.kondisi_pasien_talqin);                
				$('#terapi-pasien-talqin').val(data.terapi_advice_talqin);											
                $('#modal_form_talqin').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	function simpanFormTalqin() {
		var id = $('#id-layanan-pendaftaran-cetak-talqin').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("bimbingan_talqin/api/bimbingan_talqin/simpan_form_talqin") ?>',
			data: $('#form-talqin-cetak').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_form_talqin').modal('hide');

					window.open('<?= base_url('bimbingan_talqin/cetak_form_talqin/') ?>' + id, 'Cetak Formulir Permohonan Pendamping Pasien Sakaratul Maut', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}
		
</script>