<style>
    #table_data_wrapper {
        padding: 0;
    }
</style>
<input type="hidden" name="pagenow">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
						<button type="button" class="btn btn-info waves-effect" id="btn_add"><i class="fas fa-plus-circle mr-1"></i>Buat Surat</button>
						<button type="button" class="btn btn-secondary waves-effect" id="btn_search"><i class="fas fa-search mr-1"></i>Parameter Pencarian</button>
						<button type="button" class="btn btn-secondary waves-effect" id="btn_reload"><i class="fas fa-sync-alt mr-1"></i>Reload Data</button>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="nowrap center" width="3%">No.</th>
                                <th class="nowrap center" width="10%">No. Surat</th>
                                <th class="nowrap left" width="5%">Kontrol / Inap</th>
                                <th class="nowrap center" width="5%">Tgl. Rencana Kontrol</th>
                                <th class="nowrap center" width="5%">Tgl. Entri</th>
                                <th class="nowrap center" width="10%">No. SEP Asal</th>
                                <th class="nowrap left" width="10%">Poli Asal</th>
                                <th class="nowrap left" width="10%">Poli Tuju</th>
                                <th class="nowrap left" width="10%">Nama DPJP</th>
                                <th class="nowrap center" width="10%">No. Kartu</th>
                                <th class="nowrap left" width="10%">Nama Lengkap</th>
                                <!-- <th class="nowrap left" width="5%">User</th> -->
                                <th class="nowrap center" width="3%"></th>
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