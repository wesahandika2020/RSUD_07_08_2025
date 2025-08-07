<!-- // SSCKO -->
<div class="modal fade" id="modal_surgical_safety_cheklist_kamar_operasi" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_surgical_safety_cheklist_kamar_operasi">FORM SURGICAL SAFETY CHEKLIST KAMAR OPERASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_surgical_safety_cheklist_kamar_operasi class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sscko">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sscko">
                <input type="hidden" name="id_pasien" id="id-pasien-sscko">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-sscko"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-sscko"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-sscko"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-sscko"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-sscko"></span></td>
                                </tr>
                                <!-- <tr>
                                    <td class="bold">Agama</td>
                                    <td>: <span id="agama-sscko"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat-sscko"></span></td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->
                
                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="data-surgical-safety-cheklist-kamar-operasi">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center"><b>Surgical Safety Checklist Kamar Operasi</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-sscko">
                                    </div>
                                    <table class="table table-no-border table-sm table-striped" id="tabel-sscko">
                                        <thead class="text-center">                                              
                                            <tr>                                                                             
                                                <th class="center"></th>
                                                <th class="center"></th>
                                                <th class="center">SIGN IN</th>
                                                <th class="center"></th> 
                                                <th class="center"></th>
                                                <th class="center">TIME OUT</th>
                                                <th class="center"></th>
                                                <th class="center"></th>
                                                <th class="center"></th>
                                                <th class="center">SIGN OUT</th>
                                                <th class="center"></th>
                                                <th class="center"></th>                                         
                                            </tr>
                                        </thead>
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center">No</td>
                                                <td class="center">Tanggal</td>
                                                <td class="center">Jam</td>
                                                <td class="center">Perawat Sirkuler</td>
                                                <td class="center">Dokter Anestesi</td>
                                                <td class="center">Jam</td>
                                                <td class="center">Operator</td>  
                                                <td class="center">Dokter Anestesi</td>
                                                <td class="center">Perawat Sirkuler</td>                                
                                                <td class="center">Jam</td>
                                                <td class="center">Operator</td>                                                
                                                <td class="center">Dokter Anestesi</td>
                                                <td class="center">Petugas</td>                                               
                                                <td class="center" colspan="2"><b>Alat</b></td>
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanSurgicalSafetyCheklistKamarOperasi()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal SURGICAL SAFETY CHEKLIST KAMAR OPERASI  -->


<!-- // SSCKO Edit -->
<div id="modal-edit-surgical-safety-cheklist-kamar-operasi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Surggical Safety Ceklis Kamar Operasi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-surgical-safety-cheklist-kamar-operasi'); ?>
                <input type="hidden" name="id" id="id-surgical-safety-cheklist-kamar-operasi">
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>SIGN IN</b><input type="text" name="sscko_jam_1" id="edit-sscko-jam-1" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum induksi anestesi, minimalnya oleh perawat dan dokter anestesi)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Pasien sudah dikonfirmasi</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="40%">- Identitas dan gelang pasien</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_igp" id="edit-sscko-igp" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Lokasi operasi</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_lo" id="edit-sscko-lo" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Prosedur</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_prosedur" id="edit-sscko-prosedur" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Surat izin operasi</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_sio" id="edit-sscko-sio" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Lokasi operasi sudah diberi tanda ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_tanda" id="edit-sscko-tanda-ya" value="1">Ya</td>
                                    <td><input type="radio" class="mr-2" name="sscko_tanda" id="edit-sscko-tanda-tidak" value="2">Tidak dilakukan</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td colspan="2">Mesin anestesi dan obat-obatan sudah di cek lengkap ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><input type="checkbox" class="mr-2" name="sscko_mesin" id="edit-sscko-mesin" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td colspan="2">Monitor anestesi berfungsi baik ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><input type="checkbox" class="mr-2" name="sscko_monitor" id="edit-sscko-monitor" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td colspan="2">apakah pasien mempunyai riwayat alergi ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_alergi" id="edit-sscko-alergi-tidak" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_alergi" id="edit-sscko-alergi-ya" value="1"> Ya, sebutkan <input type="text" name="sscko_sebut" id="edit-sscko-sebut" class="custom-form clear-input d-inline-block ml-1">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td colspan="2">Kemungkinan kesulitan jalan nafas atau risiko aspirasi ?</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="radio" class="mr-2" name="sscko_kemungkinan" id="edit-sscko-kemungkinan-2" value="2"> Tidak
                                    <td>
                                        <div class="input-group">
                                            <input type="radio" class="mr-2" name="sscko_kemungkinan" id="edit-sscko-kemungkinan-1" value="1">Peralatan dan asisten telah tersedia</td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td colspan="2">Risiko kehilangan darah > 500ml/kgBB pada anak ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_resiko" id="edit-sscko-resiko-2" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_resiko" id="edit-sscko-resiko-1" value="1"> Ya, Tersedia dua akses intravena/sentral dan terapi cairan sudah direncanakan
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td colspan="2">Rencana pemakaian implant ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_rencana" id="edit-sscko-rencana-tidak" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_rencana" id="edit-sscko-rencana-ya" value="1"> Ya, jenis <input type="text" name="sscko_jenis" id="edit-sscko-jenis" class="custom-form clear-input d-inline-block ml-1">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td colspan="2">Rencana anestesi</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <input type="radio" name="sscko_anastesi" id="edit-sscko-anastesi-1" value="1" class="mr-1"> Umum &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="edit-sscko-anastesi-2" value="2" class="mr-1 ml-3"> Regional  &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="edit-sscko-anastesi-3" value="3" class="mr-1 ml-3"> Blok  &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="edit-sscko-anastesi-4" value="4" class="mr-1 ml-3"> Lokal 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>TIME OUT</b><input type="text" name="sscko_jam_2" id="edit-sscko-jam-2" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum insisi kulit, diisi oleh perawat, dokter anestesi dan operator)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Konfirmasi seluruh anggota tim (nama dan peran masing-masing)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_konfirmasi" id="edit-sscko-konfirmasi" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Konfirmasi secara verbal</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="50%">- Nama pasien</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_np" id="edit-sscko-np" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Prosedur</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_prosedurr" id="edit-sscko-prosedurr" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Lokasi dimana insisi akan dibuat</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_lokasi" id="edit-sscko-lokasi" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td colspan="2">Antibiotik profilaksis telah diberikan selama 60 menit sebelumnya ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_antibiotik" id="edit-sscko-antibiotik" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td colspan="2">Antisipaasi kejadian kritis:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review dokter bedah :</b> Langkah apa yang dilakukan bila kondisi kritis atau kejadian yang tidak diharapkan, lamanya operasi, kemungkinan kehilangan darah ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_bedah" id="edit-sscko-bedah" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review dokter anestesi :</b> Apa ada hal khusus yang perlu diperhatikan pada pasien ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_anastesiii" id="edit-sscko-anastesiii" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review tim perawat :</b> Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_perawat" id="edit-sscko-perawat" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td colspan="2">Foto rongent/CT scan/MRI yang diperlukan telah ditayangkan</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="radio" name="sscko_foto" id="edit-sscko-foto-1" value="1" class="mr-1 ml-2"> Ya                                      
                                    <td>
                                        <div class="input-group">
                                            <input type="radio" name="sscko_foto" id="edit-sscko-foto-2" value="2" class="mr-1 ">Tidak dilakukan</td>
                                        </div>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>SIGN OUT</b><input type="text" name="sscko_jam_3" id="edit-sscko-jam-3" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum pasien meninggalkan OK, diisi oleh perawat, dokter anestesi dan operator)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Perawat melakukan konfirmasi secara verbal</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Nama prosedur tindakan</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_npt" id="edit-sscko-npt" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Instrumen, kasa dan jarum telah dihitung secara lengkap</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_instrumen" id="edit-sscko-instrumen" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Specimen telah diberi label (termasuk nama pasien & asal jaringan specimen)</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_specimen" id="edit-sscko-specimen" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Apakah masalah dengan peralatan selama operasi</td>
                                    <td><input type="radio" name="sscko_adakah" id="edit-sscko-adakah-ya" value="1"> Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><input type="radio" name="sscko_adakah" id="edit-sscko-adakah-tidak" value="2"> Tidak</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Operator dokter bedah, dokter anestesi dan perawat melakukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_operator" id="edit-sscko-operator" value="1">Ya</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            Tanggal tindakan verifikasi<input type="text" name="sscko_tanggal_tindakan" id="edit-sscko-tanggal-tindakan" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>KEGIATAN</th>
                                                    <th>PELAKSANA</th>
                                                    <th>TANDA TANGAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Sign In</td>
                                                    <td>1. Perawat Sirkuler</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_perawat_sign_in" id="edit-sscko-perawat-sign-in" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_perawat_sign_in"id="edit-sscko-paraf-perawat-sign-in" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_sign_in" id="edit-sscko-dokter-anestesi-sign-in" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_dokter_anestesi_sign_in"id="edit-sscko-paraf-dokter-anestesi-sign-in" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Time Out</td>
                                                    <td>1. Operator</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_operator_1" id="edit-sscko-operator-1" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_operator_1"id="edit-sscko-paraf-operator-1" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_time_out" id="edit-sscko-dokter-anestesi-time-out" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_dokter_anestesi_time_out"id="edit-sscko-paraf-dokter-anestesi-time-out" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>3. Perawat Sirkuler</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_perawat_time_out" id="edit-sscko-perawat-time-out" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_perawat_time_out"id="edit-sscko-paraf-perawat-time-out" class="mr-1"></td>
                                                </tr>                                              
                                            </tbody> 
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Sign Out</td>
                                                    <td>1. Operator</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_operator_2" id="edit-sscko-operator-2" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_operator_2"id="edit-sscko-paraf-operator-2" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_sign_out" id="edit-sscko-dokter-anestesi-sign-out" class="select2c-input"></td>
                                                    <td><input type="checkbox"name="sscko_paraf_dokter_anestesi_sign_out"id="edit-sscko-paraf-dokter-anestesi-sign-out" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <?= form_close() ?>
            </div>               
            <div class="modal-footer" id="update-sscko" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit SURGICAL SAFETY CHEKLIST KAMAR OPERASI-->
