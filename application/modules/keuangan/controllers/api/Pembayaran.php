<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Pembayaran extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Pembayaran_model', 'm_pembayaran');
        $this->load->model('Keuangan_ver2_model', 'm_keuangan_ver2');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function simpan_pembayaran_kasir_post()
    {
        $unit_kasir = $this->session->userdata('unit_kasir');

        $totalPiutangSebelumnya = $this->total_piutang(safe_post('id_pendaftaran'));
        $total_tagihan = $this->m_keuangan_ver2->hitungTagihan(safe_post('id_pendaftaran'));
        
        if ($unit_kasir !== '') :
            $this->db->trans_begin();
            if (safe_post('id_pendaftaran') === '') :
                $this->response(['status' => false], REST_Controller::HTTP_OK);
            endif;

            $metode_pembayaran = safe_post('metode_pembayaran');
            $no_transaksi_metode = safe_post('no_transaksi_metode');

            $serah = safe_post('serah') !== '' ? currencyToNumber(safe_post('serah')) : 0;
            $bayar = safe_post('nominal') !== '' ? currencyToNumber(safe_post('nominal')) : 0;
            $bayar_piutang = safe_post('serah') !== '' ? currencyToNumber(safe_post('serah')) - safe_post('kembalian') : 0;
            $pembulatan = safe_post('pembulatan') !== '' ? currencyToNumber(safe_post('pembulatan')) : 0;
            $reimburse = safe_post('reimburse') !== '' ? currencyToNumber(safe_post('reimburse')) : 0;
            $jumlah_bayar = safe_post('bayar') !== '' ? currencyToNumber(safe_post('bayar')) : 0;
            $nominal = 0;
            if (isset($_POST['pakai_deposit'])) :
                if ($_POST['pakai_deposit'] === '1') :
                    $bayar_deposit = safe_post('bayar_deposit') !== '' ? currencyToNumber(safe_post('bayar_deposit')) : 0;
                    $nominal = (int) $bayar;
                    $serah = (int) $serah + (int) $bayar_deposit;
                    $data_deposit = array(
                        'waktu' => $this->datetime,
                        'id_pasien' => safe_post('id_pasien'),
                        'id_users' => $this->user,
                        'keterangan' => 'Pembayaran ' . safe_post('transaksi'),
                        'keluar' => $bayar_deposit,
                        'masuk' => 0,
                    );
                    $this->load->model('deposit/Deposit_model', 'm_deposit');
                    $this->m_deposit->simpanDataDeposit($data_deposit, 'ambil');
                endif;
            else :
                $nominal = $bayar;
            endif;

            $is_piutang = safe_post('is_piutang');
            $jenis_transaksi = safe_post('transaksi');
            if ($is_piutang == 'TRUE') {
                $nominal = $bayar_piutang;
                $jenis_transaksi = "Piutang Pasien";

                $totalPiutangNow = $totalPiutangSebelumnya + (currencyToNumber(safe_post('serah')) - safe_post('kembalian'));
                if ($total_tagihan == $totalPiutangNow) {
                    $jenis_transaksi = "Layanan Pasien";
                    
                    $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'))->update('sm_history_pembayaran', ['jenis_transaksi' => $jenis_transaksi]);
                }

                if (isset($_POST['pakai_deposit'])) :
                    if ($_POST['pakai_deposit'] === '1') {
                        $bayar_deposit = safe_post('bayar_deposit') !== '' ? currencyToNumber(safe_post('bayar_deposit')) : 0;
                        $nominal = (int) $bayar_piutang  + (int) $bayar_deposit;
                        $bayar_piutang = (int) $bayar_piutang  + (int) $bayar_deposit;
                    }
                endif;
            }

            if ($bayar !== '') :
                $no_kwitansi = $this->m_pembayaran->generateNoKwitansiPembayaran($unit_kasir);
                
                $waktu_perbaikan = safe_post('waktu_perbaikan');

                if (!empty($waktu_perbaikan)) {
                    $tanggal_formatted = date('Y-m-d', strtotime(str_replace('/', '-', $waktu_perbaikan)));
                    $waktu_sekarang = date('H:i:s');

                    $waktu_perbaikan = $tanggal_formatted . ' ' . $waktu_sekarang;
                } else {
                    $waktu_perbaikan = null;
                }
                $data = array(
                    'id_unit_kasir' => $unit_kasir,
                    'no_kwitansi' => $no_kwitansi,
                    'id_pendaftaran' => safe_post('id_pendaftaran'),
                    'jenis_transaksi' => $jenis_transaksi,
                    'waktu' => $this->datetime,
                    'id_users' => $this->session->userdata('id_translucent'),
                    'shift' => getShiftNow(),
                    'tunai' => $nominal,
                    'non_tunai' => $reimburse,
                    'serah' => $serah,
                    'pembulatan' => $pembulatan,
                    'pembayaran' => 1,
                    'status' => 'Konfirm',
                    'id_metode_pembayaran' => $metode_pembayaran,
                    'no_transaksi_metode' => $no_transaksi_metode,
                    'jumlah_bayar' => $bayar_piutang,
                    'is_perbaikan_waktu' => isset($_POST['perbaikan_waktu']) ? safe_post('perbaikan_waktu') : null,
                    'waktu_perbaikan' => $waktu_perbaikan,
                );

                $jml = $this->db->where("no_kwitansi", $data["no_kwitansi"], true)->get("sm_history_pembayaran")->result();
                while (1 < count((array)$jml)) {
                    $data['no_kwitansi'] = $this->m_pembayaran->generateNoKwitansiPembayaran($unit_kasir);
                    $jml = $this->db->where("no_kwitansi", $data["no_kwitansi"], true)->get("sm_history_pembayaran")->result();
                }

                if (safe_post('is_piutang') == 'TRUE') {
                    $id_pendaftaran = safe_post('id_pendaftaran');
                    $id_pasien = $this->db->from('sm_pendaftaran')->where('id', $id_pendaftaran)->get()->row()->id_pasien;

                    $getPembayaran = $this->m_keuangan_ver2->getTotalPembayaran($id_pendaftaran);
                    $cekPiutang = $this->m_pembayaran->cekPembayaranPiutang($id_pendaftaran);
                    $pembayaran_terakhir = $cekPiutang->pembayaran_ke ?? 0;

                    $jumlah_hasil = $getPembayaran['total'] - ($cekPiutang->total + $nominal);

                    if ($jumlah_hasil <= 0) {
                        $pembayaran_ke = "Pelunasan";
                    } else {
                        $pembayaran_ke = ($pembayaran_terakhir + 1);
                    }

                    $data_piutang = [
                        'id_pendaftaran'    => $id_pendaftaran,
                        'id_pasien'         => $id_pasien,
                        'total_bayar'       => $nominal,
                        'id_user'           => $this->session->userdata('id_translucent'),
                        'tanggal_bayar'     => $this->datetime,
                        'pembayaran_ke'     => $pembayaran_ke
                    ];

                    $response = $this->m_pembayaran->simpanPembayaranKasirPiutang($data, $data_piutang);
                    // if ($response['status']) {

                    // }
                } else {
                    $response = $this->m_pembayaran->simpanPembayaranKasir($data);
                }
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $response['status'] = false;
                $response['message'] = "Gagal melakukan pembayaran";
            endif;
        else :
            $status = false;
            $message = "Gagal melakukan pembayaran, silahkan setting loket terlebih dahulu!";
            $response = array('status' => $status, 'message' => $message);
        endif;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function batal_pembayaran_post()
    {
        $id = safe_post('id');
        if ($id === '') :
            $this->response(['status' => false, 'message' => 'Parameter tidak lengkap'], REST_Controller::HTTP_OK);
        endif;
        $data = $this->m_pembayaran->batalPembayaran($id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_pembayaran_non_resep_post()
    {
        $data = $this->m_pembayaran->simpanPembayaranNonResep();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function batal_pembayaran_non_resep_post()
    {
        $id = safe_post('id');
        if ($id === '') :
            $this->response(['status' => false, 'message' => 'Parameter tidak lengkap'], REST_Controller::HTTP_OK);
        endif;
        $data = $this->m_pembayaran->batalPembayaranNonResep($id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function total_piutang($id_pendaftaran)
    {
        $this->db->select_sum('jumlah_bayar', 'total');
        $this->db->from('sm_history_pembayaran');
        $this->db->where("to_char(waktu, 'yyyy-mm-dd') =", date('Y-m-d'));
        // $this->db->where("to_char(waktu, 'yyyy-mm-dd') =", "2024-10-10");
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $query = $this->db->get();

        $result = $query->row();
        $total = $result ? (float)$result->total : 0;

        return $total;
    }
}
