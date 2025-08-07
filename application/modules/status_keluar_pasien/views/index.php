<style>
.set-button {
    display: flex;
    align-content: center;
    margin-top: 18px;    
    margin-bottom: 3px
}
</style>

<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start" >
                        <div class="set-button">
						    <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
                            <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                        </div>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <div class="col-4">
                            <label style="margin-bottom:0;">Filter</label>
                            <?= form_dropdown('filter', $filter, array(), 'class="form-control" id=filter') ?>
                        </div>
                        <div class="col-4">
                            <label style="margin-bottom:0;">Pilih Layanan</label>
                            <?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'class="form-control" id=jenis-layanan') ?>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">                    
                    <table id="table_status_keluar_pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="3%"  class="center">No.</th>
                                <th width="5%"  class="center">No. Register</th>
                                <th width="8%"  class="center">Tanggal Daftar</th>
                                <th width="8%"  class="center">Tanggal Keluar</th>   
                                <th width="8%"  class="center">Tanggal Layanan</th>       
                                <th width="5%"  class="center">No. RM</th>
                                <th width="12%" class="left">Nama</th>
                                <th width="10%" class="center">Layanan</th>
                                <th width="14%" class="left">Dokter</th>
                                <th width="10%" class="center">Cara Bayar</th>
                                <th width="5%"  class="center">Status</th>
                                <th width="8%"  class="center">Status Keluar</th>
                                <th width="2%"  class="right"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
				
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>
<!--?php $this->load->view('pelayanan/tindak_lanjut_form/js') ?-->
