<script>

  	// Mendapatkan tahun saat ini
  	var tahunSekarang = new Date().getFullYear();                                                   
    // Menetapkan tahun ke elemen span dengan id "tahun"
    document.getElementById("tahun_sekarang_uhuy").innerHTML = tahunSekarang;

    $(function() {
		$('#tanggal-waktu-surat, #tanggal-diperiksa-skpk').datetimepicker({
			format: 'DD/MM/YYYY',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});

		$('#dokter-penguji-kesehatan').select2c({
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
				$('#dokter-informasi').val(data.id);
				return data.nama;
			}
		});

	})	
	// On change for radio button is pasien
	           
		
	function simpanFormSKPK() {
		if ($('#tanggal-diperiksa-skpk').val() === '') {
            syams_validation('#tanggal-diperiksa-skpk', 'Tanggal Periksa belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-diperiksa-skpk');
        }
		if ($('#tanggal-waktu-surat').val() === '') {
            syams_validation('#tanggal-waktu-surat', 'Tanggal Surat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-waktu-surat');
        }
		if ($('#dokter-penguji-kesehatan').val() === '') {
            syams_validation('#dokter-penguji-kesehatan', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-penguji-kesehatan');
        }

		var id = $('#id-pendaftaran-skpk').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_skpk") ?>',
			data: $('#form-skpk').serialize(),
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

					$('#modal_form_skpk').modal('hide');

					window.open('<?= base_url('medical_check_up/cetak_form_skpk/') ?>' + id, 'Cetak Surat Keterangan Pengujian Kesehatan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<!-- Modal FormModal Form SKPK MCU -->
<div class="modal fade" id="modal_form_skpk" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-form-skpk-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-skpk class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skpk">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-skpk">
									<table class="table table-no-border table-sm table-striped">										
                                        <tr>
											<td class="bold" width="20%">No. Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="no_surat_skpk" class="custom-form col-lg-6"
													id="no-surat-skpk" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Tahun Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%" class="d-flex">
												MCU - RSUDKT / <span class="ml-1" id="tahun_sekarang_uhuy"></span>
                                        	</td>

										</tr>
										<tr>
											<td class="bold" width="20%">Nama</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_pasien_skpk" class="custom-form col-lg-6"
													id="nama-pasien-skpk" disabled>
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Nama Kecil</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nama_kecil_skpk" class="custom-form col-lg-6"
													id="nama-kecil-skpk" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">NIP</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="nip_skpk" class="custom-form col-lg-6"
													id="nip-skpk" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Jenis Kelamin</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="jenis_kelamin_skpk" class="custom-form col-lg-6"
													id="jenis-kelamin-skpk" disabled>
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="20%">Pekerjaan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%"> PEGAWAI NEGERI SIPIL
												<!-- <input type="text" name="pekerjaan_skpk" class="custom-form col-lg-6"
													id="pekerjaan-skpk" disabled> -->
											</td>
										</tr>
										
                                        <tr>
											<td class="bold" width="20%">Gol.Ruang</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="gol_ruang_skpk" class="custom-form col-lg-6"
													id="gol-ruang-skpk" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Karpeg</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="karpeg_skpk" class="custom-form col-lg-6"
													id="karpeg-skpk" >
											</td>
										</tr>
                                        <tr>
											<td class="bold" width="20%">Alamat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="alamat_skpk" class="custom-form col-lg-6"
													id="alamat-skpk" disabled>
											</td>
										</tr> 
										<tr>
											<td class="bold" width="20%">Salinan Hasil 1</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salinan_hasil_satu" class="custom-form col-lg-6"
													id="salinan-hasil-satu" >
											</td>
										</tr>     
										<tr>
											<td class="bold" width="20%">Salinan Hasil 2</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salinan_hasil_dua" class="custom-form col-lg-6"
													id="salinan-hasil-dua" >
											</td>
										</tr> 
										<tr>
											<td class="bold" width="20%">Salinan Hasil 3</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="salinan_hasil_tiga" class="custom-form col-lg-6"
													id="salinan-hasil-tiga" >
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Tanggal Surat</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_diperiksa_skpk" class="custom-form col-lg-2"
													id="tanggal-diperiksa-skpk">
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Telah diperiksa atas surat permintaan dari</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<textarea name="telah_diperiksa" id="telah-diperiksa" rows="3" class="form-control clear-input"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold" width="20%">Dokter Penguji Kesehatan</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="dokter_penguji_kesahatan" id="dokter-penguji-kesehatan" class="select2c-input">
											</td>
										</tr>                                   
										<tr>
											<td class="bold" width="20%">Tanggal Periksa</td>
											<td class="bold" width="1%">:</td>
											<td width="48%">
												<input type="text" name="tanggal_surat" class="custom-form col-lg-2"
													id="tanggal-waktu-surat">
											</td>
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanFormSKPK()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKPK MCU -->