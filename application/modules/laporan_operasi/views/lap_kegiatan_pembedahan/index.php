<div class="card-body lap-kegiatan-pembedahan">
  <div id=jenis-periode></div>
  <div class="table-responsive  m-t-10" id="parent">
    <table id="table-lap-kegiatan-pembedahan" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <thead>
        <tr style="top: 0;">
          <th rowspan="2" widht="5%" class="center">No.</th>
          <th rowspan="2" class="center">Spesialisasi</th>
          <th colspan="2" class="center">Total</th>
          <th rowspan="2" class="center">Total Pasien</th>
          <th rowspan="2" class="center">Total Tindakan</th>
          <th rowspan="2" class="center">Tindakan Lain</th>
          <th rowspan="2" class="center">Kecil</th>
          <th rowspan="2" class="center">Sedang</th>
          <th rowspan="2" class="center">Besar</th>
          <th rowspan="2" class="center">Khusus</th>
        </tr>
        <tr>
          <th class="center">Elektif</th>
          <th class="center">Cito</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-kegiatan-pembedahan m-t-10">
    <div class="col">
      <div id="pagination02" class="float-left"></div>
      <div id="summary02" class="float-right text-sm"></div>
    </div>
  </div>
</div>

<?php $this->load->view('lap_kegiatan_pembedahan/js') ?>
