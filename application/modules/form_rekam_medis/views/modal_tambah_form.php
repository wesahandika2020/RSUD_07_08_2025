<!-- Modal Tambah Form -->
<div id="modal_tambah_form" class="modal fade" role="dialog" aria-labelledby="modal_tambah_form_label" style="z-index: 9999;" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_tambah_form_label"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="page_now_tambah" id="page-now-tambah">
        <div class="row">
          <div class="col d-flex justify-content-start">
          </div>
          <div class="col d-flex justify-content-end">
            <input type="text" name="keyword_form" id="keyword-form-search" class="form-control form-control-sm" style="width:100%" placeholder="Nama Formulir/ No. Formulir Rekam Medis ...">
          </div>
        </div>
        <div class="table-responsive">
          <table id="table_tambah_form_pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
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
        </div>
        <div class="row">
          <div class="col">
            <div id="pagination_tambah" class="float-left"></div>
            <div id="summary_tambah" class="float-right text-sm"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
        <button type="button" class="btn btn-info waves-effect" onclick="cariFormulir()"><i class="fas fa-search"></i> Cari</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Form -->