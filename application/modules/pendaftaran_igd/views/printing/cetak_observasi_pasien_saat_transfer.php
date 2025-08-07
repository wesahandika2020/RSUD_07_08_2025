<!-- // OPAT -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
    <br><br><br>
    <main class="main">
        <section class="information">
			<br>
            <div class="information__container container">
                <table class="small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="11">OBSERVASI PASIEN SAAT TRANSFER</th>
                        </tr>

                        <tr>                                    
                            <th width="10%" class="center"><b>Tgl/jam</b></th>
                            <th width="15%" class="center"><b>Keadaan Pasien</b></th>
                            <th width="4%" class="center"><b>TD</b></th>
                            <th width="4%" class="center"><b>N </b></th>
                            <th width="4%"  class="center"><b>RR</b></th>               
                            <th width="4%"  class="center"><b>S</b></th>               
                            <th width="4%"  class="center"><b>SpO2</b></th>               
                            <th width="10%"  class="center"><b>Oksigen ventilasi</b></th>               
                            <th width="10%"  class="center"><b>Tindakan</b></th>               
                            <th width="10%"  class="center"><b>Evaluasi</b></th>               
                            <th width="10%"  class="center"><b>Nama petugas</b></th>               
                        </tr>

                        <tr>
                            <!-- SENGAJA DI KASIH (.) AGAR ADA JARAK -->
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_1) && !empty($ttd_tgl_opst_1) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_1) && !empty($ttd_tgl_opst_1)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_1));
                                } ?> .
                            </td>
                            <td width="10%" class="center hidden-text" style="<?php echo $ttd_keadaan_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_keadaan_opst_1 ?>
                            </td>
                            <td width="4%" class="center hidden-text" style="<?php echo $ttd_td_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_td_opst_1 ?>
                            </td>
                            <td width="4%" class="center hidden-text" style="<?php echo $ttd_n_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_n_opst_1 ?>
                            </td>
                            <td width="4%" class="center hidden-text" style="<?php echo $ttd_rr_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_rr_opst_1 ?>
                            </td>
                            <td width="4%" class="center hidden-text" style="<?php echo $ttd_s_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_s_opst_1 ?>
                            </td>
                            <td width="4%" class="center hidden-text" style="<?php echo $ttd_sp02_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_sp02_opst_1 ?>
                            </td>
                            <td width="10%" class="center hidden-text" style="<?php echo $ttd_oksigen_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_oksigen_opst_1 ?>
                            </td>
                            <td width="10%" class="center hidden-text" style="<?php echo $ttd_tindakan_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_tindakan_opst_1 ?>
                            </td>
                            <td width="10%" class="center hidden-text" style="<?php echo $ttd_evaluasi_opst_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_evaluasi_opst_1 ?>
                            </td>
                            <td width="10%" class="center hidden-text" style="<?php echo $ttd_nama_perawat_1 ? '' : 'visibility: hidden;'; ?>">
                                <?= $ttd_nama_perawat_1 ?>
                            </td>                         
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_2) && !empty($ttd_tgl_opst_2) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_2) && !empty($ttd_tgl_opst_2)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_2));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_2 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_2 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_2 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_2 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_2 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_2 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_2 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_2 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_2 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_2 ?></td>          
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_3) && !empty($ttd_tgl_opst_3) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_3) && !empty($ttd_tgl_opst_3)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_3));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_3 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_3 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_3 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_3 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_3 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_3 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_3 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_3 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_3 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_3 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_4) && !empty($ttd_tgl_opst_4) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_4) && !empty($ttd_tgl_opst_4)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_4));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_4 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_4 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_4 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_4 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_4 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_4 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_4 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_4 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_4 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_4 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_5) && !empty($ttd_tgl_opst_5) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_5) && !empty($ttd_tgl_opst_5)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_5));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_5 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_5 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_5 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_5 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_5 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_5 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_5 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_5 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_5 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_5 ?></td>            
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_6) && !empty($ttd_tgl_opst_6) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_6) && !empty($ttd_tgl_opst_6)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_6));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_6 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_6 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_6 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_6 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_6 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_6 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_6 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_6 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_6 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_6 ?></td>    
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_7) && !empty($ttd_tgl_opst_7) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_7) && !empty($ttd_tgl_opst_7)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_7));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_7 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_7 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_7 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_7 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_7 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_7 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_7 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_7 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_7 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_7 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_8) && !empty($ttd_tgl_opst_8) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_8) && !empty($ttd_tgl_opst_8)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_8));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_8 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_8 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_8 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_8 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_8 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_8 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_8 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_8 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_8 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_8 ?></td>          
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_9) && !empty($ttd_tgl_opst_9) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_9) && !empty($ttd_tgl_opst_9)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_9));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_9 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_9 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_9 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_9 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_9 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_9 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_9 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_9 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_9 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_9 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_10) && !empty($ttd_tgl_opst_10) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_10) && !empty($ttd_tgl_opst_10)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_10));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_10 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_10 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_10 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_10 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_10 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_10 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_10 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_10 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_10 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_10 ?></td>            
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_11) && !empty($ttd_tgl_opst_11) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_11) && !empty($ttd_tgl_opst_11)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_11));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_11 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_11 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_11 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_11 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_11 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_11 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_11 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_11 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_11 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_11 ?></td>
                            </td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_12) && !empty($ttd_tgl_opst_12) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_12) && !empty($ttd_tgl_opst_12)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_12));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_12 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_12 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_12 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_12 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_12 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_12 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_12 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_12 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_12 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_12 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_13) && !empty($ttd_tgl_opst_13) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_13) && !empty($ttd_tgl_opst_13)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_13));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_13 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_13 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_13 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_13 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_13 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_13 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_13 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_13 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_13 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_13 ?></td> 
                            </td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_14) && !empty($ttd_tgl_opst_14) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_14) && !empty($ttd_tgl_opst_14)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_14));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_14 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_14 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_14 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_14 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_14 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_14 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_14 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_14 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_14 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_14 ?></td>           
                        </tr>

                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="<?php echo isset($ttd_tgl_opst_15) && !empty($ttd_tgl_opst_15) ? '' : 'visibility: hidden;'; ?>">
                                <?php if (isset($ttd_tgl_opst_15) && !empty($ttd_tgl_opst_15)) {
                                    echo date('d-m-Y H:i', strtotime($ttd_tgl_opst_15));
                                } ?> .
                            </td>
                            <td width="10%" class="center"><?= $ttd_keadaan_opst_15 ?></td>
                            <td width="4%" class="center"><?= $ttd_td_opst_15 ?></td>
                            <td width="4%" class="center"><?= $ttd_n_opst_15 ?></td>
                            <td width="4%" class="center"><?= $ttd_rr_opst_15 ?></td>
                            <td width="4%" class="center"><?= $ttd_s_opst_15 ?></td>
                            <td width="4%" class="center"><?= $ttd_sp02_opst_15 ?></td>
                            <td width="10%" class="center"><?= $ttd_oksigen_opst_15 ?></td>
                            <td width="10%" class="center"><?= $ttd_tindakan_opst_15 ?></td>
                            <td width="10%" class="center"><?= $ttd_evaluasi_opst_15 ?></td>
                            <td width="10%" class="center"><?= $ttd_nama_perawat_15 ?></td>            
                        </tr>    

                        <!-- dibawah ini ga ada databasenya SENGAJA -->
                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="visibility: hidden;">text</td>
                            <td width="10%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                        </tr>   
                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="visibility: hidden;">text</td>
                            <td width="10%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                        </tr>
                        <tr>                                    
                            <td width="12%" class="center hidden-text" style="visibility: hidden;">text</td>
                            <td width="10%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%" class="center hidden-text" style="visibility: hidden;"></td>
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="4%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                            <td width="10%"  class="center hidden-text" style="visibility: hidden;"></td>               
                        </tr>               
                    </thead>
                </table>
                <table class="small__font">
                    <tr>   
                        <td width="12%" class="center hidden-text">
                            Tanggal dan Jam serah terima pasien    :  
                            <?php if (isset($ttd_tanggal_opst) && !empty($ttd_tanggal_opst)) {
                                echo date('d-m-Y H:i', strtotime($ttd_tanggal_opst));
                            } ?>.
                        </td>
                    </tr> 
                </table>
                <table class="small__font">
                    <tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    <center>Petugas yang menerima<br> <br> <br> <br><br> <br> <br> <br>
                                        <font size="0.625rem"></font>
                                    </center>
                                    <center> <?=$ttd_petugas_menerima; ?> <br> 
                                        <p style="text-decoration: overline;">Tanda tangan, Nama lengkap, dan Stempel RS</p>

                                        <font size="0.625rem"></font>
                                    </center>
                                </td>
                                <td>
                                    <center>Petugas yang melakukan transfer<br> <br> <br> <br><br> <br> <br> <br>
                                        <font size="0.625rem"></font>
                                    </center>
                                    <center> <?=$ttd_nama_perawat_16; ?> <br> 
                                    <p style="text-decoration: overline;">Tanda tangan, Nama lengkap</p>                                     
                                        <font size="0.625rem"></font>
                                    </center>
                                </td>
                                <td>
                                    <center>Pasien / Keluarga<br> <br> <br> <br><br> <br> <br> <br>
                                        <font size="0.625rem"></font>
                                    </center>
                                    <center> <?=$ttd_pasien_opst; ?> <br> 
                                        <p style="text-decoration: overline;">Tanda tangan, Nama lengkap</p>                                     
                                        <font size="0.625rem"></font>
                                    </center>
                                </td>
                            </tr>     
                        </tbody>
                    </tfoot>
                </table>
            </div>
            <br>
            <br>
            <br>
            <p> Putih    : Rekam Medis </p>
            <br>
            <p> Merah    : Rumah Sakit Rujukan </p>
            <br>
            <br>
            <p> Terima kasih kerjasamanya telah mengisi formulir ini dengan benar dan jelas </p>
            <br>
            <p class="page__number">FORM-KEP-106-01</p>
        </section>
    </main>

</body>
<?php die; ?>