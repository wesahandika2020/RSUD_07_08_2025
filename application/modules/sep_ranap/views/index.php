<input type="hidden" name="page_now" id="page_now">
<input type="hidden" name="no_rm" id="no_rm" class="field_bpjs">
<input type="hidden" name="jenis" id="jenis_pendaftaran" value="">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4 d-flex justify-content-start">
                        <h6 class="m-t-10"><i class="fas fa-list m-r-5"></i>Daftar Surat Elegibilitas Pasien Rawat Inap</h6>
                    </div>
                    <div class="col-lg-8 d-flex justify-content-end">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=bt_search_data class="btn btn-info waves-effect m-r-5"') ?>
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect m-r-5"') ?>
                        <?= form_dropdown('asal', ['IGD' => 'IGD', 'Poliklinik' => 'Poliklinik'], array(), 'class="form-control" style="width:10%" id=asal') ?>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                    <table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="2%"  class="center">No</th>
                                <th width="5%"  class="center">No. Reg</th>
                                <th width="8%"  class="center">Tanggal Daftar</th>
                                <th width="8%"  class="center">Tanggal Keluar</th>
                                <th width="5%"  class="center">No. RM</th>
                                <th width="11%" class="center">Nama</th>
                                <th width="11%" class="center">Cara Bayar</th>
                                <th width="8%"  class="center">No. Polish</th>
                                <th width="13%" class="center">No. SEP Rajal</th>
                                <th width="10%" class="center">No. SEP Ranap</th>
                                <th width="5%"  class="center">User SEP</th>
                                <th width="3%"  class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                <!-- </div> -->
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
<?php $this->load->view('modal_search') ?>
<?php $this->load->view(DIR_VCLAIM.'modal_vclaim_form') ?>
<?php $this->load->view(DIR_RUJUKAN_VCLAIM.'modal_rujukan_form') ?>
<?php $this->load->view(DIR_VCLAIM.'modal_tgl_pulang_sep') ?>