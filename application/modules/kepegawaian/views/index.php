<div id="warp-master-pegawai" class="card">
	<div class="card-body">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item"> <a class="nav-link active" id="daftar-pegawai" data-toggle="tab" href="#daftarPegawai" role="tab" aria-controls="daftarPegawai" aria-expanded="true"><span class="hidden-sm-up"><i class="fas fa-users"></i></span> <span class="hidden-xs-down">Daftar Pegawai</span></a> </li>
			<li class="nav-item"> <a class="nav-link" id="jabatan-pegawai" data-toggle="tab" href="#jabatanPegawai" role="tab" aria-controls="jabatanPegawai" aria-expanded="true"><span class="hidden-sm-up"><i class="fas fa-briefcase"></i></span> <span class="hidden-xs-down">Jabatan</span></a> </li>
			<li class="nav-item"> <a class="nav-link" id="profesi-pegawai" data-toggle="tab" href="#profesiPegawai" role="tab" aria-controls="profesiPegawai" aria-expanded="true"><span class="hidden-sm-up"><i class="fab fa-black-tie"></i></span> <span class="hidden-xs-down">Profesi</span></a> </li>
			<li class="nav-item"> <a class="nav-link" id="tenaga-medis" data-toggle="tab" href="#tenagaMedis" role="tab" aria-controls="tenagaMedis" aria-expanded="true"><span class="hidden-sm-up"><i class="fa fa-user-md"></i></span> <span class="hidden-xs-down">Tenaga Medis</span></a> </li>
			<li class="nav-item"> <a class="nav-link" id="unit-kerja-tab" data-toggle="tab" href="#unitKerja" role="tab" aria-controls="unitKerja" aria-expanded="true"><span class="hidden-sm-up"><i class="fas fa-building"></i></span> <span class="hidden-xs-down">Unit Kerja</span></a> </li>

		</ul>
		<div class="tab-content tabcontent-border p-20" id="myTabContent">
			<div role="tabpanel" class="tab-pane fade show active" id="daftarPegawai" aria-labelledby="daftar-pegawai">
				<div class="table-responsive">
					<table id="table-pegawai" class="table display table-bordered table-striped no-wrap">
						<thead>
						<tr>
							<th>No</th>
							<th class="center">Pas foto</th>
							<th class="center">
								<span class="d-block">Nama Pegawai (Gender)</span>
								<span class="d-block">Tempat, Tanggal Lahir (NIK)</span>
								<span class="d-block">NIP / TMT PNS</span>
							</th>
							<th class="center">
								<span class="d-block">Jabatan (Kelas Jabatan)</span>
								<span class="d-block">Unit Kerja</span>
								<span class="d-block">TMT Jabatan</span>
							</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="jabatanPegawai" aria-labelledby="jabatan-pegawai">
				<div class="table-responsive">
					<table id="table-jabatan" class="table display table-bordered table-striped no-wrap" style="width: 100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profesiPegawai" aria-labelledby="profesi-pegawai">
				<div class="table-responsive">
					<table id="table-profesi" class="table display table-bordered table-striped no-wrap" style="width: 100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tenagaMedis" aria-labelledby="tenaga-medis">
				<div class="table-responsive">
					<table id="table-tenaga-medis" class="table display table-bordered table-striped no-wrap" style="width: 100%">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Profesi</th>
							<th>Spesialisasi</th>
							<th>tgl mulai praktek</th>
							<th>kode bpjs</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="unitKerja" aria-labelledby="unit-kerja-tab">
				<div class="table-responsive">
					<table id="table-unit-kerja" class="table display table-bordered table-striped no-wrap" style="width: 100%">
						<thead>
						<tr>
							<th>No</th>
							<th>kode</th>
							<th>unit</th>
							<th>keterangan</th>
							<th>eselon</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>
