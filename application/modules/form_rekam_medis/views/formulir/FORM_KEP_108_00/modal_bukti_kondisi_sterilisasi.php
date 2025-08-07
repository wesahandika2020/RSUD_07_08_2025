<!-- // BKS -->
<div class="modal fade" id="modal_bukti_kondisi_sterilisasi" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_bukti_kondisi_sterilisasi">FORM BUKTI KONDISI STERILISASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_bukti_kondisi_sterilisasi class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-bks">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-bks">
                <input type="hidden" name="id_pasien" id="id-pasien-bks">            
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-bks"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-bks"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-bks"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-bks"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-bks"></span></td>
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
                            <div id="data-bukti-kondisi-sterilisasi">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="color: purple; font-size: 22px;"><b>BUKTI KONDISI STERILISASI</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-bks">
                                    </div>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-bks">
                                        <thead class="text-center" style="background-color:rgb(113, 170, 245);"> 
                                            <tr>
                                                <td class="center"><b>No</td>
                                                <td class="center"><b>Tgl. Operasi</td>
                                                <td class="center"><b>Jam Mulai Operasi</td>
                                                <td class="center"><b>Jam Selesai Operasi</td>
                                                <td class="center"><b>Ahli Bedah</td>
                                                <td class="center"><b>Ahli Anestesiologi</td>
                                                <td class="center"><b>Asisten Anestesi</td>                                
                                                <td class="center"><b>Asisten I</td>  
                                                <td class="center"><b>Asisten II</td>                                              
                                                <!-- <td class="center"><b>Petugas</td>-->
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanBuktiKondisiSterilisasi()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal BUKTI KONDISI STERILISA  -->

<!-- // BKS Edit -->
<div id="modal-edit-bukti-kondisi-sterilisasi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" >Edit Bukti Kondisi Sterilisasi</h4> -->
                 <h4 class="modal-title" style="color: green; font-size: 24px;">
                    Edit Bukti Kondisi Sterilisasi
                </h4>

                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-bukti-kondisi-sterilisasi'); ?>
                <input type="hidden" name="id" id="id-bukti-kondisi-sterilisasi">
                <div class="row">

                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3" style="background-color:rgb(119, 232, 137);"> <b>Ahli Bedah : </b></td>                                     
                                </tr>
                                <tr>   
                                    <td>
                                        <input type="text" name="dokter_bks_1" id="edit-dokter-bks-1" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Ahli Anestesiologi :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="dokter_bks_2" id="edit-dokter-bks-2" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Jenis / Nama Operasi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="jenis_nama_operasi_bks" id="edit-jenis-nama-operasi-bks" class="select2c-input">
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3" style="background-color:rgb(119, 232, 137);"> <b>Asisten I : </b></td>                                     
                                </tr>
                                <tr>   
                                    <td>
                                        <input type="text" name="perawat_bks_1" id="edit-perawat-bks-1" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Asisten II :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_2" id="edit-perawat-bks-2" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b> Asisten Anestesi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_3" id="edit-perawat-bks-3" class="select2c-input">
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>


                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3" style="background-color:rgb(119, 232, 137);"> <b>Instrument : </b></td>                                     
                                </tr>
                                <tr>   
                                    <td>
                                        <input type="text" name="perawat_bks_4" id="edit-perawat-bks-4" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Sirkuler :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_5" id="edit-perawat-bks-5" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b> Jenis Anestesi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="jenis_anastesi_bks" id="edit-jenis-anastesi-bks" class="form-control" rows="2"></textarea>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
         

                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Tgl. Operasi :</b><input type="text" name="tgl_operasi_bks" id="edit-tgl-operasi-bks" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Jam Mulai Operasi :</b><input type="text" name="jam_mulai_op_bks" id="edit-jam-mulai-op-bks" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Jam Selesai Operasi :</b><input type="text" name="jam_selesai_op_bks" id="edit-jam-selesai-op-bks" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Lama Operasi : &nbsp;&nbsp;</b><textarea name="lama_operasi_bks" id="edit-lama-operasi-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table>


                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>INDIKATOR STERILISASI &nbsp;&nbsp;</b><textarea name="indikator_sterilisasi_bks" id="edit-indikator-sterilisasi-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Tgl. Steril : &nbsp;&nbsp;</b><input type="text" name="tanggal_steril_bks" id="edit-tanggal-steril-bks" class="custom-form clear-d-inline-block col-lg-1 ml-2" placeholder="dd/mm/yy"></div>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Alat / Item : &nbsp;&nbsp;</b><textarea name="alat_item_bks" id="edit-alat-item-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table>



                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td style="vertical-align:top !important">
                                    <div id="tambah-alat"></div>
                                    <div id="tambah-alat-hide" style="display:none"></div>
   
                                    <div type="hidden" name="tgl_steril_bks_0" id="tgl-steril-bks-0"></div>
                                    <div type="hidden" name="tgl_steril_bks_1" id="tgl-steril-bks-1"></div>
                                    <div type="hidden" name="tgl_steril_bks_2" id="tgl-steril-bks-2"></div>
                                    <div type="hidden" name="tgl_steril_bks_3" id="tgl-steril-bks-3"></div>
                                    <div type="hidden" name="tgl_steril_bks_4" id="tgl-steril-bks-4"></div>
                                    <div type="hidden" name="tgl_steril_bks_5" id="tgl-steril-bks-5"></div>
                                    <div type="hidden" name="tgl_steril_bks_6" id="tgl-steril-bks-6"></div>
                                    <div type="hidden" name="tgl_steril_bks_7" id="tgl-steril-bks-7"></div>
                                    <div type="hidden" name="tgl_steril_bks_8" id="tgl-steril-bks-8"></div>
                                    <div type="hidden" name="tgl_steril_bks_9" id="tgl-steril-bks-9"></div>
                                    <div type="hidden" name="tgl_steril_bks_10" id="tgl-steril-bks-10"></div>
                                    <div type="hidden" name="tgl_steril_bks_11" id="tgl-steril-bks-11"></div>
                                    <div type="hidden" name="tgl_steril_bks_12" id="tgl-steril-bks-12"></div>
                                    <div type="hidden" name="tgl_steril_bks_13" id="tgl-steril-bks-13"></div>
                                    <div type="hidden" name="tgl_steril_bks_14" id="tgl-steril-bks-14"></div>

                                    <div type="hidden" name="alat_item_bks_0" id="alat-item-bks-0"></div>
                                    <div type="hidden" name="alat_item_bks_1" id="alat-item-bks-1"></div>
                                    <div type="hidden" name="alat_item_bks_2" id="alat-item-bks-2"></div>
                                    <div type="hidden" name="alat_item_bks_3" id="alat-item-bks-3"></div>
                                    <div type="hidden" name="alat_item_bks_4" id="alat-item-bks-4"></div>
                                    <div type="hidden" name="alat_item_bks_5" id="alat-item-bks-5"></div>
                                    <div type="hidden" name="alat_item_bks_6" id="alat-item-bks-6"></div>
                                    <div type="hidden" name="alat_item_bks_7" id="alat-item-bks-7"></div>
                                    <div type="hidden" name="alat_item_bks_8" id="alat-item-bks-8"></div>
                                    <div type="hidden" name="alat_item_bks_9" id="alat-item-bks-9"></div>
                                    <div type="hidden" name="alat_item_bks_10" id="alat-item-bks-10"></div>
                                    <div type="hidden" name="alat_item_bks_11" id="alat-item-bks-11"></div>
                                    <div type="hidden" name="alat_item_bks_12" id="alat-item-bks-12"></div>
                                    <div type="hidden" name="alat_item_bks_13" id="alat-item-bks-13"></div>
                                    <div type="hidden" name="alat_item_bks_14" id="alat-item-bks-14"></div>

                                    <button type="button" class="btn btn-info btn-xs" onclick="tambahAlatItem()"><i class="fas fa-plus-circle mr-1"></i>Tambah Alat / Item</button>
                                </td>
                            </tr>
                        </thead>
                    </table>


                </div>
                <hr>
                <?= form_close() ?>
            </div>               
            <div class="modal-footer" id="update-bks" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit BUKTI KONDISI STERILISASI-->
