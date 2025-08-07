<script>
	// SKPM WH
    $('#tanggal-skpm')
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

    // NAMA DOKTER AWAL
    $('#ttd-dokter-skpm').select2c({
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

        
    // On change for radio button is pasien 1
	$('input[type=radio][name=ya_skpm]').change(function(){ 
		// Conditions
		if (this.value === '1') {
			// Set fields to empty string
			$('#nama-skpm').val('');
            document.getElementById("l-skpm-1").checked = false;
			document.getElementById("p-skpm-2").checked = false;
			$('#no-rm-skpm').val('');
            $('#usia-skpm').val('');
            $('#ktp-skpm').val('');
			$('#alamat-skpm').val('');	
            $('#tlp-skpm').val('');			
			// Disabled fields
			$( "#nama-skpm" ).prop( "disabled", true );
            $( "#l-skpm-1" ).prop( "disabled", true );
			$( "#p-skpm-2" ).prop( "disabled", true );
			$( "#no-rm-skpm" ).prop( "disabled", true );
            $( "#usia-skpm" ).prop( "disabled", true );			
			$( "#ktp-skpm" ).prop( "disabled", true );
			$( "#alamat-skpm" ).prop( "disabled", true );	
            $( "#tlp-skpm" ).prop( "disabled", true );
		} else if (this.value === '0') {
			// Undisabled fields
            $( "#nama-skpm" ).prop( "disabled", false );
            $( "#l-skpm-1" ).prop( "disabled", false );
			$( "#p-skpm-2" ).prop( "disabled", false );
			$( "#no-rm-skpm" ).prop( "disabled", false );
            $( "#usia-skpm" ).prop( "disabled", false );			
			$( "#ktp-skpm" ).prop( "disabled", false );
			$( "#alamat-skpm" ).prop( "disabled", false );	
            $( "#tlp-skpm" ).prop( "disabled", false );			
		}
	});


	function simpanSuratKeteranganPemeriksaanMata() {
        var id = $('#id-layanan-pendaftaran-skpm').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_surat_keterangan_pemeriksaan_mata") ?>',
			data: $('#form_surat_keterangan_pemeriksaan_mata').serialize(),
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

					$('#modal_surat_keterangan_pemeriksaan_mata').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_surat_keterangan_pemeriksaan_mata/') ?>' + id, 'Cetak Surat Keterangan Pemeriksaan Mata', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
                    showListForm($('#id-pendaftaran-skpm').val(),$('#id-layanan-pendaftaran-skpm').val(), $('#id-pasien-skpm').val());  
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


<!-- Modal SKPM WH-->
<div class="modal fade" id="modal_surat_keterangan_pemeriksaan_mata" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surat-keterangan-pemeriksaan-mata-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_keterangan_pemeriksaan_mata class="form-horizontal"') ?>
                    <input type="hidden" name="id_pasien" id="id-pasien-skpm">
                    <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skpm">
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skpm">
					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-surat-keterangan-pemeriksaan-mata">
										<table class="table table-no-border table-sm table-striped">
                                            <tr>
                                                <td width="25%"><b>Saya yang bertanda tangan dibawah ini, menerangkan bahwa :</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="radio" name="ya_skpm"id="ya-skpm-1" class="mr-1" value="1" > Ya
                                                    <input type="radio" name="ya_skpm"id="tidak-skpm-2" class="mr-1" value="0" checked> Tidak 
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b>Nama </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nama_skpm"id="nama-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Jenis Kelamin</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="radio" name="skpm"id="l-skpm-1" value="L" class="mr-1"> Laki - laki  &nbsp;&nbsp;
                                                    <input type="radio" name="skpm"id="p-skpm-2" value="P" class="mr-1"> Perempuan
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>No. RM </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="no_rm_skpm"id="no-rm-skpm" class="custom-form clear-input d-inline-block col-lg-1 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Usia </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="usia_skpm"id="usia-skpm" class="custom-form clear-input d-inline-block col-lg-1 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>No. KTP </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="ktp_skpm"id="ktp-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Alamat</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                <input type="text" name="alamat_skpm" class="custom-form" id="alamat-skpm">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>No.Tlp / Hp </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="tlp_skpm"id="tlp-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Telah dilakukan pada matanya dengan hasil </b></td>
                                                <td width="1%"><b></b></td>
                                                <td></td>
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Tajam Pengelihatan</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="tajam_pengelihatan_skpm"id="tajam-pengelihatan-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Mata Kanan</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="mata_kanan_skpm"id="mata-kanan-skpm" class="custom-form clear-input d-inline-block col-lg-2 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                <input type="checkbox" name="tanpa_kacamata_kanan_skpm" id="tanpa-kacamata-kanan-skpm" value="1"> dengan /  tanpa kacamata 
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Mata Kiri</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="mata_kiri_skpm"id="mata-kiri-skpm" class="custom-form clear-input d-inline-block col-lg-2 mx-1"> 
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="tanpa_kacamata_kiri_skpm" id="tanpa-kacamata-kiri-skpm" value="1"> dengan / tanpa kacamata 
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Segment Anterior</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="anterior_mata_kanan_skpm" id="anterior-mata-kanan-skpm" value="1"> Mata Kanan
                                                    <input type="text" name="anterior_kanan_skpm"id="anterior-kanan-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="anterior_mata_kiri_skpm" id="anterior-mata-kiri-skpm" value="1"> Mata Kiri
                                                    <input type="text" name="anterior_kiri_skpm"id="anterior-kiri-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Segment Posterior</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="checkbox" name="posterior_mata_kanan_skpm" id="posterior-mata-kanan-skpm" value="1"> Mata Kanan
                                                    <input type="text" name="posterior_kanan_skpm"id="posterior-kanan-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b></b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    <input type="checkbox" name="posterior_mata_kiri_skpm" id="posterior-mata-kiri-skpm" value="1"> Mata Kiri
                                                    <input type="text" name="posterior_kiri_skpm"id="posterior-kiri-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Pengelihatan Warna (Test Ishihara)</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="p_warna_skpm"id="p-warna-skpm" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Catatan</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                <input type="text" name="catatan_skpm" class="custom-form" id="catatan-skpm">
                                                </td> 
										    </tr> 
										</table>
                                        <br>
                                        <div class="row">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="2" class="center td-dark"></td>
                                                </tr>
                                                <tr>
                                                    <td width="45%" class="center">
                                                    </td>                                                   
                                                    <td width="45%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_skpm"
                                                        id="tanggal-skpm"class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center">Dokter yang Memeriksa,</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="center"><input type="text" name="ttd_dokter_skpm"
                                                        id="ttd-dokter-skpm" class="select2c-input ml-2">
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
                                                        <input type="checkbox" name="ceklis_dokter_skpm"
                                                            id="ceklis-dokter-skpm" value="1"
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
					<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanSuratKeteranganPemeriksaanMata()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal SKPM WH-->
