<!-- Modal list poli pasien -->
<div id="modal-list-poli" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-poli-label">List Poli Pasien <i class="fas fa-hospital"></i></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Pasien</th>
						<th>Poli</th>
						<th>Nama Dokter</th>
						<th>Status Antrian</th>
						<th>Status Keluar</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal list poli pasien -->

<div id="modal-batal-antrean" data-backdrop="static" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-batal-antrean-label">Status Batal Antrean</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-batal-antrean role=form class=form-horizontal') ?>
				<input type="hidden" name="page_batal" id="page-batal">
				<input type="hidden" name="id_batal" id="id-batal">
				<input type="hidden" name="tanggal_kunjungan_batal" id="tanggal-kunjungan-batal">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Keterangan Batal:</label>
							<div class="col">
								<textarea name="keterangan_batal" id="keterangan-batal" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>


				<?= form_close() ?>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="simpan-batal-antrean"><i class="fas fa-plus-circle"></i> Simpan</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--Modal Call Antrean-->
<div id="modal-call-antrean" data-backdrop="static" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-call-antrean-label">Call Antrean</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-call-antrean role=form class=form-horizontal') ?>
				<input type="hidden" name="page_call" id="page-call">
				<input type="hidden" name="tanggal_panggil" id="tanggal-panggil">
				<input type="hidden" name="kode_pangggil_poli" id="kode-pangggil-poli">
				<input type="hidden" name="id_antrean" id="id-antrean">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Nomor Antrean:</label>
							<div class="col">
								<input type="text" name="nomor_antrean" class="form-control" id="nomor-antrean" readonly>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Call:</label>
							<div class="col">
								<input type="text" name="call_antrean" class="form-control" id="call-antrean" readonly>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-3 col-form-label">Loket:</label>
							<div class="col">
								<select name="loket_antrean" id="loket-antrean" class="custom-select">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>
						</div>
					</div>
				</div>


				<?= form_close() ?>
			</div>
			<div class="modal-footer" id="tipe-panggil">

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--End Modal Call Antrean-->

<!--Modal Detail Waktu-->
<div id="modal-detail-waktu" data-backdrop="static" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-detail-waktu-label">Detail Waktu</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div style="display: grid; grid-template-columns: auto auto">
					<span>Durasi Tunggu Pasien</span>
					<span id="detail-waktu-tunggu">: <b></b></span>

					<span>Durasi Pasien Dilayani</span>
					<span id="detail-waktu-dilayani">: <b></b></span>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--End Modal Detail Waktu-->

<!--Modal Detail Waktu-->
<div id="modal-list-resep" data-backdrop="static" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-list-resep-label">List Resep</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th>No</th>
							<th>Status Cetak</th>
							<th>Tanggal Resep</th>
							<th>Waktu Diserahkan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--End Modal Detail Waktu-->
