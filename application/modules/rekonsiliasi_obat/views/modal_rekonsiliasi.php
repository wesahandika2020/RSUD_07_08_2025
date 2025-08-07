<!-- Modal List Form -->
<div id="modal-rekonsiliasi" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-rekonsiliasi-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-rekonsiliasi-label"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form-rekonsiliasi role=form class="form-horizontal form-custom"') ?>
        <input type="hidden" name="id_pendaftaran_rekon" id="id-pendaftaran-rekon">
        <input type="hidden" name="id_layanan_rekon" id="id-layanan-rekon">
        <input type="hidden" name="rm_rekon" id="rm-rekon">
        <input type="hidden" name="hitung" id="htg-length">
        <div class="row">
          <div class="col-lg-12">

            <table class="table table-sm table-detail table-striped" width="50%">
              <tr>
                <td width="150px"><b>Nama Pasien</b></td>
                <td width="1px">:</td>
                <td><span id="modal-nama-pasien"></span></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>:</td>
                <td><span id="modal-kelamin"></span></td>
              </tr>
              <tr>
                <td><b>Tanggal /Tempat Layanan</b></td>
                <td>:</td>
                <td><span id="modal-layanan"></span></td>
              </tr>
              <tr>
                <td><b>Dokter</b></td>
                <td>:</td>
                <td><span id="modal-dokter"></span></td>
              </tr>
            </table>


            <h5 class="center mt-4"><b>FORM REKONSILIASI OBAT</b></h5><br>
            <table class="table table-sm table-detail table-striped" style="margin: 0;padding: 0;border: none;max-width: 100%">
              <tr>
                <td width="15%"class="bold">Apoteker</td>
                <td width="1%" class="bold">:</td>
                <td class="bold"><input type="text" name="apoteker" id="apoteker" class="select2c-input"></td>
                <td></td>
              </tr>
              <tr>
                  <td width="15%"class="bold">Riwayat Alergi</td>
                  <td width="1%" class="bold">:</td>
                  <td class="bold">
                    <div class="input-group">
                          <input type="checkbox"
                              name="riwayat"
                              id="alergi-iya"
                              value="Pernah"
                              class="mr-1">Pernah
                          <input type="checkbox"
                              name="riwayat"
                              id="alergi-tidak"
                              value="Tidak"
                              class="mr-1 ml-2">Tidak Pernah
                      </div>
                  </td>
                  <td></td>
              </tr>
            </table>
            <table id="tabel-alergi" class="table table-sm table-detail table-striped" style="margin: 0;padding: 0;border: none;max-width: 50%">
              <tr>
                  <td width="2%">
                      
                  </td>
                  <td width="30%">
                      Obat Yang Menimbulkan Alergi
                  </td>
                  <td width="3%">
                      :
                  </td>
                  <td width="65%">
                      <textarea name="alergi_obat" id="alergi-obat" class="form-control" rows="2"></textarea>
                  </td>
              </tr>
              <tr>
                  <td width="2%">
                      
                  </td>
                  <td width="30%">
                      Seberapa Berat Alerginya
                  </td>
                  <td width="3%">
                      :
                  </td>
                  <td width="65%">
                      <?= form_dropdown('kriteria_alergi', $kriteria_alergi, array(), 'class="custom-select" id=kriteria-alergi') ?>
                  </td>
              </tr>
              <tr>
                  <td width="2%">
                      
                  </td>
                  <td width="30%">
                      Reaksi Alergi (Deskripsi Alergi)
                  </td>
                  <td width="3%">
                      :
                  </td>
                  <td width="65%">
                      <textarea name="reaksi_alergi" id="reaksi-alergi" class="form-control" rows="2"></textarea>
                  </td>
              </tr>
            </table>
            <table class="table table-sm table-detail table-striped" style="margin: 0;padding: 0;border: none;max-width: 50%">
              <tr>
                  <td width="25%" class="left" style="border-top: none;"></td>
                  <td width="25%" class="bold" style="border-top: none;padding: 0;"></td>
                  <td width="25%" class="bold" style="border-top: none;padding: 0;"></td>
                  <td width="25%" class="right" style="border-top: none;padding: 0;">
                    <button id="btn-tambah-riwayat" type="button" title="Tambah Riwayat" class="btn btn-info" onclick="tambahRiwayat()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Riwayat</button>
                  </td>
              </tr>
            </table>

            <table id="table-riwayat-alergi" class="table table-hover table-striped table-sm color-table info-table m-t-5" style="margin-top: 0.2rem;max-width: 50%;display: none;">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th class="left">Obat Yang Menimbulkan Alergi</th>
                  <th class="text-center">Seberapa Berat Alerginya<b>*</b>?</th>
                  <th class="left">Reaksi Alergi (Deskripsi Alergi)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

            <table id="keterangan-alergi" class="table table-sm table-detail table-striped" style="margin: 0;padding: 0;border: none;max-width: 50%">
              <tr>
                  <td width="20%" class="bold">*: Kriteria Alergi</td>
                  <td width="20%" class="bold">R: Ringan</td>
                  <td width="20%" class="bold">S: Sedang</td>
                  <td width="20%" class="bold">B: Berat</td>
                  <td width="20%" class="bold"></td>
              </tr>
            </table>


            <h5 class="center mt-4"><b>SEMUA OBAT, OBAT RESEP, OBAT BEBAS, HERBAL, ATAU TCM YANG DIBAWA</b></h5><br>

            <?php date_default_timezone_set('Asia/Jakarta'); ?>

            <div class="row">
              <div class="col d-flex justify-content-start">
                <div class="col-3">
                    <input type="text" name="tgl_rekon_awal" id="tgl-rekon-awal" class="form-control" value="<?= date('d/m/Y') ?>" placeholder="Tanggal Awal">
                </div>
                <div class="col-3">
                    <input type="text" name="tgl_rekon_akhir" id="tgl-rekon-akhir" class="form-control" value="<?= date('d/m/Y') ?>" placeholder="Tanggal Akhir">
                </div>
              </div>
              <div class="col d-flex justify-content-end">
                <?= form_button('tambah_resep', '<i class="fas fa-plus mr-1"></i>Tambah Resep Lain', 'id=tambah-resep class="btn btn-info waves-effect mr-1"') ?>
              </div>
            </div>

            <table id="table-resep-pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
              <thead>
                <tr>
                  <th rowspan="2" class="center">Tanggal</th>
                  <th rowspan="2" class="left">Nama Obat</th>
                  <th rowspan="2" class="center">Dosis/Frekuensi</th>
                  <th rowspan="2" class="left">Petugas</th>
                  <th rowspan="2" class="center">Berapa Lama</th>
                  <th rowspan="2" class="center">Alasan Minum Obat</th>
                  <th colspan="2" class="center">Berlanjut saat Rawat Inap/pindah ruangan/pulang**</th>
                  <th rowspan="2" class="center"></th>
                </tr>
                <tr>
                  <th class="center">Ya</th>
                  <th class="text-center">Tidak</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Tutup</button>
        <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiRekonsiliasi()"><i class="fas fa-save"></i> Simpan</button>
        <div id="cetak-rekonsiliasi"></div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal List Form -->


<div id="modal-tambah-resep" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-tambah-resep-label" aria-hidden="true">