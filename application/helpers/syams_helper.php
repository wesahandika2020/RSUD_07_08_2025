<?php

function fms_signature()
{
    $ref = isset($_GET['ref']) ? $_GET['ref'] : '';
    $lock_ref = 'fms' . date('Y');
    $locked = false;
    if (($ref !== $lock_ref)) {
        $locked = true;
    }
    return $locked;
}

function pembulatan_seratus($angka)
{
    $kelipatan = 100;
    $sisa = $angka % $kelipatan;
    if ($sisa != 0) {
        $kekurangan = $kelipatan - $sisa;
        $hasilBulat = $angka + $kekurangan;
        return ceil($hasilBulat);
    } else {
        return ceil($angka);
    }
}

function dayBetweenDates($awal, $akhir)
{
    $datetime1 = date_create($awal);
    $datetime2 = date_create($akhir);
    $interval = date_diff($datetime1, $datetime2);
    $day = 0;
    if ($interval->h >= 1) {
        $day = $interval->days + 1;
    } else {
        $day = $interval->days;
    }
    return $day;
}
function inttocur($jml)
{
    $int = number_format($jml, 0, '', '.');
    return $int;
}

function rupiah($jml)
{
    $int = number_format(ceil($jml), 0, '', '.');
    return $int;
}

function currency($jml)
{
    $int = number_format(ceil($jml), 0, '', '.');
    if ($jml < 0) {
        return '(' . str_replace('-', '', $int) . ')';
    } else if (($jml === NULL) or ($jml === 0) or ($jml === '0') or ($jml === '')) {
        return '0';
    } else {
        return $int;
    }
}

// function form_hidden($name, $value = NULL, $attr = NULL)
// {
//     return '<input type=hidden name="' . $name . '" value="' . $value . '" ' . $attr . ' />';
// }

function rupiah2($jml)
{
    $int = number_format($jml, 0, '', '.');
    return $int;
}

function get_date_from_dt($dt)
{
    $var = explode(" ", $dt);
    return $var[0];
}

function get_day($date)
{
    $datetime = new DateTime($date);
    $day = $datetime->format('N');
    $hari = '';
    switch ($day) {
        case '1':
            $hari = 'Senin';
            break;
        case '2':
            $hari = 'Selasa';
            break;
        case '3':
            $hari = 'Rabu';
            break;
        case '4':
            $hari = 'Kamis';
            break;
        case '5':
            $hari = 'Jumat';
            break;
        case '6':
            $hari = 'Sabtu';
            break;
        case '7':
            $hari = 'Minggu';
            break;

        default:
            # code...
            break;
    }

    return $hari;
}

function get_date_format($date)
{
    $datetime = new DateTime($date);
    $month = $datetime->format('m');
    $bulan = '';
    switch ($month) {
        case '01':
            $bulan = 'Januari';
            break;
        case '02':
            $bulan = 'Februari';
            break;
        case '03':
            $bulan = 'Maret';
            break;
        case '04':
            $bulan = 'April';
            break;
        case '05':
            $bulan = 'Mei';
            break;
        case '06':
            $bulan = 'Juni';
            break;
        case '07':
            $bulan = 'Juli';
            break;
        case '08':
            $bulan = 'Agustus';
            break;
        case '09':
            $bulan = 'September';
            break;
        case '10':
            $bulan = 'Oktober';
            break;
        case '11':
            $bulan = 'November';
            break;
        case '12':
            $bulan = 'Desember';
            break;

        default:
            # code...
            break;
    }

    return $datetime->format('d') . " " . $bulan . " " . $datetime->format('Y');
}

function datetime($dt)
{
    if ($dt != NULL and $dt != '0000-00-00 00:00:00') {
        $var = explode(" ", $dt);
        $var1 = explode("-", $var[0]);
        $var2 = "$var1[2]/$var1[1]/$var1[0]";
        return $var2 . " " . substr($var[1], 0, 5);
    } else {
        return '-';
    }
}

function datetimefmysql($dt, $time = NULL)
{
    $var = explode(" ", $dt);
    $var1 = explode("-", $var[0]);
    $var2 = "$var1[2]/$var1[1]/$var1[0]";
    if ($time != NULL) {
        $time1 = explode(":", $var[1]);
        $time2 = $time1[0] . ':' . $time1[1];
        return $var2 . ' ' . $time2;
    } else {
        return $var2;
    }
}

function datetime2mysql($dt)
{
    $var = explode(" ", $dt);
    $var1 = explode("/", $var[0]);
    $var2 = "$var1[2]-$var1[1]-$var1[0]";

    return $var2 . " " . $var[1];
}

function datetimetomysql($dt)
{
    // $dt = 2013-03-06 00:00:00
    $var = explode(" ", $dt);
    $date = explode("-", $var[0]);
    $time = explode(":", $var[1]);

    return $date[2] . "/" . $date[1] . "/" . $date[0] . " " . $time[0] . ":" . $time[1];
}

function dateconvert($tgl)
{
    $new = explode('-', $tgl);
    if ($new[1] == '01') {
        $month = 'Januari';
    }
    if ($new[1] == '02') {
        $month = 'Februari';
    }
    if ($new[1] == '03') {
        $month = 'Maret';
    }
    if ($new[1] == '04') {
        $month = 'April';
    }
    if ($new[1] == '05') {
        $month = 'Mei';
    }
    if ($new[1] == '06') {
        $month = 'Juni';
    }
    if ($new[1] == '07') {
        $month = 'Juli';
    }
    if ($new[1] == '08') {
        $month = 'Agustus';
    }
    if ($new[1] == '09') {
        $month = 'September';
    }
    if ($new[1] == '10') {
        $month = 'Oktober';
    }
    if ($new[1] == '11') {
        $month = 'November';
    }
    if ($new[1] == '12') {
        $month = 'Desember';
    }
    return $new[2] . " " . $month . " " . $new[0];
}

function indo_tgl($tgl)
{
    //$x = explode(' ', $tgl);
    $baru = explode("-", $tgl);
    if ($baru[1] == '01')
        $mo = "Januari";
    if ($baru[1] == '02')
        $mo = "Februari";
    if ($baru[1] == '03')
        $mo = "Maret";
    if ($baru[1] == '04')
        $mo = "April";
    if ($baru[1] == '05')
        $mo = "Mei";
    if ($baru[1] == '06')
        $mo = "Juni";
    if ($baru[1] == '07')
        $mo = "Juli";
    if ($baru[1] == '08')
        $mo = "Agustus";
    if ($baru[1] == '09')
        $mo = "September";
    if ($baru[1] == '10')
        $mo = "Oktober";
    if ($baru[1] == '11')
        $mo = "November";
    if ($baru[1] == '12')
        $mo = "Desember";
    $new = "$baru[2] $mo $baru[0]";

    return $new;
}

function indo_time($time, $jam = false)
{
    // time = Y-m-d H:i:s
    $split = explode(' ', $time);
    $data = indo_tgl($split[0]) . " ";
    if ($jam = true) {
        $data .= $split[1];
    }
    return $data;
}

function indo_tgl_graph($tgl)
{
    $baru = explode("-", $tgl);
    if ($baru[1] == "01") {
        $mo = "Jan";
    }
    if ($baru[1] == "02") {
        $mo = "Feb";
    }
    if ($baru[1] == "03") {
        $mo = "Mar";
    }
    if ($baru[1] == "04") {
        $mo = "Apr";
    }
    if ($baru[1] == "05") {
        $mo = "Mei";
    }
    if ($baru[1] == "06") {
        $mo = "Jun";
    }
    if ($baru[1] == "07") {
        $mo = "Jul";
    }
    if ($baru[1] == "08") {
        $mo = "Agu";
    }
    if ($baru[1] == "09") {
        $mo = "Sep";
    }
    if ($baru[1] == "10") {
        $mo = "Okt";
    }
    if ($baru[1] == "11") {
        $mo = "Nov";
    }
    if ($baru[1] == "12") {
        $mo = "Des";
    }
    $new = (string) $baru[2] . " " . $mo;
    return $new;
}

function tampil_bulan($tgl)
{
    $tgl = explode('-', $tgl);
    if ($tgl[1] == '01')
        $mo = "Januari";
    if ($tgl[1] == '02')
        $mo = "Februari";
    if ($tgl[1] == '03')
        $mo = "Maret";
    if ($tgl[1] == '04')
        $mo = "April";
    if ($tgl[1] == '05')
        $mo = "Mei";
    if ($tgl[1] == '06')
        $mo = "Juni";
    if ($tgl[1] == '07')
        $mo = "Juli";
    if ($tgl[1] == '08')
        $mo = "Agustus";
    if ($tgl[1] == '09')
        $mo = "September";
    if ($tgl[1] == '10')
        $mo = "Oktober";
    if ($tgl[1] == '11')
        $mo = "November";
    if ($tgl[1] == '12')
        $mo = "Desember";

    return $mo;
}

function datetopg($tgl)
{
    $new = null;
    $tgl = explode("/", $tgl);
    if (empty($tgl[2]))
        return "";
    $new = "$tgl[2]-$tgl[1]-$tgl[0]";
    return $new;
}

function date2mysql($tgl)
{
    $new = null;
    $tgl = explode("/", $tgl);
    if (empty($tgl[2]))
        return "";
    $new = "$tgl[2]-$tgl[1]-$tgl[0]";
    return $new;
}

function datefmysql($tgl)
{
    if ($tgl == '' || $tgl == null) {
        return "";
    } else {
        $tgl = explode("-", $tgl);
        $new = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
        return $new;
    }
}

function dateStrips($tgl)
{
    if ($tgl == '' || $tgl == null) {
        return "";
    } else {
        $tgl = explode("-", $tgl);
        $new = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
        return $new;
    }
}

function datefrompg($tgl)
{
    if ($tgl == '' || $tgl == null) {
        return "";
    } else {
        $tgl = explode("-", $tgl);
        $new = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
        return $new;
    }
}

function sql_count($table, $q = "")
{
    $sql = "select count(id) as count from " . $table . " where id is not null " . $q;
    return $sql;
}
function sql_count_auto($table, $q = "")
{
    $sql = "select count(id) as count from " . $table . " where " . $q;
    return $sql;
}

function auto_triwulan($bulan)
{
    if (1 <= $bulan && $bulan <= 3) {
        $month = "00001";
    }
    if (4 <= $bulan && $bulan <= 6) {
        $month = "00002";
    }
    if (7 <= $bulan && $bulan <= 9) {
        $month = "00003";
    }
    if (10 <= $bulan && $bulan <= 12) {
        $month = "00004";
    }
    return $month;
}
function createUmur($tgl1)
{
    $CI = &get_instance();
    $tgl2 = date("Y-m-d");
    $sql = $CI->db->query("select datediff('" . $tgl2 . "', '" . $tgl1 . "') as tahun")->row();
    // $sql = $CI->db->query("select EXTRACT(DAY FROM MAX('".$tgl2."')-MIN('".$tgl1."')) AS tahun")->row();
    $tahun = $sql->tahun;
    return floor($tahun / 365);
}

function createUmur2($tanggal_lahir)
{
    $ex_tanggal_lahir = explode('-', $tanggal_lahir);
    $umur = date('Y') - $ex_tanggal_lahir[0];

    return $umur;
}

function is_anak($tgl_lahir)
{
    $umur = createumur($tgl_lahir);
    if ($umur <= 12) {
        $is_anak = true;
    } else {
        $is_anak = false;
    }
    return $is_anak;
}

function hitungUmur($tgl)
{
    $tanggal = explode("-", $tgl);
    $tahun = $tanggal[0];
    $bulan = $tanggal[1];
    $hari = $tanggal[2];

    if ($tahun != '0000') {

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $tahun = $year - $tahun;
        $bulan = $month - $bulan;
        $hari = $day - $hari;

        $jumlahHari = 0;
        $bulanTemp = ($month == 1) ? 12 : $month - 1;
        if ($bulanTemp == 1 || $bulanTemp == 3 || $bulanTemp == 5 || $bulanTemp == 7 || $bulanTemp == 8 || $bulanTemp == 10 || $bulanTemp == 12) {
            $jumlahHari = 31;
        } else if ($bulanTemp == 2) {
            if ($tahun % 4 == 0)
                $jumlahHari = 29;
            else
                $jumlahHari = 28;
        } else {
            $jumlahHari = 30;
        }

        if ($hari <= 0) {
            $hari += $jumlahHari;
            $bulan--;
        }
        if ($bulan < 0 || ($bulan == 0 && $tahun != 0)) {
            $bulan += 12;
            $tahun--;
            if ($bulan >= 12) {
                $tahun++;
                $bulan = 0;
            }
        }
        $result = $tahun . " Tahun " . $bulan . " Bulan " . $hari . " Hari";
    } else {
        $result = "-";
    }
    return $result;
}

function hitungUmur2($tgl)
{
    $tanggal = explode("-", $tgl);
    $tahun = $tanggal[0];
    $bulan = $tanggal[1];
    $hari = $tanggal[2];

    if ($tahun != '0000') {

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $tahun = $year - $tahun;
        $bulan = $month - $bulan;
        $hari = $day - $hari;

        $jumlahHari = 0;
        $bulanTemp = ($month == 1) ? 12 : $month - 1;
        if ($bulanTemp == 1 || $bulanTemp == 3 || $bulanTemp == 5 || $bulanTemp == 7 || $bulanTemp == 8 || $bulanTemp == 10 || $bulanTemp == 12) {
            $jumlahHari = 31;
        } else if ($bulanTemp == 2) {
            if ($tahun % 4 == 0)
                $jumlahHari = 29;
            else
                $jumlahHari = 28;
        } else {
            $jumlahHari = 30;
        }

        if ($hari <= 0) {
            $hari += $jumlahHari;
            $bulan--;
        }
        if ($bulan < 0 || ($bulan == 0 && $tahun != 0)) {
            $bulan += 12;
            $tahun--;
            if ($bulan >= 12) {
                $tahun++;
                $bulan = 0;
            }
        }
        $result = $tahun . " Th " . $bulan . " Bln " . $hari . " Hr";
    } else {
        $result = "-";
    }
    return $result;
}

function hitungUmurJustTahun($tanggal)
{
    $dife = datediff(date("Y-m-d"), $tanggal);
    $umur = "";
    if (5 < $dife[0]) {
        $umur = $dife[0] . " Tahun";
    } else {
        $umur = $dife[0] . " Th " . $dife[1] . " Bln  " . $dife[2] . " Hr";
    }
    return $umur;
}

function dateconvertfjs($tgl)
{
    $new = explode("/", $tgl);
    if ($new[1] == "01") {
        $month = "Januari";
    }
    if ($new[1] == "02") {
        $month = "Februari";
    }
    if ($new[1] == "03") {
        $month = "Maret";
    }
    if ($new[1] == "04") {
        $month = "April";
    }
    if ($new[1] == "05") {
        $month = "Mei";
    }
    if ($new[1] == "06") {
        $month = "Juni";
    }
    if ($new[1] == "07") {
        $month = "Juli";
    }
    if ($new[1] == "08") {
        $month = "Agustus";
    }
    if ($new[1] == "09") {
        $month = "September";
    }
    if ($new[1] == "10") {
        $month = "Oktober";
    }
    if ($new[1] == "11") {
        $month = "November";
    }
    if ($new[1] == "12") {
        $month = "Desember";
    }
    return $new[0] . " " . $month . " " . $new[2];
}

function currencyToNumber($a)
{
    $var = str_replace(".", "", $a);
    $real_var = str_replace(",", ".", $var);
    return $real_var;
}

function int_to_money($nominal)
{
    return number_format($nominal, 0, '', '.');
}

function get_umur($tgl_lahir)
{
    $tglawal = date('Y');  // Format: Tanggal/Bulan/Tahun -> 12 Desember 2010
    $year1 = explode('-', $tgl_lahir);
    $selisih = $tglawal - $year1[0];
    return $selisih;
}

function paging($jmldata, $dataPerPage, $tab = NULL)
{

    $showPage = NULL;
    ob_start();
    echo "
        <div class='body-page'>";
    if (!empty($_GET['page'])) {
        $noPage = $_GET['page'];
    } else {
        $noPage = 1;
    }

    $dataPerPage = $dataPerPage;
    $offset = ($noPage - 1) * $dataPerPage;


    $jumData = $jmldata;
    $jumPage = ceil($jumData / $dataPerPage);
    $get = $_GET;
    if ($jumData > $dataPerPage) {
        $onclick = null;
        if ($noPage > 1) {
            $get['page'] = ($noPage - 1);
            $onclick = "onClick=location.href='?" . generate_get_parameter($get) . "'";
        }
        echo "<span class='page-prev' $onclick>prev</span>";
        for ($page = 1; $page <= $jumPage; $page++) {
            if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
                if (($showPage == 1) && ($page != 2))
                    echo "...";
                if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                    echo "...";
                if ($page == $noPage)
                    echo " <span class='noblock'>" . $page . "</span> ";
                else {
                    $get['page'] = $page;

                    if ($tab != NULL) {
                        $get['tab'] = $tab;
                    }

                    echo " <a class='block' href='?" . generate_get_parameter($get) . "'>" . $page . "</a> ";
                }
                $showPage = $page;
            }
        }
        $onClick = null;
        if ($noPage < $jumPage) {
            $get['page'] = ($noPage + 1);
            $onClick = "onClick=location.href='?" . generate_get_parameter($get) . "'";
        }
        echo "<span class='page-next' $onClick>next</span>";
    }
    echo "</div>";

    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
}

function generate_get_parameter($get, $addArr = array(), $removeArr = array())
{
    if ($addArr == null)
        $addArr = array();
    foreach ($removeArr as $rm) {
        unset($get[$rm]);
    }
    $link = "";
    $get = array_merge($get, $addArr);
    foreach ($get as $key => $val) {
        if ($link == null) {
            $link .= "$key=$val";
        } else
            $link .= "&$key=$val";
    }
    return $link;
}

function form_type_button($value = null, $attr = null)
{
    $val = null;
    if ($value != '') {
        $val = $value;
    }
    $atrib = null;
    if ($attr != null) {
        $atrib = $attr;
    }

    return '<input type="button" value="' . $val . '" "' . $atrib . '" />';
}

function get_duration($date1, $date2)
{
    $date1 = new DateTime($date1);
    $date2 = new DateTime($date2);
    $durasi = $date1->diff($date2);
    return array('day' => $durasi->d, 'hour' => $durasi->h, 'minute' => $durasi->i);
}

function get_duration_indo($date1, $date2)
{
    $durasi = get_duration($date1, $date2);
    $hasil = $durasi["minute"] . " menit";
    if (0 < $durasi["hour"]) {
        $hasil = $durasi["hour"] . " jam " . $hasil;
    }
    if (0 < $durasi["day"]) {
        $hasil = $durasi["day"] . " hari " . $hasil;
    }
    return $hasil;
}

function get_last_id($table, $kolom)
{
    $CI = &get_instance();
    $sql = "select max($kolom)+1 as id from $table";
    $id = $CI->db->query($sql)->row();
    return isset($id->id) ? $id->id : '1';
}

function save_jurnal_debet($kode_rekening, $nama_transaksi, $debet, $id_transaksi = NULL, $keterangan = NULL, $id_rekening = NULL)
{
    $CI = &get_instance();
    if ($id_rekening !== NULL) {
        $id_rek = $id_rekening;
    } else {
        $get = $CI->db->query("select id from dc_rekening where kode = '$kode_rekening'")->row();
        $id_rek = isset($get->id) ? $get->id : NULL;
    }
    $data_jurnal = array(
        'id_transaksi' => ($id_transaksi !== NULL) ? $id_transaksi : NULL,
        'transaksi' => $nama_transaksi,
        'ket_transaksi' => ($keterangan !== NULL) ? $keterangan : '',
        'id_rekening' => $id_rek,
        'debet' => currencyToNumber($debet)
    );
    $CI->db->insert('dc_jurnal', $data_jurnal);
    if ($CI->db->trans_status() === FALSE) {
        $CI->db->trans_rollback();
    }
}

function save_jurnal_kredit($kode_rekening, $nama_transaksi, $kredit, $id_transaksi = NULL, $keterangan = NULL, $id_rekening = NULL)
{
    $CI = &get_instance();
    if ($id_rekening !== NULL) {
        $id_rek = $id_rekening;
    } else {
        $get = $CI->db->query("select id from dc_rekening where kode = '$kode_rekening'")->row();
        $id_rek = isset($get->id) ? $get->id : NULL;
    }
    $data_jurnal = array(
        'id_transaksi' => ($id_transaksi !== NULL) ? $id_transaksi : NULL,
        'transaksi' => $nama_transaksi,
        'ket_transaksi' => ($keterangan !== NULL) ? $keterangan : '',
        'id_rekening' => $id_rek,
        'kredit' => currencyToNumber($kredit)
    );
    $CI->db->insert('dc_jurnal', $data_jurnal);
    if ($CI->db->trans_status() === FALSE) {
        $CI->db->trans_rollback();
    }
}

function update_posted_status($table, $status)
{
    $CI = &get_instance();
    $CI->db->update($table, array('posted' => $status));
    if ($CI->db->trans_status() === FALSE) {
        $CI->db->trans_rollback();
    }
}

function get_last_no_rm()
{
    $CI = &get_instance();
    $sql = "select max(no_rm) as id from sm_pasien";
    $no = $CI->db->query($sql)->row();
    $number = $no->id + 1;
    $width = 6;
    $padded = str_pad((string) $number, $width, "0", STR_PAD_LEFT);
    return $padded;
}

function padded($nomor)
{
    $padded = str_pad((string) $nomor, 4, "0", STR_PAD_LEFT);
    return $padded;
}

function get_last_repackage_id($table, $kolom, $trans)
{
    $CI = &get_instance();
    $sql = "select max($kolom)+1 as id from $table where transaksi_jenis = '$trans'";
    $id = $CI->db->query($sql)->row();
    return isset($id->id) ? $id->id : '1';
}

function header_excel($namaFile)
{
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-type: application/vnd-ms-excel");

    // header untuk nama file
    header("Content-Disposition: attachment; filename=" . $namaFile . ".xls");
    header("Content-Transfer-Encoding: binary");
}

function header_word($namafile)
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=" . $namafile . ".doc");

    //    echo "<html>";
    //    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    //    echo "<body>";
    //    echo "<b>My first document</b>";
    //    echo "</body>";
    //    echo "</html>";

}

function pagination($jmldata, $dataPerPage, $klik, $tab = NULL, $search = NULL)
{
    /*
     * Parameter '$search' dalam bentuk string , bisa json string atau yang lain
     * contoh 1#nama_barang#nama_pabrik
     */

    $showPage = NULL;
    ob_start();
    echo '<ul class="pagination">';
    if (!empty($klik)) {
        $noPage = $klik;
    } else {
        $noPage = 1;
    }

    $dataPerPage = $dataPerPage;


    $jumData = $jmldata;
    $jumPage = ceil($jumData / $dataPerPage);
    $get = $_GET;
    if ($jumData > $dataPerPage) {
        $onclick = null;
        if ($noPage > 1) {
            $get['page'] = ($noPage - 1);
            $onclick = $klik;
        }
        $prev = null;
        $last = ' class="last-block" ';
        if ($klik > 1) {
            $prev = "onClick=\"pagination(" . ($klik - 1) . "," . $tab . ", '" . $search . "')\" ";
        }
        echo '<li><span ' . $prev . '>&laquo;</span></li>';
        for ($page = 1; $page <= $jumPage; $page++) {
            if ((($page >= $noPage - 1) && ($page <= $noPage + 1)) || ($page == 1) || ($page == $jumPage)) {
                if (($showPage == 1) && ($page != 2))
                    echo "<li>...</li>";
                if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                    echo "<li>...</li>";
                if ($page == $noPage)
                    echo " <li class='active'><span class='noblock'>" . $page . "</span></li> ";
                else {
                    $get['page'] = $page;
                    if ($tab != NULL) {
                        $get['tab'] = $tab;
                    }
                    $next = "onClick=\"pagination(" . $page . "," . $tab . ", '" . $search . "')\" ";
                    //echo " <a class='block' href='?" . generate_get_parameter($get) . "'>" . $page . "</a> ";
                    if ($page == $jumPage) {
                        echo '<li ' . $next . '><span class="block">' . $page . '</span></li>';
                    } else {
                        echo '<li ' . $next . '><span class="block">' . $page . '</span></li>';
                    }
                }
                $showPage = $page;
            }
        }
        $next = null;
        if ($klik < $jumPage) {
            $next = "onClick=\"pagination(" . ($klik + 1) . "," . $tab . ", '" . $search . "')\" ";
        }
        echo '<li><span ' . $next . '>&raquo;</span></li>';
    }
    echo "</ul>";

    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
}

function range_year_start_from_one_year_ago()
{
    $x = mktime(0, 0, 0, date("m"), date("d"), date("Y") - 1);
    return date("Y-m-d", $x);
}

function range_hours_between_two_dates($date_input, $date_trans)
{
    $val = explode(" ", $date_input);
    $date = explode("-", $val[0]);
    $time = explode(":", $val[1]);

    $vals = explode(" ", $date_trans);
    $dates = explode("-", $vals[0]);
    $times = explode(":", $vals[1]);

    $now = mktime($times[0], 0, 0, $dates[1], $dates[2], $dates[0]);
    $input = mktime($time[0], 0, 0, $date[1], $date[2], $date[0]);
    $selisih = ($now - $input) / 3600;
    return $selisih;
}

function tanggal_format($tgl)
{
    $data = explode("-", $tgl);
    return $data[2] . " " . tampil_bulan($tgl) . " " . $data[0];
}

function cek_karakter($teks)
{

    $kata_kotor = array("Persediaan");
    $hasil = 0;
    $jml_kata = count($kata_kotor);

    for ($i = 0; $i < $jml_kata; $i++) {
        if (stristr($teks, $kata_kotor[$i])) {
            $hasil = 1;
        }
    }
    return $hasil;
}

function createRange($startDate, $endDate)
{
    $tmpDate = new DateTime($startDate);
    $tmpEndDate = new DateTime($endDate);

    $outArray = array();
    do {
        $outArray[] = $tmpDate->format('Y-m-d');
    } while ($tmpDate->modify('+1 day') <= $tmpEndDate);

    return $outArray;
}

// function safe_get($parameter)
// {
//     $CI = &get_instance();
//     $string = htmlentities($CI->input->get($parameter, true), ENT_QUOTES, "UTF-8");
//     $quote = str_replace("'", "`", $string);
//     $hasil = str_replace(array("?", "\\"), "", $quote);
//     return $hasil;
// }

// function safe_post($parameter)
// {
//     $CI = &get_instance();
//     $string = htmlentities($CI->input->post($parameter, true), ENT_QUOTES, "UTF-8");
//     $quote = str_replace("'", "`", $string);
//     $hasil = str_replace(array("?", "\\"), "", $quote);
//     return $hasil;
// }

function safe_get($parameter)
{
    $CI = &get_instance();
    $string = $CI->input->get($parameter, true);
    $quote = str_replace("'", "`", $string);
    $hasil = str_replace(array("?", "\\"), "", $quote);
    return $hasil;
}
function safe_post($parameter)
{
    $CI = &get_instance();
    $string = $CI->input->post($parameter, true);
    $quote = str_replace("'", "`", $string);
    $hasil = str_replace(array("?", "\\"), "", $quote);
    return $hasil;
}
function safe_put($parameter)
{
    $CI = &get_instance();
    $string = $CI->input->put($parameter, true);
    $quote = str_replace("'", "`", $string);
    $hasil = str_replace(array("?", "\\"), "", $quote);
    return $hasil;
}
function safe_delete($parameter)
{
    $CI = &get_instance();
    $string = $CI->input->delete($parameter, true);
    $quote = str_replace("'", "`", $string);
    $hasil = str_replace(array("?", "\\"), "", $quote);
    return $hasil;
}

function clean_data($data)
{
    $CI = &get_instance();
    $hasil = $CI->security->xss_clean($data);
    return $hasil;
}

function birthByAge($umur)
{
    $today = date('Y-m-d');
    $exp = explode('-', $today);

    return ((int) $exp[0] - $umur) . '-' . $exp[1] . '-' . $exp[2];
}

// function terbilang($x)
// {
//     $abil = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
//     if ($x < 12)
//         return " " . $abil[$x];
//     elseif ($x < 20)
//         return Terbilang($x - 10) . " BELAS";
//     elseif ($x < 100)
//         return Terbilang($x / 10) . " PULUH" . Terbilang($x % 10);
//     elseif ($x < 200)
//         return " SERATUS" . Terbilang($x - 100);
//     elseif ($x < 1000)
//         return Terbilang($x / 100) . " RATUS" . Terbilang($x % 100);
//     elseif ($x < 2000)
//         return " SERIBU" . Terbilang($x - 1000);
//     elseif ($x < 1000000)
//         return Terbilang($x / 1000) . " RIBU" . Terbilang($x % 1000);
//     elseif ($x < 1000000000)
//         return Terbilang($x / 1000000) . " JUTA" . Terbilang($x % 1000000);
// }

function terbilang($number, $with_comma = false)
{
    $before_comma = trim(to_word($number));
    $after_comma = trim(comma($number));
    if ($with_comma) {
        $result = ucwords($result = $before_comma . " koma " . $after_comma);
    } else {
        $result = $before_comma;
    }
    return $result;
}

function to_word($number)
{
    $words = "";
    $arr_number = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    if ($number < 12) {
        $words = " " . $arr_number[$number];
    } else {
        if ($number < 20) {
            $words = to_word($number - 10) . " belas";
        } else {
            if ($number < 100) {
                $words = to_word($number / 10) . " puluh " . to_word($number % 10);
            } else {
                if ($number < 200) {
                    $words = "seratus " . to_word($number - 100);
                } else {
                    if ($number < 1000) {
                        $words = to_word($number / 100) . " ratus " . to_word($number % 100);
                    } else {
                        if ($number < 2000) {
                            $words = "seribu " . to_word($number - 1000);
                        } else {
                            if ($number < 1000000) {
                                $words = to_word($number / 1000) . " ribu " . to_word($number % 1000);
                            } else {
                                if ($number < 1000000000) {
                                    $words = to_word($number / 1000000) . " juta " . to_word($number % 1000000);
                                } else {
                                    if ($number < 1000000000000.0) {
                                        $words = to_word($number / 1000000000) . " milyar " . to_word($number % 1000000000);
                                    } else {
                                        $words = "undefined";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $words;
}
function comma($number)
{
    $after_comma = stristr($number, ".");
    $arr_number = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");
    $results = "";
    $length = strlen($after_comma);
    for ($i = 1; $i < $length; $i++) {
        $get = substr($after_comma, $i, 1);
        $results .= " " . $arr_number[$get];
    }
    return $results;
}

function titik_titik($loop)
{
    $titik = "";

    for ($i = 0; $i < $loop; $i++) {
        $titik .= ". ";
    }

    return $titik;
}

function ubah_kelipatan_tiga($jml)
{
    $row = floor($jml / 3);

    if ($jml % 3 > 0) {
        $row++;
    }
    return $row;
}

function time_since($original)
{
    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24, 'day'),
        array(60 * 60, 'hour'),
        array(60, 'minute'),
    );

    $today = time();
    $since = $today - $original;

    if ($since > 604800) {
        $print = date("M jS", $original);
        if ($since > 31536000) {
            $print .= ", " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' ago';
}

function shapeSpace_memory_usage()
{

    $mem_total = memory_get_usage(true);
    $mem_used  = memory_get_usage(false);

    $memory = array($mem_total, $mem_used);

    foreach ($memory as $key => $value) {

        if ($value < 1024) {

            $memory[$key] = $value . ' B';
        } elseif ($value < 1048576) {

            $memory[$key] = round($value / 1024, 2) . ' KB';
        } else {

            $memory[$key] = round($value / 1048576, 2) . ' MB';
        }
    }

    return $memory;
}

function shapeSpace_disk_usage()
{

    $disktotal = disk_total_space('/');
    $diskfree  = disk_free_space('/');
    $diskuse   = round(100 - (($diskfree / $disktotal) * 100)) . '%';

    return $diskuse;
}


function get_the_browser()
{
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
        return 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
        return 'Internet explorer';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
        return 'Mozilla Firefox';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
        return 'Google Chrome';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
        return "Opera Mini";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
        return "Opera";
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
        return "Safari";
    else
        return 'Other';
}

function formatcurrency($floatcurr, $curr = "IDR", $dec = false)
{
    $currencies["ARS"] = array(2, ",", ".");
    $currencies["AMD"] = array(2, ".", ",");
    $currencies["AWG"] = array(2, ".", ",");
    $currencies["AUD"] = array(2, ".", " ");
    $currencies["BSD"] = array(2, ".", ",");
    $currencies["BHD"] = array(3, ".", ",");
    $currencies["BDT"] = array(2, ".", ",");
    $currencies["BZD"] = array(2, ".", ",");
    $currencies["BMD"] = array(2, ".", ",");
    $currencies["BOB"] = array(2, ".", ",");
    $currencies["BAM"] = array(2, ".", ",");
    $currencies["BWP"] = array(2, ".", ",");
    $currencies["BRL"] = array(2, ",", ".");
    $currencies["BND"] = array(2, ".", ",");
    $currencies["CAD"] = array(2, ".", ",");
    $currencies["KYD"] = array(2, ".", ",");
    $currencies["CLP"] = array(0, "", ".");
    $currencies["CNY"] = array(2, ".", ",");
    $currencies["COP"] = array(2, ",", ".");
    $currencies["CRC"] = array(2, ",", ".");
    $currencies["HRK"] = array(2, ",", ".");
    $currencies["CUC"] = array(2, ".", ",");
    $currencies["CUP"] = array(2, ".", ",");
    $currencies["CYP"] = array(2, ".", ",");
    $currencies["CZK"] = array(2, ".", ",");
    $currencies["DKK"] = array(2, ",", ".");
    $currencies["DOP"] = array(2, ".", ",");
    $currencies["XCD"] = array(2, ".", ",");
    $currencies["EGP"] = array(2, ".", ",");
    $currencies["SVC"] = array(2, ".", ",");
    $currencies["ATS"] = array(2, ",", ".");
    $currencies["BEF"] = array(2, ",", ".");
    $currencies["DEM"] = array(2, ",", ".");
    $currencies["EEK"] = array(2, ",", ".");
    $currencies["ESP"] = array(2, ",", ".");
    $currencies["EUR"] = array(2, ",", ".");
    $currencies["FIM"] = array(2, ",", ".");
    $currencies["FRF"] = array(2, ",", ".");
    $currencies["GRD"] = array(2, ",", ".");
    $currencies["IEP"] = array(2, ",", ".");
    $currencies["ITL"] = array(2, ",", ".");
    $currencies["LUF"] = array(2, ",", ".");
    $currencies["NLG"] = array(2, ",", ".");
    $currencies["PTE"] = array(2, ",", ".");
    $currencies["GHC"] = array(2, ".", ",");
    $currencies["GIP"] = array(2, ".", ",");
    $currencies["GTQ"] = array(2, ".", ",");
    $currencies["HNL"] = array(2, ".", ",");
    $currencies["HKD"] = array(2, ".", ",");
    $currencies["HUF"] = array(0, "", ".");
    $currencies["ISK"] = array(0, "", ".");
    $currencies["INR"] = array(2, ".", ",");
    $currencies["IDR"] = array(2, ",", ".");
    $currencies["IRR"] = array(2, ".", ",");
    $currencies["JMD"] = array(2, ".", ",");
    $currencies["JPY"] = array(0, "", ",");
    $currencies["JOD"] = array(3, ".", ",");
    $currencies["KES"] = array(2, ".", ",");
    $currencies["KWD"] = array(3, ".", ",");
    $currencies["LVL"] = array(2, ".", ",");
    $currencies["LBP"] = array(0, "", " ");
    $currencies["LTL"] = array(2, ",", " ");
    $currencies["MKD"] = array(2, ".", ",");
    $currencies["MYR"] = array(2, ".", ",");
    $currencies["MTL"] = array(2, ".", ",");
    $currencies["MUR"] = array(0, "", ",");
    $currencies["MXN"] = array(2, ".", ",");
    $currencies["MZM"] = array(2, ",", ".");
    $currencies["NPR"] = array(2, ".", ",");
    $currencies["ANG"] = array(2, ".", ",");
    $currencies["ILS"] = array(2, ".", ",");
    $currencies["TRY"] = array(2, ".", ",");
    $currencies["NZD"] = array(2, ".", ",");
    $currencies["NOK"] = array(2, ",", ".");
    $currencies["PKR"] = array(2, ".", ",");
    $currencies["PEN"] = array(2, ".", ",");
    $currencies["UYU"] = array(2, ",", ".");
    $currencies["PHP"] = array(2, ".", ",");
    $currencies["PLN"] = array(2, ".", " ");
    $currencies["GBP"] = array(2, ".", ",");
    $currencies["OMR"] = array(3, ".", ",");
    $currencies["RON"] = array(2, ",", ".");
    $currencies["ROL"] = array(2, ",", ".");
    $currencies["RUB"] = array(2, ",", ".");
    $currencies["SAR"] = array(2, ".", ",");
    $currencies["SGD"] = array(2, ".", ",");
    $currencies["SKK"] = array(2, ",", " ");
    $currencies["SIT"] = array(2, ",", ".");
    $currencies["ZAR"] = array(2, ".", " ");
    $currencies["KRW"] = array(0, "", ",");
    $currencies["SZL"] = array(2, ".", ", ");
    $currencies["SEK"] = array(2, ",", ".");
    $currencies["CHF"] = array(2, ".", "'");
    $currencies["TZS"] = array(2, ".", ",");
    $currencies["THB"] = array(2, ".", ",");
    $currencies["TOP"] = array(2, ".", ",");
    $currencies["AED"] = array(2, ".", ",");
    $currencies["UAH"] = array(2, ",", " ");
    $currencies["USD"] = array(2, ".", ",");
    $currencies["VUV"] = array(0, "", ",");
    $currencies["VEF"] = array(2, ",", ".");
    $currencies["VEB"] = array(2, ",", ".");
    $currencies["VND"] = array(0, "", ".");
    $currencies["ZWD"] = array(2, ".", " ");
    if ($curr == "INR") {
        return formatinr($floatcurr);
    }
    if ($dec) {
        return number_format($floatcurr, $currencies[$curr][0], $currencies[$curr][1], $currencies[$curr][2]);
    }
    $result = number_format($floatcurr, $currencies[$curr][0], $currencies[$curr][1], $currencies[$curr][2]);
    return str_replace(",00", "", $result);
}
function formatinr($input)
{
    $dec = "";
    $pos = strpos($input, ".");
    if ($pos !== false) {
        $dec = substr(round(substr($input, $pos), 2), 1);
        $input = substr($input, 0, $pos);
    }
    $num = substr($input, -3);
    $input = substr($input, 0, -3);
    while (0 < strlen($input)) {
        $num = substr($input, -2) . "," . $num;
        $input = substr($input, 0, -2);
    }
    return $num . $dec;
}
function numberToCurrency($input)
{
    $nominal = explode(".", $input);
    if (fmod($input, 1) !== 0) {
        return formatcurrency($input);
    }
    return currency($nominal[0]);
}
function jumlah_hari($bulan = 0, $tahun = "")
{
    if ($bulan < 1 || 12 < $bulan) {
        return 0;
    }
    if (!is_numeric($tahun) || strlen($tahun) != 4) {
        $tahun = date("Y");
    }
    if ($bulan == 2 && ($tahun % 400 == 0 || $tahun % 4 == 0 && $tahun % 100 != 0)) {
        return 29;
    }
    $jumlah_hari = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    return $jumlah_hari[$bulan - 1];
}
function kode_bulan($bln)
{
    if ($bln === "01") {
        $nama = "A";
    }
    if ($bln === "02") {
        $nama = "B";
    }
    if ($bln === "03") {
        $nama = "C";
    }
    if ($bln === "04") {
        $nama = "D";
    }
    if ($bln === "05") {
        $nama = "E";
    }
    if ($bln === "06") {
        $nama = "F";
    }
    if ($bln === "07") {
        $nama = "G";
    }
    if ($bln === "08") {
        $nama = "H";
    }
    if ($bln === "09") {
        $nama = "I";
    }
    if ($bln === "10") {
        $nama = "J";
    }
    if ($bln === "11") {
        $nama = "K";
    }
    if ($bln === "12") {
        $nama = "L";
    }
    return $nama;
}
function round_250($angka)
{
    $a = $angka;
    $b = strlen($a);
    $result = $angka;
    if (2 < $b) {
        $value = substr($a, $b - 3, 3);
        if ($value < 250) {
            $init = substr($a, 0, $b - 3);
            $result = $init . "000";
        }
        if (250 < $value && $value < 500) {
            $init = substr($a, 0, $b - 3);
            $result = $init . "500";
        }
        if (500 < $value && $value < 750) {
            $init = substr($a, 0, $b - 3);
            $result = $init . "500";
        }
        if (750 < $value) {
            $init = substr($a, 0, $b - 3);
            $result = $init . "000" . 1000;
        }
    }
    return $result;
}
function maxchar($batas_karakter, $karakter, $eol = false)
{
    $jml_karakter = strlen($karakter);
    $selisih = $batas_karakter - $jml_karakter;
    if (0 < $selisih) {
        $space = array();
        for ($i = 1; $i <= $selisih; $i++) {
            $space[] = " ";
        }
        $output = $karakter . implode("", $space);
    }
    if ($selisih === 0) {
        $output = $karakter;
    }
    if ($selisih < 0) {
        $crop = substr($karakter, 0, $batas_karakter);
        $output = $crop;
    }
    $php_eol = NULL;
    if ($eol === true) {
        $php_eol = PHP_EOL;
    }
    return $output . $php_eol;
}
function the_day($date, $jml_pemberian, $awal_pemberian)
{
    if ($jml_pemberian === "1") {
        if ($awal_pemberian === "19:00" || $awal_pemberian === "22:00") {
            $tgl = explode("-", $date);
            $waktu = mktime(0, 0, 0, $tgl[1], $tgl[2], $tgl[0]);
        } else {
            $tgl = explode("-", $date);
            $waktu = mktime(0, 0, 0, $tgl[1], $tgl[2] + 1, $tgl[0]);
        }
    }
    if ($jml_pemberian === "2") {
        $tgl = explode("-", $date);
        $waktu = mktime(0, 0, 0, $tgl[1], $tgl[2], $tgl[0]);
    }
    if ($jml_pemberian === "3") {
    }
    return date("Y-m-d", $waktu);
}
function ocs_date($date)
{
    if ($date !== NULL) {
        $tgl = explode("-", $date);
        $year = substr($tgl[0], 2, 2);
        list(, $month, $day) = $tgl;
        return $year . $month . $day;
    }
}

function getCurl($url, $header = null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($header !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function postCurl($url, $data, $header = null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    if ($header !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function deleteCurl($url, $data = null, $header = null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Set timeout (misalnya 30 detik)
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    // Kirim body hanya jika $data tidak kosong
    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($header)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function customCurl($method, $url, $data, $header = null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    if ($header !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function multiprint($text, $n)
{
    for ($i = 1; $i < $n; $i++) {
        echo $text;
    }
}

function round2Two($number)
{
    $padded = sprintf('%0.2f', $number);
    return $padded;
}

function datediff($date1, $date2)
{
    // parameter : date of string
    $y1 = date('Y', strtotime($date1));
    $m1 = date('m', strtotime($date1));
    $d1 = date('d', strtotime($date1));

    $y2 = date('Y', strtotime($date2));
    $m2 = date('m', strtotime($date2));
    $d2 = date('d', strtotime($date2));

    if ($d1 < $d2) {
        $m1--;
        $d1 += cal_days_in_month(CAL_GREGORIAN, $m2, $y2);
    }
    if ($m1 < $m2) {
        $y1--;
        $m1 += 12;
    }
    return array($y1 - $y2, $m1 - $m2, $d1 - $d2);
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function generate_qrcode($isi_code)
{
    $CI = &get_instance();
    $CI->load->library('Ciqrcode');
    QRcode::png($isi_code, $outfile = false, $level = QR_ECLEVEL_H, $size = 4);
}

function generate_barcode($code)
{
    $CI = &get_instance();
    //load library
    $CI->load->library('Zend');
    //load in folder Zend
    $CI->zend->load('Zend/Barcode');
    //generate barcode
    Zend_Barcode::render('code128', 'image', array('text' => $code), array());
}

function time_reformat($val = "", $from_format = "", $to_format = "", $locale = NULL)
{
    $hasil = NULL;
    if (!empty($val) && !empty($from_format) && !empty($to_format)) {
        $date = DateTime::createFromFormat($from_format, $val);
        if (!empty($locale)) {
            $iso = $date->format("c");
            setlocale(LC_ALL, $locale);
            $hasil = strftime($to_format, strtotime($iso));
        } else {
            $hasil = $date->format($to_format);
        }
    }
    return $hasil;
}
function time_format($val = "", $format = "")
{
    $hasil = NULL;
    if (!empty($val) && !empty($format)) {
        $ci = get_instance();
        $ci->load->config("config");
        $date = new DateTime($val);
        $tz = new DateTimeZone($ci->config->item("date_time_zone"));
        $date->setTimezone($tz);
        $hasil = $date->format($format);
    }
    return $hasil;
}
function bulan()
{
    $hasil["01"] = array("label" => "Januari");
    $hasil["02"] = array("label" => "Februari");
    $hasil["03"] = array("label" => "Maret");
    $hasil["04"] = array("label" => "April");
    $hasil["05"] = array("label" => "Mei");
    $hasil["06"] = array("label" => "Juni");
    $hasil["07"] = array("label" => "Juli");
    $hasil["08"] = array("label" => "Agustus");
    $hasil["09"] = array("label" => "September");
    $hasil[10] = array("label" => "Oktober");
    $hasil[11] = array("label" => "November");
    $hasil[12] = array("label" => "Desember");
    return $hasil;
}

function digitalSignature($id = '', $width = 100)
{
    return '<img src="' . base_url("resources/images/esign/200x200px.png") . '" alt="Digital Signature" id="' . $id . '" width="' . $width . '" class="mx-auto">';
    // return '<img src="' . base_url("resources/images/esign/200x200px.png") . '" alt="Digital Signature" id="' . $id . '" width="' . $width . '" class="mx-auto" style="display:none">';
}

function getShiftNow()
{
    $jam7 = strtotime("07:00:00");
    $jam15 = strtotime("15:00:00");
    $jam21 = strtotime("21:00:00");
    $jam6 = strtotime("06:00:00");
    $now = time();

    $shift = '1';
    if (($now >= $jam7) & ($now < $jam15)) :
        $shift = '1';
    elseif (($now >= $jam15) & ($now < $jam21)) :
        $shift = '2';
    elseif (($now >= $jam21) & ($now < $jam6)) :
        $shift = '3';
        var_dump('OK');
        die;
    endif;

    return $shift;
}

function appLock()
{
    // $serial = trim(shell_exec("cat /usr/share/hub/product_serial"));
    // $uuid = shell_exec("cat /usr/share/hub/product_uuid");
    // $key = "viavall3n";
    // $lock = hash("sha256", $serial . "-" . $uuid . "-" . $key);
    // $filelock_addr = "/etc/hub.conf";
    // $filelock = "";
    // if (file_exists($filelock_addr)) {
    //     $filelock = trim(file_get_contents($filelock_addr));
    // }
    // $locked = false;
    // if ($filelock !== $lock) {
    //     $locked = true;
    // }
    // return $locked;
}

function convertDateIndo($date)
{
    $date = new DateTime($date);

    $daysInIndonesian = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    $monthsInIndonesian = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    );

    $dayName = $daysInIndonesian[$date->format('l')];
    $monthName = $monthsInIndonesian[$date->format('F')];

    return $dayName . ', ' . $date->format('d') . ' ' . $monthName . ' ' . $date->format('Y');
}
