<!-- s -->
<!-- Modal Entri Operasi -->
<div class="modal fade" id="modal-form-operasi" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-operasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal-form-operasi">FORM OPERASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_operasi class=form-horizontal') ?>
                <input type="hidden" name="id_operasi" id="id-operasi">
                <input type="hidden" name="id_layanan_pendaftaran" id="ok-id-layanan-pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ok-id-pendaftaran">
                <input type="hidden" name="id_ok" id="id-ok">
                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>
                <!-- RPPPP -->
                <input type="hidden" name="id_rpppp" id="id-rpppp">
                <!-- CKP -->
                <input type="hidden" name="id_ckp" id="id-ckp">
                <!-- AAAS -->
                <input type="hidden" name="id_aaas" id="id-aaas">
                <!-- APB -->
                <input type="hidden" name="id_apb" id="id-apb">
                <!-- CPKJI -->
                <input type="hidden" name="id_cpkji" id="id-cpkji">
                <!-- PLO -->
                <input type="hidden" name="id" id="id-plo">

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin"></span></td>
                                </tr>                              
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Agama</td>
                                    <td>: <span id="agama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <!-- form pengkajian resume keperawatan -->
                            <div id="wizard-operasi">
                                <!-- Tab bwizard -->
                                <ol>
                                    <!-- <li>Surgical Safety Ceklis</li> -->
                                    <li>Surgical Safety Ceklis Kamar Operasi</li>
                                    <li>Rencana Pelayanan Pasien Pasca Pembedahan</li>
                                    <li>Catatan Keperawatan Perioperatif</li>
                                    <li>Assesmen Awal Anestesi/Sedasi</li>
                                    <li>Asesmen Pra Bedah</li>
                                    <li>Penandaan Lokasi Operasi</li>                                
                                    <li>Catatan Penghitungan Kasa / Jarum / Instrumen</li>                                   
                                </ol>

                                <!-- SSCKO 2 -->
                                <!--  Form Surgical Safety Ceklis KAMAR OPERASI AWAL -->
                                    <div id="data-surgical-safety-ceklis-kamar-operasi">
                                        <div class="col-lg">
                                            <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <tr>
                                                    <td width="100%">
                                                        <h5 class="center"><b>Surgical Safety Ceklis Kamar Operasi</b></h5>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div id="buka-tutup-surgical-safety-ceklis-kamar-operasi">

                                            </div>
                                            <table class="table table-no-border table-sm table-striped" id="tabel-surgical-safety-ceklis-kamar-operasi">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th rowspan="2">
                                                            No
                                                        </th>
                                                        <th colspan="2">
                                                            <b>SIGN IN</b>
                                                        </th>
                                                        <th colspan="2">
                                                            <b>TIME OUT</b>
                                                        </th>
                                                        <th colspan="2">
                                                            <b>SIGN OUT</b>
                                                        </th>
                                                        <th rowspan="2">
                                                            Petugas
                                                        </th>
                                                        <th rowspan="2"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Tanggal/Waktu
                                                        </th>
                                                        <th>
                                                            Paraf
                                                        </th>
                                                        <th>
                                                            Tanggal/Waktu
                                                        </th>
                                                        <th>
                                                            Paraf
                                                        </th>
                                                        <th>
                                                            Tanggal/Waktu
                                                        </th>
                                                        <th>
                                                            Paraf
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                <!--  Form Surgical Safety Ceklis KAMAR OPERASI AKHIR-->

                                <!-- FORM RPPPP AWAL -->
                                    <div class="form-rencana-pelayanan-pasien-pasca-pembedahan">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <h5 class="center"><b>RENCANA PELAYANAN PASIEN PASCA PEMBEDAHAN</b></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-rencana-pelayanan">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Tanggal / Jam</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="tanggal_rpppp"
                                                                        id="tanggal-rpppp"
                                                                        class="custom-form clear-input d-inline-block col-lg-3" placeholder="isi tanggal">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <b>Hari :</b> <input type="text" name="hari_rpppp"id="hari-rpppp"
                                                                class="custom-form clear-input d-inline-block col-lg-5" placeholder="isi hari">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>DIAGNOSIS KERJA</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="diagnosis_kerja" id="diagnosis-kerja"rows="3" class="form-control clear-input"
                                                                placeholder="diagnosis kerja"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Masalah/Kebutuhan (Prioritas)</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="masalah_kebutuhan_prioritas" id="masalah-kebutuhan-prioritas"rows="3" class="form-control clear-input"
                                                                placeholder="masalah kebutuhan "></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Kewaspadaan</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="kewaspadaan_1"
                                                                    id="kewaspadaan-1" value="1" class="mr-1">Standar
                                                                <input type="checkbox" name="kewaspadaan_2"
                                                                    id="kewaspadaan-2" value="1" class="mr-1 ml-2">Airbone
                                                                <input type="checkbox" name="kewaspadaan_3"
                                                                    id="kewaspadaan-3" value="1" class="mr-1 ml-2">Kontak
                                                                <input type="checkbox" name="kewaspadaan_4"
                                                                    id="kewaspadaan-4" value="1" class="mr-1 ml-2">Droplet                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Tim Dokter</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="tim_dokter"id="tim-dokter" value="1" class="mr-1">DPJP :
                                                                <input type="text" name="tim_dpjp"id="tim-dpjp" class="select2c-input ml-2" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td colspan="2"> <br>
                                                                <input type="checkbox" name="tim_perawat"id="tim-perawat" value="1" class="mr-1">Tim :
                                                                <input type="text" name="tim_perawat_1"id="tim-perawatt-1" class="select2c-input ">
                                                            </td>                                                          
                                                        </tr>

                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td colspan="2"><br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" name="tim_perawat_2"id="tim-perawatt-2" class="select2c-input ">
                                                            </td>                                                          
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td colspan="2"><br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" name="tim_perawat_3"id="tim-perawatt-3" class="select2c-input ">
                                                            </td>                                                          
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Pemeriksaan</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pemeriksaan_1"
                                                                    id="pemeriksaan-1" value="1" class="mr-1">Laboratorium
                                                                <input type="checkbox" name="pemeriksaan_2"
                                                                    id="pemeriksaan-2" value="1" class="mr-1 ml-2">Radiologi
                                                                <input type="text" name="pemeriksaan_3"
                                                                    id="pemeriksaan-3"class="custom-form clear-input d-inline-block col-lg-6 mx-1"
                                                                    placeholder="Sebutkan" >                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Prosedur / Tindakan</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="prosedur_tindakan" id="prosedur-tindakan"rows="3" class="form-control clear-input"
                                                                placeholder="prosedur / tindakan"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Nutrisi</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                Diet<input type="text" name="nutrisi_1"
                                                                    id="nutrisi-1"class="custom-form clear-input d-inline-block col-lg-5 mx-1"
                                                                    placeholder="Sebutkan" >                                                              
                                                            </td>
                                                        </tr>    
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                Batasan Cairan :<input type="text" name="nutrisi_2"
                                                                    id="nutrisi-2"class="custom-form clear-input d-inline-block col-lg-5 mx-1"
                                                                    placeholder="Sebutkan" >                                                              
                                                            </td>
                                                        </tr>                                                        
                                                        <tr>
                                                        <td width="2%"></td>
                                                            <td width="15%"></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                <input type="radio" name="nutrisi_3" id="nutrisi-3"
                                                                    class="mr-1" value="0" checked>Tidak                                                     
                                                                <input type="radio" name="nutrisi_3" id="nutrisi-4"
                                                                    class="mr-1 ml-2" value="1" >Ya,
                                                                <input type="text" name="nutrisi_5"
                                                                    id="nutrisi-5"class="custom-form clear-input d-inline-block col-lg-4 mx-1"
                                                                    placeholder="Sebutkan" disabled>                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Aktivitas</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="aktivitas_1"
                                                                    id="aktivitas-1" value="1" class="mr-1">Tirah baring total
                                                                <input type="checkbox" name="aktivitas_2"
                                                                    id="aktivitas-2" value="1" class="mr-1 ml-2">Tirah baring persial
                                                                <input type="checkbox" name="aktivitas_3"
                                                                    id="aktivitas-3" value="1" class="mr-1 ml-2">Mandiri                                                             
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Pengobatan</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pengobatann_1"
                                                                    id="pengobatann-1" value="1" class="mr-1">Sesuai IMR
                                                                <input type="checkbox" name="pengobatann_2"
                                                                    id="pengobatann-2" value="1" class="mr-1 ml-2">Revisi Pengobatan                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"></td>
                                                            <td width="2%"></td>
                                                            <td colspan="2">
                                                                <textarea name="pengobatann_3" id="pengobatann-3"rows="3" class="form-control clear-input"
                                                                placeholder="pengobatan"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Keperawatan</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="keperawwatan_1"
                                                                    id="keperawwatan-1" value="1" class="mr-1">Obvervasi Asuhan Keperawatan
                                                                <input type="checkbox" name="keperawwatan_2"
                                                                    id="keperawwatan-2" value="1" class="mr-1 ml-2">Prosedur Keperawatan    
                                                                <input type="checkbox" name="keperawwatan_3"
                                                                    id="keperawwatan-3" value="1" class="mr-1 ml-2">Pendidikam Kesehatan
                                                                <input type="checkbox" name="keperawwatan_4"
                                                                    id="keperawwatan-4" value="1" class="mr-1 ml-2">Kaloborasi dengan medis                                                         
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td width="2%"></td>
                                                            <td width="15%"><b>Tindakan Rehabilitas Medik</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="radio" name="tindakan_rehabilitan_medik" id="tindakan-rehabilitan-medik-1"
                                                                    class="mr-1" value="0" checked>Tidak                                                     
                                                                <input type="radio" name="tindakan_rehabilitan_medik" id="tindakan-rehabilitan-medik-2"
                                                                    class="mr-1 ml-2" value="1" >Ya,                                                            
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Konsultasi</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="konsultasi_rpppp" id="konsultasi-rpppp"rows="3" class="form-control clear-input"
                                                                placeholder="konsultasi"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Sasaran</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="sasaran_rpppp" id="sasaran-rpppp"rows="3" class="form-control clear-input"
                                                                placeholder="sasaran"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Planing</b></td>
                                                            <td width="2%">:</td>
                                                            <td colspan="2">
                                                                <textarea name="planing_rpppp" id="planing-rpppp"rows="3" class="form-control clear-input"
                                                                placeholder="planing"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                <b> ( Nama Jelas & Paraf Dokter ) </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b></b></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                <input type="checkbox" name="nama_jelas_rpppp"id="nama-jelas-rpppp" value="1" class="mr-1">
                                                                <input type="text" name="paraf_dokter_rpppp"id="paraf-dokter-rpppp" class="select2c-input ml-2">
                                                            </td>
                                                        </tr>                                                                                                           
                                                    </table>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Form RPPPP AKHIR -->

                                <!-- FORM CATATAN KEPERAWATAN PERIOPERATIF AWAL  disabled-->
                                    <div class="form-data-catatan-keperawatan-perioperatif">
                                        <h5 class="center"><b>Catatan Keperawatan Perioperatif</b></h5>
                                        <table class="table table-no-border table-sm table-striped">
                                            <tr>
                                                <td colspan="3">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        id="ckp-btn-expand-all"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                    <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                        id="ckp-btn-collapse-all"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record(Diisi oleh perawat ruangan)AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-catatan-keperawatan-perioperatif"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>A. CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record(Diisi oleh perawat ruangan)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-perioperatif">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td class="bold" width="16%">1. Tanda-tanda Vital</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <!-- <td width="83%"> -->
                                                    <td>
                                                        Suhu <input type="text" name="suhu_ckp_1" id="suhu-ckp-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="Suhu">&#8451;
                                                    </td>
                                                    <td>
                                                        Nadi <input type="text" name="suhu_ckp_2" id="suhu-ckp-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="Nadi">x/mnt
                                                    </td>
                                                    <td>
                                                        RR <input type="text" name="suhu_ckp_3" id="suhu-ckp-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="R Rate">x/mnt
                                                    </td>
                                                    <td>
                                                        TD <input type="text" name="suhu_ckp_4" id="suhu-ckp-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="T Darah">mmHg
                                                    </td>
                                                    <td>
                                                        Skor Nyeri <input type="text" name="suhu_ckp_5" id="suhu-ckp-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="S nyeri">
                                                    </td>
                                                    <td>
                                                        BB <input type="text" name="suhu_ckp_6" id="suhu-ckp-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="B badan">kg
                                                    </td>
                                                    <td>
                                                        TB <input type="text" name="suhu_ckp_7" id="suhu-ckp-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                    placeholder="T badan">cm
                                                    </td>
                                                </tr> 

                                            <tr>
                                                    <td class="bold" width="16%">2. Status Mental</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_1" id="status-mental-ckp-1" value="1"
                                                            class="mr-1">CM
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_2" id="status-mental-ckp-2" value="1"
                                                            class="mr-1">Apatis
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_3" id="status-mental-ckp-3" value="1"
                                                            class="mr-1">Samnolen
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_4" id="status-mental-ckp-4" value="1"
                                                            class="mr-1">Sopor
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_5" id="status-mental-ckp-5" value="1"
                                                            class="mr-1">Koma                                                   
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="bold" width="16%">3. Riwayat Penyakit</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="radio" name="riwayat_penyakit_ckp_1" id="riwayat-penyakit-ckp-1" value="0"
                                                            class="mr-1">Tidak
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="riwayat_penyakit_ckp_1" id="riwayat-penyakit-ckp-2" value="1"
                                                            class="mr-1 ml-2">Ya
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_3" id="riwayat-penyakit-ckp-3"
                                                            value="asma" class="mr-1">Asma
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_4" id="riwayat-penyakit-ckp-4"
                                                            value="dm" class="mr-1 ml-2">DM
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_5" id="riwayat-penyakit-ckp-5"
                                                            value="cardiovascular" class="mr-1 ml-2">Cardiovascular
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%"></td>
                                                    <td class="bold" width="1%"></td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_6" id="riwayat-penyakit-ckp-6"
                                                            value="kanker" class="mr-1">Kanker
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_7" id="riwayat-penyakit-ckp-7"
                                                            value="thalasemia" class="mr-1 ml-2">Thalasemia
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_8" id="riwayat-penyakit-ckp-8"
                                                            value="lain - lain" class="mr-1 ml-2">lain - lain
                                                    </td>
                                                    <td>
                                                        <input type="text" name="riwayat_penyakit_ckp_9" id="riwayat-penyakit-ckp-9"
                                                            class="custom-form clear-input d-inline-block col-lg-10"
                                                            placeholder="Sebutkan">                                                                                                     
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">4. Pengobatan saat ini</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="pengobatan_saat_ini_ckp" id="pengobatan-saat-ini-ckp"
                                                            class="custom-form clear-input d-inline-block col-lg-10"
                                                            placeholder="Sebutkan">
                                                                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">5. Operasi Sebelumnya</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="operasi_sebelumnya_ckp" id="operasi-sebelumnya-ckp"
                                                            class="custom-form clear-input d-inline-block col-lg-10"
                                                            placeholder="Sebutkan">
                                                                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">6. Alergi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="radio" name="alergi_ckp" id="alergi-ckp-1" value="0"
                                                            class="mr-1">Tidak
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="alergi_ckp" id="alergi-ckp-2" value="1"
                                                            class="mr-1 ml-2">Ya,
                                                    </td>
                                                    <td>
                                                        Sebutkan <input type="text" name="alergi_ckp_3" id="alergi-ckp-3"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan ">&nbsp;&nbsp;
                                                    </td>
                                                    <td>
                                                        Reaksi <input type="text" name="alergi_ckp_4" id="alergi-ckp-4"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">                                                                                                     
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="bold" width="16%">7. Gol.Darah</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>                                                  
                                                        <input type="text" name="gol_darah_ckp_1" id="gol-darah-ckp-1"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan lainya">
                                                    </td>
                                                    <td>
                                                        Rhesus : <input type="text" name="gol_darah_ckp_2" id="gol-darah-ckp-2"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">                                                                                                     
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">8. Standar Kewaspadaan</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>                                                  
                                                        <input type="text" name="standar_kewaspadaan_ckp_1" id="standar-kewaspadaan-ckp-1"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">
                                                    </td>
                                                    <td>
                                                        Diagnisis : <input type="text" name="standar_kewaspadaan_ckp_2" id="standar-kewaspadaan-ckp-2"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">                                                                                                     
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">9. Rencana Tindakan/Operasi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="rencana_tindakan_operasi_ckp" id="rencana-tindakan-operasi-ckp"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">                                                                                                  
                                                    </td>
                                                </tr>                                           

                                                <tr>
                                                    <td class="bold" width="16%">10. Rencana Perawatan Pasca Operasi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="rencana_perawatan_pasca_operasi_ckp" id="rencana-perawatan-pasca-operasi-ckp"
                                                            class="custom-form clear-input d-inline-block col-lg-8"
                                                            placeholder="Sebutkan">                                                                                                     
                                                    </td>
                                                </tr>
                                            </table>  
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td class="bold" width="16%">11. Dokter Operator</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="dokter_operator_ckp"id="dokter-operator-ckp" class="select2c-input ml-2">
                                                    </td>
                                                </tr>   
                                            </table>                              
                                        </div>
                                        <!-- CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record(Diisi oleh perawat ruangan)AKHIR -->


                                        <!-- CEKLIST PERSIAPAN OPERASI/Pre-operative cheklist(Diisi oleh perawat ruangan dan perawat kamar bedah) AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-ceklist-persiapan-operasi"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>B. CEKLIST PERSIAPAN OPERASI/Pre-operative cheklist(Diisi oleh perawat ruangan dan perawat kamar bedah)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-ceklist-persiapan-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <table>
                                                    <tr>
                                                        <td class="bold" width="16%">Beri Tanda</td>
                                                        <td class="bold" width="1%">:</td>
                                                        <td class="bold" width="10%">&#9745 Ya</td>
                                                        <td class="bold" width="10%">X Tidak</td>
                                                        <td class="bold" width="10%"> A/N Tidak Menggunakan</td>
                                                        <td width="53%"></td>
                                                    </tr>
                                                </table>

                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="25%"><b>I. VERIFIKASI PASIEN</b></th>
                                                                        <th width="18%" class="center"><b>Ruangan</b></th>
                                                                        <th width="18%" class="center"><b>Ruang Penerimaan</b></th>
                                                                        <th width="18%" class="center"><b>OT</b></th>
                                                                        <th width="18%" class="center"><b>Keterangan</b></th>                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>1. Periksa identitas pasien</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_1"
                                                                                id="verifikasi-pasien-1" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_2"
                                                                                id="verifikasi-pasien-2" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_3"
                                                                                id="verifikasi-pasien-3" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_4" id="verifikasi-pasien-4"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2. Periksa gelang identitas / gelang operasi / gelang alergi</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_5"
                                                                                id="verifikasi-pasien-5" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_6"
                                                                                id="verifikasi-pasien-6" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_7"
                                                                                id="verifikasi-pasien-7" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_8" id="verifikasi-pasien-8"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3. Surat pengantar operasi</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_9"
                                                                                id="verifikasi-pasien-9" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_10"
                                                                                id="verifikasi-pasien-10" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_11"
                                                                                id="verifikasi-pasien-11" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_12" id="verifikasi-pasien-12"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4. Jenis dan lokasi pembedahan dipastikan bersama pasien</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_13"
                                                                                id="verifikasi-pasien-13" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_14"
                                                                                id="verifikasi-pasien-14" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_15"
                                                                                id="verifikasi-pasien-15" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_16" id="verifikasi-pasien-16"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5. Masalah bahasa / komunikasi</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_17"
                                                                                id="verifikasi-pasien-17" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_18"
                                                                                id="verifikasi-pasien-18" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_19"
                                                                                id="verifikasi-pasien-19" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_20" id="verifikasi-pasien-20"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6. Periksa kelengkapan persetujuan pembedahan</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_21"
                                                                                id="verifikasi-pasien-21" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_22"
                                                                                id="verifikasi-pasien-22" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_23"
                                                                                id="verifikasi-pasien-23" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_24" id="verifikasi-pasien-24"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>7. Periksa kelengkapan persetujuan anastesi</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_25"
                                                                                id="verifikasi-pasien-25" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_26"
                                                                                id="verifikasi-pasien-26" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_27"
                                                                                id="verifikasi-pasien-27" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_28" id="verifikasi-pasien-28"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>8. Periksa kelengkapan resume medis (rawat inap & rawat jalan)</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_29"
                                                                                id="verifikasi-pasien-29" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_30"
                                                                                id="verifikasi-pasien-30" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_31"
                                                                                id="verifikasi-pasien-31" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_32" id="verifikasi-pasien-32"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>9. Periksa kelengkapan X-ray/CT-Scan/MR/EKG/angiografi/Echo)</td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_33"
                                                                                id="verifikasi-pasien-33" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_34"
                                                                                id="verifikasi-pasien-34" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="verifikasi_pasien_35"
                                                                                id="verifikasi-pasien-35" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="verifikasi_pasien_36" id="verifikasi-pasien-36"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 

                                                <!-- BATAS  -->
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="25%"><b>II. PERSIAPAN FISIK PASIEN</b></th>
                                                                        <th width="18%" class="center"><b>Ruangan</b></th>
                                                                        <th width="18%" class="center"><b>Ruang Penerimaan</b></th>
                                                                        <th width="18%" class="center"><b>OT</b></th>
                                                                        <th width="18%" class="center"><b>Keterangan</b></th>                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>1. Puasa / makan dan minum terakhir</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_1"
                                                                                id="persiapan-fisik-pasien-1" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_2"
                                                                                id="persiapan-fisik-pasien-2" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_3"
                                                                                id="persiapan-fisik-pasien-3" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_4" id="persiapan-fisik-pasien-4"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2. Prostase luar dilepaskan (gigi palsu, lensa kontak)</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_5"
                                                                                id="persiapan-fisik-pasien-5" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_6"
                                                                                id="persiapan-fisik-pasien-6" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_7"
                                                                                id="persiapan-fisik-pasien-7" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_8" id="persiapan-fisik-pasien-8"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3. Menggunakan prostase dalam (pacameker, implan, prostase panggul / bahu. VO shunt)</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_9"
                                                                                id="persiapan-fisik-pasien-9" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_10"
                                                                                id="persiapan-fisik-pasien-10" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_11"
                                                                                id="persiapan-fisik-pasien-11" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_12" id="persiapan-fisik-pasien-12"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4. Penjepit rambut / cat kuku / perhiasan di lepaskan</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_13"
                                                                                id="persiapan-fisik-pasien-13" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_14"
                                                                                id="persiapan-fisik-pasien-14" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_15"
                                                                                id="persiapan-fisik-pasien-15" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_16" id="persiapan-fisik-pasien-16"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5. Persiapan kulit (Mandi Chlorhexidine 2% / Cukur</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_17"
                                                                                id="persiapan-fisik-pasien-17" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_18"
                                                                                id="persiapan-fisik-pasien-18" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_19"
                                                                                id="persiapan-fisik-pasien-19" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_20" id="persiapan-fisik-pasien-20"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6. Pengosongan kandungan kemih / clysma</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_21"
                                                                                id="persiapan-fisik-pasien-21" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_22"
                                                                                id="persiapan-fisik-pasien-22" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_23"
                                                                                id="persiapan-fisik-pasien-23" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_24" id="persiapan-fisik-pasien-24"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>7. Memastikan persediaan darah</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_25"
                                                                                id="persiapan-fisik-pasien-25" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_26"
                                                                                id="persiapan-fisik-pasien-26" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_27"
                                                                                id="persiapan-fisik-pasien-27" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_28" id="persiapan-fisik-pasien-28"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>8. Alat bantu : (kaca mata, alat bantu dengar) disimpan</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_29"
                                                                                id="persiapan-fisik-pasien-29" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_30"
                                                                                id="persiapan-fisik-pasien-30" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_31"
                                                                                id="persiapan-fisik-pasien-31" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_32" id="persiapan-fisik-pasien-32"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>9. Obat yang di sertakan</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_33"
                                                                                id="persiapan-fisik-pasien-33" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_34"
                                                                                id="persiapan-fisik-pasien-34" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_35"
                                                                                id="persiapan-fisik-pasien-35" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_36" id="persiapan-fisik-pasien-36"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>10. Obat terakhir yang diberikan</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_37"
                                                                                id="persiapan-fisik-pasien-37" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_38"
                                                                                id="persiapan-fisik-pasien-38" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_39"
                                                                                id="persiapan-fisik-pasien-39" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_40" id="persiapan-fisik-pasien-40"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                    
                                                                        <tr>
                                                                            <td>11. Vaskuler askes (cimino) IV Line No 
                                                                            <input type="text" name="persiapan_fisik_pasien_41" id="persiapan-fisik-pasien-41"class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                            placeholder="nomor">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_42"
                                                                                id="persiapan-fisik-pasien-42" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_43"
                                                                                id="persiapan-fisik-pasien-43" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_44"
                                                                                id="persiapan-fisik-pasien-44" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_45" id="persiapan-fisik-pasien-45"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>12. Pemeriksaan DJJ (Denyut Jantung Janin)</td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_46"
                                                                                id="persiapan-fisik-pasien-46" value="1"class="mr-1" >
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_47"
                                                                                id="persiapan-fisik-pasien-47" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_48"
                                                                                id="persiapan-fisik-pasien-48" value="1"class="mr-1">
                                                                            </td>
                                                                            <td class="center"><input type="text" name="persiapan_fisik_pasien_49" id="persiapan-fisik-pasien-49"
                                                                                class="custom-form clear-input">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Diperiksa oleh :</b></td>
                                                                            <td class="center"><b>Perawat Ruangan</b></td>
                                                                            <td class="center"><input type="text" name="perawat_ruangan_pfp"
                                                                                id="perawat-ruangan-pfp" class="select2c-input ml-2">
                                                                            </td>
                                                                            <td class="center"><b>Jam</b> <input type="text" name="jam_pfp" id="jam-pfp"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"placeholder="isi jam"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td class="center"><b>Perawat Penerima OT</b></td>
                                                                            <td class="center"><input type="text" name="perawat_penerima_ot_ppo"
                                                                                id="perawat-penerima-ot-ppo" class="select2c-input ml-2">
                                                                            </td>
                                                                            <td class="center"><b>Jam</b><input type="text" name="jam_ppo" id="jam-ppo"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"placeholder="isi jam"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                    <!-- BATAS -->
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="25%"><b>III. PERSIAPAN Lain-Lain</b></th>
                                                                        <th width="18%" class="center"></th>
                                                                        <th width="18%" class="center"></th>
                                                                        <th width="18%" class="center"></th>
                                                                        <th width="18%" class="center"></th>                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody> 
                                                                        <tr>
                                                                            <td>1. Site Marketing</td>
                                                                            <td class="center"><input type="radio" name="site_marketing"
                                                                                id="site-marketing-1" class="mr-1" value="1">Ya
                                                                            </td>
                                                                            <td class="center"> <input type="radio" name="site_marketing"
                                                                                id="site-marketing-2" class="mr-1" value="0">Tidak
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>                                                                                                                                                                                                                                                                           
                                                                        <tr>
                                                                            <td></td>
                                                                            <td class="center"><b>Perawat OT</b></td>
                                                                            <td class="center"><input type="text" name="perawat_ot_po"
                                                                                id="perawat-ot-po" class="select2c-input ml-2">
                                                                            </td>
                                                                            <td class="center"><b>Tanggal & Jam</b><input type="text" name="jam_tanggal_po" id="jam-tanggal-po"
                                                                                class="custom-form clear-input d-inline-block col-lg-6 ml-1"placeholder="isi tanggal & jam"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                            </table>
                                        </div>
                                        <!-- CEKLIST PERSIAPAN OPERASI/Pre-operative cheklist(Diisi oleh perawat ruangan dan perawat kamar bedah) AKHIR -->

                                        <!-- ASUHAN KEPERAWATN AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-assuhan-keperawatan-1"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-1">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <tr>
                                                                        <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                        <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                        <td class="center"><b>EVALUASI</b></td>                                                                  
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_1"
                                                                            id="asuhan-keperawatan-ak-1" value="1"class="mr-1">
                                                                            Anastesi berhubungan dengan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_2"
                                                                            id="asuhan-keperawatan-ak-2" value="1"class="mr-1">
                                                                            Identifikasi saat tingkat ansietas berubah(mis,kondisi,waktu,stresor)
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_3"
                                                                            id="asuhan-keperawatan-ak-3" value="1"class="mr-1">
                                                                            Verbalisasi kebingungan menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_4"
                                                                            id="asuhan-keperawatan-ak-4" value="1"class="mr-1">
                                                                            Krisis situasional
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_5"
                                                                            id="asuhan-keperawatan-ak-5" value="1"class="mr-1">
                                                                            Monitor tanda-tanda cemas
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_6"
                                                                            id="asuhan-keperawatan-ak-6" value="1"class="mr-1">
                                                                            Verbalisasi khawatir akibat kondisi yang dihadapi menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_7"
                                                                            id="asuhan-keperawatan-ak-7" value="1"class="mr-1">
                                                                            Kebutuhan tidak terpenuhi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_8"
                                                                            id="asuhan-keperawatan-ak-8" value="1"class="mr-1">
                                                                            Ciptakan suasana terapeutik untuk menumbuhkan kepercayaan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_9"
                                                                            id="asuhan-keperawatan-ak-9" value="1"class="mr-1">
                                                                            Perilaku gelisah menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_10"
                                                                            id="asuhan-keperawatan-ak-10" value="1"class="mr-1">
                                                                            Krisis maturasional
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_11"
                                                                            id="asuhan-keperawatan-ak-11" value="1"class="mr-1">
                                                                            Temani pasien untuk meningkatkan keselamatan dan mengurangi rasa takut
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_12"
                                                                            id="asuhan-keperawatan-ak-12" value="1"class="mr-1">
                                                                            Perilaku tegang menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_13"
                                                                            id="asuhan-keperawatan-ak-13" value="1"class="mr-1">
                                                                            Ancaman terhadap konsep diri
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_14"
                                                                            id="asuhan-keperawatan-ak-14" value="1"class="mr-1">
                                                                            Pahami situasi yang membuat ansietas
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_15"
                                                                            id="asuhan-keperawatan-ak-15" value="1"class="mr-1">
                                                                            Keluhan pusing
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_16"
                                                                            id="asuhan-keperawatan-ak-16" value="1"class="mr-1">
                                                                            Ancaman terhadap kematian
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_17"
                                                                            id="asuhan-keperawatan-ak-17" value="1"class="mr-1">
                                                                            DEngarkan dengan penuh perhatian
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_18"
                                                                            id="asuhan-keperawatan-ak-18" value="1"class="mr-1">
                                                                            Anoreksia
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_19"
                                                                            id="asuhan-keperawatan-ak-19" value="1"class="mr-1">
                                                                            Kehawatiran mengalami kegagalan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_20"
                                                                            id="asuhan-keperawatan-ak-20" value="1"class="mr-1">
                                                                            Gunakan pendekatan yang tenang dan meyakinkan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_21"
                                                                            id="asuhan-keperawatan-ak-21" value="1"class="mr-1">
                                                                            Frekuensi nadi menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_22"
                                                                            id="asuhan-keperawatan-ak-22" value="1"class="mr-1">
                                                                            Disfungsi sistem keluarga
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_23"
                                                                            id="asuhan-keperawatan-ak-23" value="1"class="mr-1">
                                                                            Informasi secara faktual mengenai diagnosis pengobatan dan prognosis
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_24"
                                                                            id="asuhan-keperawatan-ak-24" value="1"class="mr-1">
                                                                            Tekanan darah menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_25"
                                                                            id="asuhan-keperawatan-ak-25" value="1"class="mr-1">
                                                                            Hubungan orang tua anak tidak memuaskan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_26"
                                                                            id="asuhan-keperawatan-ak-26" value="1"class="mr-1">
                                                                            Jelaskan prosedur, termasuk sensasi yang mungkin di alami
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_27"
                                                                            id="asuhan-keperawatan-ak-27" value="1"class="mr-1">
                                                                            Diaforesis menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_28"
                                                                            id="asuhan-keperawatan-ak-28" value="1"class="mr-1">
                                                                            Penyalahgunaan zat
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_29"
                                                                            id="asuhan-keperawatan-ak-29" value="1"class="mr-1">
                                                                            Anjurkan keluarga untuk tetap bersama pasien, jika perlu
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_30"
                                                                            id="asuhan-keperawatan-ak-30" value="1"class="mr-1">
                                                                            Tremor menurun
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_31"
                                                                            id="asuhan-keperawatan-ak-31" value="1"class="mr-1">
                                                                            Terpapar bahaya lingkungan (mis,toksin,dll)
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_32"
                                                                            id="asuhan-keperawatan-ak-32" value="1"class="mr-1">
                                                                            Latih kegiatan mengalihkan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_33"
                                                                            id="asuhan-keperawatan-ak-33" value="1"class="mr-1">
                                                                            Prilaku sesuai anjuran meningkat
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_34"
                                                                            id="asuhan-keperawatan-ak-34" value="1"class="mr-1">
                                                                            Defisit pengetahuan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_35"
                                                                            id="asuhan-keperawatan-ak-35" value="1"class="mr-1">
                                                                            Latih Teknik relaksasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_36"
                                                                            id="asuhan-keperawatan-ak-36" value="1"class="mr-1">
                                                                            Verbalisasi minat dalam belajar meningkat
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_37"
                                                                            id="asuhan-keperawatan-ak-37" value="1"class="mr-1">
                                                                            Keterbatasan kognitif
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_38"
                                                                            id="asuhan-keperawatan-ak-38" value="1"class="mr-1">
                                                                            Identifikasi masalah kesehatan individu dan keluarga
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_39"
                                                                            id="asuhan-keperawatan-ak-39" value="1"class="mr-1">
                                                                            Kemampuan menjelaskan tentang satu topik meningkat
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_40"
                                                                            id="asuhan-keperawatan-ak-40" value="1"class="mr-1">
                                                                            Gangguan fungsi kognitif
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_41"
                                                                            id="asuhan-keperawatan-ak-41" value="1"class="mr-1">
                                                                            Identifikasi insiatif individu dan keluarga
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_42"
                                                                            id="asuhan-keperawatan-ak-42" value="1"class="mr-1">
                                                                            Perilaku sesuai dengan pengetahuan meningkat
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_43"
                                                                            id="asuhan-keperawatan-ak-43" value="1"class="mr-1">
                                                                            Kekeliruan mengikuti anjuran
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_44"
                                                                            id="asuhan-keperawatan-ak-44" value="1"class="mr-1">
                                                                            Jelaskan tentang prosedur tindakan
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_45"
                                                                            id="asuhan-keperawatan-ak-45" value="1"class="mr-1">
                                                                            Kurang terpapar informasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_46"
                                                                            id="asuhan-keperawatan-ak-46" value="1"class="mr-1">
                                                                            Libatkan kolega / teman
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_47"
                                                                            id="asuhan-keperawatan-ak-47" value="1"class="mr-1">
                                                                            Kurang minat dalam belajar
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_48"
                                                                            id="asuhan-keperawatan-ak-48" value="1"class="mr-1">
                                                                            Beri kesempatan pasien untuk bertanya
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_49"
                                                                            id="asuhan-keperawatan-ak-49" value="1"class="mr-1">
                                                                            Kurang mamapu mengingat
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_50"
                                                                                id="asuhan-keperawatan-ak-50" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatan_ak_51" id="asuhan-keperawatan-ak-51"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                        
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_52"
                                                                            id="asuhan-keperawatan-ak-52" value="1"class="mr-1">
                                                                            Ketidaktahuan menemukan sumber informasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_53"
                                                                            id="asuhan-keperawatan-ak-53" value="1"class="mr-1">
                                                                            kaloborasi pemberian obat anti ansietas, jika perlu
                                                                        </td>
                                                                        </td><td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_54"
                                                                                id="asuhan-keperawatan-ak-54" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatan_ak_55" id="asuhan-keperawatan-ak-55"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatan_ak_56"
                                                                                id="asuhan-keperawatan-ak-56" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatan_ak_57" id="asuhan-keperawatan-ak-57"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                        
                                                                        </td><td>
                                                                    </tr> 
                                                                    
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>                                                                  
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="center"><b>Perawat Ruangan</b></td>
                                                                        <td class="center"><b>Perawat Anastesi </b></td>
                                                                        <td class="center"><b>Perawat Kamar Bedah</b></td>                                                                  
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="center"><input type="text" name="perawwat_ruangan_pr"
                                                                                id="perawwat-ruangan-pr" class="select2c-input ml-2">
                                                                        </td>
                                                                        <td class="center"><input type="text" name="perawwat_anastesi_pa"
                                                                                id="perawwat-anastesi-pa" class="select2c-input ml-2">
                                                                        </td>
                                                                        <td class="center"><input type="text" name="perawwat_kamar_bedah"
                                                                                id="perawwat-kamar-bedah" class="select2c-input ml-2">
                                                                        </td>
                                                                    </tr>
                                                            </tbody>                                                           
                                                        </table>
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR -->

                                        <!-- CATATAN KEPERAWATAN INTRA OPERASI AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-catatan-keperawatan-intra-operasi"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>CATATAN KEPERAWATAN INTRA OPERASI : Diisi lengkap oleh staf perawat Kamar Operasi
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-intra-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <table>
                                                    <tr>
                                                        <td class="bold" width="15%">1. Time Out</td>
                                                        <td class="bold" width="15%">
                                                            
                                                        <input type="radio" name="time_out_ckio_1"
                                                                                id="time-out-ckio-1" value="1" class="mr-1">Ya</td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_2" id="time-out-ckio-2"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_1"
                                                                                id="time-out-ckio-3" value="0" class="mr-1" >Tidak</td>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%"></td>                                                  
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%">2. Cek ketersediaan peralatan & fungsinya,</td>                                                 
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%">a.Instrument</td>  
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_4"
                                                                                id="time-out-ckio-4" class="mr-1" value="1">Ya</td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_5" id="time-out-ckio-5"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_4"
                                                                                id="time-out-ckio-6" class="mr-1" value="0">Tidak</td>
                                                        <td class="bold" width="15%"></td>                                                                                                  
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%">b.Protese / Implant</td>  
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_7"
                                                                                id="time-out-ckio-7" class="mr-1" value="1">Ya</td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_8" id="time-out-ckio-8"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_7"
                                                                                id="time-out-ckio-9" class="mr-1" value="0">Tidak</td>
                                                        <td class="bold" width="15%"></td>                                                                                                   
                                                    </tr>
                                                </table>
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%"> Mulai Jam : <input type="text" name="time_out_ckio_10" id="time-out-ckio-10"
                                                                                class="custom-form clear-input d-inline-block col-lg-2 ml-1"placeholder="masukan jam"></td>
                                                                    <td widtd="25%"></td>
                                                                    <td widtd="25%">Selesai Jam : <input type="text" name="time_out_ckio_11" id="time-out-ckio-11"
                                                                                class="custom-form clear-input d-inline-block col-lg-2 ml-1"placeholder="masukan jam"></td> 
                                                                    <td widtd="25%"></td>                 
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <!-- BATAS -->
                                                        <table class="table table-sm table-striped table-bordered">
                                                                <tr>
                                                                    <td width="25%">1. Dilakukan Operasi</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_1" id="catatan-keperawatan-intra-operasi-1"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                
                                                                <tr>
                                                                    <td width="25%">2. Tipe Operasi</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_2"
                                                                            id="catatan-keperawatan-intra-operasi-2" value="1"class="mr-1">Elektif
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_3"
                                                                            id="catatan-keperawatan-intra-operasi-3" value="1"class="mr-1">Darurat
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_4"
                                                                            id="catatan-keperawatan-intra-operasi-4" value="1"class="mr-1">Operasi sehari
                                                                    </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td width="25%">3. Tipe Pembiusan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_5"
                                                                            id="catatan-keperawatan-intra-operasi-5" value="1"class="mr-1">Umum
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_6"
                                                                            id="catatan-keperawatan-intra-operasi-6" value="1"class="mr-1 ">Lokal
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_7"
                                                                            id="catatan-keperawatan-intra-operasi-7" value="1"class="mr-1 ">Regional
                                                                    </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td width="25%">4. Tingkat kesadaran waktu masuk kamar operasi</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_8"
                                                                            id="catatan-keperawatan-intra-operasi-8" value="1"class="mr-1">Terjaga
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_9"
                                                                            id="catatan-keperawatan-intra-operasi-9" value="1"class="mr-1 ">Mudah dibangunkan
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_10"
                                                                            id="catatan-keperawatan-intra-operasi-10" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td> 
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_11" id="catatan-keperawatan-intra-operasi-11"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"disabled>
                                                                    </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td width="25%">5. Status emosi waktu masuk kamar operasi</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_12"
                                                                            id="catatan-keperawatan-intra-operasi-12" value="1"class="mr-1">Rileks
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_13"
                                                                            id="catatan-keperawatan-intra-operasi-13" value="1"class="mr-1 ">Gelisah
                                                                    </td>
                                                                    <td> 
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_14"
                                                                            id="catatan-keperawatan-intra-operasi-14" value="1"class="mr-1 ">Tidak ada respon
                                                                    </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td width="25%">6. Posisi kanula intravena</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_15"
                                                                            id="catatan-keperawatan-intra-operasi-15" value="1"class="mr-1">Ta  
                                                                    </td>
                                                                    <td>    
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_16"
                                                                                id="catatan-keperawatan-intra-operasi-16" class="mr-1" value="kiri">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_16"
                                                                                id="catatan-keperawatan-intra-operasi-17" class="mr-1" value="kanan">Kanan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_18"
                                                                            id="catatan-keperawatan-intra-operasi-18" value="1"class="mr-1 ">Ka  
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_19"
                                                                                id="catatan-keperawatan-intra-operasi-19" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_19"
                                                                                id="catatan-keperawatan-intra-operasi-20" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_21"
                                                                            id="catatan-keperawatan-intra-operasi-21" value="1"class="mr-1">Atrial line
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_22"
                                                                            id="catatan-keperawatan-intra-operasi-22" value="1"class="mr-1 ">CVP
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_23"
                                                                            id="catatan-keperawatan-intra-operasi-23" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_24" id="catatan-keperawatan-intra-operasi-24"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">7. Posisi Operasi (diawasi oleh 
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_25" id="catatan-keperawatan-intra-operasi-25"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_26"
                                                                            id="catatan-keperawatan-intra-operasi-26" value="1"class="mr-1">Telentang
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_27"
                                                                            id="catatan-keperawatan-intra-operasi-27" value="1"class="mr-1 ">Lithtotomy
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_28"
                                                                            id="catatan-keperawatan-intra-operasi-28" value="1"class="mr-1 ">Tengkurap
                                                                    </td>
                                                                </tr>                                                       
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_29"
                                                                            id="catatan-keperawatan-intra-operasi-29" value="1"class="mr-1">Lateral
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_30"
                                                                                id="catatan-keperawatan-intra-operasi-30" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_30"
                                                                                id="catatan-keperawatan-intra-operasi-31" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_32"
                                                                            id="catatan-keperawatan-intra-operasi-32" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_33" id="catatan-keperawatan-intra-operasi-33"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">8. Posisi lengan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_34"
                                                                            id="catatan-keperawatan-intra-operasi-34" value="1"class="mr-1">Lengan terentang
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_35"
                                                                                id="catatan-keperawatan-intra-operasi-35" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_35"
                                                                                id="catatan-keperawatan-intra-operasi-36" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                </tr>                                                             
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_37"
                                                                            id="catatan-keperawatan-intra-operasi-37" value="1"class="mr-1">Lengan terlipat
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_38"
                                                                                id="catatan-keperawatan-intra-operasi-38" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_38"
                                                                                id="catatan-keperawatan-intra-operasi-39" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_40"
                                                                            id="catatan-keperawatan-intra-operasi-40" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_41" id="catatan-keperawatan-intra-operasi-41"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">9. Posisi alat bantu yang digunakan </td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_42"
                                                                            id="catatan-keperawatan-intra-operasi-42" value="1"class="mr-1">Papan lengan penyanggah
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_43"
                                                                            id="catatan-keperawatan-intra-operasi-43" value="1"class="mr-1 ">Papan lengan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_44"
                                                                            id="catatan-keperawatan-intra-operasi-44" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_45" id="catatan-keperawatan-intra-operasi-45"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td width="25%">10. Memakai kateter urine</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_46"
                                                                            id="catatan-keperawatan-intra-operasi-46" value="1"class="mr-1">Tidak
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_47"
                                                                            id="catatan-keperawatan-intra-operasi-47" value="1"class="mr-1 ">Dalam K.O
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_48"
                                                                            id="catatan-keperawatan-intra-operasi-48" value="1"class="mr-1 ">Diruangan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_49"
                                                                            id="catatan-keperawatan-intra-operasi-49" value="1"class="mr-1 ">Keurimeter
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_50"
                                                                            id="catatan-keperawatan-intra-operasi-50" value="1"class="mr-1">Kantong urine tertutup
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_51"
                                                                            id="catatan-keperawatan-intra-operasi-51" value="1"class="mr-1 ">Keteraksi
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_52"
                                                                            id="catatan-keperawatan-intra-operasi-52" value="1"class="mr-1 ">Dijepit
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">11. Persiapan kulit</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_53"
                                                                            id="catatan-keperawatan-intra-operasi-53" value="1"class="mr-1">Chlorhexdine/spirit 70%
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_54"
                                                                            id="catatan-keperawatan-intra-operasi-54" value="1"class="mr-1 ">Povidon-lodin
                                                                    </td>
                                                                </tr>                                                            
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_55"
                                                                            id="catatan-keperawatan-intra-operasi-55" value="1"class="mr-1">Chlorhexdine aquaeosous 0,1
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_56"
                                                                            id="catatan-keperawatan-intra-operasi-56" value="1"class="mr-1 ">Hibiscrub
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">12. Pemakaian Diathermi lokasi dari dipersive elaktroda (dipasang oleh 
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_57" id="catatan-keperawatan-intra-operasi-57"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_58"
                                                                            id="catatan-keperawatan-intra-operasi-58" value="1"class="mr-1">Tidak
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_59"
                                                                            id="catatan-keperawatan-intra-operasi-59" value="1"class="mr-1 ">Monopolar
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_60"
                                                                            id="catatan-keperawatan-intra-operasi-60" value="1"class="mr-1 ">Bokong
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_61"
                                                                                id="catatan-keperawatan-intra-operasi-61" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_61"
                                                                                id="catatan-keperawatan-intra-operasi-62" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_63"
                                                                            id="catatan-keperawatan-intra-operasi-63" value="1"class="mr-1">Paha
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_64"
                                                                                id="catatan-keperawatan-intra-operasi-64" class="mr-1" value="1">Kiri
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_64"
                                                                                id="catatan-keperawatan-intra-operasi-65" class="mr-1" value="2">Kanan
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_66"
                                                                            id="catatan-keperawatan-intra-operasi-66" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_67" id="catatan-keperawatan-intra-operasi-67"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">13. Pemeriksaan kondisisi kulit sebelum operasi (Kode unit elektrosugical 
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_68" id="catatan-keperawatan-intra-operasi-68"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_69"
                                                                            id="catatan-keperawatan-intra-operasi-69" value="1"class="mr-1">Utuh
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_70"
                                                                            id="catatan-keperawatan-intra-operasi-70" value="1"class="mr-1 ">Menggelembung
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_71"
                                                                            id="catatan-keperawatan-intra-operasi-71" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_72" id="catatan-keperawatan-intra-operasi-72"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_73"
                                                                            id="catatan-keperawatan-intra-operasi-73" value="1"class="mr-1">Utuh
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_74"
                                                                            id="catatan-keperawatan-intra-operasi-74" value="1"class="mr-1 ">Menggelembung
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_75"
                                                                            id="catatan-keperawatan-intra-operasi-75" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_operasi_76" id="catatan-keperawatan-intra-operasi-76"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">14. Unit pemanasan / Pendingin OP (Kode unit <input type="text" name="catatan_keperawatan_intra_operasi_77" id="catatan-keperawatan-intra-operasi-77"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_78"
                                                                                id="catatan-keperawatan-intra-operasi-78" class="mr-1" value="1">Ya
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" name="catatan_keperawatan_intra_operasi_78"
                                                                                id="catatan-keperawatan-intra-operasi-79" class="mr-1" value="0">Tidak
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">15. Pemakaian Tourniquet</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_80"
                                                                            id="catatan-keperawatan-intra-operasi-80" value="1"class="mr-1">Lengan Kanan 
                                                                    </td>
                                                                    <td>
                                                                        Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_81" id="catatan-keperawatan-intra-operasi-81"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                    </td>
                                                                    <td>
                                                                        Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_82" id="catatan-keperawatan-intra-operasi-82"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_83"
                                                                            id="catatan-keperawatan-intra-operasi-83" value="1"class="mr-1">Lengan Kiri 
                                                                    </td>
                                                                    <td>
                                                                        Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_84" id="catatan-keperawatan-intra-operasi-84"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                    </td>
                                                                    <td>
                                                                        Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_85" id="catatan-keperawatan-intra-operasi-85"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_86"
                                                                            id="catatan-keperawatan-intra-operasi-86" value="1"class="mr-1">Paha Kanan 
                                                                    </td>
                                                                    <td>
                                                                        Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_87" id="catatan-keperawatan-intra-operasi-87"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                    </td>
                                                                    <td>
                                                                        Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_88" id="catatan-keperawatan-intra-operasi-88"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_operasi_89"
                                                                            id="catatan-keperawatan-intra-operasi-89" value="1"class="mr-1">Paha Kiri 
                                                                    </td>
                                                                    <td>
                                                                        Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_90" id="catatan-keperawatan-intra-operasi-90"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                    </td>
                                                                    <td>
                                                                        Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_91" id="catatan-keperawatan-intra-operasi-91"
                                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>                                                           
                                                                <!-- BATASS -->
                                                                <tr>
                                                                    <td width="25%">16. Pemakaian laser (Diawasi oleh <input type="text" name="catatan_keperawatan_intra_op_1" id="catatan-keperawatan-intra-op-1"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_2" id="catatan-keperawatan-intra-op-2"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">17. Pemakaian implant</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_3" id="catatan-keperawatan-intra-op-3"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">18. Pemakaian Drain</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_4"
                                                                            id="catatan-keperawatan-intra-op-4" value="1"class="mr-1">Redivak
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_5"
                                                                            id="catatan-keperawatan-intra-op-5" value="1"class="mr-1 ">Yeates
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">19. Irigasi luka</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_6"
                                                                            id="catatan-keperawatan-intra-op-6" value="1"class="mr-1">Sodium Cloride 0,9%
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_7"
                                                                            id="catatan-keperawatan-intra-op-7" value="1"class="mr-1 ">Heamovac
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_8"
                                                                            id="catatan-keperawatan-intra-op-8" value="1"class="mr-1 ">Corrugated
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_9"
                                                                            id="catatan-keperawatan-intra-op-9" value="1"class="mr-1">Hitrogen Peroxide
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_10"
                                                                            id="catatan-keperawatan-intra-op-10" value="1"class="mr-1 ">Thoracic
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_11"
                                                                            id="catatan-keperawatan-intra-op-11" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_12" id="catatan-keperawatan-intra-op-12"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">20. Pemakaian Cairan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_13"
                                                                            id="catatan-keperawatan-intra-op-13" value="1"class="mr-1">Antibiotic Spray
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_14"
                                                                            id="catatan-keperawatan-intra-op-14" value="1"class="mr-1 ">Antibiotic
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_15"
                                                                            id="catatan-keperawatan-intra-op-15" value="1"class="mr-1 ">Glicine
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_16" id="catatan-keperawatan-intra-op-16"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">20. Pemakaian Cairan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_17"
                                                                            id="catatan-keperawatan-intra-op-17" value="1"class="mr-1">Air untuk irigasi
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_18" id="catatan-keperawatan-intra-op-18"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_19"
                                                                            id="catatan-keperawatan-intra-op-19" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_20" id="catatan-keperawatan-intra-op-20"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_21"
                                                                            id="catatan-keperawatan-intra-op-21" value="1"class="mr-1">BSS Solution
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_22"
                                                                            id="catatan-keperawatan-intra-op-22" value="1"class="mr-1 ">Sodium Cholorid 0,9%
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_23" id="catatan-keperawatan-intra-op-23"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        ltr/<input type="text" name="catatan_keperawatan_intra_op_24" id="catatan-keperawatan-intra-op-24"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        ltr/<input type="text" name="catatan_keperawatan_intra_op_25" id="catatan-keperawatan-intra-op-25"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_26"
                                                                            id="catatan-keperawatan-intra-op-26" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_27" id="catatan-keperawatan-intra-op-27"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">21. Alat - alat terbungkus</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_28"
                                                                            id="catatan-keperawatan-intra-op-28" value="1"class="mr-1">Tidak Ada
                                                                    </td>
                                                                    <td>
                                                                        ltr/<input type="text" name="catatan_keperawatan_intra_op_29" id="catatan-keperawatan-intra-op-29"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        Jenis:<input type="text" name="catatan_keperawatan_intra_op_30" id="catatan-keperawatan-intra-op-30"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_31"
                                                                            id="catatan-keperawatan-intra-op-31" value="1"class="mr-1">Ada
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_32"
                                                                            id="catatan-keperawatan-intra-op-32" value="1"class="mr-1">Tidak Ada
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_33"
                                                                            id="catatan-keperawatan-intra-op-33" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_34" id="catatan-keperawatan-intra-op-34"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">22. Balutan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_35"
                                                                            id="catatan-keperawatan-intra-op-35" value="1"class="mr-1">Histology
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_36" id="catatan-keperawatan-intra-op-36"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_37"
                                                                            id="catatan-keperawatan-intra-op-37" value="1"class="mr-1 ">Pressure
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_38"
                                                                            id="catatan-keperawatan-intra-op-38" value="1"class="mr-1 ">Jenis
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_39"
                                                                            id="catatan-keperawatan-intra-op-39" value="1"class="mr-1">Cytology
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_40" id="catatan-keperawatan-intra-op-40"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_41"
                                                                            id="catatan-keperawatan-intra-op-41" value="1"class="mr-1 ">Kultur
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_42" id="catatan-keperawatan-intra-op-42"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_43"
                                                                            id="catatan-keperawatan-intra-op-43" value="1"class="mr-1">Prozen Section
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" name="catatan_keperawatan_intra_op_44"
                                                                            id="catatan-keperawatan-intra-op-44" value="1"class="mr-1 ">Lain - lain
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_45" id="catatan-keperawatan-intra-op-45"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_46" id="catatan-keperawatan-intra-op-46"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                    </td>
                                                                </tr>
                                                                <tr></tr>
                                                                <tr></tr>
                                                                <tr></tr>
                                                                <tr>
                                                                    <td width="25%">Spesimen untuk pasien</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        Jumlah Total Jaringan / Cairan Pemeriksaan<input type="text" name="catatan_keperawatan_intra_op_47" id="catatan-keperawatan-intra-op-47"
                                                                            class="custom-form clear-input d-inline-block col-lg-3 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        Jenis dari Jaringan<input type="text" name="catatan_keperawatan_intra_op_48" id="catatan-keperawatan-intra-op-48"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td width="25%"></td>
                                                                    <td width="1%"></td>
                                                                    <td>
                                                                        Jumlah Jaringan<input type="text" name="catatan_keperawatan_intra_op_49" id="catatan-keperawatan-intra-op-49"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">Keterangan</td>
                                                                    <td width="1%">:</td>
                                                                    <td>
                                                                        <input type="text" name="catatan_keperawatan_intra_op_50" id="catatan-keperawatan-intra-op-50"
                                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td width="25%">Tanggal & Jam :<input type="text" name="tanggal_jam_ckio" id="tanggal-jam-ckio"
                                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                                    placeholder="dd/mm/yyyy hh:ii"></td>
                                                                    <td width="1%"></td>
                                                                    <td></td>
                                                                </tr> 
                                                                
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped">
                                                                <tr>
                                                                    <td width="30%">Perawat Instrument <input type="text" name="perawat_instrument_1"id="perawat-instrument-1"class="select2c-input ml-2"></td>                                      
                                                                    <td width="30%">Perawat Instrument <input type="text" name="perawat_instrument_2" id="perawat-instrument-2"class="select2c-input ml-2"></td>
                                                                    <td width="30%"></td>
                                                                </tr>                                                                                                               
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- CATATAN KEPERAWATAN INTRA OPERASI AWAL  -->

                                        <!-- ASUHAN KEPERAWATN AWAL ke 2-->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-assuhan-keperawatan-2"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-2">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <tr>
                                                                        <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                        <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                        <td class="center"><b>EVALUASI</b></td>                                                                  
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_1"
                                                                            id="asuhan-keperawatannnnn-ak-1" value="1"class="mr-1">
                                                                            Bersihan jalan nafas tidak evektif
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_2"
                                                                            id="asuhan-keperawatannnnn-ak-2" value="1"class="mr-1">
                                                                            Monitor pola nafas
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_3"
                                                                            id="asuhan-keperawatannnnn-ak-3" value="1"class="mr-1">
                                                                            Dispnea menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_4"
                                                                            id="asuhan-keperawatannnnn-ak-4" value="1"class="mr-1">
                                                                            Hipersekresi jalan nafas
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_5"
                                                                            id="asuhan-keperawatannnnn-ak-5" value="1"class="mr-1">
                                                                            Monitor bunyi nafas
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_6"
                                                                            id="asuhan-keperawatannnnn-ak-6" value="1"class="mr-1">
                                                                            Wheezing menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_7"
                                                                            id="asuhan-keperawatannnnn-ak-7" value="1"class="mr-1">
                                                                            Disfungsi neuromuskuler
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_8"
                                                                            id="asuhan-keperawatannnnn-ak-8" value="1"class="mr-1">
                                                                            Monitor sesuai oksigen
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_9"
                                                                            id="asuhan-keperawatannnnn-ak-9" value="1"class="mr-1">
                                                                            Sianosis menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_10"
                                                                            id="asuhan-keperawatannnnn-ak-10" value="1"class="mr-1">
                                                                            Adanya jalan nafas buatan 
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_11"
                                                                            id="asuhan-keperawatannnnn-ak-11" value="1"class="mr-1">
                                                                            Pertahankan kepatenan jalan nafas 
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_12"
                                                                            id="asuhan-keperawatannnnn-ak-12" value="1"class="mr-1">
                                                                            Frekuensi nafas membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_13"
                                                                            id="asuhan-keperawatannnnn-ak-13" value="1"class="mr-1">
                                                                            Efek agen farmakologis (mis.Anastesi)
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_14"
                                                                            id="asuhan-keperawatannnnn-ak-14" value="1"class="mr-1">
                                                                            Lakukan penghisap lendir dari 15 detik
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_15"
                                                                            id="asuhan-keperawatannnnn-ak-15" value="1"class="mr-1">
                                                                            Pola nafas membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_16"
                                                                            id="asuhan-keperawatannnnn-ak-16" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_17" id="asuhan-keperawatannnnn-ak-17"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                        
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_18"
                                                                            id="asuhan-keperawatannnnn-ak-18" value="1"class="mr-1">
                                                                            Berikan oksigen jika perlu
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_19"
                                                                            id="asuhan-keperawatannnnn-ak-19" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_20" id="asuhan-keperawatannnnn-ak-20"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                     
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_21"
                                                                            id="asuhan-keperawatannnnn-ak-21" value="1"class="mr-1">
                                                                            Resiko perdarahan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_22"
                                                                            id="asuhan-keperawatannnnn-ak-22" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_23" id="asuhan-keperawatannnnn-ak-23"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_24"
                                                                            id="asuhan-keperawatannnnn-ak-24" value="1"class="mr-1">
                                                                            Kelembapan membran mukosa meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_25"
                                                                            id="asuhan-keperawatannnnn-ak-25" value="1"class="mr-1">
                                                                            Aneurisma
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_26"
                                                                            id="asuhan-keperawatannnnn-ak-26" value="1"class="mr-1">
                                                                            Monitor tanda dan gejala perdarahan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_27"
                                                                            id="asuhan-keperawatannnnn-ak-27" value="1"class="mr-1">
                                                                            Kelembapan kulit meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_28"
                                                                            id="asuhan-keperawatannnnn-ak-28" value="1"class="mr-1">
                                                                            Gangguan koagulasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_29"
                                                                            id="asuhan-keperawatannnnn-ak-29" value="1"class="mr-1">
                                                                            Monitor tanda - tanda vital
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_30"
                                                                            id="asuhan-keperawatannnnn-ak-30" value="1"class="mr-1">
                                                                            Hemoptisis menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_31"
                                                                            id="asuhan-keperawatannnnn-ak-31" value="1"class="mr-1">
                                                                            Efek agen farmakologis
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_32"
                                                                            id="asuhan-keperawatannnnn-ak-32" value="1"class="mr-1">
                                                                            Pertahankan bedrest selama perdarahan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_33"
                                                                            id="asuhan-keperawatannnnn-ak-33" value="1"class="mr-1">
                                                                        Perdarahan pasca operasi menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_34"
                                                                            id="asuhan-keperawatannnnn-ak-34" value="1"class="mr-1">
                                                                            Tindakan pembedahan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_35"
                                                                            id="asuhan-keperawatannnnn-ak-35" value="1"class="mr-1">
                                                                            Kaloborasi pemberian obat pengontrol perdarahan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_36"
                                                                            id="asuhan-keperawatannnnn-ak-36" value="1"class="mr-1">
                                                                        Tekanan darah membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_37"
                                                                            id="asuhan-keperawatannnnn-ak-37" value="1"class="mr-1">
                                                                            Trauma
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_38"
                                                                            id="asuhan-keperawatannnnn-ak-38" value="1"class="mr-1">
                                                                            Kaloborasi pemberian produk darah
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_39"
                                                                            id="asuhan-keperawatannnnn-ak-39" value="1"class="mr-1">
                                                                            Denyut nadi apikal membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_40"
                                                                            id="asuhan-keperawatannnnn-ak-40" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_41" id="asuhan-keperawatannnnn-ak-41"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_42"
                                                                            id="asuhan-keperawatannnnn-ak-42" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_43" id="asuhan-keperawatannnnn-ak-43"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_44"
                                                                            id="asuhan-keperawatannnnn-ak-44" value="1"class="mr-1">
                                                                            Kekuatan nadi meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_45"
                                                                            id="asuhan-keperawatannnnn-ak-45" value="1"class="mr-1">
                                                                            Resiko syok
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_46"
                                                                            id="asuhan-keperawatannnnn-ak-46" value="1"class="mr-1">
                                                                            Monitor status kaardiopulmonal
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_47"
                                                                            id="asuhan-keperawatannnnn-ak-47" value="1"class="mr-1">
                                                                            Output urin meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_48"
                                                                            id="asuhan-keperawatannnnn-ak-48" value="1"class="mr-1">
                                                                            Hipoksemia
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_49"
                                                                            id="asuhan-keperawatannnnn-ak-49" value="1"class="mr-1">
                                                                            Monitor status oksigenasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_50"
                                                                            id="asuhan-keperawatannnnn-ak-50" value="1"class="mr-1">
                                                                            Tingkat kesadaran meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_51"
                                                                            id="asuhan-keperawatannnnn-ak-51" value="1"class="mr-1">
                                                                            Hipoksia
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_52"
                                                                            id="asuhan-keperawatannnnn-ak-52" value="1"class="mr-1">
                                                                            Monitor status cairan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_53"
                                                                            id="asuhan-keperawatannnnn-ak-53" value="1"class="mr-1">
                                                                            Saturasi oksigen meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_54"
                                                                            id="asuhan-keperawatannnnn-ak-54" value="1"class="mr-1">
                                                                            Hipotensi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_55"
                                                                            id="asuhan-keperawatannnnn-ak-55" value="1"class="mr-1">
                                                                            Monitor tingkat kesadaran
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_56"
                                                                            id="asuhan-keperawatannnnn-ak-56" value="1"class="mr-1">
                                                                            Tekanan darah membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_57"
                                                                            id="asuhan-keperawatannnnn-ak-57" value="1"class="mr-1">
                                                                            Kekurangan volume cairan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_58"
                                                                            id="asuhan-keperawatannnnn-ak-58" value="1"class="mr-1">
                                                                            Persiapkan intubasi, jika perlu
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_59"
                                                                            id="asuhan-keperawatannnnn-ak-59" value="1"class="mr-1">
                                                                            Frekuensi nadi membaik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_60"
                                                                            id="asuhan-keperawatannnnn-ak-60" value="1"class="mr-1">
                                                                            Sepsis
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_61"
                                                                            id="asuhan-keperawatannnnn-ak-61" value="1"class="mr-1">
                                                                            Kalaborasi pemberian IV
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_62"
                                                                            id="asuhan-keperawatannnnn-ak-62" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_63" id="asuhan-keperawatannnnn-ak-63"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_64"
                                                                            id="asuhan-keperawatannnnn-ak-64" value="1"class="mr-1">
                                                                            SIRS
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_65"
                                                                            id="asuhan-keperawatannnnn-ak-65" value="1"class="mr-1">
                                                                            Kalaborasi pemberian transfusi darah
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_66"
                                                                            id="asuhan-keperawatannnnn-ak-66" value="1"class="mr-1">
                                                                            Kebersihan tangan meningkat
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_67"
                                                                            id="asuhan-keperawatannnnn-ak-67" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_68" id="asuhan-keperawatannnnn-ak-68"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_69"
                                                                            id="asuhan-keperawatannnnn-ak-69" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_70" id="asuhan-keperawatannnnn-ak-70"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_71"
                                                                            id="asuhan-keperawatannnnn-ak-71" value="1"class="mr-1">
                                                                            Demam menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_72"
                                                                            id="asuhan-keperawatannnnn-ak-72" value="1"class="mr-1">
                                                                            Resiko infeksi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_73"
                                                                            id="asuhan-keperawatannnnn-ak-73" value="1"class="mr-1">
                                                                            Monitor tanda dan gejala lokal dan sistematik
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_74"
                                                                            id="asuhan-keperawatannnnn-ak-74" value="1"class="mr-1">
                                                                            Kemerahan menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_75"
                                                                            id="asuhan-keperawatannnnn-ak-75" value="1"class="mr-1">
                                                                            Efek prosedur invasif
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_76"
                                                                            id="asuhan-keperawatannnnn-ak-76" value="1"class="mr-1">
                                                                            Cuci tangan 5 moment
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_77"
                                                                            id="asuhan-keperawatannnnn-ak-77" value="1"class="mr-1">
                                                                            Nyeri menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_78"
                                                                            id="asuhan-keperawatannnnn-ak-78" value="1"class="mr-1">
                                                                            Peningkatan paparan organisme patogen lingkungan
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_79"
                                                                            id="asuhan-keperawatannnnn-ak-79" value="1"class="mr-1">
                                                                            Pertahankan tehnik aseptik pada pasien beresiko tinggi
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_80"
                                                                            id="asuhan-keperawatannnnn-ak-80" value="1"class="mr-1">
                                                                            Bengkak menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_81"
                                                                            id="asuhan-keperawatannnnn-ak-81" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_82" id="asuhan-keperawatannnnn-ak-82"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_83"
                                                                            id="asuhan-keperawatannnnn-ak-83" value="1"class="mr-1">
                                                                            Lakukan desinfeksi daerah yang akan dilakukan operasi dengan desinfektan
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_84"
                                                                            id="asuhan-keperawatannnnn-ak-84" value="1"class="mr-1">
                                                                            Kadar sel darah putih membaik 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_85"
                                                                            id="asuhan-keperawatannnnn-ak-85" value="1"class="mr-1">
                                                                            Nausea
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_86"
                                                                            id="asuhan-keperawatannnnn-ak-86" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_87" id="asuhan-keperawatannnnn-ak-87"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_88"
                                                                            id="asuhan-keperawatannnnn-ak-88" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_89" id="asuhan-keperawatannnnn-ak-89"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_90"
                                                                            id="asuhan-keperawatannnnn-ak-90" value="1"class="mr-1">
                                                                            Mengeluh mual
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_91"
                                                                            id="asuhan-keperawatannnnn-ak-91" value="1"class="mr-1">
                                                                            Identifikasi mual
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_92"
                                                                            id="asuhan-keperawatannnnn-ak-92" value="1"class="mr-1">
                                                                            Keluhan mual menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_93"
                                                                            id="asuhan-keperawatannnnn-ak-93" value="1"class="mr-1">
                                                                            Merasa ingin muntah
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_94"
                                                                            id="asuhan-keperawatannnnn-ak-94" value="1"class="mr-1">
                                                                            Identifikasi karakteristik muntah
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_95"
                                                                            id="asuhan-keperawatannnnn-ak-95" value="1"class="mr-1">
                                                                            Perasaan ingin muntah menurun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_96"
                                                                            id="asuhan-keperawatannnnn-ak-96" value="1"class="mr-1">
                                                                            Diaforesis
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_97"
                                                                            id="asuhan-keperawatannnnn-ak-97" value="1"class="mr-1">
                                                                            Monitor mual
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_98"
                                                                            id="asuhan-keperawatannnnn-ak-98" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_99" id="asuhan-keperawatannnnn-ak-99"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_100"
                                                                            id="asuhan-keperawatannnnn-ak-100" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_101" id="asuhan-keperawatannnnn-ak-101"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_102"
                                                                            id="asuhan-keperawatannnnn-ak-102" value="1"class="mr-1">
                                                                            Bersihkan mulut dan hidung
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_103"
                                                                            id="asuhan-keperawatannnnn-ak-103" value="1"class="mr-1">
                                                                            Atur posisi untuk mencegah aspirasi
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_104"
                                                                            id="asuhan-keperawatannnnn-ak-104" value="1"class="mr-1">
                                                                            Kalaborasi pemberian antiemetik
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_105"
                                                                            id="asuhan-keperawatannnnn-ak-105" value="1"class="mr-1">
                                                                            <input type="text" name="asuhan_keperawatannnnn_ak_106" id="asuhan-keperawatannnnn-ak-106"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>                                                                  
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="center"><b>Perawat Ruangan</b></td>
                                                                        <td class="center"><b>Perawat Anastesi </b></td>
                                                                        <td class="center"><b>Perawat Kamar Bedah</b></td>                                                                  
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="center"><input type="text" name="perawwat_ruangan_prr"
                                                                                id="perawwat-ruangan-prr" class="select2c-input ml-2">
                                                                        </td>
                                                                        <td class="center"><input type="text" name="perawwat_anastesi_paa"
                                                                                id="perawwat-anastesi-paa" class="select2c-input ml-2">
                                                                        </td>
                                                                        <td class="center"><input type="text" name="perawwat_kamar_bedahh"
                                                                                id="perawwat-kamar-bedahh" class="select2c-input ml-2">
                                                                        </td>
                                                                    </tr>
                                                            </tbody>                                                           
                                                        </table>
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR KE 2-->

                                        <!--  CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar) AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-catatan-keperawatan-sesudah-operasi"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>C. CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar)
                                                </td>
                                            </tr>
                                        </table>                                   

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-sesudah-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%">Ruang Pulih Sadar : &nbsp;&nbsp;<input type="checkbox" name="catatan_keperawatan_sesudah_operasi_1"
                                                                            id="catatan-keperawatan-sesudah-operasi-1" value="1"class="mr-1">
                                                                    </td>
                                                                    <td widtd="25%"> Masuk Jam : <input type="text" name="catatan_keperawatan_sesudah_operasi_2" id="catatan-keperawatan-sesudah-operasi-2"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="isi jam">
                                                                    </td>
                                                                    <td widtd="25%">Ruang Pulih Sadar  : &nbsp;&nbsp;<input type="checkbox" name="catatan_keperawatan_sesudah_operasi_3"
                                                                            id="catatan-keperawatan-sesudah-operasi-3" value="1"class="mr-1">
                                                                    </td> 
                                                                    <td widtd="25%"> Kembali langsung ke Ruangan/ICU : <input type="text" name="catatan_keperawatan_sesudah_operasi_4" id="catatan-keperawatan-sesudah-operasi-4"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                                    </td>                 
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%"></td>
                                                                    <td widtd="25%">Keluar Jam : <input type="text" name="catatan_keperawatan_sesudah_operasi_5" id="catatan-keperawatan-sesudah-operasi-5"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-1"  placeholder="isi jam">
                                                                    </td>
                                                                    <td widtd="25%"></td> 
                                                                    <td widtd="25%"></td>                 
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <tr>
                                                                <td width="25%">1. Keadaan Umum</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_1"
                                                                        id="catatan-keperawatan-sesudah-op-1" value="1"class="mr-1">Memuaskan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_2"
                                                                        id="catatan-keperawatan-sesudah-op-2" value="1"class="mr-1 ml-4">Jelek
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">2. Status mental</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_3"
                                                                        id="catatan-keperawatan-sesudah-op-3" value="1"class="mr-1">Terjaga 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_4"
                                                                        id="catatan-keperawatan-sesudah-op-4" value="1"class="mr-1 ml-4">Mudah digunakan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_5"
                                                                        id="catatan-keperawatan-sesudah-op-5" value="1"class="mr-1 ml-4">Tidak ada respon                                                  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">3. Jalan nafas</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_6"
                                                                        id="catatan-keperawatan-sesudah-op-6" value="1"class="mr-1">Datang 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_7"
                                                                        id="catatan-keperawatan-sesudah-op-7" value="1"class="mr-1 ml-4">Tidak
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_8"
                                                                        id="catatan-keperawatan-sesudah-op-8" value="1"class="mr-1 ml-4">Oral 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_9"
                                                                        id="catatan-keperawatan-sesudah-op-9" value="1"class="mr-1 ml-4">Nasal  
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_10"
                                                                        id="catatan-keperawatan-sesudah-op-10" value="1"class="mr-1 ml-4">Lain - lain   
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_11" id="catatan-keperawatan-sesudah-op-11"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_12"
                                                                        id="catatan-keperawatan-sesudah-op-12" value="1"class="mr-1">Keluar                                                                                                            
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">4. Terapi Oksigen <input type="text" name="catatan_keperawatan_sesudah_op_13" id="catatan-keperawatan-sesudah-op-13"
                                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-1"> Lpm</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_14"
                                                                        id="catatan-keperawatan-sesudah-op-14" value="1"class="mr-1">Tidak
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_15"
                                                                        id="catatan-keperawatan-sesudah-op-15" value="1"class="mr-1 ml-4">Oral 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_16"
                                                                        id="catatan-keperawatan-sesudah-op-16" value="1"class="mr-1 ml-4">Nasal  
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_17"
                                                                        id="catatan-keperawatan-sesudah-op-17" value="1"class="mr-1 ml-4">Lain - lain   
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_18" id="catatan-keperawatan-sesudah-op-18"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">5. Kulit / Skin</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_19"
                                                                        id="catatan-keperawatan-sesudah-op-19" value="1"class="mr-1">Datang
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_20"
                                                                        id="catatan-keperawatan-sesudah-op-20" value="1"class="mr-1 ml-4">Kering 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_21"
                                                                        id="catatan-keperawatan-sesudah-op-21" value="1"class="mr-1 ml-4">Lembab*  
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_22"
                                                                        id="catatan-keperawatan-sesudah-op-22" value="1"class="mr-1 ml-4">Merah muda* 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_23"
                                                                        id="catatan-keperawatan-sesudah-op-23" value="1"class="mr-1 ml-4">Kebiru-biruan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_24"
                                                                        id="catatan-keperawatan-sesudah-op-24" value="1"class="mr-1 ml-4">Hangat 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_25"
                                                                        id="catatan-keperawatan-sesudah-op-25" value="1"class="mr-1 ml-4">Dingin
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_26"
                                                                        id="catatan-keperawatan-sesudah-op-26" value="1"class="mr-1 ml-4">Lain - lain   
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_27" id="catatan-keperawatan-sesudah-op-27"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_28"
                                                                        id="catatan-keperawatan-sesudah-op-28" value="1"class="mr-1">Keluar
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_29"
                                                                        id="catatan-keperawatan-sesudah-op-29" value="1"class="mr-1 ml-4">Kering 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_30"
                                                                        id="catatan-keperawatan-sesudah-op-30" value="1"class="mr-1 ml-4">Lembab*  
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_31"
                                                                        id="catatan-keperawatan-sesudah-op-31" value="1"class="mr-1 ml-4">Merah muda* 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_32"
                                                                        id="catatan-keperawatan-sesudah-op-32" value="1"class="mr-1 ml-4">Kebiru-biruan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_33"
                                                                        id="catatan-keperawatan-sesudah-op-33" value="1"class="mr-1 ml-4">Hangat 
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_34"
                                                                        id="catatan-keperawatan-sesudah-op-34" value="1"class="mr-1 ml-4">Dingin
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_35"
                                                                        id="catatan-keperawatan-sesudah-op-35" value="1"class="mr-1 ml-4">Lain - lain   
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_36" id="catatan-keperawatan-sesudah-op-36"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">6. Sirkulasi anggota badan</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_37"
                                                                        id="catatan-keperawatan-sesudah-op-37" value="1"class="mr-1">Merah muda
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_38"
                                                                        id="catatan-keperawatan-sesudah-op-38" value="1"class="mr-1 ml-4">Kebiru-biruan                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">7. Posisi Pasien</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_39"
                                                                        id="catatan-keperawatan-sesudah-op-39" value="1"class="mr-1">Lateral&nbsp;&nbsp;&nbsp; 
                                                                    <input type="radio" name="catatan_keperawatan_sesudah_op_40"
                                                                                id="catatan-keperawatan-sesudah-op-40" class="mr-1" value="1">Kiri&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" name="catatan_keperawatan_sesudah_op_40"
                                                                                id="catatan-keperawatan-sesudah-op-41" class="mr-1" value="2">Kanan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_42"
                                                                        id="catatan-keperawatan-sesudah-op-42" value="1"class="mr-1 ml-4">Tersenggah
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_43"
                                                                        id="catatan-keperawatan-sesudah-op-43" value="1"class="mr-1 ml-4">Lain - lain   
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_44" id="catatan-keperawatan-sesudah-op-44"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>                                             
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--  CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar) AKHIR -->

                                        <!--  CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah) AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-ceklis-persiapan-operasi"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>D. CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah)
                                                </td>
                                            </tr>
                                        </table>                                   
                                        <div class="collapse multi-collapse mt-2" id="data-ceklis-persiapan-operasi"> <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                        </table>
                                                    <table class="table table-sm table-striped table-bordered"
                                                        style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Nadi</b></th>
                                                                <th width="10%" class="center"><b>Waktu Masuk</b></th>
                                                                <th width="10%" class="center"><b>Waktu Keluar</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center">Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_1"id="ceklis-persiapan-operasi-1" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_2"id="ceklis-persiapan-operasi-2" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Tidak Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_3"id="ceklis-persiapan-operasi-3" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_4"id="ceklis-persiapan-operasi-4" value="1"class="mr-1"></td>
                                                            </tr>                                                      
                                                            <tr>
                                                                <td width="10%" class="center">Lemah</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_5"id="ceklis-persiapan-operasi-5" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_6"id="ceklis-persiapan-operasi-6" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Thready</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_7"id="ceklis-persiapan-operasi-7" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_8"id="ceklis-persiapan-operasi-8" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Normal</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_9"id="ceklis-persiapan-operasi-9" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_10"id="ceklis-persiapan-operasi-10" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasi_11" id="ceklis-persiapan-operasi-11"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_12"id="ceklis-persiapan-operasi-12" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_13"id="ceklis-persiapan-operasi-13" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasi_14" id="ceklis-persiapan-operasi-14"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_15"id="ceklis-persiapan-operasi-15" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasi_16"id="ceklis-persiapan-operasi-16" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                        </table>
                                                    <table class="table table-sm table-striped table-bordered"
                                                        style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Nadi</b></th>
                                                                <th width="10%" class="center"><b>Waktu Masuk</b></th>
                                                                <th width="10%" class="center"><b>Waktu Keluar</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center">Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_1"id="ceklis-persiapan-operasii-1" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_2"id="ceklis-persiapan-operasii-2" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Tidak Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_3"id="ceklis-persiapan-operasii-3" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_4"id="ceklis-persiapan-operasii-4" value="1"class="mr-1"></td>
                                                            </tr>                                                      
                                                            <tr>
                                                                <td width="10%" class="center">Lemah</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_5"id="ceklis-persiapan-operasii-5" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_6"id="ceklis-persiapan-operasii-6" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Thready</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_7"id="ceklis-persiapan-operasii-7" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_8"id="ceklis-persiapan-operasii-8" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center">Normal</td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_9"id="ceklis-persiapan-operasii-9" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_10"id="ceklis-persiapan-operasii-10" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasii_11" id="ceklis-persiapan-operasii-11"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_12"id="ceklis-persiapan-operasii-12" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_13"id="ceklis-persiapan-operasii-13" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasii_14" id="ceklis-persiapan-operasii-14"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_15"id="ceklis-persiapan-operasii-15" value="1"class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox"name="ceklis_persiapan_operasii_16"id="ceklis-persiapan-operasii-16" value="1"class="mr-1"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>                                  
                                                <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                        </table>
                                                    <table class="table table-sm table-striped table-bordered"
                                                        style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Jam / Time</b></th>
                                                                <th width="10%" class="center"><b>Cairan Infus / Infusion Fluid</b></th>
                                                                <th width="10%" class="center"><b>Jumlah / Amount</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_1" id="ceklis-persiapan-operasiii-1"class="custom-form clear-input d-inline-block col-lg-6"placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_2" id="ceklis-persiapan-operasiii-2"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_3" id="ceklis-persiapan-operasiii-3"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_4" id="ceklis-persiapan-operasiii-4"class="custom-form clear-input d-inline-block col-lg-6"placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_5" id="ceklis-persiapan-operasiii-5"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_6" id="ceklis-persiapan-operasiii-6"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr>                                                      
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_7" id="ceklis-persiapan-operasiii-7"class="custom-form clear-input d-inline-block col-lg-6"placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_8" id="ceklis-persiapan-operasiii-8"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_9" id="ceklis-persiapan-operasiii-9"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            
                                                <!-- GRAFIK -->
                                                <div class="col-lg-6">
                                                    <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*">
                                                        <div class="card-body">
                                                            <div id="grafik_ckp"></div>
                                                            <div style="display: flex;justify-content: center;">
                                                                <button type="button" class="btn btn-info btn-xs mr-1 float-left" id="btn-reset-ckp">Reset</button>
                                                                <input type="hidden" id="data-chart-ckp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-sm table-striped table-bordered">                                                  
                                                            <tr>
                                                                <td width="10%" class="center">Suhu</td>
                                                                <td width="10%"><input type="number" name="suhu_ckp" id="suhu-ckp"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                                <td width="10%" class="center">T Darah</td>                                                           
                                                                <td width="10%"><input type="number" name="darah_ckp" id="darah-ckp"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                                <td width="10%" class="center">S Oksigen</td> 
                                                                <td width="10%"><input type="number" name="oksigen_ckp" id="oksigen-ckp"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                                <td width="10%" class="center">Jam</td> 
                                                                <td width="10%"><input type="text" name="jam_ckp" id="jam-ckp"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-info btn-xs mr-1 float-left" id="btn-ckp-chart">Tambah</button>
                                                                </td>
                                                            
                                                            </tr>                                                    
                                                    </table>
                                                </div>
                                            </div>   
                                                                                
                                            <table class="table table-sm table-striped table-bordered"
                                                <tr>
                                                    <td width="2%"></td>
                                                    <td width="15%">8. Keterangan</td>
                                                    <td width="2%">:</td>
                                                    <td colspan="2">
                                                        <textarea name="keterangan_cpo" id="keterangan-cpo"rows="3" class="form-control clear-input"
                                                        placeholder="keterangan"></textarea>
                                                    </td>                                      
                                                </tr> 
                                            </table>
                                            <br>
                                            <table class="table table-sm table-striped table-bordered"
                                                style="margin-top: -15px">
                                                <thead>
                                                    <tr>
                                                        <td width="50%">Jam Pemberitahuan Perawat Ruangan <input type="text" name="jam_cpo_1" id="jam-cpo-1"class="custom-form clear-input d-inline-block col-lg-3" placeholder="masukan jam"></td>
                                                        <td width="50%">Jam Perawat Datang <input type="text" name="jam_cpo_2" id="jam-cpo-2"class="custom-form clear-input d-inline-block col-lg-3"placeholder="masukan jam"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Nama Perawat Ruangan <input type="text" name="perawat_cpo" id="perawat-cpo" class="select2c-input ml-2"></td>
                                                        <td width="50%">Barang yang di kembalikan melalui Perawat Ruangan <input type="text" name="barang_cpo" id="barang-cpo"class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sebutkan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Perawat Ruangan Pulih <input type="text" name="perawatt_cpo" id="perawatt-cpo" class="select2c-input ml-2"></td>
                                                        <td width="50%">Tanggal & Jam <input type="text" name="jam_tanggal_cpo" id="jam-tanggal-cpo"class="custom-form clear-input d-inline-block col-lg-3" placeholder="masukan tgl & jam"></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!--  CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah) AKHIR -->

                                        <!-- ASUHAN KEPERAWATN AWAL ke 3-->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-assuhan-keperawatan-3"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-3">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                    <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                    <td class="center"><b>EVALUASI</b></td>                                                                  
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_1"
                                                                        id="asssuhan-keperawatannnnn-ak-1" value="1"class="mr-1">
                                                                            Bersihan jalan nafas tidak evektif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_2"
                                                                        id="asssuhan-keperawatannnnn-ak-2" value="1"class="mr-1">
                                                                        Monitor pola nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_3"
                                                                        id="asssuhan-keperawatannnnn-ak-3" value="1"class="mr-1">
                                                                        Dispnea menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_4"
                                                                        id="asssuhan-keperawatannnnn-ak-4" value="1"class="mr-1">
                                                                            Hipersekresi jalan nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_5"
                                                                        id="asssuhan-keperawatannnnn-ak-5" value="1"class="mr-1">
                                                                        Monitor bunyi nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_6"
                                                                        id="asssuhan-keperawatannnnn-ak-6" value="1"class="mr-1">
                                                                        Wheezing menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_7"
                                                                        id="asssuhan-keperawatannnnn-ak-7" value="1"class="mr-1">
                                                                            Disfungsi neuromuskuler
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_8"
                                                                        id="asssuhan-keperawatannnnn-ak-8" value="1"class="mr-1">
                                                                        Monitor saturasi oksigen
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_9"
                                                                        id="asssuhan-keperawatannnnn-ak-9" value="1"class="mr-1">
                                                                        Sianosis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_10"
                                                                        id="asssuhan-keperawatannnnn-ak-10" value="1"class="mr-1">
                                                                            Adanya jalan nafas buatan 
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_11"
                                                                        id="asssuhan-keperawatannnnn-ak-11" value="1"class="mr-1">
                                                                        Pertahankan kepatenan jalan nafas 
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_12"
                                                                        id="asssuhan-keperawatannnnn-ak-12" value="1"class="mr-1">
                                                                        Frekuensi nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_13"
                                                                        id="asssuhan-keperawatannnnn-ak-13" value="1"class="mr-1">
                                                                            Efek agen farmakologis (mis.Anastesi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_14"
                                                                        id="asssuhan-keperawatannnnn-ak-14" value="1"class="mr-1">
                                                                        Lakukan penghisap lendir dari 15 detik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_15"
                                                                        id="asssuhan-keperawatannnnn-ak-15" value="1"class="mr-1">
                                                                        Pola nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_16"
                                                                        id="asssuhan-keperawatannnnn-ak-16" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_17" id="asssuhan-keperawatannnnn-ak-17"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                        
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_18"
                                                                        id="asssuhan-keperawatannnnn-ak-18" value="1"class="mr-1">
                                                                        Berikan oksigen jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_19"
                                                                        id="asssuhan-keperawatannnnn-ak-19" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_20" id="asssuhan-keperawatannnnn-ak-20"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                   
                                                                    </td>
                                                                </tr>                                                        
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_21"
                                                                        id="asssuhan-keperawatannnnn-ak-21" value="1"class="mr-1">
                                                                            Resiko Perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_22"
                                                                        id="asssuhan-keperawatannnnn-ak-22" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_23" id="asssuhan-keperawatannnnn-ak-23"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_24"
                                                                        id="asssuhan-keperawatannnnn-ak-24" value="1"class="mr-1">
                                                                        Kelembapan membran mukosa meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_25"
                                                                        id="asssuhan-keperawatannnnn-ak-25" value="1"class="mr-1">
                                                                            Aunerisma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_26"
                                                                        id="asssuhan-keperawatannnnn-ak-26" value="1"class="mr-1">
                                                                        Monitor tanda dan gejala perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_27"
                                                                        id="asssuhan-keperawatannnnn-ak-27" value="1"class="mr-1">
                                                                        Kelembapan kulit meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_28"
                                                                        id="asssuhan-keperawatannnnn-ak-28" value="1"class="mr-1">
                                                                        Gangguan Koagulasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_29"
                                                                        id="asssuhan-keperawatannnnn-ak-29" value="1"class="mr-1">
                                                                        Monitor tanda - tanda vital
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_30"
                                                                        id="asssuhan-keperawatannnnn-ak-30" value="1"class="mr-1">
                                                                        Hemoptisis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_31"
                                                                        id="asssuhan-keperawatannnnn-ak-31" value="1"class="mr-1">
                                                                        Efek Agen Farmakologis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_32"
                                                                        id="asssuhan-keperawatannnnn-ak-32" value="1"class="mr-1">
                                                                        Pertahankan bedrest selama perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_33"
                                                                        id="asssuhan-keperawatannnnn-ak-33" value="1"class="mr-1">
                                                                        Perdarahan pasca operasi menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_34"
                                                                        id="asssuhan-keperawatannnnn-ak-34" value="1"class="mr-1">
                                                                        Tindakan pembedahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_35"
                                                                        id="asssuhan-keperawatannnnn-ak-35" value="1"class="mr-1">
                                                                        Batasi tindakan invasif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_36"
                                                                        id="asssuhan-keperawatannnnn-ak-36" value="1"class="mr-1">
                                                                        Tekanan darah membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_37"
                                                                        id="asssuhan-keperawatannnnn-ak-37" value="1"class="mr-1">
                                                                        Trauma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_38"
                                                                        id="asssuhan-keperawatannnnn-ak-38" value="1"class="mr-1">
                                                                        Kalaborasi pemberian obat pengontrol perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_39"
                                                                        id="asssuhan-keperawatannnnn-ak-39" value="1"class="mr-1">
                                                                        Denyut nadi apikal membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_40"
                                                                        id="asssuhan-keperawatannnnn-ak-40" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_41" id="asssuhan-keperawatannnnn-ak-41"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_42"
                                                                        id="asssuhan-keperawatannnnn-ak-42" value="1"class="mr-1">
                                                                        Kalaborasi pemberian produk darah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_43"
                                                                        id="asssuhan-keperawatannnnn-ak-43" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_44" id="asssuhan-keperawatannnnn-ak-44"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_45"
                                                                        id="asssuhan-keperawatannnnn-ak-45" value="1"class="mr-1">
                                                                        Nyeri akut
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_46"
                                                                        id="asssuhan-keperawatannnnn-ak-46" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_47" id="asssuhan-keperawatannnnn-ak-47"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_48"
                                                                        id="asssuhan-keperawatannnnn-ak-48" value="1"class="mr-1">
                                                                        Keluhan nyeri menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_49"
                                                                        id="asssuhan-keperawatannnnn-ak-49" value="1"class="mr-1">
                                                                        Agen cedera fisik (prosedur operasi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_50"
                                                                        id="asssuhan-keperawatannnnn-ak-50" value="1"class="mr-1">
                                                                        Identifikasi skala nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_51"
                                                                        id="asssuhan-keperawatannnnn-ak-51" value="1"class="mr-1">
                                                                        Meringis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_52"
                                                                        id="asssuhan-keperawatannnnn-ak-52" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_53" id="asssuhan-keperawatannnnn-ak-53"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_54"
                                                                        id="asssuhan-keperawatannnnn-ak-54" value="1"class="mr-1">
                                                                        Identifikasi respon nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_55"
                                                                        id="asssuhan-keperawatannnnn-ak-55" value="1"class="mr-1">
                                                                        Gelisah menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_56"
                                                                        id="asssuhan-keperawatannnnn-ak-56" value="1"class="mr-1">
                                                                        Hipotermia
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_57"
                                                                        id="asssuhan-keperawatannnnn-ak-57" value="1"class="mr-1">
                                                                        Berikan terapi komplementer
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_58"
                                                                        id="asssuhan-keperawatannnnn-ak-58" value="1"class="mr-1">
                                                                        Frekuensi nadi membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_59"
                                                                        id="asssuhan-keperawatannnnn-ak-59" value="1"class="mr-1">
                                                                        Terpapar suhu lingkungan rendah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_60"
                                                                        id="asssuhan-keperawatannnnn-ak-60" value="1"class="mr-1">
                                                                        Kalaborasi pemberian analgetik, jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_61"
                                                                        id="asssuhan-keperawatannnnn-ak-61" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_62" id="asssuhan-keperawatannnnn-ak-62"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_63"
                                                                        id="asssuhan-keperawatannnnn-ak-63" value="1"class="mr-1">
                                                                        Efek agen farmokologis (anestesi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_64"
                                                                        id="asssuhan-keperawatannnnn-ak-64" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_65" id="asssuhan-keperawatannnnn-ak-65"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_66"
                                                                        id="asssuhan-keperawatannnnn-ak-66" value="1"class="mr-1">
                                                                    Menggigil menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_67"
                                                                        id="asssuhan-keperawatannnnn-ak-67" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_68" id="asssuhan-keperawatannnnn-ak-68"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_69"
                                                                        id="asssuhan-keperawatannnnn-ak-69" value="1"class="mr-1">
                                                                        Observasi TTV
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_70"
                                                                        id="asssuhan-keperawatannnnn-ak-70" value="1"class="mr-1">
                                                                    Suhu tubuh membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_71"
                                                                        id="asssuhan-keperawatannnnn-ak-71" value="1"class="mr-1">
                                                                        Gangguan mobilisasi fisik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_72"
                                                                        id="asssuhan-keperawatannnnn-ak-72" value="1"class="mr-1">
                                                                    Beri selimut tebal
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_73"
                                                                        id="asssuhan-keperawatannnnn-ak-73" value="1"class="mr-1">
                                                                    Suhu kulit membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_74"
                                                                        id="asssuhan-keperawatannnnn-ak-74" value="1"class="mr-1">
                                                                        Gangguan muskoloskletal
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_75"
                                                                        id="asssuhan-keperawatannnnn-ak-75" value="1"class="mr-1">
                                                                    Pasang pemanas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_76"
                                                                        id="asssuhan-keperawatannnnn-ak-76" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_77" id="asssuhan-keperawatannnnn-ak-77"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_78"
                                                                        id="asssuhan-keperawatannnnn-ak-78" value="1"class="mr-1">
                                                                        Efek agen farmakologis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_79"
                                                                        id="asssuhan-keperawatannnnn-ak-79" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_80" id="asssuhan-keperawatannnnn-ak-80"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_81"
                                                                        id="asssuhan-keperawatannnnn-ak-81" value="1"class="mr-1">
                                                                        Pergerakan ekstermitas meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_82"
                                                                        id="asssuhan-keperawatannnnn-ak-82" value="1"class="mr-1">
                                                                        Nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_83"
                                                                        id="asssuhan-keperawatannnnn-ak-83" value="1"class="mr-1">
                                                                    Identifikasi adanya nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_84"
                                                                        id="asssuhan-keperawatannnnn-ak-84" value="1"class="mr-1">
                                                                        Kekuatan otot meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_85"
                                                                        id="asssuhan-keperawatannnnn-ak-85" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_86" id="asssuhan-keperawatannnnn-ak-86"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_87"
                                                                        id="asssuhan-keperawatannnnn-ak-87" value="1"class="mr-1">
                                                                    Identifikasi toleransi fisik melakukan pergerakan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_88"
                                                                        id="asssuhan-keperawatannnnn-ak-88" value="1"class="mr-1">
                                                                        Rentang gerak meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_89"
                                                                        id="asssuhan-keperawatannnnn-ak-89" value="1"class="mr-1">
                                                                        Nausea
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_90"
                                                                        id="asssuhan-keperawatannnnn-ak-90" value="1"class="mr-1">
                                                                    Anjurkan mobilisasi dini
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_91"
                                                                        id="asssuhan-keperawatannnnn-ak-91" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_92" id="asssuhan-keperawatannnnn-ak-92"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_93"
                                                                        id="asssuhan-keperawatannnnn-ak-93" value="1"class="mr-1">
                                                                        Mengeluh mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_94"
                                                                        id="asssuhan-keperawatannnnn-ak-94" value="1"class="mr-1">
                                                                    Anjurkan mobilisasi sederhana yang harus dilakukan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_95"
                                                                        id="asssuhan-keperawatannnnn-ak-95" value="1"class="mr-1">
                                                                        Keluhan mual menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_96"
                                                                        id="asssuhan-keperawatannnnn-ak-96" value="1"class="mr-1">
                                                                        Merasa ingin muntah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_97"
                                                                        id="asssuhan-keperawatannnnn-ak-97" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_98" id="asssuhan-keperawatannnnn-ak-98"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_99"
                                                                        id="asssuhan-keperawatannnnn-ak-99" value="1"class="mr-1">
                                                                        Perasaan ingin muntah menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_100"
                                                                        id="asssuhan-keperawatannnnn-ak-100" value="1"class="mr-1">
                                                                        Diaforesis 
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_101"
                                                                        id="asssuhan-keperawatannnnn-ak-101" value="1"class="mr-1">
                                                                    Identifikasi mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_102"
                                                                        id="asssuhan-keperawatannnnn-ak-102" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_103" id="asssuhan-keperawatannnnn-ak-103"
                                                                            class="custom-form clear-input d-inline-block col-lg-8">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_104"
                                                                        id="asssuhan-keperawatannnnn-ak-104" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_105" id="asssuhan-keperawatannnnn-ak-105"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_106"
                                                                        id="asssuhan-keperawatannnnn-ak-106" value="1"class="mr-1">
                                                                    Identifikasi karakteristik muntah
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_107"
                                                                        id="asssuhan-keperawatannnnn-ak-107" value="1"class="mr-1">
                                                                    Monitor mual
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_108"
                                                                        id="asssuhan-keperawatannnnn-ak-108" value="1"class="mr-1">
                                                                    Bersihkan mulut dan hidung
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_109"
                                                                        id="asssuhan-keperawatannnnn-ak-109" value="1"class="mr-1">
                                                                    Atur posisi untuk mencegah aspirasi
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_110"
                                                                        id="asssuhan-keperawatannnnn-ak-110" value="1"class="mr-1">
                                                                    Kalaborasi pemberian antiemetik
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_111"
                                                                        id="asssuhan-keperawatannnnn-ak-111" value="1"class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_112" id="asssuhan-keperawatannnnn-ak-112"
                                                                            class="custom-form clear-input d-inline-block col-lg-8 ml-1">                                                                  
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>                                                                  
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td class="center"><b>Perawat Ruangan</b></td>
                                                                    <td class="center"><b>Perawat Anastesi </b></td>
                                                                    <td class="center"><b>Perawat Kamar Bedah</b></td>                                                                  
                                                                </tr>
                                                                <tr>
                                                                    <td class="center"><input type="text" name="perawwat_ruangan_prrr"
                                                                            id="perawwat-ruangan-prrr" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_anastesi_paaa"
                                                                            id="perawwat-anastesi-paaa" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_kamar_bedahhh"
                                                                            id="perawwat-kamar-bedahhh" class="select2c-input ml-2">
                                                                    </td>
                                                                </tr>
                                                            </tbody>                                                           
                                                        </table>
                                                    </td>
                                                </tr> 
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR KE 3-->
                                    </div>
                                <!-- FORM CATATAN KEPERAWATAN PERIOPERATIF AWAL -->

                                <!-- Assesmen Awal Anestesis/Sedasi AAAS-->
                                    <div class="form-asessmentt-awal-anestesi-sedasi">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <h5 class="center"><b>ASSESMEN AWAL ANESTESI/SEDASI</b></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-asesmentt">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td></td>
                                                            <td><b>Diagnosis Pra Operasi/Tindakan</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_diagnosis"
                                                                        id="aaas-diagnosis"
                                                                        class="custom-form clear-input d-inline-block col-lg-12"
                                                                        placeholder="Diagnosis...">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><b>Rencana Operasi Tindakan</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_rot" id="aaas-rot"
                                                                        class="custom-form clear-input d-inline-block col-lg-12"
                                                                        placeholder="Rencana/Tndakan Operasi">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td><b>Perawat</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="aaas_perawat" id="aaas-perawat"
                                                                    class="select2c-input">
                                                            </td>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Anamnesa dari</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_anamnesa"
                                                                        id="aaas-anamnesa-1" value="Pasien"
                                                                        class="mr-1"> Pasien
                                                                    <input type="radio" name="aaas_anamnesa"
                                                                        id="aaas-anamnesa-2" value="Keluarga"
                                                                        class="mr-1 ml-2">Keluarga
                                                                    <input type="radio" name="aaas_anamnesa"
                                                                        id="aaas-anamnesa-3" value="Lainnya"
                                                                        class="mr-1 ml-2"> Lainnya
                                                                    <input type="text" name="aaas_anamnesa_4"
                                                                        id="aaas-anamnesa-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                        placeholder="Jelaskan...">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Riwayat Anestesi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_riwayat_anestesi"
                                                                        id="aaas-riwayat-anestesi-1" value="Normal"
                                                                        class="mr-1"> Ada
                                                                    <input type="radio" name="aaas_riwayat_anestesi"
                                                                        id="aaas-riwayat-anestesi-2" value="Kering"
                                                                        class="mr-1 ml-2">Tidak Ada
                                                                    <input type="radio" name="aaas_riwayat_anestesi"
                                                                        id="aaas-riwayat-anestesi-3"
                                                                        value="Ada cairan dari luka" class="mr-1 ml-2">
                                                                    Sebutkan, jika ada
                                                                    <input type="text" name="aaas_riwayat_anestesi_4"
                                                                        id="aaas-riwayat-anestesi-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                        placeholder="Jelaskan...">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Komplikasi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_komplikasi"
                                                                        id="aaas-komplikasi-1" value="Normal"
                                                                        class="mr-1"> Ada
                                                                    <input type="radio" name="aaas_komplikasi"
                                                                        id="aaas-komplikasi-2" value="Kering"
                                                                        class="mr-1 ml-2">Tidak Ada
                                                                    <input type="radio" name="aaas_komplikasi"
                                                                        id="aaas-komplikasi-3"
                                                                        value="Ada cairan dari luka" class="mr-1 ml-2">
                                                                    Sebutkan, jika ada
                                                                    <input type="text" name="aaas_komplikasi_4"
                                                                        id="aaas-komplikasi-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                        placeholder="Jelaskan...">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><b>Obat yang sedang dikonsumsi</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_konsumsi_obat"
                                                                        id="aaas-konsumsi-obat"
                                                                        class="custom-form clear-input d-inline-block col-lg-12"
                                                                        placeholder="Obat yang sedang dikonsumsi">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Riwayat Alergi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_riwayat_alergi"
                                                                        id="aaas-riwayat-alergi-1" value="Normal" class="mr-1">
                                                                    Ada
                                                                    <input type="radio" name="aaas_riwayat_alergi"
                                                                        id="aaas-riwayat-alergi-2" value="Kering"
                                                                        class="mr-1 ml-2">Tidak Ada
                                                                    <input type="radio" name="aaas_riwayat_alergi"
                                                                        id="aaas-riwayat-alergi-3"
                                                                        value="Ada cairan dari luka" class="mr-1 ml-2">
                                                                    Sebutkan, jika ada
                                                                    <input type="text" name="aaas_riwayat_alergi_4"
                                                                        id="aaas-riwayat-alergi-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                        placeholder="Jelaskan...">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><b>Tanda Vital</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_tanda"
                                                                        id="aaas-tanda"
                                                                        class="custom-form clear-input d-inline-block col-lg-12"
                                                                        placeholder="tanda vital">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Berat Badan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_1" id="aaas-berat-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="BB"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">Kg</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Tinggi Badan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_2" id="aaas-berat-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Tinggi Badan"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">CM</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">TD</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_3" id="aaas-berat-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="TD"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">mmHg</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">RR</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_4" id="aaas-berat-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="RR"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">X/mnt</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Nadi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_5" id="aaas-berat-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="nadi"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">X/mnt</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Suhu</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="aaas_berat_6" id="aaas-berat-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="suhu"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">&#8451;</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td class="bold">Skor Nyeri</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-1" value="1" class="mr-1">1
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-2" value="2"
                                                                        class="mr-1 ml-2">2
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-3" value="3"
                                                                        class="mr-1 ml-2">3
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-4" value="4"
                                                                        class="mr-1 ml-2">4
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-5" value="5"
                                                                        class="mr-1 ml-2">5
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-6" value="6"
                                                                        class="mr-1 ml-2">6
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-8" value="8"
                                                                        class="mr-1 ml-2">8
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-9" value="9"
                                                                        class="mr-1 ml-2">9
                                                                    <input type="radio" name="aaas_skor_nyeri"
                                                                        id="aaas-skor-nyeri-10" value="10"
                                                                        class="mr-1 ml-2">10
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td class="center"><b>Evaluasi Jalan Nafas</b></td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td><b>Bebas</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_1"
                                                                    id="aaas-evaluasi-1" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_1"
                                                                    id="aaas-evaluasi-2" value="1"
                                                                    class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Protrusi Mandibula</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_3"
                                                                    id="aaas-evaluasi-3" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_3"
                                                                    id="aaas-evaluasi-4" value="1" class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Buka Mulut</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_5"
                                                                    id="aaas-evaluasi-5" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_5"
                                                                    id="aaas-evaluasi-6" value="1"
                                                                    class="mr-1 ml-2">Normal
                                                                <input type="text" name="aaas_evaluasi_7"
                                                                    id="aaas-evaluasi-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-2 disabled"
                                                                    placeholder="Cm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Jarak Mentohyoid</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_8"
                                                                    id="aaas-evaluasi-8" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_8"
                                                                    id="aaas-evaluasi-9" value="1"
                                                                    class="mr-1 ml-2">Normal
                                                                <input type="text" name="aaas_evaluasi_10"
                                                                    id="aaas-evaluasi-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-2 disabled"
                                                                    placeholder="Cm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Jarak Hyothyroid</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_11"
                                                                    id="aaas-evaluasi-11" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_11"
                                                                    id="aaas-evaluasi-12" value="1"
                                                                    class="mr-1 ml-2">Normal
                                                                <input type="text" name="aaas_evaluasi_13"
                                                                    id="aaas-evaluasi-13"
                                                                    class="custom-form clear-input d-inline-block col-lg-2 disabled"
                                                                    placeholder="Cm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Leher</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_14"
                                                                    id="aaas-evaluasi-14" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_14"
                                                                    id="aaas-evaluasi-15" value="1"
                                                                    class="mr-1 ml-2">Pendek
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Gerak Leher</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_16"
                                                                    id="aaas-evaluasi-16" value="0"
                                                                    class="mr-1" checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_16"
                                                                    id="aaas-evaluasi-17" value="1"
                                                                    class="mr-1 ml-2">Bebas
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Mallamapathy</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="aaas_evaluasi_18"
                                                                        id="aaas-evaluasi-18" value="1" class="mr-1">I
                                                                    <input type="radio" name="aaas_evaluasi_18"
                                                                        id="aaas-evaluasi-19" value="2"
                                                                        class="mr-1 ml-2">II
                                                                    <input type="radio" name="aaas_evaluasi_18"
                                                                        id="aaas-evaluasi-20" value="3"
                                                                        class="mr-1 ml-2">II
                                                                    <input type="radio" name="aaas_evaluasi_18"
                                                                        id="aaas-evaluasi-21" value="4"
                                                                        class="mr-1 ml-2">IV
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Obesitas</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_22"
                                                                    id="aaas-evaluasi-22" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_22"
                                                                    id="aaas-evaluasi-23" value="1"
                                                                    class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Massa</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_24"
                                                                    id="aaas-evaluasi-24" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_24"
                                                                    id="aaas-evaluasi-25" value="1"
                                                                    class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Gigi Palsu</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_26"
                                                                    id="aaas-evaluasi-26" value="0"
                                                                    class="mr-1" checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_26"
                                                                    id="aaas-evaluasi-27" value="1"
                                                                    class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Sulit Ventilasi</b></td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="radio" name="aaas_evaluasi_28"
                                                                    id="aaas-evaluasi-28" value="0"
                                                                    class="mr-1" checked>Tidak
                                                                <input type="radio" name="aaas_evaluasi_28"
                                                                    id="aaas-evaluasi-29" value="1"
                                                                    class="mr-1 ml-2">Ya
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"
                                                        style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="3" class="center bold td-dark">
                                                                <button class="btn btn-info btn-xs mr-1 float-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#funggsi-sistem-organ"><i
                                                                        class="fas fa-expand mr-1"></i>Expand</button>FUNGSI
                                                                SISTEM ORGAN
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="collapse multi-collapse mt-2" id="funggsi-sistem-organ">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>PERNAFASAN</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_pernafasan_1"
                                                                                    id="aaas-pernafasan-1" value="1"
                                                                                    class="mr-1">Asma
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox"
                                                                                name="aaas_pernafasan_2"
                                                                                id="aaas-pernafasan-2" value="1"
                                                                                class="mr-1">Batuk Produktif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_pernafasan_3"
                                                                                    id="aaas-pernafasan-3" value="1"
                                                                                    class="mr-1">Bronchitis
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_pernafasan_4"
                                                                                id="aaas-pernafasan-4" value="1" class="mr-1">ISPA
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_pernafasan_5"
                                                                                    id="aaas-pernafasan-5" value="1"
                                                                                    class="mr-1">Dyspnea
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_pernafasan_6"
                                                                                id="aaas-pernafasan-6" value="1" class="mr-1">PPOK
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_pernafasan_7"
                                                                                    id="aaas-pernafasan-7" value="1"
                                                                                    class="mr-1">Orthopnea
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_pernafasan_8"
                                                                                id="aaas-pernafasan-8" value="1"
                                                                                class="mr-1">Tuberkulosis
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_pernafasan_9"
                                                                                    id="aaas-pernafasan-9" value="1"
                                                                                    class="mr-1">Pneumonia
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_pernafasan_10"
                                                                                id="aaas-pernafasan-10" value="1"
                                                                                class="mr-1">Efusi Pleura
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>KARDIOVASKULAR</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_kardiovaskular_1"
                                                                                    id="aaas-kardiovaskular-1" value="1"
                                                                                    class="mr-1">Angina
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_kardiovaskular_2" id="aaas-kardiovaskular-2"
                                                                                value="1" class="mr-1">HT
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_kardiovaskular_3"
                                                                                    id="aaas-kardiovaskular-3" value="1"
                                                                                    class="mr-1">Pancamaker
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_kardiovaskular_4"
                                                                                id="aaas-kardiovaskular-4" value="1" class="mr-1">PJK
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_kardiovaskular_5"
                                                                                    id="aaas-kardiovaskular-5" value="1"
                                                                                    class="mr-1">Disritmia
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_kardiovaskular_6"
                                                                                id="aaas-kardiovaskular-6" value="1" class="mr-1">PJR
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_kardiovaskular_7"
                                                                                    id="aaas-kardiovaskular-7" value="1"
                                                                                    class="mr-1">Limitasi Aktivitas
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_kardiovaskular_8"
                                                                                id="aaas-kardiovaskular-8" value="1" class="mr-1">CHD
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_kardiovaskular_9"
                                                                                    id="aaas-kardiovaskular-9" value="1"
                                                                                    class="mr-1">Penyakit Jantung Katup
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_kardiovaskular_10"
                                                                                id="aaas-kardiovaskular-10" value="1"
                                                                                class="mr-1">Murmur
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>NEURO / MASKULOSKELETAL</b>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_neuro_1"
                                                                                    id="aaas-neuro-1" value="1"
                                                                                    class="mr-1">Kelemahan Otot
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_neuro_2"
                                                                                id="aaas-neuro-2" value="1"
                                                                                class="mr-1">Stroke
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_neuro_3"
                                                                                    id="aaas-neuro-3" value="1"
                                                                                    class="mr-1">Keluhan Punggung
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_neuro_4"
                                                                                id="aaas-neuro-4" value="1"
                                                                                class="mr-1">Kejang
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_neuro_5"
                                                                                    id="aaas-neuro-5" value="1"
                                                                                    class="mr-1">Nyeri Kepala
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_neuro_6"
                                                                                id="aaas-neuro-6" value="1"
                                                                                class="mr-1">Epilepsi
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_neuro_7"
                                                                                    id="aaas-neuro-7" value="1"
                                                                                    class="mr-1">Penurunan Kesadaran
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_neuro_8"
                                                                                id="aaas-neuro-8" value="1" class="mr-1">SOP
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>RENAL / ENDOKRIN</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_renal_1"
                                                                                    id="aaas-renal-1" value="1" class="mr-1">DM

                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_renal_2"
                                                                                id="aaas-renal-2" value="1"
                                                                                class="mr-1">Peny Thiroid
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_renal_3"
                                                                                    id="aaas-renal-3" value="1"
                                                                                    class="mr-1">Penyakit Gigi

                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_renal_4"
                                                                                id="aaas-renal-4" value="1"
                                                                                class="mr-1">Penyakit Lain
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>HEPATO / GASTROINTETINAL</b>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_hepato_1"
                                                                                    id="aaas-hepato-1" value="1"
                                                                                    class="mr-1">Obstruksi Usus
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_hepato_2"
                                                                                id="aaas-hepato-2" value="1"
                                                                                class="mr-1">Sirosis
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_hepato_3"
                                                                                    id="aaas-hepato-3" value="1"
                                                                                    class="mr-1">Hepatitis/Ikterus
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_hepato_4"
                                                                                id="aaas-hepato-4" value="1"
                                                                                class="mr-1">Tukak Peptik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_hepato_5"
                                                                                    id="aaas-hepato-5" value="1"
                                                                                    class="mr-1">Hiatal Hernia/Refluks
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_hepato_6"
                                                                                id="aaas-hepato-6" value="1" class="mr-1">Mual /
                                                                            Muntah
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>LAIN - LAIN</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_lain_1"
                                                                                    id="aaas-lain-1" value="1"
                                                                                    class="mr-1">Hemofilia
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_lain_2"
                                                                                id="aaas-lain-2" value="1"
                                                                                class="mr-1">Anemia
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_lain_3"
                                                                                    id="aaas-lain-3" value="1"
                                                                                    class="mr-1">Bleeding Tendencies
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_lain_4"
                                                                                id="aaas-lain-4" value="1" class="mr-1">Hamil
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_lain_5"
                                                                                    id="aaas-lain-5" value="1"
                                                                                    class="mr-1">Antikoagula
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_lain_6"
                                                                                id="aaas-lain-6" value="1"
                                                                                class="mr-1">Kanker
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_lain_7"
                                                                                    id="aaas-lain-7" value="1"
                                                                                    class="mr-1">Riwayat Transfusi
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_lain_8"
                                                                                id="aaas-lain-8" value="1"
                                                                                class="mr-1">Geriatri
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox"
                                                                                    name="aaas_lain_9"
                                                                                    id="aaas-lain-9" value="1"
                                                                                    class="mr-1">Imunosupresan
                                                                            </div>
                                                                        </td>
                                                                        <td width="1%">
                                                                            <input type="checkbox" name="aaas_lain_10"
                                                                                id="aaas-lain-10" value="1"
                                                                                class="mr-1">Dehidrasi
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="1%">
                                                                            <div class="input-group">
                                                                                <input type="checkbox" name="aaas_lain_11"
                                                                                    id="aaas-lain-11" value="1"
                                                                                    class="mr-1">Neonatus/Pediatri
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"
                                                        style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="3" class="center bold td-dark">
                                                                <button class="btn btn-info btn-xs mr-1 float-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#pemerikksaan-labolatorium"><i
                                                                        class="fas fa-expand mr-1"></i>Expand</button>
                                                                PEMERIKSAAN LABORATORIUM
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="collapse multi-collapse mt-2" id="pemerikksaan-labolatorium">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>HEMATOLOGI</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">HB</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_1" id="aaas-hematologi-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="HB">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Leukosit</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_2"
                                                                                    id="aaas-hematologi-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Leukosit">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">PPT</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_3"
                                                                                    id="aaas-hematologi-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="PPT">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">HCt</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_4"
                                                                                    id="aaas-hematologi-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="HCt">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Trombosit</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_5"
                                                                                    id="aaas-hematologi-5"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Trombosit">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Appt</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_hematologi_6"
                                                                                    id="aaas-hematologi-6"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Appt">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>SERUM ELEKTROLIT</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">NA</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_serum_1" id="aaas-serum-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="NA">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">K</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_serum_2" id="aaas-serum-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="K">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">CA</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_serum_3" id="aaas-serum-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="PPT">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">CL</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_serum_4" id="aaas-serum-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="CL">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>Fungsi Hati</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">SGOT</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_1" id="aaas-fungsi-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="SGOT">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Bil. Direc</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_2"
                                                                                    id="aaas-fungsi-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Bil. Direc">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">HBs Ag</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_3"
                                                                                    id="aaas-fungsi-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="HBs Ag">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">SGPT</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_4"
                                                                                    id="aaas-fungsi-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="SGPT">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Bil.Indirec</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_5"
                                                                                    id="aaas-fungsi-5"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Bil.Indirec">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">AntiHCV</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_6"
                                                                                    id="aaas-fungsi-6"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="AntiHCV">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">Albumin</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_7"
                                                                                    id="aaas-fungsi-7"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Albumin">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Bil.Tot</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_fungsi_8"
                                                                                    id="aaas-fungsi-8"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Bil.Tot">
                                                                            </div>
                                                                        </td>                                                                   
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>FUNGSI GINJAL</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">Ureum</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_ginjal_1"
                                                                                    id="aaas-ginjal-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Ureum">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">Creatinin</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_ginjal_2"
                                                                                    id="aaas-ginjal-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Creatinin">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>ENDOKRIN</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">GDA</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_1"
                                                                                    id="aaas-edokorin-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="GDA">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">T3</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_2" id="aaas-edokorin-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="T3">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">GDP</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_3"
                                                                                    id="aaas-edokorin-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="GDP">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">T4</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_4" id="aaas-edokorin-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="T4">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">GD 2 Jam PP</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_5"
                                                                                    id="aaas-edokorin-5"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="GD 2">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">TSHS</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_edokorin_6"
                                                                                    id="aaas-edokorin-6"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="TSHS">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>AGD</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">pH</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_agd_1"
                                                                                    id="aaas-agd-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="pH">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">pCo2</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_agd_2"
                                                                                    id="aaas-agd-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="pCo2">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">pO2</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_agd_3"
                                                                                    id="aaas-agd-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="pO2">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">BE</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_agd_4" id="aaas-agd-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="BE">
                                                                            </div>
                                                                        </td>
                                                                        <td class="bold">SpO2</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_agd_5"
                                                                                    id="aaas-agd-5"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="SpO2">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>PEMERIKSAN PENUNJANG</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-no-border table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="bold">EKG</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_pemeriksaan_1"
                                                                                    id="aaas-pemeriksaan-1"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="EKG">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">X-Ray</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_pemeriksaan_2"
                                                                                    id="aaas-pemeriksaan-2"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="X-Ray">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">Echocardiograph</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    name="aaas_pemeriksaan_3"
                                                                                    id="aaas-pemeriksaan-3"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Echocardiograph">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">CT-Scan</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_pemeriksaan_4"
                                                                                    id="aaas-pemeriksaan-4"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="CT-Scan">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">Faal Paru</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_pemeriksaan_5"
                                                                                    id="aaas-pemeriksaan-5"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Faal Paru">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bold">Lain-lain</td>
                                                                        <td class="bold">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_pemeriksaan_6"
                                                                                    id="aaas-pemeriksaan-6"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Lain-lain">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"
                                                        style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="3" class="center bold td-dark">
                                                                <button class="btn btn-info btn-xs mr-1 float-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#data-perenccanaan-anestesi-sedasi"><i
                                                                        class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN
                                                                ANESTESI SEDASI
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="collapse multi-collapse mt-2"
                                                        id="data-perenccanaan-anestesi-sedasi">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>TEKNIK ANESTESI DAN SEDASI</b>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td>Sedasi</td>
                                                                        <td>:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_sedasi"
                                                                                    id="aaas-sedasi"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="Sedasi">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>GA</td>
                                                                        <td>:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_ga" id="aaas-ga"
                                                                                    class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                                                    placeholder="GA">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Regional</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_regional_1"
                                                                                    id="aaas-regional-1" value="Spinal"
                                                                                    class="mr-1">Spinal
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_regional_1"
                                                                                    id="aaas-regional-2" value="Epidural"
                                                                                    class="mr-1">Epidural
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_regional_1"
                                                                                    id="aaas-regional-3" value="Kaudal"
                                                                                    class="mr-1">Kaudal
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_regional_1"
                                                                                    id="aaas-regional-4"
                                                                                    value="Block Prifer" class="mr-1">Block
                                                                                Prifer
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Teknik Khusus</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_teknik_1"
                                                                                    id="aaas-teknik-1" value="Hipotensi"
                                                                                    class="mr-1">Hipotensi
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_teknik_1"
                                                                                    id="aaas-teknik-2"
                                                                                    value="Ventilasi satu Paru"
                                                                                    class="mr-1">Ventilasi satu Paru
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_teknik_1"
                                                                                    id="aaas-teknik-3" value="TCI"
                                                                                    class="mr-1">TCI
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_teknik_1"
                                                                                    id="aaas-teknik-4" value="1"
                                                                                    class="mr-1">Lain-lain
                                                                                <input type="text"
                                                                                    name="aaas_teknik_5"
                                                                                    id="aaas-teknik-5"
                                                                                    class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                                    placeholder=".......................">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Monitoring</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-1" value="EKG Lead"
                                                                                    class="mr-1">EKG Lead
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-2" value="SpO2"
                                                                                    class="mr-1">SpO2
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-3" value="NIBP"
                                                                                    class="mr-1">NIBP
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-4" value="Temp"
                                                                                    class="mr-1">Temp
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td width="1%"></td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-5" value="CVP"
                                                                                    class="mr-1">CVP
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-6" value="Arteri Line"
                                                                                    class="mr-1">Arteri Line
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-7" value="ELCO2"
                                                                                    class="mr-1">ELCO2
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-8" value="BIS"
                                                                                    class="mr-1">BIS
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td width="1%"></td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_monitoring_1"
                                                                                    id="aaas-monitoring-9" value="1"
                                                                                    class="mr-1">Lain-lain
                                                                                <input type="text"
                                                                                    name="aaas_monitoring_10"
                                                                                    id="aaas-monitoring-10"
                                                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2 disabled"
                                                                                    placeholder=".......................">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alat Khusus</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_alat_1"
                                                                                    id="aaas-alat-1"
                                                                                    value="Bronchoscopy"
                                                                                    class="mr-1">Bronchoscopy
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_alat_1"
                                                                                    id="aaas-alat-2" value="Glidecsope"
                                                                                    class="mr-1">Glidecsope
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_alat_1"
                                                                                    id="aaas-alat-3" value="USG"
                                                                                    class="mr-1">USG
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_alat_1"
                                                                                    id="aaas-alat-4" value="1"
                                                                                    class="mr-1">Lain-lain
                                                                                <input type="text"
                                                                                    name="aaas_alat_5"
                                                                                    id="aaas-alat-5"
                                                                                    class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                                    placeholder=".......................">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Perawatan Pasca Anestesi</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-1" value="Rawat Inap"
                                                                                    class="mr-1">Rawat Inap
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-2" value="Rawat Jalan"
                                                                                    class="mr-1">Rawat Jalan
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-3"
                                                                                    value="Rawat Khusus" class="mr-1">Rawat
                                                                                Khusus
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-4" value="ICU"
                                                                                    class="mr-1">ICU
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td width="1%"></td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-5" value="HCU"
                                                                                    class="mr-1">HCU
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio"
                                                                                    name="aaas_pasca_1"
                                                                                    id="aaas-pasca-6" value="APS"
                                                                                    class="mr-1">APS
                                                                            </div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_pasca_1"
                                                                                    id="aaas-pasca-7" value="1"
                                                                                    class="mr-1">Lain-lain
                                                                                <input type="text"
                                                                                    name="aaas_pasca_8"
                                                                                    id="aaas-pasca-8"
                                                                                    class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled"
                                                                                    placeholder=".......................">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>KESIMPULAN ASSESMEN AWAL
                                                                                ANESTESI/SEDASI</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td>PS ASA</td>
                                                                        <td width="1%">:</td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-1" value="1"
                                                                                    class="mr-1">1
                                                                            </div>
                                                                        </td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-2" value="2"
                                                                                    class="mr-1">2
                                                                            </div>
                                                                        </td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-3" value="3"
                                                                                    class="mr-1">3
                                                                            </div>
                                                                        </td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-4" value="4"
                                                                                    class="mr-1">4
                                                                            </div>
                                                                        </td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-5" value="5"
                                                                                    class="mr-1">5
                                                                            </div>
                                                                        </td>
                                                                        <td width="15%">
                                                                            <div class="input-group">
                                                                                <input type="radio" name="aaas_ps_1"
                                                                                    id="aaas-ps-6" value="6"
                                                                                    class="mr-1">E
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Penyulit</td>
                                                                        <td width="1%">:</td>
                                                                        <td colspan="6">
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_penyulit"
                                                                                    id="aaas-penyulit"
                                                                                    class="custom-form clear-input d-inline-block col-lg-12"
                                                                                    placeholder="Penyulit">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>PERSIAPAN PRA ANESTESI</b>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="20%"><b>Puasa</b></td>
                                                                        <td width="1%">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_puasa"
                                                                                    id="aaas-puasa"
                                                                                    class="custom-form clear-input d-inline-block col-lg-12"
                                                                                    placeholder="Puasa">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="20%"><b>Premedikal</b></td>
                                                                        <td width="1%">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_premedikal"
                                                                                    id="aaas-premedikal"
                                                                                    class="custom-form clear-input d-inline-block col-lg-12"
                                                                                    placeholder="Premedikal">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>CATATAN PRA ANESTESI</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="20%"><b>Catatan</b></td>
                                                                        <td width="1%">:</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" name="aaas_catatan"
                                                                                    id="aaas-catatan"
                                                                                    class="custom-form clear-input d-inline-block col-lg-12"
                                                                                    placeholder="Catatan Pra Anestesi">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td class="center"><b>PEMERIKSA PASIEN</b></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table table-sm table-striped"
                                                                    style="margin-top: -15px">
                                                                    <tr>
                                                                        <td width="20%"><b>Tanggal & Jam</b></td>
                                                                        <td width="1%">:</td>
                                                                        <td colspan="2">
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    name="aaas_tanggal_pemeriksaan_pasien"
                                                                                    id="aaas-tanggal-pemeriksaan-pasien"
                                                                                    class="custom-form clear-input d-inline-block col-lg-5"
                                                                                    placeholder="dd/mm/yyyy hh:ii">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="20%"><b>Pemeriksa</b></td>
                                                                        <td width="1%">:</td>
                                                                        <td colspan="2">
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                    name="aaas_pemeriksa_asesmen_anestesi"
                                                                                    id="aaas-pemeriksa-asesmen-anestesi"
                                                                                    class="select2c-input">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="20%"></td>
                                                                        <td width="1%"></td>
                                                                        <td width="44%"></td>
                                                                        <td class="center">
                                                                            <input type="checkbox" name="aaas_pemeriksa"
                                                                                id="aaas-pemeriksa" value="1">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="20%"></td>
                                                                        <td width="1%"></td>
                                                                        <td width="44%"></td>
                                                                        <td class="center">
                                                                            Nama Jelas & Tanda Tangan
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- END Assesmen Awal Anestesis/Sedasi -->

                                <!-- Form Asesment Pra Bedah AWAL WH-->
                                    <div class="form-asessment-pra-bedah">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <h5 class="center"><b>ASESMENT PRA BEDAH</b></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-asessment-bedah">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td width="2%"><b></b></td>
                                                            <td width="55%"><b>Berilah tanda (✔) yang sesuai : </b></td>
                                                            <td width="43%"></td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Tanggal dan Waktu</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_tanggal"
                                                                        id="apbwh-tanggal"
                                                                        class="custom-form clear-input d-inline-block col-lg-6"
                                                                        placeholder="dd/mm/yyyy hh:ii">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%"><b>Riwayat Alergi</b></td>
                                                            <td width="2%">:</td>
                                                            <td>
                                                                <input type="radio" name="apbwh_riwayat_alergi"
                                                                    id="riwayat-alergi-1" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="apbwh_riwayat_alergi"
                                                                    id="riwayat-alergi-2" value="1" class="mr-1 ml-2">Ya
                                                                <input type="text" name="apbwh_riwayat_alergi_3"
                                                                    id="riwayat-alergi-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-4 disabled"
                                                                    placeholder="Alergi">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%" class="bold">Suhu</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_suhu_1" id="apbwh-suhu-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Suhu"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">&#8451;</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td class="bold">Nadi</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_suhu_2" id="apbwh-suhu-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Nadi"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">x/mnt</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%" class="bold">Pernafasan</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_suhu_3"
                                                                        id="apbwh-suhu-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Nafas"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">x/mnt</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td class="bold">Tekanan Darah</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_suhu_4"
                                                                        id="apbwh-suhu-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Sistolik"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <span>/</span>
                                                                    <input type="text" name="apbwh_suhu_5"
                                                                        id="apbwh-suhu-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="Diastolik"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">mmHg</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%" class="bold">Berat Badan</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" name="apbwh_suhu_6"
                                                                        id="apbwh-suhu-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-3"
                                                                        placeholder="BB"
                                                                        onkeypress="return hanyaAngka(event)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-custom">Kg</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="2%"></td>
                                                            <td width="15%" class="bold">Status Nutrisi</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="radio" name="apbwh_status_nutrisi" id="apbwh-status-nutrisi-1"
                                                                        value="Obesitas" class="mr-1">Obesitas
                                                                    <input type="radio" name="apbwh_status_nutrisi" id="apbwh-status-nutrisi-2"
                                                                        value="Over Weight" class="mr-1 ml-2">Over Weight
                                                                    <input type="radio" name="apbwh_status_nutrisi" id="apbwh-status-nutrisi-3"
                                                                        value="Normo Weight" class="mr-1 ml-2">Normo Weight                                                          
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td colspan="3" class="td-dark" style="text-align:center">
                                                                <b>ANAMNESIS</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="18%"></td>
                                                            <td width="1%"></td>
                                                            <td width="81%">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Keluhan Utama</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_keluhan_utama" id="apbwh-keluhan-utama"
                                                                    rows="2" class="form-control clear-input"
                                                                    placeholder="Keluhan Utama"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_rps" id="apbwh-rps" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Riwayat Penyakit Sekarang"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Riwayat Penyakit Dahulu</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_rpd" id="apbwh-rpd" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Riwayat Penyakit Dahulu"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Pemeriksaan Fisik</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_pemeriksaan_fisik"
                                                                    id="apbwh-pemeriksaan-fisik" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Pemeriksaan Fisik"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Pemeriksaan Penunjang</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_pemeriksaan_banding"
                                                                    id="apbwh-pemeriksaan-banding" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Pemeriksaan Penunjang"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Laboratorium</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_laboratorium" id="apbwh-laboratorium"
                                                                    rows="2" class="form-control clear-input"
                                                                    placeholder="Labolatorium"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Diagnosis Pra Bedah</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_diagnosis" id="apbwh-diagnosis" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Diagnosis Pra Bedah"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Diagnosis Banding</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_diagnosis_banding"
                                                                    id="apbwh-diagnosis-banding" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Diagnosis Banding"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Permasalahan</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_permasalahan" id="apbwh-permasalahan"
                                                                    rows="2" class="form-control clear-input"
                                                                    placeholder="Permasalahan"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Rencana Tindak Operasi</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <textarea name="apbwh_rto" id="apbwh-rto" rows="2"
                                                                    class="form-control clear-input"
                                                                    placeholder="Rencana Tindak Operasi"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="18%" class="bold">Rawat Inap</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td>
                                                                <input type="radio" name="apbwh_rawat_inap"
                                                                    id="apbwh-rawat-inap-1" value="0" class="mr-1"
                                                                    checked>Tidak
                                                                <input type="radio" name="apbwh_rawat_inap" id="apbwh-rawat-inap-2"
                                                                    value="1" class="mr-1 ml-2">Ya
                                                                <input type="text" name="apbwh_rawat_inap_3"
                                                                    id="apbwh-rawat-inap-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled"
                                                                    placeholder="Indikasi Rawat Inap">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td><b>Edukasi awal diagnosis, resume tujuan terapi kepada:</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <input type="checkbox" name="apbwh_pasien_1" id="apbwh-pasien-1"
                                                                    value="1" class="mr-1">Pasien
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <input type="checkbox" name="apbwh_pasien_2" id="apbwh-pasien-2"
                                                                    value="1" class="mr-1">Keluarga, Nama
                                                                <input type="text" name="apbwh_pasien_3"
                                                                    id="apbwh-pasien-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-6 disabled"
                                                                    placeholder="Nama Keluarga">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                Hubungan dengan pasien
                                                                <input type="text" name="apbwh_pasien_4" id="apbwh-pasien-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-6 disabled"
                                                                    placeholder="Hubungan Keluarga">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="apbwh_pasien_5"
                                                                    id="apbwh-pasien-5" value="1" class="mr-1">Tidak
                                                                dapat memberikan edukasi kepada pasien atau keluarga pasien
                                                                <input type="text" name="apbwh_pasien_6"
                                                                    id="apbwh-pasien-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-6 disabled"
                                                                    placeholder="Alasan">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="center td-dark"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="33%" class="center">
                                                            Tanggal & Jam <input type="text"
                                                                name="apbwh_tanggal_d"
                                                                id="apbwh-tanggal-d"
                                                                class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                                placeholder="dd/mm/yyyy hh:ii">
                                                        </td>
                                                        <td width="33%">
                                                        </td>
                                                        <td width="33%" class="center">
                                                            Tanggal & Jam <input type="text"
                                                                name="apbwh_tanggal_p"
                                                                id="apbwh-tanggal-p"
                                                                class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                                placeholder="dd/mm/yyyy hh:ii">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center">Dokter DPJP</td>
                                                        <td></td>
                                                        <td class="center">Pasien/Keluarga</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center"><input type="text" name="apbwh_dokter"
                                                                id="apbwh-dokter" class="select2c-input ml-2"></td>
                                                        <td></td>
                                                        <td class="center"><input type="text" name="apbwh_pasient"
                                                                id="apbwh-pasient"
                                                                class="custom-form clear-input d-inline-block col-lg-10">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="center">
                                                            Nama Jelas & Tanda Tangan
                                                        </td>
                                                        <td class="center">
                                                        </td>
                                                        <td class="center">
                                                            Nama Jelas & Tanda Tangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center">
                                                            <input type="checkbox" name="apbwh_ttd_dokter"
                                                                id="apbwh-ttd-dokter" value="1"
                                                                class="custom-form col-lg-1 mx-auto">
                                                        </td>
                                                        <td class="center">
                                                        </td>
                                                        <td class="center">
                                                            <input type="checkbox" name="apbwh_ttd_pasien"
                                                                id="apbwh-ttd-pasien" value="1"
                                                                class="custom-form col-lg-1 mx-auto">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Asessment Pra Bedah AKHIR WH-->

                                <!-- Penanda Operasi -->
                                    <div class="form-penanda-lokasi-operasi">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <h5 class="center"><b>PENANDAAN LOKASI OPERASI</b></h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="5%">Prosedur</td>
                                                        <td width="1%">:</td>
                                                        <td width="25%"><input type="text" name="plo_prosedur" id="plo-prosedur"class="custom-form col-lg-12"></td>
                                                        <td width="10%"></td>
                                                        <td width="5%">Tanggal</td>
                                                        <td width="1%">:</td>
                                                        <td width="25%"><input type="text" name="plo_tanggal" id="plo-tanggal"class="custom-form col-lg-3" placeholder="dd/mm/yyyy"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" colspan="3" id="lokasi-operasi">
                                                            <h4>Berilah tanda pada lokasi yang akan dioperasi</h4>
                                                            <canvas id="plo-gambar" name="plo_gambar" width="700" height="800" disabled></canvas>
                                                            <button type="button" id="btn-hapus-canvas-plo" class="btn btn-secondary col-lg-6" onclick="clearCanvasPlo()"><i class="fas fa-trash mr-2"></i>Clear Canvas</button>
                                                        </td>
                                                        <td></td>
                                                        <td colspan="3" class="center" id="hasil-lokasi-operasi">
                                                            <h4>Hasil</h4>
                                                            <img id="gambar-plo" src="" width="700" height="800">
                                                            <!-- <button type="button" id="btn-edit-canvas-plo" class="btn btn-secondary col-lg-6" onclick="editCanvasPlo()"><i class="fas fa-edit mr-2"></i>Edit</button> -->
                                                            <input type="hidden" name="gambar_lama" id="gambar-lama">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7">Saya menyatakan lokasi yang telah ditetapkan pada diagram adalah benar</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien</td>
                                                        <td>:</td>
                                                        <td><span id="nama-pasien-2"></span></td>
                                                        <td></td>
                                                        <td>Nama Dokter</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_dokter" id="plo-dokter"class="select2c-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal & Jam</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_tanggal_pasien" id="plo-tanggal-pasien" class="custom-form col-lg-4" placeholder="dd/mm/yyyy hh:mm">
                                                        </td>
                                                        <td></td>
                                                        <td>Tanggal & Jam</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_tanggal_dokter" id="plo-tanggal-dokter"class="custom-form col-lg-4" placeholder="dd/mm/yyyy hh:mm"></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Penanda Operasi -->

                                <!-- Catatan Perhitungan Kasa / Jarum / Instrumen AWAL -->
                                    <div class="form-catatan-perhitungan-kasa-jarum-instrumen">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <h5 class="center"><b>Catatan Perhitungan Kasa / Jarum / Instrumen</b></h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-catatan-perhitungan-kasa-jarum-instrumen">
                                        <div class="row">   
                                            <tr>                                       
                                                <td width="100%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" colspan="9"><b></b></th>
                                                            </tr>
                                                            <tr>
                                                                <th width="15%" class="center"><b>Jenis.</b></th>
                                                                <th width="5%"><b>Jumlah Awal</b></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"><b>Tambahan</b></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"></th> 
                                                                <th width="8%" class="center"><b>Jumlah Sementara*</b></th>
                                                                <th width="8%" class="center"><b>Tambahan</b></th> 
                                                                <th width="8%" class="center"><b>Jumlah Akhir</b></th>
                                                                <th width="20%" class="center"><b>Keterangan</b></th>                  
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="center">Raytec Gauze / Kasa Raytek</td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_1" id="raytec-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_2" id="raytec-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_3" id="raytec-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_4" id="raytec-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_5" id="raytec-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_6" id="raytec-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_7" id="raytec-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_8" id="raytec-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 raytecc"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="raytec_9" id="raytec-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_10" id="raytec-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Lap's Sponge / Kasa Besar</td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_1" id="laps-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_2" id="laps-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_3" id="laps-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_4" id="laps-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_5" id="laps-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_6" id="laps-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_7" id="laps-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_8" id="laps-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laps_9" id="laps-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_10" id="laps-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Depper (S / L)</td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_1" id="depper-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_2" id="depper-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_3" id="depper-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_4" id="depper-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_5" id="depper-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_6" id="depper-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_7" id="depper-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_8" id="depper-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 deppe"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="depper_9" id="depper-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_10" id="depper-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Blade / Pisau</td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_1" id="blade-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_2" id="blade-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_3" id="blade-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad" 
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_4" id="blade-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_5" id="blade-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_6" id="blade-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_7" id="blade-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_8" id="blade-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 blad"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="blade_9" id="blade-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_10" id="blade-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Tape / Ethiloop</td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_1" id="tape-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_2" id="tape-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_3" id="tape-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_4" id="tape-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_5" id="tape-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_6" id="tape-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_7" id="tape-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_8" id="tape-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 tap"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="tape_9" id="tape-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_10" id="tape-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Jarum / Needle</td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_1" id="jjarum-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_2" id="jjarum-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_3" id="jjarum-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_4" id="jjarum-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_5" id="jjarum-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_6" id="jjarum-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_7" id="jjarum-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_8" id="jjarum-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 jarum"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="jjarum_9" id="jjarum-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_10" id="jjarum-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Pledget / Patties</td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_1" id="pledget-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_2" id="pledget-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_3" id="pledget-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_4" id="pledget-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_5" id="pledget-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_6" id="pledget-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_7" id="pledget-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_8" id="pledget-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 pledge"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="pledget_9" id="pledget-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_10" id="pledget-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Drain</td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_1" id="drain-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_2" id="drain-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_3" id="drain-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_4" id="drain-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_5" id="drain-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_6" id="drain-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_7" id="drain-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_8" id="drain-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 drai"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="drain_9" id="drain-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_10" id="drain-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Instrument</td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_1" id="innstrumen-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_2" id="innstrumen-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_3" id="innstrumen-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_4" id="innstrumen-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_5" id="innstrumen-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_6" id="innstrumen-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_7" id="innstrumen-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 "
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_8" id="innstrumen-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 instrume"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="innstrumen_9" id="innstrumen-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_10" id="innstrumen-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Lain - lain</td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_1" id="laint-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_2" id="laint-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_3" id="laint-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_4" id="laint-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_5" id="laint-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_6" id="laint-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_7" id="laint-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_8" id="laint-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 lain"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="laint_9" id="laint-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_10" id="laint-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">
                                                                    <input type="text" name="ro_1" id="ro-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_2" id="ro-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_3" id="ro-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_4" id="ro-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_5" id="ro-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_6" id="ro-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_7" id="ro-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_8" id="ro-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_9" id="ro-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 ro"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="ro_10" id="ro-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_11" id="ro-11"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>

                                                            <tr>
                                                                <td class="center">
                                                                    <input type="text" name="or_1" id="or-1"
                                                                    class="custom-form clear-input d-inline-block col-lg-10">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_2" id="or-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_3" id="or-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_4" id="or-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_5" id="or-5"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_6" id="or-6"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_7" id="or-7"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_8" id="or-8"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_9" id="or-9"
                                                                    class="custom-form clear-input d-inline-block col-lg-10 or"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="number" name="or_10" id="or-10"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_11" id="or-11"
                                                                    class="custom-form clear-input d-inline-block col-lg-10"
                                                                    placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                                     
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>                                                    
                                        </div>

                                        <table class="table table-sm table-striped table-bordered"
                                            style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td width="10%">Perawat Sirkulasi : </td>
                                                    <td width="50%"><input type="text" name="peerawat_1" id="peerawat-1"class="select2c-input ml-2"></td>
                                                </tr>
                                            </thead>
                                        </table>

                                        <table class="table table-sm table-striped table-bordered"
                                            style="margin-top: -15px">
                                            <thead>
                                                <br>

                                                <tr>
                                                    <td width="15%">Jenis Operasi</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jenis_operasi" id="jenis-operasi"class="custom-form clear-input d-inline-block col-lg-12" placeholder="jenis operasi"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Kasa</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_1"id="jummlah-c-1" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_1"id="jummlah-c-2" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Tanggal</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="tanggal_c" id="tanggal-c"class="custom-form clear-input d-inline-block col-lg-5" placeholder="masukan tanggal"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Jarum</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_3"id="jummlah-c-3" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_3"id="jummlah-c-4" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Jam Mulai</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jam_mulai_c" id="jam-mulai-c"class="custom-form clear-input d-inline-block col-lg-3" placeholder="jam mulai"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Instrumen</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_5"id="jummlah-c-5" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_5"id="jummlah-c-6" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Jam Selesai</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jam_selesai_c" id="jam-selesai-c"class="custom-form clear-input d-inline-block col-lg-4" placeholder="jam selesai"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Pisau / Balde</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_7"id="jummlah-c-7" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_7"id="jummlah-c-8" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%"></td>
                                                    <td width="1%"></td>
                                                    <td width="15%"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%"> Lain - lain &nbsp;<input type="text" name="lain_c" id="lain-c"class="custom-form clear-input d-inline-block col-lg-8" placeholder="masukan lain-lain"></td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_9"id="jummlah-c-9" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_9"id="jummlah-c-10" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                            </thead>
                                        </table>

                                        <br>
                                        <table class="table table-sm table-striped table-bordered"
                                            style="margin-top: -15px">
                                            <thead>
                                                <tr>             
                                                    <td class="center" width="33%"><b> Dokter Bedah </b></td>
                                                    <td class="center" width="33%"><b> Perawat Instrumen </b></td>
                                                    <td class="center" width="33%"><b> Perawat Sirkuler </b></td>
                                                </tr>
                                                <tr>
                                                    <td class="center"><input type="text" name="dokterr_1"
                                                        id="dokterr-1" class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="peerawat_2"
                                                        id="peerawat-2" class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="peerawat_3"
                                                        id="peerawat-3" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_1" id="ttd-1" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_2" id="ttd-2" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_3" id="ttd-3" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                <!-- Catatan Perhitungan Kasa / Jarum / Instrumen AWAL -->

                                <!-- end content -->
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriOperasi()"><span id="btn_cppt"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entri Operasi -->

<!-- SSCKO 3-->
<!-- Modal Detail SURGICAL SAFETY CEKLIS KAMAR OPERASI -->
<div id="modal-detail-surgical-safety-ceklis-kamar-operasi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SURGICAL SAFETY CEKLIS KAMAR OPERASI</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <table class="table table-no-border table-sm table-striped" id="table-detail-surgical-safety-ceklis-kamar-operasi">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2">
                                <h4>sign in</h4>
                            </th>
                            <th colspan="2">
                                <h4>time out</h4>
                            </th>
                            <th colspan="2">
                                <h4>sign out</h4>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">(sebelum induksi Anestesi)</th>
                            <th colspan="2">(sebelum insisi kulit)</th>
                            <th colspan="2">(sebelum pasien keluar kamar operasi)</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer" id="detail-sscko">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Detail SURGICAL SAFETY CEKLIS KAMAR OPERASI-->

<!-- SSCKO 4 -->
<!-- Modal Edit SURGICAL SAFETY CEKLIS KAMAR OPERASI-->
<div id="modal-edit-surgical-safety-ceklis-kamar-operasi" class="modal fade" role="dialog" data-backdrop="static"   aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Surggical Safety Ceklis Kamar Operasi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-surgical-safety-ceklis-kamar-operasi'); ?>
                <?= $this->session->userdata('nama') ?>
                <input type="hidden" name="user_surgical_safety_ceklis" value="<?= $this->session->userdata("id_translucent") ?>">
                <input type="hidden" name="id" id="id-surgical-safety-ceklis-kamar-operasi">
                <table class="table table-no-border table-sm table-striped" id="table-edit-surgical-safety-ceklis-kamar-operasi" style="margin-bottom: 10rem;">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2">
                                <h4>sign in</h4>
                            </th>
                            <th colspan="2">
                                <h4>time out</h4>
                            </th>
                            <th colspan="2">
                                <h4>sign out</h4>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">(sebelum induksi Anestesi)</th>
                            <th colspan="2">(sebelum insisi kulit)</th>
                            <th colspan="2">(sebelum pasien keluar kamar operasi)</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer" id="update-sscko">
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit SURGICAL SAFETY CEKLIS KAMAR OPERASI--> 

<!-- TOTAL ADA 4 -->

<?php $this->load->view('form_operasi/js') ?>