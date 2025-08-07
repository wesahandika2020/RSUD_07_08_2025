<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_logistik_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
    }

    function getKodeUnit()
    {
        $this->db->select("u.id", false);

        $this->db->from('sm_unit as u');
        $this->db->where('u.kode', 'UMUM', true);

        return $this->db->get()->row();

        $this->db->close();
    }
    

	private function sqlLogistikUnitSisaStok($search)
    {
		$this->db->select("b.id, b.hpp,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama, COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang,
		");
		$this->db->from('sm_barang as b');
		$this->db->join('sm_barang_unit as bu', 'bu.id_barang = b.id');
        $this->db->join('sm_kategori_barang as kb', 'kb.id = b.id_kategori', 'left');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_sediaan as sd', 'sd.id = b.id_sediaan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->where('bu.id_unit', $search['unit'], true);
		$this->db->where('b.is_active', 'Ya', true);
        $this->db->where('kb.irt', 1, true);
		if ($search['kategori'] !== '') :
            $this->db->where('b.id_kategori', $search['kategori'], true);
		endif;
		if ($search['jenis'] === 'Akhir' && $search['abaikaned'] !== '' && $search['nama'] !== '') :
            $this->db->where("b.nama_lengkap ilike '" . $search["nama"] . "%'");
		endif;

		return $this->db->order_by('b.nama', 'asc');
    }

    private function _listLogistikUnitSisaStok($limit = 0, $start = 0, $search)
    {
        $this->sqlLogistikUnitSisaStok($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        $result = $this->db->get()->result();
        foreach ($result as $i => $value) :
            // query cari sisa stok
            $result[$i]->sisa = $this->db->select("COALESCE(sum(masuk) - sum(keluar), 0.00) as sisa")
                                ->from('sm_invrt_stok')->where('id_barang', $value->id)->where('id_unit', $search['unit'])
                                ->get()->row()->sisa;
            // query cari kemasan
            $sql_default_kemasan = "select kb.id, stn.nama 
                                from sm_kemasan_barang as kb 
                                join sm_satuan as stn on (stn.id = kb.id_kemasan) 
                                where kb.id_barang = '".$value->id."' 
                                and kb.default_kemasan = '1'";
            $default_kemasan = $this->db->query($sql_default_kemasan)->row_array();
            $result[$i]->id_kemasan = $default_kemasan['id'];
            $result[$i]->nama_kemasan = $default_kemasan['nama'];
            // query cari satuan
            $sql_kemasan = "select kb.id, stn.nama
                            from sm_kemasan_barang as kb
                            join sm_satuan as stn on (stn.id = kb.id_kemasan)
                            where kb.id_barang = '".$value->id."'";
            $result[$i]->satuan = $this->db->query($sql_kemasan)->result();
        endforeach;
        return $result;
    }

    function getListDataLogistikUnitSisaStok($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listLogistikUnitSisaStok($limit, $start, $search);
        $result['jumlah'] = $this->sqlLogistikUnitSisaStok($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function generateKodePermintaanLogistik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select kode from sm_invrt_distribusi where date_part('month', tanggal_permintaan) = ".$bulan." and date_part('year', tanggal_permintaan) = ".$tahun." and kode is not NULL order by kode desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->kode);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "GD/UP/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

    function simpanDataPermintaanLogistik()
    {
        $this->db->trans_begin();
        $id = safe_post('id');
        $id_kategori_barang = safe_post('kategori') !== '' ? safe_post('kategori') : NULL;
        $id_unit = safe_post('unit');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_permintaan = safe_post('tanggal_permintaan') !== '' ? date2mysql(safe_post('tanggal_permintaan')) : $this->date;
        $id_barang = safe_post('id_barang');
        $kemasan = safe_post('kemasan');
        $jumlah = safe_post('jumlah');
        if ($id === '') :
            $data = array(
                'id_kategori_barang' => (int)$id_kategori_barang,
                'kode' => $this->generateKodePermintaanLogistik(),
                'tanggal_permintaan' => $tanggal_permintaan,
                'id_users_permintaan' => (int)$this->session->userdata('id_translucent'),
                'id_unit_asal' => (int)$this->session->userdata('id_unit'),
                'id_unit_tujuan' => (int)$id_unit
            );
            $this->db->insert('sm_invrt_distribusi', $data);
            $id_distribusi = $this->db->insert_id();
            if (is_array($kemasan)) :
                foreach ($kemasan as $i => $val) :
                    $sql = "select b.hna, b.hpp from sm_barang as b
                            join sm_kemasan_barang as kb on (kb.id_barang = b.id) 
                            where kb.id = '".$val."'";
                    $barang = $this->db->query($sql)->row();
                    $data_detail = array(
                        'id_distribusi' => (int)$id_distribusi,
                        'id_kemasan_barang' => (int)$kemasan[$i],
                        'hna' => (float)$barang->hna,
                        'hpp' => (float)$barang->hpp,
                        'jumlah' => (float)$jumlah[$i]
                    );
                    $this->db->insert('sm_invrt_detail_distribusi', $data_detail);
                endforeach;
            endif;
         
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal menyimpan data permintaan logistik';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil menyimpan data permintaan logistik';
            endif;
            $result['action'] = 'add';
        else :
            $data = array(
                'id_kategori_barang' => (int)$id_kategori_barang,
                'id_users_permintaan' => (int)$this->session->userdata('id_translucent'),
                'id_unit_asal' => (int)$this->session->userdata('id_unit'),
                'id_unit_tujuan' => (int)$id_unit
            );
            $this->db->where('id', (int)$id, true)->update('sm_invrt_distribusi', $data);
            $id_distribusi = $id;
            $this->db->where('id_distribusi', (int)$id_distribusi, true)->delete('sm_invrt_detail_distribusi');
            if (is_array($kemasan)) :
                foreach ($kemasan as $i => $val) :
                    $sql = "select b.hna, b.hpp from sm_barang as b
                            join sm_kemasan_barang as kb on (kb.id_barang = b.id) 
                            where kb.id = '".$val."'";
                    $barang = $this->db->query($sql)->row();
                    $data_detail = array(
                        'id_distribusi' => (int)$id_distribusi,
                        'id_kemasan_barang' => (int)$kemasan[$i],
                        'hna' => (float)$barang->hna,
                        'hpp' => (float)$barang->hpp,
                        'jumlah' => (float)$jumlah[$i]
                    );
                    $this->db->insert('sm_invrt_detail_distribusi', $data_detail);
                endforeach;
            endif;

            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal mengubah data permintaan logistik';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil mengubah data permintaan logistik';
            endif;
            $result['action'] = 'update';
        endif;
        $result['id'] = $id_distribusi;
        return $result;
    }

    private function sqlPermintaanLogistik($search)
    {
        date_default_timezone_set('Asia/Jakarta');
		$this->db->select("DISTINCT ON (d.id) d.*, un.nama as tujuan, tr.account, coalesce(pgu.nama, '') as nama_account, trs.account as user_minta, coalesce(pgum.nama, '') as nama_user_minta");
		$this->db->from('sm_invrt_distribusi as d');
		$this->db->join('sm_invrt_detail_distribusi as dd', 'dd.id_distribusi = d.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dd.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_unit as u', 'u.id = d.id_unit_asal');
		$this->db->join('sm_unit as un', 'un.id = d.id_unit_tujuan');
		$this->db->join('sm_translucent as tr', 'tr.id = d.id_users', 'left');
		$this->db->join('sm_pegawai as pgu', 'pgu.id = d.id_users', 'left');
		$this->db->join('sm_translucent as trs', 'trs.id = d.id_users_permintaan', 'left');
		$this->db->join('sm_pegawai as pgum', 'pgum.id = d.id_users_permintaan', 'left');
        $this->db->where('d.id_unit_asal', $this->session->userdata('id_unit'), true);
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("d.tanggal_permintaan BETWEEN '" . date2mysql($search['tanggal_awal']) . "' AND '" . date2mysql($search['tanggal_akhir']) . "'");
        endif;
		if (isset($search['barang']) && $search['barang'] !== '') :
            $this->db->where('b.id_barang', $search['barang'], true);
		endif;
		return $this->db->order_by('d.id', 'desc');
    }

    private function _listPermintaanLogistik($limit = 0, $start = 0, $search)
    {
        $this->sqlPermintaanLogistik($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataPermintaanLogistik($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPermintaanLogistik($limit, $start, $search);
        $result['jumlah'] = $this->sqlPermintaanLogistik($search)->get()->num_rows();
        return $result;
        $this->db->close();
    }

    function getDataPermintaanLogistik($id)
    {
        $param = NULL;
        date_default_timezone_set('Asia/Jakarta');
        $add_select = NULL;
        if (isset($id) && $id !== '') :
            $param .= " and d.id = '".$id."'";
            $add_select = ", 
                COALESCE((select sum(stk.masuk) - sum(stk.keluar) from sm_invrt_stok as stk where stk.id_barang = b.id and stk.id_unit = '".$this->session->userdata('id_unit')."'), 0.00) as sisa,
                (select (k.isi * k.isi_satuan) as isi_kemasan from sm_kemasan_barang as k join sm_satuan as s on (s.id = k.id_kemasan) where k.id_barang = b.id order by isi_kemasan asc limit 1) as isi_kemasan,
                (select s.nama from sm_kemasan_barang kb join sm_satuan as st on (st.id = kb.id_kemasan) where kb.id_barang = b.id order by (kb.isi * kb.isi_satuan) asc limit 1) as kemasan_sisa, 
                COALESCE((select sum(stk.masuk) - sum(stk.keluar) from sm_invrt_stok as stk where stk.id_barang = b.id and stk.id_unit = u.id), 0.00) as sisa_asal ";
        endif;
        $select = "select d.*, dd.jumlah, 
            CONCAT_WS(' ', b.nama, b.kekuatan, s.nama, COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''),'</i></small>') as nama_barang, 
            stn.nama as kemasan, u.nama as unit_asal, un.nama as unit_tujuan, k.id as id_kemasan, k.id_barang, dd.id as id_detail_distribusi" . $add_select . " ";
        $count_select = "select count(*) as count ";
        $sql = "from sm_invrt_distribusi as d 
                join sm_invrt_detail_distribusi as dd on (dd.id_distribusi = d.id) 
                join sm_unit as u on (u.id = d.id_unit_asal)
                join sm_unit as un on (un.id = d.id_unit_tujuan)
                join sm_kemasan_barang as k on (k.id = dd.id_kemasan_barang)
                join sm_barang as b on (b.id = k.id_barang)
                left join sm_sediaan as sd on (sd.id = b.id_sediaan)
                left join sm_satuan as s on (s.id = b.satuan_kekuatan)
                left join sm_pabrik as pb on (pb.id = b.id_pabrik)
                left join sm_satuan as stn on (stn.id = k.id_kemasan)
                where d.id is NOT NULL ".$param." 
                group by d.id, dd.jumlah, b.nama, b.kekuatan, s.nama, sd.nama, pb.nama,
                stn.nama, u.nama, un.nama, k.id, dd.id, b.id, u.id, k.id_barang
                order by d.id desc";
        $data['data'] = $this->db->query($select . $sql)->result();
        $data['jumlah'] = $this->db->query($count_select . $sql)->row()->count;
        return $data;
    }

    function deleteDataPenerimaanLogistik($id)
    {
        $this->db->trans_begin();
        $this->db->where('id', $id, true)->delete('sm_invrt_distribusi');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['message'] = "Gagal menghapus data penerimaan logistik!";
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['message'] = "Berhasil menghapus data penerimaan logistik!";
        endif;
        return $result;
    }
}