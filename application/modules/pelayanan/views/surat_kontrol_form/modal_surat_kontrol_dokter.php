<!-- Start Modal Surat Keterangan Kontrol -->
<div id="modal-surat-kontrol-dokter" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Surat Keterangan Kontrol (SKK)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-surat-kontrol-dokter role=form class=form-horizontal') ?>
                <input type="hidden" id="skd-petugas">
                <input type="hidden" name="skd_id_pendaftaran" id="skd-id-pendaftaran">
                <input type="hidden" name="skd_id_layanan_pendaftaran" id="skd-id-layanan-pendaftaran">
                <input type="hidden" name="skd_id_penjamin" id="skd-id-penjamin">
                <input type="hidden" name="skd_bpjs_unit_layanan_tujuan" id="skd-bpjs-unit-layanan-tujuan">
                <input type="hidden" name="skd_bpjs_dokter_tujuan" id="skd-bpjs-dokter-tujuan">
                <input type="hidden" name="skd_nosep" id="skd-nosep">
                <input type="hidden" name="skd_noskb" id="skd-noskb">
                <input type="hidden" name="skd_tglsebelum" id="skd-tglsebelum">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="25%" class="bold">No. RM</td>
                                    <td wdith="75%">: <span id="skd-id-pasien-tampil"></span></td>
                                    <input type="hidden" name="skd_id_pasien" id="skd-id-pasien">
                                </tr>
                                <tr>
                                    <td class="bold">Nama Pasien</td>
                                    <td>: <span id="skd-nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Umur</td>
                                    <td>: <span id="skd-umur"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Penjamin</td>
                                    <td>: <span id="skd-penjamin"></span> (<span id="skd-penjamin-nobpjs"></span>)</b></td>
                                </tr>
                                <tr>
                                    <td class="bold">Rujukan</td>
                                    <td>: <span id="skd-rujukan-poli"></span><span id="skd-rujukan"></span><span id="skd-rujukan-kode-bpjs-poli"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Kadaluarsa Rujukan</td>
                                    <td>: <span id="kadaluarsa-rujukan"></span><span id="faskes-asal-rujukan"></span> <span id="icon-bridging" style="padding: 5px;"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Waktu Layanan Asal</td>
                                    <td wdith="70%">: <span id="skd-waktu-layanan-asal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Poliklinik Asal</td>
                                    <td>: <span id="skd-unit-layanan-asal"></span><span id="skd-sep-asal"></span><span id="skd-btn-cek-sep-asal"></span></td>
                                    <input type="hidden" name="skd_id_unit_layanan_asal" id="skd-id-unit-layanan-asal">
                                    <input type="hidden" name="skd_bpjs_unit_layanan_asal" id="skd-bpjs-unit-layanan-asal">
                                </tr>
                                <tr>
                                    <td class="bold">Dokter Asal</td>
                                    <td>: <span id="skd-dokter-asal"></span></td>
                                    <input type="hidden" name="skd_id_dokter_asal" id="skd-id-dokter-asal">
                                </tr>
                                </tr>
                                    <td class="bold">Kontrol Pasca Ranap</td>
                                    <td>: <span id="skd-pasca-ranap"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Riwayat Kontrol Pasien</td>
                                    <td id="skd-btn-riwayat"></td>
                                </tr>
                                <tr id="skd-btn-kontrol-pengirim">
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
                    <div class="col-lg-6">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">No Surat Ket Kontrol <span class="text-red">*</span> </label>
                            <div class="col">
                                <input readonly type="text" name="skd_id" id="skd-id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Poliklinik Tujuan <span class="text-red">*</span> </label>
                            <div class="col">
                                <input type="text" name="skd_id_unit_layanan_tujuan" id="skd-id-unit-layanan-tujuan" class="select2-input" placeholder="Pilih Tempat Layanan">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Tanggal Kontrol <span class="text-red">*</span> </label>
                            <div class="col">
                                <input type="text" name="skd_tanggal_kontrol" id="skd-tanggal-kontrol" class="form-control" value="<?= date('d/m/Y', strtotime("+1 days")) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Checklist kondisi Pasien</label>
                            <div class="col">
                                <input type="checkbox" name="skd_prb" id="skd-prb" value="1" class="ml-4 mr-1 mt-2">
                                <label for="skd-prb"><i>PRB</i></label>
                                <input type="checkbox" name="skd_preoperasi" id="skd-preoperasi" value="1" class="ml-4 mr-1">
                                <label for="skd-preoperasi" class="mb-0"><i>Pre Operasi</i></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Dokter Tujuan</label>
                            <div class="col">
                                <select name="skd_id_dokter_tujuan" class="custom-select reset-select" id="skd-id-dokter-tujuan">
                                    <option value="">Pilih Dokter</option>
                                </select>
                            </div>
							<input type="hidden" name="skd_id_jadwal_dokter" id="skd-id-jadwal-dokter">
                        </div>
                        <div class="form-group row tight">
                            <label class="col-form-label" id="skd-jml-booking" style="padding-left: 10px; padding-bottom: 0px;"></label>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-form-label" id="skd-jml-booking-pending" style="padding-left: 10px;padding-top: 0px;padding-bottom: 0px;"></label>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-form-label" id="cek-tgl-rujukan" style="padding-left: 10px; padding-bottom: 0px;"></label>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-form-label" id="skd-kuota" style="padding-left: 10px;padding-top: 0px;"></label>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-form-label" id="skd-cek-poli" style="padding-left: 10px;padding-top: 0px;"></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group tight kontrol">
                            <label class="col-form-label">Alasan Kontrol</label>
                            <textarea name="skd_alasan_kontrol" id="skd-alasan-kontrol" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group tight kontrol">
                            <label class="col-form-label">Rencana Tindak Lanjut</label>
                            <textarea name="skd_tindak_lanjut" id="skd-tindak-lanjut" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group tight internal">
                            <label class="col-form-label">Jenis Bantuan</label><br>
                            <input type="checkbox" name="skd_konsul" id="skd-konsul" value="1" class="mr-1" style="margin-left: 8px;"><label for="skd-konsul">Konsultasi / tindakan masalah medik saat ini</label><br>
                            <input type="checkbox" name="skd_raber" id="skd-raber" value="1" class="mr-1 ml-2"><label for="skd-raber">Perawatan bersama untuk selanjutnya</label><br>
                            <input type="checkbox" name="skd_alih" id="skd-alih" value="1" class="mr-1 ml-2"><label for="skd-alih">Alih rawat kasus ini untuk selanutnya</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group tight internal">
                            <label class="col-form-label">Dirawat Dengan</label>
                            <textarea name="skd_dirawat_dengan" id="skd-dirawat-dengan" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group tight internal">
                            <label class="col-form-label">Keterangan</label>
                            <textarea name="skd_keterangan" id="skd-keterangan" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row tight" style="display: flex; justify-content: flex-end; gap:.5rem; margin-right: 0px;">
                    <!-- <div style="display: flex; "> -->
                    <?php if ($this->session->userdata('id_profesi_nadis') == '10' || $this->session->userdata('id_profesi_nadis') == '8' || $this->session->userdata('id_profesi_nadis') == '24') : ?>
                        <button type="button" class="btn btn-secondary waves-effect" onclick="batalSKD()" style="width: 106px;"><i class="fas fa-times-circle"></i> Batal</button>
                    <?php endif ?>

                    <div id="btn-simpan-skd">
                    </div>

                    <!-- </div> -->

                </div>

                <div class="form-group row tight tableskd" style="margin-left: 0px;">
                    <!-- <div style="display: flex; "> -->
                    <button type="button" class="btn btn-secondary waves-effect" onclick="reloadDataSKD()"><i class="fas fa-history"></i> Reload Data Surat Keterangan Kontrol</button>
                    <!-- </div> -->

                </div>
                <!-- <div class="card-body"> -->
                <div class="table-responsive tableskd" id="parent">
                    <table id="table_skd" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="center">Jenis</th>
                                <th class="center">Tgl<br>Kontrol</th>
                                <th class="center">Poli Tujuan</th>
								<th class="center">Shift Poli</th>
                                <th class="center">Dokter Tujuan</th>
                                <th class="center">PRB</th>
                                <th class="center">Pre<br>Operasi</th>
                                <th class="center">Surkon<br>BPJS</th>
                                <th class="center">Tgl</th>
                                <th class="center">Petugas</th>
                                <th class="center">Status<br>Booking</th>
                                <th class="center">Kode<br>Booking</th>
                                <th class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- </div> -->

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">			
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Surat Keterangan Kontrol-->

<!-- Start Modal Surat Keterangan Kontrol Riwayat-->
<div id="modal-surat-kontrol-dokter-riwayat" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:85%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Riwayat Kontrol Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-surat-kontrol-dokter-riwayat role=form class=form-horizontal') ?>
                <div class="form-group row tight" style="margin-left: 0px;" id="skd-btn-riwayat-reload">
                </div>
                <div class="table-responsive" id="parent">
                    <table id="table_skd_riwayat" class="table table-hover table-striped table-bordered table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="3%" class="text-center">No</th>
                                <th width="10%" class="center">Tgl Daftar</th>
                                <th width="7%" class="center">Jenis</th>
                                <th width="8%" class="center">Tgl Kontrol</th>
                                <th width="10%" class="center">Poli Asal</th>
                                <th width="10%" class="center">Dokter Asal</th>
                                <th width="10%" class="center">Poli Tujuan</th>
                                <th width="10%" class="center">Dokter Tujuan</th>
                                <th width="3%" class="center">PRB</th>
                                <th width="10%" class="center">Tgl Buat</th>
                                <th width="10%" class="center">Petugas</th>
                                <th width="9%" class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- </div> -->

                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-modal">
                <!-- <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Keluar</button> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Surat Keterangan Kontrol Riwayat-->

<!-- Start Modal Surat Keterangan Kontrol Internal-->
<div id="modal-surat-kontrol-dokter-internal" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:65%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Jawab Surat Keterangan Kontrol Internal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-surat-kontrol-dokter-interna role=form class=form-horizontal') ?>
                <input type="hidden" name="skdi_id" id="skdi-id">
                <input type="hidden" name="skdi_id_jawab" id="skdi-id-jawab">
                <input type="hidden" name="skdi_id_layanan_pendaftaran" id="skdi-id-layanan-pendaftaran">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">No. RM</td>
                                    <td wdith="70%">: <span id="skdi-id-pasien-tampil"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Nama Pasien</td>
                                    <td>: <span id="skdi-nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Umur</td>
                                    <td>: <span id="skdi-umur"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Poliklinik Asal</td>
                                    <td wdith="70%">: <span id="skdi-unit-layanan-asal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Dokter Asal</td>
                                    <td>: <span id="skdi-dokter-asal"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tgl Kunjungan Asal</td>
                                    <td>: <span id="skdi-tglkunjung-asal"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <label class="col-lg-12 center" style="margin-top: 10px;">
                    <h4><b>PERMINTAAN KONSULTASI</b></h4>
                </label>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-lg-4">
                        <div class="form-group tight">
                            <label class="col-form-label">Mohon bantuan sejawat untuk</label><br>
                            <input readonly="readonly" type="checkbox" id="skdi-konsul" value="1" class="mr-1" style="margin-left: 8px;">Konsultasi / tindakan masalah medik saat ini<br>
                            <input readonly="readonly" type="checkbox" id="skdi-raber" value="1" class="mr-1 ml-2">Perawatan bersama untuk selanjutnya<br>
                            <input readonly="readonly" type="checkbox" id="skdi-alih" value="1" class="mr-1 ml-2">Alih rawat kasus ini untuk selanutnya
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group tight">
                            <label class="col-form-label">Atas pasien ini, yang kami rawat dengan</label>
                            <textarea readonly id="skdi-dirawat-dengan" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group tight">
                            <label class="col-form-label">Keterangan klinik yang penting saat ini</label>
                            <textarea readonly id="skdi-keterangan" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <hr>
                <label class="col-lg-12 center" style="margin-top: 10px;">
                    <h4><b>JAWABAN KONSULTASI</b></h4>
                </label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group tight">
                            <label class="col-form-label">Hasil Pemeriksaan</label>
                            <textarea name="skdi_hasil_pemeriksaan" id="skdi-hasil-pemeriksaan" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group tight">
                            <label class="col-form-label">Saran tindakan medik / pengobatan</label>
                            <textarea name="skdi_saran" id="skdi-saran" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <div id="btn-simpan-skdi"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Surat Keterangan Kontrol Internal-->


<!-- <-?php $this->load->view('pelayanan/tindak_lanjut_form/js') ?> -->