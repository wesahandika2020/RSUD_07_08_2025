<!-- MONITORING GABUNGAN // MONITORING // GRVK -->
<div class="modal fade" id="modal_entri_keperawatan_monitoring" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_entri_keperawatan_monitoring">Monitoring Pasien</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan_monitoring class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-monitoring">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-monitoring">
                <input type="hidden" name="id_pasien" id="id-pasien-monitoring">
                <input type="hidden" name="id_monitoring" id="id-monitoring">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-monitoring"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="rm-monitoring"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-monitoring"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-monitoring"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat-monitoring"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-monitoring"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="ek-logo-pasien-alergi">
                                            <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="ek-logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                                <div class="form-monitoring-pasien">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="mp_btn_expand_all"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="mp_btn_collapse_all"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-monitoring-pasien"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>Monitoring Grafik
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- // MP-A -->
                                    <div class="collapse multi-collapse mt-2" id="data-monitoring-pasien">                                      
                                        <div class="row">                                                                         
                                            <div class="col-lg-12">
                                                <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem">                                                                                                                                            
                                                    <b>Tanggal</b><input type="text" name="tanggal_mp" id="tanggal-mp"class="custom-form clear-input d-inline-block col-lg-1 ml-2 mr-4"placeholder="Tanggal">
                                                    <b>Berat Badan</b><input type="text" name="bb_mp" id="bb-mp"class="custom-form clear-input d-inline-block col-lg-1 mx-2"placeholder="BB">Kg
                                                    <b class="ml-4">Tinggi Badan</b><input type="text" name="tb_mp" id="tb-mp"class="custom-form clear-input d-inline-block col-lg-1 mx-2"placeholder="TB">Cm                                                                                                                                                          
                                                </div> 
                                                <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*"> 
                                                    <div class="card-body">
                                                        <div id="grafik_mp"></div>
                                                        <div style="display: flex;justify-content: center;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-sm table-striped table-bordered">
                                                    <tr>
                                                        <td style="color: red; font-weight: bold;">
                                                            Harap Diperhatikan Ketika Memilih Tanggal dan Jam pada Grafik Agar tidak terjadi Kesalahan
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered alatGrafik">                                                  
                                                    <tr>
                                                        <td width="5%" class="center">Suhu</td>
                                                        <td width="10%" class="center"><input type="number" name="suhu_mp" id="suhu-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                        <td width="5%" class="center">RR</td>                                                           
                                                        <td width="10%" class="center"><input type="number" name="rr_mp" id="rr-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                        <td width="5%" class="center">Nadi</td> 
                                                        <td width="10%" class="center"><input type="number" name="nadi_mp" id="nadi-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                        <td width="5%" class="center">Jam</td> 
                                                        <td width="10%" class="center"><input type="text" name="jam_mp" id="jam-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                        <td width="5%" class="center">Tanggal</td> 
                                                        <td width="10%" class="center"><input type="text" name="tgl_mp" id="tgl-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                        <td width="10%" class="center">
                                                            <button type="button" class="btn btn-info btn-xs float-center" id="btn-mp-chart">Tambah</button>
                                                        </td>
                                                    
                                                    </tr>  
                                                </table>
                                                <div class="card">
                                                    <table class="table table-sm table-striped table-bordered" id="tabel-mg">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>No</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>Suhu</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>RR</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>Nadi</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>Jam</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</b></th>
                                                                <th class="center" style="background-color: #B0E0E6; color: black;"><b>Nama Petugas</b></th>
                                                                <th class="center alatGrafik" colspan="2" style="background-color: #B0E0E6; color: black;"><b>Alat</b></th>
                                                            </tr>                                                       
                                                        </thead>
                                                        <tbody class="body-table">
                                                        </tbody>                                                                                                                                                                                   
                                                    </table>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <!-- // MPP-C -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse"
                                                    data-target="#collapse-data-monitoring-pasien-p" aria-expanded="false"
                                                    aria-controls="collapse-data-monitoring-pasien-p">
                                                    <i class="fas fa-expand mr-1"></i>Expand
                                                </button> Monitoring Pasien
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="collapse mt-2" id="collapse-data-monitoring-pasien-p">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <div id="buka-tutup-mpp">
                                                    </div>                                                 
                                                    <table class="table table-sm table-striped table-bordered" id="tabel-mpp">
                                                        <thead>
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
                                                </div>                                       
                                            </div>
                                        </div>
                                    </div> 

                                    <P></P>

                                    <!-- NEWS (DEWASA) -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-monitoring-pasien-news"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button>NEWS (DEWASA)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-monitoring-pasien-news">
                                        <table class="table table-sm table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="center" colspan="9"style="background-color: #B0E0E6; color: black;"><b>NEWS</b></th>
                                                    </tr>
                                                    <tr>
                                                        <th width="5%" class="center"><b>No.</b></th>
                                                        <th width="15%" class="center"><b>Parameter</b></th>
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
                                                    <td>Respirasi</td>
                                                    <td class="center"><input type="radio" name="laju_respirasi_mp"
                                                            id="mpnews-1-1" value="3_1" class="mr-1 mpnews">&#8804;8
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="laju_respirasi_mp"
                                                            id="mpnews-1-2" value="1_2" class="mr-1 mpnews ">9-11
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_respirasi_mp"
                                                            id="mpnews-1-3" value="0_3" class="mr-1 mpnews ">12-20
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="laju_respirasi_mp"
                                                            id="mpnews-1-4" value="2_4" class="mr-1 mpnews ">21-24
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_respirasi_mp"
                                                            id="mpnews-1-5" value="3_5" class="mr-1 mpnews ">&#8805;25
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2.</td>
                                                    <td>SpO2 Skala 1 (Non PPOK)</td>
                                                    <td class="center"><input type="radio" name="saturasi_mp"
                                                            id="mpnews-2-1" value="3_1" class="mr-1 mpnews "> &#8804;91
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_mp"
                                                            id="mpnews-2-2" value="2_2" class="mr-1 mpnews ">92-93
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_mp"
                                                            id="mpnews-2-3" value="1_3" class="mr-1 mpnews ">94-95
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_mp"
                                                            id="mpnews-2-4" value="0_4" class="mr-1 mpnews "> ≥96
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3.</td>
                                                    <td>SpO2 Skala 2 (PPOK)</td>
                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-1" value="3_1" class="mr-1 mpnews">&#8804;83
                                                    </td>
                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-2" value="2_2" class="mr-1 mpnews">84-85
                                                    </td>
                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-3" value="1_3" class="mr-1 mpnews ">86-87
                                                    </td>
                                                    <td class="center"> 88-92 <br>
                                                        <input type="radio" name="spo2_skala2_news" id="mpnews-3-4" value="0_4" class="mr-1 mpnews">                                                      
                                                        &#8805;93 RA
                                                    </td>

                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-5" value="1_5" class="mr-1 mpnews ">93-94 <br> dgn O2
                                                    </td>
                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-6" value="2_6" class="mr-1 mpnews ">95-96 <br> dgn O2
                                                    </td>
                                                    <td class="center"><input type="radio" name="spo2_skala2_news"
                                                            id="mpnews-3-7" value="3_7" class="mr-1 mpnews ">&#8805;97 <br> dgn O2
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4.</td>
                                                    <td>Suplemen O₂</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suplemen_mp"
                                                            id="mpnews-4-1" value="2_1" class="mr-1 mpnews ">Ya
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suplemen_mp"
                                                            id="mpnews-4-2" value="0_2" class="mr-1 mpnews ">Tidak
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">5.</td>
                                                    <td>TD Sistolik</td>
                                                    <td class="center"><input type="radio" name="td_sistolik_news"
                                                            id="mpnews-5-1" value="3_1" class="mr-1 mpnews "> &#8804;90
                                                    </td>
                                                    <td class="center"><input type="radio" name="td_sistolik_news"
                                                            id="mpnews-5-2" value="2_2"
                                                            class="mr-1 mpnews ">91-100
                                                    </td>

                                                    <td class="center"><input type="radio" name="td_sistolik_news"
                                                            id="mpnews-5-3" value="1_3"
                                                            class="mr-1 mpnews ">101-110
                                                    </td>
                                                    <td class="center"><input type="radio" name="td_sistolik_news"
                                                            id="mpnews-5-4" value="0_4"
                                                            class="mr-1 mpnews ">111-219
                                                    </td>

                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="td_sistolik_news"
                                                            id="mpnews-5-5" value="3_5" class="mr-1 mpnews "> ≥220
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td class="center">6.</td>
                                                    <td>Nadi</td>
                                                    <td class="center"><input type="radio" name="nadi_news" id="mpnews-6-1"
                                                            value="3_1" class="mr-1 mpnews ">&#8804;40
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="nadi_news" id="mpnews-6-2"
                                                            value="1_2" class="mr-1 mpnews ">41-50
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_news" id="mpnews-6-3"
                                                            value="0_3" class="mr-1 mpnews ">51-90
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_news" id="mpnews-6-4"
                                                            value="1_4" class="mr-1 mpnews ">91-110
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_news" id="mpnews-6-5"
                                                            value="2_5" class="mr-1 mpnews ">111-130
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_news"
                                                            id="mpnews-6-6" value="3_6" class="mr-1 mpnews "> ≥131
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">7.</td>
                                                    <td>Kesadaran</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>                                                 
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_news"
                                                            id="mpnews-7-1" value="0_1" class="mr-1 mpnews "> A
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_news"
                                                            id="mpnews-7-2" value="3_2" class="mr-1 mpnews "> CVPU
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">8.</td>
                                                    <td>Suhu</td>
                                                    <td class="center"><input type="radio" name="suhu_newst" id="mpnews-8-1"
                                                            value="3_1" class="mr-1 mpnews ">&#8804;35,0
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suhu_newst"
                                                            id="mpnews-8-2" value="1_2" class="mr-1 mpnews ">35,1-36,0
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu_newst"
                                                            id="mpnews-8-3" value="0_3" class="mr-1 mpnews ">36,1-38,0
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu_newst"
                                                            id="mpnews-8-4" value="1_4" class="mr-1 mpnews ">38,1-39,0
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu_newst"
                                                            id="mpnews-8-5" value="2_5" class="mr-1 mpnews ">&#8805;39,1
                                                    </td>
                                                    <td class="center"></td>
                                                <tr>
                                                    <td colspan="10"></td>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>TOTAL</b></td>
                                                    <td colspan="8">
                                                        <input type="radio" name="total_mpnews"
                                                            id="total-mpnews-1" class="mr-1" value="Putih"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: white"></i><b>Putih (0)</b>
                                                        <input type="radio" name="total_mpnews"
                                                            id="total-mpnews-2" class="mr-1 ml-3" value="Hijau"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: green"></i><b>Hijau (1-4)</b>
                                                        <input type="radio" name="total_mpnews"
                                                            id="total-mpnews-3" class="mr-1 ml-3" value="Kuning"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: yellow"></i><b>Kuning (5-6)</b>
                                                        <input type="radio" name="total_mpnews"
                                                            id="total-mpnews-4" class="mr-1 ml-3" value="Merah"><i
                                                            class="fas fa-fw fa-square" style="color: red"></i><b>Merah(≥7)</b>                                                          
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- MEOWS (MATERNAL) -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-monitoring-pasien-meows"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button>MEOWS (MATERNAL) 
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-monitoring-pasien-meows">
                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center" colspan="9" style="background-color: #B0E0E6; color: black;"><b>MEOWS</b></th>
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
                                                    <td>Respirasi</td>
                                                    <td class="center"><input type="radio" name="respirasi_mpp"id="mpmeows-1-1" value="3_1"
                                                        class="mr-1 mpmeows">&#60;12
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="respirasi_mpp"id="mpmeows-1-2" value="0_2"
                                                        class="mr-1 mpmeows ">12-20
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="respirasi_mpp"id="mpmeows-1-3" value="2_3"
                                                        class="mr-1 mpmeows ">21-25
                                                    </td>
                                                    <td class="center"><input type="radio" name="respirasi_mpp"id="mpmeows-1-4" value="3_4"
                                                        class="mr-1 mpmeows ">&#62;25
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2.</td>
                                                    <td>Saturasi O2</td>
                                                    <td class="center"><input type="radio" name="saturasi_mpp"id="mpmeows-2-1" value="3_1" 
                                                        class="mr-1 mpmeows ">&#60;92
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_mpp"id="mpmeows-2-2" value="2_2" 
                                                        class="mr-1 mpmeows ">92-95
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="saturasi_mpp"id="mpmeows-2-3" value="0_3" 
                                                        class="mr-1 mpmeows ">&#62;95
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3.</td>
                                                    <td> O₂</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="o2_mpp" id="mpmeows-3-1"value="2_1" 
                                                        class="mr-1 mpmeows ">Ya</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="o2_mpp" id="mpmeows-3-2"value="0_2" 
                                                        class="mr-1 mpmeows ">Tidak</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4.</td>
                                                    <td>Suhu</td>
                                                    <td class="center"><input type="radio" name="suhu_mpp" id="mpmeows-4-1"value="3_1" 
                                                        class="mr-1 mpmeows ">&#60;36
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suhu_mpp" id="mpmeows-4-2"value="0_2" 
                                                        class="mr-1 mpmeows ">36.1-37.2
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suhu_mpp" id="mpmeows-4-3" value="2_3" 
                                                        class="mr-1 mpmeows ">37.5-37.7
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu_mpp" id="mpmeows-4-4"value="3_4" 
                                                        class="mr-1 mpmeows ">&#62;37.7
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="center">5.</td>
                                                    <td>TD Sistolik</td>
                                                    <td class="center"><input type="radio" name="sintolik_mpp" id="mpmeows-5-1" value="3_1" 
                                                        class="mr-1 mpmeows ">&#60;90
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="sintolik_mpp"id="mpmeows-5-2" value="0_2" 
                                                        class="mr-1 mpmeows ">90-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="sintolik_mpp"id="mpmeows-5-3" value="1_3" 
                                                        class="mr-1 mpmeows ">141-150
                                                    </td>
                                                    <td class="center"><input type="radio" name="sintolik_mpp"id="mpmeows-5-4" value="2_4" 
                                                        class="mr-1 mpmeows ">151-160
                                                    </td>
                                                    <td class="center"><input type="radio" name="sintolik_mpp"id="mpmeows-5-5" value="3_5"
                                                        class="mr-1 mpmeows ">&#62;160
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">6.</td>
                                                    <td>TD diastolik</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="diastolik_mpp"id="mpmeows-6-1" value="0_1" 
                                                        class="mr-1 mpmeows ">60-90
                                                    </td>
                                                    <td class="center"><input type="radio" name="diastolik_mpp"id="mpmeows-6-2" value="1_2" 
                                                        class="mr-1 mpmeows ">91-100
                                                    </td>
                                                    <td class="center"><input type="radio" name="diastolik_mpp"id="mpmeows-6-3" value="2_3" 
                                                        class="mr-1 mpmeows ">101-110
                                                    </td>
                                                    <td class="center"><input type="radio" name="diastolik_mpp"id="mpmeows-6-4" value="3_4"
                                                        class="mr-1 mpmeows ">&#62;110
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">7.</td>
                                                    <td>Nadi</td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-1"value="3_1" 
                                                        class="mr-1 mpmeows ">&#60;50
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-2"value="2_2" 
                                                        class="mr-1 mpmeows ">50-60</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-3"value="0_3" 
                                                        class="mr-1 mpmeows ">61-100
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-4"value="1_4" 
                                                        class="mr-1 mpmeows ">101-110
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-5"value="2_5" 
                                                        class="mr-1 mpmeows ">111-120
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi_mpp" id="mpmeows-7-6"value="3_6" 
                                                        class="mr-1 mpmeows ">&#62;120
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">8.</td>
                                                    <td>Kesadaran</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_mpp"id="mpmeows-8-1" value="0_1" 
                                                        class="mr-1 mpmeows ">A</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_mpp"id="mpmeows-8-2" value="3_2" 
                                                        class="mr-1 mpmeows ">V,P/U
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">9.</td>
                                                    <td>Nyeri</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="nyeri_11_mpp"id="mpmeows-9-1" value="0_1" 
                                                        class="mr-1 mpmeows ">Normal
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="nyeri_11_mpp"id="mpmeows-9-2" value="3_2"
                                                        class="mr-1 mpmeows ">Abnormal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">10.</td>
                                                    <td>Pengeluaran/Lochea</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="pengeluwaran_11_mpp"id="mpmeows-10-1" value="0_1" 
                                                        class="mr-1 mpmeows ">Normal
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="pengeluwaran_11_mpp"id="mpmeows-10-2" value="3_2"
                                                        class="mr-1 mpmeows ">Abnormal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">11.</td>
                                                    <td>Protein urin</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="protein_mpp"id="mpmeows-11-1" value="2_1" 
                                                        class="mr-1 mpmeows ">+
                                                    </td>
                                                    <td class="center"><input type="radio" name="protein_mpp" id="mpmeows-11-2" value="3_2"
                                                        class="mr-1 mpmeows ">&#62;++
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>TOTAL</b></td>
                                                    <td colspan="8">
                                                        <input type="radio" name="total_mpmeows" id="total-mpmeows-1"class="mr-1" value="Putih"><i class="fas fa-fw fa-square"
                                                            style="color: white"></i><b>Putih (0)</b>
                                                        <input type="radio" name="total_mpmeows" id="total-mpmeows-2"class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square"
                                                            style="color: green"></i><b>Hijau (1-4)</b>
                                                        <input type="radio" name="total_mpmeows" id="total-mpmeows-3"class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square"
                                                            style="color: yellow"></i><b>Kuning(5-6/skor 3 pd 1 parameter)</b>
                                                        <input type="radio" name="total_mpmeows" id="total-mpmeows-4"class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square"
                                                            style="color: red"></i><b>Merah(≥7)</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- PEWS (ANAK) -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-monitoring-pasien-pews"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button>PEWS (ANAK) 
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-monitoring-pasien-pews">
                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center" colspan="9" style="background-color: #B0E0E6; color: black;"><b>PEWS</b></th>
                                                </tr>
                                                <tr>
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
                                                    <td>Suhu</td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="suhu2"id="skalapews_1_1" value="2_1"
                                                        class="mr-1 skalapews pews_suhu_1_1">< 35
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu2"id="skalapews_1_2" value="1_2"
                                                        class="mr-1 skalapews pews_suhu_1_2">35.1-36
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu2"id="skalapews_1_3" value="0_3"
                                                        class="mr-1 skalapews pews_suhu_1_3">36.1-38
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu2"id="skalapews_1_4" value="1_4"
                                                        class="mr-1 skalapews pews_suhu_1_4">38.1-38.5
                                                    </td>
                                                    <td class="center"><input type="radio" name="suhu2"id="skalapews_1_5" value="2_5"
                                                        class="mr-1 skalapews pews_suhu_1_5"> >38.5
                                                    </td>
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
                                                    <td><span class="ml-3">
                                                        < 28 Hari</span>
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_2_1" value="3_1"
                                                        class="mr-1 skalapews pews_pernafasan_2_1"> < 20
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_2_2" value="1_2"
                                                        class="mr-1 skalapews pews_pernafasan_2_2">30-39
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_2_3" value="0_3"
                                                        class="mr-1 skalapews pews_pernafasan_2_3">40-60
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_2_4" value="3_4"
                                                        class="mr-1 skalapews pews_pernafasan_2_4">> 60
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">1-12 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_3_1" value="3_5"
                                                        class="mr-1 skalapews pews_pernafasan_3_1">≤ 20
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_3_2" value="1_6"
                                                        class="mr-1 skalapews pews_pernafasan_3_2">20-29
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_3_3" value="0_7"
                                                        class="mr-1 skalapews pews_pernafasan_3_3">30-40
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2" id="skalapews_3_4" value="1_8"
                                                        class="mr-1 skalapews pews_pernafasan_3_4">41-50
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_3_5" value="2_9"
                                                        class="mr-1 skalapews pews_pernafasan_3_5">51-60
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_3_6" value="3_10"
                                                        class="mr-1 skalapews pews_pernafasan_3_6">≥ 60
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_4_1" value="3_11"
                                                        class="mr-1 skalapews pews_pernafasan_4_1"> < 20
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_4_2" value="0_12"
                                                        class="mr-1 skalapews pews_pernafasan_4_2">20-30
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_4_3" value="1_13"
                                                        class="mr-1 skalapews pews_pernafasan_4_3">31-50
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_4_4" value="2_14"
                                                        class="mr-1 skalapews pews_pernafasan_4_4">51-60
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_4_5" value="3_15"
                                                        class="mr-1 skalapews pews_pernafasan_4_5">> 60
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">4-6 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_5_1" value="3_16"
                                                        class="mr-1 skalapews pews_pernafasan_5_1">< 20
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_5_2" value="0_17"
                                                        class="mr-1 skalapews pews_pernafasan_5_2">20-30
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2" id="skalapews_5_3" value="1_18"
                                                        class="mr-1 skalapews pews_pernafasan_5_3">31-50
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2" id="skalapews_5_4" value="2_19"
                                                        class="mr-1 skalapews pews_pernafasan_5_4">51-60
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_5_5" value="3_20"
                                                        class="mr-1 skalapews pews_pernafasan_5_5">> 60
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_6_1" value="3_21"
                                                        class="mr-1 skalapews pews_pernafasan_6_1">< 10
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_6_2" value="0_22"
                                                        class="mr-1 skalapews pews_pernafasan_6_2">10-20
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_6_3" value="1_23"
                                                        class="mr-1 skalapews pews_pernafasan_6_3">21-30
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_6_4" value="2_24"
                                                        class="mr-1 skalapews pews_pernafasan_6_4">31-40
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_6_5" value="3_25"
                                                        class="mr-1 skalapews pews_pernafasan_6_5">> 40
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_7_1" value="3_26"
                                                        class="mr-1 skalapews pews_pernafasan_7_1">< 10
                                                    </td>
                                                    <td> </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="pernafasan2" id="skalapews_7_2" value="0_27"
                                                        class="mr-1 skalapews pews_pernafasan_7_2">10-20
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_7_3" value="1_28"
                                                        class="mr-1 skalapews pews_pernafasan_7_3">21-30
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_7_4" value="2_29"
                                                        class="mr-1 skalapews pews_pernafasan_7_4">31-40
                                                    </td>
                                                    <td class="center"><input type="radio" name="pernafasan2"id="skalapews_7_5" value="3_30"
                                                        class="mr-1 skalapews pews_pernafasan_7_5">> 40
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"id="skalapews_8_1" value="0_1"
                                                        class="mr-1 skalapews pews_subpernafasan_8_1">Tidak Retraksi
                                                    </td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"id="skalapews_8_2" value="1_2"
                                                        class="mr-1 skalapews pews_subpernafasan_8_2">Otot Bantu Nafas
                                                    </td>
                                                    <td class="center"><input type="radio" name="subpernafasan2"id="skalapews_8_3" value="2_3"
                                                        class="mr-1 skalapews pews_subpernafasan_8_3">Retraksi
                                                    </td>
                                                    <td class="center"><input type="radio" name="subpernafasan2" id="skalapews_8_4" value="3_4"
                                                        class="mr-1 skalapews pews_subpernafasan_8_4">Merintih
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alat Bantu O₂</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"id="skalapews_9_1" value="0_1"
                                                        class="mr-1 skalapews pews_alat_bantu_9_1">No
                                                    </td>
                                                    <td class="center"><input type="radio" name="alat_bantu2"id="skalapews_9_2" value="1_2"
                                                        class="mr-1 skalapews pews_alat_bantu_9_2">> 3L /Menit
                                                    </td>

                                                    <td class="center"><input type="radio" name="alat_bantu2"id="skalapews_9_3" value="2_3"
                                                        class="mr-1 skalapews pews_alat_bantu_9_3">> 3L /Menit
                                                    </td>

                                                    <!-- <td class="center"><input type="radio" name="alat_bantu2"
                                                        class="mr-1 skalapews pews_alat_bantu_9_3">> 6L /Menit
                                                    </td> -->

                                                    <td class="center"><input type="radio" name="alat_bantu2"id="skalapews_9_4" value="3_4"
                                                        class="mr-1 skalapews pews_alat_bantu_9_4">> 8L /Menit
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Saturasi O₂</td>
                                                    <td class="center"><input type="radio" name="saturasi2"id="skalapews_10_1" value="3_1"
                                                        class="mr-1 skalapews pews_saturasi_10_1">≤ 85
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi2"id="skalapews_10_2" value="2_2"
                                                        class="mr-1 skalapews pews_saturasi_10_2">86-89
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi2"id="skalapews_10_3" value="1_3"
                                                        class="mr-1 skalapews pews_saturasi_10_3">90-93
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi2"id="skalapews_10_4" value="0_4"
                                                        class="mr-1 skalapews pews_saturasi_10_4">≥ 94
                                                    </td>
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
                                                    <td><span class="ml-3">
                                                        < 28 Hari</span>
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_1" value="3_1"
                                                        class="mr-1 skalapews pews_nadi_11_1">< 80
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_2" value="2_2"
                                                        class="mr-1 skalapews pews_nadi_11_2">81-90
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_3" value="1_3"
                                                        class="mr-1 skalapews pews_nadi_11_3">91-99
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_4" value="0_4"
                                                        class="mr-1 skalapews pews_nadi_11_4">100-180
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_5" value="1_5"
                                                        class="mr-1 skalapews pews_nadi_11_5">181-190
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_11_6" value="3_6"
                                                        class="mr-1 skalapews pews_nadi_11_6">≥ 200
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">1-12 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_1" value="3_7"
                                                        class="mr-1 skalapews pews_nadi_12_1">< 90
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_2" value="2_8"
                                                        class="mr-1 skalapews pews_nadi_12_2">90-99
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_3" value="1_9"
                                                        class="mr-1 skalapews pews_nadi_12_3">100-109
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_4" value="0_10"
                                                        class="mr-1 skalapews pews_nadi_12_4">110-160
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_5" value="1_11"
                                                        class="mr-1 skalapews pews_nadi_12_5">161-170
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_6" value="2_12"
                                                        class="mr-1 skalapews pews_nadi_12_6">171-190
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_12_7" value="3_13"
                                                        class="mr-1 skalapews pews_nadi_12_7">≥ 190
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-36 Bulan</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_13_1" value="3_14"
                                                        class="mr-1 skalapews pews_nadi_13_1">≤ 70
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2" id="skalapews_13_2" value="2_15"
                                                        class="mr-1 skalapews pews_nadi_13_2">70-79
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_13_3" value="1_16"
                                                        class="mr-1 skalapews pews_nadi_13_3">80-89
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_13_4" value="0_17"
                                                        class="mr-1 skalapews pews_nadi_13_4">90-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_13_5" value="1_18"
                                                        class="mr-1 skalapews pews_nadi_13_5">141-160
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2" id="skalapews_13_6" value="2_19"
                                                        class="mr-1 skalapews pews_nadi_13_6">161-170
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_13_7" value="3_20"
                                                        class="mr-1 skalapews pews_nadi_13_7">> 170
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">4-6 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_1" value="3_21"
                                                        class="mr-1 skalapews pews_nadi_14_1"> < 60
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2" id="skalapews_14_2" value="2_22"
                                                        class="mr-1 skalapews pews_nadi_14_2">70-79
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_3" value="1_23"
                                                        class="mr-1 skalapews pews_nadi_14_3">80-89
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_4" value="0_24"
                                                        class="mr-1 skalapews pews_nadi_14_4">80-120
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_5" value="1_25"
                                                        class="mr-1 skalapews pews_nadi_14_5">121-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_6" value="2_26"
                                                        class="mr-1 skalapews pews_nadi_14_6">141-160
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_14_7" value="3_27"
                                                        class="mr-1 skalapews pews_nadi_14_7">> 160
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">7-12 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_1" value="3_28"
                                                        class="mr-1 skalapews pews_nadi_15_1">< 60
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_2" value="2_29"
                                                        class="mr-1 skalapews pews_nadi_15_2">60-69
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_3" value="1_30"
                                                        class="mr-1 skalapews pews_nadi_15_3">70-79
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_4" value="0_31"
                                                        class="mr-1 skalapews pews_nadi_15_4">55-100
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_5" value="1_32"
                                                        class="mr-1 skalapews pews_nadi_15_5">101-120
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_6" value="2_33"
                                                        class="mr-1 skalapews pews_nadi_15_6">121-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_15_7" value="3_34"
                                                        class="mr-1 skalapews pews_nadi_15_7">> 140
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="ml-3">13-18 Tahun</span></td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_1" value="3_35"
                                                        class="mr-1 skalapews pews_nadi_16_1">< 60
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_2" value="2_36"
                                                        class="mr-1 skalapews pews_nadi_16_2">60-69
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_3" value="1_37"
                                                        class="mr-1 skalapews pews_nadi_16_3">70-79
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_4" value="0_38"
                                                        class="mr-1 skalapews pews_nadi_16_4">55-100
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_5" value="1_39"
                                                        class="mr-1 skalapews pews_nadi_16_5">101-120
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_6" value="2_40"
                                                        class="mr-1 skalapews pews_nadi_16_6">121-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="nadi2"id="skalapews_16_7" value="3_41"
                                                        class="mr-1 skalapews pews_nadi_16_7">> 140
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Warna Kulit</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"id="skalapews_17_1" value="0_1"
                                                        class="mr-1 skalapews pews_warna_kulit_17_1">Tidak
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"id="skalapews_17_2" value="2_2"class="mr-1 skalapews pews_warna_kulit_17_2">Tampak
                                                    </td>
                                                    <td class="center"><input type="radio" name="warna_kulit2"id="skalapews_17_3" value="3_3"
                                                        class="mr-1 skalapews pews_warna_kulit_17_3">Sianotik dan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TDS</td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_1" value="3_1"
                                                        class="mr-1 skalapews pews_tds_18_1">≤ 80
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_2" value="1_2"
                                                        class="mr-1 skalapews pews_tds_18_2">80-89
                                                    </td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_3" value="0_3"
                                                        class="mr-1 skalapews pews_tds_18_3">90-119
                                                    </td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_4" value="1_4"
                                                        class="mr-1 skalapews pews_tds_18_4">120-129
                                                    </td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_5" value="2_5"
                                                        class="mr-1 skalapews pews_tds_18_5">130-139
                                                    </td>
                                                    <td class="center"><input type="radio" name="tds2"id="skalapews_18_6" value="3_6"
                                                        class="mr-1 skalapews pews_tds_18_6">> 140
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kesadaran</td>
                                                    <td class="center"><input type="radio" name="kesadaran2"id="skalapews_19_1" value="3_1"
                                                        class="mr-1 skalapews pews_kesadaran_19_1">P/U
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="kesadaran2"id="skalapews_19_2" value="1_2"
                                                        class="mr-1 skalapews pews_kesadaran_19_2">V
                                                    </td>
                                                    <td class="center"><input type="radio" name="kesadaran2"id="skalapews_19_3" value="0_3"
                                                        class="mr-1 skalapews pews_kesadaran_19_3">A
                                                    </td>
                                                    <td class="center"><input type="radio" name="kesadaran2"id="skalapews_19_4" value="1_4"
                                                        class="mr-1 skalapews pews_kesadaran_19_4">V
                                                    </td>
                                                    <td></td>
                                                    <td class="center"><input type="radio" name="kesadaran2"id="skalapews_19_5" value="3_5"
                                                        class="mr-1 skalapews pews_kesadaran_19_5">P/U
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>TOTAL</b></td>
                                                    <td colspan="7">
                                                        <input type="radio" name="total_skalapews"id="total_skalapews_1" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square"
                                                            style="color: green"></i><b>Hijau (0-2)</b>
                                                        <input type="radio" name="total_skalapews"id="total_skalapews_2" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square"
                                                            style="color: yellow"></i><b>Kuning (3-4)</b>
                                                        <input type="radio" name="total_skalapews"id="total_skalapews_3" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah
                                                            (≥5/3 Pada salah satu parameter)</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <table class="table table-sm table-striped table-bordered">                                       
                                        <thead>
                                            <tr>
                                                <th class="center" colspan="9" style="background-color: #B0E0E6; color: black;"><b>Respon / Tata Laksana EWS</b></th>
                                            </tr>
                                            <tr>
                                                <th width="5%"><b>Putih</b></th>
                                                <th width="1%" class="center"><b>:</b></th>
                                                <td width="80%"> Monitoring per shift</td>
                                            </tr>
                                            <tr>
                                                <th width="5%"><b>Hijau</b></th>
                                                <th width="1%" class="center"><b>:</b></th>
                                                <td width="80%"> Assesmen segera oleh perawat senior / katim, monitoring per 4-6 jam</td>
                                            </tr>
                                            <tr>
                                                <th width="5%"><b>Kuning</b></th>
                                                <th width="1%" class="center"><b>:</b></th>
                                                <td width="80%"> Assesmen segera oleh dokter jaga, monitoring per 1 jam konsultasi DPJP dan pertimbangan perawatan di HCU/ICU</td>
                                            </tr>
                                            <tr>
                                                <th width="5%"><b>Merah</b></th>
                                                <th width="1%" class="center"><b>:</b></th>
                                                <td width="80%"> Laporkan ke dokter jaga, lakukan resusitasi dan monitoring secara kontinyu Aktivasi Code Blue kegawatan medis (respon maksimal 10 menit) dan konsultasi DPJP Laporkan kondisi pasien ke keluarga dan rencanakan untuk pindah ke tingkat perawatan ruang ICU</td>
                                            </tr>
                                        </thead>
                                    </table>
                                    
                                    <table class="table table-sm table-striped table-bordered">                                       
                                        <thead>
                                            <tr>
                                                <td class="center" width="50%" style="background-color: #B0E0E6; color: black;"><b>Kode pencatatan status kesadaran</b></td>
                                                <td class="center" width="50%" style="background-color: #B0E0E6; color: black;"><b>Plebitis</b></td>
                                            </tr>
                                            <tr>
                                                <td>A = Alert (Sadar Penuh)</td>
                                                <td>0 : Tidak ada tanda Pelebitis</td>
                                            </tr>
                                            <tr>
                                                <td>C = Confusion (Kebingungan)</td>
                                                <td>1 : Merah atau sakit bila di tekan</td>
                                            </tr>
                                            <tr>
                                                <td>V = Verbal (respon dengan suara) Somnolen, dapat ditenangkan</td>
                                                <td>2 : Merah, sakit bila di tekan oedema </td>
                                            </tr>
                                            <tr>
                                                <td>P = Pain (respon dengan nyeri) Letargi, Gelisah, penurunan respon nyeri</td>
                                                <td>3 : Merah, sakit bila di tekan oedema dan vena mengeras</td>
                                            </tr>
                                            <tr>
                                                <td>U = Unrespon</td>
                                                <td>4 : Merah, sakit bila di tekan oedema, vena mengeras dan timbul pus</td>
                                            </tr>   
                                            <!-- <tr>
                                                <td></td>
                                                <td>
                                                    <img src="<?= resource_url() ?>images/attributes/puplis.png" alt="Puplis" class="img-fluid mx-auto d-block rounded shadow" style="width: 400px; height: 60px;">
                                                </td>
                                            </tr>                                          -->
                                        </thead>
                                    </table>

                                    <table class="table table-sm table-striped table-bordered">                                       
                                        <thead>
                                            <tr>
                                                <td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>GCS / EYE (E)</b></td>
                                                <td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>MOTORIK (M)</b></td>
                                                <td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>VERBAL (V)</b></td>
                                            </tr>
                                            <tr>
                                                <td>4 : Spontan</td>
                                                <td>6 : Mengikuti Perintah</td>
                                                <td>5 : Sadar, orientasi diri, waktu dan tempat</td>
                                            </tr>
                                            <tr>
                                                <td>3 : Atas Perintah</td>
                                                <td>5 : Melokalisasi Nyeri</td>
                                                <td>4 : Berbicara membingungkan</td>
                                            </tr>
                                            <tr>
                                                <td>2 : Dengan rangsangan nyeri</td>
                                                <td>4 : Gerakan menghindar</td>
                                                <td>3 : Kalimat tidak mempunyai arti</td>
                                            </tr>
                                            <tr>
                                                <td>1 : Tidak ada reaksi</td>
                                                <td>3 : Fleksi abnormal</td>
                                                <td>2 : Mengerang</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2 : Extensi abnormal</td>
                                                <td>1 : Tidak ada respon</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1 : Tidak ada respon</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            <!-- Monitoring Pasien MP AKHIR-->

                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriKeperawatanMonitoring()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
                <button type="button" class="btn btn-success hide" onclick="konfirmasiCetakMonitoring()" id="btn_cetak_monitoring"><i class="fas fa-fw fa-print mr-1"></i>Print</button>

            </div>
        </div>
    </div>
</div>
<!-- End Modal Entri Keperawatan -->

<!-- modal edit grafik monitoring -->
<div id="modal-edit-grafik-monitoring" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-grafik-monitoring-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Grafik Monitoring</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-grafik-monitoring'); ?>
                <table class="table table-sm table-striped table-bordered" id="table-edit-grafik-monitoring"> 
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="id-mp">
                            <input type="hidden" name="id_layanan_pendaftaran" id="edit-id-layanan-pendaftaran-mp">
                            <input type="hidden" name="id_pendaftaran" id="edit-id-pendaftaran-mp">
                            <td width="5%" class="center">Suhu</td>
                            <td width="10%"><input type="number" name="suhu_mp" id="edit-suhu-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">RR</td>                                                           
                            <td width="10%"><input type="number" name="rr_mp" id="edit-rr-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">Nadi</td> 
                            <td width="10%"><input type="number" name="nadi_mp" id="edit-nadi-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">Jam</td> 
                            <td width="10%"><input type="text" name="jam_mp" id="edit-jam-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">Tanggal</td> 
                            <td width="10%"><input type="text" name="tgl_mp" id="edit-tgl-mp"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="10%">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-info btn-xs" id="btn-update-grafik-monitoring">Update</button>
                                    <button type="button" class="btn btn-secondary btn-xxs edit-button ml-1" data-dismiss="modal" style="background-color: yellow; color: black;"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
                                </div>
                            </td>                                                   
                        </tr>  
                    </tbody>
                </table>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal edit grafik monitoring -->

<!-- // MPP-C 1 -->
<div id="modal-edit-monitoring-pasieen" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Monitoring Pasien</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-monitoring-pasieen'); ?>
                <input type="hidden" name="id" id="id-monitoring-pasieen">
                <div class="from-group">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-mpp">
                    <thead>
                        <tr>
                            <td colspan="12"><b></b>
                        </tr>
                        <tr>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Tekanan Darah</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Saturasi 02</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Terapi Oksigen</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Status Kesadaran</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Kategori EWS</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Pengawasan Infus/Plebitis</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Diit</th>
                        </tr>
                        <tr>                          
                            <td class="center"><input type="text" name="tdarah_mpp" id="tdarah-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"></td>
                            <td class="center"><input type="text" name="saturasi_mppp" id="saturasi-mppp-edit"class="custom-form clear-input d-inline-block col-lg-7"></td>
                            <td class="center"><input type="text" name="toksigen_mpp" id="toksigen-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"> LPM</td>
                            <td class="center"><input type="text" name="skesadaran_mpp" id="skesadaran-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"></td>
                            <td class="center"><input type="text" name="kategori_mpp" id="kategori-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"></td>                         
                            <td class="center"><input type="text" name="pengawasan_mpp" id="pengawasan-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"></td>
                            <td class="center"><input type="text" name="diit_mpp" id="diit-mpp-edit"class="custom-form clear-input d-inline-block col-lg-7"> CC</td>                             
                        </tr>
                        <tr>
                            <td colspan="12"><b>(Masuk)</b>
                        </tr>
                        <tr>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Oral</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">NGT</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Parenteral Line 1</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Parenteral Line 2</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Produk Darah</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Total Input</th>
                            <th class="center" style="background-color: #B0E0E6; color: black;">Tanggal</th>   
                            <th class="center" style="background-color: #B0E0E6; color: black;">Jam</th>               
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="12" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td class="center"><input type="number" name="oral_mpp" id="oral-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppmm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="ngt_mpp" id="ngt-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppmm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="paranteral_mpp" id="paranteral-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppmm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="paranteral_mppp" id="paranteral-mppp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppmm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="produk_mpp" id="produk-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppmm" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="text" name="input_mpp" id="input-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="text" name="tgl_mpp" id="tgl-mpp-edit"class="custom-form clear-input d-inline-block col-lg-10"></td> 
                            <td class="center"><input type="text" name="jam_mpp" id="jam-mpp-edit"class="custom-form clear-input d-inline-block col-lg-3"></td>
                        </tr>
                        <tr>
                            <td colspan="12"><b>(Keluar)</b>
                        </tr>
                            <tr>
                                <th class="center" style="background-color: #B0E0E6; color: black;">Urin</th>
                                <th class="center" style="background-color: #B0E0E6; color: black;">BAB</th>
                                <th class="center" style="background-color: #B0E0E6; color: black;">Gastrik</th>
                                <th class="center" style="background-color: #B0E0E6; color: black;">WSD/Drain</th>
                                <th class="center" style="background-color: #B0E0E6; color: black;">IWL</th>
                                <th class="center" style="background-color: #B0E0E6; color: black;">Total Output</th>                              
                                <th class="center" style="background-color: #B0E0E6; color: black;">(Balance Cairan)</th> 
                                <th class="center" style="background-color: #B0E0E6; color: black;">Perawat</th>
                            </tr>
                        <tr>
                            <td class="center"><input type="number" name="urin_mpp" id="urin-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppnn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="bab_mpp" id="bab-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5"> CC</td>
                            <td class="center"><input type="number" name="gastrik_mpp" id="gastrik-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppnn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="wsd_mpp" id="wsd-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppnn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="number" name="iwl_mpp" id="iwl-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5 ppnn" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="text" name="output_mpp" id="output-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="text" name="blance_cairan_mpp" id="blance-cairan-mpp-edit"class="custom-form clear-input d-inline-block col-lg-5" placeholder="" onkeypress="return hanyaAngka(event)"> CC</td>
                            <td class="center"><input type="text" name="perawat_mpp" id="perawat-mpp-edit"class="select2c-input ml-2"></td> 
                        </tr>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-mpp">
            </div>
        </div>
    </div>
</div>
<!-- // MPP-C -->