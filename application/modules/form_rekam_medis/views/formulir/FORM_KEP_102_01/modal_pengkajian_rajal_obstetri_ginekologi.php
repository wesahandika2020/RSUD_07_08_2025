<!-- // PRJODG -->
<div class="modal fade" id="modal_pengkajian_rajal_obstetri_ginekologi" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_rajal_obstetri_ginekologi">FORM PENGKAJIAN RAWAT JALAN OBSTETRI DAN GINEKOLOGI</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang rawat jalan
                        )</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_pengkajian_rajal_obstetri_ginekologi class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-prjogd">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-prjogd">
                <input type="hidden" name="id_pasien" id="id-pasien-prjogd">
                <input type="hidden" name="id_prjogd" id="id-prjogd">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-prjogd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-prjogd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-prjogd"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-prjogd"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-prjogd"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal & Jam Kunjungan</td>
                                    <td wdith="70%">: <span id="tanggal-jam-prjogd"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-rajal-obstetri-ginekologi">
                                <ol>
                                    <!-- <li>Pengkajian Rawat Jalan Obstetri dan Ginekologi <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li> -->
                                    <li hidden>Pengkajian Rawat Jalan Obstetri dan Ginekologi <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                </ol>
                                <div class="form-pengkajian-rajal-obstetri-ginekologi">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-pengkajian-obstetri"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-pengkajian-obstetri"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td width="20%" class="bold"></td>
                                            <td wdith="1%" class="bold"></td>
                                            <td width="79%" class="bold"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Informasi Diperoleh Dari</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="informasi_pasien_prjogd_1" id="informasi-pasien-prjogd-1"value="1" class="mr-1">Pasien
                                                <input type="radio" name="informasi_pasien_prjogd_1" id="informasi-pasien-prjogd-2"value="2" class="mr-1 ml-2">Keluarga
                                                <input type="radio" name="informasi_pasien_prjogd_1" id="informasi-pasien-prjogd-3" value="3" class="mr-1 ml-2">lain - lain, sebutkan
                                                <input type="text" name="informasi_pasien_prjogd_4" id="informasi-pasien-prjogd-4"class="custom-form clear-input d-inline-block col-lg-4"
                                                    placeholder="Sebutkan" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Rujukan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="rujukan_prjogd_1" id="rujukan-prjogd-1"value="0" class="mr-1">Tidak
                                                <input type="radio" name="rujukan_prjogd_1" id="rujukan-prjogd-2"value="1" class="mr-1 ml-2">Ya, Sebutkan
                                                <input type="text" name="rujukan_prjogd_3" id="rujukan-prjogd-3"class="custom-form clear-input d-inline-block col-lg-4"
                                                    placeholder="Sebutkan" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Diagnosa Rujukan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="diagnosa_rujukan_prjogd" id="diagnosa-rujukan-prjogd"class="custom-form clear-input d-inline-block col-lg-4"
                                                    placeholder="Sebutkan">
                                            </td>
                                        </tr>
                                        <p></p>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-keluhan-utama-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>KELUHAN UTAMA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-keluhan-utama-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <textarea name="keluhan_utama_prjogd" id="keluhan-utama-prjogd"rows="2" class="form-control clear-input"placeholder="Keluhan Utama"></textarea>
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
                                                            data-toggle="collapse" data-target="#data-riwayat-kesehatan-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KESEHATAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-kesehatan-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Riwayat Penyakit Lalu</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_1" id="rk-prjogd-1"
                                                                value="1" class="mr-1">Asma                                                       
                                                            <input type="checkbox" name="rk_prjogd_2" id="rk-prjogd-2"
                                                                value="1" class="mr-1 ml-2">Hipertensi                                                      
                                                            <input type="checkbox" name="rk_prjogd_3" id="rk-prjogd-3"
                                                                value="1" class="mr-1 ml-2">Jantung                                                       
                                                            <input type="checkbox" name="rk_prjogd_4" id="rk-prjogd-4"
                                                                value="1" class="mr-1 ml-2">Diabetes                                                       
                                                            <input type="checkbox" name="rk_prjogd_5" id="rk-prjogd-5"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="rk_prjogd_6" id="rk-prjogd-6"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Kebiasaan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_7" id="rk-prjogd-7"
                                                                value="1" class="mr-1"> Merokok  
                                                            <input type="radio"name="rk_prjogd_8"
                                                                id="rk-prjogd-8" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rk_prjogd_8"
                                                                id="rk-prjogd-9" class=" mx-1" value="1"> Ya, 
                                                            <input type="text" name="rk_prjogd_10"
                                                                id="rk-prjogd-10"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled>Batang/hari
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_11" id="rk-prjogd-11"
                                                                value="1" class="mr-1"> Alkohol  
                                                            <input type="radio"name="rk_prjogd_12"
                                                                id="rk-prjogd-12" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rk_prjogd_12"
                                                                id="rk-prjogd-13" class=" mx-1" value="1"> Ya, 
                                                            <input type="text" name="rk_prjogd_14"
                                                                id="rk-prjogd-14"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan"disabled>Gelas/hari
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_15" id="rk-prjogd-15"
                                                                value="1" class="mr-1">Obat tidur/Narkoba  
                                                            <input type="radio"name="rk_prjogd_16"
                                                                id="rk-prjogd-16" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rk_prjogd_16"
                                                                id="rk-prjogd-17" class=" mx-1" value="1"> Ya                                                           
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_18" id="rk-prjogd-18"
                                                                value="1" class="mr-1">Olahraga 
                                                            <input type="radio"name="rk_prjogd_19"
                                                                id="rk-prjogd-19" class=" mx-1" value="0"> Tidak                                                   
                                                            <input type="radio"name="rk_prjogd_19"
                                                                id="rk-prjogd-20" class=" mx-1" value="1"> Ya                                                           
                                                        </td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td class="bold">Riwayat Operasi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rk_prjogd_21"
                                                                id="rk-prjogd-21" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rk_prjogd_21"
                                                                id="rk-prjogd-22" class=" mx-1" value="1"> Ya
                                                           Kapan <input type="text" name="rk_prjogd_23"
                                                                id="rk-prjogd-23"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>  
                                                            Dimana <input type="text" name="rk_prjogd_24"
                                                                id="rk-prjogd-24"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Masih dalam pengobatan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rk_prjogd_25"
                                                                id="rk-prjogd-25" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rk_prjogd_25"
                                                                id="rk-prjogd-26" class=" mx-1" value="1"> Ya,
                                                           Obat <input type="text" name="rk_prjogd_27"
                                                                id="rk-prjogd-27"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Alergi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rk_prjogd_28"
                                                                id="rk-prjogd-28" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rk_prjogd_28"
                                                                id="rk-prjogd-29" class=" mx-1" value="1"> Tidak tahu
                                                            <input type="radio"name="rk_prjogd_28"
                                                                id="rk-prjogd-30" class=" mx-1" value="2"> Ya,
                                                           Sebutkan <input type="text" name="rk_prjogd_31"
                                                                id="rk-prjogd-31"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled> 
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Riwayat Penyakit Keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="rk_prjogd_32" id="rk-prjogd-32"
                                                                value="1" class="mr-1">Asma                                                       
                                                            <input type="checkbox" name="rk_prjogd_33" id="rk-prjogd-33"
                                                                value="1" class="mr-1 ml-2">Hipertensi                                                      
                                                            <input type="checkbox" name="rk_prjogd_34" id="rk-prjogd-34"
                                                                value="1" class="mr-1 ml-2">Jantung                                                       
                                                            <input type="checkbox" name="rk_prjogd_35" id="rk-prjogd-35"
                                                                value="1" class="mr-1 ml-2">Diabetes                                                       
                                                            <input type="checkbox" name="rk_prjogd_36" id="rk-prjogd-36"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="rk_prjogd_37" id="rk-prjogd-37"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="lain-lain"disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Riwayat Pemakaian Alat Kontrasepsi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rk_prjogd_38"
                                                                id="rk-prjogd-38" class=" mx-1" value="0"> Tidak
                                                            <input type="radio"name="rk_prjogd_38"
                                                                id="rk-prjogd-39" class=" mx-1" value="1"> Ya,
                                                           sebutkan <input type="text" name="rk_prjogd_40"
                                                                id="rk-prjogd-40"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>  
                                                        </td>
                                                    </tr>                                                  
                                                    <tr>
                                                        <td class="bold">Status Pernikahan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="rk_prjogd_41"
                                                                id="rk-prjogd-41" class=" mx-1" value="0">Single
                                                            <input type="radio"name="rk_prjogd_41"
                                                                id="rk-prjogd-42" class=" mx-1" value="1">Menikah,
                                                           <input type="text" name="rk_prjogd_43"
                                                                id="rk-prjogd-43"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" >kali  
                                                            <input type="radio"name="rk_prjogd_41"
                                                                id="rk-prjogd-44" class=" mx-1" value="2"> Bercerai
                                                            <input type="radio"name="rk_prjogd_41"
                                                                id="rk-prjogd-45" class=" mx-1" value="3"> Janda
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Riwayat Menstruasi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                        Menarche Umur :<input type="text" name="rk_prjogd_46"id="rk-prjogd-46"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" >tahun &nbsp;&nbsp;&nbsp; 
                                                        Siklus :<input type="text" name="rk_prjogd_47"id="rk-prjogd-47"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" >hari &nbsp;&nbsp;&nbsp; 
                                                                <input type="checkbox" name="rk_prjogd_48" id="rk-prjogd-48"
                                                                value="1" class="mr-1">Teratur  
                                                                <input type="checkbox" name="rk_prjogd_49" id="rk-prjogd-49"
                                                                value="1" class="mr-1 ml-2">Tidak teratur,&nbsp;&nbsp;&nbsp; 
                                                        Lama :<input type="text" name="rk_prjogd_50"id="rk-prjogd-50"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" > 
                                                        </td>                                                       
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                        Volume :<input type="text" name="rk_prjogd_51"id="rk-prjogd-51"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" >cc/24jam&nbsp;&nbsp;&nbsp; 
                                                        Keluhan saat Haid :
                                                                <input type="checkbox" name="rk_prjogd_52" id="rk-prjogd-52"
                                                                value="1" class="mr-1 ml-2">Tidak  
                                                                <input type="checkbox" name="rk_prjogd_53" id="rk-prjogd-53"
                                                                value="1" class="mr-1 ml-4">Ya,
                                                                <input type="text" name="rk_prjogd_54"id="rk-prjogd-54"
                                                                class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                                placeholder="Sebutkan" disabled> 
                                                        </td>                                                       
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                        HPHT :<input type="text" name="rk_prjogd_55"id="rk-prjogd-55"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                                        Taksiran Persalinan :
                                                                <input type="text" name="rk_prjogd_56"id="rk-prjogd-56"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" > 
                                                        </td>                                                       
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                        G :<input type="text" name="rk_prjogd_57"id="rk-prjogd-57"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="G" >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                                        P :<input type="text" name="rk_prjogd_58"id="rk-prjogd-58"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="P" >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                                        A :<input type="text" name="rk_prjogd_59"id="rk-prjogd-59"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="A" >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
                                                        Hidup :<input type="text" name="rk_prjogd_60"id="rk-prjogd-60"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="hidup" >
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
                                                        data-toggle="collapse" data-target="#riwayat-kehamilan-prjogd"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT KEHAMILAN, PERSALINAN DAN NIFAS
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-kehamilan-prjogd">
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="13"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="3%"  class="center"><b>No.</b></th>
                                                                        <th width="10%" class="center"><b>Tgl Tahun Partus</b></th>
                                                                        <th width="10%" class="center"><b>Tempat Partus</b></th>
                                                                        <th width="10%" class="center"><b>Umur Kehamilan</b></th>
                                                                        <th width="10%" class="center"><b>Jenis Persalinan</b></th>
                                                                        <th width="10%"  class="center"><b>Penolong</b></th>
                                                                        <th width="10%" class="center"><b>Penyulit</b></th> 
                                                                        <th width="3%"  class="center"><b></b></th>
                                                                        <th width="3%"  class="center"><b>Anak</b></th>
                                                                        <th width="3%"  class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b>Nifas</b></th>   
                                                                        <th width="10%" class="center"><b>Keadaan Anak Sekarang</b></th>                   
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="3%"  class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b></b></th>
                                                                        <th width="10%"  class="center"><b></b></th>
                                                                        <th width="10%" class="center"><b></b></th> 
                                                                        <th width="5%"  class="center"><b>JK</b></th>
                                                                        <th width="5%"  class="center"><b>BB</b></th>
                                                                        <th width="5%"  class="center"><b>PB</b></th>
                                                                        <th width="10%" class="center"><b></b></th>   
                                                                        <th width="10%" class="center"><b></b></th>                   
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="center">1</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_1" id="tgl-partus-prjogd-1" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_1" id="tempat-partus-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_1" id="umur-kh-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_1" id="jenis-persalinan-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_1" id="penolong-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_1" id="penyulit-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_1" id="jk-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_1" id="bb-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_1" id="pb-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_1" id="nifas-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_1" id="keadaan-prjogd-1" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">2</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_2" id="tgl-partus-prjogd-2" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_2" id="tempat-partus-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_2" id="umur-kh-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_2" id="jenis-persalinan-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_2" id="penolong-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_2" id="penyulit-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_2" id="jk-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_2" id="bb-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_2" id="pb-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_2" id="nifas-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_2" id="keadaan-prjogd-2" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">3</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_3" id="tgl-partus-prjogd-3" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_3" id="tempat-partus-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_3" id="umur-kh-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_3" id="jenis-persalinan-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_3" id="penolong-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_3" id="penyulit-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_3" id="jk-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_3" id="bb-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_3" id="pb-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_3" id="nifas-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_3" id="keadaan-prjogd-3" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">4</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_4" id="tgl-partus-prjogd-4" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_4" id="tempat-partus-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_4" id="umur-kh-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_4" id="jenis-persalinan-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_4" id="penolong-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_4" id="penyulit-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_4" id="jk-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_4" id="bb-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_4" id="pb-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_4" id="nifas-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_4" id="keadaan-prjogd-4" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">5</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_5" id="tgl-partus-prjogd-5" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_5" id="tempat-partus-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_5" id="umur-kh-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_5" id="jenis-persalinan-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_5" id="penolong-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_5" id="penyulit-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_5" id="jk-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_5" id="bb-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_5" id="pb-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_5" id="nifas-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_5" id="keadaan-prjogd-5" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">6</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_6" id="tgl-partus-prjogd-6" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_6" id="tempat-partus-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_6" id="umur-kh-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_6" id="jenis-persalinan-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_6" id="penolong-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_6" id="penyulit-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_6" id="jk-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_6" id="bb-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_6" id="pb-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_6" id="nifas-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_6" id="keadaan-prjogd-6" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">7</td>
                                                                        <td><input type="text" name="tgl_partus_prjogd_7" id="tgl-partus-prjogd-7" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                        <td><input type="text" name="tempat_partus_prjogd_7" id="tempat-partus-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="umur_kh_prjogd_7" id="umur-kh-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jenis_persalinan_prjogd_7" id="jenis-persalinan-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penolong_prjogd_7" id="penolong-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="penyulit_prjogd_7" id="penyulit-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="jk_prjogd_7" id="jk-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="bb_prjogd_7" id="bb-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="pb_prjogd_7" id="pb-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="nifas_prjogd_7" id="nifas-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                        <td><input type="text" name="keadaan_prjogd_7" id="keadaan-prjogd-7" class="custom-form clear-input d-inline-block"></td>
                                                                    </tr>
                                                                </tbody>
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
                                                            data-toggle="collapse" data-target="#data-riwayat-pesikososial-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT PSIKOSOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-riwayat-pesikososial-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Hubungan pasien dengan keluarga</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="riwayat_prjogd_1"
                                                                id="riwayat-prjogd-1" class=" mx-1" value="1"> Baik                                                   
                                                            <input type="radio"name="riwayat_prjogd_1"
                                                                id="riwayat-prjogd-2" class=" mx-1" value="0"> Tidak Baik                                                      
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Status Psikologis</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_prjogd_3" id="riwayat-prjogd-3"
                                                                value="1" class="mr-1">Tenang                                                       
                                                            <input type="checkbox" name="riwayat_prjogd_4" id="riwayat-prjogd-4"
                                                                value="1" class="mr-1 ml-2">Cemas                                                      
                                                            <input type="checkbox" name="riwayat_prjogd_5" id="riwayat-prjogd-5"
                                                                value="1" class="mr-1 ml-2">Takut                                                       
                                                            <input type="checkbox" name="riwayat_prjogd_6" id="riwayat-prjogd-6"
                                                                value="1" class="mr-1 ml-2">Marah 
                                                            <input type="checkbox" name="riwayat_prjogd_7" id="riwayat-prjogd-7"
                                                                value="1" class="mr-1 ml-2">Sedih                                                      
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>
                                                            <input type="checkbox" name="riwayat_prjogd_8" id="riwayat-prjogd-8"
                                                                value="1" class="mr-1">Kecenderungan bunuh diri dilaporkan   &nbsp; &nbsp; &nbsp;                                                     
                                                            Ke <input type="text" name="riwayat_prjogd_9" id="riwayat-prjogd-9"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="........." disabled>   
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold"></td>
                                                        <td class="bold"></td>
                                                        <td>                                                                                                       
                                                            <input type="checkbox" name="riwayat_prjogd_10" id="riwayat-prjogd-10"
                                                                value="1" class="mr-1">Lain-lain,  &nbsp; &nbsp; &nbsp;                                                   
                                                            Sebutkan <input type="text" name="riwayat_prjogd_11" id="riwayat-prjogd-11"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
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
                                                            data-toggle="collapse" data-target="#data-status-ekonomi-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS EKONOMI DAN SOSIAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-ekonomi-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Pekerjaan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-1" class=" mx-1" value="1"> Wiraswasta                                                
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-2" class=" mx-1" value="2"> Pegawai swasta 
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-3" class=" mx-1" value="3"> PNS 
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-4" class=" mx-1" value="4"> Pensiunan 
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-5" class=" mx-1" value="5"> Tidak bekerja 
                                                            <input type="radio"name="status_prjogd_1"
                                                                id="status-prjogd-6" class=" mx-1" value="6"> Lain - lain
                                                            <input type="text" name="status_prjogd_7"
                                                                id="status-prjogd-7"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Cara Pembayaran</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="radio"name="status_prjogd_8"
                                                                id="status-prjogd-8" class=" mx-1" value="1"> Biaya Sendiri                                                   
                                                            <input type="radio"name="status_prjogd_8"
                                                                id="status-prjogd-9" class=" mx-1" value="2"> BPJS 
                                                            <input type="radio"name="status_prjogd_8"
                                                                id="status-prjogd-10" class=" mx-1" value="3"> Asuransi 
                                                            <input type="text" name="status_prjogd_11"
                                                                id="status-prjogd-11"
                                                                class="custom-form clear-input d-inline-block col-lg-3 mx-1"
                                                                placeholder="Sebutkan" disabled>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="status_prjogd_12" id="status-prjogd-12"
                                                                value="1" class="mr-1 ml-2">Lain-lain                                                    
                                                            <input type="text" name="status_prjogd_13" id="status-prjogd-13"
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
                                                            data-toggle="collapse" data-target="#data-spiritual-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN SPIRITUAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-spiritual-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">                                                   
                                                    <tr>
                                                        <td class="bold">Kegiatan keagamaan yang biasa dilakukan </td>
                                                        <td class="bold">:</td>
                                                        <td>                                                                                                                                                                            
                                                            <input type="text" name="pengkajian_prjogd_1" id="pengkajian-prjogd-1"
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
                                                            <input type="checkbox" name="pengkajian_prjogd_2" id="pengkajian-prjogd-2"
                                                                value="1" class="mr-1 ml-2">Baligh &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_prjogd_3" id="pengkajian-prjogd-3"
                                                                value="1" class="mr-1 ml-2">Belum Baligh&nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_prjogd_4" id="pengkajian-prjogd-4"
                                                                value="1" class="mr-1 ml-2">Halangan Lain&nbsp;&nbsp; 
                                                            <input type="text" name="pengkajian_prjogd_5" id="pengkajian-prjogd-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="sebutkan" disabled>                                                                                                                    
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="bold">Thaharoh</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_prjogd_6" id="pengkajian-prjogd-6"
                                                                value="1" class="mr-1 ml-2">Berwudhu &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_prjogd_7" id="pengkajian-prjogd-7"
                                                                value="1" class="mr-1 ml-2">Tayamum                                                                                                                                                                               
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Sholat</td>
                                                        <td class="bold">:</td>
                                                        <td>                                                          
                                                            <input type="checkbox" name="pengkajian_prjogd_8" id="pengkajian-prjogd-8"
                                                                value="1" class="mr-1 ml-2">Berdiri &nbsp;&nbsp;                                                  
                                                            <input type="checkbox" name="pengkajian_prjogd_9" id="pengkajian-prjogd-9"
                                                                value="1" class="mr-1 ml-2">Duduk &nbsp;&nbsp; 
                                                            <input type="checkbox" name="pengkajian_prjogd_10" id="pengkajian-prjogd-10"
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
                                                            data-toggle="collapse" data-target="#data-pemeriksaan-fisik-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"id="data-pemeriksaan-fisik-prjogd">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Nadi</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_prjogd_1" id="pemeriksaan-prjogd-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="nadi"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Pernafasan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_prjogd_2" id="pemeriksaan-prjogd-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="pernafasan"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Suhu</td>
                                                                <td class="bold">:</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_prjogd_3" id="pemeriksaan-prjogd-3"
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
                                                                    <input type="text" name="pemeriksaan_prjogd_4" id="pemeriksaan-prjogd-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="Tb"> Cm
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Berat badan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="pemeriksaan_prjogd_5" id="pemeriksaan-prjogd-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-5"placeholder="kg"> Kg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Tekanan Darah : <input type="text" name="pemeriksaan_prjogd_6" id="pemeriksaan-prjogd-6"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="sintolik"></td>
                                                                <td>/</td>
                                                                <td>                              
                                                                    <input type="text" name="pemeriksaan_prjogd_7" id="pemeriksaan-prjogd-7"
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
                                                            data-toggle="collapse"
                                                            data-target="#data-skrining-nutrisi-prjogd"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING NUTRISI
                                                        <i>(MST Modifikasi) Untuk Masalah Ginekologi/Onkologi</i>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-skrining-nutrisi-prjogd">
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
                                                        <td width="90%"><input type="radio" name="sn_penurunan_bb_prjogd" id="sn-prjogd-tidak"
                                                                class="mr-1" value="1" onchange="calcscoreprjogd()">Tidak</td>
                                                        <td>Skor 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_penurunan_bb_prjogd" id="sn-prjogd-tidak-yakin"
                                                                class="mr-1" value="2" onchange="calcscoreprjogd()">Tidak Yakin</td>
                                                        <td>Skor 2</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_penurunan_bb_prjogd" id="sn-prjogd-ya" class="mr-1"
                                                                value="3" onchange="calcscoreprjogd()">Ya, ada penurunan BB sebanyak
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_prjogd">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_prjogd" id="sn-prjogd-pbb-1-1" class="mr-1" value="1"
                                                                onchange="calcscoreprjogd()">1 - 5 Kg</td>
                                                        <td>Skor 1</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_prjogd">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_prjogd" id="sn-prjogd-pbb-2-2" class="mr-1" value="2"
                                                                onchange="calcscoreprjogd()">6 - 10 Kg</td>
                                                        <td>Skor 2</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_prjogd">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_prjogd" id="sn-prjogd-pbb-3-3" class="mr-1" value="3"
                                                                onchange="calcscoreprjogd()">11 - 15 Kg</td>
                                                        <td>Skor 3</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_prjogd">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_prjogd" id="sn-prjogd-pbb-4-4" class="mr-1" value="4"
                                                                onchange="calcscoreprjogd()">> 15 Kg</td>
                                                        <td>Skor 4</td>
                                                    </tr>
                                                    <tr class="sn_penurunan_bb_area_prjogd">
                                                        <td style="padding-left: 20px;"><input type="radio"
                                                                name="sn_penurunan_bb_on_prjogd" id="sn-prjogd-pbb-5-5" class="mr-1" value="5"
                                                                onchange="calcscoreprjogd()">Tidak tahu berapa Kg penurunannya</td>
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
                                                        <td><input type="radio" name="sn_asupan_makan_prjogd"
                                                                id="sn-prjogd-asupan-makan-tidak" class="mr-1" value="0"
                                                                onchange="calcscoreprjogd()">Tidak</td>
                                                        <td>Skor 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="sn_asupan_makan_prjogd" id="sn-prjogd-asupan-makan-ya"
                                                                class="mr-1" value="1" onchange="calcscoreprjogd()">Ya</td>
                                                        <td>Skor 1</td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                                                        <td><b>Total Skor Skrining (MST)</b></td>
                                                        <td><input type="number" name="sn_total_prjogd" id="sn-prjogd-total"
                                                                class="custom-form" value="0" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang, dilaporkan ke dokter untuk konfirmasi ke dietisin</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu, dilaporkan kedokter untuk konfirmasi ke dietisin</td>
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
                                                            data-target="#data-skrining-gizi-prjogd"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING GIZI Untuk pasien dengan masalah obstetri/kehamilan/Nifas
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-skrining-gizi-prjogd">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="4"><b></b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="1%" class="center"><b>No.</b></th>
                                                            <th width="30%" class="center"><b>Parameter</b></th>
                                                            <th width="10%" class="center"><b>Penilaian</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                           
                                                        <tr>
                                                            <td class="center">1.</td>
                                                            <td>Apakah asupan makan berkurang karena nafsu makan berkurang</td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_prjogd_1"id="skrining-prjogd-1" class="mr-1"  value="0"> Tidak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_prjogd_1"id="skrining-prjogd-2" class="mr-1"  value="1" >ya
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2.</td>
                                                            <td>Ada gangguan metabolisme ( DM, gangguan fungsi tiroid, infeksi kronis, lain-lain sebutkan 
                                                            <input type="text" name="skrining_prjogd_3" id="skrining-prjogd-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="........"> </td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_prjogd_4"id="skrining-prjogd-4" class="mr-1"  value="0">Tidak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_prjogd_4"id="skrining-prjogd-5" class="mr-1"  value="1">ya
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3.</td>
                                                            <td>Ada pertambahan berat badan yang kurang atau lebih sesuai usia kehamilan</td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_prjogd_6"id="skrining-prjogd-6" class="mr-1"  value="0">Tidak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_prjogd_6"id="skrining-prjogd-7" class="mr-1"  value="1">ya
                                                            </td>                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4.</td>
                                                            <td>Nilai Hb < 10g/dl atau HCT < 30% </td>
                                                            <td class="center">
                                                                <input type="radio" name="skrining_prjogd_8"id="skrining-prjogd-8" class="mr-1"  value="0">Tidak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="skrining_prjogd_8"id="skrining-prjogd-9" class="mr-1"  value="1">ya
                                                            </td>                                                                 
                                                        </tr>
                                                        <!-- <tr>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td class="center"></td>                                                                 
                                                        </tr> -->
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td>Jika nilai Ya ≥1 dilaporkan ke jaga ruangan / DPJP untuk konfirmasi ke dietisin </td>
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
                                                            data-target="#data-status-fungsional-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>STATUS FUNGSIONAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-status-fungsional-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_prjogd_1" id="status-fung-prjogd-1"
                                                                value="1" class="mr-1"> Mandiri
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_prjogd_2" id="status-fung-prjogd-2"
                                                                value="1" class="mr-1"> Perlu bantuan, &nbsp;&nbsp;&nbsp;
                                                                Sebutkan <input type="text" name="status_fung_prjogd_3" id="status-fung-prjogd-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="sebutkan" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="status_fung_prjogd_4" id="status-fung-prjogd-4"
                                                                value="1" class="mr-1"> Ketergantungan total, &nbsp;&nbsp;&nbsp;
                                                                Dilaporkan ke dokter pukul <input type="text" name="status_fung_prjogd_5" id="status-fung-prjogd-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                                placeholder="jam" disabled>
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
                                                            data-target="#data-resiko-cidera-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>SKRINING RESIKO CEDERA / JATUH 
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-resiko-cidera-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td> a. Perhatikan cara berjalan pasien saat akan duduk di kursi, Apakah pasien tampak tidak seimbang (sempoyongan/limbung) ? &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_1"id="cidera-prjogd-1" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_1"id="cidera-prjogd-2" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> b. Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan duduk ?  &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_3"id="cidera-prjogd-3" value="1"class="mr-1">Ya &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_3"id="cidera-prjogd-4" value="0"class="mr-1"> Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Hasil : &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_5"id="cidera-prjogd-5" value="1"class="mr-1">Tidak Beresiko (tidak ditemukan a dan b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_5"id="cidera-prjogd-6" value="2"class="mr-1"> Resiko rendah (ditemukan a atau b) &nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="cidera_prjogd_5"id="cidera-prjogd-7" value="3"class="mr-1"> Resiko tinggi ( ditemukan a dan b)
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
                                                            data-target="#data-penilaian-tingkat-nyeri-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI</i>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"
                                                id="data-penilaian-tingkat-nyeri-prjogd">
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
                                                                    <input type="radio" name="keterangan_prjogd_1"
                                                                        id="keterangan-prjogd-1" value="1"
                                                                        class="mr-1">Tidak Nyeri : 0
                                                                    <input type="radio" name="keterangan_prjogd_1"
                                                                        id="keterangan-prjogd-2" value="2"
                                                                        class="mr-1 ml-3">Ringan : 1 - 3
                                                                    <input type="radio" name="keterangan_prjogd_1"
                                                                        id="keterangan-prjogd-3" value="3"
                                                                        class="mr-1 ml-3">Sedang : 4 - 6
                                                                    <input type="radio" name="keterangan_prjogd_1"
                                                                        id="keterangan-prjogd-4" value="4"
                                                                        class="mr-1 ml-3">Berat : 7 - 10
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    <input type="checkbox" name="keterangan_prjogd_5"
                                                                        id="keterangan-prjogd-5" value="1" class="mr-1">Tidak Ada Nyeri 
                                                                    <input type="checkbox" name="keterangan_prjogd_6"
                                                                        id="keterangan-prjogd-6" value="1" class="mr-1 ml-3">Nyeri Kronis 
                                                                    <input type="checkbox" name="keterangan_prjogd_7"
                                                                        id="keterangan-prjogd-7" value="1" class="mr-1 ml-3">Nyeri Akut                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Skala nyeri :<input type="text" name="keterangan_prjogd_8"
                                                                        id="keterangan-prjogd-8"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Lokasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="keterangan_prjogd_9"
                                                                        id="keterangan-prjogd-9"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                              
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Durasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="keterangan_prjogd_10"
                                                                        id="keterangan-prjogd-10"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="69%">
                                                                    Frekuensi :<input type="text" name="keterangan_prjogd_11"
                                                                        id="keterangan-prjogd-11"class="custom-form clear-input d-inline-block col-lg-3 mx-1">                                                                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Nyeri Hilang, Bila</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="keterangan_prjogd_12"
                                                                        id="keterangan-prjogd-12" value="1"
                                                                        class="mr-1">Minum Obat
                                                                    <input type="checkbox" name="keterangan_prjogd_13"
                                                                        id="keterangan-prjogd-13" value="1"
                                                                        class="mr-1 ml-2">Mendengarkan Musik
                                                                    <input type="checkbox" name="keterangan_prjogd_14"
                                                                        id="keterangan-prjogd-14" value="1"
                                                                        class="mr-1 ml-2">Istirahat
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="checkbox" name="keterangan_prjogd_15"
                                                                        id="keterangan-prjogd-15" value="1"
                                                                        class="mr-1">Berubah
                                                                    Posisi / Tidur
                                                                    <input type="checkbox" name="keterangan_prjogd_16"
                                                                        id="keterangan-prjogd-16" value="1"
                                                                        class="mr-1 ml-2">Lain-lain,&nbsp;&nbsp; Sebutkan : 
                                                                    <input type="text" name="keterangan_prjogd_17"
                                                                        id="keterangan-prjogd-17"
                                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2"
                                                                        placeholder="Masukkan lain - lain" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Diberitahukan ke dokter</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="radio" name="keterangan_prjogd_18"
                                                                        id="keterangan-prjogd-18" value="0"
                                                                        class="mr-1">Tidak 
                                                                    <input type="radio" name="keterangan_prjogd_18"
                                                                        id="keterangan-prjogd-19" value="1"
                                                                        class="mr-1 ml-3">Ya, &nbsp;&nbsp;Pukul
                                                                    <input type="text" name="keterangan_prjogd_20" id="keterangan-prjogd-20"
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
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-masalah-kebidanan-prjogd"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEBIDANAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-masalah-kebidanan-prjogd">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td>
                                                            <textarea name="masalah_kebidanan_prjogd" id="masalah-kebidanan-prjogd"rows="5" class="form-control clear-input"placeholder="masalah kebidanan"></textarea>
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
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_bidan_prjogd"
                                                        id="tanggal-jam-bidan-prjogd"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        value="<?= date('d/m/Y H:i') ?>"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                                <td class="center" width="50%">
                                                    Tanggal & Jam : <input type="text" name="tanggal_jam_dokter_prjogd"
                                                        id="tanggal-jam-dokter-prjogd"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="Masukkan tanggal & jam">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center">Nama Bidan : <input type="text" name="bidan_prjogd" id="bidan-prjogd"
                                                        class="select2c-input ml-2"></td>
                                                <td class="center">Nama Dokter : <input type="text" name="dokter_prjogd" id="dokter-prjogd"
                                                        class="select2c-input ml-2"></td>
                                            </tr>
                                            <tr>
                                                <td class="center">
                                                    Tanda Tangan Bidan
                                                </td>
                                                <td class="center">
                                                    Verifikasi DPJP dan Tanda Tangan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_bidan_prjogd" id="ttd-bidan-prjogd"
                                                            value="1" class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_perawat_prjogd_verified') ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_dokter_prjogd"
                                                            id="ttd-dokter-prjogd" value="1"
                                                            class="custom-form col-lg-1 mx-auto">
                                                        <?= digitalSignature('ttd_dokter_prjogd_verified') ?>
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
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianRajalObstetriGinekologi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Pengkajian Rawat Jalan Obstetri dan Ginekologi -->


