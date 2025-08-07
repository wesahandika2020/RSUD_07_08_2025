<div class="card-body lap-pemakaian-obat-all-unit">
  <div id="jenis-periode-pemakaian-obat-all-unit"></div>
  <!-- <div class="row">
    <div class="col-lg-8" id="jenis-periode-pemakaian-obat-all-unit"></div>
    <div class="col-lg-4 d-flex justify-content-end">
      <button type="button" id=btn-all-unit class="btn waves-effect waves-light btn-info"><i class="fas fa-book mr-1"></i>Pemakaian All Unit</button>
    </div>
  </div> -->
  <div class="table-responsive  m-t-10" id="parent">
    <!-- <div class="table-freeze"> -->
    <table id="table-lap-pemakaian-obat-all-unit" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <!-- <table id="table-lap-pemakaian-obat-all-unit" class="table display nowrap table table-hover table-sm table-striped table-bordered dataTable color-table info-table m-t-5"> -->
      <thead>
        <tr style="top: 0;">
          <th width="5%" class="center">No.</th>
          <th width="7%" class="center">Kode Obat</th>
          <th width="41%" class="center">Nama Obat</th>
          <th width="7%" class="center">Kepemilikan</th>
          <th width="5%" class="center">IGD</th>
          <th width="5%" class="center">OK</th>
          <th width="5%" class="center">RJ</th>
          <th width="5%" class="center">RI</th>
          <th width="7%" class="center">Total</th>
          <th width="13%" class="center">Nilai</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-pemakaian-obat-all-unit m-t-10">
    <div class="col">
      <div id="pagination-05" class="float-left"></div>
      <div id="summary-05" class="float-right text-sm"></div>
    </div>
  </div>
  <small>
    <ul class="list-unstyled font-weight-bold">
      <li> Keterangan :
        <ul>
          <li>IGD &nbsp;= Depo Farmasi IGD</li>
          <li>OK &nbsp; = Depo Farmasi OK Central</li>
          <li>RJ &nbsp; = Depo Farmasi Rawat Jalan</li>
          <li>RI &nbsp; &nbsp;= Depo Farmasi Rawat Inap</li>
          <li>RI &nbsp; &nbsp;= Hemodialisa</li>
        </ul>
      </li>
    </ul>
  </small>
</div>