<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<!-- <?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Pencarian', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?> -->
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
						<?php if ($_SESSION['account_group'] == "Admin PPI" || $_SESSION['account_group'] == "Admin") : ?>
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
						<?php endif; ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<input type="text" name="keyword" id="keyword-search" class="form-control form-control-sm mr-1" style="width:30%" placeholder="Nama / No. RM...">
						<?= form_dropdown('pasien_keluar', $pasien_keluar, array(), 'class="form-control-sm mr-1" style="width:20%" id=pasien-keluar') ?>
						<input type="date" name="tanggal_masuk" style="width:20%" class="form-control-sm mr-1" id="tanggal-masuk-index">
						<?= form_dropdown('bangsal_search', $bangsal_filter, array(), 'class="form-control-sm" style="width:30%" id=bangsal-search') ?>
						<!-- ?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ? -->
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="center">
					<h5 style="text-transform: uppercase;"><b>FORMULIR HARIAN</b></h5>
					<h5 style="text-transform: uppercase;"><b>DATA PEMAKAIAN PERALATAN MEDIS</b></h5>
					<!-- ?= var_dump($_SESSION) ? -->
				</div>
				<div id=label-ppi class="lef"></div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-peralatan-medis" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th rowspan="2" class="center">No.</th>
								<th rowspan="2" class="center">Nomor RM</th>
								<th rowspan="2" class="left">Nama Pasien</th>
								<th rowspan="2" class="center">Ruang</th>
								<th rowspan="2" class="center">Jenis <br>Kelamin</th>
								<th rowspan="2" class="center">Umur</th>
								<th colspan="6" class="center">Pemakaian Alat</th>
								<th rowspan="2" class="center">VAP</th>
								<th rowspan="2" class="center">IADP</th>
								<th rowspan="2" class="center">Plebitis</th>
								<th rowspan="2" class="center">ISK</th>
								<th rowspan="2" class="center">Dekubitus</th>
								<th rowspan="2" class="center">IDO</th>
								<th rowspan="2" class="center">Kultur</th>
								<th rowspan="2" class="center">Antiobika</th>
								<th rowspan="2" class="left">Keterangan</th>
								<th rowspan="2" class="left"></th>
							</tr>
							<tr>
								<th class="center">ETT</th>
								<th class="center">CVL</th>
								<th class="center">IVL</th>
								<th class="center">UC</th>
								<th class="center">Tirah <br>Baring</th>
								<th class="center">Operasi</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;"></tbody>
						<tfoot style="overflow:scroll;"></tfoot>
						<!-- <tfoot></tfoot> -->
					</table>
				</div>
				<div class="row peralatan-medis m-t-10">
					<div class="col">
						<div id="pagination" class="float-left"></div>
						<div id="summary" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>