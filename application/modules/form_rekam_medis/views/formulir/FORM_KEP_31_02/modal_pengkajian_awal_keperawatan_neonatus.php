<!-- Modal -->
<!-- Intensive Care -->
<div class="modal fade" id="modal_pengkajian_awal_keperawatan_neonatus" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_awal_keperawatan_neonatus">FORM PENGKAJIAN AWAL NEONATUS</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang
                            rawat inap)</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= form_open('', 'id=form_pengkajian_awal_neonatus class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-neonatus">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-neonatus">
                <input type="hidden" name="id_pasien" id="id-pasien-neonatus">
                <input type="hidden" name="id_kajian_neonatus" id="id-kajian-neonatus">
                <input type="hidden" name="id_kajian_medis_neonatus" id="id-kajian-medis-neonatus">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">
                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-neonatus"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="norm-neonatus"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ttl-neonatus"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-neonatus"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="neonatus-bed"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="logo-pasien-alergi">
                                            <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg"
                                                alt="logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
                                        </div>
                                    </td>
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
                            <div id="bwizard_pengkajian_neonatus"> 
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Pengkajian Neonatus <i class="bold"><small>(Diisi Oleh Perawat)</small></i></li>
                                    <li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
                                </ol>
                                <!-- Data bwizard -->
                                <!-- Data Pengkajian Perawat-->
                                <div class="form-data-pengkajian-neonatus">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-neonatus"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-neonatus"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                <span id="desclaimer_history_neonatus"
                                                    style="color:red; font-style:italic;"></span><button
                                                    class="btn btn-success btn-xs mr-1 float-left" type="button"id="btn_history_logs_neonatus"><i
                                                    class="fas fa-fw fa-history mr-1"></i>Show History Logs Neonatus</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="20%" class="bold">Tanggal / Jam Masuk</td>
                                            <td wdith="1%" class="bold">:</td>
                                            <td width="79%"><input type="text" name="waktu_masuk_neonatus"
                                                    id="waktu-masuk-neonatus" class="custom-form clear-input col-lg-2"
                                                    readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tanggal / Jam Pengkajian</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="waktu_pengkajian_neonatus"id="waktu-kajian-neonatus" class="custom-form clear-input col-lg-2"
                                                    value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Agama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="agama_neonatus" id="agama-islam-neonatus"value="Islam" class="mr-1" disabled>Islam
                                                <input type="checkbox" name="agama_neonatus" id="agama-kristen-neonatus"value="Kristen" class="mr-1 ml-2" disabled>Kristen
                                                <input type="checkbox" name="agama_neonatus" id="agama-hindu-neonatus"value="Hindu" class="mr-1 ml-2" disabled>Hindu
                                                <input type="checkbox" name="agama_neonatus" id="agama-katholik-neonatus"value="Katholik" class="mr-1 ml-2" disabled>Katholik
                                                <input type="checkbox" name="agama_neonatus" id="agama-buddha-neonatus"value="Buddha" class="mr-1 ml-2" disabled>Buddha
                                                <input type="radio" name="agama_neonatus" id="agama_neonatus_lain" value="Lain" class="mr-1 ml-2" disabled>Lainnya
                                                <input type="text" name="agama_neonatus" id="agama-lain-input-neonatus"class="custom-form clear-input d-inline-block col-lg-4 ml-1"
                                                    placeholder="Masukkan agama lain" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pendidikan</td>
                                            <td class="bold">:</td>
                                            <td><input type="text" name="pendidikan_neonatus"id="pendidikan-pasien-neonatus" class="custom-form col-lg-3"placeholder="Masukkan pendidikan" disabled></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td class="bold">Cara Masuk RS</td>
                                            <td class="bold">:</td>
                                            <!-- <td>
                                                <input type="checkbox" name="cara_masuk_neonatus"id="cara-masuk-irj-neonatus" value="IRJ" class="mr-1" disabled>IRJ
                                                <input type="checkbox" name="cara_masuk_neonatus"id="cara-masuk-igd-neonatus" value="IGD" class="mr-1 ml-2"disabled>IGD
                                                <input type="checkbox" name="cara_masuk_neonatus"id="cara-masuk-lain-neonatus" value="Lain-lain" class="mr-1 ml-2"disabled>Lain-lain
                                                <input type="text" name="cara_masuk_neonatus"id="cara-masuk-lain-lain-neonatus"class="custom-form clear-input d-inline-block col-lg-4"placeholder="Masukkan cara masuk RS" disabled>
                                            </td> -->
                                            <td>
                                                <input type="checkbox" name="cara_masuk_irj_neonatus"id="cara-masuk-irj-neonatus" value="IRJ" class="mr-1">IRJ
                                                <input type="checkbox" name="cara_masuk_igd_neonatus"id="cara-masuk-igd-neonatus" value="IGD" class="mr-1 ml-2">IGD
                                                <input type="checkbox" name="cara_masuk_lain_neonatus"id="cara-masuk-lain-neonatus" value="Lain-lain" class="mr-1 ml-2">Lain-lain
                                                <input type="text" name="cara_masuk_lain_lain_neonatus"id="cara-masuk-lain-lain-neonatus"class="custom-form clear-input d-inline-block col-lg-4"="Masukkan cara masuk RS" readonly>
                                            </td>
                                        </tr>                                      
                                        <tr>
                                            <td class="bold">Membawa Obat dari Luar</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="membawa_obat" id="membawa-obatt-1"class="mr-1" value="tidak" checked> Tidak                                                     
                                                <input type="radio" name="membawa_obat" id="membawa-obatt-2"class="mr-1 ml-2" value="ya" > Ya &nbsp;&nbsp;&nbsp;(Jika ya, lapor farmasi untuk rekonsiliasi obat)
                                               
                                            </td>
                                        </tr>   
                                        
                                    <!-- NAMA ORANG TUA AYAH OR IBU AWAL -->
                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"data-target="#data-ayah-ibu"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button> NAMA ORANG TUA</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"
                                        id="data-ayah-ibu">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">DATA AYAH</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Nama</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_1" id="data-ayah-1"class="custom-form clear-input"placeholder="Masukkan Nama Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Umur</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_2" id="data-ayah-2"class="custom-form clear-input"placeholder="Masukkan Umur Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Agama</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_3" id="data-ayah-3"class="custom-form clear-input" placeholder="Masukkan Agama Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Pekerjaan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_4" id="data-ayah-4"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Pekerjaan Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Gol Darah</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_5" id="data-ayah-5"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Gol Darah Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Alamat</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_6" id="data-ayah-6"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Alamat Ayah">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Telp</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="data_ayah_7" id="data-ayah-7"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Telp Ayah">
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                   <!-- BATAS AYAH-->

                                                    <!-- BATAS IBU -->
                                                <td colspan="3" class="bold center">DATA IBU</td>
                                                    <tr>
                                                        <tr>
                                                            <td class="bold">Nama</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_1" id="data-ibu-1"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Nama Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Umur</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_2" id="data-ibu-2"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Umur Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Agama</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_3" id="data-ibu-3"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Agama Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Pekerjaan</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_4" id="data-ibu-4"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Pekerjaan Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Gol Darah</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_5" id="data-ibu-5"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Gol Darah Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Alamat</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_6" id="data-ibu-6"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Alamat Ibu">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Telp</td>
                                                            <td class="bold">:</td>
                                                            <td>
                                                                <input type="text" name="data_ibu_7" id="data-ibu-7"
                                                                    class="custom-form clear-input"
                                                                    placeholder="Masukkan Telp Ibu">
                                                            </td>
                                                        </tr>
                                                    </tr>
                                                
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"
                                                    style="margin-top: -15px">                                              
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- NAMA ORANG TUA AYAH OR IBU AKHIR -->

                                    <!-- RIWAYAT KEHAMILAN DAN PERSALINAN IBU AWAL -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-riwayat-kehamilan-dan-persalinan-ibu"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button> RIWAYAT KEHAMILAN DAN PERSALINAN IBU</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"id="data-riwayat-kehamilan-dan-persalinan-ibu">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">GPA</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_1" id="riwayat-kdpi-1"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan GPA">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Usia Kehamilan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_2" id="riwayat-kdpi-2"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Usia Kehamilan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Jenis Persalinan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_3" id="riwayat-kdpi-3"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Jenis Persalinan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Komplikasi Kehamilan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_4" id="riwayat-kdpi-4"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Komplikasi Kehamilan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Penolong Persalinan</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_5" id="riwayat-kdpi-5"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Penolong Persalinan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Warna Ketuban</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_6" id="riwayat-kdpi-6"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Warna Ketuban">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Lain - lain</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kdpi_7" id="riwayat-kdpi-7"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan lain-lain">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- RIWAYAT KEHAMILAN DAN PERSALINAN IBU AKHIR -->

                                    <!-- RIWAYAT KELAHIRAN BAYI AWAL -->
                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-riwayat-kehamilan-bayi"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button> RIWAYAT KELAHIRAN BAYI</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"id="data-riwayat-kehamilan-bayi">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Tanggal Lahir/JAM</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="tangggal_riwayat_kelahiran_bayi" id="tangggal-riwayat-kelahiran-bayi"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Tgl lahir">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Jenis Kelamin</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_1" id="riwayat-kb-1"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Jenis kelamin">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Nilai APGAR</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_2" id="riwayat-kb-2"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Nilai apgar">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Tunggal/Kembar</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_3" id="riwayat-kb-3"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Tunggal/kembar">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Resusitasi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_4" id="riwayat-kb-4"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Resusitasi">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">IMD</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_5" id="riwayat-kb-5"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan IMD">
                                                        </td>
                                                    </tr>
                                                   
                                                    
                                                    
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                   <!-- BATAS RIWAYAT KELAHIRAN BAYI 1-->

                                                    <!-- BATAS RIWAYAT KELAHIRAN BAYI 2 -->
                                                    <tr>
                                                        <td class="bold">BB Lahir</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_6" id="riwayat-kb-6"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan BB Lahir">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Lingkar Kepala</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_7" id="riwayat-kb-7"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Lingkar kepala">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Lingkar Dada</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_8" id="riwayat-kb-8"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Lingkar dada">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Anus</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_9" id="riwayat-kb-9"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan anus">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Meconium</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_10" id="riwayat-kb-10"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Meconium">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Miksi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="riwayat_kb_11" id="riwayat-kb-11"
                                                                class="custom-form clear-input"
                                                                placeholder="Masukkan Miksi">
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"style="margin-top: -15px">                                              
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- RIWAYAT KELAHIRAN BAYI AKHIR -->

                                    <!-- APGAR SCORE AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#data-apgar-score"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>APGAR SCORE
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2" id="data-apgar-score">
                                            <table class="table table-sm" style="margin-top: -15px">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="5%" class="center"><b>No.</b></th>
                                                                    <th width="15%"><b>TANDA</b></th>
                                                                    <th width="15%" class="center"><b>0</b></th>
                                                                    <th width="15%" class="center"><b>1</b></th>
                                                                    <th width="15%" class="center"><b>2</b></th>
                                                                    <th width="2%" class="center"><b></b></th>
                                                                    <th width="15%" class="center"><b>Skor 5 menit pertama</b></th> 
                                                                    <th width="2%" class="center"><b></b></th>
                                                                    <th width="15%" class="center"><b>Skor 5 menit kedua</b></th>                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center">1.</td>
                                                                    <td>Frekuensi Jantung</td>
                                                                    <td class="center"><input type="checkbox" name="apgar_frekuensi_1"
                                                                        id="apgar-frekuensi-1" value="0"class="mr-1" >Tidak ada
                                                                    </td>                                                                          
                                                                    <td class="center"><input type="checkbox" name="apgar_frekuensi_2"
                                                                        id="apgar-frekuensi-2" value="1"class="mr-1">&#60; 100x/mnt
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_frekuensi_3"
                                                                        id="apgar-frekuensi-3" value="2"class="mr-1"> &#62;100 x/mnt
                                                                    </td>

                                                                    <td class="center"><input type="checkbox" name="apgar_frekuensi_4"
                                                                        id="apgar-frekuensi-4" value="0"class="mr-1 " onchange="calcscorefrekuensi()">
                                                                    </td>

                                                                    <td><input type="number" min="0" name="total_skor_1"
                                                                        id="total-skor-1" class="custom-form clear-input center tw" placeholder="total" value="0" readonly>
                                                                    </td>

                                                                    <td class="center"><input type="checkbox" name="apgar_frekuensi_6"
                                                                        id="apgar-frekuensi-6" value="0"class="mr-1 " onchange="calcscorefrekuensii()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_2"
                                                                        id="total-skor-2" class="custom-form clear-input center tww" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                </tr>

                                                                

                                                                <tr>
                                                                    <td class="center">2.</td>
                                                                    <td>Usaha Nafas</td>
                                                                    <td class="center"><input type="checkbox" name="apgar_usaha_1"
                                                                        id="apgar-usaha-1" value="0"class="mr-1">Tidak ada
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_usaha_2"
                                                                        id="apgar-usaha-2" value="1"class="mr-1">Lambat/Tak teratur
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_usaha_3"
                                                                        id="apgar-usaha-3" value="2"class="mr-1"> Menangis Kuat
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_usaha_4"
                                                                        id="apgar-usaha-4" value="1"class="mr-1"  onchange="calcscoreusaha()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_1_1"
                                                                        id="total-skor-1-1" class="custom-form clear-input center tw" placeholder="total" value="0" readonly>
                                                                    </td>

                                                                    <td class="center"><input type="checkbox" name="apgar_usaha_6"
                                                                        id="apgar-usaha-6" value="1"class="mr-1"  onchange="calcscoreusahaa()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_2_2"
                                                                        id="total-skor-2-2" class="custom-form clear-input center tww" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="center">3.</td>
                                                                    <td>Tonus Otot</td>
                                                                    <td class="center"><input type="checkbox" name="apgar_tonus_1"
                                                                        id="apgar-tonus-1" value="0"class="mr-1">Lumpuh
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_tonus_2"
                                                                        id="apgar-tonus-2" value="1"class="mr-1">Ekstremitas fleksi sedkit
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_tonus_3"
                                                                        id="apgar-tonus-3" value="2"class="mr-1"> Aktif
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_tonus_4"
                                                                        id="apgar-tonus-4" value="1"class="mr-1" onchange="calcscoretonus()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_1_1_1"
                                                                        id="total-skor-1-1-1" class="custom-form clear-input center tw" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_tonus_6"
                                                                        id="apgar-tonus-6" value="1"class="mr-1" onchange="calcscoretonuss()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_2_2_2"
                                                                        id="total-skor-2-2-2" class="custom-form clear-input center tww" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td class="center">4.</td>
                                                                    <td>Refleksi</td>
                                                                    <td class="center"><input type="checkbox" name="apgar_refleksi_1"
                                                                        id="apgar-refleksi-1" value="0"class="mr-1">Tak bereaksi
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_refleksi_2"
                                                                        id="apgar-refleksi-2" value="1"class="mr-1">Gerakan sedikit
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_refleksi_3"
                                                                        id="apgar-refleksi-3" value="2"class="mr-1"> Menangis
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_refleksi_4"
                                                                        id="apgar-refleksi-4" value="1"class="mr-1" onchange="calcscorerefleksi()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_1_1_1_1"
                                                                        id="total-skor-1-1-1-1" class="custom-form clear-input center tw" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_refleksi_6"
                                                                        id="apgar-refleksi-6" value="1"class="mr-1" onchange="calcscorerefleksii()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_2_2_2_2"
                                                                        id="total-skor-2-2-2-2" class="custom-form clear-input center tww" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td class="center">5.</td>
                                                                    <td>Warna</td>
                                                                    <td class="center"><input type="checkbox" name="apgar_warna_1"
                                                                        id="apgar-warna-1" value="0"class="mr-1">Biru pucat
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_warna_2"
                                                                        id="apgar-warna-2" value="1"class="mr-1">Tubuh Kemerahan, tangan dan kaki biru
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_warna_3"
                                                                        id="apgar-warna-3" value="2"class="mr-1"> Kemerahan
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_warna_4"
                                                                        id="apgar-warna-4" value="1"class="mr-1" onchange="calcscorewarna()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_1_1_1_1_1"
                                                                        id="total-skor-1-1-1-1-1" class="custom-form clear-input center tw" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="apgar_warna_6"
                                                                        id="apgar-warna-6" value="1"class="mr-1" onchange="calcscorewarnaa()">
                                                                    </td>
                                                                    <td><input type="number" min="0" name="total_skor_2_2_2_2_2"
                                                                        id="total-skor-2-2-2-2-2" class="custom-form clear-input center tww" placeholder="total" value="0" readonly>
                                                                    </td>
                                                                </tr>                                                        
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                    
                                            </table>
                                        </div>
                                    <!-- APGAR SCORE AKHIR -->

                                    <!-- PEMERIKSAAN FISIK DAN TANDA - TANDA FITAL AWAL -->
                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-pemeriksaan-fisik-dan-tanda-fital"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button> PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"id="data-pemeriksaan-fisik-dan-tanda-fital">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">Kesadaran</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="pemeriksaan_fdttl_1" id="pemeriksaan-fdttl-1"
                                                                class="custom-form clear-input"
                                                                placeholder="kesadaran">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Suhu</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="pemeriksaan_fdttl_2" id="pemeriksaan-fdttl-2"
                                                                    class="custom-form clear-input d-inline-block col-lg-3"
                                                                    placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">&#8451;</span>
                                                                </div>
                                                            </div>
                                                         </td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                   <!-- BATAS PEMERIKSAAN FISIK DAN TANDA - TANDA FITAL 1-->

                                                    <!-- BATAS PEMERIKSAAN FISIK DAN TANDA - TANDA FITAL 2 -->
                                                    <tr>
                                                        <td class="bold">Frekuensi Nadi</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="pemeriksaan_fdttl_3" id="pemeriksaan-fdttl-3"
                                                                    class="custom-form clear-input d-inline-block col-lg-2"
                                                                    placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">x/mnt</span>
                                                                </div>
                                                             </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Frekuensi Nafas</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="pemeriksaan_fdttl_4" id="pemeriksaan-fdttl-4"
                                                                    class="custom-form clear-input d-inline-block col-lg-3"
                                                                    placeholder="Nafas" onkeypress="return hanyaAngka(event)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-custom">x/mnt</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>                                                  
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"style="margin-top: -15px">                                              
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PEMERIKSAAN FISIK DAN TANDA - TANDA FITAL AKHIR -->

                                    <!-- PENGKAJIAN NYERI AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#data-pengkajiann-nyeri"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN NYERI
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2"id="data-pengkajiann-nyeri">
                                            <table class="table table-sm" 
                                                 style="margin-top: -15px">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
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
                                                                <td><input type="radio" name="menangisj" id="menangisj-0"
                                                                        value="0" class="mr-1 neonatusj neoj_0">Tidak Menangis
                                                                </td>
                                                                <td><input type="radio" name="menangisj" id="menangisj-1"
                                                                        value="1" class="mr-1 neonatusj neoj_1">Merintih</td>
                                                                <td><input type="radio" name="menangisj" id="menangisj-2"
                                                                        value="2" class="mr-1 neonatusj neoj_2">Menangis Terus
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPO<sub>2</sub> > 95%</td>
                                                                <td><input type="radio" name="spoj" id="spoj-0" value="0"
                                                                        class="mr-1 neonatusj neoj_3">Normal</td>
                                                                <td><input type="radio" name="spoj" id="spoj-1" value="1"
                                                                        class="mr-1 neonatusj neoj_4">F<sub>1</sub>O<sub>2</sub>
                                                                    < 30%</td>
                                                                <td><input type="radio" name="spoj" id="spoj-2" value="2"
                                                                        class="mr-1 neonatusj neoj_5">F<sub>1</sub>O<sub>2</sub>
                                                                    > 30%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Peningkatan Tanda-Tanda Vital</td>
                                                                <td><input type="radio" name="vitalj" id="vitalj-0" value="0"
                                                                        class="mr-1 neonatusj neoj_6">HR dan TD dalam batas
                                                                    normal</td>
                                                                <td><input type="radio" name="vitalj" id="vitalj-1" value="1"
                                                                        class="mr-1 neonatusj neoj_7">
                                                                    < 20%</td>
                                                                <td><input type="radio" name="vitalj" id="vitalj-2" value="2"
                                                                        class="mr-1 neonatusj neoj_8">> 20%
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ekspresi Wajah</td>
                                                                <td><input type="radio" name="wajahj" id="wajahj-0" value="0"
                                                                        class="mr-1 neonatusj neoj_9">Biasa</td>
                                                                <td><input type="radio" name="wajahj" id="wajahj-1" value="1"
                                                                        class="mr-1 neonatusj neoj_10">Meringis</td>
                                                                <td><input type="radio" name="wajahj" id="wajahj-2" value="2"
                                                                        class="mr-1 neonatusj neoj_11">Meringis / Mendengkur
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tidur</td>
                                                                <td><input type="radio" name="tidurj" id="tidurj-0" value="0"
                                                                        class="mr-1 neonatusj neoj_12">Normal</td>
                                                                <td><input type="radio" name="tidurj" id="tidurj-1" value="1"
                                                                        class="mr-1 neonatusj neoj_13">Sering Terbangun</td>
                                                                <td><input type="radio" name="tidurj" id="tidurj-2" value="2"
                                                                        class="mr-1 neonatusj neoj_14">Tidak Ada Tidur</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td colspan="3">
                                                                    <input type="text" name="total_neonatusj"
                                                                        id="total-neonatusj"
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
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn-keterangan-tidak" value="Tidak Nyeri"
                                                                class="mr-1">Tidak Nyeri : 0
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn-keterangan-ringan" value="Ringan"
                                                                class="mr-1 ml-2">Ringan : 1 - 2
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn-keterangan-sedang" value="Sedang"
                                                                class="mr-1 ml-2">Sedang : 3 - 4
                                                            <input type="radio" name="ptn_keterangan"
                                                                id="ptn-keterangan-berat" value="Berat"
                                                                class="mr-1 ml-2">Berat : > 4
                                                        </td>
                                                    </tr>
                                                </table>                                       
                                                <!-- BATAS BATAS BATAS -->
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:15px">
                                                    <tr>
                                                        <td width="10%" class="bold">1.&nbsp;KEPALA</td>
                                                        <td width="7%" class="bold">a. Fontanel Anterior</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kepalaa_1"
                                                                id="kepalaa-1" value="1" class="mr-1">Lunak
                                                            <input type="checkbox" name="kepalaa_2"
                                                                id="kepalaa-2" value="1" class="mr-1 ml-2">Tegas
                                                            <input type="checkbox" name="kepalaa_3"
                                                                id="kepalaa-3" value="1" class="mr-1 ml-2">Datar
                                                            <input type="checkbox" name="kepalaa_4"
                                                                id="kepalaa-4" value="1" class="mr-1 ml-2">Menonjol
                                                            <input type="checkbox" name="kepalaa_5"
                                                                id="kepalaa-5" value="1" class="mr-1 ml-2">Cekung
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">b. Satura Sagitalis</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kepalaa_6"
                                                                id="kepalaa-6" value="1" class="mr-1">Rapat
                                                            <input type="checkbox" name="kepalaa_7"
                                                                id="kepalaa-7" value="1" class="mr-1 ml-2">Terpisah
                                                            <input type="checkbox" name="kepalaa_8"
                                                                id="kepalaa-8" value="1" class="mr-1 ml-2">Menjauh
                                                            <input type="checkbox" name="kepalaa_9"
                                                                id="kepalaa-9" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="kepalaa_10"
                                                                id="kepalaa-10"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">c. Gambaran Wajah</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kepalaa_11"
                                                                id="kepalaa-11" value="1" class="mr-1">Simetris
                                                            <input type="checkbox" name="kepalaa_12"
                                                                id="kepalaa-12" value="1" class="mr-1 ml-2">Asimetris                                                          
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">d. Moulding</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kepalaa_13"
                                                                id="kepalaa-13" value="1" class="mr-1">Caput succedanum
                                                            <input type="checkbox" name="kepalaa_14"
                                                                id="kepalaa-14" value="1" class="mr-1 ml-2">Cephal hematoma                                                         
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">2.&nbsp;MATA</td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="mataa_1"
                                                                id="mataa-1" value="1" class="mr-1">Simetris
                                                            <input type="checkbox" name="mataa_2"
                                                                id="mataa-2" value="1" class="mr-1 ml-2">Asimetris 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="mataa_3"
                                                                id="mataa-3" value="1" class="mr-1">Bersih
                                                            <input type="checkbox" name="mataa_4"
                                                                id="mataa-4" value="1" class="mr-1 ml-2">Sekresi
                                                            <input type="checkbox" name="mataa_5"
                                                                id="mataa-5" value="1" class="mr-1 ml-2">Strabismus
                                                            <input type="checkbox" name="mataa_6"
                                                                id="mataa-6" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="mataa_7"
                                                                id="mataa-7"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="mataa_8"
                                                                id="mataa-8" value="1" class="mr-1">Icterus
                                                            <input type="text" name="mataa_9"
                                                                id="mataa-9"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                            <input type="checkbox" name="mataa_10"
                                                                id="mataa-10" value="1" class="mr-1 ml-2">Pupil
                                                            <input type="text" name="mataa_11"
                                                                id="mataa-11"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">3.&nbsp;THT</td>
                                                        <td width="7%" class="bold">a. Telinga</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="tht_1"
                                                                id="tht-1" value="1" class="mr-1">Normal
                                                            <input type="checkbox" name="tht_2"
                                                                id="tht-2" value="1" class="mr-1 ml-2">Abnormal
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">b. Hidung</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="tht_3"
                                                                id="tht-3" value="1" class="mr-1">Normal
                                                            <input type="checkbox" name="tht_4"
                                                                id="tht-4" value="1" class="mr-1 ml-2">Cuping hidung
                                                            <input type="checkbox" name="tht_5"
                                                                id="tht-5" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="tht_6"
                                                                id="tht-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">4.&nbsp;MULUT</td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="mulut_1"
                                                                id="mulut-1" value="1" class="mr-1">Tidak ada kelainan
                                                            <input type="checkbox" name="mulut_2"
                                                                id="mulut-2" value="1" class="mr-1 ml-2">Simetris
                                                            <input type="checkbox" name="mulut_3"
                                                                id="mulut-3" value="1" class="mr-1 ml-2">Asimetris
                                                            <input type="checkbox" name="mulut_4"
                                                                id="mulut-4" value="1" class="mr-1 ml-2">Mukosa mulut kering
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="mulut_5"
                                                                id="mulut-5" value="1" class="mr-1">Bibir pucat
                                                            <input type="checkbox" name="mulut_6"
                                                                id="mulut-6" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="mulut_7"
                                                                id="mulut-7"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">5.&nbsp;GIGI</td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="gigi_1"
                                                                id="gigi-1" value="1" class="mr-1">Tidak ada kelainan
                                                            <input type="checkbox" name="gigi_2"
                                                                id="gigi-2" value="1" class="mr-1 ml-2">Ada kelainan
                                                            <input type="text" name="gigi_3"
                                                                id="gigi-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">6.&nbsp;LEHER</td>
                                                        <td width="7%" class="bold">a. Kelenjar getah bening</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="leher_1"
                                                                id="leher-1" value="1" class="mr-1">Tidak ada kelainan
                                                            <input type="checkbox" name="leher_2"
                                                                id="leher-2" value="1" class="mr-1 ml-2">Ada kelainan
                                                            <input type="text" name="leher_3"
                                                                id="leher-3"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="10%" class="bold">7.&nbsp;DADA</td>
                                                        <td width="7%" class="bold">a. Retraksi</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="dada_1"
                                                                id="dada-1" value="1" class="mr-1">Derajat 1
                                                            <input type="checkbox" name="dada_2"
                                                                id="dada-2" value="1" class="mr-1 ml-2">Derajat 2
                                                            <input type="checkbox" name="dada_3"
                                                                id="dada-3" value="1" class="mr-1 ml-2">Derajat 3
                                                            <input type="checkbox" name="dada_4"
                                                                id="dada-4" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="dada_5"
                                                                id="dada-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">b. Klavikula</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="dada_6"
                                                                id="dada-6" value="1" class="mr-1">Normal
                                                            <input type="checkbox" name="dada_7"
                                                                id="dada-7" value="1" class="mr-1 ml-2">Abnormal
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="10%" class="bold">8.&nbsp;PARU - PARU</td>
                                                        <td width="7%" class="bold">a. Suara Nafas</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="paru_1"
                                                                id="paru-1" value="1" class="mr-1">Vesikuler
                                                            <input type="checkbox" name="paru_2"
                                                                id="paru-2" value="1" class="mr-1 ml-2">Wheezing
                                                            <input type="checkbox" name="paru_3"
                                                                id="paru-3" value="1" class="mr-1 ml-2">Ronchi
                                                            <input type="checkbox" name="paru_4"
                                                                id="paru-4" value="1" class="mr-1 ml-2">Dispnoe
                                                            <input type="checkbox" name="paru_5"
                                                                id="paru-5" value="1" class="mr-1 ml-2">Stridor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">b. Pola Nafas</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="paru_6"
                                                                id="paru-6" value="1" class="mr-1">Normal
                                                            <input type="checkbox" name="paru_7"
                                                                id="paru-7" value="1" class="mr-1 ml-2">Bradipnea
                                                            <input type="checkbox" name="paru_8"
                                                                id="paru-8" value="1" class="mr-1 ml-2">Tachipnea
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">c. Bunyi Nafas lapang paru</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="paru_9"
                                                                id="paru-9" value="1" class="mr-1">Terdengar
                                                            <input type="checkbox" name="paru_10"
                                                                id="paru-10" value="1" class="mr-1 ml-2">Tidak terdengar
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">d. Respirasi</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="paru_11"
                                                                id="paru-11" value="1" class="mr-1">Spontan
                                                            <input type="checkbox" name="paru_12"
                                                                id="paru-12" value="1" class="mr-1 ml-2">Alat bantu
                                                            <input type="text" name="paru_13"
                                                                id="paru-13"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                            <input type="checkbox" name="paru_14"
                                                                id="paru-14" value="1" class="mr-1 ml-2">Frekuensi
                                                            <input type="text" name="paru_15"
                                                                id="paru-15"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                            <input type="checkbox" name="paru_16"
                                                                id="paru-16" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="paru_17"
                                                                id="paru-17"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">e. Irama Nafas</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="paru_18"
                                                                id="paru-18" value="1" class="mr-1">Teratur
                                                            <input type="checkbox" name="paru_19"
                                                                id="paru-19" value="1" class="mr-1 ml-2">Tidak teratur
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">f. Batuk dan sekresi</td>
                                                        <td width="69%">
                                                            : <input type="radio" name="paru_20"
                                                                id="paru-20" value="0" class="mr-1">Tidak
                                                            <input type="radio" name="paru_20"
                                                                id="paru-21" value="1" class="mr-1 ml-2">Ya
                                                            <input type="checkbox" name="paru_22"
                                                                id="paru-22" value="1" class="mr-1 ml-2">Produktif
                                                            <input type="checkbox" name="paru_23"
                                                                id="paru-23" value="1" class="mr-1 ml-2">Non Produktif
                                                            <input type="checkbox" name="paru_24"
                                                                id="paru-24" value="1" class="mr-1 ml-2">Lain - lain
                                                            <input type="text" name="paru_25"
                                                                id="paru-25"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">9.&nbsp;JANTUNG </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="jantung_1"
                                                                id="jantung-1" value="1" class="mr-1">Mur - mur
                                                            <input type="checkbox" name="jantung_2"
                                                                id="jantung-2" value="1" class="mr-1 ml-2">Bunyi normal sinus rhytme
                                                            <input type="checkbox" name="jantung_3"
                                                                id="jantung-3" value="1" class="mr-1 ml-2">Frekuensi
                                                            <input type="text" name="jantung_4"
                                                                id="jantung-4"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">10.&nbsp;EXTREMITAS ATAS </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="extremitas_1"
                                                                id="extremitas-1" value="1" class="mr-1">Simetris
                                                            <input type="checkbox" name="extremitas_2"
                                                                id="extremitas-2" value="1" class="mr-1 ml-2">Asimetris
                                                            <input type="checkbox" name="extremitas_3"
                                                                id="extremitas-3" value="1" class="mr-1 ml-2">Tidak Kelainan
                                                            <input type="checkbox" name="extremitas_4"
                                                                id="extremitas-4" value="1" class="mr-1 ml-2">kelainan
                                                            <input type="text" name="extremitas_5"
                                                                id="extremitas-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="extremitas_6"
                                                                id="extremitas-6" value="1" class="mr-1">Akral hangat
                                                            <input type="checkbox" name="extremitas_7"
                                                                id="extremitas-7" value="1" class="mr-1 ml-2">Akral dingin
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">11.&nbsp;ABDOMEN </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="ardomen_1"
                                                                id="ardomen-1" value="1" class="mr-1">Lunak
                                                            <input type="checkbox" name="ardomen_2"
                                                                id="ardomen-2" value="1" class="mr-1 ml-2">Tegang
                                                            <input type="checkbox" name="ardomen_3"
                                                                id="ardomen-3" value="1" class="mr-1 ml-2">Datar
                                                            <input type="checkbox" name="ardomen_4"
                                                                id="ardomen-4" value="1" class="mr-1 ml-2">Kembung
                                                            <input type="checkbox" name="ardomen_5"
                                                                id="ardomen-5" value="1" class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="ardomen_6"
                                                                id="ardomen-6"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="ardomen_7"
                                                                id="ardomen-7" value="1" class="mr-1">Lingkar perut
                                                            <input type="text" name="ardomen_8"
                                                                id="ardomen-8"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>cm
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">12.&nbsp;UMBILIKAL </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="umbilikal_1"
                                                                id="umbilikal-1" value="1" class="mr-1">Segar
                                                            <input type="checkbox" name="umbilikal_2"
                                                                id="umbilikal-2" value="1" class="mr-1 ml-2">Layu
                                                            <input type="checkbox" name="umbilikal_3"
                                                                id="umbilikal-3" value="1" class="mr-1 ml-2">Infeksi
                                                            <input type="checkbox" name="umbilikal_4"
                                                                id="umbilikal-4" value="1" class="mr-1 ml-2">Ada perdarahan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">13.&nbsp;GENETALIA </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="genetalia_1"
                                                                id="genetalia-1" value="1" class="mr-1">Perempuan
                                                            <input type="text" name="genetalia_2"
                                                                id="genetalia-2"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                            <input type="checkbox" name="genetalia_3"
                                                                id="genetalia-3" value="1" class="mr-1 ml-2">Laki-laki
                                                            <input type="text" name="genetalia_4"
                                                                id="genetalia-4"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td width="10%" class="bold">14.&nbsp;ANUS </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="radio" name="anus_1"
                                                                id="anus-1" value="1" class="mr-1">Ada
                                                            <input type="radio" name="anus_1"
                                                                id="anus-2" value="0" class="mr-1 ml-2">Tidak ada
                                                        </td>
                                                    </tr>                                                   
                                                    <tr>
                                                        <td width="10%" class="bold">15.&nbsp;KULIT </td>
                                                        <td width="7%" class="bold">a. Warna</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kulit_1"
                                                                id="kulit-1" value="1" class="mr-1">Pink
                                                            <input type="checkbox" name="kulit_2"
                                                                id="kulit-2" value="1" class="mr-1 ml-2">Pucat
                                                            <input type="checkbox" name="kulit_3"
                                                                id="kulit-3" value="1" class="mr-1 ml-2">Jaundice
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold">b. Sianosis</td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="kulit_4"
                                                                id="kulit-4" value="1" class="mr-1">Pada kuku
                                                            <input type="checkbox" name="kulit_5"
                                                                id="kulit-5" value="1" class="mr-1 ml-2">Extrimitas
                                                            <input type="checkbox" name="kulit_6"
                                                                id="kulit-6" value="1" class="mr-1 ml-2">Seluruh tubuh 
                                                            <input type="checkbox" name="kulit_7"
                                                                id="kulit-7" value="1" class="mr-1 ml-2">Tanda lahir 
                                                            <input type="text" name="kulit_8"
                                                                id="kulit-8"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">16.&nbsp;REFLEKS </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="refleks_1"
                                                                id="refleks-1" value="1" class="mr-1">Moro
                                                            <input type="checkbox" name="refleks_2"
                                                                id="refleks-2" value="1" class="mr-1">Tonic neck
                                                            <input type="checkbox" name="refleks_3"
                                                                id="refleks-3" value="1" class="mr-1">Swallowing
                                                            <input type="checkbox" name="refleks_4"
                                                                id="refleks-4" value="1" class="mr-1">Rooting
                                                            <input type="checkbox" name="refleks_5"
                                                                id="refleks-5" value="1" class="mr-1">Palmar grasping
                                                            <input type="checkbox" name="refleks_6"
                                                                id="refleks-6" value="1" class="mr-1">babinski
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">17.&nbsp;TONUS OTOT </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="tonus_1"
                                                                id="tonus-1" value="1" class="mr-1">Aktif
                                                            <input type="checkbox" name="tonus_2"
                                                                id="tonus-2" value="1" class="mr-1">Letargi
                                                            <input type="checkbox" name="tonus_3"
                                                                id="tonus-3" value="1" class="mr-1">Kejang
                                                            <input type="checkbox" name="tonus_4"
                                                                id="tonus-4" value="1" class="mr-1">Kaku
                                                            <input type="checkbox" name="tonus_5"
                                                                id="tonus-5" value="1" class="mr-1">Menangis
                                                            <input type="checkbox" name="tonus_6"
                                                                id="tonus-6" value="1" class="mr-1">Lemah
                                                            <input type="checkbox" name="tonus_7"
                                                                id="tonus-7" value="1" class="mr-1">Melengking
                                                            <input type="checkbox" name="tonus_8"
                                                                id="tonus-8" value="1" class="mr-1">Tidak menangis
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold">18.&nbsp;EXTREMITAS BAWAH </td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="extremitass_1"
                                                                id="extremitass-1" value="1" class="mr-1">Simetris
                                                            <input type="checkbox" name="extremitass_2"
                                                                id="extremitass-2" value="1" class="mr-1">Asimetris
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" class="bold"></td>
                                                        <td width="7%" class="bold"></td>
                                                        <td width="69%">
                                                            : <input type="checkbox" name="extremitass_3"
                                                                id="extremitass-3" value="1" class="mr-1">Tidak ada kelainan
                                                            <input type="checkbox" name="extremitass_4"
                                                                id="extremitass-4" value="1" class="mr-1">Kelainan
                                                            <input type="text" name="extremitass_5"
                                                                id="extremitass-5"
                                                                class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                                placeholder="Sebutkan" readonly>
                                                        </td>
                                                    </tr>

                                                </table>                                                                                              
                                            </table>
                                        </div>
                                    <!-- PENGKAJIAN NYERI AKHIR -->

                                     <!-- SKALA EARLY WARNING SYSTEM(EWS) NEONATUS AWAL -->
                                     <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-skala-early-warning-system-neonatuscuk"><i class="fas fa-expand mr-1"></i>Expand</button>NEWS (NEONATAL EARLY WARNING SCORE)
											</td>
										</tr>
									</table>
									<div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system-neonatuscuk">
                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center" colspan="10" style="background-color: #5F9EA0; color: white;"><b>NEWS (NEONATAL EARLY WARNING SCORE)</b></th>
                                                </tr>
                                                <tr>
                                                    <th width="1%" class="center"  style="background-color: #5F9EA0; color: white;"><b>No</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>Parameter</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>2</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>1</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>0</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>1</b></th>
                                                    <th width="10%" class="center" style="background-color: #5F9EA0; color: white;"><b>2</b></th>                                                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3" style="text-align: center; vertical-align: middle;">1</td>
                                                    <td rowspan="3" class="center" style="text-align: center; vertical-align: middle;">Neurobehavirol</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="neurobehavirol" id="calsnews_1_1" value="0_3" class="mr-1 calsnews pramet_neurobehavirol_1_1">Aktif/sadar saat diberi susu</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="neurobehavirol" id="calsnews_1_2" value="1_4" class="mr-1 calsnews pramet_neurobehavirol_1_2">Jittery /rewel terus menerus</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="neurobehavirol" id="calsnews_1_3" value="2_5" class="mr-1 calsnews pramet_neurobehavirol_1_3">kejang /terkulai lemas /susah dibangunkan</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2</td>
                                                    <td class="center">Nadi</td>
                                                    <td class="center"><input type="radio" name="nadiqy" id="calsnews_2_1" value="2_1" class="mr-1 calsnews pramet_nadiqy_2_1">>190</td>
                                                    <td class="center"><input type="radio" name="nadiqy" id="calsnews_2_2" value="1_2" class="mr-1 calsnews pramet_nadiqy_2_2">>151-190</td>
                                                    <td class="center"><input type="radio" name="nadiqy" id="calsnews_2_3" value="0_3" class="mr-1 calsnews pramet_nadiqy_2_3">90-150</td>
                                                    <td class="center"><input type="radio" name="nadiqy" id="calsnews_2_4" value="1_4" class="mr-1 calsnews pramet_nadiqy_2_4">70-89</td>
                                                    <td class="center"><input type="radio" name="nadiqy" id="calsnews_2_5" value="2_5" class="mr-1 calsnews pramet_nadiqy_2_5">< 70</td>  
                                                </tr>
                                                <tr>
                                                    <td class="center">3</td>
                                                    <td class="center">Respirasi Rate</td>
                                                    <td class="center"><input type="radio" name="respirasqy" id="calsnews_3_1" value="2_1" class="mr-1 calsnews pramet_respirasqy_3_1">>80</td>
                                                    <td class="center"><input type="radio" name="respirasqy" id="calsnews_3_2" value="1_2" class="mr-1 calsnews pramet_respirasqy_3_2">61-80</td>
                                                    <td class="center"><input type="radio" name="respirasqy" id="calsnews_3_3" value="0_3" class="mr-1 calsnews pramet_respirasqy_3_3">30-60</td>
                                                    <td class="center"><input type="radio" name="respirasqy" id="calsnews_3_4" value="1_4" class="mr-1 calsnews pramet_respirasqy_3_4">20-29</td>
                                                    <td class="center"><input type="radio" name="respirasqy" id="calsnews_3_5" value="2_5" class="mr-1 calsnews pramet_respirasqy_3_5">< 20</td>  
                                                </tr>
                                                <tr>
                                                    <td class="center">4</td>
                                                    <td class="center">Warna Kulit (Spo2)</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="warnaulity" id="calsnews_4_1" value="0_1" class="mr-1 calsnews pramet_warnaulity_4_1">Pink > 94%</td>
                                                    <td class="center"><input type="radio" name="warnaulity" id="calsnews_4_2" value="1_2" class="mr-1 calsnews pramet_warnaulity_4_2">90-94%</td>
                                                    <td class="center"><input type="radio" name="warnaulity" id="calsnews_4_3" value="2_3" class="mr-1 calsnews pramet_warnaulity_4_3">Pucat / Kebiruan < 90 %</td>  
                                                </tr>
                                                <tr>
                                                    <td class="center">5</td>
                                                    <td class="center">Suhu</td>
                                                    <td class="center"><input type="radio" name="suhuqy" id="calsnews_5_1" value="2_1" class="mr-1 calsnews pramet_suhuqy_5_1">>38,1 ⁰C</td>
                                                    <td class="center"><input type="radio" name="suhuqy" id="calsnews_5_2" value="1_2" class="mr-1 calsnews pramet_suhuqy_5_2">37,6-38⁰C</td>
                                                    <td class="center"><input type="radio" name="suhuqy" id="calsnews_5_3" value="0_3" class="mr-1 calsnews pramet_suhuqy_5_3">36,5-37,5⁰C</td>
                                                    <td class="center"><input type="radio" name="suhuqy" id="calsnews_5_4" value="1_4" class="mr-1 calsnews pramet_suhuqy_5_4">35,5-37,5 ⁰C</td>
                                                    <td class="center"><input type="radio" name="suhuqy" id="calsnews_5_5" value="2_5" class="mr-1 calsnews pramet_suhuqy_5_5">< 35,4 ⁰C</td>  
                                                </tr>
                                                <tr>
                                                    <td class="center">6</td>
                                                    <td class="center">Merintih</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="merintihqy" id="calsnews_6_1" value="0_1" class="mr-1 calsnews pramet_merintihqy_6_1">Tidak</td>
                                                    <td class="center"><input type="radio" name="merintihqy" id="calsnews_6_2" value="1_2" class="mr-1 calsnews pramet_merintihqy_6_2">Ya</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>                                                  
                                                    <td colspan="6">
                                                        <input type="radio" name="total_calsnews" id="total_calsnews_1" class="mr-1 ml-3" value="putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih : 0 </b>
                                                        <input type="radio" name="total_calsnews" id="total_calsnews_2" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning : 1 </b>
                                                        <input type="radio" name="total_calsnews" id="total_calsnews_3" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah : ≥ 2 atau skor  pada 1 parameter</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>



										<!-- <table class="table table-sm" style="margin-top: -15px">
											<tr>
												<td width="75%">
													<table class="table table-sm table-striped table-bordered">
														<thead>
															<tr>
																<th class="center" colspan="10"><b>PEWS</b></th>
															</tr>
															<tr>
																<th width="5%" class="center"><b>No.</b></th>
																<th width="15%"><b>Parameter</b></th>
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
                                                                <td class="center">1.</td>
                                                                <td>Suhu</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="suhupews"
                                                                    id="skalapews-1-1" value="2_1"
                                                                    class="mr-1 skalapews">&#60;35
                                                                </td>
                                                                <td class="center"><input type="radio" name="suhupews"
                                                                    id="skalapews-1-2" value="1_2"
                                                                    class="mr-1 skalapews">35.1-36
                                                                </td>
                                                                <td class="center"><input type="radio" name="suhupews"
                                                                    id="skalapews-1-3" value="0_3"
                                                                    class="mr-1 skalapews">36.1-38
                                                                </td>
                                                                <td class="center"><input type="radio" name="suhupews"
                                                                    id="skalapews-1-4" value="1_4"
                                                                    class="mr-1 skalapews">38.1-38.5
                                                                </td>
                                                                <td class="center"><input type="radio" name="suhupews"
                                                                    id="skalapews-1-5" value="2_5"
                                                                    class="mr-1 skalapews">&#62;38.5
                                                                </td>
                                                                <td class="center"></td>
                                                            </tr>
															<tr>
																<td class="center">2.</td>
																<td>Pernafasan &#60;28hari </td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-1" value="3_1"
                                                                    class="mr-1 skalapews">&#60;20
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-2" value="1_2"
                                                                    class="mr-1 skalapews">30-39
                                                                </td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-3" value="0_3"
                                                                    class="mr-1 skalapews">40-60 Tidak retraksi
                                                                </td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-4" value="1_4"
                                                                    class="mr-1 skalapews">Otot bantu nafas
                                                                </td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-5" value="2_5"
                                                                    class="mr-1 skalapews">Retraksi
                                                                </td>
                                                                <td class="center"><input type="radio" name="pernafasanpews"
                                                                    id="skalapews-2-6" value="3_6"
                                                                    class="mr-1 skalapews">&#62;60 Merintih
                                                                </td>
															</tr>
															<tr>
																<td class="center">3.</td>
																<td>Alat bantu O₂ </td>
                                                                <td class="center"></td>
																<td class="center"></td>
																<td class="center"></td>
                                                                <td class="center"><input type="radio" name="alatpews"
                                                                    id="skalapews-3-1" value="0_1"
                                                                    class="mr-1 skalapews">No
                                                                </td>
                                                                <td class="center"><input type="radio" name="alatpews"
                                                                    id="skalapews-3-2" value="1_2"
                                                                    class="mr-1 skalapews">&#62;3L/menit
                                                                </td>
                                                                <td class="center"><input type="radio" name="alatpews"
                                                                    id="skalapews-3-3" value="2_2"
                                                                    class="mr-1 skalapews">&#62;6L/menit
                                                                </td>
                                                                <td class="center"><input type="radio" name="alatpews"
                                                                    id="skalapews-3-4" value="3_3"
                                                                    class="mr-1 skalapews">&#62;8L/menit
                                                                </td>
															</tr>
															<tr>
																<td class="center">4.</td>
																<td>Saturasi O₂</td>
                                                                <td class="center"><input type="radio" name="saturasipews"
                                                                    id="skalapews-4-1" value="3_1"
                                                                    class="mr-1 skalapews">&#8804;85
                                                                </td>
                                                                <td class="center"><input type="radio" name="saturasipews"
                                                                    id="skalapews-4-2" value="2_2"
                                                                    class="mr-1 skalapews">86-89
                                                                </td>
                                                                <td class="center"><input type="radio" name="saturasipews"
                                                                    id="skalapews-4-3" value="1_3"
                                                                    class="mr-1 skalapews">90-93
                                                                </td>
                                                                <td class="center"><input type="radio" name="saturasipews"
                                                                    id="skalapews-4-4" value="0_4"
                                                                    class="mr-1 skalapews">&#62;94
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
															</tr>
															<tr>
																<td class="center">5.</td>
																<td>Nadi &#60;28hari</td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-1" value="3_1"
                                                                    class="mr-1 skalapews">&#60;80
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-2" value="2_2"
                                                                    class="mr-1 skalapews">81-90
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-3" value="1_3"
                                                                    class="mr-1 skalapews">91-99
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-4" value="0_4"
                                                                    class="mr-1 skalapews">100-180
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-5" value="1_5"
                                                                    class="mr-1 skalapews">181-190
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="nadipews"
                                                                    id="skalapews-5-6" value="3_6"
                                                                    class="mr-1 skalapews">&#62;200
                                                                </td>
															</tr>
															<tr>
																<td class="center">6.</td>
																<td>Warna kulit</td>
																<td class="center"></td>
																<td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="warnapews"
                                                                    id="skalapews-6-1" value="0_1"
                                                                    class="mr-1 skalapews">Tidak sianosis atau CRT &#60; 2 detik
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="warnapews"
                                                                    id="skalapews-6-2" value="2_2"
                                                                    class="mr-1 skalapews">Tampak sianotik atau CRT &#62; 2 detik
                                                                </td>
                                                                <td class="center"><input type="radio" name="warnapews"
                                                                    id="skalapews-6-3" value="3_3"
                                                                    class="mr-1 skalapews">Sianotik dan motled atau CRT &#62; 5 detik
                                                                </td>
															</tr>
															<tr>
																<td class="center">7.</td>
																<td>TDS</td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-1" value="3_1"
                                                                    class="mr-1 skalapews">&#8804;80
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-2" value="1_2"
                                                                    class="mr-1 skalapews">80-89
                                                                </td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-3" value="0_3"
                                                                    class="mr-1 skalapews">90-119
                                                                </td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-4" value="1_4"
                                                                    class="mr-1 skalapews">120-129
                                                                </td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-5" value="2_5"
                                                                    class="mr-1 skalapews">130-139
                                                                </td>
                                                                <td class="center"><input type="radio" name="tdspews"
                                                                    id="skalapews-7-6" value="3_6"
                                                                    class="mr-1 skalapews">&#62;140
                                                                </td>
															</tr>
                                                            <tr>
																<td class="center">8.</td>
																<td>Kesadaran</td>
                                                                <td class="center"><input type="radio" name="kesadaranpews"
                                                                    id="skalapews-8-1" value="3_1"
                                                                    class="mr-1 skalapews">P/U
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaranpews"
                                                                    id="skalapews-8-2" value="1_2"
                                                                    class="mr-1 skalapews">V
                                                                </td>
                                                                <td class="center"><input type="radio" name="kesadaranpews"
                                                                    id="skalapews-8-3" value="0_3"
                                                                    class="mr-1 skalapews">A
                                                                </td>
                                                                <td class="center"><input type="radio" name="kesadaranpews"
                                                                    id="skalapews-8-4" value="1_4"
                                                                    class="mr-1 skalapews">V
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaranpews"
                                                                    id="skalapews-8-5" value="3_5"
                                                                    class="mr-1 skalapews">P/U
                                                                </td>
															</tr>
															<tr>
																<td colspan="10"></td>
															</tr>
															<tr>
                                                                <td colspan="2"><b>TOTAL</b></td>
                                                                <td colspan="8">
                                                                    <input type="radio" name="total_skalapews" id="total-skalapews-1"
                                                                        class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square"
                                                                        style="color: green"></i><b>Hijau (0-2)</b>
                                                                    <input type="radio" name="total_skalapews" id="total-skalapews-2"
                                                                        class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square"
                                                                        style="color: yellow"></i><b>Kuning (3-4)</b>
                                                                    <input type="radio" name="total_skalapews" id="total-skalapews-3"
                                                                        class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square"
                                                                        style="color: red"></i><b>Merah(≥5 atau skor 3 pada salah satu parameter)</b>
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
										</table> -->


                                    </div>
                                    <!-- SKALA EARLY WARNING SYSTEM(EWS) NEONATUS AKHIR -->























                                        <!-- SKRINING PASIEN AKHIR KEHIDUPAN AWAL NEONATUS-->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#data-skrining-pasien-akhir-kehidupan-neonatus"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button>SKRINING
                                                        PASIEN AKHIR KEHIDUPAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-skrining-pasien-akhir-kehidupan-neonatus">
                                                <table class="table table-sm table-striped table-bordered"
                                                    style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" class="center"><b>No.</b></th>
                                                            <th width="75%" class="center"><b>Kriteria</b></th>
                                                            <th width="10%" class="center"><b>Ya</b></th>
                                                            <th width="10%" class="center"><b>Tidak</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="center">1.</td>
                                                            <td>Usia lebih dari 80 tahun</td>
                                                            <td class="center"><input type="radio" name="spak_1_neonatus_ya"
                                                                    id="spak-1-neonatus-ya" value="1"></td>
                                                            <td class="center"><input type="radio" name="spak_1_neonatus_ya"
                                                                    id="spak-1-neonatus-tidak" value="0" checked></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2.</td>
                                                            <td>Pasien mengalami gagal nafas</td>
                                                            <td class="center"><input type="radio" name="spak_2_neonatus_ya"
                                                                    id="spak-2-neonatus-ya" value="1"></td>
                                                            <td class="center"><input type="radio" name="spak_2_neonatus_ya"
                                                                    id="spak-2-neonatus-tidak" value="0" checked></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3.</td>
                                                            <td>Pasien mengalami sepsis</td>
                                                            <td class="center"><input type="radio" name="spak_3_neonatus_ya"
                                                                    id="spak-3-neonatus-ya" value="1"></td>
                                                            <td class="center"><input type="radio" name="spak_3_neonatus_ya"
                                                                    id="spak-3-neonatus-tidak" value="0" checked></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4.</td>
                                                            <td>Pasien mengalami gagal organ multiple</td>
                                                            <td class="center"><input type="radio" name="spak_4_neonatus_ya"
                                                                    id="spak-4-neonatus-ya" value="1"></td>
                                                            <td class="center"><input type="radio" name="spak_4_neonatus_ya"
                                                                    id="spak-4-neonatus-tidak" value="0" checked></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">5.</td>
                                                            <td>Pasien dengan karsinoma stadium 4</td>
                                                            <td class="center"><input type="radio" name="spak_5_neonatus_ya"
                                                                    id="spak-5-neonatus-ya" value="1"></td>
                                                            <td class="center"><input type="radio" name="spak_5_neonatus_ya"
                                                                    id="spak-5-neonatus-tidak" value="0" checked></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"><b><i>Bila mana pasien memenuhi setidaknya tiga dari
                                                                        kondisi tersebut, maka dilakukan pelayanan pasien akhir
                                                                        kehidupan</b></i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <!-- SKRINING PASIEN AKHIR KEHIDUPAN NEONATUS  AKHIR -->

                                        <!-- DATA PENUNJANG NEONATUS AWAL -->
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#data-data-penunjang-neonatus"><i
                                                                class="fas fa-expand mr-1"></i>Expand</button> DATA
                                                        PENUNJANG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse" id="data-data-penunjang-neonatus">
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                    <tr>
                                                        <td class="bold">A. Pemeriksaan Laboratorium, Tanggal :
                                                            <input type="text" name="tanggal_pemeriksaan_lab_neonatus"
                                                                id="tanggal-pemeriksaan-lab-neonatus"
                                                                class="custom-form clear-input col-lg-3 d-inline-block"
                                                                placeholder="Masukan tanggal laboratorim">
                                                            <span class=" bold ml-2">Hasil : </span><input type="text"
                                                                name="hasil_pemeriksaan_labo_neonatus"
                                                                id="hasil-pemeriksaan-labo-neonatus"
                                                                class="custom-form clear-input col-lg-3 d-inline-block"
                                                                placeholder="Masukan Hasil Pemeriksaan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">B. Pemeriksaan Radiologi, Tanggal :

                                                            <input type="text" name="tanggal_pemeriksaan_rad_neonatus"
                                                                id="tanggal-pemeriksaan-rad-neonatus"
                                                                class="custom-form clear-input col-lg-3 d-inline-block"
                                                                placeholder="Masukan tanggal cardiotokografi">
                                                            <span class=" bold ml-2">Hasil : </span><input type="text"
                                                                name="hasil_pemeriksaan_rad_neonatus"
                                                                id="hasil-pemeriksaan-rad-neonatus"
                                                                class="custom-form clear-input col-lg-3 d-inline-block"
                                                                placeholder="Masukan Hasil Pemeriksaan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">C. Lain-lain :
                                                            <input type="text" name="penunjang_lain_neonatus"
                                                                id="penunjang-lain-neonatus"
                                                                class="custom-form clear-input col-lg-3 d-inline-block"
                                                                placeholder="Masukan Pemeriksaan Lainnya">
                                                    </tr>
                                                </table>
                                            </div>
                                        <!--  DATA PENUNJANG NEONATUS AKHIR -->

                                    <!-- MASALAH KEPERAWATAN NEONATUS AWAL -->
										<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-masalah-keperawatan-neonatus"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH KEPERAWATAN
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse mt-2" id="data-masalah-keperawatan-neonatus">
											<table class="table table-sm table-striped" style="margin-top: -15px">
												<tr>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_1_neonatus" id="masalah-keperawatan-1-neonatus" class="mr-1" value="1">Bersihan Jalan Nafas Tidak Efektif</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_2_neonatus" id="masalah-keperawatan-2-neonatus" class="mr-1" value="1">Diare</td>
													<td width="33%"><input type="checkbox" name="masalah_keperawatan_3_neonatus" id="masalah-keperawatan-3-neonatus" class="mr-1" value="1">Ansietas</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_4_neonatus" id="masalah-keperawatan-4-neonatus" class="mr-1" value="1">Pola Nafas Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_5_neonatus" id="masalah-keperawatan-5-neonatus" class="mr-1" value="1">Intoleransi Aktivitas</td>
													<td><input type="checkbox" name="masalah_keperawatan_6_neonatus" id="masalah-keperawatan-6-neonatus" class="mr-1" value="1">Berduka</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_7_neonatus" id="masalah-keperawatan-7-neonatus" class="mr-1" value="1">Gangguan Pertukaran Gas</td>
													<td><input type="checkbox" name="masalah_keperawatan_8_neonatus" id="masalah-keperawatan-8-neonatus" class="mr-1" value="1">Gangguan Mobilitas Fisik</td>
													<td><input type="checkbox" name="masalah_keperawatan_9_neonatus" id="masalah-keperawatan-9-neonatus" class="mr-1" value="1">Gangguan Interaksi Sosial</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_10_neonatus" id="masalah-keperawatan-10-neonatus" class="mr-1" value="1">Gangguan Ventilasi Spontan</td>
													<td><input type="checkbox" name="masalah_keperawatan_11_neonatus" id="masalah-keperawatan-11-neonatus" class="mr-1" value="1">Penurunan Kapasitas Adaptif Intrakranial</td>
													<td><input type="checkbox" name="masalah_keperawatan_12_neonatus" id="masalah-keperawatan-12-neonatus" class="mr-1" value="1">Risiko Cedera</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_13_neonatus" id="masalah-keperawatan-13-neonatus" class="mr-1" value="1">Penurunan Curah Jantung</td>
													<td><input type="checkbox" name="masalah_keperawatan_14_neonatus" id="masalah-keperawatan-14-neonatus" class="mr-1" value="1">Nyeri Akut</td>
													<td><input type="checkbox" name="masalah_keperawatan_15_neonatus" id="masalah-keperawatan-15-neonatus" class="mr-1" value="1">Risiko Aspirasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_16_neonatus" id="masalah-keperawatan-16-neonatus" class="mr-1" value="1">Perfusi Perifer Tidak Efektif</td>
													<td><input type="checkbox" name="masalah_keperawatan_17_neonatus" id="masalah-keperawatan-17-neonatus" class="mr-1" value="1">Nyeri Kronis</td>
													<td><input type="checkbox" name="masalah_keperawatan_18_neonatus" id="masalah-keperawatan-18-neonatus" class="mr-1" value="1">Risiko Pendarahan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_19_neonatus" id="masalah-keperawatan-19-neonatus" class="mr-1" value="1">Nausea</td>
													<td><input type="checkbox" name="masalah_keperawatan_20_neonatus" id="masalah-keperawatan-20-neonatus" class="mr-1" value="1">Nyeri Melahirkan</td>
													<td><input type="checkbox" name="masalah_keperawatan_21_neonatus" id="masalah-keperawatan-21-neonatus" class="mr-1" value="1">Risiko Syok</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_22_neonatus" id="masalah-keperawatan-22-neonatus" class="mr-1" value="1">Defisit Nutrisi</td>
													<td><input type="checkbox" name="masalah_keperawatan_23_neonatus" id="masalah-keperawatan-23-neonatus" class="mr-1" value="1">Defisit Perawatan Diri</td>
													<td><input type="checkbox" name="masalah_keperawatan_24_neonatus" id="masalah-keperawatan-24-neonatus" class="mr-1" value="1">Risiko Jatuh</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_25_neonatus" id="masalah-keperawatan-25-neonatus" class="mr-1" value="1">Hipervolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_26_neonatus" id="masalah-keperawatan-26-neonatus" class="mr-1" value="1">Hipertermia</td>
													<td><input type="checkbox" name="masalah_keperawatan_27_neonatus" id="masalah-keperawatan-27-neonatus" class="mr-1" value="1">Risiko Luka Tekan</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_28_neonatus" id="masalah-keperawatan-28-neonatus" class="mr-1" value="1">Hipovolemia</td>
													<td><input type="checkbox" name="masalah_keperawatan_29_neonatus" id="masalah-keperawatan-29-neonatus" class="mr-1" value="1">Hiportermi</td>
                                                    <td><input type="checkbox" name="masalah_keperawatan_30_neonatus" id="masalah-keperawatan-30-neonatus" class="mr-1" value="1">Iktekrik Neonatus</td>													
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_31_neonatus" id="masalah-keperawatan-31-neonatus" class="mr-1" value="1">Ketidakstabilan Kadar Glukosa Darah</td>
													<td><input type="checkbox" name="masalah_keperawatan_32_neonatus" id="masalah-keperawatan-32-neonatus" class="mr-1" value="1">Ketegangan Peran Pemberi Asuhan</td>
                                                    <td><input type="checkbox" name="masalah_keperawatan_33_neonatus" id="masalah-keperawatan-33-neonatus" class="mr-1" value="1">Menyusui tidak efektif</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="masalah_keperawatan_34_neonatus" id="masalah-keperawatan-34-neonatus" class="mr-1" value="1">Gangguan Eliminasi Urin</td>
													<td><input type="checkbox" name="masalah_keperawatan_35_neonatus" id="masalah-keperawatan-35-neonatus" class="mr-1" value="1">Resiko Gangguan Integritas Kulit / Jaringan</td>
                                                    <td>
														<input type="checkbox" name="masalah_keperawatan_36_neonatus" id="masalah-keperawatan-36-neonatus" class="mr-1" value="1">Lain-lain
														<input type="text" name="masalah_keperawatan_lain_input_neonatus" id="masalah-keperawatan-lain-input-neonatus" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Masukkan lain - lain" readonly>
													</td>
													<!-- <td></td> -->
												</tr>
											</table>
										</div>
                                    <!-- MASALAH KEPERAWATAN NEONATUS AKHIR -->

                                    <!-- PERENCANAAN PULANG/DISCHARGE PLANING AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#data-perencanaan-pulang-noenatus"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN PULANG
                                                    / DISCHARGE PLANNING
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2" id="data-perencanaan-pulang-noenatus">
                                            <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <tr>
                                                    <td width="50%"><b>Kriteria Discharge Planning :</b></td>
                                                    <td width="50%"></td>
                                                </tr>
                                                <tr>
                                                    <td>1. Umur > 65 Tahun</td>
                                                    <td>
                                                        <input type="radio" name="discharge_planning_noenatus_1"
                                                            id="discharge-planning-1-noenatus-ya" class="mr-1" value="1">Ya
                                                        <input type="radio" name="discharge_planning_noenatus_1"
                                                            id="discharge-planning-1-noenatus-tidak" class="mr-1 ml-2"
                                                            value="0" checked>Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2. Keterbatasan Mobilitas</td>
                                                    <td>
                                                        <input type="radio" name="discharge_planning_noenatus_2"
                                                            id="discharge-planning-2-noenatus-ya" class="mr-1" value="1">Ya
                                                        <input type="radio" name="discharge_planning_noenatus_2"
                                                            id="discharge-planning-2-noenatus-tidak" class="mr-1 ml-2"
                                                            value="0" checked>Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3. Perawatan / Pengobatan Lanjutan</td>
                                                    <td>
                                                        <input type="radio" name="discharge_planning_noenatus_3"
                                                            id="discharge-planning-3-noenatus-ya" class="mr-1" value="1">Ya
                                                        <input type="radio" name="discharge_planning_noenatus_3"
                                                            id="discharge-planning-3-noenatus-tidak" class="mr-1 ml-2"
                                                            value="0" checked>Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4. Bantuan Untuk Melanjutkan Aktifitas Sehari-hari</td>
                                                    <td>
                                                        <input type="radio" name="discharge_planning_noenatus_4"
                                                            id="discharge-planning-4-noenatus-ya" class="mr-1" value="1">Ya
                                                        <input type="radio" name="discharge_planning_noenatus_4"
                                                            id="discharge-planning-4-noenatus-tidak" class="mr-1 ml-2"
                                                            value="0" checked>Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Bila salah satu jawaban "Ya" dari kriteria perencanaan
                                                        pulang diatas, maka akan dilanjutkan dengan perencanaan pulang
                                                        sebagai berikut :</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_1"
                                                            id="kriteria-discharge-noenatus-1" class="mr-1"
                                                            value="1">Perawatan Diri
                                                        (Mandi, BAB, BAK)</td>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_2"
                                                            id="kriteria-discharge-noenatus-2" class="mr-1"
                                                            value="1">Bantuan Medis /
                                                        Perawatan Dirumah (Homescare)</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_3"
                                                            id="kriteria-discharge-noenatus-3" class="mr-1"
                                                            value="1">Pemantauan
                                                        Pemberian Obat</td>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_4"
                                                            id="kriteria-discharge-noenatus-4" class="mr-1"
                                                            value="1">Latihan Fisik
                                                        Lanjutan</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_5"
                                                            id="kriteria-discharge-noenatus-5" class="mr-1"
                                                            value="1">Pendampingan
                                                        Tenaga Khusus Dirumah</td>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_6"
                                                            id="kriteria-discharge-noenatus-6" class="mr-1"
                                                            value="1">Pemantauan Diet
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_7"
                                                            id="kriteria-discharge-noenatus-7" class="mr-1"
                                                            value="1">Bantuan Untuk
                                                        Melakukan Aktifitas Fisik</td>
                                                    <td><input type="checkbox" name="kriteria_discharge_noenatus_8"
                                                            id="kriteria-discharge-noenatus-8" class="mr-1"
                                                            value="1">Perawatan Luka
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>(Kursi Roda, Alat Bantu Jalan)</td>
                                                    <td>
                                                        <input type="checkbox" name="kriteria_discharge_noenatus_9"
                                                            id="kriteria-discharge-noenatus-9" class="mr-1"
                                                            value="1">Lain-lain
                                                        <input type="text" name="kriteria_discharge_noenatus_10"
                                                            id="kriteria-discharge-noenatus-10"
                                                            class="custom-form clear-input d-inline-block col-lg-6 "
                                                            placeholder="Masukkan lain - lain" readonly>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <!-- PERENCANAAN PULANG/DISCHARGE PLANING AKHIR -->

                                    <!-- YANG MELAKUKAN PENGKAJIAN NEONATUS AWAL -->
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="2" class="center td-dark"></td>
                                                </tr>
                                                <tr>
                                                    <td width="50%">
                                                        Tanggal & Jam : <input type="text" name="tanggal_ttd_perawat_neonatus"
                                                            id="tanggal-ttd-perawat-neonatus"
                                                            class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            value="<?= date('d/m/Y H:i') ?>"
                                                            placeholder="Masukkan tanggal & jam">
                                                    </td>
                                                    <td width="50%">
                                                        Tanggal & Jam : <input type="text" name="tanggal_ttd_neonatus_dokter"
                                                            id="tanggal-ttd-neonatus-dokter"
                                                            class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            placeholder="Masukkan tanggal & jam">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Perawat : <input type="text" name="pilih_perawat_neonatus" id="pilih-perawat-neonatus"
                                                            class="select2c-input ml-2"></td>
                                                    <td>Dokter Pengkajian : <input type="text" name="pilih_dokter_neonatus" id="pilih-dokter-neonatus"
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
                                                            <input type="checkbox" name="ceklis_ttd_perawat_neonatus" id="ceklis-ttd-perawat-neonatus"
                                                                value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('ceklis_neonatus_perawat_verified') ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="center">
                                                            <input type="checkbox" name="ceklis_ttd_dokter_neonatus"
                                                                id="ceklis-ttd-dokter-neonatus" value="1"
                                                                class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('ceklis_neonatus_dokter_verified') ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <!--YANG MELAKUKAN PENGKAJIAN NEONATUS AKHIR -->



                                    <!-- Data Pengkajian MEDIS Dokter Neonatus AWAL-->
                                    <div class="form-data-pengkajian-dokter">
                                        <table class="table table-no-border table-sm table-striped">
                                            <tr>
                                                <td width="20%" class="bold">Waktu /Jam Pengkajian</td>
                                                <td width="1%" class="bold">:</td>
                                                <td width="79%">
                                                    <input type="text" name="waktu_kajian_medis_neonatus"id="waktu-kajian-medis-neonatus"
                                                        class="custom-form clear-input col-lg-2"value="<?= date('d/m/Y H:i') ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="td-dark"><b>ANAMNESIS</b></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Keluhan Utama</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="keluhan_utama_medis_neonatus"
                                                        id="keluhan-utama-medis-neonatus" rows="4"
                                                        class="form-control clear-input"
                                                        placeholder="Keluhan Utama"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Riwayat Penyakit Sekarang</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rps_medis_neonatus" id="rps-medis-neonatus" rows="4"
                                                        class="form-control clear-input"
                                                        placeholder="Riwayat Penyakit Sekarang"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Riwayat Penyakit Terdahulu</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rpt_medis_neonatus" id="rpt-medis-neonatus" rows="4"
                                                        class="form-control clear-input"
                                                        placeholder="Riwayat Penyakit Terdahulu"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Pengobatan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="pengobatan_medis_neonatus"
                                                        id="pengobatan-medis-neonatus" rows="4"
                                                        class="form-control clear-input"
                                                        placeholder="Pengobatan"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Riwayat Alergi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="riwayat_alergi_neonatus" id="riwayat-alergi-neonatus"
                                                        rows="4" class="form-control clear-input"
                                                        placeholder="Riwayat Alergi"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Riwayat Penyakit Keluarga</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="rpk_medis_neonatus"
                                                        id="rpk-medis-neonatus-tidak" value="0" class="mr-1" checked>Tidak
                                                    <input type="radio" name="rpk_medis_neonatus"
                                                        id="rpk-medis-neonatus-ya" value="1" class="mr-1 ml-2">Ya,
                                                    <input type="checkbox" name="rpk_medis_neonatus_asma"
                                                        id="rpk-medis-neonatus-asma" value="1" class="mr-1 ml-4"
                                                        disabled>Asma
                                                    <input type="checkbox" name="rpk_medis_neonatus_dm"
                                                        id="rpk-medis-neonatus-dm" value="1" class="mr-1 ml-2" disabled>DM
                                                    <input type="checkbox" name="rpk_medis_neonatus_cardiovascular"
                                                        id="rpk-medis-neonatus-cardiovascular" value="1" class="mr-1 ml-2"
                                                        disabled>Cardiovascular
                                                    <input type="checkbox" name="rpk_medis_neonatus_kanker"
                                                        id="rpk-medis-neonatus-kanker" value="1" class="mr-1 ml-2"
                                                        disabled>kanker
                                                    <input type="checkbox" name="rpk_medis_neonatus_thalasemia"
                                                        id="rpk-medis-neonatus-thalasemia" value="1" class="mr-1 ml-2"
                                                        disabled>Thalasemia
                                                    <input type="checkbox" name="rpk_medis_neonatus_lain"
                                                        id="rpk-medis-neonatus-lain" value="1" class="mr-1 ml-2"
                                                        disabled>lain
                                                    <input type="text" name="rpk_medis_neonatus_lain_input"
                                                        id="rpk-medis-neonatus-lain-input"
                                                        class="custom-form clear-input col-lg-4 d-inline-block mr-2"
                                                        placeholder="Masukkan lain - lain" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan
                                                    Kebiasaan :</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh
                                                        kembang)</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div id="riwayat_field_neonatus"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
                                            </tr>
                                          
                                         
                                            <tr>
                                                <td class="bold">Kesadaran</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="checkbox" name="composmentis_medis_neonatus"
                                                        id="composmentis-medis-neonatus" value="1"
                                                        class="mr-1">Composmentis
                                                    <input type="checkbox" name="apatis_medis_neonatus"
                                                        id="apatis-medis-neonatus" value="1" class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="samnolen_medis_neonatus"
                                                        id="samnolen-medis-neonatus" value="1" class="mr-1 ml-2">Samnolen
                                                    <input type="checkbox" name="sopor_medis_neonatus"
                                                        id="sopor-medis-neonatus" value="1" class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="koma_medis_neonatus"
                                                        id="koma-medis-neonatus" value="1" class="mr-1 ml-2">Koma
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kepala</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_kepala_neonatus"
                                                        id="pf-kepala-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_kepala_neonatus"
                                                        id="pf-kepala-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_kepala_neonatus"
                                                        id="ket-pf-kepala-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Mata</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_mata_neonatus"
                                                        id="pf-mata-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_mata_neonatus" id="pf-mata-neonatus-ya"
                                                        value="Abnormal" class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_mata_neonatus"
                                                        id="ket-pf-mata-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Hidung</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_hidung_neonatus"
                                                        id="pf-hidung-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_hidung_neonatus"
                                                        id="pf-hidung-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_hidung_neonatus"
                                                        id="ket-pf-hidung-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Gigi dan Mulut</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_gigi_mulut_neonatus"
                                                        id="pf-gigi-mulut-neonatus-tidak" value="Normal"
                                                        class="mr-1">Normal
                                                    <input type="radio" name="pf_gigi_mulut_neonatus"
                                                        id="pf-gigi-mulut-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_gigi_mulut_neonatus"
                                                        id="ket-pf-gigi-mulut-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Tenggorokan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_tenggorokan_neonatus"
                                                        id="pf-tenggorokan-neonatus-tidak" value="Normal"
                                                        class="mr-1">Normal
                                                    <input type="radio" name="pf_tenggorokan_neonatus"
                                                        id="pf-tenggorokan-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_tenggorokan_neonatus"
                                                        id="ket-pf-tenggorokan-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Telinga</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_telinga_neonatus"
                                                        id="pf-telinga-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_telinga_neonatus"
                                                        id="pf-telinga-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_telinga_neonatus"
                                                        id="ket-pf-telinga-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Leher</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_leher_neonatus"
                                                        id="pf-leher-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_leher_neonatus" id="pf-leher-neonatus-ya"
                                                        value="Abnormal" class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_leher_neonatus"
                                                        id="ket-pf-leher-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Thorax</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_thorax_neonatus"
                                                        id="pf-thorax-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_thorax_neonatus"
                                                        id="pf-thorax-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_thorax_neonatus"
                                                        id="ket-pf-thorax-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Jantung</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_jantung_neonatus"
                                                        id="pf-jantung-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_jantung_neonatus"
                                                        id="pf-jantung-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_jantung_neonatus"
                                                        id="ket-pf-jantung-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Paru</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_paru_neonatus"
                                                        id="pf-paru-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_paru_neonatus" id="pf-paru-neonatus-ya"
                                                        value="Abnormal" class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_paru_neonatus"
                                                        id="ket-pf-paru-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Abdomen</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_abdomen_neonatus"
                                                        id="pf-abdomen-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_abdomen_neonatus"
                                                        id="pf-abdomen-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_abdomen_neonatus"
                                                        id="ket-pf-abdomen-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Genitalia dan Anus</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_genitalia_neonatus"
                                                        id="pf-genitalia-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_genitalia_neonatus"
                                                        id="pf-genitalia-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_genitalia_neonatus"
                                                        id="ket-pf-genitalia-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Ekstermitas</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_ekstermitas_neonatus"
                                                        id="pf-ekstermitas-neonatus-tidak" value="Normal"
                                                        class="mr-1">Normal
                                                    <input type="radio" name="pf_ekstermitas_neonatus"
                                                        id="pf-ekstermitas-neonatus-ya" value="Abnormal"
                                                        class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_ekstermitas_neonatus"
                                                        id="ket-pf-ekstermitas-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Kulit</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="pf_kulit_neonatus"
                                                        id="pf-kulit-neonatus-tidak" value="Normal" class="mr-1">Normal
                                                    <input type="radio" name="pf_kulit_neonatus" id="pf-kulit-neonatus-ya"
                                                        value="Abnormal" class="mr-1 ml-2">Abnormal
                                                    <input type="text" name="ket_pf_kulit_neonatus"
                                                        id="ket-pf-kulit-neonatus"
                                                        class="custom-form clear-input col-lg-6 d-inline-block ml-4"
                                                        placeholder="Keterangan">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Laboratorium</td>
                                                <td class="bold">:</td>
                                                <td><div id="hasil_laboratorium_neonatus"></div></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Radiologi</td>
                                                <td class="bold">:</td>
                                                <td><div id="hasil_radiologi_neonatus"></div></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Penunjang Lain</td>
                                                <td class="bold">:</td>
                                                <td><div id="hasil_penunjang_lain_neonatus"></div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><div id="diagnosa_awal_medis_neonatus"></div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="bold td-dark">TATA LAKSANA</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">1. Rencana Edukasi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rd_neonatus" id="rd-neonatus" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">2. Rencana Pemeriksaan Penunjang</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rpp_neonatus" id="rpp-neonatus" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">3. Rencana Terapi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rt_neonatus" id="rt-neonatus" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">4. Rencana Konsultasi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <textarea name="rk_neonatus" id="rk-neonatus" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <b>Perkiraan Lama Rawat : </b><input type="text" name="rp_neonatus_1" id="rk-neonatus-1" class="custom-form col-lg-4 d-inline-block"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="rp_neonatus_2" id="rk-neonatus-2" value="1" class="mr-1">
                                                    <b class="ml-1">Sudah Bisa Ditetapkan : </b><input type="text" name="rp_neonatus_3" id="rk-neonatus-3" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td>
                                                    <b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="rp_neonatus_4" id="rk-neonatus-4" class="custom-form col-lg-4 d-inline-block">
                                                    <b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="rp_neonatus_5" id="rk-neonatus-5" class="custom-form col-lg-2 d-inline-block"placeholder="Masukan tanggal">
                                                </td>
                                            </tr>
                                        </table>

                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                            <tr>
                                                <td colspan="2" class="center td-dark"></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                    Tanggal & Jam <input type="text"
                                                        name="tanggal_ttd_dokter_dpjp_neonatus"
                                                        id="tanggal-ttd-dokter-dpjp-neonatus"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="dd/mm/yyyy hh:ii">
                                                </td>
                                                <td width="50%">
                                                    Tanggal & Jam <input type="text"
                                                        name="tanggal_ttd_dokter_pengkajian_neonatus"
                                                        id="tanggal-ttd-dokter-pengkajian-neonatus"
                                                        class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                        placeholder="dd/mm/yyyy hh:ii">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DPJP <input type="text" name="dokter_dpjp_neonatus"
                                                        id="dokter-dpjp-neonatus" class="select2c-input ml-2"></td>
                                                <td>Dokter Pengkajian <input type="text" name="dokter_pengkajian_neonatus"
                                                        id="dokter-pengkajian-neonatus" class="select2c-input ml-2"></td>
                                            </tr>
                                            <tr>
                                                <td class="center">
                                                    Tanda Tangan DPJP
                                                </td>
                                                <td class="center">
                                                    Tanda Tangan Dokter Yang Melakukan Pengkajian
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_dokter_dpjp_neonatus"id="ttd-dokter-dpjp-neonatus" value="1"
                                                            class="custom-form col-lg-1 mx-auto"><?= digitalSignature('ttd_dokter_dpjp_verified_neonatus') ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="center">
                                                        <input type="checkbox" name="ttd_dokter_pengkajian_neonatus"id="ttd-dokter-pengkajian-neonatus" value="1"
                                                            class="custom-form col-lg-1 mx-auto"><?= digitalSignature('ttd_dokter_pengkajian_verified_neonatus') ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- Data Pengkajian MEDIS Dokter Neonatus AKHIR-->
                               </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info"
                    onclick="konfirmasiSimpanPengkajianAwalNeonatus()" id="btn-simpan"><i
                        class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL LOG HISTORY NEONATUS AWAL-->
<div class="modal fade" id="modal_history_logs_neonatus" tabindex="-1">
    <div class="modal-dialog" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">History Logs Pengkajian Awal Neonatus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><b>Kajian Medis Neonatus <i>(Dokter)</i></b></h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover color-table info-table"id="table_kajian_medis_neonatus">
                                <thead>
                                    <tr>
                                        <th class="nowrap">No.</th>
                                        <th class="nowrap">Tgl Ubah</th>
                                        <th class="nowrap">User</th>
                                        <th class="nowrap">Keluhan Utama</th>
                                        <th class="nowrap">Riwayat Penyakit Sekarang</th>
                                        <th class="nowrap">Riwayat Penyakit Terdahulu</th>
                                        <th class="nowrap">Pengobatan</th>
                                        <th class="nowrap">Riwayat Alergi</th>
                                        <th class="nowrap">Hasil Laboratorium</th>
                                        <th class="nowrap">Hasil Radiologi</th>
                                        <th class="nowrap">Hasil Penunjang Lain</th>
                                        <th class="nowrap">Diagnosa Awal</th>
                                        <th class="nowrap">Rencana Edukasi</th>
                                        <th class="nowrap">Rencana Pemeriksaan Penunjang</th>
                                        <th class="nowrap">Rencana Terapi</th>
                                        <th class="nowrap">Rencana Konsultasi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL LOG HISTORYNEONATUS  AKHIR-->