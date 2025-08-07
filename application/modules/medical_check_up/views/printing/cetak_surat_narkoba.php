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
                    <td class="no__border" colspan="3" align="center"><b style="font-weight:bold; font-size: 18pt;">RSUD KOTA TANGERANG</b></td>
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
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN BEBAS NARKOBA</th>
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5" >NO.<?=$surat_narkoba->no_surat;?>/MCU_SKBN_RSUDKT/<?= $surat_narkoba->tahun_surat; ?></th>
                        </tr>                                           
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Umum Daerah Kota Tangerang, menerangkan bahwa :</td>
                        </tr>                      
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= $detailPendaftaran->nama_pasien; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= $detailPendaftaran->kelamin; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Tanggal Lahir</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><b><?= datefmysql($surat_narkoba->tanggal_lahir); ?></b></td>
                        </tr>                    
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="20%">Alamat/ <i>Address</i></td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" width="60%">
							<b><?= $detailPendaftaran->alamat; ?>  
							
							<?php if ($detailPendaftaran->norumah != NULL ) : ?>
								NO. <?= $detailPendaftaran->norumah; ?>            
							<?php endif; ?>
								
							RT. <?= $detailPendaftaran->rt; ?> / RW. <?= $detailPendaftaran->rw; ?>, KEL.<?= $detailPendaftaran->kel; ?>, KEC.<?= $detailPendaftaran->kec; ?>, <?= $detailPendaftaran->kab; ?>, <?= $detailPendaftaran->prop; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="20%">Pekerjaan</i></td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" width="60%"><b><?= $surat_narkoba->nama_pekerjaan; ?></b></td>
                        </tr>                        
                    </tbody>                                    
                </table>
                <br>
                <table class="no__border small__line__spacing small__font">
                    <tr>
                        <td class="no__border" align="justify" colspan="4" ><br>Menerangkan bahwa berdasarkan  pemeriksaan laboratorium (Hasil Terlampir), maka saat ini yang bersangkutan dinyatakan <b>TIDAK DITEMUKAN</b> zat yang terlampir dalam hasil pemeriksaan laboratorium. </td>
                    </tr>
                    <tr>
                        <td class="no__border" align="justify" colspan="4" ><br>Demikian Surat Keterangan ini untuk digunakan sesuai ketentuan yang berlaku.</td>                    
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"></td>   
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"></td>   
                    </tr> 
               </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <br>
                <table class="no__border small__line__spacing small__font">
                    <tr>                                                      
                            <td class="no__border" colspan="4" align="right">Kota Tangerang, <b><?= datefmysql($surat_narkoba->tanggal_pemeriksaan); ?></b></td>
                        </tr>
                        <tr>                            
                            <td class="no__border" colspan="4" align="right">Dokter Medical Check Up</td>
                        </tr> 
                        <tr>                            
                            <td class="no__border" colspan="4" align="right">RSUD Kota Tangerang</td>
                        </tr>                                         
                        <tr>
                            <td class="no__border" colspan="4" align="right"><br><br><br><br><br><br><p></p>(<b><?= $surat_narkoba->nama_dokter;?></b>) <br><?=$surat_narkoba->nip_sip;?>. <?=$surat_narkoba->nip_dokter;?></font></td>
                        <tr>     
                </table>                
            </div>         
            <br>
            <br>
            <p class="page__number">FORM-MCU-13-01</p>
        </section>
    </main>
 
  </body>
<?php die; ?>
