
<!-- // PADOKB -->
<div class="modal fade" id="modal_padokb" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_padokb">PEMAKAIAN ALKES DAN OBAT KAMAR BEDAH</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 16pt;">&times;</span></button>
            </div>
        <div class="modal-body">
            <?= form_open('', 'id=form_entri_operasi_padokb class=form-horizontal') ?>
            <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-padokb">
            <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-padokb">
            <input type="hidden" name="id_padokb" id="id-padokb">
            <input type="hidden" name="id_pasien" id="id-pasien-padokb">
            <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tr>
                                <td width="20%" class="bold">Nama Pasien</td>
                                <td wdith="80%">: <span id="nama-pasien-padokb"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">No. RM</td>
                                <td>: <span id="no-padokb"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Tanggal Lahir</td>
                                <td>: <span id="tanggal-lahir-padokb"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Jenis Kelamin</td>
                                <td>: <span id="jenis-kelamin-padokb"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="form_entri_operasi_padokb">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #D3D3D3; color: black;"><b>PEMAKAIAN ALKES DAN OBAT KAMAR BEDAH</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                
                            <table class="table table-no-border table-sm table-striped">
                                <tr>
                                    <td width="100%">
                                        <table class="table table-sm table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="15%"><b>TANGGAL</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="date" name="tanggal_padokb" id="tanggal-padokb" class="custom-form clear-input d-inline-block col-lg-2"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><b>TINDAKAN</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="tindakan_padokb" id="tindakan-padokb" class="custom-form clear-input d-inline-block col-lg-3" disabled>
                                                    </td>
                                                </tr>
                                                    <td width="15%"><b>DOKTER OPERATOR</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="dokter_op_padokb" id="dokter-op-padokb" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                    <td width="15%"><b>DOKTER ANESTESI</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="dokter_an_padokb" id="dokter-an-padokb" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-sm table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="1%" class="center" style="background-color: #D3D3D3; color: black;"><b>NO</b></td>
                                                    <td width="18%" class="center" style="background-color: #D3D3D3; color: black;"><b>NAMA ALKES</b></td>
                                                    <td width="5%" class="center" style="background-color: #D3D3D3; color: black;"><b>JUMLAH</b></td>
                                                    <td width="0.5%" class="center" style="background-color: #D3D3D3; color: black;"></td>
                                                    <td width="1%" class="center" style="background-color: #D3D3D3; color: black;"><b>NO</b></td>
                                                    <td width="15%" class="center" style="background-color: #D3D3D3; color: black;"><b>NAMA ALKES</b></td>
                                                    <td width="5%" class="center" style="background-color: #D3D3D3; color: black;"><b>JUMLAH</b></td>
                                                    <td width="0.5%" class="center" style="background-color: #D3D3D3; color: black;"></td>
                                                    <td width="1%" class="center" style="background-color: #D3D3D3; color: black;"><b>NO</b></td>
                                                    <td width="15%" class="center" style="background-color: #D3D3D3; color: black;"><b>NAMA ALKES</b></td>
                                                    <td width="5%" class="center" style="background-color: #D3D3D3; color: black;"><b>JUMLAH</b></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>1</td>
                                                    <td> 
                                                        <input type="checkbox" name="gamemex_1" id="gamemex-1" value="1" class="mr-1">GAMMEX
                                                        <input type="checkbox" name="gamemex_2" id="gamemex-2" value="1" class="mr-1 ml-1">6
                                                        <input type="checkbox" name="gamemex_3" id="gamemex-3" value="1" class="mr-1 ml-1">6.5
                                                        <input type="checkbox" name="gamemex_4" id="gamemex-4" value="1" class="mr-1 ml-1">7
                                                        <input type="checkbox" name="gamemex_5" id="gamemex-5" value="1" class="mr-1 ml-1">7.5
                                                        <input type="checkbox" name="gamemex_6" id="gamemex-6" value="1" class="mr-1 ml-1">8
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_1" id="jumlah-1" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>29</td>
                                                    <td> 
                                                        <input type="checkbox" name="pembalut_wanita" id="pembalut-wanita" value="1" class="mr-1">PEMBALUT WANITA
                                                        <input type="text" name="pembalut" id="pembalut" class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_29" id="jumlah-29" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>57</td>
                                                    <td> 
                                                        <input type="checkbox" name="hogi_gowm" id="hogi-gowm" value="1" class="mr-1">HOGI GOWN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_57" id="jumlah-57" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>2</td>
                                                    <td> 
                                                        <input type="checkbox" name="profeel_1" id="profeel-1" value="1" class="mr-1">PROFEEL ORTHO
                                                        <input type="checkbox" name="profeel_2" id="profeel-2" value="1" class="mr-1 ml-1">6
                                                        <input type="checkbox" name="profeel_3" id="profeel-3" value="1" class="mr-1 ml-1">6.5
                                                        <input type="checkbox" name="profeel_4" id="profeel-4" value="1" class="mr-1 ml-1">7
                                                        <input type="checkbox" name="profeel_5" id="profeel-5" value="1" class="mr-1 ml-1">7.5
                                                        <input type="checkbox" name="profeel_6" id="profeel-6" value="1" class="mr-1 ml-1">8
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_2" id="jumlah-2" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>30</td>
                                                    <td> 
                                                        <input type="checkbox" name="masker_goggle" id="masker-goggle" value="1" class="mr-1">MASKER GOOGLE
                                                        <input type="text" name="masker" id="masker" class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_30" id="jumlah-30" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>58</td>
                                                    <td> 
                                                        <input type="checkbox" name="scrub" id="scrub" value="1" class="mr-1">T-SCRUB
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_58" id="jumlah-58" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>3</td>
                                                    <td> 
                                                        <input type="checkbox" name="profeel_lp_1" id="profeel-lp-1" value="1" class="mr-1">PROFEEL LP
                                                        <input type="checkbox" name="profeel_lp_2" id="profeel-lp-2" value="1" class="mr-1 ml-1">6.5
                                                        <input type="checkbox" name="profeel_lp_3" id="profeel-lp-3" value="1" class="mr-1 ml-1">7
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_3" id="jumlah-3" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>31</td>
                                                    <td> 
                                                        <input type="checkbox" name="tegaderm" id="tegaderm" value="1" class="mr-1">TEGADERM
                                                        <input type="text" name="tegadermP" id="tegadermP" class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_31" id="jumlah-31" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>59</td>
                                                    <td> 
                                                        <input type="checkbox" name="face_mask" id="face-mask" value="1" class="mr-1">FACE MASK
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_59" id="jumlah-59" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>4</td>
                                                    <td> 
                                                        <input type="checkbox" name="transofik" id="transofik" value="1" class="mr-1">TRANSOFIK
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_4" id="jumlah-4" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>32</td>
                                                    <td> 
                                                        <input type="checkbox" name="paper_green" id="paper-green" value="1" class="mr-1">PAPER GREEN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_32" id="jumlah-32" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>60</td>
                                                    <td> 
                                                        <input type="checkbox" name="masker_kaca" id="masker-kaca" value="1" class="mr-1">MASKER KACA
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_60" id="jumlah-60" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>5</td>
                                                    <td> 
                                                        <input type="checkbox" name="bethadine" id="bethadine" value="1" class="mr-1">BETHADINE
                                                        <input type="text" name="bethadine_cc" id="bethadine-cc" class="custom-form clear-input d-inline-block col-lg-8"> cc
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_5" id="jumlah-5" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>33</td>
                                                    <td> 
                                                        <input type="checkbox" name="formalin" id="formalin" value="1" class="mr-1">FORMALIN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_33" id="jumlah-33" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>61</td>
                                                    <td> 
                                                        <input type="checkbox" name="surgical_hat" id="surgical-hat" value="1" class="mr-1">SURGICAL HAT
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_61" id="jumlah-61" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>6</td>
                                                    <td> 
                                                        <input type="checkbox" name="alkohol" id="alkohol" value="1" class="mr-1">ALKOHOL
                                                        <input type="text" name="alkohol_cc" id="alkohol-cc" class="custom-form clear-input d-inline-block col-lg-8"> cc
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_6" id="jumlah-6" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>34</td>
                                                    <td> 
                                                        <input type="checkbox" name="aquabidest_1000" id="aquabidest-1000" value="1" class="mr-1">AQUABIDEST 1000 cc
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_34" id="jumlah-34" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>62</td>
                                                    <td> 
                                                        <input type="checkbox" name="sensi_glove" id="sensi-glove" value="1" class="mr-1">SENSI GLOVE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_62" id="jumlah-62" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>7</td>
                                                    <td> 
                                                        <input type="checkbox" name="needle" id="needle" value="1" class="mr-1">NEEDLE NO.
                                                        <input type="text" name="needle_no" id="needle-no" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_7" id="jumlah-7" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>35</td>
                                                    <td> 
                                                        <input type="checkbox" name="alkazym" id="alkazym" value="1" class="mr-1">ALKAZYM
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_35" id="jumlah-35" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>63</td>
                                                    <td> 
                                                        <input type="checkbox" name="xylocine_gel" id="xylocine-gel" value="1" class="mr-1">XYLOCINE GEL 
                                                        <input type="checkbox" name="instillagel" id="instillagel" value="1" class="mr-1 ml-2">INSTILLAGEL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_63" id="jumlah-63" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>8</td>
                                                    <td> 
                                                        <input type="checkbox" name="netral_plate" id="netral-plate" value="1" class="mr-1">NETRAL PLATE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_8" id="jumlah-8" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>36</td>
                                                    <td> 
                                                        <input type="checkbox" name="hyprafix" id="hyprafix" value="1" class="mr-1">HYPRAFIX
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_36" id="jumlah-36" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>64</td>
                                                    <td> 
                                                        <input type="checkbox" name="urograd" id="urograd" value="1" class="mr-1">UROGRAD
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_64" id="jumlah-64" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>9</td>
                                                    <td> 
                                                        <input type="checkbox" name="bactigras" id="bactigras" value="1" class="mr-1">BACTIGRAS 
                                                        <input type="checkbox" name="supratule" id="supratule" value="1" class="mr-1 ml-2">SUPRATULE 
                                                        <input type="checkbox" name="daryantule" id="daryantule" value="1" class="mr-1 ml-2">DARYANTULE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_9" id="jumlah-9" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>37</td>
                                                    <td> 
                                                        <input type="checkbox" name="baraovac" id="baraovac" value="1" class="mr-1">BARAOVAC 
                                                        <input type="checkbox" name="ps" id="ps" value="1" class="mr-1 ml-2">PS 
                                                        <input type="checkbox" name="pp" id="pp" value="1" class="mr-1 ml-2">PP
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_37" id="jumlah-37" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>65</td>
                                                    <td> 
                                                        <input type="checkbox" name="disk" id="disk" value="1" class="mr-1">DISK DVD-ROOM
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_65" id="jumlah-65" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>10</td>
                                                    <td> 
                                                        <input type="checkbox" name="mersilk" id="mersilk" value="1" class="mr-1">MERSILK
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_10" id="jumlah-10" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>38</td>
                                                    <td> 
                                                        <input type="checkbox" name="urine_bag" id="urine-bag" value="1" class="mr-1">URINE BAG
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_38" id="jumlah-38" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>66</td>
                                                    <td> 
                                                        <input type="checkbox" name="h202" id="h202" value="1" class="mr-1">H202
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_66" id="jumlah-66" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>11</td>
                                                    <td> 
                                                        <input type="checkbox" name="polisorb" id="polisorb" value="1" class="mr-1">POLISORB 
                                                        <input type="text" name="polisorbQ" id="polisorbQ" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_11" id="jumlah-11" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>39</td>
                                                    <td> 
                                                        <input type="checkbox" name="foley" id="foley" value="1" class="mr-1">FOLEY CATHETER
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_39" id="jumlah-39" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>67</td>
                                                    <td> 
                                                        <input type="checkbox" name="bocal_pa" id="bocal-pa" value="1" class="mr-1">BOCAL PA
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_67" id="jumlah-67" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                          
                                                <tr>
                                                    <td class="center"><b>12</td>
                                                    <td> 
                                                        <input type="checkbox" name="ultrasorb" id="ultrasorb" value="1" class="mr-1">ULTRASORB 
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_12" id="jumlah-12" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>40</td>
                                                    <td> 
                                                        <input type="checkbox" name="ngt" id="ngt" value="1" class="mr-1">NGT
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_40" id="jumlah-40" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>68</td>
                                                    <td> 
                                                        <input type="checkbox" name="rl" id="rl" value="1" class="mr-1">RL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_68" id="jumlah-68" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>13</td>
                                                    <td> 
                                                        <input type="checkbox" name="suprasob" id="suprasob" value="1" class="mr-1">SUPRASOB C 
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_13" id="jumlah-13" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>41</td>
                                                    <td> 
                                                        <input type="checkbox" name="syringe" id="syringe" value="1" class="mr-1">SYRINGE
                                                        <input type="text" name="syringeT" id="syringeT" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_41" id="jumlah-41" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>69</td>
                                                    <td> 
                                                        <input type="checkbox" name="surgiwear" id="surgiwear" value="1" class="mr-1">SURGIWEAR PATTIES
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_69" id="jumlah-69" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                
                                                <tr>
                                                    <td class="center"><b>14</td>
                                                    <td> 
                                                        <input type="checkbox" name="suprasobV" id="suprasobV" value="1" class="mr-1">BISTURI NO.
                                                        <input type="text" name="suprasobE" id="suprasobE" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_14" id="jumlah-14" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>42</td>
                                                    <td> 
                                                        <input type="checkbox" name="catheter_tip" id="catheter-tip" value="1" class="mr-1">CATHETER TIP
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_42" id="jumlah-42" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>70</td>
                                                    <td> 
                                                        <input type="checkbox" name="bone_wax" id="bone-wax" value="1" class="mr-1">BONE WAX
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_70" id="jumlah-70" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>15</td>
                                                    <td> 
                                                        <input type="checkbox" name="chromic" id="chromic" value="1" class="mr-1">CHROMIC
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_15" id="jumlah-15" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>43</td>
                                                    <td> 
                                                        <input type="checkbox" name="guardix_sol" id="guardix-sol" value="1" class="mr-1">GUARDIX SOL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_43" id="jumlah-43" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>71</td>
                                                    <td> 
                                                        <input type="checkbox" name="microscop_drape" id="microscop-drape" value="1" class="mr-1">MICROSCOP DRAPE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_71" id="jumlah-71" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>16</td>
                                                    <td> 
                                                        <input type="checkbox" name="monosyn" id="monosyn" value="1" class="mr-1">MONOSYN
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_16" id="jumlah-16" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>44</td>
                                                    <td> 
                                                        <input type="checkbox" name="gelita_spon" id="gelita-spon" value="1" class="mr-1">GELITA SPON
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_44" id="jumlah-44" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>72</td>
                                                    <td> 
                                                        <input type="checkbox" name="surgicel" id="surgicel" value="1" class="mr-1">SURGICEL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_72" id="jumlah-72" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>17</td>
                                                    <td> 
                                                        <input type="checkbox" name="vicryl" id="vicryl" value="1" class="mr-1">VICRYL
                                                        <input type="text" name="vicrylU" id="vicrylU" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_17" id="jumlah-17" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>45</td>
                                                    <td> 
                                                        <input type="checkbox" name="wi" id="wi" value="1" class="mr-1">WI
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_45" id="jumlah-45" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>73</td>
                                                    <td> 
                                                        <input type="checkbox" name="lina_pen" id="lina-pen" value="1" class="mr-1">LINA PEN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_73" id="jumlah-73" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>18</td>
                                                    <td> 
                                                        <input type="checkbox" name="palin_cutget" id="palin-cutget" value="1" class="mr-1">PALIN CUTGED
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_18" id="jumlah-18" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>46</td>
                                                    <td> 
                                                        <input type="checkbox" name="nacl" id="nacl" value="1" class="mr-1">NaCL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_46" id="jumlah-46" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>74</td>
                                                    <td> 
                                                        <input type="checkbox" name="external_drain" id="external-drain" value="1" class="mr-1">EXTERNAL DRAIN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_74" id="jumlah-74" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>19</td>
                                                    <td> 
                                                        <input type="checkbox" name="silkam" id="silkam" value="1" class="mr-1">SILKAM
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_19" id="jumlah-19" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>47</td>
                                                    <td> 
                                                        <input type="checkbox" name="polygyp" id="polygyp" value="1" class="mr-1">POLYGYP
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_47" id="jumlah-47" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>75</td>
                                                    <td> 
                                                        <input type="checkbox" name="suction_conecting_tube" id="suction-conecting-tube" value="1" class="mr-1">SUCTION CONECTING TUBE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_75" id="jumlah-75" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>20</td>
                                                    <td> 
                                                        <input type="checkbox" name="premilen" id="premilen" value="1" class="mr-1">PREMILENE 
                                                        <input type="checkbox" name="prolaine" id="prolaine" value="1" class="mr-1 ml-2">PROLAINE 
                                                        <input type="checkbox" name="surgipro" id="surgipro" value="1" class="mr-1 ml-2">SURGIPRO
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_20" id="jumlah-20" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>48</td>
                                                    <td> 
                                                        <input type="checkbox" name="polyban" id="polyban" value="1" class="mr-1">POLYBAN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_48" id="jumlah-48" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>76</td>
                                                    <td> 
                                                        <input type="checkbox" name="bag_suction_disposible" id="bag-suction-disposible" value="1" class="mr-1">BAG SUCTION DISPOSIBLE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_76" id="jumlah-76" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>21</td>
                                                    <td> 
                                                        <input type="checkbox" name="monocryl" id="monocryl" value="1" class="mr-1">MONOCRYL
                                                        <input type="text" name="monocrylR" id="monocrylR" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_21" id="jumlah-21" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>49</td>
                                                    <td> 
                                                        <input type="checkbox" name="tensocrepe" id="tensocrepe" value="1" class="mr-1">TENSOCREPE 
                                                        <input type="checkbox" name="medicrepe" id="medicrepe" value="1" class="mr-1 ml-2">MEDICREPE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_49" id="jumlah-49" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>77</td>
                                                    <td> 
                                                        <input type="checkbox" name="white_apron" id="white-apron" value="1" class="mr-1">WHITE APRON
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_77" id="jumlah-77" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>22</td>
                                                    <td> 
                                                        <input type="checkbox" name="pds" id="pds" value="1" class="mr-1">PDS 2 
                                                        <input type="text" name="pds2" id="pds2" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_22" id="jumlah-22" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>50</td>
                                                    <td> 
                                                        <input type="checkbox" name="conforming" id="conforming" value="1" class="mr-1">CONFORMING
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_50" id="jumlah-50" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>23</td>
                                                    <td> 
                                                        <input type="checkbox" name="secureg" id="secureg" value="1" class="mr-1">SECUREG
                                                        <input type="text" name="securegS" id="securegS" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_23" id="jumlah-23" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>51</td>
                                                    <td> 
                                                        <input type="checkbox" name="microshield" id="microshield" value="1" class="mr-1">MICROSHIELD
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_51" id="jumlah-51" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>24</td>
                                                    <td> 
                                                        <input type="checkbox" name="kasssax" id="kasssax" value="1" class="mr-1">KASSA 7,5 X 7,5
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_24" id="jumlah-24" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>52</td>
                                                    <td> 
                                                        <input type="checkbox" name="betadine" id="betadine" value="1" class="mr-1">BETADINE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_52" id="jumlah-52" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>25</td>
                                                    <td> 
                                                        <input type="checkbox" name="kasa_ray" id="kasa-ray" value="1" class="mr-1">KASSA X RAY 10 X 10
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_25" id="jumlah-25" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>53</td>
                                                    <td> 
                                                        <input type="checkbox" name="fromaline" id="fromaline" value="1" class="mr-1">FROMALINE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_53" id="jumlah-53" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>26</td>
                                                    <td> 
                                                        <input type="checkbox" name="kkasa" id="kkasa" value="1" class="mr-1">KASSA 6 X 6
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_26" id="jumlah-26" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>54</td>
                                                    <td> 
                                                        <input type="checkbox" name="cidex" id="cidex" value="1" class="mr-1">CIDEX
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_54" id="jumlah-54" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>27</td>
                                                    <td> 
                                                        <input type="checkbox" name="kasa_laparatomy" id="kasa-laparatomy" value="1" class="mr-1">KASSA LAPARATOMY
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_27" id="jumlah-27" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>55</td>
                                                    <td> 
                                                        <input type="checkbox" name="prasept" id="prasept" value="1" class="mr-1">PRASEPT
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_55" id="jumlah-55" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>28</td>
                                                    <td> 
                                                        <input type="checkbox" name="under_pad" id="under-pad" value="1" class="mr-1">UNDER PAD
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlah_28" id="jumlah-28" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>56</td>
                                                    <td> 
                                                        <input type="checkbox" name="suction_catheter" id="suction-catheter" value="1" class="mr-1">SUCTION CATHETER
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlah_56" id="jumlah-56" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                </tr>
                                         
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                          
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPemakaianAlkesDanObatKamarBedah()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

