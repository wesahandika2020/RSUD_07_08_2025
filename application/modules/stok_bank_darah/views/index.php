<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header pattern">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">

                    </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive" id="parent">
					<table id="table-data" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="3%" class="center">No.</th>
								<th width="30%" class="center">Nama Barang</th>
								<th width="10%" class="center">Expired</th>
								<th width="15%" class="center">Transaksi</th>
								<th width="10%" class="center">Waktu</th>
								<th width="5%" class="center">Awal</th>
								<th width="5%" class="center">Masuk</th>
								<th width="5%" class="center">Keluar</th>
								<th width="5%" class="center">Sisa</th>
								<th width="5%" class="center">Harga Satuan</th>
								<th width="5%" class="center">Jumlah Harga</th>
								<th width="10%" class="center">User</th>
								<?php if ($this->session->userdata('account_group') === 'Admin') : ?>
								<th></th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row mt-3">
					<div class="col">
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