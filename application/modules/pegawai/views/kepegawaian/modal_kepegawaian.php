<!-- Modal Kepegawaian -->
<div id="modal_kepegawaian" class="modal fade" role="dialog" aria-labelledby="modal_kepegawaian_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_kepegawaian_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=formkepegawaian'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="color: red;"><i>*) Harap nama ditulis dengan huruf KAPITAL</i></div>
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="id" id="id_pegawai">
                        <div class="form-group tight">
                            <input type="text" name="nip_pegawai" id="nip_pegawai" class="form-control col-9" placeholder="NIP Pegawai">
                        </div>
                        <div class="form-group tight">
                            <input type="number" name="nik_pegawai" id="nik_pegawai" class="form-control col-9" placeholder="NIK Pegawai">
                        </div>
                        <div class="form-group tight">
                            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Nama Pegawai">
                        </div>
                        <div class="form-group tight">
                            <input type="email" name="email_pegawai" id="email_pegawai" class="form-control" placeholder="Email Pegawai">
                        </div>
                        <div class="form-group tight">
                            <input type="text" name="id_kota_kabupaten" id="tmp_lahir_pegawai" class="select2-input">
                        </div>
                        <div class="form-group tight">
                            <input type="text" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" class="form-control col-6" placeholder="Tanggal Lahir">
                        </div>
                        <div class="form-group tight">
                            <textarea name="alamat_pegawai" id="alamat_pegawai" class="form-control" placeholder="Alamat Lengkap Pegawai..."></textarea>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group tight">
                            <?= form_dropdown('kelamin_pegawai', $kelamin, array(), 'class="custom-select" id=kelamin_pegawai') ?>
                        </div>
                        <div class="form-group tight">
                            <?= form_dropdown('gol_darah_pegawai', $gol_darah, array(), 'class="custom-select" id=gol_darah_pegawai') ?>
                        </div>
                        <div class="form-group tight">
                            <?= form_dropdown('agama_pegawai', $agama, array(), 'class="custom-select" id=agama_pegawai') ?>
                        </div>
                        <div class="form-group tight">
                            <input type="text" name="id_jabatan_pegawai" id="jabatan_pegawai" class="select2-input">
                        </div>
                        <div class="form-group tight">
                            <input type="text" name="hp_pegawai" id="hp_pegawai" class="form-control col-8" maxlength="13" placeholder="No Handphone Pegawai">
                        </div>
                        <div id="image_show" class="d-flex justify-content-center">
                            <img id="image_upload" src="<?= resource_url() ?>images/avatars/upload.png" width="35%" height="40%">
                        </div>
                        <div class="form-group tight">
                            <input type="file" name="file_image" id="file_image" onchange="uploadFoto()" accept=".jpg, .jpeg, .png" class="form-control" placeholder="Upload Foto Profil">
                        </div>
                        <input type="hidden" name="nama_image" id="nama_image">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" id="batal_pegawai" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataKepegawaian()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kepegawaian -->