<style>
    .pointer-row {
        cursor: pointer;
    }
</style>
<input type="hidden" name="page" id="page_now_kfa">
<input type="hidden" name="page_kfa" id="page_now_kfa_satu_sehat">
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col d-flex justify-content-start">
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="hidden" id="id_barang" name="id_barang">
                            <input type="text" class="search-query-white" id="pencarian-kfa" name="pencarian_kfa" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="card-title mt-3" style="padding-left: 0.75rem; margin: 0pt">
                        <i class="fas fa-medkit" title data-toggle="tooltip" data-original-title="Get Code"></i> Tabel Barang
                    </h4>
                </div>
                <div class="table-responsive">
                    <table id="table_kfa_simrs" class="table full-color-table full-danger-table hover-table table-sm mt-1">
                        <thead height="40px">
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">ID</th>
                                <th width="15%">Code</th>
                                <th width="70%">Nama Obat</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="kfa_simrs_pagination" class="float-left"></div>
                        <div id="kfa_simrs_summary" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div></div>
                    <div class="col-12 justify-content-end">
                        <div class="custom-search">
                            <input type="text" name="keyword_obat" id="keyword-obat-search" class="form-control form-control-sm" style="width:100%" placeholder="Nama Obat">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="card-title mt-3" style="padding-left: 0.75rem; margin: 0pt">
                        <i class="fab fa-medrt" title data-toggle="tooltip" data-original-title="Get Code"></i> Tabel KFA Satu Sehat
                    </h4>
                </div>
                <div class="table-responsive">
                    <input type="hidden" name="id_barang" id="id-barang">
                    <input type="hidden" name="code_kfa" id="code-kfa">
                    <table id="table_kfa_satu_sehat" class="table full-color-table full-purple-table hover-table table-sm mt-1">
                        <thead height="40px">
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="kfa_satu_sehat_pagination" class="float-left"></div>
                        <div id="kfa_satu_sehat_summary" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>