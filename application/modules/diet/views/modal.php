<div id="modal-add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 500px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-add-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-tambah-diet'); ?>
				<input type="hidden" id="id-diet" name="id_diet">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-sm table-striped table-hover">
							<tr>
								<td>Nama Diet</td>
								<td>:</td>
								<td class="v-center">
									<span style="float:left;padding-right:5px;">
										<input type="text" name="nama_diet" id="nama-diet"
											class="custom-form d-inline-block input-diet" style="width: 260px;"
											placeholder="Nama Diet...">
									</span>
								</td>
							</tr>
							<tr>
								<td>Kode Diet</td>
								<td>:</td>
								<td class="v-center">
									<span style="float:left;padding-right:5px;">										
										<input type="text" name="kode_diet" id="kode-diet"
											class="custom-form d-inline-block input-diet" style="width: 260px;"
											placeholder="Kode Diet...">
									</span>
								</td>
							</tr>
							<tr id="input-item-diet">
								<td>Item Diet</td>
								<td>:</td>
								<td class="v-center">
									<span style="float:left;padding-right:5px;">
										<input type="text" name="item_diet" id="item-diet"
											class="custom-form d-inline-block input-diet" style="width: 260px;"
											placeholder="Nama Diet...">
									</span>
								</td>
							</tr>
						</table>

						<div class="form-group row thin" id="button"></div>

						<table class="table table-sm table-striped table-hover color-table info-table" id="table-list-diet">
							<thead>
								<tr>
									<th width="5%" class="center">No.</th>
									<th width="90%" class="left">Item</th>
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