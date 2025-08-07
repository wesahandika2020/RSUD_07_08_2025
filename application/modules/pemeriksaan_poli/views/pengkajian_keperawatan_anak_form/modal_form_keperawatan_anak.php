<!-- // PAKARJ -->
<!-- <div class="modal fade" id="modal_form_keperawatan_anak" role="dialog" data-backdrop="static"
    aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true"> -->
    <div class="modal fade" id="modal_form_keperawatan_anak" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_form_keperawatan_anak">FORM PENGKAJIAN AWAL KEPERAWATAN ANAK RAWAT JALAN</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang rawat jalan
                        )</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan_anak class=form-horizontal') ?>
                <!-- <input type="hidden" name="id_keperawatan_anak" id="id-keperawatan-anak"> -->
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pakarj">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pakarj">
                <input type="hidden" name="id_pakarj" id="id-pakarj">
                <!-- <input type="hidden" name="id_users" id="ek-id-users" <!?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<!?php echo $nama_js; ?>> -->
                <input type="hidden" name="id_users" id="id-users"value="<?= $this->session->userdata('id_translucent') ?>">

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pakarj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-pakarj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-pakarj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pakarj"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-pakarj"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal & Jam Kunjungan</td>
                                    <td wdith="70%">: <span id="tanggal-jam-pakarj"></span></td>
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
                            <div id="wizard-keperawatan-anak">
                                <ol>
                                    <li>Pengkajian Keperawatan Anak <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                </ol>
                                <!-- PAKARJ -->
                                <div class="form-pengkajian-awal-keperawatan-anak-rawat-jalan">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-keperawatan-anak"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-keperawatan-anak"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-keluhan-utama-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KELUHAN UTAMA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-keluhan-utama-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <textarea name="keluhan_utama_pakarj" id="keluhan-utama-pakarj"rows="2" class="form-control clear-input"placeholder="Keluhan Utama"></textarea>
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
                                                            data-toggle="collapse" data-target="#data-riwayat-kesehatan-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KESEHATAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-kesehatan-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Riwayat Pengobatan Saat ini</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kes_1"
                                                                id="riwayat-kes-1" class=" mx-1" value="0" checked> Tidak                                                   
                                                            <input type="radio"name="riwayat_kes_1"
                                                                id="riwayat-kes-2" class=" mx-1" value="1"> Ya, 
                                                            Jelaskan <input type="text" name="riwayat_kes_3"
                                                                id="riwayat-kes-3"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Riwayat Penyakit Keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_kes_4" id="riwayat-kes-4"
                                                                value="1" class="mr-1">Asma                                                       
                                                            <input type="checkbox" name="riwayat_kes_5" id="riwayat-kes-5"
                                                                value="1" class="mr-1 ml-2">Hipertensi                                                      
                                                            <input type="checkbox" name="riwayat_kes_6" id="riwayat-kes-6"
                                                                value="1" class="mr-1 ml-2">Jantung                                                       
                                                            <input type="checkbox" name="riwayat_kes_7" id="riwayat-kes-7"
                                                                value="1" class="mr-1 ml-2">Diabetes                                                       
                                                            <input type="checkbox" name="riwayat_kes_8" id="riwayat-kes-8"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="riwayat_kes_9" id="riwayat-kes-9"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain"disabled >
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Riwayat Operasi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kes_10"
                                                                id="riwayat-kes-10" class=" mx-1" value="0" checked> Tidak
                                                            <input type="radio"name="riwayat_kes_10"
                                                                id="riwayat-kes-11" class=" mx-1" value="1"> Ya
                                                           Kapan <input type="text" name="riwayat_kes_12"
                                                                id="riwayat-kes-12"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>                                                       
                                                           Dimana <input type="text" name="riwayat_kes_13"
                                                                id="riwayat-kes-13"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled > 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Alergi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kes_14"
                                                                id="riwayat-kes-14" class=" mx-1" value="0" checked> Tidak
                                                            <input type="radio"name="riwayat_kes_14"
                                                                id="riwayat-kes-15" class=" mx-1" value="1"> Tidak tahu
                                                            <input type="radio"name="riwayat_kes_14"
                                                                id="riwayat-kes-16" class=" mx-1" value="2"> Ya,
                                                           Sebutkan <input type="text" name="riwayat_kes_17"
                                                                id="riwayat-kes-17"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled > 
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
                                                            data-toggle="collapse" data-target="#data-riwayat-pesikososial-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT PSIKOSOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-pesikososial-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Hubungan Pasien dan Keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_pesi_1"
                                                                id="riwayat-pesi-1" class=" mx-1" value="1"> Baik                                                   
                                                            <input type="radio"name="riwayat_pesi_1"
                                                                id="riwayat-pesi-2" class=" mx-1" value="0"> Tidak Baik                                                      
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Status Psikologis</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_pesi_3" id="riwayat-pesi-3"
                                                                value="1" class="mr-1">Tenang                                                       
                                                            <input type="checkbox" name="riwayat_pesi_4" id="riwayat-pesi-4"
                                                                value="1" class="mr-1 ml-2">Cemas                                                      
                                                            <input type="checkbox" name="riwayat_pesi_5" id="riwayat-pesi-5"
                                                                value="1" class="mr-1 ml-2">Takut                                                       
                                                            <input type="checkbox" name="riwayat_pesi_6" id="riwayat-pesi-6"
                                                                value="1" class="mr-1 ml-2">Marah 
                                                            <input type="checkbox" name="riwayat_pesi_7" id="riwayat-pesi-7"
                                                                value="1" class="mr-1 ml-2">Sedih                                                      
                                                            <input type="checkbox" name="riwayat_pesi_8" id="riwayat-pesi-8"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="riwayat_pesi_9" id="riwayat-pesi-9"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain"disabled >
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_pesi_10" id="riwayat-pesi-10"
                                                                value="1" class="mr-1">Kecenderungan bunuh diri dilaporkan   &nbsp; &nbsp; &nbsp;                                                     
                                                            Ke <input type="text" name="riwayat_pesi_11" id="riwayat-pesi-11"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="........."disabled >   
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>                                                                                                       
                                                            <input type="checkbox" name="riwayat_pesi_12" id="riwayat-pesi-12"
                                                                value="1" class="mr-1">Lain-lain,  &nbsp; &nbsp; &nbsp;                                                   
                                                            Sebutkan <input type="text" name="riwayat_pesi_13" id="riwayat-pesi-13"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain"disabled >
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
                                                            data-toggle="collapse" data-target="#data-pemeriksaan-fisik-anak-pakarj"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"id="data-pemeriksaan-fisik-anak-pakarj">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Nadi</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_fisik_1" id="pemeriksaan-fisik-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="nadi"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Pernafasan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_fisik_2" id="pemeriksaan-fisik-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="pernafasan"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Suhu</td>
                                                                <td class="bold">:</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_fisik_3" id="pemeriksaan-fisik-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="suhu"> &#8451;
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Tinggi Badan/PB</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_fisik_4" id="pemeriksaan-fisik-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="tb/pb"> Cm
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Berat badan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_fisik_5" id="pemeriksaan-fisik-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="kg"> Kg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Tekanan Darah : <input type="text" name="pemeriksaan_fisik_6" id="pemeriksaan-fisik-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="sintolik"></td>
                                                                <td>/</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_fisik_7" id="pemeriksaan-fisik-7"
                                                                        class="custom-form clear-input d-inline-block col-lg-6" placeholder="diastolik"> mmHg                                                                   
                                                                </td>
                                                            </tr>                                                                                                      
                                                        </table>
                                                        <table class="table table-sm table-striped table-bordered"
                                                            style="margin-top: -15px">                                              
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
                                                            data-toggle="collapse" data-target="#data-status-ekonomi-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS EKONOMI DAN SOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-ekonomi-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Cara Pembayaran</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="status_ekom_1"
                                                                id="status-ekom-1" class=" mx-1" value="1" checked> Biaya Sendiri                                                   
                                                            <input type="radio"name="status_ekom_1"
                                                                id="status-ekom-2" class=" mx-1" value="2"> BPJS 
                                                            <input type="radio"name="status_ekom_1"
                                                                id="status-ekom-3" class=" mx-1" value="3"> Asuransi 
                                                            <input type="text" name="status_ekom_4"
                                                                id="status-ekom-4"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled >
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="status_ekom_5" id="status-ekom-5"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="status_ekom_6" id="status-ekom-6"
                                                                class="custom-form clear-input d-inline-block col-lg-7 mx-1"
                                                                placeholder="lain-lain"disabled >
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
                                                            data-toggle="collapse" data-target="#data-riwayat-kelahiran-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KELAHIRAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-kelahiran-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Usia Kehamilan</td>
                                                        <td class="bold">:</td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_kelahiran_1" id="riwayat-kelahiran-1"
                                                                value="1" class="mr-1 ml-2">                                                   
                                                            <input type="text" name="riwayat_kelahiran_2" id="riwayat-kelahiran-2"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="........" disabled> Minggu
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_kelahiran_3" id="riwayat-kelahiran-3"
                                                                value="1" class="mr-1 ml-2"> 
                                                            Berat badan Lahir : <input type="text" name="riwayat_kelahiran_4" id="riwayat-kelahiran-4"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="........" disabled> gr
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_kelahiran_5" id="riwayat-kelahiran-5"
                                                                value="1" class="mr-1 ml-2"> 
                                                            Panjang badan Lahir : <input type="text" name="riwayat_kelahiran_6" id="riwayat-kelahiran-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="........" disabled> cm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Persalinan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kelahiran_7"
                                                                id="riwayat-kelahiran-7" class=" mx-1" value="1">Spontan                                                  
                                                            <input type="radio"name="riwayat_kelahiran_7"
                                                                id="riwayat-kelahiran-8" class=" mx-1" value="2">SC 
                                                            <input type="radio"name="riwayat_kelahiran_7"
                                                                id="riwayat-kelahiran-9" class=" mx-1" value="3">Forcep 
                                                            <input type="radio"name="riwayat_kelahiran_7"
                                                                id="riwayat-kelahiran-10" class=" mx-1" value="4">Vakum Ekstraksi 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Menangis</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kelahiran_11"
                                                                id="riwayat-kelahiran-11" class=" mx-1" value="1">Ya                                                  
                                                            <input type="radio"name="riwayat_kelahiran_11"
                                                                id="riwayat-kelahiran-12" class=" mx-1" value="2">Tidak 
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td class="bold">Riwayat Kuning</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_kelahiran_13"
                                                                id="riwayat-kelahiran-13" class=" mx-1" value="1">Ya                                                  
                                                            <input type="radio"name="riwayat_kelahiran_13"
                                                                id="riwayat-kelahiran-14" class=" mx-1" value="2">Tidak 
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
                                                            data-toggle="collapse" data-target="#data-riwayat-imunisasi-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT IMUNISASI DASAR
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-imunisasi-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px"> 
                                                    <tr>
                                                        <td class="bold"> <input type="checkbox" name="riwayat_imunisasi_1" id="riwayat-imunisasi-1"
                                                                value="1" class="mr-1 ml-2">Lengkap</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="riwayat_imunisasi_2" id="riwayat-imunisasi-2"
                                                                value="1" class="mr-1 ml-2">BCG                                                  
                                                            <input type="checkbox" name="riwayat_imunisasi_3" id="riwayat-imunisasi-3"
                                                                value="1" class="mr-1 ml-2">DPT 
                                                            <input type="checkbox" name="riwayat_imunisasi_4" id="riwayat-imunisasi-4"
                                                                value="1" class="mr-1 ml-2">Hepatitis B 
                                                            <input type="checkbox" name="riwayat_imunisasi_5" id="riwayat-imunisasi-5"
                                                                value="1" class="mr-1 ml-2">Polio
                                                            <input type="checkbox" name="riwayat_imunisasi_6" id="riwayat-imunisasi-6"
                                                                value="1" class="mr-1 ml-2">Campak
                                                            <input type="checkbox" name="riwayat_imunisasi_7" id="riwayat-imunisasi-7"
                                                                value="1" class="mr-1 ml-2">Tidak pernah
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"> <input type="checkbox" name="riwayat_imunisasi_8" id="riwayat-imunisasi-8"
                                                                value="1" class="mr-1 ml-2">Tidak Lengkap</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            Sebutkan yang belum <input type="text" name="riwayat_imunisasi_9" id="riwayat-imunisasi-9"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>                                                  
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
                                                            data-toggle="collapse" data-target="#data-riwayat-tumbuh-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT TUMBUH KEMBANG (Diisi pada pasien usia dibawah 3 tahun)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-tumbuh-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">                                                   
                                                    <tr>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_1" id="riwayat-tumbuh-1"
                                                                value="1" class="mr-1 ml-2">Asi Sampai Umur &nbsp;&nbsp;&nbsp;                                                                                                                
                                                            <input type="text" name="riwayat_tumbuh_2" id="riwayat-tumbuh-2"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >Bulan/Tahun                                                
                                                        </td>
                                                        <td></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_3" id="riwayat-tumbuh-3"
                                                                value="1" class="mr-1 ml-2">Bicara, Usia  &nbsp;&nbsp;&nbsp;                                                                                                               
                                                            <input type="text" name="riwayat_tumbuh_4" id="riwayat-tumbuh-4"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >Bulan                                               
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_5" id="riwayat-tumbuh-5"
                                                                value="1" class="mr-1 ml-2">Susu Formula Mulai &nbsp;&nbsp;&nbsp;                                                                                                                
                                                            <input type="text" name="riwayat_tumbuh_6" id="riwayat-tumbuh-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >Bulan/Tahun                                                
                                                        </td>
                                                        <td></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_7" id="riwayat-tumbuh-7"
                                                                value="1" class="mr-1 ml-2">Duduk, Usia  &nbsp;&nbsp;&nbsp;                                                                                                               
                                                            <input type="text" name="riwayat_tumbuh_8" id="riwayat-tumbuh-8"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >Bulan                                               
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_9" id="riwayat-tumbuh-9"
                                                                value="1" class="mr-1 ml-2">Tengkurap, Usia &nbsp;&nbsp;&nbsp;                                                                                                                
                                                            <input type="text" name="riwayat_tumbuh_10" id="riwayat-tumbuh-10"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>Bulan                                               
                                                        </td>
                                                        <td></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_11" id="riwayat-tumbuh-11"
                                                                value="1" class="mr-1 ml-2">Berdiri, Usia  &nbsp;&nbsp;&nbsp;                                                                                                               
                                                            <input type="text" name="riwayat_tumbuh_12" id="riwayat-tumbuh-12"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >Bulan                                               
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_13" id="riwayat-tumbuh-13"
                                                                value="1" class="mr-1 ml-2">Tumbuh Gigi, Usia &nbsp;&nbsp;&nbsp;                                                                                                                
                                                            <input type="text" name="riwayat_tumbuh_14" id="riwayat-tumbuh-14"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>Bulan                                               
                                                        </td>
                                                        <td></td>
                                                        <td> 
                                                            <input type="checkbox" name="riwayat_tumbuh_15" id="riwayat-tumbuh-15"
                                                                value="1" class="mr-1 ml-2">Berjalan, Usia  &nbsp;&nbsp;&nbsp;                                                                                                               
                                                            <input type="text" name="riwayat_tumbuh_16" id="riwayat-tumbuh-16"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>Bulan                                               
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
                                                            data-toggle="collapse" data-target="#data-komunikasi-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KEBUTUHAN KOMUNIKASI / PENDIDIKAN & EDUKASI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-komunikasi-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">                                                   
                                                    <tr>
                                                        <td class="bold">Bicara</td>
                                                        <td class="bold">:</td>
                                                        <td> 
                                                            <input type="checkbox" name="kebutuhan_komunikasi_1" id="kebutuhan-komunikasi-1"
                                                                value="1" class="mr-1 ml-2">Normal 
                                                            <input type="checkbox" name="kebutuhan_komunikasi_2" id="kebutuhan-komunikasi-2"
                                                                value="1" class="mr-1 ml-2">Gangguan Bicara, &nbsp;&nbsp;                                                                                                               
                                                            Jelaskan<input type="text" name="kebutuhan_komunikasi_3" id="kebutuhan-komunikasi-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="jelaskan" disabled>                                              
                                                        </td>                                                  
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Perlu Penterjemah</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="radio"name="kebutuhan_komunikasi_4"
                                                                id="kebutuhan-komunikasi-4" class=" mx-1" value="0">Tidak                                                  
                                                            <input type="radio"name="kebutuhan_komunikasi_4"
                                                                id="kebutuhan-komunikasi-5" class=" mx-1" value="1">Ya, &nbsp;&nbsp; 
                                                            Bahasa<input type="text" name="kebutuhan_komunikasi_6" id="kebutuhan-komunikasi-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="bahasa" disabled>                                                           
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Bahasa Isyarat</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="radio"name="kebutuhan_komunikasi_7"
                                                                id="kebutuhan-komunikasi-7" class=" mx-1" value="0">Tidak                                                  
                                                            <input type="radio"name="kebutuhan_komunikasi_7"
                                                                id="kebutuhan-komunikasi-8" class=" mx-1" value="1">Ya                                                                                                                  
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Hambatan Belajar</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="radio"name="kebutuhan_komunikasi_9"
                                                                id="kebutuhan-komunikasi-9" class=" mx-1" value="0">Tidak                                                  
                                                            <input type="radio"name="kebutuhan_komunikasi_9"
                                                                id="kebutuhan-komunikasi-10" class=" mx-1" value="1">Ya, &nbsp;&nbsp; 
                                                            <input type="text" name="kebutuhan_komunikasi_11" id="kebutuhan-komunikasi-11"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="......" disabled>                                                                                                                    
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td class="bold">Tingkat Pendidikan</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="kebutuhan_komunikasi_12" id="kebutuhan-komunikasi-12"
                                                                value="1" class="mr-1 ml-2">TK &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="kebutuhan_komunikasi_13" id="kebutuhan-komunikasi-13"
                                                                value="1" class="mr-1 ml-2">SD &nbsp;&nbsp; 
                                                            <input type="checkbox" name="kebutuhan_komunikasi_14" id="kebutuhan-komunikasi-14"
                                                                value="1" class="mr-1 ml-2">SMP&nbsp;&nbsp; 
                                                            <input type="checkbox" name="kebutuhan_komunikasi_15" id="kebutuhan-komunikasi-15"
                                                                value="1" class="mr-1 ml-2">Lain-lain,&nbsp;&nbsp; 
                                                            Sebutkan<input type="text" name="kebutuhan_komunikasi_16" id="kebutuhan-komunikasi-16"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>                                                                                                                    
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
                                                            data-toggle="collapse" data-target="#data-spiritual-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN SPIRITUAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-spiritual-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">                                                   
                                                    <tr>
                                                        <td class="bold">Kegiatan keagamaan yang biasa dilakukan </td>
                                                        <td class="bold">:</td>
                                                        <td>                                                                                                                                                                            
                                                            <input type="text" name="pengkajian_spiritual_1" id="pengkajian-spiritual-1"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="...........">                                              
                                                        </td>                                                  
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Kemampuan Beribadah (Khusus Muslim)</td>
                                                        <td class="bold">:</td>                                                                                                         
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Wajib Ibadah</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_spiritual_2" id="pengkajian-spiritual-2"
                                                                value="1" class="mr-1 ml-2">Baligh &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_spiritual_3" id="pengkajian-spiritual-3"
                                                                value="1" class="mr-1 ml-2">Belum Baligh&nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_spiritual_4" id="pengkajian-spiritual-4"
                                                                value="1" class="mr-1 ml-2">Halangan&nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_spiritual_5" id="pengkajian-spiritual-5"
                                                                value="1" class="mr-1 ml-2">Lain&nbsp;&nbsp; 
                                                            <input type="text" name="pengkajian_spiritual_6" id="pengkajian-spiritual-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan"disabled >                                                                                                                    
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Thaharoh</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_spiritual_7" id="pengkajian-spiritual-7"
                                                                value="1" class="mr-1 ml-2">Berwudhu &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_spiritual_8" id="pengkajian-spiritual-8"
                                                                value="1" class="mr-1 ml-2">Tayamum                                                                                                                                                                               
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Sholat</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_spiritual_9" id="pengkajian-spiritual-9"
                                                                value="1" class="mr-1 ml-2">Berdiri &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_spiritual_10" id="pengkajian-spiritual-10"
                                                                value="1" class="mr-1 ml-2">Duduk &nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_spiritual_11" id="pengkajian-spiritual-11"
                                                                value="1" class="mr-1 ml-2">Berbaring                                                                                                                                                                            
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
                                                            data-target="#data-skrining-gizi-anak"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING GIZI ANAK USIA 1 BULAN-18 TAHUN (STRONG-KIDS)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-skrining-gizi-anak">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="4"><b></b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="1%" class="center"><b>No.</b></th>
                                                            <th width="30%" class="center"><b>Pertanyaan</b></th>
                                                            <th width="10%" class="center"><b>Jawaban</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                           
                                                        <tr>
                                                            <td class="center">1.</td>
                                                            <td>Apakah pasien memiliki status nutrisi kurang atau buruk secara klinis ? (anak kurus/sangat kurus, mata cekung, wajah tampak "tua", edema, rambut tipis dan jarang, otot lengan dan paha tipis, iga gampang, perus kempes, bokong tipis dan kisut)</td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_gizi_1"id="skrining-gizi-1" value="0"
                                                                class="mr-1" onchange="calcscorepjds()">Tidak (0) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_gizi_1"id="skrining-gizi-2" value="1"
                                                                class="mr-1" onchange="calcscorepjds()">ya (1)
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2.</td>
                                                            <td>Apakah terdapat penurunan berat badan selama 1 bulan terakhir ? Atau Untuk bayi < 1 tahun berat badan tidak naik selama 3 bulan terakhir ? jika pasien menjawab tidak tahu, dianggap jawaban "ya" </td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_gizi_3"id="skrining-gizi-3" value="0"
                                                                class="mr-1" onchange="calcscorepjds()">Tidak (0) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_gizi_3"id="skrining-gizi-4" value="1"
                                                                class="mr-1" onchange="calcscorepjds()">ya (1)
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3.</td>
                                                            <td>Apakah terdapat SALAH SATU dari kondisi berikut ? 
                                                                <br> * Diare profuse (≥ 5x/hari) dan atau muntah (> 3x/hari)
                                                                <br> * Asupan makan berkurang selama 1 minggu terakhir </td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_gizi_5"id="skrining-gizi-5" value="0"
                                                                class="mr-1" onchange="calcscorepjds()">Tidak (0) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_gizi_5"id="skrining-gizi-6" value="1"
                                                                class="mr-1" onchange="calcscorepjds()">ya (1)
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4.</td>
                                                            <td>Apakah terdapat penyakit dasar atau keadaan yang mengakibatkan pasien berisiko mengalami malnutrisi (lihat tabel dibawah) </td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_gizi_7"id="skrining-gizi-7" value="0"
                                                                class="mr-1" onchange="calcscorepjds()">Tidak (0) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_gizi_7"id="skrining-gizi-8" value="2"
                                                                class="mr-1" onchange="calcscorepjds()">ya (2)
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">Total Skor</td>
                                                            <td class="center">
                                                            <input type="number" min="0"
                                                                    name="jumlah_skor_anak"
                                                                    id="jumlah-skor-anak"
                                                                    class="custom-form clear-input center"
                                                                    placeholder="Jumlah" value="0" readonly>
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td> Skor : 0 (beresiko rendah malnutrisi) 
                                                                <br> Skor 1-3 (beresiko sedang malnutrisi)
                                                                <br> Jika skor : 4 - 5 (beresiko tinggi malnutrisi), lapor ke Dokter pemeriksa dan disarankan untuk dirujuk ke Poliklinik Gizi</td>
                                                            <td></td>                                                                 
                                                        </tr>
                                                    </tbody>
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
                                                            data-target="#data-skrining-nyeri-anak"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING NYERI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" 
                                                id="data-skrining-nyeri-anak">
                                                <table class="table table-sm" 
                                                    style="margin-top: -15px">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="25%">A. Untuk Neonatus</th>
                                                                <th class="center" width="25%"></th>
                                                                <th class="center" width="25%"></th>
                                                                <th class="center" width="25%"></th>
                                                            </tr>
                                                            <tr>
                                                                <th class="center" width="25%">Nilai</th>
                                                                <th class="center" width="25%">0</th>
                                                                <th class="center" width="25%">1</th>
                                                                <th class="center" width="25%">2</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Menangis</td>
                                                                <td><input type="radio" name="menangist" id="menangist-0"
                                                                        value="0" class="mr-1 neonatust neot_0">Tidak Menangis
                                                                </td>
                                                                <td><input type="radio" name="menangist" id="menangist-1"
                                                                        value="1" class="mr-1 neonatust neot_1">Merintih</td>
                                                                <td><input type="radio" name="menangist" id="menangist-2"
                                                                        value="2" class="mr-1 neonatust neot_2">Menangis Terus
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPO<sub>2</sub> > 95%</td>
                                                                <td><input type="radio" name="spot" id="spot-0" value="0"
                                                                        class="mr-1 neonatust neot_3">Normal</td>
                                                                <td><input type="radio" name="spot" id="spot-1" value="1"
                                                                        class="mr-1 neonatust neot_4">F<sub>1</sub>O<sub>2</sub>
                                                                    < 30%</td>
                                                                <td><input type="radio" name="spot" id="spot-2" value="2"
                                                                        class="mr-1 neonatust neot_5">F<sub>1</sub>O<sub>2</sub>
                                                                    < 30%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Peningkatan Tanda-Tanda Vital</td>
                                                                <td><input type="radio" name="vitalt" id="vitalt-0" value="0"
                                                                        class="mr-1 neonatust neot_6">HR dan TD dalam batas
                                                                    normal</td>
                                                                <td><input type="radio" name="vitalt" id="vitalt-1" value="1"
                                                                        class="mr-1 neonatust neot_7">
                                                                    < 20%</td>
                                                                <td><input type="radio" name="vitalt" id="vitalt-2" value="2"
                                                                        class="mr-1 neonatust neot_8">> 20%
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ekspresi Wajah</td>
                                                                <td><input type="radio" name="wajaht" id="wajaht-0" value="0"
                                                                        class="mr-1 neonatust neot_9">Biasa</td>
                                                                <td><input type="radio" name="wajaht" id="wajaht-1" value="1"
                                                                        class="mr-1 neonatust neot_10">Meringis</td>
                                                                <td><input type="radio" name="wajaht" id="wajaht-2" value="2"
                                                                        class="mr-1 neonatust neot_11">Meringis / Mendengkur
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tidur</td>
                                                                <td><input type="radio" name="tidurt" id="tidurt-0" value="0"
                                                                        class="mr-1 neonatust neot_12">Normal</td>
                                                                <td><input type="radio" name="tidurt" id="tidurt-1" value="1"
                                                                        class="mr-1 neonatust neot_13">Sering Terbangun</td>
                                                                <td><input type="radio" name="tidurt" id="tidurt-2" value="2"
                                                                        class="mr-1 neonatust neot_14">Tidak Ada Tidur</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td colspan="3">
                                                                    <input type="text" name="total_neonatust"
                                                                        id="total-neonatust"
                                                                        class="custom-form col-md-1 center" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-no-border table-sm table-striped"
                                                        style="margin-top:15px">
                                                        <tr>
                                                            <td width="20%" class="bold">Keterangan</td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td width="69%">
                                                                <input type="radio" name="ptnt_keterangan_1"
                                                                    id="ptnt-keterangan-1" value="1"
                                                                    class="mr-1">Tidak Nyeri : 0
                                                                <input type="radio" name="ptnt_keterangan_1"
                                                                    id="ptnt-keterangan-2" value="2"
                                                                    class="mr-1 ml-2">Ringan : 1 - 2
                                                                <input type="radio" name="ptnt_keterangan_1"
                                                                    id="ptnt-keterangan-3" value="3"
                                                                    class="mr-1 ml-2">Sedang : 3 - 4
                                                                <input type="radio" name="ptnt_keterangan_1"
                                                                    id="ptnt-keterangan-4" value="4"
                                                                    class="mr-1 ml-2">Berat : > 4
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" class="bold"></td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td width="69%">
                                                                <input type="checkbox" name="sk_nyeri_1"
                                                                    id="sk-nyeri-1" value="1" class="mr-1">Tidak Ada Nyeri &nbsp; &nbsp; 
                                                                <input type="checkbox" name="sk_nyeri_2"
                                                                    id="sk-nyeri-2" value="1" class="mr-1">Nyeri Kronis &nbsp; &nbsp; 
                                                                <input type="checkbox" name="sk_nyeri_3"
                                                                    id="sk-nyeri-3" value="1" class="mr-1">Nyeri Akut &nbsp; &nbsp;                                                               
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" class="bold"></td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td width="69%">
                                                                Lokasi :<input type="text" name="sk_nyeri_4"
                                                                    id="sk-nyeri-4"class="custom-form clear-input d-inline-block col-lg-2 mx-1">                                                              
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" class="bold"></td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td width="69%">
                                                                Durasi :<input type="text" name="sk_nyeri_5"
                                                                    id="sk-nyeri-5"class="custom-form clear-input d-inline-block col-lg-2 mx-1">                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%" class="bold"></td>
                                                            <td width="1%" class="bold">:</td>
                                                            <td width="69%">
                                                                Frekuensi :<input type="text" name="sk_nyeri_6"
                                                                    id="sk-nyeri-6"class="custom-form clear-input d-inline-block col-lg-2 mx-1">                                                                
                                                            </td>
                                                        </tr>
                                                    </table>                                                                                                                            
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
                                                            data-target="#data-penilaian-tingkat-nyeri-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI</i>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"
                                                id="data-penilaian-tingkat-nyeri-anak">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="3" class="bold center">Penilaian Tingkat Nyeri</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><img
                                                                    src="<?= resource_url() ?>images/attributes/wewegombel.jpeg"
                                                                    alt="Pain Measurement Scale"
                                                                    class="img-fluid mx-auto d-block rounded shadow"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Keterangan</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    <input type="radio" name="keterangan_anak_1"
                                                                        id="keterangan-anak-1" value="1"
                                                                        class="mr-1">Ringan : 1 - 3
                                                                    <input type="radio" name="keterangan_anak_1"
                                                                        id="keterangan-anak-2" value="2"
                                                                        class="mr-1">Sedang : 4 - 6
                                                                    <input type="radio" name="keterangan_anak_1"
                                                                        id="keterangan-anak-3" value="3"
                                                                        class="mr-1">Berat : 7 - 10
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Nyeri Hilang, Bila</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="nyeri_hilang_anak_1"
                                                                        id="nyeri-hilang-anak-1" value="1"
                                                                        class="mr-1">Minum Obat
                                                                    <input type="checkbox" name="nyeri_hilang_anak_2"
                                                                        id="nyeri-hilang-anak-2" value="1"
                                                                        class="mr-1 ml-2">Mendengarkan Musik
                                                                    <input type="checkbox" name="nyeri_hilang_anak_3"
                                                                        id="nyeri-hilang-anak-3" value="1"
                                                                        class="mr-1 ml-2">Istirahat
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="checkbox" name="nyeri_hilang_anak_4"
                                                                        id="nyeri-hilang-anak-4" value="1"
                                                                        class="mr-1">Berubah
                                                                    Posisi / Tidur
                                                                    <input type="checkbox" name="nyeri_hilang_anak_5"
                                                                        id="nyeri-hilang-anak-5" value="1"
                                                                        class="mr-1 ml-2">Lain-lain
                                                                    <input type="text" name="nyeri_hilang_anak_6"
                                                                        id="nyeri-hilang-anak-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled"
                                                                        placeholder="Masukkan lain - lain" disabled>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                            <td colspan="3" class="bold center">Untuk Anak Usia < 3 tahun FLACC Behavioral Pain Assessment Scale</td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-sm table-striped table-bordered"
                                                            style="margin-top: -15px">
                                                            <thead>
                                                                <tr>
                                                                    <th width="60%" class="center"><b>WAJAH</b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                    <th width="20%" class="center"><b>Nilai</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                               
                                                                <tr>
                                                                    <td>Tidak ada ekspresi tertentu atau senyum</td>
                                                                    <td><input type="radio" name="wajah_anak_1"
                                                                            id="wajah-anak-1" value="1"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sesekali meringis / mengerutkan kening, menarik diri, tidak tertarik</td>
                                                                    <td><input type="radio" name="wajah_anak_1"
                                                                            id="wajah-anak-2" value="2"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sering sampai konstan mengerutkan kening, rahang terkatup, dagu gemetaran</td>
                                                                    <td><input type="radio" name="wajah_anak_1"
                                                                            id="wajah-anak-3" value="3"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">3</td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60%" class="center"><b>KAKI</b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Posisi kaki normal atau santai</td>
                                                                    <td><input type="radio" name="kaki_anak_1"
                                                                            id="kaki-anak-1" value="0"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cemas, gelisah, tegang</td>
                                                                    <td><input type="radio" name="kaki_anak_1"
                                                                            id="kaki-anak-2" value="1"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menendang atau menarik kaki</td>
                                                                    <td><input type="radio" name="kaki_anak_1"
                                                                            id="kaki-anak-3" value="2"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60%" class="center"><b>AKTIFITAS</b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Berbaring tenang, posisi normal, bergerak dengan mudah</td>
                                                                    <td><input type="radio" name="aktifitas_anak_1"
                                                                            id="aktifitas-anak-1" value="0"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menggeliat, mondar-mandir, tegang</td>
                                                                    <td><input type="radio" name="aktifitas_anak_1"
                                                                            id="aktifitas-anak-2" value="1"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Melengkung, kaku, menyentak</td>
                                                                    <td><input type="radio" name="aktifitas_anak_1"
                                                                            id="aktifitas-anak-3" value="2"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60%" class="center"><b>MENANGIS</b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tidak ada teriakan (terjaga / tidur)</td>
                                                                    <td><input type="radio" name="menangis_anak_1"
                                                                            id="menangis-anak-1" value="0"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mengerang, merintih sesekali mengeluh</td>
                                                                    <td><input type="radio" name="menangis_anak_1"
                                                                            id="menangis-anak-2" value="1"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menangis terus, teriak, sering mengeluh</td>
                                                                    <td><input type="radio" name="menangis_anak_1"
                                                                            id="menangis-anak-3" value="2"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="60%" class="center"><b>BICARA / SUARA</b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                    <th width="20%" class="center"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Puas, senang, santai</td>
                                                                    <td><input type="radio" name="bicara_anak_1"
                                                                            id="bicara-anak-1" value="0"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sesekali diyakinkan dengan sentuhan, pelukan, diajak berbicara atau dialihkan</td>
                                                                    <td><input type="radio" name="bicara_anak_1"
                                                                            id="bicara-anak-2" value="1"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sulit untuk dihibur atau di buat nyaman</td>
                                                                    <td><input type="radio" name="bicara_anak_1"
                                                                            id="bicara-anak-3" value="2"
                                                                            class="mr-1" onchange="calcscorepjdu()"></td>
                                                                    <td class="center">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="bold">TOTAL</td>
                                                                    <td class="center"><input type="number" min="0"
                                                                        name="jumlah_total_anak"
                                                                        id="jumlah-total-anak"
                                                                        class="custom-form clear-input center"
                                                                        placeholder="Jumlah" value="0" readonly></td>
                                                                </tr>
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
                                                            data-toggle="collapse"
                                                            data-target="#data-resiko-cidera-anak"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING RESIKO CEDERA / JATUH 
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-resiko-cidera-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td> a. Perhatikan cara berjalan pasien saat akan duduk di kursi, Apakah pasien tampak tidak seimbang (sempoyongan/limbung) ? &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_1"id="cidera-anak-1" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_1"id="cidera-anak-2" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk ?  &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_3"id="cidera-anak-3" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_3"id="cidera-anak-4" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Hasil : &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_5"id="cidera-anak-5" value="1"class="mr-1">Tidak Beresiko (tidak ditemukan a dan b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_5"id="cidera-anak-6" value="2"class="mr-1"> Resiko rendah (ditemukan a atau b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_anak_5"id="cidera-anak-7" value="3"class="mr-1"> Resiko tinggi ( ditemukan a dan b)
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
                                                            data-target="#data-status-fungsional-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS FUNGSIONAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-fungsional-anak">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_anak_1" id="status-fung-anak-1"
                                                                value="1" class="mr-1"> Mandiri
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_anak_2" id="status-fung-anak-2"
                                                                value="1" class="mr-1"> Perlu bantuan, &nbsp;&nbsp;&nbsp;
                                                                Sebutkan <input type="text" name="status_fung_anak_3" id="status-fung-anak-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="sebutkan" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_anak_4" id="status-fung-anak-4"
                                                                value="1" class="mr-1"> Ketergantungan total, &nbsp;&nbsp;&nbsp;
                                                                Dilaporkan ke dokter pukul <input type="text" name="status_fung_anak_5" id="status-fung-anak-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="....." disabled>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="2" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-masalah-keperawatan-anak"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan-anak">
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
                                                                        <td widtd="33%" class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                        <th width="33%"></th>                  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_1"
                                                                            id="masalah-kep-anak-1" value="1"class="mr-1">
                                                                            Kurang Pengetahuan 
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_2"
                                                                            id="masalah-kep-anak-2" value="1"class="mr-1">
                                                                            Gangguan mobilitas fisik
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_3"
                                                                            id="masalah-kep-anak-3" value="1"class="mr-1">
                                                                            Hipertermi
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_4"
                                                                            id="masalah-kep-anak-4" value="1"class="mr-1">
                                                                            Diare / Konstipasi
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_5"
                                                                            id="masalah-kep-anak-5" value="1"class="mr-1">
                                                                            Resiko Aspirasi
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_6"
                                                                            id="masalah-kep-anak-6" value="1"class="mr-1">
                                                                            Resiko  Trauma/ Resiko injuri
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_7"
                                                                            id="masalah-kep-anak-7" value="1"class="mr-1">
                                                                            Kelebihan Volume Cairan
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_8"
                                                                            id="masalah-kep-anak-8" value="1"class="mr-1">
                                                                            Resiko gangguan integritas kulit
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_9"
                                                                            id="masalah-kep-anak-9" value="1"class="mr-1">
                                                                            Resiko infeksi
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_10"
                                                                            id="masalah-kep-anak-10" value="1"class="mr-1">
                                                                            Gangguan pola tidur
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_11"
                                                                            id="masalah-kep-anak-11" value="1"class="mr-1">
                                                                            Kecemasan
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_12"
                                                                            id="masalah-kep-anak-12" value="1"class="mr-1">
                                                                            Retensi urin
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_13"
                                                                            id="masalah-kep-anak-13" value="1"class="mr-1">
                                                                            Takut
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_14"
                                                                            id="masalah-kep-anak-14" value="1"class="mr-1">
                                                                            Gangguan body image
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_15"
                                                                            id="masalah-kep-anak-15" value="1"class="mr-1">
                                                                            Nyeri Akut / Nyeri Kronis
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_16"
                                                                            id="masalah-kep-anak-16" value="1"class="mr-1">
                                                                            Kelelahan
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_17"
                                                                            id="masalah-kep-anak-17" value="1"class="mr-1">
                                                                            Mual
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_18"
                                                                            id="masalah-kep-anak-18" value="1"class="mr-1">
                                                                            Lain - lain 
                                                                            <input type="text" name="masalah_kep_anak_19" id="masalah-kep-anak-19"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="...."disabled> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_anak_20"
                                                                            id="masalah-kep-anak-20" value="1"class="mr-1">
                                                                            Ketidakseimbangan nutrisi kurang / lebih * dari kebutuhan tubuh
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </tr>
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="2" class="center td-dark"></td>
                                            </tr>
                                            <tr>
                                                <td class="center" width="50%">
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_perawat_anak"
                                                        id="tanggal-jam-perawat-anak"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        value="<?= date('d/m/Y H:i') ?>"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                                <td class="center" width="50%">
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_dokter_anak"
                                                        id="tanggal-jam-dokter-anak"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">Nama Perawat : <input type="text" name="perawat_anak" id="perawat-anak"
                                                        class="select2c-input ml-2"></td>
                                                <td class="center">Nama Dokter : <input type="text" name="dokter_anak" id="dokter-anak"
                                                        class="select2c-input ml-2"></td>
                                            </tr>
                                            <tr>
                                                <td class="center">
                                                    Tanda Tangan Perawat
                                                </td>
                                                <td class="center">
                                                    Verifikasi DPJP dan Tanda Tangan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_perawat_anak" id="ttd-perawat-anak"
                                                            value="1" class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_perawat_anak_verified') ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_dokter_anak"
                                                            id="ttd-dokter-anak" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_dokter_anak_verified') ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </table>                                     
                                </div>
                                <!-- PAKARJ-->
                                                  
                                <!-- end content -->
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriFormKeperawatanAnak()"><i
                        class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Keperawatan Anak Rajal -->

<?php $this->load->view('pengkajian_keperawatan_anak_form/js') ?>


