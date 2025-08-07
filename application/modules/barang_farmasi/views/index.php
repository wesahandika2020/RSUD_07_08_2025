<input type="hidden" id="page-now">
<input type="hidden" id="jenis-barang" value="Farmasi">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Barang', 'id=btn-tambah class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian', 'id=btn-search class="btn btn-secondary waves-effect mr-1"') ?>
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Barang Unit', 'id=btn-barang-unit class="btn btn-secondary waves-effect mr-1"') ?>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListBarang(1)" id="pencarian" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="nowrap center" width="3%">No.</th>
                                <th class="nowrap left" width="20%">Nama</th>
                                <th class="nowrap left" width="10%">Kekuatan</th>
                                <th class="nowrap left" width="7%">Sediaan</th>
                                <th class="nowrap left" width="15%">Pabrik</th>
                                <th class="nowrap right" width="5%">Harga Dasar</th>
                                <th class="nowrap right" width="5%">HNA</th>
                                <th class="nowrap right" width="5%">HPP</th>
                                <th class="nowrap right" width="5%">Harga Jual</th>
                                <th class="nowrap center" width="5%">Generik</th>
                                <th class="nowrap center" width="5%">Form</th>
                                <th class="nowrap center" width="10%">E-Katalog</th>
                                <th class="nowrap center" width="5%">H.A</th>
                                <th width="10%" class="nowrap left">Kategori</th>
                                <th width="7%" class="nowrap left">Obat Kronis</th>
                                <th class="nowrap center" width="3%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="page-summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>
<?php $this->load->view('barang/barang_include/modal'); ?>
<?php $this->load->view('barang/barang_include/js'); ?>