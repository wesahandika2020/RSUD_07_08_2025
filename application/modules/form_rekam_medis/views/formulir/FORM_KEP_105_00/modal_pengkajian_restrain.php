<!-- // PR -->
<div class="modal fade" id="modal_pengkajian_restrain" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_restrain">FORM PENGKAJIAN RESTRAIN</h5>
                    <h6 class="modal-title text-muted"><small></small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_restrain class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pr">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pr">
                <input type="hidden" name="id_pasien" id="id-pasien-pr">
                <input type="hidden" name="id_pr" id="id-pr">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">     

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-pr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-pr"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pr"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-pr"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal & Jam</td>
                                    <td wdith="70%">: <span id="tanggal-jam-pr"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-pengkajian-restrain">
                                <div class="form-pengkajian-restrain">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-pengkajian-restrain"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-pengkajian-restrain"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                            
                                        </tr> 
                                        <tr>
                                            <td width="30%" class="bold"></td>
                                            <td wdith="1%" class="bold"></td>
                                            <td width="79%" class="bold"></td>
                                        </tr>
                                       
                                        <tr> 
                                            <tr>
                                                Petunjuk : beritanda (√) pada kolom yang anda anggap sesuai,
                                            </tr>                                          
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-pengkajian-restrain"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN RESTRAIN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2"id="data-pengkajian-restrain">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">PENGKAJIAN FISIK DAN MENTAL</td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">KESADARAN </td>
                                                                <td class="bold">:</td>
                                                                <td class="bold">GCS</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <span class="bold">
                                                                        E <input type="number" name="gcs_pr_1" id="gcs-pr-1"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1 gcsr"
                                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                                        V <input typevent="number" name="gcs_pr_2" id="gcs-pr-2"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1 gcsr"
                                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                                        M <input type="number" name="gcs_pr_3" id="gcs-pr-3"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1 gcsr"
                                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                                        Total : <input type="number" name="gcs_pr_4" id="gcs-pr-4"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                                            placeholder="0">
                                                                    </span>
                                                                </td>
                                                            </tr>    
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <span class="bold">
                                                                    Ukuran Pupil : Ka<input type="number" name="gcs_pr_5" id="gcs-pr-5"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1"
                                                                            placeholder="" onkeypress="return hanyaAngka(event)">mm &nbsp;&nbsp; / &nbsp;&nbsp; 
                                                                        Ki <input typevent="number" name="gcs_pr_6" id="gcs-pr-6"
                                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1"
                                                                            placeholder="" onkeypress="return hanyaAngka(event)">mm
                                                                    </span>
                                                                </td>
                                                            </tr>                                                                                               
                                                        </table>
                                                        <table class="table table-sm table-striped table-bordered"
                                                            style="margin-top: -15px">                                              
                                                        </table>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">TANDA VITAL</td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table> 
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Nadi</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="tanda_pr_1" id="tanda-pr-1"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="nadi"> x/menit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Pernafasan</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="tanda_pr_2" id="tanda-pr-2"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="pernafasan"> x/menit
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">:</td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table> 
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">Suhu</td>
                                                                <td class="bold">:</td>
                                                                <td>                              
                                                                    <input type="text" name="tanda_pr_3" id="tanda-pr-3"
                                                                        class="custom-form clear-input d-inline-block col-lg-6"placeholder="suhu"> &#8451;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold">Tekanan Darah : <input type="text" name="tanda_pr_4" id="tanda-pr-4"
                                                                        class="custom-form clear-input d-inline-block col-lg-4"placeholder="sintolik"></td>
                                                                <td>/</td>
                                                                <td>                              
                                                                    <input type="text" name="tanda_pr_5" id="tanda-pr-5"
                                                                        class="custom-form clear-input d-inline-block col-lg-6" placeholder="diastolik"> mmHg                                                                   
                                                                </td>
                                                            </tr> 
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">HASIL Observasi</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="hasil_pr_1" id="hasil-pr-1"value="1" class="mr-1"> Pasien gelisah atau delirium dan berontak
                                                                </td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="hasil_pr_2" id="hasil-pr-2"value="1" class="mr-1"> Pasien tidak kooperatif
                                                                </td>
                                                            </tr>                                                       
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="hasil_pr_3" id="hasil-pr-3"value="1" class="mr-1"> Ketidak mampuan dalam mengikuti perintah untuk tidak meninggalkan tempat tidur
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">PERTIMBANGAN KLINIS</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="pertimbangan_pr_1" id="pertimbangan-pr-1"value="1" class="mr-1"> Membahayakan diri sendiri
                                                                </td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="pertimbangan_pr_2" id="pertimbangan-pr-2"value="1" class="mr-1"> Membahayakan orang lain
                                                                </td>
                                                            </tr>                                                       
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">PENILAIAN DAN ORDER DOKTER</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="penilaian_pr_1" id="penilaian-pr-1"value="1" class="mr-1"> Restrain Non Farmakologi
                                                                </td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="penilaian_pr_2" id="penilaian-pr-2"value="1" class="mr-1 ml-3"> Restrain pergelangan tangan
                                                                </td>
                                                            </tr>                                                       
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="penilaian_pr_3" id="penilaian-pr-3"value="1" class="mr-1 ml-3"> Restrain pergelangan kaki
                                                                </td>
                                                            </tr>                                                       
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="penilaian_pr_4" id="penilaian-pr-4"value="1" class="mr-1 ml-3"> Restrain badan
                                                                </td>
                                                            </tr>                                                       
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                    <input type="checkbox" name="penilaian_pr_5" id="penilaian-pr-5"value="1" class="mr-1"> Restrain Farmakologi
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                1. <input type="text" name="penilaian_pr_6" id="penilaian-pr-6"class="custom-form clear-input d-inline-block col-lg-10" placeholder="...........">  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                2. <input type="text" name="penilaian_pr_7" id="penilaian-pr-7"class="custom-form clear-input d-inline-block col-lg-10" placeholder="...........">  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td>
                                                                3. <input type="text" name="penilaian_pr_8" id="penilaian-pr-8"class="custom-form clear-input d-inline-block col-lg-10" placeholder="...........">  
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">PENDIDIKAN RESTRAIN PADA KELUARGA</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="pendidikan_pr" id="pendidikan-pr"value="1" class="mr-1"> Keluarga sudah dijelaskan tentang restrain                              
                                                                </td>
                                                            </tr>  
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">(Perawat / Bidan)</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                <input type="text" name="perawat_bidan_pr" id="perawat-bidan-pr" class="select2c-input ml-2">                              
                                                                </td>
                                                            </tr>  
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bold"></td>
                                                                <td class="bold"></td>
                                                                <td></td>
                                                            </tr> 
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td class="bold">(Keluarga yang menyetujui,)</td>
                                                                <td class="bold">:</td>
                                                                <td>
                                                                    <input type="text" name="keluarga_pr" id="keluarga-pr"class="custom-form clear-input d-inline-block col-lg-8 mx-1" placeholder="nama keluarga">                              
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
                                                            data-toggle="collapse"
                                                            data-target="#data-pemantauan-restrain"><i
                                                                class="fas fa-expand mr-1"></i>Expand
                                                        </button>
                                                        PEMANTAUAN RESTRAIN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-pemantauan-restrain">
                                                <div class="col-lg">
                                                    <div id="buka-tutup-pr">
                                                    </div>
                                                    <div class="card">
                                                        <table class="table table-no-border table-sm table-striped"id="tabel-pr">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center"><b>No</b></th>
                                                                    <th class="center"><b>Tanggal</b></th>
                                                                    <th class="center"><b>Nama Perawat Pagi</b></th>
                                                                    <th class="center"><b>Nama Perawat Siang</b></th>
                                                                    <th class="center"><b>Nama Perawat Malam</b></th>
                                                                    <th class="center"><b>Petugas</b></th>
                                                                    <th class="center" colspan="2"><b>Alat</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                                                            <tr>
                                                                <td>
                                                                    <span class="bold">Restrain dihentikan bila :</span><br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="bold">1. Kondisi yang membahayakan sudah teratasi</span><br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="bold">2. Pasien tidak berpotensi membahayakan diri sendiri, staf, atau orang lain</span><br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span class="bold">3. Berespons baik terhadap intervensi alternatif</span><br>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
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
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianRestrain()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
                <button type="button" class="btn btn-success hide" onclick="konfirmasiCetakPengkajianRestrain()" id="btn_cetak_pengkajian_restain"><i class="fas fa-fw fa-print mr-1"></i>Print</button>

            </div>

        </div>
    </div>
</div>
<!-- End Modal Pengkajian Restrain


<!-- // PRR -->
<div id="modal-edit-pemantauan-restrain" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengkajian Restrain</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pemantauan-restrain'); ?>
                <input type="hidden" name="id" id="id-pemantauan-restrain">
                <div class="from-group">
                    <label for="pr-tanggal-pemantauan">Tanggal Pemantauan : </label>
                    <input type="text" name="pr_tanggal_pemantauan" id="pr-edit-tanggal-pemantauan"
                        class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pr">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                            <th class="center" colspan="2">Pagi</th>
                            <th class="center" colspan="2">Siang</th>
                            <th class="center" colspan="3">Malam</th>
                        </tr>
                        <tr>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 10</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 18</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 23</th>
                            <th class="center">Jam 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td>Posisi Restrain</td>
                            <td class="center"><input type="checkbox" name="posisi_p_ho" id="posisi-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_p_10" id="posisi-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_s_ho" id="posisi-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_s_18" id="posisi-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_m_ho" id="posisi-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_m_23" id="posisi-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="posisi_m_4" id="posisi-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Edukasi kepada pasien dan keluarga</td>
                            <td class="center"><input type="checkbox" name="edukasi_p_ho" id="edukasi-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_p_10" id="edukasi-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="edukasi_s_ho" id="edukasi-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_s_18" id="edukasi-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_ho" id="edukasi-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_23" id="edukasi-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_4" id="edukasi-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Cedera pada pasien</td>
                            <td class="center"><input type="checkbox" name="cedera_p_ho" id="cedera-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_p_10" id="cedera-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_s_ho" id="cedera-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_s_18" id="cedera-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_m_ho" id="cedera-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_m_23" id="cedera-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="cedera_m_4" id="cedera-edit-m-4">
                            </td>
                        </tr>

                        <tr>
                            <td>Restrain di longgarkan setiap 2 jam selama 15 menit</td>
                            <td class="center"><input type="checkbox" name="restrain_p_ho" id="restrain-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_p_10" id="restrain-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_s_ho" id="restrain-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_s_18" id="restrain-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_m_ho" id="restrain-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_m_23" id="restrain-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="restrain_m_4" id="restrain-edit-m-4">
                            </td>
                        </tr>
                       
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="ttd_p_ho" id="ttd-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_p_10" id="ttd-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="ttd_s_ho" id="ttd-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_s_18" id="ttd-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_ho" id="ttd-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_23" id="ttd-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_4" id="ttd-edit-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_1" id="inisial-perawat-edit-1"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_2" id="inisial-perawat-edit-2"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_3" id="inisial-perawat-edit-3"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-pr">
            </div>
        </div>
    </div>
</div>
