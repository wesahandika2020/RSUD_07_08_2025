<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 550px">
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
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="no-rm-search" class="col-md-3 col-form-label">No. RM</label>
                    <div class="col-md-9">
                        <input type="text" name="no_rm" id="no-rm-search" class="form-control" placeholder="No. RM...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="pasien-search" class="col-md-3 col-form-label">Nama Pasien</label>
                    <div class="col-md-9">
                        <input type="text" name="pasien" id="pasien-search" class="form-control" placeholder="Nama Pasien...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-md-3 col-form-label">Barang</label>
                    <div class="col-md-9">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListReturPenjualan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Search -->

<!-- Modal Retur Penjualan -->
<div id="modal-retur-penjualan" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-retur-penjualan-label">Form Retur Penjualan Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-retur-penjualan role=form class=form-horizontal') ?>
				<input type="hidden" name="id_penjualan" id="id-penjualan">
				<input type="hidden" name="jenis" id="jenis">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
				<input type="hidden" name="id_pasien" id="id-pasien">
				<input type="hidden" name="reimburse_barang" id="reimburse">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td width="15%">ID Tebus</td>
								<td width="1%">:</td>
								<td width="84%"><input type="text" name="no_nota" id="no-nota-auto" class="select2c-input" placeholder="Pilih ID. Tebus Resep..." style="width:300px"></td>
							</tr>
						</table>
						<table id="table-list" class="table table-hover table-striped table-sm color-table info-table">
							<thead>
								<tr>
                                    <th width="3%">No.</th>
                                    <th width="39%">Nama Barang</th>
                                    <th width="10%" class="center">Jml</th>
                                    <th width="15%">Unit Kemasan</th>
                                    <th width="10%" class="center">Jml Retur</th>
                                    <th width="10%" class="center">ED</th>
                                    <th width="10%" class="right">Harga Jual</th>
                                    <th width="10%" class="right">SubTotal</th>
                                    <th width="3%"></th>
								</tr>
							</thead>
							<tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="right">TOTAL</td>
                                    <td class="right" id="total-retur"></td>
                                    <td><input type="hidden" name="total" id="total" /></td>
                                </tr>
                            </tfoot>
						</table>
					</div>
				</div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanReturPenjualan()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Retur Penjualan -->