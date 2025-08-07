<style>
.set-button {
    display: flex;
    align-content: center;
    margin-top: 18px;    
    margin-bottom: 3px
}
</style>

<input type="hidden" name="page_now" id="page_now_jadwal_dokter">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start" >
                        <div class="set-button">
                            <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Jadwal Dokter', 'id=bt_tambah_jadwal_dokter class="btn btn-info waves-effect"') ?>&nbsp;
                            <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                            <?= form_button('lihat', '<i class="fas fa-calendar-check"></i> Jumlah Kunjungan', 'id=bt_lihat_kunjungan_dokter class="btn btn-primary waves-effect"') ?>
                        </div>

                    </div>

                    <div class="col d-flex justify-content-end">

                        <div class="col-2">
                            <label style="margin-bottom:0;">Tanggal Awal</label>
                            <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>

                        <div class="col-2">
                            <label style="margin-bottom:0;">Tanggal Akhir</label>
                            <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                        </div>

                        <div class="col-4">
                            <label style="margin-bottom:0;">Pilih Layanan</label>
                            <?= form_dropdown('layanan', $layanan, array(), 'class="form-control" id=layanan') ?>
                        </div>
                        <div class="col-2   ">
                            <label style="margin-bottom:0;">Shift Poli</label>
                            <select name="shift_poli" id="shift-poli" class="custom-select">
                                <option value="Pagi">Pagi</option>
                                <option value="Sore">Sore</option>
                                <option value="Kosong">Kosong</option>
                                <option value="">- Semua -</option>
                            </select>
						</div>
                        <div class="col-5">
                            <label style="margin-bottom:0;">Pencarin Nama Dokter</label>
                            <input type="text" class="form-control" onkeyup="getListJadwalDokter(1)" id="pencarian_jadwal_dokter" placeholder="Pencarian Nama Dokter ..">
                            <!-- <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button> -->
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    
                    <table id="table_jadwal_dokter" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="center">Hari</th>
                                <th class="center">Tanggal</th>
                                <th class="left">Poliklinik</th>
                                <th class="center">Shift Poli</th>
                                <th class="left">Dokter</th>
                                <th class="center">Kuota Dokter</th>
                                <th class="center">Kuota Terpakai</th>
                                <th class="center">Sisa Kuota</th>
                                <th class="center">Jml Booking</th>
                                <th class="center">Jml Check In</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
				
				<div>                    
                    <table>
                        <style type="text/css">
                            #kotak{
                                width:20px;
                                height:10px;
                                display:inline-block;
                            }
                        </style>
                        <tr>
                            <td>
                                <div id="kotak" style="background:#FDCFB3; margin-right:10px;"></div>Kuota kurang dari 5 <br />
                                <div id="kotak" style="background:#ff9eb5; margin-right:10px;"></div>Kuota habis <br />
                                <div id="kotak" style="background:#c1121f; margin-right:10px;"></div>Kuota min <i> (Jika ada, segera hubungi IT)<i> <br />
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
				
                <div class="row">
                    <div class="col">
                        <div id="jadwal_dokter_pagination" class="float-left"></div>
                        <div id="jadwal_dokter_summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal_jadwal_dokter'); ?>
<?php $this->load->view('js'); ?>