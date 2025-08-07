<div id="warp-detail-pegawai" class="card">
	<div class="card-body">
		<div class="row">
			<div class="col">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item"><a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-expanded="true"><span
									class="hidden-sm-up"><i
										class="fas fa-users"></i></span> <span class="hidden-xs-down">Profil</span></a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="hidden-sm-up"><i class="fas fa-book"></i></span> <span class="hidden-xs-down">Biodata</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" id="data-utama-tab" href="#data-utama" role="tab" data-toggle="tab" aria-controls="data-utama"><i class="fas fa-server"></i> Data Utama</a>
							<a class="dropdown-item" id="kartu-keluarga-tab" href="#kartu-keluarga" role="tab" data-toggle="tab" aria-controls="kartu-keluarga"><i class="fas fa-users"></i> Kartu
								Keluarga</a></div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="hidden-sm-up"><i class="fas fa-address-card"></i></span> <span class="hidden-xs-down">Kepegawaian</span>
						</a>
						<div class="dropdown-menu">
							<?php
							$href = '';
							$aria = '';
							$id   = '';
							$html = '';
							$icon = '';

							if ($data_pegawai->jenis_asn === 'pns')
							{
								$href = 'pns';
								$aria = 'pns';
								$id   = 'pns-tab';
								$html = 'PNS';
								$icon = '<i class="fas fa-star"></i>';
							} elseif ($data_pegawai->jenis_asn === 'cpns')
							{
								$href = 'cpns';
								$aria = 'cpns';
								$id   = 'cpns-tab';
								$html = 'CPNS';
								$icon = '<i class="fas fa-star-half-alt"></i>';
							} elseif ($data_pegawai->jenis_asn === 'pppk')
							{
								$href = 'pppk';
								$aria = 'pppk';
								$id   = 'pppk-tab';
								$html = 'PPPK';
								$icon = '<i class="far fa-star"></i>';
							} elseif ($data_pegawai->jenis_asn === 'tkk')
							{
								$href = 'tkk';
								$aria = 'tkk';
								$id   = 'tkk-tab';
								$html = 'TKK';
								$icon = '<i class="far fa-star-half"></i>';
							}
							?>
							<a class="dropdown-item" id="<?= $id ?>" href="#<?= $href ?>" role="tab" data-toggle="tab" aria-controls="<?= $aria ?>"><?= $icon.' '.$html ?></a>
							<a class="dropdown-item" id="sk-kepangkatan-tab" href="#sk-kepangkatan" role="tab" data-toggle="tab" aria-controls="sk-kepangkatan"><i class="fas fa-signal"></i> Kepangkatan</a></div>
					</li>
					<!--									<li class="nav-item"> <a class="nav-link" id="jabatan-pegawai" data-toggle="tab" href="#jabatanPegawai" role="tab" aria-controls="jabatanPegawai" aria-expanded="true"><span class="hidden-sm-up"><i class="fas fa-briefcase"></i></span> <span class="hidden-xs-down">Jabatan</span></a> </li>-->
					<!--									<li class="nav-item"> <a class="nav-link" id="profesi-pegawai" data-toggle="tab" href="#profesiPegawai" role="tab" aria-controls="profesiPegawai" aria-expanded="true"><span class="hidden-sm-up"><i class="fab fa-black-tie"></i></span> <span class="hidden-xs-down">Profesi</span></a> </li>-->
					<!--									<li class="nav-item"> <a class="nav-link" id="tenaga-medis" data-toggle="tab" href="#tenagaMedis" role="tab" aria-controls="tenagaMedis" aria-expanded="true"><span class="hidden-sm-up"><i class="fa fa-user-md"></i></span> <span class="hidden-xs-down">Tenaga Medis</span></a> </li>-->
				</ul>
				<div class="tab-content tabcontent-border p-20" id="myTabContent">
					<div role="tabpanel" class="tab-pane fade show active" id="profil" aria-labelledby="profil-tab">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col">
										<ul class="list-group m-b-10">
											<li class="list-group-item bg-theme text-white">
												<i class="far fa-id-card m-r-5"></i>
												<b>Detail Pegawai</b>
											</li>
											<li class="list-group-item border-theme">
												<div style="display: grid;grid-template-columns: 9rem 1px 1fr; gap: 1rem">
													<b>Nama Lengkap</b>
													<span>:</span>
													<span><?= $data_pegawai->nama ?></span>

													<b>Jenis Kelamin</b>
													<span>:</span>
													<span><?= $data_pegawai->kelamin === 'L' ? 'Laki-laki' : 'Perempuan' ?></span>

													<b>NIP</b>
													<span>:</span>
													<span><?= $data_pegawai->nip ?></span>

													<b>Tempat Lahir</b>
													<span>:</span>
													<span><?= $data_pegawai->nama_kota_kabupaten ?></span>

													<b>Tanggal Lahir</b>
													<span>:</span>
													<span><?= $data_pegawai->tgl_lahir !== NULL ? datefmysql($data_pegawai->tgl_lahir) : '-' ?></span>

													<b>Agama</b>
													<span>:</span>
													<span><?= $data_pegawai->agama ?? '-' ?></span>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<ul class="list-group m-b-10">
											<li class="list-group-item bg-warning text-white">
												<i class="fas fa-bars m-r-5"></i>
												<b>Jabatan</b>
											</li>
											<li class="list-group-item border-warning">
												<div style="display: grid;grid-template-columns: 9rem 1px 1fr; gap: 1rem">
													<b>TMT Jabatan</b>
													<span>:</span>
													<?php if (!empty($data_riwayat_jabatan_pegawai)) : ?>
															<span><?= datefmysql($data_riwayat_jabatan_pegawai[0]->tmt) ?></span>
													<?php else: ?>
														<span>-</span>
													<?php endif; ?>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<?php if ($data_pegawai->jenis_asn !== 'tkk') : ?>
									<div class="row">
										<div class="col">
											<ul class="list-group m-b-10">
												<li class="list-group-item bg-warning text-white">
													<i class="fas fa-bars m-r-5"></i>
													<b><?= strtoupper($data_pegawai->jenis_asn) ?></b>
												</li>
												<li class="list-group-item border-warning">
													<div style="display: grid;grid-template-columns: 9rem 1px 1fr; gap: 1rem">
														<b>TMT <?= strtoupper($data_pegawai->jenis_asn) ?></b>
														<span>:</span>
														<span><?= $data_pegawai->tmt ?? '-' ?></span>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<ul class="list-group m-b-10">
												<li class="list-group-item bg-warning text-white">
													<i class="fas fa-sort-amount-down m-r-5"></i>
													<b>Kepangkatan</b>
												</li>
												<li class="list-group-item border-warning">
													<div style="display: grid;grid-template-columns: 9rem 1px 1fr; gap: 1rem">
														<b>TMT Pangkat</b>
														<span>:</span>
														<?php if (!empty($data_sk_kepangkatan_pegawai)) : ?>
															<span><?= datefmysql($data_sk_kepangkatan_pegawai[0]->tmt) ?></span>
														<?php else: ?>
															<span>-</span>
														<?php endif; ?>
													</div>
												</li>
											</ul>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col">
										<ul class="list-group m-b-10">
											<li class="list-group-item bg-success text-white">
												<i class="fas fa-image m-r-5"></i>
												<b>Foto Pegawai</b>
											</li>
											<li class="list-group-item border-success">
												<div class="card">
													<img src="<?= resource_url().'images/avatars/'.$data_pegawai->profil ?>" alt="Foto Pegawai">
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade show" id="data-utama" aria-labelledby="data-utama-tab">
						<div class="row">
							<div class="col-md-6">
								<ul class="list-group m-b-10">
									<li class="list-group-item bg-theme text-white">
										<i class="far fa-id-card m-r-5"></i>
										<b>Data Utama Pegawai</b>
									</li>
									<li class="list-group-item border-theme">
										<div style="display: grid;grid-template-columns: 9rem 1px 1fr; gap: 1rem">
											<b>Nama Pegawai</b>
											<span>:</span>
											<span><?= $data_pegawai->nama ?></span>

											<b>Jenis Kelamin</b>
											<span>:</span>
											<span><?= $data_pegawai->kelamin === 'L' ? 'Laki-laki' : 'Perempuan' ?></span>

											<b>NIP</b>
											<span>:</span>
											<span><?= $data_pegawai->nip ?></span>

											<b>Tempat Lahir</b>
											<span>:</span>
											<span><?= $data_pegawai->nama_kota_kabupaten ?></span>

											<b>Tanggal Lahir</b>
											<span>:</span>
											<span><?= $data_pegawai->tgl_lahir !== NULL ? datefmysql($data_pegawai->tgl_lahir) : '-' ?></span>

											<b>Agama</b>
											<span>:</span>
											<span><?= $data_pegawai->agama ?? '-' ?></span>

											<b>No HP</b>
											<span>:</span>
											<span><?= $data_pegawai->hp ?? '-' ?></span>

											<b>No Tlp. Rumah</b>
											<span>:</span>
											<span><?= $data_pegawai->tlp ?? '-' ?></span>

											<b>Email</b>
											<span>:</span>
											<span><?= $data_pegawai->email ?? '-' ?></span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade show" id="kartu-keluarga" aria-labelledby="kartu-keluarga-tab">
						<div class="row">
							<div class="col">
								<ul class="list-group m-b-10">
									<li class="list-group-item bg-success text-white">
										<i class="fas fa-users m-r-5"></i>
										<b>Kartu Keluarga</b>
									</li>
									<li class="list-group-item border-success">
										<div class="row">
											<div class="col-md-2">
												<div class="card">
													<img src="<?= resource_url().'images/avatars/'.$data_kk_pegawai->foto_kk ?>" alt="Foto Fc KK">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="no-kk" class="col-form-label">Nomor Kartu Keluarga</label>
													<input type="text" class="form-control reset-field" id="no-kk" disabled value="<?= $data_kk_pegawai->no_kk ?>">
												</div>

												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="tgl-kk" class="col-form-label">Tanggal Kartu Keluarga</label>
													<input type="text" class="form-control reset-field" id="tgl-kk" disabled value="<?= $data_kk_pegawai->tgl_kk ?>">
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="col">
								<ul class="list-group m-b-10">
									<li class="list-group-item bg-info text-white">
										<i class="fas fa-users m-r-5"></i>
										<b>Daftar Susunan Keluarga</b>
									</li>
									<li class="list-group-item border-info">
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
											</tr>
											</thead>
											<tbody>
											<?php if (!empty($data_kk_pegawai_detail)) : ?>
												<?php foreach ($data_kk_pegawai_detail as $key => $item): ?>
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
													</tr>
												<?php endforeach ?>
											<?php endif ?>
											</tbody>
										</table>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade show" id="<?= $href ?>" aria-labelledby="<?= $id ?>">
						<div class="row">
							<div class="col">
								<ul class="list-group m-b-10">
									<li class="list-group-item bg-success text-white">
										<?= $icon ?>
										<b><?= $html ?></b>
									</li>
									<li class="list-group-item border-success">
										<div class="row">
											<div class="col-md-2">
												<label for="" class="col-form-label">FC. SK <?= $html ?></label>
												<div class="card">
													<img src="<?= resource_url().'images/avatars/'.$data_pegawai->fc_sk ?>" alt="Foto Fc KK">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="tmt-<?= $href ?>" class="col-form-label">TMT <?= $html ?></label>
													<input type="text" class="form-control reset-field" id="tmt-<?= $href ?>" disabled value="<?= $data_pegawai->tmt ?? '-' ?>">
												</div>
												<?php if ($data_pegawai->jenis_asn === 'pppk'): ?>
													<div class="form-group row" style="margin: 0.2rem 0.2rem;">
														<label for="golongan" class="col-form-label`">Golongan</label>
														<input type="text" class="form-control reset-field" id="golongan" disabled value="<?= $data_pegawai->golongan ?? '-' ?>">
													</div>

													<div class="form-group row" style="margin: 0.2rem 0.2rem;">
														<label for="gaji-pokok" class="col-form-label`">Gaji Pokok</label>
														<input type="text" class="form-control reset-field" id="gaji-pokok" disabled value="<?= $data_pegawai->gaji_pokok ?? '-' ?>">
													</div>
												<?php endif; ?>

												<?php if ($data_pegawai->jenis_asn === 'cpns'): ?>
													<?php
													$masa_kerja = NULL;
													if ( ! empty($data_pegawai->masa_kerja_cpns))
													{
														$masa_kerja = json_decode($data_pegawai->masa_kerja_cpns);
													}
													?>
													<div class="form-group row" style="margin: 0.2rem 0.2rem;">
														<label for="golongan" class="col-form-label`">Masa Kerja Pengangkatan CPNS</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="label-tahun">Tahun</span>
															</div>
															<input type="number" class="form-control" placeholder="tahun" aria-label="tahun" aria-describedby="tahun" name="tahun" id="tahun"
																   value="<?= $masa_kerja ? $masa_kerja->tahun : '-' ?>">
														</div>
													</div>

													<div class="form-group row" style="margin: 0 0.2rem;">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="label-bulan">Bulan</span>
															</div>
															<input type="number" class="form-control" placeholder="bulan" aria-label="bulan" aria-describedby="bulan" name="bulan" id="bulan"
																   value="<?= $masa_kerja ? $masa_kerja->bulan : '-' ?>">
														</div>
													</div>
												<?php endif; ?>
											</div>
											<div class="col-md-5">
												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="no-sk" class="col-form-label`">Nomor SK</label>
													<input type="text" class="form-control reset-field" id="no-sk" disabled value="<?= $data_pegawai->no_sk ?? '-' ?>">
												</div>

												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="tgl-sk" class="col-form-label`">Tanggal SK</label>
													<input type="text" class="form-control reset-field" id="tgl-sk" disabled value="<?= $data_pegawai->tgl_sk ?? '-' ?>">
												</div>

												<div class="form-group row" style="margin: 0.2rem 0.2rem;">
													<label for="tgl-sk" class="col-form-label`">Pejabat Penetap SK</label>
													<input type="text" class="form-control reset-field" id="tgl-sk" disabled value="<?= $data_pegawai->pejabat_penetap ?? '-' ?>">
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade show" id="sk-kepangkatan" aria-labelledby="sk-kepangkatan-tab">
						<div class="row">
							<div class="col">
								<ul class="list-group m-b-10">
									<li class="list-group-item bg-success text-white">
										<i class="fas fa-signal m-r-5"></i>
										<b>Riwayat Kepangkatan Pegawai</b>
									</li>
									<li class="list-group-item border-success">
										<table class="table mt-4 table-bordered" id="table-sk-kepangkatan">
											<thead>
											<tr>
												<th class="center">No</th>
												<th class="center">Fc. SK Pangkat</th>
												<th class="center">Pangkat / Golongan TMT pangkat</th>
												<th class="center">Angka Kredit</th>
												<th class="center">SAPK</th>
											</tr>
											</thead>
											<tbody>
											<?php if (!empty($data_sk_kepangkatan_pegawai)) : ?>
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
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
											</tbody>
										</table>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
