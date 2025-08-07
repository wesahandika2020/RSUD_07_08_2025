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
								<th width="3%" class="center">No.</th>
								<th width="12%" class="left">Waktu</th>
								<th width="7%" class="center">No. Retur</th>
								<th width="20%" class="left">Retur ke</th>
								<th width="25%" class="left">Nama Barang</th>
								<th width="7%" class="center">Expired Date</th>
								<th width="30%" class="left">Alasan</th>
								<th width="10%" class="left">User</th>
								<!--<th width="1%"></th>-->
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