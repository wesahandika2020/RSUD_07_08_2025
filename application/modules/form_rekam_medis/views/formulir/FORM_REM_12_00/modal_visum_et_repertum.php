<script>
	$(function() {		
		$('#dokter-jaga-igd-ver').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
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
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data){
				$('#id-dokter-jaga-idg-ver').val(data.id);
				return data.nama;
			}
		});		

		$('#diterima-ver, #diperiksa-ver').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#btn_expand_all').click(function() {
			$('.collapse').addClass('show');
		});

		$('#btn_collapse_all').click(function() {
			$('.collapse').removeClass('show');
		});
	})	

	// On change for radio button tato
	$('input[type=radio][name=tato]').change(function(){ 
		// Conditions
		if (this.value === 'Ada') {											
			// Unisabled fields
			$( "#posisi-tato-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak') {
			// Disabled fields
			$( "#posisi-tato-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#posisi-tato-ver').val('');
		}
	});

	// On change for radio button jaringan parut
	$('input[type=radio][name=jaringan_parut]').change(function(){ 
		// Conditions
		if (this.value === 'Ada') {											
			// Unisabled fields
			$( "#posisi-jaringan-parut-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak') {
			// Disabled fields
			$( "#posisi-jaringan-parut-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#posisi-jaringan-parut-ver').val('');
		}
	});

	// On change for radio button tahi lalat
	$('input[type=radio][name=tahi_lalat]').change(function(){ 
		// Conditions
		if (this.value === 'Ada') {											
			// Unisabled fields
			$( "#posisi-tahi-lalat-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak') {
			// Disabled fields
			$( "#posisi-tahi-lalat-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#posisi-tahi-lalat-ver').val('');
		}
	});

	// On change for radio button tanda lahir
	$('input[type=radio][name=tanda_lahir]').change(function(){ 
		// Conditions
		if (this.value === 'Ada') {											
			// Unisabled fields
			$( "#posisi-tanda-lahir-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak') {
			// Disabled fields
			$( "#posisi-tanda-lahir-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#posisi-tanda-lahir-ver').val('');
		}
	});

	// On change for radio button cacat fisik
	$('input[type=radio][name=cacat_fisik]').change(function(){ 
		// Conditions
		if (this.value === 'Ada') {											
			// Unisabled fields
			$( "#posisi-cacat-fisik-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak') {
			// Disabled fields
			$( "#posisi-cacat-fisik-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#posisi-cacat-fisik-ver').val('');
		}
	});

	// On change for radio button daerah berambut
	$('input[type=radio][name=daerah_berambut]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-daerah-berambut-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-daerah-berambut-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-daerah-berambut-ver').val('');
		}
	});

	// On change for radio button bentuk kepala
	$('input[type=radio][name=bentuk_kepala]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-bentuk-kepala-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-bentuk-kepala-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-bentuk-kepala-ver').val('');
		}
	});

	// On change for radio button wajah
	$('input[type=radio][name=wajah]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-wajah-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-wajah-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-wajah-ver').val('');
		}
	});

	// On change for radio button leher
	$('input[type=radio][name=leher]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-leher-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-leher-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-leher-ver').val('');
		}
	});

	// On change for radio button bahu
	$('input[type=radio][name=bahu]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-bahu-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-bahu-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-bahu-ver').val('');
		}
	});

	// On change for radio button dada
	$('input[type=radio][name=dada]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-dada-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-dada-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-dada-ver').val('');
		}
	});

	// On change for radio button punggung
	$('input[type=radio][name=punggung]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-punggung-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-punggung-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-punggung-ver').val('');
		}
	});

	// On change for radio button perut
	$('input[type=radio][name=perut]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-perut-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-perut-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-perut-ver').val('');
		}
	});

	// On change for radio button bokong
	$('input[type=radio][name=bokong]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-bokong-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-bokong-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-bokong-ver').val('');
		}
	});

	// On change for radio button dubur
	$('input[type=radio][name=dubur]').change(function(){ 
		// Conditions
		if (this.value === 'Ada kelainan') {											
			// Unisabled fields
			$( "#kelainan-dubur-ver" ).prop( "disabled", false );					
		} else if (this.value === 'Tidak ada kelainan') {
			// Disabled fields
			$( "#kelainan-dubur-ver" ).prop( "disabled", true );
			
			// Set fields to empty string
			$('#kelainan-dubur-ver').val('');
		}
	});
	
	function simpanVisumEtRepertum() {
		var id = $('#id-pendaftaran-ver').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_visum_et_repertum") ?>',
			data: $('#form-visum-et-repertum').serialize(),
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

					$('#modal-visum-et-repertum').modal('hide');

					window.open('<?= base_url('pendaftaran_poli/cetak_visum_et_repertum/') ?>' + id, 'Cetak Visum Et Repertum', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
					showListForm($('#id-pendaftaran-ver-asli').val(),$('#id-pendaftaran-ver').val(), $('#id-pasien-ver').val());  
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

<!-- Modal -->
<div class="modal fade" id="modal-visum-et-repertum" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-visum-et-repertum-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-visum-et-repertum class="form-horizontal"') ?>
					<input type="text" name="id_pasien" id="id-pasien-ver">
					<input type="text" name="id_pendaftaran_asli" id="id-pendaftaran-ver-asli">
					<input type="text" name="id_pendaftaran" id="id-pendaftaran-ver">
					<input type="hidden" name="id_dokter_jaga_igd" id="id-dokter-jaga-idg-ver">

					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-modal-visum-et-repertum">											
										<table class="table table-no-border table-sm">
											<tr>
												<td colspan="6">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" id="btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
													<button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
												</td>
											</tr>
											<tr>
												<td class="bold" width="20%">Nomor Visum</td>
												<td class="bold" width="1%">:</td>		
												<td colspan="4">
													<input type="text" name="nomor_visum" class="custom-form clear-input col-lg-3" id="nomor-visum-ver" placeholder="Nomor Visum">
												</td>																						
											</tr>										
											<tr>
												<td class="bold" width="20%">Nomor Surat</td>
												<td class="bold" width="1%">:</td>		
												<td colspan="4">
													<input type="text" name="nomor_surat" class="custom-form clear-input col-lg-3" id="nomor-surat-ver" placeholder="Nomor Surat">
												</td>																						
											</tr>
											<tr>
												<td class="bold" width="20%">Bulan Surat</td>
												<td class="bold" width="1%">:</td>
												<td width="20%">
													<?= form_dropdown('bulan_surat', array('Januari' => 'Januari', 'Februari' => 'Februari', 'Maret' => 'Maret', 'April' => 'April', 'Mei' => 'Mei', 'Juni' => 'Juni', 'Juli' => 'Juli', 'Agustus' => 'Agustus', 'September' => 'September', 'Oktober' => 'Oktober', 'November' => 'November', 'Desember' => 'Desember'), array(), 'id=bulan-surat-ver class=custom-form') ?>
												</td>
												<td align="right" class="bold" width="20%">Tahun Surat</td>
												<td class="bold" width="1%">:</td>
												<td>
													<input type="number" name="tahun_surat" class="custom-form clear-input col-lg-3" id="tahun-surat-ver" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(event)" value="2021">
												</td>											
											</tr>
											<tr>
												<td class="bold" width="20%">Waktu Diperiksa</td>
												<td class="bold" width="1%">:</td>
												<td width="20%">
													<input type="text" name="diperiksa" class="custom-form clear-input" id="diperiksa-ver" value="<?= date('d/m/Y H:i') ?>">
												</td>
												<td align="right" class="bold" width="20%">Waktu Diterima</td>
												<td class="bold" width="1%">:</td>
												<td>
													<input type="text" name="diterima" class="custom-form clear-input col-lg-4" id="diterima-ver" value="<?= date('d/m/Y H:i') ?>">
												</td>
											</tr>	
											<tr>
												<td class="bold" width="20%">Nomor Polisi</td>	
												<td class="bold" width="1%">:</td>		
												<td colspan="4">
													<input type="text" name="nomor_polisi" class="custom-form clear-input col-lg-3" id="nomor-polisi-ver" placeholder="Nomor Polisi">
												</td>																					
											</tr>										
											<tr>
											<tr>
												<td class="bold" width="20%">Ditandatangani Oleh</td>
												<td class="bold" width="1%">:</td>
												<td colspan="4"><input type="text" name="ditandatangani_oleh" class="custom-form clear-input col-lg-3" id="ditandatangani-oleh-ver" placeholder="Ditandatangani Oleh"></td>
											</tr>
											<tr>
												<td class="bold" width="20%">Pangkat</td>
												<td class="bold" width="1%">:</td>
												<td colspan="4"><input type="text" name="pangkat" class="custom-form clear-input col-lg-3" id="pangkat-ver" placeholder="Pangkat"></td>
											</tr>
											<tr>
												<td class="bold" width="20%">NRP</td>
												<td class="bold" width="1%">:</td>
												<td colspan="4"><input type="text" name="nrp" class="custom-form clear-input col-lg-3" id="nrp-ver" placeholder="NRP"></td>
											</tr>																		
										</table>
										
										<!-- Row Data Pasien -->
										<table class="table table-no-border table-sm" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pasien-ver"><i class="fas fa-expand mr-1"></i>Expand</button>PASIEN
												</td>
											</tr>
										</table>

										<div class="collapse multi-collapse mt-2" id="data-pasien-ver">
											<table class="table table-no-border table-sm" style="margin-top:-15px">
												<tr>
													<td class="bold" width="20%">Berat Badan</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<div class="input-group">
															<input type="number" name="berat_badan" class="custom-form clear-input col-lg-3" id="berat-badan-ver" onkeypress="return hanyaAngka(event)" placeholder="20">
															<div class="input-group-append">
																<span class="input-group-custom">kg</span>
															</div>
														</div>
														
													</td>
													<td class="bold" width="20%">Panjang Badan</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<div class="input-group">
															<input type="number" name="panjang_badan" class="custom-form clear-input col-lg-3" id="panjang-badan-ver" onkeypress="return hanyaAngka(event)" placeholder="20">
															<div class="input-group-append">
																<span class="input-group-custom">m</span>
															</div>
														</div>
														
													</td>																	
												</tr>
												<tr>
													<td class="bold" width="20%">Warna Kulit</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<input type="text" name="warna_kulit" class="custom-form clear-input col-lg-6" id="warna-kulit-ver" placeholder="Warna Kulit">
													</td>
													<td class="bold" width="20%">Warna Pelangi Mata</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<input type="text" name="warna_pelangi_mata" class="custom-form clear-input col-lg-6" id="warna-pelangi-mata-ver" placeholder="Warna Pelangi Mata">
													</td>																	
												</tr>
												<tr>
													<td class="bold" width="20%">Ciri Rambut</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<input type="radio" name="ciri_rambut" id="pendek-ver" value="Pendek" class="mr-1">Pendek
														<input type="radio" name="ciri_rambut" id="panjang-ver" value="Panjang" class="mr-1 ml-2">Panjang
													</td>
													<td class="bold" width="20%">Keadaan Gizi</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<input type="radio" name="keadaan_gizi" id="kurang-ver" value="Kurang" class="mr-1">Kurang
														<input type="radio" name="keadaan_gizi" id="cukup-ver" value="Cukup" class="mr-1 ml-2">Cukup
														<input type="radio" name="keadaan_gizi" id="lebih-ver" value="Lebih" class="mr-1 ml-2">Lebih
													</td>																	
												</tr>
												<tr>
													<td class="bold" width="20%">Warna Rambut</td>
													<td class="bold" width="1%">:</td>		
													<td colspan="4">
														<input type="text" name="warna_rambut" class="custom-form clear-input col-lg-3" id="warna-rambut-ver" placeholder="Warna Rambut">
													</td>																														
												</tr>
											</table>
										</div>

										<!-- Row Data Identitas Pasien -->
										<table class="table table-no-border table-sm" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-identitas-pasien-ver"><i class="fas fa-expand mr-1"></i>Expand</button>IDENTITAS PASIEN
												</td>
											</tr>
										</table>

										<div class="collapse multi-collapse mt-2" id="data-identitas-pasien-ver">
											<table class="table table-no-border table-sm" style="margin-top:-15px">
												<tr>
													<td class="bold" width="20%">Tato</td>
													<td class="bold" width="1%">:</td>		
													<td>														
														<input type="radio" name="tato" id="tato-tidak-ada-ver" value="Tidak" class="mr-1">Tidak
														<input type="radio" name="tato" id="tato-ada-ver" value="Ada" class="mr-1 ml-2">Ada, di
														<input type="text" name="posisi_tato" id="posisi-tato-ver" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan" disabled>												
													</td>
													<td class="bold" width="20%">Jaringan Parut</td>
													<td class="bold" width="1%">:</td>		
													<td>
													<input type="radio" name="jaringan_parut" id="jaringan-parut-tidak-ada-ver" value="Tidak" class="mr-1">Tidak
														<input type="radio" name="jaringan_parut" id="jaringan-parut-ada-ver" value="Ada" class="mr-1 ml-2">Ada, di
														<input type="text" name="posisi_jaringan_parut" id="posisi-jaringan-parut-ver" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan" disabled>
													</td>																	
												</tr>
												<tr>
													<td class="bold" width="20%">Tahi Lalat</td>
													<td class="bold" width="1%">:</td>		
													<td>														
														<input type="radio" name="tahi_lalat" id="tahi-lalat-tidak-ada-ver" value="Tidak" class="mr-1">Tidak
														<input type="radio" name="tahi_lalat" id="tahi-lalat-ada-ver" value="Ada" class="mr-1 ml-2">Ada, di
														<input type="text" name="posisi_tahi_lalat" id="posisi-tahi-lalat-ver" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan" disabled>												
													</td>
													<td class="bold" width="20%">Tanda Lahir</td>
													<td class="bold" width="1%">:</td>		
													<td>
													<input type="radio" name="tanda_lahir" id="tanda-lahir-tidak-ada-ver" value="Tidak" class="mr-1">Tidak
														<input type="radio" name="tanda_lahir" id="tanda-lahir-ada-ver" value="Ada" class="mr-1 ml-2">Ada, di
														<input type="text" name="posisi_tanda_lahir" id="posisi-tanda-lahir-ver" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan" disabled>
													</td>																	
												</tr>
												<tr>
													<td class="bold" width="20%">Cacat Fisik</td>
													<td class="bold" width="1%">:</td>		
													<td>														
														<input type="radio" name="cacat_fisik" id="cacat-fisik-tidak-ada-ver" value="Tidak" class="mr-1">Tidak
														<input type="radio" name="cacat_fisik" id="cacat-fisik-ada-ver" value="Ada" class="mr-1 ml-2">Ada, di
														<input type="text" name="posisi_cacat_fisik" id="posisi-cacat-fisik-ver" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Sebutkan" disabled>												
													</td>													
												</tr>
												<tr>
													<td class="bold" width="20%">Pakaian</td>
													<td class="bold" width="1%">:</td>
													<td colspan="4">
														<input type="radio" name="pakaian" id="pakaian-lengan-panjang-ver" value="Baju lengan panjang" class="mr-1">Baju lengan panjang
														<input type="radio" name="pakaian" id="pakaian-lengan-pendek-ver" value="Baju lengan pendek" class="mr-1 ml-2">Baju lengan pendek
														<input type="text" name="warna_pakaian" class="custom-form clear-input d-inline-block col-lg-2" id="warna-pakaian-ver" placeholder="Warna">
														<input type="text" name="bahan_pakaian" class="custom-form clear-input d-inline-block col-lg-2" id="bahan-pakaian-ver" placeholder="Bahan">
														<input type="text" name="merk_pakaian" class="custom-form clear-input d-inline-block col-lg-2" id="merk-pakaian-ver" placeholder="Merk">
														<input type="number" name="ukuran_pakaian" class="custom-form clear-input d-inline-block col-lg-2" id="ukuran-pakaian-ver" placeholder="Ukuran" onkeypress="return hanyaAngka(event)">
														<input type="text" name="gambar_lambang_pakaian" class="custom-form clear-input d-inline-block col-lg-2" id="gambar-lambang-pakaian-ver" placeholder="Gambar Lambang">
														<input type="radio" name="tampak_pakaian" id="ada-darah-ver" value="Ada darah" class="mr-1 ml-2">Ada darah
														<input type="radio" name="tampak_pakaian" id="tidak-ada-darah-ver" value="Tidak ada darah" class="mr-1 ml-2">Tidak ada darah												
													</td>													
												</tr>												
												<tr>													
													<td class="bold" width="20%">Celana</td>
													<td class="bold" width="1%">:</td>		
													<td colspan="4">
														<input type="radio" name="celana" id="celana-panjang-ver" value="Celana panjang" class="mr-1">Celana panjang
														<input type="radio" name="celana" id="rok-ver" value="Rok" class="mr-1 ml-2">Rok
														<input type="radio" name="celana" id="kain-ver" value="Kain" class="mr-1 ml-2">Kain
														<input type="text" name="warna_celana" class="custom-form clear-input d-inline-block col-lg-2" id="warna-celana-ver" placeholder="Warna">
														<input type="number" name="ukuran_celana" class="custom-form clear-input d-inline-block col-lg-2" id="ukuran-celana-ver" placeholder="Ukuran" onkeypress="return hanyaAngka(event)">
														<input type="text" name="merk_celana" class="custom-form clear-input d-inline-block col-lg-2" id="merk-celana-ver" placeholder="Merk">
													</td>								
												</tr>
												<tr>			
													<td class="bold" width="20%">Perhiasan</td>
													<td class="bold" width="1%"></td>		
													<td>
														<input type="text" name="perhiasan" class="custom-form clear-input col-lg-6" id="perhiasan-ver" placeholder="Perhiasan">
													</td>
													<td class="bold" width="20%">Lain-lain</td>
													<td class="bold" width="1%">:</td>		
													<td>
														<textarea name="lain_lain_identitas_pasien" id="lain-lain-identitas-pasien-ver" rows="2" class="form-control clear-input" placeholder="Lain-lain"></textarea>
													</td>																
												</tr>																					
											</table>
										</div>

										<!-- Row Data Permukaan Kulit -->
										<table class="table table-no-border table-sm" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-permukaan-kulit-ver"><i class="fas fa-expand mr-1"></i>Expand</button>PERMUKAAN KULIT
												</td>
											</tr>
										</table>

										<div class="collapse multi-collapse mt-2" id="data-permukaan-kulit-ver">
											<table class="table table-no-border table-sm">
												<tr>
													<td class="bold">Tubuh</td>
													<td width="1%">:</td>		
													<td width="79%">														
														<input type="text" name="tubuh" class="custom-form clear-input col-lg-3" id="tubuh-ver" placeholder="Tubuh">		
													</td>						
												</tr>	
												<tr>
													<td class="bold" colspan="3">Kepala</td>
												</tr>
												<tr>
													<td><span class="ml-4">Daerah berambut</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="daerah_berambut" id="tidak-ada-kelainan-daerah-berambut-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="daerah_berambut" id="ada-kelainan-daerah-berambut-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_daerah_berambut" id="kelainan-daerah-berambut-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bentuk kepala</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bentuk_kepala" id="tidak-ada-kelainan-bentuk-kepala-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bentuk_kepala" id="ada-kelainan-bentuk-kepala-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_bentuk_kepala" id="kelainan-bentuk-kepala-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Wajah</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="wajah" id="tidak-ada-kelainan-wajah-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="wajah" id="ada-kelainan-wajah-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_wajah" id="kelainan-wajah-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Leher</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="leher" id="tidak-ada-kelainan-leher-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="leher" id="ada-kelainan-leher-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_leher" id="kelainan-leher-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Bahu</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bahu" id="tidak-ada-kelainan-bahu-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bahu" id="ada-kelainan-bahu-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_bahu" id="kelainan-bahu-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Dada</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="dada" id="tidak-ada-kelainan-dada-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="dada" id="ada-kelainan-dada-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_dada" id="kelainan-dada-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>	
												<tr>
													<td class="bold">Punggung</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="punggung" id="tidak-ada-kelainan-punggung-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="punggung" id="ada-kelainan-punggung-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_punggung" id="kelainan-punggung-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Perut</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="perut" id="tidak-ada-kelainan-perut-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="perut" id="ada-kelainan-perut-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_perut" id="kelainan-perut-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Bokong</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bokong" id="tidak-ada-kelainan-bokong-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bokong" id="ada-kelainan-bokong-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_bokong" id="kelainan-bokong-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold">Dubur</td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="dubur" id="tidak-ada-kelainan-dubur-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="dubur" id="ada-kelainan-dubur-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan
														<textarea name="kelainan_dubur" id="kelainan-dubur-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan" disabled></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold" colspan="3">Anggota Gerak</td>
												</tr>
												<tr>
													<td colspan="3"><span class="ml-4">Anggota Gerak Atas</span></td>													
												</tr>
												<tr>
													<td><span class="ml-5">Kanan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">														
														<textarea name="anggota_gerak_atas_kanan" id="anggota-gerak-atas-kanan-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan"></textarea>
													</td>
												</tr>
												<tr>
													<td><span class="ml-5">Kiri</span></td>
													<td wdith="1%">:</td>
													<td width="79%">														
														<textarea name="anggota_gerak_atas_kiri" id="anggota-gerak-atas-kiri-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan"></textarea>
													</td>
												</tr>	
												<tr>
													<td colspan="3"><span class="ml-4">Anggota Gerak Bawah</span></td>													
												</tr>
												<tr>
													<td><span class="ml-5">Kanan</span></td>
													<td wdith="1%">:</td>
													<td width="79%">														
														<textarea name="anggota_gerak_bawah_kanan" id="anggota-gerak-bawah-kanan-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan"></textarea>
													</td>
												</tr>
												<tr>
													<td><span class="ml-5">Kiri</span></td>
													<td wdith="1%">:</td>
													<td width="79%">														
														<textarea name="anggota_gerak_bawah_kiri" id="anggota-gerak-bawah-kiri-ver" rows="2" class="form-control clear-input" placeholder="Sebutkan"></textarea>
													</td>
												</tr>
												<tr>
													<td class="bold" colspan="3">Mata</td>
												</tr>
												<tr>
													<td><span class="ml-4">Alis Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="alis_mata" class="custom-form clear-input col-lg-6" id="alis-mata-ver" placeholder="Alis Mata">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bulu Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="bulu_mata" class="custom-form clear-input col-lg-6" id="bulu-mata-ver" placeholder="Bulu Mata">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Selaput Kelopak Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="selaput_kelopak_mata" class="custom-form clear-input col-lg-6" id="selaput-kelopak-mata-ver" placeholder="Selaput Kelopak Mata">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Selaput Biji Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="selaput_biji_mata" class="custom-form clear-input col-lg-6" id="selaput-biji-mata-ver" placeholder="Selaput Biji Mata">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Selaput Bening Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="selaput_bening_mata" class="custom-form clear-input col-lg-6" id="selaput-bening-mata-ver" placeholder="Selaput Bening Mata">
													</td>
												</tr>												
												<tr>
													<td><span class="ml-4">Pupil Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="bentuk_pupil_mata" class="custom-form clear-input d-inline-block col-lg-3" id="bentuk-pupil-mata-ver" placeholder="Bentuk pupil">
														<input type="text" name="ukuran_pupil_mata" class="custom-form clear-input d-inline-block col-lg-2" id="ukuran-pupil-mata-ver" placeholder="Ukuran pupil">
														<input type="text" name="garis_tengah_pupil_mata" class="custom-form clear-input d-inline-block col-lg-2" id="garis-tengah-pupil-mata-ver" placeholder="Garis tengah">
														<input type="text" name="garis_kanan_pupil_mata" class="custom-form clear-input d-inline-block col-lg-2" id="garis-kanan-pupil-mata-ver" placeholder="Garis kanan">
														<input type="text" name="garis_kiri_pupil_mata" class="custom-form clear-input d-inline-block col-lg-2" id="garis-kiri-pupil-mata-ver" placeholder="Garis kiri">
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Pelangi Mata</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="text" name="pelangi_mata" class="custom-form clear-input col-lg-6" id="pelangi-mata-ver" placeholder="Pelangi Mata">
													</td>
												</tr>
												<tr>
													<td class="bold" colspan="3">Hidung</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bentuk Hidung</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bentuk_hidung" id="tidak-ada-kelainan-bentuk-hidung-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bentuk_hidung" id="ada-kelainan-bentuk-hidung-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>	
												<tr>
													<td><span class="ml-4">Permukaan Kulit Hidung</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="permukaan_kulit_hidung" id="tidak-ada-kelainan-permukaan-kulit-hidung-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="permukaan_kulit_hidung" id="ada-kelainan-permukaan-kulit-hidung-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Lubang Hidung</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="lubang_hidung" id="tidak-ada-kelainan-lubang-hidung-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="lubang_hidung" id="ada-kelainan-lubang-hidung-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>
												<tr>
													<td class="bold" colspan="3">Telinga</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bentuk Telinga</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bentuk_telinga" id="tidak-ada-kelainan-bentuk-telinga-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bentuk_telinga" id="ada-kelainan-bentuk-telinga-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Permukaan Telinga</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="permukaan_telinga" id="tidak-ada-kelainan-permukaan-telinga-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="permukaan_telinga" id="ada-kelainan-permukaan-telinga-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>
												<tr>
													<td><span class="ml-4">Lubang Telinga</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="lubang_telinga" id="tidak-ada-kelainan-lubang-telinga-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="lubang_telinga" id="ada-kelainan-lubang-telinga-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>	
												<tr>
													<td class="bold" colspan="3">Mulut</td>
												</tr>
												<tr>
													<td><span class="ml-4">Bibir Atas</span></td>
													<td wdith="1%">:</td>
													<td width="79%">
														<input type="radio" name="bibir_atas" id="tidak-ada-kelainan-bibir-atas-ver" value="Tidak ada kelainan" class="mr-1">Tidak ada kelainan
														<input type="radio" name="bibir_atas" id="ada-kelainan-bibir-atas-ver" value="Ada kelainan" class="mr-1 ml-2">Ada kelainan		
													</td>
												</tr>									
											</table>
										</div>

										<!-- Row Data Permukaan Kulit -->
										<table class="table table-no-border table-sm" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kesimpulan-ver"><i class="fas fa-expand mr-1"></i>Expand</button>KESIMPULAN
												</td>
											</tr>
										</table>

										<div class="collapse multi-collapse mt-2" id="data-kesimpulan-ver">
											<table class="table table-no-border table-sm" style="margin-top:-15px">
												<tr>
													<td>
														<textarea name="kesimpulan" id="kesimpulan-ver" rows="2" class="form-control clear-input" placeholder="Kesimpulan"></textarea>
													</td>
												</tr>
											</table>
										</div>

										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td class="center td-dark"></td>
											</tr>
											<tr>												
												<td>Dokter Jaga IGD <input type="text" name="dokter_jaga_igd" id="dokter-jaga-igd-ver" class="select2c-input ml-2"></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanVisumEtRepertum()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
