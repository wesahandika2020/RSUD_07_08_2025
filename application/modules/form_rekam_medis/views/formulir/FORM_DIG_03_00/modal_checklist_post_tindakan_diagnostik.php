<!-- // CPTD -->
<div class="modal fade" id="modal_checklist_post_tindakan_diagnostik" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 82%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_checklist_post_tindakan_diagnostik_title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-checklist-post-tindakan-diagnostik class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-cptd">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-cptd">
					<input type="hidden" name="id_pasien" id="id-pasien-cptd">
					<input type="hidden" name="id_cptd" id="id-cptd">
					<input type="hidden" name="action" id="action-cptd">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="20%" class="bold">Nama Pasien</td>
                                        <td wdith="80%">: <span id="nama-pasien-cptd"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">No. RM</td>
                                        <td>: <span id="norm-cptd"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Tanggal Lahir</td>
                                        <td>: <span id="tanggal-lahir-cptd"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Jenis Kelamin</td>
                                        <td>: <span id="jenis-kelamin-cptd"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="30%" class="bold">Ruang / Kelas</td>
                                        <td wdith="70%">: <span id="ruang-cptd"></span></td>
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
									<div class="form-checklist-post-tindakan-diagnostik">
                                        <br>
                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td colspan="6"><b>POST TINDAKAN</b>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                        <td style="width: 50px;"> TD : </td>
                                                        <td style="width: 150px;">
                                                            <div style="display: flex; align-items: center;">
                                                            <input type="text" name="td_cptd" id="td-cptd" class="custom-form clear-input" style="width: 70%;">
                                                            <span style="margin-left: 5px;">mmHg</span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 50px;"> HR : </td>
                                                        <td style="width: 150px;">
                                                            <input type="text" name="hr_cptd" id="hr-cptd" class="custom-form clear-input" style="width: 100%;">
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <td> RR : </td>
                                                        <td>
                                                            <input type="text" name="rr_cptd" id="rr-cptd" class="custom-form clear-input" style="width: 100%;">
                                                        </td>
                                                        <td> Suhu : </td>
                                                        <td>
                                                            <input type="text" name="suhu_cptd" id="suhu-cptd" class="custom-form clear-input" style="width: 100%;">
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
                                                    <td colspan="2" width="20%"><b>KETERANGAN</b></td>
                                                    <td colspan="2" width="10%"><b>YA</b></td>
                                                    <td colspan="2" width="60%"><b>TIDAK</b></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>RADIAL/ BRACHIAL</b></td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="radical_cptd_1" id="radical-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="radical_cptd_2" id="radical-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="radical_cptd_3" id="radical-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%">Hematom pada 15 menit pertama</td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="hematom_cptd_1" id="hematom-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="hematom_cptd_2" id="hematom-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="hematom_cptd_3" id="hematom-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%"><b>Tindakan selanjutnya : </b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 1. Pergelangan tangan (dan atau siku) tidak boleh ditekuk dari jam
                                                        <input type="text" name="jampergelangan_cptd" id="jampergelangan-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                        sampai jam
                                                        <input type="text" name="jamsiku_cptd" id="jamsiku-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 2. Ganti balutan setelah 4 jam bila masih berdarah pasang nichiban lagi 4 jam</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 3. Observasi hematoma daerah tusukan setiap jam selama 6 jam</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 4. Bila tindakan melalui brachialis cek APTT / ACT 6 jam post tindakan PCI jam
                                                        <input type="text" name="jampci_cptd" id="jampci-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                        bila hasil baik sheath boleh dicabut
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 5. 6 jam post cabut sheath tangan tidak boleh ditekuk selama 6 jam</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 6. Bila akral dingin atau cyanosis baluran boleh dikendurkan</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 7. Bila terjadi komplikasi paska tindakan (perdarahan, hematoma, akral dingin / cyanosis dan kondisi penurunan klinis lainnya) segera hubungi dokter DPJP.</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" width="20%"><b>FEMORALIS</b></td>
                                                    <td colspan="2" width="10%"><b>YA</b></td>
                                                    <td colspan="2" width="60%"><b>TIDAK</b></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" width="20%"><b>Denyut dorsalis pedis kuat</b></td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="denyut_cptd_1" id="denyut-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="denyut_cptd_2" id="denyut-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="denyut_cptd_3" id="denyut-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>Hematom pada 15 menit pertama</b></td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="hemmattom_cptd_1" id="hemmattom-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="hemmattom_cptd_2" id="hemmattom-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="hemmattom_cptd_3" id="hemmattom-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" width="100%"><b>Tindakan selanjutnya : </b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 1. Kaki tidak boleh di tekuk dari jam
                                                        <input type="text" name="jamkaki_cptd" id="jamkaki-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                        sampai jam
                                                        <input type="text" name="jamkitekuk_cptd" id="jamkitekuk-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 2. Observasi denyut dorsalis pedis setiap jam selama 6 jam</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 3. Cek APTT / ACT 6 jam post tindakan PCI jam
                                                        <input type="text" name="jamaptt_cptd" id="jamaptt-cptd"class="custom-form clear-input d-inline-block col-lg-1"> 
                                                        bila hasil baik sheath boleh dicabut
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 4. 6 jam post cabut sheath sheath kaki tidak boleh ditekuk selama 6 jam</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" width="100%" style="padding-bottom: 10px; padding-left: 30px;"> 5. Bila terjadi komplikasi paska tindakan (perdarahan, hematoma, akral dingin / cyanosis dan kondisi penurunan klinis lainnya) segera hubungi dokter DPJP.</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" width="20%"><b>HASIL TINDAKAN</b></td>
                                                    <td colspan="2" width="10%"><b>Sudah diterima</b></td>
                                                    <td colspan="2" width="60%"><b>Belum diterima</b></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" width="20%"><b>Hasil Tindakan</b></td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="hasil_cptd_1" id="hasil-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="hasil_cptd_2" id="hasil-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="hasil_cptd_3" id="hasil-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>CD/DVD Tindakan</b></td>
                                                    <td colspan="2" width="10%"><input type="checkbox" name="cddvd_cptd_1" id="cddvd-cptd-1" value="1" class="mr-1"></td>
                                                    <td colspan="2" width="60%">
                                                        <input type="checkbox" name="cddvd_cptd_2" id="cddvd-cptd-2" value="1" class="mr-1">
                                                        <input type="text" name="cddvd_cptd_3" id="cddvd-cptd-3"class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" width="20%"><b>Tanggal</b></td>
                                                    <td colspan="2" width="10%"><input type="text" name="tanggal_cptd" id="tanggal-cptd"class="custom-form clear-input d-inline-block col-lg-4"></td>
                                                    <td colspan="2" width="60%"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>Perawat Cathlab</b></td>
                                                    <td colspan="2" width="10%"><input type="text" name="perawatcathlab_cptd" id="perawatcathlab-cptd" class="select2c-input ml-2"></td>
                                                    <td colspan="2" width="60%"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" width="20%"><b>Perawat Ruangan</b></td>
                                                    <td colspan="2" width="10%"><input type="text" name="perawatruangan_cptd" id="perawatruangan-cptd" class="select2c-input ml-2"></td>
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
									<button type="button" class="btn btn-primary mr-1" onclick="simpanCheklistPostTindakanDiagnostik()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Form</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanCheklistPostTindakanDiagnostik()" id="btn_update_cptd"> <i class="fas fa-edit mr-1"></i>Update Form</button>
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
							<table class="table table-sm table-striped table-bordered" id="table-list-cptd">
								<thead style="background-color:rgb(233, 126, 232);">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="15%" class="center">Nama Pasien</th>
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
