<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>DPMP</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('print_2', '<i class="fas fa-print"></i> Cetak Etiket New', 'id=btn-etiket-2 class="btn btn-info waves-effect mr-2"') ?>
                        <?= form_button('print', '<i class="fas fa-print"></i> Cetak Etiket', 'id=btn-etiket class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        
                    </div>
                    <div class="col-lg-5 mb-3 d-flex justify-content-end">
                        <span class="m-t-5 m-r-5">Status Pasien :</span>
                        <?= form_dropdown('status_pasien', $status_pasien, array('Belum'), 'class="form-control-sm col-lg-3 mr-3" id=status_pasien') ?>
                        <?= form_dropdown('bangsal', $bangsal, array(), 'class="form-control-sm" style="width:50%" id=bangsal') ?>
                    </div>
                </div>
                <div class="table-responsive">
                <table id="table-permintaan-makan" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th class="wrapper center">No</th>
                            <th class="wrapper center">No Register</th>
                            <th class="wrapper">Waktu Order</th>
                            <th class="wrapper">No RM</th>
                            <th class="wrapper" width="18%">Nama</th>
                            <th class="wrapper">Bed</th>
                            <th class="wrapper">Layanan</th>
                            <th class="wrapper">Dokter</th>
                            <th class="wrapper">Status Order</th>
                            <th class="center wrapper">Status Inap</th>
                            <th class="nowrap"></th> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
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

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>
<?php $this->load->view('modal_gizi') ?>
<?php $this->load->view('modal_search') ?>
<?php $this->load->view('modal_dpmp') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>



