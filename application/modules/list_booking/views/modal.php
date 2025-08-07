<!-- Modal Search List Booking-->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label for="awal" class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_antrean" class="col-3 col-form-label">Kode Booking</label>
					<div class="col">
						<input type="text" name="kode_booking" id="kode-booking" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm" class="col-3 col-form-label">No. RM</label>
					<div class="col">
						<input type="text" name="no_rm" id="no-rm" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm" class="col-3 col-form-label">NIK</label>
					<div class="col">
						<input type="text" name="nik" id="nik" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nm_poli" class="col-md-3 col-form-label">Nama Poli</label>
					<div class="col-md-9">
						<input type="text" name="nm_poli" id="nm-poli" class="select2-input" placeholder="Tempat Layanan">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nm_dokter" class="col-md-3 col-form-label">Dokter</label>
					<div class="col-md-9">
						<select name="nm_dokter" class="custom-select reset-select" id="nm-dokter">
							<option value="">Pilih Dokter</option>
						</select>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-cari"><i class="fas fa-search"></i> Cari</button>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<!-- End Modal Search List Booking-->

<!-- Modal Edit Booking-->
<div id="modal-edit-booking" class="modal fade" role="dialog" aria-labelledby="modal-edit-booking" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-edit-booking-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-modal-edit-booking role=form class=form-horizontal') ?>
				<input type="hidden" id="usia-pasien" name="usia_pasien">
				<input type="hidden" id="id-poli-awal-edit" name="id_poli_awal">
				<input type="hidden" id="id-dokter-awal-edit" name="id_dokter_awal">
				<input type="hidden" id="tanggal-awal-kontrol" name="tanggal_awal_kontrol">
				<input type="hidden" id="id-antrian-bpjs" name="id_antrian_bpjs">
				<input type="hidden" id="id-surat-kontrol" name="id_surat_kontrol">
				<input type="hidden" id="id-surat-kontrol-bpjs" name="id_surat_kontrol_bpjs">
				<input type="hidden" id="id-penjamin" name="id_penjamin">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="kode-booking-edit" class="col-3 col-form-label">Kode Booking</label>
							<input type="text" id="kode-booking-edit" class="form-control" disabled>
						</div>
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="no-rm-edit" class="col-3 col-form-label">No. RM</label>
							<input type="text" id="no-rm-edit" class="form-control" disabled>
						</div>
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="no-bpjs-edit" class="col-3 col-form-label">No Polish</label>
							<input type="text" id="no-bpjs-edit" class="form-control" disabled>
						</div>
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="nama-pasien-edit" class="col-3 col-form-label">Nama Pasien</label>
							<input type="text" id="nama-pasien-edit" class="form-control" disabled>
						</div>
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="poli-tujuan-edit" class="col-3 col-form-label">Poli Tujuan</label>
							<input type="text" id="poli-tujuan-edit" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="tanggal-kunjungan-edit" class="col-3 col-form-label">Tanggal Kunjungan</label>
							<input type="text" name="tanggal_kunjungan" id="tanggal-kunjungan-edit" class="form-control">
						</div>
						<div class="form-group row tight" style="margin: 0 .2rem">
							<label for="dokter-rujukan-edit" class="col-md-3 col-form-label">Dokter</label>
							<select name="dokter_rujukan" class="custom-select reset-select" id="dokter-rujukan-edit">
								<option value="">Pilih Dokter</option>
							</select>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-edit-booking"><i class="far fa-save"></i> Edit</button>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<!-- End Modal Edit Booking-->

<!-- Modal Edit Booking-->
<div id="modal-batal-booking" class="modal fade" role="dialog" aria-labelledby="modal-batal-booking" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-batal-booking-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-modal-batal-booking role=form class=form-horizontal') ?>
				<input type="hidden" id="id-antrian-bpjs-batal" name="id">

				<div class="row">
					<div class="col">
						<div class="form-group row tight">
							<label for="alamat_search" class="col-3 col-form-label">Keterangan Batal</label>
							<div class="col">
								<textarea name="keterangan_batal" id="keterangan-batal" rows="5" class="form-control" placeholder="Keterangan Batal"></textarea>
							</div>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="btn-batal-booking"><i class="far fa-save"></i> simpan</button>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<!-- End Modal Edit Booking-->

<div id="modal-batal-antrean" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-batal-antrean-label">Status Batal Antrean</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-batal-antrean role=form class=form-horizontal') ?>
                <input type="hidden" name="page_batal" id="page-batal">
                <input type="hidden" name="id_batal" id="id-batal">
                <input type="hidden" name="tanggal_kunjungan_batal" id="tanggal-kunjungan-batal">
                <input type="hidden" name="kode_batal_dokter" id="kode-batal-dokter">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Kode Booking:</label>
                            <div class="col">
                                <input type="text" name="kode_batal_booking" class="form-control" id="kode-batal-booking" readonly>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Keterangan Batal:</label>
                            <div class="col">
                                <textarea name="keterangan_batal" id="keterangan-batal" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanBatalAntrean()"><i class="fas fa-plus-circle"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>