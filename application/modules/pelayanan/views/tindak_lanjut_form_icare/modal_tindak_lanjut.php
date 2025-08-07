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
                <input type="hidden" name="id_layanan_pendaftaran" id="icare-layanan-pendaftaran">
                <input type="hidden" name="no_antrian" id="no-antrian">
                <input type="hidden" name="tanpa_resep" id="tanpa-resep">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Cara Keluar:</label>
                            <div class="col">
                                <?= form_dropdown('tindak_lanjut', $tindak_lanjut, array(), 'class="form-control validasi-input" id=tindak-lanjut') ?>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanTindakLanjut()"><i class="fas fa-plus-circle"></i> Checkout</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tindak lanjut -->

<?php $this->load->view('pelayanan/tindak_lanjut_form_icare/js') ?>