<!-- // PKRJ -->
<div class="modal fade" id="modal_pengkajian_kep_rajal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_kep_rajal">FORM PENGKAJIAN KEPERAWATAN RAWAT JALAN DEWASA</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang rawat jalan
                        )</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan_rajal class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pkrj">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pkrj">
                <input type="hidden" name="id_pasien" id="id-pasien-pkrj">
                <input type="hidden" name="id_pkrj" id="id-pkrj">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pkrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-pkrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-pkrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pkrj"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-pkrj"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal & Jam Kunjungan</td>
                                    <td wdith="70%">: <span id="tanggal-jam-pkrj"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-keperawatan-rajal">
                                <ol>
                                    <!-- <li>Pengkajian Keperawatan Rawat Jalan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li> -->
                                    <li hidden>Pengkajian Keperawatan Rawat Jalan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                </ol>
                                <div class="form-pengkajian-keperawatan-rawat-jalan">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-keperawatan-rajal"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-keperawatan-rajal"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-keluhan-utama-pkrj"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KELUHAN UTAMA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-keluhan-utama-pkrj">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <textarea name="keluhan_utama_pkrj" id="keluhan-utama-pkrj"rows="2" class="form-control clear-input"placeholder="Keluhan Utama"></textarea>
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
                                                            data-toggle="collapse" data-target="#data-riwayat-kesehatan-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KESEHATAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-kesehatan-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Riwayat Penyakit Keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="rpk_pkrj_1" id="rpk-pkrj-1"
                                                                value="1" class="mr-1">Asma                                                       
                                                            <input type="checkbox" name="rpk_pkrj_2" id="rpk-pkrj-2"
                                                                value="1" class="mr-1 ml-2">Hipertensi                                                      
                                                            <input type="checkbox" name="rpk_pkrj_3" id="rpk-pkrj-3"
                                                                value="1" class="mr-1 ml-2">Jantung                                                       
                                                            <input type="checkbox" name="rpk_pkrj_4" id="rpk-pkrj-4"
                                                                value="1" class="mr-1 ml-2">Diabetes                                                       
                                                            <input type="checkbox" name="rpk_pkrj_5" id="rpk-pkrj-5"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="rpk_pkrj_6" id="rpk-pkrj-6"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain"disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Kebiasaan :</td>
                                                        <td class="bold"></td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Merokok</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_7"
                                                                id="rpk-pkrj-7" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rpk_pkrj_7"
                                                                id="rpk-pkrj-8" class=" mx-1" value="1"> Ya, 
                                                            <input type="text" name="rpk_pkrj_9"
                                                                id="rpk-pkrj-9"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled>Batang/hari
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Alkohol</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_10"
                                                                id="rpk-pkrj-10" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rpk_pkrj_10"
                                                                id="rpk-pkrj-11" class=" mx-1" value="1"> Ya, 
                                                            <input type="text" name="rpk_pkrj_12"
                                                                id="rpk-pkrj-12"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled >gelas/hari
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Obat tidur/Narkoba</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_13"
                                                                id="rpk-pkrj-13" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rpk_pkrj_13"
                                                                id="rpk-pkrj-14" class=" mx-1" value="1"> Ya, 
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Olahraga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_15"
                                                                id="rpk-pkrj-15" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rpk_pkrj_15"
                                                                id="rpk-pkrj-16" class=" mx-1" value="1"> Ya, 
                                                        </td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td class="bold">Riwayat Operasi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_17"
                                                                id="rpk-pkrj-17" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rpk_pkrj_17"
                                                                id="rpk-pkrj-18" class=" mx-1" value="1"> Ya
                                                           Kapan <input type="text" name="rpk_pkrj_19"
                                                                id="rpk-pkrj-19"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>                                                       
                                                           Dimana <input type="text" name="rpk_pkrj_20"
                                                                id="rpk-pkrj-20"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Alergi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rpk_pkrj_21"
                                                                id="rpk-pkrj-21" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rpk_pkrj_21"
                                                                id="rpk-pkrj-22" class=" mx-1" value="1"> Tidak tahu
                                                            <input type="radio"name="rpk_pkrj_21"
                                                                id="rpk-pkrj-23" class=" mx-1" value="2"> Ya,
                                                           Sebutkan <input type="text" name="rpk_pkrj_24"
                                                                id="rpk-pkrj-24"
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
                                                            data-toggle="collapse" data-target="#data-riwayat-pesikososial-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT PSIKOSOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-pesikososial-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Hubungan Pasien dan Keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_pkrj_1"
                                                                id="riwayat-pkrj-1" class=" mx-1" value="1"> Baik                                                   
                                                            <input type="radio"name="riwayat_pkrj_1"
                                                                id="riwayat-pkrj-2" class=" mx-1" value="0"> Tidak Baik                                                      
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Status Psikologis</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_pkrj_3" id="riwayat-pkrj-3"
                                                                value="1" class="mr-1">Tenang                                                       
                                                            <input type="checkbox" name="riwayat_pkrj_4" id="riwayat-pkrj-4"
                                                                value="1" class="mr-1 ml-2">Cemas                                                      
                                                            <input type="checkbox" name="riwayat_pkrj_5" id="riwayat-pkrj-5"
                                                                value="1" class="mr-1 ml-2">Takut                                                       
                                                            <input type="checkbox" name="riwayat_pkrj_6" id="riwayat-pkrj-6"
                                                                value="1" class="mr-1 ml-2">Marah 
                                                            <input type="checkbox" name="riwayat_pkrj_7" id="riwayat-pkrj-7"
                                                                value="1" class="mr-1 ml-2">Sedih                                                      
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_pkrj_8" id="riwayat-pkrj-8"
                                                                value="1" class="mr-1">Kecenderungan bunuh diri dilaporkan   &nbsp; &nbsp; &nbsp;                                                     
                                                            Ke <input type="text" name="riwayat_pkrj_9" id="riwayat-pkrj-9"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="........." disabled>   
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>                                                                                                       
                                                            <input type="checkbox" name="riwayat_pkrj_10" id="riwayat-pkrj-10"
                                                                value="1" class="mr-1">Lain-lain,  &nbsp; &nbsp; &nbsp;                                                   
                                                            Sebutkan <input type="text" name="riwayat_pkrj_11" id="riwayat-pkrj-11"
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
                                                            data-toggle="collapse" data-target="#data-status-ekonomi-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS EKONOMI DAN SOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-ekonomi-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Pekerjaan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-1" class=" mx-1" value="1"> Wiraswasta                                                
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-2" class=" mx-1" value="2"> Pegawai swasta 
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-3" class=" mx-1" value="3"> PNS 
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-4" class=" mx-1" value="4"> Pensiunan 
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-5" class=" mx-1" value="5"> Tidak bekerja 
                                                            <input type="radio"name="status_pkrj_1"
                                                                id="status-pkrj-6" class=" mx-1" value="6"> Lain - lain
                                                            <input type="text" name="status_pkrj_7"
                                                                id="status-pkrj-7"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Cara Pembayaran</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="status_pkrj_8"
                                                                id="status-pkrj-8" class=" mx-1" value="1"> Biaya Sendiri                                                   
                                                            <input type="radio"name="status_pkrj_8"
                                                                id="status-pkrj-9" class=" mx-1" value="2"> BPJS 
                                                            <input type="radio"name="status_pkrj_8"
                                                                id="status-pkrj-10" class=" mx-1" value="3"> Asuransi 
                                                            <input type="text" name="status_pkrj_11"
                                                                id="status-pkrj-11"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="status_pkrj_12" id="status-pkrj-12"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="status_pkrj_13" id="status-pkrj-13"
                                                                class="custom-form clear-input d-inline-block col-lg-7 mx-1"
                                                                placeholder="lain-lain" disabled>
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
                                                            data-toggle="collapse" data-target="#data-pemeriksaan-fisik-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"id="data-pemeriksaan-fisik-rajal">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Nadi</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_pkrj_1" id="pemeriksaan-pkrj-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="nadi"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Pernafasan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_pkrj_2" id="pemeriksaan-pkrj-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="pernafasan"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Suhu</td>
                                                                <td class="bold">:</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_pkrj_3" id="pemeriksaan-pkrj-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="suhu"> &#8451;
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Tinggi Badan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_pkrj_4" id="pemeriksaan-pkrj-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="Tb"> Cm
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Berat badan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_pkrj_5" id="pemeriksaan-pkrj-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="kg"> Kg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Tekanan Darah : <input type="text" name="pemeriksaan_pkrj_6" id="pemeriksaan-pkrj-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="sintolik"></td>
                                                                <td>/</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_pkrj_7" id="pemeriksaan-pkrj-7"
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
                                                            data-toggle="collapse" data-target="#data-spiritual-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN SPIRITUAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-spiritual-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">                                                   
                                                    <tr>
                                                        <td class="bold">Kegiatan keagamaan yang biasa dilakukan </td>
                                                        <td class="bold">:</td>
                                                        <td>                                                                                                                                                                            
                                                            <input type="text" name="pengkajian_pkrj_1" id="pengkajian-pkrj-1"
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
                                                            <input type="checkbox" name="pengkajian_pkrj_2" id="pengkajian-pkrj-2"
                                                                value="1" class="mr-1 ml-2">Baligh &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_pkrj_3" id="pengkajian-pkrj-3"
                                                                value="1" class="mr-1 ml-2">Belum Baligh&nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_pkrj_4" id="pengkajian-pkrj-4"
                                                                value="1" class="mr-1 ml-2">Halangan Lain&nbsp;&nbsp; 
                                                            <!-- <input type="checkbox" name="pengkajian_pkrj_5" id="pengkajian-pkrj-5"
                                                                value="1" class="mr-1 ml-2">Lain&nbsp;&nbsp;  -->
                                                            <input type="text" name="pengkajian_pkrj_6" id="pengkajian-pkrj-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>                                                                                                                    
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Thaharoh</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_pkrj_7" id="pengkajian-pkrj-7"
                                                                value="1" class="mr-1 ml-2">Berwudhu &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_pkrj_8" id="pengkajian-pkrj-8"
                                                                value="1" class="mr-1 ml-2">Tayamum                                                                                                                                                                               
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Sholat</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_pkrj_9" id="pengkajian-pkrj-9"
                                                                value="1" class="mr-1 ml-2">Berdiri &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_pkrj_10" id="pengkajian-pkrj-10"
                                                                value="1" class="mr-1 ml-2">Duduk &nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_pkrj_11" id="pengkajian-pkrj-11"
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
                                                            data-target="#data-status-fungsional-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS FUNGSIONAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-fungsional-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_pkrj_1" id="status-fung-pkrj-1"
                                                                value="1" class="mr-1"> Mandiri
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_pkrj_2" id="status-fung-pkrj-2"
                                                                value="1" class="mr-1"> Perlu bantuan, &nbsp;&nbsp;&nbsp;
                                                                Sebutkan <input type="text" name="status_fung_pkrj_3" id="status-fung-pkrj-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="sebutkan"disabled >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_pkrj_4" id="status-fung-pkrj-4"
                                                                value="1" class="mr-1"> Ketergantungan total, &nbsp;&nbsp;&nbsp;
                                                                Dilaporkan ke dokter pukul <input type="text" name="status_fung_pkrj_5" id="status-fung-pkrj-5"
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
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#data-resiko-cidera-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>SKRINING RESIKO CEDERA / JATUH 
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-resiko-cidera-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td> a. Perhatikan cara berjalan pasien saat akan duduk di kursi, Apakah pasien tampak tidak seimbang (sempoyongan/limbung) ? &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_1"id="cidera-pkrj-1" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_1"id="cidera-pkrj-2" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk ?  &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_3"id="cidera-pkrj-3" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_3"id="cidera-pkrj-4" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Hasil : &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_5"id="cidera-pkrj-5" value="1"class="mr-1">Tidak Beresiko (tidak ditemukan a dan b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_5"id="cidera-pkrj-6" value="2"class="mr-1"> Resiko rendah (ditemukan a atau b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_pkrj_5"id="cidera-pkrj-7" value="3"class="mr-1"> Resiko tinggi ( ditemukan a dan b)
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
                                                            data-target="#data-skrining-nutrisi-rajal"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING NUTRISI
                                                        <i>(Malnutrition Screening Tool Modifikasi/MTS Modifikasi)</i>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-skrining-nutrisi-rajal">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="center bold">Indikator Penilaian Nutrisi</td>
                                                        <td class="center bold">Penilaian</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="bold">Apakah pasien mengalami penurunan berat
                                                            badan yang tidak direncanakan / tidak disengaja dalam 6 bulan
                                                            terakhir</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="90%"><input type="radio" name="sn_penurunan_bb_pkrj" id="sn-pkrj-tidak"
                                                                class="mr-1" value="1" onchange="calcscorerjl()">Tidak</td>
                                                        <td>Skor 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_penurunan_bb_pkrj" id="sn-pkrj-tidak-yakin"
                                                                class="mr-1" value="2" onchange="calcscorerjl()">Tidak Yakin</td>
                                                        <td>Skor 2</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_penurunan_bb_pkrj" id="sn-pkrj-ya" class="mr-1"
                                                                value="3" onchange="calcscorerjl()">Ya, ada penurunan BB sebanyak
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_pkrj">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_pkrj" id="sn-pkrj-pbb-1-1" class="mr-1" value="1"
                                                                onchange="calcscorerjl()">1 - 5 Kg</td>
                                                        <td>Skor 1</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_pkrj">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_pkrj" id="sn-pkrj-pbb-2-2" class="mr-1" value="2"
                                                                onchange="calcscorerjl()">6 - 10 Kg</td>
                                                        <td>Skor 2</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_pkrj">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_pkrj" id="sn-pkrj-pbb-3-3" class="mr-1" value="3"
                                                                onchange="calcscorerjl()">11 - 15 Kg</td>
                                                        <td>Skor 3</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_pkrj">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_pkrj" id="sn-pkrj-pbb-4-4" class="mr-1" value="4"
                                                                onchange="calcscorerjl()">> 15 Kg</td>
                                                        <td>Skor 4</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_pkrj">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_pkrj" id="sn-pkrj-pbb-5-5" class="mr-1" value="5"
                                                                onchange="calcscorerjl()">Tidak tahu berapa Kg penurunannya</td>
                                                        <td>Skor 2</td>
                                                    </tr>
                                                    <tr style="border-bottom: 1px solid black;">
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="bold">Apakah asupan makan pasien berkurang karena
                                                            penurunan nafsu makan (atau karena kesulitan menerima makanan) ?
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_asupan_makan_pkrj"
                                                                id="sn-pkrj-asupan-makan-tidak" class="mr-1" value="0"
                                                                onchange="calcscorerjl()">Tidak</td>
                                                        <td>Skor 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_asupan_makan_pkrj" id="sn-pkrj-asupan-makan-ya"
                                                                class="mr-1" value="1" onchange="calcscorerjl()">Ya</td>
                                                        <td>Skor 1</td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                                                        <td><b>Total Skor Skrining MST (Malnutrition Screening Tool)</b></td>
                                                        <td><input type="number" name="sn_total_pkrj" id="sn-pkrj-total"
                                                                class="custom-form" value="0" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang, dilaporkan ke dokter untuk konfirmasi dietisin</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu, dilaporkan kedokter untuk konfirmasi dietisin</td>
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
                                                            data-target="#data-penilaian-tingkat-nyeri-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI</i>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"
                                                id="data-penilaian-tingkat-nyeri-rajal">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"
                                                            style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="3" class="bold center">Penilaian Tingkat Nyeri</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><img
                                                                    src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png"
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
                                                                    <input type="radio" name="keterangan_pkrj_1"
                                                                        id="keterangan-pkrj-1" value="1"
                                                                        class="mr-1">Tidak Nyeri : 0
                                                                    <input type="radio" name="keterangan_pkrj_1"
                                                                        id="keterangan-pkrj-2" value="2"
                                                                        class="mr-1 ml-3">Ringan : 1 - 3
                                                                    <input type="radio" name="keterangan_pkrj_1"
                                                                        id="keterangan-pkrj-3" value="3"
                                                                        class="mr-1 ml-3">Sedang : 4 - 6
                                                                    <input type="radio" name="keterangan_pkrj_1"
                                                                        id="keterangan-pkrj-4" value="4"
                                                                        class="mr-1 ml-3">Berat : 7 - 10
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    <input type="checkbox" name="keterangan_pkrj_5"
                                                                        id="keterangan-pkrj-5" value="1" class="mr-1">Tidak Ada Nyeri 
                                                                    <input type="checkbox" name="keterangan_pkrj_6"
                                                                        id="keterangan-pkrj-6" value="1" class="mr-1 ml-3">Nyeri Kronis 
                                                                    <input type="checkbox" name="keterangan_pkrj_7"
                                                                        id="keterangan-pkrj-7" value="1" class="mr-1 ml-3">Nyeri Akut                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Skala nyeri :<input type="text" name="keterangan_pkrj_8"
                                                                        id="keterangan-pkrj-8"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Lokasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="keterangan_pkrj_9"
                                                                        id="keterangan-pkrj-9"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Durasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="keterangan_pkrj_10"
                                                                        id="keterangan-pkrj-10"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Frekuensi :<input type="text" name="keterangan_pkrj_11"
                                                                        id="keterangan-pkrj-11"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Nyeri Hilang, Bila</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="keterangan_pkrj_12"
                                                                        id="keterangan-pkrj-12" value="1"
                                                                        class="mr-1">Minum Obat
                                                                    <input type="checkbox" name="keterangan_pkrj_13"
                                                                        id="keterangan-pkrj-13" value="1"
                                                                        class="mr-1 ml-2">Mendengarkan Musik
                                                                    <input type="checkbox" name="keterangan_pkrj_14"
                                                                        id="keterangan-pkrj-14" value="1"
                                                                        class="mr-1 ml-2">Istirahat
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="checkbox" name="keterangan_pkrj_15"
                                                                        id="keterangan-pkrj-15" value="1"
                                                                        class="mr-1">Berubah
                                                                    Posisi / Tidur
                                                                    <input type="checkbox" name="keterangan_pkrj_16"
                                                                        id="keterangan-pkrj-16" value="1"
                                                                        class="mr-1 ml-2">Lain-lain,&nbsp;&nbsp; Sebutkan : 
                                                                    <input type="text" name="keterangan_pkrj_17"
                                                                        id="keterangan-pkrj-17"
                                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2"
                                                                        placeholder="Masukkan lain - lain" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Diberitahukan ke dokter</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="radio" name="keterangan_pkrj_18"
                                                                        id="keterangan-pkrj-18" value="0"
                                                                        class="mr-1">Tidak 
                                                                    <input type="radio" name="keterangan_pkrj_18"
                                                                        id="keterangan-pkrj-19" value="1"
                                                                        class="mr-1 ml-3">Ya, &nbsp;&nbsp;Pukul
                                                                    <input type="text" name="keterangan_pkrj_20" id="keterangan-pkrj-20"
                                                                        class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                        placeholder="jam" disabled>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="2" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-masalah-keperawatan-rajal"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan-rajal">
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
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_1"
                                                                            id="masalah-kep-pkrj-1" value="1"class="mr-1">
                                                                            Bersihan jalan nafas tidak efektif 
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_2"
                                                                            id="masalah-kep-pkrj-2" value="1"class="mr-1">
                                                                            Gangguan Eliminasi urin
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_3"
                                                                            id="masalah-kep-pkrj-3" value="1"class="mr-1">
                                                                            Ketegangan Peran pemberi asuhan
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_4"
                                                                            id="masalah-kep-pkrj-4" value="1"class="mr-1">
                                                                            Pola nafas tidak efektif
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_5"
                                                                            id="masalah-kep-pkrj-5" value="1"class="mr-1">
                                                                            Diare
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_6"
                                                                            id="masalah-kep-pkrj-6" value="1"class="mr-1">
                                                                            Resiko gangguan integritas kulit / jaringan
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_7"
                                                                            id="masalah-kep-pkrj-7" value="1"class="mr-1">
                                                                            Gangguan pertukaran gas
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_8"
                                                                            id="masalah-kep-pkrj-8" value="1"class="mr-1">
                                                                            Intoleransi aktivitas
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_9"
                                                                            id="masalah-kep-pkrj-9" value="1"class="mr-1">
                                                                            Gangguan Interaksi Sosial
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_10"
                                                                            id="masalah-kep-pkrj-10" value="1"class="mr-1">
                                                                            Penurunan curah jantung
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_11"
                                                                            id="masalah-kep-pkrj-11" value="1"class="mr-1">
                                                                            Gangguan Mobilitas Fisik
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_12"
                                                                            id="masalah-kep-pkrj-12" value="1"class="mr-1">
                                                                            Resiko Cedera
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_13"
                                                                            id="masalah-kep-pkrj-13" value="1"class="mr-1">
                                                                            Perfusi perifer tidak efektif
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_14"
                                                                            id="masalah-kep-pkrj-14" value="1"class="mr-1">
                                                                            Nyeri Akut
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_15"
                                                                            id="masalah-kep-pkrj-15" value="1"class="mr-1">
                                                                            Resiko Aspirasi
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_16"
                                                                            id="masalah-kep-pkrj-16" value="1"class="mr-1">
                                                                            Nausea
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_17"
                                                                            id="masalah-kep-pkrj-17" value="1"class="mr-1">
                                                                            Nyeri Kronis
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_18"
                                                                            id="masalah-kep-pkrj-18" value="1"class="mr-1">
                                                                            Resiko Perdarahan
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_19"
                                                                            id="masalah-kep-pkrj-19" value="1"class="mr-1">
                                                                            Defisit Nutrisi
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_20"
                                                                            id="masalah-kep-pkrj-20" value="1"class="mr-1">
                                                                            Nyeri Melahirkan
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_21"
                                                                            id="masalah-kep-pkrj-21" value="1"class="mr-1">
                                                                            Resiko Syok
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_22"
                                                                            id="masalah-kep-pkrj-22" value="1"class="mr-1">
                                                                            Hipervolemia
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_23"
                                                                            id="masalah-kep-pkrj-23" value="1"class="mr-1">
                                                                            Hipertermia
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_24"
                                                                            id="masalah-kep-pkrj-24" value="1"class="mr-1">
                                                                            Resiko Jatuh
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_25"
                                                                            id="masalah-kep-pkrj-25" value="1"class="mr-1">
                                                                            Hipovolemia
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_26"
                                                                            id="masalah-kep-pkrj-26" value="1"class="mr-1">
                                                                            Ansietas
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_27"
                                                                            id="masalah-kep-pkrj-27" value="1"class="mr-1">
                                                                            Lain - lain 
                                                                            <input type="text" name="masalah_kep_pkrj_28" id="masalah-kep-pkrj-28"
                                                                                class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="............" disabled> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_29"
                                                                            id="masalah-kep-pkrj-29" value="1"class="mr-1">
                                                                            Ketidakstabilan kadar glukosa darah
                                                                        </td>
                                                                        <td><input type="checkbox" name="masalah_kep_pkrj_30"
                                                                            id="masalah-kep-pkrj-30" value="1"class="mr-1">
                                                                            Berduka
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
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_perawat_pkrj"
                                                        id="tanggal-jam-perawat-pkrj"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        value="<?= date('d/m/Y H:i') ?>"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                                <td class="center" width="50%">
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_dokter_pkrj"
                                                        id="tanggal-jam-dokter-pkrj"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">Nama Perawat : <input type="text" name="perawat_pkrj" id="perawat-pkrj"
                                                        class="select2c-input ml-2"></td>
                                                <td class="center">Nama Dokter : <input type="text" name="dokter_pkrj" id="dokter-pkrj"
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
                                                        <input type="checkbox" name="ttd_perawat_pkrj" id="ttd-perawat-pkrj"
                                                            value="1" class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_perawat_pkrj_verified') ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_dokter_pkrj"
                                                            id="ttd-dokter-pkrj" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_dokter_pkrj_verified') ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
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
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriFormKeperawatanRajal()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Pengkajian Keperawatan Rajal -->


