<!-- Modal Jabatan -->
<div id="modal-jabatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-jabatan-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-jabatan-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=formjabatan'); ?>
				<div class="form-group tight">
					<input type="text" name="nama_jabatan" id="nama-jabatan" class="form-control" placeholder="Nama Jabatan">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-jabatan"><i class="fas fa-save"></i> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Jabatan -->

<!-- Modal Edit Jabatan -->
<div id="modal-edit-jabatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-edit-jabatan-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-jabatan-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=formeditjabatan'); ?>
				<input type="hidden" name="id" id="id-edit-jabatan">
				<div class="form-group tight">
					<input type="text" name="nama_jabatan" id="nama-edit-jabatan" class="form-control" placeholder="Nama Jabatan">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-jabatan"><i class="fas fa-save"></i> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Jabatan -->

<!-- Modal Tambah Tenaga Medis -->
<div id="modal-tambah-nadis" class="modal fade" role="dialog" aria-labelledby="modal-tambah-nadis-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-nadis-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tenaga-medis'); ?>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="pegawai-auto" class="col-md-3 col-form-label">Nama Pegawai <span class="text-red">*</span></label>
							<div class="col-md-9">
								<input type="text" name="id_pegawai" id="pegawai-auto" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="profesi" class="col-md-3 col-form-label">Profesi <span class="text-red">*</span></label>
							<div class="col-md-9">
								<input type="text" name="id_profesi" id="profesi-auto" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="nik" class="col-md-3 col-form-label">Spesialisasi</label>
							<div class="col-md-9">
								<input type="text" name="id_spesialisasi" id="spesialisasi-auto" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="tgl-mulai-praktek" class="col-md-3 col-form-label">Tanggal Mulai Praktek</label>
							<div class="col-md-9">
								<input name="tgl_mulai_praktek" id="tgl-mulai-praktek" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="kode-bpjs" class="col-md-3 col-form-label">Kode BPJS</label>
							<div class="col-md-9">
								<input type="text" name="kode_bpjs" class="form-control reset-field" id="kode-bpjs" placeholder="Kode BPJS">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="no-str" class="col-md-3 col-form-label">No. STR</label>
							<div class="col-md-9">
								<input type="number" name="no_str" class="form-control reset-field" id="no-str" placeholder="No. STR">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nostr" class="col-md-3 col-form-label">Masa Berlaku No. STR </label>
							<div class="col-md-9">
								<input name="masb_nostr" id="masb-nostr" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="no-sip" class="col-md-3 col-form-label">No. SIP</label>
							<div class="col-md-9">
								<input type="number" name="no_sip" class="form-control reset-field" id="no-sip" placeholder="No. SIP">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nosip" class="col-md-3 col-form-label">Masa Berlaku No. SIP </label>
							<div class="col-md-9">
								<input name="masb_nosip" id="masb-nosip" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="no-sik" class="col-md-3 col-form-label">No. SIK</label>
							<div class="col-md-9">
								<input type="number" name="no_sik" class="form-control reset-field" id="no-sik" placeholder="No. SIK">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nosik" class="col-md-3 col-form-label">Masa Berlaku No. SIK </label>
							<div class="col-md-9">
								<input name="masb_nosik" id="masb-nosik" class="form-control reset-field" type="date">
							</div>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-nadis"><i class="fas fa-save"></i> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Tenaga Medis -->

<!-- Modal Edit Tenaga Medis -->
<div id="modal-edit-nadis" class="modal fade" role="dialog" aria-labelledby="modal-edit-nadis-label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-nadis-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-tenaga-medis'); ?>
				<input type="hidden" id="id-nadis" name="id">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="pegawai-auto-edit" class="col-md-3 col-form-label">Nama Pegawai <span class="text-red">*</span></label>
							<div class="col-md-9">
								<input type="text" name="id_pegawai" id="pegawai-auto-edit" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="profesi-auto-edit" class="col-md-3 col-form-label">Profesi <span class="text-red">*</span></label>
							<div class="col-md-9">
								<input type="text" name="id_profesi" id="profesi-auto-edit" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="spesialisasi-auto-edit" class="col-md-3 col-form-label">Spesialisasi</label>
							<div class="col-md-9">
								<input type="text" name="id_spesialisasi" id="spesialisasi-auto-edit" class="select2-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="tgl-mulai-praktek-edit" class="col-md-3 col-form-label">Tanggal Mulai Praktek</label>
							<div class="col-md-9">
								<input name="tgl_mulai_praktek" id="tgl-mulai-praktek-edit" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="kode-bpjs-edit" class="col-md-3 col-form-label">Kode BPJS</label>
							<div class="col-md-9">
								<input type="text" name="kode_bpjs" class="form-control reset-field" id="kode-bpjs-edit" placeholder="Kode BPJS">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="no-str-edit" class="col-md-3 col-form-label">No. STR</label>
							<div class="col-md-9">
								<input type="number" name="no_str" class="form-control reset-field" id="no-str-edit" placeholder="No. STR">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nostr" class="col-md-3 col-form-label">Masa Berlaku No. STR </label>
							<div class="col-md-9">
								<input name="masb_nostr" id="masb-nostr-edit" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="no-sip" class="col-md-3 col-form-label">No. SIP</label>
							<div class="col-md-9">
								<input type="number" name="no_sip" class="form-control reset-field" id="no-sip-edit" placeholder="No. SIP">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nosip" class="col-md-3 col-form-label">Masa Berlaku No. SIP </label>
							<div class="col-md-9">
								<input name="masb_nosip" id="masb-nosip-edit" class="form-control reset-field" type="date">
							</div>
						</div>

						<div class="form-group row">
							<label for="no-sik" class="col-md-3 col-form-label">No. SIK</label>
							<div class="col-md-9">
								<input type="number" name="no_sik" class="form-control reset-field" id="no-sik-edit" placeholder="No. SIK">
							</div>
						</div>

						<div class="form-group row">
							<label for="masb-nosik" class="col-md-3 col-form-label">Masa Berlaku No. SIK </label>
							<div class="col-md-9">
								<input name="masb_nosik" id="masb-nosik-edit" class="form-control reset-field" type="date">
							</div>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-simpan-edit-nadis"><i class="fas fa-save"></i> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Tenaga Medis -->

<!-- Modal Tambah Profesi -->
<div id="modal-tambah-profesi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-profesi-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-profesi-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-profesi'); ?>
				<div class="form-group tight">
					<input type="text" name="nama_profesi" id="nama-profesi" class="form-control" placeholder="Nama Profesi">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-profesi"><i class="fas fa-save"></i> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Profesi -->

<!-- Modal Edit Profesi -->
<div id="modal-edit-profesi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-edit-profesi-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-profesi-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-profesi'); ?>
				<input type="hidden" id="id-profesi" name="id">
				<div class="form-group tight">
					<input type="text" name="nama_profesi" id="nama-edit-profesi" class="form-control" placeholder="Nama Profesi">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-profesi"><i class="fas fa-save"></i> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Profesi -->

<!-- Modal Tambah Unit Kerja -->
<div id="modal-tambah-unit-kerja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-unit-kerja-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-tambah-unit-kerja-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-unit-kerja'); ?>
				<div class="form-group row">
					<label for="unit-parent" class="col-md-3 col-form-label">Unit Parent </label>
					<input type="text" name="unit_parent" id="unit-parent" class="select2-input">
				</div>

				<div class="form-group row">
					<label for="nama-unit" class="col-md-3 col-form-label">Nama Unit</label>
					<input type="text" name="nama_unit" class="form-control reset-field" id="nama-unit" placeholder="Nama Unit">
				</div>

				<div class="form-group row">
					<label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
					<input type="text" name="keterangan" class="form-control reset-field" id="keterangan" placeholder="Keterangan">
				</div>

				<div class="form-group row">
					<label for="eselon" class="col-md-3 col-form-label">Eselon </label>
					<input type="text" name="eselon" id="eselon" class="select2-input">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-tambah-unit-kerja"><i class="fas fa-save"></i> Tambah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Unit Kerja -->

<!-- Modal Edit Unit Kerja -->
<div id="modal-edit-unit-kerja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-edit-unit-kerja-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-unit-kerja-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-unit-kerja'); ?>
				<input type="hidden" id="id-unit-kerja" name="id">
				<div class="form-group row">
					<label for="unit-parent" class="col-md-3 col-form-label">Unit Parent </label>
					<input type="text" name="unit_parent" id="unit-parent-edit" class="select2-input">
				</div>

				<div class="form-group row">
					<label for="nama-unit" class="col-md-3 col-form-label">Nama Unit</label>
					<input type="text" name="nama_unit" class="form-control reset-field" id="nama-unit-edit" placeholder="Nama Unit">
				</div>

				<div class="form-group row">
					<label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
					<input type="text" name="keterangan" class="form-control reset-field" id="keterangan-edit" placeholder="Keterangan">
				</div>

				<div class="form-group row">
					<label for="eselon" class="col-md-3 col-form-label">Eselon </label>
					<input type="text" name="eselon" id="eselon-edit" class="select2-input">
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-unit-kerja"><i class="fas fa-save"></i> Edit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Unit Kerja -->

