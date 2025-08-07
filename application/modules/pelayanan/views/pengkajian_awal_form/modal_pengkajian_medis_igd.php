<!-- Modal Riwayat Pasien -->
<div id="modal-pengkajian-medis-igd" class="modal fade" role="dialog" aria-labelledby="modal-pengkajian-medis-igd-label" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pengkajian-medis-igd-label">Pengkajian Medis dan Keperawatan IGD <span id="judul-riwayat"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- header -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="pmigd-pasien-nama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="pmigd-pasien-no-rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="pmigd-pasien-tanggal-lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="pmigd-pasien-jenis-kelamin"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_pengkajian_awal_igd_ranap">
                                <ol>
                                    <li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
                                    <li>Pengkajian Keperawatan <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                </ol>

                                <input type="hidden" id="id-pendaftaran-rm">
                                <input type="hidden" id="id-layanan_pendaftaran-igd">
                                
                                <div class="col-lg-12">
                                    <table class="table table-no-border table-striped  table-sm">
                                        <tbody>
                                            <tr>
                                                <td width="20%"><b>Dokter Jaga IGD</b></td>
                                                <td width="80%"><b><span id="pmigd-dokter-igd"></span></b></td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><b>Dokter DPJP</b></td>
                                                <td><b><span id="pmigd-dokter-dpjp"></span></b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td width="30%"><b>Waktu Pengkajian</b></td>
                                                <td><span id="pmigd-waktu"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Keluhan Utama</b></td>
                                                <td><span id="pmigd-keluhan-utama"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Sekarang</b></td>
                                                <td><span id="pmigd-penyakit-skr"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Terdahulu</b></td>
                                                <td><span id="pmigd-penyakit-dulu"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Keluarga</b></td>
                                                <td><span id="pmigd-penyakit-keluarga"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan</b></td>
                                                <td><span id="pmigd-riwayat"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Alergi</b></td>
                                                <td><span id="pmigd-alergi"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Reaksi Alergi</b></td>
                                                <td><span id="pmigd-kreaksi-alergi"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>



                                    <!-- START Row Data Pengkajian Nyeri IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-nyeri-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN NYERI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-nyeri-igd">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3"><h6><b>UNTUK NEONATUS</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="22%">Menangis</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="pmigd-neonatus-menangis"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SPO2 > 95%</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-neonatus-spo"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Peningkatan Tanda-Tanda Vital</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-neonatus-vital"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ekspresi Wajah</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-neonatus-wajah"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Tidur</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-neonatus-tidur"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td><b>TOTAL</b></td>
                                                        <td>:</td>
                                                        <td><b><span id="pmigd-neonatus-total"></span></b></td>
                                                    </tr>        
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>         
                                                    <tr>
                                                        <td>Keterangan Nyeri</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-ket-nyeri"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td>Nyeri Hilang, Bila</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-ket-nyeri-hilang"></span></td>
                                                    </tr>                       
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3"><h6><b>Untuk Anak Usia < 3 tahun FLACC</b></h6></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%">Wajah</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="pmigd-flacc-wajah"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kaki</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-flacc-kaki"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aktifitas</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-flacc-aktifitas"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Menangis</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-flacc-menangis"></span></td>
                                                    </tr>        
                                                    <tr>
                                                        <td>Bicara / Suara</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-flacc-bicara"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td><b>TOTAL</b></td>
                                                        <td>:</td>
                                                        <td><b><span id="pmigd-flacc-total"></span></b></td>
                                                    </tr>                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data Pengkajian Nyeri IGD -->

                                    <!-- START Row Data PEMERIKSAAN FISIK IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-igd">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="20%">Kepala</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="pmigd-fisik-kepala"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mata</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-mata"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mulut</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-mulut"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Leher</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-leher"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Thoraks Cor </td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-thoraks-cor"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td>Thoraks Pulmo</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-thoraks-pulmo"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td>Abdomen</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-abdomen"></span></td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Ekstermitas</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-ekstermitas"></span></td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Kulit dan Kelamin</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-kulit-kelamin"></span></td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Diagnosis Awal</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-diagnosa-awal"></span></td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Diagnosis Banding</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-fisik-diagnosa-banding"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td width="20%">Status Lokalis</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="pmigd-fisik-status-lokalis"></span></td>
                                                    </tr>                     
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <!-- Untuk Gambar Anatomi -->
                                                    <td width="30%" rowspan="8">
                                                        <div class="box-draw">
                                                            <img src="<?php echo base_url('resources/images/attributes/') . 'anathomi-fix.jpg' ?>" width="361" height="434">
                                                            <div class="drawpad" id="drawpad" data-input="#drawpad"></div>
                                                            <img style="margin-left:-364px" src="" id="fisik_img_anathomi_igd" width="361" height="434">
                                                        </div>
                                                        <!-- <button type="button" id="btn_hapus_drawpad" class="btn btn-secondary btn-block" onclick="hapusDrawpad()"><i class="fas fa-trash mr-2"></i>Clear Canvas</button> -->

                                                        <input type="hidden" name="drawpad" id="drawpad_input" value="">
                                                    </td>
                                                    <!-- End -->

                                                                            
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data PEMERIKSAAN FISIK IGD -->

                                    <!-- START Row Data PEMERIKSAAN PENUNJANG IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-penunjang-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN PENUNJANG
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-penunjang-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="15%">Lab</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="84%"><span id="pmigd-penunjang-lab"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>X-Ray</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-penunjang-xray"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>EKG</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-penunjang-ekg"></span></td>
                                                    </tr>                  
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data PEMERIKSAAN PENUNJANG IGD -->

                                    <!-- START Row Data Terapi / Tindakan / Instruksi Lain -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-tindakan-igd"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI / TINDAKAN / INSTRUKSI LAIN</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-terapi-tindakan-igd">
                                    <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="15%">Terapi / Tindakan / Intruksi Lain</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="84%"><span id="field_terapi_tindakan_igd"></span></td>
                                                    </tr>             
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div id="field_terapi_tindakan_igd" ></div> -->
                                    </div>
                                    <!-- END Row Data Terapi / Tindakan / Instruksi Lain -->


                                    <!-- START Row Data STATUS AKHIR PASIEN IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-status-akhir-igd"><i class="fas fa-expand mr-1"></i>Expand</button>STATUS AKHIR PASIEN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-status-akhir-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="15%">Dirawat di Ruang</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="84%"><span id="pmigd-status-akhir-ruang"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dipulangkan</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-dipulangkan"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dirujuk Ke</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-dirujuk"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td>Alasan Rujuk</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-alasanrujuk"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pulang Paksa / APS</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-pulangpaksa"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Meninggal</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-meninggal"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kondisi Pasien Saat Pulang/Rujuk</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-kondisipasien"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Kesadaran</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-kesadaran"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kebutuhan layanan</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-jenis-kebutuhan-layanan"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCS</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-gcs"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Catatan Khusus</td>
                                                        <td>:</td>
                                                        <td><span id="pmigd-status-akhir-catatan"></span></td>
                                                    </tr>               
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data STATUS AKHIR PASIEN IGD -->
                                </div>

                    <!------------------------------------------------------------------------------------------------------------------------------------------------------>

                                <!-- STAR TAB KEPERAWATAN -->
                                <div class="col-lg-12">
                                    <table class="table table-no-border table-striped  table-sm">
                                        <tbody>
                                            <tr>
                                                <td width="20%"><b>Perawat Jaga IGD<b></td>
                                                <td width="1%">:</td>
                                                <td width="79%"><b><span id="ppigd-dokter-igd"><b></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Dokter DPJP</b></td>
                                                <td>:</td>
                                                <td><b><span id="ppigd-dokter-dpjp"><b></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><b>Informasi Diperoleh dari</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-informasi-dari"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Cara Masuk</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-cara-masuk"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Keluhan Utama</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-keluhan-utama"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Sekarang</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-riwayat-penyakit-sekarang"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Terdahulu</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-riwayat-penyakit-terdahulu"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Riwayat Penyakit Keluarga</b></td>
                                                <td>:</td>
                                                <td><span id="ppigd-riwayat-penyakit-keluarga"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- START Row Data PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik-vital-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-vital-igd">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="20%">Kesadaran</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="ppigd-fisikvital-kesadaran"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tekanan Darah</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-fisikvital-tensi"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frekuensi Nadi</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-fisikvital-nadi"></span></td>
                                                    </tr>             
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="20%">GCS</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="ppigd-fisikvital-gcs"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Suhu</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-fisikvital-suhu"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frekuensi Nafas</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-fisikvital-nafas"></span></td>
                                                    </tr>                           
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL IGD -->

                                    <!-- START Row Data PSIKOSOSIAL, EKONOMI IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-psikologis-mental-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PSIKOSOSIAL, EKONOMI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-psikologis-mental-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="15%">Status Psikologis</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="84%"><span id="ppigd-psikologis-mental-status-psikologis"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Mental</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-psikologis-mental-status-mental"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-psikologis-mental-pekerjaan"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td>Cara Bayar</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-psikologis-mental-carabayar"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data PSIKOSOSIAL, EKONOMI IGD -->

                                    <!-- START Row Data PENILAIAN RESIKO JATUH IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-resiko-jatuh-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO JATUH
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-resiko-jatuh-igd">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td class="center" colspan="3"><h6><b>Penilaian Resiko Jatuh Anak</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" width="35%"><b>PARAMETER</b></td>
                                                        <td class="center" wdith="50%"><b>KRITERIA</b></td>
                                                        <td class="center" wdith="15%"><b>SKOR</b></td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Umur</td>
                                                        <td><span id="ppigd-jatuhanak-umur-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-umur-skor"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelamin</td>
                                                        <td><span id="ppigd-jatuhanak-kelamin-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-kelamin-skor"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diagnosis</td>
                                                        <td><span id="ppigd-jatuhanak-diag-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-diag-skor"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td>Gangguan Kognitif</td>
                                                        <td><span id="ppigd-jatuhanak-ggkog-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-ggkog-skor"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td>Faktor Lingkungan</td>
                                                        <td><span id="ppigd-jatuhanak-fling-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-fling-skor"></span></td>
                                                    </tr>           
                                                    <tr>
                                                        <td>Respon Terhadap Pembedahan, Sedasi dan Anastesi</td>
                                                        <td><span id="ppigd-jatuhanak-bedah-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-bedah-skor"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td>Penggunaan Obat - obatan</td>
                                                        <td><span id="ppigd-jatuhanak-obat-kriteria"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhanak-obat-skor"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td><b>JUMLAH SKOR</b></td>
                                                        <td></td>
                                                        <td class="center"><b><span id="ppigd-jatuhanak-jmlskor"></span></b></td>
                                                    </tr>       
                                                    <tr>
                                                        <td colspan="3"><b>Resiko Rendah : 7 - 11 | Resiko Tinggi : >= 12</b></td>
                                                    </tr>                 
                                                </table>
                                            </div>

                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td class="center" colspan="4"><h6><b>Penilaian Resiko Jatuh Dewasa</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" width="5%"></td>
                                                        <td class="center" width="65%"><b>PARAMETER</b></td>
                                                        <td class="center" wdith="20%"><b>NILAI</b></td>
                                                        <td class="center" wdith="10%"><b>SKOR</b></td> 
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Riwayat jatuh dalam waktu 3 bulan sebab apapun</td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-riwayatjatuh-nilai"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-riwayatjatuh-skor"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td colspan="2">Diagnosis Sekunder (≥ Diagnosis Medis)</td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-diagsek-nilai"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-diagsek-skor"></span></td>
                                                    </tr>     
                                                    <tr>
                                                        <td colspan="4"><b>Alat Bantu Jalan</b></td>
                                                    </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>Tidak Ada / Kursi Roda</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-tidak-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-tidak-skor"></span></td>
                                                            </tr>    
                                                            <tr>
                                                                <td></td>
                                                                <td>Kruk / Tongkat / Walker</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-kruk-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-kruk-skor"></span></td>
                                                            </tr> 
                                                            <tr>
                                                                <td></td>
                                                                <td>Berpegangan pada benda-benda disekitar / Furniture</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-pegangan-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-alatbantu-pegangan-skor"></span></td>
                                                            </tr> 
                                                    <tr>
                                                        <td colspan="2">Terpasang Infus / Heparin Lock</td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-infus-nilai"></span></td>
                                                        <td class="center"><span id="ppigd-jatuhdewasa-infus-skor"></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td colspan="4"><b>Cara Berjalan atau Berpindah</b></td>
                                                    </tr>   
                                                            <tr>
                                                                <td></td>
                                                                <td>Normal / Bedrest / Imobilisasi</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-normal-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-normal-skor"></span></td>
                                                            </tr>    
                                                            <tr>
                                                                <td></td>
                                                                <td>Lemah</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-lemah-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-lemah-skor"></span></td>
                                                            </tr> 
                                                            <tr>
                                                                <td></td>
                                                                <td>Terganggu</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-terganggu-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-carajln-terganggu-skor"></span></td>
                                                            </tr> 
                                                    <tr>
                                                        <td colspan="4"><b>Status Mental</b></td>
                                                    </tr>   
                                                            <tr>
                                                                <td></td>
                                                                <td>Sadar Akan Kemampuan Diri Sendiri</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-mental-sadar-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-mental-sadar-skor"></span></td>
                                                            </tr>    
                                                            <tr>
                                                                <td></td>
                                                                <td>Sering Lupa akan Keterbatasan Yang dimiliki</td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-mental-lupa-nilai"></span></td>
                                                                <td class="center"><span id="ppigd-jatuhdewasa-mental-lupa-skor"></span></td>
                                                            </tr> 
                                                    <tr>
                                                        <td colspan="3"><b>JUMLAH SKOR</b></td>
                                                        <td class="center"><b><span id="ppigd-jatuhdewasa-jmlskor"></b></span></td>
                                                    </tr>   
                                                    <tr>
                                                        <td colspan="4"><b>Tidak Beresiko : 0 - 24  | Resiko Rendah : 25 - 50 | Resiko Tinggi : ≥ 51</b></td>
                                                    </tr>      
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row PENILAIAN RESIKO JATUH IGD -->

                                    <!-- START Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->
									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-resiko-jatuh-lansia-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN RESIKO JATUH LANSIA <i>(Usia > 60 th)</i>
											</td>
										</tr>
									</table>
									<div class="collapse multi-collapse mt-2" id="data-penilaian-resiko-jatuh-lansia-igd">
										<table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
											<thead>
												<tr>
													<th class="center" width="5%"><b>No.</b></th>
													<th class="center" width="20%"><b>Parameter</b></th>
													<th class="center" width="45%"><b>Skrining</b></th>
													<th class="center" width="15"><b>Jawaban</b></th>
													<th class="center" width="15%"><b>Keterangan Nilai</b></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th rowspan="2" class="center v-center">1.</th>
													<td rowspan="2">Riwayat Jatuh</td>
													<td>Apakah pasien datang ke RS karena jatuh ?</td>
													<td class="center"><span id="ppigd-resikojatuh-riwayatjatuh1"></span></td>
													<td rowspan="2">Salah satu jawabannya = 6</td>
												</tr>
												<tr>
													<td>Jika Tidak, Apakah pasien mengalami jatuh dalam 2 bulan terakhir ini ?</td>
													<td class="center"><span id="ppigd-resikojatuh-riwayatjatuh2"></span></td>
												</tr>
												<tr>
													<th rowspan="3" class="center v-center">2.</th>
													<td rowspan="3">Status Mental</td>
													<td>Apakah pasien delirium ? (Tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)</td>
													<td class="center"><span id="ppigd-resikojatuh-mental1"></span></td>
													<td rowspan="3">Salah satu jawabannya = 14</td>
												</tr>
												<tr>
													<td>Apakah pasien disorientasi ? (Salah menyebutkan waktu, tempat atau orang)</td>
													<td class="center"><span id="ppigd-resikojatuh-mental2"></span></td>
												</tr>
												<tr>
													<td>Apakah pasien mengalami agitasi ? (Ketakutan, gelisah dan cemas)</td>
													<td class="center"><span id="ppigd-resikojatuh-mental3"></span></td>
												</tr>
												<tr>
													<th rowspan="3" class="center v-center">3.</th>
													<td rowspan="3">Penglihatan</td>
													<td>Apakah pasien memakai kacamata ?</td>
													<td class="center"><span id="ppigd-resikojatuh-penglihatan1"></span></td>
													<td rowspan="3">Salah satu jawabannya = 1</td>
												</tr>
												<tr>
													<td>Apakah pasien mengeluh adanya penglihatan buram ?</td>
													<td class="center"><span id="ppigd-resikojatuh-penglihatan2"></span></td>
												</tr>
												<tr>
													<td>Apakah pasien mempunyai galukoma ? Katarak / degenarasi makula</td>
													<td class="center"><span id="ppigd-resikojatuh-penglihatan3"></span></td>
												</tr>
												<tr>
													<th class="center v-center">4.</th>
													<td>Kebiasaan Berkemih</td>
													<td>Apakah terdapat perubahan perilaku berkemih ? (Frekuensi, urgensi, inkontinensia, nokturia)</td>
													<td class="center"><span id="ppigd-resikojatuh-berkemih"></span></td>
													<td>Salah satu jawabannya = 2</td>
												</tr>
												<tr>
													<th rowspan="4" class="center v-center">5.</th>
													<td rowspan="4">Transfer dari tempat tidur kekurasi dan kembali lagi ketempat tidur</td>
													<td>Mandiri (Boleh memakai alat bantu jalan)</td>
													<td class="center"><span id="ppigd-resikojatuh-transfer1"></span></td>
													<td rowspan="8">Jumlah nilai transfer dan mobilitas jika nilai total 0 - 3 = 0, nilai total 4 - 6 = 7</td>
												</tr>
												<tr>
													<td>Memerlukan sedikit bantuan (1 orang) / dalam pengawasan</td>
													<td class="center"><span id="ppigd-resikojatuh-transfer2"></span></td>
												</tr>
												<tr>
													<td>Memerlukan bantuan yang nyata (2 orang)</td>
													<td class="center"><span id="ppigd-resikojatuh-transfer3"></span></td>
												</tr>
												<tr>
													<td>Tidak dapat duduk dengan seimbang, perlu bantuan total</td>
													<td class="center"><span id="ppigd-resikojatuh-transfer4"></span></td>
												</tr>
												<tr>
													<th rowspan="4" class="center v-center">6.</th>
													<td rowspan="4">Mobilitas</td>
													<td>Mandiri (Boleh memakai alat bantu jalan)</td>
													<td class="center"><span id="ppigd-resikojatuh-mobilitas1"></span></td>
												</tr>
												<tr>
													<td>Berjalan dengan bantuan 1 orang (verbal / fisik)</td>
													<td class="center"><span id="ppigd-resikojatuh-mobilitas2"></span></td>
												</tr>
												<tr>
													<td>Menggunakan kursi roda</td>
													<td class="center"><span id="ppigd-resikojatuh-mobilitas3"></span></td>
												</tr>
												<tr>
													<td>Imobilisasi</td>
													<td class="center"><span id="ppigd-resikojatuh-mobilitas4"></span></td>
												</tr>
												<tr>
													<td colspan="3" class="bold center">TOTAL</td>                                                    
													<td class="center"><b><span id="ppigd-resikojatuh-total"></span></b></td>
													<td></td>
												</tr>
												<tr>
                                                    <td colspan="5"><b>Resiko Rendah = 0 - 5  |  Resiko Sedang= 6 - 16  |  Resiko Tingg = 17 - 30</b></td>
												</tr>
											</tbody>
										</table>
									</div>
                                    <!-- END Row Data Penilaian Resiko Jatuh Lansia (Usia > 60 th) -->

                                    <!-- START Row Data Penilaian Tingkat Nyeri -->
									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-penilaian-tingkat-nyeri"><i class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT NYERI
											</td>
										</tr>
									</table>
                                    <div class="collapse multi-collapse mt-2" id="data-penilaian-tingkat-nyeri">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="20%">Skala Nyeri</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="ppigd-nyeri-sekala"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frekuensi Nyeri</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-nyeri-frekuensi"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lama Nyeri</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-nyeri-lama"></span></td>
                                                    </tr>             
                                                </table>
                                            </div>

                                            <div class="col-lg-7">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td width="34%">Kualitas Nyeri</td>
                                                        <td wdith="1%">:</td>
                                                        <td><span id="ppigd-nyeri-keperawatan"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Faktor - Faktor yang Memperberat Nyeri</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-nyeri-pemberat"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Faktor - Faktor yang Mengurangi Nyeri</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-nyeri-pengurang"></span></td>
                                                    </tr>                           
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data Penilaian Tingkat Nyeri -->

                                    <!-- START Row Data Skala Early Warning System (News) -->
									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system-igd"><i class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY WARNING SYSTEM (EWS)
											</td>
										</tr>
									</table>
									<div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system-igd">
										<table class="table table-sm" style="margin-top: -15px">
											<tr>
												<td width="75%">
													<table class="table table-sm table-striped table-bordered">
														<thead>
															<tr>
																<th class="center" colspan="10"><b>NEWS</b></th>
															</tr>
															<tr>
																<th width="5%" class="center"><b>No.</b></th>
																<th width="15%"><b>Parameter Fisiologis</b></th>
																<th width="10%" class="center"><b>3</b></th>
																<th width="10%" class="center"><b>2</b></th>
																<th width="10%" class="center"><b>1</b></th>
																<th width="10%" class="center"><b>0</b></th>
																<th width="10%" class="center"><b>1</b></th>
																<th width="10%" class="center"><b>2</b></th>
																<th width="10%" class="center"><b>3</b></th>
																<th width="10%" class="center"><b>Blue Kriteria</b></th>
															</tr>
														</thead>
														<tbody>
															<!-- Desclaimer -->
															<!-- Nilai value setelah dash itu ada lah urut sesuai parameter nya... yang dipakai adalah nilai awal nya -->
															<tr>
																<td class="center">1.</td>
																<td>Laju Respirasi /Menit</td>
																<td class="center"><span id="ppigd-ews-laju-1"></span>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-laju-2"></span>
																<td class="center"><span id="ppigd-ews-laju-3"></span>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-laju-4"></span>
																<td class="center"><span id="ppigd-ews-laju-5"></span>
																<td class="center"><span id="ppigd-ews-laju-6"></span>
															</tr>
															<tr>
																<td class="center">2.</td>
																<td>Saturasi O₂ (%)</td>
																<td class="center"><span id="ppigd-ews-saturasi-1"></span>
																<td class="center"><span id="ppigd-ews-saturasi-2"></span>
																<td class="center"><span id="ppigd-ews-saturasi-3"></span>
																<td class="center"><span id="ppigd-ews-saturasi-4"></span>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
															</tr>
															<tr>
																<td class="center">3.</td>
																<td>Suplemen O₂ (%)</td>suplemen
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-suplemen-1"></span>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-suplemen-2"></span>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
															</tr>
															<tr>
																<td class="center">4.</td>
																<td>Temperatur (°C)</td>
																<td class="center"><span id="ppigd-ews-temperatur-1"></span>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-temperatur-2"></span>
																<td class="center"><span id="ppigd-ews-temperatur-3"></span>
																<td class="center"><span id="ppigd-ews-temperatur-4"></span>
																<td class="center"><span id="ppigd-ews-temperatur-5"></span>
																<td class="center"></td>
																<td class="center"></td>
															</tr>
															<tr>
																<td class="center">5.</td>
																<td>TDS (mmHg)</td>
																<td class="center"><span id="ppigd-ews-tds-1"></span>
																<td class="center"><span id="ppigd-ews-tds-2"></span>
																<td class="center"><span id="ppigd-ews-tds-3"></span>
																<td class="center"><span id="ppigd-ews-tds-4"></span>
																<td class="center"><span id="ppigd-ews-tds-5"></span>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-tds-6"></span>
																<td class="center"><span id="ppigd-ews-tds-7"></span>
															</tr>
															<tr>
																<td class="center">6.</td>
																<td>Laju Jantung /Menit</td>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-jantung-1"></span>
																<td class="center"><span id="ppigd-ews-jantung-2"></span>
																<td class="center"><span id="ppigd-ews-jantung-3"></span>
																<td class="center"><span id="ppigd-ews-jantung-4"></span>
																<td class="center"><span id="ppigd-ews-jantung-5"></span>
																<td class="center"><span id="ppigd-ews-jantung-6"></span>
															</tr>
															<tr>
																<td class="center">7.</td>
																<td>Kesadaran</td>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-kesadaran-1"></span>
																<td class="center"></td>
																<td class="center"></td>
																<td class="center"><span id="ppigd-ews-kesadaran-2"></span>
																<td class="center"><span id="ppigd-ews-kesadaran-3"></span>
															</tr>
															<tr>
																<td colspan="10"></td>
															</tr>
															<tr>
																<td colspan="2"><b>TOTAL</b></td>
																<td colspan="8">
                                                                    <span id="ppigd-ews-total-1"></span> 
																	<span id="ppigd-ews-total-2"></span>
																	<span id="ppigd-ews-total-3"></span>
																	<span id="ppigd-ews-total-4"></span>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td width="25%" style="vertical-align: top !important;">
													<span class="bold">Keterangan :</span><br>
													<span>A = Alert (Sadar Penuh)</span><br>
													<span>V = Verbal (Respon dengan Rangsang Suara) Somnolen, Dapat Ditenangkan</span><br>
													<span>P = Pain (Respon dengan Rangsang Nyeri) Letargi, Gelisah, Penurunan Respon Nyeri</span><br>
													<span>U = Unrespon</span>
												</td>
											</tr>
										</table>

										<hr>

										<table class="table table-sm table-striped table-bordered">
											<thead>
												<tr>
													<th class="center" colspan="8"><b>PEWS</b></th>
												</tr>
												<tr>
													<th width="20%"><b>Parameter</b></th>
													<th width="10%" class="center"><b>3</b></th>
													<th width="10%" class="center"><b>2</b></th>
													<th width="10%" class="center"><b>1</b></th>
													<th width="10%" class="center"><b>0</b></th>
													<th width="10%" class="center"><b>1</b></th>
													<th width="10%" class="center"><b>2</b></th>
													<th width="10%" class="center"><b>3</b></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Suhu</td>
													<td></td>
													<td class="center"><span id="ppigd-pews-suhu-1"></span>
                                                    <td class="center"><span id="ppigd-pews-suhu-2"></span>
													<td class="center"><span id="ppigd-pews-suhu-3"></span>
													<td class="center"><span id="ppigd-pews-suhu-4"></span>
													<td class="center"><span id="ppigd-pews-suhu-5"></span>
													<td></td>
												</tr>
												<tr>
													<td>Pernafasan</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td><span class="ml-3">< 28 Hari</span> </td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-1a"></span>
                                                    <td></td>
													<td class="center"><span id="ppigd-pews-pernafasan-2a"></span>
													<td class="center"><span id="ppigd-pews-pernafasan-3a"></span>
													<td></td>
													<td></td>
													<td class="center"><span id="ppigd-pews-pernafasan-4a"></span>
												</tr>
												<tr>
													<td><span class="ml-3">1-12 Bulan</span></td>
													<td class="center"><span id="ppigd-pews-pernafasan-1b"></span>
													<td></td>
													<td class="center"><span id="ppigd-pews-pernafasan-2b"></span>
													<td class="center"><span id="ppigd-pews-pernafasan-3b"></span>
													<td class="center"><span id="ppigd-pews-pernafasan-4b"></span>
													<td class="center"><span id="ppigd-pews-pernafasan-5b"></span>
													<td class="center"><span id="ppigd-pews-pernafasan-6b"></span>
												</tr>
												<tr>
													<td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-1c"></span>
                                                    <td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-2c"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-3c"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-4c"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-5c"></span>
												</tr>
												<tr>
													<td><span class="ml-3">4-6 Tahun</span></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-1d"></span>
                                                    <td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-2d"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-3d"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-4d"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-5d"></span>
												</tr>
												<tr>
													<td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-1e"></span>
                                                    <td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-2e"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-3e"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-4e"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-5e"></span>
												</tr>
												<tr>
													<td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-1f"></span>
                                                    <td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-2f"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-3f"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-4f"></span>
                                                    <td class="center"><span id="ppigd-pews-pernafasan-5f"></span>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-subpernafasan-1"></span>
                                                    <td class="center"><span id="ppigd-pews-subpernafasan-2"></span>
                                                    <td class="center"><span id="ppigd-pews-subpernafasan-3"></span>
                                                    <td class="center"><span id="ppigd-pews-subpernafasan-4"></span>
												</tr>
												<tr>
													<td>Alat Bantu O₂</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-alat_bantu-1"></span>
                                                    <td class="center"><span id="ppigd-pews-alat_bantu-2"></span>
                                                    <td class="center"><span id="ppigd-pews-alat_bantu-3"></span>
                                                    <td class="center"><span id="ppigd-pews-alat_bantu-4"></span>
												</tr>
												<tr>
													<td>Saturasi O₂</td>
													<td class="center"><span id="ppigd-pews-saturasi-1"></span>
                                                    <td class="center"><span id="ppigd-pews-saturasi-2"></span>
                                                    <td class="center"><span id="ppigd-pews-saturasi-3"></span>
                                                    <td class="center"><span id="ppigd-pews-saturasi-4"></span>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>Nadi</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td><span class="ml-3">< 28 Hari</span> </td> 
                                                    <td class="center"><span id="ppigd-pews-nadi-1a"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2a"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3a"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4a"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5a"></span>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-nadi-6a"></span>
												</tr>
												<tr>
													<td><span class="ml-3">1-12 Bulan</span></td>
													<td class="center"><span id="ppigd-pews-nadi-1b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-6b"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-7b"></span>
												</tr>
												<tr>
													<td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><span id="ppigd-pews-nadi-1c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-6c"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-7c"></span>
												</tr>
												<tr>
													<td><span class="ml-3">4-6 Tahun</span></td>
													<td class="center"><span id="ppigd-pews-nadi-1d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-6d"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-7d"></span>
												</tr>
												<tr>
													<td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><span id="ppigd-pews-nadi-1e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-6e"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-7e"></span>
												</tr>
												<tr>
													<td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><span id="ppigd-pews-nadi-1f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-2f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-3f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-4f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-5f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-6f"></span>
                                                    <td class="center"><span id="ppigd-pews-nadi-7f"></span>
												</tr>
												<tr>
													<td>Warna Kulit</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-kulit-1"></span>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-kulit-2"></span>
                                                    <td class="center"><span id="ppigd-pews-kulit-3"></span>
												</tr>
												<tr>
													<td>TDS</td>
                                                    <td class="center"><span id="ppigd-pews-tds-1"></span>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-tds-2"></span>
                                                    <td class="center"><span id="ppigd-pews-tds-3"></span>
                                                    <td class="center"><span id="ppigd-pews-tds-4"></span>
                                                    <td class="center"><span id="ppigd-pews-tds-5"></span>
                                                    <td class="center"><span id="ppigd-pews-tds-6"></span>
												</tr>
												<tr>
													<td>Kesadaran</td>
                                                    <td class="center"><span id="ppigd-pews-kesadaran-1"></span>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-kesadaran-2"></span>
                                                    <td class="center"><span id="ppigd-pews-kesadaran-3"></span>
                                                    <td class="center"><span id="ppigd-pews-kesadaran-4"></span>
													<td></td>
                                                    <td class="center"><span id="ppigd-pews-kesadaran-5"></span>
												</tr>
												<tr>
													<td><b>TOTAL</b></td>
													<td colspan="7">
                                                        <span id="ppigd-pews-total-1"></span> 
                                                        <span id="ppigd-pews-total-2"></span>
                                                        <span id="ppigd-pews-total-3"></span>
                                                        <span id="ppigd-pews-total-4"></span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
                                    <!-- END Row Data Skala Early Warning System (News) -->

                                    <!-- START Row Data PENGKAJIAN SPIRITUAL IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-spiritual-igd"><i class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN SPIRITUAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-spiritual-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <!-- <td wdith="5%"></td> -->
                                                        <td width="15%" colspan="2">Kegiatan keagamaan yang biasa dilakukan</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="84%"><span id="ppigd-spiritual-kegiatan"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">Kemampuan beribadah (Khusus Muslim)</td>
                                                    </tr>
                                                    <tr>
                                                        <td wdith="5%"></td>
                                                        <td>Wajib Ibadah</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-spiritual-ibadah"></span></td>
                                                    </tr>    
                                                    <tr>
                                                        <td></td>
                                                        <td>Thaharoh</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-spiritual-thaharoh"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Sholat</td>
                                                        <td>:</td>
                                                        <td><span id="ppigd-spiritual-sholat"></span></td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data PPENGKAJIAN SPIRITUAL IGD -->

                                    <!-- START Row Data Status Nutisi dan Status Fungsional IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-status-nutrisi-fungsional-igd"><i class="fas fa-expand mr-1"></i>Expand</button>STATUS NUTRISI DAN STATUS FUNGSIONAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-status-nutrisi-fungsional-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td wdith="20%">STATUS NUTRISI (Adakah Penurunan Berat Badan)</td> 
                                                    <td wdith="1%">:</td>
                                                    <td><span id="ppigd-nutrisi-penurunanbb"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>STATUS FUNGSIONAL</td>
                                                    <td>:</td>
                                                    <td><span id="ppigd-nutrisi-fungsional"></span></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data Status Nutisi dan Status Fungsional IGD -->

                                    <!-- START Row Data MASALAH KEPERAWATAN IGD -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan-igd"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan-igd">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-1"></span>
                                                        <td><span id="ppigd-keperawatan-2"></span>
                                                        <td><span id="ppigd-keperawatan-3"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-4"></span>
                                                        <td><span id="ppigd-keperawatan-5"></span>
                                                        <td><span id="ppigd-keperawatan-6"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-7"></span>
                                                        <td><span id="ppigd-keperawatan-8"></span>
                                                        <td><span id="ppigd-keperawatan-9"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-10"></span>
                                                        <td><span id="ppigd-keperawatan-11"></span>
                                                        <td><span id="ppigd-keperawatan-12"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-13"></span>
                                                        <td><span id="ppigd-keperawatan-14"></span>
                                                        <td><span id="ppigd-keperawatan-15"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-16"></span>
                                                        <td><span id="ppigd-keperawatan-17"></span>
                                                        <td><span id="ppigd-keperawatan-18"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-19"></span>
                                                        <td><span id="ppigd-keperawatan-20"></span>
                                                        <td><span id="ppigd-keperawatan-21"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-22"></span>
                                                        <td><span id="ppigd-keperawatan-23"></span>
                                                        <td><span id="ppigd-keperawatan-24"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-25"></span>
                                                        <td><span id="ppigd-keperawatan-26"></span>
                                                        <td><span id="ppigd-keperawatan-27"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-28"></span>
                                                        <td><span id="ppigd-keperawatan-29"></span>
                                                        <td><span id="ppigd-keperawatan-30"></span>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-31"></span>
                                                        <td><span id="ppigd-keperawatan-32"></span>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span id="ppigd-keperawatan-33"></span>
                                                        <td><span id="ppigd-keperawatan-34"></span>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Row Data MASALAH KEPERAWATAN IGD -->

                                </div>
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i>Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Riwayat Pasien -->