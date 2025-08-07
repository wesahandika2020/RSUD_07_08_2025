<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="vtabs customvtab">
                    <ul class="nav nav-tabs tabs-vertical" role="tablist" id="tab_pegawai">
                        <li class="nav-item" id="jabatan_tab">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
                                <span class="hidden-sm-up"><i class="fas fa-briefcase"></i></span>
                                <span class="hidden-xs-down">Jabatan</span>
                            </a>
                        </li>
                        <li class="nav-item" id="kepegawaian_tab">
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
                                <span class="hidden-sm-up"><i class="fab fa-black-tie"></i></span>
                                <span class="hidden-xs-down">Pegawai</span>
                            </a>
                        </li>
                        <li class="nav-item" id="tenadis_tab">
                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">
                                <span class="hidden-sm-up"><i class="fa fa-user-md"></i></span>
                                <span class="hidden-xs-down">Tenaga Medis</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1" role="tabpanel"></div>
                        <div class="tab-pane" id="tab2" role="tabpanel"></div>
                        <div class="tab-pane" id="tab3" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js.php'); ?>