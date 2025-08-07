<div class="card-body lap-bulanan-ibs">
  <div id=jenis-periode></div>
  <div class="table-responsive  m-t-10">
    <table id="table-lap-bulanan-ibs" class="table table-hover table-striped table-bordered table-sm color-table info-table">
      <thead>
        <tr style="top: 0;">
          <th rowspan="2" widht="5%" class="center">TOTAL PASEIN</th>
          <th colspan="2" class="center">TOTAL TINDAKAN</th>
          <th rowspan="2" class="center">TANGGAL</th>
          <th class="center">JAM</th>
          <th rowspan="2" class="center">TIME OUT</th>
          <th colspan="2" class="center">JAM OP</th>
          <th rowspan="2" class="center">SIGN OUT</th>
          <th rowspan="2" class="left">NAMA PASIEN</th>
          <th rowspan="2" class="center">UMUR</th>
          <th rowspan="2" class="center">JENIS KELAMIN</th>
          <th rowspan="2" class="center">NO. RM</th>
          <th rowspan="2" class="center">RUANG</th>
          <th rowspan="2" class="center">DIAGNOSA</th>
          <th rowspan="2" class="center">TINDAKAN</th>
          <th rowspan="2" class="center">KLASIFIKASI</th>
          <th rowspan="2" class="left">OPERATOR</th>
          <th colspan="3" class="center">ASSISTEN / INSTRUMEN</th>
          <th class="center">JENIS</th>
          <th rowspan="2" class="center">OK</th>
          <th rowspan="2" class="center">KATEGORI TINDAKAN</th>
          <th class="center">DOKTER</th>
          <th class="center">ASISTEN</th>
          <th class="center">JENIS OPERASI</th>
        </tr>
        <tr>
          <th class="center">/BLN</th>
          <th class="center">/HARI</th>
          <th class="center">RENCANA OP</th>
          <th class="center">MULAI</th>
          <th class="center">SELESAI</th>
          <th class="center">Asisten</th>
          <th class="center">Instrumen</th>
          <th class="center">Sirkuler</th>
          <th class="center">ANESTESI</th>
          <th class="center">ANESTHESI</th>
          <th class="center">ANESTHESI</th>
          <th class="center">CITO / ELEKTIF</th>
        </tr>
      </thead>
      <tbody style="overflow:scroll;"></tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <div class="row lap-bulanan-ibs m-t-10">
    <!-- <div class="col">
      <div id="pagination01" class="float-left"></div>
      <div id="summary01" class="float-right text-sm"></div>
    </div>
  </div> -->
  </div>
</div>

<?php $this->load->view('lap_bulanan_ibs/js') ?>