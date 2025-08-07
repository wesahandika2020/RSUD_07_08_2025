<style>
    #expand-icon.active {
        color: red;
    }
</style>
<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i> Pencarian', 'id=bt_search class="btn btn-info waves-effect mr-1"') ?>&nbsp;
                        <?= form_button('reset',  '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <div class="row">

                </div>

                <div class="table-responsive">
                    <br>
                    <!-- <b>Pasien : <b><span id="identitas-pasien-formulir"></span> -->
                    <table id="table-rekonsiliasi-obat" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No. RM</th>
                                <th>Nama Pasien</th>
                                <th class="text-center">Tanggal Daftar</th>
                                <th class="text-center">Jenis Pendaftaran</th>
                                <th class="text-center">Penjamin</th>
                                <th class="text-center">Status Pasien</th>
                                <th class="text-center">Rekonsiliasi</th>   
                                <th colspan="1"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- <tbody></tbody> -->
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination-rekon" class="float-left"></div>
                        <div id="summary-rekon" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_search'); ?>
<?php $this->load->view('modal_rekonsiliasi'); ?>

<div id="load-view-formulir"></div>
