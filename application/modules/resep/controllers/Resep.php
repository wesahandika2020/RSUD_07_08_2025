<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Resep_model', 'm_resep');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function printing_copy_resep($id_resep, $pengambilan_ke, $log)
    {
        $resep_tebus = $this->db->select('*')
            ->from('sm_resep_tebus')
            ->where('id_resep', $id_resep)
            ->get()->row();

        $resep_tebus->cetakan_ke = $resep_tebus->cetakan_ke == null ? 0 : $resep_tebus->cetakan_ke;
        $tambah_cetakan = $resep_tebus->cetakan_ke + 1;

        $this->db->where('id', $resep_tebus->id)->update('sm_resep_tebus', ['cetakan_ke' => $tambah_cetakan]);

        $data['title'] = 'RUMAH SAKIT UMUM KOTA TANGERANG';
        $data['hospital'] = $this->m_default->getDataHospital();
        if ($log != 1) {
            $data['rows']   = $this->m_resep->getListDataCopyResep($id_resep, $pengambilan_ke)->row();
            $data['detail'] = $this->m_resep->getListDataResepR($id_resep, NULL, $pengambilan_ke)->result();
            foreach ($data['detail'] as $item){
				$timing = $this->db->get_where('sm_waktu_pemberian_obat', ['kode' => $item->timing])->row();
				$item->timing = $timing ? $timing->timing : $item->cara_pemberian . ' Makan';

				$admin_time = $this->db->where_in('kode', explode(', ', $item->admin_time))->get('sm_waktu_pemberian_obat')->result();
				$admin_time = implode(', ', array_map(function ($v) {
					return $v->timing;
				}, $admin_time));
				$item->admin_time    = !empty($admin_time) ? $admin_time : $item->admin_time;
			}
            $this->load->view('resep/printing/cetak_copy_resep', $data);
        } else {
            $data['resep']   = $this->m_resep->getListDataCopyResepLog($id_resep);
            $this->load->view('resep/printing/cetak_copy_resep_log', $data);
        }
    }

    function printing_bukti_pelayanan_obat($id_resep, $pengambilan_ke)
    {
        $data['title'] = 'RUMAH SAKIT UMUM KOTA TANGERANG';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list'] = $this->m_resep->getListDataResep($id_resep, $pengambilan_ke)->row();
        $data['detail'] = $this->m_resep->getListDataResepBukti($id_resep, $pengambilan_ke)->result();
        $this->load->view('resep/printing/cetak_bukti_pelayanan_obat', $data);
    }

    function printing_all_etiket($id_resep_tebus, $id_r = NULL)
    {
        $data['title'] = 'RUMAH SAKIT UMUM KOTA TANGERANG';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list'] = $this->m_resep->getListDataResepTebusR($id_resep_tebus, $id_r);
        $data['keterangan'] = urldecode(safe_get("keterangan"));
        $this->load->view('resep/printing/cetak_etiket_resep', $data);
    }
}
