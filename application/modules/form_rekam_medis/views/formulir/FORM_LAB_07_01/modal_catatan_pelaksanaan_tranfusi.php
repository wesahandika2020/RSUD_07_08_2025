<!-- // CPT DK DCT-->
<div class="modal fade" id="modal_catatan_pelaksanaan_tranfusi" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_catatan_pelaksanaan_tranfusi">FORM CATATAN PELAKSANAAN TRANSFUSI</h5>
                    <h6 class="modal-title text-muted"><small>(Darah harus sudah di tranfusikan 30 menit terhitung dari waktu kantung keluar dari UTD
                        )</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_catatan_pelaksanaan_tranfusi class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-cpt">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-cpt">
                <input type="hidden" name="id_pasien" id="id-pasien-cpt">
                <input type="hidden" name="id_cpt" id="id-cpt">
                <input type="hidden" name="id_data_catatan_tranfusi_cb" id="id_data_catatan_tranfusi_cb">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-cpt"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-cpt"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-cpt"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-cpt"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-cpt"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_catatan_pelaksanaan_tranfusi">
                                <ol>
                                    <li>ENTRI CATATAN</li>
                                    <li>DATA CATATAN</li>
                                </ol>
                                <div class="form-catatan-pelaksanaan-tranfusi">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-catatan-pelaksanaan-transfusi"><i
                                                    class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-catatan-pelaksanaan-transfusi"><i
                                                    class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr> 
                                        
                                        <tr>
                                            <td width="20%" class="bold"></td>
                                            <td wdith="1%" class="bold"></td>
                                            <td width="79%" class="bold"></td>
                                        </tr>
                                       
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-intrusksi-dokter"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>INSTRUKSI OLEH DOKTER
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-intrusksi-dokter">
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="center" colspan="3"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Tanggal Transfusi</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <input type="text" name="tanggal_tranfusi_cpt"id="tanggal-tranfusi-cpt" class="custom-form clear-input d-inline-block col-lg-2"placeholder="dd/mm/yy">
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Diagnosis</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <textarea name="diagnosis_cpt" id="diagnosis-cpt"rows="2" class="form-control clear-input"placeholder=""></textarea>
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Golongan Darah</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">

                                                                            
                                                                            <input type="radio" name="gol_darah_cpt" id="gol-darah-cpt-1"value="A" class="mr-1">A
                                                                            <input type="radio" name="gol_darah_cpt" id="gol-darah-cpt-2"value="B" class="mr-1 ml-4">B
                                                                            <input type="radio" name="gol_darah_cpt" id="gol-darah-cpt-3" value="AB" class="mr-1 ml-4">A/B
                                                                            <input type="radio" name="gol_darah_cpt" id="gol-darah-cpt-4" value="O" class="mr-1 ml-4">O

                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Rhesus</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <input type="radio" name="rhesus_cpt" id="rhesus-cpt-1"value="ya" class="mr-1">Positif
                                                                            <input type="radio" name="rhesus_cpt" id="rhesus-cpt-2"value="tidak" class="mr-1 ml-4">Negatif
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Jenis darah dan Volume yang diminta</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <textarea name="jenis_darah_cpt" id="jenis-darah-cpt"rows="2" class="form-control clear-input"placeholder=""></textarea>
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Pemberian Pre medikasi</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <input type="radio" name="pre_cpt" id="pre-cpt-1"value="ya" class="mr-1">ya
                                                                            <input type="radio" name="pre_cpt" id="pre-cpt-2"value="tidak" class="mr-1 ml-4">tidak
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Alasan Pemberian Premedikasi</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <textarea name="alasan_cpt" id="alasan-cpt"rows="2" class="form-control clear-input"placeholder=""></textarea>
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Target Pemberian Tranfusi</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <textarea name="target_cpt" id="target-cpt"rows="2" class="form-control clear-input"placeholder=""></textarea>
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Pemberian Untuk Monitoring</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <textarea name="pemberian_cpt" id="pemberian-cpt"rows="2" class="form-control clear-input"placeholder=""></textarea>
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Nama Lengkap Dokter</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <input type="text" name="dokter_cpt" id="dokter-cpt" class="select2c-input ml-2">
                                                                        </td>                 
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%"><b>Tanda Tangan Dokter</b></td>
                                                                        <td width="1%" class="center"><b>:</b></td>
                                                                        <td width="30%">
                                                                            <input type="checkbox" name="ttd_dokter_cpt"id="ttd-dokter-cpt" value="1"class="mr-1">
                                                                        </td>                 
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </tr>
                                         <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-kantung"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KANTUNG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-kantung">
                                                <div class="col-lg">
                                                    <div id="buka-tutup-dk">
                                                    </div>
                                                    <div class="card">
                                                        <table class="table table-no-border table-sm table-striped"id="tabel-dk">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center"><b>No</b></th>
                                                                    <th class="center"><b>Tanggal Kadaluarsa</b></th>
                                                                    <th class="center"><b>Petugas I</b></th>
                                                                    <th class="center"><b>Petugas II</b></th>
                                                                    <th class="center"><b>Akun User</b></th>
                                                                    <th class="center" colspan="2"><b>Alat</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>  
                                        </tr>                                   
                                    </table>     
                                    <br>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                        <tr>
                                            <td>
                                                <b>Darah harus sudah selesai ditransfusikan 4 (empat) jam terhitung dari waktu kantung keluar dari UTD; (*) Lingkari sesuai Pilihan.
                                                <br>
                                                (**) Untuk pasien rawat jalan 1 jam setelah tranfusi, untuk rawat inap 4 jam setelah tranfusi.</b>
                                            </td>
                                        </tr>
                                    </table>       
                                </div>

                                <!-- table catatan data -->
                                <div class="form-catatan-data">
                                    <input type="hidden" name="id_data_catatan_tranfusi" id="id_data_catatan_tranfusi">
                                    <input type="hidden" name="cpt_id_layanan_pendaftaran" id="cpt_id_layanan_pendaftaran">
                                    <div class="row">
                                    <div class="col-lg-12">

                                    <div class="card">
                                        <table class="table table-sm table-striped table-bordered color-table info-table" id="table-catatan-kantung">
                                            <thead>
                                                <tr>
                                                    <th class="center" width="1%">No.</th>
                                                    <th class="center" width="15%">Tanggal Transfusi</th>
                                                    <th class="center" width="15%">Diagnosis</th>
                                                    <th class="center" width="15%">Golongan Darah</th>
                                                    <th class="center" width="15%">Petugas</th>
                                                    <th class="center" width="15%">Dokter</th>
                                                    <th class="center" width="15%">Alat</th>
                                                </tr>
                                            </thead>
                                            <tbody class="body-table">
                                            </tbody>
                                        </table>
                                        <div id="cpt-pagination" class="float-left"></div>
                                        <div id="cpt-summary" class="float-right text-sm"></div>
                                    </div>                                    
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanCatatanPelaksanaanTranfusi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Catatan Pelaksanaan Transfusi -->





<!-- // DK Edit -->
<div id="modal-edit-catatan-kantung" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Catatan Kantung</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-catatan-kantung'); ?>
                <input type="hidden" name="id" id="id-catatan-kantung">
                <div class="row">          
                    <table class="table table-no-border table-sm table-striped">
                        <tr>
                            <td width="10%"><b>Nomor Formulir Permintaan Darah</b></td>
                            <td width="1%" class="center"><b>:</b></td>
                            <td width="40%">
                                <input type="text" name="nomor_for_cpt" id="edit-nomor-for-cpt"class="custom-form clear-input d-inline-block col-lg-4">
                            </td>                 
                        </tr>                                    
                    </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-no-border table-sm table-striped">
                                <tr>
                                    <td width="35%" class="bold">Nomor Stok</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="64%">
                                        <input type="text" name="nomor_stok_cpt" id="edit-nomor-stok-cpt" class="custom-form clear-input d-inline-block col-lg-4">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Asal Kantong</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="asal_kantong_cpt_1"id="edit-asal-kantong-cpt-1" value="1"class="mr-1"> PMI DKI
                                        <input type="checkbox" name="asal_kantong_cpt_2"id="edit-asal-kantong-cpt-2" value="2"class="mr-1 ml-2"> Non DKI
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Hasil crossmatch</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="hasil_cross_cpt_1" id="edit-hasil-cross-cpt-1" value="1"class="mr-1"> Cocok 
                                        <input type="checkbox" name="hasil_cross_cpt_2" id="edit-hasil-cross-cpt-2" value="2"class="mr-1 ml-2"> Tidak cocok
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold"></td>
                                    <td width="1%" class="bold"></td>
                                    <td width="50%">
                                        <input type="checkbox" name="hasil_cross_cpt_3" id="edit-hasil-cross-cpt-3" value="3"class="mr-1 "> Tanpa cross
                                        <input type="checkbox" name="hasil_cross_cpt_4" id="edit-hasil-cross-cpt-4" value="4"class="mr-1 ml-2"> Emergency
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%"><b>Tanggal Kedaluarsa</b></td>
                                    <td width="1%" class="center"><b>:</b></td>
                                    <td width="50%">
                                        <input type="text" name="cpt_tanggal_pengkajian"id="edit-cpt-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-8"placeholder="dd/mm/yy">
                                    </td>                 
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Jenis Komponen</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="jk_cpt_1" id="edit-jk-cpt-1" value="1"class="mr-1"> WB 
                                        <input type="checkbox" name="jk_cpt_2" id="edit-jk-cpt-2" value="2"class="mr-1 ml-2"> PRC
                                        <input type="checkbox" name="jk_cpt_3" id="edit-jk-cpt-3" value="3"class="mr-1 ml-2"> TC
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold"></td>
                                    <td width="1%" class="bold"></td>
                                    <td width="50%">
                                        <input type="checkbox" name="jk_cpt_4" id="edit-jk-cpt-4" value="4"class="mr-1"> FFP
                                        <input type="checkbox" name="jk_cpt_5" id="edit-jk-cpt-5" value="5"class="mr-1 ml-2"> AHF
                                        <input type="checkbox" name="jk_cpt_6" id="edit-jk-cpt-6" value="6"class="mr-1 ml-2"> WE
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Gol Darah</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="golongan_cpt_1" id="edit-golongan-cpt-1" value="1"class="mr-1"> A 
                                        <input type="checkbox" name="golongan_cpt_2" id="edit-golongan-cpt-2" value="2"class="mr-1 ml-4"> B
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold"></td>
                                    <td width="1%" class="bold"></td>
                                    <td width="50%">
                                        <input type="checkbox" name="golongan_cpt_3" id="edit-golongan-cpt-3" value="3"class="mr-1"> AB
                                        <input type="checkbox" name="golongan_cpt_4" id="edit-golongan-cpt-4" value="4"class="mr-1 ml-4"> O
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Rhesus</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="rh_cpt_1 "id="edit-rh-cpt-1" value="1"class="mr-1"> Positif
                                        <input type="checkbox" name="rh_cpt_2 "id="edit-rh-cpt-2" value="2"class="mr-1 ml-4"> Negatif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Volume</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="volume_cpt" id="edit-volume-cpt"class="custom-form clear-input d-inline-block col-lg-6"> ml
                                    </td>
                                </tr>   
                                <tr>
                                    <td width="20%" class="bold">Petugas I</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="petugas_tambah_I" id="edit-petugas-tambah-I" class="select2c-input ml-2">
                                    </td>
                                </tr>  
                            </table>
                        </div>

                        <div class="col-lg-6">
                            <table class="table table-no-border table-sm table-striped">
                                <tr>
                                    <td width="35%" class="bold">Jam Keluar UTD</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="64%">
                                        <input type="text" name="jam_keluar_utd" id="edit-jam-keluar-utd" class="custom-form clear-input d-inline-block col-lg-4" placeholder="HH/mm">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Identifikasi Kantung</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="identifikasi_kantung_cpt_1" id="edit-identifikasi-kantung-cpt-1" value="1"class="mr-1"> Sesuai 
                                        <input type="checkbox" name="identifikasi_kantung_cpt_2" id="edit-identifikasi-kantung-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                    </td>
                                </tr> 
                                <tr>
                                    <td width="35%" class="bold">Identifikasi Pasien</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="identifikasi_pasien_cpt_1" id="edit-identifikasi-pasien-cpt-1" value="1"class="mr-1"> Sesuai 
                                        <input type="checkbox" name="identifikasi_pasien_cpt_2" id="edit-identifikasi-pasien-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Keadaan Kantung</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="checkbox" name="keadaan_kantung_cpt_1" id="edit-keadaan-kantung-cpt-1" value="1"class="mr-1"> Baik 
                                        <input type="checkbox" name="keadaan_kantung_cpt_2" id="edit-keadaan-kantung-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Jam diterima Ruangan</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="jam_ruangan_cpt" id="edit-jam-ruangan-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Waktu Mulai</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="waktu_mulai_cpt" id="edit-waktu-mulai-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" class="bold">Waktu Selesai</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="waktu_selesai_cpt" id="edit-waktu-selesai-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%"></td>
                                    <td width="1%"></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="bold">Petugas II</td>
                                    <td width="1%" class="bold">:</td>
                                    <td width="50%">
                                        <input type="text" name="petugas_tambah_II" id="edit-petugas-tambah-II" class="select2c-input ml-2">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>
                        </div>
                    </div>

                    <div class="table-responsive">  
                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                            <tr>
                                <td width="100%">
                                    <table class="table table-sm table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="center" colspan="6"><b></b></th>
                                            </tr>
                                            <tr>                                    
                                                <th width="10%" class="center"><b>Waktu</b></th>
                                                <th width="20%" class="center"><b>Saat tranfusi dimulai</b></th>
                                                <th width="20%" class="center"><b>15 menit setelah tranfusi dimulai</b></th>
                                                <th width="20%" class="center"><b>Saat selesai tranfusi </b></th>
                                                <th width="20%"  class="center"><b>4 jam Ranap atau 1 jam Rajal setelah selesai tranfusi(**)</b></th>               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>                                   
                                                <td class="center"><b>Jam observasi</td>
                                                <td class="center">
                                                    <input type="text" name="jam_ob_1" id="edit-jam-ob-1"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="jam_ob_2" id="edit-jam-ob-2"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="jam_ob_3" id="edit-jam-ob-3"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm"
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="jam_ob_4" id="edit-jam-ob-4"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                                </td>
                                            </tr>

                                            <tr>                                     
                                                <td class="center"><b>Tensi</td>
                                                <td class="center">
                                                    <input type="text" name="tensi_cpt_1" id="edit-tensi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="tensi_cpt_2" id="edit-tensi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="tensi_cpt_3" id="edit-tensi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="tensi_cpt_4" id="edit-tensi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                            </tr>

                                            <tr>                                     
                                                <td class="center"><b>RR</td>
                                                <td class="center">
                                                    <input type="text" name="rr_cpt_1" id="edit-rr-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="rr_cpt_2" id="edit-rr-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="rr_cpt_3" id="edit-rr-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="rr_cpt_4" id="edit-rr-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                            </tr>

                                            <tr>                                 
                                                <td class="center"><b>Suhu</td>
                                                <td class="center">
                                                    <input type="text" name="suhu_cpt_1" id="edit-suhu-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="suhu_cpt_2" id="edit-suhu-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="suhu_cpt_3" id="edit-suhu-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="suhu_cpt_4" id="edit-suhu-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                            </tr>

                                            <tr>                                     
                                                <td class="center"><b>Nadi</td>
                                                <td class="center">
                                                    <input type="text" name="nadi_cpt_1" id="edit-nadi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="nadi_cpt_2" id="edit-nadi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="nadi_cpt_3" id="edit-nadi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="nadi_cpt_4" id="edit-nadi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                            </tr>

                                            <tr>                                 
                                                <td class="center"><b>Reaksi Transfusi</td>
                                                <td class="center">
                                                    <input type="text" name="reaksi_cpt_1" id="edit-reaksi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="reaksi_cpt_2" id="edit-reaksi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="reaksi_cpt_3" id="edit-reaksi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="reaksi_cpt_4" id="edit-reaksi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="center"> <b>Paraf</td>                                                            
                                                <td class="center">
                                                    <input type="text" name="petugas_cpt_1" id="edit-petugas-cpt-1" class="select2c-input ml-2">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="petugas_cpt_2" id="edit-petugas-cpt-2" class="select2c-input ml-2">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="petugas_cpt_3" id="edit-petugas-cpt-3" class="select2c-input ml-2">
                                                </td>
                                                <td class="center">
                                                    <input type="text" name="petugas_cpt_4" id="edit-petugas-cpt-4" class="select2c-input ml-2">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>    
                    </div>
                </div>
                <hr>
                <?= form_close() ?>
            </div>   

            <div class="modal-footer" id="update-dk" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit DK-->


