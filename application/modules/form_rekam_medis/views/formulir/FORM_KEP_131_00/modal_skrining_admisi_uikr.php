<!-- // SAUIKR -->
<div class="modal fade" id="modal_skrining_admisi_uikr" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_skrining_admisi_uikr">FORM SKRINING ADMISI UNTUK IDENTIFIKASI KEBUTUHAN RESUSITASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_skrining_admisi_uikr class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sauikr">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sauikr">
                <input type="hidden" name="id_pasien" id="id-pasien-sauikr">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-sauikr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-sauikr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-sauikr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-sauikr"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-sauikr"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="data-skrining-admisi-uikr">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #B0E0E6; color: black;"><b>Skrining Admisi Untuk Identifikasi Kebutuhan Resusitasi</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-sauikr"></div>                               
                                    <table class="table table-sm table-striped table-bordered" id="tabel-sauikr">
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>No</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Jam</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Diagnosa</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Jenis Persalinan</td>                                            
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanSkriningAdmisiUikr()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- SAUIKR  -->


<!-- // SAUIKR EDIT -->
<div id="modal-edit-skrining-admisi-uikr" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: #B22222;"><b>Edit Skrining Admisi Untuk Identifikasi Kebutuhan Resusitasi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-skrining-admisi-uikr'); ?>
                <input type="hidden" name="id" id="id-edit-skrining-admisi-uikr">

                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="25%"> <b>Tanggal
                                    <input type="text" name="tanggal_sauikr" id="edit-tanggal-sauikr" class="custom-form clear-input d-inline-block col-lg-4" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="25%">  <b>Jam
                                    <input type="text" name="jam_sauikr" id="edit-jam-sauikr" class="custom-form clear-input d-inline-block col-lg-3" placeholder="hh/ii">
                                </td>
                                <td width="25%"> <b>Diagnosa ibu : 
                                    <!-- <label id="edit-diagnosa-sauikr"> </label> -->
                                    <input type="text" name="diagnosa_sauikr"id="edit-diagnosa-sauikr" class="custom-form clear-input d-inline-block col-lg-6">
                                </td>
                                <td width="25%">  <b>Jenis persalinan :
                                    <input type="text" name="jenispersalinan_sauikr" id="edit-jenispersalinan-sauikr" class="custom-form clear-input d-inline-block col-lg-6" placeholder="">
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO RENDAH </b></td>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO MEDIUM </td>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO TINGGI </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="33%"><b>Aspek Maternal</b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekmaternal1" id="edit-aspekmaternal1" value="1"class="mr-1 ml-2">
                                    Tidak ada riwayat komplikasi pada kehamilan sebelumnya
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal2" id="edit-aspekmaternal2" value="1"class="mr-1 ml-2">
                                    Preeklampsia 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal3" id="edit-aspekmaternal3" value="1"class="mr-1 ml-2">
                                    Preeklampsia berat 
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekmaternal4" id="edit-aspekmaternal4" value="1"class="mr-1 ml-2">
                                    DMG 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal5" id="edit-aspekmaternal5" value="1"class="mr-1 ml-2">
                                    Eklampsia
                                </td> 
                            </tr> 
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekmaternal6" id="edit-aspekmaternal6" value="1"class="mr-1 ml-2">
                                    Riwayat penyakit ibu sebelumnya 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal7" id="edit-aspekmaternal7" value="1"class="mr-1 ml-2">
                                    Kelainan penyakit ibu saat ini
                                </td> 
                            </tr>   
                             <tr>
                                <td width="33%"><b>Aspek Janin</b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin1" id="edit-aspekjanin1" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin 2500 - 4000 gr
                                </td> 
                                <td><input type="checkbox" name="aspekjanin2" id="edit-aspekjanin2" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin > 4000 gr atau 2000 - 2500 gr 
                                </td> 
                                <td><input type="checkbox" name="aspekjanin3" id="edit-aspekjanin3" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin <2000
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin4" id="edit-aspekjanin4" value="1"class="mr-1 ml-2">
                                    Denyut jantung janin teratur
                                </td> 
                                <td><input type="checkbox" name="aspekjanin5" id="edit-aspekjanin5" value="1"class="mr-1 ml-2">
                                    Riwayat DJJ tidak normal
                                </td> 
                                <td><input type="checkbox" name="aspekjanin6" id="edit-aspekjanin6" value="1"class="mr-1 ml-2">
                                    Riwayat CTG kategori 3
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin7" id="edit-aspekjanin7" value="1"class="mr-1 ml-2">
                                    Air ketuban normal
                                </td> 
                                <td><input type="checkbox" name="aspekjanin8" id="edit-aspekjanin8" value="1"class="mr-1 ml-2">
                                    Air ketuban berkurang
                                </td> 
                                <td><input type="checkbox" name="aspekjanin9" id="edit-aspekjanin9" value="1"class="mr-1 ml-2">
                                    Air ketuban hijau kental
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekjanin10" id="edit-aspekjanin10" value="1"class="mr-1 ml-2">
                                    Air ketuban hijau
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td width="33%"><b>Aspek Penyulit Persalinan </b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan1" id="edit-aspekpenyulitpersalinan1" value="1"class="mr-1 ml-2">
                                    Kehamilan tunggal
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan2" id="edit-aspekpenyulitpersalinan2" value="1"class="mr-1 ml-2">
                                    Kehamilan ganda 
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan3" id="edit-aspekpenyulitpersalinan3" value="1"class="mr-1 ml-2">
                                    Kehamilan ganda
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan4" id="edit-aspekpenyulitpersalinan4" value="1"class="mr-1 ml-2">
                                    Gravida < dari 5
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan5" id="edit-aspekpenyulitpersalinan5" value="1"class="mr-1 ml-2">
                                    Gravida 5 atau lebih
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan6" id="edit-aspekpenyulitpersalinan6" value="1"class="mr-1 ml-2">
                                    Gravida 5 atau lebih
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan7" id="edit-aspekpenyulitpersalinan7" value="1"class="mr-1 ml-2">
                                    Tidak ada riwayat komplikasi pada ANC
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan8" id="edit-aspekpenyulitpersalinan8" value="1"class="mr-1 ml-2">
                                    Infeksi intrapartum/korioamnionitis
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan9" id="edit-aspekpenyulitpersalinan9" value="1"class="mr-1 ml-2">
                                    Infeksi intrapartum/ korioamnionitis
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan10" id="edit-aspekpenyulitpersalinan10" value="1"class="mr-1 ml-2">
                                    Perdarahan ante partum
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan11" id="edit-aspekpenyulitpersalinan11" value="1"class="mr-1 ml-2">
                                    KPD lebih dari 8 jam
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan12" id="edit-aspekpenyulitpersalinan12" value="1"class="mr-1 ml-2">
                                    KPD lebih dari 8 jam
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan13" id="edit-aspekpenyulitpersalinan13" value="1"class="mr-1 ml-2">
                                    Persalinan lama/macet
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan14" id="edit-aspekpenyulitpersalinan14" value="1"class="mr-1 ml-2">
                                    Persalinan lama/macet
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan15" id="edit-aspekpenyulitpersalinan15" value="1"class="mr-1 ml-2">
                                    Usia gestasi > 41minggu
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan16" id="edit-aspekpenyulitpersalinan16" value="1"class="mr-1 ml-2">
                                    Usia gestasi > 41minggu
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan17" id="edit-aspekpenyulitpersalinan17" value="1"class="mr-1 ml-2">
                                    Perdarahan ante partum dengan syok
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan18" id="edit-aspekpenyulitpersalinan18" value="1"class="mr-1 ml-2">
                                    Persalinan pervaginam berbantu, termasuk persalinan sungsang
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan19" id="edit-aspekpenyulitpersalinan19" value="1"class="mr-1 ml-2">
                                    Seksio sesaria
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td width="33%" class="center"><b>JIKA RISIKO RENDAH : </b></td>
                                <td width="33%" class="center"><b>JIKA RISIKO SEDANG : </b></td>
                                <td width="33%" class="center"><b>JIKA RISIKO TINGGI : </b></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah1" id="edit-jikaresikorendah1" value="1"class="mr-1 ml-2">
                                    Radian warmer dihidupkan saat ibu dipimpin meneran
                                </td> 
                                <td><input type="checkbox" name="jikaresikosedang1" id="edit-jikaresikosedang1" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 3 orang dengan lead dokter/SpA dan tim dokter/perawat/bidan yang kompeten melakukan resusitasi neonatus lanjut
                                </td> 
                                <td><input type="checkbox" name="jikaresikotinggi1" id="edit-jikaresikotinggi1" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 3 orang dengan leader dokter spesialis anak dan tim dokter/perawat/bidan yang kompeten melakukan resusitasi neonatus lanjut
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah2" id="edit-jikaresikorendah2" value="1"class="mr-1 ml-2">
                                    Troli resusitasi dipastikan lengkap dan siap pakai
                                </td> 
                                <td><input type="checkbox" name="jikaresikosedang2" id="edit-jikaresikosedang2" value="1"class="mr-1 ml-2">
                                    Berikan informasi segera kepada orang tua bayi terkait kemungkinan rujukan ke tingkat pelayanan lebih tinggi
                                </td> 
                                <td><input type="checkbox" name="jikaresikotinggi2" id="edit-jikaresikotinggi2" value="1"class="mr-1 ml-2">
                                    Berikan informasi segera kepada orang tua bayi terkait kemungkinan perawatan yang lebih kompleks yang membutuhkan tim yang lebih luas dan sumber daya yang lebih banyak
                                </td>                               
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah3" id="edit-jikaresikorendah3" value="1"class="mr-1 ml-2">
                                    Edukasi ulang IMD
                                </td> 
                                <td></td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah4" id="edit-jikaresikorendah4" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 2 orang bidan/perawat/dokter dengan kompeten melakukan resusitasi neonatus
                                </td> 
                                <td></td> 
                                <td></td> 
                            </tr>
                  
                        </tbody>  
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawatsauikr" id="edit-perawatsauikr" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-sauikr">
            </div>
        </div>
    </div>
</div>


