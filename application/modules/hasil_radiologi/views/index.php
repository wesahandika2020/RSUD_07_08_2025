<input type="hidden" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<span class="m-t-5 m-r-5">Status Hasil :</span>
						<?= form_dropdown('status_hasil', ['' => 'Semua', 'sudah' => 'Sudah', 'belum' => 'Belum'], array(''), 'class="form-control-sm col-lg-3 mr-3" id=status-hasil') ?>
						<?= form_dropdown('jenis_radiologi', $jenis_radiologi, array(), 'class="form-control form-control-sm col-lg-4" id=jenis-radiologi') ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!-- <div class="table-responsive"> -->
				<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
					<tr>
						<th class="center">No</th>
						<th class="center">No. Register</th>
						<th class="center">No. Radiologi</th>
						<th>Waktu Konfirmasi</th>
						<th>No RM</th>
						<th>Nama Pasien</th>
						<th>Dokter P. Jawab</th>
						<th>Layanan</th>
						<th>Dokter Radiologi</th>
						<th>Jenis</th>
						<th>Waktu Hasil</th>
						<th>Status</th>
						<th></th>
					</tr>
					</thead>
					<tbody></tbody>
				</table>
				<!-- </div> -->
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
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('pelayanan/expertise_form/modal_expertise.php') ?>
<?php $this->load->view('pelayanan/item_radiologi_form/modal_item_radiologi.php') ?>
<?php $this->load->view('pelayanan/echo_form/modal_echo.php') ?>
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>
