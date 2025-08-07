<script>
    // SKL

    // Mendapatkan tahun saat ini
    var tahunSekarang = new Date().getFullYear();                                                   
    // Menetapkan tahun ke elemen span dengan id "tahun"
    document.getElementById("tahun_skl").innerHTML = tahunSekarang;


	$(function() {
		$('#tanggal-dokter-skl')
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
	})

	$('#tanggal-skl')
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

    $('#jam-skl')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })

    $('#proses-persalinan-skl-1').click(function() {
        // Tidak ada pengondisian, hanya memastikan #cara-datang-pasien-igd-5 aktif
        $('#proses-persalinan-skl-2').prop('readonly', false);
    });


    // nama penanda tangan
    $('#nama-skl').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
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

    // NAMA BIDAN AWAL
    $('#ttd-bidan-skl').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                    jenis: 15,
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
    // NAMA BIDAN AKHIR

    // NAMA DOKTER AWAL
    $('#ttd-dokter-skl').select2c({
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



	function simpanSuratKenalLahir() {
		var id = $('#id-pendaftaran-surat-kenal-lahir').val();
		var id_layanan = $('#id-layanan-pendaftaran-surat-kenal-lahir').val();
		var id_pasien = $('#id-pasien-surat-kenal-lahir').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_surat_kenal_lahir") ?>',
			data: $('#surat-kenal-lahir').serialize(),
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

					showListForm(id, id_layanan, id_pasien);
					$('#modal_surat_kenal_lahir_irm').modal('hide');

					window.open('<?= base_url('rawat_inap/cetak_surat_kenal_lahir/') ?>' + id, 'Cetak Surat Kenal Lahir', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

<div class="modal fade" id="modal_surat_kenal_lahir_irm" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal-surat-kenal-lahir-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=surat-kenal-lahir class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-surat-kenal-lahir">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-surat-kenal-lahir">
				<input type="hidden" name="id_pasien" id="id-pasien-surat-kenal-lahir">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="surat-kenal-lahir">
									<table class="table table-no-border table-sm table-striped">
									    <tr>
											<td width="25%"><b>NO. SURAT LAHIR </b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <b> &nbsp;47211&nbsp;<input type="text" name="no_surat_lahir"id="no-surat-lahir" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="isi no surat">/ RSUD-VK/<span class="ml-1" id="tahun_skl"></span></b>
											</td> 
										</tr>  

                                        <tr>
											<td width="25%"><b>Yang bertanda tangan dibawah ini</b></td>
											<td width="1%"><b>:</b></td>
										</tr>                                       
                                        <tr>
											<td width="25%"><b>Nama DPJP Obgyn</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="text" name="nama_skl" id="nama-skl" class="select2c-input">
											</td>
										</tr>

                                        <tr>
											<td width="25%"><b>Menerangkan bahkan kami telah menolong / rawat * bayi </b></td>
											<td width="1%"><b>:</b></td>
										</tr>
										<tr>
											<td width="25%"><b>Nama Bayi</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="nama_bayi_skl"id="nama-bayi-skl" class="custom-form clear-input d-inline-block col-lg-3">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Jenis Kelamin</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="radio" name="jenis_kelamin_skl"id="jenis-kelamin-skl-1" value="laki-laki" class="mr-1">Laki-laki
                                            <input type="radio" name="jenis_kelamin_skl"id="jenis-kelamin-skl-2" value="perempuan" class="mr-1 ml-2">Perempuan
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Anak Dari Ibu</b></td>
											<td width="1%"><b>:</b></td>										
										</tr>
                                        <tr>
											<td width="25%"><b>Ibu</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="ibu_skl"id="ibu-skl" class="custom-form clear-input d-inline-block col-lg-3">
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>NIK E-KTP</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="text" name="nik_ektp_ibu"id="nik-ektp-ibu" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                            Gol.Darah<input type="text" name="gol_darah_ibu"id="gol-darah-ibu" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Ayah</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="ayah_skl"id="ayah-skl" class="custom-form clear-input d-inline-block col-lg-3"> Hubungan Keluarga : 
                                                <input type="checkbox" name="hbng_keluarga_skl_1"id="hbng-keluarga-skl-1" value="Ayah" class="mr-1">Ayah
                                                <input type="checkbox" name="hbng_keluarga_skl_2"id="hbng-keluarga-skl-2" value="Ibu" class="mr-1 ml-2">Ibu
                                                <input type="checkbox" name="hbng_keluarga_skl_3"id="hbng-keluarga-skl-3" value="Kakek" class="mr-1 ml-2">Kakek
                                                <input type="checkbox" name="hbng_keluarga_skl_4"id="hbng-keluarga-skl-4" value="Nenek" class="mr-1 ml-2">Nenek
                                                <input type="checkbox" name="hbng_keluarga_skl_5"id="hbng-keluarga-skl-5" value="Adik" class="mr-1 ml-2">Adik
                                                <input type="checkbox" name="hbng_keluarga_skl_6"id="hbng-keluarga-skl-6" value="Kakak" class="mr-1 ml-2">Kakak
                                                <input type="text" name="hbng_keluarga_lainya"id="hbng-keluarga-lainya" class="custom-form clear-input d-inline-block col-lg-3" placeholder="lainya" >
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>NIK E-KTP</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="text" name="nik_ektp_ayah"id="nik-ektp-ayah" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                            Gol.Darah<input type="text" name="gol_darah_ayah"id="gol-darah-ayah" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Alamat Rumah</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="alamat_rumah_skl"id="alamat-rumah-skl" class="custom-form clear-input d-inline-block col-lg-6">
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Pekerjaan</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="pekerjaan_skl"id="pekerjaan-skl" class="custom-form clear-input d-inline-block col-lg-6">
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Kelahiran ditolong pada</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            a. Hari &nbsp;&nbsp;&nbsp;:<input type="text" name="hari_skl"id="hari-skl" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                            b. Tanggal &nbsp;&nbsp;&nbsp;:<input type="text" name="tanggal_skl"id="tanggal-skl" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                            c. Jam &nbsp;&nbsp;&nbsp;:<input type="text" name="jam_skl"id="jam-skl" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Proses persalinan</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="radio" name="proses_persalinan_skl_1"id="proses-persalinan-skl-0" value="1" class="mr-1">SC
                                                <input type="radio" name="proses_persalinan_skl_1"id="proses-persalinan-skl-1" value="0" class="mr-1 ml-2">Normal
                                                <input type="text" name="proses_persalinan_skl_2" id="proses-persalinan-skl-2" class="custom-form clear-input d-inline-block col-lg-4"  readonly>
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b>Anak yang ke</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="number" name="anak_yang_ke_skl_1"id="anak-yang-ke-skl-1" class="custom-form clear-input d-inline-block col-lg-1">
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b>Kembar</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="radio" name="kembar_skl"id="kembar-skl-1" value="1" class="mr-1">ya
                                                <input type="radio" name="kembar_skl"id="kembar-skl-2" value="0" class="mr-1 ml-2">tidak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                Panjang&nbsp;:<input type="text" name="panjang_skl"id="panjang-skl" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan">cm&nbsp;&nbsp;&nbsp; 
                                                Berat Badan &nbsp;:<input type="text" name="berat_badan_skl"id="berat-badan-skl" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan">gram  
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b></b></td>
											<td width="1%"><b></b></td>
											<td>
                                                Lingkar Kepala&nbsp;:<input type="text" name="lingkar_kepala_skl"id="lingkar-kepala-skl" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan">cm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                Lingkar Dada&nbsp;:<input type="text" name="lingkar_dada_skl"id="lingkar-dada-skl" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan">cm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                                Lingkar Pinggang &nbsp;:<input type="text" name="lingkar_pinggang_skl"id="lingkar-pinggang-skl" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Sebutkan">cm 
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b>Dokter DPJP Anak</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="ttd_dokter_skl"id="ttd-dokter-skl"class="select2c-input ml-2">
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b>Tanggal</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text"name="tanggal_dokter_skl"id="tanggal-dokter-skl"class="custom-form clear-input d-inline-block col-lg-3 ml-2"placeholder="dd/mm/yyyy">
											</td>
                                        </tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><iclass="fas fa-fw fa-times-circle mr-1"></iclass=>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanSuratKenalLahir()"id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>