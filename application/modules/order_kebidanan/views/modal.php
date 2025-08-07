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
                    <label class="col col-form-label">No. Register</label>
                    <div class="col-9">
                        <input class="form-control" type="text" name="no_register" onkeypress="return hanyaAngka(event)" id="no-register" placeholder="No. Register">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Nama</label>
                    <div class="col-9">
                        <input name="nama" id="nama-search" class="form-control" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col col-form-label">Dokter Pengirim</label>
                    <div class="col-9">
                        <input name="dokter" id="dokter-kebidanan" class="select2-input">
                    </div>
                </div>
                
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListDataOrderKebidanan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<!-- Modal Batal Order Kebidanan -->
<div id="modal-batal-order-kebidanan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembatalan Order Kebidanan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-batal-order-kebidanan'); ?>
				<div class="form-group tight">
					<input type="hidden" name="id_order" id="id-order">
                    <label class="col col-form-label">Keterangan Pembatalan</label>
                    <div class="col-lg-12">
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan pembatalan"></textarea>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanPembatalanOrderKebidanan()"><i class="fas fa-check-circle mr-1"></i>Batalkan Order</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Order Kebidanan -->

<!-- Modal Konfirmasi Bed -->
<div id="modal-konfirmasi-bed" class="modal fade">
	<div class="modal-dialog" style="max-width: 45%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title-konfirmasi-bed">Konfirmasi Masuk Ruang Kebidanan</h4>
				<button type="button" class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-kebidanan class=form-horizontal role=form') ?>
					<input type="hidden" name="id_order" id="id-order-kebidanan">
					<input type="hidden" name="kelamin" id="kelamin">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-kebidanan">
					<input type="hidden" name="id_layanan" id="id-layanan">
					<input type="hidden" name="id_bed" id="id-bed">
					<input type="hidden" name="id_booking" id="id-booking">
					<input type="hidden" name="id_dokter" id="id-dokter">
					<input type="hidden" name="cara_bayar" id="cara-bayar">
					<input type="hidden" name="penjamin" id="penjamin">
					<input type="hidden" name="no_polish_penjamin" id="no-polish-penjamin">

					<p>Pasien dengan No. Rekam Medik <b class="no-rm-kebidanan-label"></b> atas nama <b class="nama-kebidanan-label"></b> akan masuk kebidanan <b class="bed-kebidanan-detail"></b></p>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info" onclick="sendKebidanan()"><i class="fas fa-paper-plane mr-1"></i>Send</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Konfirmasi Bed -->
