<input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="page-now-layanan-pasien" id="page-now-layanan-pasien">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" id="page-modules" value="Casemix">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'class="form-control form-control-sm mr-1" style="width:30%" id=jenis-layanan') ?>
						<input type="text" name="keyword" id="keyword-search" class="form-control form-control-sm" style="width:30%" placeholder="Nama / No. RM...">
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th width="3%" class="center">No.</th>
							<th width="5%" class="center">No. Register</th>
							<th width="9%" class="center">Tanggal Daftar</th>
							<th width="9%" class="center">Tanggal Keluar</th>
							<th width="5%" class="center">No. RM</th>
							<th width="15%" class="left">Nama</th>
							<th width="11%" class="center">Layanan</th>
							<th id="th-asal-kunjungan" width="10%" class="center">Asal Kunjungan</th>
							<th width="15%" class="left">Dokter</th>
							<th width="10%" class="center">Cara Bayar</th>
							<th width="15%" class="center">Status</th>
							<th width="15%" class="center">Status Keluar</th>
							<th width="3%" class="right"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
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
<?php $this->load->view('pasien/riwayat/modal_riwayat'); ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('modal_eclaim'); ?>

<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>

<!-- ERM -->
<?php $this->load->view('form_rekam_medis/modal_list_form') ?>
<?php $this->load->view('form_rekam_medis/modal_tambah_form') ?>
<?php $this->load->view('form_rekam_medis/js') ?>

<div id="load-view-formulir"></div>
<!-- ?php $this->load->view('pasien/riwayat/js'); ?	 -->