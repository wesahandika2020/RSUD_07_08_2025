<style>
  .table-summary-data-klaim {
    width: 50%;
    border: 1px solid #ccc;
  }

  .table-summary-data-klaim td {
    padding: 10px;
    border: 1px solid #ccc;
  }

  .discreet {
    color: #aaa;
    /* font-size: 0.9em; */
  }
</style>
<input type="hidden" name="page_now" id="page-now-kdo">
<div class="card-header pattern">
  <?= form_open('', 'id=form-search-kdo role=form class=form-horizontal') ?>
  <div class="row">
    <div class="col-lg-9 row">
      <div class="mr-2 bold" style="display: flex; align-items: center;">Filter :</div>
      <div class="d-flex align-items-center mr-2" style="width: 20%;">
        <select class="form-control-sm" name="jenis_rawat_kdo" id="jenis_rawat_kdo">
          <option value="3">Rawat Inap & Jalan</option>
          <option value="1">Rawat Inap</option>
          <option value="2">Rawat Jalan</option>s
        </select>
      </div>
      <div class="d-flex align-items-center mr-2" style="width: 20%;">
        <select class="form-control-sm d-flex align-items-center" name="filter_kdo" id="filter_kdo">
          <option value="tgl_pulang">Tanggal Pulang</option>
          <option value="tgl_grouping">Tanggal Grouping</option>
        </select>
      </div>
      <div class="d-flex align-items-center mr-2" style="width: 20%;">
        <input type="text" name="tanggal_seacrh_kdo" id="tanggal_seacrh_kdo" autocomplete="off" class="form-control-sm" value="<?= date('d/m/Y') ?>">
      </div>
      <div class="d-flex align-items-center mr-2" style="width: 15%;">
        <label id="label-jumlah-kdo" class="m-0 bold"></label>
      </div>
    </div>
    <div class="col-lg-3 d-flex justify-content-end">
      <button id="btn-kirim-klaim-online" type="button" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i>Kirim Klaim (Online)</button>
    </div>
  </div>
  <?= form_close() ?>
</div>
<div class="card-body">

  <div id="">
    <div style="padding:1em;text-align:center;">
      <table id="table-summary-kdo" align="center" style="width:50%;" class="table-summary-data-klaim">
        <thead>
          <tr>
            <td style="text-align:center;font-style:italic;" class="discreet" colspan="2">Jumlah Klaim</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="left">Rawat Inap</td>
            <td id="lbl-ranap-total" style="text-align:right;"></td>
          </tr>
          <tr>
            <td class="left">Rawat Jalan</td>
            <td id="lbl-rajal-total" style="text-align:right;"></td>
          </tr>
          <tr>
            <td class="left">Total</td>
            <td id="lbl-total" style="text-align:right;"></td>
          </tr>
          <tr>
            <td style="text-align:center;font-style:italic;" class="discreet" colspan="2">Status Pengiriman</td>
          </tr>
          <tr>
            <td class="left">Belum Terkirim</td>
            <td id="lbl-belum-kirim" style="text-align:right;"></td>
          </tr>
          <tr>
            <td class="left">Sudah Terkirim</td>
            <td id="lbl-terkirim" style="text-align:right;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;" id="tdbtn">
              <button id="btn-tampil-klaim-kdo" style="width: 30%;" type="button" class="btn btn-primary">Tampilkan Klaim</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="table-klaim-data-kdo" style="display:none;">
        <table id="table-klaim-data-kdo" class="table table-hover table-striped table-sm color-table primary-table">
          <thead>
            <tr>
              <th class="center">No.</th>
              <th class="center">Masuk</th>
              <th class="left">No. SEP</th>
              <th class="left">Pasien</th>
              <th class="left">CBG</th>
              <th class="left">Special Group</th>
              <th class="right">Tarif Klaim</th>
              <th class="right">Tarif RS</th>
              <th class="left">DC Kemenkes</th>
            </tr>
          </thead>
          <tbody></tbody>
          <tfoot></tfoot>
        </table>
        <div class="row">
          <div class="col">
            <div id="pagination-kdo" class="float-left"></div>
            <div id="summary-kdo" class="float-right text-sm"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('kirim-data-online/js') ?>
<?php $this->load->view('coding-grouping/modal_eklaim') ?>