<!-- <input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="page-now-layanan-pasien" id="page-now-layanan-pasien">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" id="page-modules" value="Casemix"> -->
<input type="hidden" name="page_now_lap" id="page-now-lap">
<input type="hidden" name="page_now_bydate" id="page-now-bydate">
<!-- <div class="row">
	<div class="col-lg-12">
		<div class="card"> -->
<div class="card-header pattern">
	<div class="row">
		<div class="col-lg-6">

		</div>
		<div class="col-lg-6 d-flex justify-content-end">
			<button id="btn-filter-laporan" type="button" class="btn btn-primary"><i class="fas fa-filter mr-1"></i>Filter Laporan</button>
		</div>
	</div>
</div>
<div>
	<div style="text-align:center;font-style:italic;background-color:#ffffdd;">
		Data yang ditampilkan di laporan adalah data klaim final dengan status
		<span style="font-weight:bold;color:blue;">Terkirim</span> ke Pusat Data Kementerian Kesehatan
	</div>
</div>
<div class="card-body" style="padding-left: 0px; padding-right: 0px; display: none;" id="table-data-laporan">
	<div class="card-header pattern">
		<div class="row">
			<div class="col-lg-6 d-flex">
				<div id="label-julah-hasil-laporan" class="mr-2 bold" style="display: flex; align-items: center;"></div>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<div class="mr-2 bold" style="display: flex; align-items: center;">Pilih :</div>
				<div class="col-md-4">
					<select class="form-control-sm" name="jenis_download" id="jenis_download">
						<!-- <option value="berkas-pdf">Berkas Klaim PDF</option> -->
						<option value="rekap-pdf">Rekap Klaim PDF</option>
						<option value="rekap-xlsx">Rekap Klaim XLSX</option>
					</select>
				</div>
				<button id="btn-download-laporan" type="button" class="btn btn-primary"><i class="fas fa-download mr-1"></i>Download</button>
			</div>
		</div>
	</div>
	<table id="table-laporan-terkirim" class="table table-hover table-striped table-sm color-table primary-table">
		<thead>
			<tr>
				<th rowspan="2" class="center">No.</th>
				<!-- <th rowspan="2" class="center">No. Register</th> -->
				<th rowspan="2" class="center">Tanggal Masuk</th>
				<th rowspan="2" class="center">Tanggal Pulang</th>
				<th rowspan="2" class="center">No. SEP</th>
				<th rowspan="2" class="center">Pasien</th>
				<th colspan="2" class="center">INACBG</th>
				<th rowspan="2" class="center">Billing RS</th>
				<th rowspan="2" class="center">Rawat</th>
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
			<div id="pagination-lap" class="float-left"></div>
			<div id="summary-lap" class="float-right text-sm"></div>
		</div>
	</div>
</div>
<!-- </div>
	</div>
</div> -->

<?php $this->load->view('laporan-terkirim/js') ?>
<?php $this->load->view('laporan-terkirim/modal') ?>