<div id="warp-tambah-pegawai" class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-pegawai'); ?>
				<div class="row">
					<div class="col-md-6">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="fas fa-user-plus m-r-5"></i>
								<b>Tambah Pegawai</b>
							</li>
							<li class="list-group-item border-theme">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nama" class=" col-form-label">Nama Pegawai<span class="text-red">*</span></label>
											<input type="text" name="nama" class="form-control reset-field" id="nama" placeholder="Nama Pegawai">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nip" class=" col-form-label">NIP Pegawai </label>
											<input type="text" name="nip" class="form-control reset-field" id="nip" placeholder="NIP Pegawai">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nik" class=" col-form-label">NIK Pegawai </label>
											<input type="number" name="nik" class="form-control reset-field" id="nik" placeholder="NIK Pegawai">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="email" class=" col-form-label">Email Pegawai </label>
											<input type="email" name="email" class="form-control reset-field" id="email" placeholder="jondoe@email.com">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="tmp-lahir-pegawai" class=" col-form-label">Tempat lahir pegawai <span class="text-red">*</span></label>
											<input type="text" name="tmp_lahir" id="tmp-lahir-pegawai" class="select2-input">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="tgl-lahir" class=" col-form-label">Tanggal Lahir <span class="text-red">*</span></label>
											<input name="tgl_lahir" id="tgl-lahir" class="form-control reset-field" type="date">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="agama-pegawai" class=" col-form-label">Agama </label>
											<select name="agama_pegawai" class="custom-select" id="agama-pegawai">
												<option value="">Pilih Agama</option>
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Katholik">Katholik</option>
												<option value="Hindu">Hindu</option>
												<option value="Buddha">Buddha</option>
												<option value="Konghucu">Konghucu</option>
												<option value="Lain-lain">Lain-lain</option>
											</select>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="alamat-lengkap" class=" col-form-label">Alamat Lengkap </label>
											<textarea name="alamat" id="alamat-lengkap" rows="3" class="form-control"></textarea>
										</div>

									</div>
									<div class="col-lg-6">
										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="pendidikan" class=" col-form-label">Pendidikan <span class="text-red">*</span></label>
											<?= form_dropdown('pendidikan', $pendidikan, array(), 'class="custom-select reset-select" id=pendidikan') ?>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="jenis-kelamin" class=" col-form-label">Jenis Kelamin <span class="text-red">*</span></label>
											<select name="jenis_kelamin" class="custom-select" id="jenis-kelamin">
												<option value="">Pilih Jenis Kelamin</option>
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="gol-darah-pegawai" class=" col-form-label">Golongan Darah </label>
											<select name="gol_darah_pegawai" class="custom-select" id="gol-darah-pegawai">
												<option value="">Pilih Golongan Darah</option>
												<option value="O">O</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="AB">AB</option>
												<option value="A Rh+">A Rh+</option>
												<option value="A Rh-">A Rh-</option>
												<option value="B Rh+">B Rh+</option>
												<option value="B Rh-">B Rh-</option>
												<option value="AB Rh+">AB Rh+</option>
												<option value="AB Rh-">AB Rh-</option>
												<option value="O Rh+">O Rh+</option>
												<option value="O Rh-">O Rh-</option>
											</select>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="profesi-pegawai-auto" class=" col-form-label">Profesi Pegawai <span class="text-red">*</span></label>
											<input type="text" name="profesi_pegawai" id="profesi-pegawai-auto" class="select2-input">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="jabatan-pegawai" class=" col-form-label">Jabatan Pegawai <span class="text-red">*</span></label>
											<input type="text" name="jabatan_pegawai" id="jabatan-pegawai" class="select2-input">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="no-hp" class=" col-form-label">No HP </label>
											<input type="text" name="no_hp" id="no-hp" class="form-control reset-field">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label class=" col-form-label"></label>
											<div class="col-md-6">
												<img class="preview" src="#" alt="Preview Gambar" style="display:none;" width="350">
											</div>
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label for="foto" class=" col-form-label">Foto</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto" accept=".jpg, .jpeg, .png" name="foto">
												<label class="custom-file-label" for="foto">Pilih Foto</label>
											</div>
										</div>

									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-warning text-white">
								<i class="fas fa-sticky-note m-r-5"></i>
								<b>Data Pengangkatan Pegawai</b>
							</li>
							<li class="list-group-item border-warning">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label">Jenis</label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="pns" name="jenis_asn" class="custom-control-input" value="pns">
												<label class="custom-control-label" for="pns">PNS</label>
											</div>
										</div>

										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="cpns" name="jenis_asn" class="custom-control-input" value="cpns">
												<label class="custom-control-label" for="cpns">CPNS</label>
											</div>
										</div>

										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="pppk" name="jenis_asn" class="custom-control-input" value="pppk">
												<label class="custom-control-label" for="pppk">PPPK</label>
											</div>
										</div>

										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="tkk" name="jenis_asn" class="custom-control-input" value="tkk">
												<label class="custom-control-label" for="tkk">TKK</label>
											</div>
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="tmt" class=" col-form-label"></label>
											<input type="date" name="tmt" class="form-control reset-field" id="tmt">
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="akhir-masa-kerja" class=" col-form-label">Tanggal Akhir Masa Kerja / Pensiun</label>
											<input type="date" name="akhir_masa_kerja" class="form-control reset-field" id="akhir-masa-kerja">
										</div>

										<div class="form-group row tight hide" style="margin: 0 0.2rem;">
											<label for="tahun" class=" col-form-label">Masa Kerja Pengangkatan CPNS</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="label-tahun">Tahun</span>
												</div>
												<input type="number" class="form-control" placeholder="tahun" aria-label="tahun" aria-describedby="tahun" name="tahun" id="tahun">
											</div>
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="label-bulan">Bulan</span>
												</div>
												<input type="number" class="form-control" placeholder="bulan" aria-label="bulan" aria-describedby="bulan" name="bulan" id="bulan">
											</div>
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="golongan-pppk" class=" col-form-label">Golongan</label>
											<select name="golongan" class="custom-select" id="golongan-pppk">
												<option selected>Pilih Golongan</option>
												<option value="I">I</option>
												<option value="II">II</option>
												<option value="III">III</option>
												<option value="IV">IV</option>
												<option value="V">V</option>
												<option value="VI">VI</option>
												<option value="VII">VII</option>
												<option value="VIII">VIII</option>
												<option value="IX">IX</option>
												<option value="X">X</option>
												<option value="XI">XI</option>
												<option value="XII">XII</option>
												<option value="XIII">XIII</option>
												<option value="XIV">XIV</option>
												<option value="XV">XV</option>
												<option value="XVI">XVI</option>
												<option value="XVII">XVII</option>
											</select>
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="gaji-pokok" class=" col-form-label">Gaji Pokok</label>
											<input type="text" name="gaji_pokok" class="form-control reset-field" id="gaji-pokok" placeholder="Gaji pokok">
										</div>

									</div>
									<div class="col-lg-6">

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="no-sk" class=" col-form-label">Nomor SK</label>
											<input type="text" name="no_sk" class="form-control reset-field" id="no-sk" placeholder="No. SK">
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="tgl-sk" class=" col-form-label">Tanggal SK</label>
											<input type="date" name="tgl_sk" class="form-control reset-field" id="tgl-sk">
										</div>

										<div class="form-group row hide" style="margin: 0 0.2rem;">
											<label for="pejabat-penetap" class=" col-form-label">Pejabat Penetap</label>
											<input type="text" name="pejabat_penetap" class="form-control reset-field" id="pejabat-penetap" placeholder="Pejabat Penetap">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label class=" col-form-label"></label>
											<div class="col-md-6">
												<img class="preview" src="#" alt="Preview Gambar" style="display:none;" width="350">
											</div>
										</div>

										<div class="form-group row hide" style="margin: 0.2rem 0.2rem;">
											<label for="fc-sk" class=" col-form-label">FC. SK</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="fc-sk" accept=".jpg, .jpeg, .png" name="fc_sk">
												<label class="custom-file-label" for="fc-sk">Pilih Foto</label>
											</div>

										</div>

									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<ul class="list-group m-b-10">
							<li class="list-group-item text-black" style="background-color: #cddc39">
								<i class="fas fa-history m-r-5"></i>
								<b>Riwayat Jabatan Pegawai</b>
							</li>
							<li class="list-group-item" style="border-color: #cddc39">
								<div class="row" style="padding: .3rem .3rem">
									<button class="btn btn-info waves-effect" type="button" id="btn-tambah-riwayat-jabatan"><i class="fas fa-plus-circle"></i> Tambah</button>
									<table class="table mt-4 table-bordered" id="table-riwayat-jabatan">
										<thead>
										<tr>
											<th class="center">No</th>
											<th class="center">Fc. SK Jabatan</th>
											<th class="center">TMT Jabatan</th>
											<th class="center">UNIT Kerja</th>
											<th class="center">Jabatan</th>
											<th class="center">Aksi</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="row hide" id="form-sk-kepangkatan">
					<div class="col">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-danger text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Sk Kepangkatan</b>
							</li>
							<li class="list-group-item border-danger">
								<div class="row" style="padding: .3rem .3rem">
									<button class="btn btn-info waves-effect" type="button" id="btn-tambah-sk-kepangkatan"><i class="fas fa-plus-circle"></i> Tambah</button>
									<table class="table mt-4 table-bordered" id="table-sk-kepangkatan">
										<thead>
										<tr>
											<th class="center">No</th>
											<th class="center">Fc. SK Pangkat</th>
											<th class="center">Pangkat / Golongan TMT pangkat</th>
											<th class="center">Angka Kredit</th>
											<th class="center">SAPK</th>
											<th class="center">Aksi</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-success text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Kartu Keluarga</b>
							</li>
							<li class="list-group-item border-success">
								<div class="row">
									<div class="col">
										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label for="no-kk" class="col-form-label">Nomor Kartu Keluarga</label>
											<input type="number" name="no_kk" class="form-control reset-field" id="no-kk" placeholder="Nomor Kartu Keluarga">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label for="tgl-kk" class="col-form-label">Tanggal Kartu Keluarga</label>
											<input type="date" name="tgl_kk" class="form-control reset-field" id="tgl-kk" placeholder="Nama Pegawai">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label class="col-form-label"></label>
											<div class="col-md-9">
												<img class="preview" src="#" alt="Preview Gambar" style="display:none;" width="350">
											</div>
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label for="foto-kk" class="col-form-label">Foto Kartu Keluarga</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto-kk" accept=".jpg, .jpeg, .png" name="foto_kk">
												<label class="custom-file-label" for="foto-kk">Pilih Foto</label>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group m-b-10">
							<li class="list-group-item text-b" style="background-color: #00EFB3">
								<i class="fas fa-users m-r-5"></i>
								<b>Daftar susunan keluarga</b>
							</li>
							<li class="list-group-item" style="border-color: #00EFB3">
								<div class="row" style="padding: .3rem .3rem">
									<button class="btn btn-info waves-effect" type="button" id="tambah-susunan-keluarga"><i class="fas fa-user-plus"></i> Tambah</button>
									<table class="table mt-4 table-bordered" id="table-susunan-keluarga">
										<thead>
										<tr>
											<th class="center">No</th>
											<th class="center">Nama Lengkap</th>
											<th class="center">NIK</th>
											<th class="center">Jenis Kelamin</th>
											<th class="center">Tempat, Tanggal Lahir</th>
											<th class="center">Pendidikan</th>
											<th class="center">Jenis Pekerjaan</th>
											<th class="center">Aksi</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<?= form_close() ?>
			</div>
		</div>
		<div style="display: flex;justify-content: flex-end;">
			<button class="btn btn-info" id="btn-tambah-pegawai">Tambah</button>
		</div>
	</div>
</div>

<!-- Modal Tambah Daftar Susunan Keluarga -->
<div id="modal-tambah-daftar-susunan-keluarga" class="modal fade" role="dialog" aria-labelledby="modal-tambah-daftar-susunan-keluarga-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-daftar-susunan-keluarga-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-daftar-susunan-keluarga'); ?>
				<div style="margin: 0.2rem 0.2rem">
					<div class="form-group row tight">
						<label for="nama-lengkap" class="col-form-label">Nama Lengkap </label>
						<input id="nama-lengkap" class="form-control reset-field" type="text" placeholder="Nama Lengkap">
					</div>

					<div class="form-group row tight">
						<label for="nik-keluarga" class="col-form-label">Nik </label>
						<input id="nik-keluarga" class="form-control reset-field" type="number" placeholder="NIK">
					</div>

					<div class="form-group row tight">
						<label for="jenis-kelamin-keluarga" class="col-form-label">Jenis Kelamin </label>
						<select class="custom-select" id="jenis-kelamin-keluarga">
							<option>Pilih Jenis kelamin</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>

					<div class="form-group row tight">
						<label for="tempat-lahir-keluarga" class="col-form-label">Tempat lahir </label>
						<input type="text" id="tempat-lahir-keluarga" class="select2-input">
					</div>

					<div class="form-group row tight">
						<label for="tanggal-lahir-keluarga" class="col-form-label">Tanggal Lahir </label>
						<input id="tanggal-lahir-keluarga" class="form-control reset-field" type="date">
					</div>

					<div class="form-group row tight">
						<label for="pendidikan-keluarga" class="col-form-label">Pendidikan Keluarga</label>
						<?= form_dropdown('', $pendidikan, array(), 'class="custom-select reset-select" id=pendidikan-keluarga') ?>
					</div>

					<div class="form-group row tight">
						<label for="jenis-pekerjaan-keluarga" class="col-form-label">Jenis Pekerjaan </label>
						<select class="custom-select" id="jenis-pekerjaan-keluarga">
							<option value="karyawan swasta">Karyawan Swasta</option>
							<option value="asn">ASN</option>
							<option value="guru">Guru</option>
							<option value="lainnya">Lainnya...</option>
						</select>
					</div>

					<div class="form-group row tight hide">
						<label for="jenis-pekerjaan-keluarga-lainnya" class="col-form-label">Pekerjaan lainnya </label>
						<input id="jenis-pekerjaan-keluarga-lainnya" class="form-control reset-field" type="text" placeholder="Jenis Pekerjaan Lainnya">
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-susunan-keluarga"> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Tambah Daftar Susunan Keluarga -->

<!-- Modal Tambah Riwayat Jabatan Pegawai -->
<div id="modal-tambah-riwayat-jabatan-pegawai" class="modal fade" role="dialog" aria-labelledby="modal-tambah-riwayat-jabatan-pegawai-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-riwayat-jabatan-pegawai-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-riwayat-jabatan-pegawai'); ?>
				<div class="row" style="margin: 0.2rem 0.2rem">
					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tmt-jabatan" class="col-form-label">TMT Jabatan </label>
							<input id="tmt-jabatan" class="form-control reset-field" type="date">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="unit-kerja" class="col-form-label"> Pilih Unit Kerja</label>
							<input type="text" id="unit-kerja" class="select2-input">
							<input type="hidden" id="data-unit-kerja">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="no-sk-jabatan" class="col-form-label">NO SK </label>
							<input id="no-sk-jabatan" class="form-control reset-field" type="text" placeholder="No. SK">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tgl-sk-jabatan" class="col-form-label">Tanggal SK </label>
							<input id="tgl-sk-jabatan" class="form-control reset-field" type="date">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="penandatangan-sk-jabatan" class="col-form-label">Penandatangan SK </label>
							<input id="penandatangan-sk-jabatan" class="form-control reset-field" type="text" placeholder="Penandatangan SK">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="jenis-jabatan-jabatan" class="col-form-label">Jenis Jabatan </label>
							<select id="jenis-jabatan-jabatan" class="form-control reset-field">
								<option selected>Pilih Jenis Jabatan</option>
								<option value="jabatan struktural">Jabatan Struktural</option>
								<option value="jabatan fungsional umum">Jabatan Fungsional Umum</option>
								<option value="jabatan fungsional tertentu">Jabatan Fungsional Tertentu</option>
							</select>
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="jabatan-jabatan" class="col-form-label">Jabatan </label>
							<input id="jabatan-jabatan" class="form-control reset-field" type="text" placeholder="Jabatan...">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="Jenjang-jabatan-jabatan" class="col-form-label">Jenjang Jabatan </label>
							<input id="Jenjang-jabatan-jabatan" class="form-control reset-field" type="text" placeholder="Jenjang Jabatan">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tugas-tambahan-jabatan" class="col-form-label">Tugas Tambahan </label>
							<select id="tugas-tambahan-jabatan" class="form-control reset-field">
								<option selected>Pilih Tambahan Jabatan</option>
								<option value="Plt. Kepala Dinas/Badan/Kantor">Plt. Kepala Dinas/Badan/Kantor</option>
								<option value="Kepala Puskesmas">Kepala Puskesmas</option>
								<option value="Bendahara penerimaan">Bendahara penerimaan</option>
								<option value="Bendahara pengeluaran">Bendahara pengeluaran</option>
								<option value="Bendahara penerimaan pembantu">Bendahara penerimaan pembantu</option>
								<option value="Bendahara pengeluaran pembantu">Bendahara pengeluaran pembantu</option>
								<option value="Pembantu bendahara penerimaan">Pembantu bendahara penerimaan</option>
								<option value="Pembantu bendahara pengeluaran">Pembantu bendahara pengeluaran</option>
								<option value="Bendahara barang">Bendahara barang</option>
								<option value="Pembantu bendahara barang">Pembantu bendahara barang</option>
								<option value="Verifikatur">Verifikatur</option>
								<option value="Kepala Sekolah">Kepala Sekolah</option>
								<option value="Kepala Tata Usaha">Kepala Tata Usaha</option>
								<option value="Pj. Sekretaris Daerah">Pj. Sekretaris Daerah</option>
								<option value="Plt. UPT Pengelola Ruang Kendali Kota">Plt. UPT Pengelola Ruang Kendali Kota</option>
								<option value="Plt. Asisten Administrasi Umum">Plt. Asisten Administrasi Umum</option>
								<option value="Plt. Unit Peiayanan Terpadu (UPT)">Plt. Unit Peiayanan Terpadu (UPT)</option>
								<option value="Plt. Sekretaris Dinas/Badan/Kantor">Plt. Sekretaris Dinas/Badan/Kantor</option>
								<option value="Plt. Kepala Sekolah">Plt. Kepala Sekolah</option>
								<option value="Plt. Kepaia Sub Bagian Umum dan Kepegawaian">Plt. Kepaia Sub Bagian Umum dan Kepegawaian</option>
								<option value="Koordinator">Koordinator</option>
								<option value="Sub Koordinator">Sub Koordinator</option>
							</select>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label class=" col-form-label"></label>
							<div class="col-md-6">
								<img class="preview" src="#" alt="Preview Gambar" style="display:none;" width="350" id="preview-fc-sk-jabatan">
							</div>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="fc-sk-jabatan" class=" col-form-label">FC. SK Jabatan</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="fc-sk-jabatan" accept=".jpg, .jpeg, .png" name="fc_sk">
								<label class="custom-file-label" for="fc-sk-jabatan">Pilih Foto</label>
							</div>

						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-riwayat-jabatan-pegawai"> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Tambah Riwayat Jabatan Pegawai -->

<!-- Modal Tambah Riwayat Jabatan Pegawai -->
<div id="modal-tambah-sk-kepangkatan" class="modal fade" role="dialog" aria-labelledby="modal-tambah-sk-kepangkatan-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-sk-kepangkatan-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-sk-kepangkatan'); ?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="tmt-pangkat" class="col-form-label">TMT Pangkat</label>
							<input type="date" class="form-control reset-field" id="tmt-pangkat" placeholder="Nomor Kartu Keluarga">
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="sk-pangkat" class="col-form-label">Nomor SK</label>
							<input type="text" class="form-control reset-field" id="sk-pangkat" placeholder="Nomor SK">
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="no-nota-bkn" class="col-form-label">Nomor Nota BKN</label>
							<input type="text" class="form-control reset-field" id="no-nota-bkn" placeholder="Nama Pegawai">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="pangkat-golongan" class="col-form-label">Pangkat / Golongan</label>
							<input type="text" id="pangkat-golongan" class="select2-input">
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="tgl-sk-pangkat" class="col-form-label">Tanggal SK</label>
							<input type="date" class="form-control reset-field" id="tgl-sk-pangkat">
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="tgl-nota-bkn" class="col-form-label">Tanggal Nota BKN</label>
							<input type="date" class="form-control reset-field" id="tgl-nota-bkn">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="masa-kerja-pangkat" class="col-form-label">Masa Kerja</label>
							<input type="month" class="form-control reset-field" id="masa-kerja-pangkat">
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="jenis-kenaikan-pangkat" class="col-form-label">Jenis Kenaikan Pangkat</label>
							<select class="custom-select" id="jenis-kenaikan-pangkat">
								<option value="">Pilih Jenis KP</option>
								<option value="Reguler">Reguler</option>
								<option value="Jabatan Struktural">Jabatan Struktural</option>
								<option value="Jabatan Fungsional Tertentu">Jabatan Fungsional Tertentu</option>
								<option value="Sedang Melaksanakan Tugas Belajar">Sedang Melaksanakan Tugas Belajar</option>
								<option value="Setelah Selesai Tugas Belajar">Setelah Selesai Tugas Belajar</option>
								<option value="Gol. Dari Pengadaan CPNS/PNS">Gol. Dari Pengadaan CPNS/PNS</option>
								<option value="Gol. Dari Pengadaan PPPK">Gol. Dari Pengadaan PPPK</option>
								<option value="Pengembalian Pangkat (Selesai Hukuman Disiplin)">Pengembalian Pangkat (Selesai Hukuman Disiplin)</option>
							</select>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<div style="display: flex;flex-direction: column">
								<label for="angka-kredit" class="col-form-label">Angka Kredit</label>
								<div style="display: flex; align-items: center; gap:.4rem">
									<label for="angka-kredit-utama" class="col-form-label">Utama: </label>
									<input type="text" class="col-md-2 form-control" id="angka-kredit-utama">
									<label for="angka-kredit-tambahan" class="col-form-label">Tambahan: </label>
									<input type="text" class="col-md-2 form-control" id="angka-kredit-tambahan">
								</div>
							</div>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label class=" col-form-label"></label>
							<div class="col-md-6">
								<img class="preview" src="#" alt="Preview Gambar" style="display:none;" width="350" id="preview-fc-sk-kepangkatan">
							</div>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="fc-sk-kepangkatan" class=" col-form-label">FC. SK Kepangkatan</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="fc-sk-kepangkatan" accept=".jpg, .jpeg, .png">
								<label class="custom-file-label" for="fc-sk-kepangkatan">Pilih Foto</label>
							</div>

						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-sk-kepangkatan-pegawai"> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Tambah Riwayat Jabatan Pegawai -->

<?php $this->load->view('js') ?>
