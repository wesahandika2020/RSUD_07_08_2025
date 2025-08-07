<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-search'); ?>
				<div class="form-group row tight">
                    <label class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">No. RM</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm-search" placeholder="No. RM">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Bangsal</label>
                    <div class="col-9">
                        <?= form_dropdown('bangsal', $bangsal, array(), 'id=bangsal-search class=form-control') ?>
                    </div>
                </div>

                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListBookingBed(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Booking Bed -->
<div id="modal-booking-bed" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Booking Bed</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-booking-bed'); ?>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group row tight">
							<label class="col col-form-label">No. RM</label>
							<div class="col-9">
								<input class="select2-input" type="text" name="no_rm" onkeypress="return hanyaAngka(event)" id="no-rm">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col col-form-label">Pesan Ulang</label>
							<div class="col-9">
								<input type="number" onkeyup="maxOrder(this)" class="form-control" name="repeat" value="0" min="0" max="2" id="repeat">
								<span id="helpBlock" class="help-block"><i>Satu kali booking bed berlaku selama 6 jam, Pengulangan booking dapat dilakukan maksimal 2 kali</i></span>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col col-form-label"></label>
							<div class="col-9">
								<button type="button" class="btn btn-primary" onclick="pilihTempatTidur()"><i class="fas fa-bed mr-1"></i>Pilih Bed</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<table class="table table-sm table-striped table-no-border table-hover">
							<tbody>
								<tr>
									<td width="30%">Nama</td>
									<td width="1%">:</td>
									<td width="69%"><b><span id="nama-label" class="booking-label"></span></b></td>
								</tr>
								<tr>
									<td>Kelamin</td>
									<td>:</td>
									<td><b><span id="kelamin-label" class="booking-label"></span></b></td>
								</tr>
								<tr>
									<td>Umur/Tgl. Lahir</td>
									<td>:</td>
									<td><b><span id="usia-label" class="booking-label"></span></b></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><b><span id="alamat-label" class="booking-label"></span></b></td>
								</tr>
								<tr>
									<td>No. Telp</td>
									<td>:</td>
									<td><b><span id="no-telp-label" class="booking-label"></span></b></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-12">
						<h6>&#10004; Tempat tidur yang Dipesan</h6>
						<input type="hidden" name="id_bed" id="id-bed">
						<table class="table table-sm">
							<thead class="thead-light">
								<tr>
									<th class="center">Nama Bangsal</th>
									<th class="center">Ruang</th>
									<th class="center">No. Bed</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="center"><span id="bangsal-label" class="booking-label"></span></td>
									<td class="center"><span id="ruang-label" class="booking-label"></span></td>
									<td class="center"><span id="no-bed-label" class="booking-label"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiBookingBed()"><i class="fas fa-check-circle mr-1"></i>Pesan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Booking Bed -->

<?php $this->load->view('order_rawat_inap/bed_form') ?>