<!-- Modal Search -->
<div id="modal-input-ppi" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-input-ppi-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
		<div class="modal-content">
			<div class="modal-header center">
				<h4 class="modal-title" id="modal-input-ppi-label"></h4>
				<!-- <button id="btn-close-silang-modal-ppi" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6">
						<table class="table table-striped table-hover table-sm">
							<tbody>
								<tr>
									<td width="30%"><b>Tanggal Masuk</b></td>
									<td><span id="tanggal-masuk-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Nomor RM</b></td>
									<td><span id="no-rm-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Nama Pasien</b></td>
									<td><span id="nama-pasien-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Jenis Kelamin</b></td>
									<td><span id="kelamin-ppi"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-6">
						<table class="table table-striped table-hover table-sm">
							<tbody>
								<tr>
									<td width="30%"><b>Tanggal Keluar</b></td>
									<td><span id="tanggal-keluar-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Umur</b></td>
									<td><span id="umur-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Ruang</b></td>
									<td><span id="ruang-ppi"></span></td>
								</tr>
								<tr>
									<td width="30%"><b>Dokter</b></td>
									<td><span id="dokter-ppi"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-12">
					<label>Operator :</label>
					<label><b><?= $this->session->userdata("nama") ?></b></label>
				</div>



				<div class="card-body">
					<!-- <h4 class="card-title m-b-40">Tab with dropdown</h4> -->
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item"> <a class="nav-link" id="peralatan-ppi-tab" data-toggle="tab" href="#input-peralatan-ppi" role="tab" aria-controls="peralatan-ppi" ><span class="hidden-sm-up"><i class="ti-pencil-alt"></i></span> <span class="hidden-xs-down">Input Pemakaian Alat Medis</span></a> </li>
						<li class="nav-item"> <a class="nav-link" id="kultur-antiobika-tab" data-toggle="tab" href="#input-kultur-antiobika" role="tab" aria-controls="kultur-antiobika"><span class="hidden-sm-up"><i class="ti-layout-list-thumb"></i></span> <span class="hidden-xs-down">Input Kultur & Antiobika</span></a></li>
						<!-- <li class="nav-item"> <a class="nav-link" id="data-ppi-tab" data-toggle="tab" href="#show-data-ppi" role="tab" aria-controls="show-data"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Lihat Hasil Input PPI</span></a></li> -->
					</ul>

					<?= form_open('', 'id=form-input-ppi role=form class=form-horizontal') ?>
					<div class="tab-content tabcontent-border p-20" id="myTabContent">
						<div class="tab-pane fade" id="input-peralatan-ppi" role="tabpanel" aria-labelledby="peralatan-ppi-tab">
							<div class="form-group" style="padding: 0px 200px;">
								<input type="hidden" id="id_bangsal" name="id_bangsal">
								<input type="hidden" id="id-ppi" name="id_ppi">

								<div style="display: flex;align-items: flex-end;" class="row">
									<div class="form-group col-lg-2">
										<label>ETT</label>
										<input type="number" id="ett" name="ett" value="<?= set_value('ett') == "" ? "0" : set_value('ett'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>CVL</label>
										<input type="number" id="cvl" name="cvl" value="<?= set_value('cvl') == "" ? "0" : set_value('cvl'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>IVL</label>
										<input type="number" id="ivl" name="ivl" value="<?= set_value('ivl') == "" ? "0" : set_value('ivl'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>UC</label>
										<input type="number" id="uc" name="uc" value="<?= set_value('uc') == "" ? "0" : set_value('uc'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>Tirah Baring</label>
										<input type="number" id="tirah_baring" name="tirah_baring" value="<?= set_value('tirah_baring') == "" ? "0" : set_value('tirah_baring'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>Operasi</label>
										<input type="number" id="operasi" name="operasi" value="<?= set_value('operasi') == "" ? "0" : set_value('operasi'); ?>" class="form-control form-control-sm">
									</div>

									<!-- Batas pasangan input -->

								</div>
								<div style="display: flex;align-items: flex-end;" class="row">
									<!-- Batas pasangan input -->

									<div class="form-group col-lg-2">
										<label>VAP</label>
										<input type="number" id="vap" name="vap" value="<?= set_value('vap') == "" ? "0" : set_value('vap'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>IADP</label>
										<input type="number" id="iadp" name="iadp" value="<?= set_value('iadp') == "" ? "0" : set_value('iadp'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>Plebitis</label>
										<input type="number" id="plebitis" name="plebitis" value="<?= set_value('plebitis') == "" ? "0" : set_value('plebitis'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>ISK</label>
										<input type="number" id="isk" name="isk" value="<?= set_value('isk') == "" ? "0" : set_value('isk'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>Dekubitus</label> <!-- dekubitus -->
										<input type="number" id="dekubitus" name="dekubitus" value="<?= set_value('dekubitus') == "" ? "0" : set_value('dekubitus'); ?>" class="form-control form-control-sm">
									</div>

									<div class="form-group col-lg-2">
										<label>IDO</label> <!-- dekubitus -->
										<input type="number" id="ido" name="ido" value="<?= set_value('ido') == "" ? "0" : set_value('ido'); ?>" class="form-control form-control-sm">
									</div>
								</div>

								<div class="form-group mt-4 m-b-0">
									<label>Keterangan</label>
									<input type="text" id="keterangan" name="keterangan" value="<?= set_value('keterangan') ?>" placeholder="Keterangan......" class="form-control">
								</div>
								<span class="text-red"><small><b><i> *</i></b></small></span><span><small><b><i>Simpan terlebih dahulu data pemakaian peralatan medis sebelum menambahkan data <u>kultur</u> dan <u>antiobika</u>. </i></b></small></span>

								<span class="d-flex justify-content-end" id="btn-simpan-ppi"></span>
								<!-- <span class="d-flex justify-content-end" id="btn-next-ppi"></span> -->
							</div>
						</div>
						<div style="margin-bottom: 3rem;" class="tab-pane fade md-5" id="input-kultur-antiobika" role="tabpanel" aria-labelledby="kultur-antiobika-tab">
							<div class="row mt-2">
								<div class=" form-group col-lg-6">
									<label>Kultur</label>
									<div class="row">
										<div style="padding-right: 0;" class="col-lg-9">
											<input style="height: auto;" type="text" name="kultur" id="kultur_search" class="select2-input" placeholder="-- Pilih Kultur --">
										</div>
										<div style="padding-left: 0;" class="col-lg-3">
											<span class="mr-2" id="btn-simpan-kultur-ppi"></span>
										</div>
										<span style="margin-left: 10px;" id="btn-add-kultur"></span>
									</div>
									<div class="table-responsive  mt-4" id="parent">
										<table id="table-kultur-ppi" class="table table-hover table-striped table-bordered table-sm color-table info-table">
											<thead>
												<tr>
													<th rowspan="2" width="5%" class="center">No.</th>
													<th rowspan="2" width="20%" class="center">Tanggal Input</th>
													<th rowspan="2" width="40%" class="left">Kultur</th>
													<th rowspan="2" width="30%" class="Center">Operator</th>
													<th rowspan="2" width="5%" class="left"></th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>

								<div class="form-group col-lg-6">
									<label>Antiobika</label>
									<div class="row">
										<div style="padding-right: 0;" class="col-lg-9">
											<input style="height: auto;" type="text" name="antiobika" id="antiobika_search" class="select2-input" placeholder="-- Pilih Antiobika --">
										</div>
										<div style="padding-left: 0;" class="col-lg-3">
											<span class="mr-2" id="btn-simpan-antiobika-ppi"></span>
										</div>
										<span style="margin-left: 10px;" id="btn-add-antiobika"></span>
									</div>
									<div class="table-responsive  mt-4" id="parent">
										<table id="table-antiobika-ppi" class="table table-hover table-striped table-bordered table-sm color-table info-table">
											<thead>
												<tr>
													<th rowspan="2" width="5%" class="center">No.</th>
													<th rowspan="2" width="20%" class="center">Tanggal Input</th>
													<th rowspan="2" width="40%" class="left">Antiobika</th>
													<th rowspan="2" width="30%" class="center">Operator</th>
													<th rowspan="2" width="5%" class="left"></th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
								<!-- <div class="form-group col-lg-1">
							</div> -->
							</div>
						</div>
						<!-- <div class="tab-pane fade" id="show-data-ppi" role="tabpanel" aria-labelledby="data-ppi-tab">

						</div> -->
					</div>
					<?= form_close() ?>

				</div>
			</div>
			<div class="modal-footer">
				<button id="btn-close-modal-ppi" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<!-- <span id="btn-simpan-ppi"></span> -->
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->


<!-- Modal Add Kultur -->
<div id="modal-add-masterdata-ppi" class="modal fade" data-backdrop="static" role="dialog" aria-labelledby="modal-add-masterdata-ppi-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header center">
				<h4 class="modal-title" id="modal-add-masterdata-ppi-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-striped table-hover table-sm">
							<tbody>
								<tr>
									<td width="30%"><b>Nama Operator</b></td>
									<td><b>: <?= $this->session->userdata("nama") ?></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<?= form_open('', 'id=form-input-masterdata-ppi role=form class=form-horizontal') ?>
				<div class="row col-lg-12 mt-3">
					<div class="col-lg-12">
						<div class="row">
							<div class="form-group col-lg-12">
								<label id="label-input-masterdata"></label>
								<input type="text" id="nama-masterdata" name="nama_masterdata" value="<?= set_value('nama_masterdata') ?>" class="form-control">
							</div>
							<div class="form-group col-lg-1">
							</div>
						</div>
					</div>

				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
				<span id="btn-simpan-masterdata-ppi"></span>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Add Kultur -->