<input type="hidden" id="page-tindakan">

<div class="row">
	<div class="col-lg-12 mt-2">
		<div class="table-responsive" style="overflow-x:auto;">
			<table id="table-data-tindakan" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="8" class="center" style="background-color:#00a5ab">DATA TINDAKAN PASIEN
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">Tanggal</th>
						<th width="25%" class="center">Tindakan</th>
						<th width="15%" class="center">ICD-9CM</th>
						<th width="15%" class="center">Kelas</th>
						<th width="15%" class="center">Biaya</th>						
						<th width="15%" class="center">Dokter</th>
						<th width="15%" class="center">Petugas Input</th>
						<th width="5%" class="center"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-tindakan" class="float-left"></div>
				<div id="summary-tindakan" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<div id="modal-koding-tindakan" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-koding-tindakan role=form class=form-horizontal') ?>                
                <div class="row">
                    <div class="col-lg-12">        
						<input type="hidden" name="id-tarif-tindakan-pasien" id="id-tarif-tindakan-pasien">  
						<input type="hidden" name="id-golongan-sebab-before" id="id-golongan-sebab-before">                 
                        <div class="form-group row tight ranap icare">
                            <label class="col-3 col-form-label">ICD-9CM</label>
                            <div class="col">
								<input name="code-tindakan" id="code-tindakan" class="select2c-input">
                            </div>
                        </div>                        
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanKodingTindakan()"><i class="fas fa-plus-circle"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php $this->load->view('tindakan/js') ?>
