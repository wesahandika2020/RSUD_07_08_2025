<!-- Modal Search -->
<div id="modal-search" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width:500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Form Parameter Laporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="jenis-tanggal" class="col-md-3 col-form-label">Jenis Tanggal</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_tanggal', $jenis_tanggal, array(), 'id=jenis-tanggal name=jenis_tanggal class=form-control') ?>
					</div>
				</div>

				<div class="form-group row tight">
					<label for="periode-laporan" class="col-md-3 col-form-label" id="label-tanggal"></label>
					<div class="col-md-9">
						<?= form_dropdown('periode_laporan', $periode_laporan, array(), 'id=periode-laporan name=periode_laporan class=form-control') ?>
					</div>
				</div>
				<div class="harian form-group row tight">
					<label for="tanggal-harian" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_harian" id="tanggal-harian" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="bulanan form-group row tight">
					<label for="bulan" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<?= form_dropdown('bulan', $bulan, array(), 'id=bulan class=form-control', (date('Y') == array($bulan) ? 'selected' : '')) ?>
					</div>
					<div class="col-md-3">
						<select name="tahun" id="tahun" class="form-control">
							<?php $tg_awal = date('Y') - 5;
							$tgl_akhir     = date('Y') + 5;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="rentang-waktu form-group row tight">
					<label for="tanggal-awal" class="col-md-3 col-form-label"></label>
					<div class="col-md-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="">
					</div>
					<div class="col-md-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-md-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="penjamin-search" class="col-md-3 col-form-label">Penjamin</label>
					<div class="col-md-9">
						<input type="text" name="id_penjamin" id="penjamin-search" class="select2-input" placeholder="- Semua Penjamin	-">
					</div>
				</div>
                <div class="form-group row tight">
					<label for="jenis-pendaftaran-search" class="col-md-3 col-form-label">Jenis Pendaftaran</label>
					<div class="col-md-9">
						<input type="text" name="jenis_pendaftaran" id="jenis-pendaftaran-search" class="select2-input" placeholder="- Semua Jenis Pendaftaran	-">
					</div>
				</div>
                <div class="form-group row tight">
					<label for="id-pasien-search" class="col-md-3 col-form-label">No RM Pasien</label>
					<div class="col-md-9">
						<input type="text" name="id_pasien" id="id-pasien-search" class="select2-input" placeholder="- Semua Pasien	-">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="dokter-search" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<input type="text" name="id_dokter" id="dokter-search" class="select2-input" placeholder="- Semua Dokter -">
					</div>
				</div>
				<!-- <div class="form-group row tight">
					<label for="petugas-search" class="col-md-3 col-form-label">Petugas</label>
					<div class="col-md-9">
						<input type="text" name="id_petugas" id="petugas-search" class="select2-input" placeholder="- Semua Petugas	-">
					</div>
				</div> -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getLaporanKeuanganCasemix(1)"><i class="fas fa-paper-plane mr-1"></i> Tampilkan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- Modal Tagihan -->
<div id="modal-tagihan" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-tagihan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tagihan-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-eklaim role=form class="form-horizontal form-custom"') ?>
                <input type="hidden" id="id-pendaftaran-tagihan">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">No Register</td>
                                    <td width="80%">: <span id="no-register-tagihan"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">No RM</td>
                                    <td width="80%">: <span id="id-pasien-tagihan"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Nama Pasien</td>
                                    <td width="80%">: <span id="nama-pasien-tagihan"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Tgl Daftar</td>
                                    <td width="80%">: <span id="tanggal-daftar-tagihan"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tgl Keluar</td>
                                    <td width="80%">: <span id="tanggal-keluar-tagihan"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tagihan</td>
                                    <td width="80%">: <span id="tagihan"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <h5 class="center"><b>RINCIAN TAGIHAN</b></h5>
                        <div class="well">
                            <div class="row" style="margin-top: -30px;">
                                <div class="col-lg-4 right">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(1)"><b>?</b></button>
                                                Biaya Administrasi
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="administrasi_tagihan" id="administrasi-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(2)"><b>?</b></button>
                                                Biaya Obat
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="obat_tagihan" id="obat-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(3)"><b>?</b></button>
                                                Biaya Alkes
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="alkes_tagihan" id="alkes-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(4)"><b>?</b></button>
                                                Biaya Kamar Rawat Inap
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="ranap_tagihan" id="ranap-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(5)"><b>?</b></button>
                                                Biaya Kamar Intensif Care
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="icare_tagihan" id="icare-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(6)"><b>?</b></button>
                                                Biaya IGD
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="igd_tagihan" id="igd-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(7)"><b>?</b></button>
                                                Biaya Dokter
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="dokter_tagihan" id="dokter-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(8)"><b>?</b></button>
                                                Biaya Laboratorium
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="lab_tagihan" id="lab-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(9)"><b>?</b></button>
                                                Biaya Radiologi
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="rad_tagihan" id="rad-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(10)"><b>?</b></button>
                                                Biaya Tindakan Operatif
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="operatif_tagihan" id="operatif-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(11)"><b>?</b></button>
                                                Biaya Tindakan Non Operatif
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nonoperatif_tagihan" id="nonoperatif-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(12)"><b>?</b></button>
                                                Biaya Keperawatan
                                            </td>
                                            <!-- <td class="bold right"  id="label-keperawatan"> -->
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="keperawatan_tagihan" id="keperawatan_tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(13)"><b>?</b></button>
                                                Biaya Pelayanan Darah
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="darah_tagihan" id="darah-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(14)"><b>?</b></button>
                                                Biaya Ambulance
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="ambulan_tagihan" id="ambulan-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(15)"><b>?</b></button>
                                                Biaya Alat Bantu
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="alatbantu_tagihan" id="alatbantu-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">
                                                <button type="button" class="btn btn-secondary btn-rounded btn-xs" style="margin-right: 5px;" onclick="notif_question(16)"><b>?</b></button>
                                                Biaya Rehabilitas Medis
                                            </td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="rehab_tagihan" id="rehab-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">TOTAL</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="total_tagihan" id="total-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>													
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">SELISIH</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="selisih_tagihan" id="selisih-tagihan" class="custom-form clear-input d-inline-block col-lg-9" readonly>													
                                                </div>
                                            </td>
                                        </tr>
										<tr>
											<td></td>
                                            <td></td>
                                            <td class="bold left"><span id="notif-cek-tagihan" style="color: red;" class="blinker"></span></td>
										</tr>
                                    </table>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="footer-modal">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Keluar</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
</div>
<!-- End Modal Tagihan -->

<!-- Start Detail Tagihan-->
<div id="modal-detail-tagihan" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="label-judul-tagihan"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-detail-tagihan role=form class=form-horizontal') ?>
                <div><h6 id="label-subjudul-tagihan"></h6></div>
                <div><h6 id="label-subjudul-total-tagihan"></h6></div>
                <div class="table-responsive" id="parent">
                    <table id="table-detail-tagihan" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="5%"  class="center">No</th>
                                <th width="15%" class="center">Tgl Layanan</th>
                                <th width="15%" class="center">Tempat Layanan</th>
                                <th width="15%" class="center">Tanggal</th>
                                <th width="30%" class="left">Nama</th>
                                <th width="20%" class="right" >Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div><h6 id="label-subjudul-tagihan-obat-retur"></h6></div>
                    <div><h6 id="label-subjudul-total-tagihan-obat-retur"></h6></div>
                    <table id="table-detail-tagihan-obat-retur" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="5%"  class="center">No</th>
                                <th width="45%" class="left">Nama</th>
                                <th width="10%" class="center">Jumlah</th>
                                <th width="20%" class="right">Harga</th>	
                                <th width="20%" class="right" >Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div><h6 id="label-subjudul-tagihan-alkes-retur"></h6></div>
                    <div><h6 id="label-subjudul-total-tagihan-alkes-retur"></h6></div>
                    <table id="table-detail-tagihan-alkes-retur" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="5%"  class="center">No</th>
                                <th width="45%" class="left">Nama</th>
                                <th width="10%" class="center">Jumlah</th>
                                <th width="20%" class="right">Harga</th>	
                                <th width="20%" class="right" >Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Detail Tagihan-->