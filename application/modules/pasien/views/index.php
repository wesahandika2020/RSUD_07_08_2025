<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <?php if ($_SESSION["id_pegawai"] == '1461'): ?>
                            <?= form_button('add', '<i class="fas fa-plus"></i>', 'id=bt_pasien_add class="btn btn-info waves-effect m-r-5"') ?>
                        <?php endif; ?>
                        <button class="btn btn-danger waves-effect mr-1" onclick="kycPasien()"><i class="fas fa-user-check mr-1"></i>KYC Pasien</button>
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Pasien', 'id=bt_search_data class="btn btn-info waves-effect m-r-5"') ?>
                        <?= form_button('export', '<i class="fas fa-download"></i> Export Data Pasien', 'id=bt_export_data class="btn btn-success waves-effect m-r-5"') ?>
                        <?= form_button('merge', '<i class="fas fa-link"></i> Merge Pasien', 'id=bt_merge_pasien class="btn btn-warning waves-effect m-r-5"') ?>
                        <?= form_button('merge', '<i class="fas fa-link"></i> Merge Pasien History', 'id=bt_merge_pasien_history class="btn btn-primary waves-effect m-r-5"') ?>
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="4%" class="text-center">No</th>
                                <th width="5%">No. RM</th>
                                <th width="5%">NIK</th>
                                <th width="5%">No BPJS</th>
                                <th width="16%">Nama</th>
                                <th width="7%">Kelamin</th>
                                <th>Tgl Lahir</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Wilayah</th>
                                <th>FP</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pasien_pagination" class="float-left"></div>
                        <div id="pasien_summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_pasien'); ?>
<?php $this->load->view('modal_pasien_add'); ?>
<?php $this->load->view('modal_search'); ?>
<?php $this->load->view('merge/modal_merge'); ?>
<?php $this->load->view('riwayat/modal_riwayat'); ?>
<?php $this->load->view('penjamin/modal_penjamin'); ?>
<?php $this->load->view('consent/modal_consent'); ?>