<input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="page-now-layanan-pasien" id="page-now-layanan-pasien">
<input type="hidden" name="page-now-soap" id="page-now-soap">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<div class="row">
	<div class="col-lg-12">
		<div class="card shadow-sm">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data-kunjungan-pasien" class="table table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th colspan="12" class="center" style="background-color:#038fcd">DATA KUNJUNGAN PASIEN
								</th>
							</tr>
							<tr>
								<th width="5%" class="center">No</th>
								<th width="15%" class="center">Tanggal Kunjungan</th>
								<th width="5%" class="center">No. RM</th>
								<th width="15%" class="center">Nama</th>
								<th width="15%" class="center">Penjamin</th>
								<th width="15%" class="center">Jenis Pendaftaran</th>
								<th width="15%" class="center">Tanggal Pulang</th>
								<th width="10%" class="center">Status Koding</th>
								<th width="5%" class="center">Koding Diagnosa</th>
								<th width="5%" class="center">Koding Tindakan</th>
								<th width="5%" class="center"></th>
								<th width="5%" class="center"></th>

							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col">
						<div id="paginationKunjunganPasien" class="float-left"></div>
						<div id="summaryKunjunganPasien" class="float-right text-sm"></div>
					</div>
				</div>
				<div class="col">
					<h6 class="m-t-5">
						<span class="label label-info" id="jml-pasien-baru"></span>&nbsp; Beberapa data pelayanan
						terhadap pasien belum di coding <br>
						<span class="label label-success" id="jml-pasien-baru"></span>&nbsp; Semua data pelayanan
						terhadap pasien telah di coding <br>
						<span class="label label-danger" id="jml-pasien-baru"></span>&nbsp; Semua data pelayanan
						terhadap pasien belum di coding
					</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card shadow-sm">
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data-pelayanan-pasien" class="table table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th colspan="14" class="center" style="background-color:#038fcd">DATA PELAYANAN PASIEN
								</th>
							</tr>
							<tr>
								<th width="5%" class="center">No</th>
								<th width="8%" class="center">Tanggal Pelayanan</th>
								<th width="5%" class="center">No. RM</th>
								<th width="15%" class="center">Nama</th>
								<th width="15%" class="center">Tempat Layanan</th>
								<th width="15%" class="center">Dokter</th>
								<th width="10%" class="center">Asal Kunjungan</th>
								<th width="10%" class="center">Status Dilayani</th>
								<th width="10%" class="center">Tindak Lanjut</th>
								<th width="10%" class="center">Status Koding</th>
								<th width="5%" class="center">Koding Diagnosa</th>
								<th width="5%" class="center">Koding Tindakan</th>
								<th width="5%" class="center"></th>
								<th width="5%" class="center"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col">
						<div id="paginationLayananPasien" class="float-left"></div>
						<div id="summaryLayananPasien" class="float-right text-sm"></div>
					</div>
				</div>
				<div class="col">
					<h6 class="m-t-5">
						<span class="label label-success" id="jml-pasien-baru"></span>&nbsp; Pelayanan telah di coding
						<br>
						<span class="label label-danger" id="jml-pasien-baru"></span>&nbsp; Pelayanan belum di coding
					</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="vtabs customvtab" id="tabs-pengkodean">
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$this->load->view('js');
$this->load->view('modal_search');
$this->load->view('modal_pengkodean');
$this->load->view('modal_eclaim');
$this->load->view('modal_add_diagnosa');
$this->load->view('modal_edit_jenis_kasus');
$this->load->view('modal_coding_tindakan');
$this->load->view('modal_coding_diagnosa');
$this->load->view('pasien/riwayat/modal_riwayat');
$this->load->view('modal_input_no_bpjs');
$this->load->view('pasien/rekam_medis/modal_rekam_medis');
// $this->load->view('pendaftaran_poli/js');	

?>