<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-search-label">Parameter Pencarian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
				<input name="id" type="hidden" id="id-layanan-search" />

				<!-- <div class="form-group row tight">
					<label for="awal" class="col-3 col-form-label">Tanggal</label>
					<div class="col">
						<input type="text" name="tanggal" id="tanggal" class="form-control"
							value="<--?= date('d/m/Y') ?>">
					</div>
				</div> -->

				<div class="form-group row tight">
                    <label for="awal" class="col-lg-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-lg-4">
                        <input type="text" name="tgl_masuk_awal" id="tgl-masuk-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                    <div class="col-lg-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="tgl_masuk_akhir" id="tgl-masuk-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>

				<div class="form-group row tight">
                    <label for="awal" class="col-lg-3 col-form-label">Tanggal Keluar</label>
                    <div class="col-lg-4">
                        <input type="text" name="tgl_keluar_awal" id="tgl-keluar-awal" class="form-control" value="">
                    </div>
                    <div class="col-lg-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="tgl_keluar_akhir" id="tgl-keluar-akhir" class="form-control" value="">
                    </div>
                </div>

				<div class="form-group row tight">
					<label class="col-3 col-form-label">Kunjungan</label>
					<div class="col">
						<?= form_dropdown('kunjungan', $kunjungan, array(), 'class="form-control validasi-input" id=kunjungan') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
					<div class="col">
						<input type="text" name="no_rm" id="no-rm-search" class="form-control" value="">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="getListDataKunjunganPasien(1)"><i
						class="fas fa-search mr-1"></i>Cari</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->
