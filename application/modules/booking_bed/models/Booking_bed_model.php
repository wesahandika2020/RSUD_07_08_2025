<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_bed_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}

	private function sqlBookingBed($search)
    {
			$this->db->select("bb.*, p.nama as pasien, p.telp, p.alamat, bg.nama as bangsal, k.nama as kelas, ru.no_ruang, b.no_bed, tr.account as user");
            $this->db->from('sm_bed_booking as bb')
                ->join('sm_pasien as p', 'p.id = bb.id_pasien')
                ->join('sm_translucent as tr', 'tr.id = bb.id_users')
                ->join('sm_bed as b', 'b.id = bb.id_bed')
				->join('sm_ruang as ru', 'ru.id = b.id_ruang')
				->join('sm_kelas as k', 'k.id = ru.id_kelas')
				->join('sm_bangsal as bg', 'bg.id = ru.id_bangsal');
              
            if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
                $this->db->where("bb.waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
            endif;

            if ($search['no_rm'] !== '') :
                $this->db->like('p.id', $search['no_rm'], 'before', true);
            endif;
			
            if ($search['status'] !== '') :
                $this->db->where('bb.status', $search['status']);
			endif;
			
            if ($search['bangsal'] !== '') :
                $this->db->where('bg.id', $search['bangsal']);
            endif;

            if ($search['nama'] !== '') :
                $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
            endif;


            return $this->db->order_by('bb.waktu', 'desc');    
    }

    private function _listBookingBed($limit, $start, $search)
    {
        $this->sqlBookingBed($search);
		if ($limit !== 0) :
			$this->db->limit($limit, $start);
        endif;

		// $this->db->get(); echo $this->db->last_query(); exit();
        return $this->db->get()->result();
    }

    function getListDataBookingBed($limit, $start, $search)
    {
        $result['data'] = $this->_listBookingBed($limit, $start, $search);
        $result['jumlah'] = $this->sqlBookingBed($search)->get()->num_rows();
        return $result;

        $this->db->close();
	}
    
    function setBookingStatus($id_booking, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $id_booking)->update('sm_bed_booking', $data);
    }

    function checkBookingStatus($no_rm)
    {
        $data = $this->db->where(array('id_pasien' => $no_rm, 'status' => 'request'))->get('sm_bed_booking')->row();
        return $data;
    }

    function simpanBookingBed($id_bed, $data) 
    {
        $this->db->trans_begin();
        $this->db->insert('sm_bed_booking', $data);
        // update bed nya
        $update = array('keterangan' => 'Dipesan');
        $this->db->where('id', $id_bed, true)->update('sm_bed', $update);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        return $status;
    }

    function getDataBookingBedById($id)
    {
        $sql = "select bb.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.telp, p.alamat, 
                bg.nama as bangsal, k.nama as kelas, 
                ru.no_ruang, b.no_bed, tr.account as user 
                from sm_bed_booking as bb 
                join sm_pasien as p on (p.id = bb.id_pasien) 
                join sm_translucent as tr on (tr.id = bb.id_users) 
                join sm_bed as b on (b.id = bb.id_bed) 
                join sm_ruang as ru on (ru.id = b.id_ruang) 
                join sm_kelas as k on (k.id = ru.id_kelas) 
                join sm_bangsal as bg on (bg.id = ru.id_bangsal) 
                where bb.id = '".$id."'";
        return $this->db->query($sql)->row();
    }

    function pembatalanBookingBed($id) 
    {
        $this->db->trans_begin();
        $updateDataBooking = array('status' => 'batal');
        $this->db->where('id', $id, true)->update('sm_bed_booking', $updateDataBooking);
        $dataBooking = $this->db->where('id', $id, true)->get('sm_bed_booking')->row();
        if ($dataBooking) :
            // update status bed nya
            $updateBed = array('keterangan' => 'Tersedia');
            $this->db->where('id', $dataBooking->id_bed)->update('sm_bed', $updateBed);
            if (0 < $dataBooking->repeat) :
                $dataNewBooking = array(
                    'id_pasien' => $dataBooking->id_pasien,
                    'waktu' => $this->datetime,
                    'id_bed' => $dataBooking->id_bed,
                    'status' => 'request',
                    'id_users' => $dataBooking->id_users,
                    'repeat' => $dataBooking->repeat - 1
                );

                $this->simpanBookingBed($dataNewBooking['id_bed'], $dataNewBooking);
            endif;
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        return $status;
    }

}
