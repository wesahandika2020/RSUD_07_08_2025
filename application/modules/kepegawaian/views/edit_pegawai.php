<?php
//var_dump($data->jenis_asn);
?>
<div id="warp-edit-pegawai" class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-pegawai'); ?>
				<div class="row">
					<div class="col-md-6">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-theme text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Tambah Pegawai</b>
							</li>
							<li class="list-group-item border-theme">
								<input type="hidden" id="id-pegawai" value="<?= $data_pegawai->id ?>" name="id_pegawai">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nama" class="col-form-label">Nama Pegawai <span class="text-red">*</span></label>
											<input type="text" name="nama" class="form-control reset-field" id="nama" placeholder="Nama Pegawai" value="<?= $data_pegawai->nama ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nip" class="col-form-label">NIP Pegawai </label>
											<input type="text" name="nip" class="form-control reset-field" id="nip" placeholder="NIP Pegawai" value="<?= $data_pegawai->nip ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="nik" class="col-form-label">NIK Pegawai </label>
											<input type="text" name="nik" class="form-control reset-field" id="nik" placeholder="NIK Pegawai" value="<?= $data_pegawai->nik ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="email" class="col-form-label">Email Pegawai </label>
											<input type="email" name="email" class="form-control reset-field" id="email" placeholder="jondoe@email.com" value="<?= $data_pegawai->email ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="tmp-lahir-pegawai" class="col-form-label">Tempat lahir pegawai <span class="text-red">*</span></label>
											<input type="text" name="tmp_lahir" id="tmp-lahir-pegawai" class="select2-input" value="<?= $data_pegawai->id_kota_kabupaten ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="tgl-lahir" class="col-form-label">Tanggal Lahir <span class="text-red">*</span></label>
											<input name="tgl_lahir" id="tgl-lahir" class="form-control reset-field" type="date" value="<?= $data_pegawai->tgl_lahir ?>">
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
											<label for="alamat-lengkap" class="col-form-label">Alamat Lengkap </label>
											<textarea name="alamat" id="alamat-lengkap" rows="3" class="form-control"><?= $data_pegawai->alamat ?></textarea>
										</div>

									</div>
									<div class="col-lg-6">

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="jenis-kelamin" class="col-form-label">Jenis Kelamin <span class="text-red">*</span></label>
											<select name="jenis_kelamin" class="custom-select" id="jenis-kelamin">
												<option value="">Pilih Jenis Kelamin</option>
												<option value="L" <?= $data_pegawai->kelamin === 'L' ? 'selected' : '' ?>>Laki-Laki</option>
												<option value="P" <?= $data_pegawai->kelamin === 'P' ? 'selected' : '' ?>>Perempuan</option>
											</select>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="gol-darah-pegawai" class="col-form-label">Golongan Darah </label>
											<select name="gol_darah_pegawai" class="custom-select" id="gol-darah-pegawai">
												<option value="">Pilih Golongan Darah</option>
												<option value="O" <?= $data_pegawai->gol_darah === 'O' ? 'selected' : '' ?>>O</option>
												<option value="A" <?= $data_pegawai->gol_darah === 'A' ? 'selected' : '' ?>>A</option>
												<option value="B" <?= $data_pegawai->gol_darah === 'B' ? 'selected' : '' ?>>B</option>
												<option value="AB" <?= $data_pegawai->gol_darah === 'AB' ? 'selected' : '' ?>>AB</option>
												<option value="A Rh+" <?= $data_pegawai->gol_darah === 'A Rh+' ? 'selected' : '' ?>>A Rh+</option>
												<option value="A Rh-" <?= $data_pegawai->gol_darah === 'A Rh-' ? 'selected' : '' ?>>A Rh-</option>
												<option value="B Rh+" <?= $data_pegawai->gol_darah === 'B Rh+' ? 'selected' : '' ?>>B Rh+</option>
												<option value="B Rh-" <?= $data_pegawai->gol_darah === 'B Rh-' ? 'selected' : '' ?>>B Rh-</option>
												<option value="AB Rh+" <?= $data_pegawai->gol_darah === 'AB Rh+' ? 'selected' : '' ?>>AB Rh+</option>
												<option value="AB Rh-" <?= $data_pegawai->gol_darah === 'AB Rh-' ? 'selected' : '' ?>>AB Rh-</option>
												<option value="O Rh+" <?= $data_pegawai->gol_darah === 'O Rh+' ? 'selected' : '' ?>>O Rh+</option>
												<option value="O Rh-" <?= $data_pegawai->gol_darah === 'O Rh-' ? 'selected' : '' ?>>O Rh-</option>
											</select>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="profesi-pegawai" class="col-form-label">Profesi Pegawai <span class="text-red">*</span></label>
											<input type="text" name="profesi_pegawai" id="profesi-pegawai-auto" class="select2-input" value="<?= $data_pegawai->id_profesi ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="jabatan-pegawai" class="col-form-label">Jabatan Pegawai <span class="text-red">*</span></label>
											<input type="text" name="jabatan_pegawai" id="jabatan-pegawai" class="select2-input" value="<?= $data_pegawai->id_jabatan ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="no-hp" class="col-form-label">No HP </label>
											<input type="text" name="no_hp" id="no-hp" class="form-control reset-field" value="<?= $data_pegawai->hp ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label class="col-form-label"></label>
											<div class="col-md-9">
												<img class="preview <?= $data_pegawai->profil === NULL ? 'hide' : '' ?>" src="<?= resource_url().'images/avatars/'.$data_pegawai->profil ?>"
													 alt="Preview Gambar"
													 width="250" height="330">
											</div>
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="foto" class="col-form-label">Foto</label>
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
								<b>ASN</b>
							</li>
							<li class="list-group-item border-warning">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label">Jenis ASN</label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="pns" name="jenis_asn" class="custom-control-input" value="pns" <?= $data_pegawai->jenis_asn === 'pns' ? 'checked' : '' ?>>
												<label class="custom-control-label" for="pns">PNS</label>
											</div>
										</div>

										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="cpns" name="jenis_asn" class="custom-control-input" value="cpns" <?= $data_pegawai->jenis_asn === 'cpns' ? 'checked' : '' ?>>
												<label class="custom-control-label" for="cpns">CPNS</label>
											</div>
										</div>

										<div class="form-group row tight" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="pppk" name="jenis_asn" class="custom-control-input" value="pppk" <?= $data_pegawai->jenis_asn === 'pppk' ? 'checked' : '' ?>>
												<label class="custom-control-label" for="pppk">PPPK</label>
											</div>
										</div>

										<div class="form-group row" style="align-items: center;">
											<label class="col-md-3 col-form-label"></label>
											<div class="custom-control custom-radio col-md-9" style="padding-left: 2rem;">
												<input type="radio" id="tkk" name="jenis_asn" class="custom-control-input" value="tkk" <?= $data_pegawai->jenis_asn === 'tkk' ? 'checked' : '' ?>>
												<label class="custom-control-label" for="tkk">TKK</label>
											</div>
										</div>

										<div class="form-group row <?= $data_pegawai->tmt === NULL ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="tmt" class=" col-form-label">
												<?php
												if ($data_pegawai->jenis_asn === 'pns')
												{
													echo 'TMT PNS';
												} elseif ($data_pegawai->jenis_asn === 'cpns')
												{
													echo 'TMT PNS';
												} elseif ($data_pegawai->jenis_asn === 'pppk')
												{
													echo 'TMT PPPK';
												}
												?>
											</label>
											<input type="date" name="tmt" class="form-control reset-field" id="tmt" value="<?= $data_pegawai->tmt ?>">
										</div>

										<div class="form-group row" style="margin: 0 0.2rem;">
											<label for="akhir-masa-kerja" class=" col-form-label">Tanggal Akhir Masa Kerja / Pensiun</label>
											<input type="date" name="akhir_masa_kerja" class="form-control reset-field" id="akhir-masa-kerja" value="<?= $data_pegawai->akhir_masa_kerja ?>">
										</div>

										<?php if ( ! empty($data_pegawai->masa_kerja_cpns)):
											$masa_kerja = json_decode($data_pegawai->masa_kerja_cpns);
											?>
											<div class="form-group row tight <?= $data_pegawai->jenis_asn !== 'cpns' ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
												<label for="tahun" class=" col-form-label">Masa Kerja Pengangkatan CPNS</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="label-tahun">Tahun</span>
													</div>
													<input type="number" class="form-control" placeholder="tahun" aria-label="tahun" aria-describedby="tahun" name="tahun" id="tahun"
														   value="<?= $masa_kerja->tahun ?>">
												</div>
											</div>

											<div class="form-group row <?= $data_pegawai->jenis_asn !== 'cpns' ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="label-bulan">Bulan</span>
													</div>
													<input type="number" class="form-control" placeholder="bulan" aria-label="bulan" aria-describedby="bulan" name="bulan" id="bulan"
														   value="<?= $masa_kerja->bulan ?>">
												</div>
											</div>
										<?php endif ?>

										<div class="form-group row <?= $data_pegawai->jenis_asn !== 'pppk' ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="golongan-pppk" class=" col-form-label">Golongan</label>
											<select name="golongan" class="custom-select" id="golongan-pppk">
												<option>Pilih Golongan</option>
												<option value="I" <?= $data_pegawai->golongan === 'I' ? 'selected' : '' ?>>I</option>
												<option value="II" <?= $data_pegawai->golongan === 'II' ? 'selected' : '' ?>>II</option>
												<option value="III" <?= $data_pegawai->golongan === 'III' ? 'selected' : '' ?>>III</option>
												<option value="IV" <?= $data_pegawai->golongan === 'IV' ? 'selected' : '' ?>>IV</option>
												<option value="V" <?= $data_pegawai->golongan === 'V' ? 'selected' : '' ?>>V</option>
												<option value="VI" <?= $data_pegawai->golongan === 'VI' ? 'selected' : '' ?>>VI</option>
												<option value="VII" <?= $data_pegawai->golongan === 'VII' ? 'selected' : '' ?>>VII</option>
												<option value="VIII" <?= $data_pegawai->golongan === 'VIII' ? 'selected' : '' ?>>VIII</option>
												<option value="IX" <?= $data_pegawai->golongan === 'IX' ? 'selected' : '' ?>>IX</option>
												<option value="X" <?= $data_pegawai->golongan === 'X' ? 'selected' : '' ?>>X</option>
												<option value="XI" <?= $data_pegawai->golongan === 'XI' ? 'selected' : '' ?>>XI</option>
												<option value="XII" <?= $data_pegawai->golongan === 'XII' ? 'selected' : '' ?>>XII</option>
												<option value="XIII" <?= $data_pegawai->golongan === 'XIII' ? 'selected' : '' ?>>XIII</option>
												<option value="XIV" <?= $data_pegawai->golongan === 'XIV' ? 'selected' : '' ?>>XIV</option>
												<option value="XV" <?= $data_pegawai->golongan === 'XV' ? 'selected' : '' ?>>XV</option>
												<option value="XVI" <?= $data_pegawai->golongan === 'XVI' ? 'selected' : '' ?>>XVI</option>
												<option value="XVII" <?= $data_pegawai->golongan === 'XVII' ? 'selected' : '' ?>>XVII</option>
											</select>
										</div>

										<div class="form-group row <?= $data_pegawai->jenis_asn !== 'pppk' ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="gaji-pokok" class=" col-form-label">Gaji Pokok</label>
											<input type="text" name="gaji_pokok" class="form-control reset-field" id="gaji-pokok" placeholder="Gaji pokok"
												   value="<?= number_format($data_pegawai->gaji_pokok, 0, '.', '.') ?>">
										</div>

									</div>
									<div class="col-lg-6">

										<div class="form-group row <?= $data_pegawai->jenis_asn === NULL ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="no-sk" class=" col-form-label">Nomor SK</label>
											<input type="text" name="no_sk" class="form-control reset-field" id="no-sk" placeholder="No. SK" value="<?= $data_pegawai->no_sk ?>">
										</div>

										<div class="form-group row <?= $data_pegawai->jenis_asn === NULL ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="tgl-sk" class=" col-form-label">Tanggal SK</label>
											<input type="date" name="tgl_sk" class="form-control reset-field" id="tgl-sk" value="<?= $data_pegawai->tgl_sk ?>">
										</div>

										<div class="form-group row <?= $data_pegawai->jenis_asn === NULL ? 'hide' : '' ?>" style="margin: 0 0.2rem;">
											<label for="pejabat-penetap" class=" col-form-label">Pejabat Penetap</label>
											<input type="text" name="pejabat_penetap" class="form-control reset-field" id="pejabat-penetap" placeholder="Pejabat Penetap"
												   value="<?= $data_pegawai->pejabat_penetap ?>">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label class=" col-form-label"></label>
											<div class="col-md-6">
												<img class="preview <?= $data_pegawai->fc_sk === NULL ? 'hide' : '' ?>" src="<?= resource_url().'images/avatars/'.$data_pegawai->fc_sk ?>"
													 alt="Preview Gambar"
													 width="350">
											</div>
										</div>

										<div class="form-group row <?= $data_pegawai->jenis_asn === NULL ? 'hide' : '' ?>" style="margin: 0.2rem 0.2rem;">
											<label for="fc-sk" class=" col-form-label">
												<?php
												if ($data_pegawai->jenis_asn === 'pns')
												{
													echo 'FC. SK PNS';
												} elseif ($data_pegawai->jenis_asn === 'cpns')
												{
													echo 'FC. SK PNS';
												} elseif ($data_pegawai->jenis_asn === 'pppk')
												{
													echo 'FC. SK PPPK';
												}
												?>
											</label>
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
										<?php if ( ! empty($data_riwayat_jabatan_pegawai)) : ?>
											<?php foreach ($data_riwayat_jabatan_pegawai as $key => $item) : ?>
												<tr>
													<td><?= ++$key ?></td>
													<td>
														<img class="preview <?= $item->fc_sk === NULL ? 'hide' : '' ?>" src="<?= resource_url().'images/avatars/'.$item->fc_sk ?>" alt="Preview Gambar"
															 width="350">
													</td>
													<td><?= $item->tmt ?></td>
													<td>
														<div style="display: flex; flex-direction: column">
															<span><?= $item->upt ?></span>
															<span>pada:</span>
															<span><?= $item->nama ?></span>
														</div>
													</td>
													<td>
														<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
															<span>No. SK</span>
															<span>:</span>
															<span><?= $item->no_sk ?></span>

															<span>Tanggal SK</span>
															<span>:</span>
															<span><?= $item->tgl_sk ?></span>

															<span>Penandatangan SK</span>
															<span>:</span>
															<span><?= $item->penandatangan_sk ?></span>
														</div>
														<hr style="border: dashed 1px gray">
														<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
															<span>Jenis jabatan</span>
															<span>:</span>
															<span><?= $item->jenis_jabatan ?></span>

															<span>Jabatan</span>
															<span>:</span>
															<span><?= $item->jabatan !== NULL ? $item->jabatan : '-' ?></span>

															<span>Jenjang Jabatan</span>
															<span>:</span>
															<span><?= $item->jenjang !== NULL ? $item->jenjang : '-' ?></span>

															<span>Tugas Tambahan</span>
															<span>:</span>
															<span><?= $item->tugas_tambahan !== NULL ? $item->tugas_tambahan : '-' ?></span>
														</div>
													</td>
													<td>
														<?php
														$newItem               = (array) $item;
														$newItem['id_pegawai'] = $data_pegawai->id;
														?>
														<button type="button" class="btn btn-info btn-xxs btn-edit-riwayat-jabatan-pegawai"
																data='<?= json_encode($newItem) ?>'><i class="fas fa-edit"></i></button>
														<button type="button" class="btn btn-danger btn-xxs btn-delete-riwayat-jabatan-pegawai"
																data='<?= json_encode(['id_riwayat_jabatan' => $item->id, 'id_pegawai' => $data_pegawai->id]) ?>'><i class="fas fa-trash-alt"></i>
														</button>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="row <?= $data_pegawai->jenis_asn === 'tkk' ? 'hide' : '' ?>" id="form-sk-kepangkatan">
					<div class="col">
						<ul class="list-group m-b-10">
							<li class="list-group-item bg-danger text-white">
								<i class="far fa-id-card m-r-5"></i>
								<b>Sk Kepangkatan</b>
							</li>
							<li class="list-group-item border-danger">
								<div class="row" style="padding: .3rem .3rem">
									<button class="btn btn-info waves-effect" type="button" id="btn-tambah-riwayat-jabatan"><i class="fas fa-plus-circle"></i> Tambah</button>
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
										<?php if ( ! empty($data_sk_kepangkatan_pegawai)) : ?>
											<?php foreach ($data_sk_kepangkatan_pegawai as $key => $item) : ?>
												<tr>
													<td><?= ++$key ?></td>
													<td>
														<div class="card" style="width: 177px; height: 236px">
															<img class="preview <?= $item->fc_sk_kepangkatan === NULL ? 'hide' : '' ?>"
																 src="<?= resource_url().'images/avatars/'.$item->fc_sk_kepangkatan ?>" alt="Preview Gambar"
																 width="177" height="236">
														</div>
													</td>
													<td>
														<div style="display: flex; flex-direction: column">
															<span><?= $item->kode_golongan ?>/<?= $item->kode_pangkat ?>, <?= $item->nama_pangkat ?></span>
															<span><?= $item->tmt ?></span>
															<span><i><?= $item->jenis_kenaikan ?></i></span>
														</div>
														<hr style="border: dashed 1px gray">
														<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
															<span>Nomor SK</span>
															<span>:</span>
															<span><?= $item->no_sk ?></span>

															<span>Tanggal SK</span>
															<span>:</span>
															<span><?= $item->tgl_sk ?></span>
														</div>
													</td>
													<td class="center">
														<?php
														$kreditU = 0;
														$kreditT = 0;
														if ($item->angka_kredit)
														{
															$kredit  = json_decode($item->angka_kredit);
															$kreditU = intval($kredit->utama);
															$kreditT = intval($kredit->tambahan);
														}
														?>
														<?= $kreditU + $kreditT ?>
													</td>
													<td>
														<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
															<span>Pangkat/Gol.</span>
															<span>:</span>
															<span><?= $item->kode_golongan ?>/<?= $item->kode_pangkat ?>, <?= $item->nama_pangkat ?></span>

															<span>TMT Pangkat</span>
															<span>:</span>
															<span><?= $item->tmt ?></span>

															<span></span>
															<span></span>
															<span><i><?= $item->jenis_kenaikan ?></i></span>
														</div>
														<hr style="border: dashed 1px gray">
														<div style="display: grid; grid-template-columns: 1fr 1rem 2fr;grid-auto-columns: auto;">
															<span>Nomor SK</span>
															<span>:</span>
															<span><?= $item->no_sk ?></span>

															<span>Tanggal SK</span>
															<span>:</span>
															<span><?= $item->tgl_sk ?></span>
														</div>
													</td>
													<td>
														<?php
														$newItem               = (array) $item;
														$newItem['id_pegawai'] = $data_pegawai->id;
														?>
														<button type="button" class="btn btn-info btn-xxs btn-edit-riwayat-jabatan-pegawai"
																data='<?= json_encode($newItem) ?>'><i class="fas fa-edit"></i></button>
														<button type="button" class="btn btn-danger btn-xxs btn-delete-riwayat-jabatan-pegawai"
																data='<?= json_encode(['id_riwayat_jabatan' => $item->id, 'id_pegawai' => $data_pegawai->id]) ?>'><i class="fas fa-trash-alt"></i>
														</button>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
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
											<input type="number" name="no_kk" class="form-control reset-field" id="no-kk" value="<?= $data_kk_pegawai->no_kk ?? '-' ?>">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label for="tgl-kk" class="col-form-label">Tanggal Kartu Keluarga</label>
											<input type="date" name="tgl_kk" class="form-control reset-field" id="tgl-kk" value="<?= $data_kk_pegawai->tgl_kk ?? '-' ?>">
										</div>

										<div class="form-group row" style="margin: 0.2rem 0.2rem;">
											<label class="col-form-label"></label>
											<div class="col-md-9">
												<img class="preview <?= $data_kk_pegawai->foto_kk === NULL ? 'hide' : '' ?>" src="<?= resource_url().'images/avatars/'.$data_kk_pegawai->foto_kk ?>"
													 alt="Preview Gambar KK"
													 width="350">
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
							<li class="list-group-item bg-danger text-white">
								<i class="fas fa-users m-r-5"></i>
								<b>Daftar susunan keluarga</b>
							</li>
							<li class="list-group-item border-danger">
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
										<?php if ( ! empty($data_kk_pegawai_detail)) : ?>
											<?php foreach ($data_kk_pegawai_detail as $key => $item): ?>
												<?php if (empty($item))
												{
													break;
												} ?>
												<tr>
													<td class="center"><?= ++$key ?></td>
													<td><?= $item->nama_lengkap ?></td>
													<td class="center"><?= $item->nik ?></td>
													<td class="center">
														<?php if ($item->jenis_kelamin === 'L')
														{
															echo 'Laki-laki';
														} elseif ($item->jenis_kelamin === 'L')
														{
															echo 'Perempuan';
														} else
														{
															echo '-';
														}
														?>
													</td>
													<td class="center"><?= $item->tmp_lahir ?>, <?= $item->tgl_lahir ?></td>
													<td class="center"><?= $item->pendidikan ?></td>
													<td class="center"><?= ucwords($item->jenis_pekerjaan) ?></td>
													<td class="center">
														<?php
														$newItem               = (array) $item;
														$newItem['id_pegawai'] = $data_pegawai->id;
														?>
														<button type="button" class="btn btn-info btn-xxs btn-edit-susunan-keluarga"
																data='<?= json_encode($newItem) ?>'><i class="fas fa-edit"></i></button>
														<button type="button" class="btn btn-danger btn-xxs btn-delete-susunan-keluarga-delete"
																data='<?= json_encode(['id_kk_detail' => $item->id, 'id_pegawai' => $data_pegawai->id]) ?>'><i class="fas fa-trash-alt"></i></button>
													</td>
												</tr>

											<?php endforeach ?>
										<?php endif ?>
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
			<button class="btn btn-info" id="btn-update-pegawai">Update</button>
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

<!-- Modal Edit Daftar Susunan Keluarga -->
<div id="modal-edit-daftar-susunan-keluarga" class="modal fade" role="dialog" aria-labelledby="modal-edit-daftar-susunan-keluarga-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-daftar-susunan-keluarga-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-daftar-susunan-keluarga'); ?>
				<input type="hidden" id="id_kk_detail" name="id_kk_detail">
				<input type="hidden" id="id_pegawai" name="id_pegawai">
				<div style="margin: 0.2rem 0.2rem">
					<div class="form-group row tight">
						<label for="nama-lengkap-edit" class="col-form-label">Nama Lengkap </label>
						<input id="nama-lengkap-edit" name="nama_lengkap" class="form-control reset-field" type="text" placeholder="Nama Lengkap">
					</div>

					<div class="form-group row tight">
						<label for="nik-keluarga-edit" class="col-form-label">Nik </label>
						<input id="nik-keluarga-edit" name="nik_keluarga" class="form-control reset-field" type="number" placeholder="NIK">
					</div>

					<div class="form-group row tight">
						<label for="jenis-kelamin-keluarga-edit" class="col-form-label">Jenis Kelamin </label>
						<select class="custom-select" id="jenis-kelamin-keluarga-edit" name="jenis_kelamin_keluarga">
							<option>Pilih Jenis kelamin</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>

					<div class="form-group row tight">
						<label for="tempat-lahir-keluarga-edit" class="col-form-label">Tempat lahir </label>
						<input type="text" id="tempat-lahir-keluarga-edit" class="select2-input" name="tempat_lahir_keluarga">
					</div>

					<div class="form-group row tight">
						<label for="tanggal-lahir-keluarga-edit" class="col-form-label">Tanggal Lahir </label>
						<input id="tanggal-lahir-keluarga-edit" class="form-control reset-field" type="date" name="tgl_lahir_keluarga">
					</div>

					<div class="form-group row tight">
						<label for="pendidikan-keluarga-edit" class="col-form-label">Pendidikan Keluarga</label>
						<?= form_dropdown('pendidikan_keluarga', $pendidikan, array(), 'class="custom-select reset-select" id=pendidikan-keluarga-edit') ?>
					</div>

					<div class="form-group row tight">
						<label for="jenis-pekerjaan-keluarga-edit" class="col-form-label">Jenis Pekerjaan </label>
						<select class="custom-select" id="jenis-pekerjaan-keluarga-edit" name="jenis_pekerjaan_keluarga">
							<option value="karyawan swasta">Karyawan Swasta</option>
							<option value="asn">ASN</option>
							<option value="guru">Guru</option>
							<option value="lainnya">Lainnya...</option>
						</select>
					</div>

					<div class="form-group row tight hide">
						<label for="jenis-pekerjaan-keluarga-lainnya" class="col-form-label">Pekerjaan lainnya </label>
						<input id="jenis-pekerjaan-keluarga-lainnya" class="form-control reset-field" type="text" placeholder="Jenis Pekerjaan Lainnya" name="jenis_pekerjaan_keluarga_lainnya">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-susunan-keluarga"> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Edit Daftar Susunan Keluarga -->

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

<!-- Modal Edit Riwayat Jabatan Pegawai -->
<div id="modal-edit-riwayat-jabatan-pegawai" class="modal fade" role="dialog" aria-labelledby="modal-edit-riwayat-jabatan-pegawai-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-riwayat-jabatan-pegawai-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-riwayat-jabatan-pegawai'); ?>
				<input type="hidden" id="id-riwayat-jabatan" name="id_riwayat_jabatan">
				<input type="hidden" id="id-pegawai-riwayat-jabatan" name="id_pegawai">
				<div class="row" style="margin: 0.2rem 0.2rem">
					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tmt-jabatan-edit" class="col-form-label">TMT Jabatan </label>
							<input id="tmt-jabatan-edit" name="tmt_jabatan" class="form-control reset-field" type="date">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="unit-kerja-edit" class="col-form-label"> Pilih Unit Kerja</label>
							<input type="text" id="unit-kerja-edit" class="select2-input" name="unit_kerja">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="no-sk-jabatan-edit" class="col-form-label">NO SK </label>
							<input id="no-sk-jabatan-edit" name="no_sk_jabatan" class="form-control reset-field" type="text" placeholder="No. SK">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tgl-sk-jabatan-edit" class="col-form-label">Tanggal SK </label>
							<input id="tgl-sk-jabatan-edit" name="tgl_sk_jabatan" class="form-control reset-field" type="date">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="penandatangan-sk-jabatan-edit" class="col-form-label">Penandatangan SK </label>
							<input id="penandatangan-sk-jabatan-edit" name="pendandatangan_sk_jabatan" class="form-control reset-field" type="text" placeholder="Penandatangan SK">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="jenis-jabatan-jabatan-edit" class="col-form-label">Jenis Jabatan </label>
							<select id="jenis-jabatan-jabatan-edit" name="jenis_jabatan_jabatan" class="form-control reset-field">
								<option selected>Pilih Jenis Jabatan</option>
								<option value="jabatan struktural">Jabatan Struktural</option>
								<option value="jabatan fungsional umum">Jabatan Fungsional Umum</option>
								<option value="jabatan fungsional tertentu">Jabatan Fungsional Tertentu</option>
								<option value="guru">Guru</option>
							</select>
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="jabatan-jabatan-edit" class="col-form-label">Jabatan </label>
							<input id="jabatan-jabatan-edit" name="jabatan_jabatan" class="form-control reset-field" type="text" placeholder="Jabatan...">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="jenjang-jabatan-jabatan-edit" class="col-form-label">Jenjang Jabatan </label>
							<input id="jenjang-jabatan-jabatan-edit" name="jenjang_jabatan_jabatan" class="form-control reset-field" type="text" placeholder="Jenjang Jabatan">
						</div>

						<div class="form-group row tight" style="margin: 0.2rem 0.2rem">
							<label for="tugas-tambahan-jabatan-edit" class="col-form-label">Tugas Tambahan </label>
							<select id="tugas-tambahan-jabatan-edit" name="tugas_tambahan_jabatan" class="form-control reset-field">
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
								<img class="preview" src="#" alt="Preview Gambar" width="350" id="preview-fc-sk-jabatan-edit">
							</div>
						</div>

						<div class="form-group row" style="margin: 0.2rem 0.2rem;">
							<label for="fc-sk-jabatan" class=" col-form-label">FC. SK Jabatan</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="fc-sk-jabatan-edit" accept=".jpg, .jpeg, .png" name="fc_sk_jabatan">
								<label class="custom-file-label" for="fc-sk-jabatan-edit">Pilih Foto</label>
							</div>

						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-riwayat-jabatan-pegawai"> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Edit Riwayat Jabatan Pegawai -->

<?php $this->load->view('js') ?>

<script>
	$(function () {
		setTimeout(() => {
			$('#s2id_tmp-lahir-pegawai a .select2-chosen').html('<?= $data_pegawai->nama_kota_kabupaten ?>')
			$('#s2id_profesi-pegawai-auto a .select2-chosen').html('<?= $data_pegawai->profesi ?>')
			$('#s2id_jabatan-pegawai a .select2-chosen').html('<?= $data_pegawai->jabatan ?>')
		}, 250)
	})
</script>
