<!-- // PKN -->
<div class="modal fade" id="modal_pemantauan_khusus_neonatus" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_pemantauan_khusus_neonatus">Pengawasan Khusus Neonatus</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_pemantauan_khusus_neonatus class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>
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

        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">
              <div class="well">
                <div class="form-pengawasan-khusus-neonatus">
                  <table class="table table-no-border table-sm table-striped">
                  </table>
                  <div class="col">
                    <div id="buka-tutup-pkn"></div>
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered" id="tabel-pkn">
                          <thead style="background-color:rgb(141, 185, 243);">
                            <tr>
                              <th class="nowrap"><b>No</b></th>
                              <th class="nowrap"><b>Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Jam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Bb &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Lp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Kesadaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Pasien &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Inkubator &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Nadi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>RR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Modus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></th>
                              <th class="nowrap"><b>Peep Cm H20 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Buble &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Fio2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Sp02 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Flow &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Air &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Suhu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Line 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Line 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Plebitis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Oral &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>jml &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Muntah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Residu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>BAK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>BAB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Foto Therapy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>OBAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Perawat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <th class="nowrap"><b>Petugas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
                              <!-- <th class="nowrap" style="text-align: center;"><b>Alat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></th> -->
                              <th class="nowrap text-center"><b>Alat <span style="display: inline-block; width: 40px;"></span></b></th>
                            </tr>
                          </thead>
                            <tbody class="body-table"></tbody>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPemantauanKhususNeonatus()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>



<!-- // PKN EDIT -->
<div id="modal-edit-pengawasan-khusus-neonatus" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 85%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color:rgb(61, 5, 114);">Edit Pengawasan Khusus Neonatus</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengawasan-khusus-neonatus'); ?>
        <input type="hidden" name="id" id="id-pengawasan-khusus-neonatus">
        <div class="from-group">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pkn">
          <thead>
            <tr>
              <th class="center">Bb<b></th>
              <th class="center">Lp<b></th>
              <th class="center">Tanggal<b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="bb_pkn" id="bb-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="lp_pkn" id="lp-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="tgl_pkn" id="tgl-pkn-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th class="center"><b>Jam</b></th>
              <th class="center"><b>Kesadaran</b></th>
              <th class="center"><b>Pasien</b></th>
              <th class="center"><b>Inkubator</b></th>
              <th class="center"><b>Nadi</b></th>
              <th class="center"><b>RRt</b></th>
              <th class="center"><b>Modus</b></th>
              <th class="center"><b>Peep Cm H20</b></th>
              <th class="center"><b>Buble</b></th>
              <th class="center"><b>Fio2</b></th>
              <th class="center"><b>Sp02</b></th>
              <th class="center"><b>Flow</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="jam_pkn" id="jam-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="kesadaran_pkn" id="kesadaran-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="pasien_pkn" id="pasien-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="inkubator_pkn" id="inkubator-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="nadi_pkn" id="nadi-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="rr_pkn" id="rr-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="modus_pkn" id="modus-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="peep_pkn" id="peep-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="buble_pkn" id="buble-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="fio2_pkn" id="fio2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="spo2_pkn" id="spo2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="flow_pkn" id="flow-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th class="center"><b>Air</b></th>
              <th class="center"><b>Suhu</b></th>
              <th class="center"><b>Line 1</b></th>
              <th class="center"><b>Line 2</b></th>
              <th class="center"><b>Plebitis</b></th>
              <th class="center"><b>Oral</b></th>
              <th class="center"><b>Jml</b></th>
              <th class="center"><b>Muntah</b></th>
              <th class="center"><b>Residu</b></th>
              <th class="center"><b>BAK</b></th>
              <th class="center"><b>BAB</b></th>
              <th class="center"><b>Foto Therapy</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="air_pkn" id="air-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="suhu_pkn" id="suhu-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="line1_pkn" id="line1-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="line2_pkn" id="line2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="plebitis_pkn" id="plebitis-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="oral_pkn" id="oral-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="jml_pkn" id="jml-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="muntah_pkn" id="muntah-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="residu_pkn" id="residu-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="bak_pkn" id="bak-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="bab_pkn" id="bab-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="foto_therapy_pkn" id="foto-therapy-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
            </tr>
          </tbody>
        </table>
        <table>
          <thead>
            <tr>
              <th class="center"><b>Obat</b></th>
              <th class="center"><b>Perawat</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="obat_pkn" id="obat-pkn-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="perawat_pkn" id="perawat-pkn-edit" class="select2c-input ml-2"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-pkn">
      </div>
    </div>
  </div>
</div>
