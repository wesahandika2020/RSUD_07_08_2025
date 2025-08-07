<input type="hidden" id="page-now1">
<div class="row">
	<div class="col-lg-6">
		<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search1 class="btn btn-info waves-effect"') ?>
		<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload1 class="btn btn-secondary waves-effect"') ?>
	</div>
	<div class="col-lg-6 d-flex justify-content-end">
	<div class="col">
		<h6 class="d-flex justify-content-end">
			<span class="m-t-5 m-r-5">Filter Layanan :</span>
			<?= form_dropdown('layanan', $layanan, array(), 'class="custom-form" style="width:50%" id=layanan') ?>
		</h6>
	</div>
	</div>
	<div class="col-lg-12 mt-2">
		<!-- <div class="table-responsive"> -->
			<table id="table-data1" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th width="3%" class="center">No</th>
						<th width="10%" class="center">Waktu Order</th>
						<th width="10%" class="center">Ruangan</th>
						<th width="10%" class="center">No.RM</th>
						<th width="15%" class="center">Nama Pasien</th>
						<th width="15%" class="center">Nama Pemesan</th>
						<th width="15%" class="center">Jenis Bimroh</th>
						<th width="5%" class="center">Status</th>
						<th width="5%" class="center"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		<!-- </div> -->
		<div class="row">
			<div class="col">
				<div id="pagination1" class="float-left"></div>
				<div id="summary1" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('permintaan_bimroh/js') ?>
<?php $this->load->view('permintaan_bimroh/modal') ?>