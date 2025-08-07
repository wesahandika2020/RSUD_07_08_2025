<!-- Modal Search -->
<div id="modal_surat_ket_kontrol_tambah" class="modal fade" role="dialog" aria-labelledby="modal_surat_ket_kontrol_tambah_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Surat Keterangan Kontrol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_surat_ket_kontrol_tambah role=form class=form-horizontal') ?>
                <input type="hidden" id="id_pasien_search">
                <input type="hidden" id="id_pendaftaran_search">
                <input type="hidden" id="id_layanan_pendaftaran_search">
                <input type="hidden" id="status_terlayani">
                <input type="hidden" id="jenis_pendaftaran">

                
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pasien</label>
                        <div class="col-md-9">
                            <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Kunjungan</label>
                        <div class="col-md-9">
                                <select name="tgl-search" id="tgl-search" class="form-control"> </select>
                        </div>
                    </div>
                    
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="btn_tambah_skk()"><i class="fas fa-search"></i> Tambah SKK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal SKB Manual -->
<div id="modal_surat_ket_kontrol_skb_manual" class="modal fade" role="dialog" aria-labelledby="modal_surat_ket_kontrol_skb_manual_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Surat Kontrol BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <?= form_open('','id=form_surat_ket_kontrol_skb_manual role=form class=form-horizontal') ?>
                <input type="hidden" id="id-skk-inputskb" name="id_skk_inputskb">
                <input type="hidden" id="id-pendaftaran-inputskb" name="id_pendaftaran_inputskb">
                <input type="hidden" id="id-layanan-pendaftaran-inputskb" name="id_layanan_pendaftaran_inputskb">
                <input type="hidden" id="skb-jenis-kontrol" name="skb_jenis_kontrol">
                <input type="hidden" id="id-pasien-inputskb" name="id_pasien_inputskb">
                
                    <div class="form-group row" style="margin-bottom: 0px;">
                        <div class="col-lg-12" style="padding-bottom: 10px;">
                            <table id="table-skb-pasien" class="table table-sm table-striped table-no-border table-hover" style="margin-bottom: 0px;">
                                <h4 style="margin-top: 10px;"><b>Data Pasien</b></h4>
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>Nama</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><b><span id="nama-inputskb"></span> ( <b><span id="id-pasien-skb"></span></b> )</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No Kartu</b></td>
                                        <td>:</td>
                                        <td><b><span id="nobpjs-inputskb"></span></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No SKB</b></td>
                                        <td>:</td>
                                        <td>
                                            <input id="no-skb" name="no_skb" type="text" placeholder="No Surat Kontrol BPJS" class="form-control-sm" style="margin-bottom: 10px;">
                                            <button type="button" class="btn btn-info waves-effect" onclick="btn_cek_skb()" id="cek_skb">Cek SKB</button>
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
                                        <td width="20%"><b>Nama</b></td>
                                        <td width="1%">:</td>
                                        <td width="79%"><input id="skb-nama" name="skb_nama" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>No Kartu</b></td>
                                        <td>:</td>
                                        <td><input id="skb-nobpjs" name="skb_nobpjs" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl Lahir</b></td>
                                        <td>:</td>
                                        <td><input id="skb-tgl-lahir" name="skb_tgl_lahir" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Poli Tujuan</b></td>
                                        <td>:</td>
                                        <td><input id="skb-poli" name="skb_poli" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Dokter Tujuan</b></td>
                                        <td>:</td>
                                        <td><input id="skb-dokter" name="skb_dokter" type="text" class="custom-form" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl Kontrol</b></td>
                                        <td>:</td>
                                        <td><input id="skb-tgl-kontrol" name="skb_tgl_kontrol" type="text" class="custom-form" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>

                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanSKB()"><i class="fas fa-search"></i> Tambah SKB</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal SKB MANUAL -->