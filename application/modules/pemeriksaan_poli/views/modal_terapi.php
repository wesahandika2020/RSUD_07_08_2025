<!-- <style>
tr, td{

        border: 1px solid;

}
</style> -->
<!--Modal Pemeriksaan -->
 <div id="modal-terapi" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Protokol Terapi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-detail-pemeriksaan role=form class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="rhm-layanan-pendaftaran">
                <input type="hidden" name="id_kunjungan" id="rhm-kunjungan-rehab">
                <input type="hidden" name="id_operator" id="rhm-id-operator">
                <input type="hidden" name="id_pasien" id="rhm-id-pasien">
                <input type="hidden" name="id_kunjungan_rehab" id="rhm-idk-pasien">
                <input type="hidden" name="user" id="user-session" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama);?> value=<?php echo $nama_js; ?>>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-user mr-1"></i>Data Pasien
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">No. RM</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="no-rm-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Register</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-register-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><b><span id="nama-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><b><span id="alamat-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelamin</td>
                                                    <td>:</td>
                                                    <td><b><span id="kelamin-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur / Tgl. Lahir</td>
                                                    <td>:</td>
                                                    <td><b><span id="umur-terapi"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Nama P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="nama-pjwb-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="alamat-pjwb-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="telp-pjwb-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Instansi Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="instansi-perujuk-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Medis Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="tenaga-medis-perujuk-terapi"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td id="riwayat-kunjungan" colspan="3">
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5><b>Rehab Medik</b></h5>
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Dokter P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span name="dokter_pjwb" id="dokter-pjwb-auto"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Diagnosis</td>
                                                    <td>:</td>
                                                    <td><b><span name="diagnosis_baru" id="diagnosis-baru"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Program</td>
                                                    <td>:</td>
                                                    <td id="tanggal-program"></td>
                                                </tr>
                                                <tr>
                                                    <td>Program Terapi</td>
                                                    <td>:</td>
                                                    <td id="get-terapi"></td>
                                                </tr>
                                                <tr id="button-batal"></tr>
                                                <tr>
                                                    <td>Status Program Terapi</td>
                                                    <td>:</td>
                                                    <td id="status-terapi"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="button-stop-terapi"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5><b>Catatan Dokter</b></h5>
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="100%"><textarea  name="catatan_dokter_terapi" id="catatan-dokter-terapi" class="form-control" placeholder="Catatan Dokter..."></textarea></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h5><b>Catatan Terapis</b></h5>
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="100%"><textarea  name="catatan_terapi" id="catatan-terapi" class="form-control" placeholder="Catatan Terapi Pasien..."></textarea></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditRehab()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Terapi -->

<?php $this->load->view('modal_kunjungan') ?>
<?php $this->load->view('modal_batal_rehab') ?>
