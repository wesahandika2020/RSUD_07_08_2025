<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Masterdata_model', 'masterdata');
    }

    private function sqlLogs($search)
    {
        $this->db->select("*", false);
        $this->db->from('sm_logs')->where('id is not null');

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['menu'] !== '') :
            $this->db->where("menu ilike '%" . strtolower($search['menu']) . "%'");
        endif;

        if ($search['status'] !== '') :
            $this->db->where("status ilike '%" . strtolower($search['status']) . "%'");
        endif;

        return $this->db->order_by('waktu', 'desc');
    }

    private function _listLogs($limit = 0, $start = 0, $search)
    {
        $this->sqlLogs($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataLogs($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listLogs($limit, $start, $search);
        $result['jumlah'] = $this->sqlLogs($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

    function pasienUpdateLog($id, $before, $after)
    {
        $cek_status = $this->db->get_where('sm_konfigurasi_logs', ['id' => 1])->row();
        $status = false;
        if (0 < count((array) $cek_status) && $cek_status->status === 'On') :
            $this->load->model('configs/Account_model', 'account');
            $user = $this->account->getDataAccountById($this->session->userdata('id_translucent'));
            $username  = NULL;
            $nama_user = NULL;
            if (0 < count((array) $user)) :
                $username  = $user->account;
                $nama_user = $user->nama;
            endif;

            $pasien = $this->db->select('nama')->where('id', $id)->get('sm_pasien')->row();

            $note = array(
                'id_layanan_pendaftaran' => NULL,
                'waktu'                  => $this->datetime,
                'no_register'            => NULL,
                'no_rm'                  => $id,
                'nama'                   => $pasien->nama,
                'jenis'                  => NULL,
                'jenis_igd'              => NULL,
                'layanan'                => NULL,
                'ruang'                  => NULL,
                'id_klinik'              => NULL,
                'id_bangsal'             => NULL,
                'keterangan'             => 'Update Data Pasien',
                'catatan'                => NULL,
                'before'                 => $before,
                'after'                  => $after,
                'user'                   => $username,
                'nama_user'              => $nama_user
            );
            
            $status = $this->db->insert('sm_logs_transaction', $note);
        endif;

        return $status;
    }

    function opsiAdminLogs($with_blank = false)
    {
        $blank = ['' => 'Pilih'];
        $query = $this->db->get('sm_logs_transaction_category')->result();
        $data  = array();

        foreach ($query as $key => $value) :
            $data[$value->value] = $value->label;
        endforeach;

        if ($with_blank) :
            return array_merge($blank, $data);
        endif;

        return $data;
    }

    function recordAdminLogs($id_layanan_pendaftaran, $keterangan, $catatan = '')
    {
        $cek_status = $this->db->get_where('sm_konfigurasi_logs', ['id' => 1])->row();
        $status = false;

        if (0 < count((array) $cek_status) & $cek_status->status == 'On') :
            $this->load->model('configs/Account_model', 'account');
            $this->load->model('spesialisasi/Spesialisasi_model', 'spesialisasi');
            $lp = $this->db->select('lp.jenis_layanan, pd.no_register, pd.id_pasien, 
                                    lp.id_unit_layanan, lp.id_pendaftaran, p.nama as pasien')
                            ->from('sm_layanan_pendaftaran as lp')
                            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                            ->where('lp.id', $id_layanan_pendaftaran)
                            ->get()
                            ->row();
            $layanan    = '';
            $ruang      = '';
            $jenis      = '';
            $jenis_igd  = '';
            $id_klinik  = NULL;
            $id_bangsal = NULL;
            $status     = FALSE;

            if (0 < count((array) $lp)) :
                $jenis = $lp->jenis_layanan;
                $layanan = $lp->jenis_layanan;

                if ($lp->jenis_layanan === 'Poliklinik') :
                    $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
                    $klinik = $this->sp->getDataSpesialisasiById($lp->id_unit_layanan);
                    if (0 < count((array)$klinik)) :
                        $id_klinik = $lp->id_unit_layanan;
                        $layanan .= ' ' . $klinik->nama;
                    endif;
                else :
                    if ($lp->jenis_layanan === 'Rawat Inap') :
                        $rawat_inap = $this->db->select('b.nama, k.nama as kelas, ri.no_ruang, ri.no_bed, ri.id_bangsal')
                                                ->from('sm_rawat_inap as ri')
                                                ->join('sm_bangsal as b', 'b.id = ri.id_bangsal')
                                                ->join('sm_kelas as k', 'k.id = ri.id_kelas')
                                                ->where('ri.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
                                                ->get()
                                                ->row();
                        if (0 < count((array)$rawat_inap)) :
                            $id_bangsal = $rawat_inap->id_bangsal;
                            $ruang = $rawat_inap->nama . " Kelas " . $rawat_inap->kelas . " Ruang " . $rawat_inap->no_ruang . " Bed " . $rawat_inap->no_bed;
                        endif;
                    else :
                        if ($lp->jenis_layanan === 'IGD') :
                            $igd = $this->db->select('jenis_igd')->where('id', $lp->id_pendaftaran)->get('sm_pendaftaran')->row();
                            if (0 < count((array)$igd)) :
                                $jenis_igd = $igd->jenis_igd;
                                $layanan .= ' ' . $igd->jenis_igd;
                            endif;
                        endif;
                    endif;
                endif;

                $user = $this->account->getDataAccountById($this->session->userdata('id_translucent'));
                $username  = NULL;
                $nama_user = NULL;
                if (0 < count((array) $user)) :
                    $username  = $user->account;
                    $nama_user = $user->nama;
                endif;

                $note = array(
                    'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                    'waktu'                  => $this->datetime,
                    'no_register'            => $lp->no_register,
                    'no_rm'                  => $lp->id_pasien,
                    'nama'                   => $lp->pasien,
                    'jenis'                  => $jenis, 
                    'jenis_igd'              => $jenis_igd, 
                    'layanan'                => $layanan, 
                    'ruang'                  => $ruang, 
                    'id_klinik'              => $id_klinik, 
                    'id_bangsal'             => $id_bangsal, 
                    'keterangan'             => $keterangan,
                    'catatan'                => $catatan,
                    'user'                   => $username,
                    'nama_user'              => $nama_user,
                );

                $status = $this->db->insert('sm_logs_transaction', $note);
            endif;
        endif;

        return $status;
    }

    // ADMIN LOGS
    private function sqlAdminLogs($search)
    {
        $this->db->select("*", false);
        $this->db->from('sm_logs_transaction')->where('id is not null');

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where("no_register", $search['no_register']);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->where("no_rm ilike '%" . strtolower($search['no_rm']) . "%'");
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['keterangan'] !== '') :
            $this->db->where("keterangan ilike '%" . strtolower($search['keterangan']) . "%'");
        endif;

        if ($search['jenis_igd'] !== '') :
            $this->db->where("jenis_igd ilike '%" . strtolower($search['jenis_igd']) . "%'");
        endif;

        if ($search['jenis_layanan'] !== '') :
            $this->db->where("jenis_layanan", $search['jenis_layanan']);
        endif;

        if ($search['bangsal'] !== '') :
            $this->db->where("id_bangsal", $search['bangsal']);
        endif;

        if ($search['klinik'] !== '') :
            $this->db->where("id_klinik", $search['klinik']);
        endif;


        return $this->db->order_by('waktu', 'desc');
    }

    private function _listAdminLogs($limit = 0, $start = 0, $search)
    {
        $this->sqlAdminLogs($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataAdminLogs($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listAdminLogs($limit, $start, $search);
        $result['jumlah'] = $this->sqlAdminLogs($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

    // Masterdata Logs
    function getMasterdataLogsCategory()
    {
        $query = $this->db->get('sm_logs_masterdata_category')->result();
        $data = array();
        $data[''] = 'Pilih';
        foreach ($query as $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        $this->db->close();
        return $data;
    }

    function recordMasterdataLogs($id_masterdata, $id_data, $id_user, $action, $data, $databefore = null)
    {
        $data = array(
            'id_logs_masterdata_category' => $id_masterdata,
            'waktu'                       => date('Y-m-d H:i:s'),  
            'id_data'                     => $id_data,
            'id_user'                     => $id_user,
            'action'                      => $action,
            'databefore'                  => $databefore,
            'data'                        => $data,
        );

        $this->db->insert('sm_logs_masterdata', $data);
        $this->db->close();
    }

    private function sqlMasterdataLogs($search)
    {
        $this->db->select("lm.*, m.nama as masterdata, pg.nama as nama_user, tr.account", false);
        $this->db->from('sm_logs_masterdata as lm')
                ->join('sm_logs_masterdata_category as m', 'm.id = lm.id_logs_masterdata_category')
                ->join('sm_translucent as tr', 'tr.id = lm.id_user')
                ->join('sm_pegawai as pg', 'pg.id = tr.id')
                ->where('lm.id is not null');

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lm.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['masterdata'] !== '') :
            $this->db->where("lm.id_logs_masterdata_category", $search['masterdata']);
        endif;

        if ($search['action'] !== '') :
            $this->db->where("lm.action", $search['action']);
        endif;

        return $this->db->order_by('lm.waktu', 'desc');
    }

    private function _listMasterdataLogs($limit = 0, $start = 0, $search)
    {
        $this->sqlMasterdataLogs($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataMasterDataLogs($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listMasterdataLogs($limit, $start, $search);
        $result['jumlah'] = $this->sqlMasterdataLogs($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

    function getMastdataLogsById($id)
    {
        $this->db->select("lm.*, m.nama as masterdata, pg.nama as nama_user, tr.account", false);
        $this->db->from('sm_logs_masterdata as lm')
            ->join('sm_logs_masterdata_category as m', 'm.id = lm.id_logs_masterdata_category')
            ->join('sm_translucent as tr', 'tr.id = lm.id_user')
            ->join('sm_pegawai as pg', 'pg.id = tr.id')
            ->where('lm.id', $id);

        return $this->db->get()->row();
    }

    // function checkChangeDPJP($id_layanan_pendaftaran, $dokter)
    // {
    //     $dokter_old = $this->db->where('id', $id_layanan_pendaftaran)->select('id_dokter')->get('sm_layanan_pendaftaran')->row();
    //     $catatan = '';
    //     $dokter_lama = $this->masterdata->getNadis($dokter_old->id_dokter);
    //     var_dump($dokter); die;
    //     $dokter_baru = $this->masterdata->getNadis($dokter);

    //     if (0 < count((array) $dokter_old) && $dokter_old->id_dokter !== NULL && $dokter !== (string) $dokter_old->id_dokter) :
    //         var_dump($dokter_lama->nama); die;
    //         $catatan = "Dokter awal : " . $dokter_lama->nama;
    //         $catatan = "<br>Dokter baru : " . $dokter_baru->nama;
    //         $data = $this->recordAdminLogs($id_layanan_pendaftaran, 'Ubah DPJP', $catatan);
    //     endif;
    // }
	
	function updateNoRujukanBridging($data)
    {
        $id_pendaftaran = $data['id_pendaftaran'];
        $no_rujukan     = $data['no_rujukan'];

        $beforeRow = $this->db->select('id, id_pendaftaran, kode_booking, no_referensi, asal_faskes, kadaluarsa_rujukan, kode_bpjs_poli_rujukan')
                            ->from('sm_antrian_bpjs')
                            ->where('id_pendaftaran', $id_pendaftaran)
                            ->get()
                            ->row();
        $before = json_encode($beforeRow);

        $data_update = [
            'no_referensi'           => $no_rujukan,
            'asal_faskes'            => $data['asal_faskes'],
            'kadaluarsa_rujukan'     => $data['kadaluarsa_rujukan'],
            'kode_bpjs_poli_rujukan' => $data['kode_bpjs_poli_rujukan']
        ];

        $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_antrian_bpjs', $data_update);

        $afterRow = $this->db->select('id, id_pendaftaran, kode_booking, no_referensi, asal_faskes, kadaluarsa_rujukan, kode_bpjs_poli_rujukan')
                            ->from('sm_antrian_bpjs')
                            ->where('id_pendaftaran', $id_pendaftaran)
                            ->get()
                            ->row();
        $after = json_encode($afterRow);

        $this->insertLogVisite($id_pendaftaran, 'Ubah Rujukan Bridging', null, $before, $after);

        $update_rujukan = array(
            'no_rujukan' => $no_rujukan
        );
        $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $update_rujukan);
        $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_layanan_pendaftaran', $update_rujukan);
        
        return $id_pendaftaran;
    }

    function insertLogVisite($id_pendaftaran, $keterangan, $catatan = null, $before = null, $after = null)
    {
        $pasien = $this->db->select('id_pasien')
                            ->where('id', $id_pendaftaran)
                            ->get('sm_pendaftaran')
                            ->row();    

        $logData = [
            'id_pendaftaran' => $id_pendaftaran,
            'id_pasien'      => $pasien->id_pasien ?? null,
            'keterangan'     => $keterangan,
            'catatan'        => $catatan,
            'before'         => $before,
            'after'          => $after,
            'id_user'        => $this->session->userdata('id_translucent'),
            'created_at'     => $this->datetime
        ];
        
        $this->db->insert('sm_logs_transaction_visit', $logData);
    }

}

/* End of file Logs_model.php */
