<!-- // FODTI -->
<div class="modal fade" id="modal_formulir_observasi_igd" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_formulir_observasi_igd">FORM FORMULIR OBSERVASI DAN TINDAKAN IGD</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_formulir_observasi_igd class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-fodti">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-fodti">
                <input type="hidden" name="id_pasien" id="id-pasien-fodti">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-fodti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-fodti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-fodti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-fodti"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="data-formulir-observasi-igd">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #B0E0E6; color: black;"><b>Formulir Observasi dan Tindakan IGD</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-fodti">
                                    </div>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-fodti">
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>No</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Jam</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>سْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>اَلْحَمْدُ للَّهِ رَبِّ الْعالَمِينَ</td>                                           
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Paraf</td>                                             
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Nama Perawat</td>                                             
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanFormulirObservasiIGD()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- FODTI  -->


<!-- // FODTI Edit -->
<div id="modal-edit-formulir-observasi-igd" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Formulir Observasi dan Tindakan IGD</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-formulir-observasi-igd'); ?>
                <input type="hidden" name="id" id="id-formulir-observasi-igd">
                <div class="table-responsive">
                    <div class="row">                
                        <div class="col">
                            <table class="table table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Tgl</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Jam</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black; writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                                            Bismillahirrohmanirrohim
                                        </th>
                                        <th class="center" colspan="2" style="background-color: #B0E0E6; color: black;">Td</th>
                                        <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Nadi</th>
                                        <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">RR</th>
                                        <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Suhu</th>
                                        <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Sat o2</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Kategori EWS</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Skala Nyeri</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Resiko Jatuh</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Kesadaran</th>
                                        <th class="center" colspan="3" style="background-color: #B0E0E6; color: black;">Neuorogi</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Pemeriksaan Diagnostik</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Tgl</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Jam</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Implementasi</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black; writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                                        Alhamdulillahirobbil'alamin</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">TTd</th>
                                        <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Nama Perawat</th>                           
                                    </tr>  
                                    <tr>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">S</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">D</th>
                                        <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">GCS / E / M / V Total</th>
                                        <th class="center" colspan="2" style="background-color: #B0E0E6; color: black;">Pupil</th>
                                    </tr>   
                                    <tr>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">mmHg</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">mmHg</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">/menit</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">/menit</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">℃</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">%</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">Kanan</th>
                                        <th class="center" style="background-color: #B0E0E6; color: black;">Kiri</th>
                                    </tr>                                                                                                   
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="tanggal_1_fodti" id="edit-tanggal-1-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                        <td><input type="text" name="jam_1_fodti" id="edit-jam-1-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="hh:mm"></td>
                                        <td><input type="checkbox" name="bismilah_fodti" id="edit-bismilah-fodti" value="1" class="mr-1"></td>
                                        <td><input type="text" name="td_s_fodti" id="edit-td-s-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="td_d_fodti" id="edit-td-d-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="nadi_fodti" id="edit-nadi-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="rr_fodti" id="edit-rr-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="suhu_fodti" id="edit-suhu-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="sat_o2_fodti" id="edit-sat-o2-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="kategori_fodti" id="edit-kategori-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="skala_fodti" id="edit-skala-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td>
                                            <textarea name="resiko_fodti" id="edit-resiko-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="kesadaran_fodti" id="edit-kesadaran-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 5px;">E</span>
                                                <input type="text" name="gcs_e_fodti" id="edit-gcs-e-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                            </div>
                                            <p>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 5px;">M</span>
                                                <input type="text" name="gcs_m_fodti" id="edit-gcs-m-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                            </div>
                                            <p>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 5px;">V</span>
                                                <input type="text" name="gcs_v_fodti" id="edit-gcs-v-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                            </div>
                                            <p>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 5px;">Total</span>
                                                <input type="text" name="total_gcs_fodti" id="edit-total-gcs-fodti" class="custom-form clear-input" style="width: 60px;" placeholder="0">
                                            </div>
                                        </td>
                                        <td><input type="text" name="pupil_kanan_fodti" id="edit-pupil-kanan-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td><input type="text" name="pupil_kiri_fodti" id="edit-pupil-kiri-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                        <td>
                                            <textarea name="pemeriksaan_fodti" id="edit-pemeriksaan-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                        </td>
                                        <td><input type="text" name="tanggal_2_fodti" id="edit-tanggal-2-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                        <td><input type="text" name="jam_2_fodti" id="edit-jam-2-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="hh:mm"></td>
                                        <td>
                                            <textarea name="implementasi_fodti" id="edit-implementasi-fodti" class="custom-form clear-input" style="width: 300px; height: 150px;"></textarea>
                                        </td>
                                        <td><input type="checkbox" name="alhamdulilah_fodti" id="edit-alhamdulilah-fodti" value="1" class="mr-1"></td>
                                        <td><input type="checkbox" name="ttd_fodti" id="edit-ttd-fodti" value="1" class="mr-1"></td>
                                        <td><input type="text" name="perawat_fodti" id="edit-perawat-fodti" class="select2c-input"></td>                                                      
                                    </tr>
                                </tbody>                   
                            </table>                
                        </div>
                    </div>          
                </div> 
                <hr>
                <?= form_close() ?>
            </div>               
            <div class="modal-footer" id="update-fodti" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit FODTI-->