<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row">
                    <label for="awal" class="col-md-3 col-form-label">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="unit" class="col-md-3 col-form-label">Retur Dari</label>
                    <div class="col-md-9">
						<input type="text" name="unit" id="unit" class="select2-input" placeholder="Pilih Retur Dari...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no-retur" class="col-md-3 col-form-label">No. Retur</label>
                    <div class="col-md-9">
						<input type="text" name="no_retur" id="no-retur" class="form-control" placeholder="Pilih No. Retur...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPenerimaanReturDistribusi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<div id="modal-penerimaan-retur-distribusi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:850px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-penerimaan-retur-distribusi-label">Form Penerimaan Retur Distribusi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'id=form-penerimaan-retur-distribusi role=form class=form-horizontal') ?>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td width="20%">Tanggal Sekarang</td>
								<td width="1%">:</td>
								<td class="v-center" width="79%"><b id="waktu-real"></b></td>
							</tr>
							<tr>
								<td>Tanggal Manual</td>
								<td>:</td>
								<td class="v-center">
                                    <span style="float:left;padding-right:5px;">
                                        <input type="text" name="waktu_penerimaan_retur_distribusi" id="waktu-penerimaan-retur-distribusi" class="custom-form d-inline-block" style="width: 180px;" placeholder="Otomatis Jika Kosong..." disabled>
                                    </span>
                                    <span>
                                        <button type="button" class="btn btn-secondary btn-xs" id="remove-waktu-real"><i class="fas fa-times-circle mr-1"></i>Manual Date</button>
                                    </span>
                                </td>
							</tr>
							<tr>
								<td>Nomor Retur Distribusi</td>
								<td>:</td>
								<td class="v-center">
                                    <input type="text" name="no_retur_distribusi" id="no-retur-distribusi-auto" class="select2c-input" placeholder="Pilih No. Retur Distribusi...">
                                </td>
							</tr>
                        </table>
                        <table class="table table-sm table-striped table-hover color-table info-table" id="table-list">
                            <thead>
                                <tr>
                                    <th width="5%" class="center">No.</th>
                                    <th width="70%" class="left">Nama Barang</th>
                                    <th width="5%" class="right">Jumlah</th>
                                    <!-- <th width="10%" class="left">Satuan</th> -->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
					</div>
				</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPenerimaanReturDistribusi()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>