<input type="hidden" id="page-now">
<input type="hidden" id="kode-bpjs">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('filter', '<i class="fas fa-plus-circle mr-1"></i>Filter Jadwal', 'id=filter-jadwal class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <!-- <div class="table-responsive"> -->
                    <table id="table-jadwal-dokter" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title float-right" id="jadwal-label"></h4>
                        <h4 class="modal-title center"><b>JADWAL DOKTER HFIS</b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="1%">No.</th>
                                <th class="center" width="13%">Kode Subspesialis</th>
                                <th class="center" width="1%">Hari</th>
                                <th class="center" width="10%">Kapasitas Pasien</th>
                                <th class="center" width="1%">Libur</th>
                                <th class="left" width="9%">Nama Hari</th>
                                <th class="left" width="10%">Jadwal</th>
                                <th class="center" width="10%">Nama Subspesialis</th>
                                <th class="left" width="15%">Nama Dokter</th>
                                <th class="center" width="5%">Kode Poli</th>
                                <th class="center" width="5%">Nama Poli</th>
                                <th class="center" width="10%">Kode Dokter</th>
                                <th class="center" width="10%"></th>
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

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>