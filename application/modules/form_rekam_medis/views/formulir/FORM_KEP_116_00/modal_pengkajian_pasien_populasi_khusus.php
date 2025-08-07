<!-- // PPPK -->
<div class="modal fade" id="modal_pengkajian_pasien_populasi_khusus" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_pasien_populasi_khusus">FORM PENGKAJIAN PASIEN POPULASI KHUSUS</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap)</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_pasien_populasi_khusus class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pppk">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pppk">
                <input type="hidden" name="id_pasien" id="id-pasien-pppk">
                <input type="hidden" name="id_pppk" id="id-pppk">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pppk"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="norm-pppk"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ttl-pppk"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-pppk"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="pppk-bed"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="bwizard_pppk"> 
                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="bold" style="background-color: blue; color: white;"> PENGKAJIAN KEPERAWATAN<i class="bold"><small> (Diisi Oleh Perawat)</small></i></td>
                                    </tr>
                                </table>                             
                                <div class="form-data-pengkajian-neonatus">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td width="20%" class="bold">Tanggal / Jam Masuk</td>
                                            <td wdith="1%" class="bold">:</td>
                                            <td width="79%"><input type="text" name="waktu_masuk_ppk"id="waktu-masuk-ppk" class="custom-form clear-input col-lg-2"readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tanggal / Jam Pengkajian</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <!-- <input type="text" name="tanggal_jam_pengkajian_ppk"id="tanggal-jam-pengkajian-ppk" class="custom-form clear-input col-lg-2"value="<?= date('d/m/Y H:i') ?>"> -->
                                                <input type="text" name="tanggal_jam_pengkajian_ppk" id="tanggal-jam-pengkajian-ppk" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yy/ HH:ii">
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="2" style="background-color: #E0FFFF; color: black;"><b>A. Geriatri </b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>1. Gangguan Penglihatan</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_1" id="geriatri-pppk-1" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_2" id="geriatri-pppk-2" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="geriatri_pppk_3" id="geriatri-pppk-3" class="custom-form clear-input" style="width: 400px;" readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>2. Gangguan pendengaran</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_4" id="geriatri-pppk-4" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_5" id="geriatri-pppk-5" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="geriatri_pppk_6" id="geriatri-pppk-6" class="custom-form clear-input" style="width: 400px;" readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>3. Gangguan berkemih</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_7" id="geriatri-pppk-7" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_8" id="geriatri-pppk-8" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_9" id="geriatri-pppk-9" value="1"> Inkontinensia     
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_10" id="geriatri-pppk-10" value="1"> Disuria       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_11" id="geriatri-pppk-11" value="1"> Oliguria        
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_12" id="geriatri-pppk-12" value="1"> Anuria
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>4. Gangguan daya ingat</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_13" id="geriatri-pppk-13" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_14" id="geriatri-pppk-14" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="geriatri_pppk_15" id="geriatri-pppk-15" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>5. Gangguan bicara</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_16" id="geriatri-pppk-16" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="geriatri_pppk_17" id="geriatri-pppk-17" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="geriatri_pppk_18" id="geriatri-pppk-18" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>





                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="2" style="background-color: #E0FFFF; color: black;"><b>B.	Penyakit Menular </b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 25%; padding-left: 30px; vertical-align: middle;"> <b>1.	Pasien mengetahui penyakit saat ini:  </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_1" id="penyakitmenular-pppk-1" value="1"> Tahu       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_2" id="penyakitmenular-pppk-2" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>2.	Sumber informasi tentang penyakit diperoleh dari: </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_3" id="penyakitmenular-pppk-3" value="1"> Dokter   
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_4" id="penyakitmenular-pppk-4" value="1"> Perawat   
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_5" id="penyakitmenular-pppk-5" value="1"> Keluarga      
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_6" id="penyakitmenular-pppk-6" value="1"> Lain-lain      
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitmenular_pppk_7" id="penyakitmenular-pppk-7" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>3.	Menerima informasi jangka waktu pengobatan: </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_8" id="penyakitmenular-pppk-8" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitmenular_pppk_9" id="penyakitmenular-pppk-9" class="custom-form clear-input" style="width: 200px;"readonly>
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_10" id="penyakitmenular-pppk-10" value="1"> minggu 
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_11" id="penyakitmenular-pppk-11" value="1"> bulan     
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_12" id="penyakitmenular-pppk-12" value="1"> tahun       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_13" id="penyakitmenular-pppk-13" value="1"> Tidak        
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>4.	Melakukan pemeriksaan rutin :   </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_14" id="penyakitmenular-pppk-14" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_15" id="penyakitmenular-pppk-15" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitmenular_pppk_16" id="penyakitmenular-pppk-16" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>5.	Cara penularan :    </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_17" id="penyakitmenular-pppk-17" value="1"> Airbone    
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_18" id="penyakitmenular-pppk-18" value="1"> Droplet   
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_19" id="penyakitmenular-pppk-19" value="1"> Kontak langsung       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_20" id="penyakitmenular-pppk-20" value="1"> Cairan tubuh       
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>6.	Penyakit penyerta :   </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_21" id="penyakitmenular-pppk-21" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitmenular_pppk_22" id="penyakitmenular-pppk-22" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitmenular_pppk_23" id="penyakitmenular-pppk-23" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>




                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="2" style="background-color: #E0FFFF; color: black;"><b>C.	Penyakit Penurunan Daya Tahan Tubuh </b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 25%; padding-left: 30px; vertical-align: middle;"> <b>1.	Pasien mengetahui penyakit saat ini :  </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_1" id="penyakitpenurunan-pppk-1" value="1"> Tahu       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_2" id="penyakitpenurunan-pppk-2" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>2.	Sumber informasi tentang penyakit diperoleh dari: </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_3" id="penyakitpenurunan-pppk-3" value="1"> Dokter   
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_4" id="penyakitpenurunan-pppk-4" value="1"> Perawat   
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_5" id="penyakitpenurunan-pppk-5" value="1"> Keluarga      
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_6" id="penyakitpenurunan-pppk-6" value="1"> Lain-lain      
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitpenurunan_pppk_7" id="penyakitpenurunan-pppk-7" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>3.	Menerima informasi jangka waktu pengobatan: </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_8" id="penyakitpenurunan-pppk-8" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitpenurunan_pppk_9" id="penyakitpenurunan-pppk-9" class="custom-form clear-input" style="width: 200px;"readonly>
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_10" id="penyakitpenurunan-pppk-10" value="1"> minggu 
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_11" id="penyakitpenurunan-pppk-11" value="1"> bulan     
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_12" id="penyakitpenurunan-pppk-12" value="1"> tahun       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_13" id="penyakitpenurunan-pppk-13" value="1"> Tidak        
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>4.	Melakukan pemeriksaan rutin :   </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_14" id="penyakitpenurunan-pppk-14" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_15" id="penyakitpenurunan-pppk-15" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitpenurunan_pppk_16" id="penyakitpenurunan-pppk-16" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; padding-left: 30px; vertical-align: middle;"> <b>6.	Penyakit penyerta :   </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_17" id="penyakitpenurunan-pppk-17" value="1"> Tidak
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="penyakitpenurunan_pppk_18" id="penyakitpenurunan-pppk-18" value="1"> Ya,
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="penyakitpenurunan_pppk_19" id="penyakitpenurunan-pppk-19" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="2" style="background-color: #E0FFFF; color: black;"><b>D.	Kesehatan Jiwa </b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Pernah mengalami gangguan jiwa sebelumnya</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_1" id="kesehatanjiwa-pppk-1" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_2" id="kesehatanjiwa-pppk-2" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Riwayat pengobatan sebelumnya</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_3" id="kesehatanjiwa-pppk-3" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_4" id="kesehatanjiwa-pppk-4" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_5" id="kesehatanjiwa-pppk-5" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_6" id="kesehatanjiwa-pppk-6" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Apakah pasien bisa merawat dirinya sendiri</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_7" id="kesehatanjiwa-pppk-7" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_8" id="kesehatanjiwa-pppk-8" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Apakah pasien dapat berkomunikasi dengan baik</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_9" id="kesehatanjiwa-pppk-9" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_10" id="kesehatanjiwa-pppk-10" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Apakah bicara pasien dapat dipahami oleh perawat/dokter</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_11" id="kesehatanjiwa-pppk-11" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_12" id="kesehatanjiwa-pppk-12" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Adakah resiko mencederai diri sendiri</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_13" id="kesehatanjiwa-pppk-13" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_14" id="kesehatanjiwa-pppk-14" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Adakah resiko mencederai orang lain</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_15" id="kesehatanjiwa-pppk-15" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_16" id="kesehatanjiwa-pppk-16" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%; padding-left: 30px; vertical-align: middle;"> <b>Apakah pasien dapat memahami instruksi dokter atau perawat dengan baik</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_17" id="kesehatanjiwa-pppk-17" value="1"> Ya       
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kesehatanjiwa_pppk_18" id="kesehatanjiwa-pppk-18" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>                                    
                                    </table>


                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="2" style="background-color: #E0FFFF; color: black;"><b>E.	Pasien yang mengalami kekerasan/penganiayaan </b></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Apakah anda mengalami kekerasan/penganiayaan </td>
                                            <td style="width: 80%; vertical-align: middle;"> :
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="kekerasanpenganiayaan_pppk_1" id="kekerasanpenganiayaan-pppk-1" value="1"> Ya
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kekerasanpenganiayaan_pppk_2" id="kekerasanpenganiayaan-pppk-2" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Jenis  kekerasan/penganiayaan yang dialami </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :</label>
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="kekerasanpenganiayaan_pppk_3" id="kekerasanpenganiayaan-pppk-3" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Sudah berapa lama mengalami kekerasan/penganiayaan </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :</label>
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="kekerasanpenganiayaan_pppk_4" id="kekerasanpenganiayaan-pppk-4" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Seberapa sering anda mengalami kekerasan/penganiayaan</td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :</label>
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="kekerasanpenganiayaan_pppk_5" id="kekerasanpenganiayaan-pppk-5" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Siapa yang melakukan kekerasan/penganiayaan </td>
                                            <td style="width: 80%; vertical-align: middle;">
                                                <label style="margin-right: 10px;"> :</label>
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-left: 10px;">
                                                    <input type="text" name="kekerasanpenganiayaan_pppk_6" id="kekerasanpenganiayaan-pppk-6" class="custom-form clear-input" style="width: 400px;"readonly>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; padding-left: 30px; vertical-align: middle;"> <b>Apakah korban memerlukan pendampingan </td>
                                            <td style="width: 80%; vertical-align: middle;"> :
                                                <label style="margin-left: 10px;"></label>
                                                <label style="margin-right: 10px;">
                                                    <input type="checkbox" name="kekerasanpenganiayaan_pppk_7" id="kekerasanpenganiayaan-pppk-7" value="1"> Ya
                                                </label>
                                                <label style="margin-left: 10px;">
                                                    <input type="checkbox" name="kekerasanpenganiayaan_pppk_8" id="kekerasanpenganiayaan-pppk-8" value="1"> Tidak
                                                </label>
                                            </td>
                                        </tr>                                        
                                    </table>



                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px; width: 100%;">
                                        <tr>
                                            <td colspan="3" class="center" style="background-color: #E0FFFF; color: black;"><b>MASALAH KEPERAWATAN </b></td>
                                        </tr>
                                        <tr>
                                            <td width="33%"><input type="checkbox" name="masalah_keppppk_1" id="masalah-keppppk-1" class="mr-1" value="1">Bersihan jalan napas tidak efektif</td>
                                            <td width="33%"><input type="checkbox" name="masalah_keppppk_2" id="masalah-keppppk-2" class="mr-1" value="1">Perubahan nutrisi kurang/lebih dari kebutuhan tubuh</td>
                                            <td width="33%"></td>
                                        </tr>  
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_3" id="masalah-keppppk-3" class="mr-1" value="1">Penurunan curah jantung</td>
                                            <td><input type="checkbox" name="masalah_keppppk_4" id="masalah-keppppk-4" class="mr-1" value="1">Cemas</td>
                                            <td></td>
                                        </tr>                                    
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_5" id="masalah-keppppk-5" class="mr-1" value="1">kerusakan pertukaran gas</td>
                                            <td><input type="checkbox" name="masalah_keppppk_6" id="masalah-keppppk-6" class="mr-1" value="1">Kurang perawatan diri</td>
                                            <td></td>
                                        </tr>                                    
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_7" id="masalah-keppppk-7" class="mr-1" value="1">Pola napas tidak efektif</td>
                                            <td><input type="checkbox" name="masalah_keppppk_8" id="masalah-keppppk-8" class="mr-1" value="1">Konflik peran</td>
                                            <td></td>
                                        </tr>                                    
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_9" id="masalah-keppppk-9" class="mr-1" value="1">Nyeri</td>
                                            <td><input type="checkbox" name="masalah_keppppk_10" id="masalah-keppppk-10" class="mr-1" value="1">Harga diri rendah</td>
                                            <td></td>
                                        </tr>                                    
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_11" id="masalah-keppppk-11" class="mr-1" value="1">Intoleransi aktifitas</td>
                                            <td><input type="checkbox" name="masalah_keppppk_12" id="masalah-keppppk-12" class="mr-1" value="1">Gangguan Pola tidur</td>
                                            <td></td>
                                        </tr>                                    
                                        <tr>
                                            <td><input type="checkbox" name="masalah_keppppk_13" id="masalah-keppppk-13" class="mr-1" value="1">Gangguan komunikasi verbal</td>
                                            <td><input type="text" name="masalah_keppppk_14" id="masalah-keppppk-14" class="custom-form clear-input" style="width: 400px;"></td>
                                            <td></td>
                                        </tr>                                    
                                    </table>


                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center" style="background-color: #E0FFFF; color: black;"><b>YANG MELAKUKAN PENGKAJIAN </b></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"></td>                 
                                            <td width="30%"></td>                                 
                                            <td width="30%"></td>                                 
                                        </tr>
                                        <tr>
                                            <th class="center" style="background-color: #E0FFFF; color: black;">Tanggal & Jam</th>
                                            <th class="center" style="background-color: #E0FFFF; color: black;">Nama Perawat</th>
                                            <th class="center" style="background-color: #E0FFFF; color: black;">Tanda tangan</th>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="tanggal_pkkk" id="tanggal-pkkk" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yy/ HH:ii"></td>
                                            <td class="center"><input type="text" name="perawatpkkk" id="perawatpkkk"class="select2c-input ml-2"></td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_pppk" id="ttd-pppk"value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_pppk_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianPasienPopulasiKhusus()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                <tr>
                    <td colspan="2"> <b>Nama Petugas : 
                    <?= $this->session->userdata('nama') ?>  <!-- Menampilkan nama pengguna yang disimpan dalam sesi -->
                    <input type="hidden" name="id_user_maternal" value="<?= $this->session->userdata("id_translucent") ?>">  
                    <!-- Input hidden yang menyimpan nilai 'id_translucent' dari sesi pengguna. Nilai ini tidak terlihat di halaman, tetapi akan dikirimkan saat form disubmit. -->
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
