<!-- Start Modal Rekam Medis Baru -->
<input type="hidden" name="page_now_rmb" id="page_now_rmb">
<div id="modal-rekam-medis" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Riwayat Rekam Medis Pasien <i>(Baru)</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>  
            <div class="modal-body">
                <?= form_open('', 'id=form-rekam-medis role=form class=form-horizontal') ?>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">No. RM</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-id-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td><span id="rmb-nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td><span id="rmb-umur"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Kelamin</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-kelamin"></span></td>
                                </tr>             
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><span id="rmb-alamat"></span></td>
                                </tr>                   
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-6 d-flex justify-content-start">
                        <label class="col col-form-label">Layanan</label>
                        <select name="rmb_layanan" id="rmb-layanan" class="form-control">
                            <option value="">- Semua Layanan -</option>
                            <option value="lab">Layanan Laboratorium</option>
                        </select>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary waves-effect" onclick="reloadDataRMB()"><i class="fas fa-history"></i> Reload Data</button>
                    </div>
                </div>
				
                <!-- <div class="card-body"> -->
                <div class="table-responsive tablermb" id="parent">
                    <table id="table_rmb" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="3%"  class="text-center">No</th>
                                <th width="10%" class="center">Tanggal</th>
                                <th width="20%" class="center">Layanan</th>
                                <th width="20%" class="center">Penunjang</th>
                                <th width="20%" class="center">Resep</th>
                                <th width="27%" class="center">SOAP</th>
                            </tr>
                        </thead>    
                        <tbody></tbody>
                    </table>
                                      
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination_rmb" class="float-left"></div>
                        <div id="summary_rmb" class="float-right text-sm"></div>
                    </div>
                </div>  
                <!-- </div> -->

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">			
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rekam Medis Baru-->

<!-- Start Modal Rekam Medis Baru Anamnesa-->
<div id="modal-rekam-medis-anamnesa" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anamnesa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>  
            <div class="modal-header" style="padding-top: 5px; padding-bottom: 0px; ">
                <h6 id="detail-pasien"></h6>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-rekam-medis-anamnesa role=form class=form-horizontal') ?>

                <h6><b>I. ANAMNESA</b></h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Keluhan Utama</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-a1"></span></td>
                                </tr>
                                <tr>
                                    <td>Riwayat Penyakit Keluarga</td>
                                    <td>:</td>
                                    <td><span id="rmb-a2"></span></td>
                                </tr>
                                <tr>
                                    <td>Riwayat Penyakit Sekarang</td>
                                    <td>:</td>
                                    <td><span id="rmb-a3"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Anamnesa Sosial</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-a4"></span></td>
                                </tr>        
                                <tr>     
                                    <td>Riwayat Penyakit Dahulu</td>
                                    <td>:</td>
                                    <td><span id="rmb-a5"></span></td>
                                </tr>                   
                            </table>
                        </div>
                    </div>
                </div>      
                <hr>

                <h6><b>II. PEMERIKSAAN FISIK</b></h6>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="24%">Keadaan Umum</td>
                                    <td width="1%">:</td>
                                    <td wdith="75%"><span id="rmb-b1"></span></td>
                                </tr>
                                <tr>
                                    <td>Kesadaran</td>
                                    <td>:</td>
                                    <td><span id="rmb-b2"></span></td>
                                </tr>
                                <tr>
                                    <td>GCS</td>
                                    <td>:</td>
                                    <td ><span id="rmb-b3"></span></td>
                                </tr>        
                                <tr>     
                                    <td>Alergi</td>
                                    <td>:</td>
                                    <td><span id="rmb-b4"></span></td>
                                </tr>  
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="24%">Sistolik</td>
                                    <td width="1%">:</td>
                                    <td wdith="75%"><span id="rmb-b5"></span></td>
                                </tr>          
                                <tr>   
                                    <td>Diastolik</td>
                                    <td>:</td>
                                    <td><span id="rmb-b6"></span></td>
                                </tr>
                                <tr>
                                    <td>Suhu</td>
                                    <td>:</td>
                                    <td><span id="rmb-b7"></span></td>
                                </tr>         
                                <tr>    
                                    <td>Nadi</td>
                                    <td>:</td>
                                    <td><span id="rmb-b8"></span></td>
                                </tr>             
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="24%">Respirasi Rate</td>
                                    <td width="1%">:</td>
                                    <td wdith="75%"><span id="rmb-b9"></span></td>
                                </tr>     
                                <tr>        
                                    <td>Tinggi Badan</td>
                                    <td>:</td>
                                    <td><span id="rmb-b10"></span></td>
                                </tr>         
                                <tr>
                                    <td>Berat Badan</td>
                                    <td>:</td>
                                    <td><span id="rmb-b11"></span></td>
                                </tr>              
                            </table>
                        </div>
                    </div>
                </div>      

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="24%">Kepala</td>
                                    <td width="1%">:</td>
                                    <td wdith="75%"><span id="rmb-b12"></span></td>
                                </tr>
                                <tr>
                                    <td>Thorax</td>
                                    <td>:</td>
                                    <td><span id="rmb-b13"></span></td>
                                </tr>
                                <tr>
                                    <td>Cor</td>
                                    <td>:</td>
                                    <td ><span id="rmb-b14"></span></td>
                                </tr>        
                                <tr>     
                                    <td>Genitalia</td>
                                    <td>:</td>
                                    <td><span id="rmb-b15"></span></td>
                                </tr>    
                                <tr>     
                                    <td>Pemeriksaan Penunjang</td>
                                    <td>:</td>
                                    <td><span id="rmb-b16"></span></td>
                                </tr>    
                                <tr>     
                                    <td>Status Mentalis</td>
                                    <td>:</td>
                                    <td><span id="rmb-b17"></span></td>
                                </tr>    
                                <tr>     
                                    <td>Status Gizi</td>
                                    <td>:</td>
                                    <td><span id="rmb-b18"></span></td>
                                </tr>    
                                <tr>     
                                    <td>Hidung</td>
                                    <td>:</td>
                                    <td><span id="rmb-b19"></span></td>
                                </tr>    
                                <tr>     
                                    <td>Mata</td>
                                    <td>:</td>
                                    <td><span id="rmb-b20"></span></td>
                                </tr>  
                                <tr>     
                                    <td>Rencana Tindak Lanjut</td>
                                    <td>:</td>
                                    <td><span id="rmb-b21"></span></td>
                                </tr>  
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="24%">Leher</td>
                                    <td width="1%">:</td>
                                    <td wdith="75%"><span id="rmb-b22"></span></td>
                                </tr>          
                                <tr>   
                                    <td>Pulmo</td>
                                    <td>:</td>
                                    <td><span id="rmb-b23"></span></td>
                                </tr>
                                <tr>
                                    <td>Abdomen</td>
                                    <td>:</td>
                                    <td><span id="rmb-b24"></span></td>
                                </tr>         
                                <tr>    
                                    <td>Ekstrimitas</td>
                                    <td>:</td>
                                    <td><span id="rmb-b25"></span></td>
                                </tr>            
                                <tr>    
                                    <td>Prognosis</td>
                                    <td>:</td>
                                    <td><span id="rmb-b26"></span></td>
                                </tr>        
                                <tr>    
                                    <td>Lingkar Kepala</td>
                                    <td>:</td>
                                    <td><span id="rmb-b27"></span></td>
                                </tr>        
                                <tr>    
                                    <td>Telinga</td>
                                    <td>:</td>
                                    <td><span id="rmb-b28"></span></td>
                                </tr>        
                                <tr>    
                                    <td>Tenggorok</td>
                                    <td>:</td>
                                    <td><span id="rmb-b29"></span></td>
                                </tr>        
                                <tr>    
                                    <td>Kulit Kelamin</td>
                                    <td>:</td>
                                    <td><span id="rmb-b30"></span></td>
                                </tr>         
                            </table>
                        </div>
                    </div>
                </div>   
                <hr>

                <h6><b>III. PEMERIKSAAN NEUROLOGI</b></h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Pupil</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-c1"></span></td>
                                </tr>
                                <tr>
                                    <td>Nervi Cranialis</td>
                                    <td>:</td>
                                    <td><span id="rmb-c2"></span></td>
                                </tr>
                                <tr>
                                    <td>Reflek Fisiologi</td>
                                    <td>:</td>
                                    <td><span id="rmb-c3"></span></td>
                                </tr>
                                <tr>
                                    <td>Sensorik</td>
                                    <td>:</td>
                                    <td><span id="rmb-c4"></span></td>
                                </tr>
                                <tr>
                                    <td>Pemeriksaan Khusus</td>
                                    <td>:</td>
                                    <td><span id="rmb-c5"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Tanda Rangsang Meningeal</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-c6"></span></td>
                                </tr>        
                                <tr>     
                                    <td>Motorik</td>
                                    <td>:</td>
                                    <td><span id="rmb-c7"></span></td>
                                </tr>         
                                <tr>     
                                    <td>Reflek Patologis</td>
                                    <td>:</td>
                                    <td><span id="rmb-c8"></span></td>
                                </tr>       
                                <tr>     
                                    <td>Otonom</td>
                                    <td>:</td>
                                    <td><span id="rmb-c9"></span></td>
                                </tr>                 
                            </table>
                        </div>
                    </div>
                </div>      
                <hr>

                <h6><b>IV. PEMERIKSAAN ANAK</b></h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Riwayat Kelahiran</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-d1"></span></td>
                                </tr>
                                <tr>
                                    <td>Riwayat Nutrisi</td>
                                    <td>:</td>
                                    <td><span id="rmb-d2"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="19%">Riwayat Imunisasi</td>
                                    <td width="1%">:</td>
                                    <td wdith="80%"><span id="rmb-d3"></span></td>
                                </tr>        
                                <tr>     
                                    <td>Riwayat Tumbuh Kembang</td>
                                    <td>:</td>
                                    <td><span id="rmb-d4"></span></td>
                                </tr>                   
                            </table>
                        </div>
                    </div>
                </div>     


                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">			
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rekam Medis Baru Anamnesa-->


<?php $this->load->view( 'pasien/rekam_medis/js' ); ?>