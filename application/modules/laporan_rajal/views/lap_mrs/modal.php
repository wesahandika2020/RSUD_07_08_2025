<!-- Modal Search -->
<div id="modal-search-mrs" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-mrs-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-mrs-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search-mrs role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="periode-laporan-mrs" class="col-md-3 col-form-label">Periode</label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan-mrs class=form-control') ?>
					</div>
				</div>

				<div class="bulanan-mrs form-group row tight">
					<label for="bulan-mrs" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan-mrs class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun-mrs" class="form-control">
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
				<div class="rentang-waktu-mrs form-group row tight">
					<label for="tanggal-awal-mrs" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-mrs" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-mrs" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="harian-mrs form-group row tight">
					<label for="tanggal-harian-mrs" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian-mrs" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<br>
				<div class="rajal-mrs form-group row tight">
					<label for="tempat-layanan-mrs" class="col-md-3 col-form-label">Tempat Layanan</label>
					<div class="col-md-9">
						<?= form_dropdown('tempat_layanan', $tempat_layanan, array(), 'id=tempat-layanan-mrs class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight penjamin-group-search-mrs">
                    <label for="penjamin-search-mrs" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin-search-mrs" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanMrs(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
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
	var baseUrl = '<?= base_url('laporan_rajal/api/laporan_rajal') ?>';
	var jenisPenjamin = 0;

	// Format Tanggal
	$('#tanggal-awal-mrs, #tanggal-akhir-mrs, #tanggal-harian-mrs').datepicker({
		format: 'dd/mm/yyyy'
	}).on('changeDate', function() {
		$(this).datepicker('hide')
	})

	$('#periode-laporan-mrs').change(function() {
		if ($('#periode-laporan-mrs').val() == 'Bulanan') {
			$('.bulanan-mrs, #bulan-mrs, #tahun-mrs').show();
			$('.harian-mrs, .rentang-waktu-mrs, #tanggal-awal-mrs, #tanggal-akhir-mrs').hide();
		}
		if ($('#periode-laporan-mrs').val() == 'Rentang Waktu') {
			$('.rentang-waktu-mrs, #tanggal-awal-mrs, #tanggal-akhir-mrs').show();
			$('.harian-mrs, #tanggal-harian-mrs, .bulanan-mrs, #bulan-mrs, #tahun-mrs').hide();
		}
		if ($('#periode-laporan-mrs').val() == 'Harian') {
			$('.harian-mrs, #tanggal-harian-mrs').show();
			$('.bulanan-mrs, .rentang-waktu-mrs').hide();
		}
	});

	$('#unit-search-mrs').select2({
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

	$('#penjamin-search-mrs').select2({
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

	$('#dokter-search-mrs').select2({
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

	function resetFormMrs() {
		$('#periode-laporan-mrs').val('Bulanan')
		$('#bulan-mrs').val('<?= date('m') ?>')
		$('#tahun-mrs').val('<?= date('Y') ?>')
		$('.bulanan-mrs, #tahun-mrs, #bulan-mrs').show()
		$('#tanggal-awal-mrs, #tanggal-akhir-mrs, #tanggal-harian-mrs').val('<?= date('d/m/Y') ?>')
		$('#jenis-mrs', '#unit-search-mrs', '#penjamin-search-mrs', '#tempat-layanan-mrs').val('')
		$('#unit-search-mrs').val('<?= $this->session->userdata('id_unit') ?>').change()
		$('#s2id_unit-search-mrs a .select2-chosen').html('<?= $this->session->userdata('unit') ?>')
		$('.harian-mrs, #tanggal-harian-mrs, .rentang-waktu-mrs').hide()
		$('#s2id_penjamin-search-mrs a .select2-chosen').html('Pilih Penjamin')
		$('#tempat-layanan-mrs, .rajal-mrs').show()
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

	function getLaporanMrs(page) {
		//Laporan mrs
		$('#page-now').val(page);
		var periodeLaporan = '';
		var tanggalAwal = '';
		var tanggalAkhir = '';
		var tanggalHarian = '';
		var bulanTahunAwal = '';
		var bulanTahunAkhir = '';

		if ($('#jenis-laporan').val() == "4") {
			$('.lap-mrs, #table-lap-mrs tbody').show();

			periodeLaporan = $('#periode-laporan-mrs').val();

			if(periodeLaporan === 'Rentang Waktu'){

				cekTanggalAwal = $('#tanggal-awal-mrs').val();
				cekTanggalAkhir = $('#tanggal-akhir-mrs').val();

				tahunAwal = cekTahun(cekTanggalAwal);
				tahunAkhir = cekTahun(cekTanggalAkhir);

				bulanTahunAwal = cekBulanTahun(cekTanggalAwal);
				bulanTahunAkhir = cekBulanTahun(cekTanggalAkhir);

				if(tahunAwal === undefined){

					syams_validation('#tanggal-awal-mrs', 'Tanggal Awal tidak terdefinisi');
					return false;

				}

				if(tahunAkhir === undefined){

					syams_validation('#tanggal-akhir-mrs', 'Tanggal Akhir tidak terdefinisi');
					return false;

				}

				if(bulanTahunAwal > bulanTahunAkhir){

					syams_validation('#tanggal-awal-mrs', 'Tanggal Awal tidak Boleh lebih dari Tanggal Akhir');
					return false;

				}

				if(parseInt(tahunAwal) > parseInt(tahunAkhir)){

					syams_validation('#tanggal-awal-mrs', 'Tahun Awal Tidak boleh Lebih dari Tahun Akhir');
					return false;

				}

				if(parseInt(tahunAwal) < 2022){

					syams_validation('#tanggal-awal-mrs', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAkhir) > new Date().getFullYear()){

					syams_validation('#tanggal-akhir-mrs', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				tanggalAwal = cekDateTime('#tanggal-awal-mrs', cekTanggalAwal);
				tanggalAkhir = cekDateTime('#tanggal-akhir-mrs', cekTanggalAkhir);

				syams_validation_remove('#tanggal-awal-mrs');
        		syams_validation_remove('#tanggal-akhir-mrs');

        	}

			if(periodeLaporan === 'Harian'){

				tanggalHarian = $('#tanggal-harian-mrs').val();

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

					syams_validation('#tanggal-harian-mrs', 'Tahun Awal Tidak boleh Kurang dari 2022');
					return false;

				}

				if(parseInt(tahunAwal) > new Date().getFullYear()){

					syams_validation('#tanggal-harian-mrs', 'Tahun Akhir Tidak boleh Lebih dari Tahun Saat ini');
					return false;

				}

				if(bulanTahunAwal > tanggalHariIni){

					syams_validation('#tanggal-harian-mrs', 'Tanggal Harian tidak boleh lebih dari pada Tanggal Hari ini');
					return false;

				}

				syams_validation_remove('#tanggal-harian-mrs');

			}

			openData();
		

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_rajal/api/laporan_rajal/get_list_laporan_mrs') ?>/page/' + page + '/jenis/',
				data: $('#form-search-mrs').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {

					var statVal = [];
            		var iVal = [];

            		function groupAndSort(array, groupField, sortField) {
		                var groups = {};
		                for (var i = 0; i < array.length; i++) {
		                    var row = array[i];
		                    var groupValue = row[groupField];
		                    groups[groupValue] = groups[groupValue] || [];
		                    groups[groupValue].push(row);
		                }
		                // Sort each group
		                for (var groupValue in groups) {
		                    groups[groupValue] = groups[groupValue].sort(function(a, b) {
		                        // return a[sortField] - b[sortField];
		                        var firstCase = a[sortField].toLowerCase();
		                        var secondCase = b[sortField].toLowerCase();
		                        if (firstCase < secondCase) {
		                            return -1;
		                        } else if (firstCase > secondCase) {
		                            return 1;
		                        } else {
		                            return 0;
		                        }

		                    });
		                }
		                // Return the results
		                return groups;
		            }

		            function urutan(maSuk) {

		                iVal.push(maSuk);
		                return iVal.sort(function(a, b) {
		                    var firstCase = a.nama_bangsal.toLowerCase();
		                    var secondCase = b.nama_bangsal.toLowerCase();
		                    if (firstCase < secondCase) {
		                        return -1;
		                    } else if (firstCase > secondCase) {
		                        return 1;
		                    } else {
		                        return 0;
		                    }

		                });

		            }

					if(typeof data.data === 'undefined'){

						messageCustom('Tidak Ada Data', 'Info');
						return false;

					}

					if ((page - 1) & (data.data.length === 0)) {
						getLaporanMrs(page - 1);
						return false;
					}

					$('#jenis-periode-mrs').html('Periode : ' + data.periode);
					$('#pagination-mrs').html(pagination(data.jumlah, data.limit, data.page, 1));
					$('#summary-mrs').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
					$('.lap-mrs, #table-lap-mrs tbody').show();
					$('#table-lap-mrs tbody').empty();
					$('#table-lap-mrs tfoot').empty();

					let html = '';

					statVal.push(data.data);

					$.each(statVal, function(a, value) {

		                $.each(value, function(b, c) {

		                    urutan(c);

		                })
		            })

		            var groupedTegr = groupAndSort(iVal, "nama_bangsal", "nama_bangsal");

		            $.each(groupedTegr, function(i, value) {

		            	html = /* html */ `
														<tr>
															<td style="padding-left:40px;" class="v-center bold">${i}</td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
															<td class="v-center bold"></td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													`;
						var status = [];

	                    status.push(value);

	                    const sorter = (a, b) => {
						  const namaA = a.nama_pasien.toLowerCase();
						  const namaB = b.nama_pasien.toLowerCase();
						  if (namaA < namaB) return -1;
						  if (namaA > namaB) return 1;
						  return 0;
						};

						$.each(status, function(h, i) {

	                    	
	                    	i.sort(sorter);

	                    	$.each(i, function(x, y) {

	            				html += `	<tr>
									<td class="center"></td>
									<td class="center">${i[x].no_rm}</td>
									<td class="left">${((i[x].nama_pasien !== null) ? i[x].nama_pasien : '')}</td>
									<td class="left">${((i[x].alamat !== null) ? i[x].alamat : '')}</td>
									<td class="center">${((i[x].umur !== null) ? i[x].umur : '')}</td>
									<td class="center">${((i[x].kelamin !== null) ? i[x].kelamin : '')}</td>
									<td class="center">${((i[x].cara_bayar !== null) ? i[x].cara_bayar : '')}</td>
									<td class="left">${((i[x].nama_dokter !== null) ? i[x].nama_dokter : '')}</td>
									<td class="left">${((i[x].diagnosa !== null) ? i[x].diagnosa : i[x].golongan_sebab_sakit_lain)}</td>
									<td class="left">${((i[x].nama_poli !== null) ? i[x].nama_poli : '')}</td>
								</tr>
								`;
	            			
							});	

						});

						$('#table-lap-mrs tbody').append(html);
					
					});
				},
				complete: function() {
					hideLoader()
					$('#modal-search-mrs').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				}
			})

		}
	}


</script>