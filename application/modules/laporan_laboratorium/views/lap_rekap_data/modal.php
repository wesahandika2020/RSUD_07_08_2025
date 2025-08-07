<!-- Modal Search -->
<div id="modal-search-rekap" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-rekap-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-rekap-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-rekap role=form class=form-horizontal') ?>
				<input type="hidden" name="jenis_rawat" id="jenis-rawat">
				<input type="hidden" name="tempat_layanan" id="tempat-layanan">
				<div class="form-group row tight">
					<label for="periode-laporan-rekap" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-rekap class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-rekap form-group row tight">
					<label for="bulan-rekap" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-rekap class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-rekap" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="rentang-waktu-rekap form-group row tight">
					<label for="tanggal-awal-rekap" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-rekap" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-rekap" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-rekap form-group row tight">
					<label for="tanggal-harian-rekap" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-rekap" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rekap form-group row tight">
				    <label for="tempat-layanan-rekap" class="col-md-3 col-form-label">Tempat Layanan</label>
				    <div class="col-md-9">
				        <?= form_dropdown('tempat_layanan', $tempat_layanan, '', 'id="tempat-layanan-rekap" class="form-control"') ?>
				    </div>
				</div>

				<div class="rekap form-group row tight" id="dropdown-layanan-terkait">
				    <label for="layanan-terkait-rekap" class="col-md-3 col-form-label">Layanan Terkait</label>
				    <div class="col-md-9">
				        <select id="layanan-terkait-rekap" class="form-control">
				            <option value="">- Pilih Layanan Terkait -</option>
				        </select>
				    </div>
				</div>

				<div class="form-group row tight penjamin-group-search-rekap">
                    <label for="penjamin-search-rekap" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin-search-rekap" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getRekapDataHarga(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;
	var baseUrl = '<?= base_url('laporan_laboratorium/api/laporan_laboratorium') ?>';
	var jenisPenjamin = 0;


	// Format Tanggal
	$('#tanggal-awal-rekap, #tanggal-akhir-rekap, #tanggal-harian-rekap').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-rekap').change(function() {
		if ($('#periode-laporan-rekap').val() == 'Bulanan') {
			$('.bulanan-rekap, #bulan-rekap, #tahun-rekap').show();
			$('.harian-rekap, .rentang-waktu-rekap, #tanggal-awal-rekap, #tanggal-akhir-rekap').hide();
		}
		if ($('#periode-laporan-rekap').val() == 'Rentang Waktu') {
			$('.rentang-waktu-rekap, #tanggal-awal-rekap, #tanggal-akhir-rekap').show();
			$('.harian-rekap, #tanggal-harian-rekap, .bulanan-rekap, #bulan-rekap, #tahun-rekap').hide();
		}
		if ($('#periode-laporan-rekap').val() == 'Harian') {
			$('.harian-rekap, #tanggal-harian-rekap').show();
			$('.bulanan-rekap, .rentang-waktu-rekap').hide();
		}
	});

	$(document).ready(function() {
	    $('#dropdown-layanan-terkait').hide(); // Hide the second dropdown initially

	    $('#tempat-layanan-rekap').change(function() {
	        var selectedValue = $(this).val();
	        
	        // Set value of hidden input #tempat-layanan
	        $('#tempat-layanan').val(selectedValue);
	        
	        if (selectedValue === 'igd' || selectedValue === 'lab' || selectedValue === 'hemo') {
	            $('#dropdown-layanan-terkait').hide();
	            $('#jenis-rawat').val(''); // Clear jenis_rawat when dropdown is hidden
	        } else {
	            $('#dropdown-layanan-terkait').show();
	            $.ajax({
	                url: "<?= base_url('laporan_laboratorium/fetchRelatedServices'); ?>",
	                type: "POST",
	                data: { tempat_layanan: selectedValue },
	                dataType: "json",
	                success: function(data) {
	                    $('#layanan-terkait-rekap').empty();
	                    $.each(data, function(key, value) {
	                        $('#layanan-terkait-rekap').append('<option value="'+ key +'">'+ value +'</option>');
	                    });

	                    // Set the first option value to #jenis-rawat
	                    if (Object.keys(data).length > 0) {
	                        $('#jenis-rawat').val($('#layanan-terkait-rekap').val());
	                    }
	                }
	            });
	        }
	    });
	    
	    // Update #jenis-rawat whenever the user manually changes the dropdown
	    $('#layanan-terkait-rekap').change(function() {
	        $('#jenis-rawat').val($(this).val());
	    });
	});




	$(document).ready(function() {
	    $('#layanan-terkait-rekap').change(function() {
	        // Tangkap nilai dari dropdown layanan terkait
	        var jenisRawat = $(this).val();

	        // Simpan nilai tersebut ke input hidden jenis_rawat
	        $('#jenis-rawat').val(jenisRawat);
	    });
	});

	$('#unit-search-rekap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	$('#penjamin-search-rekap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function (term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					jenis: jenisPenjamin,
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
			return data.nama;
		}
	})

	$('#dokter-search-rekap').select2({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
			var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	})

	function resetFormRekap() {
	    
	    $('#periode-laporan-rekap').val('Bulanan')
	    $('#bulan-rekap').val('<?= date('m') ?>')
	    $('#tahun-rekap').val('<?= date('Y') ?>')
	    $('.bulanan-rekap, #tahun-rekap, #bulan-rekap').show()
	    $('#tanggal-awal-rekap, #tanggal-akhir-rekap, #tanggal-harian-rekap').val('<?= date('d/m/Y') ?>')
	    $('#jenis-rekap', '#unit-search-rekap', '#penjamin-search-rekap', '#tempat-layanan-rekap', '#jenis-rawat', '#tempat-layanan').val('')
	    $('#unit-search-rekap').val('<?= $this->session->userdata('id_unit') ?>').change()
	    $('#s2id_unit-search-rekap a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
	    $('.harian-rekap, #tanggal-harian-rekap, .rentang-waktu-rekap').hide()
	    $('#s2id_penjamin-search-rekap a .select2-chosen').html('Pilih Penjamin')
	    $('#tempat-layanan-rekap, .rekap').show()

	    $('#dropdown-layanan-terkait').hide(); // Hide the related services dropdown
	    $('#layanan-terkait-rekap').empty().append('<option value="">- Pilih Layanan Terkait -</option>');
	}


	function cekDateTime(id, form) {
	    // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

	    re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
	    if (form !== '') {

	        if (regs = form.match(re)) {

	        	// nilai hari antara 1 s.d 31
	            if (regs[1] < 1 || regs[1] > 31) {
	                alert("Nilai tidak valid untuk hari: " + regs[1]);
	                syams_validation(id, 'Format Tanggal tidak sesuai');
	                return false;
	            }
	            // nilai bulan antara 1 s.d 12
	            if (regs[2] < 1 || regs[2] > 12) {
	                alert("Nilai tidak valid untuk bulan: " + regs[2]);
	                syams_validation(id, 'Format Tanggal tidak sesuai');
	                return false;
	            }
	            // nilai tahun antara 2000 s.d sekarang
	            if (regs[3] < 2022 || regs[3] > ((new Date()).getFullYear())) {
	                alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + 2022 + " dan " + (((new Date()).getFullYear())));
	                syams_validation(id, 'Format Tanggal tidak sesuai');
	                return false;
	            }

	        } else {

	            syams_validation(id, 'Format Tanggal tidak sesuai');
	            return false;

	        }
	    }

	}

	function cekTahun(form){

		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

		if (form !== '') {

	        if (regs = form.match(re)) {

	        	return regs[3];

	        }
	    }
	}

	function cekBulanTahun(form){

		re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

		if (form !== '') {

	        if (regs = form.match(re)) {

	        	return regs[3]+'-'+regs[2]+'-'+regs[1];

	        }
	    }
	}

	function getRekapDataHarga(page) {
		//Laporan rekap harga dan pemeriksaan laboratorium
		$('#page-now').val(page);
		var periodeLaporan = '';
		var tanggalAwal = '';
		var tanggalAkhir = '';
		var tanggalHarian = '';
		var bulanTahunAwal = '';
		var bulanTahunAkhir = '';

		if ($('#jenis-laporan').val() == "1") {
			$('.lap-rekap, #table-lap-rekap tbody').show();

			periodeLaporan = $('#periode-laporan-rekap').val();

			if(periodeLaporan === 'Rentang Waktu'){

				cekTanggalAwal = $('#tanggal-awal-rekap').val();
				cekTanggalAkhir = $('#tanggal-akhir-rekap').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){

					syams_validation('#tanggal-awal-rekap', 'Tanggal Awal tidak terdefinisi');
					return false;

				}

				if(tahunAkhir === undefined){

					syams_validation('#tanggal-akhir-rekap', 'Tanggal Akhir tidak terdefinisi');
					return false;

				}

				if(bulanTahunAwal > bulanTahunAkhir){

					syams_validation('#tanggal-awal-rekap', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;

				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){

					syams_validation('#tanggal-awal-rekap', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;

				}

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-awal-rekap', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){

					syams_validation('#tanggal-akhir-rekap', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				tanggalAwal = cekDateTime('#tanggal-awal-rekap', cekTanggalAwal);
				tanggalAkhir = cekDateTime('#tanggal-akhir-rekap', cekTanggalAkhir);

				syams_validation_remove('#tanggal-awal-rekap');
        		syams_validation_remove('#tanggal-akhir-rekap');

        	}

			if(periodeLaporan === 'Harian'){

				tanggalHarian = $('#tanggal-harian-rekap').val();

				tahunAwal = cekTahun(tanggalHarian);
				bulanTahunAwal = cekBulanTahun(tanggalHarian);

				var x = new Date();
			    var date = x.getDate();
			    var month = x.getMonth();
			    month++;

				if (month < 10) {
			        month = '0' + String(month);
			    };

			    if (date < 10) {
			        date = '0' + String(date);
			    }

				tanggalHariIni = new Date().getFullYear() + '-' + month + '-' + date;

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-harian-rekap', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){

					syams_validation('#tanggal-harian-rekap', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				if(bulanTahunAwal > tanggalHariIni){

					syams_validation('#tanggal-harian-rekap', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;

				}

				syams_validation_remove('#tanggal-harian-rekap');

			}

			openData();
		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_laboratorium/api/laporan_laboratorium/rekap_data_harga_pemeriksaan') ?>/page/' + page + '/jenis/',
				data: $('#form-search-rekap').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					if(typeof data.data === 'undefined' | data.data === null){

						messageCustom('Tidak Ada Data', 'Error');
						return false;

					}

					if ((page - 1) & (data.data.length === 0)) {
						getRekapDataHarga(page - 1);
						return false;
					}

					$('#jenis-periode-rekap').html('Periode : ' + data.periode);
					$('#pagination-rekap').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-rekap').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-rekap, #table-lap-rekap tbody').show();
					$('#table-lap-rekap tbody').empty();
					$('#table-lap-rekap tfoot').empty();

					let i = 1;

					let html = '';

					let layanan = '';

					let bangsal = '';

					let totalLength = '';

					$.each(data.data, function(a, value) {

						layanan = value.detail.layanan_lab;

						if (layanan === 'Poliklinik' || layanan === 'IGD') {
					        bangsal = value.detail.layanan;
					    } else if (layanan === 'Rawat Inap') {
					        bangsal = value.detail.bangsal;
					    } else if (layanan === 'Intensive Care') {
					        bangsal = value.detail.bangsal_icare;
					    } else {
					        bangsal = value.detail.layanan;
					    }

						html = `<tr>
									<td class="center">${((a + 1) + ((data.page - 1) * data.limit))}</td>
									<td class="center">${((value.detail.waktu_order !== null && value.detail.waktu_order !== '') ? datetimefmysql(value.detail.waktu_order) : '')}</td>
									<td class="center">${((value.detail.no_rm !== null && value.detail.no_rm !== '') ? value.detail.no_rm : '')}</td>
									<td class="left">${((value.detail.pasien !== null && value.detail.pasien !== '') ? value.detail.pasien : '')}</td>
									<td class="center">${((bangsal !== null && bangsal !== '') ? bangsal : '')}</td>
									<td class="center">${((value.detail.penjamin !== null && value.detail.penjamin !== '') ? value.detail.penjamin : value.detail.cara_bayar)}</td>
									<td class="left">${((value.detail.dokter !== null && value.detail.dokter !== '') ? value.detail.dokter : '')}</td>
									`;

									$.each(value.datalaboratorium, function(b, c) {

										if(value.datalaboratorium.length === 1){

											html += `<td class="left">${((c.nama !== null && c.nama !== '') ? c.nama : '')}</td><td class="right">${((c.total !== null && c.total !== '') ? c.total : '')}</td>`;
											html += `<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left"><b>TOTAL HARGA</b></td><td class="right"><b>${((value.total_harga !== null && value.total_harga !== '') ? value.total_harga : '')}</b></td></tr>`;

										} else {

											if(b === 0){

												html += `<td class="left">${((value.datalaboratorium[0].nama !== null && value.datalaboratorium[0].nama !== '') ? value.datalaboratorium[0].nama : '')}</td><td class="right">${((value.datalaboratorium[0].total !== null && value.datalaboratorium[0].total !== '') ? value.datalaboratorium[0].total : '')}</td></tr>`;

											} else {

												totalLength = value.datalaboratorium.length - 1;

												if(b === totalLength){
												
													html += `<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left">${((c.nama !== null && c.nama !== '') ? c.nama : '')}</td><td class="right">${((c.total !== null && c.total !== '') ? c.total : '')}</td></tr>`;


													html += `<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left"><b>TOTAL HARGA</b></td><td class="right"><b>${((value.total_harga !== null && value.total_harga !== '') ? value.total_harga : '')}</b></td></tr>`;

												} else {

													html += `<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left">${((c.nama !== null && c.nama !== '') ? c.nama : '')}</td><td class="right">${((c.total !== null && c.total !== '') ? c.total : '')}</td></tr>`;

												}

											}

										}

									})


						html +=	`
								
								</tr>
							`;

						$('#table-lap-rekap tbody').append(html);
		                
		            })
				},
				complete: function() {
					hideLoader()
					$('#modal-search-rekap').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>