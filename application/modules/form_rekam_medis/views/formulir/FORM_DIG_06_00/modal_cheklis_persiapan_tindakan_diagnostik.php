<!-- // QCPTD -->
<div class="modal fade" id="modal_cheklis_persiapan_tindakan_diagnostik" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 82%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_cheklis_persiapan_tindakan_diagnostik_title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-cheklis-persiapan-tindakan-diagnostik class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-cptdq">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-cptdq">
					<input type="hidden" name="id_pasien" id="id-pasien-cptdq">
					<input type="hidden" name="id_cptdq" id="id-cptdq">
					<input type="hidden" name="action" id="action-cptdq">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="20%" class="bold">Nama Pasien</td>
                                        <td wdith="80%">: <span id="nama-pasien-cptdq"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">No. RM</td>
                                        <td>: <span id="norm-cptdq"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Tanggal Lahir</td>
                                        <td>: <span id="tanggal-lahir-cptdq"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Jenis Kelamin</td>
                                        <td>: <span id="jenis-kelamin-cptdq"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="30%" class="bold">Ruang / Kelas</td>
                                        <td wdith="70%">: <span id="ruang-cptdq"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">	
									<!-- <div class="form-modal">  kalau pakek yang ini di LIHATYA hilang inputanya 																	 -->
									<div class="form-cheklis-persiapan-tindakan-diagnostik">
                                        <br>
                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td colspan="10"><b></b>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="10">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 50px;"> Tanggal : </td>
                                                            <td style="width: 150px;">
                                                                <div style="display: flex; align-items: center;">
                                                                <input type="text" name="tanggal_cptdq" id="tanggal-cptdq"class="custom-form clear-input d-inline-block col-lg-4" style="width: 70%;">
                                                                <span style="margin-left: 5px;"></span>
                                                                </div>
                                                            </td>
                                                            <td style="width: 50px;"> Ruangan : </td>
                                                            <td style="width: 150px;">
                                                                <span id="ruangtb-cptdq"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> DPJP : </td>
                                                            <td>
                                                                <input type="text" name="dpjptb_cptdq" id="dpjptb-cptdq" class="select2c-input ml-2">
                                                            </td>
                                                            <td> Rencana Tindakan : </td>
                                                            <td>
                                                                <input type="text" name="rencana_cptdq" id="rencana-cptdq" class="custom-form clear-input" style="width: 100%;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Diagnosa : </td>
                                                            <td>
                                                                <input type="text" name="diagnosa_cptdq" id="diagnosa-cptdq" class="custom-form clear-input" style="width: 100%;">
                                                            </td>
                                                            <td> TB/BB : </td>
                                                            <td>
                                                                <div style="display: flex; gap: 10px;">
                                                                    <input type="text" name="tb_cptdq" id="tb-cptdq" class="custom-form clear-input" style="width: 100px;">
                                                                    <input type="text" name="bb_cptdq" id="bb-cptdq" class="custom-form clear-input" style="width: 100px;">
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td class="center" width="1%"><b>No</b></td>
                                                    <td width="30%"><b>PERSIAPA SEBELUM TINDAKAN </b></td>
                                                    <td class="center" width="2%"><b>YA</b></td>
                                                    <td class="center" width="2%"><b>TIDAK</b></td>
                                                    <td width="40%"><b>KETERANGAN</b></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="9"><b>FISIK</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">1</td>
                                                    <td width="30%">Kesadaran</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="kesadaran_cptdq_1" id="kesadaran-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="kesadaran_cptdq_2" id="kesadaran-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="kesadaran_cptdq_3" id="kesadaran-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">2</td>
                                                    <td width="30%">Puasa 3-4 Jam</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="puasa_cptdq_1" id="puasa-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="puasa_cptdq_2" id="puasa-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="puasa_cptdq_3" id="puasa-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">3</td>
                                                    <td width="30%">Cukur Daerah Inguinal Sampai Pangkal Paha</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="cukurdaerah_cptdq_1" id="cukurdaerah-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="cukurdaerah_cptdq_2" id="cukurdaerah-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="cukurdaerah_cptdq_3" id="cukurdaerah-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">4</td>
                                                    <td width="30%">Cukur Daerah Pergelangan Tangan Kanan</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="cdaerahkanan_cptdq_1" id="cdaerahkanan-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="cdaerahkanan_cptdq_2" id="cdaerahkanan-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="cdaerahkanan_cptdq_3" id="cdaerahkanan-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">5</td>
                                                    <td width="30%">IV Line terpasang di tangan sebelah kiri Min No 20 G</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="ivlineterpasang_cptdq_1" id="ivlineterpasang-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="ivlineterpasang_cptdq_2" id="ivlineterpasang-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="ivlineterpasang_cptdq_3" id="ivlineterpasang-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">6</td>
                                                    <td width="30%">Gigi Palsu</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="gigipalsu_cptdq_1" id="gigipalsu-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="gigipalsu_cptdq_2" id="gigipalsu-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="gigipalsu_cptdq_3" id="gigipalsu-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">7</td>
                                                    <td width="30%">Kontak Lensa</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="kontaklensa_cptdq_1" id="kontaklensa-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="kontaklensa_cptdq_2" id="kontaklensa-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="kontaklensa_cptdq_3" id="kontaklensa-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">8</td>
                                                    <td width="30%">Perhiasan yang tidak dapat lepas</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="perhiasan_cptdq_1" id="perhiasan-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="perhiasan_cptdq_2" id="perhiasan-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="perhiasan_cptdq_3" id="perhiasan-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">9</td>
                                                    <td colspan="9">Alergi:</td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="9">
                                                        <table style="width:100%;">
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Obat :</td>
                                                                <td><input type="text" name="alergiobat_cptdq" id="alergiobat-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp;- Zat Kontras :</td>
                                                                <td><input type="text" name="alergizat_cptdq" id="alergizat-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp;- Makanan :</td>
                                                                <td><input type="text" name="alergimakanan_cptdq" id="alergimakanan-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">10</td>
                                                    <td width="30%">Riwayat Penyakit Sebelumnya</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="riwayatpen_cptdq_1" id="riwayatpen-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="riwayatpen_cptdq_2" id="riwayatpen-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="riwayatpen_cptdq_3" id="riwayatpen-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="9">
                                                        <table style="width:100%;">
                                                            <tr>
                                                                <td style="width:170px;">&nbsp;&nbsp;&nbsp;1. Obat Pengencer Darah  :</td>
                                                                <td><input type="text" name="obatpengen_cptdq" id="obatpengen-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp;2. Obat-obatan rutin :</td>
                                                                <td><input type="text" name="obatobatan_cptdq" id="obatobatan-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">11</td>
                                                    <td width="30%">Pasien Elektif Sudah Masuk Ruang Perawatan H-1 Sebelum Tindakan dilakukan</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="pasienevektif_cptdq_1" id="pasienevektif-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="pasienevektif_cptdq_2" id="pasienevektif-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="pasienevektif_cptdq_3" id="pasienevektif-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">12</td>
                                                    <td width="30%">
                                                        Pasang Kateter <input type="checkbox" name="pasangkater_cptdq_1" id="pasangkater-cptdq-1" value="1" class="mr-1"> 
                                                        Kondom Kateter <input type="checkbox" name="pasangkater_cptdq_2" id="pasangkater-cptdq-2" value="1" class="mr-1">
                                                    </td>
                                                    <td class="center" width="2%"><input type="checkbox" name="pasangkater_cptdq_3" id="pasangkater-cptdq-3" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="pasangkater_cptdq_4" id="pasangkater-cptdq-4" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="pasangkater_cptdq_5" id="pasangkater-cptdq-5"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9"><b>ADMINISTRASI</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">1</td>
                                                    <td width="30%">Surat Ijin Tindakan</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="suratijin_cptdq_1" id="suratijin-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="suratijin_cptdq_2" id="suratijin-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="suratijin_cptdq_3" id="suratijin-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">2</td>
                                                    <td width="30%">Surat Permintaan Tindakan</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="suratpermin_cptdq_1" id="suratpermin-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="suratpermin_cptdq_2" id="suratpermin-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="suratpermin_cptdq_3" id="suratpermin-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">3</td>
                                                    <td width="30%">Surat Edukasi Kondisi Saat ini</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="surateduk_cptdq_1" id="surateduk-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="surateduk_cptdq_2" id="surateduk-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="surateduk_cptdq_3" id="surateduk-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">4</td>
                                                    <td width="30%">Gelang Nama </td>
                                                    <td class="center" width="2%"><input type="checkbox" name="gelang_cptdq_1" id="gelang-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="gelang_cptdq_2" id="gelang-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="gelang_cptdq_3" id="gelang-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">5</td>
                                                    <td width="30%">Status Pasien</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="statsu_cptdq_1" id="statsu-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="statsu_cptdq_2" id="statsu-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="statsu_cptdq_3" id="statsu-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">6</td>
                                                    <td width="30%">Therapy List Obat yang sudah di berikan</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="therapi_cptdq_1" id="therapi-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="therapi_cptdq_2" id="therapi-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="therapi_cptdq_3" id="therapi-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">7</td>
                                                    <td width="30%">Surat Pernyataan tulis tangan.</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="surattulis_cptdq_1" id="surattulis-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="surattulis_cptdq_2" id="surattulis-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="surattulis_cptdq_3" id="surattulis-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9"><b>PEMERIKSAAN PENUNJANG</b></td>
                                                </tr>
                                                 <tr>
                                                    <td width="1%">1</td>
                                                    <td colspan="9">Laboratorium : </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="9">
                                                        <table style="width:100%;">
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Darah Rutin :</td>
                                                                <td><input type="text" name="darahrutin_cptdq" id="darahrutin-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Ur/Cr :</td>
                                                                <td><input type="text" name="urcr_cptdq" id="urcr-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- APPT/Kontrol :</td>
                                                                <td><input type="text" name="app_cptdq" id="app-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- PT/Kontrol :</td>
                                                                <td><input type="text" name="pt_cptdq" id="pt-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- INR :</td>
                                                                <td><input type="text" name="inr_cptdq" id="inr-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- GDS :</td>
                                                                <td><input type="text" name="gds_cptdq" id="gds-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Trop T (Emergency) :</td>
                                                                <td><input type="text" name="trop_cptdq" id="trop-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- HbsAg :</td>
                                                                <td><input type="text" name="hbsag_cptdq" id="hbsag-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Elektrolit (Emergency) :</td>
                                                                <td><input type="text" name="elektrik_cptdq" id="elektrik-cptdq" class="custom-form clear-input" style="width:100%;"></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">2</td>
                                                    <td width="30%">EKG Terbaru</td>
                                                    <td class="center" width="2%"><input type="checkbox" name="ekg_cptdq_1" id="ekg-cptdq-1" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="ekg_cptdq_2" id="ekg-cptdq-2" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="ekg_cptdq_3" id="ekg-cptdq-3"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%">3</td>
                                                     <td width="30%">
                                                        X-Ray, TMT <input type="checkbox" name="xray_cptdq_1" id="xray-cptdq-1" value="1" class="mr-1"> 
                                                        MSCT, Echo <input type="checkbox" name="xray_cptdq_2" id="xray-cptdq-2" value="1" class="mr-1">
                                                    </td>
                                                    <td class="center" width="2%"><input type="checkbox" name="xray_cptdq_3" id="xray-cptdq-3" value="1" class="mr-1"></td>
                                                    <td class="center" width="2%"><input type="checkbox" name="xray_cptdq_4" id="xray-cptdq-4" value="1" class="mr-1"></td>
                                                    <td width="40%"><input type="text" name="xray_cptdq_5" id="xray-cptdq-5"class="custom-form clear-input d-inline-block col-lg-12"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td colspan="2" width="20%"><b></b></td>
                                                    <td colspan="2" width="10%"><b></b></td>
                                                    <td colspan="2" width="60%"><b></b></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>Perawat Yang Menyerahkan,</b></td>
                                                    <td colspan="2" width="10%"><input type="text" name="perawatcathlab_cptdq" id="perawatcathlab-cptdq" class="select2c-input ml-2"></td>
                                                    <td colspan="2" width="60%"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>Perawat Yang Menerima</b></td>
                                                    <td colspan="2" width="10%"><input type="text" name="perawatruangan_cptdq" id="perawatruangan-cptdq" class="select2c-input ml-2"></td>
                                                    <td colspan="2" width="60%"></td>
                                                </tr>
                                            </tbody>
                                        </table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>

				<div class="row">
					<table width="100%">
						<tr>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary mr-1" onclick="simpanCheklistPersiapanTindakanDiagnostik()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Form</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanCheklistPersiapanTindakanDiagnostik()" id="btn_update_cptdq"> <i class="fas fa-edit mr-1"></i>Update Form</button>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div>
				<div class="widget-body mt-4">
					<div class="row">
						<div class="table-responsive">
							<table class="table table-sm table-striped table-bordered" id="table-list-cptdq">
								<thead style="background-color:rgb(27, 179, 230);">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="15%" class="center">Nama Pasien</th>
										<th width="15%" class="center">Dokter DPJP</th>
										<th width="15%" class="center">Perawat Cathlab</th>
										<th width="15%" class="center">Perawat Ruangan</th>
										<th width="20%" class="center">Alat</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>
