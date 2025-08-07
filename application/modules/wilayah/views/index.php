<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="vtabs">
                    <ul class="nav nav-tabs tabs-vertical" role="tablist" id="tab_wilayah">
                        <li class="nav-item" id="provinsi_tab">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
                                <span class="hidden-sm-up"><i class="fas fa-globe"></i></span>
                                <span class="hidden-xs-down">Provinsi</span>
                            </a>
                        </li>
                        <li class="nav-item" id="kota_kabupaten_tab">
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
                                <span class="hidden-sm-up"><i class="fas fa-building"></i></span>
                                <span class="hidden-xs-down">Kota/Kabupaten</span>
                            </a>
                        </li>
                        <li class="nav-item" id="kecamatan_tab">
                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">
                                <span class="hidden-sm-up"><i class="fas fa-university"></i></span>
                                <span class="hidden-xs-down">Kecamatan</span>
                            </a>
                        </li>
                        <li class="nav-item" id="kelurahan_tab">
                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">
                                <span class="hidden-sm-up"><i class="fas fa-home"></i></span>
                                <span class="hidden-xs-down">Kelurahan</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1" role="tabpanel"></div>
                        <div class="tab-pane" id="tab2" role="tabpanel"></div>
                        <div class="tab-pane" id="tab3" role="tabpanel"></div>
                        <div class="tab-pane" id="tab4" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>