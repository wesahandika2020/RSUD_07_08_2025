<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventori_gizi_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	function getJenisPenerimaan()
    {
        return array("" => "Pilih ...", "Langsung" => "Langsung", "Konsinyasi" => "Konsinyasi");
    }

    function getJenisPembayaran()
    {
        return array("" => "Pilih ...", "BLUD" => "BLUD", "APBD" => "APBD", "BTT" => "BTT Kota & Provinsi");
    }

    function namaUnit($id)
    {
        return $this->db->query("select nama from sm_unit where id = '" . $id . "'")->row()->nama;
    }

    function namaPabrik($id)
    {
        return $this->db->query("select nama from sm_pabrik where id = '" . $id . "'")->row()->nama;
    }

    function getUnit()
    {
        return $this->db->where('kode', 'UMUM')->get('sm_unit')->result();
    }

    function ambilDataKategoriBarang($jenis = NULL)
    {
        $q = " where irt = 2";
        if ($jenis !== "") :
            $q .= " and jenis = '" . $jenis . "'";
        endif;
        $sql = "select * from sm_kategori_barang " . $q . " order by jenis, id";
        return $this->db->query($sql);
    }

    function getAutoNoFakturPenerimaan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select p.*, p.id as id_penerimaan, s.nama as supplier 
                from sm_gizi_penerimaan as p 
                join sm_pabrik as s on (s.id = p.id_supplier)
                where p.no_faktur ilike ('%$q%') 
                and p.id_unit = '".$this->session->userdata('id_unit')."' 
                order by position('$q' in p.no_faktur)";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoNoDistribusi($param, $start, $limit)
    { 
        $limit = " limit " . $limit . " offset " . $start;
        $where = " and d.id not in (select id_distribusi from sm_penerimaan_distribusi_gizi)";
        if ($param["status"] !== '') :
            $where = "";
        endif;
        $select   = "select EXTRACT(DAY FROM MAX(NOW())-MIN(date(tanggal_dikirim))) as selisih, 
                d.*, date(d.tanggal_permintaan) as tanggal, u.nama as unit, un.nama as unit_kirim ";
        $count = "select count(*) as count ";
        $sql = "from sm_gizi_distribusi as d 
                join sm_unit as u on (u.id = d.id_unit_asal)
                join sm_unit as un on (un.id = d.id_unit_tujuan)
                where d.kode ilike ('".$param["q"]."%') ".$where."
                and d.id_unit_asal = '".$this->session->userdata('id_unit')."' 
                group by d.id, un.nama, u.nama ";
        $order = "order by position('".$param["q"]."' in d.kode)";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->num_rows();
        return $data;
    }

    private function sqlPenerimaan($search)
    {   
        $this->db->select("DISTINCT ON (pen.id)
			pen.*, pen.id as id_sppb, COALESCE(pen.id_pemesanan, '') as id_pemesanan,
			COALESCE(p.nama, '-') as supplier, (pen.total * (pen.ppn / 100)) + pen.total as total_baru,
			CONCAT_WS(' ', b.nama, b.kekuatan, st.nama) as nama_barang, dpen.jumlah, k.isi, dpen.harga,
			dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan
		");
        $this->db->from('sm_gizi_penerimaan as pen');
		$this->db->join('sm_gizi_detail_penerimaan as dpen', 'dpen.id_penerimaan = pen.id');
		$this->db->join('sm_kategori_barang as kb', 'kb.id = pen.id_kategori_barang', 'left');
		$this->db->join('sm_kemasan_barang as k', 'k.id = dpen.id_kemasan_barang');
		$this->db->join('sm_barang as b', 'b.id = k.id_barang');
		$this->db->join('sm_satuan as st', 'st.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_pabrik as p', 'p.id = pen.id_supplier', 'left');
		$this->db->join('sm_translucent as tr', 'tr.id = pen.id_users', 'left');


        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pen.tanggal BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;
        if ($search['kategori_barang'] !== '') :
            $this->db->where('pen.id_kategori_barang', $search['kategori_barang'], true);
		endif;
        if ($search['no_penerimaan'] !== '') :
            $this->db->where('pen.no_penerimaan', $search['no_penerimaan'], true);
        endif;
        if ($search['no_faktur'] !== '') :
            $this->db->where('pen.no_faktur', $search['no_faktur'], true);
        endif;
        if ($search['supplier'] !== '') :
            $this->db->where('pen.id_supplier', $search['supplier'], true);
        endif;
        if ($search['barang'] !== '') :
            $this->db->where('b.id', $search['barang'], true);
        endif;
        if ($search['jenis_barang'] !== '') :
            $this->db->where('kb.jenis', $search['jenis_barang'], true);
		endif;
		if ($search['list'] === "Perfaktur") :
            $this->db->group_by('pen.id, p.nama, b.nama, b.kekuatan, st.nama, dpen.jumlah, k.isi, dpen.harga, dpen.diskon_persen, dpen.diskon_rupiah, kb.kode_penerimaan');
        endif;

        return $this->db->order_by('pen.id', 'desc');    
    }

    private function _listPenerimaan($limit = 0, $start = 0, $search)
    {
        $this->sqlPenerimaan($search);
        if ($limit !== 0 && $search['list'] === 'Perfaktur') :
            $this->db->limit($limit, $start);
        endif;

		return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataPenerimaan($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listPenerimaan($limit, $start, $search);
        $result['jumlah'] = $this->sqlPenerimaan($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

	function generateNoUrutPenerimaan($jenis = '')
    {
        $length = 4;
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date('Y');
        $bulan = date('m');
        $row = $this->db->query("select no_penerimaan from sm_gizi_penerimaan where date_part('month', tanggal) = ".$bulan." and date_part('year', tanggal) = ".$tahun." and no_penerimaan is not NULL order by no_penerimaan desc limit 1")->row();
        if ($row) :
            $kode = explode('/', $row->no_penerimaan);
            $get_kode = $kode[3];
        endif;
        if (!isset($get_kode)) {
            $auto = "0001";
        } else {
            $auto = str_pad((string) ($get_kode + 1), 4, "0", STR_PAD_LEFT);
        }
        $result = "GD/RCV/" . $tahun . "-" . $bulan . "/" . $auto;
        return $result;
    }

    function getDetailHargaBarangPemesanan()
    {
        $id = $_GET['id'];
        $id_kemasan = $_GET['id_kemasan'];
        $query = "select b.*, COALESCE((b.hna*k.isi*k.isi_satuan), 0) as hna, (b.hna*k.isi_satuan*k.isi) as esti, 
                k.id as id_packing, k.id_kemasan from sm_barang b
                join sm_kemasan_barang k on (b.id = k.id_barang)
                where k.id_barang = '" . $id . "' and k.id_kemasan = '" . $id_kemasan . "'";
        return $this->db->query($query);
    }
	
    function simpanDataPenerimaan() 
    {
        date_default_timezone_set('Asia/Jakarta');
        $idPenerimaan = safe_post('id');
        $jenis = safe_post('jenis');
        $noPenerimaan = $this->generateNoUrutPenerimaan();
        $tanggal = datetime2mysql(safe_post('tanggal')) . ':' . date('s');
        $jenisPenerimaan = safe_post('jenis_penerimaan');
        $idPabrik = safe_post('pabrik');
        $namaPabrik = $this->namaPabrik((int)$idPabrik);
        $noFaktur = safe_post('no_faktur');
        $idKategoriBarang = safe_post('kategori_barang');
        $idUser = $this->session->userdata('id_translucent');
        $idUnit = $this->session->userdata('id_unit');
        $ppn = safe_post('ppn');
        $materai = safe_post('materai') !== '' ? currencyToNumber(safe_post('materai')) : 0;
        $discPr = safe_post('disc_pr');
        $discRp = currencyToNumber(safe_post('disc_rp'));
        $total = currencyToNumber(safe_post('total'));
        $diterimaSemua = safe_post('diterima_semua');

        // jika id penerimaan kosong
        if ($idPenerimaan === '') :
            $this->db->trans_begin();
            $data = array(
                'no_penerimaan' => $noPenerimaan,
                'no_faktur' => $noFaktur,
                'tanggal' => $tanggal,
                'id_supplier' => (int)$idPabrik,
                'id_kategori_barang' => (int)$idKategoriBarang,
                'ppn' => (float)$ppn,
                'materai' => (float)$materai,
                'id_users' => (int)$idUser,
                'diskon_persen' => $discPr,
                'diskon_rupiah' => $discRp,
                'total' => (float)$total,
                'status' => $jenisPenerimaan,
                'id_unit' => (int)$idUnit,
                'status_penerimaan' => 'Belum',
                'diterima_semua' => $diterimaSemua,
                'jenis_penerimaan' => $jenis,
            );

            if(safe_post('jatuh_tempo') !== null && safe_post('jatuh_tempo') !== ''){

                $jatuhTempo = date2mysql(safe_post('jatuh_tempo'));
                $data['tanggal_jatuh_tempo'] = $jatuhTempo;
                
            }
        
            $this->db->insert('sm_gizi_penerimaan', $data);
            $id = $this->db->insert_id();
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $idBarang = safe_post('id_barang');
            $idKemasan = safe_post('id_kemasan');
            $noBatch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskonPr = safe_post('diskon_pr');
            // Periksa apakah $diskonPr adalah array dan jika demikian, cek setiap elemen
            if (is_array($diskonPr)) {
                // Loop melalui setiap elemen array
                foreach ($diskonPr as $key => $value) {
                    // Jika nilai kosong (""), ubah menjadi 0
                    if ($value === "") {
                        $diskonPr[$key] = 0;
                    }
                }
            }
            // Sekarang $diskonPr akan mengandung nilai-nilai yang telah dimodifikasi jika ada nilai kosong
            // var_dump($diskonPr);
            $diskonRp = safe_post('diskon_rp');
            $idPemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $pembayaran = safe_post('pembayaran');
            $keterangan = safe_post('keterangan');
            $totalBonus = 0;
            $auto = $this->db->query("select max(penerimaan_ke) as penerimaan_ke from sm_gizi_detail_penerimaan where id_penerimaan = '" . (int)$id . "' GROUP BY penerimaan_ke")->row();
            foreach ($idBarang as $key => $value) :
                $kemasanBarang = $this->db->query("select * from sm_kemasan_barang where id = '" . (int)$idKemasan[$key] . "'")->row();
                $hargaA = currencyToNumber($harga[$key]) / ($kemasanBarang->isi * $kemasanBarang->isi_satuan);
                $baseHpp = $hargaA - $hargaA * $diskonPr[$key] / 100;
                $hppPpn = $hargaA * $ppn / 100;
                $hpp = $hargaA + $hppPpn;
                $penerimaanKe = isset($auto->penerimaan_ke) ? $auto->penerimaan_ke : 1;
                date_default_timezone_set('Asia/Jakarta');
                $dataDetail = array(
                    'id_penerimaan' => (int)$id, 
                    'id_barang' => (int)$value,
                    'id_kemasan_barang' => (int)$kemasanBarang->id, 
                    'no_batch' => $noBatch[$key], 
                    'harga' => (float)$hargaA, 
                    'jumlah' => (float)$jumlah[$key], 
                    'diskon_persen' => (float)$diskonPr[$key], 
                    'diskon_rupiah' => (float)(currencyToNumber($diskonRp[$key])), 
                    'hpp' => (float)$hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                    'penerimaan_ke' => (int)$penerimaanKe + 1,
                    'pembayaran' => $pembayaran[$key],
                    'keterangan' => $keterangan[$key],
                );

                if($ed[$key] !== null && $ed[$key] !== ''){

                    $dataDetail['expired'] = date2mysql($ed[$key]);

                }                    

                $this->db->insert('sm_gizi_detail_penerimaan', $dataDetail);

                $hnaTerkecil = currencyToNumber($harga[$key]) / ($kemasanBarang->isi * $kemasanBarang->isi_satuan);
                $newHna = $hnaTerkecil + $hnaTerkecil * $ppn / 100;
                $this->db->query("update sm_barang set harga_dasar = '" . $hargaA . "', hna = '" . $baseHpp . "', hpp = '" . $hpp . "' where id = '" . (int)$value . "'");
                if ($diskonPr[$key] === "100") :
                    $totalBonus = (int)$totalBonus + $hargaA * $jumlah[$key];
                endif;
                if (0 < $diskonPr[$key] && $diskonPr[$key] < 100) :
                    $totalBonus = $totalBonus + $hargaA * $jumlah[$key];
                endif;

                // masuk ke data stok
                $masuk = $jumlah[$key] * $kemasanBarang->isi * $kemasanBarang->isi_satuan;
                date_default_timezone_set('Asia/Jakarta');
                $dataStok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => (int)$id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $noBatch[$key], 
                    'id_barang' => (int)$value, 
                    'masuk' => $masuk, 
                    'keluar' => 0,
                    'keterangan' => $namaPabrik,
                    'id_unit' => (int)$idUnit, 
                    'id_users' => (int)$idUser, 
                );
                if($ed[$key] !== null && $ed[$key] !== ''){
                    $dataStok['ed'] = date2mysql($ed[$key]);
                }
                $this->db->insert('sm_gizi_stok', $dataStok);
                $idStok = $this->db->insert_id();
                $updateDataStok['id_stok'] = (int)$idStok;
                $this->db->where('id', (int)$idStok);
                $this->db->update('sm_gizi_stok', $updateDataStok);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal menyimpan data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil menyimpan data penerimaan.';
            endif;
            $result['action'] = 'add';
        else :
            $this->db->trans_begin();
            // data penerimaan update
            $data = array(
                'no_faktur' => $noFaktur,
                'tanggal' => $tanggal,
                'id_supplier' => (int)$idPabrik,
                'id_kategori_barang' => (int)$idKategoriBarang,
                'ppn' => (float)$ppn,
                'materai' => (float)$materai,
                'id_users' => (int)$idUser,
                'diskon_persen' => (float)$discPr,
                'diskon_rupiah' => (float)$discRp,
                'total' => (float)$total,
                'status' => $jenisPenerimaan,
                'id_unit' => (int)$idUnit,
                'diterima_semua' => $diterimaSemua,
            );

            if(safe_post('jatuh_tempo') !== null && safe_post('jatuh_tempo') !== ''){
                $jatuhTempo = date2mysql(safe_post('jatuh_tempo'));
                $data['tanggal_jatuh_tempo'] = $jatuhTempo;
            }

            $this->db->where('id', (int)$idPenerimaan);
            $this->db->update('sm_gizi_penerimaan', $data);
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
            endif;
            $id = $idPenerimaan;
            $this->db->where(['id_penerimaan' => (int)$idPenerimaan])->delete('sm_gizi_detail_penerimaan');
            $this->db->where(['id_transaksi' => (int)$id, 'transaksi' => 'Penerimaan'])->delete('sm_gizi_stok');
            // data detail penerimaan update
            $idBarang = safe_post('id_barang');
            $idKemasan = safe_post('id_kemasan');
            $noBatch = safe_post('nobatch');
            $ed = safe_post('ed');
            $jumlah = safe_post('jml');
            $harga = safe_post('hna');
            $diskonPr = safe_post('diskon_pr');
            $diskonRp = safe_post('diskon_rp');
            $idPemesanan = safe_post('id_pemesanan');
            $subtotal = safe_post('subtotal');
            $pembayaran = safe_post('edit_pembayaran');
            $keterangan = safe_post('keterangan_pembayaran');
            $totalBonus = 0;

            foreach ($idBarang as $key => $value) :

                $kemasanBarang = $this->db->query("select * from sm_kemasan_barang where id = '" . (int)$idKemasan[$key] . "'")->row();
                $hargaA = currencyToNumber($harga[$key]) / ($kemasanBarang->isi * $kemasanBarang->isi_satuan);
                $baseHpp = $hargaA - $hargaA * $diskonPr[$key] / 100;
                $hppPpn = $hargaA * $ppn / 100;
                $hpp = $hargaA + $hppPpn;
                date_default_timezone_set('Asia/Jakarta');
                $dataDetail = array(
                    'id_penerimaan' => (int)$id, 
                    'id_barang' => (int)$value,
                    'id_kemasan_barang' => (int)$kemasanBarang->id, 
                    'no_batch' => $noBatch[$key], 
                    'harga' => (float)$hargaA, 
                    'jumlah' => (float)$jumlah[$key], 
                    'diskon_persen' => (float)$diskonPr[$key], 
                    'diskon_rupiah' => currencyToNumber($diskonRp[$key]), 
                    'hpp' => (float)$hpp, 
                    'tanggal_terima' => date('Y-m-d'), 
                    'pembayaran' => isset($pembayaran[$key]) ? $pembayaran[$key] : null,
                    'keterangan' => isset($keterangan[$key]) ? $keterangan[$key] : null,
                );

                if($ed[$key] !== null && $ed[$key] !== ''){
                    $dataDetail['expired'] = date2mysql($ed[$key]);
                }

                $this->db->insert('sm_gizi_detail_penerimaan', $dataDetail);
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                $hnaTerkecil = currencyToNumber($harga[$key]) / ($kemasanBarang->isi * $kemasanBarang->isi_satuan);
                $newHna = $hnaTerkecil + $hnaTerkecil * $ppn / 100;
                $this->db->query("update sm_barang set harga_dasar = '" . $hargaA . "', hna = '" . $baseHpp . "', hpp = '" . $hpp . "' where id = '" . (int)$value . "'");
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                // masuk ke data stok
                date_default_timezone_set('Asia/Jakarta');
                $masuk = (float)$jumlah[$key] * (float)$kemasanBarang->isi * (float)$kemasanBarang->isi_satuan;
                $dataStok = array(
                    'waktu' => datetime2mysql(safe_post('tanggal')) . ':' . date('s'), 
                    'id_transaksi' => (int)$id, 
                    'transaksi' => 'Penerimaan', 
                    'no_batch' => $noBatch[$key], 
                    'id_barang' => (int)$value, 
                    'masuk' => $masuk, 
                    'keluar' => 0,
                    'keterangan' => $namaPabrik,
                    'id_unit' => (int)$idUnit, 
                    'id_users' => (int)$idUser, 
                );
                
                if($ed[$key] !== null && $ed[$key] !== ''){
                    $dataStok['ed'] = date2mysql($ed[$key]);
                }

                $this->db->insert('sm_gizi_stok', $dataStok);

                $idStok = $this->db->insert_id();

                $updateDataStok['id_stok'] = (int)$idStok;

                $this->db->where('id', (int)$idStok);
                $this->db->update('sm_gizi_stok', $updateDataStok);
                
                if ($this->db->trans_status() === false) :
                    $this->db->trans_rollback();
                    $result['status'] = false;
                endif;
                if ($diskonPr[$key] === "100") :
                    $totalBonus = (int)$totalBonus + (float)$hargaA * (float)$jumlah[$key];
                endif;
            endforeach;
            if ($this->db->trans_status() === false) :
                $this->db->trans_rollback();
                $result['status'] = false;
                $result['message'] = 'Gagal mengubah data penerimaan.';
            else :
                $this->db->trans_commit();
                $result['status'] = true;
                $result['message'] = 'Berhasil mengubah data penerimaan.';
            endif;
            $result['action'] = 'update';
        endif;
        $result['id_penerimaan'] = $id;
        return $result;
    }

    function getDetailDataPenerimaan($id_penerimaan)
    {
        $sql = "select b.*, p.id_kategori_barang as jenis_penerimaan, 
                CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,''), '<small><i>', COALESCE(pb.nama,''),'</i></small>') as nama_barang,
                b.id as id_barang, stn.nama as kemasan, k.id as id_kemasan, dp.expired, COALESCE(dp.id_pemesanan,'') as id_pemesanan,
                (dp.harga * k.isi_satuan * k.isi) as harga, dp.jumlah, dp.hpp, dp.no_batch, dp.diskon_persen, dp.diskon_rupiah, dp.pembayaran as kategori_pembayaran, dp.keterangan as keterangan_pembayaran
                from sm_gizi_penerimaan p
                join sm_gizi_detail_penerimaan dp on (p.id = dp.id_penerimaan)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_translucent tr on (p.id_users = tr.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql)->result();
    }

    function getListDataFakturPenerimaan($id_penerimaan)
    {
        $sql = "select b.*, CONCAT_WS(' ',b.nama, b.kekuatan, st.nama, COALESCE(sd.nama,'')) as nama_barang, 
                p.*, pb.nama as supplier, b.id as id_barang, stn.nama as kemasan, k.id_kemasan, 
                dp.expired, dp.jumlah, dp.hpp, dp.no_batch, (dp.harga*k.isi_satuan*k.isi) as harga, 
                dp.diskon_persen, dp.diskon_rupiah, kb.kode_penerimaan, (dp.harga*dp.jumlah*k.isi*k.isi_satuan) as subtotal, 
                kb.nama as jenis_sppb, kb.jenis
                from sm_gizi_penerimaan p
                join sm_gizi_detail_penerimaan dp on (p.id = dp.id_penerimaan)
                left join sm_kategori_barang kb on (p.id_kategori_barang = kb.id)
                join sm_kemasan_barang k on (dp.id_kemasan_barang = k.id)
                join sm_barang b on (k.id_barang = b.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                left join sm_satuan st on (b.satuan_kekuatan = st.id)
                left join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_translucent u on (p.id_users = u.id)
                where p.id = '" . $id_penerimaan . "' order by p.id desc";
        return $this->db->query($sql);
    }

    function deleteDataPenerimaan($id)
    {
        $this->db->trans_begin();
        $this->db->where('id', (int)$id, true)->delete('sm_gizi_penerimaan');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
        endif;
        $this->db->where('id_transaksi', $id, true)->where('transaksi', 'Penerimaan')->delete('sm_gizi_stok');
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $result['status'] = false;
            $result['message'] = 'Gagal menghapus data penerimaan!';
        else :
            $this->db->trans_commit();
            $result['status'] = true;
            $result['message'] = 'Berhasil menghapus data penerimaan!'; 
        endif;
        return $result;
    }

    // koreksi stok
    function getSisaBarangKoreksiStok($param)
    {   
        $idUnit = (int)$this->session->userdata('id_unit');
        $this->db->select("COALESCE(sum(masuk) - sum(keluar), '0') as sisa");
        $this->db->from('sm_gizi_stok');
        $this->db->where('id_barang', $param['id_barang'], true);

        if ($param['ed'] !== '') {
            $this->db->where('id_stok', $param['ed']);
        }
		
		$this->db->where('id_unit', $this->session->userdata('id_unit'), true);
		
        // $this->db->get();
        // echo $this->db->last_query();
        return $this->db->get();
    }
    // end koreksi stok

    function getEdBarang($id_barang)
    {
        $sql = "select sum(masuk) - sum(keluar) as sisa, id_stok, waktu
                from sm_gizi_stok
                where id_barang = '".$id_barang."'
                and id_unit = '".$this->session->userdata('id_unit')."'
                group by id_stok, waktu
                having sum(masuk) - sum(keluar) > 0";
        $query['data'] = $this->db->query($sql)->result();

        foreach ($query['data'] as $key => $value){

            
            $idStok = $value->id_stok;
            $sqlEd = "select ed
                    from sm_gizi_stok
                    where id = '".$idStok."'
                    order by ed asc
                    ";
            $queryEx = $this->db->query($sqlEd)->row();

            

            $query['expired'] = $queryEx;

            

        }

        // $query['expired'] = $queryEd;

        $this->db->close();
        return $query;
    }
}