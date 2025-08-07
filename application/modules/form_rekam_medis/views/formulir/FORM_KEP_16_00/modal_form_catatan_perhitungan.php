<!-- // CPKJI -->
<div class="modal fade" id="modal_catatan_perhitungan_kasa" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-operasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_catatan_perhitungan_kasa">FORM Catatan Perhitungan Kasa / Jarum / Instrumen</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_catatan_perhitungan_kasa class=form-horizontal') ?>
                <input type="hidden" name="id_operasi" id="id-operasi">
                <input type="hidden" name="id_layanan_pendaftaran" id="ok-id-layanan-pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ok-id-pendaftaran">
                <input type="hidden" name="id_pasien" id="ok-id-pasien">
                <input type="hidden" name="id_ok" id="id-ok">
                <input type="hidden" name="id_cpkji" id="id-cpkji">
                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
                                                                        $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-cpkji"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-cpkji"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-cpkji"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-cpkji"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-cpkji"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Agama</td>
                                    <td>: <span id="agama-cpkji"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat-cpkji"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-operasi">
                                <div class="form-catatan-perhitungan-kasa-jarum-instrumen">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-striped" style="color: rgb(123, 13, 226); margin-top: -15px;">
                                                <tr>
                                                    <td width="100%">
                                                        <h5 class="center"><b>Catatan Perhitungan Kasa / Jarum / Instrumen</b></h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-catatan-perhitungan-kasa-jarum-instrumen">
                                        <div class="row">
                                            <tr>
                                                <td width="100%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" colspan="9"><b></b></th>
                                                            </tr>
                                                            <tr>
                                                                <th width="15%" class="center"><b>Jenis.</b></th>
                                                                <th width="5%" class="center"><b>Jumlah Awal</b></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"><b>Tambahan</b></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="5%" class="center"></th>
                                                                <th width="8%" class="center"><b>Jumlah Sementara*</b></th>
                                                                <th width="8%" class="center"><b>Tambahan</b></th>
                                                                <th width="8%" class="center"><b>Jumlah Akhir</b></th>
                                                                <th width="20%" class="center"><b>Keterangan</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="center">Raytec Gauze / Kasa Raytek</td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_1" id="raytec-1" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_2" id="raytec-2" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_3" id="raytec-3" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_4" id="raytec-4" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_5" id="raytec-5" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_6" id="raytec-6" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_7" id="raytec-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_8" id="raytec-8" class="custom-form clear-input d-inline-block col-lg-10 raytecc" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_9" id="raytec-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="raytec_10" id="raytec-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Lap's Sponge / Kasa Besar</td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_1" id="laps-1" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_2" id="laps-2" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_3" id="laps-3" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_4" id="laps-4" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_5" id="laps-5" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_6" id="laps-6" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_7" id="laps-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_8" id="laps-8" class="custom-form clear-input d-inline-block col-lg-10 lap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_9" id="laps-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laps_10" id="laps-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Depper (S / L)</td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_1" id="depper-1" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_2" id="depper-2" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_3" id="depper-3" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_4" id="depper-4" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_5" id="depper-5" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_6" id="depper-6" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_7" id="depper-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_8" id="depper-8" class="custom-form clear-input d-inline-block col-lg-10 deppe" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_9" id="depper-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="depper_10" id="depper-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Blade / Pisau</td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_1" id="blade-1" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_2" id="blade-2" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_3" id="blade-3" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_4" id="blade-4" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_5" id="blade-5" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_6" id="blade-6" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_7" id="blade-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_8" id="blade-8" class="custom-form clear-input d-inline-block col-lg-10 blad" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_9" id="blade-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="blade_10" id="blade-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Tape / Ethiloop</td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_1" id="tape-1" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_2" id="tape-2" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_3" id="tape-3" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_4" id="tape-4" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_5" id="tape-5" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_6" id="tape-6" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_7" id="tape-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_8" id="tape-8" class="custom-form clear-input d-inline-block col-lg-10 tap" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_9" id="tape-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="tape_10" id="tape-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Jarum / Needle</td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_1" id="jjarum-1" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_2" id="jjarum-2" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_3" id="jjarum-3" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_4" id="jjarum-4" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_5" id="jjarum-5" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_6" id="jjarum-6" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_7" id="jjarum-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_8" id="jjarum-8" class="custom-form clear-input d-inline-block col-lg-10 jarum" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_9" id="jjarum-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="jjarum_10" id="jjarum-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Pledget / Patties</td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_1" id="pledget-1" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_2" id="pledget-2" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_3" id="pledget-3" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_4" id="pledget-4" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_5" id="pledget-5" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_6" id="pledget-6" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_7" id="pledget-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_8" id="pledget-8" class="custom-form clear-input d-inline-block col-lg-10 pledge" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_9" id="pledget-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="pledget_10" id="pledget-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Drain</td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_1" id="drain-1" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_2" id="drain-2" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_3" id="drain-3" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_4" id="drain-4" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_5" id="drain-5" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_6" id="drain-6" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_7" id="drain-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_8" id="drain-8" class="custom-form clear-input d-inline-block col-lg-10 drai" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_9" id="drain-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="drain_10" id="drain-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Instrument</td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_1" id="innstrumen-1" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_2" id="innstrumen-2" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_3" id="innstrumen-3" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_4" id="innstrumen-4" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_5" id="innstrumen-5" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_6" id="innstrumen-6" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_7" id="innstrumen-7" class="custom-form clear-input d-inline-block col-lg-10 " placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_8" id="innstrumen-8" class="custom-form clear-input d-inline-block col-lg-10 instrume" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_9" id="innstrumen-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="innstrumen_10" id="innstrumen-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">Lain - lain</td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_1" id="laint-1" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_2" id="laint-2" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_3" id="laint-3" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_4" id="laint-4" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_5" id="laint-5" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_6" id="laint-6" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_7" id="laint-7" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_8" id="laint-8" class="custom-form clear-input d-inline-block col-lg-10 lain" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_9" id="laint-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="laint_10" id="laint-10" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">
                                                                    <input type="text" name="ro_1" id="ro-1" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_2" id="ro-2" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_3" id="ro-3" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_4" id="ro-4" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_5" id="ro-5" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_6" id="ro-6" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_7" id="ro-7" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_8" id="ro-8" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_9" id="ro-9" class="custom-form clear-input d-inline-block col-lg-10 ro" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_10" id="ro-10" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="ro_11" id="ro-11" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="center">
                                                                    <input type="text" name="or_1" id="or-1" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_2" id="or-2" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_3" id="or-3" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_4" id="or-4" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_5" id="or-5" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_6" id="or-6" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_7" id="or-7" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_8" id="or-8" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_9" id="or-9" class="custom-form clear-input d-inline-block col-lg-10 or" placeholder="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_10" id="or-10" class="custom-form clear-input d-inline-block col-lg-10" placeholder="0">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="or_11" id="or-11" class="custom-form clear-input d-inline-block col-lg-12">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </div>

                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td width="10%">Perawat Sirkulasi : </td>
                                                    <td width="50%"><input type="text" name="peerawat_1" id="peerawat-1" class="select2c-input ml-2"></td>
                                                </tr>
                                            </thead>
                                        </table>

                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <br>
                                                <tr>
                                                    <td width="15%">Jenis Operasi</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jenis_operasi" id="jenis-operasi" class="custom-form clear-input d-inline-block col-lg-12" placeholder="jenis operasi"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Kasa</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_1" id="jummlah-c-1" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_1" id="jummlah-c-2" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Tanggal</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="tanggal_c" id="tanggal-c" class="custom-form clear-input d-inline-block col-lg-5" placeholder="tanggal"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Jarum</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_3" id="jummlah-c-3" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_3" id="jummlah-c-4" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Jam Mulai</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jam_mulai_c" id="jam-mulai-c" class="custom-form clear-input d-inline-block col-lg-3" placeholder="jam"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Instrumen</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_5" id="jummlah-c-5" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_5" id="jummlah-c-6" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Jam Selesai</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%"><input type="text" name="jam_selesai_c" id="jam-selesai-c" class="custom-form clear-input d-inline-block col-lg-4" placeholder="jam"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%">Jumlah Pisau / Balde</td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_7" id="jummlah-c-7" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_7" id="jummlah-c-8" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                                <tr>
                                                    <td width="15%"></td>
                                                    <td width="1%"></td>
                                                    <td width="15%"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%"> Lain - lain &nbsp;<input type="text" name="lain_c" id="lain-c" class="custom-form clear-input d-inline-block col-lg-8" placeholder=""></td>
                                                    <td width="1%">:</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_9" id="jummlah-c-9" value="1" class="mr-1">Benar</td>
                                                    <td width="5%"><input type="radio" name="jummlah_c_9" id="jummlah-c-10" value="0" class="mr-1">Tidak</td>
                                                    <td width="20%"></td>
                                                </tr>

                                            </thead>
                                        </table>

                                        <br>
                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td class="center" width="33%"><b> Dokter Bedah </b></td>
                                                    <td class="center" width="33%"><b> Perawat Instrumen </b></td>
                                                    <td class="center" width="33%"><b> Perawat Sirkuler </b></td>
                                                </tr>
                                                <tr>
                                                    <td class="center"><input type="text" name="dokterr_1" id="dokterr-1" class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="peerawat_2" id="peerawat-2" class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center"><input type="text" name="peerawat_3" id="peerawat-3" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_1" id="ttd-1" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_2" id="ttd-2" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                    <td class="center">Tanda Tangan<input type="checkbox" name="ttd_3" id="ttd-3" value="1" class="custom-form col-lg-1 mx-auto">
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanCatatanPerhitunganKasa()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
