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
                        <input type="text" name="tanggal_awal" id="tanggal-awal" autocomplete="off" class="form-control" value="<?php echo date('d/m/Y') ?>" placeholder="Tanggal Awal">
                    </div>
                    <div class="col-lg-5">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" autocomplete="off" class="form-control" value="<?php echo date('d/m/Y') ?>" placeholder="Tanggal Akhir">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-lg-2 col-form-label right">Barang</label>
                    <div class="col-lg-10">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPemakaianBarangLogistik(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pemakaian Barang Logistik -->
<div id="modal-pemakaian-barang-logistik" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pemakaian-barang-logistik-label">Form Pemakaian Barang Logistik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pemakaian-barang-logistik role=form class=form-horizontal') ?>
				<input type="hidden" name="id" id="id">
				<input type="hidden" id="sisa">
				<input type="hidden" id="sisa-label">
				
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td width="15%">Barang</td>
								<td width="1%">:</td>
								<td width="84%">
                                    <input type="text" name="barang" id="barang-auto" class="select2c-input" placeholder="Pilih Barang..." style="width:300px">
                                </td>
							</tr>
                            <tr>
                                <td>Jumlah Pakai</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="jumlah" id="jumlah" class="custom-form center" onkeypress="return hanyaAngka(event)" val="1" style="width:100px">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-info btn-xs add-data"><i class="fas fa-plus-circle mr-1"></i>Tambahkan Data</button></td>
                            </tr>
						</table>
						<table id="table-list" class="table table-hover table-striped table-sm color-table info-table">
							<thead>
								<tr>
                                    <th width="3%" class="center">No.</th>
                                    <th width="39%">Nama Barang</th>
                                    <th width="10%" class="center">Sisa</th>
                                    <th width="15%" class="center">Jumlah Pakai</th>
                                    <th width="3%"></th>
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPemakaianBarangLogistik()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pemakaian Barang Logistik -->