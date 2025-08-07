<input type="hidden" name="page_now" id="page-now">
<?php if ($this->session->userdata('account_group') !== "APM FARMASI") : ?>
	<div class="row" id="warp-antrian-farmasi">
		<div class="col-12">
			<div class="card">
				<div class="card-header pattern">
					<div class="row">
						<div class="col-lg-6">
						</div>
						<div class="col-lg-6 d-flex justify-content-end">
							<button name="export" type="button" id="btn-export" class="btn btn-success waves-effect mr-1"><i class="fas fa-download mr-1"></i>Export Data</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col d-flex justify-content-start justify-content-between">
							<div class="col-lg-4 mr-3 row">
								<input type="number" class="form-control col" id="no-rm" placeholder="Nomor Rekam Medis" autofocus>
								<button type="button" class="btn btn-info waves-effect mr-1" id="btn-add-antrian"><i class="fas fa-plus-circle mr-1"></i> Tambah Antrian</button>
							</div>
							<div class="col-lg-5 d-flex justify-content-end" style="gap: .5rem; align-items: center">
								<span class="m-t-5 m-r-5">Status Penyerahan Resep :</span>
								<select name="status_resep" id="status-resep" class="form-control-sm col-lg-3 mr-3">
									<option value="0">Belum</option>
									<option value="1">Sudah</option>
								</select>
								<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
								<?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>
								<input type="hidden" name="estimasi" id="estimasi-antrian">
							</div>
						</div>
					</div>

					<!-- <div class="table-responsive"> -->
					<table id="table-antrian-online" class="table table-hover table-striped table-sm color-table info-table m-t-5">
						<h4 class="modal-title float-right" id="tanggal-antrian-label"></h4>
						<h4 class="modal-title center"><i class="fas fa-tablets"></i></h4>
						<thead>
							<tr>
								<th class="center">No.</th>
								<th class="center">No.Rm</th>
								<th class="center">No Antrean</th>
								<th class="center">Nama Pasien</th>
								<th class="center">Nama Poli</th>
								<th class="left">Dokter</th>
								<th class="center">Status Antrean</th>
								<th class="center">Status Panggil</th>
								<th class="center">Waktu Panggil</th>
								<th class="center">Loket</th>
								<th class="center">Status Cetak</th>
								<th class="center">Waktu Hadir</th>
								<th class="center">Waktu Penyerahan</th>
								<th class="left"></th>
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
<?php else : ?>
	<div class="row" id="warp-antrian-farmasi">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col d-flex justify-content-end">
							<div class="col-lg-4 mr-3 row">
								<input type="number" class="form-control col" id="no-rm" placeholder="Nomor Rekam Medis" autofocus>
								<button type="button" class="btn btn-info waves-effect mr-1" id="btn-add-antrian"><i class="fas fa-plus-circle mr-1"></i> Tambah Antrian</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php $this->load->view('modal_search'); ?>
<?php $this->load->view('modal'); ?>
<?php $this->load->view('modal_resep_tebus'); ?>
<?php $this->load->view('modal_hisotry_cetak_copy_resep'); ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat'); ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('js_antrian_farmasi'); ?>
