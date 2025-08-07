<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row">
                    <label for="awal" class="col-lg-2 col-form-label right">Tanggal</label>
                    <div class="col-lg-5">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="" placeholder="Tanggal Awal">
                    </div>
                    <div class="col-lg-5">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="" placeholder="Tanggal Akhir">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="logistik-search" class="col-lg-2 col-form-label right">Logistik</label>
                    <div class="col-lg-10">
                        <input type="text" name="logistik" id="logistik-search" class="select2-input" placeholder="Pilih Logistik...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPemusnahanLogistik(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemusnahan Logistik -->
<div id="modal-pemusnahan-logistik" class="modal fade" style="padding: 0 10px">
    <div class="modal-dialog" style="max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pemusnahan-logistik-label"><i class="fas fa-gavel mr-2"></i>Form Pemusnahan Logistik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'id=form-pemusnahan-logistik role=form class=form-horizontal') ?>
					<div class="row">
						<div class="col-md-6">
							<table class="table table-striped table-no-border table-sm">
								<tr>
									<td width="30%" class="bold"><i class="fas fa-list mr-1"></i>Daftar Logistik Expired</td>
									<td width="30%"></td>
									<td width="30%"><input type="text" class="custom-form" id="pencarian-logistik" placeholder="Nama Logistik yang dicari..."></td>
								</tr>
							</table>
							<div class="table-responsive">
								<table id="table-logistik-pemusnahan" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th width="3%" class="center">No.</th>
											<th width="50%" class="left">Nama Logistik</th>
											<th width="10%" class="center">ED</th>
											<th width="10%" class="center">Jumlah</th>
											<th width="10%" class="right">HPP</th>
											<th width="10%" class="right">Subtotal</th>
											<th width="5%"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div id="pb-pagination" class="float-left"></div>
							<div id="pb-summary" class="float-right text-sm"></div>
						</div>
						<div class="col-md-6">
							<table class="table table-striped table-no-border table-sm">
								<tr>
									<td class="bold"><i class="fas fa-list mr-1"></i>Daftar Logistik yang akan dimusnahkan <?= $this->session->userdata('unit') ?></td>
								</tr>
							</table>
							<div class="table-responsive">
								<table id="table-logistik-order" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th width="3%" class="center">No.</th>
											<th width="47%" class="left">Nama Logistik</th>
											<th width="20%" class="right">Sisa</th>
											<th width="10%" class="left">Satuan</th>
											<th width="10%" class="center">Jumlah</th>
											<th width="5%"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPemusnahanLogistik()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pemusnahan Logistik -->