<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:600px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="tanggal-awal2" class="col-md-3 col-form-label right">Range Tanggal:</label>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal2" autocomplete="off" class="form-control" value="" data-format="dd/MM/yyyy hh:mm:ss">
                    </div>
                    <div class="col-md-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir2" autocomplete="off" class="form-control" value="<?= date('d/m/Y') ?>" data-format="dd/MM/yyyy hh:mm:ss">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="pasien-search" class="col-md-3 col-form-label right">Pasien:</label>
                    <div class="col-md-9">
                        <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListData(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pelayanan Bank Darah -->
<div id="modal-pelayanan" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pelayanan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pelayanan-label">Form Pelayanan Bank Darah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pelayanan role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
				<input type="hidden" name="id" id="id">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan">
                <input type="hidden" name="id_order_bank_darah" id="id-order-bank-darah">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <li>Tindakan</li>
                                    <li>Permintaan Darah</li>
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Pasien -->
                                <div class="form-info-pasien">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="15%"><b>Nama</b></td>
                                                    <td><span id="nama-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. RM</b></td>
                                                    <td><span id="no-rm-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Register</b></td>
                                                    <td><span id="no-register-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kelamin</b></td>
                                                    <td><span id="kelamin-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Umur/Tgl. Lahir</b></td>
                                                    <td><span id="umur-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cara Bayar</b></td>
                                                    <td><span id="cara-bayar-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Datang Dari</b></td>
                                                    <td><span id="datang-dari-detail"></span>, Kelas <span id="kelas-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
                                                    </td>
                                                </tr>	
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Tindakan Tambahan-->
                                <div class="form-tindakan-tambahan">
									<input type="hidden" name="tarif_tindakan" id="tarif-tindakan">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="operator" class="col-lg-4 col-form-label-custom right">Operator:</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="operator" class="select2c-input" id="operator-auto" placeholder="Pilih Operator">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="tindakan" class="col-lg-4 col-form-label-custom right">Tindakan:</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="tindakan" class="select2c-input" id="tindakan-auto" placeholder="Pilih Tindakan">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-4 col-form-label-custom"></label>
                                                <div class="col-lg-8">
                                                    <button type="button" title="Tambah Tindakan" class="btn btn-info" onclick="addTindakan()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tindakan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-tindakan">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th class="center">No</th>
                                                    <th>Nama Operator</th>
                                                    <th>Tindakan</th>
                                                    <th class="center">ONO</th>
                                                    <th class="right">Tarif</th>
                                                    <th class="center">Status LIS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Tindakan -->

								<!-- Form Permintaan Darah -->
								<div class="form-permintaan-darah">
									<div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="harga_jual" id="harga-jual-darah">
                                            <input type="hidden" id="nama-kemasan-darah">
                                            <input type="hidden" id="sisa-darah">
                                            <input type="hidden" name="id_penjamin_darah" id="id-penjamin-darah">
                                            <input type="hidden" name="total_darah" id="darah">
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-darah">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th width="5%">No.</th>
                                                        <th width="30%" class="left">Nama Barang</th>
                                                        <th width="10%" class="center">Unit Kemasan</th>
                                                        <th width="10%" class="center">Jumlah</th>
                                                        <!--<th width="10%" class="center">Sisa</th>-->
                                                        <th width="15%" class="right">Total</th>
                                                        <th width="15%" class="center">Status</th>
                                                        <th width="5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="right" colspan="5"><b>TOTAL</b></td>
                                                        <td class="right" id="darah-label"></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
								</div>
								<!-- End Form Permintaan Darah -->
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pelayanan Bank Darah -->