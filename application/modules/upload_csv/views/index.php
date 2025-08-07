<input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="page-now-layanan-pasien" id="page-now-layanan-pasien">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<input type="hidden" name="page_now" id="page-now">
<!-- <input type="hidden" id="page-modules" value="Casemix"> -->
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
						<?= form_dropdown('jenis_data_search', $jenis_data, array(), 'class="form-control form-control-sm mr-1" style="width:40%" id=jenis-data-search') ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<?= form_open_multipart('', 'id=form-upload-csv role=form class=form-horizontal') ?>
				<div class="form-group">
					<div class="form-group row">
						<label for="jenis-data" class="col-sm-2 col-form-label">Jenis Data File</label>
						<div class="col-sm-10">
							<?= form_dropdown('jenis_data', $jenis_data, array(), 'class="form-control form-control-sm mr-1" style="width:30%" id=jenis-data') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="csv-file" class="col-sm-2 col-form-label">File CSV</label>
						<div class="col-sm-3">
							<input type="file" class="form-control" id="csv-file" name="csv_file" accept=".csv">
						</div>
					</div>
				</div>
				<?= form_close() ?>
				<div class="form-group">
					<button type="button" class="btn btn-info waves-effect" id="simpan-upload"><i class="fas fa-upload mr-1"></i>Upload</button>

				</div>

				<table id="table-data-tarif-inacbg" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Discharge Date</th>
							<th class="center">INACBG</th>
							<th class="center">Deskripsi INACBG</th>
							<th class="center">No. SEP</th>
							<th class="center">Nama Pasien</th>
							<th class="center">DPJP</th>
							<th class="center">Tarif RS</th>
							<th class="center">Total Tarif</th>
						</tr>
					</thead>
					<tbody></tbody>
					<table id="table-data-tarif-pending" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th class="center" width="3%">No.</th>
								<th class="center" width="7%">Tanggal SEP</th>
								<th class="center" width="7%">Tanggal Pulang</th>
								<th class="center" width="10%">No. SEP</th>
								<th class="center" width="18%">Nama Pasien</th>
								<th class="center" width="5%">Jenis Pelayanan</th>
								<th class="center" width="10%">Jenis Pending</th>
								<th class="center" width="25%">Keterangan Pending</th>
								<th class="right" width="15%">Total Tarif</th>
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