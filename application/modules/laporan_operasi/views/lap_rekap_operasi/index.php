<div class="card-body lap-rekap-operasi">
  <div id=jenis-periode></div>
  <div class="table-responsive  m-t-10">
    <table id="table-lap-rekap-operasi" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <thead>
        <tr style="top: 0;">
          <th rowspan="2" widht="5%" class="center">No.</th>
          <th rowspan="2" class="center">Dokter Spesialisasi</th>
          <th rowspan="2" class="center">Nama Dokter</th>
          <th colspan="2" class="center">Jenis Operasi</th>
          <th rowspan="2" class="center">Jumlah Pasien</th>
          <th colspan="5" class="center">Spesifikasi Operasi</th>
          <th rowspan="2" class="center">Total Tindakan</th>
        </tr>
        <tr>
          <th class="center">Elektif</th>
          <th class="center">Cito</th>
          <th class="center">Tindakan Lain</th>
          <th class="center">Kecil</th>
          <th class="center">Sedang</th>
          <th class="center">Besar</th>
          <th class="center">Khusus</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-rekap-operasi m-t-10">
    <div class="col">
      <div id="pagination02" class="float-left"></div>
      <div id="summary02" class="float-right text-sm"></div>
    </div>
  </div>
</div>

<?php $this->load->view('lap_rekap_operasi/js') ?>
