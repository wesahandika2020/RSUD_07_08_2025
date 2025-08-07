<!-- Modal Pasien -->
<div id="modal_pasien" class="modal fade" role="dialog" aria-labelledby="modal_pasien_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_pasien_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_pasien'); ?>
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row tight">
                            <label for="no_rm" class="col col-form-label">No. RM</label>
                            <div class="col-9">
                                <h4><span id="no_rm" class="m-t-15"></span></h4>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="nama" class="col col-form-label">Nama</label>
                            <div class="col-9">
                                <input name="nama" id="nama" class="form-control" placeholder="Nama Pasien">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="statuspasien" class="col-3 col-form-label">Status Pasien</label>
                            <div class="col">
                                <?= form_dropdown('statuspasien', $statuspasien, array(), 'class="custom-select reset-select" id=statuspasien') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="email" class="col col-form-label">Jenis Kelamin</label>
                            <div class="col-9">
                                <?= form_dropdown('kelamin', $kelamin, array(), 'class="custom-select col-5" id=kelamin') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Tempat Lahir</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Tanggal Lahir</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Alamat</label>
                            <div class="col-9">
                                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rw" class="col-3 col-form-label">No. RT / RW</label>
                            <div class="col-2">
                                <input type="text" name="no_rt" id="no_rt" class="form-control reset-field" placeholder="No. RT">
                            </div>
                            <div class="col-2">
                                <input type="text" name="no_rw" id="no_rw" class="form-control reset-field" placeholder="No. RW">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_rw" class="col-3 col-form-label">No. Rumah / Kode POS</label>
                            <div class="col-3">
                                <input type="text" name="no_rumah" id="no_rumah" class="form-control reset-field" placeholder="No. Rumah">
                            </div>
                            <div class="col-3">
                                <input type="text" name="kode_pos" id="kode_pos" class="form-control reset-field" placeholder="Kode POS">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="provinsi" class="col-3 col-form-label">Provinsi</label>
                            <div class="col">
                                <select name="provinsi" class="custom-select reset-select" id="provinsi">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                            <input type="hidden" name="nama_provinsi" id="nama_provinsi" class="reset-field">
                        </div>
                        <div class="form-group row tight">
                            <label for="kabupaten" class="col-3 col-form-label">Kabupaten</label>
                            <div class="col">
                                <select name="kabupaten" class="custom-select reset-select" id="kabupaten">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                            <input type="hidden" name="nama_kabupaten" id="nama_kabupaten" class="reset-field">
                        </div>
                        <div class="form-group row tight">
                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan</label>
                            <div class="col">
                                <select name="kecamatan" class="custom-select reset-select" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <input type="hidden" name="nama_kecamatan" id="nama_kecamatan" class="reset-field">
                        </div>
                        <div class="form-group row tight">
                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label>
                            <div class="col">
                                <select name="kelurahan" class="custom-select reset-select" id="kelurahan">
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                            <input type="hidden" name="nama_kelurahan" id="nama_kelurahan" class="reset-field">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row tight">
                            <label for="agama" class="col col-form-label">Agama</label>
                            <div class="col-9">
                                <?= form_dropdown('agama', $agama, array(), 'class="custom-select" id=agama') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="gol_darah" class="col col-form-label">Golongan Darah</label>
                            <div class="col-9">
                                <?= form_dropdown('gol_darah', $gol_darah, array(), 'class="custom-select" id=gol_darah') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pendidikan" class="col col-form-label">Pendidikan</label>
                            <div class="col-9">
                                <?= form_dropdown('pendidikan', $pendidikan, array(), 'class="custom-select" id=pendidikan') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pekerjaan" class="col col-form-label">Pekerjaan</label>
                            <div class="col-9">
                                <?= form_dropdown('pekerjaan', $pekerjaan, array(), 'class="custom-select" id=pekerjaan') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="pernikahan" class="col-3 col-form-label">Status Kawin</label>
                            <div class="col">
                                <?= form_dropdown('pernikahan', $pernikahan, array(), 'class="custom-select reset-select" id=pernikahan') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="ayah" class="col-3 col-form-label">Nama Ayah</label>
                            <div class="col">
                                <input type="text" name="ayah" class="form-control reset-field" id="ayah" placeholder="Nama Ayah">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="ibu" class="col-3 col-form-label">Nama Ibu</label>
                            <div class="col">
                                <input type="text" name="ibu" class="form-control reset-field" id="ibu" placeholder="Nama Ibu">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="no_identitas" class="col col-form-label">NIK</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="no_identitas" onkeypress="return hanyaAngka(event)" id="no_identitas" maxlength="16" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Telepon</label>
                            <div class="col-9">
                                <input class="form-control" type="text" name="telp" onkeypress="return hanyaAngka(event)" id="telp" maxlength="13" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="etnis" class="col-3 col-form-label">Etnis</label>
                            <div class="col">
                                <?= form_dropdown('etnis', $etnis, array(), 'class="custom-select reset-select" id=etnis') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="text" class="col col-form-label">Status</label>
                            <div class="col-9">
                                <?= form_dropdown('status', ['' => 'Pilih Status', 'Hidup' => 'Hidup', 'Meninggal' => 'Meninggal'], array(), 'class="custom-select col-5" id=status') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
							<label for="text" class="col col-form-label">No. BPJS</label>
							<div class="col-9">
								<input class="form-control" type="text" name="no_bpjs" onkeypress="return hanyaAngka(event)" id="no-bpjs" maxlength="13" placeholder="000318415xxxxxx">
							</div>
						</div>
                        <div class="form-group row tight">
							<label for="text" class="col col-form-label">Email</label>
							<div class="col-9">
                                <input type="text" name="email" class="form-control reset-field" id="email" placeholder="email@gmail.com">
							</div>
						</div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="updateDataPasien()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pasien -->