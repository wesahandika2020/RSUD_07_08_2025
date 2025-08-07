<style>
.set-button {
    display: flex;
    align-content: center;
    margin-top: 18px;    
    margin-bottom: 3px
}
</style>

<input type="hidden" name="page_now" id="page_now_skd">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="col d-flex justify-content-end" style="padding-left: 0px;">
                        <div class="col d-flex justify-content-start" style="padding-left: 0px;">
                            <div class="set-button">
                                <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                                <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah SKK', 'id=bt_tambah_skk class="btn btn-info waves-effect"') ?>
                            </div>
                        </div>
                        <div class="col-2">
                            <label style="margin-bottom:0;">Kategori</label>
                            <select name="kategori" class="custom-select reset-select" id="kategori">
                                <option value="1">Semua</option>
                                <option value="2">SKK dengan Dokter</option>
                                <option value="3">SKK tanpa Dokter</option>
                                <option value="4">Jadwal Tidak Sesuai</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label style="margin-bottom:0;">Filter</label>
                            <select name="filtertgl" class="custom-select reset-select" id="filtertgl">
                                <option value="2">Tgl Entry</option>
                                <option value="1">Tgl Rencana Kontrol</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Tanggal Awal</label>
                            <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                        <div class="col-1">
                            <label style="margin-bottom:0;">Tanggal Akhir</label>
                            <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>
                        <div class="col-2">
                            <label style="margin-bottom:0;">Pilih Poliklinik Tujuan</label>
                            <?= form_dropdown('layanan', $layanan, array(), 'class="form-control" id=layanan') ?>
                        </div>                        
                        <div class="col-2">
                            <label style="margin-bottom:0;">Pencarin Nama / No RM Pasien</label>
                            <input type="text" class="form-control" onkeyup="getListSKD(1)" id="pencarian_skd" placeholder="Pencarian..">
                            <!-- <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button> -->
                        </div>
                    </div>
                </div>

                <div class="table">                    
                    <table id="table_skd_list" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="3%"  class="text-center">No</th>
                                <th width="7%" class="center">Tgl Daftar</th>
                                <th width="7%" class="center">No RM</th>
                                <th width="15%" class="center">Nama</th>
                                <th width="6%" class="center">Kontrol</th>
                                <th width="6%" class="center">Tgl Kontrol</th>
                                <th width="15%" class="center">Poli Asal</th>
                                <th width="15%" class="center">Poli Tujuan</th>
                                <th width="8%" class="center">Booking</th>
                                <th width="8%" class="center">No SKB</th>
                                <th width="5%" class="center">Status</th>   
                                <th width="5%" class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
				
                <div class="row">
                    <div class="col">
                        <div id="pagination_skd" class="float-left"></div>
                        <div id="summary_skd" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/js') ?>
<?php $this->load->view('pelayanan/surat_kontrol_form/modal_surat_kontrol_dokter') ?>
<?php $this->load->view('vclaim_bpjs/vclaim_v2/surat_kontrol/modal') ?>
<?php $this->load->view('modal_surat_ket_kontrol'); ?>