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
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Kriteria Laporan', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
				</div>
			</div>
			<div class="card-body lap-rajal">
				<div id=jenis-periode></div>
				<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Tanggal Kunjungan</th>
							<th class="center">No. RM</th>
							<th class="left">Nama</th>
							<th class="center">Penjamin</th>
							<th class="center">Unit Pelayanan</th>
							<th class="left">ICD X Diagnosa</th>
							<th class="center">Prioritas</th>
							<th class="left">Dokter</th>
							<th class="center">Diagnosa Akhir</th>
							<th class="center">Jenis Kasus</th>
							<th class="center">Status Kunjungan</th>
							<th class="center">L/P</th>
							<th class="center">Umur</th>
							<th class="center">Alamat</th>
							<th class="left">Kecamatan</th>
							<th class="center">Tanggal Selesai</th>
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

			<div class="card-body lap-ranap">
				<div id=jenis-periode-ranap></div>
				<table style="overflow-x: scroll;" id="table-data-ranap" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">No. RM</th>
							<th class="center">Kunjungan</th>
							<th class="left">Nama Pasien</th>
							<th class="left">Alamat</th>
							<th class="center">Kecamatan</th>
							<th class="center">Umur</th>
							<th class="center">L/P</th>
							<th class="center">Penjamin</th>
							<th class="center">Ruangan</th>
							<th class="center">Kelas</th>
							<th class="center">Asal Kunjungan</th>
							<th class="left">Dokter DPJP</th>
							<th class="center">Jenis IGD</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-ranap">
					<div class="col">
						<div id="pagination-ranap" class="float-left"></div>
						<div id="summary-ranap" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-03">
				<div id=jenis-periode-03></div>
				<table style="overflow-x: scroll;" id="table-data-03" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">No. RM</th>
							<th class="center">Kunjungan</th>
							<th class="left">Nama Pasien</th>
							<th class="left">Alamat</th>
							<th class="center">Kecamatan</th>
							<th class="center">Umur</th>
							<th class="center">L/P</th>
							<th class="center">Penjamin</th>
							<th class="center">Kelas</th>
							<th class="center">Ruangan</th>
							<th class="center">Tanggal Masuk</th>
							<th class="center">Status Keluar</th>
							<th class="center">Pindah Ruang</th>
							<th class="left">Diagnosa</th>
							<th class="left">Dokter DPJP</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-03">
					<div class="col">
						<div id="pagination-03" class="float-left"></div>
						<div id="summary-03" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-04">
				<div id=jenis-periode-04></div>
				<table style="overflow-x: scroll;" id="table-data-04" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">No. RM</th>
							<th class="center">Kunjungan</th>
							<th class="left">Nama Pasien</th>
							<th class="left">Alamat</th>
							<th class="center">Umur</th>
							<th class="center">L/P</th>
							<th class="left">Diagnosa</th>
							<th class="center">Tanggal Masuk</th>
							<th class="center">Penjamin</th>
							<th class="center">Kelas</th>
							<th class="center">Asal Kunjungan</th>
							<th class="left">Dokter DPJP</th>
							<th class="center">Ruangan</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-04">
					<div class="col">
						<div id="pagination-04" class="float-left"></div>
						<div id="summary-04" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-05">
				<div id=jenis-periode-05></div>
				<div id="tabs-lap05" class="hide">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation" style="width: 50%">
							<button class="nav-link active" id="laporan-wabah-tab" data-toggle="tab" data-target="#laporan-wabah" type="button" role="tab" aria-controls="laporan-wabah" aria-selected="true" style="width: 100%"><b>Laporan Wabah</b></button>
						</li>
						<li class="nav-item" role="presentation" style="width: 50%">
							<button class="nav-link" id="daftar-verifikasi-diagnosis-pasien-tab" data-toggle="tab" data-target="#daftar-verifikasi-diagnosis-pasien" type="button" role="tab" aria-controls="daftar-verifikasi-diagnosis-pasien" aria-selected="false" style="width: 100%"><b>Daftar Verifikasi Diagnosis Pasien</b></button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="laporan-wabah" role="tabpanel" aria-labelledby="laporan-wabah-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-lw-05" class="table table-hover table-sm color-table info-table">
									<thead>
										<tr>
											<th rowspan="3" class="center">no</th>
											<th rowspan="3" class="center">kecamatan</th>
											<th colspan="4" class="center">diare</th>
											<th colspan="2" rowspan="2" class="center">dbd</th>
											<th colspan="4" class="center">Campak</th>
											<th colspan="4" class="center">Peunomia</th>
											<th colspan="2" rowspan="2" class="center">Gizi Buruk</th>
											<th colspan="2" rowspan="2" class="center">TB Positif</th>
											<th rowspan="3" class="center">ILI</th>
										</tr>
										<tr>
											<th colspan="2" class="center">&lt;5th</th>
											<th colspan="2" class="center">&gt;5th</th>
											<th colspan="2" class="center">&lt;5th</th>
											<th colspan="2" class="center">&gt;5th</th>
											<th colspan="2" class="center">&lt;5th</th>
											<th colspan="2" class="center">&gt;5th</th>
										</tr>
										<tr>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
											<th class="center">P</th>
											<th class="center">M</th>
										</tr>
										<tr>
											<th class="center">1</th>
											<th class="center">2</th>
											<th class="center">3</th>
											<th class="center">4</th>
											<th class="center">5</th>
											<th class="center">6</th>
											<th class="center">7</th>
											<th class="center">8</th>
											<th class="center">9</th>
											<th class="center">10</th>
											<th class="center">11</th>
											<th class="center">12</th>
											<th class="center">13</th>
											<th class="center">14</th>
											<th class="center">15</th>
											<th class="center">16</th>
											<th class="center">17</th>
											<th class="center">18</th>
											<th class="center">19</th>
											<th class="center">20</th>
											<th class="center">21</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="daftar-verifikasi-diagnosis-pasien" role="tabpanel" aria-labelledby="daftar-verifikasi-diagnosis-pasien-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-dvdp-05" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center">No.</th>
											<th class="center">Tanggal Kunjungan</th>
											<th class="center">No. RM</th>
											<th class="left">Nama</th>
											<th class="center">Penjamin</th>
											<th class="left">ICD X Diagnosa</th>
											<th class="left">Dokter DPJP</th>
											<th class="center">Kunjungan</th>
											<th class="center">L/P</th>
											<th class="center">Umur</th>
											<th class="center">Alamat</th>
											<th class="left">Kecamatan</th>
											<th class="center">Tanggal Keluar</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
								<div class="row lap-05">
									<div class="col">
										<div id="pagination-05" class="float-left"></div>
										<div id="summary-05" class="float-right text-sm"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-body lap-06">
				<div id=jenis-periode-06></div>
				<div id="tabs-lap06" class="hide">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation" style="width: 33.33333333333333%">
							<button class="nav-link active" id="unit-pelayanan-tab" data-toggle="tab" data-target="#unit-pelayanan" type="button" role="tab" aria-controls="unit-pelayanan" aria-selected="true" style="width: 100%"><b>Per Unit Pelayanan</b></button>
						</li>
						<li class="nav-item" role="presentation" style="width: 33.33333333333333%">
							<button class="nav-link" id="per-wilayah-tab" data-toggle="tab" data-target="#per-wilayah" type="button" role="tab" aria-controls="per-wilayah" aria-selected="false" style="width: 100%"><b>Per Wilayah</b></button>
						</li>
						<li class="nav-item" role="presentation" style="width: 33.33333333333333%">
							<button class="nav-link" id="per-dokter-tab" data-toggle="tab" data-target="#per-dokter" type="button" role="tab" aria-controls="per-dokter" aria-selected="false" style="width: 100%"><b>Per Dokter</b></button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="unit-pelayanan" role="tabpanel" aria-labelledby="unit-pelayanan-tab">
							Unit: <b id="unit-penjamin"></b>
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-up-06" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center">No.</th>
											<th>Jaminan</th>
											<th class="center lap-06-head-month"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade show" id="per-wilayah" role="tabpanel" aria-labelledby="per-wilayah-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-wilayah-06" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center">No.</th>
											<th class="center">Kecamatan</th>
											<th class="center lap-06-head-month"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="per-dokter" role="tabpanel" aria-labelledby="per-dokter-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-pd-06" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center" rowspan="2">No.</th>
											<th class="center" rowspan="2">Nama Dokter</th>
											<th class="center lap-06-head-month" colspan="16"></th>
											<th class="center" rowspan="2">Grand Total</th>
										</tr>
										<tr>
											<th class="center">BPJS</th>
											<th class="center">BPJS Ketenagakerjaan</th>
											<th class="center">Umum</th>
											<th class="center">Jaminan Covid Kemenkes</th>
											<th class="center">JPKMKT</th>
											<th class="center">Jasa Raharja</th>
											<th class="center">Taspen</th>
											<th class="center">DP3AP2KB</th>
											<th class="center">Global Fund</th>
											<th class="center">Keluarga Karyawan</th>
											<th class="center">Gratis</th>
											<th class="center">Charity Rumah Sakit</th>
											<th class="center">Penunggu Pasien</th>
											<th class="center">Jamkesmas</th>
											<th class="center">RS BUNDA SEJATI</th>
											<th class="center">Jaminan Kesehatan RSUD</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
								<div class="row lap-06">
									<div class="col">
										<div id="pagination-06-dokter" class="float-left"></div>
										<div id="summary-06-dokter" class="float-right text-sm"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-body lap-07">
				<div id=jenis-periode-07></div>
				<div id="tabs-lap07" class="hide">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation" style="width: 50%">
							<button class="nav-link active" id="spesialistik-tab" data-toggle="tab" data-target="#spesialistik" type="button" role="tab" aria-controls="spesialistik" aria-selected="true" style="width: 100%"><b>Per Spesialistik</b></button>
						</li>
						<li class="nav-item" role="presentation" style="width: 50%">
							<button class="nav-link" id="per-dokter-07-tab" data-toggle="tab" data-target="#per-dokter-07" type="button" role="tab" aria-controls="per-dokter-07" aria-selected="false" style="width: 100%"><b>Per Dokter</b></button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="spesialistik" role="tabpanel" aria-labelledby="spesialistik-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-spesialistik-07" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center">No.</th>
											<th class="center">Kunjungan Spesialisasi</th>
											<th class="center lap-07-head-month"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="per-dokter-07" role="tabpanel" aria-labelledby="per-dokter-07-tab">
							<div style="margin-top:1rem">
								<table style="overflow-x: scroll;" id="table-data-pd-07" class="table table-hover table-striped table-sm color-table info-table">
									<thead>
										<tr>
											<th class="center" rowspan="2">No.</th>
											<th class="center" rowspan="2">Produktifitas Dokter</th>
											<th class="center lap-07-head-month"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
								<div class="row lap-07">
									<div class="col">
										<div id="pagination-07" class="float-left"></div>
										<div id="summary-07" class="float-right text-sm"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-body lap-08">
				<div id=jenis-periode-08></div>
				<table style="overflow-x: scroll;" id="table-data-08" class="table table-hover table-striped table-sm color-table info-table">

				</table>
			</div>

			<div class="card-body lap-09">
				<div id=jenis-periode-09></div>
				<table style="overflow-x: scroll;" id="table-data-09" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Kode ICD</th>
							<th class="center">Diagnosa</th>
							<th class="center">Jumlah Kasus</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

			<div class="card-body lap-10">
				<div id=jenis-periode-10></div>
				<table style="overflow-x: scroll;" id="table-data-10" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Jamminan</th>
							<th class="center lap-10-head-month"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

			<div class="card-body lap-11">
				<div id=jenis-periode-11></div>
				<table style="overflow-x: scroll;" id="table-data-11" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Tanggal Daftar</th>
							<th class="center">Tanggal Keluar</th>
							<th class="center">No. RM</th>
							<th class="left">Nama Pasien</th>
							<th class="center">Kelamin</th>
							<th class="center">Umur</th>
							<th class="center">Status Kunjungan</th>
							<th class="left">Alamat</th>
							<th class="center">Kecamatan</th>
							<th class="left">Unit / Poliklinik</th>
							<th class="left">Diagnosa</th>
							<th class="left">Nama Coder</th>
							<th class="left">Dokter DPJP</th>
							<th class="center">Penjamin</th>
							<th class="center">Status Keluar</th>
							<th class="left">Tujuan Rujukan</th>
							<th class="left">Keterangan</th>
							<!-- <th class="center lap-11-head-month"></th> -->
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-11">
					<div class="col">
						<div id="pagination-11" class="float-left"></div>
						<div id="summary-11" class="float-right text-sm"></div>
					</div>
				</div>
			</div>
			<div class="card-body lap-12">
				<div id=jenis-periode-12></div>
				<table style="overflow-x: scroll;" id="table-data-12" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Tanggal Kunjungan</th>
							<th class="center">No. RM</th>
							<th class="left">Nama Pasien</th>
							<th class="left">Unit Pelayanan</th>
							<th class="left">ICD X Diagnosa</th>
							<th class="left">Dokter</th>
							<th class="left">Prioritas</th>
							<th class="center">Jenis Kasus</th>
							<th class="center">Status Kunjungan</th>
							<th class="center">JK</th>
							<th class="center">Umur</th>
							<th class="center">Penjamin</th>							
							<th class="left">Alamat</th>
							<th class="center">Kecamatan</th>
							<th class="center">Tanggal Selesai</th>
							<th class="center">Status Keluar</th>
							<!-- <th class="center lap-12-head-month"></th> -->
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-12">
					<div class="col">
						<div id="pagination-12" class="float-left"></div>
						<div id="summary-12" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-13">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Sistem Kewaspadaan Dini dan Respon (SKDR)</b><br><i>(Diagnosa Utama)</i></h5>
    			<div id=label-lap-13 class="left"></div>
				<table style="overflow-x: scroll;" id="table-data-13" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center">No.</th>	
							<th class="center">Kode Penyakit</th>
							<th class="center">penyakit</th>
							<th class="center">Jumlah Kasus</th>
							<th class="center">Jumlah Kematian</th>
							<th class="center">Jumlah Lab</th>
							<th></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="row lap-13">
					<div class="col">
						<div id="pagination-13" class="float-left"></div>
						<div id="summary-13" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

			<div class="card-body lap-14">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Jenis Peserta BPJS</b></h5>
    			<div id=label-lap-14 class="left"></div>
				<table style="overflow-x: scroll;" id="table-data-14" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="right">Bulan</th>	
							<th class="right">PBI</th>
							<th class="right">NON PBI</th>
							<th class="right">TIDAK DIKETAHUI</th>
							<th class="right">TOTAL</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<!-- <div class="row lap-14">
					<div class="col" hidden>
						<div id="pagination-14" class="float-left"></div>
						<div id="summary-14" class="float-right text-sm"></div>
					</div>
				</div> -->
			</div>
			
			<div class="card-body lap-15">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Formulir RL 3.5 Rekapitulasi Kunjungan</b></h5>
    			<div id=label-lap-15 class="left"></div>
				<table style="overflow-x: scroll;" id="table-data-15" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" rowspan="2">No</th>
							<th class="center" rowspan="2">Jenis Kegiatan</th>
							<th class="center" colspan="2">Kunjungan Pasien<br>Dalam Kab/Kota</th>
							<th class="center" colspan="2">Kunjungan Pasien<br>Luar Kab/Kota</th>
							<th class="center" colspan="2">Tidak Diketahui</th>
							<th class="center" rowspan="2">Total<br>Kunjungan</th>
						</tr>
						<tr>
							<th class="center">Laki-Laki</th>
							<th class="center">Perempuan</th>
							<th class="center">Laki-Laki</th>
							<th class="center">Perempuan</th>
							<th class="center">Laki-Laki</th>
							<th class="center">Perempuan</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="card-body lap-16">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Formulir RL 3.19 Rekapitulasi Cara Bayar</b></h5>
    			<div id=label-lap-16 class="left"></div>
				<table style="overflow-x: scroll;" id="table-data-16" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th class="center" rowspan="2">No</th>
							<th class="center" rowspan="2">Cara Bayar</th>
							<th class="center" colspan="2">Pasien Rawat Inap</th>
							<th class="center" rowspan="2">Jumlah Pasien Rawat Jalan</th>
							<th class="center" colspan="5">Pasien Rawat Jalan</th>
						</tr>
						<tr>
							<th class="center">Jumlah Pasien Keluar</th>
							<th class="center">Jumlah Lama Dirawat</th>
							<th class="center">IGD</th>
							<th class="center">Poliklinik</th>
							<th class="center">Laboratorium</th>
							<th class="center">Radiologi</th>
							<th class="center">Hemodialisa</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

			<div class="card-body lap-17">
				<div id=jenis-periode-17></div>
				<table style="overflow-x: scroll;" id="table-data-17" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th rowspan="3" class="center">No.</th>
							<th rowspan="3" class="center">Kode ICD</th>
							<th rowspan="3" class="center">Diagnosa</th>
							<th colspan="50" class="center">Jumlah Pasien Keluar Hidup dan Mati Menurut Kelompok Umur & Jenis Kelamin</th>
							<th colspan="3" rowspan="2" class="center">Jumlah Pasien Keluar Hidup</th>
							<th colspan="3" rowspan="2" class="center">Jumlah Pasien Keluar Mati</th>
						</tr>
						<tr>
							<th colspan="2">< 1 jam</th>
							<th colspan="2">1-23 jam</th>
							<th colspan="2">1-7 hr</th>
							<th colspan="2">8-14 hr</th>
							<th colspan="2">29-< 3 bln </th>
							<th colspan="2">3-< 6 bln</th>
							<th colspan="2">6 bln-< 11 bln</th>
							<th colspan="2">1-4 th</th>
							<th colspan="2">5-9 th</th>
							<th colspan="2">10-14 th</th>
							<th colspan="2">15-19 th</th>
							<th colspan="2">20-24 th</th>
							<th colspan="2">25-29 th</th>
							<th colspan="2">30-34 th</th>
							<th colspan="2">35-39 th</th>
							<th colspan="2">40-44 th</th>
							<th colspan="2">45-49 th</th>
							<th colspan="2">50-54 th</th>
							<th colspan="2">55-59 th</th>
							<th colspan="2">60-64 th</th>
							<th colspan="2">65-69 th</th>
							<th colspan="2">70-74 th</th>
							<th colspan="2">75-79 th</th>
							<th colspan="2">80-84 th</th>
							<th colspan="2">>85 th</th>
						</tr>
						<tr>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>
							<th>Total</th>
							<th>L</th>
							<th>P</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

			<div class="card-body lap-18">
				<div id=jenis-periode-18></div>
				<table style="overflow-x: scroll;" id="table-data-18" class="table table-hover table-striped table-sm color-table info-table">
					<thead>
						<tr>
							<th rowspan="3" class="center">No.</th>
							<th rowspan="3" class="center">Kode ICD</th>
							<th rowspan="3" class="center">Diagnosa</th>
							<th colspan="50" class="center">Jumlah Pasien Keluar Hidup dan Mati Menurut Kelompok Umur & Jenis Kelamin</th>
							<th colspan="3" rowspan="2" class="center">Jumlah Kasus Baru</th>
							<th colspan="3" rowspan="2" class="center">Jumlah Kunjungan</th>
						</tr>
						<tr>
							<th colspan="2">< 1 jam</th>
							<th colspan="2">1-23 jam</th>
							<th colspan="2">1-7 hr</th>
							<th colspan="2">8-14 hr</th>
							<th colspan="2">29-< 3 bln </th>
							<th colspan="2">3-< 6 bln</th>
							<th colspan="2">6 bln-< 11 bln</th>
							<th colspan="2">1-4 th</th>
							<th colspan="2">5-9 th</th>
							<th colspan="2">10-14 th</th>
							<th colspan="2">15-19 th</th>
							<th colspan="2">20-24 th</th>
							<th colspan="2">25-29 th</th>
							<th colspan="2">30-34 th</th>
							<th colspan="2">35-39 th</th>
							<th colspan="2">40-44 th</th>
							<th colspan="2">45-49 th</th>
							<th colspan="2">50-54 th</th>
							<th colspan="2">55-59 th</th>
							<th colspan="2">60-64 th</th>
							<th colspan="2">65-69 th</th>
							<th colspan="2">70-74 th</th>
							<th colspan="2">75-79 th</th>
							<th colspan="2">80-84 th</th>
							<th colspan="2">>85 th</th>
						</tr>
						<tr>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>
							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>
							<th>Total</th>
							<th>L</th>
							<th>P</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>