<!-- Modal List Form -->
<div id="modal-list-form" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-list-form-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-list-form-label"></h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form-list-form role=form class="form-horizontal form-custom"') ?>
        <div class="row">
          <div class="col-lg-12">

            <!-- <h5 class="center"><b>UPLOAD FILE REKAM MEDIS PASIEN</b></h5><br> -->
            <table class="table table-sm table-detail table-striped" width="50%">
              <tr>
                <td width="150px"><b>Nama Pasien</b></td>
                <td width="1px">:</td>
                <td><span id="modal-nama-pasien"></span></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>:</td>
                <td><span id="modal-kelamin"></span></td>
              </tr>
              <tr>
                <td><b>Tanggal /Tempat Layanan</b></td>
                <td>:</td>
                <td><span id="modal-layanan"></span></td>
              </tr>
              <tr>
                <td><b>Dokter</b></td>
                <td>:</td>
                <td><span id="modal-dokter"></span></td>
              </tr>
            </table>


            <h5 class="center mt-4"><b>FORM REKAM MEDIS PASIEN</b></h5><br>

            <div class="row">
              <div class="col d-flex justify-content-start">
              </div>
              <div class="col d-flex justify-content-end">
                <!-- <button name="search" type="button" id="bt_search" class="btn btn-info waves-effect mr-1">Tambah Form</button> -->
                <?= form_button('tambah_form', '<i class="fas fa-plus mr-1"></i>Tambah Form', 'id=btn-tambah-form class="btn btn-info waves-effect mr-1"') ?>
              </div>
            </div>

            <table id="table_list_form_pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nomor Formulir</th>
                  <th>Nama Formulir</th>
                  <th class="text-center">Kategori Formulir</th>
                  <th></th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

            <!-- <div class="data-upload-kosong">
              <table class="table table-sm table-detail table-striped" width="50%">
                <tr>
                  <td class="center">
                    <h4 style="color: red;">TIDAK ADA DATA FILE UPLOAD REKAM MEDIS</h4>
                  </td>
                </tr>
              </table>
            </div> -->

          </div>
        </div>
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="tutupLoadView()" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Tutup</button>
        <!-- <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save"></i> Simpan</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal List Form -->