<script>
	$(function() {		
		$('#sscrj-nama-operator, #sscrj-nama-anastesi, #sscrj-dokter-operator-sign-in, #sscrj-dokter-operator-time-out, #sscrj-dokter-operator-sign-out').select2c({
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


        $('#sscrj-perawat-sign-in, #sscrj-perawat-time-out, #sscrj-perawat-sign-out')
                .select2c({
                    ajax: {
                        url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                        dataType: 'json',
                        quietMillis: 100,
                        data: function(term,
                            page) { // page is the one-based page number tracked by Select2
                            return {
                                q: term, //search term
                                page: page, // page number
                                jenis: $('#c_profesi').val(),
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
                        var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                        return markup;
                    },
                    formatSelection: function(data) {
                        return data.nama;
                    }
                });


            $('#sscrj-nama-obat').select2c({
                minimumInputLength: 2,
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2

                        return {
                            q: term, //search term
                            page: page // page number
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
                    var markup = data.nama;
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }

            });


            
		$('#sscrj-tanggal-sign-in').datetimepicker({
			format: 'DD/MM/YYYY HH:mm',
			pickSecond: false,
			pick12HourFormat: false,
			maxDate: new Date(),
			beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
		});


        $('#sscrj-jam-di-berikan-obat')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        // LASTTTTTTTTTTTTTTTTTTTTTTTTTTTT sscrj-dokter-bedah

        $('#sscrj-dokter-bedah').click(function() {
        if ($(this).is(":checked")) {
            $('#sscrj-nama-tindakann').prop('disabled', false);
        } else {
            $('#sscrj-nama-tindakann').val('');
            $('#sscrj-nama-tindakann').prop('disabled', true);
        }
        });
        // $('#sscrj-tidak-lengkap').click(function() {
        // if ($(this).is(":checked")) {
        //     $('#sscrj-alasan-2').prop('disabled', false);
        // } else {
        //     $('#sscrj-alasan-2').val('');
        //     $('#sscrj-alasan-2').prop('disabled', true);
        // }
        // });
        $('input[type=radio][name=sscrj_preparat]').change(function() {
                if (this.value == '0') {
                    $('#sscrj-preparat-pa, #sscrj-preparat-kultur, #sscrj-preparat-sitologi').prop(
                        'checked', false);
                    $('#sscrj-preparat-pa, #sscrj-preparat-kultur, #sscrj-preparat-sitologi').prop(
                        'disabled', true);
                } else {
                    $('#sscrj-preparat-pa, #sscrj-preparat-kultur, #sscrj-preparat-sitologi').prop(
                        'checked', false);
                    $('#sscrj-preparat-pa, #sscrj-preparat-kultur, #sscrj-preparat-sitologi').prop(
                        'disabled', false);
                }
            });
        
            $('input[type=radio][name=sscrj_ya]').change(function() {
                if (this.value == '0') {
                    $('#sscrj-dosis-obat, #sscrj-jam-di-berikan-obat').val(
                        '');
                    $('#sscrj-dosis-obat, #sscrj-jam-di-berikan-obat').prop(
                        'disabled', true);
                } else {
                    $('#sscrj-dosis-obat, #sscrj-jam-di-berikan-obat').val(
                        '');
                    $('#sscrj-dosis-obat, #sscrj-jam-di-berikan-obat').prop(
                        'disabled', false);
                }
            }); 

            $('#sscrj-diberikan').click(function() {
                if ($(this).is(":checked")) {
                    $('#sscrj-aalasan').prop('disabled', false);
                } else {
                    $('#sscrj-aalasan').val('');
                    $('#sscrj-aalasan').prop('disabled', true);
                }
            });

            $('#sscrj-tidak-diberikan').click(function() {
                if ($(this).is(":checked")) {
                    $('#sscrj-allasan').prop('disabled', false);
                } else {
                    $('#sscrj-allasan').val('');
                    $('#sscrj-allasan').prop('disabled', true);
                }
            });


	})	

	function simpanSurgicalSafetyCeklistRawatJalan() {


        if ($('#sscrj-tanggal-sign-in').val() === '') {
                syams_validation('#sscrj-tanggal-sign-in', 'Tanggal Wajib diisi.');
                return false;
            } else {
                syams_validation_remove('#sscrj-tanggal-sign-in');
            }

            if ($('#sscrj-perawat-sign-in').val() === '') {
                syams_validation('#sscrj-perawat-sign-in', 'Nama Perawat Wajib diisi.');
                return false;
            } else {
                syams_validation_remove('#sscrj-perawat-sign-in');
            }

            if ($('#sscrj-dokter-operator-sign-in').val() === '') {
                syams_validation('#sscrj-dokter-operator-sign-in', 'Nama Dokter Wajib diisi.');
                return false;
            } else {
                syams_validation_remove('#sscrj-dokter-operator-sign-in');
            }

            
		var id = $('#id-layanan-pendaftaran-sscrj').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_surgical_safety_ceklist_rawat_jalan") ?>',
			data: $('#form-surgical-safety-ceklist-rawat-jalan').serialize(),
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

					$('#modal-surgical-safety-ceklist-rawat-jalan').modal('hide');

					window.open('<?= base_url('pemeriksaan_poli/cetak_surgical_safety_ceklist_rawat_jalan/') ?>' + id, 'Cetak Surgical Safety Ceklist Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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
<div class="modal fade" id="modal-surgical-safety-ceklist-rawat-jalan" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-surgical-safety-ceklist-rawat-jalan-title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-surgical-safety-ceklist-rawat-jalan class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sscrj">
                <!-- <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sscrj"> -->
                <input type="hidden" name="id_users" id="id-users">
 					<!-- content -->
					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">																		
									<div class="form-modal-surgical-safety-ceklist-rawat-jalan">
										<table class="table table-no-border table-sm table-striped">	
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="2">
                                                        <h4>SIGN IN</h4>
                                                    </th>
                                                    <th colspan="2">
                                                        <h4>TIME OUT</h4>
                                                    </th>
                                                    <th colspan="2">
                                                        <h4>SIGN OUT</h4>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">(Sebelum Local Anestesi)</th>
                                                    <th colspan="2">(Sebelum insisi )</th>
                                                    <th colspan="2">(Sebelum Pasien Keluar Ruang Tindakan)</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan="2">Dilakuan oleh perawat dan dokter ahli bedah</td>
                                                        <td colspan="2">Dilakukan oleh perawat dan dokter ahli bedah</td>
                                                        <td colspan="2">Dilakukan oleh perawat dan dokter ahli bedah</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><b>VERIFIKASI</b></td>
                                                        <td colspan="2"><b>KELENGKAPAN TIM DAN FASILITAS OPERASI</b></td>
                                                        <td colspan="2"><b>BACA SECARA VERBAL</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Identitas dan Gelang Pasien
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_gelang" id="sscrj-gelang" value="1">
                                                        </td>
                                                        <td>
                                                            Lengkap
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_lengkap" id="sscrj-lengkap" value="1">
                                                        </td>
                                                        <td>
                                                            Nama Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_nama_tindakan" id="sscrj-nama-tindakan" value="1">
                                                        </td>
                                                    </tr>                                                   
                                                    <tr>
                                                        <td>
                                                            Informed Concent
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_informed_concent" id="sscrj-informed-concent" value="1">
                                                        </td>
                                                        <td>Tidak lengkap</td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_tidak_lengkap" id="sscrj-tidak-lengkap" value="1">
                                                        </td>
                                                        <td colspan="2">
                                                            <b>PEMERIKSAAN KELENGKAPAN SEBELUM LUKA DITUTUP</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        <td>
                                                           <!-- disabled -->
                                                        </td>
                                                        <td>Alasan :</td>
                                                        <td>
                                                            <input type="text" name="sscrj_alasan_2" id="sscrj-alasan-2" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="Sebutkan" >
                                                        </td>
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Dokter Bedah
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_dokter_bedah" id="sscrj-dokter-bedah" value="1">
                                                        </td>
                                                        <td colspan="2">
                                                            <b>PEMERIKSAAN KELENGKAPAN PERALATAN TINDAKAN</b>
                                                        </td>
                                                        <td>
                                                            Instrument
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_instrument" id="sscrj-instrument" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nama Operator
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_nama_operator" id="sscrj-nama-operator" class="select2c-input">
                                                        </td>
                                                        <td>
                                                            Instrument
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_instrumentt" id="sscrj-instrumentt" value="1">
                                                        </td>
                                                        <td>
                                                            Kassa
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_kassa" id="sscrj-kassa" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nama Anastesi
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_nama_anastesi" id="sscrj-nama-anastesi" class="select2c-input">
                                                        </td>
                                                        <td>
                                                            Kassa
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_kassaa" id="sscrj-kassaa" value="1">
                                                        </td>
                                                        <td>
                                                            Jarum
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_jarum" id="sscrj-jarum" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nama Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_nama_tindakann"id="sscrj-nama-tindakann"class="custom-form clear-input d-inline-block col-lg-12"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                        <td>
                                                            Jarum
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_jarumm" id="sscrj-jarumm" value="1">
                                                        </td>
                                                        <td colspan="2">
                                                            <b>PERIKSA KELENGKAPAN BAHAN PEMERIKSAAN</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            Pemberian Tanda Lokasi Tindakan &nbsp;&nbsp;
                                                            <input class="mr-1" type="radio" name="sscrj_lokasi" id="sscrj-lokasi-1" value="1">Ya
                                                            <input class="ml-2 mr-1" type="radio" name="sscrj_lokasi" id="sscrj-lokasi-2" value="0">Tidak
                                                        </td>
                                                        <td colspan="2">
                                                            <b>BACA SECARA VERBAL</b>
                                                        </td>
                                                        <td colspan="2">
                                                            Preprat :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                           <b>PEMERIKSAAN TANDA VITAL</b>
                                                        </td>
                                                        <td>
                                                            Tanggal Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_tanggal_tindakan" id="sscrj-tanggal-tindakan" value="1">
                                                        </td>
                                                        <td>
                                                            Ya
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="sscrj_preparat" id="sscrj-preparat-ya" value="1">
                                                        </td>
                                                    </tr>                                                   
                                                    <tr>
                                                        <td>
                                                            Tekanan Darah
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_tekanan_darah"id="sscrj-tekanan-darah" class="custom-form clear-input d-inline-block col-lg-12"
                                                            placeholder="Sebutkan">
                                                        </td>
                                                        <td>
                                                            Identitas Pasien
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_identitas_pasien" id="sscrj-identitas-pasien" value="1">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_preparat_pa" class="mr-1" id="sscrj-preparat-pa" value="1">PA
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nadi
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_naddi"id="sscrj-naddi"class="custom-form clear-input d-inline-block col-lg-12"
                                                             placeholder="Sebutkan">
                                                        </td>
                                                        <td>
                                                            Nama Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_nama_tindakkan" id="sscrj-nama-tindakkan" value="1">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_preparat_kultur" class="mr-1" id="sscrj-preparat-kultur" value="1">Kultur
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Pernafasan
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_perrnafasan"id="sscrj-perrnafasan"class="custom-form clear-input d-inline-block col-lg-12"
                                                            placeholder="Sebutkan">
                                                        </td>
                                                        <td>
                                                            Prosedur Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_prosedur_tindakan" id="sscrj-prosedur-tindakan" value="1">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_preparat_sitologi" class="mr-1" id="sscrj-preparat-sitologi" value="1">Sitologi
                                                        </td>
                                                    </tr>                                                   
                                                    <tr>
                                                        <td>
                                                            Saturasi O2
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_saturasi_o2" id="sscrj-saturasi-o2"class="custom-form clear-input d-inline-block col-lg-12"
                                                            placeholder="Sebutkan">
                                                        </td>
                                                        <td>
                                                            lokasi Tindakan
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_lokasi_tindakan" id="sscrj-lokasi-tindakan" value="1">
                                                        </td>
                                                        <td>
                                                            Tidak
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="sscrj_preparat" id="sscrj-preparat-tidak" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                           Suhu
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_suhu"id="sscrj-suhu"class="custom-form clear-input d-inline-block col-lg-12"
                                                            placeholder="Sebutkan">
                                                        </td>
                                                        <td>
                                                            Informed Consent
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_informed_consent" id="sscrj-informed-consent" value="1">
                                                        </td>
                                                        <td colspan="2">
                                                            Formulir permintaan pemeriksaan : &nbsp;&nbsp;&nbsp;
                                                            ya <input type="radio" name="sscrj_formulir_permintaan" id="sscrj-formulir-permintaan-ya" value="1"> &nbsp;&nbsp;&nbsp;
                                                            Tidak <input type="radio" name="sscrj_formulir_permintaan" id="sscrj-formulir-permintaan-tidak" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>RIWAYAT ALERGI</b>
                                                        </td>
                                                        <td></td>
                                                        <td colspan="2">
                                                            <b>ANTIBIOTIK PROFALAKSIS</b>
                                                        </td>
                                                        <!-- <td></td> -->
                                                        <td colspan="2">
                                                            Telah dilengkapi identitas pasien : &nbsp;&nbsp;&nbsp;
                                                            ya <input type="radio" name="sscrj_telah_dilengkapi" id="sscrj-telah-dilengkapi-ya" value="1"> &nbsp;&nbsp;&nbsp;
                                                            Tidak <input type="radio" name="sscrj_telah_dilengkapi" id="sscrj-telah-dilengkapi-tidak" value="0"> &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="sscrj_keterangan"id="sscrj-ada-keterangan-ada" value="1"> Ada, Keterangan
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="sscrj_keterangan"id="sscrj-ada-keterangan-tidak-ada" value="0"> Tidak
                                                        </td>
                                                        <td colspan="2">
                                                            Apakah sudah diberikan dalam waktu sekurangnya 60 menit?
                                                        </td>
                                                        <!-- <td></td> -->
                                                        <td colspan="2">
                                                            Penjelasan oleh operator kepala keluwarga pasien :
                                                             ya <input type="radio" name="sscrj_penjelasan" id="sscrj-penjelasan-ya" value="1"> &nbsp;
                                                            Tidak <input type="radio" name="sscrj_penjelasan" id="sscrj-penjelasan-tidak" value="0">
                                                        </td>
                                                    <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                          
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            Alasan :
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sscrj_alasan"id="sscrj-alasan" class="custom-form clear-input col-lg-12"
                                                                placeholder="Sebutkan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> 
                                                            <b>RENCANA ANASTESI</b>
                                                        </td>
                                                            <td> 
                                                            </td>
                                                        <td>
                                                            Ya <input type="radio" name="sscrj_ya" id="sscrj-ya" value="1">
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td colspan="2"> <b>OBAT-OBATAN YANG DIBERIKAN SELAMA TINDAKAN</b>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Local <input type="checkbox" name="sscrj_local" id="sscrj-local" value="1"> 
                                                        </td>
                                                        <td></td>
                                                        <td>Nama Obat :</td>
                                                        <td>
                                                            <input type="text" name="sscrj_nama_obat" id="sscrj-nama-obat" class="select2c-input">
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_diberikan" id="sscrj-diberikan" value="1"> Diberikan,&nbsp;&nbsp;Alasan :
                                                        </td>
                                                        <td>                                                      
                                                            <input type="text" name="sscrj_aalasan"id="sscrj-aalasan" class="custom-form clear-input col-lg-12"
                                                                placeholder="Sebutkan"disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        <td></td>
                                                        <td>Dosis Obat :</td>
                                                        <td>
                                                            <input type="text" name="sscrj_dosis_obat" id="sscrj-dosis-obat" class="custom-form clear-input col-lg-12"placeholder="Sebutkan"disabled>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sscrj_tidak_diberikan" id="sscrj-tidak-diberikan" value="1"> Tidak Diberikan,&nbsp;&nbsp;Alasan :                                                           
                                                        </td>
                                                        <td>                                                      
                                                            <input type="text" name="sscrj_allasan"id="sscrj-allasan" class="custom-form clear-input col-lg-12"
                                                                placeholder="Sebutkan"disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>jam di Berikan :</td>
                                                        <td>
                                                            <input type="text" name="sscrj_jam_di_berikan_obat" id="sscrj-jam-di-berikan-obat" class="custom-form clear-input col-lg-12"placeholder="Masukan Jam"disabled>
                                                        </td>
                                                        <td><b>PEMERIKSAAN TANDA VITAL</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            Tidak <input type="radio" name="sscrj_ya" id="sscrj-tidak" value="0">
                                                        </td>
                                                        <td></td>
                                                        <td> Kesadaran : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_kesaddaran" id="sscrj-kesaddaran" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="2"> <b>FOTO PEMERIKSAAN RADIOLOGI YANG DI PERLUKAN</b> </td>
                                                        <!-- <td></td>  -->
                                                        <td> Tekanan darah : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_tekanann_darah" id="sscrj-tekanann-darah" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="2"> 
                                                            <input type="checkbox" name="sscrj_dipasang" id="sscrj-dipasang" value="1"> Dipasang &nbsp;&nbsp;&nbsp;
                                                            <input type="checkbox" name="sscrj_tidak_dipasang" id="sscrj-tidak-dipasang" value="1"> Tidak Di Pasang
                                                        </td>
                                                        <!-- <td></td> -->
                                                        <td> Nadi : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_nadii" id="sscrj-nadii" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td> Pernafasan : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_pernaffasan" id="sscrj-pernaffasan" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>                                                   
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td> Saturasi : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_saturasi" id="sscrj-saturasi" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td> Suhu : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_ssuhu" id="sscrj-ssuhu" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td> Skala Nyeri : </td>
                                                        <td>
                                                            <input type="text" name="sscrj_skala_nyeri" id="sscrj-skala-nyeri" class="custom-form clear-input col-lg-12"placeholder="Sebutkan">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>PEMERIKSAAN KEMBALI LUKA</b></td>
                                                        <td colspan="2">
                                                            <input type="checkbox" name="sscrj_ada_rembesan" id="sscrj-ada-rembesan" value="1"> Ada Rembesan &nbsp;
                                                            <input type="checkbox" name="sscrj_tidak_ada_rembesan" id="sscrj-tidak-ada-rembesan" value="1"> Tidak ada Rembesan
                                                        </td>                               
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b>
                                                        <input type="text" name="sscrj_tanggal_sign_in" id="sscrj-tanggal-sign-in"class="custom-form clear-d-inline-block col-lg-5"
                                                            placeholder="dd/mm/yyyy hh:mm">
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                                                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                                                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="checkbox"
                                                                    name="sscrj_paraf_perawat_sign_in"
                                                                    id="sscrj-paraf-perawat-sign-in">
                                                            </div>
                                                        </td>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="checkbox"
                                                                    name="sscrj_paraf_perawat_time_out"
                                                                    id="sscrj-paraf-perawat-time-out">
                                                            </div>
                                                        </td>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="checkbox"
                                                                    name="sscrj_paraf_perawat_sign_out"
                                                                    id="sscrj-paraf-perawat-sign-out">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Perawat</td>
                                                        <td>
                                                            <input type="text" name="sscrj_perawat_sign_in"
                                                                id="sscrj-perawat-sign-in"
                                                                class="select2c-input">
                                                        </td>
                                                        <td>Perawat</td>
                                                        <td>
                                                            <input type="text" name="sscrj_perawat_time_out"
                                                                id="sscrj-perawat-time-out"
                                                                class="select2c-input">
                                                        </td>
                                                        <td>Perawat</td>
                                                        <td>
                                                            <input type="text" name="sscrj_perawat_sign_out"
                                                                id="sscrj-perawat-sign-out"
                                                                class="select2c-input">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <input type="checkbox"
                                                                name="sscrj_paraf_dokter_operator_sign_in"
                                                                id="sscrj-paraf-dokter-operator-sign-in">
                                                        </td>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <input type="checkbox"
                                                                name="sscrj_paraf_dokter_operator_time_out"
                                                                id="sscrj-paraf-dokter-operator-time-out">
                                                        </td>
                                                        <td>Tanda tangan</td>
                                                        <td>
                                                            <input type="checkbox"
                                                                name="sscrj_paraf_dokter_operator_sign_out"
                                                                id="sscrj-paraf-dokter-operator-sign-out">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>Dokter Operator</td>
                                                        <td>
                                                            <input type="text" name="sscrj_dokter_operator_sign_in"
                                                                id="sscrj-dokter-operator-sign-in"
                                                                class="select2c-input">
                                                        </td>
                                                        <td>Dokter Operator</td>
                                                        <td>
                                                            <input type="text" name="sscrj_dokter_operator_time_out"
                                                                id="sscrj-dokter-operator-time-out"
                                                                class="select2c-input">
                                                        </td>
                                                        <td>Dokter Operator</td>
                                                        <td>
                                                            <input type="text" name="sscrj_dokter_operator_sign_out"
                                                                id="sscrj-dokter-operator-sign-out"
                                                                class="select2c-input">
                                                        </td>
                                                    </tr>
                                                </tbody>																				
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
				<button type="button" class="btn btn-info" onclick="simpanSurgicalSafetyCeklistRawatJalan()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
