<div class="card-body lap-anastesi-ok">
  <div id=jenis-periode></div>
  <div class="table-responsive  m-t-10" id="parent">
    <table width="50%" id="table-lap-anastesi-ok" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <thead>
        <tr style="top: 0;">
          <th class="center">No.</th>
          <th class="center">Dokter Anastesi</th>
          <th class="center">GA</th>
          <th class="center">RA</th>
          <th class="center">LA</th>
          <th class="center">Jumlah Pasien Operasi</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-anastesi-ok m-t-10">
    <div class="col">
      <div id="pagination03" class="float-left"></div>
      <div id="summary03" class="float-right text-sm"></div>
    </div>
  </div>
</div>

<?php $this->load->view('lap_anastesi_ok/js') ?>
