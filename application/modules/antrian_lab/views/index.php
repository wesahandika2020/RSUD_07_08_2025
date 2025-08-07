<style>
.set-button {
    display: flex;
    align-content: center;
    margin-top: 18px;    
    margin-bottom: 3px
}
</style>

<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="col d-flex justify-content-end" style="padding-left: 0px;">
                        <div class="col d-flex justify-content-start" style="padding-left: 0px;">
                            <div class="set-button"  style="margin-bottom:0; margin-top: 0px;">
                                <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
							</div>            
                        </div>        
                        <div class="col-1">
                            <label style="margin-bottom:0;">Tanggal</label>
                            <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Ruang Lab</label>
                            <select name="ruang_lab" class="custom-select reset-select" id="ruang-lab">
                                <option value="1">Admin</option>
                                <option value="2">Sampling</option>
                                <option value="3">Semua</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Kode Antrian</label>
                            <select name="kode_antrian" class="custom-select reset-select" id="kode-antrian">
                                <option value="ABCD">A B C D</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="">Semua</option>
                            </select>
                        </div>          
                        <div class="col-1">
                            <label style="margin-bottom:0;">Status Antrian</label>
                            <select name="status_antrian" class="custom-select reset-select" id="status-antrian">
                                <option value="4">Semua</option>
                                <option value="1">Sudah</option>
                                <option value="2">Belum</option>
                                <option value="3">Batal</option>
                            </select>
                        </div>                    
                        <div class="col-2">
                            <label style="margin-bottom:0;">Pencarin Nama / No RM Pasien</label>
                            <input type="text" class="form-control" onkeyup="getListAntrianLab(1)" id="pencarian_lab" placeholder="Pencarian..">
                        </div>
                    </div>
                </div>  

                <div  class="row" style="justify-content:flex-end; margin-top: 10px;">  
                     <div class="col d-flex justify-content-start" style="padding-left: 0px;">
                        <div class="set-button" style="margin-left: 10px;">
                            <label style="margin-bottom:0; display: flex;align-items: center; padding-left: 15px;">Reload data otomatis 10 detik (hubungi IT jika ingin diubah)</label>&nbsp;
                            <!--<label style="margin-bottom:0; display: flex;align-items: center;" id="waktu-refresh"></label>&nbsp;
                            <label style="margin-bottom:0; display: flex;align-items: center;"> detik </label>&nbsp;
                            <?= form_button('reset', '<i class="fas fa-edit"></i>', 'id=bt_waktu_refresh class="btn btn-secondary waves-effect"') ?>-->
                        </div>            
                    </div> 

                    <div>
                        <label style="margin-bottom:0;" id="label-admin-a"></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('calla', '<i class="fas fa-bell"></i> Call', 'id=calla class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recalla', '<i class="fas fa-history"></i> ReCall', 'id=recalla class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;" id="label-admin-b"></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('callb', '<i class="fas fa-bell"></i> Call', 'id=callb class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recallb', '<i class="fas fa-history"></i> ReCall', 'id=recallb class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;" id="label-admin-c"></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('callc', '<i class="fas fa-bell"></i> Call', 'id=callc class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recallc', '<i class="fas fa-history"></i> ReCall', 'id=recallc class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;" id="label-admin-d"></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('calld', '<i class="fas fa-bell"></i> Call', 'id=calld class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recalld', '<i class="fas fa-history"></i> ReCall', 'id=recalld class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px; margin-right: 10px;">
                        <label style="margin-bottom:0;" id="label-admin-e"></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('calle', '<i class="fas fa-bell"></i> Call', 'id=calle class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recalle', '<i class="fas fa-history"></i> ReCall', 'id=recalle class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                </div>

                <div class="table col-lg">                    
                    <table id="table_list_antrian_lab" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="center">TANGGAL KUNJUNGAN</th>
                                <th class="center">NO RM</th>
                                <th class="center">NAMA PASIEN</th>
                                <th class="center">LAYANAN ORDER</th>
                                <th class="center">RUANG PANGGIL</th>
                                <th class="center">NOMOR ANTRIAN</th>
                                <th class="center">JML PANGGIL ADMIN</th>
                                <th class="center">JML PANGGIL SAMPLING</th>
                                <th class="center">JML CETAK</th>
                                <th class="center">STATUS ANTRIAN</th>
                                <th class="center">PANGGIL SAMPLING</th>
                                <th class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col">
                        <div id="pagination_antrian_lab" class="float-left"></div>
                        <div id="summary_antrian_lab" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('js_master'); ?>
<?php $this->load->view('modal'); ?>