<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <h6 class="card-header">
                <ul class="nav nav-pills" role="tablist" id="tarif_tab">
                    <li class=" nav-item" id="tarif_pelayanan_tab">
                        <a href="#tab1" class="nav-link active" data-toggle="tab"><i class="fas fa-hospital-alt"></i> Tarif Pelayanan</a>
                    </li>
                    <li class="nav-item" id="tarif_kamar_ranap_tab">
                        <a href="#tab2" class="nav-link" data-toggle="tab"><i class="fas fa-hospital"></i> Tarif Kamar Rawat Inap</a>
                    </li>
                    <li class="nav-item" id="tarif_kamar_operasi_tab">
                        <a href="#tab3" class="nav-link" data-toggle="tab"><i class="fas fa-bed"></i> Tarif Kamar Operasi</a>
                    </li>
                    <li class="nav-item" id="tarif_perbekalan_kesehatan_tab">
                        <a href="#tab4" class="nav-link" data-toggle="tab"><i class="fas fa-prescription-bottle"></i> Tarif Perbekalan Kesehatan</a>
                    </li>
                </ul>
            </h6>
            <div class="card-body">
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active"></div>
                    <div id="tab2" class="tab-pane"></div>
                    <div id="tab3" class="tab-pane"></div>
                    <div id="tab4" class="tab-pane"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>