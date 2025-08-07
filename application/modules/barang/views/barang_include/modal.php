<!-- Modal Barang Unit -->
<div id="modal-barang-unit" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Tambah Barang Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-barang-unit role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-body">
                            <div id="form-wizard2">
                                <ol>
                                    <li>Data Barang</li>
                                    <li>Tambah Data</li>
                                </ol>
                                <!-- Data Barang -->
                                <div class="form-data-barang">
                                    <div class="row">
                                        <div class="col d-flex justify-content-start">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Nama Unit:</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="select2-input" id="unit-auto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <div class="custom-search">
                                                <input type="text" class="search-query-white" onkeyup="getListBarangUnit(1)" id="key" placeholder="Pencarian ...">
                                                <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="table-unit-barang-list" class="table table-hover table-striped table-sm color-table info-table">
                                            <thead>
                                                <tr>
                                                    <th width="3%">No.</th>
                                                    <th width="40%" class="left">Nama Barang</th>
                                                    <th width="15%" class="right">HNA</th>
                                                    <th width="15%" class="right">HPP</th>
                                                    <th width="15%">Kategori</th>
                                                    <th width="3%"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div id="pagination2" class="float-left"></div>
                                            <div id="page-summary2" class="float-right text-sm"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Barang -->

                                <!-- Tambah Data -->
                                <div class="form-tambah-data">
                                    <div class="col-lg-6">
                                        <div class="form-group row thin">
                                            <label class="col-lg-2 col-form-label">Nama Unit:</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="unit" class="select2-input" id="unit-auto2">
                                            </div>
                                        </div>
                                        <div class="form-group row thin">
                                            <label class="col-lg-2 col-form-label">Nama Barang:</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama" class="select2-input" id="barang-unit-auto">
                                            </div>
                                        </div>
                                        <div class="form-group row thin">
                                            <label class="col-lg-2 col-form-label"></label>
                                            <div class="col-lg-9">
                                                <button type="button" class="btn btn-info" id="addtoform"><i class="fa fa-arrow-circle-down"></i> Tambahkan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table-adding-barang-unit" class="table table-hover table-striped table-sm color-table info-table">
                                                <thead>
                                                    <tr>
                                                        <th width="3%">No.</th>
                                                        <th width="87%" class="left">Nama Barang</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tambah Data -->
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanBarangUnit()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Barang Unit -->