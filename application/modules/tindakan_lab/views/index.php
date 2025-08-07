<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="vtabs">
                    <ul class="nav nav-tabs tabs-vertical" role="tablist" id="tab_tind"> <!--tab_pegawai-->
                        <li class="nav-item" id="pk_tab"> <!--kepegawaian_tab-->
                            <a class="nav-link" data-toggle="tab" href="#tab1" role="tab">
                                <span class="hidden-xs-down">Tindakan Pantalogi Klinik</span>
                            </a>
                        </li>
                        <li class="nav-item" id="mb_tab"> <!--tenadis_tab-->
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
                                <span class="hidden-xs-down">Tindakan Mikrobiologi</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1" role="tabpanel"></div>
                        <div class="tab-pane" id="tab2" role="tabpanel"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js.php'); ?>