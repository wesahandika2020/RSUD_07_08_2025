<style>
    .blink-text {
        color: red;
        font-weight: bold;
        animation: blink-animation 1s steps(3, start) infinite;
        background-color: yellow;
    }

    @keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }
</style>

<!-- Modal Search -->
<div id="modal-search2" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:600px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-search2 role=form class=form-horizontal') ?>
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
                    <label for="pasien-search2" class="col-md-3 col-form-label right">Pasien:</label>
                    <div class="col-md-9">
                        <input type="text" name="pasien" id="pasien-search2" class="select2-input" placeholder="Pilih Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="tindakan-search2" class="col-md-3 col-form-label right">Nama Operasi:</label>
                    <div class="col-md-9">
                        <input type="text" name="tindakan" id="tindakan-search2" class="select2-input" placeholder="Pilih Nama Operasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="ruang-operasi-search2" class="col-md-3 col-form-label right">Ruang Operasi:</label>
                    <div class="col-md-9">
                        <input type="text" name="ruang_operasi" id="ruang-operasi-search2" class="select2-input" placeholder="Pilih Ruang Operasi">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="bobot-search2" class="col-md-3 col-form-label right">Bobot:</label>
                    <div class="col-md-9">
                        <?= form_dropdown('bobot', ['' => 'Semua Bobot ...', 'Minor' => 'Kecil', 'Standard' => 'Sedang', 'Mayor' => 'Besar', 'Khusus' => 'Khusus'], '', 'id=bobot-search2 class=form-control') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="timing-search2" class="col-md-3 col-form-label right">Timing:</label>
                    <div class="col-md-9">
                        <?= form_dropdown('timing', ['' => 'Semua Timing ...', 'Terjadwal' => 'Terjadwal', 'Emergency' => 'Cito'], '', 'id=timing-search2 class=form-control') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataOperasi(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pelayanan Operasi -->
<div id="modal-pelayanan-operasi" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pelayanan-operasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pelayanan-operasi-label">Form Pelayanan Operasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pelayanan-operasi role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan">
                <input type="hidden" name="id_jadwal_operasi" id="id-jadwal-operasi">
                <input type="hidden" name="id_tarif_operasi_asli" id="id-tarif-operasi-asli">
                <input type="hidden" name="kelas_check" id="kelas_check">
                <input type="hidden" name="id_pasien" id="id-pasien">
                <input type="hidden" id="tindaklanjut">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard2">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <!-- <li>Diagnosis</li> -->
                                    <li>Tenaga Kesehatan</li>
                                    <li>Tindakan Tambahan</li>
                                    <li>BHP</li>
                                    <li>Order Laboratorium</li>
                                    <li>Order Radiologi</li>
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Pasien -->
                                <div class="form-info-pasien">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="15%"><b>Nama</b></td>
                                                    <td><span id="nama-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. RM</b></td>
                                                    <td><span id="no-rm-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Register</b></td>
                                                    <td><span id="no-register-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kelamin</b></td>
                                                    <td><span id="kelamin-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Agama</b></td>
                                                    <td><span id="agama-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Umur/Tgl. Lahir</b></td>
                                                    <td><span id="umur-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Telp</b></td>
                                                    <td><span id="telp-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Cara Bayar</b></td>
                                                    <td><span id="cara-bayar-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Datang Dari</b></td>
                                                    <td><span id="datang-dari-detail2"></span>, Kelas <span id="kelas-detail2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Operasi</b></td>
                                                    <td><input type="text" name="tarif_operasi" id="tarif-operasi2" class="select2c-input" style="width:300px"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis <i>(Baru)</i></b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasienBaru(1)"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien <i>(Baru)</i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Riwayat Rekam Medis</b></td>
                                                    <td>
                                                        <button type="button" title="Klik untuk melihat riwayat rekam medis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatRekamMedisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Riwayat Rekam Medis Pasien</button> <!-- tambahan lina -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Uploaod File Rekam Medis</b></td>
                                                    <td>
                                                        <button type="button" title="Klik untuk upload file rekam medis pasien" class="btn btn-secondary btn-xxs" id="btn-upload-file"><i class="fas fa-upload m-r-5"></i>Upload File Rekam Medis</button> <!-- tambahan Wahyu -->
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Diagnosa -->
                                <!-- Ditutup karena OK hanya tindakan -->
                                <!-- <div class="form-diagnosa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-no-border table-striped">
												<tr valign="top">
													<td width="50%" class="bold">Diagnosis Pra Operasi :</td>
													<td width="50%" class="bold">Diagnosis Pasca Operasi :</td>
												</tr>
												<tr valign="top">
													<td style="vertical-align:top !important">
														<div id="diagnosa-pra"></div>
														<button type="button" class="btn btn-info btn-xs" onclick="tambahDataDiagnosisPra()"><i class="fas fa-plus-circle mr-1"></i>Tambah Diagnosis Pra Operasi</button>
													</td>
													<td style="vertical-align:top !important">
														<div id="diagnosa-pasca"></div>
														<button type="button" class="btn btn-info btn-xs" onclick="tambahDataDiagnosisPasca()"><i class="fas fa-plus-circle mr-1"></i>Tambah Diagnosis Pasca Operasi</button>
													</td>
												</tr>
											</table>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- End Form Diagnosa -->

                                <!-- Form Tenaga Kesehatan-->
                                <div class="form-tenaga-kesehatan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <table class="table table-sm table-no-border table-striped">
                                                <tr valign="top">
                                                    <td width="50%" class="bold">Dokter Operator :</td>
                                                    <td width="50%" class="bold">Tenaga Medis & Non Medis :</td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="vertical-align:top !important">
                                                        <div id="dokter-bedah"></div>
                                                        <div id="dokter-bedah-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterBedah()"><i class="fas fa-plus-circle mr-1"></i>Tambah Dokter Operator</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="dokter-pendamping"></div>
                                                        <div id="dokter-pendamping-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterPendamping()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tenaga Medis & Non Medis</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr valign="top">
                                                    <td width="50%" class="bold">Dokter Anesthesi :</td>
                                                    <td width="50%" class="bold">Perawat Anesthesi :</td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="vertical-align:top !important">
                                                        <div id="dokter-anesthesi"></div>
                                                        <div id="dokter-anesthesi-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterAnesthesi()"><i class="fas fa-plus-circle mr-1"></i>Tambah Dokter Anesthesi</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="perawat"></div>
                                                        <div id="perawat-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahPerawat()"><i class="fas fa-plus-circle mr-1"></i>Tambah Perawat</button>
                                                    </td>
                                                </tr>
                                            </table> -->
                                            <table class="table table-sm table-no-border table-striped">
                                                <tr valign="top">
                                                    <td width="33.33%" class="bold">Dokter Operator :</td>
                                                    <td width="33.33%" class="bold">Asisten Operator :</td>
                                                    <td width="33.33%" class="bold">Instrumental :</td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="vertical-align:top !important">
                                                        <div id="dokter-bedah"></div>
                                                        <div id="dokter-bedah-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterBedah()"><i class="fas fa-plus-circle mr-1"></i>Tambah Dokter Operator</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="asisten-operator"></div>
                                                        <div id="asisten-operator-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahAsistenOperator()"><i class="fas fa-plus-circle mr-1"></i>Tambah Asisten Operator</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="instrumental"></div>
                                                        <div id="instrumental-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahInstrumental()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tenaga Instrumental</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr valign="top">
                                                    <td width="33.33%" class="bold">Dokter Anesthesi :</td>
                                                    <td width="33.33%" class="bold">Sirkuler :</td>
                                                    <td width="33.33%" class="bold">Perawat Anesthesi :</td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="vertical-align:top !important">
                                                        <div id="dokter-anesthesi"></div>
                                                        <div id="dokter-anesthesi-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterAnesthesi()"><i class="fas fa-plus-circle mr-1"></i>Tambah Dokter Anesthesi</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="sirkuler"></div>
                                                        <div id="sirkuler-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahSirkuler()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tenaga Sirkuler</button>
                                                    </td>
                                                    <td style="vertical-align:top !important">
                                                        <div id="perawat"></div>
                                                        <div id="perawat-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahPerawat()"><i class="fas fa-plus-circle mr-1"></i>Tambah Perawat</button>
                                                    </td>
                                                </tr>

                                                <!-- Tambahan Wahyu -->
                                                <tr>
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr valign="top">
                                                    <td width="33.33%" class="bold">Dokter Resusitasi :</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="vertical-align:top !important">
                                                        <div>
                                                            <span class="blink-text"><i>Diisi Khusus Dokter Spesialis Anak</i></span>
                                                        </div>
                                                        <div id="dokter-resusitasi"></div>
                                                        <div id="dokter-resusitasi-hide" style="display:none"></div>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="tambahDokterResusitasi()"><i class="fas fa-plus-circle mr-1"></i>Tambah Dokter Resusitasi</button>
                                                    </td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tindakan -->

                                <!-- Form Tindakan Tambahan-->
                                <div class="form-tindakan-tambahan">
                                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="operator" class="col-lg-4 col-form-label-custom right">Operator:</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="operator" class="select2c-input" id="operator-auto2" placeholder="Pilih Operator">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="tindakan" class="col-lg-4 col-form-label-custom right">Tindakan:</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="tindakan" class="select2c-input" id="tindakan-auto2" placeholder="Pilih Tindakan">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-4 col-form-label-custom"></label>
                                                <div class="col-lg-8">
                                                    <button type="button" title="Tambah Tindakan" class="btn btn-info" onclick="addTindakan()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tindakan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-tindakan2">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th class="center">No</th>
                                                    <th>Nama Operator</th>
                                                    <th>Tindakan</th>
                                                    <th class="right">Tarif</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Tindakan -->

                                <!-- Form BHP -->
                                <div class="form-bhp">
                                    <input type="hidden" name="total" id="total">
                                    <input type="hidden" name="cektotal" id="cektotal" value="0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row tight">
                                                <label for="barang-bhp2" class="col-lg-2 col-form-label-custom right">Barang:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="barang" class="select2c-input" id="barang-bhp2" placeholder="Pilih Barang BHP">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="kemasan-bhp2" class="col-lg-2 col-form-label-custom right">Kemasan:</label>
                                                <div class="col-lg-5">
                                                    <select name="kemasan" id="kemasan-bhp2" class="custom-form" style="width: 300px;">
                                                        <option value="">Pilih ...</option>
                                                        <?php //foreach ($satuan_kekuatan as $data) { echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="jumlah-bhp2" class="col-lg-2 col-form-label-custom right">Jumlah</label>
                                                <div class="col-lg-1">
                                                    <input type="text" name="jumlah_bhp" class="custom-form" style="text-align: center" onkeypress="return hanyaAngka(this)" id="jumlah-bhp2">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row tight">
                                                <label for="amhp-bhp" class="col-lg-2 col-form-label-custom right">AMHP?</label>
                                                <div class="col-lg-6">
													<input type="checkbox" name="is_amhp" id="is-amhp">
                                                    <span class="text-muted pl-1"><i><small>Alat medis habis pakai ?</i></small></span>
                                                </div>
                                            </div> -->
                                            <div class="form-group row tight">
                                                <label class="col-lg-2 col-form-label-custom"></label>
                                                <div class="col-lg-6">
                                                    <button type="button" class="btn btn-info" onclick="addBHP(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah BHP</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-bhp2">
                                            <thead class="thead-theme">
                                                <tr>
                                                    <th width="3%">No.</th>
                                                    <th width="35%" class="left">Nama Barang</th>
                                                    <th width="10%" class="left">Unit Kemasan</th>
                                                    <th width="10%" class="center">Jumlah</th>
                                                    <th width="10%" class="left">Sisa Stok</th>
                                                    <th width="10%" class="right">Harga Jual</th>
                                                    <th width="10%" class="right">Diskon</th>
                                                    <th width="10%" class="right">SubTotal</th>
                                                    <th width="10%" class="right">Total</th>
                                                    <th width="3%"></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="right bold" style="font-size:14px" colspan="7">TOTAL</td>
                                                    <td class="right bold" style="font-size:14px" id="estimasi"></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Form BHP -->

                                <!-- Laboratorium -->
                                <div class="form-laboratorium">
                                    <button type="button" class="btn btn-info waves-effect" onclick="request_lab()"><i class="fa fa-plus"></i> Order Pemeriksaan Laboratorium</button>
                                    <br /><br />
                                    <div class="row" id="req_lab"></div>
                                </div>
                                <!-- Laboratorium -->
                                <!-- Radiologi -->
                                <div class="form-radiologi">
                                    <button type="button" class="btn btn-info waves-effect" onclick="request_rad()"><i class="fas fa-plus-circle mr-1"></i>Order Pemeriksaan Radiologi</button>
                                    <br /><br />
                                    <div class="row" id="req_rad"></div>
                                </div>
                                <!-- Radiologi -->
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
<!-- End Modal Pelayanan Operasi -->