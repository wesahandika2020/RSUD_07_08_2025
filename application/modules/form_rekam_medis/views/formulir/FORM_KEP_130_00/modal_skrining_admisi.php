<!-- // SAFR -->
<div class="modal fade" id="modal_skrining_admisi" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_skrining_admisi">FORM SKRINING ADMISI FAKTOR RISIKO</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_skrining_admisi class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-safr">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-safr">
                <input type="hidden" name="id_pasien" id="id-pasien-safr">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-safr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-safr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-safr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-safr"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-safr"></span></td>
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
                            <div id="data-skrining-admisi">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px"> 
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #B0E0E6; color: black;"><b>Skrining Admisi Faktor Risiko</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-safr">
                                    </div>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-safr"> 
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>No</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Jam</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Perawat</td>                                            
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Petugas</td>                                               
                                                <td class="center" colspan="2" style="background-color: #B0E0E6; color: black;"><b>Alat</b></td>
                                            </tr>
                                        </thead>
                                        <tbody class="body-table">
                                        </tbody>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                        <tr>
                                            <td>
                                                Terimakasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanSkriningAdmisi()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- SAFR  -->








<!-- // SAFR EDIT -->
<div id="modal-edit-skrining-admisi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Skrining Admisi Faktor Risiko</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-skrining-admisi'); ?>
                <input type="hidden" name="id" id="id-edit-skrining-admisi">
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%" style="background-color: #B0E0E6; color: black;"> <b>TANGGAL 
                                    <input type="text" name="tanggal_safr" id="edit-tanggal-safr" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="30%" style="background-color: #B0E0E6; color: black;">  <b>JAM
                                    <input type="text" name="jam_safr" id="edit-jam-safr" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/ii">
                                </td>
                                <td width="30%" style="background-color: #B0E0E6; color: black;"> <b>DIAGNOSIS   : 
                                    <label id="edit-diagnosa-safr"> </label>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td width="30%" class="center" style="background-color: orange; color: black;"></td>
                                <td width="30%" class="center" style="background-color: orange; color: black;">
                                    <b>PENGENALAN FAKTOR RISIKO SAAT ADMISI DAN PERSALINAN</b>
                                </td>
                                <td width="30%" class="center" style="background-color: orange; color: black;"></td>
                            </tr>
                            <tr>
                                <td width="30%" class="center" style="background-color: #00BFFF; color: black;"><b>AWASI PERDARAHAN</b> <br> <i> Perawatan Kebidanan Rutin</td>
                                <td width="30%" class="center" style="background-color: #FFFFE0; color: black;"><b>NOTIFIKASI TIM RESPON AWAL EMERGENSI</b> 
                                    <br> <i> PPA yang terlibat dalam penanganan
                                    <br> lanjut perdarahan telah bersiap siaga
                                    <br> untuk penatalaksanaan lanjut perdarahan
                                </td>
                                <td width="30%" class="center" style="background-color: #FF4500; color: black;"> <b> NOTIFIKASI DAN
                                    <br> AKTIFASI TIM RESPON 
                                    <br> AWAL EMERGENSI 
                                </td>
                            </tr>
                            <tr>
                                <td width="30%" class="center"> <b> Rendah </td>
                                <td width="30%" class="center"> <b> Medium </td>
                                <td width="30%" class="center"> <b> Tinggi</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_1 "id="edit-rendah-safr-1" value="1"class="mr-1">
                                    Tidak ada riwayat operasi Rahim (sesar, operasi myoma)
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_1 "id="edit-medium-safr-1" value="1"class="mr-1">
                                    Bekas sesar atau operasi rahim sebelumnya    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_1 "id="edit-tinggi-safr-1" value="1"class="mr-1">
                                    Plasenta previa, plasenta letak rendah
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_2 "id="edit-rendah-safr-2" value="1"class="mr-1">
                                    Kehamilan tunggal
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_2 "id="edit-medium-safr-2" value="1"class="mr-1">
                                    Kehamilan ganda    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_2 "id="edit-tinggi-safr-2" value="1"class="mr-1">
                                    Dicurigai/diketahui plasenta akreta 
                                </td> 
                            </tr> 
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_3 "id="edit-rendah-safr-3" value="1"class="mr-1">
                                    Gravida 4 atau kurang 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_3 "id="edit-medium-safr-3" value="1"class="mr-1">
                                    Gravida 5 atau lebih    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_3 "id="edit-tinggi-safr-3" value="1"class="mr-1">
                                    Solusio plasenta 
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_4 "id="edit-rendah-safr-4" value="1"class="mr-1">
                                    Tidak ada kelainan perdarahan
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_4 "id="edit-medium-safr-4" value="1"class="mr-1">
                                    Infeksi intra partum/korioamnionitis   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_4 "id="edit-tinggi-safr-4" value="1"class="mr-1">
                                    Gangguan koagulopati 
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_5 "id="edit-rendah-safr-5" value="1"class="mr-1">
                                    Tidak ada riwayat HPP 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_5 "id="edit-medium-safr-5" value="1"class="mr-1">
                                    Riwayat HPP pada persalinan sebelumnya    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_5 "id="edit-tinggi-safr-5" value="1"class="mr-1">
                                    Riwayat > 1 HPP
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_6 "id="edit-rendah-safr-6" value="1"class="mr-1">
                                    Hasil pemeriksaan Hb (dalam 1 bulan) >10
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_6 "id="edit-medium-safr-6" value="1"class="mr-1">
                                    Mioma uteri besar    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_6 "id="edit-tinggi-safr-6" value="1"class="mr-1">
                                    HELLP Syndrome
                                </td> 
                            </tr>   

                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_7 "id="edit-medium-safr-7" value="1"class="mr-1">
                                    Kadar trombosit  50,000 - 100,000   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_7 "id="edit-tinggi-safr-7" value="1"class="mr-1">
                                    Trombosit < 50,000
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_8 "id="edit-medium-safr-8" value="1"class="mr-1">
                                    Kadar hematocrit  < 30% (Hgb < 10)   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_8 "id="edit-tinggi-safr-8" value="1"class="mr-1">
                                    Hematokrit < 24% (Hgb < 8)
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_9 "id="edit-medium-safr-9" value="1"class="mr-1">
                                    Polihidramnion    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_9 "id="edit-tinggi-safr-9" value="1"class="mr-1">
                                    Kematian janin 
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_10 "id="edit-medium-safr-10" value="1"class="mr-1">
                                    Usia gestasi  < 37 mgg atau  > 41 minggu   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_10 "id="edit-tinggi-safr-10" value="1"class="mr-1">
                                    Didapat 2 atau lebih factor risiko medium 
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td>
                                    <input type="checkbox" name="medium_safr_11 "id="edit-medium-safr-11" value="1"class="mr-1">
                                    Preeclampsia
                                </td> 
                                <td></td>  
                            </tr>   
                            <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_12 "id="edit-medium-safr-12" value="1"class="mr-1">
                                    Persalinan memanjang/lama /Induction (> 24 hrs)   
                                </td>
                                <td></td> 
                            </tr> 

                            <tr>
                                <td width="30%" class="center"> <b> Jika Risiko Rendah :</td>
                                <td width="30%" class="center"> <b> Jika Risiko Medium :</td>
                                <td width="30%" class="center"> <b> Jika Risiko Tinggi :</td>
                            </tr> 
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_13 "id="edit-rendah-safr-13" value="1"class="mr-1">
                                    Contoh darah telah disiapkan dalam spuit 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_13 "id="edit-medium-safr-13" value="1"class="mr-1">
                                    Lakukan pemeriksaan Gol Darah dan cross match sesuai intruksi dokter   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_13 "id="edit-tinggi-safr-13" value="1"class="mr-1">
                                    Lakukan pemeriksaan gol darah dan Crossmatch 2 kantong PRC sesuai intruksi dokter
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_14 "id="edit-medium-safr-14" value="1"class="mr-1">
                                    Kaji ulang Protokol Perdarahan    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_14 "id="edit-tinggi-safr-14" value="1"class="mr-1">
                                    Kaji ulang protocol perdarahan 
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td></td>  
                                <td>
                                    <input type="checkbox" name="tinggi_safr_15 "id="edit-tinggi-safr-15" value="1"class="mr-1">
                                    Notifikasi kepada tim anestesi 
                                </td> 
                            </tr> 
                            
                        </tbody>  
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_safr" id="edit-perawat-safr" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>

                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-safr">
            </div>
        </div>
    </div>
</div>


