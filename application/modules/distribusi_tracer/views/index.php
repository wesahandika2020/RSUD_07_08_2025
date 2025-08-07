<style>
	.page-wrapper {
		background-color: white !important;
	}
</style>
<input type="hidden" name="page" id="page">
<div class="row">
	<div class="col-md-3">
		<!-- info box -->
		<div class="info-box bg-aqua shadow">
			<span class="info-box-icon"><i class="fa fa-history"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Order / Pending</span>
				<span class="info-box-number info_num_berkas" id="order_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="order_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="order_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
		<!-- info box -->
		<div class="info-box bg-green shadow">
			<span class="info-box-icon"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Ready</span>
				<span class="info-box-number info_num_berkas" id="ready_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="ready_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="ready_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
		<!-- info box -->
		<div class="info-box bg-orange shadow">
			<span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Distributed</span>
				<span class="info-box-number info_num_berkas" id="dist_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="dist_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="dist_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
		<!-- info box -->
		<div class="info-box bg-red shadow">
			<span class="info-box-icon"><i class="fa fa-stop"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Returned</span>
				<span class="info-box-number info_num_berkas" id="return_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="return_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="return_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
	</div>
	<div class="col-md-9">
		<div class="row mb-2">
			<div class="col-lg-6 d-flex justify-content-start">
				<?= form_button('add', '<i class="fas fa-cart-plus mr-1"></i>Form Distribusi', 'id=btn-add class="btn btn-info waves-effect"') ?>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<?= form_dropdown('status', $status, array(), 'id=status class="custom-select col-md-5 mr-1"') ?>
				<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-secondary waves-effect mr-1"') ?>
				<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
			</div>
		</div>
		<div class="table-responsive">
			<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr class="header">
						<th width="3%" class="wrapper center">No.</th>
						<th width="8%" class="wrapper center">Waktu Order</th>
						<th width="5%" class="wrapper center">No. RM</th>
						<th width="25%" class="wrapper left">Pasien</th>
						<th width="10%" class="wrapper left">Status Pasien</th>
						<th width="10%" class="wrapper left">Tujuan</th>
						<th width="15%" class="wrapper left">Posisi</th>
						<th width="20%" class="wrapper left">Jeda Siap</th>
						<th width="10%" class="wrapper left">Status</th>
						<th width="10%" class="wrapper right"></th>
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

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>