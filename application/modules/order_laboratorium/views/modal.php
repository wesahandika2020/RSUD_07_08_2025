<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-search'); ?>
				<div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. RM</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm-search" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. Register</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_register" onkeypress="return hanyaAngka(event)" id="no-register" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Dokter Pemesan</label>
                    <div class="col-9">
                        <input name="dokter" id="dokter-ranap" class="select2-input">
                    </div>
                </div>
                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataOrderLaboratorium(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Batal Order Laboratorium -->
<div id="modal-batal-order-laboratorium" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Order Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-order-laboratorium'); ?>
				<div class="form-group tight">
					<input type="hidden" name="id_order" id="id-order">
                    <label class="col col-form-label">Keterangan Pembatalan</label>
                    <div class="col-lg-12">
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan pembatalan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanOrderLaboratorium()"><i class="fas fa-check-circle mr-1"></i>Batalkan Order</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Order Laboratorium -->

<!-- Modal Order Laboratorium -->
<div id="modal-order-laboratorium" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Order Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-order-laboratorium'); ?>
                <input type="hidden" name="id_order" id="id-order-laboratorium">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">ID. Order</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-order-detail"></span></b></td>
                                    <td width="20%">ONO</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-ono"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Waktu Order</td>
                                    <td>:</td>
                                    <td><b><span id="waktu-order-detail"></span></b></td>
                                    <td width="20%">Status LIS</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-status-lis"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Dokter Pemesan</td>
                                    <td>:</td>
                                    <td><b><span id="dokter-order-detail"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td><b><span id="layanan-detail"></span></b></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td>
                                </tr>
                                <tr id="permintaan-lab"></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">No. RM</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="no-rm-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>No.KTP</td>
                                    <td>:</td>
                                    <td><b><span id="ktp-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b><span id="nama-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Kelamin</td>
                                    <td>:</td>
                                    <td><b><span id="kelamin-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td><b><span id="umur-detail"></span></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-6">
                        <div class="form-group row tight">
                            <label class="col col-form-label">Dokter P. Jawab</label>
                            <div class="col-9">
                                <input type="text" name="dokter_pjwb" class="select2c-input" id="dokter-pjwb">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col col-form-label">Analis. Lab</label>
                            <div class="col-9">
                                <input type="text" name="analis" class="select2c-input" id="analis-laboratorium">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col col-form-label">Instansi Rujuk</label>
                            <div class="col-9">
                                <input type="text" name="instansi" class="select2c-input" id="instansi-auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <table id="table-order" class="table table-hover table-striped table-sm color-table info-table">
                            <thead>
                                <tr>
                                    <th width="10%" class="center">No.</th>
                                    <th class="left" width="20%">Layanan Laboratorium</th>
                                    <th class="center" width="8%">Keterangan</th>
                                    <th class="center" width="5%">Item</th>
                                    <th class="center" width="10%">Jenis</th>
                                    <th class="center" width="8%">Cito</th>
                                    <th class="left" width="10%">Penjamin</th>
                                    <th class="center" width="7%">Kelas</th>
                                    <th class="right" width="7%">Tarif</th>
                                    <th width="10%" class="center">Rujuk</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
			<div class="modal-footer" id="id-footer-lis">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Order Laboratorium -->

<!-- Modal Modal Dokter Penanggung Jawab -->
<div id="modal-dokter-penanggung-jawab" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Dokter Penanggung Jawab</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-dokter-penanggung-jawab'); ?>
				<div class="form-group row tight">
					<input type="hidden" name="" id="number-penanggung-jawab">
                    <label class="col col-form-label">Dokter</label>
                    <div class="col-lg-12">
                        <input type="text" name="" class="select2-input" id="dokter-penanggung-jawab">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="pilihDokterPenanggungJawab()"><i class="fas fa-check-circle mr-1"></i>Pilih</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Modal Dokter Penanggung Jawab -->

<div id="daftar-lab-modal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-daftar-lab-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formlab role=form class=form-horizontal') ?>
                    <input type="hidden" name="id_order" id="order-laboratorium">
                    <input type="hidden" name="id_layanan" id="id-layanan">
                    <input type="hidden" name="id_ono" id="no-ono">
                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan-lab"/>
                    <!-- <input type="hidden" name="id_layanan_asal" id="id_layanan_asal"/> -->
                    <input type="hidden" id="hd_item_lab"/>
                    <input type="hidden" id="hd_item_lab_label"/>

                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Dokter Perujuk</label>
                        <div class="col">
                            <input type="text" name="dokter_rujuk" class="select2-input" id="dokter_rujuk">
                        </div>
                    </div>
                    <?php
                        $jenis_lab = array(
                            '292' => 'Patologi Klinik',  
                            '293' => 'Patologi Anatomi', 
                            '298' => 'Mikrobiologi',
                        );
                    ?>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Jenis</label>
                        <div class="col">
                            <?= form_dropdown('jenis', $jenis_lab, array(), 'class="form-control" id=jenis_lab style="width: 300px;"') ?>
                        </div>  
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan-order-laboratorium">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Keterangan</label>
                        <div class="col">
                            <input type="text" name="keterangan_order_lab" class="form-control" id="keterangan_order_lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Cito</label>
                        <div class="col-1" style="flex: 0 0 5.33333%;">
                            <input type="checkbox" name="is_cito" class="form-control" id="is_cito_lab">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="daftar_laboratorium()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-daftar-lab">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Pemeriksaan</th>
                                <th class="center">Keterangan</th>
                                <th class="center">Item</th>
                                <th class="center">Tarif</th>
                                <th class="center">Cito</th>
                                <th class="center"></th>
                            </tr>
                        </thead>
                        <tbody>                                    
                        </tbody>
                    </table>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDaftarSysmex()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="item_lab_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Item Pemeriksaan Laboratorium</h4>
            </div>
            <div class="modal-body">
                <div class="form-toolbar">
                    <div class="toolbar-left">
                        <?= form_button('', '<i class="fa fa-list"></i> Check All' ,'onclick=check_all() class="btn btn-info waves-effect"')?>
                        <?= form_button('', '<i class="fa fa-list-alt"></i> Uncheck All' ,'onclick=uncheck_all() class="btn btn-info waves-effect"')?>
                    </div>
                </div>
                <?= form_open('','id=formitemlab role=form class=form-horizontal') ?>
                <p>Check &checkmark; untuk memilih item pemeriksaan laboratorium yang akan diorder</p>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table_item_lab">
                    <thead>
                        <tr>
                            <th align="center" width="5%">No.</th>
                            <th align="center" width="85%" class="center">Item</th>
                            <th align="center" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" onclick="simpan_item_lab()"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
