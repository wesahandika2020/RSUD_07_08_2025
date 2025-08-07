<!-- Modal Riwayat Pasien -->
<div id="modal-pengkajian-awal-igd" class="modal fade" role="dialog" aria-labelledby="modal-pengkajian-awal-igd-label" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pengkajian-awal-igd-label">Pengkajian Medis dan Keperawatan IGD <span id="judul-riwayat"></span></h4>
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
                            <div id="wizard_form_pengkajian_awal_igd">
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


<script>
	$(function() {
		$("#wizard_form_pengkajian_awal_igd").bwizard();
    })

    function riwayatPengkajianAwalIGD() {       
        let id_pendaftaran = $('#id_pendaftaran_search').val();
		let id_lay_pend    = $('#id_laypen_igd').val();
		let id_pasien      = $('#id_pasien_search').val();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_data_pengkajian_medis_igd") ?>/id/'+id_pasien+'/id_pendaftaran/'+id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				// console.log(data);
				showDataPasienPengkajianAwalIGD(data.pasien);
				
                if(data.kajian_medis !== null){					
					showDataPengkajianMedisIGD(data.kajian_medis);				
                	showDataPengkajianKeperawatanIGD(data.kajian_keperawatan);
					$('#modal-pengkajian-awal-igd').modal('show');
				} else {
					messageCustom('Pengkajian Awal IGD Belum Diisi', 'Info');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Pengkajian Awal IGD Tidak Tersedia', 'Info');
            }
        });
    }

	function showDataPasienPengkajianAwalIGD(pasien) {
		$('#pmigd-pasien-nama').html(pasien.nama);
		$('#pmigd-pasien-no-rm').html(pasien.id);
		$('#pmigd-pasien-tanggal-lahir').text((pasien.tanggal_lahir !== null ? datefmysql(pasien.tanggal_lahir) : '-') + ( ' (' + hitungUmur(pasien.tanggal_lahir) + ')'));
		$('#pmigd-pasien-jenis-kelamin').text((pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
		
		$('#ppigd-psikologis-mental-status-pekerjaan').html(pasien.pekerjaan);
		$('#ppigd-psikologis-mental-status-carabayar').html(pasien.penjamin);
	}

	function showDataPengkajianMedisIGD(kajian_medis) {
		$('#pmigd-dokter-igd').html(kajian_medis.dokter_igd);
		$('#pmigd-dokter-dpjp').html(kajian_medis.verifikasi_dpjp);
        $('#pmigd-waktu').html(kajian_medis.waktu);
		$('#pmigd-keluhan-utama').html(kajian_medis.keluhan_utama);
		$('#pmigd-penyakit-skr').html(kajian_medis.riwayat_penyakit_sekarang);

		// Start Riwayat Penyakit Dahulu		
			var rpt_dl = '';
			var rptdl = JSON.parse(kajian_medis.riwayat_penyakit_dahulu);
			if (rptdl.asma === '1') 			{ if(rpt_dl==='') {rpt_dl='Asma'} 				else {rpt_dl=rpt_dl+' & Asma'} } 
			if (rptdl.diabetes_miletus === '1')	{ if(rpt_dl==='') {rpt_dl='Diabetes Miletus'} 	else {rpt_dl=rpt_dl+' & Diabetes Miletus'} }  
			if (rptdl.cardiovascular === '1') 	{ if(rpt_dl==='') {rpt_dl='Cardiovascular'} 	else {rpt_dl=rpt_dl+' & Cardiovascular'} }
			if (rptdl.kanker === '1') 			{ if(rpt_dl==='') {rpt_dl='Kanker'} 			else {rpt_dl=rpt_dl+' & Kanker'} }   
			if (rptdl.thalasemia === '1') 		{ if(rpt_dl==='') {rpt_dl='Thalasemia'}			else {rpt_dl=rpt_dl+' & Thalasemia'} } 
			if (rptdl.lain === '1')				{ if(rpt_dl==='') {rpt_dl=rptdl.ket_lain} 		else {rpt_dl=rpt_dl+' & Lain-lain: '+rptdl.ket_lain} } 
			$('#pmigd-penyakit-dulu').html(rpt_dl);
		// End Riwayat Penyakit Dahulu

		// Start Riwayat Penyakit Keluarga
			var rpk_kl = '';
			var rpkkl = JSON.parse(kajian_medis.riwayat_penyakit_keluarga);
			if (rpkkl.asma === '1') 			{ if(rpk_kl==='') {rpk_kl='Asma'} 				else {rpk_kl=rpk_kl+' & Asma'} } 
			if (rpkkl.diabetes_miletus === '1')	{ if(rpk_kl==='') {rpk_kl='Diabetes Miletus'} 	else {rpk_kl=rpk_kl+' & Diabetes Miletus'} }  
			if (rpkkl.cardiovascular === '1') 	{ if(rpk_kl==='') {rpk_kl='Cardiovascular'} 	else {rpk_kl=rpk_kl+' & Cardiovascular'} }
			if (rpkkl.kanker === '1') 			{ if(rpk_kl==='') {rpk_kl='Kanker'} 			else {rpk_kl=rpk_kl+' & Kanker'} }   
			if (rpkkl.thalasemia === '1') 		{ if(rpk_kl==='') {rpk_kl='Thalasemia'}			else {rpk_kl=rpk_kl+' & Thalasemia'} } 
			if (rpkkl.lain === '1')				{ if(rpk_kl==='') {rpk_kl=rpkkl.ket_lain} 		else {rpk_kl=rpk_kl+' & Lain-lain: '+rpkkl.ket_lain} } 
			$('#pmigd-penyakit-keluarga').html(rpk_kl);
		// End Riwayat Penyakit Keluarga
		
		$('#pmigd-riwayat').html(kajian_medis.riwayat_detail);

		// Start Alergi
			if (kajian_medis.alergi === '0')		{ $('#pmigd-alergi').html('Tidak'); 				$('#pmigd-kreaksi-alergi').html('Tidak'); } 
			if (kajian_medis.alergi === '1')		{ $('#pmigd-alergi').html(kajian_medis.ket_alergi);	$('#pmigd-kreaksi-alergi').html(kajian_medis.ket_reaksi_alergi); } 
		// End Alergi


		// START -------- PENGKAJIAN NYERI -------- 
			// Start Neonatus
				var neo = JSON.parse(kajian_medis.neonatus);

				// Start menangis
					if(neo.menangis === '0')		{ $('#pmigd-neonatus-menangis').html('0. Tidak Menangis');}
					else if(neo.menangis === '1')	{ $('#pmigd-neonatus-menangis').html('1. Merintih');}
					else if(neo.menangis === '2')	{ $('#pmigd-neonatus-menangis').html('2. Menagis Terus');}
				// End menangis

				// Start spo
					if(neo.spo === '0')			{ $('#pmigd-neonatus-spo').html('0. Normal');}
					else if(neo.spo === '1')	{ $('#pmigd-neonatus-spo').html('1. F2O2 < 30%');}
					else if(neo.spo === '2')	{ $('#pmigd-neonatus-spo').html('2. F2O2 < 30%');}
				// End spo

				// Start vital
					if(neo.vital === '0')		{ $('#pmigd-neonatus-vital').html('0. HR dan TD dalam batas normal');}
					else if(neo.vital === '1')	{ $('#pmigd-neonatus-vital').html('1. < 20%');}
					else if(neo.vital === '2')	{ $('#pmigd-neonatus-vital').html('2. > 20%');}
				// End vital

				// Start wajah
					if(neo.wajah === '0')		{ $('#pmigd-neonatus-wajah').html('0. Biasa');}
					else if(neo.wajah === '1')	{ $('#pmigd-neonatus-wajah').html('1. Meringis');}
					else if(neo.wajah === '2')	{ $('#pmigd-neonatus-wajah').html('2. Meringis / Mendengkur');}
				// End wajah

				// Start tidur
					if(neo.tidur === '0')		{ $('#pmigd-neonatus-tidur').html('0. Normal');}
					else if(neo.tidur === '1')	{ $('#pmigd-neonatus-tidur').html('1. Sering Terbangun');}
					else if(neo.tidur === '2')	{ $('#pmigd-neonatus-tidur').html('2. Tidak Ada Tidur');}
				// End tidur

				if (neo.total !== '') 		{ $('#pmigd-neonatus-total').html(neo.total); }
			// End Neonatus

			$('#pmigd-ket-nyeri').html(kajian_medis.ket_nyeri);

			// Start Nyeri Hilang	
				var ny_h = '';
				var nyh = JSON.parse(kajian_medis.ket_nyeri_hilang);
				if (nyh.minum_obat === '1') 		{ if(ny_h==='') {ny_h='Minum Obat'} 		else {ny_h=ny_h+' & Minum Obat'} } 
				if (nyh.mendengarkan_musik === '1')	{ if(ny_h==='') {ny_h='Mendengarkan Musik'} else {ny_h=ny_h+' & Mendengarkan Musik'} }  
				if (nyh.istirahat === '1') 			{ if(ny_h==='') {ny_h='Istirahat'} 			else {ny_h=ny_h+' & Istirahat'} }
				if (nyh.berubah_posisi === '1') 	{ if(ny_h==='') {ny_h='Berubah Posisi'} 	else {ny_h=ny_h+' & Berubah Posisi'} }
				if (nyh.lain === '1')				{ if(ny_h==='') {ny_h=nyh.ket_lain} 		else {ny_h=ny_h+' & Lain-lain: '+nyh.ket_lain} } 
				$('#pmigd-ket-nyeri-hilang').html(ny_h);
			// End Nyeri Hilang


			// Start Anak FLACC Wajah
				if(kajian_medis.flacc_wajah === '1')		{ $('#pmigd-flacc-wajah').html('1. Tidak ada ekspresi tertentu atau senyum');}
				else if(kajian_medis.flacc_wajah === '2')	{ $('#pmigd-flacc-wajah').html('2. Sesekali meringis / mengerutkan kening, menarik diri tidak tertarik');}
				else if(kajian_medis.flacc_wajah === '3')	{ $('#pmigd-flacc-wajah').html('3. Sering sampai konstan mengerutkan kening, rahang terkatup, dagu gemetaran');}
			// End Anak FLACC Wajah

			// Start Anak FLACC Kaki
				if(kajian_medis.flacc_kaki === '0')			{ $('#pmigd-flacc-kaki').html('0. Posisi kaki normal atau santai');}
				else if(kajian_medis.flacc_kaki === '1')	{ $('#pmigd-flacc-kaki').html('1. Cemas, gelisah, tegang');}
				else if(kajian_medis.flacc_kaki === '2')	{ $('#pmigd-flacc-kaki').html('2. Menendang atau menarik kaki');}
			// End Anak FLACC Kaki

			// Start Anak FLACC aktifitas
				if(kajian_medis.flacc_aktifitas === '0')		{ $('#pmigd-flacc-aktifitas').html('0. Berbaring tenang, posisi normal, bergerak dengan mudah');}
				else if(kajian_medis.flacc_aktifitas === '1')	{ $('#pmigd-flacc-aktifitas').html('1. Menggeliat, modar-mandir, tegang');}
				else if(kajian_medis.flacc_aktifitas === '2')	{ $('#pmigd-flacc-aktifitas').html('2. Melengkung, kaku, menyentak');}
			// End Anak FLACC aktifitas
				
			// Start Anak FLACC menangis
				if(kajian_medis.flacc_menangis === '0')			{ $('#pmigd-flacc-menangis').html('0. Tidak ada teriakan (terjaga / tidur)');}
				else if(kajian_medis.flacc_menangis === '1')	{ $('#pmigd-flacc-menangis').html('1. Mengerang, merintih sesekali mengeluh');}
				else if(kajian_medis.flacc_menangis === '2')	{ $('#pmigd-flacc-menangis').html('2. Menangis terus teriak, sering mengeluh');}
			// End Anak FLACC menangis
			
			// Start Anak FLACC bicara
				if(kajian_medis.flacc_bicara === '0')		{ $('#pmigd-flacc-bicara').html('0. Puas, senang, santai');}
				else if(kajian_medis.flacc_bicara === '1')	{ $('#pmigd-flacc-bicara').html('1. Sesekali diyakinkan dengan sentuhan, pelukan, diajak');}
				else if(kajian_medis.flacc_bicara === '2')	{ $('#pmigd-flacc-bicara').html('2. Sulit untuk dihibur atau di buat nyaman');}
			// End Anak FLACC bicara

			$('#pmigd-flacc-total').html(kajian_medis.flacc_total);
		// END -------- PENGKAJIAN NYERI -------- 


		// START -------- PEMERIKSAAN FISIK -------- 
			$('#pmigd-fisik-kepala').html(kajian_medis.fisik_kepala);
			$('#pmigd-fisik-mata').html(kajian_medis.fisik_mata);
			$('#pmigd-fisik-mulut').html(kajian_medis.fisik_mulut);
			$('#pmigd-fisik-leher').html(kajian_medis.fisik_leher);
			$('#pmigd-fisik-thoraks-cor').html(kajian_medis.fisik_thoraks_cor);
			$('#pmigd-fisik-thoraks-pulmo').html(kajian_medis.fisik_thoraks_pulmo);
			$('#pmigd-fisik-abdomen').html(kajian_medis.fisik_abdomen);
			$('#pmigd-fisik-ekstermitas').html(kajian_medis.fisik_ekstermitas);
			$('#pmigd-fisik-kulit-kelamin').html(kajian_medis.fisik_kulit_kelamin);
			$('#pmigd-fisik-diagnosa-awal').html(kajian_medis.diagnosa_awal);
			$('#pmigd-fisik-diagnosa-banding').html(kajian_medis.diagnosa_banding);

			$('#pmigd-fisik-status-lokalis').html(kajian_medis.fisik_status_lokalis);

			if (kajian_medis.fisik_note_anathomi !== '') {
				$('.drawpad').hide()
				$('#fisik_img_anathomi_igd').show()
				$('#fisik_img_anathomi_igd').attr('src', kajian_medis.fisik_note_anathomi)
				$('#drawpad_input').val(kajian_medis.fisik_note_anathomi)
			} else {
				$('#fisik_img_anathomi_igd').hide()
				$('#fisik_img_anathomi_igd').attr('src', '')
			}
		// END -------- PEMERIKSAAN FISIK -------- 


		// START -------- PEMERIKSAAN PENUNJANG -------- 
			// Start Lab
				var p_lab = '';
				var plab = JSON.parse(kajian_medis.penunjang_lab);
				if (plab.dpl === '1') 			{ if(p_lab==='') {p_lab='DPL'} 				else {p_lab=p_lab+' & DPL'} } 
				if (plab.agd === '1') 			{ if(p_lab==='') {p_lab='AGD'} 				else {p_lab=p_lab+' & AGD'} } 
				if (plab.elektrolit === '1') 	{ if(p_lab==='') {p_lab='Elektrolit'} 		else {p_lab=p_lab+' & Elektrolit'} } 
				if (plab.urin === '1')			{ if(p_lab==='') {p_lab='Urin'} 			else {p_lab=p_lab+' & Urin'} }  
				if (plab.ck === '1') 			{ if(p_lab==='') {p_lab='CK/CKMB'} 			else {p_lab=p_lab+' & CK/CKMB'} }
				if (plab.gds === '1') 			{ if(p_lab==='') {p_lab='GDS'} 				else {p_lab=p_lab+' & GDS'} }   
				if (plab.ureum === '1') 		{ if(p_lab==='') {p_lab='Ureum Creatinin'}	else {p_lab=p_lab+' & Ureum Creatinin'} } 
				if (plab.lain === '1')			{ if(p_lab==='') {p_lab=plab.ket_lain} 		else {p_lab=p_lab+' & Lain-lain: '+plab.ket_lain} } 
				$('#pmigd-penunjang-lab').html(p_lab);
			// End Lab
		
			// Start X-Ray
				var p_xray = '';
				var pxray = JSON.parse(kajian_medis.penunjang_xray);
				if (pxray.tidak_ada === '1')	{ if(p_xray==='') {p_xray='Tidak Ada'} 			else {p_xray=p_xray+' & Tidak Ada'} }  
				if (pxray.thorax === '1') 		{ if(p_xray==='') {p_xray='Thorax'} 			else {p_xray=p_xray+' & Thorax'} }
				if (pxray.abdomen === '1') 		{ if(p_xray==='') {p_xray='Abdomen 3 Posisi'} 	else {p_xray=p_xray+' & Abdomen 3 Posisi'} }   
				if (pxray.ctscan === '1') 		{ if(p_xray==='') {p_xray='CT Scan'}			else {p_xray=p_xray+' & CT Scan'} } 
				if (pxray.lain === '1')			{ if(p_xray==='') {p_xray=pxray.ket_lain} 		else {p_xray=p_xray+' & Lain-lain: '+pxray.ket_lain} } 
				$('#pmigd-penunjang-xray').html(p_xray);
			// End X-Ray

			// Start EKG
				var peky = JSON.parse(kajian_medis.penunjang_ekg);
				if (peky.ekg === '0')		{ $('#pmigd-penunjang-ekg').html('Tidak'); } 
				if (peky.ekg === '1')		{ $('#pmigd-penunjang-ekg').html(peky.ket_ekg); } 
			// End EKG
		// END -------- PEMERIKSAAN PENUNJANG -------- 


		// START -------- TERAPI / TINDAKAN / INSTRUKSI LAIN --------
			$('#field_terapi_tindakan_igd').html(kajian_medis.terapi_tindakan);
		// END -------- TERAPI / TINDAKAN / INSTRUKSI LAIN --------

		
		// START -------- STATUS AKHIR PASIEN --------
			
			$('#pmigd-status-akhir-ruang').html(kajian_medis.bangsal);

			// Start dipulangkan
				if (kajian_medis.kontrol === '0')		{ $('#pmigd-status-akhir-dipulangkan').html('Tidak Perlu Kontrol'); } 
				if (kajian_medis.kontrol === '1')		{ $('#pmigd-status-akhir-dipulangkan').html('Kontrol di '+kajian_medis.ket_kontrol); } 
			// End dipulangkan

			$('#pmigd-status-akhir-dirujuk').html(kajian_medis.dirujuk_ke);
			$('#pmigd-status-akhir-alasanrujuk').html(kajian_medis.alasan_rujuk);
			$('#pmigd-status-akhir-pulangpaksa').html(kajian_medis.alasan_pulang_paksa );

			// Start meninggal
				if (kajian_medis.meninggal === '0')		{ $('#pmigd-status-akhir-meninggal').html('Tidak'); } 
				if (kajian_medis.meninggal === '1')		{ $('#pmigd-status-akhir-meninggal').html('Meninggal'); } 
			// End meninggal

			$('#pmigd-status-akhir-kondisipasien').html(kajian_medis.kondisi_saat_pulang);


			// Start kesadaran
				var sa_sadar = '';
				var sasadar = JSON.parse(kajian_medis.kesadaran);
				if (sasadar.cm === '1')			{ if(sa_sadar==='') {sa_sadar='CM'} 		else {sa_sadar=sa_sadar+' & CM'} }  
				if (sasadar.apatis === '1') 	{ if(sa_sadar==='') {sa_sadar='Apatis'} 	else {sa_sadar=sa_sadar+' & Apatis'} }   
				if (sasadar.delirium === '1') 	{ if(sa_sadar==='') {sa_sadar='Delirium'}	else {sa_sadar=sa_sadar+' & Delirium'} } 
				if (sasadar.sopor === '1') 		{ if(sa_sadar==='') {sa_sadar='Sopor'}		else {sa_sadar=sa_sadar+' & Sopor'} } 
				if (sasadar.koma === '1') 		{ if(sa_sadar==='') {sa_sadar='Koma'}		else {sa_sadar=sa_sadar+' & Koma'} } 
				$('#pmigd-status-akhir-kesadaran').html(sa_sadar);
			// End kesadaran

			// Start Jenis Kebutuhan Layanan
				var sa_keblay = '';
				var sakeblay = JSON.parse(kajian_medis.kebutuhan_layanan);
				if(sakeblay !== null ) {
					if (sakeblay.preventif === '1')		{ if(sa_keblay==='') {sa_keblay='Preventif'} 		else {sa_keblay=sa_keblay+' & Preventif'} }  
					if (sakeblay.kuratif === '1') 		{ if(sa_keblay==='') {sa_keblay='Kuratif'} 			else {sa_keblay=sa_keblay+' & Kuratif'} }   
					if (sakeblay.paliatif === '1') 		{ if(sa_keblay==='') {sa_keblay='Paliatif'}			else {sa_keblay=sa_keblay+' & Paliatif'} } 
					if (sakeblay.rehabilitatif === '1') { if(sa_keblay==='') {sa_keblay='Rehabilitatif'}	else {sa_keblay=sa_keblay+' & Rehabilitatif'} }
				}
				$('#pmigd-status-jenis-kebutuhan-layanan').html(sa_keblay);
			// End Jenis Kebutuhan Layanan

			// Start GCS
				var sa_gcs = '';
				if (kajian_medis.gcs_e !== '') { if(sa_gcs==='') {sa_gcs='E='+kajian_medis.gcs_e} else {sa_gcs=sa_gcs+' & E='+kajian_medis.gcs_e} }  
				if (kajian_medis.gcs_m !== '') { if(sa_gcs==='') {sa_gcs='M='+kajian_medis.gcs_m} else {sa_gcs=sa_gcs+' & M='+kajian_medis.gcs_m} }   
				if (kajian_medis.gcs_v !== '') { if(sa_gcs==='') {sa_gcs='V='+kajian_medis.gcs_v} else {sa_gcs=sa_gcs+' & V='+kajian_medis.gcs_v} } 
				$('#pmigd-status-akhir-gcs').html(sa_gcs);
			// End GCS
			
			// $('#pmigd-status-akhir-gcs').html('E='+kajian_medis.gcs_e+' M='+kajian_medis.gcs_m+' V='+kajian_medis.gcs_v);
			$('#pmigd-status-akhir-catatan').html(kajian_medis.catatan_khusus);

		// END -------- STATUS AKHIR PASIEN --------


		
    }


	function showDataPengkajianKeperawatanIGD(kajian_keperawatan) {
		$('#ppigd-dokter-igd').html(kajian_keperawatan.perawat);
		$('#ppigd-dokter-dpjp').html(kajian_keperawatan.verifikasi_dpjp);

		// Start Informasi Diperoleh dari
			var ppigd_info = '';
			var ppigdinfo = JSON.parse(kajian_keperawatan.informasi_dari);
			if (ppigdinfo.pasien === '1')	{ if(ppigd_info==='') {ppigd_info='Pasien'} 			else {ppigd_info=ppigd_info+' & Pasien'} }  
			if (ppigdinfo.keluarga === '1') { if(ppigd_info==='') {ppigd_info='Keluarga'} 			else {ppigd_info=ppigd_info+' & Keluarga'} }   
			if (ppigdinfo.lain === '1') 	{ if(ppigd_info==='') {ppigd_info=ppigdinfo.ket_lain} 	else {ppigd_info=ppigd_info+' & Lain-lain: '+ppigdinfo.ket_lain} } 
			$('#ppigd-informasi-dari').html(ppigd_info);
		// End Informasi Diperoleh dari

		// Start Cara Masuk
			var ppigd_cmsk = '';
			var ppigdcmsk = JSON.parse(kajian_keperawatan.cara_masuk);
			if (ppigdcmsk.tanpa_bantuan === '1')	{ if(ppigd_cmsk==='') {ppigd_cmsk='Jalan tanpa bantuan'} 	else {ppigd_cmsk=ppigd_cmsk+' & Jalan tanpa bantuan'} }  
			if (ppigdcmsk.dengan_bantuan === '1') 	{ if(ppigd_cmsk==='') {ppigd_cmsk='Jalan dengan bantuan'} 	else {ppigd_cmsk=ppigd_cmsk+' & Jalan dengan bantuan'} }   
			if (ppigdcmsk.kursi_roda === '1')		{ if(ppigd_cmsk==='') {ppigd_cmsk='Kursi Roda'} 			else {ppigd_cmsk=ppigd_cmsk+' & Kursi Roda'} }  
			if (ppigdcmsk.brankar === '1') 			{ if(ppigd_cmsk==='') {ppigd_cmsk='Brankar'} 				else {ppigd_cmsk=ppigd_cmsk+' & Brankar'} }   
			$('#ppigd-cara-masuk').html(ppigd_cmsk);
		// End Cara Masuk


		$('#ppigd-keluhan-utama').html(kajian_keperawatan.keluhan_utama);
		$('#ppigd-riwayat-penyakit-sekarang').html(kajian_keperawatan.riwayat_penyakit_sekarang);

		// Start Riwayat Penyakit Terdahulu
			var ppigd_rpt = '';
			var ppigdrpt = JSON.parse(kajian_keperawatan.riwayat_penyakit_terdahulu);
			if (ppigdrpt.asma === '1')			{ if(ppigd_rpt==='') {ppigd_rpt='Asma'} 			else {ppigd_rpt=ppigd_rpt+' & Asma'} }  
			if (ppigdrpt.hipertensi === '1') 	{ if(ppigd_rpt==='') {ppigd_rpt='Hipertensi'} 		else {ppigd_rpt=ppigd_rpt+' & Hipertensi'} }   
			if (ppigdrpt.jantung === '1')		{ if(ppigd_rpt==='') {ppigd_rpt='Jantung'} 			else {ppigd_rpt=ppigd_rpt+' & Jantung'} }  
			if (ppigdrpt.diabetes === '1') 		{ if(ppigd_rpt==='') {ppigd_rpt='Diabetes'} 		else {ppigd_rpt=ppigd_rpt+' & Diabetes'} }   
			if (ppigdrpt.hepatitis === '1')		{ if(ppigd_rpt==='') {ppigd_rpt='Hepatitis'} 			else {ppigd_rpt=ppigd_rpt+' & Hepatitis'} }  
			if (ppigdrpt.lain === '1') 			{ if(ppigd_rpt==='') {ppigd_rpt=ppigdrpt.ket_lain} 	else {ppigd_rpt=ppigd_rpt+' & Lain-lain: '+ppigdrpt.ket_lain} } 
			$('#ppigd-riwayat-penyakit-terdahulu').html(ppigd_rpt);
		// End Riwayat Penyakit Terdahulu

		// Start Riwayat Penyakit Keluarga
			var ppigd_rpk = '';
			var ppigdrpk = JSON.parse(kajian_keperawatan.riwayat_penyakit_keluarga);
			if (ppigdrpk.asma === '1')			{ if(ppigd_rpk==='') {ppigd_rpk='Asma'} 			else {ppigd_rpk=ppigd_rpk+' & Asma'} }  
			if (ppigdrpk.hipertensi === '1') 	{ if(ppigd_rpk==='') {ppigd_rpk='Hipertensi'} 		else {ppigd_rpk=ppigd_rpk+' & Hipertensi'} }   
			if (ppigdrpk.jantung === '1')		{ if(ppigd_rpk==='') {ppigd_rpk='Jantung'} 			else {ppigd_rpk=ppigd_rpk+' & Jantung'} }  
			if (ppigdrpk.diabetes === '1') 		{ if(ppigd_rpk==='') {ppigd_rpk='Diabetes'} 		else {ppigd_rpk=ppigd_rpk+' & Diabetes'} }   
			if (ppigdrpk.hepatitis === '1')		{ if(ppigd_rpk==='') {ppigd_rpk='Hepatitis'} 		else {ppigd_rpk=ppigd_rpk+' & Hepatitis'} }  
			if (ppigdrpk.lain === '1') 			{ if(ppigd_rpk==='') {ppigd_rpk=ppigdrpk.ket_lain} 	else {ppigd_rpk=ppigd_rpk+' & Lain-lain: '+ppigdrpk.ket_lain} } 
			$('#ppigd-riwayat-penyakit-keluarga').html(ppigd_rpk);
		// End Riwayat Penyakit Terdahulu

		// START -------- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL --------

			// Start Kesadaran
				var ppigd_ksd = '';
				var ppigdksd = JSON.parse(kajian_keperawatan.kesadaran);
				if (ppigdksd.composmentis === '1')	{ if(ppigd_ksd==='') {ppigd_ksd='Composmentis '} 	else {ppigd_ksd=ppigd_ksd+' & Composmentis '} }  
				if (ppigdksd.apatis === '1') 		{ if(ppigd_ksd==='') {ppigd_ksd='Apatis'} 			else {ppigd_ksd=ppigd_ksd+' & Apatis '} }   
				if (ppigdksd.samnolen === '1')		{ if(ppigd_ksd==='') {ppigd_ksd='Samnolen'} 		else {ppigd_ksd=ppigd_ksd+' & Samnolen'} }  
				if (ppigdksd.sopor === '1') 		{ if(ppigd_ksd==='') {ppigd_ksd='Sopor'} 			else {ppigd_ksd=ppigd_ksd+' & Sopor'} }   
				if (ppigdksd.koma === '1') 			{ if(ppigd_ksd==='') {ppigd_ksd='Koma'} 			else {ppigd_ksd=ppigd_ksd+' & Koma'} }   
				$('#ppigd-fisikvital-kesadaran').html(ppigd_ksd);
			// End Kesadaran

			$('#ppigd-fisikvital-tensi').html(kajian_keperawatan.tensi_sistolik+'/'+kajian_keperawatan.tensi_diastolik+' mmHg');
			$('#ppigd-fisikvital-nadi').html(kajian_keperawatan.nadi+' x/mnt');
			
			$('#ppigd-fisikvital-gcs').html('E='+kajian_keperawatan.gcs_e+' M='+kajian_keperawatan.gcs_m+' V='+kajian_keperawatan.gcs_v);			
			$('#ppigd-fisikvital-suhu').html(kajian_keperawatan.suhu+' ℃');			
			$('#ppigd-fisikvital-nafas').html(kajian_keperawatan.nafas+' x/mnt');

		// END -------- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL --------


		// START -------- PSIKOSOSIAL, EKONOMI --------		
			// Start psikologis
				var sp_psi = '';
				var sppsi = JSON.parse(kajian_keperawatan.status_psikologis);
				if (sppsi.cemas === '1')		{ if(sp_psi==='') {sp_psi='Cemas'} 						else {sp_psi=sp_psi+' & Cemas'} }  
				if (sppsi.takut === '1') 		{ if(sp_psi==='') {sp_psi='Takut'} 						else {sp_psi=sp_psi+' & Takut'} }   
				if (sppsi.marah === '1') 		{ if(sp_psi==='') {sp_psi='Marah'}						else {sp_psi=sp_psi+' & Marah'} } 
				if (sppsi.sedih === '1') 		{ if(sp_psi==='') {sp_psi='Sedih'}						else {sp_psi=sp_psi+' & Sedih'} } 
				if (sppsi.bunuh_diri === '1') 	{ if(sp_psi==='') {sp_psi='Kecendrungan Bunuh Diri'}	else {sp_psi=sp_psi+' & Kecendrungan Bunuh Diri'} } 				
				if (sppsi.lain === '1')			{ if(sp_psi==='') {sp_psi=sppsi.ket_lain} 				else {sp_psi=sp_psi+' & Lain-lain: '+sppsi.ket_lain} } 
				$('#ppigd-psikologis-mental-status-psikologis').html(sp_psi);
			// End psikologis

			// Start mental
				var sp_men = '';
				var spmen = JSON.parse(kajian_keperawatan.status_mental);
				if (spmen.sadar === '1')				{ if(sp_men==='') {sp_men='Sadar dan Orientasi Baik'} 							else {sp_men=sp_men+' & Sadar dan Orientasi Baik'} } 			
				if (spmen.ada_masalah === '1')			{ if(sp_men==='') {sp_men=spmen.ket_ada_masalah} 								else {sp_men=sp_men+' & Ada Masalah Perilaku ('+spmen.ket_ada_masalah+')'} } 
				if (spmen.perilaku_kekerasan === '1') 	{ if(sp_men==='') {sp_men='Perilaku Kekerasan yang dialami pasien sebelumnya'}	else {sp_men=sp_men+' & Perilaku Kekerasan yang dialami pasien sebelumnya'} } 	
				$('#ppigd-psikologis-mental-status-mental').html(sp_men);
			// End mental
		// END -------- PSIKOSOSIAL, EKONOMI --------


		// START -------- PENILAIAN RESIKO JATUH --------		
			// Start RESIKO JATUH ANAK

				// Start UMUR
					$('#ppigd-jatuhanak-umur-skor').html(kajian_keperawatan.prja_umur);
						 if(kajian_keperawatan.prja_umur === '4')	{ $('#ppigd-jatuhanak-umur-kriteria').html('Dibawah 3 Tahun	4') }
					else if(kajian_keperawatan.prja_umur === '3')	{ $('#ppigd-jatuhanak-umur-kriteria').html('3 - 7 Tahun	3') }
					else if(kajian_keperawatan.prja_umur === '2')	{ $('#ppigd-jatuhanak-umur-kriteria').html('7 - 13 Tahun 2') }
					else if(kajian_keperawatan.prja_umur === '1')	{ $('#ppigd-jatuhanak-umur-kriteria').html('> 13 Tahun') }
				// End UMUR

				// Start KELAMIN
					$('#ppigd-jatuhanak-kelamin-skor').html(kajian_keperawatan.prja_jenis_kelamin);
						 if(kajian_keperawatan.prja_jenis_kelamin === '2')	{ $('#ppigd-jatuhanak-kelamin-kriteria').html('Laki - Laki') }
					else if(kajian_keperawatan.prja_jenis_kelamin === '1')	{ $('#ppigd-jatuhanak-kelamin-kriteria').html('Perempuan') }
				// End KELAMIN

				// Start DIAGNOSA
					$('#ppigd-jatuhanak-diag-skor').html(kajian_keperawatan.prja_diagnosis);
						 if(kajian_keperawatan.prja_diagnosis === '4')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Kelainan Neurologi') }
					else if(kajian_keperawatan.prja_diagnosis === '3')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Respiratori, Dehidrasi, Anemia, Anoreksia, Syncope') }
					else if(kajian_keperawatan.prja_diagnosis === '2')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Perilaku') }
					else if(kajian_keperawatan.prja_diagnosis === '1')	{ $('#ppigd-jatuhanak-diag-kriteria').html('Lain - lain') }
				// End DIAGNOSA

				// Start Gangguan Kognitif
				$('#ppigd-jatuhanak-ggkog-skor').html(kajian_keperawatan.prja_gangguan_kognitif);
						 if(kajian_keperawatan.prja_gangguan_kognitif === '3')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Keterbatasan Daya Pikir') }
					else if(kajian_keperawatan.prja_gangguan_kognitif === '2')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Pelupa, berkurangnya orientasi sekitar') }
					else if(kajian_keperawatan.prja_gangguan_kognitif === '1')	{ $('#ppigd-jatuhanak-ggkog-kriteria').html('Dapat menggunakan daya pikir tanpa hambatan') }
				// End Gangguan Kognitif

				// Start Faktor Lingkungan
					$('#ppigd-jatuhanak-fling-skor').html(kajian_keperawatan.prja_faktor_lingkungan);
						 if(kajian_keperawatan.prja_faktor_lingkungan === '4')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Riwayat Jatuh atau Bayi/Balita yang Ditempatkan Ditempat tidur') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '3')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Pasien Menggunakan Alat Bantu atau Bayi/Balita dalam Ayunan') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '2')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Pasien di Tempat Tidur Standar') }
					else if(kajian_keperawatan.prja_faktor_lingkungan === '1')	{ $('#ppigd-jatuhanak-fling-kriteria').html('Area Pasien Rawat Jalan') }
				// End Faktor Lingkungan

				// Start Respon Terhadap Pembedahan, Sedasi dan Anastesi
				$('#ppigd-jatuhanak-bedah-skor').html(kajian_keperawatan.prja_respon_pembedahan);
						 if(kajian_keperawatan.prja_respon_pembedahan === '3')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Dalam 24 Jam') }
					else if(kajian_keperawatan.prja_respon_pembedahan === '2')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Dalam 48 Jam') }
					else if(kajian_keperawatan.prja_respon_pembedahan === '1')	{ $('#ppigd-jatuhanak-bedah-kriteria').html('Lebih dari 48 Jam / Tidak Ada Respon') }
				// End Respon Terhadap Pembedahan, Sedasi dan Anastesi

				// Start Penggunaan Obat - obatan
				$('#ppigd-jatuhanak-obat-skor').html(kajian_keperawatan.prja_penggunaan_obat);
						 if(kajian_keperawatan.prja_penggunaan_obat === '3')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Penggunaan Bersamaan Sedative Barbiturate, Anti Depresan, Diuretic Narkotik') }
					else if(kajian_keperawatan.prja_penggunaan_obat === '2')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Salah Satu Dari Obat Diatas') }
					else if(kajian_keperawatan.prja_penggunaan_obat === '1')	{ $('#ppigd-jatuhanak-obat-kriteria').html('Obat - obatan lainnya / Tanpa Obat') }
				// End Penggunaan Obat - obatan

				$('#ppigd-jatuhanak-jmlskor').html(kajian_keperawatan.prja_total);

			// End RESIKO JATUH ANAK


			// Start RESIKO JATUH DEWASA

				// Start Riwayat jatuh dalam waktu 3 bulan sebab apapun
					$('#ppigd-jatuhdewasa-riwayatjatuh-skor').html(kajian_keperawatan.prjd_riwayat_jatuh);
						 if(kajian_keperawatan.prjd_riwayat_jatuh === '0')	{ $('#ppigd-jatuhdewasa-riwayatjatuh-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_riwayat_jatuh === '25')	{ $('#ppigd-jatuhdewasa-riwayatjatuh-nilai').html('Ya') }
				// End Riwayat jatuh dalam waktu 3 bulan sebab apapun

				// Start Diagnosis Sekunder (≥ Diagnosis Medis)
				$('#ppigd-jatuhdewasa-diagsek-skor').html(kajian_keperawatan.prjd_diagnosis_sekunder);
						 if(kajian_keperawatan.prjd_diagnosis_sekunder === '0')		{ $('#ppigd-jatuhdewasa-diagsek-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_diagnosis_sekunder === '15')	{ $('#ppigd-jatuhdewasa-diagsek-nilai').html('Ya') }
				// End Diagnosis Sekunder (≥ Diagnosis Medis)

				// Start Alat Bantu Jalan
					// Tidak Ada / Kursi Roda									
						if(kajian_keperawatan.prjd_alat_bantu_jalan_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-tidak-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-tidak-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_1);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-tidak-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-tidak-skor').html('-');
						}

					// Kruk / Tongkat / Walker				
						if(kajian_keperawatan.prjd_alat_bantu_jalan_2 === '15')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-kruk-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-kruk-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_2);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-kruk-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-kruk-skor').html('-');
						}


					// Berpegangan pada benda-benda disekitar / Furniture
						if(kajian_keperawatan.prjd_alat_bantu_jalan_3 === '30')	{ 
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-skor').html(kajian_keperawatan.prjd_alat_bantu_jalan_3);
						}	else { 
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-alatbantu-pegangan-skor').html('-');
						}
				// End Alat Bantu Jalan

				// Start Terpasang Infus / Heparin Lock
				$('#ppigd-jatuhdewasa-infus-skor').html(kajian_keperawatan.prjd_terpasang_infus);
						 if(kajian_keperawatan.prjd_terpasang_infus === '0')	{ $('#ppigd-jatuhdewasa-infus-nilai').html('Tidak') }
					else if(kajian_keperawatan.prjd_terpasang_infus === '20')	{ $('#ppigd-jatuhdewasa-infus-nilai').html('Ya') }
				// End Terpasang Infus / Heparin Lock


				// Start Cara Berjalan atau Berpindah
					// Normal / Bedrest / Imobilisasi							
					if(kajian_keperawatan.prjd_cara_berjalan_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-carajln-normal-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-normal-skor').html(kajian_keperawatan.prjd_cara_berjalan_1);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-normal-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-normal-skor').html('-');
						}

					// Lemah			
						if(kajian_keperawatan.prjd_cara_berjalan_2 === '10')	{ 
							$('#ppigd-jatuhdewasa-carajln-lemah-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-lemah-skor').html(kajian_keperawatan.prjd_cara_berjalan_2);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-lemah-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-lemah-skor').html('-');
						}

					// Terganggu
						if(kajian_keperawatan.prjd_cara_berjalan_3 === '20')	{ 
							$('#ppigd-jatuhdewasa-carajln-terganggu-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-carajln-terganggu-skor').html(kajian_keperawatan.prjd_cara_berjalan_3);
						}	else { 
							$('#ppigd-jatuhdewasa-carajln-terganggu-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-carajln-terganggu-skor').html('-');
						}
				// End Cara Berjalan atau Berpindah

				// Start Mental
					// Sadar Akan Kemampuan Diri Sendiri			
						if(kajian_keperawatan.prjd_status_mental_1 === '0')	{ 
							$('#ppigd-jatuhdewasa-mental-sadar-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-mental-sadar-skor').html(kajian_keperawatan.prjd_status_mental_1);
						}	else { 
							$('#ppigd-jatuhdewasa-mental-sadar-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-mental-sadar-skor').html('-');
						}

					// Sering Lupa akan Keterbatasan Yang dimiliki
						if(kajian_keperawatan.prjd_status_mental_2 === '15')	{ 
							$('#ppigd-jatuhdewasa-mental-lupa-nilai').html('Ya');
							$('#ppigd-jatuhdewasa-mental-lupa-skor').html(kajian_keperawatan.prjd_status_mental_2);
						}	else { 
							$('#ppigd-jatuhdewasa-mental-lupa-nilai').html('Tidak');
							$('#ppigd-jatuhdewasa-mental-lupa-skor').html('-');
						}
				// End Cara Berjalan atau Berpindah

				$('#ppigd-jatuhdewasa-jmlskor').html(kajian_keperawatan.prjd_total);
			// End RESIKO JATUH DEWASA

		// END -------- PENILAIAN RESIKO JATUH --------


		// START -------- PENILAIAN RESIKO JATUH LANSIA (Usia > 60 th) --------

			// Riwayat Jatuh
			if (kajian_keperawatan.prjl_riwayat_jatuh === '6')		{ $('#ppigd-resikojatuh-riwayatjatuh1').html('Ya') }  else { $('#ppigd-resikojatuh-riwayatjatuh1').html('Tidak') } 
			if (kajian_keperawatan.prjl_riwayat_jatuh_opt === '6')	{ $('#ppigd-resikojatuh-riwayatjatuh2').html('Ya') }  else { $('#ppigd-resikojatuh-riwayatjatuh2').html('Tidak') } 

			// Status Mental
			if (kajian_keperawatan.prjl_status_mental === '14')			{ $('#ppigd-resikojatuh-mental1').html('Ya') }  else { $('#ppigd-resikojatuh-mental1').html('Tidak') } 
			if (kajian_keperawatan.prjl_status_mental_opt_1 === '14')	{ $('#ppigd-resikojatuh-mental2').html('Ya') }  else { $('#ppigd-resikojatuh-mental2').html('Tidak') } 
			if (kajian_keperawatan.prjl_status_mental_opt_2 === '14')	{ $('#ppigd-resikojatuh-mental3').html('Ya') }  else { $('#ppigd-resikojatuh-mental3').html('Tidak') } 

			// Penglihatan
			if (kajian_keperawatan.prjl_penglihatan === '1')			{ $('#ppigd-resikojatuh-penglihatan1').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan1').html('Tidak') } 
			if (kajian_keperawatan.prjl_penglihatan_opt_1 === '1')		{ $('#ppigd-resikojatuh-penglihatan2').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan2').html('Tidak') } 
			if (kajian_keperawatan.prjl_penglihatan_opt_2 === '1')		{ $('#ppigd-resikojatuh-penglihatan3').html('Ya') }  else { $('#ppigd-resikojatuh-penglihatan3').html('Tidak') } 
			
			// Kebiasaan Berkemih
			if (kajian_keperawatan.prjl_berkemih === '2')		{ $('#ppigd-resikojatuh-berkemih').html('Ya') }  else { $('#ppigd-resikojatuh-berkemih').html('Tidak') } 

			// Transfer dari tempat tidur kekurasi dan kembali lagi ketempat tidur
			if (kajian_keperawatan.prjl_transfer === '0')	{ $('#ppigd-resikojatuh-transfer1').html('0. Ya') }  else { $('#ppigd-resikojatuh-transfer1').html('0. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '1')	{ $('#ppigd-resikojatuh-transfer2').html('1. Ya') }  else { $('#ppigd-resikojatuh-transfer2').html('1. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '2')	{ $('#ppigd-resikojatuh-transfer3').html('2. Ya') }  else { $('#ppigd-resikojatuh-transfer3').html('2. Tidak') } 
			if (kajian_keperawatan.prjl_transfer === '3')	{ $('#ppigd-resikojatuh-transfer4').html('3. Ya') }  else { $('#ppigd-resikojatuh-transfer4').html('3. Tidak') } 
			
			// Mobilitas
			if (kajian_keperawatan.prjl_mobilitas === '0')	{ $('#ppigd-resikojatuh-mobilitas1').html('0. Ya') }  else { $('#ppigd-resikojatuh-mobilitas1').html('0. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '1')	{ $('#ppigd-resikojatuh-mobilitas2').html('1. Ya') }  else { $('#ppigd-resikojatuh-mobilitas2').html('1. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '2')	{ $('#ppigd-resikojatuh-mobilitas3').html('2. Ya') }  else { $('#ppigd-resikojatuh-mobilitas3').html('2. Tidak') } 
			if (kajian_keperawatan.prjl_mobilitas === '3')	{ $('#ppigd-resikojatuh-mobilitas4').html('3. Ya') }  else { $('#ppigd-resikojatuh-mobilitas4').html('3. Tidak') } 
			
			// Total
			$('#ppigd-resikojatuh-total').html(kajian_keperawatan.prjl_total);

		// END -------- PENILAIAN RESIKO JATUH LANSIA (Usia > 60 th) --------


		// START -------- PENILAIAN TINGKAT NYERI --------

			$('#ppigd-nyeri-sekala').html(kajian_keperawatan.skala_nyeri);
			$('#ppigd-nyeri-frekuensi').html(kajian_keperawatan.frekuensi_nyeri);
			$('#ppigd-nyeri-lama').html(kajian_keperawatan.lama_nyeri);
			$('#ppigd-nyeri-keperawatan').html(kajian_keperawatan.kualitas_nyeri);
			$('#ppigd-nyeri-pemberat').html(kajian_keperawatan.faktor_memperberat_nyeri);
			$('#ppigd-nyeri-pengurang').html(kajian_keperawatan.faktor_mengurangi_nyeri);
						
		// END -------- PENILAIAN TINGKAT NYERI --------

		// START -------- SKALA EARLY WARNING SYSTEM (EWS) --------
			// START Laju Respirasi /Menit 
				let ews_laju1 = '6-8';
				let ews_laju2 = '9-11';
				let ews_laju3 = '12-20';
				let ews_laju4 = '21-24';
				let ews_laju5 = '25-34';
				let ews_laju6 = '≤5 / ≥35';
				$('#ppigd-ews-laju-1').html(ews_laju1);
				$('#ppigd-ews-laju-2').html(ews_laju2); 
				$('#ppigd-ews-laju-3').html(ews_laju3);  
				$('#ppigd-ews-laju-4').html(ews_laju4);  
				$('#ppigd-ews-laju-5').html(ews_laju5); 
				$('#ppigd-ews-laju-6').html(ews_laju6); 
					if (kajian_keperawatan.sew_laju_respirasi === '3_1')	{ $('#ppigd-ews-laju-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju1+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '1_2')	{ $('#ppigd-ews-laju-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju2+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '0_3')	{ $('#ppigd-ews-laju-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju3+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '2_4')	{ $('#ppigd-ews-laju-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju4+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === '3_5')	{ $('#ppigd-ews-laju-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju5+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_respirasi === 'bk_6')	{ $('#ppigd-ews-laju-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_laju6+'</b></i>') } ;
			// END Laju Respirasi /Menit 
			
			// START Saturasi O₂ (%
				let ews_saturasi1 = '≤91';
				let ews_saturasi2 = '92-93';
				let ews_saturasi3 = '94-95';
				let ews_saturasi4 = '≥96';
				$('#ppigd-ews-saturasi-1').html(ews_saturasi1);
				$('#ppigd-ews-saturasi-2').html(ews_saturasi2); 
				$('#ppigd-ews-saturasi-3').html(ews_saturasi3);  
				$('#ppigd-ews-saturasi-4').html(ews_saturasi4);  
					 if (kajian_keperawatan.sew_saturasi === '3_1')	{ $('#ppigd-ews-saturasi-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi1+'</b></i>') }
				else if (kajian_keperawatan.sew_saturasi === '2_2')	{ $('#ppigd-ews-saturasi-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_saturasi === '1_3')	{ $('#ppigd-ews-saturasi-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_saturasi === '0_4')	{ $('#ppigd-ews-saturasi-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_saturasi4+'</b></i>') };				
			// END Saturasi O₂ (%


			// START Suplemen O₂ (%)
				$('#ppigd-ews-suplemen-1').html('Ya');
				$('#ppigd-ews-suplemen-2').html('Tidak'); 
					 if (kajian_keperawatan.sew_suplemen === '2_1')	{ $('#ppigd-ews-suplemen-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  Ya</b></i>') }	 
				else if (kajian_keperawatan.sew_suplemen === '0_2')	{ $('#ppigd-ews-suplemen-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  Tidak</b></i>') } ;
			// END Suplemen O₂ (%)

			// START Temperatur (°C)
				let ews_temperatur1 = '≤35';
				let ews_temperatur2 = '35.1-36';
				let ews_temperatur3 = '36.1-38';
				let ews_temperatur4 = '38.1-39';
				let ews_temperatur5 = '≥39';
				$('#ppigd-ews-temperatur-1').html(ews_temperatur1);
				$('#ppigd-ews-temperatur-2').html(ews_temperatur2); 
				$('#ppigd-ews-temperatur-3').html(ews_temperatur3);  
				$('#ppigd-ews-temperatur-4').html(ews_temperatur4);  
				$('#ppigd-ews-temperatur-5').html(ews_temperatur5);
					 if (kajian_keperawatan.sew_temperatur === '3_1')	{ $('#ppigd-ews-temperatur-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur1+'</b></i>') }
				else if (kajian_keperawatan.sew_temperatur === '1_2')	{ $('#ppigd-ews-temperatur-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_temperatur === '0_3')	{ $('#ppigd-ews-temperatur-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_temperatur === '1_4')	{ $('#ppigd-ews-temperatur-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur4+'</b></i>') }
				else if (kajian_keperawatan.sew_temperatur === '2_5')	{ $('#ppigd-ews-temperatur-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_temperatur5+'</b></i>') };				
			// END Temperatur (°C)

			// STAR TDS (mmHg)
				let ews_tds1 = '71-90';
				let ews_tds2 = '91-100';
				let ews_tds3 = '101-110';
				let ews_tds4 = '111-180';
				let ews_tds5 = '181-220';
				let ews_tds6 = '≥221';
				let ews_tds7 = '≤70';
				$('#ppigd-ews-tds-1').html(ews_tds1);
				$('#ppigd-ews-tds-2').html(ews_tds2); 
				$('#ppigd-ews-tds-3').html(ews_tds3);  
				$('#ppigd-ews-tds-4').html(ews_tds4);  
				$('#ppigd-ews-tds-5').html(ews_tds5);  
				$('#ppigd-ews-tds-6').html(ews_tds6);  
				$('#ppigd-ews-tds-7').html(ews_tds7);  
					 if (kajian_keperawatan.sew_tds === '3_1')	{ $('#ppigd-ews-tds-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds1+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === '2_2')	{ $('#ppigd-ews-tds-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds2+'</b></i>') } 	 
				else if (kajian_keperawatan.sew_tds === '1_3')	{ $('#ppigd-ews-tds-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds3+'</b></i>') }	 
				else if (kajian_keperawatan.sew_tds === '0_4')	{ $('#ppigd-ews-tds-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds4+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === '1_5')	{ $('#ppigd-ews-tds-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds5+'</b></i>') }	 
				else if (kajian_keperawatan.sew_tds === '3_6')	{ $('#ppigd-ews-tds-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds6+'</b></i>') }
				else if (kajian_keperawatan.sew_tds === 'bk_7')	{ $('#ppigd-ews-tds-7').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_tds7+'</b></i>') };				
			// END TDS (mmHg)

			// STAR Laju Jantung /Menit
				let ews_jantung1 = '41-50';
				let ews_jantung2 = '51-90';
				let ews_jantung3 = '91-110';
				let ews_jantung4 = '111-130';
				let ews_jantung5 = '131-140';
				let ews_jantung6 = '≤40 / ≥140';
				$('#ppigd-ews-jantung-1').html(ews_jantung1);
				$('#ppigd-ews-jantung-2').html(ews_jantung2);
				$('#ppigd-ews-jantung-3').html(ews_jantung3);
				$('#ppigd-ews-jantung-4').html(ews_jantung4);
				$('#ppigd-ews-jantung-5').html(ews_jantung5);
				$('#ppigd-ews-jantung-6').html(ews_jantung6);
					 if (kajian_keperawatan.sew_laju_jantung === '1_2') { $('#ppigd-ews-jantung-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung1+'</b></i>') }
				else if (kajian_keperawatan.sew_laju_jantung === '0_2') { $('#ppigd-ews-jantung-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung2+'</b></i>') }
				else if (kajian_keperawatan.sew_laju_jantung === '1_3') { $('#ppigd-ews-jantung-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung3+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === '2_4') { $('#ppigd-ews-jantung-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung4+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === '3_5') { $('#ppigd-ews-jantung-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung5+'</b></i>') } 
				else if (kajian_keperawatan.sew_laju_jantung === 'bk_8'){ $('#ppigd-ews-jantung-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b>  '+ews_jantung6+'</b></i>') } ;			
			// END Laju Jantung /Menit

			// STAR Kesadaran
				let ews_kesadaran1 = 'A';
				let ews_kesadaran2 = 'V & P';
				let ews_kesadaran3 = 'U';
				$('#ppigd-ews-kesadaran-1').html(ews_kesadaran1);
				$('#ppigd-ews-kesadaran-2').html(ews_kesadaran2);
				$('#ppigd-ews-kesadaran-3').html(ews_kesadaran3);
					 if (kajian_keperawatan.sew_kesadaran === '0_1')  { $('#ppigd-ews-kesadaran-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran1+'</b></i>') }
				else if (kajian_keperawatan.sew_kesadaran === '3_2')  { $('#ppigd-ews-kesadaran-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran2+'</b></i>') }
				else if (kajian_keperawatan.sew_kesadaran === 'bk_9') { $('#ppigd-ews-kesadaran-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_kesadaran3+'</b></i>') };
			// END Kesadaran

			// STAR Total
				let ews_total1 = '<i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>';
				let ews_total2 = '<i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>';
				let ews_total3 = '<i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>';
				let ews_total4 = '<i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>';
				$('#ppigd-ews-total-1').html(ews_total1);
				$('#ppigd-ews-total-2').html(ews_total2);
				$('#ppigd-ews-total-3').html(ews_total3);
				$('#ppigd-ews-total-4').html(ews_total4);
					 if (kajian_keperawatan.sew_total === 'Putih')  { $('#ppigd-ews-total-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total1+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Hijau')  { $('#ppigd-ews-total-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total2+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Kuning') { $('#ppigd-ews-total-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total3+'</b></i>') }
				else if (kajian_keperawatan.sew_total === 'Merah')  { $('#ppigd-ews-total-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+ews_total4+'</b></i>') };
			// END  Total
		// END -------- SKALA EARLY WARNING SYSTEM (EWS) --------

		// STAR -------- SKALA EARLY WARNING SYSTEM (EWS) PEWS --------

			// STAR Suhu
				let pews_suhu1 = '< 35';
				let pews_suhu2 = '35.1-36';
				let pews_suhu3 = '36.1-38';
				let pews_suhu4 = '38.1-38.5';
				let pews_suhu5 = '> 38.5';
				$('#ppigd-pews-suhu-1').html(pews_suhu1);
				$('#ppigd-pews-suhu-2').html(pews_suhu2);
				$('#ppigd-pews-suhu-3').html(pews_suhu3);
				$('#ppigd-pews-suhu-4').html(pews_suhu4);
				$('#ppigd-pews-suhu-5').html(pews_suhu5);
					 if (kajian_keperawatan.pews_suhu === '2_1') { $('#ppigd-pews-suhu-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu1+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '1_2') { $('#ppigd-pews-suhu-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu2+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '0_3') { $('#ppigd-pews-suhu-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu3+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '1_4') { $('#ppigd-pews-suhu-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu4+'</b></i>') }
				else if (kajian_keperawatan.pews_suhu === '2_5') { $('#ppigd-pews-suhu-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_suhu5+'</b></i>') } ;
			// END  Suhu

			// STAR Pernafasan
				// Pernafasan < 28 Hari (A)
					let pews_pernafasan1a = '< 20';
					let pews_pernafasan2a = '30-39';
					let pews_pernafasan3a = '40-60';
					let pews_pernafasan4a = '> 60';
					$('#ppigd-pews-pernafasan-1a').html(pews_pernafasan1a);
					$('#ppigd-pews-pernafasan-2a').html(pews_pernafasan2a);
					$('#ppigd-pews-pernafasan-3a').html(pews_pernafasan3a);
					$('#ppigd-pews-pernafasan-4a').html(pews_pernafasan4a);
						 if (kajian_keperawatan.pews_pernafasan === '3_1') { $('#ppigd-pews-pernafasan-1a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_2') { $('#ppigd-pews-pernafasan-2a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_3') { $('#ppigd-pews-pernafasan-3a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3a+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_4') { $('#ppigd-pews-pernafasan-4a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4a+'</b></i>') };

				// Pernafasan 1-12 Bulan (B)
					let pews_pernafasan1b = '≤ 20';
					let pews_pernafasan2b = '20-29';
					let pews_pernafasan3b = '30-40';
					let pews_pernafasan4b = '41-50';
					let pews_pernafasan5b = '51-60';
					let pews_pernafasan6b = '≥ 60';
					$('#ppigd-pews-pernafasan-1b').html(pews_pernafasan1b);
					$('#ppigd-pews-pernafasan-2b').html(pews_pernafasan2b);
					$('#ppigd-pews-pernafasan-3b').html(pews_pernafasan3b);
					$('#ppigd-pews-pernafasan-4b').html(pews_pernafasan4b);
					$('#ppigd-pews-pernafasan-5b').html(pews_pernafasan5b);
					$('#ppigd-pews-pernafasan-6b').html(pews_pernafasan6b);
						 if (kajian_keperawatan.pews_pernafasan === '3_5') { $('#ppigd-pews-pernafasan-1b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_6') { $('#ppigd-pews-pernafasan-2b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_7') { $('#ppigd-pews-pernafasan-3b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_8') { $('#ppigd-pews-pernafasan-4b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_9') { $('#ppigd-pews-pernafasan-5b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5b+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_10') { $('#ppigd-pews-pernafasan-6b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan6b+'</b></i>') };

				// Pernafasan 13-36 Bulan (C)
					let pews_pernafasan1c = '< 20<';
					let pews_pernafasan2c = '20-30';
					let pews_pernafasan3c = '31-50';
					let pews_pernafasan4c = '51-60';
					let pews_pernafasan5c = '> 60<';
					$('#ppigd-pews-pernafasan-1c').html(pews_pernafasan1c);
					$('#ppigd-pews-pernafasan-2c').html(pews_pernafasan2c);
					$('#ppigd-pews-pernafasan-3c').html(pews_pernafasan3c);
					$('#ppigd-pews-pernafasan-4c').html(pews_pernafasan4c);
					$('#ppigd-pews-pernafasan-5c').html(pews_pernafasan5c);
						 if (kajian_keperawatan.pews_pernafasan === '3_11') { $('#ppigd-pews-pernafasan-1c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_12') { $('#ppigd-pews-pernafasan-2c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_13') { $('#ppigd-pews-pernafasan-3c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_14') { $('#ppigd-pews-pernafasan-4c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4c+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_15') { $('#ppigd-pews-pernafasan-5c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5c+'</b></i>') };

				// Pernafasan 4-6 Tahun (D)
					let pews_pernafasan1d = '< 20';
					let pews_pernafasan2d = '20-30';
					let pews_pernafasan3d = '31-50';
					let pews_pernafasan4d = '51-60';
					let pews_pernafasan5d = '> 60';
					$('#ppigd-pews-pernafasan-1d').html(pews_pernafasan1d);
					$('#ppigd-pews-pernafasan-2d').html(pews_pernafasan2d);
					$('#ppigd-pews-pernafasan-3d').html(pews_pernafasan3d);
					$('#ppigd-pews-pernafasan-4d').html(pews_pernafasan4d);
					$('#ppigd-pews-pernafasan-5d').html(pews_pernafasan5d);
						 if (kajian_keperawatan.pews_pernafasan === '3_16') { $('#ppigd-pews-pernafasan-1d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_17') { $('#ppigd-pews-pernafasan-2d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_18') { $('#ppigd-pews-pernafasan-3d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_19') { $('#ppigd-pews-pernafasan-4d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4d+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_20') { $('#ppigd-pews-pernafasan-5d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5d+'</b></i>') };

				// Pernafasan 7-12 Tahun (E)
					let pews_pernafasan1e = '< 10';
					let pews_pernafasan2e = '10-20';
					let pews_pernafasan3e = '21-30';
					let pews_pernafasan4e = '31-40';
					let pews_pernafasan5e = '> 40';
					$('#ppigd-pews-pernafasan-1e').html(pews_pernafasan1e);
					$('#ppigd-pews-pernafasan-2e').html(pews_pernafasan2e);
					$('#ppigd-pews-pernafasan-3e').html(pews_pernafasan3e);
					$('#ppigd-pews-pernafasan-4e').html(pews_pernafasan4e);
					$('#ppigd-pews-pernafasan-5e').html(pews_pernafasan5e);
						 if (kajian_keperawatan.pews_pernafasan === '3_21') { $('#ppigd-pews-pernafasan-1e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_22') { $('#ppigd-pews-pernafasan-2e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_23') { $('#ppigd-pews-pernafasan-3e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_24') { $('#ppigd-pews-pernafasan-4e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4e+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_25') { $('#ppigd-pews-pernafasan-5e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5e+'</b></i>') };


				// Pernafasan 13-18 Tahun (F)
					let pews_pernafasan1f = '< 10';
					let pews_pernafasan2f = '10-20';
					let pews_pernafasan3f = '21-30';
					let pews_pernafasan4f = '31-40';
					let pews_pernafasan5f = '> 40';
					$('#ppigd-pews-pernafasan-1f').html(pews_pernafasan1f);
					$('#ppigd-pews-pernafasan-2f').html(pews_pernafasan2f);
					$('#ppigd-pews-pernafasan-3f').html(pews_pernafasan3f);
					$('#ppigd-pews-pernafasan-4f').html(pews_pernafasan4f);
					$('#ppigd-pews-pernafasan-5f').html(pews_pernafasan5f);
						 if (kajian_keperawatan.pews_pernafasan === '3_26') { $('#ppigd-pews-pernafasan-1f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan1f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '0_27') { $('#ppigd-pews-pernafasan-2f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan2f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '1_28') { $('#ppigd-pews-pernafasan-3f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan3f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '2_29') { $('#ppigd-pews-pernafasan-4f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan4f+'</b></i>') }
					else if (kajian_keperawatan.pews_pernafasan === '3_30') { $('#ppigd-pews-pernafasan-5f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_pernafasan5f+'</b></i>') };

				// Pernafasan SUB
					let pews_subpernafasan1 = 'Tidak Retraksi';
					let pews_subpernafasan2 = 'Otot Bantu Nafas';
					let pews_subpernafasan3 = 'Retraksi';
					let pews_subpernafasan4 = 'Merintih';
					$('#ppigd-pews-subpernafasan-1').html(pews_subpernafasan1);
					$('#ppigd-pews-subpernafasan-2').html(pews_subpernafasan2);
					$('#ppigd-pews-subpernafasan-3').html(pews_subpernafasan3);
					$('#ppigd-pews-subpernafasan-4').html(pews_subpernafasan4);
						 if (kajian_keperawatan.pews_subpernafasan === '0_1') { $('#ppigd-pews-subpernafasan-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan1+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '1_2') { $('#ppigd-pews-subpernafasan-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan2+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '2_3') { $('#ppigd-pews-subpernafasan-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan3+'</b></i>') }
					else if (kajian_keperawatan.pews_subpernafasan === '3_4') { $('#ppigd-pews-subpernafasan-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_subpernafasan4+'</b></i>') };

			// END Pernafasan

			// START Alat Bantu O₂
				let pews_alat_bantu1 = 'No';
				let pews_alat_bantu2 = '> 3L /Menit';
				let pews_alat_bantu3 = '> 6L /Menit';
				let pews_alat_bantu4 = '> 8L /Menit';
				$('#ppigd-pews-alat_bantu-1').html(pews_alat_bantu1);
				$('#ppigd-pews-alat_bantu-2').html(pews_alat_bantu2);
				$('#ppigd-pews-alat_bantu-3').html(pews_alat_bantu3);
				$('#ppigd-pews-alat_bantu-4').html(pews_alat_bantu4);
					 if (kajian_keperawatan.pews_alat_bantu === '0_1') { $('#ppigd-pews-alat_bantu-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu1+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '1_2') { $('#ppigd-pews-alat_bantu-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu2+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '2_3') { $('#ppigd-pews-alat_bantu-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu3+'</b></i>') }
				else if (kajian_keperawatan.pews_alat_bantu === '3_4') { $('#ppigd-pews-alat_bantu-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_alat_bantu4+'</b></i>') };
			// END Alat Bantu O₂
			
			// START Saturasi O₂
				let pews_saturasi1 = '≤ 85';
				let pews_saturasi2 = '86-89';
				let pews_saturasi3 = '90-93';
				let pews_saturasi4 = '≥ 94';
				$('#ppigd-pews-saturasi-1').html(pews_saturasi1);
				$('#ppigd-pews-saturasi-2').html(pews_saturasi2);
				$('#ppigd-pews-saturasi-3').html(pews_saturasi3);
				$('#ppigd-pews-saturasi-4').html(pews_saturasi4);
					 if (kajian_keperawatan.pews_saturasi === '3_1') { $('#ppigd-pews-saturasi-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi1+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '2_2') { $('#ppigd-pews-saturasi-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi2+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '1_3') { $('#ppigd-pews-saturasi-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi3+'</b></i>') }
				else if (kajian_keperawatan.pews_saturasi === '0_4') { $('#ppigd-pews-saturasi-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_saturasi4+'</b></i>') };
			// END Saturasi O₂

			// START Nadi 
				//Nadi < 28 Hari (A)
					let pews_nadi1a = '< 80';
					let pews_nadi2a = '81-90';
					let pews_nadi3a = '91-99';
					let pews_nadi4a = '100-180';
					let pews_nadi5a = '181-190';
					let pews_nadi6a = '≥ 200';
					$('#ppigd-pews-nadi-1a').html(pews_nadi1a);
					$('#ppigd-pews-nadi-2a').html(pews_nadi2a);
					$('#ppigd-pews-nadi-3a').html(pews_nadi3a);
					$('#ppigd-pews-nadi-4a').html(pews_nadi4a);
					$('#ppigd-pews-nadi-5a').html(pews_nadi5a);
					$('#ppigd-pews-nadi-6a').html(pews_nadi6a);
						 if (kajian_keperawatan.pews_nadi === '3_1') { $('#ppigd-pews-nadi-1a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_2') { $('#ppigd-pews-nadi-2a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_3') { $('#ppigd-pews-nadi-3a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_4') { $('#ppigd-pews-nadi-4a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_5') { $('#ppigd-pews-nadi-5a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5a+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_6') { $('#ppigd-pews-nadi-6a').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6a+'</b></i>') };

				//Nadi 1-12 Bulan (B)
					let pews_nadi1b = '< 90';
					let pews_nadi2b = '90-99';
					let pews_nadi3b = '100-109';
					let pews_nadi4b = '110-160';
					let pews_nadi5b = '161-170';
					let pews_nadi6b = '171-190';
					let pews_nadi7b = '≥ 190';
					$('#ppigd-pews-nadi-1b').html(pews_nadi1b);
					$('#ppigd-pews-nadi-2b').html(pews_nadi2b);
					$('#ppigd-pews-nadi-3b').html(pews_nadi3b);
					$('#ppigd-pews-nadi-4b').html(pews_nadi4b);
					$('#ppigd-pews-nadi-5b').html(pews_nadi5b);
					$('#ppigd-pews-nadi-6b').html(pews_nadi6b);
					$('#ppigd-pews-nadi-7b').html(pews_nadi7b);
						 if (kajian_keperawatan.pews_nadi === '3_7') { $('#ppigd-pews-nadi-1b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_8') { $('#ppigd-pews-nadi-2b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_9') { $('#ppigd-pews-nadi-3b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_10') { $('#ppigd-pews-nadi-4b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_11') { $('#ppigd-pews-nadi-5b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_12') { $('#ppigd-pews-nadi-6b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6b+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_13') { $('#ppigd-pews-nadi-7b').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7b+'</b></i>') };

				//Nadi 13-36 Bulan (C)
					let pews_nadi1c = '≤ 70';
					let pews_nadi2c = '70-79';
					let pews_nadi3c = '80-89';
					let pews_nadi4c = '90-140';
					let pews_nadi5c = '141-160';
					let pews_nadi6c = '161-170';
					let pews_nadi7c = '> 170';
					$('#ppigd-pews-nadi-1c').html(pews_nadi1c);
					$('#ppigd-pews-nadi-2c').html(pews_nadi2c);
					$('#ppigd-pews-nadi-3c').html(pews_nadi3c);
					$('#ppigd-pews-nadi-4c').html(pews_nadi4c);
					$('#ppigd-pews-nadi-5c').html(pews_nadi5c);
					$('#ppigd-pews-nadi-6c').html(pews_nadi6c);
					$('#ppigd-pews-nadi-7c').html(pews_nadi7c);
						 if (kajian_keperawatan.pews_nadi === '3_14') { $('#ppigd-pews-nadi-1c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_15') { $('#ppigd-pews-nadi-2c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_16') { $('#ppigd-pews-nadi-3c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_17') { $('#ppigd-pews-nadi-4c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_18') { $('#ppigd-pews-nadi-5c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_19') { $('#ppigd-pews-nadi-6c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6c+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_20') { $('#ppigd-pews-nadi-7c').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7c+'</b></i>') };

				//Nadi 4-6 Tahun (D)
					let pews_nadi1d = '< 60';
					let pews_nadi2d = '70-79';
					let pews_nadi3d = '80-89';
					let pews_nadi4d = '80-120';
					let pews_nadi5d = '121-140';
					let pews_nadi6d = '141-160';
					let pews_nadi7d = '> 160';
					$('#ppigd-pews-nadi-1d').html(pews_nadi1d);
					$('#ppigd-pews-nadi-2d').html(pews_nadi2d);
					$('#ppigd-pews-nadi-3d').html(pews_nadi3d);
					$('#ppigd-pews-nadi-4d').html(pews_nadi4d);
					$('#ppigd-pews-nadi-5d').html(pews_nadi5d);
					$('#ppigd-pews-nadi-6d').html(pews_nadi6d);
					$('#ppigd-pews-nadi-7d').html(pews_nadi7d);
						 if (kajian_keperawatan.pews_nadi === '3_21') { $('#ppigd-pews-nadi-1d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_22') { $('#ppigd-pews-nadi-2d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_23') { $('#ppigd-pews-nadi-3d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_24') { $('#ppigd-pews-nadi-4d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_25') { $('#ppigd-pews-nadi-5d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_26') { $('#ppigd-pews-nadi-6d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6d+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_27') { $('#ppigd-pews-nadi-7d').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7d+'</b></i>') };

				//Nadi 7-12 Tahun (E)
					let pews_nadi1e = '< 60';
					let pews_nadi2e = '60-69';
					let pews_nadi3e = '70-79';
					let pews_nadi4e = '55-100';
					let pews_nadi5e = '101-120';
					let pews_nadi6e = '121-140';
					let pews_nadi7e = '> 140';
					$('#ppigd-pews-nadi-1e').html(pews_nadi1e);
					$('#ppigd-pews-nadi-2e').html(pews_nadi2e);
					$('#ppigd-pews-nadi-3e').html(pews_nadi3e);
					$('#ppigd-pews-nadi-4e').html(pews_nadi4e);
					$('#ppigd-pews-nadi-5e').html(pews_nadi5e);
					$('#ppigd-pews-nadi-6e').html(pews_nadi6e);
					$('#ppigd-pews-nadi-7e').html(pews_nadi7e);
						 if (kajian_keperawatan.pews_nadi === '3_28') { $('#ppigd-pews-nadi-1e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_29') { $('#ppigd-pews-nadi-2e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_30') { $('#ppigd-pews-nadi-3e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_31') { $('#ppigd-pews-nadi-4e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_32') { $('#ppigd-pews-nadi-5e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_33') { $('#ppigd-pews-nadi-6e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6e+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_34') { $('#ppigd-pews-nadi-7e').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7e+'</b></i>') };

				//Nadi 13-18 Tahun (F)
					let pews_nadi1f = '< 60';
					let pews_nadi2f = '60-69';
					let pews_nadi3f = '70-79';
					let pews_nadi4f = '55-100';
					let pews_nadi5f = '101-120';
					let pews_nadi6f = '121-140';
					let pews_nadi7f = '> 140';
					$('#ppigd-pews-nadi-1f').html(pews_nadi1f);
					$('#ppigd-pews-nadi-2f').html(pews_nadi2f);
					$('#ppigd-pews-nadi-3f').html(pews_nadi3f);
					$('#ppigd-pews-nadi-4f').html(pews_nadi4f);
					$('#ppigd-pews-nadi-5f').html(pews_nadi5f);
					$('#ppigd-pews-nadi-6f').html(pews_nadi6f);
					$('#ppigd-pews-nadi-7f').html(pews_nadi7f);
						 if (kajian_keperawatan.pews_nadi === '3_35') { $('#ppigd-pews-nadi-1f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi1f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_36') { $('#ppigd-pews-nadi-2f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi2f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_37') { $('#ppigd-pews-nadi-3f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi3f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '0_38') { $('#ppigd-pews-nadi-4f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi4f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '1_39') { $('#ppigd-pews-nadi-5f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi5f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '2_40') { $('#ppigd-pews-nadi-6f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi6f+'</b></i>') }
					else if (kajian_keperawatan.pews_nadi === '3_41') { $('#ppigd-pews-nadi-7f').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_nadi7f+'</b></i>') };
			// END Nadi

			// START Warna Kulit
				let pews_kulit1 = 'Tidak Sianosis /CRT < 2 S';
				let pews_kulit2 = 'Tampak Sianotik /CRT > 2 S';
				let pews_kulit3 = 'Sianotik dan Motled /CRT > 5 S';
				$('#ppigd-pews-kulit-1').html(pews_kulit1);
				$('#ppigd-pews-kulit-2').html(pews_kulit2);
				$('#ppigd-pews-kulit-3').html(pews_kulit3);
					 if (kajian_keperawatan.pews_warna_kulit === '0_1') { $('#ppigd-pews-kulit-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit1+'</b></i>') }
				else if (kajian_keperawatan.pews_warna_kulit === '2_2') { $('#ppigd-pews-kulit-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit2+'</b></i>') }
				else if (kajian_keperawatan.pews_warna_kulit === '3_3') { $('#ppigd-pews-kulit-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kulit3+'</b></i>') };			
			// END Warna Kulit

			// START TDS
				let pews_tds1 = '≤ 80';
				let pews_tds2 = '80-89';
				let pews_tds3 = '90-119';
				let pews_tds4 = '120-129';
				let pews_tds5 = '130-139';
				let pews_tds6 = '> 140';
				$('#ppigd-pews-tds-1').html(pews_tds1);
				$('#ppigd-pews-tds-2').html(pews_tds2);
				$('#ppigd-pews-tds-3').html(pews_tds3);
				$('#ppigd-pews-tds-4').html(pews_tds4);
				$('#ppigd-pews-tds-5').html(pews_tds5);
				$('#ppigd-pews-tds-6').html(pews_tds6);
					if (kajian_keperawatan.pews_tds === '3_1') { $('#ppigd-pews-tds-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds1+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '1_2') { $('#ppigd-pews-tds-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds2+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '0_3') { $('#ppigd-pews-tds-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds3+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '1_4') { $('#ppigd-pews-tds-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds4+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '2_5') { $('#ppigd-pews-tds-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds5+'</b></i>') }
				else if (kajian_keperawatan.pews_tds === '3_6') { $('#ppigd-pews-tds-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_tds6+'</b></i>') };
			// END TDS

			// START  Kesadaran
				let pews_kesadaran1 = 'P/U';
				let pews_kesadaran2 = 'V';
				let pews_kesadaran3 = 'A';
				let pews_kesadaran4 = 'V';
				let pews_kesadaran5 = 'P/U';
				$('#ppigd-pews-kesadaran-1').html(pews_kesadaran1);
				$('#ppigd-pews-kesadaran-2').html(pews_kesadaran2);
				$('#ppigd-pews-kesadaran-3').html(pews_kesadaran3);
				$('#ppigd-pews-kesadaran-4').html(pews_kesadaran4);
				$('#ppigd-pews-kesadaran-5').html(pews_kesadaran5);
					 if (kajian_keperawatan.pews_kesadaran === '3_1') { $('#ppigd-pews-kesadaran-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran1+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '1_2') { $('#ppigd-pews-kesadaran-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran2+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '0_3') { $('#ppigd-pews-kesadaran-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran3+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '1_4') { $('#ppigd-pews-kesadaran-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran4+'</b></i>') }
				else if (kajian_keperawatan.pews_kesadaran === '3_5') { $('#ppigd-pews-kesadaran-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_kesadaran5+'</b></i>') };
			// END Kesadaran

			// START TOTAL
				let pews_total1 = '<i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (0-2)</b>';
				let pews_total2 = '<i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (3-4)</b>';
				let pews_total3 = '<i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥5/3 Pada salah satu parameter)</b>';
				$('#ppigd-pews-total-1').html(pews_total1);
				$('#ppigd-pews-total-2').html(pews_total2);
				$('#ppigd-pews-total-3').html(pews_total3);
					 if (kajian_keperawatan.pews_total === 'Hijau')  { $('#ppigd-pews-total-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total1+'</b></i>') }
				else if (kajian_keperawatan.pews_total === 'Kuning') { $('#ppigd-pews-total-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total2+'</b></i>') }
				else if (kajian_keperawatan.pews_total === 'Merah')  { $('#ppigd-pews-total-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+pews_total3+'</b></i>') };
			// END TOTAL
		// END -------- SKALA EARLY WARNING SYSTEM (EWS) PEWS --------


		// START -------- PENGKAJIAN SPIRITUAL --------
			$('#ppigd-spiritual-kegiatan').html(kajian_keperawatan.kegiatan_keagamaan);
			// wajib ibadah
					if(kajian_keperawatan.wajib_ibadah === 'Baligh')		{ $('#ppigd-spiritual-ibadah').html('Baligh') }
				else if(kajian_keperawatan.wajib_ibadah === 'Belum Baligh')	{ $('#ppigd-spiritual-ibadah').html('Belum Baligh') }
				else if(kajian_keperawatan.wajib_ibadah === 'Halangan')		{ $('#ppigd-spiritual-ibadah').html('Halangan Lain : '+kajian_keperawatan.ket_halangan) };
			// Thaharoh
					 if(kajian_keperawatan.thaharoh === 'Berwudhu')		{ $('#ppigd-spiritual-thaharoh').html('Berwudhu') }
				else if(kajian_keperawatan.thaharoh === 'Tayamum')		{ $('#ppigd-spiritual-thaharoh').html('Tayamum') };
			// Sholat
					 if(kajian_keperawatan.sholat === 'Berdiri')		{ $('#ppigd-spiritual-sholat').html('Berdiri') }
				else if(kajian_keperawatan.sholat === 'Duduk')			{ $('#ppigd-spiritual-sholat').html('Duduk') }
				else if(kajian_keperawatan.sholat === 'Berbaring')		{ $('#ppigd-spiritual-sholat').html('Berbaring') };		
		// END -------- PENGKAJIAN SPIRITUAL --------


		// START -------- STATUS NUTRISI DAN STATUS FUNGSIONAL --------
			// Adakah Penurunan Berat Badan
				var pnbb = JSON.parse(kajian_keperawatan.status_nutrisi);
				if (pnbb.penurunan_bb === '0')		{ $('#ppigd-nutrisi-penurunanbb').html('Tidak'); } 
				if (pnbb.penurunan_bb === '1')		{ $('#ppigd-nutrisi-penurunanbb').html('Ya '+pnbb.ket_penurunan_bb+' Kg'); } 

			//STATUS FUNGSIONAL
				var st_fung = '';
				var fungsional = JSON.parse(kajian_keperawatan.status_fungsional);
				if (fungsional.mandiri === '1')				{ if(st_fung==='') {st_fung='Mandiri'} 					else {st_fung=st_fung+' & Mandiri '} } 			
				if (fungsional.perlu_bantuan === '1') 		{ if(st_fung==='') {st_fung='Perlu Bantuan'}			else {st_fung=st_fung+' & Perlu Bantuan'} } 
				if (fungsional.ketergantungan === '1')		{ if(st_fung==='') {st_fung='Ketergantungan total, dilaporkan ke dokter pukul '+fungsional.ket_ketergantungan} 	else {st_fung=st_fung+' & Ketergantungan total, dilaporkan ke dokter pukul '+fungsional.ket_ketergantungan} } 	
				$('#ppigd-nutrisi-fungsional').html(st_fung);
				
		// END -------- STATUS NUTRISI DAN STATUS FUNGSIONAL --------

	
		// START -------- MASALAH KEPERAWATAN --------
			let keperawatan_1 = 'Bersihan Jalan Nafas Tidak Efektif';
			let keperawatan_2 = 'Diare';
			let keperawatan_3 = 'Ansietas';
			let keperawatan_4 = 'Pola Nafas Tidak Efektif';
			let keperawatan_5 = 'Intoleransi Aktivitas';
			let keperawatan_6 = 'Berduka';
			let keperawatan_7 = 'Gangguan Pertukaran Gas';
			let keperawatan_8 = 'Gangguan Mobilitas Fisik';
			let keperawatan_9 = 'Gangguan Interaksi Sosial';
			let keperawatan_10 = 'Gangguan Ventilasi Spontan';
			let keperawatan_11 = 'Penurunan Kapasitas Adaptif Intrakranial';
			let keperawatan_12 = 'Risiko Cedera';
			let keperawatan_13 = 'Penurunan Curah Jantung';
			let keperawatan_14 = 'Nyeri Akut';
			let keperawatan_15 = 'Risiko Aspirasi';
			let keperawatan_16 = 'Perfusi Perifer Tidak Efektif';
			let keperawatan_17 = 'Nyeri Kronis';
			let keperawatan_18 = 'Risiko Pendarahan';
			let keperawatan_19 = 'Nausea';
			let keperawatan_20 = 'Nyeri Melahirkan';
			let keperawatan_21 = 'Risiko Syok';
			let keperawatan_22 = 'Defisit Nutrisi';
			let keperawatan_23 = 'Defisit Perawatan Diri';
			let keperawatan_24 = 'Risiko Jatuh';
			let keperawatan_25 = 'Hipervolemia';
			let keperawatan_26 = 'Hipertermia';
			let keperawatan_27 = 'Risiko Luka Tekan';
			let keperawatan_28 = 'Hipovolemia';
			let keperawatan_29 = 'Hipertermi';
			let keperawatan_30 = 'Lain-lain';
			let keperawatan_31 = 'Ketidakstabilan Kadar Glukosa Darah';
			let keperawatan_32 = 'Ketegangan Peran Pemberi Asuhan';
			let keperawatan_33 = 'Gangguan Eliminasi Urin';
			let keperawatan_34 = 'Resiko Gangguan Integritas Kulit / Jaringan';

			var keper = JSON.parse(kajian_keperawatan.masalah_keperawatan);
			if (keper.ket_1 === '1')  { $('#ppigd-keperawatan-1').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_1+'</b></i>') }  else {$('#ppigd-keperawatan-1').html(keperawatan_1)} ; 
			if (keper.ket_2 === '1')  { $('#ppigd-keperawatan-2').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_2+'</b></i>') }  else {$('#ppigd-keperawatan-2').html(keperawatan_2)} ; 
			if (keper.ket_3 === '1')  { $('#ppigd-keperawatan-3').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_3+'</b></i>') }  else {$('#ppigd-keperawatan-3').html(keperawatan_3)} ; 
			if (keper.ket_4 === '1')  { $('#ppigd-keperawatan-4').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_4+'</b></i>') }  else {$('#ppigd-keperawatan-4').html(keperawatan_4)} ; 
			if (keper.ket_5 === '1')  { $('#ppigd-keperawatan-5').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_5+'</b></i>') }  else {$('#ppigd-keperawatan-5').html(keperawatan_5)} ; 
			if (keper.ket_6 === '1')  { $('#ppigd-keperawatan-6').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_6+'</b></i>') }  else {$('#ppigd-keperawatan-6').html(keperawatan_6)} ; 
			if (keper.ket_7 === '1')  { $('#ppigd-keperawatan-7').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_7+'</b></i>') }  else {$('#ppigd-keperawatan-7').html(keperawatan_7)} ; 
			if (keper.ket_8 === '1')  { $('#ppigd-keperawatan-8').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_8+'</b></i>') }  else {$('#ppigd-keperawatan-8').html(keperawatan_8)} ; 
			if (keper.ket_9 === '1')  { $('#ppigd-keperawatan-9').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_9+'</b></i>') }  else {$('#ppigd-keperawatan-9').html(keperawatan_9)} ; 
			if (keper.ket_10 === '1') { $('#ppigd-keperawatan-10').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_10+'</b></i>') } else {$('#ppigd-keperawatan-10').html(keperawatan_10)} ; 
			if (keper.ket_11 === '1') { $('#ppigd-keperawatan-11').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_11+'</b></i>') } else {$('#ppigd-keperawatan-11').html(keperawatan_11)} ; 
			if (keper.ket_12 === '1') { $('#ppigd-keperawatan-12').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_12+'</b></i>') } else {$('#ppigd-keperawatan-12').html(keperawatan_12)} ; 
			if (keper.ket_13 === '1') { $('#ppigd-keperawatan-13').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_13+'</b></i>') } else {$('#ppigd-keperawatan-13').html(keperawatan_13)} ; 
			if (keper.ket_14 === '1') { $('#ppigd-keperawatan-14').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_14+'</b></i>') } else {$('#ppigd-keperawatan-14').html(keperawatan_14)} ; 
			if (keper.ket_15 === '1') { $('#ppigd-keperawatan-15').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_15+'</b></i>') } else {$('#ppigd-keperawatan-15').html(keperawatan_15)} ; 
			if (keper.ket_16 === '1') { $('#ppigd-keperawatan-16').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_16+'</b></i>') } else {$('#ppigd-keperawatan-16').html(keperawatan_16)} ; 
			if (keper.ket_17 === '1') { $('#ppigd-keperawatan-17').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_17+'</b></i>') } else {$('#ppigd-keperawatan-17').html(keperawatan_17)} ; 
			if (keper.ket_18 === '1') { $('#ppigd-keperawatan-18').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_18+'</b></i>') } else {$('#ppigd-keperawatan-18').html(keperawatan_18)} ; 
			if (keper.ket_19 === '1') { $('#ppigd-keperawatan-19').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_19+'</b></i>') } else {$('#ppigd-keperawatan-19').html(keperawatan_19)} ; 
			if (keper.ket_20 === '1') { $('#ppigd-keperawatan-20').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_20+'</b></i>') } else {$('#ppigd-keperawatan-20').html(keperawatan_20)} ; 
			if (keper.ket_21 === '1') { $('#ppigd-keperawatan-21').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_21+'</b></i>') } else {$('#ppigd-keperawatan-21').html(keperawatan_21)} ; 
			if (keper.ket_22 === '1') { $('#ppigd-keperawatan-22').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_22+'</b></i>') } else {$('#ppigd-keperawatan-22').html(keperawatan_22)} ; 
			if (keper.ket_23 === '1') { $('#ppigd-keperawatan-23').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_23+'</b></i>') } else {$('#ppigd-keperawatan-23').html(keperawatan_23)} ; 
			if (keper.ket_24 === '1') { $('#ppigd-keperawatan-24').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_24+'</b></i>') } else {$('#ppigd-keperawatan-24').html(keperawatan_24)} ; 
			if (keper.ket_25 === '1') { $('#ppigd-keperawatan-25').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_25+'</b></i>') } else {$('#ppigd-keperawatan-25').html(keperawatan_25)} ; 
			if (keper.ket_26 === '1') { $('#ppigd-keperawatan-26').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_26+'</b></i>') } else {$('#ppigd-keperawatan-26').html(keperawatan_26)} ; 
			if (keper.ket_27 === '1') { $('#ppigd-keperawatan-27').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_27+'</b></i>') } else {$('#ppigd-keperawatan-27').html(keperawatan_27)} ; 
			if (keper.ket_28 === '1') { $('#ppigd-keperawatan-28').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_28+'</b></i>') } else {$('#ppigd-keperawatan-28').html(keperawatan_28)} ; 
			if (keper.ket_29 === '1') { $('#ppigd-keperawatan-29').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_29+'</b></i>') } else {$('#ppigd-keperawatan-29').html(keperawatan_29)} ; 
			if (keper.ket_30 === '1') { $('#ppigd-keperawatan-30').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> Lain-lain ('+keper.ket_lain+')</b></i>') } else {$('#ppigd-keperawatan-30').html(keperawatan_30)} ; 
			if (keper.ket_31 === '1') { $('#ppigd-keperawatan-31').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_31+'</b></i>') } else {$('#ppigd-keperawatan-31').html(keperawatan_31)} ; 
			if (keper.ket_32 === '1') { $('#ppigd-keperawatan-32').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_32+'</b></i>') } else {$('#ppigd-keperawatan-32').html(keperawatan_32)} ; 
			if (keper.ket_33 === '1') { $('#ppigd-keperawatan-33').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_33+'</b></i>') } else {$('#ppigd-keperawatan-33').html(keperawatan_33)} ; 
			if (keper.ket_34 === '1') { $('#ppigd-keperawatan-34').html('<i class="fa fa-check" style="background-color:#D6EAF8 "><b> '+keperawatan_34+'</b></i>') } else {$('#ppigd-keperawatan-34').html(keperawatan_34)} ;				
		// END -------- MASALAH KEPERAWATAN -------- 
	}
	
</script>