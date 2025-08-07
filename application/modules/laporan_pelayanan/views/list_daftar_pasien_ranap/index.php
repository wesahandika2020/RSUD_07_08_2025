<style>
	.page-wrapper {
		background-color: white !important;
	}
</style>
<input type="hidden" id="page">
<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
						<?= form_button('export', '<i class="fas fa-file-excel mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
		
					</div>
				</div>
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="3%" class="wrapper center">No.</th>
								<th width="8%" class="wrapper center">No. RM</th>
								<th width="25%" class="wrapper left">Nama Pasien</th>
								<th width="10%" class="wrapper center">Waktu Masuk</th>
								<th width="10%" class="wrapper center">Waktu Keluar</th>
								<th width="25%" class="wrapper left">Alamat</th>
								<th width="20%" class="wrapper left">Ruangan</th>
								<th width="5%" class="wrapper right"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
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