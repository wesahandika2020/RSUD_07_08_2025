<!-- Modal Pemeriksaan -->
<script>
    $('#dokter-diagnosa-resume').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                    jenis: $('#profesi').val(),
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data.total; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });
</script>
<div id="modal-pemeriksaan-resume" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pemeriksaan-resume-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pemeriksaan-resume-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pemeriksaan-resume role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_pasien" id="id-pasien-resume">
                <input type="hidden" name="id_layanan" id="id-layanan-resume">
                <input type="hidden" name="id_pendaftaran_pasien" id="id-pendaftaran-pasien-resume">
                <input type="hidden" id="no-ktp-pasien-resume">
                <input type="hidden" id="id-pasien-resume">
                <input type="hidden" id="nama-pasien-resume">
                <input type="hidden" id="tgl-lahir-resume">
                <input type="hidden" id="tindaklanjut-resume">
                <input type="hidden" name="jenis_layanan" value="Rawat Inap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-diagnosa">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <!-- <table class="table table-sm table-detail table-striped" width="100%">
                                            <tr>
                                                <td width="150px"><b>Pasien</b></td>
                                                <td width="1px">:</td>
                                                <td><span id="identitas-pasien-diagnosa-resume"></span></td>
                                            </tr>
                                        </table> -->
                                        <div class="form-group row tight">
                                            <label class="col-lg-4 col-form-label">Pasien</label>
                                            <div class="col-lg-8">
                                                <span id="identitas-pasien-diagnosa-resume"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="dokter-diagnosa-resume" class="col-lg-4 col-form-label">Dokter</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="dokter_diagnosa" class="select2c-input" id="dokter-diagnosa-resume">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label class="col-lg-4 col-form-label"></label>
                                            <div class="col-lg-8">
                                                <div class="form-check">
                                                    <input type="checkbox" name="diagnosa_manual" class="form-check-input" id="diagnosa-manual-resume">
                                                    <label class="form-check-label" for="diagnosa-manual-resume">Diagnosis Manual</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row tight golongan-sebab-sakit-resume">
                                            <label for="golongan-sebab-sakit-resume" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit-resume" class="select2c-input">
                                            </div>
                                        </div>
                                        <div class="form-group row tight golongan-sebab-sakit-lain-resume">
                                            <label for="golongan-sebab-sakit-lain-resume" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain-resume" class="custom-form validasi-input">
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="jenis_kasus_resume" class="col-lg-4 col-form-label-custom">Jenis Kasus</label>
                                            <div class="col-lg-4">
                                                <?= form_dropdown('jenis_kasus', array('' => 'Pilih', '1' => 'Baru', '0' => 'Lama'), array(), 'id=jenis_kasus_resume class=custom-form') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label class="col-lg-4 col-form-label-custom">Diagnosis Akhir</label>
                                            <div class="col-lg-8">
                                                <div class="form-check">
                                                    <input type="checkbox" name="diagnosa_akhir" class="form-check-input" id="diagnosa-akhir-resume">
                                                    <label class="form-check-label" for="diagnosa-akhir-resume">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label for="penyebab-kemation" class="col-lg-4 col-form-label-custom">Penyebab Kematian</label>
                                            <div class="col-lg-8">
                                                <div class="form-check">
                                                    <input type="checkbox" name="penyebab_kematian" class="form-check-input" id="penyebab-kematian-resume">
                                                    <label class="form-check-label" for="penyebab-kematian-resume">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row tight">
                                            <label class="col-lg-4 col-form-label-custom"></label>
                                            <div class="col-lg-8">
                                                <button type="button" onclick="addDiagnosaResume()" class="btn btn-info"><i class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosis</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosa-resume">
                                        <thead class="thead-theme">
                                            <tr>
                                                <th class="center">Show Resume</th>
                                                <th>Waktu</th>
                                                <th>Dokter</th>
                                                <th>Diagnosis</th>
                                                <th>Klinik</th>
                                                <th class="center">Prioritas</th>
                                                <th class="center">Jenis Kasus</th>
                                                <th>Diagnosis Banding</th>
                                                <th>Diagnosis Akhir</th>
                                                <th>Penyebab Kematian</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPemeriksaanResume()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pemeriksaan -->