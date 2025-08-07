<!-- Modal Tindak lanjut -->
<div id="modal-tindak-lanjut" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-tindak-lanjut-label">Status Keluar Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-tindak-lanjut role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-inap">
                <input type="hidden" name="rhm_id_layanan_pendaftaran" id="rhm-id-layanan-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran2">
                <input type="hidden" name="no_antrian" id="no-antrian">
                <input type="hidden" name="tanpa_resep" id="tanpa-resep">
                <input type="hidden" name="id_penjamin" id="id_penjamin">
                <input type="hidden" name="layanan_tl" id="layanan_tl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Cara Keluar:</label>
                            <div class="col">
                                <?php $defaultTidakLanjut = $jenis === 'Poliklinik' ? 'Atas Izin Dokter' : [] ?>
                                <?= form_dropdown('tindak_lanjut', $tindak_lanjut, $defaultTidakLanjut, 'class="form-control validasi-input" id=tindak-lanjut') ?>
                            </div>
                        </div>
                        <div class="form-group row tight kondisi">
                            <label class="col-3 col-form-label">Keadaan Keluar:</label>
                            <div class="col">
                                <?= form_dropdown('kondisi_keluar', $kondisi_keluar, array(), 'class="form-control validasi-input" id=kondisi-keluar') ?>
                            </div>
                        </div>
                        <div class="form-group row tight rujuk">
                            <label class="col-3 col-form-label">RS Rujukan:</label>
                            <div class="col">
                                <input type="text" name="instansi_rujukan" class="select2-input" id="instansi-rujukan">
                            </div>
                        </div>
                        <div class="form-group row tight rujuk">
                            <label class="col-3 col-form-label">Keterangan Rujukan:</label>
                            <div class="col">
                               <textarea name="keterangan_rujukan" id="keterangan-rujukan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row tight ranap icare">
                            <label class="col-3 col-form-label">Dokter Pengirim:</label>
                            <div class="col">
                                <input type="text" name="dokter" class="select2-input" id="dokter-ranap">
                            </div>
                        </div>
                        <div class="form-group row tight ranap icare">
                            <label class="col-3 col-form-label">Dokter DPJP:</label>
                            <div class="col">
                                <input type="text" name="dokter_dpjp" class="select2-input" id="dokter-dpjp">
                            </div>
                        </div>
                        <div class="form-group row tight ranap">
                            <label class="col-3 col-form-label">Bangsal Tujuan:</label>
                            <div class="col">
                                <input type="text" name="bangsal" class="select2-input" id="bangsal-auto">
                            </div>
                        </div>
                        <div class="form-group row tight ranap">
                            <label class="col-3 col-form-label">Pindah Ruang?:</label>
                            <div class="col">
                                <input type="checkbox" name="pindah_ruang" id="pindah-ruang" value="1" class="mr-1 mt-2"><i>Check jika pasien pindah ruang</i>
                            </div>
                        </div>
                        <?php unset($jenis_igd['']) ?>
                        <div class="form-group row tight igd-area">
                            <label class="col-3 col-form-label">Jenis IGD:</label>
                            <div class="col">
                                <?= form_dropdown('jenis_igd', $jenis_igd, array(), 'class="form-control validasi-input" id=jenis-igd') ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?= form_close() ?>
            </div>
            <div class="modal-footer" id="footer-rehab">
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tindak lanjut -->

<!-- Modal SKB CEK -->
<div id="modal_surat_ket_kontrol_skb_cek" class="modal fade" role="dialog" aria-labelledby="modal_surat_ket_kontrol_skb_cek_label" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cek Data Surat Kontrol BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <?= form_open('','id=form_surat_ket_kontrol_skb_cek role=form class=form-horizontal') ?>
                <input type="hidden" id="skb-cek-id-surat-kontrol" name="skb_cek_id_surat_kontrol">
                <input type="hidden" id="skb-cek-id-pasien" name="skb_cek_id_pasien">
                <input type="hidden" id="skb-cek-jenis-kontrol" name="skb_cek_jenis_kontrol">
                <input type="hidden" id="skb-cek-no-kartu" name="skb_cek_no_kartu">
                <input type="hidden" id="skb-cek-id-pendaftaran" name="skb_cek_id_pendaftaran">
                <input type="hidden" id="skb-cek-id-layanan-pendaftaran" name="skb_cek_id_layanan_pendaftaran">
                
                    <div class="form-group row" style="margin-bottom: 0px;">                    
                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <table id="table-skb-pasien" class="table table-sm table-striped table-no-border table-hover" style="margin-bottom: 0px;">
                                <h4 style="margin-top: 10px;"><b>Respon SKB (dari BPJS)</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>Code</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><b><span id="skb-respon-code"></span></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Message</b></td>
                                        <td>:</td>
                                        <td><b><span id="skb-respon-message"></span></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        

                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <table id="table-skb-pasien" class="table table-sm table-striped table-no-border table-hover" style="margin-bottom: 0px;">
                                <h4 style="margin-top: 10px;"><b>Data Pasien</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>Nama</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><span id="skb-nama-cek"></span> ( <span id="skb-norm-cek"></span> )</td>
                                    </tr>
                                    <tr>
                                        <td><b>No Kartu</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="skb-nokartu-cek" name="skb_nokartu_cek"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>Tgl Kontrol</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="skb-tglkontrol-cek"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>Rujukan</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="skb-cek-bpjs-poli"></span>
                                            <span id="skb-cek-kode-bpjs-poli"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>No SEP Asal</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="skb-cek-sep-asal"></span>
                                            <br>
                                            <button type="button" class="btn btn-info waves-effect" onclick="btn_cek_skb_byNoBpjs()" id="cek_skb">Cek SKB</button>
                                            <br><br><b><span style="color: red;" id="skb-cek-notif"></span></b>
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="col-lg-12">
                            <table id="table-skb-bpjs" class="table table-sm table-striped table-no-border table-hover">
                                <h4 style="margin-top: 10px;"><b>Data Surat Kontrol BPJS</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>No SKB</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><input id="skb-no-cek" name="skb_no_cek" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><b>Nama</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><input id="skb-nama" name="skb_nama" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Poli Tujuan</b></td>
                                        <td>:</td>
                                        <td><input id="skb-poli" name="skb_poli" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Dokter Tujuan</b></td>
                                        <td>:</td>
                                        <td><input id="skb-dokter-cek" name="skb_dokter_cek" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl Rencana Kontrol</b></td>
                                        <td>:</td>
                                        <td>
                                            <input id="skb-tgl-kontrol-cek" name="skb_tgl_kontrol_cek" type="text" class="custom-form" readonly>
                                            <b><span style="color: red;" id="skb-tgl-kontrol-notif"></span></b>
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="SimpanDataSKBCek()"><i class="fas fa-search"></i> Simpan SKB</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal SKB CEK -->

<!-- Modal CEK SEP ASAL -->
<div id="modal_cek_sep_asal" class="modal fade" role="dialog" aria-labelledby="modal_cek_sep_asal_label" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cek SEP Asal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <?= form_open('','id=form_cek_sep_asal role=form class=form-horizontal') ?>
					<input type="hidden" id="csa-is-pasca-ranap">
                    <input type="hidden" id="csa-kode-bpjs">
                    <div class="form-group row" style="margin-bottom: 0px;">                    
                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <table id="table-skb-pasien" class="table table-sm table-striped table-no-border table-hover" style="margin-bottom: 0px;">
                                <h4 style="margin-top: 10px;"><b>Data Pasien</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>No BPJS</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><b><span id="csa-nopolish"></span></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No SEP Asal</b></td>
                                        <td>:</td>
                                        <td><b><span id="csa-sep-asal"></span></b>                                        
                                            <br>
                                            <button type="button" class="btn btn-info waves-effect" onclick="btn_cek_sep_asal()" id="cek_skb">Cek SKB</button>
                                            <br><br><b><span style="color: red;" id="cek-sep-asal-notif"></span></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         
                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <table id="table-skb-pasien" class="table table-sm table-striped table-no-border table-hover" style="margin-bottom: 0px;">
                                <h4 style="margin-top: 10px;"><b>Hasil Bridging BPJS</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>No SEP</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><span id="csa-nosep"></span></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl SEP</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="csa-tgl-sep"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>Poli</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="csa-poli"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>No Rujukan</b></td>
                                        <td>:</td>
                                        <td>
                                            <span id="csa-norujukan"></span>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>Poli Rujukan</b></td>
                                        <td>:</td>
                                        <td><span id="csa-poli-rujukan"></span></td>                                        
                                    </tr>
                                    <tr>
                                        <td><b>Asal Rujukan</b></td>
                                        <td>:</td>
                                        <td><span id="csa-asal-rujukan"></span></td>                                        
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><span id="btn-set-pasca-ranap"></span></td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
                <?= form_close() ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal CEK SEP ASAL -->

<?php $this->load->view('pelayanan/tindak_lanjut_form/js') ?>