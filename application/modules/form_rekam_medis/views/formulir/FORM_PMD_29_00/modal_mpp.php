<!-- // FMPP -->
<div class="modal fade" id="modal_fmpp" role="dialog" data-backdrop="static" aria-labelledby="modal_fmpp_label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_ffmpp_title">FORMULIR MANAJER PELAYANAN PASIEN</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_fmpp class="form-horizontal"') ?>
          <input type="hidden" name="id_fmpp" id="id_fmpp">
          <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_fmpp">
          <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_fmpp">
          <input type="hidden" name="id_pasien" id="id_pasien_fmpp">
          <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
          <input type="hidden" name="action" id="action_fmpp">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="fmpp_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="fmpp_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="fmpp_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="fmpp_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="fmpp_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->									
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-no-border table-sm table-striped">
                <tr>
                  <td colspan="3">
                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="ctk_btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                    <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="ctk_btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                  </td>
                </tr>
              </table>

              <!-- form A -->
              <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                <tr>
                  <td colspan="3" class="center bold td-dark">
                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#form-a"><i class="fas fa-expand mr-1"></i>Expand</button>FORM A - EVALUASI AWAL MPP
                  </td>
                </tr>
              </table>
              <div class="collapse multi-collapse mt-2" id="form-a">
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td width="15%">Tanggal & jam</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <input type="text" name="fmpp_tanggal_a" id="fmpp_tanggal_a" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Catatan</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <!-- <input type="text" name="fmpp_catatan_a" id="fmpp_catatan_a" class="custom-form clear-input d-inline-block col-lg-12 ml-2"> -->
											<textarea name="fmpp_catatan_a" id="fmpp_catatan_a" class="custom-textarea" rows="3"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Petugas</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <input type="text" name="fmpp_petugas_a" id="fmpp_petugas_a" class="select2c-input ml-2">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" title="Tambah Catatan" class="btn btn-info" onclick="tambahFmppA()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data</button>
                    </td>
                  </tr>
                </table>
                <!-- <table id="fmpp_table_a" class="table table-hover table-striped table-sm color-table info-table"> -->
							  <table class="table table-sm table-striped table-bordered" id="fmpp_table_a">
                  <thead style="background-color: #B0C4DE;">
                    <tr>
                      <th width="2%" class="center">No.</th>
                      <th width="15%" class="center">Tanggal & Jam</th>
                      <th width="58%">Catatan</th>
                      <th width="15%" class="center">Petugas</th>
                      <th width="10%" class="center">Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>

              <!-- form B -->
              <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                <tr>
                  <td colspan="3" class="center bold td-dark">
                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#form-b"><i class="fas fa-expand mr-1"></i>Expand</button>FORM B - CATATAN IMPLEMENTASI MPP
                  </td>
                </tr>
              </table>
              <div class="collapse multi-collapse mt-2" id="form-b">
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td width="15%">Tanggal & jam</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <input type="text" name="fmpp_tanggal_b" id="fmpp_tanggal_b" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Catatan</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <!-- <input type="text" name="fmpp_catatan_b" id="fmpp_catatan_b" class="custom-form clear-input d-inline-block col-lg-12 ml-2"> -->
											<textarea name="fmpp_catatan_b" id="fmpp_catatan_b" class="custom-textarea" rows="3"></textarea>

                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Petugas</td>
                    <td width="1%">:</td>
                    <td width="84%">
                      <input type="text" name="fmpp_petugas_b" id="fmpp_petugas_b" class="select2c-input ml-2">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button type="button" title="Tambah Catatan" class="btn btn-info" onclick="tambahFmppB()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data</button>
                    </td>
                  </tr>
                </table>
                <!-- <table id="fmpp_table_b" class="table table-hover table-striped table-sm color-table info-table"> -->
							  <table class="table table-sm table-striped table-bordered" id="fmpp_table_b">
                  <thead style="background-color: #B0C4DE;">
                    <tr>
                      <th width="2%" class="center">No.</th>
                      <th width="15%" class="center">Tanggal & Jam</th>
                      <th width="58%">Catatan</th>
                      <th width="15%" class="center">Petugas</th>
                      <th width="10%" class="center">Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>

            </div>
          </div>
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button id="btn_simpan_fmpp" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriFmpp()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal fmpp -->


<!-- Modal Edit fmpp a -->
<div id="modal_edit_fmpp_a" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal_edit_fmpp_a_label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 75%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="background-color: #7FFF00; color: black; font-size: 30px;">FORM A - EVALUASI AWAL MPP</h4>  
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form_edit_fmpp_a'); ?>
        <input type="hidden" name="id_fmpp_a" id="dfmpp_id_a">
        <input type="hidden" name="action" id="action_dfmpp_a">
        <input type="hidden" name="id_pasien" id="dfmmp_id_pasien_a">
        <input type="hidden" name="id_pendaftaran" id="dfmmp_id_pendaftaran_a">
        <input type="hidden" name="id_layanan_pendaftaran" id="dfmmp_id_layanan_pendaftaran_a">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td width="15%">Tanggal & jam</td>
            <td width="1%">:</td>
            <td width="84%">
              <input type="text" name="fmpp_tanggal_a" id="dfmpp_tanggal_a" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
            </td>
          </tr>
          <tr>
            <td width="15%">Catatan</td>
            <td width="1%">:</td>
            <td width="84%">
              <!-- <input type="text" name="fmpp_catatan_a" id="dfmpp_catatan_a" class="custom-form clear-input d-inline-block col-lg-12 ml-2"> -->
							<textarea name="fmpp_catatan_a" id="dfmpp_catatan_a" class="custom-textarea" rows="5"></textarea>

            </td>
          </tr>
          <tr>
            <td width="15%">Petugas</td>
            <td width="1%">:</td>
            <td width="84%">
              <input type="text" name="fmpp_petugas_a" id="dfmpp_petugas_a" class="select2c-input ml-2">
            </td>
          </tr>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer">
        <button id="btn_update_fmpp_a" type="button" class="btn btn-info" onclick="updateFmpp()"><i class="fas fa-fw fa-save mr-1"></i>Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal fmpp a-->

<!-- Modal Edit fmpp b -->
<div id="modal_edit_fmpp_b" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal_edit_fmpp_b_label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 75%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="background-color: #7FFF00; color: black; font-size: 30px;">FORM B - CATATAN IMPLEMENTASI MPP</h4>  
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form_edit_fmpp_b'); ?>
        <input type="hidden" name="id_fmpp_b" id="dfmpp_id_b">
        <input type="hidden" name="action" id="action_dfmpp_b">
        <input type="hidden" name="id_pasien" id="dfmmp_id_pasien_b">
        <input type="hidden" name="id_pendaftaran" id="dfmmp_id_pendaftaran_b">
        <input type="hidden" name="id_layanan_pendaftaran" id="dfmmp_id_layanan_pendaftaran_b">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td width="15%">Tanggal & jam</td>
            <td width="1%">:</td>
            <td width="84%">
              <input type="text" name="fmpp_tanggal_b" id="dfmpp_tanggal_b" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
            </td>
          </tr>
          <tr>
            <td width="15%">Catatan</td>
            <td width="1%">:</td>
            <td width="84%">
              <!-- <input type="text" name="fmpp_catatan_b" id="dfmpp_catatan_b" class="custom-form clear-input d-inline-block col-lg-12 ml-2"> -->
							<textarea name="fmpp_catatan_b" id="dfmpp_catatan_b" class="custom-textarea" rows="5"></textarea>

            </td>
          </tr>
          <tr>
            <td width="15%">Petugas</td>
            <td width="1%">:</td>
            <td width="84%">
              <input type="text" name="fmpp_petugas_b" id="dfmpp_petugas_b" class="select2c-input ml-2">
            </td>
          </tr>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer">
        <button id="btn_update_fmpp_a" type="button" class="btn btn-info" onclick="updateFmpp()"><i class="fas fa-fw fa-save mr-1"></i>Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal fmpp b -->