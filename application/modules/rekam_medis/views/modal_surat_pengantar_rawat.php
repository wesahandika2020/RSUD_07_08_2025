<!-- // SPR BARU +++ -->
<script>

    $('#tanggal-dokter-spr, #tanggal-petugas-spr')
    .datetimepicker({
        format: 'DD/MM/YYYY',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    $('#dokter-spr, #ttd-dokter-spr').select2c({
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
            $('#id-pemeriksa-skk').val(data.id);
            return data.nama;
        }
    });	
  
    $('input[type=radio][name=is_pasien_spr]').change(function(){ 
		// Conditions
		if (this.value === '1') {
			// Set fields to empty string
			$('#nama-pasien-spr').val('');
			document.getElementById("j-spr-1").checked = true;
			document.getElementById("j-spr-2").checked = true;
			$('#no-rm-spr').val('');
			$('#umur-spr').val('');			
			
			// Disabled fields
			$( "#nama-pasien-spr" ).prop( "disabled", true );
			$( "#j-spr-1" ).prop( "disabled", true );
			$( "#j-spr-2" ).prop( "disabled", true );
			$( "#no-rm-spr" ).prop( "disabled", true );
			$( "#umur-spr" ).prop( "disabled", true );			
		} else if (this.value === '0') {
			// Undisabled fields
			$( "#nama-pasien-spr" ).prop( "disabled", true );
			$( "#j-spr-1" ).prop( "disabled", true );
			$( "#j-spr-2" ).prop( "disabled", true );
			$( "#no-rm-spr" ).prop( "disabled", true );
			$( "#umur-spr" ).prop( "disabled", true );			
		}
	});

    // PETUGAS PENDAFTARAN
	$('#id-petugas-pendaftaran-spr').select2c({
		ajax: {
			url: "<?= base_url('form_rekam_medis/api/form_rekam_medis/saksi_auto') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2
				return {
					q: term, //search term
					page: page, // page number
					// jenis: 15,
				};
			},
			results: function(data, page) {
				var more = (page * 20) < data
					.total; // whether or not there are more results available

				// notice we return the value of more so Select2 knows if more results can be loaded
				return {
					results: data.data,
					more: more
				};
			}
		},
		formatResult: function(data) {
			// var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
			var markup = data.nama;
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	});


    // ADA VALIDASI YANG DI TAMBAHKAN
    function simpanFormSuratPengantarRawat() {
        var stop = false;
        if ($('#tanggal-dokter-spr').val() === '') {
            syams_validation('#tanggal-dokter-spr', 'Kolom tanggal dokter belum diisi!');
            $('#tanggal-dokter-spr').focus();

            // Inisialisasi bwizard sebelum memanggil metodenya
            $('#wizard_form_ranap').bwizard();

            $('#wizard_form_ranap').bwizard('show', '0');
            stop = true;
        } else {
            // Hapus pesan validasi jika tanggal sudah diisi
            syams_validation('#tanggal-dokter-spr', '');
        }

        if ($('#tanggal-petugas-spr').val() === '') {
            syams_validation('#tanggal-petugas-spr', 'Kolom tanggal petugas belum diisi!');
            $('#tanggal-petugas-spr').focus();

            // Inisialisasi bwizard sebelum memanggil metodenya
            $('#wizard_form_ranap').bwizard();

            $('#wizard_form_ranap').bwizard('show', '0');
            stop = true;
        } else {
            // Hapus pesan validasi jika tanggal sudah diisi
            syams_validation('#tanggal-petugas-spr', '');
        }

        if ($('#ttd-dokter-spr').val() === '') {
            syams_validation('#ttd-dokter-spr', 'Kolom dokter belum dipilih!');

            // Inisialisasi bwizard sebelum memanggil metodenya
            $('#wizard_form_ranap').bwizard();

            $('#wizard_form_ranap').bwizard('show', '0');
            stop = true;
        } else {
            // Hapus pesan validasi jika dokter sudah dipilih
            syams_validation('#ttd-dokter-spr', '');
        }

        if (stop) {
            return; // Berhenti jika ada kesalahan validasi
        }

        var id = $('#id-layanan-pendaftaran-spr').val();
        var id_pendaftaran = $('#id-pendaftaran-spr').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('rekam_medis/api/rekam_medis/simpan_surat_pengantar_rawat/') ?>' + id_pendaftaran + '/' + id,
            data: $('#form_surat_keterangan_pengantar_rawat').serialize(),
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

                    $('#modal_surat_pengantar_rawat').modal('hide');

                    window.open('<?= base_url('pemeriksaan_poli/cetak_surat_pengantar_rawat/') ?>' + id_pendaftaran, 'Cetak Surat Pengantar Rawat', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<!-- Modal-->
<div class="modal fade" id="modal_surat_pengantar_rawat" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surat-pengantar-rawat-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_keterangan_pengantar_rawat class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-spr">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-spr">

					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-surat-pengantar-rawat">
										<table class="table table-no-border table-sm table-striped">
                                            <!-- <tr>
                                                <td width="25%"><b>Dengan Hormat,</b></td>
                                                <td width="1%"><b></b></td>
                                            </tr>  -->
                                            <tr>
                                                <td width="25%"><b>Apakah form ditandatangani oleh pasien sendiri?</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="radio" name="is_pasien_spr"id="is-pasien-spr-1" class="mr-1" value="1" checked> Ya
                                                    <!-- <input type="radio" name="is_pasien_spr"id="is-pasien-spr-2" class="mr-1 ml-3" value="0" checked> Benar  -->
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b>Mohon diberikan Perawatan dan atau disiapkan untuk </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="operasi_spr" id="operasi-spr" value="1" class="mr-1"> Operasi
                                                    <input type="checkbox" name="odc_spr"id="odc-spr" value="1" class="mr-1 ml-5"> (ODC) One Day Care
                                                    <input type="checkbox" name="rawat_inap_spr"id="rawat-inap-spr" value="1" class="mr-1 ml-5"> Rawat Inap
                                                </td>
                                            </tr> 

                                            <tr>
                                                <td width="25%"><b>Nama Pasien </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="nama-pasien-spr"></span></td> -->
                                                <td>
                                                    <input type="text" name="nama_pasien_spr"id="nama-pasien-spr" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Jenis Kelamin</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="j-spr"></span></td> -->
                                                <td>
                                                    <input type="radio" name="j_spr"id="j-spr-1" value="Laki-laki" class="mr-1 ml-1" disabled> Laki - laki
                                                    <input type="radio" name="j_spr"id="j-spr-2" value="Perempuan" class="mr-1 ml-5" disabled> Perempuan                                  
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>No. RM </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="no-rm-spr"></span></td> -->
                                                <td>
                                                    <input type="text" name="no_rm_spr"id="no-rm-spr" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Umur </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <!-- <td><span id="umur-spr"></span> Tahun</td> -->
                                                <td>
                                                    <input type="text" name="umur_spr"id="umur-spr" class="custom-form clear-input d-inline-block col-lg-1 mx-1"disabled>
                                                     Tahun
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Diagnosis </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <!-- <input type="text" name="diagnosis_spr"id="diagnosis-spr" class="custom-form clear-input d-inline-block col-lg-3 mx-1"> -->
                                                    <textarea name="diagnosis_spr"id="diagnosis-spr" rows="2" class="form-control clear-input"></textarea>
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="infeksi_spr"id="infeksi-spr" value="1" class="mr-1 ml-1"> Infeksi
                                                    <input type="checkbox" name="non_infeksi_spr"id="non-infeksi-spr" value="1" class="mr-1 ml-5"> Non Infeksi
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Dokter yang merawat</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="dokter_spr"id="dokter-spr" class="select2c-input ml-2">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Jenis tindakan / Operasi</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="jto_spr"id="jto-spr" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Golongan Tindakan / Operasi </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="gto_spr"id="gto-spr" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>    
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="cito_spr"id="cito-spr" value="1" class="mr-1 ml-1"> Cito
                                                    <input type="checkbox" name="tidak_cito_spr"id="tidak-cito-spr" value="1" class="mr-1 ml-5"> Tidak Cito
                                                </td> 
										    </tr>                 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td></td>
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Ruang yang Dituju</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="icu_spr" id="icu-spr" value="1" class="mr-1"> ICU
                                                    <input type="checkbox" name="hcu_spr"id="hcu-spr" value="1" class="mr-1 ml-5"> HCU
                                                    <input type="checkbox" name="pcu_spr"id="pcu-spr" value="1" class="mr-1 ml-5"> PICU
                                                    <input type="checkbox" name="nicu_spr"id="nicu-spr" value="1" class="mr-1 ml-5"> NICU
                                                    <input type="checkbox" name="vk_spr"id="vk-spr" value="1" class="mr-1 ml-5"> VK
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="perinatologi_spr" id="perinatologi-spr" value="1" class="mr-1"> Perinatologi
                                                    <input type="checkbox" name="ruang_perawatan_spr"id="ruang-perawatan-spr" value="1" class="mr-1 ml-5"> Ruang Perawatan
                                                    <input type="text" name="rp_spr"id="rp-spr" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="isolasi_spr" id="isolasi-spr" value="1" class="mr-1"> Isolasi
                                                    <input type="checkbox" name="lain_lain_spr"id="lain-lain-spr" value="1" class="mr-1 ml-5"> Lain- lain
                                                    <input type="text" name="ll_spr"id="ll-spr" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td>
                                            </tr> 
										</table>
                                        <p></p>
                                        <br>
                                        <div class="row">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td width="45%" class="center">
                                                    </td>                                                   
                                                    <td width="45%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_dokter_spr"
                                                        id="tanggal-dokter-spr"class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">Dokter Pengirim,</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center"><input type="text" name="ttd_dokter_spr"
                                                        id="ttd-dokter-spr" class="select2c-input ml-2">
													</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        Nama Jelas & Tanda Tangan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_dokter_spr"
                                                            id="ceklis-dokter-spr" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <p></p>
                                        <br>
                                        <div class="col-lg-12">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td>
                                                        <b>Catatan Pendaftaran :</b>
                                                        <br>
                                                        <br>
                                                        <textarea name="catatan_pendaftaran_spr"id="catatan-pendaftaran-spr" rows="4"
                                                            class="form-control clear-input"placeholder="catatan pendaftaran"></textarea>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td width="45%" class="center">
                                                    </td>                                                   
                                                    <td width="45%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_petugas_spr"
                                                        id="tanggal-petugas-spr"class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">Petugas Pendaftaran,</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center"><input type="text" name="id_petugas_pendaftaran_spr"
                                                        id="id-petugas-pendaftaran-spr" class="select2c-input ml-2">
													</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        Tanda Tangan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_petugas_spr"
                                                            id="ceklis-petugas-spr" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanFormSuratPengantarRawat()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal SPR WH-->
