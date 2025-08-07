<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:500px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="tanggal-awal" class="col-md-3 col-form-label">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no-register-search" class="col-md-3 col-form-label">No. Register</label>
                    <div class="col-md-9">
                        <input type="text" name="no_register" id="no-register-search" class="form-control" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="no-rm-search" class="col-md-3 col-form-label">No. RM</label>
                    <div class="col-md-9">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control" placeholder="No. Rekam Medik">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nik-search" class="col-md-3 col-form-label">NIK</label>
                    <div class="col-md-9">
                        <input type="text" name="nik" id="nik-search" class="form-control" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="nama-search" class="col-md-3 col-form-label">Nama</label>
                    <div class="col-md-9">
                        <input type="text" name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dokter-search" class="col-md-3 col-form-label">Dokter DPJP</label>
                    <div class="col-md-9">
                        <input type="text" name="dokter" id="dokter-search" class="select2-input" placeholder="Pilih Dokter DPJP">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="cara-bayar-search" class="col-md-3 col-form-label">Cara Bayar</label>
                    <div class="col-md-9">
						<?= form_dropdown('cara_bayar', $cara_bayar, array(), 'id=cara-bayar-search class=form-control') ?>
                    </div>
				</div>
				<div class="form-group row tight penjamin-group-search">
                    <label for="penjamin-search" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin-search" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="status-bayar-search" class="col-md-3 col-form-label">Status Bayar</label>
                    <div class="col-md-9">
						<?= form_dropdown('status_bayar', $cara_bayar, array(), 'id=status-bayar-bayar class=form-control') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListRekapBilling(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<div id="modal-detail-rekap-billing" class="modal fade">
	<div class="modal-dialog" style="max-width:98%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-fw fa-th-list mr-1"></i>Data Detail Billing Pasien</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
				<div class="row">
					<div class="col-md-3">
						<div class="identitas-area" style="height:500px;overflow-y:auto;">
							<table class="table table-no-border table-striped table-hover table-sm color-table info-table">
								<thead>
									<tr>
										<th colspan="5" class="center"><i class="fas fa-user mr-1"></i>Data Pasien</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="30%"><strong>No. RM</strong></td>
										<td width="1%">:</td>
										<td width="69%"><span id="no-rm-detail"></span></td>
									</tr>
									<tr>
										<td><strong>No. Register</strong></td>
										<td>:</td>
										<td><span id="no-register-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Nama</strong></td>
										<td>:</td>
										<td><span id="nama-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Alamat</strong></td>
										<td>:</td>
										<td><span id="alamat-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Kelamin</strong></td>
										<td>:</td>
										<td><span id="kelamin-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Umur / Tgl Lahir</strong></td>
										<td>:</td>
										<td><span id="umur-detail"></span></td>
									</tr>
									<tr id="set-nosep">
										<td><strong>No SEP</strong></td>
										<td>:</td>
										<td><span id="nosep"></span></td>
									</tr>
								</tbody>
							</table>
							<br>
							 <table class="table table-no-border table-striped table-hover table-sm color-table info-table">
								<thead>
									<tr>
										<th colspan="5" class="center"><i class="fas fa-home mr-1"></i>Data Layanan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="30%"><strong>Diagnosa</strong></td>
										<td width="1%">:</td>
										<td width="69%"><span id="diagnosa-detail"></span></td>
									</tr>
									<tr>
										<td width="30%"><strong>Tanggal Masuk</strong></td>
										<td width="1%">:</td>
										<td width="69%"><span id="tanggal-daftar-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Tanggal Pulang</strong></td>
										<td>:</td>
										<td><span id="tanggal-pulang-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Nama Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="nama-pjwb-finansial-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Alamat Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="alamat-pjwb-finansial-detail"></span></td>
									</tr>
									<tr>
										<td><strong>Telp Pen. Jawab Finansial</strong></td>
										<td>:</td>
										<td><span id="telp-pjwb-finansial-detail"></span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-9">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="75%">
										<button type="button" class="btn btn-warning btn-xs" onclick="ubahCaraBayar()"><i class="fas fa-fw fa-exchange-alt mr-1"></i>Ubah Cara Bayar Pasien</button>
										<button type="button" class="btn btn-success btn-xs" onclick="cetakRincianBilling('', '')"><i class="fas fa-fw fa-print mr-1"></i>Cetak Rincian Billing</button>
									<td width="25%" class="right">
										<button type="button" class="btn btn-info btn-xs" id="btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
									</td>
								</tr>
							</table>
						</div>
						<div class="billing-area" style="height:600px;overflow-y:auto;"></div>
						<div class="list-group">
							<div class="list-group-item bg-light" style="border:0">
								<span class="d-flex justify-content-end text-red" style="font-size:20px;font-weight:600;font-style:italic;">Grand Total : <span id="total-billing" class="ml-1"></span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal List Status CCO -->
<div id="modal-list-status-cco" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
				<div class="row">
					<div class="col-lg-12"><h4 class="modal-title">List Status CCO</h4></div>
					<div class="col-lg-12"><h5>Harap lakukan cetak billing kembali</h5></div>
				</div>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">     
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table">                    
                            <table id="table-listcco" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                                <thead>
                                    <tr>
										<th width="5%"  class="center">No.</th>
                                        <th width="10%" class="center">NO. REGISTER</th>
                                        <th width="10%" class="center">TANGGAL DAFTAR</th>
                                        <th width="10%" class="center">NO. RM</th> 
                                        <th width="13%" class="center">NAMA</th>
                                        <th width="10%" class="center">CARA BAYAR</th>
                                        <th width="10%" class="center">TAGIHAN</th>
                                        <th width="13%" class="center">WAKTU CETAK BILLING</th>
                                        <th width="14%" class="center">WAKTU CCO</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>					
				<div class="row">
					<div class="col">
						<div id="pagination-status-cco" class="float-left"></div>
						<div id="summary-status-cco" class="float-right text-sm"></div>
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
<!-- End Modal List Status CCO -->