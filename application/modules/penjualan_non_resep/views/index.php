<input type="hidden" id="page">
<div class="row">
	<div class="col-md-12">
		<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <?= form_button('add', '<i class="fas fa-plus-circle mr-1"></i>Tambah Data Penjualan', 'id=btn-add class="btn btn-info btn waves-effect"') ?>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-secondary btn waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary btn waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="3%" class="center">No</th>
                                <th width="10%" class="center">Tanggal</th>
                                <th width="5%" class="center">No. RM</th>
                                <th width="15%" class="left">Nama Pembeli</th>
                                <th width="17%" class="left">Nama Barang</th>
                                <th width="8%" class="right">Disc Rp</th>
                                <th width="10%" class="right">JF</th>
                                <th width="15%" class="right">Total Rp</th>
                                <th width="10%" class="center">Status</th>
                                <th width="10%" class="right wrapper"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="pagination" class="float-left"></div>
                        <div id="summary" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>