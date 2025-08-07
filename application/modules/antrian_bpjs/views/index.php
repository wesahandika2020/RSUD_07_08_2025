<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Antrean', 'id=tambah-antrean-bpjs class="btn btn-info waves-effect mr-1"') ?>&nbsp;
                        <?= form_button('checkin_pasien', '<i class="fas mr-1"></i>Checkin Pasien Booking', 'id=checkin-pasien class="btn btn-danger waves-effect mr-1"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?php $groupAccount = $this->session->userdata('account_group');
                        if ($groupAccount == "Humas" || $groupAccount == "Admin Humas") : ?>
                            <?= form_dropdown('filter_onsite', ['mobile' => 'Mobile JKN'], array(), 'id=filter-onsite class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?php else : ?>
                            <?= form_dropdown('filter_onsite', $filter_onsite, array(), 'id=filter-onsite class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?php endif; ?>
                    </div>
                </div>

                <!-- <div class="table-responsive"> -->
                <table id="table-antrian-online" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                    <h4 class="modal-title float-right" id="tanggal-antrian-label"></h4>
                    <h4 class="modal-title center"><b>ANTRIAN ONLINE</b></h4>
                    <thead>
                        <tr>
                            <th class="center" width="1%">No.</th>
                            <th class="center" width="5%">Kode Booking</th>
                            <th class="center" width="8%">No. BPJS</th>
                            <th class="center" width="8%">No Antrean</th>
                            <th class="center" width="6%">Daftar</th>
                            <th class="left" width="10%">Nama Poli</th>
                            <th class="left" width="13%">Dokter</th>
                            <th class="center" width="7%">Status Antrean</th>
                            <th class="center" width="7%">Status Panggil</th>
                            <th class="center" width="7%">Waktu Panggil</th>
                            <th class="center" width="2%">Loket</th>
                            <th class="center" width="8%">Status Hadir</th>
                            <th class="center" width="8%">Waktu Hadir</th>
                            <th class="left" width="18%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_pendaftaran'); ?>
<?php $this->load->view('modal'); ?>
<?php $this->load->view('modal_search'); ?>
<?php $this->load->view(DIR_VCLAIM . 'modal_vclaim_form'); ?>