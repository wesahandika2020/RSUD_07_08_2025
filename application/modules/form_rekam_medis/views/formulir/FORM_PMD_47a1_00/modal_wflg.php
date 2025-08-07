<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_wflg" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_wflg_title">Weight-for-age GIRLS</h5>
          <h6 class="modal-title bold" id="modal_wflg_title_2">Birth to 5 years (z-scores)</h6>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_wflg class="form-horizontal"') ?>
          <input type="hidden" name="wflg_id" id="wflg_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="wflg_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="wflg_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="wflg_id_pasien">
          <input type="hidden" name="id_bed" id="wflg_id_bed">
          <input type="hidden" name="id_users" id="wflg_id_users">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="wflg_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="wflg_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="wflg_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="wflg_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="wflg_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                    <td wdith="70%">: <span id="wflg_bed"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="wflg_logo_alergi">
                        <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="wflg_logo_alergi" class="img-thumbnail rounded" width="20%">
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
                <div id="grafik_wflg" style="background-color: white; padding: .5rem; border-radius: 5px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <table class="table table-no-border table-sm table-striped" id="tabel_wflg">
                  <thead>
                      <tr>
                          <th class="center"><b>No</b></th>
                          <th class="center"><b>Tanggal</b></th>
                          <th class="center"><b>Umur</b></th>
                          <th class="center"><b>Weight</b></th>
                          <th class="center"><b>height</b></th>
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
        <!-- <div class="row">
					<table width="100%">
						<tr>
							<td class="text-right pr-3">
                <button type="button" class="btn btn-secondary mr-2" id="btn_reset" onclick="resetFormLT()"><i class="fas fa-history mr-1"></i>Reset Form</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriLT()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Laporan</button>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" class="btn btn-info" onclick="simpanWlfg()" id="btn_simpan_wlfg"><i class="fas fa-fw fa-plus mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
