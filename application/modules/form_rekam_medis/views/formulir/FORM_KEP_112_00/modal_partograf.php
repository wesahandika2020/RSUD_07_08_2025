<!-- // PARTOGRAF --> 
<div class="modal fade" id="modal_partograf" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_partograf">FORM PARTOGRAF</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_partograf class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-partograf">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-partograf">
                <input type="hidden" name="id_pasien" id="id-pasien-partograf">
                <input type="hidden" name="id_partograf" id="id-partograf">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="bold">Nama Suami</td>
                                    <td wdith="80%">: <span id="nama-suami-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-partograf"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Agama</td>
                                    <td>: <span id="agama-partograf"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat-partograf"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-partograf">
                                <div class="form-partograf">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"id="btn-expand-all-partograf"><i
                                                    class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"id="btn-collapse-all-partograf"><i
                                                    class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>                                           
                                        </tr> 

                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse" data-target="#data-partograf"><i class="fas fa-expand mr-1"></i>Expand</button> PARTOGRAF
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-partograf">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>
                                                                        <td widtd="33%" class="center" style="background-color: #D3D3D3; color: black;"><b>PARTOGRAF</b></td>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>                  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td> <b>
                                                                            G : <input type="text" name="g_partograf" id="g-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> 
                                                                            P : <input type="text" name="p_partograf" id="p-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1 ml-2"> 
                                                                            A : <input type="text" name="a_partograf" id="a-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1 ml-2"> 
                                                                        </td>
                                                                        <td class="center"> <b>
                                                                            Hamil : <input type="text" name="hamil_partograf" id="hamil-partograf" class="custom-form clear-input d-inline-block col-lg-3 ml-1"> mgg
                                                                        </td>
                                                                        <td> <b> 
                                                                            Mulas teratur sejak tgl : <input type="date" name="tgl_mulas_partograf" id="tgl-mulas-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> 
                                                                            Pukul : <input type="text" name="pukul_mulas_partograf" id="pukul-mulas-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1 ml-2"> 
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> <b> 
                                                                            Masuk RS tgl : <input type="date" name="tgl_masuk_partograf" id="tgl-masuk-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> 
                                                                            Pukul : <input type="text" name="pukul_masuk_partograf" id="pukul-masuk-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1 ml-2"> 
                                                                        </td>
                                                                        <td class="center"> <b>TBJ : <input type="text" name="tbj_partograf" id="tbj-partograf" class="custom-form clear-input d-inline-block col-lg-3 ml-1"> Gram</td>
                                                                        <td> <b> 
                                                                            Ketuban Pecah sejak tgl : <input type="date" name="tgl_pecah_partograf" id="tgl-pecah-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> 
                                                                            Pukul : <input type="text" name="pukul_pecah_partograf" id="pukul-pecah-partograf" class="custom-form clear-input d-inline-block col-lg-3 mr-1 ml-2"> 
                                                                        </td> 
                                                                    </tr>                                                        
                                                                </tbody>                             
                                                            </table>

                                                             <!-- // GRAFIK PARTOGRAF  -->
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody> 
                                                                    <tr>  
                                                                        <td colspan="4">                                                                   
                                                                            <div class="collapse multi-collapse mt-2" id="data-partograf">                                      
                                                                                <div class="row">                                                                         
                                                                                    <div class="col-lg-12">
                                                                                        <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*"> 
                                                                                            <div class="card-body">
                                                                                                <div id="grafik_partograf"></div>
                                                                                                <div style="display: flex;justify-content: center;">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <table class="table table-sm table-striped table-bordered alatGrafik">                                                  
                                                                                            <tr>
                                                                                                <td width="10%" class="center">Denyut jantung janin (x/menit)</td>
                                                                                                <td width="10%"><input type="number" name="denyut_partograf" id="denyut-partograf"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                                                                <td width="10%" class="text-center">
                                                                                                    <button type="button" class="btn btn-success btn-xs" id="btn-partograf-chart">Tambah</button>
                                                                                                </td>                                                           
                                                                                            </tr>  
                                                                                        </table>
                                                                                        <div class="card">
                                                                                            <table class="table table-no-border table-sm table-striped" id="tabel-partograf">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>No</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Denyut jantung janin (x/menit)</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Nama Petugas</b></td>
                                                                                                        <td class="center alatGrafik" colspan="2" style="background-color: #D3D3D3; color: black;"><b>Alat</b></td>
                                                                                                    </tr>                                                       
                                                                                                </thead>
                                                                                                <tbody class="body-table">
                                                                                                </tbody>                                                                                                                                                                                   
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>  
                                                                                </div>
                                                                            </div> 
                                                                        </td>
                                                                    </tr>                                                     
                                                                </tbody>                             
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="25" style="background-color: #D3D3D3; color: black;"><b>Air Ketuban / Penyusupan</b></th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td style="white-space: nowrap;">
                                                                            <?php for ($i = 1; $i <= 32; $i++) : ?>
                                                                                <input type="text" name="air_ket_penyusupan_<?= $i ?>" id="air-ket-penyusupan-<?= $i ?>" class="custom-form clear-input" style="width: 37px; display: inline-block; margin-right: 2px;">
                                                                            <?php endfor; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="white-space: nowrap;">
                                                                            <?php for ($i = 1; $i <= 32; $i++) : ?>
                                                                                <input type="text" name="air_ketu_penyusupan_<?= $i ?>" id="air-ketu-penyusupan-<?= $i ?>" class="custom-form clear-input" style="width: 37px; display: inline-block; margin-right: 2px;">
                                                                            <?php endfor; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>                           
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>
                                                                        <td widtd="33%" class="center" style="background-color: #D3D3D3; color: black;"><b> TANGGAL & JAM GRAFIK SERVIKS</b></td>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>                  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td class="center"> <b>
                                                                            Tanggal : <input type="date" name="tgl_grafik_sk" id="tgl-grafik-sk" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> 
                                                                        </td>
                                                                        <td class="center"> <b> 
                                                                            Jam : <input type="text" name="jam_grafik_sk" id="jam-grafik-sk" class="custom-form clear-input d-inline-block col-lg-3"> 
                                                                        </td>
                                                                        <td> <b>
                                                                            Keterangan : <textarea name="keterangan_grafik_sk" cols="30" rows="5" class="form-control clear-input custom-textarea" id="keterangan-grafik-sk"></textarea>
                                                                        </td>
                                                                    </tr>                                                      
                                                                </tbody>                             
                                                            </table>
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tr>
                                                                    <td style="color: red; font-weight: bold;">
                                                                        Harap Diperhatikan Ketika Memilih Angka Pada Grafik Serviks
                                                                    </td>
                                                                </tr>
                                                            </table>


                                                            <!-- // GRAFIK SERVIKS  -->
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="10">
                                                                            <div class="collapse multi-collapse mt-2" id="data-partograf">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*">
                                                                                            <div class="card-body">
                                                                                                <div id="grafik_serviks"></div>
                                                                                                <div style="display: flex; justify-content: center;"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <table class="table table-sm table-striped table-bordered">
                                                                                            <tbody>                                                                      
                                                                                                <tr>
                                                                                                    <td class="center" width="10%">
                                                                                                        <b>Waktu (JAM)
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_1" id="waktujam-1" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_2" id="waktujam-2" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_3" id="waktujam-3" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_4" id="waktujam-4" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_5" id="waktujam-5" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_6" id="waktujam-6" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_7" id="waktujam-7" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_8" id="waktujam-8" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_9" id="waktujam-9" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td> 
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_10" id="waktujam-10" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_11" id="waktujam-11" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_12" id="waktujam-12" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_13" id="waktujam-13" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_14" id="waktujam-14" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_15" id="waktujam-15" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                    <td>
                                                                                                        <input type="text" name="waktujam_16" id="waktujam-16" class="custom-form clear-input d-inline-block col-lg-12"> 
                                                                                                    </td>  
                                                                                                </tr>    
                                                                                            </tbody>                             
                                                                                        </table>

                                                                                        <table class="table table-sm table-striped table-bordered alatGrafik">
                                                                                            <tr>
                                                                                                <td width="3%" class="center"><b>Pilih</td>
                                                                                                <td width="5%">
                                                                                                <select id="number-serviks" name="number_serviks" class="rounded-select">
                                                                                                    <option value="" disabled selected hidden>angka</option>
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="0.5">0.5</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="1.5">1.5</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="2.5">2.5</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="3.5">3.5</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="4.5">4.5</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="5.5">5.5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="6.5">6.5</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="7.5">7.5</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="8.5">8.5</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="9.5">9.5</option>
                                                                                                    <option value="10">10</option>
                                                                                                    <option value="10.5">10.5</option>
                                                                                                    <option value="11">11</option>
                                                                                                    <option value="11.5">11.5</option>
                                                                                                    <option value="12">12</option>
                                                                                                    <option value="12.5">12.5</option>
                                                                                                    <option value="13">13</option>
                                                                                                    <option value="13.5">13.5</option>
                                                                                                    <option value="14">14</option>
                                                                                                    <option value="14.5">14.5</option>
                                                                                                    <option value="15">15</option>
                                                                                                    <option value="15.5">15.5</option>
                                                                                                    <option value="16">16</option>
                                                                                                </select>                                                                                         
                                                                                                </td>
                                                                                                <td width="5%" class="center"><span style="color: red;"> <b>( X )</span></td>
                                                                                                <td width="5%">
                                                                                                    <input type="number" name="pembukaan_serviks" id="pembukaan-serviks" class="custom-form clear-input d-inline-block col-lg-10">
                                                                                                </td>
                                                                                                <td width="5%" class="center"><span style="color: blue;"> <b>( O )</span></td>
                                                                                                <td width="5%">
                                                                                                    <input type="number" name="kepala_serviks" id="kepala-serviks" class="custom-form clear-input d-inline-block col-lg-10">
                                                                                                </td>
                                                                                                <td width="10%" class="text-center">
                                                                                                    <button type="button" class="btn btn-success btn-xs" id="btn-serviks-chart">Tambah</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <div class="card">
                                                                                            <table class="table table-no-border table-sm table-striped" id="tabel-serviks">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>No</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Angka</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Pembukaan serviks(cm) beri tanda X</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Turunnya kepala (beri tanda O)</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Nama Petugas</b></td>
                                                                                                        <td class="center alatGrafik" colspan="2" style="background-color: #D3D3D3; color: black;" ><b>Alat</b></td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="body-table">
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

































                                                            <style>
                                                                input[type="checkbox"] {
                                                                    width: 12px; /* Atur ukuran checkbox */
                                                                    height: 12px;
                                                                    transform: scale(0.8); /* Mengecilkan ukuran */
                                                                    margin: 0.5px; /* Mengatur jarak antar checkbox */
                                                                }
                                                            </style>

                                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table class="table table-sm table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td width="10%" class="center"> kontraksi tiap 10 menit</td>
                                                                                    <td width="3%"></td>
                                                                                    <td width="1%">5</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_1">
                                                                                        <input type="checkbox" name="putih_1" id="putih_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'putih_1')">
                                                                                        <label for="putih_1"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_1" id="abu_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'abu_1')">
                                                                                        <label for="abu_1"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_1" id="hitam_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'hitam_1')">
                                                                                        <label for="hitam_1"></label>
                                                                                    </td>

                                                                                    <td width="2%" class="pattern-background" id="warna_2">
                                                                                        <input type="checkbox" name="putih_2" id="putih_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'putih_2')">
                                                                                        <label for="putih_2"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_2" id="abu_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'abu_2')">
                                                                                        <label for="abu_2"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_2" id="hitam_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'hitam_2')">
                                                                                        <label for="hitam_2"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_3">
                                                                                        <input type="checkbox" name="putih_3" id="putih_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'putih_3')">
                                                                                        <label for="putih_3"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_3" id="abu_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'abu_3')">
                                                                                        <label for="abu_3"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_3" id="hitam_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'hitam_3')">
                                                                                        <label for="hitam_3"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_4">
                                                                                        <input type="checkbox" name="putih_4" id="putih_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'putih_4')">
                                                                                        <label for="putih_4"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_4" id="abu_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'abu_4')">
                                                                                        <label for="abu_4"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_4" id="hitam_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'hitam_4')">
                                                                                        <label for="hitam_4"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_5">
                                                                                        <input type="checkbox" name="putih_5" id="putih_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'putih_5')">
                                                                                        <label for="putih_5"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_5" id="abu_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'abu_5')">
                                                                                        <label for="abu_5"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_5" id="hitam_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'hitam_5')">
                                                                                        <label for="hitam_5"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_6">
                                                                                        <input type="checkbox" name="putih_6" id="putih_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'putih_6')">
                                                                                        <label for="putih_6"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_6" id="abu_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'abu_6')">
                                                                                        <label for="abu_6"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_6" id="hitam_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'hitam_6')">
                                                                                        <label for="hitam_6"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_7">
                                                                                        <input type="checkbox" name="putih_7" id="putih_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'putih_7')">
                                                                                        <label for="putih_7"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_7" id="abu_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'abu_7')">
                                                                                        <label for="abu_7"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_7" id="hitam_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'hitam_7')">
                                                                                        <label for="hitam_7"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_8">
                                                                                        <input type="checkbox" name="putih_8" id="putih_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'putih_8')">
                                                                                        <label for="putih_8"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_8" id="abu_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'abu_8')">
                                                                                        <label for="abu_8"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_8" id="hitam_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'hitam_8')">
                                                                                        <label for="hitam_8"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_9">
                                                                                        <input type="checkbox" name="putih_9" id="putih_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'putih_9')">
                                                                                        <label for="putih_9"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_9" id="abu_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'abu_9')">
                                                                                        <label for="abu_9"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_9" id="hitam_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'hitam_9')">
                                                                                        <label for="hitam_9"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_10">
                                                                                        <input type="checkbox" name="putih_10" id="putih_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'putih_10')">
                                                                                        <label for="putih_10"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_10" id="abu_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'abu_10')">
                                                                                        <label for="abu_10"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_10" id="hitam_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'hitam_10')">
                                                                                        <label for="hitam_10"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_11">
                                                                                        <input type="checkbox" name="putih_11" id="putih_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'putih_11')">
                                                                                        <label for="putih_11"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_11" id="abu_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'abu_11')">
                                                                                        <label for="abu_11"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_11" id="hitam_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'hitam_11')">
                                                                                        <label for="hitam_11"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_12">
                                                                                        <input type="checkbox" name="putih_12" id="putih_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'putih_12')">
                                                                                        <label for="putih_12"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_12" id="abu_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'abu_12')">
                                                                                        <label for="abu_12"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_12" id="hitam_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'hitam_12')">
                                                                                        <label for="hitam_12"></label>
                                                                                    </td>  


                                                                                    <td width="2%" class="pattern-background" id="warna_13">
                                                                                        <input type="checkbox" name="putih_13" id="putih_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'putih_13')">
                                                                                        <label for="putih_13"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_13" id="abu_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'abu_13')">
                                                                                        <label for="abu_13"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_13" id="hitam_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'hitam_13')">
                                                                                        <label for="hitam_13"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_14">
                                                                                        <input type="checkbox" name="putih_14" id="putih_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'putih_14')">
                                                                                        <label for="putih_14"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_14" id="abu_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'abu_14')">
                                                                                        <label for="abu_14"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_14" id="hitam_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'hitam_14')">
                                                                                        <label for="hitam_14"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_15">
                                                                                        <input type="checkbox" name="putih_15" id="putih_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'putih_15')">
                                                                                        <label for="putih_15"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_15" id="abu_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'abu_15')">
                                                                                        <label for="abu_15"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_15" id="hitam_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'hitam_15')">
                                                                                        <label for="hitam_15"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_16">
                                                                                        <input type="checkbox" name="putih_16" id="putih_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'putih_16')">
                                                                                        <label for="putih_16"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_16" id="abu_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'abu_16')">
                                                                                        <label for="abu_16"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_16" id="hitam_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'hitam_16')">
                                                                                        <label for="hitam_16"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_17">
                                                                                        <input type="checkbox" name="putih_17" id="putih_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'putih_17')">
                                                                                        <label for="putih_17"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_17" id="abu_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'abu_17')">
                                                                                        <label for="abu_17"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_17" id="hitam_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'hitam_17')">
                                                                                        <label for="hitam_17"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_18">
                                                                                        <input type="checkbox" name="putih_18" id="putih_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'putih_18')">
                                                                                        <label for="putih_18"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_18" id="abu_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'abu_18')">
                                                                                        <label for="abu_18"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_18" id="hitam_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'hitam_18')">
                                                                                        <label for="hitam_18"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_19">
                                                                                        <input type="checkbox" name="putih_19" id="putih_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'putih_19')">
                                                                                        <label for="putih_19"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_19" id="abu_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'abu_19')">
                                                                                        <label for="abu_19"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_19" id="hitam_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'hitam_19')">
                                                                                        <label for="hitam_19"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_20">
                                                                                        <input type="checkbox" name="putih_20" id="putih_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'putih_20')">
                                                                                        <label for="putih_20"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_20" id="abu_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'abu_20')">
                                                                                        <label for="abu_20"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_20" id="hitam_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'hitam_20')">
                                                                                        <label for="hitam_20"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_21">
                                                                                        <input type="checkbox" name="putih_21" id="putih_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'putih_21')">
                                                                                        <label for="putih_21"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_21" id="abu_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'abu_21')">
                                                                                        <label for="abu_21"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_21" id="hitam_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'hitam_21')">
                                                                                        <label for="hitam_21"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_22">
                                                                                        <input type="checkbox" name="putih_22" id="putih_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'putih_22')">
                                                                                        <label for="putih_22"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_22" id="abu_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'abu_22')">
                                                                                        <label for="abu_22"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_22" id="hitam_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'hitam_22')">
                                                                                        <label for="hitam_22"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_23">
                                                                                        <input type="checkbox" name="putih_23" id="putih_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'putih_23')">
                                                                                        <label for="putih_23"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_23" id="abu_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'abu_23')">
                                                                                        <label for="abu_23"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_23" id="hitam_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'hitam_23')">
                                                                                        <label for="hitam_23"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_24">
                                                                                        <input type="checkbox" name="putih_24" id="putih_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'putih_24')">
                                                                                        <label for="putih_24"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_24" id="abu_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'abu_24')">
                                                                                        <label for="abu_24"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_24" id="hitam_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'hitam_24')">
                                                                                        <label for="hitam_24"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_25">
                                                                                        <input type="checkbox" name="putih_25" id="putih_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'putih_25')">
                                                                                        <label for="putih_25"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_25" id="abu_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'abu_25')">
                                                                                        <label for="abu_25"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_25" id="hitam_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'hitam_25')">
                                                                                        <label for="hitam_25"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_26">
                                                                                        <input type="checkbox" name="putih_26" id="putih_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'putih_26')">
                                                                                        <label for="putih_26"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_26" id="abu_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'abu_26')">
                                                                                        <label for="abu_26"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_26" id="hitam_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'hitam_26')">
                                                                                        <label for="hitam_26"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_27">
                                                                                        <input type="checkbox" name="putih_27" id="putih_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'putih_27')">
                                                                                        <label for="putih_27"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_27" id="abu_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'abu_27')">
                                                                                        <label for="abu_27"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_27" id="hitam_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'hitam_27')">
                                                                                        <label for="hitam_27"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_28">
                                                                                        <input type="checkbox" name="putih_28" id="putih_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'putih_28')">
                                                                                        <label for="putih_28"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_28" id="abu_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'abu_28')">
                                                                                        <label for="abu_28"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_28" id="hitam_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'hitam_28')">
                                                                                        <label for="hitam_28"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_29">
                                                                                        <input type="checkbox" name="putih_29" id="putih_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'putih_29')">
                                                                                        <label for="putih_29"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_29" id="abu_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'abu_29')">
                                                                                        <label for="abu_29"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_29" id="hitam_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'hitam_29')">
                                                                                        <label for="hitam_29"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_30">
                                                                                        <input type="checkbox" name="putih_30" id="putih_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'putih_30')">
                                                                                        <label for="putih_30"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_30" id="abu_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'abu_30')">
                                                                                        <label for="abu_30"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_30" id="hitam_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'hitam_30')">
                                                                                        <label for="hitam_30"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_31">
                                                                                        <input type="checkbox" name="putih_31" id="putih_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'putih_31')">
                                                                                        <label for="putih_31"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_31" id="abu_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'abu_31')">
                                                                                        <label for="abu_31"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_31" id="hitam_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'hitam_31')">
                                                                                        <label for="hitam_31"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_32">
                                                                                        <input type="checkbox" name="putih_32" id="putih_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'putih_32')">
                                                                                        <label for="putih_32"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_32" id="abu_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'abu_32')">
                                                                                        <label for="abu_32"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_32" id="hitam_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'hitam_32')">
                                                                                        <label for="hitam_32"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                                                                </tr>
                                                                            </thead>



                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="10%" class="center"></td>
                                                                                    <td width="3%" class="center"></td>
                                                                                    <td width="1%">4</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_33">
                                                                                        <input type="checkbox" name="putih_33" id="putih_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'putih_33')">
                                                                                        <label for="putih_33"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_33" id="abu_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'abu_33')">
                                                                                        <label for="abu_33"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_33" id="hitam_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'hitam_33')">
                                                                                        <label for="hitam_33"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_34">
                                                                                        <input type="checkbox" name="putih_34" id="putih_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'putih_34')">
                                                                                        <label for="putih_34"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_34" id="abu_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'abu_34')">
                                                                                        <label for="abu_34"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_34" id="hitam_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'hitam_34')">
                                                                                        <label for="hitam_34"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_35">
                                                                                        <input type="checkbox" name="putih_35" id="putih_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'putih_35')">
                                                                                        <label for="putih_35"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_35" id="abu_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'abu_35')">
                                                                                        <label for="abu_35"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_35" id="hitam_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'hitam_35')">
                                                                                        <label for="hitam_35"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_36">
                                                                                        <input type="checkbox" name="putih_36" id="putih_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'putih_36')">
                                                                                        <label for="putih_36"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_36" id="abu_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'abu_36')">
                                                                                        <label for="abu_36"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_36" id="hitam_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'hitam_36')">
                                                                                        <label for="hitam_36"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_37">
                                                                                        <input type="checkbox" name="putih_37" id="putih_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'putih_37')">
                                                                                        <label for="putih_37"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_37" id="abu_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'abu_37')">
                                                                                        <label for="abu_37"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_37" id="hitam_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'hitam_37')">
                                                                                        <label for="hitam_37"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_38">
                                                                                        <input type="checkbox" name="putih_38" id="putih_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'putih_38')">
                                                                                        <label for="putih_38"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_38" id="abu_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'abu_38')">
                                                                                        <label for="abu_38"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_38" id="hitam_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'hitam_38')">
                                                                                        <label for="hitam_38"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_39">
                                                                                        <input type="checkbox" name="putih_39" id="putih_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'putih_39')">
                                                                                        <label for="putih_39"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_39" id="abu_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'abu_39')">
                                                                                        <label for="abu_39"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_39" id="hitam_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'hitam_39')">
                                                                                        <label for="hitam_39"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_40">
                                                                                        <input type="checkbox" name="putih_40" id="putih_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'putih_40')">
                                                                                        <label for="putih_40"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_40" id="abu_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'abu_40')">
                                                                                        <label for="abu_40"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_40" id="hitam_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'hitam_40')">
                                                                                        <label for="hitam_40"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_41">
                                                                                        <input type="checkbox" name="putih_41" id="putih_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'putih_41')">
                                                                                        <label for="putih_41"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_41" id="abu_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'abu_41')">
                                                                                        <label for="abu_41"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_41" id="hitam_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'hitam_41')">
                                                                                        <label for="hitam_41"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_42">
                                                                                        <input type="checkbox" name="putih_42" id="putih_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'putih_42')">
                                                                                        <label for="putih_42"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_42" id="abu_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'abu_42')">
                                                                                        <label for="abu_42"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_42" id="hitam_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'hitam_42')">
                                                                                        <label for="hitam_42"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_43">
                                                                                        <input type="checkbox" name="putih_43" id="putih_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'putih_43')">
                                                                                        <label for="putih_43"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_43" id="abu_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'abu_43')">
                                                                                        <label for="abu_43"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_43" id="hitam_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'hitam_43')">
                                                                                        <label for="hitam_43"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_44">
                                                                                        <input type="checkbox" name="putih_44" id="putih_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'putih_44')">
                                                                                        <label for="putih_44"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_44" id="abu_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'abu_44')">
                                                                                        <label for="abu_44"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_44" id="hitam_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'hitam_44')">
                                                                                        <label for="hitam_44"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_45">
                                                                                        <input type="checkbox" name="putih_45" id="putih_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'putih_45')">
                                                                                        <label for="putih_45"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_45" id="abu_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'abu_45')">
                                                                                        <label for="abu_45"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_45" id="hitam_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'hitam_45')">
                                                                                        <label for="hitam_45"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_46">
                                                                                        <input type="checkbox" name="putih_46" id="putih_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'putih_46')">
                                                                                        <label for="putih_46"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_46" id="abu_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'abu_46')">
                                                                                        <label for="abu_46"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_46" id="hitam_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'hitam_46')">
                                                                                        <label for="hitam_46"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_47">
                                                                                        <input type="checkbox" name="putih_47" id="putih_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'putih_47')">
                                                                                        <label for="putih_47"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_47" id="abu_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'abu_47')">
                                                                                        <label for="abu_47"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_47" id="hitam_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'hitam_47')">
                                                                                        <label for="hitam_47"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_48">
                                                                                        <input type="checkbox" name="putih_48" id="putih_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'putih_48')">
                                                                                        <label for="putih_48"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_48" id="abu_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'abu_48')">
                                                                                        <label for="abu_48"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_48" id="hitam_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'hitam_48')">
                                                                                        <label for="hitam_48"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_49">
                                                                                        <input type="checkbox" name="putih_49" id="putih_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'putih_49')">
                                                                                        <label for="putih_49"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_49" id="abu_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'abu_49')">
                                                                                        <label for="abu_49"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_49" id="hitam_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'hitam_49')">
                                                                                        <label for="hitam_49"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_50">
                                                                                        <input type="checkbox" name="putih_50" id="putih_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'putih_50')">
                                                                                        <label for="putih_50"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_50" id="abu_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'abu_50')">
                                                                                        <label for="abu_50"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_50" id="hitam_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'hitam_50')">
                                                                                        <label for="hitam_50"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_51">
                                                                                        <input type="checkbox" name="putih_51" id="putih_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'putih_51')">
                                                                                        <label for="putih_51"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_51" id="abu_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'abu_51')">
                                                                                        <label for="abu_51"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_51" id="hitam_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'hitam_51')">
                                                                                        <label for="hitam_51"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_52">
                                                                                        <input type="checkbox" name="putih_52" id="putih_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'putih_52')">
                                                                                        <label for="putih_52"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_52" id="abu_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'abu_52')">
                                                                                        <label for="abu_52"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_52" id="hitam_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'hitam_52')">
                                                                                        <label for="hitam_52"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_53">
                                                                                        <input type="checkbox" name="putih_53" id="putih_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'putih_53')">
                                                                                        <label for="putih_53"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_53" id="abu_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'abu_53')">
                                                                                        <label for="abu_53"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_53" id="hitam_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'hitam_53')">
                                                                                        <label for="hitam_53"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_54">
                                                                                        <input type="checkbox" name="putih_54" id="putih_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'putih_54')">
                                                                                        <label for="putih_54"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_54" id="abu_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'abu_54')">
                                                                                        <label for="abu_54"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_54" id="hitam_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'hitam_54')">
                                                                                        <label for="hitam_54"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_55">
                                                                                        <input type="checkbox" name="putih_55" id="putih_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'putih_55')">
                                                                                        <label for="putih_55"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_55" id="abu_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'abu_55')">
                                                                                        <label for="abu_55"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_55" id="hitam_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'hitam_55')">
                                                                                        <label for="hitam_55"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_56">
                                                                                        <input type="checkbox" name="putih_56" id="putih_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'putih_56')">
                                                                                        <label for="putih_56"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_56" id="abu_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'abu_56')">
                                                                                        <label for="abu_56"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_56" id="hitam_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'hitam_56')">
                                                                                        <label for="hitam_56"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_57">
                                                                                        <input type="checkbox" name="putih_57" id="putih_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'putih_57')">
                                                                                        <label for="putih_57"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_57" id="abu_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'abu_57')">
                                                                                        <label for="abu_57"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_57" id="hitam_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'hitam_57')">
                                                                                        <label for="hitam_57"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_58">
                                                                                        <input type="checkbox" name="putih_58" id="putih_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'putih_58')">
                                                                                        <label for="putih_58"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_58" id="abu_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'abu_58')">
                                                                                        <label for="abu_58"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_58" id="hitam_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'hitam_58')">
                                                                                        <label for="hitam_58"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_59">
                                                                                        <input type="checkbox" name="putih_59" id="putih_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'putih_59')">
                                                                                        <label for="putih_59"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_59" id="abu_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'abu_59')">
                                                                                        <label for="abu_59"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_59" id="hitam_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'hitam_59')">
                                                                                        <label for="hitam_59"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_60">
                                                                                        <input type="checkbox" name="putih_60" id="putih_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'putih_60')">
                                                                                        <label for="putih_60"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_60" id="abu_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'abu_60')">
                                                                                        <label for="abu_60"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_60" id="hitam_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'hitam_60')">
                                                                                        <label for="hitam_60"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_61">
                                                                                        <input type="checkbox" name="putih_61" id="putih_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'putih_61')">
                                                                                        <label for="putih_61"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_61" id="abu_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'abu_61')">
                                                                                        <label for="abu_61"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_61" id="hitam_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'hitam_61')">
                                                                                        <label for="hitam_61"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_62">
                                                                                        <input type="checkbox" name="putih_62" id="putih_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'putih_62')">
                                                                                        <label for="putih_62"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_62" id="abu_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'abu_62')">
                                                                                        <label for="abu_62"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_62" id="hitam_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'hitam_62')">
                                                                                        <label for="hitam_62"></label>
                                                                                    </td> 
                                                                                    <td width="2%" class="pattern-background" id="warna_63">
                                                                                        <input type="checkbox" name="putih_63" id="putih_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'putih_63')">
                                                                                        <label for="putih_63"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_63" id="abu_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'abu_63')">
                                                                                        <label for="abu_63"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_63" id="hitam_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'hitam_63')">
                                                                                        <label for="hitam_63"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_64">
                                                                                        <input type="checkbox" name="putih_64" id="putih_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'putih_64')">
                                                                                        <label for="putih_64"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_64" id="abu_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'abu_64')">
                                                                                        <label for="abu_64"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_64" id="hitam_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'hitam_64')">
                                                                                        <label for="hitam_64"></label>
                                                                                    </td>
                                                                                </tr>



                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background:
                                                                                        radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
                                                                                        background-size: 5px 5px;">
                                                                                    </td>
                                                                                    <td width="3%" class="center"> < 20</td>
                                                                                    <td width="1%">3</td>
                                                                                                                                                                                                                                      
                                                                                    <td width="2%" class="pattern-background" id="warna_65">
                                                                                        <input type="checkbox" name="putih_65" id="putih_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'putih_65')">
                                                                                        <label for="putih_65"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_65" id="abu_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'abu_65')">
                                                                                        <label for="abu_65"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_65" id="hitam_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'hitam_65')">
                                                                                        <label for="hitam_65"></label>
                                                                                    </td> 
                                                                                    <td width="2%" class="pattern-background" id="warna_66">
                                                                                        <input type="checkbox" name="putih_66" id="putih_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'putih_66')">
                                                                                        <label for="putih_66"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_66" id="abu_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'abu_66')">
                                                                                        <label for="abu_66"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_66" id="hitam_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'hitam_66')">
                                                                                        <label for="hitam_66"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_67">
                                                                                        <input type="checkbox" name="putih_67" id="putih_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'putih_67')">
                                                                                        <label for="putih_67"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_67" id="abu_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'abu_67')">
                                                                                        <label for="abu_67"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_67" id="hitam_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'hitam_67')">
                                                                                        <label for="hitam_67"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_68">
                                                                                        <input type="checkbox" name="putih_68" id="putih_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'putih_68')">
                                                                                        <label for="putih_68"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_68" id="abu_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'abu_68')">
                                                                                        <label for="abu_68"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_68" id="hitam_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'hitam_68')">
                                                                                        <label for="hitam_68"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_69">
                                                                                        <input type="checkbox" name="putih_69" id="putih_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'putih_69')">
                                                                                        <label for="putih_69"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_69" id="abu_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'abu_69')">
                                                                                        <label for="abu_69"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_69" id="hitam_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'hitam_69')">
                                                                                        <label for="hitam_69"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_70">
                                                                                        <input type="checkbox" name="putih_70" id="putih_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'putih_70')">
                                                                                        <label for="putih_70"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_70" id="abu_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'abu_70')">
                                                                                        <label for="abu_70"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_70" id="hitam_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'hitam_70')">
                                                                                        <label for="hitam_70"></label>
                                                                                    </td>                                                                           
                                                                                    <td width="2%" class="pattern-background" id="warna_71">
                                                                                        <input type="checkbox" name="putih_71" id="putih_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'putih_71')">
                                                                                        <label for="putih_71"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_71" id="abu_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'abu_71')">
                                                                                        <label for="abu_71"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_71" id="hitam_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'hitam_71')">
                                                                                        <label for="hitam_71"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_72">
                                                                                        <input type="checkbox" name="putih_72" id="putih_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'putih_72')">
                                                                                        <label for="putih_72"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_72" id="abu_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'abu_72')">
                                                                                        <label for="abu_72"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_72" id="hitam_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'hitam_72')">
                                                                                        <label for="hitam_72"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_73">
                                                                                        <input type="checkbox" name="putih_73" id="putih_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'putih_73')">
                                                                                        <label for="putih_73"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_73" id="abu_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'abu_73')">
                                                                                        <label for="abu_73"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_73" id="hitam_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'hitam_73')">
                                                                                        <label for="hitam_73"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_74">
                                                                                        <input type="checkbox" name="putih_74" id="putih_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'putih_74')">
                                                                                        <label for="putih_74"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_74" id="abu_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'abu_74')">
                                                                                        <label for="abu_74"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_74" id="hitam_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'hitam_74')">
                                                                                        <label for="hitam_74"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_75">
                                                                                        <input type="checkbox" name="putih_75" id="putih_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'putih_75')">
                                                                                        <label for="putih_75"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_75" id="abu_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'abu_75')">
                                                                                        <label for="abu_75"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_75" id="hitam_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'hitam_75')">
                                                                                        <label for="hitam_75"></label>
                                                                                    </td> 
                                                                                    <td width="2%" class="pattern-background" id="warna_76">
                                                                                        <input type="checkbox" name="putih_76" id="putih_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'putih_76')">
                                                                                        <label for="putih_76"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_76" id="abu_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'abu_76')">
                                                                                        <label for="abu_76"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_76" id="hitam_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'hitam_76')">
                                                                                        <label for="hitam_76"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_77">
                                                                                        <input type="checkbox" name="putih_77" id="putih_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'putih_77')">
                                                                                        <label for="putih_77"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_77" id="abu_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'abu_77')">
                                                                                        <label for="abu_77"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_77" id="hitam_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'hitam_77')">
                                                                                        <label for="hitam_77"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_78">
                                                                                        <input type="checkbox" name="putih_78" id="putih_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'putih_78')">
                                                                                        <label for="putih_78"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_78" id="abu_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'abu_78')">
                                                                                        <label for="abu_78"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_78" id="hitam_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'hitam_78')">
                                                                                        <label for="hitam_78"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_79">
                                                                                        <input type="checkbox" name="putih_79" id="putih_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'putih_79')">
                                                                                        <label for="putih_79"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_79" id="abu_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'abu_79')">
                                                                                        <label for="abu_79"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_79" id="hitam_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'hitam_79')">
                                                                                        <label for="hitam_79"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_80">
                                                                                        <input type="checkbox" name="putih_80" id="putih_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'putih_80')">
                                                                                        <label for="putih_80"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_80" id="abu_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'abu_80')">
                                                                                        <label for="abu_80"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_80" id="hitam_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'hitam_80')">
                                                                                        <label for="hitam_80"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_81">
                                                                                        <input type="checkbox" name="putih_81" id="putih_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'putih_81')">
                                                                                        <label for="putih_81"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_81" id="abu_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'abu_81')">
                                                                                        <label for="abu_81"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_81" id="hitam_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'hitam_81')">
                                                                                        <label for="hitam_81"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_82">
                                                                                        <input type="checkbox" name="putih_82" id="putih_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'putih_82')">
                                                                                        <label for="putih_82"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_82" id="abu_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'abu_82')">
                                                                                        <label for="abu_82"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_82" id="hitam_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'hitam_82')">
                                                                                        <label for="hitam_82"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_83">
                                                                                        <input type="checkbox" name="putih_83" id="putih_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'putih_83')">
                                                                                        <label for="putih_83"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_83" id="abu_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'abu_83')">
                                                                                        <label for="abu_83"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_83" id="hitam_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'hitam_83')">
                                                                                        <label for="hitam_83"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_84">
                                                                                        <input type="checkbox" name="putih_84" id="putih_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'putih_84')">
                                                                                        <label for="putih_84"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_84" id="abu_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'abu_84')">
                                                                                        <label for="abu_84"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_84" id="hitam_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'hitam_84')">
                                                                                        <label for="hitam_84"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_85">
                                                                                        <input type="checkbox" name="putih_85" id="putih_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'putih_85')">
                                                                                        <label for="putih_85"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_85" id="abu_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'abu_85')">
                                                                                        <label for="abu_85"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_85" id="hitam_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'hitam_85')">
                                                                                        <label for="hitam_85"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_86">
                                                                                        <input type="checkbox" name="putih_86" id="putih_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'putih_86')">
                                                                                        <label for="putih_86"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_86" id="abu_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'abu_86')">
                                                                                        <label for="abu_86"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_86" id="hitam_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'hitam_86')">
                                                                                        <label for="hitam_86"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_87">
                                                                                        <input type="checkbox" name="putih_87" id="putih_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'putih_87')">
                                                                                        <label for="putih_87"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_87" id="abu_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'abu_87')">
                                                                                        <label for="abu_87"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_87" id="hitam_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'hitam_87')">
                                                                                        <label for="hitam_87"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_88">
                                                                                        <input type="checkbox" name="putih_88" id="putih_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'putih_88')">
                                                                                        <label for="putih_88"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_88" id="abu_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'abu_88')">
                                                                                        <label for="abu_88"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_88" id="hitam_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'hitam_88')">
                                                                                        <label for="hitam_88"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_89">
                                                                                        <input type="checkbox" name="putih_89" id="putih_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'putih_89')">
                                                                                        <label for="putih_89"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_89" id="abu_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'abu_89')">
                                                                                        <label for="abu_89"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_89" id="hitam_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'hitam_89')">
                                                                                        <label for="hitam_89"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_90">
                                                                                        <input type="checkbox" name="putih_90" id="putih_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'putih_90')">
                                                                                        <label for="putih_90"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_90" id="abu_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'abu_90')">
                                                                                        <label for="abu_90"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_90" id="hitam_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'hitam_90')">
                                                                                        <label for="hitam_90"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_91">
                                                                                        <input type="checkbox" name="putih_91" id="putih_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'putih_91')">
                                                                                        <label for="putih_91"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_91" id="abu_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'abu_91')">
                                                                                        <label for="abu_91"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_91" id="hitam_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'hitam_91')">
                                                                                        <label for="hitam_91"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_92">
                                                                                        <input type="checkbox" name="putih_92" id="putih_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'putih_92')">
                                                                                        <label for="putih_92"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_92" id="abu_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'abu_92')">
                                                                                        <label for="abu_92"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_92" id="hitam_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'hitam_92')">
                                                                                        <label for="hitam_92"></label>
                                                                                        <td width="2%" class="pattern-background" id="warna_93">
                                                                                        <input type="checkbox" name="putih_93" id="putih_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'putih_93')">
                                                                                        <label for="putih_93"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_93" id="abu_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'abu_93')">
                                                                                        <label for="abu_93"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_93" id="hitam_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'hitam_93')">
                                                                                        <label for="hitam_93"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_94">
                                                                                        <input type="checkbox" name="putih_94" id="putih_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'putih_94')">
                                                                                        <label for="putih_94"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_94" id="abu_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'abu_94')">
                                                                                        <label for="abu_94"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_94" id="hitam_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'hitam_94')">
                                                                                        <label for="hitam_94"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_95">
                                                                                        <input type="checkbox" name="putih_95" id="putih_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'putih_95')">
                                                                                        <label for="putih_95"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_95" id="abu_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'abu_95')">
                                                                                        <label for="abu_95"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_95" id="hitam_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'hitam_95')">
                                                                                        <label for="hitam_95"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_96">
                                                                                        <input type="checkbox" name="putih_96" id="putih_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'putih_96')">
                                                                                        <label for="putih_96"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_96" id="abu_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'abu_96')">
                                                                                        <label for="abu_96"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_96" id="hitam_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'hitam_96')">
                                                                                        <label for="hitam_96"></label>
                                                                                    </td>  
                                                                                    </td>                                                  
                                                                                </tr>




                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background:
                                                                                        linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
                                                                                        background-size: 10px 10px;">
                                                                                    </td>
                                                                                    <td width="3%" class="center"> 20-40 </td>
                                                                                    <td width="1%">2</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                                                                    <td width="2%" class="pattern-background" id="warna_97">
                                                                                        <input type="checkbox" name="putih_97" id="putih_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'putih_97')">
                                                                                        <label for="putih_97"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_97" id="abu_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'abu_97')">
                                                                                        <label for="abu_97"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_97" id="hitam_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'hitam_97')">
                                                                                        <label for="hitam_97"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_98">
                                                                                        <input type="checkbox" name="putih_98" id="putih_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'putih_98')">
                                                                                        <label for="putih_98"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_98" id="abu_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'abu_98')">
                                                                                        <label for="abu_98"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_98" id="hitam_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'hitam_98')">
                                                                                        <label for="hitam_98"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_99">
                                                                                        <input type="checkbox" name="putih_99" id="putih_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'putih_99')">
                                                                                        <label for="putih_99"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_99" id="abu_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'abu_99')">
                                                                                        <label for="abu_99"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_99" id="hitam_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'hitam_99')">
                                                                                        <label for="hitam_99"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_100">
                                                                                        <input type="checkbox" name="putih_100" id="putih_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'putih_100')">
                                                                                        <label for="putih_100"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_100" id="abu_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'abu_100')">
                                                                                        <label for="abu_100"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_100" id="hitam_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'hitam_100')">
                                                                                        <label for="hitam_100"></label>
                                                                                    </td>                                                                                                                                                 
                                                                                    <td width="2%" class="pattern-background" id="warna_101">
                                                                                        <input type="checkbox" name="putih_101" id="putih_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'putih_101')">
                                                                                        <label for="putih_101"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_101" id="abu_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'abu_101')">
                                                                                        <label for="abu_101"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_101" id="hitam_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'hitam_101')">
                                                                                        <label for="hitam_101"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_102">
                                                                                        <input type="checkbox" name="putih_102" id="putih_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'putih_102')">
                                                                                        <label for="putih_102"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_102" id="abu_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'abu_102')">
                                                                                        <label for="abu_102"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_102" id="hitam_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'hitam_102')">
                                                                                        <label for="hitam_102"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_103">
                                                                                        <input type="checkbox" name="putih_103" id="putih_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'putih_103')">
                                                                                        <label for="putih_103"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_103" id="abu_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'abu_103')">
                                                                                        <label for="abu_103"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_103" id="hitam_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'hitam_103')">
                                                                                        <label for="hitam_103"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_104">
                                                                                        <input type="checkbox" name="putih_104" id="putih_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'putih_104')">
                                                                                        <label for="putih_104"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_104" id="abu_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'abu_104')">
                                                                                        <label for="abu_104"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_104" id="hitam_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'hitam_104')">
                                                                                        <label for="hitam_104"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_105">
                                                                                        <input type="checkbox" name="putih_105" id="putih_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'putih_105')">
                                                                                        <label for="putih_105"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_105" id="abu_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'abu_105')">
                                                                                        <label for="abu_105"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_105" id="hitam_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'hitam_105')">
                                                                                        <label for="hitam_105"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_106">
                                                                                        <input type="checkbox" name="putih_106" id="putih_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'putih_106')">
                                                                                        <label for="putih_106"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_106" id="abu_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'abu_106')">
                                                                                        <label for="abu_106"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_106" id="hitam_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'hitam_106')">
                                                                                        <label for="hitam_106"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_107">
                                                                                        <input type="checkbox" name="putih_107" id="putih_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'putih_107')">
                                                                                        <label for="putih_107"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_107" id="abu_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'abu_107')">
                                                                                        <label for="abu_107"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_107" id="hitam_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'hitam_107')">
                                                                                        <label for="hitam_107"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_108">
                                                                                        <input type="checkbox" name="putih_108" id="putih_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'putih_108')">
                                                                                        <label for="putih_108"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_108" id="abu_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'abu_108')">
                                                                                        <label for="abu_108"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_108" id="hitam_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'hitam_108')">
                                                                                        <label for="hitam_108"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_109">
                                                                                        <input type="checkbox" name="putih_109" id="putih_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'putih_109')">
                                                                                        <label for="putih_109"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_109" id="abu_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'abu_109')">
                                                                                        <label for="abu_109"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_109" id="hitam_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'hitam_109')">
                                                                                        <label for="hitam_109"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_110">
                                                                                        <input type="checkbox" name="putih_110" id="putih_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'putih_110')">
                                                                                        <label for="putih_110"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_110" id="abu_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'abu_110')">
                                                                                        <label for="abu_110"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_110" id="hitam_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'hitam_110')">
                                                                                        <label for="hitam_110"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_111">
                                                                                        <input type="checkbox" name="putih_111" id="putih_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'putih_111')">
                                                                                        <label for="putih_111"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_111" id="abu_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'abu_111')">
                                                                                        <label for="abu_111"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_111" id="hitam_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'hitam_111')">
                                                                                        <label for="hitam_111"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_112">
                                                                                        <input type="checkbox" name="putih_112" id="putih_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'putih_112')">
                                                                                        <label for="putih_112"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_112" id="abu_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'abu_112')">
                                                                                        <label for="abu_112"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_112" id="hitam_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'hitam_112')">
                                                                                        <label for="hitam_112"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_113">
                                                                                        <input type="checkbox" name="putih_113" id="putih_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'putih_113')">
                                                                                        <label for="putih_113"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_113" id="abu_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'abu_113')">
                                                                                        <label for="abu_113"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_113" id="hitam_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'hitam_113')">
                                                                                        <label for="hitam_113"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_114">
                                                                                        <input type="checkbox" name="putih_114" id="putih_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'putih_114')">
                                                                                        <label for="putih_114"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_114" id="abu_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'abu_114')">
                                                                                        <label for="abu_114"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_114" id="hitam_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'hitam_114')">
                                                                                        <label for="hitam_114"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_115">
                                                                                        <input type="checkbox" name="putih_115" id="putih_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'putih_115')">
                                                                                        <label for="putih_115"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_115" id="abu_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'abu_115')">
                                                                                        <label for="abu_115"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_115" id="hitam_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'hitam_115')">
                                                                                        <label for="hitam_115"></label>
                                                                                    </td> 
                                                                                    <td width="2%" class="pattern-background" id="warna_116">
                                                                                        <input type="checkbox" name="putih_116" id="putih_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'putih_116')">
                                                                                        <label for="putih_116"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_116" id="abu_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'abu_116')">
                                                                                        <label for="abu_116"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_116" id="hitam_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'hitam_116')">
                                                                                        <label for="hitam_116"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_117">
                                                                                        <input type="checkbox" name="putih_117" id="putih_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'putih_117')">
                                                                                        <label for="putih_117"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_117" id="abu_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'abu_117')">
                                                                                        <label for="abu_117"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_117" id="hitam_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'hitam_117')">
                                                                                        <label for="hitam_117"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_118">
                                                                                        <input type="checkbox" name="putih_118" id="putih_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'putih_118')">
                                                                                        <label for="putih_118"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_118" id="abu_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'abu_118')">
                                                                                        <label for="abu_118"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_118" id="hitam_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'hitam_118')">
                                                                                        <label for="hitam_118"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_119">
                                                                                        <input type="checkbox" name="putih_119" id="putih_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'putih_119')">
                                                                                        <label for="putih_119"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_119" id="abu_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'abu_119')">
                                                                                        <label for="abu_119"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_119" id="hitam_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'hitam_119')">
                                                                                        <label for="hitam_119"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_120">
                                                                                        <input type="checkbox" name="putih_120" id="putih_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'putih_120')">
                                                                                        <label for="putih_120"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_120" id="abu_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'abu_120')">
                                                                                        <label for="abu_120"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_120" id="hitam_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'hitam_120')">
                                                                                        <label for="hitam_120"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_121">
                                                                                        <input type="checkbox" name="putih_121" id="putih_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'putih_121')">
                                                                                        <label for="putih_121"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_121" id="abu_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'abu_121')">
                                                                                        <label for="abu_121"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_121" id="hitam_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'hitam_121')">
                                                                                        <label for="hitam_121"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_122">
                                                                                        <input type="checkbox" name="putih_122" id="putih_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'putih_122')">
                                                                                        <label for="putih_122"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_122" id="abu_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'abu_122')">
                                                                                        <label for="abu_122"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_122" id="hitam_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'hitam_122')">
                                                                                        <label for="hitam_122"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_123">
                                                                                        <input type="checkbox" name="putih_123" id="putih_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'putih_123')">
                                                                                        <label for="putih_123"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_123" id="abu_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'abu_123')">
                                                                                        <label for="abu_123"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_123" id="hitam_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'hitam_123')">
                                                                                        <label for="hitam_123"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_124">
                                                                                        <input type="checkbox" name="putih_124" id="putih_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'putih_124')">
                                                                                        <label for="putih_124"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_124" id="abu_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'abu_124')">
                                                                                        <label for="abu_124"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_124" id="hitam_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'hitam_124')">
                                                                                        <label for="hitam_124"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_125">
                                                                                        <input type="checkbox" name="putih_125" id="putih_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'putih_125')">
                                                                                        <label for="putih_125"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_125" id="abu_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'abu_125')">
                                                                                        <label for="abu_125"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_125" id="hitam_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'hitam_125')">
                                                                                        <label for="hitam_125"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_126">
                                                                                        <input type="checkbox" name="putih_126" id="putih_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'putih_126')">
                                                                                        <label for="putih_126"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_126" id="abu_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'abu_126')">
                                                                                        <label for="abu_126"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_126" id="hitam_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'hitam_126')">
                                                                                        <label for="hitam_126"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_127">
                                                                                        <input type="checkbox" name="putih_127" id="putih_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'putih_127')">
                                                                                        <label for="putih_127"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_127" id="abu_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'abu_127')">
                                                                                        <label for="abu_127"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_127" id="hitam_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'hitam_127')">
                                                                                        <label for="hitam_127"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_128">
                                                                                        <input type="checkbox" name="putih_128" id="putih_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'putih_128')">
                                                                                        <label for="putih_128"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_128" id="abu_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'abu_128')">
                                                                                        <label for="abu_128"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_128" id="hitam_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'hitam_128')">
                                                                                        <label for="hitam_128"></label>
                                                                                    </td>                                                                                 
                                                                                </tr>



                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background-color: #000000;"></td>
                                                                                    <td width="3%" class="center"> > 40 <br> (detik)</td>
                                                                                    <td width="1%">1</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_129">
                                                                                        <input type="checkbox" name="putih_129" id="putih_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'putih_129')">
                                                                                        <label for="putih_129"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_129" id="abu_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'abu_129')">
                                                                                        <label for="abu_129"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_129" id="hitam_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'hitam_129')">
                                                                                        <label for="hitam_129"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_130">
                                                                                        <input type="checkbox" name="putih_130" id="putih_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'putih_130')">
                                                                                        <label for="putih_130"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_130" id="abu_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'abu_130')">
                                                                                        <label for="abu_130"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_130" id="hitam_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'hitam_130')">
                                                                                        <label for="hitam_130"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_131">
                                                                                        <input type="checkbox" name="putih_131" id="putih_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'putih_131')">
                                                                                        <label for="putih_131"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_131" id="abu_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'abu_131')">
                                                                                        <label for="abu_131"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_131" id="hitam_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'hitam_131')">
                                                                                        <label for="hitam_131"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_132">
                                                                                        <input type="checkbox" name="putih_132" id="putih_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'putih_132')">
                                                                                        <label for="putih_132"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_132" id="abu_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'abu_132')">
                                                                                        <label for="abu_132"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_132" id="hitam_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'hitam_132')">
                                                                                        <label for="hitam_132"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_133">
                                                                                        <input type="checkbox" name="putih_133" id="putih_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'putih_133')">
                                                                                        <label for="putih_133"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_133" id="abu_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'abu_133')">
                                                                                        <label for="abu_133"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_133" id="hitam_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'hitam_133')">
                                                                                        <label for="hitam_133"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_134">
                                                                                        <input type="checkbox" name="putih_134" id="putih_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'putih_134')">
                                                                                        <label for="putih_134"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_134" id="abu_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'abu_134')">
                                                                                        <label for="abu_134"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_134" id="hitam_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'hitam_134')">
                                                                                        <label for="hitam_134"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_135">
                                                                                        <input type="checkbox" name="putih_135" id="putih_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'putih_135')">
                                                                                        <label for="putih_135"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_135" id="abu_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'abu_135')">
                                                                                        <label for="abu_135"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_135" id="hitam_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'hitam_135')">
                                                                                        <label for="hitam_135"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_136">
                                                                                        <input type="checkbox" name="putih_136" id="putih_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'putih_136')">
                                                                                        <label for="putih_136"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_136" id="abu_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'abu_136')">
                                                                                        <label for="abu_136"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_136" id="hitam_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'hitam_136')">
                                                                                        <label for="hitam_136"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_137">
                                                                                        <input type="checkbox" name="putih_137" id="putih_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'putih_137')">
                                                                                        <label for="putih_137"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_137" id="abu_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'abu_137')">
                                                                                        <label for="abu_137"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_137" id="hitam_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'hitam_137')">
                                                                                        <label for="hitam_137"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_138">
                                                                                        <input type="checkbox" name="putih_138" id="putih_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'putih_138')">
                                                                                        <label for="putih_138"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_138" id="abu_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'abu_138')">
                                                                                        <label for="abu_138"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_138" id="hitam_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'hitam_138')">
                                                                                        <label for="hitam_138"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_139">
                                                                                        <input type="checkbox" name="putih_139" id="putih_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'putih_139')">
                                                                                        <label for="putih_139"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_139" id="abu_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'abu_139')">
                                                                                        <label for="abu_139"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_139" id="hitam_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'hitam_139')">
                                                                                        <label for="hitam_139"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_140">
                                                                                        <input type="checkbox" name="putih_140" id="putih_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'putih_140')">
                                                                                        <label for="putih_140"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_140" id="abu_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'abu_140')">
                                                                                        <label for="abu_140"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_140" id="hitam_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'hitam_140')">
                                                                                        <label for="hitam_140"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_141">
                                                                                        <input type="checkbox" name="putih_141" id="putih_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'putih_141')">
                                                                                        <label for="putih_141"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_141" id="abu_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'abu_141')">
                                                                                        <label for="abu_141"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_141" id="hitam_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'hitam_141')">
                                                                                        <label for="hitam_141"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_142">
                                                                                        <input type="checkbox" name="putih_142" id="putih_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'putih_142')">
                                                                                        <label for="putih_142"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_142" id="abu_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'abu_142')">
                                                                                        <label for="abu_142"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_142" id="hitam_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'hitam_142')">
                                                                                        <label for="hitam_142"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_143">
                                                                                        <input type="checkbox" name="putih_143" id="putih_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'putih_143')">
                                                                                        <label for="putih_143"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_143" id="abu_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'abu_143')">
                                                                                        <label for="abu_143"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_143" id="hitam_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'hitam_143')">
                                                                                        <label for="hitam_143"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_144">
                                                                                        <input type="checkbox" name="putih_144" id="putih_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'putih_144')">
                                                                                        <label for="putih_144"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_144" id="abu_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'abu_144')">
                                                                                        <label for="abu_144"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_144" id="hitam_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'hitam_144')">
                                                                                        <label for="hitam_144"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_145">
                                                                                        <input type="checkbox" name="putih_145" id="putih_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'putih_145')">
                                                                                        <label for="putih_145"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_145" id="abu_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'abu_145')">
                                                                                        <label for="abu_145"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_145" id="hitam_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'hitam_145')">
                                                                                        <label for="hitam_145"></label>
                                                                                    </td>                                                                              
                                                                                    <td width="2%" class="pattern-background" id="warna_146">
                                                                                        <input type="checkbox" name="putih_146" id="putih_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'putih_146')">
                                                                                        <label for="putih_146"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_146" id="abu_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'abu_146')">
                                                                                        <label for="abu_146"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_146" id="hitam_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'hitam_146')">
                                                                                        <label for="hitam_146"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_147">
                                                                                        <input type="checkbox" name="putih_147" id="putih_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'putih_147')">
                                                                                        <label for="putih_147"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_147" id="abu_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'abu_147')">
                                                                                        <label for="abu_147"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_147" id="hitam_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'hitam_147')">
                                                                                        <label for="hitam_147"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_148">
                                                                                        <input type="checkbox" name="putih_148" id="putih_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'putih_148')">
                                                                                        <label for="putih_148"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_148" id="abu_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'abu_148')">
                                                                                        <label for="abu_148"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_148" id="hitam_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'hitam_148')">
                                                                                        <label for="hitam_148"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_149">
                                                                                        <input type="checkbox" name="putih_149" id="putih_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'putih_149')">
                                                                                        <label for="putih_149"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_149" id="abu_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'abu_149')">
                                                                                        <label for="abu_149"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_149" id="hitam_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'hitam_149')">
                                                                                        <label for="hitam_149"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_150">
                                                                                        <input type="checkbox" name="putih_150" id="putih_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'putih_150')">
                                                                                        <label for="putih_150"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_150" id="abu_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'abu_150')">
                                                                                        <label for="abu_150"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_150" id="hitam_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'hitam_150')">
                                                                                        <label for="hitam_150"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_151">
                                                                                        <input type="checkbox" name="putih_151" id="putih_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'putih_151')">
                                                                                        <label for="putih_151"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_151" id="abu_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'abu_151')">
                                                                                        <label for="abu_151"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_151" id="hitam_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'hitam_151')">
                                                                                        <label for="hitam_151"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_152">
                                                                                        <input type="checkbox" name="putih_152" id="putih_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'putih_152')">
                                                                                        <label for="putih_152"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_152" id="abu_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'abu_152')">
                                                                                        <label for="abu_152"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_152" id="hitam_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'hitam_152')">
                                                                                        <label for="hitam_152"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_153">
                                                                                        <input type="checkbox" name="putih_153" id="putih_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'putih_153')">
                                                                                        <label for="putih_153"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_153" id="abu_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'abu_153')">
                                                                                        <label for="abu_153"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_153" id="hitam_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'hitam_153')">
                                                                                        <label for="hitam_153"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_154">
                                                                                        <input type="checkbox" name="putih_154" id="putih_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'putih_154')">
                                                                                        <label for="putih_154"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_154" id="abu_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'abu_154')">
                                                                                        <label for="abu_154"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_154" id="hitam_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'hitam_154')">
                                                                                        <label for="hitam_154"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_155">
                                                                                        <input type="checkbox" name="putih_155" id="putih_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'putih_155')">
                                                                                        <label for="putih_155"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_155" id="abu_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'abu_155')">
                                                                                        <label for="abu_155"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_155" id="hitam_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'hitam_155')">
                                                                                        <label for="hitam_155"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_156">
                                                                                        <input type="checkbox" name="putih_156" id="putih_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'putih_156')">
                                                                                        <label for="putih_156"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_156" id="abu_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'abu_156')">
                                                                                        <label for="abu_156"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_156" id="hitam_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'hitam_156')">
                                                                                        <label for="hitam_156"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_157">
                                                                                        <input type="checkbox" name="putih_157" id="putih_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'putih_157')">
                                                                                        <label for="putih_157"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_157" id="abu_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'abu_157')">
                                                                                        <label for="abu_157"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_157" id="hitam_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'hitam_157')">
                                                                                        <label for="hitam_157"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_158">
                                                                                        <input type="checkbox" name="putih_158" id="putih_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'putih_158')">
                                                                                        <label for="putih_158"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_158" id="abu_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'abu_158')">
                                                                                        <label for="abu_158"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_158" id="hitam_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'hitam_158')">
                                                                                        <label for="hitam_158"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_159">
                                                                                        <input type="checkbox" name="putih_159" id="putih_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'putih_159')">
                                                                                        <label for="putih_159"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_159" id="abu_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'abu_159')">
                                                                                        <label for="abu_159"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_159" id="hitam_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'hitam_159')">
                                                                                        <label for="hitam_159"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_160">
                                                                                        <input type="checkbox" name="putih_160" id="putih_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'putih_160')">
                                                                                        <label for="putih_160"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_160" id="abu_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'abu_160')">
                                                                                        <label for="abu_160"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_160" id="hitam_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'hitam_160')">
                                                                                        <label for="hitam_160"></label>
                                                                                    </td> 
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="table table-sm table-striped table-bordered">
                                                                            <tr>
                                                                                <td style="color: red; font-weight: bold;">
                                                                                    Harap Diperhatikan Pilih Salah Satu Cheklis Untuk Memilih Warna
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>


                                                            <!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table class="table table-sm table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td width="10%" class="center"> kontraksi tiap 10 menit</td>
                                                                                    <td width="3%"></td>
                                                                                    <td width="1%">5</td>

                                                                                    <td width="2%" class="pattern-background" id="warna_1">
                                                                                        <input type="checkbox" name="putih_1" id="putih_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'putih_1')">
                                                                                        <label for="putih_1"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_1" id="abu_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'abu_1')">
                                                                                        <label for="abu_1"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_1" id="hitam_1" value="1" class="mr-1" onchange="changeColor('warna_1', 'hitam_1')">
                                                                                        <label for="hitam_1"></label>
                                                                                    </td>

                                                                                    <td width="2%" class="pattern-background" id="warna_2">
                                                                                        <input type="checkbox" name="putih_2" id="putih_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'putih_2')">
                                                                                        <label for="putih_2"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_2" id="abu_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'abu_2')">
                                                                                        <label for="abu_2"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_2" id="hitam_2" value="1" class="mr-1" onchange="changeColor('warna_2', 'hitam_2')">
                                                                                        <label for="hitam_2"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_3">
                                                                                        <input type="checkbox" name="putih_3" id="putih_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'putih_3')">
                                                                                        <label for="putih_3"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_3" id="abu_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'abu_3')">
                                                                                        <label for="abu_3"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_3" id="hitam_3" value="1" class="mr-1" onchange="changeColor('warna_3', 'hitam_3')">
                                                                                        <label for="hitam_3"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_4">
                                                                                        <input type="checkbox" name="putih_4" id="putih_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'putih_4')">
                                                                                        <label for="putih_4"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_4" id="abu_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'abu_4')">
                                                                                        <label for="abu_4"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_4" id="hitam_4" value="1" class="mr-1" onchange="changeColor('warna_4', 'hitam_4')">
                                                                                        <label for="hitam_4"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_5">
                                                                                        <input type="checkbox" name="putih_5" id="putih_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'putih_5')">
                                                                                        <label for="putih_5"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_5" id="abu_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'abu_5')">
                                                                                        <label for="abu_5"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_5" id="hitam_5" value="1" class="mr-1" onchange="changeColor('warna_5', 'hitam_5')">
                                                                                        <label for="hitam_5"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_6">
                                                                                        <input type="checkbox" name="putih_6" id="putih_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'putih_6')">
                                                                                        <label for="putih_6"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_6" id="abu_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'abu_6')">
                                                                                        <label for="abu_6"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_6" id="hitam_6" value="1" class="mr-1" onchange="changeColor('warna_6', 'hitam_6')">
                                                                                        <label for="hitam_6"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_7">
                                                                                        <input type="checkbox" name="putih_7" id="putih_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'putih_7')">
                                                                                        <label for="putih_7"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_7" id="abu_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'abu_7')">
                                                                                        <label for="abu_7"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_7" id="hitam_7" value="1" class="mr-1" onchange="changeColor('warna_7', 'hitam_7')">
                                                                                        <label for="hitam_7"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_8">
                                                                                        <input type="checkbox" name="putih_8" id="putih_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'putih_8')">
                                                                                        <label for="putih_8"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_8" id="abu_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'abu_8')">
                                                                                        <label for="abu_8"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_8" id="hitam_8" value="1" class="mr-1" onchange="changeColor('warna_8', 'hitam_8')">
                                                                                        <label for="hitam_8"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_9">
                                                                                        <input type="checkbox" name="putih_9" id="putih_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'putih_9')">
                                                                                        <label for="putih_9"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_9" id="abu_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'abu_9')">
                                                                                        <label for="abu_9"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_9" id="hitam_9" value="1" class="mr-1" onchange="changeColor('warna_9', 'hitam_9')">
                                                                                        <label for="hitam_9"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_10">
                                                                                        <input type="checkbox" name="putih_10" id="putih_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'putih_10')">
                                                                                        <label for="putih_10"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_10" id="abu_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'abu_10')">
                                                                                        <label for="abu_10"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_10" id="hitam_10" value="1" class="mr-1" onchange="changeColor('warna_10', 'hitam_10')">
                                                                                        <label for="hitam_10"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_11">
                                                                                        <input type="checkbox" name="putih_11" id="putih_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'putih_11')">
                                                                                        <label for="putih_11"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_11" id="abu_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'abu_11')">
                                                                                        <label for="abu_11"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_11" id="hitam_11" value="1" class="mr-1" onchange="changeColor('warna_11', 'hitam_11')">
                                                                                        <label for="hitam_11"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_12">
                                                                                        <input type="checkbox" name="putih_12" id="putih_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'putih_12')">
                                                                                        <label for="putih_12"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_12" id="abu_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'abu_12')">
                                                                                        <label for="abu_12"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_12" id="hitam_12" value="1" class="mr-1" onchange="changeColor('warna_12', 'hitam_12')">
                                                                                        <label for="hitam_12"></label>
                                                                                    </td>  



                                                                                    <td width="2%" class="pattern-background" id="warna_61">
                                                                                        <input type="checkbox" name="putih_61" id="putih_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'putih_61')">
                                                                                        <label for="putih_61"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_61" id="abu_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'abu_61')">
                                                                                        <label for="abu_61"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_61" id="hitam_61" value="1" class="mr-1" onchange="changeColor('warna_61', 'hitam_61')">
                                                                                        <label for="hitam_61"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_62">
                                                                                        <input type="checkbox" name="putih_62" id="putih_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'putih_62')">
                                                                                        <label for="putih_62"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_62" id="abu_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'abu_62')">
                                                                                        <label for="abu_62"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_62" id="hitam_62" value="1" class="mr-1" onchange="changeColor('warna_62', 'hitam_62')">
                                                                                        <label for="hitam_62"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_63">
                                                                                        <input type="checkbox" name="putih_63" id="putih_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'putih_63')">
                                                                                        <label for="putih_63"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_63" id="abu_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'abu_63')">
                                                                                        <label for="abu_63"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_63" id="hitam_63" value="1" class="mr-1" onchange="changeColor('warna_63', 'hitam_63')">
                                                                                        <label for="hitam_63"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_64">
                                                                                        <input type="checkbox" name="putih_64" id="putih_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'putih_64')">
                                                                                        <label for="putih_64"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_64" id="abu_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'abu_64')">
                                                                                        <label for="abu_64"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_64" id="hitam_64" value="1" class="mr-1" onchange="changeColor('warna_64', 'hitam_64')">
                                                                                        <label for="hitam_64"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_65">
                                                                                        <input type="checkbox" name="putih_65" id="putih_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'putih_65')">
                                                                                        <label for="putih_65"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_65" id="abu_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'abu_65')">
                                                                                        <label for="abu_65"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_65" id="hitam_65" value="1" class="mr-1" onchange="changeColor('warna_65', 'hitam_65')">
                                                                                        <label for="hitam_65"></label>
                                                                                    </td>    



                                                                                    <td width="2%" class="pattern-background" id="warna_86">
                                                                                        <input type="checkbox" name="putih_86" id="putih_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'putih_86')">
                                                                                        <label for="putih_86"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_86" id="abu_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'abu_86')">
                                                                                        <label for="abu_86"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_86" id="hitam_86" value="1" class="mr-1" onchange="changeColor('warna_86', 'hitam_86')">
                                                                                        <label for="hitam_86"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_87">
                                                                                        <input type="checkbox" name="putih_87" id="putih_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'putih_87')">
                                                                                        <label for="putih_87"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_87" id="abu_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'abu_87')">
                                                                                        <label for="abu_87"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_87" id="hitam_87" value="1" class="mr-1" onchange="changeColor('warna_87', 'hitam_87')">
                                                                                        <label for="hitam_87"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_88">
                                                                                        <input type="checkbox" name="putih_88" id="putih_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'putih_88')">
                                                                                        <label for="putih_88"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_88" id="abu_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'abu_88')">
                                                                                        <label for="abu_88"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_88" id="hitam_88" value="1" class="mr-1" onchange="changeColor('warna_88', 'hitam_88')">
                                                                                        <label for="hitam_88"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_89">
                                                                                        <input type="checkbox" name="putih_89" id="putih_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'putih_89')">
                                                                                        <label for="putih_89"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_89" id="abu_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'abu_89')">
                                                                                        <label for="abu_89"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_89" id="hitam_89" value="1" class="mr-1" onchange="changeColor('warna_89', 'hitam_89')">
                                                                                        <label for="hitam_89"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_90">
                                                                                        <input type="checkbox" name="putih_90" id="putih_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'putih_90')">
                                                                                        <label for="putih_90"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_90" id="abu_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'abu_90')">
                                                                                        <label for="abu_90"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_90" id="hitam_90" value="1" class="mr-1" onchange="changeColor('warna_90', 'hitam_90')">
                                                                                        <label for="hitam_90"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_91">
                                                                                        <input type="checkbox" name="putih_91" id="putih_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'putih_91')">
                                                                                        <label for="putih_91"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_91" id="abu_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'abu_91')">
                                                                                        <label for="abu_91"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_91" id="hitam_91" value="1" class="mr-1" onchange="changeColor('warna_91', 'hitam_91')">
                                                                                        <label for="hitam_91"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_92">
                                                                                        <input type="checkbox" name="putih_92" id="putih_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'putih_92')">
                                                                                        <label for="putih_92"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_92" id="abu_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'abu_92')">
                                                                                        <label for="abu_92"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_92" id="hitam_92" value="1" class="mr-1" onchange="changeColor('warna_92', 'hitam_92')">
                                                                                        <label for="hitam_92"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_93">
                                                                                        <input type="checkbox" name="putih_93" id="putih_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'putih_93')">
                                                                                        <label for="putih_93"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_93" id="abu_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'abu_93')">
                                                                                        <label for="abu_93"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_93" id="hitam_93" value="1" class="mr-1" onchange="changeColor('warna_93', 'hitam_93')">
                                                                                        <label for="hitam_93"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_94">
                                                                                        <input type="checkbox" name="putih_94" id="putih_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'putih_94')">
                                                                                        <label for="putih_94"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_94" id="abu_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'abu_94')">
                                                                                        <label for="abu_94"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_94" id="hitam_94" value="1" class="mr-1" onchange="changeColor('warna_94', 'hitam_94')">
                                                                                        <label for="hitam_94"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_95">
                                                                                        <input type="checkbox" name="putih_95" id="putih_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'putih_95')">
                                                                                        <label for="putih_95"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_95" id="abu_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'abu_95')">
                                                                                        <label for="abu_95"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_95" id="hitam_95" value="1" class="mr-1" onchange="changeColor('warna_95', 'hitam_95')">
                                                                                        <label for="hitam_95"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_96">
                                                                                        <input type="checkbox" name="putih_96" id="putih_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'putih_96')">
                                                                                        <label for="putih_96"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_96" id="abu_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'abu_96')">
                                                                                        <label for="abu_96"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_96" id="hitam_96" value="1" class="mr-1" onchange="changeColor('warna_96', 'hitam_96')">
                                                                                        <label for="hitam_96"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_97">
                                                                                        <input type="checkbox" name="putih_97" id="putih_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'putih_97')">
                                                                                        <label for="putih_97"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_97" id="abu_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'abu_97')">
                                                                                        <label for="abu_97"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_97" id="hitam_97" value="1" class="mr-1" onchange="changeColor('warna_97', 'hitam_97')">
                                                                                        <label for="hitam_97"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_98">
                                                                                        <input type="checkbox" name="putih_98" id="putih_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'putih_98')">
                                                                                        <label for="putih_98"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_98" id="abu_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'abu_98')">
                                                                                        <label for="abu_98"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_98" id="hitam_98" value="1" class="mr-1" onchange="changeColor('warna_98', 'hitam_98')">
                                                                                        <label for="hitam_98"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_99">
                                                                                        <input type="checkbox" name="putih_99" id="putih_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'putih_99')">
                                                                                        <label for="putih_99"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_99" id="abu_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'abu_99')">
                                                                                        <label for="abu_99"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_99" id="hitam_99" value="1" class="mr-1" onchange="changeColor('warna_99', 'hitam_99')">
                                                                                        <label for="hitam_99"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_100">
                                                                                        <input type="checkbox" name="putih_100" id="putih_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'putih_100')">
                                                                                        <label for="putih_100"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_100" id="abu_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'abu_100')">
                                                                                        <label for="abu_100"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_100" id="hitam_100" value="1" class="mr-1" onchange="changeColor('warna_100', 'hitam_100')">
                                                                                        <label for="hitam_100"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                </tr>

                                                                            </thead>



























                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="10%" class="center"></td>
                                                                                    <td width="3%" class="center"></td>
                                                                                    <td width="1%">4</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_13">
                                                                                        <input type="checkbox" name="putih_13" id="putih_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'putih_13')">
                                                                                        <label for="putih_13"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_13" id="abu_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'abu_13')">
                                                                                        <label for="abu_13"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_13" id="hitam_13" value="1" class="mr-1" onchange="changeColor('warna_13', 'hitam_13')">
                                                                                        <label for="hitam_13"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_14">
                                                                                        <input type="checkbox" name="putih_14" id="putih_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'putih_14')">
                                                                                        <label for="putih_14"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_14" id="abu_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'abu_14')">
                                                                                        <label for="abu_14"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_14" id="hitam_14" value="1" class="mr-1" onchange="changeColor('warna_14', 'hitam_14')">
                                                                                        <label for="hitam_14"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_15">
                                                                                        <input type="checkbox" name="putih_15" id="putih_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'putih_15')">
                                                                                        <label for="putih_15"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_15" id="abu_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'abu_15')">
                                                                                        <label for="abu_15"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_15" id="hitam_15" value="1" class="mr-1" onchange="changeColor('warna_15', 'hitam_15')">
                                                                                        <label for="hitam_15"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_16">
                                                                                        <input type="checkbox" name="putih_16" id="putih_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'putih_16')">
                                                                                        <label for="putih_16"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_16" id="abu_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'abu_16')">
                                                                                        <label for="abu_16"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_16" id="hitam_16" value="1" class="mr-1" onchange="changeColor('warna_16', 'hitam_16')">
                                                                                        <label for="hitam_16"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_17">
                                                                                        <input type="checkbox" name="putih_17" id="putih_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'putih_17')">
                                                                                        <label for="putih_17"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_17" id="abu_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'abu_17')">
                                                                                        <label for="abu_17"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_17" id="hitam_17" value="1" class="mr-1" onchange="changeColor('warna_17', 'hitam_17')">
                                                                                        <label for="hitam_17"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_18">
                                                                                        <input type="checkbox" name="putih_18" id="putih_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'putih_18')">
                                                                                        <label for="putih_18"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_18" id="abu_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'abu_18')">
                                                                                        <label for="abu_18"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_18" id="hitam_18" value="1" class="mr-1" onchange="changeColor('warna_18', 'hitam_18')">
                                                                                        <label for="hitam_18"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_19">
                                                                                        <input type="checkbox" name="putih_19" id="putih_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'putih_19')">
                                                                                        <label for="putih_19"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_19" id="abu_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'abu_19')">
                                                                                        <label for="abu_19"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_19" id="hitam_19" value="1" class="mr-1" onchange="changeColor('warna_19', 'hitam_19')">
                                                                                        <label for="hitam_19"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_20">
                                                                                        <input type="checkbox" name="putih_20" id="putih_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'putih_20')">
                                                                                        <label for="putih_20"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_20" id="abu_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'abu_20')">
                                                                                        <label for="abu_20"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_20" id="hitam_20" value="1" class="mr-1" onchange="changeColor('warna_20', 'hitam_20')">
                                                                                        <label for="hitam_20"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_21">
                                                                                        <input type="checkbox" name="putih_21" id="putih_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'putih_21')">
                                                                                        <label for="putih_21"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_21" id="abu_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'abu_21')">
                                                                                        <label for="abu_21"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_21" id="hitam_21" value="1" class="mr-1" onchange="changeColor('warna_21', 'hitam_21')">
                                                                                        <label for="hitam_21"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_22">
                                                                                        <input type="checkbox" name="putih_22" id="putih_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'putih_22')">
                                                                                        <label for="putih_22"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_22" id="abu_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'abu_22')">
                                                                                        <label for="abu_22"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_22" id="hitam_22" value="1" class="mr-1" onchange="changeColor('warna_22', 'hitam_22')">
                                                                                        <label for="hitam_22"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_23">
                                                                                        <input type="checkbox" name="putih_23" id="putih_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'putih_23')">
                                                                                        <label for="putih_23"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_23" id="abu_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'abu_23')">
                                                                                        <label for="abu_23"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_23" id="hitam_23" value="1" class="mr-1" onchange="changeColor('warna_23', 'hitam_23')">
                                                                                        <label for="hitam_23"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_24">
                                                                                        <input type="checkbox" name="putih_24" id="putih_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'putih_24')">
                                                                                        <label for="putih_24"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_24" id="abu_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'abu_24')">
                                                                                        <label for="abu_24"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_24" id="hitam_24" value="1" class="mr-1" onchange="changeColor('warna_24', 'hitam_24')">
                                                                                        <label for="hitam_24"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_66">
                                                                                        <input type="checkbox" name="putih_66" id="putih_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'putih_66')">
                                                                                        <label for="putih_66"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_66" id="abu_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'abu_66')">
                                                                                        <label for="abu_66"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_66" id="hitam_66" value="1" class="mr-1" onchange="changeColor('warna_66', 'hitam_66')">
                                                                                        <label for="hitam_66"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_67">
                                                                                        <input type="checkbox" name="putih_67" id="putih_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'putih_67')">
                                                                                        <label for="putih_67"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_67" id="abu_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'abu_67')">
                                                                                        <label for="abu_67"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_67" id="hitam_67" value="1" class="mr-1" onchange="changeColor('warna_67', 'hitam_67')">
                                                                                        <label for="hitam_67"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_68">
                                                                                        <input type="checkbox" name="putih_68" id="putih_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'putih_68')">
                                                                                        <label for="putih_68"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_68" id="abu_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'abu_68')">
                                                                                        <label for="abu_68"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_68" id="hitam_68" value="1" class="mr-1" onchange="changeColor('warna_68', 'hitam_68')">
                                                                                        <label for="hitam_68"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_69">
                                                                                        <input type="checkbox" name="putih_69" id="putih_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'putih_69')">
                                                                                        <label for="putih_69"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_69" id="abu_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'abu_69')">
                                                                                        <label for="abu_69"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_69" id="hitam_69" value="1" class="mr-1" onchange="changeColor('warna_69', 'hitam_69')">
                                                                                        <label for="hitam_69"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_70">
                                                                                        <input type="checkbox" name="putih_70" id="putih_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'putih_70')">
                                                                                        <label for="putih_70"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_70" id="abu_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'abu_70')">
                                                                                        <label for="abu_70"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_70" id="hitam_70" value="1" class="mr-1" onchange="changeColor('warna_70', 'hitam_70')">
                                                                                        <label for="hitam_70"></label>
                                                                                    </td> 




                                                                                    <td width="2%" class="pattern-background" id="warna_101">
                                                                                        <input type="checkbox" name="putih_101" id="putih_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'putih_101')">
                                                                                        <label for="putih_101"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_101" id="abu_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'abu_101')">
                                                                                        <label for="abu_101"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_101" id="hitam_101" value="1" class="mr-1" onchange="changeColor('warna_101', 'hitam_101')">
                                                                                        <label for="hitam_101"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_102">
                                                                                        <input type="checkbox" name="putih_102" id="putih_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'putih_102')">
                                                                                        <label for="putih_102"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_102" id="abu_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'abu_102')">
                                                                                        <label for="abu_102"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_102" id="hitam_102" value="1" class="mr-1" onchange="changeColor('warna_102', 'hitam_102')">
                                                                                        <label for="hitam_102"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_103">
                                                                                        <input type="checkbox" name="putih_103" id="putih_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'putih_103')">
                                                                                        <label for="putih_103"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_103" id="abu_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'abu_103')">
                                                                                        <label for="abu_103"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_103" id="hitam_103" value="1" class="mr-1" onchange="changeColor('warna_103', 'hitam_103')">
                                                                                        <label for="hitam_103"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_104">
                                                                                        <input type="checkbox" name="putih_104" id="putih_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'putih_104')">
                                                                                        <label for="putih_104"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_104" id="abu_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'abu_104')">
                                                                                        <label for="abu_104"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_104" id="hitam_104" value="1" class="mr-1" onchange="changeColor('warna_104', 'hitam_104')">
                                                                                        <label for="hitam_104"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_105">
                                                                                        <input type="checkbox" name="putih_105" id="putih_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'putih_105')">
                                                                                        <label for="putih_105"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_105" id="abu_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'abu_105')">
                                                                                        <label for="abu_105"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_105" id="hitam_105" value="1" class="mr-1" onchange="changeColor('warna_105', 'hitam_105')">
                                                                                        <label for="hitam_105"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_106">
                                                                                        <input type="checkbox" name="putih_106" id="putih_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'putih_106')">
                                                                                        <label for="putih_106"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_106" id="abu_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'abu_106')">
                                                                                        <label for="abu_106"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_106" id="hitam_106" value="1" class="mr-1" onchange="changeColor('warna_106', 'hitam_106')">
                                                                                        <label for="hitam_106"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_107">
                                                                                        <input type="checkbox" name="putih_107" id="putih_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'putih_107')">
                                                                                        <label for="putih_107"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_107" id="abu_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'abu_107')">
                                                                                        <label for="abu_107"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_107" id="hitam_107" value="1" class="mr-1" onchange="changeColor('warna_107', 'hitam_107')">
                                                                                        <label for="hitam_107"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_108">
                                                                                        <input type="checkbox" name="putih_108" id="putih_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'putih_108')">
                                                                                        <label for="putih_108"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_108" id="abu_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'abu_108')">
                                                                                        <label for="abu_108"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_108" id="hitam_108" value="1" class="mr-1" onchange="changeColor('warna_108', 'hitam_108')">
                                                                                        <label for="hitam_108"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_109">
                                                                                        <input type="checkbox" name="putih_109" id="putih_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'putih_109')">
                                                                                        <label for="putih_109"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_109" id="abu_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'abu_109')">
                                                                                        <label for="abu_109"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_109" id="hitam_109" value="1" class="mr-1" onchange="changeColor('warna_109', 'hitam_109')">
                                                                                        <label for="hitam_109"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_110">
                                                                                        <input type="checkbox" name="putih_110" id="putih_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'putih_110')">
                                                                                        <label for="putih_110"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_110" id="abu_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'abu_110')">
                                                                                        <label for="abu_110"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_110" id="hitam_110" value="1" class="mr-1" onchange="changeColor('warna_110', 'hitam_110')">
                                                                                        <label for="hitam_110"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_111">
                                                                                        <input type="checkbox" name="putih_111" id="putih_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'putih_111')">
                                                                                        <label for="putih_111"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_111" id="abu_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'abu_111')">
                                                                                        <label for="abu_111"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_111" id="hitam_111" value="1" class="mr-1" onchange="changeColor('warna_111', 'hitam_111')">
                                                                                        <label for="hitam_111"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_112">
                                                                                        <input type="checkbox" name="putih_112" id="putih_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'putih_112')">
                                                                                        <label for="putih_112"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_112" id="abu_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'abu_112')">
                                                                                        <label for="abu_112"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_112" id="hitam_112" value="1" class="mr-1" onchange="changeColor('warna_112', 'hitam_112')">
                                                                                        <label for="hitam_112"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_113">
                                                                                        <input type="checkbox" name="putih_113" id="putih_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'putih_113')">
                                                                                        <label for="putih_113"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_113" id="abu_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'abu_113')">
                                                                                        <label for="abu_113"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_113" id="hitam_113" value="1" class="mr-1" onchange="changeColor('warna_113', 'hitam_113')">
                                                                                        <label for="hitam_113"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_114">
                                                                                        <input type="checkbox" name="putih_114" id="putih_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'putih_114')">
                                                                                        <label for="putih_114"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_114" id="abu_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'abu_114')">
                                                                                        <label for="abu_114"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_114" id="hitam_114" value="1" class="mr-1" onchange="changeColor('warna_114', 'hitam_114')">
                                                                                        <label for="hitam_114"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_115">
                                                                                        <input type="checkbox" name="putih_115" id="putih_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'putih_115')">
                                                                                        <label for="putih_115"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_115" id="abu_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'abu_115')">
                                                                                        <label for="abu_115"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_115" id="hitam_115" value="1" class="mr-1" onchange="changeColor('warna_115', 'hitam_115')">
                                                                                        <label for="hitam_115"></label>
                                                                                    </td> 
                                                                                </tr>

























                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background:
                                                                                        radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
                                                                                        radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
                                                                                        background-size: 5px 5px;">
                                                                                    </td>
                                                                                    <td width="3%" class="center"> < 20</td>
                                                                                    <td width="1%">3</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_25">
                                                                                        <input type="checkbox" name="putih_25" id="putih_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'putih_25')">
                                                                                        <label for="putih_25"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_25" id="abu_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'abu_25')">
                                                                                        <label for="abu_25"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_25" id="hitam_25" value="1" class="mr-1" onchange="changeColor('warna_25', 'hitam_25')">
                                                                                        <label for="hitam_25"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_26">
                                                                                        <input type="checkbox" name="putih_26" id="putih_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'putih_26')">
                                                                                        <label for="putih_26"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_26" id="abu_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'abu_26')">
                                                                                        <label for="abu_26"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_26" id="hitam_26" value="1" class="mr-1" onchange="changeColor('warna_26', 'hitam_26')">
                                                                                        <label for="hitam_26"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_27">
                                                                                        <input type="checkbox" name="putih_27" id="putih_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'putih_27')">
                                                                                        <label for="putih_27"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_27" id="abu_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'abu_27')">
                                                                                        <label for="abu_27"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_27" id="hitam_27" value="1" class="mr-1" onchange="changeColor('warna_27', 'hitam_27')">
                                                                                        <label for="hitam_27"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_28">
                                                                                        <input type="checkbox" name="putih_28" id="putih_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'putih_28')">
                                                                                        <label for="putih_28"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_28" id="abu_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'abu_28')">
                                                                                        <label for="abu_28"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_28" id="hitam_28" value="1" class="mr-1" onchange="changeColor('warna_28', 'hitam_28')">
                                                                                        <label for="hitam_28"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_29">
                                                                                        <input type="checkbox" name="putih_29" id="putih_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'putih_29')">
                                                                                        <label for="putih_29"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_29" id="abu_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'abu_29')">
                                                                                        <label for="abu_29"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_29" id="hitam_29" value="1" class="mr-1" onchange="changeColor('warna_29', 'hitam_29')">
                                                                                        <label for="hitam_29"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_30">
                                                                                        <input type="checkbox" name="putih_30" id="putih_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'putih_30')">
                                                                                        <label for="putih_30"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_30" id="abu_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'abu_30')">
                                                                                        <label for="abu_30"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_30" id="hitam_30" value="1" class="mr-1" onchange="changeColor('warna_30', 'hitam_30')">
                                                                                        <label for="hitam_30"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_31">
                                                                                        <input type="checkbox" name="putih_31" id="putih_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'putih_31')">
                                                                                        <label for="putih_31"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_31" id="abu_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'abu_31')">
                                                                                        <label for="abu_31"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_31" id="hitam_31" value="1" class="mr-1" onchange="changeColor('warna_31', 'hitam_31')">
                                                                                        <label for="hitam_31"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_32">
                                                                                        <input type="checkbox" name="putih_32" id="putih_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'putih_32')">
                                                                                        <label for="putih_32"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_32" id="abu_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'abu_32')">
                                                                                        <label for="abu_32"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_32" id="hitam_32" value="1" class="mr-1" onchange="changeColor('warna_32', 'hitam_32')">
                                                                                        <label for="hitam_32"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_33">
                                                                                        <input type="checkbox" name="putih_33" id="putih_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'putih_33')">
                                                                                        <label for="putih_33"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_33" id="abu_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'abu_33')">
                                                                                        <label for="abu_33"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_33" id="hitam_33" value="1" class="mr-1" onchange="changeColor('warna_33', 'hitam_33')">
                                                                                        <label for="hitam_33"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_34">
                                                                                        <input type="checkbox" name="putih_34" id="putih_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'putih_34')">
                                                                                        <label for="putih_34"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_34" id="abu_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'abu_34')">
                                                                                        <label for="abu_34"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_34" id="hitam_34" value="1" class="mr-1" onchange="changeColor('warna_34', 'hitam_34')">
                                                                                        <label for="hitam_34"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_35">
                                                                                        <input type="checkbox" name="putih_35" id="putih_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'putih_35')">
                                                                                        <label for="putih_35"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_35" id="abu_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'abu_35')">
                                                                                        <label for="abu_35"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_35" id="hitam_35" value="1" class="mr-1" onchange="changeColor('warna_35', 'hitam_35')">
                                                                                        <label for="hitam_35"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_36">
                                                                                        <input type="checkbox" name="putih_36" id="putih_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'putih_36')">
                                                                                        <label for="putih_36"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_36" id="abu_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'abu_36')">
                                                                                        <label for="abu_36"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_36" id="hitam_36" value="1" class="mr-1" onchange="changeColor('warna_36', 'hitam_36')">
                                                                                        <label for="hitam_36"></label>
                                                                                    </td>

                                                                                    <td width="2%" class="pattern-background" id="warna_71">
                                                                                        <input type="checkbox" name="putih_71" id="putih_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'putih_71')">
                                                                                        <label for="putih_71"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_71" id="abu_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'abu_71')">
                                                                                        <label for="abu_71"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_71" id="hitam_71" value="1" class="mr-1" onchange="changeColor('warna_71', 'hitam_71')">
                                                                                        <label for="hitam_71"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_72">
                                                                                        <input type="checkbox" name="putih_72" id="putih_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'putih_72')">
                                                                                        <label for="putih_72"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_72" id="abu_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'abu_72')">
                                                                                        <label for="abu_72"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_72" id="hitam_72" value="1" class="mr-1" onchange="changeColor('warna_72', 'hitam_72')">
                                                                                        <label for="hitam_72"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_73">
                                                                                        <input type="checkbox" name="putih_73" id="putih_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'putih_73')">
                                                                                        <label for="putih_73"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_73" id="abu_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'abu_73')">
                                                                                        <label for="abu_73"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_73" id="hitam_73" value="1" class="mr-1" onchange="changeColor('warna_73', 'hitam_73')">
                                                                                        <label for="hitam_73"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_74">
                                                                                        <input type="checkbox" name="putih_74" id="putih_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'putih_74')">
                                                                                        <label for="putih_74"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_74" id="abu_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'abu_74')">
                                                                                        <label for="abu_74"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_74" id="hitam_74" value="1" class="mr-1" onchange="changeColor('warna_74', 'hitam_74')">
                                                                                        <label for="hitam_74"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_75">
                                                                                        <input type="checkbox" name="putih_75" id="putih_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'putih_75')">
                                                                                        <label for="putih_75"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_75" id="abu_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'abu_75')">
                                                                                        <label for="abu_75"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_75" id="hitam_75" value="1" class="mr-1" onchange="changeColor('warna_75', 'hitam_75')">
                                                                                        <label for="hitam_75"></label>
                                                                                    </td> 


                                                                                    <td width="2%" class="pattern-background" id="warna_116">
                                                                                        <input type="checkbox" name="putih_116" id="putih_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'putih_116')">
                                                                                        <label for="putih_116"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_116" id="abu_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'abu_116')">
                                                                                        <label for="abu_116"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_116" id="hitam_116" value="1" class="mr-1" onchange="changeColor('warna_116', 'hitam_116')">
                                                                                        <label for="hitam_116"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_117">
                                                                                        <input type="checkbox" name="putih_117" id="putih_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'putih_117')">
                                                                                        <label for="putih_117"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_117" id="abu_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'abu_117')">
                                                                                        <label for="abu_117"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_117" id="hitam_117" value="1" class="mr-1" onchange="changeColor('warna_117', 'hitam_117')">
                                                                                        <label for="hitam_117"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_118">
                                                                                        <input type="checkbox" name="putih_118" id="putih_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'putih_118')">
                                                                                        <label for="putih_118"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_118" id="abu_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'abu_118')">
                                                                                        <label for="abu_118"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_118" id="hitam_118" value="1" class="mr-1" onchange="changeColor('warna_118', 'hitam_118')">
                                                                                        <label for="hitam_118"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_119">
                                                                                        <input type="checkbox" name="putih_119" id="putih_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'putih_119')">
                                                                                        <label for="putih_119"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_119" id="abu_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'abu_119')">
                                                                                        <label for="abu_119"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_119" id="hitam_119" value="1" class="mr-1" onchange="changeColor('warna_119', 'hitam_119')">
                                                                                        <label for="hitam_119"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_120">
                                                                                        <input type="checkbox" name="putih_120" id="putih_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'putih_120')">
                                                                                        <label for="putih_120"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_120" id="abu_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'abu_120')">
                                                                                        <label for="abu_120"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_120" id="hitam_120" value="1" class="mr-1" onchange="changeColor('warna_120', 'hitam_120')">
                                                                                        <label for="hitam_120"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_121">
                                                                                        <input type="checkbox" name="putih_121" id="putih_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'putih_121')">
                                                                                        <label for="putih_121"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_121" id="abu_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'abu_121')">
                                                                                        <label for="abu_121"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_121" id="hitam_121" value="1" class="mr-1" onchange="changeColor('warna_121', 'hitam_121')">
                                                                                        <label for="hitam_121"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_122">
                                                                                        <input type="checkbox" name="putih_122" id="putih_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'putih_122')">
                                                                                        <label for="putih_122"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_122" id="abu_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'abu_122')">
                                                                                        <label for="abu_122"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_122" id="hitam_122" value="1" class="mr-1" onchange="changeColor('warna_122', 'hitam_122')">
                                                                                        <label for="hitam_122"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_123">
                                                                                        <input type="checkbox" name="putih_123" id="putih_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'putih_123')">
                                                                                        <label for="putih_123"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_123" id="abu_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'abu_123')">
                                                                                        <label for="abu_123"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_123" id="hitam_123" value="1" class="mr-1" onchange="changeColor('warna_123', 'hitam_123')">
                                                                                        <label for="hitam_123"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_124">
                                                                                        <input type="checkbox" name="putih_124" id="putih_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'putih_124')">
                                                                                        <label for="putih_124"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_124" id="abu_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'abu_124')">
                                                                                        <label for="abu_124"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_124" id="hitam_124" value="1" class="mr-1" onchange="changeColor('warna_124', 'hitam_124')">
                                                                                        <label for="hitam_124"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_125">
                                                                                        <input type="checkbox" name="putih_125" id="putih_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'putih_125')">
                                                                                        <label for="putih_125"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_125" id="abu_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'abu_125')">
                                                                                        <label for="abu_125"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_125" id="hitam_125" value="1" class="mr-1" onchange="changeColor('warna_125', 'hitam_125')">
                                                                                        <label for="hitam_125"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_126">
                                                                                        <input type="checkbox" name="putih_126" id="putih_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'putih_126')">
                                                                                        <label for="putih_126"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_126" id="abu_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'abu_126')">
                                                                                        <label for="abu_126"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_126" id="hitam_126" value="1" class="mr-1" onchange="changeColor('warna_126', 'hitam_126')">
                                                                                        <label for="hitam_126"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_127">
                                                                                        <input type="checkbox" name="putih_127" id="putih_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'putih_127')">
                                                                                        <label for="putih_127"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_127" id="abu_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'abu_127')">
                                                                                        <label for="abu_127"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_127" id="hitam_127" value="1" class="mr-1" onchange="changeColor('warna_127', 'hitam_127')">
                                                                                        <label for="hitam_127"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_128">
                                                                                        <input type="checkbox" name="putih_128" id="putih_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'putih_128')">
                                                                                        <label for="putih_128"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_128" id="abu_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'abu_128')">
                                                                                        <label for="abu_128"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_128" id="hitam_128" value="1" class="mr-1" onchange="changeColor('warna_128', 'hitam_128')">
                                                                                        <label for="hitam_128"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_129">
                                                                                        <input type="checkbox" name="putih_129" id="putih_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'putih_129')">
                                                                                        <label for="putih_129"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_129" id="abu_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'abu_129')">
                                                                                        <label for="abu_129"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_129" id="hitam_129" value="1" class="mr-1" onchange="changeColor('warna_129', 'hitam_129')">
                                                                                        <label for="hitam_129"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_130">
                                                                                        <input type="checkbox" name="putih_130" id="putih_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'putih_130')">
                                                                                        <label for="putih_130"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_130" id="abu_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'abu_130')">
                                                                                        <label for="abu_130"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_130" id="hitam_130" value="1" class="mr-1" onchange="changeColor('warna_130', 'hitam_130')">
                                                                                        <label for="hitam_130"></label>
                                                                                    </td> 
                                                                                </tr>

























                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background:
                                                                                        linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
                                                                                        background-size: 10px 10px;">
                                                                                    </td>
                                                                                    <td width="3%" class="center"> 20-40 </td>
                                                                                    <td width="1%">2</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_37">
                                                                                        <input type="checkbox" name="putih_37" id="putih_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'putih_37')">
                                                                                        <label for="putih_37"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_37" id="abu_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'abu_37')">
                                                                                        <label for="abu_37"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_37" id="hitam_37" value="1" class="mr-1" onchange="changeColor('warna_37', 'hitam_37')">
                                                                                        <label for="hitam_37"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_38">
                                                                                        <input type="checkbox" name="putih_38" id="putih_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'putih_38')">
                                                                                        <label for="putih_38"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_38" id="abu_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'abu_38')">
                                                                                        <label for="abu_38"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_38" id="hitam_38" value="1" class="mr-1" onchange="changeColor('warna_38', 'hitam_38')">
                                                                                        <label for="hitam_38"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_39">
                                                                                        <input type="checkbox" name="putih_39" id="putih_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'putih_39')">
                                                                                        <label for="putih_39"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_39" id="abu_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'abu_39')">
                                                                                        <label for="abu_39"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_39" id="hitam_39" value="1" class="mr-1" onchange="changeColor('warna_39', 'hitam_39')">
                                                                                        <label for="hitam_39"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_40">
                                                                                        <input type="checkbox" name="putih_40" id="putih_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'putih_40')">
                                                                                        <label for="putih_40"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_40" id="abu_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'abu_40')">
                                                                                        <label for="abu_40"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_40" id="hitam_40" value="1" class="mr-1" onchange="changeColor('warna_40', 'hitam_40')">
                                                                                        <label for="hitam_40"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_41">
                                                                                        <input type="checkbox" name="putih_41" id="putih_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'putih_41')">
                                                                                        <label for="putih_41"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_41" id="abu_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'abu_41')">
                                                                                        <label for="abu_41"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_41" id="hitam_41" value="1" class="mr-1" onchange="changeColor('warna_41', 'hitam_41')">
                                                                                        <label for="hitam_41"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_42">
                                                                                        <input type="checkbox" name="putih_42" id="putih_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'putih_42')">
                                                                                        <label for="putih_42"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_42" id="abu_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'abu_42')">
                                                                                        <label for="abu_42"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_42" id="hitam_42" value="1" class="mr-1" onchange="changeColor('warna_42', 'hitam_42')">
                                                                                        <label for="hitam_42"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_43">
                                                                                        <input type="checkbox" name="putih_43" id="putih_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'putih_43')">
                                                                                        <label for="putih_43"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_43" id="abu_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'abu_43')">
                                                                                        <label for="abu_43"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_43" id="hitam_43" value="1" class="mr-1" onchange="changeColor('warna_43', 'hitam_43')">
                                                                                        <label for="hitam_43"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_44">
                                                                                        <input type="checkbox" name="putih_44" id="putih_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'putih_44')">
                                                                                        <label for="putih_44"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_44" id="abu_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'abu_44')">
                                                                                        <label for="abu_44"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_44" id="hitam_44" value="1" class="mr-1" onchange="changeColor('warna_44', 'hitam_44')">
                                                                                        <label for="hitam_44"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_45">
                                                                                        <input type="checkbox" name="putih_45" id="putih_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'putih_45')">
                                                                                        <label for="putih_45"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_45" id="abu_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'abu_45')">
                                                                                        <label for="abu_45"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_45" id="hitam_45" value="1" class="mr-1" onchange="changeColor('warna_45', 'hitam_45')">
                                                                                        <label for="hitam_45"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_46">
                                                                                        <input type="checkbox" name="putih_46" id="putih_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'putih_46')">
                                                                                        <label for="putih_46"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_46" id="abu_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'abu_46')">
                                                                                        <label for="abu_46"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_46" id="hitam_46" value="1" class="mr-1" onchange="changeColor('warna_46', 'hitam_46')">
                                                                                        <label for="hitam_46"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_47">
                                                                                        <input type="checkbox" name="putih_47" id="putih_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'putih_47')">
                                                                                        <label for="putih_47"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_47" id="abu_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'abu_47')">
                                                                                        <label for="abu_47"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_47" id="hitam_47" value="1" class="mr-1" onchange="changeColor('warna_47', 'hitam_47')">
                                                                                        <label for="hitam_47"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_48">
                                                                                        <input type="checkbox" name="putih_48" id="putih_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'putih_48')">
                                                                                        <label for="putih_48"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_48" id="abu_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'abu_48')">
                                                                                        <label for="abu_48"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_48" id="hitam_48" value="1" class="mr-1" onchange="changeColor('warna_48', 'hitam_48')">
                                                                                        <label for="hitam_48"></label>
                                                                                    </td>

                                                                                    <td width="2%" class="pattern-background" id="warna_76">
                                                                                        <input type="checkbox" name="putih_76" id="putih_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'putih_76')">
                                                                                        <label for="putih_76"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_76" id="abu_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'abu_76')">
                                                                                        <label for="abu_76"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_76" id="hitam_76" value="1" class="mr-1" onchange="changeColor('warna_76', 'hitam_76')">
                                                                                        <label for="hitam_76"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_77">
                                                                                        <input type="checkbox" name="putih_77" id="putih_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'putih_77')">
                                                                                        <label for="putih_77"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_77" id="abu_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'abu_77')">
                                                                                        <label for="abu_77"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_77" id="hitam_77" value="1" class="mr-1" onchange="changeColor('warna_77', 'hitam_77')">
                                                                                        <label for="hitam_77"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_78">
                                                                                        <input type="checkbox" name="putih_78" id="putih_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'putih_78')">
                                                                                        <label for="putih_78"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_78" id="abu_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'abu_78')">
                                                                                        <label for="abu_78"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_78" id="hitam_78" value="1" class="mr-1" onchange="changeColor('warna_78', 'hitam_78')">
                                                                                        <label for="hitam_78"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_79">
                                                                                        <input type="checkbox" name="putih_79" id="putih_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'putih_79')">
                                                                                        <label for="putih_79"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_79" id="abu_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'abu_79')">
                                                                                        <label for="abu_79"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_79" id="hitam_79" value="1" class="mr-1" onchange="changeColor('warna_79', 'hitam_79')">
                                                                                        <label for="hitam_79"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_80">
                                                                                        <input type="checkbox" name="putih_80" id="putih_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'putih_80')">
                                                                                        <label for="putih_80"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_80" id="abu_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'abu_80')">
                                                                                        <label for="abu_80"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_80" id="hitam_80" value="1" class="mr-1" onchange="changeColor('warna_80', 'hitam_80')">
                                                                                        <label for="hitam_80"></label>
                                                                                    </td>



                                                                                    <td width="2%" class="pattern-background" id="warna_131">
                                                                                        <input type="checkbox" name="putih_131" id="putih_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'putih_131')">
                                                                                        <label for="putih_131"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_131" id="abu_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'abu_131')">
                                                                                        <label for="abu_131"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_131" id="hitam_131" value="1" class="mr-1" onchange="changeColor('warna_131', 'hitam_131')">
                                                                                        <label for="hitam_131"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_132">
                                                                                        <input type="checkbox" name="putih_132" id="putih_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'putih_132')">
                                                                                        <label for="putih_132"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_132" id="abu_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'abu_132')">
                                                                                        <label for="abu_132"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_132" id="hitam_132" value="1" class="mr-1" onchange="changeColor('warna_132', 'hitam_132')">
                                                                                        <label for="hitam_132"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_133">
                                                                                        <input type="checkbox" name="putih_133" id="putih_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'putih_133')">
                                                                                        <label for="putih_133"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_133" id="abu_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'abu_133')">
                                                                                        <label for="abu_133"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_133" id="hitam_133" value="1" class="mr-1" onchange="changeColor('warna_133', 'hitam_133')">
                                                                                        <label for="hitam_133"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_134">
                                                                                        <input type="checkbox" name="putih_134" id="putih_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'putih_134')">
                                                                                        <label for="putih_134"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_134" id="abu_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'abu_134')">
                                                                                        <label for="abu_134"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_134" id="hitam_134" value="1" class="mr-1" onchange="changeColor('warna_134', 'hitam_134')">
                                                                                        <label for="hitam_134"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_135">
                                                                                        <input type="checkbox" name="putih_135" id="putih_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'putih_135')">
                                                                                        <label for="putih_135"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_135" id="abu_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'abu_135')">
                                                                                        <label for="abu_135"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_135" id="hitam_135" value="1" class="mr-1" onchange="changeColor('warna_135', 'hitam_135')">
                                                                                        <label for="hitam_135"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_136">
                                                                                        <input type="checkbox" name="putih_136" id="putih_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'putih_136')">
                                                                                        <label for="putih_136"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_136" id="abu_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'abu_136')">
                                                                                        <label for="abu_136"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_136" id="hitam_136" value="1" class="mr-1" onchange="changeColor('warna_136', 'hitam_136')">
                                                                                        <label for="hitam_136"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_137">
                                                                                        <input type="checkbox" name="putih_137" id="putih_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'putih_137')">
                                                                                        <label for="putih_137"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_137" id="abu_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'abu_137')">
                                                                                        <label for="abu_137"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_137" id="hitam_137" value="1" class="mr-1" onchange="changeColor('warna_137', 'hitam_137')">
                                                                                        <label for="hitam_137"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_138">
                                                                                        <input type="checkbox" name="putih_138" id="putih_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'putih_138')">
                                                                                        <label for="putih_138"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_138" id="abu_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'abu_138')">
                                                                                        <label for="abu_138"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_138" id="hitam_138" value="1" class="mr-1" onchange="changeColor('warna_138', 'hitam_138')">
                                                                                        <label for="hitam_138"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_139">
                                                                                        <input type="checkbox" name="putih_139" id="putih_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'putih_139')">
                                                                                        <label for="putih_139"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_139" id="abu_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'abu_139')">
                                                                                        <label for="abu_139"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_139" id="hitam_139" value="1" class="mr-1" onchange="changeColor('warna_139', 'hitam_139')">
                                                                                        <label for="hitam_139"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_140">
                                                                                        <input type="checkbox" name="putih_140" id="putih_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'putih_140')">
                                                                                        <label for="putih_140"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_140" id="abu_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'abu_140')">
                                                                                        <label for="abu_140"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_140" id="hitam_140" value="1" class="mr-1" onchange="changeColor('warna_140', 'hitam_140')">
                                                                                        <label for="hitam_140"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_141">
                                                                                        <input type="checkbox" name="putih_141" id="putih_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'putih_141')">
                                                                                        <label for="putih_141"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_141" id="abu_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'abu_141')">
                                                                                        <label for="abu_141"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_141" id="hitam_141" value="1" class="mr-1" onchange="changeColor('warna_141', 'hitam_141')">
                                                                                        <label for="hitam_141"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_142">
                                                                                        <input type="checkbox" name="putih_142" id="putih_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'putih_142')">
                                                                                        <label for="putih_142"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_142" id="abu_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'abu_142')">
                                                                                        <label for="abu_142"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_142" id="hitam_142" value="1" class="mr-1" onchange="changeColor('warna_142', 'hitam_142')">
                                                                                        <label for="hitam_142"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_143">
                                                                                        <input type="checkbox" name="putih_143" id="putih_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'putih_143')">
                                                                                        <label for="putih_143"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_143" id="abu_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'abu_143')">
                                                                                        <label for="abu_143"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_143" id="hitam_143" value="1" class="mr-1" onchange="changeColor('warna_143', 'hitam_143')">
                                                                                        <label for="hitam_143"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_144">
                                                                                        <input type="checkbox" name="putih_144" id="putih_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'putih_144')">
                                                                                        <label for="putih_144"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_144" id="abu_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'abu_144')">
                                                                                        <label for="abu_144"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_144" id="hitam_144" value="1" class="mr-1" onchange="changeColor('warna_144', 'hitam_144')">
                                                                                        <label for="hitam_144"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_145">
                                                                                        <input type="checkbox" name="putih_145" id="putih_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'putih_145')">
                                                                                        <label for="putih_145"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_145" id="abu_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'abu_145')">
                                                                                        <label for="abu_145"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_145" id="hitam_145" value="1" class="mr-1" onchange="changeColor('warna_145', 'hitam_145')">
                                                                                        <label for="hitam_145"></label>
                                                                                    </td> 
                                                                                </tr>

































                                                                                <tr>
                                                                                    <td width="10%" class="center" style="background-color: #000000;"></td>
                                                                                    <td width="3%" class="center"> > 40 <br> (detik)</td>
                                                                                    <td width="1%">1</td>
                                                                                    <td width="2%" class="pattern-background" id="warna_49">
                                                                                        <input type="checkbox" name="putih_49" id="putih_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'putih_49')">
                                                                                        <label for="putih_49"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_49" id="abu_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'abu_49')">
                                                                                        <label for="abu_49"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_49" id="hitam_49" value="1" class="mr-1" onchange="changeColor('warna_49', 'hitam_49')">
                                                                                        <label for="hitam_49"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_50">
                                                                                        <input type="checkbox" name="putih_50" id="putih_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'putih_50')">
                                                                                        <label for="putih_50"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_50" id="abu_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'abu_50')">
                                                                                        <label for="abu_50"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_50" id="hitam_50" value="1" class="mr-1" onchange="changeColor('warna_50', 'hitam_50')">
                                                                                        <label for="hitam_50"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_51">
                                                                                        <input type="checkbox" name="putih_51" id="putih_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'putih_51')">
                                                                                        <label for="putih_51"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_51" id="abu_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'abu_51')">
                                                                                        <label for="abu_51"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_51" id="hitam_51" value="1" class="mr-1" onchange="changeColor('warna_51', 'hitam_51')">
                                                                                        <label for="hitam_51"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_52">
                                                                                        <input type="checkbox" name="putih_52" id="putih_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'putih_52')">
                                                                                        <label for="putih_52"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_52" id="abu_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'abu_52')">
                                                                                        <label for="abu_52"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_52" id="hitam_52" value="1" class="mr-1" onchange="changeColor('warna_52', 'hitam_52')">
                                                                                        <label for="hitam_52"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_53">
                                                                                        <input type="checkbox" name="putih_53" id="putih_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'putih_53')">
                                                                                        <label for="putih_53"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_53" id="abu_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'abu_53')">
                                                                                        <label for="abu_53"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_53" id="hitam_53" value="1" class="mr-1" onchange="changeColor('warna_53', 'hitam_53')">
                                                                                        <label for="hitam_53"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_54">
                                                                                        <input type="checkbox" name="putih_54" id="putih_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'putih_54')">
                                                                                        <label for="putih_54"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_54" id="abu_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'abu_54')">
                                                                                        <label for="abu_54"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_54" id="hitam_54" value="1" class="mr-1" onchange="changeColor('warna_54', 'hitam_54')">
                                                                                        <label for="hitam_54"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_55">
                                                                                        <input type="checkbox" name="putih_55" id="putih_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'putih_55')">
                                                                                        <label for="putih_55"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_55" id="abu_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'abu_55')">
                                                                                        <label for="abu_55"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_55" id="hitam_55" value="1" class="mr-1" onchange="changeColor('warna_55', 'hitam_55')">
                                                                                        <label for="hitam_55"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_56">
                                                                                        <input type="checkbox" name="putih_56" id="putih_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'putih_56')">
                                                                                        <label for="putih_56"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_56" id="abu_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'abu_56')">
                                                                                        <label for="abu_56"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_56" id="hitam_56" value="1" class="mr-1" onchange="changeColor('warna_56', 'hitam_56')">
                                                                                        <label for="hitam_56"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_57">
                                                                                        <input type="checkbox" name="putih_57" id="putih_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'putih_57')">
                                                                                        <label for="putih_57"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_57" id="abu_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'abu_57')">
                                                                                        <label for="abu_57"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_57" id="hitam_57" value="1" class="mr-1" onchange="changeColor('warna_57', 'hitam_57')">
                                                                                        <label for="hitam_57"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_58">
                                                                                        <input type="checkbox" name="putih_58" id="putih_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'putih_58')">
                                                                                        <label for="putih_58"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_58" id="abu_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'abu_58')">
                                                                                        <label for="abu_58"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_58" id="hitam_58" value="1" class="mr-1" onchange="changeColor('warna_58', 'hitam_58')">
                                                                                        <label for="hitam_58"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_59">
                                                                                        <input type="checkbox" name="putih_59" id="putih_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'putih_59')">
                                                                                        <label for="putih_59"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_59" id="abu_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'abu_59')">
                                                                                        <label for="abu_59"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_59" id="hitam_59" value="1" class="mr-1" onchange="changeColor('warna_59', 'hitam_59')">
                                                                                        <label for="hitam_59"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_60">
                                                                                        <input type="checkbox" name="putih_60" id="putih_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'putih_60')">
                                                                                        <label for="putih_60"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_60" id="abu_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'abu_60')">
                                                                                        <label for="abu_60"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_60" id="hitam_60" value="1" class="mr-1" onchange="changeColor('warna_60', 'hitam_60')">
                                                                                        <label for="hitam_60"></label>
                                                                                    </td>
                                                                                                                                                                                                                                      
                                                                                    <td width="2%" class="pattern-background" id="warna_81">
                                                                                        <input type="checkbox" name="putih_81" id="putih_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'putih_81')">
                                                                                        <label for="putih_81"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_81" id="abu_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'abu_81')">
                                                                                        <label for="abu_81"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_81" id="hitam_81" value="1" class="mr-1" onchange="changeColor('warna_81', 'hitam_81')">
                                                                                        <label for="hitam_81"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_82">
                                                                                        <input type="checkbox" name="putih_82" id="putih_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'putih_82')">
                                                                                        <label for="putih_82"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_82" id="abu_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'abu_82')">
                                                                                        <label for="abu_82"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_82" id="hitam_82" value="1" class="mr-1" onchange="changeColor('warna_82', 'hitam_82')">
                                                                                        <label for="hitam_82"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_83">
                                                                                        <input type="checkbox" name="putih_83" id="putih_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'putih_83')">
                                                                                        <label for="putih_83"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_83" id="abu_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'abu_83')">
                                                                                        <label for="abu_83"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_83" id="hitam_83" value="1" class="mr-1" onchange="changeColor('warna_83', 'hitam_83')">
                                                                                        <label for="hitam_83"></label>
                                                                                    </td>                                                                                                                                                     
                                                                                    <td width="2%" class="pattern-background" id="warna_84">
                                                                                        <input type="checkbox" name="putih_84" id="putih_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'putih_84')">
                                                                                        <label for="putih_84"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_84" id="abu_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'abu_84')">
                                                                                        <label for="abu_84"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_84" id="hitam_84" value="1" class="mr-1" onchange="changeColor('warna_84', 'hitam_84')">
                                                                                        <label for="hitam_84"></label>
                                                                                    </td>
                                                                                    <td width="2%" class="pattern-background" id="warna_85">
                                                                                        <input type="checkbox" name="putih_85" id="putih_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'putih_85')">
                                                                                        <label for="putih_85"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_85" id="abu_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'abu_85')">
                                                                                        <label for="abu_85"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_85" id="hitam_85" value="1" class="mr-1" onchange="changeColor('warna_85', 'hitam_85')">
                                                                                        <label for="hitam_85"></label>
                                                                                    </td>





                                                                                    <td width="2%" class="pattern-background" id="warna_146">
                                                                                        <input type="checkbox" name="putih_146" id="putih_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'putih_146')">
                                                                                        <label for="putih_146"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_146" id="abu_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'abu_146')">
                                                                                        <label for="abu_146"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_146" id="hitam_146" value="1" class="mr-1" onchange="changeColor('warna_146', 'hitam_146')">
                                                                                        <label for="hitam_146"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_147">
                                                                                        <input type="checkbox" name="putih_147" id="putih_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'putih_147')">
                                                                                        <label for="putih_147"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_147" id="abu_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'abu_147')">
                                                                                        <label for="abu_147"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_147" id="hitam_147" value="1" class="mr-1" onchange="changeColor('warna_147', 'hitam_147')">
                                                                                        <label for="hitam_147"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_148">
                                                                                        <input type="checkbox" name="putih_148" id="putih_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'putih_148')">
                                                                                        <label for="putih_148"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_148" id="abu_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'abu_148')">
                                                                                        <label for="abu_148"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_148" id="hitam_148" value="1" class="mr-1" onchange="changeColor('warna_148', 'hitam_148')">
                                                                                        <label for="hitam_148"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_149">
                                                                                        <input type="checkbox" name="putih_149" id="putih_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'putih_149')">
                                                                                        <label for="putih_149"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_149" id="abu_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'abu_149')">
                                                                                        <label for="abu_149"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_149" id="hitam_149" value="1" class="mr-1" onchange="changeColor('warna_149', 'hitam_149')">
                                                                                        <label for="hitam_149"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_150">
                                                                                        <input type="checkbox" name="putih_150" id="putih_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'putih_150')">
                                                                                        <label for="putih_150"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_150" id="abu_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'abu_150')">
                                                                                        <label for="abu_150"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_150" id="hitam_150" value="1" class="mr-1" onchange="changeColor('warna_150', 'hitam_150')">
                                                                                        <label for="hitam_150"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_151">
                                                                                        <input type="checkbox" name="putih_151" id="putih_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'putih_151')">
                                                                                        <label for="putih_151"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_151" id="abu_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'abu_151')">
                                                                                        <label for="abu_151"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_151" id="hitam_151" value="1" class="mr-1" onchange="changeColor('warna_151', 'hitam_151')">
                                                                                        <label for="hitam_151"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_152">
                                                                                        <input type="checkbox" name="putih_152" id="putih_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'putih_152')">
                                                                                        <label for="putih_152"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_152" id="abu_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'abu_152')">
                                                                                        <label for="abu_152"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_152" id="hitam_152" value="1" class="mr-1" onchange="changeColor('warna_152', 'hitam_152')">
                                                                                        <label for="hitam_152"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_153">
                                                                                        <input type="checkbox" name="putih_153" id="putih_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'putih_153')">
                                                                                        <label for="putih_153"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_153" id="abu_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'abu_153')">
                                                                                        <label for="abu_153"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_153" id="hitam_153" value="1" class="mr-1" onchange="changeColor('warna_153', 'hitam_153')">
                                                                                        <label for="hitam_153"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_154">
                                                                                        <input type="checkbox" name="putih_154" id="putih_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'putih_154')">
                                                                                        <label for="putih_154"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_154" id="abu_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'abu_154')">
                                                                                        <label for="abu_154"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_154" id="hitam_154" value="1" class="mr-1" onchange="changeColor('warna_154', 'hitam_154')">
                                                                                        <label for="hitam_154"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_155">
                                                                                        <input type="checkbox" name="putih_155" id="putih_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'putih_155')">
                                                                                        <label for="putih_155"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_155" id="abu_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'abu_155')">
                                                                                        <label for="abu_155"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_155" id="hitam_155" value="1" class="mr-1" onchange="changeColor('warna_155', 'hitam_155')">
                                                                                        <label for="hitam_155"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_156">
                                                                                        <input type="checkbox" name="putih_156" id="putih_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'putih_156')">
                                                                                        <label for="putih_156"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_156" id="abu_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'abu_156')">
                                                                                        <label for="abu_156"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_156" id="hitam_156" value="1" class="mr-1" onchange="changeColor('warna_156', 'hitam_156')">
                                                                                        <label for="hitam_156"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_157">
                                                                                        <input type="checkbox" name="putih_157" id="putih_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'putih_157')">
                                                                                        <label for="putih_157"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_157" id="abu_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'abu_157')">
                                                                                        <label for="abu_157"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_157" id="hitam_157" value="1" class="mr-1" onchange="changeColor('warna_157', 'hitam_157')">
                                                                                        <label for="hitam_157"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_158">
                                                                                        <input type="checkbox" name="putih_158" id="putih_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'putih_158')">
                                                                                        <label for="putih_158"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_158" id="abu_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'abu_158')">
                                                                                        <label for="abu_158"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_158" id="hitam_158" value="1" class="mr-1" onchange="changeColor('warna_158', 'hitam_158')">
                                                                                        <label for="hitam_158"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_159">
                                                                                        <input type="checkbox" name="putih_159" id="putih_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'putih_159')">
                                                                                        <label for="putih_159"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_159" id="abu_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'abu_159')">
                                                                                        <label for="abu_159"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_159" id="hitam_159" value="1" class="mr-1" onchange="changeColor('warna_159', 'hitam_159')">
                                                                                        <label for="hitam_159"></label>
                                                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                    <td width="2%" class="pattern-background" id="warna_160">
                                                                                        <input type="checkbox" name="putih_160" id="putih_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'putih_160')">
                                                                                        <label for="putih_160"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="abu_160" id="abu_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'abu_160')">
                                                                                        <label for="abu_160"></label>
                                                                                        <br>
                                                                                        <input type="checkbox" name="hitam_160" id="hitam_160" value="1" class="mr-1" onchange="changeColor('warna_160', 'hitam_160')">
                                                                                        <label for="hitam_160"></label>
                                                                                    </td> 
                                                                                </tr>



                                                                            </tbody>
                                                                        </table>
                                                                        <table class="table table-sm table-striped table-bordered">
                                                                            <tr>
                                                                                <td style="color: red; font-weight: bold;">
                                                                                    Harap Diperhatikan Pilih Salah Satu Cheklis Untuk Memilih Warna
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table> -->
                                                      

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="center" colspan="33" style="background-color: #D3D3D3; color: black;">Oksitosin U/L</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="white-space: nowrap;">
                                                                            <?php for ($i = 1; $i <= 32; $i++) : ?>
                                                                                <input type="text" name="oksitosin_<?= $i ?>" id="oksitosin-<?= $i ?>" class="custom-form clear-input" style="width: 37px; display: inline-block; margin-right: 2px;">
                                                                            <?php endfor; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="center" colspan="33" style="background-color: #D3D3D3; color: black;">Tetes/Menit</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="white-space: nowrap;">
                                                                            <?php for ($i = 1; $i <= 32; $i++) : ?>
                                                                                <input type="text" name="tetes_<?= $i ?>" id="tetes-<?= $i ?>" class="custom-form clear-input" style="width: 37px; display: inline-block; margin-right: 2px;">
                                                                            <?php endfor; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>                                                                
                                                            </table>


                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="10%">
                                                                            <b>Obat dan cairan IV</b>
                                                                        </td>  
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="white-space: nowrap;">
                                                                            <?php for ($i = 1; $i <= 16; $i++) : ?>
                                                                                <textarea name="obat_cairan_<?= $i ?>" 
                                                                                        id="obat-cairan-<?= $i ?>" 
                                                                                        class="custom-form clear-input" 
                                                                                        style="width: 80px; height: 60px; display: inline-block; margin-right: 2px;"></textarea>
                                                                            <?php endfor; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <!-- // GRAFIK NT  -->
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="10">
                                                                            <div class="collapse multi-collapse mt-2" id="data-partograf">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*">
                                                                                            <div class="card-body">
                                                                                                <div id="grafik_nt"></div>
                                                                                                <div style="display: flex; justify-content: center;"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <table class="table table-sm table-striped table-bordered alatGrafik">
                                                                                            <tr>
                                                                                                <td width="3%" class="center"><b>Pilih</td>
                                                                                                <td width="5%">
                                                                                                <select id="number-nt" name="number_nt" class="rounded-select">
                                                                                                    <option value="" disabled selected hidden>angka</option>
                                                                                                    <option value="0">0</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                    <option value="11">11</option>
                                                                                                    <option value="12">12</option>
                                                                                                    <option value="13">13</option>
                                                                                                    <option value="14">14</option>
                                                                                                    <option value="15">15</option>
                                                                                                    <option value="16">16</option>
                                                                                                    <option value="17">17</option>
                                                                                                    <option value="18">18</option>
                                                                                                    <option value="16">16</option>
                                                                                                    <option value="17">17</option>
                                                                                                    <option value="18">18</option>
                                                                                                    <option value="19">19</option>
                                                                                                    <option value="20">20</option>
                                                                                                    <option value="21">21</option>
                                                                                                    <option value="22">22</option>
                                                                                                    <option value="23">23</option>
                                                                                                    <option value="24">24</option>
                                                                                                    <option value="25">25</option>
                                                                                                    <option value="26">26</option>
                                                                                                    <option value="27">27</option>
                                                                                                    <option value="28">28</option>
                                                                                                    <option value="29">29</option>
                                                                                                    <option value="30">30</option>
                                                                                                    <option value="31">31</option>
                                                                                                    <option value="32">32</option>
                                                                                                </select>                                                                                         
                                                                                                </td>
                                                                                                <td width="5%" class="center">● Nadi</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="nadi_nt" id="nadi-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-1</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="atas_nt" id="atas-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-2</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt" id="tekanan-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-3</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_3" id="tekanan-nt-3" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-4</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_4" id="tekanan-nt-4" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-5</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_5" id="tekanan-nt-5" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-6</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_6" id="tekanan-nt-6" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-7</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_7" id="tekanan-nt-7" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="5%" class="center">↕ TD-8</td>
                                                                                                <td width="5%">
                                                                                                    <input type="text" name="tekanan_nt_8" id="tekanan-nt-8" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                                                                                                </td>
                                                                                                <td width="10%" class="text-center">
                                                                                                    <button type="button" class="btn btn-success btn-xs" id="btn-nt-chart">Tambah</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <div class="card">
                                                                                            <table class="table table-no-border table-sm table-striped" id="tabel-nt">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>No</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Angka</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Nadi</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-1</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-2</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-3</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-4</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-5</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-6</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-7</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>TD-8</b></td>
                                                                                                        <td class="center" style="background-color: #D3D3D3; color: black;"><b>Nama Petugas</b></td>
                                                                                                        <td class="center alatGrafik" colspan="2" style="background-color: #D3D3D3; color: black;"><b>Alat</b></td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="body-table">
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td class="center" width="8%">
                                                                            <b>Suhu ℃
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_1" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-1"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_2" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-2"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_3" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-3"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_4" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-4"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_5" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-5"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_6" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-6"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_7" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-7"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_8" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-8"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_9" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-9"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="suhu_10" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-10"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_11" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-11"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_12" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-12"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_13" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-13"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_14" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-14"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_15" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-15"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="suhu_16" cols="30" rows="1" class="form-control clear-input custom-textarea" id="suhu-16"></textarea>
                                                                        </td>  
                                                                    </tr>    
                                                                </tbody>                             
                                                            </table>


                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td></td>  
                                                                        <td width="8%">
                                                                            <b>-----Protein
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_1" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-1"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_2" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-2"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_3" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-3"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_4" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-4"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_5" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-5"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_6" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-6"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_7" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-7"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_8" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-8"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_9" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-9"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="protein_10" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-10"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_11" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-11"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_12" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-12"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_13" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-13"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_14" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-14"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_15" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-15"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="protein_16" cols="30" rows="1" class="form-control clear-input custom-textarea" id="protein-16"></textarea>
                                                                        </td>  
                                                                    </tr>    

                                                                    <tr>
                                                                        <td width="6%"><b>Urin-----------</td>  
                                                                        <td width="4%">
                                                                            <b>-----Aseton
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_1" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-1"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_2" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-2"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_3" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-3"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_4" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-4"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_5" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-5"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_6" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-6"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_7" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-7"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_8" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-8"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_9" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-9"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="aseton_10" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-10"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_11" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-11"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_12" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-12"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_13" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-13"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_14" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-14"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_15" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-15"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="aseton_16" cols="30" rows="1" class="form-control clear-input custom-textarea" id="aseton-16"></textarea>
                                                                        </td>  
                                                                    </tr>   

                                                                    <tr>
                                                                        <td></td>  
                                                                        <td width="4%">
                                                                            <b>-----Volume
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_1" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-1"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_2" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-2"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_3" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-3"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_4" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-4"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_5" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-5"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_6" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-6"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_7" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-7"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_8" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-8"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_9" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-9"></textarea>
                                                                        </td> 
                                                                        <td>
                                                                            <textarea name="volume_10" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-10"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_11" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-11"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_12" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-12"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_13" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-13"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_14" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-14"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_15" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-15"></textarea>
                                                                        </td>  
                                                                        <td>
                                                                            <textarea name="volume_16" cols="30" rows="1" class="form-control clear-input custom-textarea" id="volume-16"></textarea>
                                                                        </td>  
                                                                    </tr>    
                                                                </tbody>                             
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </tr> 

                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse" data-target="#data-catatan-persalinan"><i class="fas fa-expand mr-1"></i>Expand</button> CATATAN PERSALINAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-catatan-persalinan">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="9"><b></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>
                                                                        <td widtd="33%" class="center" style="background-color: #D3D3D3; color: black;"><b>CATATAN PERSALINAN</b></td>
                                                                        <th width="33%" style="background-color: #D3D3D3; color: black;"></th>                  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                1. Tanggal : <input type="date" name="tgl_cp" id="tgl-cp" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                                            </div>
                                                                            <div style="margin-bottom: 10px;">
                                                                                2. Nama Bidan :  <input type="text" name="bidan_cp" id="bidan-cp" class="select2c-input ml-2">  
                                                                            </div>
                                                                            <div style="margin-bottom: 10px;">
                                                                                3. Tempat Persalinan:
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="tp_cp_1" id="tp-cp-1" value="1" class="mr-1"> Rumah ibu
                                                                                <input type="checkbox" name="tp_cp_2" id="tp-cp-2" value="1" class="mr-1 ml-3"> Puskesmas
                                                                            </div>
                                                                            <br>                                                                          
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="tp_cp_3" id="tp-cp-3" value="1" class="mr-1"> Polindes
                                                                                <input type="checkbox" name="tp_cp_4" id="tp-cp-4" value="1" class="mr-1 ml-3"> Rumah Sakit :
                                                                                <input type="text" name="tp_cp_5" id="tp-cp-5" class="custom-form clear-input d-inline-block col-lg-6"> 
                                                                           </div> 
                                                                           <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="tp_cp_6" id="tp-cp-6" value="1" class="mr-1"> Klinik swasta
                                                                                <input type="checkbox" name="tp_cp_7" id="tp-cp-7" value="1" class="mr-1 ml-3"> Lainya :
                                                                                <input type="text" name="tp_cp_8" id="tp-cp-8" class="custom-form clear-input d-inline-block col-lg-6"> 
                                                                            </div>                                                                      
                                                                        </td>

                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                4. Alamat tempat persalinan :  <textarea name="alamat_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="alamat-cp"></textarea>                                                                           
                                                                            </div>
                                                                            <div style="margin-bottom: 10px;">
                                                                                5. Catatan : <input type="checkbox" name="catatan_cp_1" id="catatan-cp-1" value="1" class="mr-1"> rujuk, kala : 
                                                                                            <input type="checkbox" name="catatan_cp_2" id="catatan-cp-2" value="1" class="mr-1">I
                                                                                            <input type="checkbox" name="catatan_cp_3" id="catatan-cp-3" value="1" class="mr-1 ml-2">II
                                                                                            <input type="checkbox" name="catatan_cp_4" id="catatan-cp-4" value="1" class="mr-1 ml-2">III
                                                                                            <input type="checkbox" name="catatan_cp_5" id="catatan-cp-5" value="1" class="mr-1 ml-2">IV
                                                                            </div>
                                                                            <div style="margin-bottom: 10px;">
                                                                                6. Alasan merujuk : <textarea name="as_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="as-cp"></textarea>
                                                                            </div>
                                                                        </td>

                                                                        <td>                                                                       
                                                                            <div style="margin-bottom: 10px;">
                                                                                7. Tempat rujukan : <input type="text" name="tr_cp" id="tr-cp" class="custom-form clear-input d-inline-block col-lg-6"> 
                                                                            </div>
                                                                            <div style="margin-bottom: 10px;">
                                                                                8. Pendamping pada saat merujuk :
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="juk_cp_1" id="juk-cp-1" value="1" class="mr-1">Bidan
                                                                                <input type="checkbox" name="juk_cp_2" id="juk-cp-2" value="1" class="mr-1 ml-3">Teman
                                                                                <input type="checkbox" name="juk_cp_3" id="juk-cp-3" value="1" class="mr-1 ml-3">Suami
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="juk_cp_4" id="juk-cp-4" value="1" class="mr-1">Dukun
                                                                                <input type="checkbox" name="juk_cp_5" id="juk-cp-5" value="1" class="mr-1 ml-3">Keluarga
                                                                                <input type="checkbox" name="juk_cp_6" id="juk-cp-6" value="1" class="mr-1 ml-3">Tdk ada
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                9. Masalah dalam kehamilan/persalinan ini :
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="mas_cp_1" id="mas-cp-1" value="1" class="mr-1">Gawat Darurat
                                                                                <input type="checkbox" name="mas_cp_2" id="mas-cp-2" value="1" class="mr-1 ml-1">Perdarahan
                                                                                <input type="checkbox" name="mas_cp_3" id="mas-cp-3" value="1" class="mr-1 ml-1">HDK
                                                                                <input type="checkbox" name="mas_cp_4" id="mas-cp-4" value="1" class="mr-1 ml-1">Infeksi
                                                                                <input type="checkbox" name="mas_cp_5" id="mas-cp-5" value="1" class="mr-1 ml-1">PMTCT
                                                                            </div>
                                                                        </td>
                                                                    </tr> 
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>

                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                                <tr>
                                                                    <th style="text-align: center; background-color: #D3D3D3; color: black;"><b>KALA I</b></th>
                                                                </tr>

                                                            <table class="table table-sm table-striped table-bordered">                                                  
                                                                <tr>
                                                                    <th width="25%"></th>
                                                                    <th width="25%"></th>
                                                                    <th width="25%"></th>                  
                                                                    <th width="25%"></th>                  
                                                                </tr>                                                        
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td>
                                                                             10. Partograf melewati garis waspada Y/T : <br>
                                                                             <textarea name="part_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="part-cp"></textarea>
                                                                        </td>
                                                                        <td>
                                                                             11. Masalah lain, sebutkan : <br>
                                                                             <textarea name="kan_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="kan-cp"></textarea>

                                                                        </td>
                                                                        <td>
                                                                             12. Penatalaksanaan masalah tersebut : <br>
                                                                             <textarea name="but_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="but-cp"></textarea>
                                                                        </td>
                                                                        <td>
                                                                             13. Hasilnya : <br>
                                                                             <textarea name="sil_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="sil-cp"></textarea>
                                                                        </td>

                                                                    </tr>                                                            
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>

                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                                <tr>
                                                                    <th style="text-align: center; background-color: #D3D3D3; color: black;"><b>KALA II</th>
                                                                </tr>
                                                            <table class="table table-sm table-striped table-bordered">                                                  
                                                                <tr>
                                                                    <th width="20%"></th>
                                                                    <th width="20%"></th>
                                                                    <th width="20%"></th>                  
                                                                    <th width="20%"></th>                  
                                                                    <th width="20%"></th>                  
                                                                </tr>                                                        
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                14. Episiotomi
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="episiotomi_cp_1" id="episiotomi-cp-1" value="1" class="mr-1">Ya, Indikasi
                                                                                <!-- <input type="text" name="episiotomi_cp_2" id="episiotomi-cp-2" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="episiotomi_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="episiotomi-cp-2"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="episiotomi_cp_3" id="episiotomi-cp-3" value="1" class="mr-1">Tidak
                                                                                <!-- <input type="text" name="episiotomi_cp_4" id="episiotomi-cp-4" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="episiotomi_cp_4" cols="15" rows="2" class="form-control clear-input custom-textarea" id="episiotomi-cp-4"></textarea>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                15. Pendamping pada saat persalinan
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="pendm_cp_1" id="pendm-cp-1" value="1" class="mr-1">Suami
                                                                                <input type="checkbox" name="pendm_cp_2" id="pendm-cp-2" value="1" class="mr-1 ml-2">Teman
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="pendm_cp_3" id="pendm-cp-3" value="1" class="mr-1">Keluarga
                                                                                <input type="checkbox" name="pendm_cp_4" id="pendm-cp-4" value="1" class="mr-1 ml-2">dukun 
                                                                                <input type="checkbox" name="pendm_cp_5" id="pendm-cp-5" value="1" class="mr-1 ml-2">tidak ada 
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                16. Gawat janin
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="gwt_cp_1" id="gwt-cp-1" value="1" class="mr-1">Ya, tindakan yang dilakukan
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- a. <input type="text" name="gwt_cp_2" id="gwt-cp-2" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                a. <textarea name="gwt_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="gwt-cp-2"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- b. <input type="text" name="gwt_cp_3" id="gwt-cp-3" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                b. <textarea name="gwt_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="gwt-cp-3"></textarea>                                                                    
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                17. Distosia bahu
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="distosia_cp_1" id="distosia-cp-1" value="1" class="mr-1">Ya, tindakan yang dilakukan
                                                                                <!-- <input type="text" name="distosia_cp_2" id="distosia-cp-2" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="distosia_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="distosia-cp-2"></textarea>                                                                    
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="distosia_cp_3" id="distosia-cp-3" value="1" class="mr-1">Tidak
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                18. Masalah lain, penatalaksanaan masalah tsb dan hasilnya
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- <input type="text" name="tsb_cp" id="tsb-cp" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="tsb_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="tsb-cp"></textarea>                                                                    
                                                                            </div>
                                                                        </td>
                                                                    </tr>                                                            
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>

                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                                <tr>
                                                                    <th style="text-align: center; background-color: #D3D3D3; color: black;"><b>KALA III</th>
                                                                </tr>
                                                            <table class="table table-sm table-striped table-bordered">                                                  
                                                                <tr>
                                                                    <th width="25%"></th>
                                                                    <th width="25%"></th>
                                                                    <th width="25%"></th>                  
                                                                    <th width="25%"></th>                  
                                                                </tr>                                                        
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                19. Inisiasi menyusui dini
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="ini_cp_1" id="ini-cp-1" value="1" class="mr-1">Ya
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="ini_cp_2" id="ini-cp-2" value="1" class="mr-1">Tidak, alasannya
                                                                                <!-- <input type="text" name="ini_cp_3" id="ini-cp-3" class="custom-form clear-input d-inline-block col-lg-7">  -->
                                                                                <textarea name="ini_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="ini-cp-3"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                20. Lama kala III <input type="text" name="iii_cp" id="iii-cp" class="custom-form clear-input d-inline-block col-lg-6"> menit
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                21. Pemberian oksitosin 10 U IM?
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="im_cp_1" id="im-cp-1" value="1" class="mr-1">Ya, waktu 
                                                                                <input type="text" name="im_cp_2" id="im-cp-2" class="custom-form clear-input d-inline-block col-lg-5"> menit sesudah persalinan
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="im_cp_3" id="im-cp-3" value="1" class="mr-1">Tidak, alasan
                                                                                <!-- <input type="text" name="im_cp_4" id="im-cp-4" class="custom-form clear-input d-inline-block col-lg-8">  -->
                                                                                <textarea name="im_cp_4" cols="15" rows="2" class="form-control clear-input custom-textarea" id="im-cp-4"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;"> Penjepitan tali pusat                                                        
                                                                                <input type="text" name="tali_cp" id="tali-cp" class="custom-form clear-input d-inline-block col-lg-4"> menit setelah bayi lahir
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                22. Pemberian ulang oksitosin (2x) ?
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="pb_cp_1" id="pb-cp-1" value="1" class="mr-1">Ya, alasan
                                                                                <!-- <input type="text" name="pb_cp_2" id="pb-cp-2" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="pb_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="pb-cp-2"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="pb_cp_3" id="pb-cp-3" value="1" class="mr-1">Tidak, alasan
                                                                                <!-- <input type="text" name="pb_cp_4" id="pb-cp-4" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="pb_cp_4" cols="15" rows="2" class="form-control clear-input custom-textarea" id="pb-cp-4"></textarea>
                                                                            </div>
                                                                        </td>  
                                                                        
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                23. Penegangan tali pusat terkendali
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="penegangan_cp_1" id="penegangan-cp-1" value="1" class="mr-1">Ya
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="penegangan_cp_2" id="penegangan-cp-2" value="1" class="mr-1">Tidak, alasan
                                                                                <!-- <input type="text" name="penegangan_cp_3" id="penegangan-cp-3" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="penegangan_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="penegangan-cp-3"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                24. Masase fundus uteri?
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="masase_cp_1" id="masase-cp-1" value="1" class="mr-1">Ya
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="masase_cp_2" id="masase-cp-2" value="1" class="mr-1">Tidak, alasan
                                                                                <!-- <input type="text" name="masase_cp_3" id="masase-cp-3" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="masase_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="masase-cp-3"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                25. Plasenta lahir lengkap <i>(intact)</i> ya/tidak
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="lahi_cp_1" id="lahi-cp-1" value="1" class="mr-1"> Jika tidak lengkap, tindakan yang dilakukan
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">a
                                                                                <!-- <input type="text" name="lahi_cp_2" id="lahi-cp-2" class="custom-form clear-input d-inline-block col-lg-12"> -->
                                                                                <textarea name="lahi_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="lahi-cp-2"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">b
                                                                                <!-- <input type="text" name="lahi_cp_3" id="lahi-cp-3" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="lahi_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="lahi-cp-3"></textarea>
                                                                            </div>
                                                                        </td>  

                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                26. Plasenta tidak lahir > 30 menit
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="senta_cp_1" id="senta-cp-1" value="1" class="mr-1">Tidak 
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="senta_cp_2" id="senta-cp-2" value="1" class="mr-1">Ya, tindakan :
                                                                                <!-- <input type="text" name="senta_cp_3" id="senta-cp-3" class="custom-form clear-input d-inline-block col-lg-8">  -->
                                                                                <textarea name="senta_cp_3" cols="15" rows="2" class="form-control clear-input custom-textarea" id="senta-cp-3"></textarea>
                                                                                
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                27. Laserasi 
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="laser_cp_1" id="laser-cp-1" value="1" class="mr-1">Ya, dimana
                                                                                <!-- <input type="text" name="laser_cp_2" id="laser-cp-2" class="custom-form clear-input d-inline-block col-lg-8">  -->
                                                                                <textarea name="laser_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="laser-cp-2"></textarea>

                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="laser_cp_3" id="laser-cp-3" value="1" class="mr-1">Tidak
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                28. Jika laserasi perineum derajat : 
                                                                                <input type="checkbox" name="jika_cp_1" id="jika-cp-1" value="1" class="mr-1">1
                                                                                <input type="checkbox" name="jika_cp_2" id="jika-cp-2" value="1" class="mr-1 ml-1">2
                                                                                <input type="checkbox" name="jika_cp_3" id="jika-cp-3" value="1" class="mr-1 ml-1">3
                                                                                <input type="checkbox" name="jika_cp_4" id="jika-cp-4" value="1" class="mr-1 ml-1">4
                                                                                <br> 
                                                                                Tindakan :
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="jika_cp_5" id="jika-cp-5" value="1" class="mr-1">Penjahitan dengan anestesi
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="jika_cp_8" id="jika-cp-8" value="1" class="mr-1">Penjahitan tanpa anestesi
                                                                            </div>
                                                                            <div style="margin-left: 20px;"> 
                                                                                <input type="checkbox" name="jika_cp_6" id="jika-cp-6" value="1" class="mr-1">Tidak dijahit,alasan
                                                                                <textarea name="jika_cp_7" cols="15" rows="2" class="form-control clear-input custom-textarea" id="jika-cp-7"></textarea>
                                                                            </div>
                                                                        </td>  

                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                29. Atonia Uteri
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="atoni_cp_1" id="atoni-cp-1" value="1" class="mr-1">ya, tindakan
                                                                                <input type="text" name="atoni_cp_2" id="atoni-cp-2" class="custom-form clear-input d-inline-block col-lg-8"> 
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="atoni_cp_3" id="atoni-cp-3" value="1" class="mr-1">Tidak 
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                30. Jumlah darah yang keluar/perdarahan 
                                                                                <input type="text" name="jum_cp" id="jum-cp" class="custom-form clear-input d-inline-block col-lg-3"> ml
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                31. Masalah dan penatalaksanaan : 
                                                                                <!-- <input type="text" name="penatalaksanaan_cp" id="penatalaksanaan-cp" class="custom-form clear-input d-inline-block col-lg-12">  -->
                                                                                <textarea name="penatalaksanaan_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="penatalaksanaan-cp"></textarea>

                                                                            </div>
                                                                        </td>                                                                                                                                           
                                                                    </tr>                                                                   
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>

                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="100%">
                                                                <tr>
                                                                    <th style="text-align: center; background-color: #D3D3D3; color: black;"><b>KALA IV</th>
                                                                </tr>
                                                            <table class="table table-sm table-striped table-bordered">                                                  
                                                                <tr>
                                                                    <th width="50%"></th>
                                                                    <th width="50%"></th>                                 
                                                                </tr>                                                        
                                                                <tbody>                                                                      
                                                                    <tr>
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                32. Masalah dan penatalaksanaan masalah :
                                                                                <!-- <input type="text" name="Masalah_cp" id="Masalah-cp" class="custom-form clear-input d-inline-block col-lg-6">  -->
                                                                                <textarea name="Masalah_cp" cols="15" rows="2" class="form-control clear-input custom-textarea" id="Masalah-cp"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                <b>BAYI BARU LAHIR </b>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                33. Berat badan
                                                                                <input type="text" name="bb_cp" id="bb-cp" class="custom-form clear-input d-inline-block col-lg-6"> gram
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                34. Panjang
                                                                                <input type="text" name="panjang_cp" id="panjang-cp" class="custom-form clear-input d-inline-block col-lg-6"> cm
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                35. Jenis Kelamin : 
                                                                                <input type="checkbox" name="jk_cp_1" id="jk-cp-1" value="1" class="mr-1"> Laki-laki
                                                                                <input type="checkbox" name="jk_cp_2" id="jk-cp-2" value="1" class="mr-1 ml-2"> Perempuan
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                36. Penilaian bayi baru lahir : 
                                                                                <input type="checkbox" name="by_cp_1" id="by-cp-1" value="1" class="mr-1"> Baik
                                                                                <input type="checkbox" name="by_cp_2" id="by-cp-2" value="1" class="mr-1 ml-2"> Ada penyulit
                                                                            </div>
                                                                        </td>  
                                                                        
                                                                        <td>
                                                                            <div style="margin-bottom: 10px;">
                                                                                37. Bayi lahir
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="by_cplh_1" id="by-cplh-1" value="1" class="mr-1"> Normal, tindakan :                                                                             
                                                                            </div> 
                                                                            <div style="margin-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="checkbox" name="by_cplh_2" id="by-cplh-2" value="1" class="mr-1 ml-2"> Mengeringkan
                                                                            </div> 
                                                                            <div style="margin-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="checkbox" name="by_cplh_3" id="by-cplh-3" value="1" class="mr-1 ml-2"> Menghangatkan
                                                                            </div> 
                                                                            <div style="margin-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="checkbox" name="by_cplh_4" id="by-cplh-4" value="1" class="mr-1 ml-2"> Rangsang taktil
                                                                            </div> 
                                                                            <div style="margin-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="checkbox" name="by_cplh_5" id="by-cplh-5" value="1" class="mr-1 ml-2"> Pakaian/selimuti bayi dan tempatkan di sisi ibu
                                                                            </div> 
                                                                            <div style="margin-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <input type="checkbox" name="by_cplh_6" id="by-cplh-6" value="1" class="mr-1 ml-2"> Tindakan pencegahan infeksi mata
                                                                            </div> 

                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="by_cplh_7" id="by-cplh-7" value="1" class="mr-1"> Cacat bawaan, sebutkan 
                                                                                <input type="text" name="by_cplh_8" id="by-cplh-8" class="custom-form clear-input d-inline-block col-lg-6"> 
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="by_cplh_9" id="by-cplh-9" value="1" class="mr-1"> Hipotermi, tindakan
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- a <input type="text" name="by_cplh_10" id="by-cplh-10" class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                                                a <textarea name="by_cplh_10" cols="15" rows="2" class="form-control clear-input custom-textarea" id="by-cplh-10"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- b <input type="text" name="by_cplh_11" id="by-cplh-11" class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                                                b <textarea name="by_cplh_11" cols="15" rows="2" class="form-control clear-input custom-textarea" id="by-cplh-11"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <!-- c <input type="text" name="by_cplh_12" id="by-cplh-12" class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                                                c <textarea name="by_cplh_12" cols="15" rows="2" class="form-control clear-input custom-textarea" id="by-cplh-12"></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                38. Pemberian ASI
                                                                            </div>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="asi_cp_1" id="asi-cp-1" value="1" class="mr-1">Ya, waktu : 
                                                                                <input type="text" name="asi_cp_2" id="asi-cp-2" class="custom-form clear-input d-inline-block col-lg-6"> jam setelah lahir
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-left: 20px;">
                                                                                <input type="checkbox" name="asi_cp_3" id="asi-cp-3" value="1" class="mr-1">Tidak, alasan
                                                                                <input type="text" name="asi_cp_4" id="asi-cp-4" class="custom-form clear-input d-inline-block col-lg-6"> 
                                                                            </div>
                                                                            <br>
                                                                            <div style="margin-bottom: 10px;">
                                                                                39. Masalah lain, sebutkan 
                                                                                <!-- <input type="text" name="sebutkan_cp_1" id="sebutkan-cp-1" class="custom-form clear-input d-inline-block col-lg-8">  -->
                                                                                <textarea name="sebutkan_cp_1" cols="15" rows="2" class="form-control clear-input custom-textarea" id="sebutkan-cp-1"></textarea>
                                                                            </div>
                                                                            <!-- <br> -->
                                                                            <div style="margin-left: 20px;"> Hasilnya :
                                                                                <!-- <input type="text" name="sebutkan_cp_2" id="sebutkan-cp-2" class="custom-form clear-input d-inline-block col-lg-10">  -->
                                                                                <textarea name="sebutkan_cp_2" cols="15" rows="2" class="form-control clear-input custom-textarea" id="sebutkan-cp-2"></textarea>
                                                                            </div>
                                                                        </td>                                                                                                                                            
                                                                    </tr>                                                                   
                                                                </tbody>                                                           
                                                            </table>
                                                        </td>
                                                    </tr> 
                                                </table>
                                            </div>
                                        </tr> 

                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse" data-target="#data-pemantauan-kala-iv"><i class="fas fa-expand mr-1"></i>Expand</button> TABEL PEMANTAUAN KALA IV
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-pemantauan-kala-iv">

                                                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <td width="1%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Jam ke</td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Waktu</td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Tekanan Darah </td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Nadi </td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Suhu </td>
                                                            <td width="15%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Tinggi Fundus Uteri </td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Kontraksi Uterus </td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Kandung Kemih </td>
                                                            <td width="10%" class="center" style="background-color: #D3D3D3; color: black;"> <b> Darah yang Keluar </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="center"> <b>1 </td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_1" id="waktu-iv-1" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_1" id="tekanan-darah-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_1" id="nadi-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_1" id="suhu-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_1" id="tfu-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_1" id="kontraksi-uterus-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_1" id="kandung-kemih-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_1" id="darah-yg-keluar-iv-1" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_2" id="waktu-iv-2" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_2" id="tekanan-darah-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_2" id="nadi-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_2" id="suhu-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_2" id="tfu-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_2" id="kontraksi-uterus-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_2" id="kandung-kemih-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_2" id="darah-yg-keluar-iv-2" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_3" id="waktu-iv-3" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_3" id="tekanan-darah-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_3" id="nadi-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_3" id="suhu-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_3" id="tfu-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_3" id="kontraksi-uterus-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_3" id="kandung-kemih-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_3" id="darah-yg-keluar-iv-3" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_4" id="waktu-iv-4" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_4" id="tekanan-darah-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_4" id="nadi-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_4" id="suhu-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_4" id="tfu-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_4" id="kontraksi-uterus-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_4" id="kandung-kemih-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_4" id="darah-yg-keluar-iv-4" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_5" id="waktu-iv-5" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_5" id="tekanan-darah-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_5" id="nadi-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_5" id="suhu-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_5" id="tfu-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_5" id="kontraksi-uterus-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_5" id="kandung-kemih-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_5" id="darah-yg-keluar-iv-5" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       

                                                        <tr>
                                                            <td class="center"> <b>2</td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_6" id="waktu-iv-6" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_6" id="tekanan-darah-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_6" id="nadi-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_6" id="suhu-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_6" id="tfu-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_6" id="kontraksi-uterus-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_6" id="kandung-kemih-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_6" id="darah-yg-keluar-iv-6" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_7" id="waktu-iv-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_7" id="tekanan-darah-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_7" id="nadi-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_7" id="suhu-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_7" id="tfu-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_7" id="kontraksi-uterus-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_7" id="kandung-kemih-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_7" id="darah-yg-keluar-iv-7" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <!-- <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_8" id="waktu-iv-8" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_8" id="tekanan-darah-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_8" id="nadi-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_8" id="suhu-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_8" id="tfu-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_8" id="kontraksi-uterus-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_8" id="kandung-kemih-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_8" id="darah-yg-keluar-iv-8" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_9" id="waktu-iv-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_9" id="tekanan-darah-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_9" id="nadi-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_9" id="suhu-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_9" id="tfu-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_9" id="kontraksi-uterus-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_9" id="kandung-kemih-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_9" id="darah-yg-keluar-iv-9" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>       
                                                        <tr>
                                                            <td class="center"> <b></td> 
                                                            <td class="center"> <input type="text" name="waktu_iv_10" id="waktu-iv-10" class="custom-form clear-input d-inline-block col-lg-10" placeholder="hh/ii"> </td> 
                                                            <td class="center"> <input type="text" name="tekanan_darah_iv_10" id="tekanan-darah-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="nadi_iv_10" id="nadi-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="suhu_iv_10" id="suhu-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="tfu_iv_10" id="tfu-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kontraksi_uterus_iv_10" id="kontraksi-uterus-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="kandung_kemih_iv_10" id="kandung-kemih-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                            <td class="center"> <input type="text" name="darah_yg_keluar_iv_10" id="darah-yg-keluar-iv-10" class="custom-form clear-input d-inline-block col-lg-10"> </td> 
                                                        </tr>                                                 -->
                                                    </tbody>  
                                                </table>
                                            </div> 
                                        </tr>              
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
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanFormPartograf()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
                <button type="button" class="btn btn-success hide" onclick="konfirmasiCetakFormPartograf()" id="btn_cetak_partograf"><i class="fas fa-fw fa-print mr-1"></i>Print</button>
                
            </div>
        </div>
    </div>
</div>
<!-- End Modal Partograf -->



<!-- // EDIT PORTOGRAF -->
<div id="modal-edit-grafik-partograf" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-grafik-partograf-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Grafik Partograf</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-grafik-partograf'); ?>
                <table class="table table-sm table-striped table-bordered" id="table-edit-grafik-partograf"> 
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="edit-id-partograf">
                            <input type="hidden" name="id_layanan_pendaftaran" id="edit-id-layanan-pendaftaran-partograf">
                            <input type="hidden" name="id_pendaftaran" id="edit-id-pendaftaran-partograf">
                            <td width="10%" class="center">Denyut jantung janin (x/menit)</td>
                            <td width="10%"><input type="number" name="denyut_partograf" id="edit-denyut-partograf"
                                class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="10%">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-info btn-xs" id="btn-update-grafik-partograf">Update</button>
                                    <button type="button" class="btn btn-secondary btn-xxs edit-button ml-1" data-dismiss="modal" style="background-color: yellow; color: black;">
                                        <i class="fas fa-fw fa-times-circle mr-1"></i>Batal
                                    </button>
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

<style>
    .rounded-select {
        border-radius: 8px; /* Sudut tumpul */
        padding: 1px;       /* Jarak dalam */
        border: 1px solid #ccc; /* Warna border */
        outline: none; /* Menghilangkan outline bawaan */
        font-size: 12px; /* Ukuran font */
        background-color: #fff; /* Warna latar */
    }
    .rounded-select:focus {
        border-color: #007bff; /* Warna border saat fokus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek bayangan saat fokus */
    }
</style>

<!-- // EDIT SERVIKS -->
<div id="modal-edit-grafik-serviks" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-grafik-serviks-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Grafik Serviks</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-grafik-serviks'); ?>
                <table class="table table-sm table-striped table-bordered" id="table-edit-grafik-serviks"> 
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="edit-id-serviks">
                            <input type="hidden" name="id_layanan_pendaftaran" id="edit-id-layanan-pendaftaran-serviks">
                            <input type="hidden" name="id_pendaftaran" id="edit-id-pendaftaran-serviks">
                            <td width="3%" class="center"><b>Pilih</td>
                            <td width="5%">                          
                            <select id="edit-number-serviks" name="number_serviks" class="rounded-select">
                                <option value="" disabled selected hidden>angka</option>
                                <option value="0">0</option>
                                <option value="0.5">0.5</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4">4</option>
                                <option value="4.5">4.5</option>
                                <option value="5">5</option>
                                <option value="5.5">5.5</option>
                                <option value="6">6</option>
                                <option value="6.5">6.5</option>
                                <option value="7">7</option>
                                <option value="7.5">7.5</option>
                                <option value="8">8</option>
                                <option value="8.5">8.5</option>
                                <option value="9">9</option>
                                <option value="9.5">9.5</option>
                                <option value="10">10</option>
                                <option value="10.5">10.5</option>
                                <option value="11">11</option>
                                <option value="11.5">11.5</option>
                                <option value="12">12</option>
                                <option value="12.5">12.5</option>
                                <option value="13">13</option>
                                <option value="13.5">13.5</option>
                                <option value="14">14</option>
                                <option value="14.5">14.5</option>
                                <option value="15">15</option>
                                <option value="15.5">15.5</option>
                                <option value="16">16</option>
                            </select> 
                            
                            </td>
                            <td width="5%" class="center">Pembukaan serviks</td>
                            <td width="5%">
                                <input type="number" name="pembukaan_serviks" id="edit-pembukaan-serviks" class="custom-form clear-input d-inline-block col-lg-10">
                            </td>
                            <td width="5%" class="center">Turunnya kepala</td>
                            <td width="5%">
                                <input type="number" name="kepala_serviks" id="edit-kepala-serviks" class="custom-form clear-input d-inline-block col-lg-10">
                            </td>
                            <td width="10%">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-info btn-xs" id="btn-update-grafik-serviks">Update</button>
                                    <button type="button" class="btn btn-secondary btn-xxs edit-button ml-1" data-dismiss="modal" style="background-color: yellow; color: black;">
                                        <i class="fas fa-fw fa-times-circle mr-1"></i>Batal
                                    </button>
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

<!-- // EDIT NT -->
<div id="modal-edit-grafik-nt" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-grafik-nt-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Grafik NT</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-grafik-nt'); ?>
                <table class="table table-sm table-striped table-bordered" id="table-edit-grafik-nt"> 
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="edit-id-nt">
                            <input type="hidden" name="id_layanan_pendaftaran" id="edit-id-layanan-pendaftaran-nt">
                            <input type="hidden" name="id_pendaftaran" id="edit-id-pendaftaran-nt">
                            <td width="3%" class="center"><b>Pilih</td>
                            <td width="5%">
                                <select id="edit-number-nt" name="number_nt" class="rounded-select">
                                    <option value="" disabled selected hidden>angka</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                </select>                                                                                         
                            </td>
                            <td width="5%" class="center">● Nadi</td>
                            <td width="5%">
                                <input type="text" name="nadi_nt" id="edit-nadi-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-1</td>
                            <td width="5%">
                                <input type="text" name="atas_nt" id="edit-atas-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-2</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt" id="edit-tekanan-nt" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-3</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_3" id="edit-tekanan-nt-3" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-4</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_4" id="edit-tekanan-nt-4" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-5</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_5" id="edit-tekanan-nt-5" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-6</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_6" id="edit-tekanan-nt-6" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-7</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_7" id="edit-tekanan-nt-7" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>
                            <td width="5%" class="center">↕ TD-8</td>
                            <td width="5%">
                                <input type="text" name="tekanan_nt_8" id="edit-tekanan-nt-8" class="custom-form clear-input d-inline-block col-lg-10 "placeholder="" onkeypress="return hanyaAngka(event)">
                            </td>

                            <td width="10%">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-info btn-xs" id="btn-update-grafik-nt">Update</button>
                                    <button type="button" class="btn btn-secondary btn-xxs edit-button ml-1" data-dismiss="modal" style="background-color: yellow; color: black;">
                                        <i class="fas fa-fw fa-times-circle mr-1"></i>Batal
                                    </button>
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
