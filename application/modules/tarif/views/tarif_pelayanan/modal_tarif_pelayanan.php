<!-- Modal Tarif Pelayanan -->
<div id="modal_tarif_pelayanan" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal_tarif_pelayanan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_tarif_pelayanan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form_tarif_pelayanan'); ?>
                <input type="hidden" name="id" id="id_tarif_pelayanan">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row tight">
                            <label for="layanan_auto" class="col-3 col-form-label">Layanan</label>
                            <div class="col">
                                <input type="text" name="layanan" id="layanan_auto" class="select2-input">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="instalasi_auto" class="col-3 col-form-label">Instalasi</label>
                            <div class="col">
                                <input type="text" name="instalasi" id="instalasi_auto" class="select2-input">
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="kelas" class="col-3 col-form-label">Kelas</label>
                            <div class="col">
                                <?= form_dropdown('kelas', $kelas, array(), 'class=custom-select id=kelas') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="jenis" class="col-3 col-form-label">Jenis</label>
                            <div class="col">
                                <?= form_dropdown('jenis', $jenis, array(), 'class=custom-select id=jenis') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="bobot" class="col-3 col-form-label">Bobot</label>
                            <div class="col">
                                <?= form_dropdown('bobot', $bobot, array(), 'class=custom-select id=bobot') ?>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="keterangan" class="col-3 col-form-label">Keterangan</label>
                            <div class="col">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label for="total" class="col-3 col-form-label">Total</label>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" name="total" id="total" onkeyup="resetTotal()" onkeypress="return hanyaAngka(event)" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item bg-info text-white"><b><i class="fas fa-calculator m-r-5"></i>Komponen Tarif</b></li>
                            <li class="list-group-item">
                                <div class="form-group row tight">
                                    <label for="" class="col-4 col-form-label">Jasa Operator</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="jasa_nadis_persen" id="jasa_nadis-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="jasa_nadis" id="jasa_nadis" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label for="" class="col-4 col-form-label">Jasa RS</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="jasa_klinik_persen" id="jasa_klinik-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="jasa_klinik" id="jasa_klinik" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label for="" class="col-4 col-form-label">BHP</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="bhp_persen" id="bhp-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="bhp" id="bhp" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight autoshow">
                                    <label for="" class="col-4 col-form-label">Bahan Alat</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="bahan_alat_persen" id="bahan_alat-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="bahan_alat" id="bahan_alat" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight autoshow">
                                    <label for="" class="col-4 col-form-label">Dokter Anasthesi</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="dokter_anasthesi_persen" id="dokter_anasthesi-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="dokter_anasthesi" id="dokter_anasthesi" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight autoshow">
                                    <label for="" class="col-4 col-form-label">Penata Anasthesi</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="penata_anasthesi_persen" id="penata_anasthesi-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="penata_anasthesi" id="penata_anasthesi" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight autoshow">
                                    <label for="" class="col-4 col-form-label">Jasa Instrument</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="instrument_persen" id="instrument-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="instrument" id="instrument" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row tight autoshow">
                                    <label for="" class="col-4 col-form-label">Medis & Non Medis</label>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="text" name="medisnonmedis_persen" id="medisnonmedis-persen" onkeyup="komponenPersen(this)" onkeypress="return hanyaAngka(event)" class="form-control field_persen">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="medisnonmedis" id="medisnonmedis" onkeyup="komponenNominal(this)" onkeypress="return hanyaAngka(event)" class="form-control field_nominal">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanDataTarifPelayanan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tarif Pelayanan -->