<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-8">
						<?= form_dropdown('jenis_laporan', $jenis_laporan, array(), 'name="jenis_laporan" class="form-control form-control-sm mr-1" style="width:100%" id=jenis-laporan') ?>
					</div>
					<div class="col-lg-4 d-flex justify-content-end">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Pencarian', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
					</div>
				</div>
			</div>

			<div class="card-body lap-01">
				<div class="center">
					<h5 id style="text-transform: uppercase;"><b>LAPORAN KASIR</b></h5>
					<p id="jenis-periode-01">Periode : </p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-01" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center">No.</th>
								<th class="center">Tanggal Masuk</th>
								<th class="center">Tanggal Keluar</th>
								<th class="center">Nomor RM</th>
								<th class="left">Nama Pasien</th>
								<th class="center">Layanan</th>
								<th class="center">Cara Bayar</th>
								<th class="center">Tagihan</th>
								<th class="left">Nama Dokter</th>
								<th class="center">Status Pembayaran</th>
								<th class="center">Status</th>
								<th class="center">Action</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;">
						</tbody>
						<!-- <tfoot style="overflow:scroll;"></tfoot> -->
					</table>
				</div>
				<div class="row lap-01 m-t-10">
					<div class="col">
						<div class="float-left pagination"></div>
						<div class="float-right text-sm summary"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-02">
				<div class="center">
					<h5 style="text-transform: uppercase;"><b>LAPORAN TARIF BERDASARKAN DIAGNOSA</b></h5>
					<p id="jenis-periode-02">Periode : </p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-02" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center">No.</th>
								<th class="center">No. RM</th>
								<th class="left">Nama Pasien</th>
								<th class="left">Diagnosa Awal Masuk</th>
								<th class="left">Diagnosa Akhir</th>
								<th class="center">Lama Rawat</th>
								<th class="center">Ruang Rawat</th>
								<th class="center">Tindakan Operasi</th>
								<th class="center">Kelas</th>
								<th class="center">Total Biling</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;">
						</tbody>
						<!-- <tfoot style="overflow:scroll;"></tfoot> -->
					</table>
				</div>
				<div class="row lap-02 m-t-10">
					<div class="col">
						<div class="float-left pagination"></div>
						<div class="float-right text-sm summary"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-03">
				<div class="center">
					<h5 id style="text-transform: uppercase;"><b>LAPORAN KASIR (REKAPITULASI)</b></h5>
					<p id="jenis-periode-03">Periode : </p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-03" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center">No.</th>
								<th class="center">Tanggal Masuk</th>
								<th class="center">Tanggal Keluar</th>
								<th class="center">Nomor RM</th>
								<th class="left">Nama Pasien</th>
								<th class="center">Layanan</th>
								<th class="center">Cara Bayar</th>
								<th class="center">Tagihan</th>
								<th class="center">Obat</th>
								<th class="center">Tindakan</th>
								<th class="left">Nama Dokter</th>
								<th class="center">Status Pembayaran</th>
								<th class="center">Status</th>
								<th class="center">Action</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;">
						</tbody>
						<!-- <tfoot style="overflow:scroll;"></tfoot> -->
					</table>
				</div>
				<div class="row lap-03 m-t-10">
					<div class="col">
						<div class="float-left pagination"></div>
						<div class="float-right text-sm summary"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>