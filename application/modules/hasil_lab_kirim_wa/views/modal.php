<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-search'); ?>
                <div class="form-group row tight">
					<label for="jenis-tanggal" class="col-md-3 col-form-label">Jenis Tanggal</label>
					<div class="col-md-9">
						<?= form_dropdown('jenis_tanggal', $jenis_tanggal, array(), 'id=jenis-tanggal name=jenis_tanggal class=form-control') ?>
					</div>
				</div>
				<div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
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
                    <label class="col col-form-label">No. RM</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm-search" placeholder="No. RM">
                        <!-- 00304602 -->
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. Register</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_register" onkeypress="return hanyaAngka(event)" id="no-register" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No Tlp</label>
                    <div class="col-9">
                        <input name="notlp" id="notlp-search" class="form-control" placeholder="No Tlp">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Jenis Rawat</label>
                    <div class="col-9">
						<select name="jenis_rawat" id="jenis-rawat" class="form-control">
						</select>
					</div>
				</div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Jenis Pendaftaran</label>
                    <div class="col-9">
						<select name="jenis_pendaftaran" id="jenis-pendaftaran" class="form-control">
						</select>
					</div>
				</div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Status WA</label>
                    <div class="col-9">
                        <select name="status_wa" id="status-wa" class="form-control">
                            <option value="">- Semua -</option>
                            <option value="belum">Belum dikirim</option>
                            <option value="berhasil">Berhasil Terkirim</option>
                            <option value="gagal">Gagal Terkirim</option>
                        </select>
                    </div>
                </div>
                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListHasilLabWa(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->
