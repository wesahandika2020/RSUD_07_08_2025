<input type="hidden" id="page">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('add', '<i class="fas fa-plus-circle mr-1"></i>Tambah Data', 'id=btn-add class="btn btn-info waves-effect"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-secondary waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="3%" class="wrapper center">No.</th>
								<th width="10%" class="wrapper center">Waktu</th>
								<th width="20%" class="wrapper left">Nama Barang</th>
								<th width="7%" class="wrapper left">Pembayaran</th>
								<th width="17%" class="wrapper right">Jumlah</th>
								<th width="7%" class="wrapper left">Satuan</th>
								<th width="5%" class="wrapper left">No. Batch</th>
								<th width="5%" class="wrapper center">Expired</th>
								<th width="20%" class="wrapper left">User</th>
								<th width="6%"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row mt-3">
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