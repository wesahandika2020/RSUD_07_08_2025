<!-- // PURJPD  // UPRJPD -->
<div class="modal fade" id="modal_resiko_jatuh_pasien_dewasa" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_resiko_jatuh_pasien_dewasa">PENGKAJIAN ULANG DAN PEMANTAUAN RISIKO JATUH PASIEN DEWASA</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_purjpd_uprjpd class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
                <input type="hidden" name="id_bed" id="ek-id-bed">
                <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
                <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
                <!-- <input type="hidden" name="id_users" id="ek-id-users" <!?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<!?php echo $nama_js; ?>> -->

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="ek_pasien_nama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="ek_pasien_no_rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ek_pasien_tanggal_lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="ek_pasien_jenis_kelamin"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="ek_pasien_alamat"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="ek_bed"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="ek-logo-pasien-alergi">
                                            <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="ek-logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="form-resiko-jatuh-pasien">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="pur-btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                            <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="pur-btn-collapse-all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-ulang-resiko"><i class="fas fa-expand mr-1"></i>Expand</button>PENGKAJIAN ULANG
                                            RISIKO JATUH PASIEN DEWASA
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2"id="data-pengkajian-ulang-resiko">
                                    <div class="col-lg-6">
                                        <div id="buka-tutup-pengkajian">
                                        </div>
                                        <div class="card">
                                            <table class="table table-sm table-striped table-bordered" id="tabel-pengkajian-ulang">
                                                <thead style="background-color:rgb(168, 241, 182);">
                                                    <tr>
                                                        <th class="center"><b>No</b></th>
                                                        <th class="center"><b>Tanggal</b></th>
                                                        <th class="center"><b>Jumlah Skor</b></th>                                 
                                                        <th class="center"><b>Perawat</b></th>
                                                        <!-- <th class="center"><b>Petugas</b></th> -->
                                                        <th class="center" colspan="2"><b>Alat</b></th>
                                                        <!-- <th class="center"><b>Alat</b></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody class="body-table">
                                                </tbody>
                                            </table>
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:15px">
                                                <tr>
                                                    <td>
                                                        <span class="bold">Keterangan</span><br>
                                                        <span class="ml-3">Tidak Beresiko : 0 - 24</span><br>
                                                        <span class="ml-3">Risiko Rendah : 25 - 50</span><br>
                                                        <span class="ml-3">Risiko Tinggi : ≥ 51</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="ml-6">*Pengecualian : Pasien Inpartu, Pasien Ruang
                                                            Intensif dinyatakan risiko jatuh tinggi (tidak perlu
                                                            dilakukan pengkajian)</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="ml-6">*Pasien tidak beresiko dan resiko jatuh
                                                            rendah tidak perlu pengkajian ulang kecuali ada perubahan
                                                            kondisi: penurunan kesadaran, post operasi, minum obat
                                                            berefek sedasi, transfer ke unit lain atau pasien mengalami
                                                            jatuh saat dirawat di RS</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <!--UPAYA PENCEGAHAN RISIKO JATUH PASIEN DEWASA-->
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-upaya-pencegahan-risiko-jatuh-pasien-dewasa"><i class="fas fa-expand mr-1"></i>Expand
                                            </button>
                                            UPAYA PENCEGAHAN RISIKO JATUH PASIEN DEWASA
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2" id="data-upaya-pencegahan-risiko-jatuh-pasien-dewasa">
                                    <div class="col-lg">
                                        <div id="buka-tutup-uprjpd">
                                        </div>
                                        <div class="card">
                                            <table class="table table-sm table-striped table-bordered" id="tabel-uprjpd">
                                                <thead>
                                                    <tr style="background-color:rgb(168, 241, 182);">
                                                        <th class="center"><b>No</b></th>
                                                        <th class="center"><b>Tanggal</b></th>
                                                        <th class="center"><b>Nama Perawat Pagi</b></th>
                                                        <th class="center"><b>Nama Perawat Siang</b></th>
                                                        <th class="center"><b>Nama Perawat Malam</b></th>
                                                        <!-- <th class="center"><b>Petugas</b></th> -->
                                                        <th class="center" colspan="2"><b>Alat</b></th>

                                                    </tr>
                                                </thead>
                                                <tbody class="body-table">

                                                </tbody>
                                            </table>
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                                <tr>
                                                    <td>
                                                        <span class="bold"> Catatan : Untuk Resiko Tinggi jatuh (Skor ≥51) Lakukan semua pedoman pencegahan resiko jatuh</span><br>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                                <tr>
                                                    <td>
                                                        Terimakasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriKeperawatan()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa'); ?>
                <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pasien-dewasa">
                <div class="from-group">
                    <label for="uprjpd-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                    <input type="text" name="uprjpd_tanggal_pengkajian" id="uprjpd-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpd">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                            <th class="center" colspan="2">Pagi</th>
                            <th class="center" colspan="2">Siang</th>
                            <th class="center" colspan="3">Malam</th>
                        </tr>
                        <tr>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 10</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 18</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 23</th>
                            <th class="center">Jam 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Rendah</td>
                        </tr>
                        <tr>
                            <td>Bel berfungsi dan mudah dijangkau</td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_p_ho" id="uprjpd-edit-bel-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_p_10" id="uprjpd-edit-bel-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_s_ho" id="uprjpd-edit-bel-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_s_18" id="uprjpd-edit-bel-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_m_ho" id="uprjpd-edit-bel-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_m_23" id="uprjpd-edit-bel-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_bel_m_4" id="uprjpd-edit-bel-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Roda tempat tidur terkunci</td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_p_ho" id="uprjpd-edit-roda-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_p_10" id="uprjpd-edit-roda-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_s_ho" id="uprjpd-edit-roda-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_s_18" id="uprjpd-edit-roda-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_m_ho" id="uprjpd-edit-roda-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_m_23" id="uprjpd-edit-roda-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_roda_m_4" id="uprjpd-edit-roda-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Posisikan tempat tidur pada posisi terendah</td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_p_ho" id="uprjpd-edit-ptt-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_p_10" id="uprjpd-edit-ptt-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_s_ho" id="uprjpd-edit-ptt-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_s_18" id="uprjpd-edit-ptt-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_m_ho" id="uprjpd-edit-ptt-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_m_23" id="uprjpd-edit-ptt-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ptt_m_4" id="uprjpd-edit-ptt-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Pagar pengaman tempat tidur dinaikan</td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_p_ho" id="uprjpd-edit-ppt-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_p_10" id="uprjpd-edit-ppt-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_s_ho" id="uprjpd-edit-ppt-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_s_18" id="uprjpd-edit-ppt-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_m_ho" id="uprjpd-edit-ppt-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_m_23" id="uprjpd-edit-ppt-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_ppt_m_4" id="uprjpd-edit-ppt-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Penerangan cukup</td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_ho" id="uprjpd-edit-penerangan-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_10" id="uprjpd-edit-penerangan-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_ho" id="uprjpd-edit-penerangan-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_18" id="uprjpd-edit-penerangan-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_ho" id="uprjpd-edit-penerangan-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_23" id="uprjpd-edit-penerangan-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_4" id="uprjpd-edit-penerangan-m-4"></td>
                        </tr>
                        <tr>
                            <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_p_ho" id="uprjpd-edit-alas-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_p_10" id="uprjpd-edit-alas-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_s_ho" id="uprjpd-edit-alas-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_s_18" id="uprjpd-edit-alas-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_m_ho" id="uprjpd-edit-alas-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_m_23" id="uprjpd-edit-alas-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alas_m_4" id="uprjpd-edit-alas-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Lantai kering dan tidak licin</td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_p_ho" id="uprjpd-edit-lantai-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_p_10" id="uprjpd-edit-lantai-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_s_ho" id="uprjpd-edit-lantai-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_s_18" id="uprjpd-edit-lantai-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_m_ho" id="uprjpd-edit-lantai-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_m_23" id="uprjpd-edit-lantai-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_lantai_m_4" id="uprjpd-edit-lantai-m-4"></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                        </tr>
                        <tr>
                            <td>Dekatkan alat-alat pasien</td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_p_ho" id="uprjpd-edit-alat-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_p_10" id="uprjpd-edit-alat-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_s_ho" id="uprjpd-edit-alat-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_s_18" id="uprjpd-edit-alat-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_m_ho" id="uprjpd-edit-alat-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_m_23" id="uprjpd-edit-alat-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_alat_m_4" id="uprjpd-edit-alat-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_ho" id="uprjpd-edit-edukasi-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_10" id="uprjpd-edit-edukasi-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_ho" id="uprjpd-edit-edukasi-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_18" id="uprjpd-edit-edukasi-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_ho" id="uprjpd-edit-edukasi-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_23" id="uprjpd-edit-edukasi-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_4" id="uprjpd-edit-edukasi-m-4"></td>
                        </tr>
                        <tr>
                            <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_p_ho" id="uprjpd-edit-commode-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_p_10" id="uprjpd-edit-commode-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_s_ho" id="uprjpd-edit-commode-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_s_18" id="uprjpd-edit-commode-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_m_ho" id="uprjpd-edit-commode-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_m_23" id="uprjpd-edit-commode-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_commode_m_4" id="uprjpd-edit-commode-m-4"></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                        </tr>
                        <tr>
                            <td>Pasang gelang khusus (Warna Kuning)</td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_p_ho" id="uprjpd-edit-gelang-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_p_10" id="uprjpd-edit-gelang-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_s_ho" id="uprjpd-edit-gelang-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_s_18" id="uprjpd-edit-gelang-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_m_ho" id="uprjpd-edit-gelang-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_m_23" id="uprjpd-edit-gelang-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_gelang_m_4" id="uprjpd-edit-gelang-m-4"></td>
                        </tr>
                        <tr>
                            <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_p_ho" id="uprjpd-edit-station-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_p_10" id="uprjpd-edit-station-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_s_ho" id="uprjpd-edit-station-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_s_18" id="uprjpd-edit-station-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_m_ho" id="uprjpd-edit-station-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_m_23" id="uprjpd-edit-station-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_station_m_4" id="uprjpd-edit-station-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_p_ho" id="uprjpd-edit-paraf-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_p_10" id="uprjpd-edit-paraf-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_s_ho" id="uprjpd-edit-paraf-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_s_18" id="uprjpd-edit-paraf-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_m_ho" id="uprjpd-edit-paraf-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_m_23" id="uprjpd-edit-paraf-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpd_paraf_m_4" id="uprjpd-edit-paraf-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="uprjpd_perawat_p" id="uprjpd-edit-perawat-p" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="uprjpd_perawat_s" id="uprjpd-edit-perawat-s" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="uprjpd_perawat_m" id="uprjpd-edit-perawat-m" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-uprjpd">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa -->
