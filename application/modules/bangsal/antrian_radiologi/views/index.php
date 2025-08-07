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
                            <div class="set-button">
                                <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                                <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Antrian', 'id=bt_tambah class="btn btn-info waves-effect"') ?>
                            </div>
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Tanggal</label>
                            <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                        <div class="col-2">
                            <label style="margin-bottom:0;">Status Panggil</label>
                            <select name="filter_panggil" class="custom-select reset-select" id="filter-panggil">
                                <option value="1">Belum dipanggil</option>
                                <option value="2">Sudah dipanggil</option>
                                <option value="3">Semua</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Status Antrian</label>
                            <select name="status_antrian" class="custom-select reset-select" id="status-antrian">
                                <option value="1">Aktif</option>
                                <!-- <option value="2">Sudah</option> -->
                                <option value="3">Batal</option>
                                <option value="4">Semua</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label style="margin-bottom:0;">Pilih Ruangan</label>
                            <?= form_dropdown('ruang_radiologi', $ruangRadiologi, array(), 'class="form-control" id=ruang-radiologi') ?>
                        </div>                        
                        <div class="col-2">
                            <label style="margin-bottom:0;">Pencarin Nama / No RM Pasien</label>
                            <input type="text" class="form-control" onkeyup="getListAntrianRadiologi(1)" id="pencarian_anrad" placeholder="Pencarian..">
                        </div>
                    </div>
                </div>  
                <div  class="row" style="justify-content:flex-end; margin-top: 10px;">
                    <div>
                        <label style="margin-bottom:0;"><b>Ruang 1</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call1', '<i class="fas fa-bell"></i> Call', 'id=call1 class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall1', '<i class="fas fa-history"></i> ReCall', 'id=recall1 class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;"><b>Ruang 2A</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call2a', '<i class="fas fa-bell"></i> Call', 'id=call2a class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall2a', '<i class="fas fa-history"></i> ReCall', 'id=recall2a class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;"><b>Ruang 2B</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call2b', '<i class="fas fa-bell"></i> Call', 'id=call2b class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall2b', '<i class="fas fa-history"></i> ReCall', 'id=recall2b class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;"><b>Ruang 3</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call3', '<i class="fas fa-bell"></i> Call', 'id=call3 class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall3', '<i class="fas fa-history"></i> ReCall', 'id=recall3 class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px;">
                        <label style="margin-bottom:0;"><b>Ruang 4</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call4', '<i class="fas fa-bell"></i> Call', 'id=call4 class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall4', '<i class="fas fa-history"></i> ReCall', 'id=recall4 class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                    <div style="margin-left: 50px; margin-right: 10px;">
                        <label style="margin-bottom:0;"><b>Ruang 5</b></label>
                        <div class="set-button" style="margin-top: 0px;">
                            <?= form_button('call5', '<i class="fas fa-bell"></i> Call', 'id=call5 class="btn btn-warning waves-effect"') ?>&nbsp;
                            <?= form_button('recall5', '<i class="fas fa-history"></i> ReCall', 'id=recall5 class="btn btn-danger waves-effect"') ?>
                        </div>
                    </div>
                </div>

                <div class="table">                    
                    <table id="table_list_antrian_radiologi" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="3%"  class="text-center">NO</th>
                                <th width="5%" class="center">TANGGAL KUNJUNGAN</th>
                                <th width="8%" class="center">NO RM</th>
                                <th width="19%" class="center">NAMA PASIEN</th>
                                <th width="10%" class="center">LAYANAN ORDER</th>
                                <th width="8%" class="center">WAKTU ORDER</th>
                                <th width="10%" class="center">RUANG RADIOLOGI</th>
                                <th width="5%" class="center">NOMOR ANTRIAN</th>
                                <th width="10%" class="center">WAKTU PANGGIL</th>
                                <th width="5%" class="center">JUMLAH PANGGIL</th>
                                <th width="5%" class="center">JML CETAK</th>
                                <th width="7%" class="center">STATUS ANTRIAN</th>
                                <th width="7%" class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
				
                <div class="row">
                    <div class="col">
                        <div id="pagination_antrian_radiologi" class="float-left"></div>
                        <div id="summary_antrian_radiologi" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('js_detail'); ?>
<?php $this->load->view('modal_antrian_radiologi'); ?>
