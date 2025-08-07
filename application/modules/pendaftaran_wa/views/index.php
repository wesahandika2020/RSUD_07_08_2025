<input type="hidden" name="page_now" id="page_now_pendaftaran_wa">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>

                    <div class="col d-flex justify-content-end">

                        <div class="col-3">
                            <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('d/m/Y') ?>"> <!-- date('d/m/Y') -->
                        </div>

                        <div class="col-3">
                                <?= form_dropdown('layanan', $layanan, array(), 'class="form-control" id=layanan') ?>
                        </div>
                        
                        <div class="col-6">
                            <input type="text" class="form-control" onkeyup="getListPendaftaranWa(1)" id="pencarian_pendaftaran_wa" placeholder="Pencarian Nama Pasien / No RM ..">
                            <!-- <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button> -->
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    
                    <table id="table_pendaftaran_wa" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th class="center">Tgl Kunjungan</th>
                                <th class="center">No Bukti Daftar</th>
                                <th class="center">No KTP</th>
                                <th class="center">No RM</th>
                                <th class="center">Nama</th>
                                <th class="center">No Tlp SIMRS</th>
                                <th class="center">No Tlp WA</th>
                                <th class="center">Tujuan Poli</th>
                                <th class="center">Dokter</th>
                                <th class="center">Penjamin</th>
                                <th class="center">Status Pasien</th>
                                <th class="center">Status Checkin</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pendaftaran_wa_pagination" class="float-left"></div>
                        <div id="pendaftaran_wa_summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_edit'); ?>