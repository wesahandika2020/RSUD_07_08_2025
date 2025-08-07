<input type="hidden" id="page-now2">
<div class="row">
	<div class="col-lg-6">
		<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search2 class="btn btn-info waves-effect"') ?>
		<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload2 class="btn btn-secondary waves-effect"') ?>
	</div>
	<div class="col-lg-6 d-flex justify-content-end">	
	</div>
	<div class="col-lg-12 mt-2">
		<div class="table-responsive">
			<table id="table-data2" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th width="3%" class="center">No</th>
						<th width="10%" class="center">Waktu Konfirmasi</th>
						<th width="15%" class="center">Ruangan</th>
						<th width="5%" class="center">No.RM</th>
						<th width="15%" class="center">Nama Pasien</th>
						<th width="15%" class="center">Perawat Ruangan</th>
						<th width="5%" class="center"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination2" class="float-left"></div>
				<div id="summary2" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('talqin/js') ?>
<?php $this->load->view('talqin/modal_cetak_form_talqin') ?>
<?php $this->load->view('talqin/modal') ?>