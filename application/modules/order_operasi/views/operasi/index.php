<input type="hidden" id="page-now2">
<input type="hidden" id="page-modules" value="Order Operasi">
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
						<th class="center">No</th>
						<th class="center">Waktu Mulai</th>
						<th class="center">Waktu Selesai</th>
						<th class="left">Ruang</th>
						<th class="left">No. RM</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Asal Pasien</th>
						<th class="left">Tindak Lanjut Asal</th>
						<th class="left">Nama Operasi</th>
						<th class="center">Klasifikasi</th>
						<th class="center">Timing</th>
						<th class="center">Status</th>
						<th class="center"></th>
						<th class="center"></th>
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

<?php $this->load->view('operasi/js') ?>
<?php $this->load->view('operasi/modal') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form'); ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<!-- ?php $this->load->view('operasi/modal_laporan_operasi') ? -->
<!-- ?php $this->load->view('pelayanan/keperawatan_form/modal_entri_keperawatan') ? -->
<!-- ?php $this->load->view('operasi/form_operasi/modal_form_operasi') ? -->

<!-- RS CLOUD -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>

<!-- ERM -->
<?php $this->load->view('form_rekam_medis/modal_list_form') ?>
<?php $this->load->view('form_rekam_medis/modal_tambah_form') ?>
<?php $this->load->view('form_rekam_medis/js') ?>

<div id="load-view-formulir"></div>