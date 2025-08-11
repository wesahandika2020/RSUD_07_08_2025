<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-08-11 09:24:48 --> Severity: Notice  --> Trying to get property 'id_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\controllers\api\Pelayanan.php 80
ERROR - 2025-08-11 09:24:48 --> Severity: Notice  --> Trying to get property 'id_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\controllers\api\Pelayanan.php 92
ERROR - 2025-08-11 09:25:08 --> Severity: Notice  --> Trying to get property 'id_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\controllers\api\Pelayanan.php 80
ERROR - 2025-08-11 09:25:08 --> Severity: Notice  --> Trying to get property 'id_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\controllers\api\Pelayanan.php 92
ERROR - 2025-08-11 09:31:20 --> Severity: Notice  --> Undefined variable: jenis C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\views\tindak_lanjut_form\modal_tindak_lanjut.php 24
ERROR - 2025-08-11 09:32:49 --> Severity: Notice  --> Undefined variable: jenis C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\views\tindak_lanjut_form\modal_tindak_lanjut.php 24
ERROR - 2025-08-11 09:41:21 --> Severity: 8192  --> Array and string offset access syntax with curly braces is deprecated C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\libraries\Zend\Barcode\Object\ObjectAbstract.php 1201
ERROR - 2025-08-11 09:41:32 --> Severity: 8192  --> Array and string offset access syntax with curly braces is deprecated C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\libraries\Zend\Barcode\Object\ObjectAbstract.php 1201
ERROR - 2025-08-11 09:44:07 --> Severity: Notice  --> Undefined variable: jenis C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\views\tindak_lanjut_form\modal_tindak_lanjut.php 24
ERROR - 2025-08-11 11:03:49 --> Severity: Notice  --> Undefined variable: jenis C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\pelayanan\views\tindak_lanjut_form\modal_tindak_lanjut.php 24
ERROR - 2025-08-11 11:04:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;is_prb&quot; does not exist
LINE 3: ..._potensi_komplain, is_pasien_pejabat, is_pemilik_rs, is_prb,
                                                                ^
HINT:  Perhaps you meant to reference the column &quot;sm_profil_pasien.is_hiv&quot; or the column &quot;sm_profil_pasien.is_tbc&quot;. C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-11 11:04:06 --> Query error: ERROR:  column "is_prb" does not exist
LINE 3: ..._potensi_komplain, is_pasien_pejabat, is_pemilik_rs, is_prb,
                                                                ^
HINT:  Perhaps you meant to reference the column "sm_profil_pasien.is_hiv" or the column "sm_profil_pasien.is_tbc". - Invalid query: select id, 
                    tinggi_badan, berat_badan, 
                    is_died, is_hiv, is_alergi, is_gonorrhea, is_hepatitis, is_kusta, is_tbc, is_potensi_komplain, is_pasien_pejabat, is_pemilik_rs, is_prb,
                    id_master_alergi, keterangan_alergi, id_satset_alergi 
                    from sm_profil_pasien where id_pasien = '00268571'
