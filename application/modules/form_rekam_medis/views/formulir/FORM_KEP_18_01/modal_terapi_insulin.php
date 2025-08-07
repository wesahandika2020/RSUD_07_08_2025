<!-- // TI -->
<div class="modal fade" id="modal_terapi_insulin" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_terapi_insulin">FORM TERAPI INSULIN</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_modal_terapi_insulin class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-ti">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-ti">
                <input type="hidden" name="id_pasien" id="id-pasien-ti">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-ti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-ti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-ti"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-ti"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-ti"></span></td>
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
                            <div id="data-terapi-insulin">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center"><b>Terapi Insulin</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-ti">
                                    </div>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-ti">
								        <thead style="background-color: #B0C4DE;">
                                            <tr>
                                                <td class="center"><b>No</td>
                                                <td class="center"><b>Tanggal</td>
                                                <td class="center"><b>Jam</td>
                                                <td class="center"><b>Dokter DPJP</td>
                                                <td class="center"><b>Perawat</td>                                          
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanTerapiInsulin()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- TI  -->


<!-- // TI Edit -->
<div id="modal-edit-terapi-insulin" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit Terapi Insulin</b></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-terapi-insulin'); ?>
                <input type="hidden" name="id" id="id-terapi-insulin">
                <div class="row">
                    <table class="table table-no-border table-sm table-striped">
                        </tbody>
                            <tr>
                                <td class="center"> <b> DOKTER ( DPJP ) </td>  
                                <td> 
                                    <div class="input-group">
                                        <input type="text" name="dokter_ti" id= "edit-dokter-ti" class="select2c-input ml-2">  
                                    </div>   
                                </td>                    
                                <td></td>
                                <td></td>
                                <td></td>                                                        
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="center">Tanggal</th>
                                <th class="center">Jam</th>
                                <th class="center">Jenis Insulin</th>
                                <th class="center">Dosis</th>
                                <th class="center">Gula Darah</th>
                                <th class="center">Reduksi</th>
                                <th class="center">Keterangan</th>
                                <th class="center">Tanda tangan</th>
                                <th class="center">Nama Perawat</th>
                            </tr>
                            <tr>                             
                                <td class="center"><input type="text" name="ti_tanggal_pengkajian" id="edit-ti-tanggal-pengkajian" class=" custom-form clear-input d-inline-block col-lg-10"placeholder="dd/mm/yy"></td>
                                <td class="center"><input type="text" name="jam_ti" id="edit-jam-ti" class=" custom-form clear-input d-inline-block col-lg-8"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jenis_insulin_ti" id="edit-jenis-insulin-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="dosis_ti" id="edit-dosis-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="gula_darah_ti" id="edit-gula-darah-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="reduksi_ti" id="edit-reduksi-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td> 
                                <td class="center"><textarea name="keterangan_ti" id="edit-keterangan-ti"rows="3" class="form-control clear-input"placeholder=""></textarea></td>  
                                <td class="center"><input type="checkbox" name="ttd_ti" id="edit-ttd-ti" value="1" class="mr-1 "></td>  
                                <td class="center"><input type="text" name="perawat_ti" id= "edit-perawat-ti" class="select2c-input ml-2"> </td>   
                            </tr>
                        </thead>
                    </table>                   
                </div>
                <hr>
                <?= form_close() ?>
            </div>               
            <div class="modal-footer" id="update-ti" >
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit TI-->