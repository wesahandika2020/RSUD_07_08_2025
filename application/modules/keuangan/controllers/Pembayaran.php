<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Pembayaran_model', 'm_pembayaran');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ve2');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep');
        $this->load->model('pasien/Pasien_model', 'm_pasien');
        $this->load->model('pembayaran_lain/Pembayaran_lain_model', 'm_pembayaran_lain');
        $this->load->model('pembayaran_selisih_billing/Pembayaran_selisih_billing_model', 'm_selisih_billing');
    }

    function index()
    {
        $data['active'] = 'Keuangan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function printing_nota_pembayaran_all($JSON = NULL)
    {
        $id_history_pembayaran = $this->input->get('id_history_pembayaran', true);

        if ($id_history_pembayaran !== NULL | $id_history_pembayaran !== '') :
            $data['title'] = 'Nota Pembayaran';
            $data['hospital'] = $this->m_default->getDataHospital();
            $data['history_pembayaran'] = $this->m_keuangan->getHistoryPembayaranAll($id_history_pembayaran);
            if ($data['history_pembayaran'] === 0) :
                exit;
            endif;
            $data_history_pembayaran = $data['history_pembayaran'];
            $data['jenis_kwitansi'] = $data_history_pembayaran->jenis_transaksi;
            $just_poli = 'inap';
            if ($data['jenis_kwitansi'] === 'Poliklinik') :
                $just_poli = 'poli';
            endif;
            $data['pendaftaran'] =  $this->m_pendaftaran->getPendaftaranDetail($data_history_pembayaran->id_pendaftaran, NULL, $just_poli);
            $layanan = $data['pendaftaran']['layanan'];
            $data['pendaftaran']['layanan'] = $data['pendaftaran']['layanan'];
            $data['petugas_kasir'] = $this->session->userdata('nama');
            $data['jabatan'] = $this->session->userdata('account_group');
            if (isset($_GET['tanggal']) && $this->input->get('tanggal', true) !== '') :
                $data['waktu'] = indo_time($this->input->get('tanggal', true) . ' ' . date('H:i:s'));
            else :
                $data['waktu'] = indo_time($data_history_pembayaran->waktu, true);
            endif;
            $data['no_reg'] = NULL;
            $data['action'] = 'Rawat Inap';
            $data['no_reg'] = $data_history_pembayaran->id_pendaftaran;
            $data['billing_layanan'][] = (object) array();
            $data['waktu_cetak'] = $this->waktu_cetak;
            $total = 0;
            $sub_total = 0;
            $admin_ranap = 0;
            $admin_icare = 0;

            if ($data['jenis_kwitansi'] == 'Piutang Pasien') {
                $id_history_pembayaran = NULL;
            }
            if ($data['jenis_kwitansi'] == 'Layanan Pasien') {
                $id_history_pembayaran = NULL;
            }

            foreach ($layanan as $i => $row) :
                $billing_layanan = (object) array('id_layanan_pendaftaran' => $row->id, 'jenis_layanan' => $row->jenis_layanan, 'cara_bayar' => $row->cara_bayar, 'penjamin' => $row->penjamin, 'billing' => array());
                $sub_total = $this->m_keuangan_ver2->hitungTotalKamar($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Akomodasi_Kamar'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalKamarIcare($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Akomodasi_Kamar'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                // $sub_total = $this->m_keuangan_ver2->hitungTotalAdministrasiRanap($row->id, $id_history_pembayaran);
                // if (0 < $sub_total['total']) :
                //     $billing_layanan->billing['Administrasi_Rawat_Inap'] = $sub_total['total'];
                //     $total += $sub_total['total'];
                // endif;
                // $sub_total = $this->m_keuangan_ver2->hitungTotalAdministrasiIcare($row->id, $id_history_pembayaran);
                // if (0 < $sub_total['total']) :
                //     $billing_layanan->billing['Administrasi_Intensive_Care'] = $sub_total['total'];
                //     $total += $sub_total['total'];
                // endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalTindakan($row->id, "Ya", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Pendaftaran'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalTindakan($row->id, "Tidak", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Tindakan'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalOperasi($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Operasi'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalPenunjang($row->id, "sm_laboratorium", "sm_detail_laboratorium", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Laboratorium'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalPenunjang($row->id, "sm_radiologi", "sm_detail_radiologi", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Radiologi'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalPenunjang($row->id, "sm_fisioterapi", "sm_detail_fisioterapi", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Rehabilitasi_Medik'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalHemodialisa($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Hemodialisa'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalBarang($row->id, "Resep", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Resep'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalBarang($row->id, "BHP", $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['BHP'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalPKRT($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['PKRT'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalBarangOperasi($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['BHP_Operasi'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                // if (0 < $admin_ranap) :

                // endif;
                // if (0 < $admin_icare) :

                // endif;
                $sub_total = $this->m_keuangan_ver2->hitungTotalBankDarah($row->id, $id_history_pembayaran);
                if (0 < $sub_total['total']) :
                    $billing_layanan->billing['Bank_Darah'] = $sub_total['total'];
                    $total += $sub_total['total'];
                endif;
                // $sub_total = $this->m_keuangan_ver2->hitungTotalBarangBankDarah($row->id, $id_history_pembayaran);
                // if (0 < $sub_total['total']) :
                //     $billing_layanan->billing['Barang_Bank_Darah'] = $sub_total['total'];
                //     $total += $sub_total['total'];
                // endif;
                $data['billing_layanan'][$i] = $billing_layanan;
            endforeach;
            $data['deposit'] = $this->db->where(['id_history_pembayaran' => $id_history_pembayaran])->get('sm_deposit')->row();
            $data["piutang_dibayar"] = $this->m_keuangan_ver2->hitungPiutangDibayarkan($data_history_pembayaran->id_pendaftaran);
            // if ($_SESSION['account'] == 'faizmsyam') :
            //     var_dump($data); die;
            // endif;
            if ($JSON === 'JSON') :
                exit(json_encode($data));
            endif;
            if ($data['history_pembayaran']->jenis_transaksi === 'Poliklinik') :
                $this->sep_all($data, $data['pendaftaran']['layanan'][0]->no_sep);
            else :
                $this->load->view('keuangan/printing/cetak_nota_pembayaran_all', $data);
            endif;
        endif;
    }

    function printing_nota_pembayaran($JSON = NULL)
    {
        $id_history_pembayaran = $this->input->get('id_history_pembayaran', true);
        if ($id_history_pembayaran !== NULL | $id_history_pembayaran !== '') :
            $data['title'] = 'Nota Pembayaran';
            $data['hospital'] = $this->m_default->getDataHospital();
            $data['history_pembayaran'] = $this->m_keuangan->getHistoryPembayaran($id_history_pembayaran);
            if ($data['history_pembayaran'] === 0) :
                exit;
            endif;
            $data_history_pembayaran = $data['history_pembayaran'];
            $data['terbayar'] = $this->m_pembayaran->getTotalPembayaran($data_history_pembayaran->id_pembayaran, $id_history_pembayaran);
            $data['jenis_kwitansi'] = $data_history_pembayaran->jenis_transaksi;
            $data['pendaftaran'] =  $this->m_pendaftaran->getPendaftaranDetail($data_history_pembayaran->id_pendaftaran, $data_history_pembayaran->id_layanan_pendaftaran);
            $data['petugas_kasir'] = $this->session->userdata('nama');
            $data['jabatan'] = $this->session->userdata('account_group');
            if (isset($_GET['tanggal']) && $this->input->get('tanggal', true) !== '') :
                $data['waktu'] = indo_time($this->input->get('tanggal', true) . ' ' . date('H:i:s'));
            else :
                $data['waktu'] = indo_time($data_history_pembayaran->waktu, true);
            endif;
            $data['no_reg'] = NULL;
            $data['action'] = '';
            $data['waktu_cetak'] = $this->waktu_cetak;
            if ($data['jenis_kwitansi'] === 'Lain - Lain') :
                // $layanan = (object) ['Lain - Lain' => $this->m_pembayaran_lain->getDataPembayaranLainHistory($data_history_pembayaran->id_layanan_pendaftaran)];
                $data['pembayaran_lain'] = $this->m_pembayaran_lain->getDataPembayaranLainHistory($id_history_pembayaran);
                $data['no_reg'] = $data_history_pembayaran->id_layanan_pendaftaran;
                $data['action'] = 'Tindakan';

                return $this->load->view('keuangan/printing/cetak_nota_pembayaran_lain', $data);
            endif;
            if ($data['jenis_kwitansi'] === 'Selisih Billing') :
                // $layanan = (object) ['Lain - Lain' => $this->m_pembayaran_lain->getDataPembayaranLainHistory($data_history_pembayaran->id_layanan_pendaftaran)];
                $data['pembayaran_selisih_billing'] = $this->m_selisih_billing->getDataPembayaranSelisihBilling($id_history_pembayaran);
                $data['no_reg'] = $data_history_pembayaran->id_layanan_pendaftaran;
                $data['action'] = 'Tindakan';

                return $this->load->view('keuangan/printing/cetak_nota_pembayaran_selisih_billing', $data);
            endif;
            if ($data['jenis_kwitansi'] === 'Tindakan') :
                $layanan = (object) ['Tindakan' => $this->m_pembayaran->tagihanTindakan($data_history_pembayaran->id_layanan_pendaftaran, NULL, NULL, $id_history_pembayaran), 'BHP' => $this->m_keuangan_ver2->tagihanBarang($id_history_pembayaran, 'penjualan')];
                $data['no_reg'] = $data_history_pembayaran->id_layanan_pendaftaran;
                $data['action'] = 'Tindakan';
            endif;
            if ($data['jenis_kwitansi'] === 'Pendaftaran') :
                $layanan = (object) ['Rawat Jalan' => $this->m_pembayaran->tagihanTindakan($data_history_pembayaran->id_layanan_pendaftaran, NULL, 'Pendaftaran', $id_history_pembayaran)];
                $data['no_reg'] = $data_history_pembayaran->id_pendaftaran;
                $data['action'] = 'Rawat Jalan';
            else :
                if ($data['jenis_kwitansi'] === 'Laboratorium') :
                    $layanan = (object) ['Laboratorium' => $this->m_keuangan_ver2->tagihanPemeriksaanLaboratorium($id_history_pembayaran)];
                    $data['no_reg'] = $data_history_pembayaran->id_laboratorium;
                    $data['action'] = 'Pemeriksaan';
                else :
                    if ($data['jenis_kwitansi'] === 'Radiologi') :
                        $layanan = (object) ['Radiologi' => $this->m_keuangan_ver2->tagihanPemeriksaanRadiologi($id_history_pembayaran)];
                        $data['no_reg'] = $data_history_pembayaran->id_radiologi;
                        $data['action'] = 'Pemeriksaan';
                    else :
                        if ($data['jenis_kwitansi'] === 'Fisioterapi') :
                            $layanan = (object) ['Fisioterapi' => $this->m_keuangan_ver2->tagihanPemeriksaanFisioterapi($id_history_pembayaran)];
                            $data['no_reg'] = $data_history_pembayaran->id_fisioterapi;
                            $data['action'] = 'Pemeriksaan';
                        else :
                            if ($data['jenis_kwitansi'] === 'Barang') :
                                $layanan = (object) ['Barang' => $this->m_keuangan_ver2->tagihanBarang($id_history_pembayaran, 'penjualan')];
                                $data['no_reg'] = $data_history_pembayaran->id_penjualan;
                                $data['action'] = 'Barang';
                            else :
                                if ($data['jenis_kwitansi'] === 'BHP') :
                                    $layanan = (object) ['BHP' => $this->m_keuangan_ver2->tagihanBarang($id_history_pembayaran, 'penjualan')];
                                    $data['no_reg'] = $data_history_pembayaran->id_penjualan;
                                    $data['action'] = 'BHP';
                                else :
                                    if ($data['jenis_kwitansi'] === 'PKRT') :
                                        $layanan = (object) ['PKRT' => $this->m_keuangan_ver2->tagihanPKRT($id_history_pembayaran)];
                                        $data['no_reg'] = $data_history_pembayaran->id_penjualan;
                                        $data['action'] = 'PKRT';
                                    else :
                                        // Belum Selesai
                                        if ($data['jenis_kwitansi'] === 'Operasi') :
                                            $layanan = (object) ['Operasi' => $this->m_keuangan_ver2->tagihanOperasi($data_history_pembayaran->id_layanan_pendaftaran)];
                                            $data['no_reg'] = $data_history_pembayaran->id_operasi;
                                            $data['action'] = 'Operasi';
                                        endif;
                                        // Pemulasaran Jenazah
                                        if ($data['jenis_kwitansi'] === 'Pemulasaran Jenazah') :
                                            $layanan = (object) ['Pemulasaran Jenazah' => $this->m_pembayaran->tagihanTindakan($data_history_pembayaran->id_layanan_pendaftaran, NULL, NULL, $id_history_pembayaran), 'BHP' => $this->m_keuangan_ver2->tagihanBarang($id_history_pembayaran, 'penjualan')];
                                            $data['no_reg'] = $data_history_pembayaran->id_layanan_pendaftaran;
                                            $data['action'] = 'Pemulasaran Jenazah';
                                        else :
                                            if ($data['jenis_kwitansi'] === 'Bank Darah') :
                                                $layanan = (object) ['Bank Darah' => $this->m_keuangan_ver2->tagihanBankDarah($data_history_pembayaran->id_layanan_pendaftaran), 'Barang Bank Darah' => $this->m_keuangan_ver2->tagihanBarangBankDarah($id_history_pembayaran, 'penjualan')];
                                                $data['no_reg'] = $data_history_pembayaran->id;
                                                $data['action'] = 'Bank Darah';
                                            endif;
                                        endif;
                                    endif;
                                // Hemodialisa
                                endif;
                            endif;
                        endif;
                    endif;
                endif;
            endif;
            $data['pembayaran'] = array($layanan);
            if ($JSON === 'JSON') :
                exit(json_encode($data));
            endif;
            if ($data['history_pembayaran']->jenis_transaksi === 'Pendaftaran' & $data['pendaftaran']['layanan']->no_sep !== NULL) :
                $this->sep($data, $data['pendaftaran']['layanan']->no_sep);
            else :
                if ($data['history_pembayaran']->jenis_transaksi === 'Tindakan' & $data['pendaftaran']['layanan']->jenis_layanan === 'Rehabilitasi Medik' & $data['pendaftaran']['layanan']->no_sep !== NULL) :
                    $this->sep($data, $data['pendaftaran']['layanan']->no_sep);
                else :
                    $this->load->view('keuangan/printing/cetak_nota_pembayaran', $data);
                endif;
            endif;
        endif;
    }

    function sep($param, $no_sep)
    {
        $bpjs_config = $this->m_default->getConfigBPJSV2();
        $data = $param;
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['title']    = 'Nota SEP';
        $output           = null;
        $result           = null;
        $data['no_rm']    = '';

        // Cek history SEP
        $sep_history = $this->db->get_where('sm_history_sep', array('no_sep' => $no_sep))->row();
        $data['sep_history'] = $sep_history;
        if ((count((array) $sep_history) > 0) && ($sep_history->no_rm !== null)) :
            // Jika SEP sudah tersimpan
            $data['no_rm'] = $sep_history->no_rm;
        endif;

        $url    = $bpjs_config->server . "/SEP/";
        $header = $this->m_sep->createHeader($bpjs_config);
        $output = getCurl($url . $no_sep, $header);
        $result = json_decode($output);

        if ($output !== '') :
            if (($result !== null) && ($result->metaData->code === '200')) :
                $data['sep'] = $result->response;
                $data['pasien'] = $this->m_pasien->getDataPasienById(str_pad($result->response->peserta->noMr, 8, "0", STR_PAD_LEFT));
                $this->load->view('keuangan/printing/cetak_nota_pendaftaran_sep', $data);
            else :
                $this->load->view('keuangan/printing/cetak_nota_pembayaran', $data);
            endif;
        else :
            echo "timeout";
        endif;
    }

    function sep_all($param, $no_sep)
    {
        $bpjs_config = $this->m_default->getConfigBPJSV2();
        $data = $param;
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['title']    = 'Nota SEP';
        $output           = null;
        $result           = null;
        $data['no_rm']    = '';

        // Cek history SEP
        $sep_history = $this->db->get_where('sm_history_sep', array('no_sep' => $no_sep))->row();
        $data['sep_history'] = $sep_history;
        if ((count((array) $sep_history) > 0) && ($sep_history->no_rm !== null)) :
            // Jika SEP sudah tersimpan
            $data['no_rm'] = $sep_history->no_rm;
        endif;

        $url    = $bpjs_config->server . "/SEP/";
        $header = $this->m_sep->createHeader($bpjs_config);
        $output = getCurl($url . $no_sep, $header);
        $result = json_decode($output);

        if ($output !== '') :
            if (($result !== null) && ($result->metaData->code === '200')) :
                $data['sep'] = $result->response;
                $this->load->view('keuangan/printing/cetak_nota_poliklinik_sep', $data);
            else :
                $this->load->view('keuangan/printing/cetak_nota_pembayaran_all', $data);
            endif;
        else :
            echo "timeout";
        endif;
    }

    function printing_kwitansi_pembayaran()
    {
        $id_history_pembayaran = $this->input->get('id_history_pembayaran', true);
        if ($id_history_pembayaran !== NULL | $id_history_pembayaran !== '') :
            $data['title'] = 'Kwitansi Pembayaran';
            $data['hospital'] = $this->m_default->getDataHospital();
            $history_pembayaran = $this->db->where('id', $id_history_pembayaran, true)->get('sm_history_pembayaran')->row();
            if ($history_pembayaran->jenis_transaksi === 'Rawat Inap' | $history_pembayaran->jenis_transaksi === 'IGD' | $history_pembayaran->jenis_transaksi === 'Piutang Pasien' | $history_pembayaran->jenis_transaksi === 'Layanan Pasien' ) :

                $data['history_pembayaran'] = $this->m_keuangan->getHistoryPembayaranAll($id_history_pembayaran);
            else :
                $data['history_pembayaran'] = $this->m_keuangan->getHistoryPembayaran($id_history_pembayaran);
            endif;
            if (count((array)$data['history_pembayaran']) === 0) :
                exit;
            endif;
            $data_history_pembayaran = $data['history_pembayaran'];
            $data['terbayar'] = $this->m_pembayaran->getTotalPembayaran($data_history_pembayaran->id_pembayaran, $id_history_pembayaran);
            $data['jenis_kwitansi'] = $data_history_pembayaran->jenis_transaksi;
            $data['pendaftaran'] =  $this->m_pendaftaran->getPendaftaranDetail($data_history_pembayaran->id_pendaftaran, $data_history_pembayaran->id_layanan_pendaftaran);
            $data['petugas_kasir'] = $this->session->userdata('nama');
            $data['jabatan'] = $this->session->userdata('account_group');
            if (isset($_GET['tanggal']) && $this->input->get('tanggal', true) !== '') :
                $data['waktu'] = indo_time($this->input->get('tanggal', true) . ' ' . date('H:i:s'));
            else :
                $data['waktu'] = indo_time($data_history_pembayaran->waktu, true);
            endif;
            $data['no_reg'] = NULL;
            $data['action'] = '';
            if ($data['jenis_kwitansi'] === "Tindakan") :
                $data['action'] = "Tindakan";
            else :
                if ($history_pembayaran->jenis_transaksi === "Laboratorium") :
                    $data['action'] = "Pemeriksaan";
                else :
                    if ($data['jenis_kwitansi'] === "Radiologi") :
                        $data['no_reg'] = $history_pembayaran->id_radiologi;
                        $data['action'] = "Pemeriksaan";
                    else :
                        if ($data['jenis_kwitansi'] === "Pendaftaran") :
                            $data['pendaftaran']['layanan'] = $data['pendaftaran']['layanan'];
                            $data['no_reg'] = $history_pembayaran->id_pendaftaran;
                            $data['action'] = "Biaya";
                        endif;
                    endif;
                endif;
            endif;
            $diskon = $data['pendaftaran']['pasien']->diskon;
            if (0 < $diskon) :
                $data['cara_bayar'] = "Asuransi";
            else :
                $data['cara_bayar'] = "Tunai";
            endif;
            $this->load->view('keuangan/printing/cetak_kwitansi_pembayaran', $data);
        endif;
    }
}
