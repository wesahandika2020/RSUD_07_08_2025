<script>
	$(function() {
		let currentDate = new Date();
		$('#ek_kontrol_dokter_resume').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
			beforeShow: function(i) {
				if ($(i).attr('readonly')) {
					return false;
				}
			}

		});

		$('#ek_nama_dokter_resume').select2c({
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
		});


		$('#obat_rm').select2c({
			minimumInputLength: 2,
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2

					return {
						q: term, //search term
						page: page // page number
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

		});
		
		$('#ek_jam_pemberian_rm, #ek_jam_pemberian_satu_rm, #ek_jam_pemberian_dua_rm, #ek_jam_pemberian_tiga_rm, #ek_jam_pemberian_empat_rm, #ek_jam_pemberian_lima_rm').on('click', function(){
			$(this).timepicker({
				format: 'HH:mm',
				showInputs: false,
				showMeridian: false
			});
		})

	})

	function simpanResumeMedisRanap() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_resume_medis_ranap") ?>',
			data: $('#form-modal-resume-medis').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#btn_xetak').show();
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

	function cetakResumeMedisRanap(){
		const id = $('#id-layanan-pendaftaran-resume').val();
		const id_daftar = $('#rm-id-pendaftaran').val();

		const dWidth = $(window).width();
		const dHeight = $(window).height();
		const x = screen.width / 2 - dWidth / 2;
		const y = screen.height / 2 - dHeight / 2;

		window.open('<?= base_url('rawat_inap/cetak_resume_medis_ranap/') ?>' + id + '/' + id_daftar, 'Cetak Formulir Resume Medis Rawat Inap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

		$('#modal-resume-medis').modal('hide');
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal-resume-medis" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-resume-medis-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-modal-resume-medis class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran_resume" id="id-layanan-pendaftaran-resume">

				<input type="hidden" name="id_layanan_pendaftaran" id="rm_id_layanan_pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="rm-id-pendaftaran">
				<input type="hidden" name="id_bed" id="ek-id-bed">
				<input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
				<input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
				<input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
																															$nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>
				<input type="hidden" name="id_dpjp_utama_pagi_hidden" id="id-dpjp-utama-pagi-hidden">
				<input type="hidden" name="id_dokter_dpjp_sore_hidden" id="id-dokter-dpjp-sore-hidden">
				<input type="hidden" name="id_dokter_dpjp_malam_hidden" id="id-dokter-dpjp-malam-hidden">
				<input type="hidden" name="id_perawat_mengover_pagi_hidden" id="id-perawat-mengover-pagi-hidden">
				<input type="hidden" name="id_perawat_menerima_pagi_hidden" id="id-perawat-menerima-sore-hidden">
				<input type="hidden" name="id_perawat_mengover_sore_hidden" id="id-perawat-mengover-sore-hidden">
				<input type="hidden" name="id_perawat_menerima_sore_hidden" id="id-perawat-menerima-sore-hidden">
				<input type="hidden" name="id_perawat_mengover_malam_hidden" id="id-perawat-menover-malam-hidden">
				<input type="hidden" name="id_perawat_penerima_malam_hidden" id="id-perawat-menerima-malam-hidden">

				<!-- header -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="25%" class="bold">Nama Pasien</td>
									<td>: <span id="resume_pasien_nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="resume_pasien_no_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="resume_pasien_tanggal_lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="resume_pasien_jenis_kelamin"></span></td>
								</tr>
								<tr>
									<td class="bold">Ruang Rawat/Unit Kerja</td>
									<td>: <span id="resume_bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- end header -->

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-modal-resume-medis">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Tanggal Masuk</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggal-masuk-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tanggal Keluar / Meninggal</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggal-keluar-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Ruang Rawat Terakhir</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="ruang-rawat-terakhir-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tanggung Jawab Pembayaran</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggung-jawab-pembayaran-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis / Masalah Waktu Masuk</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-waktu-masuk-rm"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"></td>
											<td width="1%"></td>
											<td>
												<label id="data-resume-radiologi"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Ringkasan Riwayat Penyakit</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<textarea name="ringkasan_riwayat" id="ringkasan-riwayat" class="form-control" rows="4"></textarea>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pemeriksaan Fisik</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<textarea name="pemeriksaan_fisik" id="pemeriksaan-fisik" class="form-control" rows="4"></textarea>
											</td>
										</tr>										
									</table>
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Terapi / Pengobatan Selama di Rumah Sakit</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<div id="terapi-pengobatan"></div>
											</td>
										</tr>
									</table>
									<!-- <table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="100%"><b>Pemeriksaan Penunjang / Diagnostik Terpenting</b></td>
											</td>
										</tr>
										<tr>
											<td width="100%">
												<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
						                            <div class="card-body">
						                                <div class="row">
						                                    <div class="col-lg-12">
						                                        <div class="box-well">
						                                        	<div id="resume-hasil-laboratorium"></div>
						                                        </div>
						                                        <div class="box-well">
						                                        	<div id="resume-hasil-radiologi"></div>
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>
						                     </td>
										</tr>
									</table> -->
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Hasil Konsultasi</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="hasil_konsultasi_rm" class="custom-form" id="hasil-konsultasi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis Utama</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-utama-rm"></label>
												<!-- <input type="text" class="custom-form" id="diagnosis-utama-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis Sekunder</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-sekunder-rm"></label>
												<!-- <label id="ds-manual-sekunder-rm"></label> -->
												<!-- <input type="text" class="custom-form" id="diagnosis-sekunder-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tindakan / Prosedur</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="tindakan-rm"></label>
												<!-- <input type="text" class="custom-form" id="tindakan-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pemeriksaan Penunjang / Diagnostik terpenting (input)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="penunjang_diagnostik" class="custom-form" id="penunjang-diagnostik">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Alergi (Reaksi Obat)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="alergi_obat_rm" class="custom-form" id="alergi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Hasil Penunjang Belum Selesai (Pending)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="pending_lab" class="custom-form" id="hasil-laboratoraium-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diet</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="diet_rm" class="custom-form" id="diet-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Instruksi / Anjuran dan Edukasi (Follow Up)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="anjuran_edukasi_rm" class="custom-form" id="instruksi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Kondisi Waktu Keluar</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="kondisi-keluar-rm"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pengobatan Dilanjutkan</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="poliklinik-rm" value="Poliklinik" class="mr-1"><b>Poliklinik</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="rs-lain-rm" value="RS Lain" class="mr-1 ml-2"><b>RS Lain</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="puskesmas-rm" value="Puskesmas" class="mr-1 ml-2"><b>Puskesmas</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="dokter-luar-rm" value="Dokter Luar" class="mr-1 ml-2"><b>Dokter Luar</b>
											</td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kontrol-kembali-resume"><i class="fas fa-expand mr-1"></i>Expand</button>TANGGAL KONTROL POLIKLIKNIK
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-kontrol-kembali-resume">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="2%"></td>
												<td width="15%"><b>Tanggal Kontrol</b></td>
												<td width="2%">:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_kontrol_dokter_resume" id="ek_kontrol_dokter_resume" class="custom-form clear-input d-inline-block col-lg-4">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Nama Dokter</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_nama_dokter" id="ek_nama_dokter_resume" class="select2c-input clear-input d-inline-block">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Tempat Kontrol</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_tempat_kontrol" id="ek_tempat_kontrol" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Tempat Kontrol">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<button type="button" class="btn btn-info" onclick="addJadwalKontrolResume()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Jadwal</button>
												</td>
												<td></td>
												<td></td>
											</tr>
										</table>
										<hr>
										<table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="table-kontrol-resume">
											<thead>
											<tr>
												<th class="center"><b>No</b></th>
												<th class="center"><b>Tanggal</b></th>
												<th class="center"><b>Hari</b></th>
												<th class="center"><b>Jam</b></th>
												<th class="center"><b>Nama Dokter</b></th>
												<th class="center"><b>Tempat</b></th>
												<th class="center">Petugas</th>
												<th class="center">Aksi</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

									<!-- Punya MAs Reza -->
									<!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI PULANG
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-terapi-pulang">
										<table class="table table-sm table-striped table-bordered" id="table-terapi-rm" style="margin-top: -15px">
											<thead>
												<tr>
													<th class="center" rowspan="2"><b>No</b></th>
													<th class="left" rowspan="2"><b>Nama Obat</b></th>
													<th class="center" rowspan="2"><b>Jumlah</b></th>
													<th class="center" rowspan="2"><b>Dosis</b></th>
													<th class="center" rowspan="2"><b>Frekuensi</b></th>
													<th class="center" rowspan="2"><b>Cara Pemberian</b></th>
													<th class="center" colspan="6"><b>Jam Pemberian</b></th>
													<th class="center" rowspan="2"><b>Petunjuk Khusus</b></th>
												</tr>
												<tr>
													<th class="center">a</th>
													<th class="center">b</th>
													<th class="center">c</th>
													<th class="center">d</th>
													<th class="center">e</th>
													<th class="center">f</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div> -->

									<!--Perubahan Awal  --> 
									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI PULANG
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-terapi-pulang">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="2%"></td>
												<td><b>Obat</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="obat_rm" class="select2c-input clear-input d-inline-block" id="obat_rm">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Jumlah</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="number" min="0" name="jumlah_obat_rm" class="custom-form clear-input d-inline-block col-lg-4" id="jumlah-obat-rm">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Dosis</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="dosis_rm" id="dosis-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Dosis...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Frekuensi</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="frekuensi_rm" id="frekuensi-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Frekuensi...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Cara Pemberian</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="cara_pemberian_rm" id="cara-pemberian-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Cara Pemberian...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Jam Pemberian</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_jam_pemberian_rm" id="ek_jam_pemberian_rm" class="custom-form clear-input d-inline-block col-lg-5 mr-1">

														<input type="text" name="ek_jam_pemberian_satu_rm" id="ek_jam_pemberian_satu_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_dua_rm" id="ek_jam_pemberian_dua_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_tiga_rm" id="ek_jam_pemberian_tiga_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_empat_rm" id="ek_jam_pemberian_empat_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_lima_rm" id="ek_jam_pemberian_lima_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Petunjuk Khusus</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="petunjuk_khusus_rm" id="petunjuk-khusus-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Petunjuk Khusus...">
														<input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="created_date" value="<?= date("Y-m-d H:i:s") ?>">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td width="15%">
													<button type="button" class="btn btn-info" onclick="addTerapiRM()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Terapi</button>
												</td>
												<td></td>
												<td></td>
											</tr>
										</table>
										<!-- <hr> -->
										<table class="table table-sm table-striped table-bordered" id="table-terapi-rm" style="margin-top: -15px">
											<thead>
												<tr>
													<th class="center" rowspan="2"><b>No</b></th>
													<th class="center" rowspan="2"><b>Nama Obat</b></th>
													<th class="center" rowspan="2"><b>Jumlah</b></th>
													<th class="center" rowspan="2"><b>Dosis</b></th>
													<th class="center" rowspan="2"><b>Frekuensi</b></th>
													<th class="center" rowspan="2"><b>Cara Pemberian</b></th>
													<th class="center" colspan="6"><b>Jam Pemberian</b></th>
													<th class="center" rowspan="2"><b>Petunjuk Khusus</b></th>
													<th class="center" rowspan="2">Petugas</th>
													<th class="center" rowspan="2">Aksi</th>
												</tr>
												<tr>
													<th class="center">a</th>
													<th class="center">b</th>
													<th class="center">c</th>
													<th class="center">d</th>
													<th class="center">e</th>
													<th class="center">f</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

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
				<button type="button" class="btn btn-info" onclick="simpanResumeMedisRanap()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button>
				<button type="button" class="btn btn-info hide" onclick="cetakResumeMedisRanap()" id="btn_xetak"><i class="fas fa-print mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
