
<!-- // PADOA -->
<div class="modal fade" id="modal_padoa" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_padoa">PEMAKAIAN ALKES DAN OBAT ANESTESI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 16pt;">&times;</span></button>
            </div>
        <div class="modal-body">
            <?= form_open('', 'id=form_entri_operasi_padoa class=form-horizontal') ?>
            <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-padoa">
            <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-padoa">
            <input type="hidden" name="id_padoa" id="id-padoa">
            <input type="hidden" name="id_pasien" id="id-pasien-padoa">
            <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tr>
                                <td width="20%" class="bold">Nama Pasien</td>
                                <td wdith="80%">: <span id="nama-pasien-padoa"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">No. RM</td>
                                <td>: <span id="no-padoa"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Tanggal Lahir</td>
                                <td>: <span id="tanggal-lahir-padoa"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Jenis Kelamin</td>
                                <td>: <span id="jenis-kelamin-padoa"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="form_entri_operasi_padoa">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center" style="background-color: #D3D3D3; color: black;"><b>PEMAKAIAN ALKES DAN OBAT ANESTESI</b></h5>
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
                                                        <input type="date" name="tanggal_padoa" id="tanggal-padoa" class="custom-form clear-input d-inline-block col-lg-2"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><b>TINDAKAN</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="tindakan_padoa" id="tindakan-padoa" class="custom-form clear-input d-inline-block col-lg-3"disabled>
                                                    </td>
                                                </tr>
                                                    <td width="15%"><b>DOKTER OPERATOR</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="dokter_op_padoa" id="dokter-op-padoa" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                    <td width="15%"><b>DOKTER ANESTESI</b></td>
                                                    <td width="1%" class="center"><b>:</b></td>
                                                    <td>
                                                        <input type="text" name="dokter_an_padoa" id="dokter-an-padoa" class="select2c-input ml-2">
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
                                                        <input type="checkbox" name="fentanyl" id="fentanyl" value="1" class="mr-1">FENTANYL  
                                                        <input type="checkbox" name="mo" id="mo" value="1" class="mr-1 ml-1">MO 
                                                        <input type="checkbox" name="pethidine" id="pethidine" value="1" class="mr-1 ml-1">PETHIDINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_1" id="jumlahQ-1" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>29</td>
                                                    <td> 
                                                        <input type="checkbox" name="b02" id="b02" value="1" class="mr-1">O2 
                                                        <input type="checkbox" name="n20" id="n20" value="1" class="mr-1 ml-2">N20 
                                                        <input type="checkbox" name="air" id="air" value="1" class="mr-1 ml-2">AIR
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_29" id="jumlahQ-29" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>57</td>
                                                    <td> 
                                                        <input type="checkbox" name="ett_no" id="ett-no" value="1" class="mr-1">EET NO.
                                                        <input type="text" name="ett_noT" id="ett-noT" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_57" id="jumlahQ-57" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>2</td>
                                                    <td> 
                                                        <input type="checkbox" name="ephedrine" id="ephedrine" value="1" class="mr-1">EPHEDRINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_2" id="jumlahQ-2" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>30</td>
                                                    <td> 
                                                        <input type="checkbox" name="iv_line" id="iv-line" value="1" class="mr-1">IV LINE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_30" id="jumlahQ-30" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>58</td>
                                                    <td> 
                                                        <input type="checkbox" name="ett_nkk_no" id="ett-nkk-no" value="1" class="mr-1">EET NKK NO.
                                                        <input type="text" name="ett_nkk_noT" id="ett-nkk-noT" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_58" id="jumlahQ-58" class="custom-form clear-input d-inline-block col-lg-10">
                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>3</td>
                                                    <td> 
                                                        <input type="checkbox" name="ephineprine" id="ephineprine" value="1" class="mr-1">EPHINEPRINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_3" id="jumlahQ-3" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>31</td>
                                                    <td> 
                                                        <input type="checkbox" name="tegaderm_no" id="tegaderm-no" value="1" class="mr-1">TEGADERM NO
                                                        <input type="text" name="tegaderm_noA" id="tegaderm-noA" class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_31" id="jumlahQ-31" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>59</td>
                                                    <td> 
                                                        <input type="checkbox" name="lma_no" id="lma-no" value="1" class="mr-1">LMA NO.
                                                        <input type="text" name="lma_noY" id="lma-noY" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_59" id="jumlahQ-59" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>4</td>
                                                    <td> 
                                                        <input type="checkbox" name="adona" id="adona" value="1" class="mr-1">ADONA 
                                                        <input type="checkbox" name="kalnex" id="kalnex" value="1" class="mr-1 ml-2">KALNEX 
                                                        <input type="checkbox" name="vitk" id="vitk" value="1" class="mr-1 ml-2">VIT K 
                                                        <input type="checkbox" name="dicinon" id="dicinon" value="1" class="mr-1 ml-2">DYCINON
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_4" id="jumlahQ-4" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>32</td>
                                                    <td> 
                                                        <input type="checkbox" name="trheeway" id="trheeway" value="1" class="mr-1">TRHEEWAY
                                                        <input type="text" name="trheewayA" id="trheewayA" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_32" id="jumlahQ-32" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>60</td>
                                                    <td>
                                                        <input type="checkbox" name="guedel" id="guedel" value="1" class="mr-1">GUEDEL 
                                                        <input type="checkbox" name="npa_no" id="npa-no" value="1" class="mr-1 ml-2">NPA NO.
                                                        <input type="text" name="guedelG" id="guedelG" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_60" id="jumlahQ-60" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>5</td>
                                                    <td> 
                                                        <input type="checkbox" name="invomit" id="invomit" value="1" class="mr-1">INVOMIT 
                                                        <input type="checkbox" name="granon" id="granon" value="1" class="mr-1 ml-2">GRANON
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_5" id="jumlahQ-5" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>33</td>
                                                    <td> 
                                                        <input type="checkbox" name="alkhohol_swab" id="alkhohol-swab" value="1" class="mr-1">ALKOHOL SWAB
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_33" id="jumlahQ-33" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>61</td>
                                                    <td> 
                                                        <input type="checkbox" name="bacteri_filter" id="bacteri-filter" value="1" class="mr-1">BACTERI FILTER
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_61" id="jumlahQ-61" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>6</td>
                                                    <td> 
                                                        <input type="checkbox" name="gastridine" id="gastridine" value="1" class="mr-1">GASTRIDINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_6" id="jumlahQ-6" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>34</td>
                                                    <td> 
                                                        <input type="checkbox" name="infus_set" id="infus-set" value="1" class="mr-1">INFUS SET 
                                                        <input type="checkbox" name="blood_set" id="blood-set" value="1" class="mr-1 ml-2">BLOOD SET
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_34" id="jumlahQ-34" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>62</td>
                                                    <td> 
                                                        <input type="checkbox" name="brething_circuit" id="brething-circuit" value="1" class="mr-1">BRETHING CIRCUIT
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_62" id="jumlahQ-62" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>7</td>
                                                    <td> 
                                                        <input type="checkbox" name="sa" id="sa" value="1" class="mr-1">SA 
                                                        <input type="checkbox" name="prostigmine" id="prostigmine" value="1" class="mr-1 ml-2">PROSTIGMINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_7" id="jumlahQ-7" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>35</td>
                                                    <td> 
                                                        <input type="checkbox" name="nasal_02" id="nasal-02" value="1" class="mr-1">NASAL O2
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_35" id="jumlahQ-35" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>63</td>
                                                    <td> 
                                                        <input type="checkbox" name="broadced" id="broadced" value="1" class="mr-1">BROADCED 
                                                        <input type="checkbox" name="ceftriaxone" id="ceftriaxone" value="1" class="mr-1 ml-2">CEFTRIAXONE
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_63" id="jumlahQ-63" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>8</td>
                                                    <td> 
                                                        <input type="checkbox" name="darmicum" id="darmicum" value="1" class="mr-1">DORMICUM 
                                                        <input type="checkbox" name="sedacum" id="sedacum" value="1" class="mr-1 ml-2">SEDACUM
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_8" id="jumlahQ-8" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>36</td>
                                                    <td> 
                                                        <input type="checkbox" name="simple_mask" id="simple-mask" value="1" class="mr-1">SIMPLE MASK
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_36" id="jumlahQ-36" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>64</td>
                                                    <td> 
                                                        <input type="checkbox" name="flagyl_drip" id="flagyl-drip" value="1" class="mr-1">FLAGYL DRIPP
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_64" id="jumlahQ-64" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>9</td>
                                                    <td> 
                                                        <input type="checkbox" name="marcain_heavy" id="marcain-heavy" value="1" class="mr-1">MARCAIN HEAVY 
                                                        <input type="checkbox" name="buvanes" id="buvanes" value="1" class="mr-1 ml-2">BUVANES 
                                                        <input type="checkbox" name="decain" id="decain" value="1" class="mr-1 ml-2">DECAIN
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_9" id="jumlahQ-9" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>37</td>
                                                    <td> 
                                                        <input type="checkbox" name="nrm" id="nrm" value="1" class="mr-1">NRM 
                                                        <input type="checkbox" name="rm" id="rm" value="1" class="mr-1 ml-2">RM
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_37" id="jumlahQ-37" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>65</td>
                                                    <td> 
                                                        <input type="checkbox" name="texegram" id="texegram" value="1" class="mr-1">TAXEGRAM
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_65" id="jumlahQ-65" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>10</td>
                                                    <td> 
                                                        <input type="checkbox" name="propofol" id="propofol" value="1" class="mr-1">PROPOFOL 
                                                        <input type="checkbox" name="recofol" id="recofol" value="1" class="mr-1 ml-2">RECOFOL 
                                                        <input type="checkbox" name="proanes" id="proanes" value="1" class="mr-1 ml-2">PROANES
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_10" id="jumlahQ-10" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>38</td>
                                                    <td> 
                                                        <input type="checkbox" name="elektroda_adult" id="elektroda-adult" value="1" class="mr-1">ELEKTRODA ADULT 
                                                        <input type="checkbox" name="ped" id="ped" value="1" class="mr-1">PED
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_38" id="jumlahQ-38" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                 
                                                </tr>



















                                                <tr>
                                                    <td class="center"><b>11</td>
                                                    <td> 
                                                        <input type="checkbox" name="catapres" id="catapres" value="1" class="mr-1">CATAPRES 
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_11" id="jumlahQ-11" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>39</td>
                                                    <td> 
                                                        <input type="checkbox" name="hansaplast" id="hansaplast" value="1" class="mr-1">HANSAPLAST
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_39" id="jumlahQ-39" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                          
                                                <tr>
                                                    <td class="center"><b>12</td>
                                                    <td> 
                                                        <input type="checkbox" name="ketrobat_30mg" id="ketrobat-30mg" value="1" class="mr-1">KETROBAT 30mg 
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_12" id="jumlahQ-12" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>40</td>
                                                    <td> 
                                                        <input type="checkbox" name="spinocant" id="spinocant" value="1" class="mr-1">SPINOCANT
                                                        <input type="checkbox" name="no_24" id="no-24" value="1" class="mr-1 ml-2">NO. 24 
                                                        <input type="checkbox" name="no_27" id="no-27" value="1" class="mr-1 ml-2">NO. 27
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_40" id="jumlahQ-40" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>13</td>
                                                    <td> 
                                                        <input type="checkbox" name="orasic_100mg" id="orasic-100mg" value="1" class="mr-1">ORASIC 100mg
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_13" id="jumlahQ-13" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>41</td>
                                                    <td> 
                                                        <input type="checkbox" name="pencan_no_27" id="pencan-no-27" value="1" class="mr-1">PENCAN NO. 27
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_41" id="jumlahQ-41" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                
                                                <tr>
                                                    <td class="center"><b>14</td>
                                                    <td> 
                                                        <input type="checkbox" name="farmodal" id="farmodal" value="1" class="mr-1">FARMADOL
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_14" id="jumlahQ-14" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>42</td>
                                                    <td> 
                                                        <input type="checkbox" name="glofusal" id="glofusal" value="1" class="mr-1">GELOFUSAL 
                                                        <input type="checkbox" name="glofusin" id="glofusin" value="1" class="mr-1 ml-2">GELOFUSIN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_42" id="jumlahQ-42" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>15</td>
                                                    <td> 
                                                        <input type="checkbox" name="dynastat" id="dynastat" value="1" class="mr-1">DYNASTAT
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_15" id="jumlahQ-15" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>43</td>
                                                    <td> 
                                                        <input type="checkbox" name="ring_as" id="ring-as" value="1" class="mr-1">RING AS 
                                                        <input type="checkbox" name="rlH" id="rlH" value="1" class="mr-1 ml-2">RL 
                                                        <input type="checkbox" name="d5" id="d5" value="1" class="mr-1 ml-2">D5% 
                                                        <input type="checkbox" name="rd" id="rd" value="1" class="mr-1 ml-2">RD
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_43" id="jumlahQ-43" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>16</td>
                                                    <td> 
                                                        <input type="checkbox" name="profenid" id="profenid" value="1" class="mr-1">PROFENID 
                                                        <input type="checkbox" name="tramal_supp" id="tramal-supp" value="1" class="mr-1 ml-2">TRAMAL SUPP
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_16" id="jumlahQ-16" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>44</td>
                                                    <td> 
                                                        <input type="checkbox" name="nacl_25" id="nacl-25" value="1" class="mr-1">NACL 25 
                                                        <input type="checkbox" name="t100" id="t100" value="1" class="mr-1 ml-2">100 
                                                        <input type="checkbox" name="t500" id="t500" value="1" class="mr-1 ml-2">500
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_44" id="jumlahQ-44" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>17</td>
                                                    <td> 
                                                        <input type="checkbox" name="paracetamol_supp_125mg" id="paracetamol-supp-125mg" value="1" class="mr-1">PARACETAMOL SUPP 125mg
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_17" id="jumlahQ-17" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>45</td>
                                                    <td> 
                                                        <input type="checkbox" name="futrolit" id="futrolit" value="1" class="mr-1">FUTROLIT 
                                                        <input type="checkbox" name="manitol" id="manitol" value="1" class="mr-1">MANITOL
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_45" id="jumlahQ-45" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>18</td>
                                                    <td> 
                                                        <input type="checkbox" name="stesolid" id="stesolid" value="1" class="mr-1">STESOLID
                                                        <input type="checkbox" name="S5c" id="S5c" value="1" class="mr-1 ml-2">5 
                                                        <input type="checkbox" name="S10c" id="S10c" value="1" class="mr-1 ml-2">10
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_18" id="jumlahQ-18" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>46</td>
                                                    <td> 
                                                        <input type="checkbox" name="heas" id="heas" value="1" class="mr-1">HAES 
                                                        <input type="checkbox" name="W130c" id="W130c" value="1" class="mr-1 ml-2">130 
                                                        <input type="checkbox" name="W200c" id="W200c" value="1" class="mr-1 ml-2">200
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_46" id="jumlahQ-46" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>19</td>
                                                    <td> 
                                                        <input type="checkbox" name="lasik" id="lasik" value="1" class="mr-1">LASIK
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_19" id="jumlahQ-19" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>47</td>
                                                    <td> 
                                                        <input type="checkbox" name="tridex" id="tridex" value="1" class="mr-1">TRIDEX 
                                                        <input type="checkbox" name="t27a" id="t27a" value="1" class="mr-1">27A 
                                                        <input type="checkbox" name="t27b" id="t27b" value="1" class="mr-1">27B 
                                                        <input type="checkbox" name="plain" id="plain" value="1" class="mr-1">PLAIN
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_47" id="jumlahQ-47" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>20</td>
                                                    <td> 
                                                        <input type="checkbox" name="reculax" id="reculax" value="1" class="mr-1">ROCULAX 
                                                        <input type="checkbox" name="traoum" id="traoum" value="1" class="mr-1 ml-2">TRAOUM 
                                                        <input type="checkbox" name="ecron" id="ecron" value="1" class="mr-1 ml-2">ECRON
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_20" id="jumlahQ-20" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>48</td>
                                                    <td> 
                                                        <input type="checkbox" name="emla_salep" id="emla-salep" value="1" class="mr-1">EMLA SALEP
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_48" id="jumlahQ-48" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>21</td>
                                                    <td> 
                                                        <input type="checkbox" name="kalmethason" id="kalmethason" value="1" class="mr-1">KALMETHASON
                                                        <input type="checkbox" name="y4mg" id="y4mg" value="1" class="mr-1 ml-2">4mg 
                                                        <input type="checkbox" name="y5mg" id="y5mg" value="1" class="mr-1 ml-2">5mg
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_21" id="jumlahQ-21" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>49</td>
                                                    <td> 
                                                        <input type="checkbox" name="chatheter_tip_50cc" id="chatheter-tip-50cc" value="1" class="mr-1">CATHETER TIP 50cc
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_49" id="jumlahQ-49" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>22</td>
                                                    <td> 
                                                        <input type="checkbox" name="syntonicon" id="syntonicon" value="1" class="mr-1">SYNTONICON  
                                                        <input type="checkbox" name="methergine" id="methergine" value="1" class="mr-1 ml-2">METHERGINE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_22" id="jumlahQ-22" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>50</td>
                                                    <td> 
                                                        <input type="checkbox" name="extensiontube" id="extensiontube" value="1" class="mr-1">EXTENSION TUBE 150cc
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_50" id="jumlahQ-50" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>23</td>
                                                    <td> 
                                                        <input type="checkbox" name="citotex" id="citotex" value="1" class="mr-1">CITOTEX 
                                                        <input type="checkbox" name="gastrul" id="gastrul" value="1" class="mr-1 ml-2">GASTRUL
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_23" id="jumlahQ-23" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>51</td>
                                                    <td> 
                                                        <input type="checkbox" name="xylocainjlly" id="xylocainjlly" value="1" class="mr-1">XYLOCAIN JELLY
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_51" id="jumlahQ-51" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>24</td>
                                                    <td> 
                                                        <input type="checkbox" name="alinaminf" id="alinaminf" value="1" class="mr-1">ALINAMIN F
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_24" id="jumlahQ-24" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>52</td>
                                                    <td> 
                                                        <input type="checkbox" name="ngt_no" id="ngt-no" value="1" class="mr-1">NGT NO.
                                                        <input type="text" name="ngt_noX" id="ngt-noX" class="custom-form clear-input d-inline-block col-lg-8">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_52" id="jumlahQ-52" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>25</td>
                                                    <td> 
                                                        <input type="checkbox" name="dopamin" id="dopamin" value="1" class="mr-1">DOPAMIN 
                                                        <input type="checkbox" name="vascon" id="vascon" value="1" class="mr-1 ml-2">VASCON
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_25" id="jumlahQ-25" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>53</td>
                                                    <td> 
                                                        <input type="checkbox" name="cathurine" id="cathurine" value="1" class="mr-1">CATH URINE NO.
                                                        <input type="text" name="cathurineNO" id="cathurineNO" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_53" id="jumlahQ-53" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>26</td>
                                                    <td> 
                                                        <input type="checkbox" name="nakoba" id="nakoba" value="1" class="mr-1">NOKOBA
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_26" id="jumlahQ-26" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>54</td>
                                                    <td> 
                                                        <input type="checkbox" name="urinebag" id="urinebag" value="1" class="mr-1">URINE BAG
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_54" id="jumlahQ-54" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>27</td>
                                                    <td> 
                                                        <input type="checkbox" name="aminophillin" id="aminophillin" value="1" class="mr-1">AMINOPHILLIN
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_27" id="jumlahQ-27" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>55</td>
                                                    <td> 
                                                        <input type="checkbox" name="selangsuccen" id="selangsuccen" value="1" class="mr-1">SELANG SUCTION
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_55" id="jumlahQ-55" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td class="center"><b>28</td>
                                                    <td> 
                                                        <input type="checkbox" name="sevo" id="sevo" value="1" class="mr-1">SEVO 
                                                        <input type="checkbox" name="isoflurane" id="isoflurane" value="1" class="mr-1">ISOFLURANE
                                                    </td>
                                                    <td class="center"> 
                                                        <input type="text" name="jumlahQ_28" id="jumlahQ-28" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>

                                                    <td></td>
                                                    <td class="center"><b>56</td>
                                                    <td> 
                                                        <input type="checkbox" name="cathetersuction" id="cathetersuction" value="1" class="mr-1">CATHETER SUCTION NO. 
                                                        <input type="text" name="cathetersuctionA" id="cathetersuctionA" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                    <td class="center">
                                                        <input type="text" name="jumlahQ_56" id="jumlahQ-56" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPemakaianAlkesDanObatAnastesi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

