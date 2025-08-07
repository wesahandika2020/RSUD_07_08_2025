  <div class="card lap-bulanan-ppi">
    <div class="card-body">
      <div class="center">
        <h5 style="text-transform: uppercase;"><b>LAPORAN BULANAN</b></h5>
        <h5 style="text-transform: uppercase;"><b>DATA PEMAKAIAN ALAT DAN INFEKSI</b></h5>
        <!-- ?= var_dump($_SESSION) ? -->
      </div>
      <div id=label-ppi class="lef"></div>
      <div class="table-responsive  m-t-10" id="parent">
        <table id="table-lap-bulanan-ppi" class="table table-hover table-striped table-bordered table-sm color-table info-table">
          <thead>
            <tr style="top: 0;">
              <th rowspan="2" class="center">No.</th>
              <th rowspan="2" class="center">Tanggal</th>
              <th rowspan="2" class="center">Jumlah <br>Pasien</th>
              <th colspan="6" class="center">Pemakaian Alat</th>
              <th rowspan="2" class="center">VAP</th>
              <th rowspan="2" class="center">IADP</th>
              <th rowspan="2" class="center">Plebitis</th>
              <th rowspan="2" class="center">ISK</th>
              <th rowspan="2" class="center">Dekubitus</th>
              <th rowspan="2" class="center">IDO</th>
              <th rowspan="2" class="center">Kultur</th>
              <th rowspan="2" class="center">Antiobika</th>
            </tr>
            <tr>
              <th class="center">ETT</th>
              <th class="center">CVL</th>
              <th class="center">IVL</th>
              <th class="center">UC</th>
              <th class="center">Tirah <br>Baring</th>
              <th class="center">Operasi</th>
            </tr>
          </thead>
          <tbody style="overflow:scroll;"></tbody>
          <tfoot></tfoot>
        </table>
      </div>
      <div class="row lap-bulanan-ppi m-t-10">
        <div class="col">
          <div id="pagination01" class="float-left"></div>
          <div id="summary01" class="float-right text-sm"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row lap-bulanan-ppi">
    <div class="col-lg-6" style="display: grid;">
      <div class="card shadow">
        <div class="card-body">
          <!-- <div style="margin: 2rem;" class="card-body"> -->
          <div class="center">
            <h4 style="text-transform: uppercase;"><b>DATA ANGKA INFEKSI HS</b></h4>
          </div>
          <table id="table-angka-infeksi-hs" class="mt-4 table table-hover table-striped table-bordered table-sm color-table info-table">
            <thead>
              <tr style="top: 0;">
                <th width="50%" class="center font-large">ANGKA INFEKSI HS</th>
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
          <div id="angka-infeksi-chart"></div>
        </div>
      </div>
    </div>
  </div>