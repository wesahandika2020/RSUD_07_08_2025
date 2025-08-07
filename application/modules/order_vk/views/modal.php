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
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataVK(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Pelayanan VK -->
<div id="modal-pelayanan-vk" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pelayanan-vk-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pelayanan-vk-label">Form Pelayanan VK (Verlos Kamer)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pelayanan-vk role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan">
                <input type="hidden" name="id_pasien" id="id-pasien">
                <input type="hidden" name="id_jadwal_vk" id="id-jadwal-vk">
                <input type="hidden" name="id_tarif_vk_asli" id="id-tarif-vk-asli">
                <input type="hidden" name="kelas_check" id="kelas_check">
                <input type="hidden" id="tindaklanjut">
                <input type="hidden" name="id_pasien" id="id-pasien">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <!-- <li>Diagnosis</li> -->
                                    <li>Tenaga Kesehatan</li>
                                    <li>Tindakan VK</li>
                                    <li>BHP</li>
                                    <li>Order Laboratorium</li>
                                    <li>Order Radiologi</li>
                                    <li>Order Operasi</li>
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
                                                <tr>
                                                    <td><b>Uploaod File Rekam Medis</b></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-xxs" id="btn-upload-file-vk"><i class="fas fa-upload m-r-5"></i>Upload File Rekam Medis</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Diagnosa -->
                                <!-- <div class="form-diagnosa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-no-border table-striped">
												<tr valign="top">
													<td width="50%" class="bold">Diagnosis Pra VK :</td>
													<td width="50%" class="bold">Diagnosis Pasca VK :</td>
												</tr>
												<tr valign="top">
													<td style="vertical-align:top !important">
														<div id="diagnosa-pra"></div>
														<button type="button" class="btn btn-info btn-xs" onclick="tambahDataDiagnosisPra()"><i class="fas fa-plus-circle mr-1"></i>Tambah Diagnosis Pra VK</button>
													</td>
													<td style="vertical-align:top !important">
														<div id="diagnosa-pasca"></div>
														<button type="button" class="btn btn-info btn-xs" onclick="tambahDataDiagnosisPasca()"><i class="fas fa-plus-circle mr-1"></i>Tambah Diagnosis Pasca VK</button>
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
                                                <label for="tindakan-icd9" class="col-lg-4 col-form-label-custom right">ICD-9 CM:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="tindakan_icd9" class="select2c-input" id="tindakan-icd9">
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
                                                    <th>Waktu</th>
                                                    <th>Nama Operator</th>
                                                    <th>Tindakan</th>
                                                    <th>ICD-9 CM</th>
                                                    <th class="right">Tarif</th>
                                                    <th>Petugas</th>
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
                                                <label for="barang-bhp" class="col-lg-2 col-form-label-custom right">Barang:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="barang" class="select2c-input" id="barang-bhp" placeholder="Pilih Barang BHP">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="kemasan-bhp" class="col-lg-2 col-form-label-custom right">Kemasan:</label>
                                                <div class="col-lg-5">
                                                    <select name="kemasan" id="kemasan-bhp" class="custom-form" style="width: 300px;">
                                                        <option value="">Pilih ...</option>
                                                        <?php //foreach ($satuan_kekuatan as $data) { echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="jumlah-bhp" class="col-lg-2 col-form-label-custom right">Jumlah</label>
                                                <div class="col-lg-1">
                                                    <input type="text" name="jumlah_bhp" class="custom-form" style="text-align: center" onkeypress="return hanyaAngka(this)" id="jumlah-bhp">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="amhp-bhp" class="col-lg-2 col-form-label-custom right">AMHP?</label>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="is_amhp" class="" id="is-amhp">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label class="col-lg-2 col-form-label-custom"></label>
                                                <div class="col-lg-6">
                                                    <button type="button" title="tambah bhp" class="btn btn-info" onclick="addBHP(); return false;"><span class="fas fa-plus-circle mr-1"></span>Tambah BHP</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm color-table info-table" id="table-bhp">
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
                                    <button type="button" title="order pemeriksaan lab" class="btn btn-info waves-effect" onclick="request_lab()"><i class="fa fa-plus"></i> Order Pemeriksaan Laboratorium</button>
                                    <br /><br />
                                    <div class="row" id="req_lab"></div>
                                </div>
                                <!-- Laboratorium -->

                                <!-- Radiologi -->
                                <div class="form-radiologi">
                                    <button type="button" title="order pemeriksaan rad" class="btn btn-info waves-effect" onclick="request_rad()"><i class="fa fa-plus"></i> Order Pemeriksaan Radiologi</button>
                                    <br /><br />
                                    <div class="row" id="req_rad"></div>
                                </div>
                                <!-- Radiologi -->

                                <!-- Operasi -->
                                <div class="form-operasi">
                                    <input type="hidden" name="id_jadwal_kamar_operasi" id="id-jadwal-kamar-operasi">
                                    <input type="hidden" name="tarif_operasi" id="tarif-operasi">
                                    <table class="table table-sm table-detail table-striped" width="100%">
                                        <tr>
                                            <td width="150px"><b>Pasien</b></td>
                                            <td width="1px">:</td>
                                            <td><span id="identitas-pasien-bhp"></span></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row tight">
                                                <label for="tindakan-operasi" class="col-md-3 col-form-label-custom right">Nama Operasi</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="tindakan_operasi" class="select2c-input" id="tindakan-operasi" placeholder="Pilih Tindakan Operasi">
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="timing-operasi" class="col-md-3 col-form-label-custom right">Timing Operasi</label>
                                                <div class="col-md-5">
                                                    <?= form_dropdown('timing_operasi', ['Terjadwal' => 'Terjadwal', 'Emergency' => 'Cito'], 'Terjadwal', 'id=timing-operasi class=custom-form') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row tight">
                                                <label for="" class="col-md-3 col-form-label-custom right"></label>
                                                <div class="col-md-9">
                                                    <button type="button" title="order operasi" class="btn btn-info" onclick="addOrderOperasi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Tindakan Operasi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-order-operasi">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="center">No.</th>
                                                        <th width="45%" class="left">Tindakan Operasi</th>
                                                        <th width="10%" class="left">Bobot</th>
                                                        <th width="10%" class="left">Timing</th>
                                                        <th width="10%" class="right">Tarif</th>
                                                        <th width="10%" class="center">Status</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Operasi -->
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
<!-- End Modal Pelayanan VK -->