<!-- Modal Barang Farmasi -->
<div id="modal-barang-rumah-tangga" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 820px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-barang-rumah-tangga-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-barang-rumah-tangga'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Utama</li>
                                    <li>Packing Barang</li>
                                    <!-- <li>Kandungan Obat</li> -->
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Utama -->
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="id_pabrik" id="id-pabrik">
                                <div class="form-data-utama">
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kategori Barang :</label>
                                        <div class="col-lg-9">
                                            <select name="kategori_barang" id="kategori-barang" class="form-control">
                                                <?php foreach ($kategori as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Barang Bidang :</label>
                                        <div class="col-lg-9">
                                            <select name="bidang" id="bidang" class="form-control">
                                                <option value="">Pilih...</option>
                                                <?php foreach ($bidang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kode Barang <span class="text-red">*</span>:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode barang ...">
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Nama Barang <span class="text-red">*</span>:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama barang ...">
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Sumber Anggaran :</label>
                                        <div class="col-lg-9">
                                            <?= form_dropdown('pembayaran', $pembayaran, array(), 'id=pembayaran class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Nama Pabrik :</label>
                                        <div class="col-lg-9">
                                            <?= form_input('pabrik', NULL, 'id=pabrik class="select2-input"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Stok Minimal :</label>
                                        <div class="col-lg-3">
                                            <?= form_input('stok_min', NULL, 'id=stok-min class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Harga Pokok :</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('hpp', NULL, 'id=hpp onblur="FormNum(this)" onkeyup="convertToCurrency(this)" class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Utama -->
                                
                                <!-- Packing Barang -->
                                <div class="form-packing-barang">
                                    <?= form_button('tambah', '<i class="fas fa-plus-circle mr-2"></i> Tambah Kemasan' ,'id=btn-tambah-kemasan class="btn btn-info deletebarang mb-2" data-target=".bs-modal-lg"') ?>
                                    <table width="100%" class="data-input packing table-no-border" id="input-packing" cellpadding="0" cellspacing="0">

                                    </table>
                                    <!-- <span id="alert-kemasan">** Fitur edit & hapus packing barang ini sekarang dimatikan.</span> -->
                                    <span id="alert-kemasan"></span>
                                </div>
                                <!-- End Packing Barang -->
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanData()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Barang Farmasi -->

<!-- Modal Pencarian -->
<div id="modal-search" class="modal fade" role="dialog" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Kategori Barang :</label>
                            <div class="col-lg-9">
                                <select name="kategori_barang" class="form-control">
                                    <option value="">Semua ...</option>
                                    <?php foreach ($kategori as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Nama Barang :</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama" class="form-control" placeholder="Nama barang ...">
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <?= form_button('excel', '<i class="fas fa-file-excel mr-1"></i>Export Excel', 'id=btn-excel class="btn btn-success waves-effect mr-1"') ?>
                <button type="button" class="btn btn-info waves-effect" onclick="getListBarang(1)"><i class="fas fa-search"></i> Filter</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pencarian -->

<!-- Modal Alokasi Barang Unit -->
<div id="modal-alokasi-barang-unit" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1054px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Alokasi Barang Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-alokasi-barang-unit role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-body">
                            <table width="100%" class="table table-striped table-hover table-sm table-no-border" cellspacing="0">
                                <tbody>
                                    <tr valign="top">
                                        <td width="20%">Nama Barang</td>
                                        <td width="1%">:</td>
                                        <td width="79%"><b id="label-nama"></b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-xs" onclick="checkAll();"><i class="far fa-check-square"></i> Check All</button>
                                            <button type="button" class="btn btn-secondary btn-xs" onclick="uncheckAll();"><i class="far fa-square"></i> Uncheck All</button>
                                            <button type="button" class="btn btn-secondary btn-xs" onclick="batalkanPerubahan();"><i class="fas fa-undo"></i> Batalkan Perubahan</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="id_barang" id="id-barang" />
                            <ul class="detail" style="list-style:none;"></ul>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanAlokasiBarangUnit()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Alokasi Barang Unit -->
