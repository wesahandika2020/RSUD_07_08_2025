<div id="modal_surat_kontrol" class="modal fade" data-backdrop="static" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="min-width:80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title bold" id="modal_surat_kontrol_label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form_surat_kontrol') ?>
				<div class="row mb-3 form_search_kontrol">
					<div class="col-md-4">
						<div class="form-group row tight">
							<label class="col-md-2 col-form-label right">Pilih :</label>
							<div class="col-md-6">
								<select id="rencana_kontrol" class="form-control clear">
									<option value="2">Kontrol</option>
									<option value="1">Rawat Inap / SPRI</option>
								</select>
							</div>
						</div>
						<div class="form-group row tight no_sep_kontrol">
							<label class="col-md-2 col-form-label no_label right">No. SEP :</label>
							<div class="col-md-9">
								<input type="text" id="no_kartu_kontrol" class="form-control clear" placeholder="Masukkan Nomor...">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-md-2 col-form-label right"></label>
							<div class="col-md-9">
								<button type="button" id="btn_search_data" class="btn btn-info waves-effect"><i class="fas fa-search mr-1"></i>Cari Data</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								<div class="list-group data_sep" style="display:none">
									<a class="list-group-item list-group-item-info bold"><i class="fas fa-envelope mr-1"></i>SEP</a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-sort-numeric-down mr-2"></i><span class="bold text_nosep"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-calendar-alt mr-2"></i><span class="bold text_tglsep"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-medkit mr-2"></i><span class="bold text_jenpel"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-bookmark mr-2"></i><span class="bold text_poli"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-heartbeat mr-2"></i><span class="bold text_diagnosa"></span></a>
								</div>
								<div class="list-group mt-3 data_asal_rujukan" style="display:none">
									<a class="list-group-item list-group-item-success bold"><i class="fas fa-hospital-alt mr-2"></i>Asal Rujukan SEP</a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-sort-numeric-down mr-2"></i><span class="bold text_norujukan"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-calendar-alt mr-2"></i><span class="bold text_tglrujukan"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-search mr-2"></i><span class="bold text_faskesasalrujukan"></span></a>
								</div>
								<div class="list-group mt-3 data_peserta" style="display:none">
									<a class="list-group-item list-group-item-primary bold"><i class="fas fa-hospital-alt mr-2"></i>Peserta</a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-sort-numeric-down mr-2"></i><span class="bold text_nokartupeserta"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-user mr-2"></i><span class="bold text_namapeserta"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-calendar-alt mr-2"></i><span class="bold text_tgllahirpeserta"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-transgender-alt mr-2"></i><span class="bold text_kelaminpeserta"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-user mr-2"></i><span class="bold text_kelaspeserta"></span></a>
									<a class="list-group-item list-group-item-action"><i class="fas fa-user-md mr-2"></i><span class="bold text_ppkpeserta"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_kontrol" style="display:none">
							<input type="hidden" name="nomor">
							<input type="hidden" name="jenis_pelayanan">
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">Tgl. Rencana Kontrol / Inap :</label>
								<div class="col-md-5">
									<input type="text" name="tgl_rencana_kontrol" id="tgl_rencana" class="form-control clear" value="<?php echo date('d/m/Y') ?>">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">Pelayanan :</label>
								<div class="col-md-5">
									<select id="jenis_pelayanan_kontrol" class="form-control" disabled>
										<option value="2">Rawat Jalan</option>
										<option value="1">Rawat Inap</option>
									</select>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">No. Surat Kontrol :</label>
								<div class="col-md-8">
									<div class="input-group">
										<input type="text" name="no_surat" id="no_surat_kontrol" class="form-control clear" placeholder="Nomor Surat Kontrol..." readonly>
									</div>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">Spesialis / SubSpesialis <span class="text-red">*</span> :</label>
								<div class="col-md-8">
									<div class="input-group">
										<input type="text" name="spesialis" id="spesialis_kontrol" class="form-control clear" placeholder="Nama Spesialis / Sub spesialis..." readonly>
										<input type="hidden" name="kode_poli_asal" id="txtkdpoli_asal">
										<input type="hidden" name="kode_poli" id="txtkdpoli">
										<input type="hidden" name="nama_poli_asal" id="txtnmpoli_asal">
										<input type="hidden" name="jenis_pelayanan_sep" id="txtjnspelsep">
										<input type="hidden" name="nama_diagnosa" id="txtnmdiagnosa">
										<input type="hidden" name="jumlah_rujukan" id="txtjumlahrujukan">
										<input type="hidden" name="prosentase" id="txtprosentase">
										<input type="hidden" name="tgl_entri_rencana_kontrol" id="txttglentrirencanakontrol" value="<?php echo date('Y-m-d') ?>">
										<div class="input-group-append">
											<button class="btn btn-success" type="button" onclick="chooseSpesialistik()"><i class="fas fa-hospital-alt"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right">DPJP Tujuan Kontrol / Inap <span class="text-red">*</span> :</label>
								<div class="col-md-8">
									<input type="text" name="nama_dpjp" id="dpjp_kontrol" class="form-control clear" placeholder="Nama Dokter DPJP pemberi surat kontrol..." readonly>
									<input type="hidden" name="kode_dpjp" id="txtkddpjp">
									<input type="hidden" name="pasca_inap" id="txtpascainap">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-md-4 col-form-label right"></label>
								<div class="col-md-8">
									<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSuratKontrol('create')"><i class="fas fa-save"></i> Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div id="modal_spesialistik" class="modal fade" data-backdrop="static" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="min-width:60%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title bold"><i class="fas fa-calendar-alt mr-2"></i>Jadwal Praktek Rumah Sakit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover table-striped table-sm color-table info-table" id="table_list_spesialistik_kontrol">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="left">Nama Spesialis/Sub</th>
							<th class="center">Kapasitas</th>
							<th class="center">Jml. Rencana Kontrol & Rujukan</th>
							<th class="center">Prosentase</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Tutup</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div id="modal_dokter_kontrol" class="modal fade" data-backdrop="static" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="min-width:50%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title bold"><i class="fas fa-calendar-alt mr-2"></i>Data Dokter</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover table-striped table-sm color-table info-table" id="table_list_dokter_kontrol">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="left">Nama Dokter</th>
							<th class="center">Jadwal Praktek</th>
							<th class="center">Kapasitas</th>
							<th class="center"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Tutup</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div id="modal_search" class="modal fade" data-backdrop="static" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title bold"><i class="fas fa-calendar-alt mr-2"></i>Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', 'id="form_search"') ?>
				<div class="form-group">
					<label class="col-form-label">Tanggal</label>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?php echo date('d/m/Y') ?>" placeholder="Tanggal Awal">
						</div>
						<div class="col-md-6">
							<input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?php echo date('d/m/Y') ?>" placeholder="Tanggal Akhir">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Filter</label>
					<select name="filter" id="filter" class="form-control form-select">
						<option value="1" selected>Tanggal Entri</option>
						<option value="2">Tanggal Rencana Kontrol</option>
					</select>
				</div>
				<?php echo form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Tutup</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDataSuratKontrol()"><i class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>