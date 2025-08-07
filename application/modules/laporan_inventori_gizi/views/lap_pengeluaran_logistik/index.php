<div class="card-body lap-pengeluaran-logistik">
  <div id="jenis-periode-pengeluaran-logistik"></div>
  <!-- <div class="row">
    <div class="col-lg-8" id="jenis-periode-pengeluaran-logistik"></div>
    <div class="col-lg-4 d-flex justify-content-end">
      <button type="button" id=btn-all-unit class="btn waves-effect waves-light btn-info"><i class="fas fa-book mr-1"></i>Pemakaian All Unit</button>
    </div>
  </div> -->
  <div class="table-responsive  m-t-10" id="parent">
    <!-- <div class="table-freeze"> -->
    <table id="table-lap-pengeluaran-logistik" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <!-- <table id="table-lap-pengeluaran-logistik" class="table display nowrap table table-hover table-sm table-striped table-bordered dataTable color-table info-table m-t-5"> -->
      <thead>
        <tr style="top: 0;">
          <th class="center">No.</th>
          <th class="center">Tanggal Dikirim</th>
          <th class="center">No. Kirim</th>
          <th class="center">Unit Asal</th>
          <th class="center">Unit Tujuan</th>
          <th class="center">Kode</th>
          <th class="center">Nama Logistik</th>
          <th class="center">Kategori Barang</th>
          <th class="center">QTY</th>
          <th class="center">Total</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-pengeluaran-logistik m-t-10">
    <div class="col">
      <div id="pagination-kel" class="float-left"></div>
      <div id="summary-kel" class="float-right text-sm"></div>
    </div>
  </div>
</div>