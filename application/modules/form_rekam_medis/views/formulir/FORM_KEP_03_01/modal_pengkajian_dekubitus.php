<!-- // PRLTDDP -->
<div class="modal fade" id="modal_pengkajian_dekubitus" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_dekubitus">FORM PENGKAJIAN DEKUBITUS</h5>
                    <h6 class="modal-title text-muted"><small></small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_dekubitus class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-prltddp">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-prltddp">
                <input type="hidden" name="id_pasien" id="id-pasien-prltddp">
                <input type="hidden" name="id_prltddp" id="id-prltddp">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">     
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-prltddp"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-prltddp"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-prltddp"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-prltddp"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-prltddp"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal Masuk</td>
                                    <td wdith="70%">: <span id="tanggal-prltddp"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <!-- <div id="wizard-pengkajian-dekubitus"> -->
                                <div class="form-pengkajian-dekubitus">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-pengkajian-dekubitus"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-pengkajian-dekubitus"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>                                           
                                        </tr> 
                                        <tr>
                                            <td width="30%" class="bold"></td>
                                            <td wdith="1%" class="bold"></td>
                                            <td width="79%" class="bold"></td>
                                        </tr>
                                       
                                        <tr>                                          
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse" data-target="#data-pengkajian-dekubitus"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN RESIKO LUKA TEKAN/DEKUBITUS DAN PEMANTAUAN 
                                                    </td>
                                                </tr>
                                            </table>

                                            <div class="collapse multi-collapse mt-2" id="data-pengkajian-dekubitus">
                                                <div class="col-lg">
                                                    <div id="buka-tutup-prltddp">
                                                    </div>
                                                    <div class="card">
                                                        <table class="table table-sm table-striped table-bordered"id="tabel-prltddp">
                                                            <thead style="background-color: #B0C4DE;">
                                                                <tr>
                                                                    <th class="center"><b>No</b></th>
                                                                    <th class="center"><b>Tanggal</b></th>
                                                                    <th class="center"><b>Jam</b></th>
                                                                    <th class="center"><b>Total Skor</b></th>
                                                                    <th class="center"><b>Paraf</b></th>
                                                                    <th class="center"><b>Nama (Perawat / Bidan)</b></th>                                                                
                                                                    <th class="center"><b>Petugas</b></th>
                                                                    <th class="center" colspan="2"><b>Alat</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
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
                                                            data-target="#data-pemantauan-dekubitus"><i
                                                                class="fas fa-expand mr-1"></i>Expand
                                                        </button>
                                                        PEMANTAUAN PASIEN RESIKO LUKA TEKAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-pemantauan-dekubitus">
                                                <div class="col-lg">
                                                    <div id="buka-tutup-pprlt">
                                                    </div>
                                                    <div class="card">
                                                        <table class="table table-sm table-striped table-bordered"id="tabel-pprlt">
                                                            <thead style="background-color: #B0C4DE;">
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
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </tr>
                                    </table>                                     
                                </div>
                                <?= form_close() ?>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianDekubitus()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pengkajian resiko luka tekan / dekubitus dan pemantauan



<!-- // PRLTDDP -->
<div id="modal-edit-pengkajian-dekubitus" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Pengkajian Pasien Resiko Luka Tekan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengkajian-dekubitus'); ?>
                <input type="hidden" name="id" id="id-pengkajian-dekubitus">
                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td>
                            Tanggal Pengkajian
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" name="tanggal_jam_prltddp" id="edit-tanggal-jam-prltddp" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jam Pengkajian
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" name="prltddp_jam" id="edit-prltddp-jam" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="">
                        </td>
                    </tr>
                </table>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-prltddp">
                    <tbody>
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10%" class="center"><b>PENILAIAN</b></th>
                                    <th width="15%" class="center"><b>4</b></th>
                                    <th width="15%" class="center"><b>3</b></th>
                                    <th width="15%" class="center"><b>2</b></th>
                                    <th width="15%" class="center"><b>1</b></th>                               
                                </tr>                          
                                <tr>
                                    <th class="center v-center"> <input type="hidden" id="penilaian-edit-prd-fisik"> Kondisi Fisik</th>
                                    <td class="center"><input type="radio" name="prd_fisik" id="edit-prd-fisik-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Baik</td>
                                    <td class="center"><input type="radio" name="prd_fisik" id="edit-prd-fisik-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Sedang</td>
                                    <td class="center"><input type="radio" name="prd_fisik" id="edit-prd-fisik-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Buruk</td>
                                    <td class="center"><input type="radio" name="prd_fisik" id="edit-prd-fisik-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Sangat buruk</td>                           
                                </tr>
                                <tr>
                                    <th  class="center v-center"> <input type="hidden" id="penilaian-edit-prd-mental"> Status Mental</th>
                                    <td class="center"><input type="radio" name="prd_mental" id="edit-prd-mental-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Sadar</td>
                                    <td class="center"><input type="radio" name="prd_mental" id="edit-prd-mental-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Apatis</td>
                                    <td class="center"><input type="radio" name="prd_mental" id="edit-prd-mental-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Bingung</td>
                                    <td class="center"><input type="radio" name="prd_mental" id="edit-prd-mental-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Stupor</td>
                                </tr>
                                <tr>
                                    <th  class="center v-center">  <input type="hidden" id="penilaian-edit-prd-aktifitas"> Aktifitas</th>
                                    <td class="center"><input type="radio" name="prd_aktifitas" id="edit-prd-aktifitas-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Jalan sendiri</td>
                                    <td class="center"><input type="radio" name="prd_aktifitas" id="edit-prd-aktifitas-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Jalan dengan bantuan</td>
                                    <td class="center"><input type="radio" name="prd_aktifitas" id="edit-prd-aktifitas-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Kursi roda</td>
                                    <td class="center"><input type="radio" name="prd_aktifitas" id="edit-prd-aktifitas-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Di tempat tidur</td>
                                </tr>
                                <tr>
                                    <th  class="center v-center"> <input type="hidden" id="penilaian-edit-prd-mobilitas"> Mobilitas</th>                               
                                    <td class="center"><input type="radio" name="prd_mobilitas" id="edit-prd-mobilitas-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Bebas bergerak</td>
                                    <td class="center"><input type="radio" name="prd_mobilitas" id="edit-prd-mobilitas-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Agak terbatas</td>
                                    <td class="center"><input type="radio" name="prd_mobilitas" id="edit-prd-mobilitas-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Sangat terbatas</td>
                                    <td class="center"><input type="radio" name="prd_mobilitas" id="edit-prd-mobilitas-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Tidak mampu bergerak</td>                               
                                </tr>
                                <tr>
                                    <th  class="center v-center"> <input type="hidden" id="penilaian-edit-prd-inkontinensia"> Inkontinensia</th>
                                    <td class="center"><input type="radio" name="prd_inkontinensia" id="edit-prd-inkontinensia-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Kontinen</td>
                                    <td class="center"><input type="radio" name="prd_inkontinensia" id="edit-prd-inkontinensia-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Kadang-kadang inkontinensia urin</td>
                                    <td class="center"><input type="radio" name="prd_inkontinensia" id="edit-prd-inkontinensia-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Selalu inkontinensia urin</td>
                                    <td class="center"><input type="radio" name="prd_inkontinensia" id="edit-prd-inkontinensia-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Inkontinensia urin & Alvi</td>
                                </tr>
                                <tr>
                                    <th  class="center v-center"><b>Total Skor</b></th>
                                    <td class="center"><input type="number" min="0" name="total_nilai_prd" id="edit-total-nilai-prd" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>                              
                                </tr>
                            </thead>
                        </table>

                        <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                            <tr>
                                <span class="bold">Keterangan :</span><br>
                            </tr>
                            <tr>
                                <span class="bold">Tidak terjadi resiko dekubitus : 16-20 </span><br>
                            </tr>
                            <tr>
                                <span class="bold">Kemungkinan kecil terjadi resiko dekubitus : 12-15</span><br>
                            </tr>
                            <tr>
                                <span class="bold">Besar terjadi dekubitus : < 12 </span><br>
                            </tr>
                        </table>

                        <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>

                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%" class="center"><b></b></th>
                                    <th width="1%" class="center"><b></b></th>
                                    <th width="10%" class="center"><b></b></th>
                                    <th width="10%" class="center"><b></b></th>
                                    <th width="10%" class="center"><b></b></th>
                                    <th width="10%" class="center"><b></b></th>
                                </tr>
                                <tr>
                                    <th class="bold">Luka yang di dapat di RS</th>
                                    <td class="center">:</td>
                                    <td class=""><input type="checkbox" name="luka_rs_1" id="edit-luka-rs-1" value="1" class="mr-1 ">Tidak</td>
                                    <td class=""><input type="checkbox" name="luka_rs_2" id="edit-luka-rs-2" value="1" class="mr-1 ">Ya,</td>
                                    <td colspan="3">sejak kapan &nbsp;&nbsp;<input type="text" name="luka_rs_3" id="edit-luka-rs-3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="....." ></td>
                                    <!-- <td class="center"></td> -->
                                    <!-- <td class="center"></td>                                                   -->
                                </tr>
                                <tr>
                                    <th class="bold">Jika Ya,</th>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                </tr>
                                <tr>
                                    <th class="bold">Etiologi Luka</th>
                                    <td class="center">:</td>
                                    <td class=""><input type="checkbox" name="etiologi_luka_1" id="edit-etiologi-luka-1" value="1" class="mr-1 ">Bedah</td>
                                    <td class=""><input type="checkbox" name="etiologi_luka_2" id="edit-etiologi-luka-2" value="1" class="mr-1 ">Trauma</td>
                                    <td class=""><input type="checkbox" name="etiologi_luka_3" id="edit-etiologi-luka-3" value="1" class="mr-1 ">Tekanan</td>
                                    <td class=""><input type="checkbox" name="etiologi_luka_4" id="edit-etiologi-luka-4" value="1" class="mr-1 ">Lain-lain</td>
                                    <td class=""><input type="text" name="etiologi_luka_5" id="edit-etiologi-luka-5" class="custom-form clear-input d-inline-block col-lg-8" placeholder="....." ></td>                                                           
                                </tr>
                                <tr>
                                    <th class="bold">Gambaran klinis Luka</th>
                                    <td class="center">:</td>
                                    <td class=""><input type="checkbox" name="gambar_klinis_1" id="edit-gambar-klinis-1" value="1" class="mr-1 ">Necrotic/hitam</td>
                                    <td class=""><input type="checkbox" name="gambar_klinis_2" id="edit-gambar-klinis-2" value="1" class="mr-1 ">Kuning</td>
                                    <td class=""><input type="checkbox" name="gambar_klinis_3" id="edit-gambar-klinis-3" value="1" class="mr-1 ">Merah/Granul</td>
                                    <td class=""><input type="checkbox" name="gambar_klinis_4" id="edit-gambar-klinis-4" value="1" class="mr-1 ">Ephitelisasi</td>
                                    <td class="center"></td>                                                           
                                </tr>
                                <tr>
                                    <th class="bold">Eksudat</th>
                                    <td class="center">:</td>
                                    <td class=""><input type="checkbox" name="eksudat_1" id="edit-eksudat-1" value="1" class="mr-1 ">Tidak ada</td>
                                    <td class=""><input type="checkbox" name="eksudat_2" id="edit-eksudat-2" value="1" class="mr-1 ">Sedikit</td>
                                    <td class=""><input type="checkbox" name="eksudat_3" id="edit-eksudat-3" value="1" class="mr-1 ">Sedang</td>
                                    <td class=""><input type="checkbox" name="eksudat_4" id="edit-eksudat-4" value="1" class="mr-1 ">Banyak</td>
                                    <td class="center"></td>                                                           
                                </tr>
                                <tr>
                                    <th class="bold">Bau</th>
                                    <td class="center">:</td>
                                    <td class=""><input type="checkbox" name="bau_1" id="edit-bau-1" value="1" class="mr-1 ">Tidak</td>
                                    <td class=""><input type="checkbox" name="bau_2" id="edit-bau-2" value="1" class="mr-1 ">Sedikit</td>
                                    <td class=""><input type="checkbox" name="bau_3" id="edit-bau-3" value="1" class="mr-1 ">Sangat</td>
                                    <td class="center"></td>
                                    <td class="center"></td>                                                        
                                </tr>                     
                            </thead>
                        </table>

                        <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                            <tr>
                                <td>
                                    <span class="bold">*Jika sudah terjadi luka Tekan/Decubitus</span><br>
                                </td>                                                    
                                <td></td>                                                 
                            </tr>
                        </table>

                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="15%" class="center"><b></b></th>
                                    <th width="15%" class="center"><b></b></th>
                                    <th width="15%" class="center"><b></b></th>
                                    <th width="15%" class="center"><b></b></th>
                                    <th width="15%" class="center"><b></b></th>
                                    <th width="20%" class="center"><b></b></th>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <!-- <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>                                                        
                                    <td class=""></td>    -->
                                    <td class="center"> <span class="bold">(Perawat / Bidan)</span></td>                                                     
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <!-- <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>  
                                    <td class=""></td> -->
                                    <td class="center"> 
                                        <input type="text" name="perawat_bidan_prltddp" id="edit-perawat-bidan-prltddp" class="select2c-input ml-2">                              
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <!-- <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td> -->
                                    <td class="center"> 
                                        <span class="bold">( Tanda Tangan dan Nama Jelas )</span>
                                    </td>                                                                                                                                                                                                         
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <!-- <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td> -->
                                    <td class="center"> 
                                        <input type="checkbox" name="ceklis_prltddp" id="edit-ceklis-prltddp" class="mr-1 ">  
                                    </td>                                                                                                                                              
                                </tr>
                            </thead>
                        </table>                     
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-prltddp">
            </div>
        </div>
    </div>
</div>



<!-- // PRRLK -->
<div id="modal-edit-pemantauan-dekubitus" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Pemantauan Pasien Resiko Luka Tekan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pemantauan-dekubitus'); ?>
                <input type="hidden" name="id" id="id-pemantauan-dekubitus">
                <div class="from-group">
                    <label for="pprlt-tanggal-pemantauan">Tanggal Pemantauan : </label>
                    <input type="text" name="pprlt_tanggal_pemantauan" id="pprlt-edit-tanggal-pemantauan"
                        class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pprlt">
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
                            <td>Mengecek kondisi kulit pasien</td>
                            <td class="center"><input type="checkbox" name="mengecek_p_ho" id="mengecek-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_p_10" id="mengecek-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_s_ho" id="mengecek-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_s_18" id="mengecek-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_m_ho" id="mengecek-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_m_23" id="mengecek-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="mengecek_m_4" id="mengecek-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Mempertahankan kebersihan tempat tidur pasien</td>
                            <td class="center"><input type="checkbox" name="mempertahankan_p_ho" id="mempertahankan-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_p_10" id="mempertahankan-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_s_ho" id="mempertahankan-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_s_18" id="mempertahankan-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_ho" id="mempertahankan-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_23" id="mempertahankan-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_4" id="mempertahankan-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Mengubah posisi pasien secara teratur</td>
                            <td class="center"><input type="checkbox" name="mengubah_p_ho" id="mengubah-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_p_10" id="mengubah-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_s_ho" id="mengubah-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_s_18" id="mengubah-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_m_ho" id="mengubah-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_m_23" id="mengubah-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="mengubah_m_4" id="mengubah-edit-m-4">
                            </td>
                        </tr>

                        <tr>
                            <td>Memeriksa kondisi matras decubitus pasien</td>
                            <td class="center"><input type="checkbox" name="memeriksa_p_ho" id="memeriksa-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_p_10" id="memeriksa-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_s_ho" id="memeriksa-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_s_18" id="memeriksa-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_ho" id="memeriksa-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_23" id="memeriksa-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_4" id="memeriksa-edit-m-4">
                            </td>
                        </tr>
                       
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="ttdd_p_ho" id="ttdd-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_p_10" id="ttdd-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="ttdd_s_ho" id="ttdd-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_s_18" id="ttdd-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_ho" id="ttdd-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_23" id="ttdd-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_4" id="ttdd-edit-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_1" id="inisialt-perawat-edit-1"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_2" id="inisialt-perawat-edit-2"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_3" id="inisialt-perawat-edit-3"
                                        class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-pprlt">
            </div>
        </div>
    </div>
</div>

