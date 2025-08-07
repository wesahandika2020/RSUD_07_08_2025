<input type="hidden" name="page_now" id="page-now">
<div class="row" id="warp-list-booking">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col d-flex justify-content-start justify-content-between">
						<div class="col-lg-4 mr-3 row">
							<!--							<input type="number" class="form-control col" id="no-rm" placeholder="Nomor Rekam Medis" autofocus>-->
							<!--							<button type="button" class="btn btn-info waves-effect mr-1" id="btn-add-antrian"><i class="fas fa-plus-circle mr-1"></i> Tambah Antrian</button>-->
						</div>
						<div>
							<?= form_dropdown('shift', [
								'' => 'All',
								'Pagi' => 'Pagi',
								'Sore' => 'Sore',
							], array(), 'class="custom-select reset-select" style="width:150px" id=shift-poli') ?>
							<?= form_dropdown('lokasi', [
								'APM' => 'APM',
								'mobile' => 'Mobile',
								'WA' => 'WhatsApp',
								'rsud' => 'Onsite'
							], array(), 'class="custom-select reset-select" style="width:150px" id=lokasi-data') ?>
							<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
							<?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>
							<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
							<input type="hidden" name="estimasi" id="estimasi-antrian">
						</div>
					</div>
				</div>

				<!-- <div class="table-responsive"> -->
				<table id="table-list-booking" class="table table-hover table-striped table-sm color-table info-table m-t-5">
					<thead>
					<tr>
						<th class="left">No.</th>
						<th class="left">Kode Booking</th>
						<th class="left">No Rm</th>
						<th class="left">No BPJS</th>
						<th class="left">No Referensi</th>
						<th class="left">Jenis Kunjungan</th>
						<th class="left">Pasca Ranap</th>
						<th class="left">Nama Pasien</th>
						<th class="left">Poli Tujuan</th>
						<th class="left">Dokter</th>
						<th class="center">Tanggal Booking / Kontrol</th>
						<th class="center">Penjamin</th>
						<th class="center">Status Booking</th>
						<th class="center">Status Layanan SIMRS</th>
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

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>
