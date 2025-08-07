<!-- // PAL -->
<div class="modal fade" id="modal_pemantauan_anestesi_lokal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pemantauan_anestesi_lokal">FORM PEMANTAUAN ANESTESI LOKAL</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pemantauan_anestesi_lokal class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pal">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pal">
                <input type="hidden" name="id_pasien" id="id-pasien-pal">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-pal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-pal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-pal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pal"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-pal"></span></td>
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
                            <div id="data-pemantauan-anestesi-lokal">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center"><b>Pemantauan Anestesi Lokal</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-pal">
                                    </div>
                                    <table class="table table-no-border table-sm table-striped" id="tabel-pal">
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center"><b>No</td>
                                                <td class="center"><b>Tanggal</td>
                                                <td class="center"><b>Jam Mulai Operasi</td>
                                                <td class="center"><b>Jam Selesai Operasi</td>
                                                <td class="center"><b>Perawat/Bidan</td>
                                                <td class="center"><b>Dokter</td>                                             
                                                <td class="center"><b>Petugas</td>                                               
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPemantauanAnestesiLokal()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- PAL  -->


<!-- // PAL Edit -->
<div id="modal-edit-pemantauan-anestesi-lokal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pemantauan Anestesi Lokal</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pemantauan-anestesi-lokal'); ?>
                <input type="hidden" name="id" id="id-pemantauan-anestesi-lokal">
                <div class="row">
                    <div class="from-group">
                        <label for="edit-tanggal-pemantauan-pal">Tanggal Tindakan: </label>
                        <input type="text" name="tanggal_pemantauan_pal"id="edit-tanggal-pemantauan-pal" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                    </div>
                    <p>
                    <div class="from-group">
                        <label for="edit-jam-mulai-pal">Jam Mulai Operasi : </label>
                        <input type="text" name="jam_mulai_pal"id="edit-jam-mulai-pal" class="custom-form clear-input d-inline-block col-lg-2 ml-2">
                    </div>
                    <p>
                    <div class="from-group">
                        <label for="edit-jam-selesai-pal">Jam Selesai Operasi : </label>
                        <input type="text" name="jam_selesai_pal"id="edit-jam-selesai-pal" class="custom-form clear-input d-inline-block col-lg-2 ml-2">
                    </div>
                    <hr>
                    <p>
                    <p>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pal">
                        <thead>
                            <tr>
                                <th class="center" rowspan="2"><b>Nama Obat yang Diberikan</b></th>
                                <th class="center" colspan="3">Dosis</th>
                                <th class="center" colspan="2">Vital Sign</th>
                                <th class="center" colspan="12">Jam Pemantauan</th>
                            </tr>
                            <tr>
                                <th class="center">I</th>
                                <th class="center">II</th>
                                <th class="center">III</th>
                                <th class="center">RR (o)</th>
                                <th class="center">HR (●)</th>
                                <td class="center"><input type="text" name="jam_pal_1" id="edit-jam-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>
                                <td class="center"><input type="text" name="jam_pal_2" id="edit-jam-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_3" id="edit-jam-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_4" id="edit-jam-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_5" id="edit-jam-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_6" id="edit-jam-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_7" id="edit-jam-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_8" id="edit-jam-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_9" id="edit-jam-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_10" id="edit-jam-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_11" id="edit-jam-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_12" id="edit-jam-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td> 
                            </tr>
                        </thead>
                        <tbody>            
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_1" id="edit-obat-pal-1" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_1" id="edit-dosis-pal-1" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_2" id="edit-dosis-pal-2" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_3" id="edit-dosis-pal-3" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 8 </td>
                                <td class="center"> 200 </td>
                                <td class="center"><input type="text" name="stjp_pal_1" id="edit-stjp-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_2" id="edit-stjp-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_3" id="edit-stjp-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_4" id="edit-stjp-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_5" id="edit-stjp-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_6" id="edit-stjp-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_7" id="edit-stjp-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_8" id="edit-stjp-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_9" id="edit-stjp-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_10" id="edit-stjp-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_11" id="edit-stjp-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_12" id="edit-stjp-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                      
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_2" id="edit-obat-pal-2" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_4" id="edit-dosis-pal-4" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_5" id="edit-dosis-pal-5" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_6" id="edit-dosis-pal-6" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 10 </td>
                                <td class="center"> 180 </td>
                                <td class="center"><input type="text" name="stjp_pal_13" id="edit-stjp-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_14" id="edit-stjp-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_15" id="edit-stjp-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_16" id="edit-stjp-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_17" id="edit-stjp-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_18" id="edit-stjp-pal-18" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_19" id="edit-stjp-pal-19" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_20" id="edit-stjp-pal-20" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_21" id="edit-stjp-pal-21" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_22" id="edit-stjp-pal-22" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_23" id="edit-stjp-pal-23" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_24" id="edit-stjp-pal-24" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_3" id="edit-obat-pal-3" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_7" id="edit-dosis-pal-7" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_8" id="edit-dosis-pal-8" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_9" id="edit-dosis-pal-9" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 12 </td>
                                <td class="center"> 160 </td>
                                <td class="center"><input type="text" name="stjp_pal_25" id="edit-stjp-pal-25" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_26" id="edit-stjp-pal-26" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_27" id="edit-stjp-pal-27" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_28" id="edit-stjp-pal-28" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_29" id="edit-stjp-pal-29" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_30" id="edit-stjp-pal-30" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_31" id="edit-stjp-pal-31" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_32" id="edit-stjp-pal-32" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_33" id="edit-stjp-pal-33" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_34" id="edit-stjp-pal-34" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_35" id="edit-stjp-pal-35" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_36" id="edit-stjp-pal-36" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_4" id="edit-obat-pal-4" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_10" id="edit-dosis-pal-10" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_11" id="edit-dosis-pal-11" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_12" id="edit-dosis-pal-12" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 14 </td>
                                <td class="center"> 140 </td>
                                <td class="center"><input type="text" name="stjp_pal_37" id="edit-stjp-pal-37" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_38" id="edit-stjp-pal-38" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_39" id="edit-stjp-pal-39" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_40" id="edit-stjp-pal-40" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_41" id="edit-stjp-pal-41" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_42" id="edit-stjp-pal-42" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_43" id="edit-stjp-pal-43" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_44" id="edit-stjp-pal-44" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_45" id="edit-stjp-pal-45" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_46" id="edit-stjp-pal-46" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_47" id="edit-stjp-pal-47" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_48" id="edit-stjp-pal-48" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_5" id="edit-obat-pal-5" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_13" id="edit-dosis-pal-13" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_14" id="edit-dosis-pal-14" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_15" id="edit-dosis-pal-15" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 16 </td>
                                <td class="center"> 120 </td>
                                <td class="center"><input type="text" name="stjp_pal_49" id="edit-stjp-pal-49" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_50" id="edit-stjp-pal-50" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_51" id="edit-stjp-pal-51" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_52" id="edit-stjp-pal-52" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_53" id="edit-stjp-pal-53" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_54" id="edit-stjp-pal-54" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_55" id="edit-stjp-pal-55" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_56" id="edit-stjp-pal-56" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_57" id="edit-stjp-pal-57" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_58" id="edit-stjp-pal-58" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_59" id="edit-stjp-pal-59" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_60" id="edit-stjp-pal-60" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_6" id="edit-obat-pal-6" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_16" id="edit-dosis-pal-16" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_17" id="edit-dosis-pal-17" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_18" id="edit-dosis-pal-18" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 18 </td>
                                <td class="center"> 100 </td>
                                <td class="center"><input type="text" name="stjp_pal_61" id="edit-stjp-pal-61" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_62" id="edit-stjp-pal-62" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_63" id="edit-stjp-pal-63" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_64" id="edit-stjp-pal-64" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_65" id="edit-stjp-pal-65" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_66" id="edit-stjp-pal-66" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_67" id="edit-stjp-pal-67" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_68" id="edit-stjp-pal-68" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_69" id="edit-stjp-pal-69" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_70" id="edit-stjp-pal-70" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_71" id="edit-stjp-pal-71" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_72" id="edit-stjp-pal-72" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_7" id="edit-obat-pal-7" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_19" id="edit-dosis-pal-19" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_20" id="edit-dosis-pal-20" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_21" id="edit-dosis-pal-21" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 20 </td>
                                <td class="center"> 80 </td>
                                <td class="center"><input type="text" name="stjp_pal_73" id="edit-stjp-pal-73" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_74" id="edit-stjp-pal-74" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_75" id="edit-stjp-pal-75" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_76" id="edit-stjp-pal-76" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_77" id="edit-stjp-pal-77" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_78" id="edit-stjp-pal-78" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_79" id="edit-stjp-pal-79" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_80" id="edit-stjp-pal-80" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_81" id="edit-stjp-pal-81" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_82" id="edit-stjp-pal-82" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_83" id="edit-stjp-pal-83" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_84" id="edit-stjp-pal-84" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_8" id="edit-obat-pal-8" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_22" id="edit-dosis-pal-22" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_23" id="edit-dosis-pal-23" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_24" id="edit-dosis-pal-24" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 22 </td>
                                <td class="center"> 60 </td>
                                <td class="center"><input type="text" name="stjp_pal_85" id="edit-stjp-pal-85" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_86" id="edit-stjp-pal-86" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_87" id="edit-stjp-pal-87" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_88" id="edit-stjp-pal-88" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_89" id="edit-stjp-pal-89" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_90" id="edit-stjp-pal-90" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_91" id="edit-stjp-pal-91" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_92" id="edit-stjp-pal-92" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_93" id="edit-stjp-pal-93" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_94" id="edit-stjp-pal-94" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_95" id="edit-stjp-pal-95" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_96" id="edit-stjp-pal-96" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_9" id="edit-obat-pal-9" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_25" id="edit-dosis-pal-25" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_26" id="edit-dosis-pal-26" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_27" id="edit-dosis-pal-27" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 24 </td>
                                <td class="center"> 40 </td>
                                <td class="center"><input type="text" name="stjp_pal_97" id="edit-stjp-pal-97" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_98" id="edit-stjp-pal-98" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_99" id="edit-stjp-pal-99" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_100" id="edit-stjp-pal-100" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_101" id="edit-stjp-pal-101" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_102" id="edit-stjp-pal-102" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_103" id="edit-stjp-pal-103" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_104" id="edit-stjp-pal-104" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_105" id="edit-stjp-pal-105" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_106" id="edit-stjp-pal-106" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_107" id="edit-stjp-pal-107" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_108" id="edit-stjp-pal-108" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                                            
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_10" id="edit-obat-pal-10" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_28" id="edit-dosis-pal-28" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_29" id="edit-dosis-pal-29" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_30" id="edit-dosis-pal-30" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 26 </td>
                                <td class="center"> 20 </td>         
                                <td class="center"><input type="text" name="stjp_pal_109" id="edit-stjp-pal-109" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_110" id="edit-stjp-pal-110" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_111" id="edit-stjp-pal-111" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_112" id="edit-stjp-pal-112" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_113" id="edit-stjp-pal-113" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_114" id="edit-stjp-pal-114" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_115" id="edit-stjp-pal-115" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_116" id="edit-stjp-pal-116" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_117" id="edit-stjp-pal-117" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_118" id="edit-stjp-pal-118" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_119" id="edit-stjp-pal-119" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_120" id="edit-stjp-pal-120" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                                            
                            </tr>                                        
                            <tr>
                                <td class="center"> Tekanan Darah</td>
                                <td class="center"><input type="text" name="td_pal_1" id="edit-td-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_2" id="edit-td-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_3" id="edit-td-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_4" id="edit-td-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_5" id="edit-td-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_6" id="edit-td-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_7" id="edit-td-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_8" id="edit-td-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_9" id="edit-td-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_10" id="edit-td-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_11" id="edit-td-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_12" id="edit-td-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_13" id="edit-td-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_14" id="edit-td-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_15" id="edit-td-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_16" id="edit-td-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_17" id="edit-td-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                            <tr>
                                <td class="center"> Saturasi O2</td>
                                <td class="center"><input type="text" name="so2_pal_1" id="edit-so2-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_2" id="edit-so2-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_3" id="edit-so2-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_4" id="edit-so2-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_5" id="edit-so2-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_6" id="edit-so2-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_7" id="edit-so2-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_8" id="edit-so2-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_9" id="edit-so2-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_10" id="edit-so2-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_11" id="edit-so2-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_12" id="edit-so2-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_13" id="edit-so2-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_14" id="edit-so2-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_15" id="edit-so2-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_16" id="edit-so2-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_17" id="edit-so2-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                            <tr>
                                <td class="center"> Kesadaran</td>
                                <td class="center"><input type="text" name="kd_pal_1" id="edit-kd-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_2" id="edit-kd-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_3" id="edit-kd-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_4" id="edit-kd-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_5" id="edit-kd-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_6" id="edit-kd-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_7" id="edit-kd-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_8" id="edit-kd-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_9" id="edit-kd-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_10" id="edit-kd-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_11" id="edit-kd-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_12" id="edit-kd-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_13" id="edit-kd-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_14" id="edit-kd-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_15" id="edit-kd-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_16" id="edit-kd-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_17" id="edit-kd-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                        </tbody>  
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        </tbody>
                            <tr>
                                <td> <b> Perawat / Bidan</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_pal" id= "edit-perawat-pal" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td> <b> Dokter</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="dokter_pal" id= "edit-dokter-pal" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                        </tbody>                        
                    </table>
                </div>
                <hr>
                <?= form_close() ?>
            </div>               
            <div class="modal-footer" id="update-pal" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit PAL-->