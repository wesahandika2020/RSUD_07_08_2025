<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Length boys -->
<div class="modal fade" id="modal_hfb" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_hfb_title">LENGTH/Height-for-age BOYS</h5>
          <h6 class="modal-title bold" id="modal_hfb_title_2">Birth to 5 years (z-scores)</h6>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_hfb class="form-horizontal"') ?>
          <input type="hidden" name="hfb_id" id="hfb_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="hfb_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="hfb_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="hfb_id_pasien">
          <input type="hidden" name="id_bed" id="hfb_id_bed">
          <input type="hidden" name="id_users" id="hfb_id_users">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="hfb_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="hfb_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="hfb_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="hfb_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="hfb_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                    <td wdith="70%">: <span id="hfb_bed"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="hfb_logo_alergi">
                        <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="hfb_logo_alergi" class="img-thumbnail rounded" width="20%">
                        <!-- logo pasien alergi -->
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
              <div class="card">
                <div id="grafik_hfb" style="background-color: white; padding: .5rem; border-radius: 5px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <table class="table table-no-border table-sm table-striped" id="tabel_hfb">
                  <thead>
                      <tr>
                          <th class="center"><b>No</b></th>
                          <th class="center"><b>Tanggal</b></th>
                          <th class="center"><b>Umur</b></th>
                          <th class="center"><b>LENGTH/Height</b></th>
                      </tr>                                                       
                  </thead>
                  <tbody class="body-table">
                  </tbody>                                                                                                                                                                                   
                </table>
              </div>
            </div>
          </div>
          <!-- end content -->

        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" class="btn btn-info" onclick="simpanHfb()" id="btn_simpan_hfb"><i class="fas fa-fw fa-plus mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Length boys -->
