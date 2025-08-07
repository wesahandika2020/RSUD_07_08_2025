<!-- <input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="page-now-layanan-pasien" id="page-now-layanan-pasien">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" id="page-modules" value="Casemix"> -->
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" name="page_now_bydate" id="page-now-bydate">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<button type="button" id="btn-home" onclick="backtoHome()" class="btn btn-outline-primary btn-rounded"><i class="fas fa-home"></i> Back to Home</button>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<div class="mr-2" style="display: flex; align-items: center;">Cari No. RM / No. SEP / Nama</div>
						<input type="text" id="keyword" class="form-control form-control" style="width:45%" placeholder="">
						<!-- <input type="text" id="keyword" value="00237563" class="form-control form-control" style="width:45%" placeholder=""> -->
						<input type="hidden" name="keyword" id="keyword-rm">
						<input type="hidden" name="keyword" id="keyword-rm">
						<!-- <div style="width:45%">
							<input type="text" name="keyword" id="keyword" class="select2c-input">
						</div> -->
						<?= form_button('search', '<i class="fas fa-calendar-alt" style="font-size: 15pt;"></i>', 'id=btn-search class="btn btn-primary waves-effect mr-1"') ?>
						<div id="dropdownResult" class="dropdown-menu"></div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div id="label-by-name"></div>
				<table id="table-by-name" class="table table-hover table-striped table-sm color-table primary-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">No. Register</th>
							<th class="center">Tanggal Masuk</th>
							<th class="center">Tanggal Pulang</th>
							<th class="left">Jaminan</th>
							<th class="left">No. SEP</th>
							<th class="left">Tipe</th>
							<th class="left">CBG</th>
							<th class="left">Status</th>
							<th class="left">Petugas</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>

				<table id="table-by-date" class="table table-hover table-striped table-sm color-table primary-table">
					<thead>
						<tr>
							<th rowspan="2" class="center">No.</th>
							<th rowspan="2" class="center">No. Register</th>
							<th rowspan="2" class="center">Tanggal Masuk</th>
							<th rowspan="2" class="center">Tanggal Pulang</th>
							<th rowspan="2" class="center">No. SEP</th>
							<th rowspan="2" class="center">Pasien</th>
							<th colspan="2" class="center">INACBG</th>
							<th rowspan="2" class="center">Billing RS</th>
							<th rowspan="2" class="center">Rawat</th>
							<th rowspan="2" class="center">Status Klaim</th>
							<th rowspan="2" class="center">Petugas</th>
						</tr>
						<tr>
							<th class="center">Kode</th>
							<th class="center">[?] Tarif Total</th>
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

<?php $this->load->view('coding-grouping/js') ?>
<?php $this->load->view('coding-grouping/modal') ?>
<?php $this->load->view('coding-grouping/modal_eklaim') ?>