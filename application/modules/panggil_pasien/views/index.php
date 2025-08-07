<!-- <meta http-equiv="refresh" content="90; URL=<?= base_url();?>"> -->
<input type="hidden" name="page_now" id="page-now">

<div id="audio"></div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_dropdown('filter_loket', $filter_loket, array(), 'id=filter-loket class="btn btn-secondary waves-effect"') ?>&nbsp;
                    </div>
                </div>

                <!-- <div class="table-responsive"> -->
                    <table id="table-panggil-pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title float-right" id="panggil-pasien-label"></h4>
                        <h4 class="modal-title center"><b>CALL / RECALL PASIEN</b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="1%">No.</th>
                                <th class="center" width="9%">Kode Booking</th>
                                <th class="center" width="10%">Nomor Antrean</th>
                                <th class="center" width="10%">Nama Poli</th>
                                <th class="left" width="15%">Dokter</th>
                                <th class="center" width="5%">Loket</th>
                                <th class="center" width="10%">Waktu Panggil</th>
                                <th class="center" width="10%">Status Antrean</th>
                                <th class="center" width="10%">Status Panggilan</th>
                                <th class="right" width="20%"></th>
                            </tr>
                        </thead>
                        <tbody ></tbody>
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

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_search'); ?>