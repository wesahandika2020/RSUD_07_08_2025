<script>
function cetakFRM() {
    let id = $('#id-rmf-log').val();
    // console.log(id);
    var dWidth = $(window).width();
                var dHeight = $(window).height();
                var x = screen.width / 2 - dWidth / 2;
                var y = screen.height / 2 - dHeight / 2;
    window.open(
    '<?= base_url("pemeriksaan_poli/cetak_detail_rehab_medik/") ?>' + id, 'Cetak Riwayat Rehab Medik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
}
</script>


<!-- Modal -->
<div class="modal fade" id="modal-detail-history-rehab-medik" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal-detail-history-rehab-medik-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_rmf_log" id="id-rmf-log">
                <!-- content -->
                <div class="row">
                    <div class="col-lg">
                        <div class="widget-body">
                            <div id="wizard_form_rajal">
                                <div class="form-modal-rehab-medik">
                                <table class="table table-no-border table-sm table-striped" id="table-detail-assesmen-awal">
                                        <thead>
                                            <tr>
                                                <td colspan="6">
                                                    <h4><b>ASESSMEN AWAL</b></h4>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="20%">Tanggal Pelayanan</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-tanggal-pelayanan"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Anamnesa</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-anamnesa"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Pemeriksaan Fisik dan Uji Fungsi</td>
                                                <td width="1%">:</td>
                                                <td><div id="drmf-pemeriksaan"></div></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Diagnosis Medis (ICD-10)</td>
                                                <td width="1%">:</td>
                                                <td><div id="drmf-diagnosa"></div></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Diagnosis Fungsi (ICD-10)</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-diagnosis-fungsi"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Pemeriksaan Penunjang</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-pemeriksaan-penunjang"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Tata Laksana KFR (ICD 9 CM)</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-tata-laksana"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Rekomendasi</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-rekomendasi-asessmen"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Evaluasi</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><span id="drmf-evaluasi"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Suspek Penyakit Akibat Kerja</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <span id="drmf-suspek-penyakit"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><b>JADWAL PROGRAM TERAPI</b></h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td width="20%">Permintaan Terapi</td>
                                                <td width="1%">:</td>
                                                <td><span id="drmf-permintaan-terapi"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-sm table-striped" id="table-detail-program">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">PROGRAM</th>
                                                <th rowspan="2" class="text-center">TANGGAL</th>
                                                <th colspan="3" class="text-center">PARAF</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">PASIEN</th>
                                                <th class="text-center">DOKTER</th>
                                                <th class="text-center">TERAPIS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="tr-0" hidden>
                                                <td><span id="drmf-program-0"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-0"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-0"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-0"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-0"></span></td>
                                            </tr>
                                            <tr id="tr-1" hidden>
                                                <td><span id="drmf-program-1"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-1"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-1"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-1"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-1"></span></td>
                                            </tr>
                                            <tr id="tr-2" hidden>
                                                <td><span id="drmf-program-2"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-2"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-2"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-2"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-2"></span></td>
                                            </tr>
                                            <tr id="tr-3" hidden>
                                                <td><span id="drmf-program-3"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-3"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-3"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-3"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-3"></span></td>
                                            </tr>
                                            <tr id="tr-4" hidden>
                                                <td><span id="drmf-program-4"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-4"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-4"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-4"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-4"></span></td>
                                            </tr>
                                            <tr id="tr-5" hidden>
                                                <td><span id="drmf-program-5"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-5"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-5"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-5"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-5"></span></td>
                                            </tr>
                                            <tr id="tr-6" hidden>
                                                <td><span id="drmf-program-6"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-6"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-6"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-6"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-6"></span></td>
                                            </tr>
                                            <tr id="tr-7" hidden>
                                                <td><span id="drmf-program-7"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-7"></span></td>
                                            </tr>
                                            <tr id="tr-8" hidden>
                                                <td><span id="drmf-program-7"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-7"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-7"></span></td>
                                            </tr>
                                            <tr id="tr-9" hidden>
                                                <td><span id="drmf-program-9"></span></td>
                                                <td class="text-center" width="20%"><span id="drmf-tanggal-program-9"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-pasien-9"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-dokter-9"></span></td>
                                                <td class="text-center"><span id="drmf-paraf-terapis-9"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><b>HASIL TINDAKAN UJI FUNGSI-PROSEDUR KEDOKTERAN FISIK DAN REHABILITASI MEDIS</b></h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="20%">Instrumen Uji Fungsi/Prosedur KFR</td>
                                                <td width="1%">:</td>
                                                <td><span id="drmf-instrumen-uji"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Hasil yang di dapat</td>
                                                <td width="1%">:</td>
                                                <td><span id="drmf-hasil"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Kesimpulan</td>
                                                <td width="1%">:</td>
                                                <td><span id="drmf-kesimpulan"></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Rekomendasi</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <span id="drmf-rekomendasi"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Status</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <span id="drmf-status"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Dokter Sp. KRF</td>
                                                <td width="1%">:</td>
                                                <td><span id="drmf-dokter"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="cetakFRM()" id="btn-cetak"><i class="fas fa-fw fa-print mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->