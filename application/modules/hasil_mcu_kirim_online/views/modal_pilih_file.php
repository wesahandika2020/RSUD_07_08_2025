<div id="modal-pilih-file" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pilih-file-kirim-mcu role=form class=form-horizontal') ?>
                <input type="hidden" id="id-pendaftaran-detail" name="id_pendaftaran_detail">
                <input type="hidden" id="id-layanan-pendaftaran-detail" name="id_layanan_pendaftaran_detail">
                <input type="hidden" id="id-hasil-mcu-detail" name="id_hasil_mcu_detail">
                <input type="hidden" id="status-pulang-detail">
                <input type="hidden" id="passphrase-detail" name="passphrase_detail">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="25%" class="bold">No. RM / No. Register</td>
                                    <td wdith="75%">: <span id="id-pasien-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Nama Pasien</td>
                                    <td>: <span id="nama-pasien-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Umur</td>
                                    <td>: <span id="umur-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Email</td>
                                    <td>: <span id="email-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Status Kirim Email</td>
                                    <td>: <span id="status-email-detail"></span><span id="jml-email-berhasil-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Pengirim</td>
                                    <td>: <span id="pengirim-email-detail"></span><span id="waktu-email-detail"></span></td></td>
                                </tr>                                
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Kunjungan</td>
                                    <td wdith="70%">: <span id="kunjungan-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Dokter</td>
                                    <td>: <span id="dokter-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Penjamin</td>
                                    <td>: <span id="penjamin-detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Diagnosa Utama</td>
                                    <td>: <span id="diagnosa-detail"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 3px; margin-top: 20px;">
                    <div class="col-lg-6">
                        <div class="form-group row tight" hidden>
                            <label for="jenis-tanggal" class="col-md-3 col-form-label" style="text-align: right;">Tambah Jenis File</label>
                            <div class="col-md-6">
                                <?= form_dropdown('jenis_file_mcu', $jenis_file_mcu, array(), 'id=jenis-file name=jenis_file_mcu class=form-control') ?>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiTambahFile()" id='btn-tambah-file'><i class="fas fa-plus-circle"></i> Tambah</button>
                            </div>
                        </div>   
                    </div>
                    <div class="col-lg-6" style="display: flex;justify-content: flex-end;align-items: center;">
                        <button type="button" class="btn btn-secondary waves-effect" onclick="reloadFileKirim()"><i class="fas fa-history"></i> Reload Data</button>
                    </div>
                </div>

                <div class="table-responsive tablefilekirim" id="parent">
                    <table id="table-file-kirim" class="table table-hover table-striped table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th class="center">No</th>
                                <th class="left">Jenis File</th>
                                <th class="left">Tanggal File</th>
								<th class="left">Keterangan</th>
								<th class="left">Dokter</th>
								<th class="left">Dokumen<br>Tertandatangan</th>
								<!-- <th class="left">PDF Tersedia</th> -->
                                <th class="left">Kirim</th>
                                <th class="left">Petugas</th>
                                <th class="left">Waktu</th>
                                <th class="left"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">			
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiKirimEmail()" id='btn-kirim-email'><i class="fas fa-envelope"></i> Kirim e-Mail</button>
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>


<div id="modal-pass-esign" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:30%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Passphrase</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pass-esign role=form class=form-horizontal') ?>
                <input type="hidden" id="tglform-passphrase" name="tglform_passphrase">
                <input type="hidden" id="jenisform-passphrase">
                <input type="hidden" id="namaform-passphrase">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="25%">File</td>
                                    <td wdith="75%"><b><span id="nama-file-mcu"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Lihat File</td>
                                    <td>File Sebelum di tanda tangan <span id="btn-file"></span></td>
                                </tr>
                                <tr>
                                    <td>Dokter</td>
                                    <td><span id="dokter-passphrase"></span></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td><span id="nik-passphrase" name="nik_passphrase"></span></td>
                                </tr>
                                <tr>
                                    <td>Cek Status User</td>
                                    <td><span id="btn-passphrase"></span><br><span id="cek-passphrase" style="margin-left: 0px;"></span></td>
                                </tr>                      
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="passphrase" class="col-form-label">
                            Masukan Passphrase Anda <span class="text-red">*</span>
                        </label>
                    </div>
                    <div class="col-md-12 input-group">
                        <input type="password" class="form-control" name="passphrase" id="passphrase" autocomplete="off" placeholder="Passphrase">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassphrase"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">			
                <button type="button" class="btn btn-info waves-effect" onclick="cekPassphrase()"> OK</button>
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"> Keluar</button>
            </div>
        </div>
    </div>
</div>
