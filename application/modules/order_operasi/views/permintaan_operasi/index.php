<input type="hidden" id="page-now1">
<div class="row">
	<div class="col-lg-6">
		<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search1 class="btn btn-info waves-effect"') ?>
		<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload1 class="btn btn-secondary waves-effect"') ?>
	</div>
	<div class="col-lg-6 d-flex justify-content-end">
		
	</div>
	<div class="col-lg-12 mt-2">
		<div class="table-responsive">
			<table id="table-data1" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th class="center">No</th>
						<th class="center">No. Ops</th>
						<th class="left">Waktu Order</th>
						<th class="left">Kamar</th>
						<th class="left">No. RM</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Asal Pasien</th>
						<th class="left">Tindak Lanjut Asal</th>
						<th class="left">Nama Operasi</th>
						<th class="center">Status</th>
						<th class="center"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination1" class="float-left"></div>
				<div id="summary1" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('permintaan_operasi/js') ?>
<?php $this->load->view('permintaan_operasi/modal') ?>
<?php $this->load->view('pelayanan/perioperatif_form/modal') ?>
<?php $this->load->view('pelayanan/perioperatif_form/js') ?>