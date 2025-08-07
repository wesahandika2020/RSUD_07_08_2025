<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <tr>
                    <td class="no__border" rowspan="3" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="70px" height="70px"></td>
                    <td class="no__border" colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;">RSUD KOTA TANGERANG</b></td>
                    <td class="no__border" rowspan="3" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-nars-rsud.png' ?>" width="70px" height="70px"></td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
					Kecamatan Tangerang</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. 021 2972 0201 FAX. 021 2972 0202 </b></td>
                </tr>
            </table>           
        </div>
    </header>    

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="form__sk__sehat">
			<br>
            <div class="form__sk__sehat__container container">
                <table class="no__border small__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN SEHAT / MEDICAL CERTIFICATE</th>
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5" >NO.<?=$sk_sehat->no_surat_sks;?>/MCU-RSUDKT/<?= $sk_sehat->tahun_surat_sks; ?></th>
                        </tr>                                           
                    </thead>                   
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Saya dokter <b> RSUD KOTA TANGERANG</b>, menyatakan bahwa :</td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><i>I, doctor of <b> RSUD KOTA TANGERANG</b>, here by certify that :</i></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">NAMA/ <i>NAME</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= $detailPendaftaran->nama_pasien; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">JENIS KELAMIN/ <i>SEX</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= $detailPendaftaran->kelamin; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="30%">ALAMAT/ <i>ADDRESS</i></td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" width="60%">
                                <b><?= $detailPendaftaran->alamat; ?>

                                <?php if ($detailPendaftaran->norumah != NULL ) : ?>
                                    NO. <?= $detailPendaftaran->norumah; ?>            
                                <?php endif; ?>

                                 RT. <?= $detailPendaftaran->rt; ?>
                                 / RW. <?= $detailPendaftaran->rw; ?>, KEL.<?= $detailPendaftaran->kel; ?>, KEC.<?= $detailPendaftaran->kec; ?>, <?= $detailPendaftaran->kab; ?>, <?= $detailPendaftaran->prop; ?> </b>
                            </td>
						</tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">PEKERJAAN/ <i>OCCUPATION</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= $sk_sehat->nama_pekerjaan; ?></b></td>
                        </tr>                   
                    </tbody>
                </table>
                <br>
                <table border="1">
                <tr>
                    <td width="15%" style="text-align:center"><small>Tanggal Lahir / <i>Date of Birthday </i></small></td>
                    <td width="15%" style="text-align:center"><small>Tinggi Badan/ <i>Height</i></small></td>
                    <td width="15%" style="text-align:center"><small>Berat Badan / <i>Weight</i></small></td>
                </tr>
                <tr>
                    <td width="15%" style="text-align:center"><small><?= datefmysql($sk_sehat->tanggal_lahir); ?></small></td>
                    <td width="15%" style="text-align:center"><small><?= $sk_sehat->tinggi_badan ?></small><small> CM</small></td>
                    <td width="15%" style="text-align:center"><small><?= $sk_sehat->berat_badan  ?></small><small> KG</small></td>                                         
                </tr>
                </table>
                <table class="no__border small__line__spacing small__font">
                    <tbody>  
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>                  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><b>Keterangan / Information</b></td>
                        </tr>
                    </tbody>
                </table>
                <table border="1">
                <br>
                <tr>
                    <td width="15%" style="text-align:center"><small>Tekanan Darah / blood pressure</small></td>
                    <td width="15%" style="text-align:center"><small>Nadi / Pulse</small></td>
                    <td width="15%" style="text-align:center"><small>Pernafasan / Respiration Rate</small></td>
                </tr>
                <tr>
                    <td width="15%" style="text-align:center"><small>Sistolik : </small><small><?= $sk_sehat->tensi_sistolik ?><small> mmHG</small>
                        <p></p>
                        Diastolik : <?= $sk_sehat->tensi_diastolik ?> mmHG

                    </td>
                    <td width="15%" style="text-align:center"><small><?= $sk_sehat->nadi ?></small><small> X/min</small></td>
                    <td width="15%" style="text-align:center"><small><?= $sk_sehat->rr  ?></small><small> X/min</small></td>                                         
                </tr>
                </table>
                <table class="no__border small__line__spacing small__font">
                    <tbody>  
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>                  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Berdasarkan pemeriksaan fisik dan penunjang hari ini dinyatakan dalam keadaan : <b><?= $sk_sehat->hasil_pemeriksaan; ?></b> </td>
                        </tr>
                        <tr>                            
                            <?php if ($sk_sehat->hasil_pemeriksaan === 'SEHAT JASMANI') : ?>
                                <td class="no__border" align="justify" colspan="4" ><i>Based on medical examintation today name is physically : </i><b><i>FIT CONDITION</i></b></td>
                            <?php elseif ($sk_sehat->hasil_pemeriksaan === 'TIDAK SEHAT JASMANI') : ?>
                                <td class="no__border" align="justify" colspan="4" ><i>Based on medical examintation today name is physically : </i><b><i>UNFIT CONDITION</i></b></td>
                            <?php elseif ($sk_sehat->hasil_pemeriksaan === 'SEHAT DENGAN CATATAN MEDIS') : ?>
                                <td class="no__border" align="justify" colspan="4" ><i>Based on medical examintation today name is physically : </i><b><i>FIT WITH MEDICAL RECORDS</i></b></td>
                            <?php elseif ($sk_sehat->hasil_pemeriksaan === 'TIDAK LAYAK BEKERJA SEMENTARA') : ?>
                                <td class="no__border" align="justify" colspan="4" ><i>Based on medical examintation today name is physically : </i><b><i>NOT WORTH WORKING TIME</i></b></td>
                            <?php else : ?>
                                <td class="no__border" align="justify" colspan="4" ><i>Based on medical examintation today name is physically : </i></td>
                            <?php endif; ?>

                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Surat keterangan ini dibuat untuk keperluan : <b><?= $sk_sehat->keterangan; ?></b> </td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><i>The certificate is made for the : </i><b><?= $sk_sehat->keterangan_sks_english; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>                        
                        <tr>
                            <td style="vertical-align:top" class="no__border" width="3%">Catatan</td>
                            <td style="vertical-align:top" class="no__border" width="1%">:</td>
                            <td style="vertical-align:top" class="no__border" width="80%"> <b><?= nl2br($sk_sehat->catatan_sks); ?></b></td>

                        </tr>
                        <tr>
                            <td style="vertical-align:top" class="no__border" width="3%">Notes</td>
                            <td style="vertical-align:top" class="no__border" width="1%">:</td>
                            <td style="vertical-align:top" class="no__border" width="80%"> <b><i><?= nl2br($sk_sehat->notes_sks); ?></i></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr> 
                        <tr>                                                      
                            <td class="no__border" colspan="4" align="right">Kota Tangerang, <b><?= datefmysql($sk_sehat->tanggal_periksa_sks); ?></b></td>
                        </tr>
                        <tr>                            
                            <td class="no__border" colspan="4" align="right">Tanda Tangan Dokter / Doctor's signature</td>
                        </tr>                                          
                        <tr>
                            <td class="no__border" colspan="4" align="right"><br><br><br><br><br><br>Nama Dokter / <i>Doctor's name</i><p></p><br>(<b><?= $sk_sehat->nama_dokter;?></b>) <br><?=$sk_sehat->nip_sip;?>. <?=$sk_sehat->nip_dokter;?></font></td>
                        <tr>         
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-MCU-11-01</p>
        </section>
    </main>
  </body>
<?php die; ?>
