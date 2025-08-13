<!-- // PERT -->
<div class="modal fade" id="modal_preeklampesia_early" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_preeklampesia_early">FORM PREEKLAMPSIA EARLY RECOGNITION TOOL (PERT)</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_preeklampsia_early class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pert">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pert">
                <input type="hidden" name="id_pasien" id="id-pasien-pert">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pert"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-pert"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-pert"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pert"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-pert"></span></td>
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
                            <div id="data-preeklampsia-early">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #B0E0E6; color: black;"><b>Preeklampsia Early Recognition Tool (PERT)</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-pert">
                                    </div>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-pert">
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPreeklampsiaEarly()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- PERT  -->


<!-- // PERT EDIT -->
<div id="modal-edit-preeklampsia-early" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Preeklampsia Early Recognition Tool (PERT)</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-preeklampsia-early'); ?>
                <input type="hidden" name="id" id="id-edit-preeklampsia-early">

                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%" style="background-color: #B0E0E6; color: black;"> <b>TANGGAL 
                                    <input type="text" name="tanggal_pert"id="edit-tanggal-pert" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="30%" style="background-color: #B0E0E6; color: black;">  <b>JAM
                                    <input type="text" name="jam_pert"id="edit-jam-pert" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/ii">
                                </td>
                                <td width="30%" style="background-color: #B0E0E6; color: black;"> <b>DIAGNOSIS   : 
                                    <label id="edit-diagnosa-pert"> </label>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="15%" class="center" style="background-color: #D3D3D3; color: black;"> <b> PENILAIAN </b></td>
                                <td width="15%" class="center" style="background-color: #00FF00; color: black;"> <b> NORMAL </td>
                                <td width="2%" class="center" style="background-color: #00FF00; color: black;"> <b> V </td>
                                <td width="15%" class="center" style="background-color: #FFFF00; color: black;"> <b> MENGKHAWATIRKAN </td>
                                <td width="2%" class="center" style="background-color: #FFFF00; color: black;"> <b> V </td>
                                <td width="15%" class="center" style="background-color: #FF4500; color: black;"> <b> BAHAYA </td>
                                <td width="2%" class="center" style="background-color: #FF4500; color: black;"> <b> V </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center"> <b> Kesadaran </td> 
                                <td class="center"> Sadar </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_1 "id="edit-hijau-1" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Mengantuk <br> Sulit berbicara  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_1 "id="edit-kuning-1" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Tidak memberikan <br> respon </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_1 "id="edit-merah-1" value="1"class="mr-1">
                                </td> 
                            </tr>   
                             <tr>
                                <td class="center"> <b> Nyeri kepala </td> 
                                <td class="center"> Tidak ada </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_2 "id="edit-hijau-2" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Ringan <br> Mual/muntah  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_2 "id="edit-kuning-2" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Nyeri kepala hebat </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_2 "id="edit-merah-2" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Pandangan  </td> 
                                <td class="center"> Normal </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_3 "id="edit-hijau-3" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Kabur atau  <br> terganggu </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_3 "id="edit-kuning-3" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Buta  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_3 "id="edit-merah-3" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> TD sistolik </td> 
                                <td class="center"> 100-139 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_4 "id="edit-hijau-4" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥155-159</td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_4 "id="edit-kuning-4" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥160  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_4 "id="edit-merah-4" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> TD diastolik </td> 
                                <td class="center"> 50-89 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_5 "id="edit-hijau-5" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 90-109 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_5 "id="edit-kuning-5" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥110 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_5 "id="edit-merah-5" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> HR </td> 
                                <td class="center"> 61-110 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_6 "id="edit-hijau-6" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 110-120 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_6 "id="edit-kuning-6" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥120 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_6 "id="edit-merah-6" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> RR </td> 
                                <td class="center"> 11-24 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_7 "id="edit-hijau-7" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <12 atau 25-30  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_7 "id="edit-kuning-7" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <10 atau >30 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_7 "id="edit-merah-7" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Sesak nafas </td> 
                                <td class="center"> Tidak  </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_8 "id="edit-hijau-8" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Ya </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_8 "id="edit-kuning-8" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Ya</td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_8 "id="edit-merah-8" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Saturasi O2 </td> 
                                <td class="center"> ≥95 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_9 "id="edit-hijau-9" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <95 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_9 "id="edit-kuning-9" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <93 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_9 "id="edit-merah-9" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Nyeri (abdomen atau dada)</td> 
                                <td class="center"> Tidak </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_10 "id="edit-hijau-10" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Mual/muntah <br> Nyeri dada <br> Nyeri abdomen  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_10 "id="edit-kuning-10" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Mual/muntah <br> Nyeri dada <br> Nyeri abdomen  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_10 "id="edit-merah-10" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Kondisi janin </td> 
                                <td class="center"> Reaktif/kategori 1 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_11 "id="edit-hijau-11" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Non-reaktif <br> Kategori 2 IUGR </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_11 "id="edit-kuning-11" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Kategori 3 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_11 "id="edit-merah-11" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Urine (ml/jam)</td> 
                                <td class="center"> ≥50 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_12 "id="edit-hijau-12" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 35-49 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_12 "id="edit-kuning-12" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <35 (dalam 2 jam) </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_12 "id="edit-merah-12" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Proteinuria </td> 
                                <td class="center"> trace </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_13 "id="edit-hijau-13" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Dipstick ≥+1 <br> ≥300mg/24jam </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_13 "id="edit-kuning-13" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Protein/creatinine  <br> ration (PCR) > 0.3 <br> Dipstick ≥+2 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_13 "id="edit-merah-13" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Trombosit  </td> 
                                <td class="center"> >100 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_14 "id="edit-hijau-14" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 50-100 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_14 "id="edit-kuning-14" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <50 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_14 "id="edit-merah-14" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> SGOT/SGPT </td> 
                                <td class="center"> <70 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_15 "id="edit-hijau-15" value="1"class="mr-1">
                                </td> 
                                <td class="center"> >70 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_15 "id="edit-kuning-15" value="1"class="mr-1">
                                </td> 
                                <td class="center"> >70 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_15 "id="edit-merah-15" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Creatinine  </td> 
                                <td class="center"> ≤0.8 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_16 "id="edit-hijau-16" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 0.9 - 1.1  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_16 "id="edit-kuning-16" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥1.1 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_16 "id="edit-merah-16" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Tanda toksisitas MgSO4  </td> 
                                <td class="center"> RR 16-20 <br> Reflex patella + </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_17 "id="edit-hijau-17" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Reflex patella  <br> Menurun </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_17 "id="edit-kuning-17" value="1"class="mr-1">
                                </td> 
                                <td class="center"> RR<12 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_17 "id="edit-merah-17" value="1"class="mr-1">
                                </td> 
                            </tr>     
                        </tbody>  
                    </table>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%" style="background-color: #00FF00; color: black;"> <b> HIJAU : Normal lanjutkan observasi dengan kehati-hatian tinggi                                 
                                </td>
                                <td width="30%" style="background-color: #FFFF00; color: black;"> <b> KUNING : Mengkhawatirkan - tingkatkan frekuensi observasi 1 atau 2 pemicu tambahan - naikan kewaspadaan menjadi MERAH
                                </td>
                                <td width="30%" style="background-color: #FF4500; color: black;"> <b> MERAH : Bahaya - lakukan penilaian ulang segera, aktivasi tim emergensi, perawatan HCU
                                </td
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_pert" id="edit-perawat-pert" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-pert">
            </div>
        </div>
    </div>
</div>


