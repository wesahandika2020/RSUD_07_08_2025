<!-- START Modal TAMBAH Jadwal Dokter -->
<div id="modal_tambah_jadwal_dokter" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-tambah-jadwal-dokter-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tambah-jadwal-dokter-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">            
                <?= form_open('','id=form_tambah_jadwal_dokter role=form class=form-horizontal') ?>
                    <input type="hidden" id="id-poli-tambah">
                    <input type="hidden" id="nama-dokter-tambah">
                    <input type="hidden" id="kode-dokter-tambah">
                    <input type="hidden" id="bpjs-dokter-tambah">

                    <input type="hidden" id="nama-poli-tambah">
                    <input type="hidden" id="kode-poli-tambah">
                    <input type="hidden" id="bpjs-poli-tambah">

                    <div class="form-group row">
                        <label for="tanggal-tambah" class="col-md-2 col-form-label">Tanggal <span class="text-red">*</span></label>
                        <div class="col-md-10">
                            <input type="text" name="tanggal_tambah" id="tanggal-tambah" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="poli-tambah" class="col-md-2 col-form-label">Poliklinik <span class="text-red">*</span></label>
                        <div class="col-md-10">
                            <input type="text" id="poli-tambah" class="select2-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dokter-tambah" class="col-md-2 col-form-label">Dokter <span class="text-red">*</span></label>
                        <div class="col-md-7">
                            <input type="text" id="dokter-tambah" class="select2-input">
                        </div>
                        <div class="col-md-2" style="display: flex; align-items: center; margin-left: 20px" >
                            <input type="checkbox" class="form-check-input" checked id="unitkerja-tambah">Unit Kerja
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="shift-poli-tambah" class="col-md-2 col-form-label">Shift Poli <span class="text-red">*</span></label>
                        <div class="col-md-3">
                            <select id="shift-poli-tambah" class="custom-select">
                                <option value="Pagi">Pagi</option>
                                <option value="Sore">Sore</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="time-start-tambah" placeholder="Jam Mulai">
                        </div>
                        <label class="col-md-1 col-form-label" style="text-align: center;">Sampai</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="time-end-tambah" placeholder="Jam Selesai">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kuota" class="col-md-2 col-form-label">Kuota <span class="text-red">*</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="kuota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="tambah_item_jadwal_dokter()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-tambah-jadwal-dokter">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Tanggal</th>
                                <th class="center">Poliklinik</th>
                                <th class="center" id="poli-id">Poliklinik ID</th>
                                <th class="center" id="poli-bpjs">Poliklinik BPJS</th>
                                <th class="center">Dokter</th>
                                <th class="center" id="dokter-id">Dokter ID</th>
                                <th class="center" id="dokter-bpjs">Dokter BPJS</th>
                                <th class="center">Shift Poli</th>
                                <th class="center">Waktu Mulai</th>
                                <th class="center">Waktu Selesai</th>
                                <th class="center">Kuota</th>
                                <th class="center"></th>
                            </tr>
                        </thead>
                        <tbody>                                    
                        </tbody>
                    </table>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanJadwalDokter()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Modal TAMBAH Jadwal Dokter -->


<!-- Modal Edit Jadwal Dokter -->
<div id="modal_edit_jadwal_dokter" class="modal fade" role="dialog" aria-labelledby="modal_edit_jadwal_dokter_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_jadwal_dokter_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_edit_jadwal_dokter'); ?>
                  
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">Tanggal</label>
                    <label class="col-md-9 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;" id="tanggal-detail"></label>        
                    <input type="hidden" id="kode-tanggal-detail" name="tanggal_detail">
                </div>
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">Poliklinik</label>
                    <label class="col-md-9 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;" id="poli-detail"></label>
                    <input type="hidden" id="id-detail">
                    <input type="hidden" id="id-poli-detail" name="id_poli_detail">
                    <input type="hidden" id="kode-poli-detail" name="kode_poli_detail">
                    <input type="hidden" id="shift-poli-detail" name="shift_poli_detail">
                </div>
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">Dokter</label>
                    <label class="col-md-9 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;" id="dokter-detail"></label>
                    <input type="hidden" id="nama-dokter" name="nama_dokter">
                    <input type="hidden" id="kode-dokter" name="kode_dokter">
                    <input type="hidden" id="bpjs-dokter" name="bpjs_dokter">
                </div>      
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">Kuota Dokter</label>
                    <label class="col-md-1 col-form-label" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px; font-weight: normal;" id="kuota-now"></label>
                    <label class="col-md-8 col-form-label" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px; font-weight: normal;"> pasien</label>
                </div>
                
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">Kuota Terpakai</label>                    
                    <label class="col-md-1 col-form-label" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px; font-weight: normal;" id="kuota-terpakai"></label>
                    <label class="col-md-8 col-form-label" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px; font-weight: normal;"> pasien</label>
                </div>
                <div class="form-group row tight">
                    <label class="col-md-3 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;">User</label>
                    <label class="col-md-9 col-form-label" style="padding-top: 0px; padding-bottom: 0px; font-weight: normal;" id="user-detail"></label>
                </div>
                <hr>
                <h5>Silahkan isi perubahan : </h5>
                <div class="form-group row tight">
                    <label for="kuota-dokter" class="col-md-2 col-form-label">Kuota <span class="text-red">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kuota_dokter" id="kuota-dokter">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="dokter" class="col-md-2 col-form-label">Dokter <span class="text-red">*</span></label>
                    <div class="col-md-7">
                        <input type="text" name="dokter_jadwal" id="dokter-jadwal" class="select2-input">
                    </div>
                    <div class="col-md-3" style="display: flex; align-items: center; padding-left: 15px;">
                        <input type="checkbox" class="form-check-input" checked id="unitkerja">Unit Kerja
                    </div>
                </div> 
                <div class="form-group row tight">
                    <!-- <label class="col-md-2 col-form-label">Shift Poli <span class="text-red">*</span></label> -->
                    <div class="col-2"> <label class="col-form-label">Shift Poli <span class="text-red">*</span></label> </div>
                    <div class="col-2"> <input class="form-control" type="text" id="shift-poli-nama" disabled> </div>
                    <div class="col-3"> <input class="form-control" id="time-start-detail" name="time_start_detail"> </div>
                    <div class="col-2"> <label class="col-form-label" type="text" style="text-align: center;">Sampai</label> </div>
                    <div class="col-3"> <input class="form-control" type="text" id="time-end-detail" name="time_end_detail"> </div>
                </div>
                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiEditJadwalDokter()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Jadwal Dokter -->

<!-- Modal HISROTY Jadwal Dokter -->
<div id="modal_history_jadwal_dokter" class="modal fade" role="dialog" aria-labelledby="modal_history_jadwal_dokter_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_history_jadwal_dokter_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_history_jadwal_dokter'); ?>
                    <input type="hidden" id="id-history">
                    
					<h4><b>Jadwal Saat Ini</b></h4>
                    <div class="form-group row tight">
                        <label class="col-md-2 col-form-label">Tanggal</label>
                        <label class="col-md-10 col-form-label" id="tgl-history"></label>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-md-2 col-form-label">Poliklinik</label>
                        <label class="col-md-10 col-form-label" id="poli-history"></label>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-md-2 col-form-label">Dokter</label>
                        <label class="col-md-10 col-form-label" id="dokter-history"></label>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-md-2 col-form-label">User</label>
                        <label class="col-md-10 col-form-label" id="user-history"></label>
                    </div>
                    <hr>

                    <h4><b>History Edit</b></h4>
                    <!-- <div class="card-body"> -->
                        <div class="table-responsive" id="parent">    
                            <table id="table_history_jadwal_dokter" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                                <thead>
                                    <tr>
                                        <th width="5%"  class="text-center">No</th>
                                        <th width="16%" class="center">Nama Dokter</th>
                                        <th width="10%" class="center">Shift Poli</th>
                                        <th width="5%"  class="center">Kuota</th>
                                        <th width="16%" class="center">User Simpan</th>
                                        <th width="16%" class="center">Waktu Simpan</th>
                                        <th width="16%" class="center">User Edit</th>
                                        <th width="16%" class="center">Waktu Edit</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    <!-- </div> -->
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- End Modal HISROTY Jadwal Dokter -->



<!-- START Modal JUMLAH KUNJUNGAn -->
<div id="modal_kunjungan_dokter" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal_kunjungan_dokter_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Jumlah Kunjungan Jadwal Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>            
            <div class="modal-body">
                <?= form_open('','id=form_kunjungan_dokter role=form class=form-horizontal') ?>
                    <div class="form-group row tight tableskd" style="margin-left: 0px;">
                        <button type="button" class="btn btn-secondary waves-effect" onclick="getListJmlKunjDoker(1)"><i class="fas fa-history"></i> Reload</button>&nbsp;
                        <button type="button" class="btn btn-warning waves-effect" onclick="konfirmasiUpdateJmlKunjDokter()"><i class="fas fa-sync-alt"></i></button>
                        <div class="form-group row" style="margin-bottom: 0px; margin-left: 10px; margin-right: 0px;">
                            <label for="tanggal-jml-kunj" class="col-md-4 col-form-label">Pilih Tanggal <span class="text-red">*</span></label>
                            <div class="col-md-5">
                                <input type="text" nama="tanggal_jml_kunj" id="tanggal-jml-kunj" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-3">
                                <select id="shift-poli-kunj" class="custom-select">
                                    <option value="Pagi">Pagi</option>
                                    <option value="Sore">Sore</option>
                                </select>
                            </div>
                        </div>
                        <h3 style="color: red;margin-left: 8px;" id=title-notif></h3>
                    </div>
                    <div class="form-group row tight">
                        <div class="col-4">
                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-kunjungan-dokter1">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th class="center">Tanggal</th>
                                    <th class="center">Poliklinik</th>
                                    <th class="center">Shift<br>Poli</th>
                                    <th class="center">Dokter</th>
                                    <th class="center">Kuota</th>
                                    <th class="center">Jumlah<br>Kunjung</th>
                                    <th class="center">Real<br>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                            </tbody>
                        </table>
                        </div>

                        <div class="col-4">
                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-kunjungan-dokter2">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th class="center">Tanggal</th>
                                    <th class="center">Poliklinik</th>
                                    <th class="center">Shift<br>Poli</th>
                                    <th class="center">Dokter</th>
                                    <th class="center">Kuota</th>
                                    <th class="center">Jumlah<br>Kunjung</th>
                                    <th class="center">Real<br>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                            </tbody>
                        </table>
                        </div>

                        <div class="col-4">
                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-kunjungan-dokter3">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th class="center">Tanggal</th>
                                    <th class="center">Poliklinik</th>
                                    <th class="center">Shift<br>Poli</th>
                                    <th class="center">Dokter</th>
                                    <th class="center">Kuota</th>
                                    <th class="center">Jumlah<br>Kunjung</th>
                                    <th class="center">Real<br>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                            </tbody>
                        </table>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Modal JUMLAH KUNJUNGAn -->