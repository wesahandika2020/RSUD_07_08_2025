<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Casemix extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
        $this->load->model('Casemix_model', 'm_casemix');

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;
    }

    function index()
    {
        $data['active'] = 'Casemix';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function getJenisLayanan()
    {
        return array(
            "rawat_jalan"       => "Rawat Jalan",
            "igd"               => "IGD",
            "rawat_inap"        => "Rawat Inap",
            "intensive_care"    => "Intensive Care",
            "hemodialisa"       => "Hemodialisa",
            "radiologi"         => "Radiologi",
            "laboratorium"      => "Laboratorium"
        );
    }

    function page_casemix()
    {
        $data['cara_bayar'] = $this->m_masterdata->getCaraBayar(true);
        $data['jenis_layanan'] = $this->getJenisLayanan();
        $data['status_bayar'] = $this->m_keuangan->statusPembayaran();
        $data['kelamin']      = $this->m_masterdata->getKelamin();

        $data["transaksi"] = $this->m_keuangan->getTransaksi();
        $data["metode_pembayaran"] = $this->m_keuangan->getMetodePembayaran();
        $data["transaksi"]["Barang"] = "Resep";
        $data['unit_kasir'] = $this->m_masterdata->getUnitKasir();
        $data['tempat_layanan'] = $this->m_masterdata->getTempatLayanan();
        // $data['layanan'] = 'Rawat Jalan';
        $this->load->view('index', $data);
    }

    function printing_rincian_billing($id_pendaftaran = NULL, $type = NULL, $id_layanan_pendaftaran = NULL)
    {
        if ($id_pendaftaran !== NULL) :
            $total_bayar_pasien = 0;
            $total_tagihan_pasien = 0;
            $data = $this->m_keuangan->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
            $data['title'] = 'Rincian Billing';
            $data['hospital'] =  $data['hospital'] = $this->m_default->getDataHospital();
            $data['id_layanan_pendaftaran'] = $id_layanan_pendaftaran;
            if (count((array)$data['pasien']) < 1) :
                exit;
            endif;
            foreach ($data['layanan'] as $i => $val) :
                $val->pendaftaran = $this->m_casemix->getListTarifTindakan($val->id, 'Ya');
                $val->item_billing += count((array)$val->pendaftaran);
                $val->tindakan = $this->m_casemix->getListTarifTindakan($val->id, 'Tidak');
                $val->item_billing += count((array)$val->tindakan);
                $val->laboratorium = $this->m_casemix->getListTarifLaboratoriumGroup($val->id);
                $val->item_billing += count((array)$val->laboratorium);
                $val->radiologi = $this->m_casemix->getListTarifRadiologiGroup($val->id);
                $val->item_billing += count((array)$val->radiologi);
                $val->fisioterapi = $this->m_casemix->getListTarifFisioterapiGroup($val->id);
                $val->item_billing += count((array)$val->fisioterapi);
                $val->barang = $this->m_casemix->getListTarifBarang($val->id);
                $val->item_billing += count((array)$val->barang);
                $val->barang_operasi = $this->m_casemix->getListTarifBarangOperasi($val->id);
                $val->item_billing += count((array)$val->barang_operasi);
                $val->rawat_inap = $this->m_casemix->getListTarifKamar($val->id);
                $val->item_billing += count((array)$val->rawat_inap);
                $val->intensive_care = $this->m_casemix->getListTarifKamarIcare($val->id);
                $val->item_billing += count((array)$val->intensive_care);
                $val->operasi = $this->m_casemix->getListTarifOperasi($val->id, 'OK'); // Operatie Kamer
                $val->item_billing += count((array)$val->operasi);
                $val->vk = $this->m_casemix->getListTarifOperasi($val->id, 'VK'); // Verlos Kamer
                $val->item_billing += count((array)$val->vk);
                $val->bank_darah = $this->m_casemix->getListTarifBankDarah($val->id);
                $val->item_billing += count((array)$val->bank_darah);
                $val->barang_bank_darah = $this->m_casemix->getListTarifBarangBankDarah($val->id);
                $val->item_billing += count((array)$val->barang_bank_darah);
                $val->retur_barang = $this->m_casemix->getListReturBarang($val->id);
                $val->item_billing += count((array)$val->retur_barang);
                $val->hemodialisa = $this->m_casemix->getListTarifHemodialisa($val->id);
                $val->item_billing += count((array)$val->hemodialisa);
            endforeach;
            $data['list_rincian_barang'] = $this->m_keuangan->getPenggunaanBarangPasien($id_pendaftaran);
            $data['petugas'] = $this->session->userdata('nama');
            $data['waktu'] = indo_time($this->datetime, true);
            $data['type'] = $type;
            if ($_SESSION['account'] == 'faizmsyam') :
            // var_dump($data); die;
            endif;
            $view = 'printing/cetak_rincian_billing';
            if ($type === 'download') :
                $view = 'printing/download_rincian_billing';
            else :
                if ($type === 'json') :
                    exit(json_encode($data));
                endif;
            endif;
            $this->load->view($view, $data);
        endif;
    }

    function printing_hasil_laboratorium($id_pendaftaran, $type = "print")
    {
        if (!$id_pendaftaran) {
            return;
        }

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');

        $dataLaboratorium = $this->m_casemix->get_pemeriksaan_laboratorium_list($id_pendaftaran, 'list');

        if (empty($dataLaboratorium)) {
            exit;
        }

        // Init default data
        $data = [
            'title' => 'Hasil Laboratorium Patologi Klinik',
            'hospital' => $this->default->getDataHospital(),
            'type' => $type,
            'waktu_cetak' => $this->waktu_cetak,
            'pendaftaran' => [],
            'laboratorium' => [],
            'cetakan_lab' => [],
            'diagnosa' => [],
            'lab' => [],
            'lab_value' => [],
            'length' => 0,
        ];

        $outputJSON = [];

        foreach ($dataLaboratorium as $value) {
            // Ambil data tambahan
            $data['pendaftaran'][] = $this->m_pendaftaran->getPendaftaranDetail($value->id_pendaftaran, $value->id_layanan_pendaftaran);
            $data['laboratorium'][] = $value;
            $data['cetakan_lab'][] = $this->m_hasil_laboratorium->getCetakanLab($value->id);
            $data['diagnosa'][] = $this->m_casemix->diagnosisLab($value->id_pendaftaran);

            // Panggil data ONO
            $url = $this->url . '/api/result/ono/' . $value->kode . '/view/';
            $headers = [
                'x-username: ' . $this->user,
                'x-password: ' . $this->pass
            ];

            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERAGENT => 'Mozilla/5.0',
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 120,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => $headers,
            ]);

            $response = curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
            curl_close($ch);

            if ($statusCode !== 200 || empty($response)) {
                continue;
            }

            $decoded = json_decode($response);
            if (!isset($decoded->detail)) {
                continue;
            }

            $outputJSON[] = $decoded;
        }

        if (empty($outputJSON)) {
            echo "Koneksi bermasalah atau data ONO tidak ditemukan";
            return;
        }

        // Gabungkan data lab
        $gabung_item = [];
        foreach ($outputJSON as $i => $jsonData) {
            foreach ($jsonData->detail as $key => $item) {
                $gabung_item[$i][$key] = [
                    'flag' => $item->flag,
                    'order_testnm' => $item->order_testnm,
                    'test_comment' => $item->test_comment,
                    'test_cd' => $item->test_cd,
                    'test_group' => $item->test_group,
                    'nama' => $this->m_hasil_laboratorium->getDataItemPemeriksaan($item->test_cd),
                    'result_value' => $item->result_value,
                    'ref_range' => $item->ref_range,
                    'unit' => $item->unit,
                    'disp_seq' => $item->disp_seq,
                ];
            }
        }

        $data['lab'] = $gabung_item;
        $data['lab_value'] = $outputJSON;
        $data['length'] = count($outputJSON);

        // Output response
        if ($type === 'json') {
            return $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } elseif ($type === 'data') {
            return $data;
        } else {
            $this->load->view('casemix/printing/cetak_hasil_laboratorium', $data);
        }
    }

    function printing_hasil_laboratorium_new($id_pendaftaran, $type = "print")
    {
        if ($id_pendaftaran === NULL) {
            return;
        }

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');

        $data['hasil_lab'] = $this->m_casemix->get_pemeriksaan_laboratorium_list($id_pendaftaran, 'list');
        if (count((array)$data) < 1) {
            exit;
        }

        $this->load->view('casemix/printing/cetak_hasil_laboratorium_new', $data);
    }




    public function cetak_resume_medis($id_layanan, $id_pendaftaran, $type = null)
    {
        if ($id_pendaftaran !== NULL) {


            // $this->db->select('pd.id, lp.id as id_layanan_pendaftaran, lp.jenis_layanan')
            //     ->from('sm_pendaftaran pd')
            //     ->join('sm_layanan_pendaftaran lp', 'pd.id = lp.id_pendaftaran')
            //     ->where('pd.id', $id_pendaftaran);

            // $list_layanan = $this->db->get()->result();

            // foreach ($list_layanan as $layanan) {
            //     if ($layanan->jenis_layanan == 'Poliklinik') {
            //     }
            // }

            // foreach ($list_layanan as $layanan) {
            //     if ($layanan->jenis_layanan == 'Poliklinik') {
            //         echo 'Ada layanan poliklinik';
            //         var_dump($layanan);
            //         die;
            //     }
            // }



            $data['data'] = $this->m_casemix->resume_medis_rajal($id_pendaftaran, $id_layanan);

            // var_dump($data['data'] );die;

            if ($type !== 'data') {
                $this->load->view('casemix/printing/resume_medis', $data);
            } else {
                return $data;
            }
        }
    }




    



}
