<script>
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

					$('#modal_surat_kenal_lahir').modal('hide');

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


<!-- Modal SURAT KENAL LAHIR AWAL -->
<div class="modal fade" id="modal_surat_kenal_lahir" data-backdrop="static">
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

				<!-- content -->
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
                                                <b>NO. 47211</b>&nbsp;<b>/</b><input type="text" name="no_surat_lahir"id="no-surat-lahir" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="isi no surat">
                                                <b>/</b><b>RSUD-VK/</b>:<input type="text" name="rsud_vk"id="rsud-vk" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="Isi tahun">
											</td> 
										</tr>  

                                        <tr>
											<td width="25%"><b>Yang bertanda tangan dibawah ini</b></td>
											<td width="1%"><b>:</b></td>
										</tr>                                       
                                        <tr>
											<td width="25%"><b>Nama</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="text" name="nama_skl" class="custom-form" id="nama-skl">
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
                                            <input type="text" name="nama_bayi_skl" class="custom-form" id="nama-bayi-skl">
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
                                            <input type="text" name="ibu_skl" class="custom-form" id="ibu-skl">
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
                                            <input type="text" name="ayah_skl" class="custom-form" id="ayah-skl">
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
                                            <input type="text" name="alamat_rumah_skl" class="custom-form" id="alamat-rumah-skl">
											</td>
										</tr>
                                        <tr>
											<td width="25%"><b>Pekerjaan</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                            <input type="text" name="pekerjaan_skl" class="custom-form" id="pekerjaan-skl">
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
                                                Normal<input type="text" name="proses_persalinan_skl_1"id="proses-persalinan-skl-1" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                                Tindakan<input type="text" name="proses_persalinan_skl_2"id="proses-persalinan-skl-2" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
											</td>
                                        </tr>
                                        <tr>
											<td width="25%"><b>Anak yang ke</b></td>
											<td width="1%"><b>:</b></td>
											<td>
                                                <input type="text" name="anak_yang_ke_skl_1"id="anak-yang-ke-skl-1" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >
                                                Dari &nbsp;&nbsp;:<input type="text" name="anak_yang_ke_skl_2"id="anak-yang-ke-skl-2" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="Sebutkan" >Sodara
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
											<td width="25%"><b>Sidik Telapak Kaki Bayi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
											<td width="1%"><b></b></td>
										</tr>
									</table>
									<tr>
											<td width="25%"><b></b></td>
											<td width="1%"><b></b></td>
										<table class="table table-sm table-striped table-bordered"style="margin-top: -15px">
												<thead>
													<tr>
														<th width="30%" class="center"><b>Sidik Telapak kaki kiri</b></th>
														<th width="30%" class="center"><b>Sidik Telapak kaki kanan</b></th>
													</tr>
													<tr style="height:400px">
														<td></td>
														<td></td>
													</tr>
													<tr></tr>
													<tr>
														<td width="25%"><b>Sidik Jari Tangan Ibu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
														<td width="1%"><b></b></td>
													</tr>
													<tr>
														<th width="30%" class="center"><b>Sidik Jari Tangan Kiri</b></th>
														<th width="30%" class="center"><b>Sidik Jari Tangan Kanan</b></th>
													</tr>
													<tr style="height:400px">
														<td></td>
														<td></td>
													</tr>
												</thead>									
										</table>
									</tr>
									<br>
                                        <div class="row">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center td-dark"></td>
                                                </tr>
                                                <tr>
                                                    <td width="33%" class="center">
                                                        <!-- Tanggal & Jam <input type="text" name="tanggal_pasien_skl"
                                                        id="tanggal-pasien-skl"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="dd/mm/yyyy hh:ii"> -->
                                                    </td>
                                                    <td width="33%" class="center">
                                                        <!-- Tanggal & Jam <input type="text"name="tanggal_bidan_skl"
                                                        id="tanggal-bidan-skl"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="dd/mm/yyyy hh:ii"> -->
                                                    </td>                                                   
                                                    <td width="33%" class="center">
                                                        Tangerang, <input type="text"name="tanggal_dokter_skl"
                                                        id="tanggal-dokter-skl"class="custom-form clear-input d-inline-block col-lg-3 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td class="center">Pasien/Keluarga</td>
                                                    <td class="center">Bidan yang Bertugas</td>
                                                    <td class="center">Dokter DPJP</td>
                                                </tr>
                                                <tr>
                                                    <td class="center"><input type="text" name="ttd_pasien_skl"
                                                            id="ttd-pasien-skl" class="custom-form clear-input d-inline-block col-lg-8">
													</td>
                                                    <td class="center"><input type="text" name="ttd_bidan_skl"
                                                            id="ttd-bidan-skl"
                                                            class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="ttd_dokter_skl"
                                                            id="ttd-dokter-skl"
                                                            class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">
                                                        Nama Jelas & Tanda Tangan Pasien
                                                    </td>
                                                    <td class="center">
                                                        Nama Jelas & Tanda Tangan Bidan
                                                    </td>
													<td class="center">
                                                        Nama Jelas & Tanda Tangan Dokter
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_ttd_pasien_skl"
                                                            id="ceklis-ttd-pasien-skl" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_ttd_bidan_skl"
                                                            id="ceklis-ttd-bidan-skl" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">
                                                        <input type="checkbox" name="ceklis_ttd_dokter_skl"
                                                            id="ceklis-ttd-dokter-skl" value="1"
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><iclass="fas fa-fw fa-times-circle mr-1"></iclass=>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanSuratKenalLahir()"id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal SURAT KENAL LAHIR AKHIR -->
