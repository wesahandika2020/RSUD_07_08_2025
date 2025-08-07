<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('filter', '<i class="fas fa-plus-circle mr-1"></i>Kode Booking', 'id=cek-kode-booking class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <!-- <div class="table-responsive"> -->
                    <table id="table-list-task" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title float-right" id="kode-booking"></h4>
                        <h4 class="modal-title center"><b>LIST WAKTU TASK ID</b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="1%">No.</th>
                                <th class="left" width="35%">Task Name</th>
                                <th class="center" width="18%">Task ID</th>
                                <th class="center" width="18%">Waktu BPJS</th>
                                <th class="center" width="18%">Waktu RS</th>
                                <th class="left" width="10%">Kode Booking</th>
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