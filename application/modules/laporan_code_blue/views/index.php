<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Pencarian', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
					</div>
				</div>
			</div>

			<div class="card-body lap-code-blue">
				<div class="center">
					<h5 style="text-transform: uppercase;"><b>REKAP LAPORAN CODE BLUE</b></h5>
					<p id="jenis-periode-cb">Periode : </p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-code-blue" style="border-collapse: separate;" class="table-freeze table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center" rowspan="2">No.</th>
								<th class="left" rowspan="2">Nama Pasien</th>
								<th class="center" rowspan="2">Nomor RM</th>
								<th class="center" rowspan="2">Umur</th>
								<th class="center" rowspan="2">Jenis Kelamin</th>
								<th class="center" rowspan="2">Respon Awal</th>
								<th class="center" colspan="2">Mulai Penanganan</th>
								<th class="center" rowspan="2">Area Kejadian</th>
								<th class="center" rowspan="2">Code Blue Zonasi</th>
								<th class="center" rowspan="2">Kriteria Aktivasi Code Blue</th>
								<th class="center" rowspan="2">Kriteria Kegawatan Medis</th>
								<th class="center" colspan="8">Primary Management : Assesment Awal dan Resusitasi</th>
								<th class="center" colspan="5">Tanda Vital</th>
								<th class="center" colspan="4">Secondary Management</th>
								<th class="center" colspan="3">Lembar Monitoring dan Terapi</th>
								<th class="center" rowspan="2">Keterangan</th>
								<th class="center" rowspan="2">Leader Tim Code Blue</th>
							</tr>
							<tr>
								<th class="center">Jam</th>
								<th class="center">Respon time Tim Code Blue</th>
								<th class="center">Respon Awal</th>
								<th class="center">Assesment Jalan Napas</th>
								<th class="center">Resusitasi</th>
								<th class="center">Assesment Pernapasan</th>
								<th class="center">Resusitasi</th>
								<th class="center">Assesment Sirkulasi</th>
								<th class="center">Resusitasi</th>
								<th class="center">Assesment Disabilitas</th>
								<th class="center">Tekanan Darah</th>
								<th class="center">Frekuensi Nadi</th>
								<th class="center">Frekuensi Napas</th>
								<th class="center">Suhu</th>
								<th class="center">SpO2</th>
								<th class="center">Anamnesa</th>
								<th class="center">Alergi</th>
								<th class="center">Pemeriksaan Penunjang</th>
								<th class="center">Diagnosis Kerja</th>
								<th class="center">Tanggal dan Jam</th>
								<th class="center">Terapi, Monitoring dan Evaluasi</th>
								<th class="center">Kriteria Pasca Resusitasi</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;">
						</tbody>
						<!-- <tfoot style="overflow:scroll;"></tfoot> -->
					</table>
				</div>
				<div class="row lap-kasir m-t-10">
					<div class="col">
						<div id="pagination" class="float-left"></div>
						<div id="summary" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>