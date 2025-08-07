<!-- Modal Barang Farmasi -->
<div id="modal-barang-farmasi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 820px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-barang-farmasi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-barang-farmasi'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Utama</li>
                                    <li>Data Pelengkap</li>
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
                                    <div class="form-group row thin bahan_baku" style="display:none">
                                        <label class="col-lg-3 col-form-label">Jenis Bahan Baku</span> :</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bahan_baku" id="bahan_baku" class="form-control" placeholder="Bahan Baku ...">
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Nama Barang <span class="text-red">*</span>:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama barang ...">
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Nama Pabrik :</label>
                                        <div class="col-lg-9">
                                            <?= form_input('pabrik', NULL, 'id=pabrik class="select2-input"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kekuatan:</label>
                                        <div class="col-lg-2">
                                            <input type="text" name="kekuatan" id="kekuatan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label"></label>
                                        <div class="col-lg-9">
                                            <span class="text-red"><em>Jika bilangan pecahan dengan menggunakan titik jangan memakai koma.</em></span>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Satuan Kekuatan :</label>
                                        <div class="col-lg-9">
                                            <select name="satuan_kekuatan" id="satuan-kekuatan" class="form-control">
                                                <option value="">Pilih ...</option>
                                                <?php foreach ($satuan_kekuatan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Sediaan :</label>
                                        <div class="col-lg-9">
                                            <select name="sediaan" id="sediaan" class="form-control">
                                                <option value="">Pilih ...</option>
                                                <?php foreach ($sediaan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">ROA :</label>
                                        <div class="col-lg-9">
                                            <select name="roa" id="roa" class="form-control">
                                                <option value="">Pilih ...</option>
                                                <?php foreach ($roa as $data) : echo '<option value="'.$data.'">'.$data.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Generik :</label>
                                        <div class="col-lg-9">
                                            <select name="generik" class="form-control" id="generik">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Katastropik :</label>
                                        <div class="col-lg-9">
                                            <select name="katastropik" class="form-control" id="katastropik">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Golongan :</label>
                                        <div class="col-lg-9">
                                            <select name="golongan" id="golongan" class="form-control">
                                                <option value="">Pilih ...</option>
                                                <?php foreach ($golongan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Formularium :</label>
                                        <div class="col-lg-9">
                                            <select name="formularium" class="form-control" id="formularium">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Fornas :</label>
                                        <div class="col-lg-9">
                                            <select name="fornas" class="form-control" id="fornas">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
										<label class="col-lg-3 col-form-label">Obat kronis :</label>
										<div class="col-lg-9 mt-2">
											<label class="radio-inline" for="obatkronisyes"><?= form_radio('obatkronis', 1, FALSE, 'id=obatkronisyes') ?> Ya</label>
											<label class="radio-inline" for="obatkronisno"><?= form_radio('obatkronis', 0, FALSE, 'id=obatkronisno') ?> Tidak</label>
										</div>
									</div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">E-Katalog :</label>
                                        <div class="col-lg-9 mt-2">
                                            <label class="radio-inline" for="ekatalogyes"><?= form_radio('ekatalog', 'Ya', FALSE, 'id=ekatalogyes') ?> Ya</label>
                                            <label class="radio-inline" for="ekatalogno"><?= form_radio('ekatalog', 'Tidak', FALSE, 'id=ekatalogno') ?> Tidak</label>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">VEN :</label>
                                        <div class="col-lg-9">
                                            <?= form_dropdown('ven', array('Vital' => 'Vital', 'Essential' => 'Essential', 'Non Essential' => 'Non Essential'), 'Vital', 'class=form-control id=ven') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">ATDPS :</label>
                                        <div class="col-lg-9">
                                            <select name="atdps" class="form-control" id="atdps">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Antibiotik :</label>
                                        <div class="col-lg-9">
                                            <select name="antibiotik" class="form-control" id="antibiotik">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Utama -->

                                <!-- Data Pelengkap -->
                                <div class="form-data-pelengkap">
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Asal Perolehan :</label>
                                        <div class="col-lg-9">
                                            <?= form_dropdown('asal', array('Pembelian' => 'Pembelian', 'Konsinyasi' => 'Konsinyasi', 'Hasil Produksi' => 'Hasil Produksi', 'Hibah' => 'Donasi', 'Usulan Obat Baru' => 'Usulan Obat Baru'), '', 'class=form-control id="asal"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">High Alert :</label>
                                        <div class="col-lg-9">
                                            <select name="highalert" class="form-control" id="highalert">
                                                <option value="">Pilih ...</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Stok Minimal :</label>
                                        <div class="col-lg-3">
                                            <?= form_input('stok_min', NULL, 'id=stok-min class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Lokasi Rak :</label>
                                        <div class="col-lg-3">
                                            <?= form_input('rak', NULL, 'id=rak class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Harga Dasar <span class="text-red">*</span>:</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('harga_dasar', NULL, 'id=harga_dasar onblur="FormNum(this)" onkeyup="hitung_hja()" class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">HNA <span class="text-red">*</span>:</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('hna', NULL, 'id=hna onblur="FormNum(this)" class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">HPP <span class="text-red">*</span>:</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('hpp', NULL, 'id=hpp onblur="FormNum(this)" onkeyup="hitung_harga_dasar()" class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Margin Resep <span class="text-red">*</span>:</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <?= form_input('margin_resep_pr', NULL, 'id=margin-resep-pr onblur="FormNum(this)" onkeyup="hitung_hja()" class="form-control"') ?> 
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('margin_resep_rp', NULL, 'id=margin-resep-rp onblur="FormNum(this)" readonly class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Margin Non Resep <span class="text-red">*</span>:</label>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <?= form_input('margin_non_resep_pr', NULL, 'id=margin-non-resep-pr onblur="FormNum(this)" onkeyup="hitung_hja()" class="form-control"') ?> 
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <?= form_input('margin_non_resep_rp', NULL, 'id=margin-non-resep-rp onblur="FormNum(this)" readonly class="form-control"') ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kelas Terapi :</label>
                                        <div class="col-lg-9">
                                            <?= form_input('kls_terapi', NULL, 'id=kls-terapi class="select2-input"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Obat Kemoterapi :</label>
                                        <div class="col-lg-9">
                                            <select name="obatkemo" class="form-control" id="obatkemo">
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Indikasi :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('indikasi', NULL, 'cols=48 id=indikasi class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Dosis :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('dosis', NULL, 'cols=48 id=dosis class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kandungan :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('kandungan', NULL, 'cols=48 id=kandungan class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Perhatian :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('perhatian', NULL, 'cols=48 id=perhatian class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Kontra Indikasi :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('kontra_indikasi', NULL, 'cols=48 id=kontra-indikasi class="form-control"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row thin">
                                        <label class="col-lg-3 col-form-label">Efek Samping :</label>
                                        <div class="col-lg-9">
                                            <?= form_textarea('efek_samping', NULL, 'cols=48 id=efek-samping class="form-control"') ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pelengkap -->

                                <!-- Packing Barang -->
                                <div class="form-packing-barang">
                                    <?= form_button('tambah', '<i class="fas fa-plus-circle mr-2"></i> Tambah Kemasan' ,'id=btn-tambah-kemasan class="btn btn-info deletebarang mb-2" data-target=".bs-modal-lg"') ?>
                                    <table width="100%" class="data-input packing table-no-border" id="input-packing" cellpadding="0" cellspacing="0">

                                    </table>
                                    <!-- <span id="alert-kemasan">** Fitur edit & hapus packing barang ini sekarang dimatikan.</span> -->
                                    <span id="alert-kemasan"></span>
                                </div>
                                <!-- End Packing Barang -->

                                <!-- Kandungan Obat -->
                                <div class="form-kandungan-obat">
                                    <button type="button" class="btn btn-info mb-2" onclick="addNewKandungan('','')"><i class="fa fa-plus-circle mr-2"></i>Tambah Kandungan</button>
                                    <table width="100%" class="table-no-border" id="table-kandungan">
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!-- End Kandungan Obat -->
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
    <div class="modal-dialog" style="max-width: 1054px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="row">
                    <div class="col-lg-6">
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
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Sediaan :</label>
                            <div class="col-lg-9">
                                <select name="sediaan" class="form-control">
                                    <option value="">Semua ...</option>
                                    <?php foreach ($sediaan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">ROA :</label>
                            <div class="col-lg-9">
                                <select name="roa" class="form-control">
                                    <option value="">Semua ...</option>
                                    <?php foreach ($roa as $data) : echo '<option value="'.$data.'">'.$data.'</option>'; endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Generik :</label>
                            <div class="col-lg-9">
                                <select name="generik" class="form-control">
                                    <option value="">Semua ...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Golongan :</label>
                            <div class="col-lg-9">
                                <select name="golongan" class="form-control">
                                    <option value="">Semua ...</option>
                                    <?php foreach ($golongan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                                </select>
                            </div>
                        </div>						
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Formularium :</label>
                            <div class="col-lg-9">
                                <select name="formularium" class="form-control">
                                    <option value="">Semua ...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Fornas :</label>
                            <div class="col-lg-9">
                                <select name="fornas" class="form-control">
                                    <option value="">Semua ...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">VEN :</label>
                            <div class="col-lg-9">
                                <?= form_dropdown('ven', array('' => 'Semua ...', 'Vital' => 'Vital', 'Essential' => 'Essential', 'Non Essential' => 'Non Essential'), array(), 'class=form-control') ?>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Katastropik :</label>
                            <div class="col-lg-9">
                                <select name="katastropik" class="form-control">
                                    <option value="">Semua ...</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Asal Perolehan :</label>
                            <div class="col-lg-9">
                                <?= form_dropdown('asalperolehan', array('' => 'Semua ...', 'Pembelian' => 'Pembelian', 'Konsinyasi' => 'Konsinyasi', 'Hasil Produksi' => 'Hasil Produksi', 'Hibah' => 'Donasi', 'Usulan Obat Baru' => 'Usulan Obat Baru'), '', 'class=form-control') ?>
                            </div>
                        </div> -->
						<div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Obat Kronis :</label>
                            <div class="col-lg-9">
                                <?= form_dropdown('obatkronis', array('' => 'Semua ...', '1' => 'Ya', '0' => 'Tidak'), '', 'class=form-control') ?>
                            </div>
                        </div>
                        <div class="form-group row thin">
                            <label class="col-lg-3 col-form-label">Status Aktif :</label>
                            <div class="col-lg-9">
                                <select name="statusaktif" class="form-control">
                                    <option value="">Semua ...</option>
                                    <option value="Ya">Aktif</option>
                                    <option value="Tidak">Non Aktif</option>
                                </select>
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
