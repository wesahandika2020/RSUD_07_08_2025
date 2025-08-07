<div class="card lap-kultur-ppi">
  <div class="card-body">
    <div class="center">
      <h5 style="text-transform: uppercase;"><b>REKAPAN BULANAN</b></h5>
      <h5 style="text-transform: uppercase;"><b>DATA PEMAKAIAN KULTUR</b></h5>
      <!-- ?= var_dump($_SESSION) ? -->
    </div>
    <div id=label-kultur-ppi class="lef"></div>
    <div id="table-lap-kultur-ppi" class="table-responsive  m-t-10" id="parent">
      <!-- <table id="table-lap-kultur-ppi" class="table table-hover table-striped table-bordered table-sm color-table info-table">
        <thead></thead>
        <tbody style="overflow:scroll;"></tbody>
        <tfoot></tfoot>
      </table> -->
    </div>
    <div class="row lap-kultur-ppi m-t-10">
      <div class="col">
        <div id="pagination-02" class="float-left"></div>
        <div id="summary-02" class="float-right text-sm"></div>
      </div>
    </div>
  </div>
</div>

<div class="row lap-kultur-ppi">
  <div class="col-lg-6" style="display: grid;">
    <div class="card shadow">
      <div class="card-body">
        <!-- <div style="margin: 2rem;" class="card-body"> -->
        <div class="center">
          <h4 style="text-transform: uppercase;"><b>DATA ANGKA KULTUR</b></h4>
        </div>
        <table id="table-angka-kultur" class="mt-4 table table-hover table-striped table-bordered table-sm color-table info-table">
          <thead>
            <tr style="top: 0;">
              <th width="50%" class="center font-large">ANGKA KULTUR</th>
              <th width="50%" class="center font-large">PER MIL</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow">
      <div class="card-body">
        <!-- <div class="center">
          <h5 style="text-transform: uppercase;"><b>GRAFIK ANGKA INFEKSI HAIs</b></h5>
        </div> -->
        <div id="angka-kultur-chart"></div>
      </div>
    </div>
  </div>
</div>