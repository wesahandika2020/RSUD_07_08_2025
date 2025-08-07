<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
						<tr>
							<th class="center" width="3%">No.</th>
							<th class="center" width="2%">ID</th>
							<th class="center" width="5%">No. Distribusi</th>
							<th class="center" width="10%">Tanggal Permintaan</th>
							<th class="center" width="20%">Permintaan Dari</th>
							<th class="center" width="7%">Status</th>
							<th class="center" width="10%">Tanggal Dikirim</th>
							<th class="center" width="10%">Jml Pengeluaran</th>
							<th class="center" width="3%"></th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
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
