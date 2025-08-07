<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-add-paket'); ?>
				<input type="hidden" id="id-paket" name="id_paket">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td>Nama Paket</td>
								<td>:</td>
								<td class="v-center">
									<span style="float:left;padding-right:5px;">
										<input type="text" name="nama_paket" id="nama-paket"
											class="custom-form d-inline-block input-paket" style="width: 260px;"
											placeholder="Nama Paket...">
									</span>
								</td>
							</tr>
							<tr>
								<td>Harga Paket</td>
								<td>:</td>
								<td class="v-center">
									<span style="float:left;padding-right:5px;">										
										<input type="number" name="harga_paket" id="harga-paket"
											class="custom-form d-inline-block input-paket" style="width: 260px;"
											placeholder="Harga Paket..." onkeypress="return hanyaAngka(event)">
									</span>
								</td>
							</tr>
							<tr id="input-tindakan">
								<td>Tindakan</td>
								<td>:</td>
								<td class="v-center">
									<input type="text" name="tindakan" id="tindakan-auto" class="select2c-input"
										placeholder="Pilih Tindakan...">
								</td>
							</tr>
						</table>

						<div class="form-group row thin" id="button"></div>

						<table class="table table-sm table-striped table-hover color-table info-table" id="table-list">
							<thead>
								<tr>
									<th width="5%" class="center">No.</th>
									<th width="90%" class="left">Nama Tindakan</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<div class="modal-footer" id="footer"></div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
