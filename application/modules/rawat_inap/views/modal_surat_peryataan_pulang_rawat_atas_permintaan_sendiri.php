<script>
	//  SPPRAPS WH
    $('#tanggal-dokter-sppraps')
    .datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    $('#tgl-lahir-sppraps, #tgl-lahir-sppraps1')
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
    $('#dokter-sppraps, #ttd-dokter-sppraps').select2c({
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
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });
    // NAMA DOKTER AKHIR

        // NAMA RUANGAN
        $('#kelas-sppraps').select2c({
            ajax: {
                url: "<?= base_url('rawat_inap/api/rawat_inap/kamar_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                console.log(data);
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                getNoBed(data.id);
                return data.nama;
            }
        });

        function getNoBed(id_kamar) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data !== null) {
                        $('#no-bed').val(data.nama_bangsal);
                    } else {
                        $('#no-bed').val('');
                    }

                    syams_validation_remove('#no-bed');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }
       
    // On change for radio button is pasien 1
	$('input[type=radio][name=ya_sppraps]').change(function(){ 
		// Conditions
		if (this.value === '1') {
			// Set fields to empty string
			$('#nama-sppraps').val('');
			$('#tgl-lahir-sppraps').val('');
            $('#tahun-sppraps').val('');
			document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = false;
			document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = false;
			$('#alamat-sppraps').val('');
			$('#rt-sppraps').val('');	
            $('#rw-sppraps').val('');	
            $('#kelurahan-sppraps').val('');	
            $('#kecamatan-sppraps').val('');
            $('#kota-sppraps').val('');
            $('#nomor-ktp-sppraps').val('');
            $('#nomor-tlp-sppraps').val('');
			
			// Disabled fields
			$( "#nama-sppraps" ).prop( "disabled", true );
			$( "#tgl-lahir-sppraps" ).prop( "disabled", true );
            $( "#tahun-sppraps" ).prop( "disabled", true );
			$( "#jenis-kelamin-tahun-sppraps-1" ).prop( "disabled", true );
			$( "#jenis-kelamin-tahun-sppraps-2" ).prop( "disabled", true );
			$( "#alamat-sppraps" ).prop( "disabled", true );
			$( "#rt-sppraps" ).prop( "disabled", true );	
            $( "#rw-sppraps" ).prop( "disabled", true );
            $( "#kelurahan-sppraps" ).prop( "disabled", true );		
            $( "#kecamatan-sppraps" ).prop( "disabled", true );
            $( "#kota-sppraps" ).prop( "disabled", true );
            $( "#nomor-ktp-sppraps" ).prop( "disabled", true );
            $( "#nomor-tlp-sppraps" ).prop( "disabled", true );
		} else if (this.value === '0') {
			// Undisabled fields
            $( "#nama-sppraps" ).prop( "disabled", false );
			$( "#tgl-lahir-sppraps" ).prop( "disabled", false );
            $( "#tahun-sppraps" ).prop( "disabled", false );
			$( "#jenis-kelamin-tahun-sppraps-1" ).prop( "disabled", false );
			$( "#jenis-kelamin-tahun-sppraps-2" ).prop( "disabled", false );
			$( "#alamat-sppraps" ).prop( "disabled", false );
			$( "#rt-sppraps" ).prop( "disabled", false );
            $( "#rw-sppraps" ).prop( "disabled", false );	
            $( "#kelurahan-sppraps" ).prop( "disabled", false );		
            $( "#kecamatan-sppraps" ).prop( "disabled", false );
            $( "#kota-sppraps" ).prop( "disabled", false );
            $( "#nomor-ktp-sppraps" ).prop( "disabled", false );
            $( "#nomor-tlp-sppraps" ).prop( "disabled", false );			
		}
	});
     // On change for radio button is pasien 2
	$('input[type=radio][name=diri_sppraps]').change(function(){ 
		// Conditions
		if (this.value === '1') {
			// Set fields to empty string
			$('#nama-sppraps1').val('');
			$('#nomor-rekam-sppraps').val('');
            $('#tgl-lahir-sppraps1').val('');
            $('#tahun-sppraps1').val('');
			document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = false;
			document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = false;
			// $('#kelas-sppraps').val('');			
			// Disabled fields
			$( "#nama-sppraps1" ).prop( "disabled", true );
            $( "#nomor-rekam-sppraps" ).prop( "disabled", true );
			$( "#tgl-lahir-sppraps1" ).prop( "disabled", true );
            $( "#tahun-sppraps1" ).prop( "disabled", true );
			$( "#jenis-kelamin-tahun-sppraps-11" ).prop( "disabled", true );
			$( "#jenis-kelamin-tahun-sppraps-12" ).prop( "disabled", true );
			// $( "#kelas-sppraps" ).prop( "disabled", true );
		} else if (this.value === '2','3','4','5','6','7') {
			// Undisabled fields
            $( "#nama-sppraps1" ).prop( "disabled", false );
            $( "#nomor-rekam-sppraps" ).prop( "disabled", false );
			$( "#tgl-lahir-sppraps1" ).prop( "disabled", false );
            $( "#tahun-sppraps1" ).prop( "disabled", false );
			$( "#jenis-kelamin-tahun-sppraps-11" ).prop( "disabled", false );
			$( "#jenis-kelamin-tahun-sppraps-12" ).prop( "disabled", false );
			// $( "#kelas-sppraps" ).prop( "disabled", false );			
		}
	});

	function simpanSuratPeryataanPulangRawatAtasPermintaanSendiri() {
		var id = $('#id-layanan-pendaftaran-sppraps').val();
		// console.log(simpanSuratPeryataanPulangRawatAtasPermintaanSendiri);
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_surat_peryataan_pulang_rawat_atas_permintaan_sendiri") ?>',
			data: $('#form_surat_peryataan_pulang_rawat_atas_permintaan_sendiri').serialize(),
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

					$('#modal_surat_peryataan_pulang_rawat_atas_permintaan_sendiri').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_surat_peryataan_pulang_rawat_atas_permintaan_sendiri/') ?>' + id, 'Cetak Surat Peryataan Pulang Rawat Atas Permintaan Sendiri', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<!-- Modal SPPRAPS WH-->
<div class="modal fade" id="modal_surat_peryataan_pulang_rawat_atas_permintaan_sendiri" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surat-peryataan-pulang-rawat-atas-permintaan-sendiri-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_peryataan_pulang_rawat_atas_permintaan_sendiri class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sppraps">
					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-surat-peryataan-pulang-rawat-atas-permintaan-sendiri">
										<table class="table table-no-border table-sm table-striped">
                                            <tr>
                                                <td width="25%"><b>Saya yang bertanda tangan dibawah ini</b></td>
                                                <td width="1%"><b>:</b></td>

                                               <!-- <input type="radio"name="riwayat"id="riwayat-penyakit-oprasi-11" class=" mx-1" value="0"checked> -->

                                                <td>
                                                    <input type="radio" name="ya_sppraps"id="ya-sppraps-1" class="mr-1" value="1" > Ya
                                                    <input type="radio" name="ya_sppraps"id="tidak-sppraps-2" class="mr-1" value="0" checked> Tidak 
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td width="25%"><b>Nama </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nama_sppraps"id="nama-sppraps" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                    <!-- <input type="text" name="nama_sppraps" class="custom-form" id="nama-sppraps"> -->
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Tgl.Lahir / Umur</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="tgl_lahir_sppraps"id="tgl-lahir-sppraps" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="tgl lahir">
                                                    / <input type="text" name="tahun_sppraps"id="tahun-sppraps" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="umur" > Tahun &nbsp;&nbsp;&nbsp;
                                                    ( Laki-laki <input type="radio" name="jenis_kelamin_tahun_sppraps"id="jenis-kelamin-tahun-sppraps-1" value="L" class="mr-1">
                                                    Perempuan*  <input type="radio" name="jenis_kelamin_tahun_sppraps"id="jenis-kelamin-tahun-sppraps-2" value="P" class="mr-1"> )
                                                </td>
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Alamat </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="alamat_sppraps" class="custom-form" id="alamat-sppraps">
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b> </b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    RT<input type="text" name="rt_sppraps"id="rt-sppraps" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan" >
                                                    RW<input type="text" name="rw_sppraps"id="rw-sppraps" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan" >
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b> </b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    Kelurahan / Desa <input type="text" name="kelurahan_sppraps"id="kelurahan-sppraps" class="custom-form clear-input d-inline-block col-lg-7 mx-1" placeholder="Sebutkan" >
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b> </b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    Kecamatan <input type="text" name="kecamatan_sppraps"id="kecamatan-sppraps" class="custom-form clear-input d-inline-block col-lg-7 mx-1" placeholder="Sebutkan" >
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b> </b></td>
                                                <td width="1%"><b></b></td>
                                                <td>
                                                    Kota / Kab <input type="text" name="kota_sppraps"id="kota-sppraps" class="custom-form clear-input d-inline-block col-lg-7 mx-1" placeholder="Sebutkan" >
                                                </td> 
										    </tr> 
                                            <tr>
                                                <td width="25%"><b>Nomor KTP / SIM </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nomor_ktp_sppraps"id="nomor-ktp-sppraps" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Nomor Telp / HP </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nomor_tlp_sppraps"id="nomor-tlp-sppraps" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Dalam hal ini bertindak atas nama atau mewakili </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    Diri Sendiri <input type="radio" name="diri_sppraps"id="diri-sppraps-1" value="1" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Suami <input type="radio" name="diri_sppraps"id="diri-sppraps-2" value="2" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Istri <input type="radio" name="diri_sppraps"id="diri-sppraps-3" value="3" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Anak <input type="radio" name="diri_sppraps"id="diri-sppraps-4" value="4" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Orang Tua <input type="radio" name="diri_sppraps"id="diri-sppraps-5" value="5" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Wali <input type="radio" name="diri_sppraps"id="diri-sppraps-6" value="6" class="mr-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                    Keluarga <input type="radio" name="diri_sppraps"id="diri-sppraps-7" value="7" class="mr-1">
                                                </td>
										    </tr>
                                            <br>
                                            <tr>
                                                <td width="25%"><b>Nama </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nama_sppraps1"id="nama-sppraps1" class="custom-form clear-input d-inline-block col-lg-3 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Nomor Rekam Medis </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="nomor_rekam_sppraps"id="nomor-rekam-sppraps" class="custom-form clear-input d-inline-block col-lg-1 mx-1">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Tgl.Lahir / Umur</b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="tgl_lahir_sppraps1"id="tgl-lahir-sppraps1" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="tgl lahir">
                                                    / <input type="text" name="tahun_sppraps1"id="tahun-sppraps1" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="umur" > Tahun &nbsp;&nbsp;&nbsp;
                                                    ( Laki-laki <input type="radio" name="jenis_kelamin_tahun_sppraps1"id="jenis-kelamin-tahun-sppraps-11" value="L" class="mr-1">
                                                    Perempuan*  <input type="radio" name="jenis_kelamin_tahun_sppraps1"id="jenis-kelamin-tahun-sppraps-12" value="P" class="mr-1"> )
                                                </td>
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Kelas / Kamar </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="kelas_sppraps" class="select2c-input ml-2" id="kelas-sppraps">
                                                </td> 
										    </tr>
                                            <tr>
                                                <td width="25%"><b>Dokter yang merawat </b></td>
                                                <td width="1%"><b>:</b></td>
                                                <td>
                                                    <input type="text" name="dokter_sppraps" class="select2c-input ml-2" id="dokter-sppraps">
                                                </td> 
										    </tr>
										</table>
                                        <table>
                                            <tr>
                                                <td>
                                                    <b>Atas permintaan sendiri pulang / keluar dari perawatan di RSUD Kota Tangerang, Kami bertanggung jawab atas segala akibat yang mungkin terjadi atas kesehatan pasien tersebut diatas, oleh karena menurut dokter belum boleh pulang / keluar dari perawatan di RSUD Kota Tangerang. 
                                                    </b>
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
                                                        Tangerang, <input type="text"name="tanggal_dokter_sppraps"
                                                        id="tanggal-dokter-sppraps"class="custom-form clear-input d-inline-block col-lg-3 ml-2"
                                                        placeholder="dd/mm/yyyy/hh/ii">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td class="center">Dokter yang merawat</td>
                                                    <td class="center">Yang membuat peryataan</td>
                                                </tr>
                                                <tr>
                                                    <td class="center"><input type="text" name="ttd_dokter_sppraps"
                                                            id="ttd-dokter-sppraps"
                                                            class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="ttd_pasien_sppraps"
                                                            id="ttd-pasien-sppraps" class="custom-form clear-input d-inline-block col-lg-5">
													</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">
                                                        Nama Jelas & Tanda Tangan
                                                    </td>
                                                    <td class="center">
                                                    Nama jelas & tanda tangan Pasien/Keluwarga
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_ttd_dokter_sppraps"
                                                            id="ceklis-ttd-dokter-sppraps" value="1" 
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_ttd_pasien_sppraps"
                                                            id="ceklis-ttd-pasien-sppraps" value="1"
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
				<button type="button" class="btn btn-info" onclick="simpanSuratPeryataanPulangRawatAtasPermintaanSendiri()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal SPPRAPS WH-->
