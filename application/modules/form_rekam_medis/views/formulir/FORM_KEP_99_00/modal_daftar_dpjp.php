
<div class="modal fade" id="modal_daftar_dpjp" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_daftar_dpjp">FORM DAFTAR DPJP (DOKTER PENANGGUNG JAWAB PASIEN)</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_dokter_penangung_jawab_pasien class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

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

        <div class="row">
          <div class="col-lg-12">
            <!-- Form Daftar DPJP -->
            <div class="form-daftar-dpjp">
              <!-- <h5 class="center"><b>FORM DAFTAR DPJP (DOKTER PENANGGUNG JAWAB PASIEN)</b></h5> -->
              <table class="table table-no-border table-sm table-striped">
                <tr>
                  <td colspan="3">
                  </td>
                </tr>
              </table>
              <!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                <tr>
                  <td colspan="3" class="center bold td-dark">
                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-daftar-dpjp"><i class="fas fa-expand mr-1"></i>Expand</button>DAFTAR DOKTER
                    PENANGGUNG JAWAB PASIEN
                  </td>
                </tr>
              </table> -->
              <div class="mt-2" id="data-daftar-dpjp">
                <table class="table table-sm table-striped" style="margin-top: -15px">
                  <tr>
                    <td width="4%"></td>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td>
                        <!-- <input type="text" name="diagnosis_dokter" id="diagnosis-dokter" class="custom-form clear-input d-inline-block col-lg-8 ml-2"> -->
                        <textarea name="diagnosis_dokter" id="diagnosis-dokter" rows="4" class="form-control clear-input" placeholder=""></textarea>
                    </td>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>
                        <!-- <input type="text" name="keterangan_dpjp" id="keterangan-dpjp" class="custom-form clear-input d-inline-block col-lg-8 ml-2"> -->
                        <textarea name="keterangan_dpjp" id="keterangan-dpjp" rows="4" class="form-control clear-input" placeholder=""></textarea>
                    </td>

                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Tanggal Mulai DPJP</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_mulai_dpjp" id="tanggal-mulai-dpjp" placeholder="dd/mm/yyyy"></td>
                    <td>Tanggal Mulai DPJP Utama</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_mulai_dpjp_utama" id="tanggal-mulai-dpjp-utama" placeholder="dd/mm/yyyy"></td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Tanggal Akhir DPJP</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_akhir_dpjp" id="tanggal-akhir-dpjp" placeholder="dd/mm/yyyy"></td>
                    <td>Tanggal Akhir DPJP Utama</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_akhir_dpjp_utama" id="tanggal-akhir-dpjp-utama" placeholder="dd/mm/yyyy"></td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Nama DPJP</td>
                    <td>:</td>
                    <td>
                      <div class="form-group tight">
                        <input type="text" name="nama_dokter_dpjp" id="nama-dokter-dpjp" class="select2c-input ml-2">
                      </div>
                    </td>
                    <td>Nama DPJP Utama</td>
                    <td>:</td>
                    <td>
                      <div class="form-group tight">
                        <input type="text" name="nama_dokter_dpjp_utama" id="nama-dokter-dpjp-utama" class="select2c-input ml-2">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td><button type="button" title="Tambah DPJP" class="btn btn-info" onclick="tambahDokterDPJP()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Daftar
                        DPJP</button></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                <table class="table table-sm table-striped table-bordered" id="table-daftar-dokter-dpjp">
                  <thead class="thead-theme">
                    <tr>
                      <th class="center" rowspan="2">No</th>
                      <th class="center" rowspan="2">Diagnosa</th>
                      <th class="center" colspan="3">DPJP</th>
                      <th class="center" colspan="3">DPJP Utama</th>
                      <th class="center" rowspan="2">Keterangan</th>
                      <th class="center" rowspan="2">Petugas</th>
                      <th class="center" rowspan="2">Alat</th>
                    </tr>
                    <tr>
                      <th class="center">Nama</th>
                      <th class="center">Tanggal Mulai</th>
                      <th class="center">Tanggal AKhir</th>
                      <th class="center">Nama</th>
                      <th class="center">Tanggal Mulai</th>
                      <th class="center">Tanggal Akhir</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
            <!-- END Form Daftar DPJP -->

            <?= form_close() ?>
            <!-- </div> -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanDokterPenangungJawabPasien()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->

<!-- Edit -->
<div id="modal_edit_daftar_dpjp" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit DAFTAR DPJP (DOKTER PENANGGUNG JAWAB PASIEN)</b></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-daftar-dpjp'); ?>
                <input type="hidden" name="id" id="id-daftar-dpjp">
                <table class="table table-sm table-striped" style="margin-top: -15px">
                  <tr>
                    <td width="4%"></td>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td>
                        <!-- <input type="text" name="diagnosis_dokter" id="edit-diagnosis-dokter" class="custom-form clear-input d-inline-block col-lg-8 ml-2"> -->
                        <textarea name="diagnosis_dokter" id="edit-diagnosis-dokter" rows="4" class="form-control clear-input" placeholder=""></textarea>
                    </td>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>
                        <!-- <input type="text" name="keterangan_dpjp" id="edit-keterangan-dpjp" class="custom-form clear-input d-inline-block col-lg-8 ml-2"> -->
                        <textarea name="keterangan_dpjp" id="edit-keterangan-dpjp" rows="4" class="form-control clear-input" placeholder=""></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Tanggal Mulai DPJP</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_mulai_dpjp" id="edit-tanggal-mulai-dpjp"></td>
                    <td>Tanggal Mulai DPJP Utama</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_mulai_dpjp_utama" id="edit-tanggal-mulai-dpjp-utama"></td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Tanggal Akhir DPJP</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_akhir_dpjp" id="edit-tanggal-akhir-dpjp"></td>

                    <td>Tanggal Akhir DPJP Utama</td>
                    <td>:</td>
                    <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="tanggal_akhir_dpjp_utama" id="edit-tanggal-akhir-dpjp-utama"></td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td>Nama DPJP</td>
                    <td>:</td>
                    <td>
                      <div class="form-group tight">
                        <input type="text" name="nama_dokter_dpjp" id="edit-nama-dokter-dpjp" class="select2c-input ml-2">
                      </div>
                    </td>
                    <td>Nama DPJP Utama</td>
                    <td>:</td>
                    <td>
                      <div class="form-group tight">
                        <input type="text" name="nama_dokter_dpjp_utama" id="edit-nama-dokter-dpjp-utama" class="select2c-input ml-2">
                      </div>
                    </td>
                  </tr>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-daftar-dpjp">
            </div>
        </div>
    </div>
</div>