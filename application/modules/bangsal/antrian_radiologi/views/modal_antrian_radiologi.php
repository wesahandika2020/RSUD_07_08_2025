<!-- Modal Tambah Antrian -->
<div id="modal-tambah-antrian-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Antrian Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form_tambah_antrian_radiologi'); ?>
                <input type="hidden" name="id_pendaftaran" id="arad-id-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="arad-id-layanan-pendaftaran">
                <input type="hidden" name="id_order_radiologi" id="arad-id-order-radiologi">

                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">No RM</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><span id="arad-no-rm"></span></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><span id="arad-nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td><span id="arad-umur"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">Asal Order</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><span id="arad-asal-order"></span></td>
                                </tr>
                                <tr>
                                    <td>Dokter Order</td>
                                    <td>:</td>
                                    <td><span id="arad-dokter-order"></span></td>
                                </tr>
                                <tr>
                                    <td>Waktu Order</td>
                                    <td>:</td>
                                    <td><span id="arad-waktu-order"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="table-pilih-ruang" class="table table-hover table-striped table-sm color-table info-table">
                            <tr>
                                <td width="10%" class="bold">Pilih Ruangan</td>
                                <td width="1%" class="bold">:</td>
                                <td wdith="89%">
                                    <input type="radio" name="id_ruangan_rad" id="ruang_1"  value="5" class="mr-1">     <label id="label_r1"  for="ruang_1">Ruang 1</label>
                                    <input type="radio" name="id_ruangan_rad" id="ruang_2A" value="7" class="mr-1 ml-2"><label id="label_r2a" for="ruang_2A">Ruang 2A</label>
                                    <input type="radio" name="id_ruangan_rad" id="ruang_2B" value="1" class="mr-1 ml-2"><label id="label_r2b" for="ruang_2B">Ruang 2B</label>
                                    <input type="radio" name="id_ruangan_rad" id="ruang_3"  value="4" class="mr-1 ml-2"><label id="label_r3"  for="ruang_3">Ruang 3</label>
                                    <input type="radio" name="id_ruangan_rad" id="ruang_4"  value="8" class="mr-1 ml-2"><label id="label_r4"  for="ruang_4">Ruang 4</label>
                                    <input type="radio" name="id_ruangan_rad" id="ruang_5"  value="3" class="mr-1 ml-2"><label id="label_r5"  for="ruang_5">Ruang 5</label>
                                    <button type="button" class="btn btn-info waves-effect btn-xxs" onclick="konfirmasiSimpanAntrianRad()" style="margin-left: 15px;"><i class="fas fa-user-plus m-r-5"></i>Tambah Antrian</button>
                                </td>
                            </tr>
                            <tbody></tbody>
                        </table>

                        <button name="reset" type="button" id="btn-reload-antrian-radiologi" class="btn btn-info waves-effect btn-xxs" style="margin-bottom: 1px;"><i class="fas fa-history m-r-5"></i>Reload Data Antrian</button>
                        
                        <div class="table">                    
                            <table id="table_list_detail_antrian_rad" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                                <thead>
                                    <tr>
                                        <th width="5%"  class="center">No.</th>
                                        <th width="10%" class="center">Tanggal</th>
                                        <th width="10%" class="left">Ruangan</th>
                                        <th width="10%" class="center">No Antrian</th> 
                                        <th width="15%" class="center">Waktu Panggil</th>
                                        <th width="15%" class="center">Jumlah Panggil</th>
                                        <th width="15%" class="center">Status Panggil</th>
                                        <th width="20%" class="center"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    
                        <!-- <div class="row">
                            <div class="col">
                                <div id="pagination_list_detail_antrian_rad" class="float-left"></div>
                                <div id="summary_list_detail_antrian_rad" class="float-right text-sm"></div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Antrian -->

<!-- Start Modal Tambah Antrian Pasien -->
<div id="modal-tambah-antrian-radiologi-pasien" class="modal fade" role="dialog" aria-labelledby="modal_tambah_antrian_radiologi_pasien_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Antrian Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_tambah_antrian_radiologi_pasien role=form class=form-horizontal') ?>
                <input type="hidden" id="id-pasien-tambah">
                <input type="hidden" id="id-pendaftaran-tambah">
                <input type="hidden" id="id-layanan-pendaftaran-tambah">
                <input type="hidden" id="id-order-tambah">
                <input type="hidden" id="konfrim-order-tambah">

                
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pasien</label>
                        <div class="col-md-9">
                            <input type="text" name="pasien" id="pasien-order-tambah" class="select2-input" placeholder="Pilih Pasien...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Order dan<br>Asal Order</label>
                        <div class="col-md-9">
                            <select name="tgl_order_tambah" id="tgl-order-tambah" class="form-control"> </select>
                        </div>
                    </div>
                    
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="btn_tambah_antrian_radiologi()"><i class="fas fa-search"></i> Tambah Antrian</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Antrian Pasien -->


<!-- Modal Batal Antrian Radiologi -->
<div id="modal-batal-antrian-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Antrian Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-antrian-radiologi'); ?>
				<div class="form-group tight">
					<input type="hidden" name="id_antrian" id="id-antrian">
                    <input type="hidden" id="kode-form">
                    <label class="col col-form-label">Keterangan Pembatalan</label>
                    <div class="col-lg-12">
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan pembatalan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanAntrianRadiologi()"><i class="fas fa-check-circle mr-1"></i>Batalkan Antrian</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Antrian Radiologi -->

<!--Modal Call Antrin-->
<div id="modal-call-antrin" data-backdrop="static" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-call-antrin-label">Call Antrian Radiologi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-call-antrin role=form class=form-horizontal') ?>
				<input type="hidden" id="call-id-antrin">
				<input type="hidden" id="call-status-call">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-3 col-form-label">No RM</label>
							<div class="col">
                                <label>:</label>
                                <label id="call-no-rm"></label>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Nama Pasien</label>
							<div class="col">
                                <label>:</label>
                                <label id="call-nama-pasien"></label>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Nomor Antrin</label>
							<div class="col">
                                <label>:</label>
                                <label id="call-nomor-antrin"></label>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Ruang</label>
							<div class="col">
                                <label>:</label>
                                <label id="call-ruang-radiologi"></label>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cekDelayPanggilan()"><i class="fas fa-plus-circle"></i> Panggil</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--End Modal Call Antrian-->
