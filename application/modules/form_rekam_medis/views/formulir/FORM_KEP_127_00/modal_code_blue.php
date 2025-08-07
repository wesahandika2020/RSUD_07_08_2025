<!-- // FCB -->

<style>
    .rounded-select {
        border-radius: 8px; /* Sudut tumpul */
        padding: 2px;       /* Jarak dalam */
        border: 1px solid #ccc; /* Warna border */
        outline: none; /* Menghilangkan outline bawaan */
        font-size: 12px; /* Ukuran font */
        background-color: #fff; /* Warna latar */
    }
    .rounded-select:focus {
        border-color: #007bff; /* Warna border saat fokus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek bayangan saat fokus */
    }

    .input-row {
    display: flex;
    align-items: baseline;
    }

    .input-row input[type="checkbox"] {
        margin-right: 5px; /* Jarak kecil antara checkbox dan label */
    }

    .input-row label {
        margin-right: 10px; /* Jarak kecil antara label dan textarea */
    }

    .input-row textarea {
        flex: 1; /* Agar textarea menggunakan ruang sisa di baris */
        resize: none; /* Opsional: Hilangkan kemampuan untuk di-resize */
        max-width: 600px; /* Atur lebar maksimum textarea sesuai kebutuhan */
    }


</style>

<div class="modal fade" id="modal_code_blue" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_code_blue">FORM CODE BLUE</h5>
                    <h6 class="modal-title text-muted"><small></small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_code_blue class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-fcb">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-fcb">
                <input type="hidden" name="id_pasien" id="id-pasien-fcb">
                <input type="hidden" name="id_fcb" id="id-fcb">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">     

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-fcb"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-fcb"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-fcb"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-fcb"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-code-blue">
                                <div class="form-code-blue">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-code-blue"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-code-blue"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>                                           
                                        </tr> 
                                       <tr>
                                           <tr>
                                                <td width="20%" class="bold">Respon awal</td>
                                                <td width="20%" class="bold">Mulai Penanganan </td>
                                                <td width="20%" class="bold">Area kejadian</td>
                                                <td width="20%" class="bold">Code blue zonasi</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="respon_fcb_1" id="respon-fcb-1" value="1" class="mr-1">Petugas primer
                                                </td>
                                                <td> Tanggal/jam :
                                                    <input type="text" name="tgl_jam_fcb"id="tgl-jam-fcb"class="custom-form clear-input d-inline-block col-lg-6">     
                                                </td>
                                                <td>
                                                    Bangsal  <input type="text" name="bansal_fcb" id="bangsal-fcb"
                                                        class="select2c-input ml-2">
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="respon_fcb_2" id="respon-fcb-2" value="1" class="mr-1">Zonasi 1
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>                              
                                                    <input type="checkbox" name="respon_fcb_3" id="respon-fcb-3" value="1" class="mr-1">Awam terlatih
                                                </td>
                                                <td colspan="2"> Respon time tim code blue &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;                            
                                                    <!-- <input type="checkbox" name="respon_fcb_4" id="respon-fcb-4" value="1" class="mr-1">3 menit
                                                    <input type="checkbox" name="respon_fcb_5" id="respon-fcb-5" value="1" class="mr-1 ml-3">5 menit
                                                    <input type="checkbox" name="respon_fcb_6" id="respon-fcb-6" value="1" class="mr-1 ml-3">> 5menit -->
                                                    <input type="text" name="respon_fcb_9"id="respon-fcb-9"class="custom-form clear-input d-inline-block col-lg-8"> menit

                                                </td> 
                                                <!-- <td></td> -->
                                                <td>
                                                    <input type="checkbox" name="respon_fcb_7" id="respon-fcb-7" value="1" class="mr-1">Zonasi 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="checkbox" name="respon_fcb_8" id="respon-fcb-8" value="1" class="mr-1">Zonasi 3
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td class="bold">Kriteria aktivasi code blue</td>
                                                <td class="bold">Kriteria kegawatan medis</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_1" id="kriteria-fcb-1" value="1" class="mr-1">Henti jantung
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_4" id="kriteria-fcb-4" value="1" class="mr-1"> Airway : obstruksi jalan nafas
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_2" id="kriteria-fcb-2" value="1" class="mr-1">Henti napas
                                                </td>
                                                <!-- <td colspan="2"> -->
                                                    <!-- <input type="checkbox" name="kriteria_fcb_5" id="kriteria-fcb-5" value="1" class="mr-1"> Breathing : P>35x/mnt atau < 5x/mnt -->
                                                    <!-- <input type="checkbox" name="kriteria_fcb_5" id="kriteria-fcb-5" value="1" class="mr-1"> Breathing :  -->
                                                    <!-- <input type="text" name="kriteria_fcb_9"id="kriteria-fcb-9"class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                    <!-- <textarea name="kriteria_fcb_9" id="kriteria-fcb-9"rows="2" class="form-control clear-input"></textarea> -->
                                                <!-- </td> -->
                                                <td colspan="2">
                                                    <div class="input-row">
                                                        <input type="checkbox" name="kriteria_fcb_5" id="kriteria-fcb-5" value="1">
                                                        <span for="kriteria-fcb-5">Breathing : </span>
                                                        <textarea name="kriteria_fcb_9" id="kriteria-fcb-9" rows="2" class="form-control clear-input"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_3" id="kriteria-fcb-3" value="1" class="mr-1">Kegawatan medis
                                                </td>
                                                <!-- <td colspan="2"> -->
                                                    <!-- <input type="checkbox" name="kriteria_fcb_6" id="kriteria-fcb-6" value="1" class="mr-1"> Sirkulasi : hr>140x/mnt atau < 40x/mnt, td sistol>220mmhg atau < 70mmhg -->
                                                    <!-- <input type="checkbox" name="kriteria_fcb_6" id="kriteria-fcb-6" value="1" class="mr-1"> Sirkulasi :  -->
                                                    <!-- <input type="text" name="kriteria_fcb_10"id="kriteria-fcb-10"class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                <!-- </td> -->
                                                <td colspan="2">
                                                    <div class="input-row">
                                                        <input type="checkbox" name="kriteria_fcb_6" id="kriteria-fcb-6" value="1">
                                                        <span for="kriteria-fcb-5">Sirkulasi : </span>
                                                        <textarea name="kriteria_fcb_10" id="kriteria-fcb-10" rows="2" class="form-control clear-input"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_7" id="kriteria-fcb-7" value="1" class="mr-1"> neurologis penurunan kesadaran / kejang
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="checkbox" name="kriteria_fcb_8" id="kriteria-fcb-8" value="1" class="mr-1"> Skor EWS Merah
                                                </td>
                                            </tr>
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#primary-fcb"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button> PRIMARY MANAGEMENT : ASSESMENT AWAL RESUSISTASI 
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="primary-fcb">
                                                <tr>
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <td width="10%" class="bold"> Respon awal </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="awal_fcb_1" id="awal-fcb-1"value="1" class="mr-1"> Sadar
                                                            <input type="checkbox" name="awal_fcb_2" id="awal-fcb-2"value="1" class="mr-1 ml-3"> Merespon suara
                                                            <input type="checkbox" name="awal_fcb_3" id="awal-fcb-3"value="1" class="mr-1 ml-3"> Merespon nyeri
                                                            <input type="checkbox" name="awal_fcb_4" id="awal-fcb-4"value="1" class="mr-1 ml-3"> Tidak ada respon
                                                        </td>                                   
                                                    </table>
                                                </tr>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr>
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <tr>
                                                            <td width="16%" class="bold">Assesmen jalan napas</td>
                                                            <td width="16%" class="bold">Resusitasi</td>
                                                            <td width="16%" class="bold">Assesment pernapasan</td>
                                                            <td width="16%" class="bold">Resusitasi</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="jalan_fcb_1" id="jalan-fcb-1" value="1" class="mr-1">Obstruksi total</td>
                                                            <td><input type="checkbox" name="jalan_fcb_2" id="jalan-fcb-2" value="1" class="mr-1">Orofaringeal tube</td>
                                                            <td><input type="checkbox" name="jalan_fcb_3" id="jalan-fcb-3" value="1" class="mr-1">Apneu/gasping</td>
                                                            <td><input type="checkbox" name="jalan_fcb_4" id="jalan-fcb-4" value="1" class="mr-1">02 bag value mask</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="jalan_fcb_5" id="jalan-fcb-5" value="1" class="mr-1">Obstruksi parsial</td>
                                                            <td><input type="checkbox" name="jalan_fcb_6" id="jalan-fcb-6" value="1" class="mr-1">Intubasi endotrakheal</td>
                                                            <td><input type="checkbox" name="jalan_fcb_7" id="jalan-fcb-7" value="1" class="mr-1">Sesak napas</td>
                                                            <td><input type="checkbox" name="jalan_fcb_8" id="jalan-fcb-8" value="1" class="mr-1">02 reabreathing mask</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="jalan_fcb_9" id="jalan-fcb-9" value="1" class="mr-1">Normal</td>
                                                            <td><input type="checkbox" name="jalan_fcb_10" id="jalan-fcb-10" value="1" class="mr-1">Laryngeal mask airway</td>
                                                            <td><input type="checkbox" name="jalan_fcb_11" id="jalan-fcb-11" value="1" class="mr-1">Sianosis</td>
                                                            <td><input type="checkbox" name="jalan_fcb_12" id="jalan-fcb-12" value="1" class="mr-1">02 non reabreathing mask</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <input type="checkbox" name="jalan_fcb_13" id="jalan-fcb-13" value="1" class="mr-1">Lain-lain
                                                                <input type="text" name="jalan_fcb_14"id="jalan-fcb-14"class="custom-form clear-input d-inline-block col-lg-8">
                                                            </td>
                                                            <td><input type="checkbox" name="jalan_fcb_15" id="jalan-fcb-15" value="1" class="mr-1">Retraksi otot bantu napas</td>
                                                            <td><input type="checkbox" name="jalan_fcb_16" id="jalan-fcb-16" value="1" class="mr-1">Lain-lain
                                                                <input type="text" name="jalan_fcb_17"id="jalan-fcb-17"class="custom-form clear-input d-inline-block col-lg-8">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td> </td>
                                                            <td><input type="checkbox" name="jalan_fcb_18" id="jalan-fcb-18" value="1" class="mr-1">Normal</td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </tr>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr>
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <tr>
                                                            <td width="20%" class="bold">Assesmen sirkulasi</td>
                                                            <td width="20%" class="bold">Resusitasi</td>
                                                            <td width="33%" class="bold">Assesment Disabilitas</td>
                                                            <td width="30%" class="bold">Tanda Vital</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_1" id="sirkulasi-fcb-1" value="1" class="mr-1">Nadi karotis tidak teraba</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_2" id="sirkulasi-fcb-2" value="1" class="mr-1">Resusitasi jantung paru</td>
                                                            <td> <b> GCS &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    e <input type="text" name="gcs_fcb_1" id="gcs-fcb-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 gcsfcb"
                                                                        placeholder="" onkeypress="return hanyaAngka(event)">
                                                                    m <input typevent="text" name="gcs_fcb_2" id="gcs-fcb-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 gcsfcb"
                                                                        placeholder="" onkeypress="return hanyaAngka(event)">
                                                                    v <input type="text" name="gcs_fcb_3" id="gcs-fcb-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 gcsfcb"
                                                                        placeholder="" onkeypress="return hanyaAngka(event)">
                                                                    total : <input type="text" name="gcs_fcb_4" id="gcs-fcb-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"
                                                                        placeholder="0">
                                                                </span>
                                                            </td>

                                                            <td> <b> Tekanan darah &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    <input type="text" name="tanda_vital_fcb_1" id="tanda-vital-fcb-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="sintolik"> <b>/</b>
                                                                    <input type="text" name="tanda_vital_fcb_2" id="tanda-vital-fcb-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="diastolik"> mmHg
                                                                </span>
                                                            </td>
                                                        </tr>                                                       
                                                        <tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_3" id="sirkulasi-fcb-3" value="1" class="mr-1">Tachicardia</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_4" id="sirkulasi-fcb-4" value="1" class="mr-1">Defibrilasi kardioversi</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_5" id="sirkulasi-fcb-5" value="1" class="mr-1">Pupil
                                                                <input type="text" name="sirkulasi_fcb_6"id="sirkulasi-fcb-6"class="custom-form clear-input d-inline-block col-lg-8">
                                                            </td>
                                                            <td> <b> Frekuensi nadi &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    <input type="text" name="tanda_vital_fcb_3" id="tanda-vital-fcb-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="nadi"> x/mnt
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_7" id="sirkulasi-fcb-7" value="1" class="mr-1">Bradicardia</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_8" id="sirkulasi-fcb-8" value="1" class="mr-1">Pasang iv line terapi cairan</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_9" id="sirkulasi-fcb-9" value="1" class="mr-1">Refleks cahaya : 
                                                                <input type="text" name="sirkulasi_fcb_10"id="sirkulasi-fcb-10"class="custom-form clear-input d-inline-block col-lg-8">
                                                            </td>
                                                            <td> <b> Frekuensi napas &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    <input type="text" name="tanda_vital_fcb_4" id="tanda-vital-fcb-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="napas"> x/mnt
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_11" id="sirkulasi-fcb-11" value="1" class="mr-1">Hipotensi</td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_12" id="sirkulasi-fcb-12" value="1" class="mr-1">Lain-lain 
                                                                <input type="text" name="sirkulasi_fcb_13"id="sirkulasi-fcb-13"class="custom-form clear-input d-inline-block col-lg-8">
                                                            </td>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_14" id="sirkulasi-fcb-14" value="1" class="mr-1">Plegi parese</td>
                                                            <td> <b> Suhu &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    <input type="text" name="tanda_vital_fcb_5" id="tanda-vital-fcb-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="suhu"> &#8451;
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_15" id="sirkulasi-fcb-15" value="1" class="mr-1">Hipertensi</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td> <b> Spo2 &nbsp; : </b> &nbsp;&nbsp;&nbsp;
                                                                <span class="bold">
                                                                    <input type="text" name="tanda_vital_fcb_6" id="tanda-vital-fcb-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-2"placeholder="spo2"> %
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_16" id="sirkulasi-fcb-16" value="1" class="mr-1">Irama jantung ireguler</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>                                                         
                                                        </tr>
                                                        </tr>
                                                            <td><input type="checkbox" name="sirkulasi_fcb_17" id="sirkulasi-fcb-17" value="1" class="mr-1">Normal</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </tr>
                                            </div>
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-secondary-fcb"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>SECONDARY MANAGEMENT
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-secondary-fcb">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Anamnesa</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <textarea name="anamnesa_fcb" id="anamnesa-fcb"rows="3" class="form-control clear-input"placeholder="Anamnesa"></textarea>
                                                        </td>
                                                    </tr>     
                                                    <tr>
                                                        <td class="bold">Alergi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="alergi_fcb_1" id="alergi-fcb-1"
                                                                value="1" class="mr-1">Obat                                                       
                                                            <input type="checkbox" name="alergi_fcb_2" id="alergi-fcb-2"
                                                                value="1" class="mr-1 ml-2">Makanan                                                      
                                                            <input type="checkbox" name="alergi_fcb_3" id="alergi-fcb-3"
                                                                value="1" class="mr-1 ml-2">lain-lain                                                       
                                                            <input type="text" name="alergi_fcb_4" id="alergi-fcb-4"
                                                                class="custom-form clear-input d-inline-block col-lg-8"
                                                                placeholder="sebutkan">
                                                            <input type="checkbox" name="alergi_fcb_5" id="alergi-fcb-5"
                                                                value="1" class="mr-1 ml-2">Tidak ada
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td class="bold">Pemeriksaan penunjang</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <textarea name="pemeriksaan_fcb" id="pemeriksaan-fcb"rows="3" class="form-control clear-input"placeholder="Pemeriksaan penunjang"></textarea>
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td class="bold">Diagnosis kerja</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <textarea name="diagnosis_fcb" id="diagnosis-fcb"rows="3" class="form-control clear-input"placeholder="Diagnosis kerja"></textarea>
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
                                                            data-toggle="collapse"
                                                            data-target="#data-lembar-lmdt"><i
                                                                class="fas fa-expand mr-1"></i>Expand
                                                        </button>
                                                        LEMBAR MONITORING DAN TERAPI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-lembar-lmdt">
                                                <div class="col-lg">
                                                    <div id="buka-tutup-lmdt">
                                                    </div>
                                                    <div class="card">
                                                        <!-- <table class="table table-no-border table-sm table-striped"id="tabel-lmdt"> -->
                                                        <table class="table table-sm table-striped table-bordered" id="tabel-lmdt">
                                                            <thead style="background-color: #B0C4DE;">
                                                                <tr>
                                                                    <th width="1%" class="center"><b>No</b></th>
                                                                    <th width="8%"class="center"><b>Tanggal</b></th>
                                                                    <th width="5%" class="center"><b>Jam</b></th>
                                                                    <th width="60%"class="center"><b>Terapi,Monitoring dan evaluasi</b></th>
                                                                    <th width="15%"class="center"><b>Petugas</b></th>
                                                                    <th width="12%"class="center"><b>Alat</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-kriteria-fcb"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KRITERIA PASKA RESUSITASI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-kriteria-fcb">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_1" id="paska-fcb-1" value="1" class="mr-1">ICU/HCU</td>
                                                    </tr>    
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_2" id="paska-fcb-2" value="1" class="mr-1">PICU/NICU</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_3" id="paska-fcb-3" value="1" class="mr-1">PERAWATAN BIASA</td>
                                                    </tr>  
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_4" id="paska-fcb-4" value="1" class="mr-1">DNR</td>
                                                    </tr>              
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_5" id="paska-fcb-5" value="1" class="mr-1">MENINGGAL</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="paska_fcb_6" id="paska-fcb-6" value="1" class="mr-1">TRANSFER KE 
                                                            <input type="text" name="paska_fcb_7"id="paska-fcb-7"class="custom-form clear-input d-inline-block col-lg-8">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> JAM <input type="text" name="paska_fcb_8"id="paska-fcb-8"class="custom-form clear-input d-inline-block col-lg-1 mx-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            KETERANGAN &nbsp;&nbsp;:&nbsp;&nbsp;
                                                            <textarea name="keterangan_fcb" id="keterangan-fcb"rows="3" class="form-control clear-input"placeholder="Keterangan"></textarea>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center">
                                                            <b>LEADER TIM CODE BLUE</b> 
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center">
                                                            <b>( Dokter )</b> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center"> 
                                                            <input type="text" name="dokter_fcb" id="dokter-fcb" class="select2c-input ml-2">                              
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center">
                                                            <b>( Tanda Tangan dan Nama Lengkap )</b> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center">
                                                            <input type="checkbox" name="ttd_fcb" id="ttd-fcb" value="1" class="mr-1">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </tr>                                                                                                         
                                    </table>                                     
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanFormCodeBlue()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal form code blue
<!-- // LMDT -->
<div id="modal-edit-lembar-monitoring" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Lembar Monitoring</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-lembar-monitoring'); ?>
                <input type="hidden" name="id" id="id-lembar-monitoring">
                <div class="from-group">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-lmdt">
                    <thead style="background-color: #7CFC00;">
                        <tr>
                            <th width="10%" class="center">Tanggal</th>
                            <th width="5%" class="center">Jam</th>
                            <th width="80%" class="center">Terapi,Monitoring dan evaluasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="bold text-uppercase"></td>
                        </tr>
                        <!-- <tr>
                            <td class="center"><input type="text" name="tgl_fcb" id="tgl-fcb-edit" class="custom-form clear-input d-inline-block col-lg-2"></td>
                            <td class="center"><input type="text" name="jam_fcb" id="jam-fcb-edit" class="custom-form clear-input d-inline-block col-lg-2"></td>
                            <td class="center"><textarea name="terapi_eva_fcb" id="terapi-eva-fcb-edit"rows="3" class="form-control clear-input"placeholder=""></textarea></td>                          
                        </tr> -->

                        <tr>
                            <td class="center"><input type="text" name="tgl_fcb" id="tgl-fcb-edit"class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td class="center"><input type="text" name="jam_fcb" id="jam-fcb-edit"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><textarea name="terapi_eva_fcb" id="terapi-eva-fcb-edit"rows="3" class="form-control clear-input"placeholder="Keterangan"></textarea></td>                          
                        </tr> 

                    </tbody>       
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-lmdt">
            </div>
        </div>
    </div>
</div>

