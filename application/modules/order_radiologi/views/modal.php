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
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataOrderRadiologi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Batal Order Radiologi -->
<div id="modal-batal-order-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Order Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-order-radiologi'); ?>
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanOrderRadiologi()"><i class="fas fa-check-circle mr-1"></i>Batalkan Order</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Order Radiologi -->

<!-- Modal Order Radiologi -->
<div id="modal-order-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Order Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-order-radiologi'); ?>
                <input type="hidden" name="id_order" id="id-order-radiologi">
                <input type="hidden" name="id_pasien" id="id-pasien">

                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">ID. Order</td>
                                    <td width="1%">:</td>
                                    <td wdith="79%"><b><span id="id-order-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Waktu Order</td>
                                    <td>:</td>
                                    <td><b><span id="waktu-order-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Dokter Pemesan</td>
                                    <td>:</td>
                                    <td><b><span id="dokter-order-detail"></span></b></td>
                                </tr>
                                <tr id="permintaan-radiologi"></tr>
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
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b><span id="nama-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td><b><span id="layanan-detail"></span></b></td>
                                </tr>
                                <tr>
                                    <td><b>Riwayat Rekam Medis</b></td>
                                    <td>:</td>
                                    <td>
                                        <button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien</button> <!-- tambahan lina -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-6">
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
                                    <th width="5%" class="center">No.</th>
                                    <th class="left" width="15%">Layanan Radiologi</th>
                                    <th class="left" width="15%"><input type="hidden" id="r-rad">Ruangan</th>
                                    <th class="left" width="15%">Keterangan</th> 
                                    <th class="left" width="15%"><input type="hidden" id="dkt-dpjp">Dokter Pjwb Radiologi</th>
                                    <th class="left" width="5%">Cito</th>
                                    <th class="left" width="5%">Penjamin</th>
                                    <th class="center" width="5%">Kelas</th>
                                    <th class="right" width="5%">Tarif</th>
                                    <th width="5%">Rujuk</th>
                                    <th class="center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Order Radiologi -->

<!-- Modal Modal Dokter Penanggung Jawab -->
<div id="modal-dokter-penanggung-jawab" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Dokter Penanggung Jawab Radiologi</h4>
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
<!-- Modal Ruangan Radiologi -->
<div id="modal-ruangan-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ruangan Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-ruangan-radiologi'); ?>
                <div class="form-group row tight">
                    <input type="hidden" name="" id="number-ruang-radiologi">
                    <label class="col col-form-label">Ruang</label>
                    <div class="col-lg-12">
                        <input type="text" name="" class="select2-input" id="rr">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="pilihRuangRadiologi()"><i class="fas fa-check-circle mr-1"></i>Pilih</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Ruangan Radiologi -->

<div id="modal-req-radiologi" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-rad-label" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-req-radiologi-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formreqradio role=form class=form-horizontal') ?>
                    
                    <input type="hidden" name="id_layanan_asal_radiologi" id="id-layanan-asal-radiologi"/>
                    <input type="hidden" name="id_order_radiologi" id="id-order-daftar-radiologi"/>
                    <input type="hidden" name="tarif_tindakan" id="tarif_tindakan_rad"/>
                    <input type="hidden" id="hd_item_rad"/>
                    <input type="hidden" id="hd_item_rad_label"/>
                    
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Jenis</label>
                        <div class="col">
                            <?= form_dropdown('jenis_rad', array('Radiologi' => 'Radiologi', 'Cath Lab' => 'Cath Lab', 'Endoskopi' => 'Endoskopi'), array('Radiologi'), 'id=jenis_rad class=form-control') ?>
                            <!-- <input type="text" name="jenis_rad" id="jenis_rad" class="form-control" value="Radiologi" readonly> -->
                        </div>  
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Pemeriksaan</label>
                        <div class="col">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan-radiologi">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Keterangan Klinis</label>
                        <div class="col">
                            <input type="text" name="keterangan_order_rad" class="form-control" id="keterangan_order_rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Berat Badan</label>
                        <div class="col">
                            <input type="text" name="bb_rad" class="form-control" id="bb-rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Cito</label>
                        <div class="col-1" style="flex: 0 0 5.33333%;">
                            <input type="checkbox" name="is_cito" class="form-control" id="is_cito_rad">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="addRadiologi()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-rad">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Pemeriksaan</th>
                                <th class="center">Berat Badan</th>
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
                <button type="button" class="btn btn-info waves-effect" onclick="simpanRequestRadiologi()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Dokter Perujuk Radiologi -->
<div id="modal-dokter-perujuk-radiologi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Dokter Pemesan / Perujuk</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-dokter-perujuk-radiologi'); ?>
                <input type="hidden" name="id_order" id="id-order-rujuk-radiologi"/>
                <div class="form-group row tight">
                    <label class="col col-form-label">Dokter</label>
                    <div class="col-lg-12">
                        <input type="text" name="dokter_perujuk_radiologi" class="select2-input" id="dokter-perujuk-radiologi">
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="pilihDokterPerujukRadiologi()"><i class="fas fa-check-circle mr-1"></i>Pilih</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Dokter Perujuk Radiologi -->

<div id="daftar-rad" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-daftar-rad-label" aria-hidden="true">>
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-daftar-rad-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=formdaftarrad role=form class=form-horizontal') ?>
                    <input type="hidden" name="id_pendaftaran" id="id-daftar-rad" />
                    <input type="hidden" name="id_layanan" id="id-daftar-layanan" />
                    <div class="form-group row tight">
                        <label class="col-2 col-form-label">Berat Badan</label>
                        <div class="col-6">
                            <input type="text" name="daftar_bb_rad" class="form-control" id="daftar-bb-rad">
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanRad()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->