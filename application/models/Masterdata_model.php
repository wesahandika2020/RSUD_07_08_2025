<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata_model extends CI_Model
{

    function getKelamin()
    {
        $data = array(
            ''  => 'Pilih Kelamin',
            'L' => 'Laki - Laki',
            'P' => 'Perempuan'
        );

        return $data;
    }

    function getGolonganDarah()
    {
        return array(
            ''       => 'Pilih Golongan Darah',
            'O'      => 'O',
            'A'      => 'A',
            'B'      => 'B',
            'AB'     => 'AB',
            'A Rh+'  => 'A Rh+',
            'A Rh-'  => 'A Rh-',
            'B Rh+'  => 'B Rh+',
            'B Rh-'  => 'B Rh-',
            'AB Rh+' => 'AB Rh+',
            'AB Rh-' => 'AB Rh-',
            'O Rh+'  => 'O Rh+',
            'O Rh-'  => 'O Rh-',
        );
    }

    function getAgama()
    {
        $data = array(
            ''          => 'Pilih Agama',
            'Islam'     => 'Islam',
            'Kristen'   => 'Kristen Protestan',
            'Katholik'  => 'Kristen Katholik',
            'Hindu'     => 'Hindu',
            'Buddha'     => 'Buddha',
            'Konghucu'  => 'Konghucu',
            'Lain-lain' => 'Lain-lain'
        );

        return $data;
    }

    function getJenisLaboratorium()
    {
        return array(
            '' => 'Semua',
            'Patologi Klinik' => 'Patologi Klinik',
            'Patologi Anatomi' => 'Patologi Anatomi',
            'Mikrobiologi' => 'Mikrobiologi'
        );
    }

    function getJenisRadiologi()
    {
        return array(
            '' => 'Semua',
            'Radiologi' => 'Radiologi',
            'Cath Lab' => 'Cath Lab',
            'Endoskopi' => 'Endoskopi'
        );
    }

    function getJenisPendaftaran()
    {
        return array(
            ''            => 'Pilih Jenis Pendaftaran',
            'Rawat Jalan' => 'Rawat Jalan',
            'Rawat Inap'  => 'Rawat Inap'
        );
    }

    function getKelas()
    {
        return array(
            ''          => 'Semua Kelas',
            'Non Kelas' => 'Non Kelas',
            'III'       => 'III',
        );
    }

    function getBobot()
    {
        return array(
            ''       => '-',
            'Khusus' => 'Khusus',
            'Besar'  => 'Besar',
            'Sedang' => 'Sedang',
            'Kecil'  =>  'Kecil'
        );
    }

    function getKunjungan()
    {
        return array(
            ''            => 'Klinik',
            'Pasca Rawat' => 'Pasca Rawat',
            'Penunjang'   => 'Penunjang',
            'Tindakan'    => 'Tindakan'
        );
    }

    function getStatusGizi()
    {
        return array(
            'Buruk'  => 'Buruk',
            'Kurang' => 'Kurang',
            'Cukup'  => 'Cukup',
            'Lebih'  => 'Lebih'
        );
    }

    function getStatusHubunganPasien()
    {
        return array(
            '' => 'Pilih Status Hubungan',
            'Diri Sendiri' => 'Diri Sendiri',
            'Suami' => 'Suami',
            'Istri' => 'Istri',
            'Anak' => 'Anak',
            'Orang Tua' => 'Orang Tua',
            'Wali' => 'Wali',
            'Keluarga' => 'Keluarga',
        );
    }

    function getJenisSurat()
    {
        return array(
            ''  => 'Pilih Jenis Surat',
            'APS'  => 'APS',
            'APS Covid' => 'APS Covid',
        );
    }

    function getCaraBayar($with_blank = false)
    {
        $blank = array('' => 'Semua');

        $data =  array(
            'Tunai'      => 'Tunai',
            'Asuransi'   => 'Asuransi',
            'Perusahaan' => 'Perusahaan',
            'Karyawan'   => 'Karyawan',
            'Gratis'     => 'Gratis'
        );

        if ($with_blank) {
            return array_merge($blank, $data);
        } else {
            return $data;
        }
    }

    function getStatusHasil($with_blank = false)
    {
        $blank = array("" => "Semua");
        $data = array("Sudah" => "Sudah", "Belum" => "Belum");
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getKondisiKeluar($with_blank = false)
    {
        $blank = array("" => "Semua");
        $data = array(
            "Hidup" => "Hidup",
            "Meninggal" => "Meninggal",
            "Meninggal < 48 Jam" => "Meninggal < 48 Jam",
            "Meninggal > 48 Jam" => "Meninggal > 48 Jam",
        );
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getBobotExt()
    {
        return array(
            '' => '-',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        );
    }

    function getJenisPenjamin()
    {
        return array(
            '1' => 'Asuransi',
            '2' => 'Perusahaan',
            '3' => 'Karyawan',
            '4' => 'Gratis',
            '5' => 'Tunai'
        );
    }

    function getHambatanKomunikasi()
    {
        return array(
            ''            => 'Pilih Hambatan dalam Komunikasi',
            'Bahasa'      => 'Bahasa',
            'Tunarungu'   => 'Tunarungu',
            'Tunagrahita' => 'Tunagrahita (Keterbelakangan Mental)',
            'Lain - lain' => 'Lain - lain'
        );
    }

    function getOpsi()
    {
        return array(
            '1' => 'Ya',
            '0' => 'Tidak'
        );
    }

    function getDomisili()
    {
        return array(
            ''  => 'Pilih Domisili',
            '1' => 'Warga Kota Tangerang',
            '2' => 'Warga Luar Kota Tangerang',
        );
    }

    function getStatusPasien()
    {
        return array(
            '' => 'Pilih Status Pasien',
            'AN' => 'AN',
            'NY' => 'NY',
            'NN' => 'NN',
            'TN' => 'TN',
            'BY' => 'BY',
            'BY NY' => 'BY NY'
        );
    }


    function getStatusPernikahan()
    {
        return array('' => 'Pilih Status Kawin', 'Belum Kawin' => 'Belum Kawin', 'Kawin' => 'Kawin', 'Duda' => 'Duda', 'Janda' => 'Janda', 'Cerai Mati' => 'Cerai Mati');
    }

    function getStatusBed()
    {
        return array("Tersedia" => "Tersedia", "Terpakai" => "Terpakai", "Waiting" => "Waiting", "Dipesan" => "Dipesan");
    }

    function getJenisIGD()
    {
        return array("" => "- Semua -", "IGD" => "IGD", "Kamar Bersalin" => "Kamar Bersalin", "Kamar Bersalin (Rawat Gabung bayi)" => "Kamar Bersalin (Rawat Gabung bayi)", "Hemodialisa" => "Hemodialisa", "Ponek" => "Ponek", "IGD Isolasi" => "IGD Isolasi", "Rawat Inap" => "Rawat Inap");
    }

    function getJenisLayanan()
    {
        return array("" => "Semua", "rawat_jalan" => "Rawat Jalan", "rawat_inap" => "Rawat Inap", "intensive_care" => "Intensive Care");
    }

    function getJenisPelayanan()
    {
        return array("" => "Pilih", "Poliklinik" => "Poliklinik", "IGD" => "IGD", "Rawat Inap" => "Rawat Inap", "Intensive Care" => "Intensive Care");
    }

    function getJenisBimroh()
    {
        return array("" => "- Semua -", "Bimbingan Spiritual Pasien Khusus" => "Bimbingan Spiritual Pasien Khusus", "Bimbingan Spiritual Pasien Baru" => "Bimbingan Spiritual Pasien Baru");
    }

    function getJenisRawat()
    {
        return array("" => "Semua", "Rawat Jalan" => "Rawat Jalan", "Rawat Inap" => "Rawat Inap", "Intensive Care" => "Intensive Care");
    }

    function getKeteranganHasilLab()
    {
        return array("" => "Pilih", "Low" => "Low", "Neutral" => "Neutral", "High" => "High");
    }

    function getTransaksiInventory()
    {
        return array("" => "Semua Transaksi", "Penjualan" => "Penjualan", "Stok Opname" => "Stok Opname", "Penerimaan" => "Penerimaan", "Koreksi Stok" => "Koreksi Stok", "Distribusi" => "Distribusi", "Penerimaan Distribusi" => "Penerimaan Distribusi", "Pemusnahan" => "Pemusnahan", "Retur Penerimaan" => "Retur Penerimaan", "Retur Penjualan" => "Retur Penjualan");
    }

    function getUnitKasir()
    {
        $query = $this->db->order_by('urut')->get('sm_unit_kasir')->result();
        $data = array();
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getLayananRegistration($igd = null)
    {
        $sql = "select * from sm_spesialisasi where is_klinik = '1' order by nama ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Layanan -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        if ($igd !== null) :
            $data['IGD'] = 'IGD';
        endif;

        return $data;
    }

    function getLayananRegistrationPenunjang()
    {
        $sql = "select id,nama from (
                    select id,nama from sm_spesialisasi where is_klinik = '1' and id not in (58)
                    union select 59, 'Hemodialisa'
                ) z order by nama asc ";
        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Layanan -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getLayananPerInstalasi($instalasi, $where)
    {
        $sql = "select * from sm_spesialisasi where id_unit in (select id from sm_unit where id_instalasi=
                (select id from sm_instalasi where nama='" . $instalasi . "')) " . $where . " order by nama";

        $query = $this->db->query($sql)->result();
        $data =  array();
        $data[''] = '- Semua Layanan -';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getPekerjaan()
    {
        $query = $this->db->get('sm_pekerjaan')->result();
        $data =  array();
        $data[''] = 'Pilih Pekerjaan';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getPendidikan()
    {
        $query = $this->db->get('sm_pendidikan')->result();
        $data =  array();
        $data[''] = 'Pilih Pendidikan';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getDataKamarOperasi()
    {
        $query = $this->db->get('sm_ruang_operasi')->result();
        $data =  array();
        $data[''] = 'Pilih Ruang Operasi';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getDataPKRT()
    {
        $this->db->select("pk.*")
            ->join("sm_tarif_perbekalan_kesehatan AS tpk", "pk.id = tpk.id_perbekalan_kesehatan", "left")
            ->where("tpk.id is null");
        $query = $this->db->get('sm_perbekalan_kesehatan as pk')->result();
        $data =  array();
        $data[''] = '-- Pilih Barang --';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getDataKelas()
    {
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get('sm_kelas')->result();
        $data =  array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getProfesi($where = array())
    {
        $query = "";
        if (0 < count($where)) :
            $query .= "and ( ";
            foreach ($where as $key => $value) :
                if (0 < $key) :
                    $query .= " or ";
                endif;

                $query .= " id = '" . $value . "' ";
            endforeach;

            $query .= " )";
        endif;

        $sql = "select * from sm_profesi_nadis where id is not null " . $query . " order by nama";
        $profesi = $this->db->query($sql)->result();
        $data[""] = "Semua";
        foreach ($profesi as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getEtnis()
    {
        $query = $this->db->get('sm_etnis')->result();
        $data =  array();
        $data[''] = 'Pilih Etnis';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getOpsiSMF()
    {
        $query = $this->db->get('sm_staff_medis_fungsional')->result();
        $data =  array();
        $data[''] = 'Pilih';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getOpsiRawat($with_blank = false)
    {
        $blank = array("" => "Semua");
        $data = array("Jalan" => "Jalan", "Inap" => "Inap");
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getOpsiKelasInacbg($with_blank = false)
    {
        $blank = array("" => "Semua");
        $data = array(1 => "Kelas 1", 2 => "Kelas 2", 3 => "Kelas 3");
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getOpsiSatuan($view_on = '', $with_blank = false)
    {
        $blank = ['' => 'Pilih'];
        $this->db->select("id, nama")->from('sm_satuan');
        if ($with_blank !== '') :
            $this->db->where('view_on', $view_on, true);
        endif;
        $result = $this->db->get()->result();
        $data = array();
        foreach ($result as $key => $value) :
            $data[$value->nama] = $value->nama;
        endforeach;
        if ($with_blank) :
            return array_merge($blank, $data);
        endif;
        return $data;
    }

    function getAsalMasuk()
    {
        $query = $this->db->get('sm_asal_masuk')->result();
        $data =  array();
        $data[''] = 'Pilih';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getTopikEdukasi()
    {
        $query = $this->db->select('*')->from('sm_topik_edukasi')->order_by('id')->get()->result();
        return $query;
    }

    function getStatusPemeriksaan($with_blank = false)
    {
        $blank = array("" => "Semua");
        $data = array("Belum" => "Belum Diperiksa", "Sudah" => "Sudah Diperiksa", "Batal" => "Batal");
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getJenisKasusDiagnosa($with_blank = false)
    {
        $blank = array("" => "Pilih");
        $data = array("Baru" => "Baru", "Lama" => "Lama");
        if ($with_blank) {
            return array_merge($blank, $data);
        }
        return $data;
    }

    function getNextCode($table, $parent, $max_level)
    {
        $sql = "select kode from " . $table . "
                where id_parent = '" . $parent . "' 
                order by id desc limit 1 offset 0";
        $query = $this->db->query($sql)->row();

        if ($query) :
            $kode = $query->kode;
        else :
            $kode = null;
        endif;

        $new_kode = '';
        if ($kode === null) :
            // first child
            $kode = $this->db->where('id', $parent)
                ->get($table)
                ->row()
                ->kode;
            $kode_split = explode('.', $kode);
            $size = count($kode_split);

            if ($size >= $max_level) :
                $new_kode = null;
            else :
                $new_kode = $kode . ".1";
            endif;

        else :
            $kode_split = explode('.', $kode);
            $size = count($kode_split) - 1;
            $last_kode = (int) $kode_split[$size];

            $temp_kode = '';
            for ($i = 0; $i < $size; $i++) :
                $temp_kode .= $kode_split[$i] . '.';
            endfor;

            $last_kode++;
            $new_kode = $temp_kode . $last_kode;
        endif;

        return $new_kode;
    }

    function getSpesialisasi($id)
    {
        $this->db->select("sp.*, 
                    coalesce(sp.kode, '') as kode, 
                    coalesce(sp.kode_rekening, '') as kode_rekening, 
                    coalesce(sm.nama, '') as smf, 
                    coalesce(un.nama, '') as unit, 
                    coalesce(concat_ws(', ', l.nama, tp.jenis, k.nama, un.nama, tp.keterangan), '') as tarif")
            ->from('sm_spesialisasi as sp')
            ->join('sm_unit as un', 'un.id = sp.id_unit', 'left')
            ->join('sm_tarif_pelayanan as tp', 'tp.id = sp.id_tarif', 'left')
            ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_staff_medis_fungsional as sm', 'sm.id = sp.id_smf', 'left')
            ->where("sp.id", $id);
        $query = $this->db->get()->row();
        return $query;
    }

    function generateParentCode($table)
    {
        $this->db->select('kode')
            ->from($table)
            ->where('id_parent is null')
            ->order_by('id', 'desc')
            ->limit(1, 0);
        $row = $this->db->get()->row();

        if ($row) :
            $new_kode = $row->kode;
            $new_kode++;
        else :
            $new_kode = '1';
        endif;

        return $new_kode;
    }

    function getAutoProvinsi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_provinsi
                  where nama ilike ('%$q%') order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoKotaKabupaten($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select kk.*, p.nama as provinsi  from sm_kota_kabupaten kk
                join sm_provinsi p on (p.id = kk.id_provinsi)
                where kk.nama ilike ('%$q%')  order by kk.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoKecamatan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select kec.*, p.nama as provinsi, kk.nama as kotakabupaten
                from sm_kecamatan kec
                join sm_kota_kabupaten kk on (kec.id_kota_kabupaten = kk.id)
                join sm_provinsi p on (kk.id_provinsi = p.id)
                where kec.nama ilike ('%$q%')  order by kec.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoKelurahan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select kel.*, 
                coalesce(kec.nama, '') as kecamatan,
                coalesce(kk.nama, '') as kotakabupaten, 
                coalesce(p.nama, '') as provinsi
                from sm_kelurahan kel
                join sm_kecamatan kec on (kel.id_kecamatan = kec.id) 
                join sm_kota_kabupaten kk on (kk.id = kec.id_kota_kabupaten)
                join sm_provinsi p on (p.id = kk.id_provinsi)
                where kk.id in (3171, 3172, 3173, 3174, 3175, 3201, 3216, 3271, 3275, 3276, 3603, 3671, 3674) 
                and kel.nama ilike ('%$q%')  order by kel.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoJabatan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_jabatan
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoPabrik($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_pabrik
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoSupplier($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_supplier
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoJenisPemeriksaan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_jenis_pemeriksaan
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoLayanan($q, $id_jenis, $jenis, $start, $limit)
    {
        $w = "";
        if ($id_jenis !== '') :
            $w .= " and jp.id = '" . $id_jenis . "' ";
        endif;

        if ($jenis !== '') :
            $w .= " and jp.nama ilike '%" . $jenis . "%' ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;

        $sql = "select l.*, 
                coalesce(ll.nama, '<i>Tidak ada parent layanan</i>') as layanan_parent, 
                coalesce(ll.nama,'') as parent, 
                coalesce(jp.nama,'') as jenis_pemeriksaan 
                from sm_layanan l
                left join sm_layanan ll on (l.id_parent = ll.id)
                left join sm_jenis_pemeriksaan jp on (ll.id_jenis_pemeriksaan = jp.id or l.id_jenis_pemeriksaan = jp.id)
                where (l.nama ilike ('%$q%') or l.kode ilike ('$q%')) $w 
                order by l.kode ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoRekening($param, $start, $limit)
    {
        $where = NULL;
        $limitation = " limit " . $limit . " offset " . $start;
        $where .= " (nama ilike ('%" . $param['q'] . "%') or kode like ('" . $param['q'] . "%'))";

        if ($param['parent'] !== '') :
            $where .= " and (kode ilike '" . $param['parent'] . "%')";
        endif;

        if ($param['jenis'] === 'transaksi') :
            $where .= " and id not IN (select id_parent from sm_rekening where id_parent is not NULL)";
        endif;

        $sql = "select * from sm_rekening 
                where is_active = 1 and $where 
                order by kode";
        $result = $this->db->query($sql . $limitation)->result();
        // echo json_encode($result); die;
        foreach ($result as $key => $value) {
            if ($value->id_parent !== NULL) :
                $sql_child = "select count(*), coalesce(nama,'') as nama from sm_rekening where id = '" . $value->id_parent . "' group by nama";
                $result[$key]->parent = $this->db->query($sql_child)->row()->nama;
            endif;
        }

        $data['data'] = $result;
        $data['total'] = $this->db->query(sql_count_auto('sm_rekening', $where))->row()->count;
        return $data;
    }

    function getAutoPegawaiNadis($q, $start, $limit)
    {
        $limitation = " limit " . $limit . " offset " . $start;
        $p = NULL;

        $p = " and p.id not in (select id_pegawai from sm_tenaga_medis)";

        $select = "select p.*, coalesce(p.agama, '') as agama,
                coalesce(k.nama, '') as kabupaten,
                coalesce(jb.nama, '') as jabatan ";
        $count = "select count(p.id) as count ";
        $sql = "from sm_pegawai p
                left join sm_kota_kabupaten k on (k.id = p.id_kota_kabupaten)
                left join sm_jabatan jb on (jb.id = p.id_jabatan)
                where p.nama ilike ('%$q%') $p and p.status = '1'";
        $data['data'] = $this->db->query($select . $sql . $limitation)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoProfesiNadis($q, $start, $limit)
    {
        $limitation = " limit " . $limit . " offset " . $start;
        $w = " nama ilike ('%$q%')";
        $sql = "select * from sm_profesi_nadis pn
            where $w order by pn.nama";
        $data['data'] = $this->db->query($sql . $limitation)->result();
        $data['total'] = $this->db->query(sql_count_auto("sm_profesi_nadis", $w))->row()->count;
        return $data;
    }

    function getAutoPegawaiAccount($q, $start, $limit)
    {
        $limitation = " limit " . $limit . " offset " . $start;
        $p = NULL;

        $p = " and p.id not in (select id from sm_translucent)";

        $select = "select p.*, coalesce(p.agama, '') as agama, 
                coalesce(kk.nama, '') as kota_kabupaten,
                coalesce(jb.nama, '') as jabatan ";
        $count = "select count(p.id) as count ";
        $sql = "from sm_pegawai p
                left join sm_kota_kabupaten kk on (kk.id = p.id_kota_kabupaten)
                left join sm_jabatan jb on (jb.id = p.id_jabatan) 
                where p.nama ilike ('%$q%') $p";
        $data['data'] = $this->db->query($select . $sql . $limitation)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoAccountGroup($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_account_group
                  where name ilike ('%$q%')  order by name ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoUnit($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_unit
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getDataUnit($is_farmasi = NULL)
    {
        $param = NULL;
        if ($is_farmasi !== 'Gudang' && $is_farmasi !== NULL) :
            $param .= " and is_farmasi = '" . $is_farmasi . "'";
        endif;
        if ($is_farmasi === 'Gudang') :
            $param .= " and is_gudang = '1'";
        endif;
        $sql = "select * 
                from sm_unit 
                where id is not null " . $param . " 
                order by nama";
        return $this->db->query($sql);
    }

    function getAutoInstansi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_instansi
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoInstalasi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_instalasi
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoSpesialisasi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%') or kode ilike ('%$q%')) ";
        $sql = "select *, coalesce(kode, '') as kode 
                from sm_spesialisasi 
                where $w and (is_klinik = '1' or kode_bpjs ='HDL') order by nama";


        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoDokter($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis' or prn.nama = 'Dokter')
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoDokterLab($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (pg.id = '804' or pg.id = '806' or pg.id = '805' or pg.id = '803')
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getDokterSpesialistAuto($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.id, n.id_spesialisasi, pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and n.id_spesialisasi is not null
                and pg.status = '1'";

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getListAnamnesa($id_pendaftaran, $q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select anam.id, spe.nama nm_unit_layanan, peg.nama nm_dokter, anam.waktu tanggal_periksa, pen.id id_pendaftran, lpen.id id_layanan_pendaftaran ";
        $count = "select count(pen.id) as count ";
        $sql = "FROM sm_pendaftaran pen
                inner join sm_layanan_pendaftaran lpen on pen.id= lpen.id_pendaftaran
                left join sm_anamnesa anam on lpen.id=anam.id_layanan_pendaftaran
                left join sm_spesialisasi spe on spe.id=lpen.id_unit_layanan
                left join sm_tenaga_medis tm on tm.id=lpen.id_dokter
                left join sm_pegawai peg on peg.id=tm.id_pegawai
                where pen.id= $id_pendaftaran and spe.nama ilike ('%$q%') ";

        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }
    function getAutoDokteru($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select n.*,pg.id as id_pegawai, pg.nama, COALESCE(s.nama , '') as spesialisasi ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_tenaga_medis n
                join sm_pegawai pg on (pg.id = n.id_pegawai)
                left join sm_spesialisasi s on (s.id = n.id_spesialisasi)
                left join sm_profesi_nadis prn on (prn.id = n.id_profesi)
                where pg.nama ilike ('%$q%')
                and (prn.nama = 'Dokter Umum' or prn.nama = 'Dokter Spesialis')
                and pg.status = '1' ";
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    //Wa Security
    function getAutoDokterSpesialisasi($id_spesialisasi, $id_dokter)
    {
        //if($id_spesialisasi == 44) {	
        //	$this->db->select("tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi,")	
        //    ->from('sm_tenaga_medis as tm')	
        //    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')	
        //    ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')	
        //    ->where('tm.id_profesi', 8) // dokter umum	
        //    ->or_where('tm.id_profesi', 10); // dokter spesialis	
        //}else {	
        $this->db->select("tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
            ->join(" (select id_dokter,	
                    concat('(',count(status_terlayani) FILTER (where status_terlayani='Sudah'),	
                    '/',count(status_terlayani),')' ) jml_terlayani	
                    from sm_layanan_pendaftaran where to_char(tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')	
                    and konsul=0 and id_unit_layanan=$id_spesialisasi and jenis_layanan='Poliklinik'	
                    GROUP BY id_dokter) as jml", 'jml.id_dokter=tm.id', 'left')
            ->where('tm.id_spesialisasi', $id_spesialisasi);
        //}	
        if ($id_dokter !== 'null') {
            $this->db->where('tm.id', $id_dokter);
            $data = $this->db->get()->row();
        } else {
            $data = $this->db->get()->result();
        }
        return $data;
    }

    function getAutoDokterSpesialisasiJadwal($id_spesialisasi, $id_dokter)
    {
        //if($id_spesialisasi == 44) {	
        //	$this->db->select("tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi,")	
        //    ->from('sm_tenaga_medis as tm')	
        //    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')	
        //    ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')	
        //    ->where('tm.id_profesi', 8) // dokter umum	
        //    ->or_where('tm.id_profesi', 10); // dokter spesialis	
        //}else {	
        $this->db->select(" tm.*, pg.nama as dokter, coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
            ->join("sm_jadwal_dokter as jd", "tm.id = jd.id_dokter and to_char( jd.tanggal, 'YYYY-MM-DD' ) =to_char( NOW( ), 'YYYY-MM-DD' ) ", "right")
            ->join(" (select id_dokter,	
                    concat('(',count(status_terlayani) FILTER (where status_terlayani='Sudah'),	
                    '/',count(status_terlayani),')' ) jml_terlayani	
                    from sm_layanan_pendaftaran where to_char(tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')	
                    and konsul=0 and id_unit_layanan=$id_spesialisasi and jenis_layanan='Poliklinik'	
                    GROUP BY id_dokter) as jml", 'jml.id_dokter=tm.id', 'left')
            ->where('tm.id_spesialisasi', $id_spesialisasi);
        //}	
        if ($id_dokter !== 'null') {
            $this->db->where('tm.id', $id_dokter);
            $data = $this->db->get()->row();
        } else {
            $data = $this->db->get()->result();
        }
        return $data;
    }

    function getAutoPenjamin($q, $jenis, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "pj.nama ilike ('%$q%')";

        if ($jenis === 'Asuransi') {
            $w .=  " and jp.kode = '1'";
        } else if (($jenis === 'Perusahaan') | ($jenis === 'Perusahaan')) {
            $w .=  " and jp.kode = '2'";
        } else if ($jenis === 'Karyawan') {
            $w .=  " and jp.kode = '3'";
        } else if ($jenis === 'Gratis') {
            $w .=  " and jp.kode = '4'";
        } else if ($jenis === 'Tunai') {
            $w .=  " and jp.kode = '5'";
        }

        $sql = "select pj.*, jp.nama as jenis
                from sm_penjamin as pj
                join sm_jenis_penjamin as jp on (jp.id = pj.id_jenis_penjamin) 
                where $w and pj.is_active = '1'
                order by pj.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getJnsLaboratorium($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;

        $select = "select sjl.*";
        $count = "select count(sjl.id) as count ";
        $sql = "from sm_jenis_lab as sjl 
                where sjl.nama ilike ('%" . $q . "%') ";
        $order = " order by sjl.nama";
        // echo $select.$sql; die;
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getIdLab($id)
    {

        return $this->db->select("sjl.id_lab")
            ->from('sm_jenis_lab as sjl')
            ->where('sjl.id', $id, true)
            ->order_by('sjl.id asc')
            ->get()
            ->row();
        $this->db->close();
    }

    function getTarifTindakanLab($q, $id_lab, $jenis_pemeriksaan, $jenis_tindakan, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($jenis_pemeriksaan !== "") :
            $where .= " and jp.nama = '" . $jenis_pemeriksaan . "' ";
        endif;
        if ($jenis_tindakan !== "") :
            $where .= " and tp.jenis = '" . $jenis_tindakan . "' ";
        endif;
        if ($id_lab !== '1677') {

            $where .= " and l.id_parent = '" . $id_lab . "' ";
        } else {

            $where .= " and (l.id_parent = 1683 or l.id_parent = 1690) ";
        }


        $select = "select tp.*, CASE WHEN tp.jenis IS NULL THEN ('') ELSE tp.jenis END as jenis, jp.nama as jenis_pemeriksaan,
                case when ll.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i>',ll.nama,'</i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan, 
                coalesce(un.nama, '<i>Semua Instalasi</i>') as unit, COALESCE(k.nama, '') as kelas ";
        $count = "select count(tp.id) as count ";
        $sql = "from sm_tarif_pelayanan as tp 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                where tp.id is not null " . $where . " and tp.is_active = '1' and l.nama ilike ('%" . $q . "%') ";
        $order = " order by l.nama";
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoTarifPelayanan($q, $jenis_pemeriksaan, $jenis_tindakan, $kelas, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $where = "";
        if ($jenis_pemeriksaan !== "") :
            $where .= " and jp.nama = '" . $jenis_pemeriksaan . "' ";
        endif;
        if ($jenis_tindakan !== "") :
            $where .= " and tp.jenis = '" . $jenis_tindakan . "' ";
        endif;
        if ($kelas !== "") :
            $where .= " and (tp.id_kelas = '" . $kelas . "' or tp.id_kelas is null) ";
        endif;

        $select = "select tp.*, CASE WHEN tp.jenis IS NULL THEN ('') ELSE tp.jenis END as jenis, jp.nama as jenis_pemeriksaan,
                case when ll.nama is not null then concat_ws(', ', l.nama, concat_ws('', '<i>',ll.nama,'</i>'), tp.keterangan) else concat_ws(', ', l.nama, tp.keterangan) end as layanan, 
                coalesce(un.nama, '<i>Semua Instalasi</i>') as unit, COALESCE(k.nama, '') as kelas ";
        $count = "select count(tp.id) as count ";
        $sql = "from sm_tarif_pelayanan as tp 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                where tp.id is not null " . $where . " and tp.is_active = '1' and l.nama ilike ('%" . $q . "%') ";
        $order = " order by l.nama";
        // echo $select.$sql; die;
        $data['data'] = $this->db->query($select . $sql . $order . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoTarifPemeriksaan($q, $kelas, $penjamin, $jenis, $unit, $start, $limit)
    {
        $this->db->select("tp.*, k.nama as kelas,
                        l.nama as layanan, 
                        coalesce(ll.nama, '<i>Tidak ada parent layanan</i>', concat_ws('', '<i>',ll.nama,'</i>')) as layanan_parent,
                        coalesce(un.nama) as instalasi")
            ->from('sm_tarif_pelayanan as tp')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan')
            ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
            ->join('sm_layanan as ll', 'll.id = l.id_parent', 'left')
            ->join('sm_jenis_pemeriksaan as jp', 'jp.id = l.id_jenis_pemeriksaan', 'left')
            ->join('sm_unit as un', 'un.id = tp.id_unit', 'left');

        if ($kelas !== '') :
            $this->db->group_start();
            $this->db->where('tp.id_kelas', $kelas);
            $this->db->or_where('tp.id_kelas is null');
            $this->db->group_end();
        endif;

        if ($penjamin !== '') :
            $this->db->join('sm_tarif_penjamin as tpj', 'tpj.id_tarif_pelayanan = tp.id');
            $this->db->where('tp.id_penjamin', $penjamin);
        endif;

        if ($unit !== '') :
            $this->db->group_start();
            $this->db->where('tp.id_unit', $unit);
            $this->db->or_where('tp.id_unit is null');
            $this->db->group_end();
        endif;

        if ($jenis !== '') :
            $this->db->where('tp.jenis', $jenis);
        endif;

        $this->db->where('tp.is_active', '1');
        $this->db->where('l.nama ilike ', "%" . $q . "%");
        $this->db->group_start();
        $this->db->like('jp.nama', 'Pemeriksaan dan Konsultasi');
        $this->db->or_like('jp.nama', 'Tindakan Poliklinik');
        $this->db->or_like('jp.nama', 'Tindakan Rawat Darurat');
        $this->db->or_like('jp.nama', 'Pelayanan Rawat Inap');
        $this->db->or_like('jp.nama', 'Pelayanan Intensive Care');
        $this->db->or_like('jp.nama', 'Pelayanan Pemulasaran Jenazah');
        $this->db->or_like('jp.nama', 'Pelayanan Rehabilitasi Medik');
        $this->db->or_like('jp.nama', 'Penunjang Diagnostik');
        $this->db->group_end();

        $this->db->limit($limit, $start);
        $this->db->order_by('l.nama');
        // $this->db->group_by('l.nama');

        // $this->db->get();
        // echo $this->db->last_query(); die;

        $data['data'] = $this->db->get()->result();
        $data['total'] = $this->db->get('sm_tarif_pelayanan')->num_rows();

        return $data;
    }

    function getAutoTarifPemeriksaanV2($q, $kelas, $penjamin, $jenis, $unit, $start, $limit)
    {
        $where = "";
        $filter_penjamin = "";
        if ($kelas !== "") :
            $where .= " (tp.id_kelas = '" . $kelas . "' or tp.id_kelas is null) and ";
        endif;
        if ($penjamin !== "") :
            $filter_penjamin .= " join sm_tarif_penjamin as tpj on (tpj.id_tarif_pelayanan = tp.id)";
            $where .= " tp.id_penjamin = '" . $penjamin . "' and ";
        endif;
        if ($unit !== "") :
            $where .= " (tp.id_unit = '" . $unit . "' or tp.id_unit is null) and ";
        endif;
        if (isset($jenis) && $jenis !== "") :
            $jenis == 'Poliklinik' ? $jenis = 'Rawat Jalan' : '';
            $where .= " tp.jenis = '" . $jenis . "' and ";
        endif;
        $where .= " (
            jp.nama ilike '%Pemeriksaan dan Konsultasi%'
            or jp.nama ilike '%Medical Check Up%'    
            or jp.nama ilike '%Tindakan Poliklinik%'    
            or jp.nama ilike '%Tindakan Gawat Darurat (IGD)%'    
            or jp.nama ilike '%Pelayanan Rawat Inap%'    
            or jp.nama ilike '%Pelayanan Intensive Care%'    
            or jp.nama ilike '%Pelayanan Rehabilitasi Medik%'
            or jp.nama ilike '%Pelayanan Keperawatan%'
            or jp.nama ilike '%Pelayanan Laboratorium%'
            or jp.nama ilike '%Pelayanan Radiologi%'
            or jp.nama ilike '%Pelayanan Pemulasaran Jenazah%'
			or jp.nama ilike '%Penunjang Diagnostik%'
			or jp.nama ilike '%Pelayanan Hemodialisa%'
			) and ";
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select DISTINCT ON (l.nama) tp.*, k.nama as kelas,
                l.nama as layanan, 
                coalesce(ll.nama, '<i>Tidak ada parent layanan</i>', concat_ws('', '<i>',ll.nama,'</i>')) as layanan_parent,
                coalesce(un.nama) as instalasi
                from sm_tarif_pelayanan as tp 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit)
                where " . $where . " l.nama ilike ('%" . $q . "%') and tp.is_active = '1' 
                order by l.nama";

        // echo $sql; die;
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoTarifPemeriksaanMcu($q, $kelas, $penjamin, $jenis, $unit, $mcu, $start, $limit)
    {
        $where = "";
        $filter_penjamin = "";
        if ($kelas !== "") :
            $where .= " (tp.id_kelas = '" . $kelas . "' or tp.id_kelas is null) and ";
        endif;
        if ($penjamin !== "") :
            $filter_penjamin .= " join sm_tarif_penjamin as tpj on (tpj.id_tarif_pelayanan = tp.id)";
            $where .= " tp.id_penjamin = '" . $penjamin . "' and ";
        endif;
        if ($unit !== "") :
            $where .= " (tp.id_unit = '" . $unit . "' or tp.id_unit is null) and ";
        endif;
        if (isset($jenis) && $jenis !== "") :
            $where .= " tp.jenis = '" . $jenis . "' and ";
        endif;
        if (isset($mcu) && $mcu === "paket") :
            $where .= " (l.id_parent='121') and ";
        else :
            $where .= " (l.id_parent<>'121' OR l.id_parent IS NULL ) and  ";
        endif;
        $where .= " (
            jp.nama ilike '%Pemeriksaan dan Konsultasi%'
            or jp.nama ilike '%Medical Check Up%'    
            or jp.nama ilike '%Tindakan Poliklinik%'    
            or jp.nama ilike '%Tindakan Gawat Darurat (IGD)%'    
            or jp.nama ilike '%Pelayanan Rawat Inap%'    
            or jp.nama ilike '%Pelayanan Intensive Care%'    
            or jp.nama ilike '%Pelayanan Rehabilitasi Medik%'
            or jp.nama ilike '%Pelayanan Keperawatan%'
            or jp.nama ilike '%Pelayanan Laboratorium%'
            or jp.nama ilike '%Pelayanan Radiologi%'
            or jp.nama ilike '%Pelayanan Pemulasaran Jenazah%') and ";
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select DISTINCT ON (l.nama) tp.*, k.nama as kelas,
                l.nama as layanan, 
                coalesce(ll.nama, '<i>Tidak ada parent layanan</i>', concat_ws('', '<i>',ll.nama,'</i>')) as layanan_parent,
                coalesce(un.nama) as instalasi
                from sm_tarif_pelayanan as tp 
                join sm_layanan as l on (l.id = tp.id_layanan) 
                left join sm_kelas as k on (k.id = tp.id_kelas) 
                left join sm_layanan as ll on (ll.id = l.id_parent) 
                left join sm_jenis_pemeriksaan as jp on (jp.id = l.id_jenis_pemeriksaan) 
                left join sm_unit as un on (un.id = tp.id_unit)
                where " . $where . " l.nama ilike ('%" . $q . "%') and tp.is_active = '1' 
                order by l.nama";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getAutoGolonganSebabSakit($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_golongan_sebab_sakit
                  where (nama ilike ('%$q%') or kode_icdx ilike ('%$q%') or kode_icdx_rinci ilike ('%$q%'))
                  and versi_tahun = '2010'
                  order by kode_icdx_rinci ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getStandarDiagnosis($params, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select tm.*
                  from sm_masalah_keperawatan as tm
                  where tm.nama ilike ('%" . $params . "%') order by tm.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
        // $this->db->query($sql . $limit);
        // echo $this->db->last_query(); die;
    }

    function getAutoNadis($params, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $q = '';
        if ($params['jenis'] !== '') :
            if ($params['jenis'] === 'medis') :
                $q .= " and pn.id in ('8', '10', '15', 18)";
            elseif ($params['jenis'] === 'bidan_perawat') :
                $q .= " and pn.id in ('18', '15')";
            elseif ($params['jenis'] === 'spesialis_anak') :
                $q .= " and tm.id_spesialisasi in ('11', '55', '51')";
            else :
                if ($params['jenis'] === '1') :
                    $q .= " and pn.id in ('8', '10')";
                else :
                    $q .= " and pn.id = '" . $params['jenis'] . "' ";
                endif;
            endif;
        endif;
        $sql   = "select tm.*, pg.nama, coalesce(s.nama, '') as spesialisasi 
                  from sm_tenaga_medis as tm
                  join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
                  left join sm_spesialisasi as s on (s.id = tm.id_spesialisasi) 
                  left join sm_profesi_nadis as pn on (pn.id = tm.id_profesi)  
                  where pg.nama ilike ('%" . $params['q'] . "%') and pg.status = '1' " . $q . " order by pg.nama";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
        // $this->db->query($sql . $limit);
        // echo $this->db->last_query(); die;
    }

    function getNadis($id)
    {
        return $this->db->select("tm.*, pg.nik, pg.nama, pg.alamat, pg.telp, pg.kelamin,
                                coalesce(pn.nama, '-') as profesi,
                                coalesce(sp.nama, '') as spesialisasi")
            ->from('sm_tenaga_medis as tm')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
            ->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left')
            ->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi')
            ->where('tm.id', $id)
            ->get()
            ->row();
    }

    function kategoriBarangLoadData($jenis = NULL)
    {
        $q = NULL;
        if ($jenis !== "") :
            $q .= " where jenis = '" . $jenis . "'";
        endif;
        $sql = "select * from sm_kategori_barang " . $q . " order by jenis, id";
        return $this->db->query($sql);
    }

    function kategoriBarangLoadData2()
    {
        $sql = "select jenis from sm_kategori_barang group by jenis";
        $result = $this->db->query($sql)->result();
        foreach ($result as $i => $value) :
            $sql_child = "select id, nama from sm_kategori_barang where jenis = '" . $value->jenis . "' order by jenis, id";
            $result[$i]->kategori = $this->db->query($sql_child)->result();
        endforeach;
        return $result;
    }

    function bidangLoadData($status = true)
    {
        if ($status === false) :
            return $this->db->query("select * from sm_bidang where nama != 'Semua' and id_parent is not NULL");
        endif;
        return $this->db->get("sm_bidang");
    }

    function satuanKekuatanLoadData($jenis = NULL, $status = NULL)
    {
        $q = NULL;
        $param = NULL;

        if ($jenis != NULL) :
            $param = "view_on = '" . $jenis . "' ";
        else :
            $param = "view_on = 'Inventory' ";
        endif;
        if ($status != NULL) :
            $q = "and is_satuan_kemasan = '" . $status . "' ";
        endif;
        $sql = "select * from sm_satuan where " . $param . $q . " order by nama asc";
        return $this->db->query($sql);
    }

    function sediaanLoadData($status = NULL)
    {
        $q = NULL;
        if ($status != NULL) :
            $q = "where id = '" . $status . "'";
        endif;
        $sql = "select * from sm_sediaan " . $q . " order by nama asc";
        return $this->db->query($sql);
    }

    function roaLoadData()
    {
        return array("Oral", "Rektal", "Infus", "Topikal", "Sublingual", "Transdermal", "Intrakutan", "Subkutan", "Intravena", "Intramuskuler", "Vagina", "Injeksi", "Intranasal", "Intraokuler", "Intraaurikuler", "Intrapulmonal", "Implantasi", "Chewing Gum", "Intralumbal", "Intrarteri", "Inhalasi", "Instillation", "Inhalation Powder", "Inhalation Aerosol", "Inhalation Solution", "Uretra", "Transdermal patch", "Intravesical", "Instillation solution", "Ophtalmic", "Aerosol oral", "Kutanea (kulit)", "Stomatologic");
    }

    function golonganLoadData()
    {
        $sql = "select * from sm_golongan order by nama asc";
        return $this->db->query($sql);
    }

    function getAutoFarmakoterapi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "nama ilike ('%" . $q . "%') or kode ilike ('%" . $q . "%')";
        $sql = "select * from sm_farmakoterapi where " . $w . " order by nama";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query(sql_count_auto("sm_farmakoterapi", $w))->row()->count;
        return $data;
    }

    function getAutoBarang($search, $start, $limit)
    {
        $q = NULL;
        if ($search["penjamin"] !== "") {
            $q .= " and bp.id_penjamin = '" . $search["penjamin"] . "'";
        }
        if ($search["jenissppb"] !== "") {
            $q .= " and b.id_kategori = '" . $search["jenissppb"] . "'";
        }
        if ($search["katastropik"] !== "") {
            $q .= " and b.katastropik = 'Ya'";
        }
        if ($search["golongan"] !== "") {
            if ($search["golongan"] === "antibiotik") {
                $q .= " and b.antibiotik = 'Ya'";
            } else {
                $q .= " and b.id_golongan = '" . $search["golongan"] . "'";
            }
        }
        if ($search["jenis_barang"] !== "") {
            $q .= " and kb.jenis = '" . $search["jenis_barang"] . "'";
        }
        if ($search["aktif"] !== "") {
            $q .= " and b.aktif = '" . $search["aktif"] . "'";
        }
        $limitation = " limit " . $limit . " offset " . $start;
        $select = "select b.*, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, b.nama as nama_barang, sd.nama as sediaan ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                left join sm_barang_penjamin bp on (bp.id_barang = b.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where (b.nama_lengkap ilike '%" . $search["search"] . "%' or b.nama ilike '%" . $search["search"] . "%' ) " . $q . "
                ";

        $order = " order by b.nama ";
        $data["data"] = $this->db->query($select . $sql . $order . $limitation)->result();
        $data["total"] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoBarangStok($search, $start, $limit)
    {
        $q = NULL;
        $having = NULL;
        if ($search["penjamin"] !== "") :
        endif;
        if ($search["cekstok"] !== "") :
        endif;
        if ($search["is_farmasi"] !== "") :
            $q .= " and kb.jenis = 'Farmasi'";
        endif;

        $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
        if ($check->id_unit_default === NULL) :
            $id_unit = $this->session->userdata("id_unit");
        else :
            $id_unit = $check->id_unit_default;
        endif;

        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by b.nama";
        $select = "select b.*, bu.id_unit, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, 
                    (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                join sm_barang_unit bu on (bu.id_barang = b.id)
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                join sm_kemasan_barang k on (k.id_barang = b.id)
                join sm_satuan stn on (k.id_kemasan = stn.id)
                left join sm_sediaan sd on (b.id_sediaan = sd.id)
                left join sm_pabrik pb on (b.id_pabrik = pb.id)
                where k.default_kemasan = '1'
                and b.id_kategori != '7'
                and b.is_active = 'Ya'
                and bu.id_unit = " . $id_unit . "
                and b.nama ilike ('" . $search["search"] . "%') " . $q;
        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        foreach ($result as $key => $value) :
            $sql_child = "select COALESCE(SUM(masuk)-SUM(keluar), 0.00) as sisa
                        from sm_stok
                        where id_barang = '" . $value->id . "'
                        and ed > '" . date("Y-m-d") . "'
                        and id_unit = '" . $value->id_unit . "'";
            $result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
        endforeach;

        $data["data"] = $result;
        $data["total"] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    // function getAutoBarangStok2($search, $start, $limit)
    // {
    //     $q = NULL;
    //     $having = NULL;
    //     if ($search["penjamin"] !== "") :
    //     endif;
    //     if ($search["cekstok"] !== "") :
    //     endif;
    //     if ($search["is_farmasi"] !== "") :
    //         $q .= " and kb.jenis = 'Farmasi'";
    //     endif;
    //     $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
    //     if ($check->id_unit_default === NULL) :
    //         $id_unit = $this->session->userdata("id_unit");
    //     else :
    //         $id_unit = $check->id_unit_default;
    //     endif;

    //     $limitation = " limit " . $limit . " offset " . $start;
    //     $order = " order by b.nama";
    //     $select = "select b.*, 
    //                 bu.id_unit, b.nama_lengkap as nama,
    //                 COALESCE(s.nama,'') as satuan_kekuatan, 
    //                 (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
    //     $count = "select count(*) as count ";
    //     $sql = "from sm_barang b
    //             join sm_barang_unit bu on (bu.id_barang = b.id)
    //             join sm_kategori_barang kb on (b.id_kategori = kb.id)
    //             left join sm_satuan s on (b.satuan_kekuatan = s.id)
    //             where b.is_active = 'Ya'
    //             and b.id_kategori != '7'
    //             and bu.id_unit = '" . $id_unit . "'
    //             and b.nama ilike ('%" . $search["search"] . "%') " . $q;
    //     $result = $this->db->query($select . $sql . $order . $limitation)->result();
    //     // echo $this->db->last_query(); die;
    //     foreach ($result as $key => $value) :
    //         $sql_child = "select COALESCE(SUM(masuk)-SUM(keluar),0) as sisa
    //                     from sm_stok 
    //                     where id_barang = '" . $value->id . "'
    //                     and ed > '" . date("Y-m-d") . "'
    //                     and id_unit = '" . $value->id_unit . "'";
    //         $result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
    //     endforeach;

    //     $hasil = array();
    //     foreach ($result as $i => $val) :
    //         if (0 < (double) $val->sisa && $val->sisa !== "") :
    //             $hasil[] = $val;
    //         endif;
    //     endforeach;

    //     $data["id_unit"] = $id_unit;
    //     $data["data"] = $hasil;
    //     $data["total"] = count($hasil);
    //     return $data;
    // }

    function getAutoBarangStok2($search, $start, $limit)
    {
        $q = NULL;
        $having = NULL;
        if ($search["penjamin"] !== "") :
        endif;
        if ($search["cekstok"] !== "") :
        endif;
        if ($search["is_farmasi"] !== "") :
            $q .= " and kb.jenis = 'Farmasi'";
        endif;
        $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
        if ($check->id_unit_default === NULL) :
            $id_unit = $this->session->userdata("id_unit");
        else :
            $id_unit = $check->id_unit_default;
        endif;

        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by b.nama";
        $select = "select b.*, 
                     bu.id_unit, b.nama_lengkap as nama,
                     COALESCE(s.nama,'') as satuan_kekuatan, 
                     (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                 join sm_barang_unit bu on (bu.id_barang = b.id)
                 join sm_kategori_barang kb on (b.id_kategori = kb.id)
                 left join sm_satuan s on (b.satuan_kekuatan = s.id)
                 where b.is_active = 'Ya'
                 and b.id_kategori != '7'
                 and bu.id_unit = '" . $id_unit . "'
                 and b.nama ilike ('%" . $search["search"] . "%') " . $q;
        $result = $this->db->query($select . $sql . $order . $limitation)->result();

        // echo $this->db->last_query(); die;
        foreach ($result as $key => $value) :
            $sql_child = "select COALESCE(SUM(masuk)-SUM(keluar),0) as sisa
                         from sm_stok
                         where id_barang = '" . $value->id . "'
                         and ed > '" . date("Y-m-d") . "'
                         and id_unit = '" . $value->id_unit . "'";
            $result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
        endforeach;

        foreach ($result as $val) :
            if (0 < (float) $val->sisa && $val->sisa !== "") {
                $val->disabled = false;
            } else {
                $val->disabled = true;
            }
        endforeach;

        usort($result, function ($a, $b) {
            return $b->sisa - $a->sisa;
        });

        $data["id_unit"] = $id_unit;
        $data["data"] = $result;
        $data["total"] = count($result);
        return $data;
    }

    function getAutoBarangDarah($search, $start, $limit)
    {
        $q = NULL;
        $having = NULL;
        if ($search["penjamin"] !== "") :
        endif;
        if ($search["cekstok"] !== "") :
        endif;
        $q .= " and kb.jenis = 'Bank Darah'";
        $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
        if ($check->id_unit_default === NULL) :
            $id_unit = $this->session->userdata("id_unit");
        else :
            $id_unit = $check->id_unit_default;
        endif;

        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by b.nama";
        $select = "select b.*, 
                    bu.id_unit, b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan, 
                    (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual ";
        $count = "select count(*) as count ";
        $sql = "from sm_barang b
                join sm_barang_unit bu on (bu.id_barang = b.id)
                join sm_kategori_barang kb on (b.id_kategori = kb.id)
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                where b.is_active = 'Ya'
                and bu.id_unit = '" . $id_unit . "'
                and b.nama ilike ('" . $search["search"] . "%') " . $q;
        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        // echo $this->db->last_query(); die;
        foreach ($result as $key => $value) :
            $sql_child = "select COALESCE(SUM(masuk)-SUM(keluar),0) as sisa
                        from sm_stok_bank_darah 
                        where id_barang = '" . $value->id . "'
                        and ed > '" . date("Y-m-d") . "'";
            $result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
        // echo $this->db->last_query(); die;
        endforeach;

        $hasil = array();
        foreach ($result as $i => $val) :
            if (0 < (float) $val->sisa && $val->sisa !== "") :
                $hasil[] = $val;
            endif;
        endforeach;

        $data["data"] = $hasil;
        $data["total"] = count($hasil);
        return $data;
    }

    function getObatKeperawatan($search, $start, $limit)
    {


        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by b.nama ";
        $select = "select b.*, 
                    b.nama_lengkap as nama,
                    COALESCE(s.nama,'') as satuan_kekuatan ";
        $sql = "from sm_barang b
                left join sm_satuan s on (b.satuan_kekuatan = s.id)
                where b.is_active = 'Ya'
                and b.nama ilike ('" . $search["search"] . "%') ";
        $result = $this->db->query($select . $sql . $order . $limitation)->result();
        // echo $this->db->last_query(); die;
        $data["data"] = $result;
        $data["total"] = count($result);
        return $data;
    }

    function getAutoAturanPakai($q, $start, $limit)
    {
        $src = "";
        $limitation = " limit " . $limit . " offset " . $start;
        $count = "select count(id) as count ";
        $select = "select * ";
        $sql = "from sm_aturan_pakai_obat 
                where id is not NULL and replace(signa, ' ', '') ilike ('%" . str_replace(' ', '', $q["search"]) . "%') " . $src . " 
                and is_active = 1 
                group by id, selected_count 
                order by case when selected_count is null then 1 else 0 end, 
                selected_count desc";
        $data["data"] = $this->db->query($select . $sql . $limitation)->result();
        $data["total"] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    function getAutoBangsal($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "nama ilike ('%" . $q . "%') or kode ilike ('%" . $q . "%')";
        // $sql = "select * from sm_bangsal where " . $w . " order by nama";
        $sql = "select * from sm_bangsal where (" . $w . ") and is_active != 'Tidak' order by nama";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query(sql_count_auto("sm_bangsal", $w))->row()->count;
        return $data;
    }

    function getAutoBangsalRanap($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "nama ilike ('%" . $q . "%') or kode ilike ('%" . $q . "%')";
        $sql = "select * from sm_bangsal where (" . $w . ") and is_active != 'Tidak' AND keterangan!= 'Intensive Care' order by nama";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query(sql_count_auto("sm_bangsal", $w))->row()->count;
        return $data;
    }

    function getAutoKamar($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $select = "select ru.id, concat_ws(' ruang ' ,concat_ws(' kelas ', bg.nama, k.nama),ru.no_ruang) as nama ";
        // $count = "select count(ru.id) as count ";
        $sql = "from sm_ruang ru
                join sm_bangsal bg on (ru.id_bangsal = bg.id)
                join sm_kelas k on (ru.id_kelas = k.id)
                where concat_ws(' ruang ' ,concat_ws(' kelas ', bg.nama, k.nama),ru.no_ruang) ilike ('%" . $q . "%') 
                group by ru.id, bg.nama, k.nama, ru.no_ruang
                order by concat_ws(' ', bg.nama, k.nama, ru.no_ruang)";
        $data["data"] = $this->db->query($select . $sql . $limit)->result();
        $data["total"] = $this->db->query($select . $sql)->num_rows();
        $this->db->close();
        return $data;
    }

    function getAutoKamarOperasi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql = "select * from sm_ruang_operasi
                where nama ilike ('%" . $q . "%') 
                order by nama";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query($sql)->num_rows();
        $this->db->close();
        return $data;
    }

    function getAutoSatuan($q, $view_on, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "nama ilike ('%" . $q . "%')";
        if ($view_on) :
            $w .= " and view_on = '" . $view_on . "' ";
        endif;
        $sql = "select * from sm_satuan where " . $w . " order by nama";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query(sql_count_auto("sm_satuan", $w))->row()->count;
        return $data;
    }

    function getDataDropdownBangsalUnit($param = NULL)
    {
        $where = " where is_active = 'Ya' and id_unit = $_SESSION[id_unit]";
        // $where = " where id_unit = $_SESSION[id_unit]";
        if ($param !== NULL) {
            $where .= "and nama ilike '%" . $param . "%'";
        }

        $sql = "select * from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        // $data[""] = "Semua Bangsal...";
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getDataDropdownBangsal($param = NULL)
    {
        $where = " where is_active = 'Ya' ";
        if ($param !== NULL) {
            $where .= "and nama ilike '%" . $param . "%'";
        }

        $sql = "select * from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        $data[""] = "Semua Bangsal...";
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getDataDropdownBangsalRanap($param = NULL)
    {
        $where = " where is_active = 'Ya' ";
        if ($param !== NULL) {
            $where .= "and id in (" . $param . ")";
        } else {
            $data[""] = "Semua Bangsal...";
        }

        $sql = "select * from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getDataDropdownBangsalIcare($param = NULL)
    {
        $where = " where is_active = 'Ya' and keterangan = 'Intensive Care' ";
        if ($param !== NULL) {
            $where .= "and nama ilike '%" . $param . "%'";
        }

        $sql = "select * from sm_bangsal " . $where . " order by nama";

        $bangsal = $this->db->query($sql)->result();
        $data[""] = "Semua Bangsal...";
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getDataBangsalReady($param = NULL)
    {
        $where = " where bg.is_active = 'Ya' ";
        if ($param !== NULL) {
            $where .= " and (bg.id = '" . $param . "'";
            $where .= " and bg.nama ilike '%" . $param . "%')";
        }

        $sql = "select bg.* 
                from sm_bangsal as bg 
                join sm_ruang as ru on (ru.id_bangsal = bg.id) 
                join sm_tarif_kamar_ranap as tkr on (tkr.id_bangsal = ru.id_bangsal) 
                " . $where . "
                order by bg.nama";

        $bangsal = $this->db->query($sql)->result();
        $data[""] = "Semua Bangsal...";
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getDataBangsalReadyJSON($param = NULL)
    {
        $where = " where bg.is_active = 'Ya' ";
        if ($param !== NULL) {
            $where .= " and bg.id = '" . $param . "'";
        }

        $sql = "select DISTINCT ON(bg.id) bg.* 
                from sm_bangsal as bg 
                join sm_ruang as ru on (ru.id_bangsal = bg.id) 
                join sm_tarif_kamar_ranap as tkr on (tkr.id_bangsal = ru.id_bangsal) 
                " . $where . "
                order by bg.id, bg.nama";
        $bangsal = $this->db->query($sql)->result();
        return $bangsal;
    }

    function getDataBangsalIntensive($param = NULL)
    {
        $where = " where bg.is_active = 'Ya' and bg.keterangan = 'Intensive Care'";
        if ($param !== NULL) {
            $where .= " and (bg.id = '" . $param . "'";
            $where .= " and bg.nama ilike '%" . $param . "%')";
        }

        $sql = "select bg.* 
                from sm_bangsal as bg 
                join sm_ruang as ru on (ru.id_bangsal = bg.id) 
                join sm_tarif_kamar_ranap as tkr on (tkr.id_bangsal = ru.id_bangsal) 
                " . $where . "
                order by bg.nama";

        $bangsal = $this->db->query($sql)->result();
        $data[""] = "Semua Bangsal...";
        foreach ($bangsal as $key => $value) {
            $data[$value->id] = $value->nama;
        }

        return $data;
    }

    function getAutoTopikEdukasi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = "nama ilike ('%" . $q . "%') ";
        $sql = "select * from sm_topik_edukasi where " . $w . " order by id";
        $data["data"] = $this->db->query($sql . $limit)->result();
        $data["total"] = $this->db->query(sql_count_auto("sm_topik_edukasi", $w))->row()->count;
        return $data;
    }

    function getDataPegawai($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_pegawai WHERE id_jabatan='103' AND 
        nama like '$q%' order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getPaketMcu($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_paket WHERE is_active = '1' AND 
        nama like '%$q%' order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function getTempatLayanan()
    {
        $query = $this->db->get('sm_spesialisasi')->result();
        $data =  array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) :
            $data[$value->nama] = $value->nama;
        endforeach;

        return $data;
    }


    function getPenjaminLaporan($with_blank = false)
    {
        $query = $this->db->get('sm_penjamin')->result();
        $data =  array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getTempatLayananInap()
    {
        $query = $this->db->get('sm_bangsal')->result();
        $data =  array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) :
            $data[$value->nama] = $value->nama;
        endforeach;

        return $data;
    }

    function getTempatLayananRajal()
    {
        $query = $this->db->order_by('nama', 'asc')->get('sm_spesialisasi')->result();
        $data =  array();
        $data[''] = 'Semua';
        foreach ($query as $key => $value) :
            $data[$value->nama] = $value->nama;
        endforeach;

        return $data;
    }

    function getJenisLayananLaporan()
    {
        return array(
            ''       => 'Semua',
            '1'      => 'Rawat Jalan',
            '2'      => 'Rawat Inap',
            '3'      => 'IGD',
            '4'      => 'Penunjang',
        );
    }

    function getJenisLaporan()
    {
        return array(
            ''       => '-- Pilih Laporan Rekam Medis --',
            '1'      => 'Daftar Verifikasi Diagnosis PP',
            '2'      => 'Laporan Masuk Rawat Inap',
            '3'      => 'Laporan Keluar Rawat Inap',
            '4'      => 'Laporan Pasien Masih di Rawat Inap',
            '5'      => 'Laporan W2',
            '6'      => 'Kunjungan Pasien Perjaminan',
            '7'      => 'Kunjungan Pasien Baru dan Lama',
            '8'      => 'Laporan Penunjang',
            '9' => 'Laporan 10 besar penyakit',
        );
    }

    function getPeriodeLaporan()
    {
        return array(
            'Harian'        => 'Harian',
            'Bulanan'       => 'Bulanan',
            'Rentang Waktu' => 'Rentang Waktu',
        );
    }

    function getStatusKunjungan()
    {
        return array(
            ''      => 'Semua',
            'Baru'  => 'Baru',
            'Lama'  => 'Lama',
        );
    }

    function getBulan()
    {
        return array(
            '01'      => 'Januari',
            '02'      => 'Februari',
            '03'      => 'Maret',
            '04'      => 'April',
            '05'      => 'Mei',
            '06'      => 'Juni',
            '07'      => 'Juli',
            '08'      => 'Agustus',
            '09'      => 'September',
            '10'      => 'Oktober',
            '11'      => 'November',
            '12'      => 'Desember',
        );
    }

    function get_date_format()
    {
        $datetime = new DateTime();
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

        return array(
            $bulan
        );
    }

    //tambahan form rekam medis pasien
    function generateParentCodeFormulir($table)
    {
        $this->db->select('kode_formulir')
            ->from($table)
            ->where('id_parent is null')
            ->order_by('id', 'desc')
            ->limit(1, 0);
        $row = $this->db->get()->row();

        if ($row) :
            $new_kode = $row->kode_formulir;
            $new_kode++;
        else :
            $new_kode = '1';
        endif;

        return $new_kode;
    }


    //tambahan formulir rekam medis pasien
    function getAutoJenisFormulir($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_jenis_formulir
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    //tambahan formulir rekam medis pasien
    function getAutoFormulir($q, $id_jenis_formulir, $jenis_formulir, $start, $limit)
    {
        $w = "";
        if ($id_jenis_formulir !== '') :
            $w .= " and jp.id = '" . $id_jenis_formulir . "' ";
        endif;

        if ($jenis_formulir !== '') :
            $w .= " and jp.nama ilike '%" . $jenis_formulir . "%' ";
        endif;

        $limit = " limit " . $limit . " offset " . $start;

        $sql = "select l.*, 
                coalesce(ll.nama, '<i>Tidak ada parent formulir</i>') as formulir_parent, 
                coalesce(ll.nama,'') as parent, 
                coalesce(jp.nama,'') as jenis_formulir 
                from sm_form_rekam_medis_pasien l
                left join sm_form_rekam_medis_pasien ll on (l.id_parent = ll.id)
                left join sm_jenis_formulir jp on (ll.id_jenis_formulir = jp.id or l.id_jenis_formulir = jp.id)
                where (l.nama ilike ('%$q%') or l.kode_formulir ilike ('$q%')) $w 
                order by l.kode_formulir ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    //tambahan form rekam medis pasien
    function getNextCodeFormulir($table, $parent, $max_level)
    {
        $sql = "select kode_formulir from " . $table . "
                where id_parent = '" . $parent . "' 
                order by id desc limit 1 offset 0";
        $query = $this->db->query($sql)->row();

        if ($query) :
            $kode_formulir = $query->kode_formulir;
        else :
            $kode_formulir = null;
        endif;

        $new_kode = '';
        if ($kode_formulir === null) :
            // first child
            $kode_formulir = $this->db->where('id', $parent)
                ->get($table)
                ->row()
                ->kode_formulir;
            $kode_split = explode('.', $kode_formulir);
            $size = count($kode_split);

            if ($size >= $max_level) :
                $new_kode = null;
            else :
                $new_kode = $kode_formulir . ".1";
            endif;

        else :
            $kode_split = explode('.', $kode_formulir);
            $size = count($kode_split) - 1;
            $last_kode = (int) $kode_split[$size];

            $temp_kode = '';
            for ($i = 0; $i < $size; $i++) :
                $temp_kode .= $kode_split[$i] . '.';
            endfor;

            $last_kode++;
            $new_kode = $temp_kode . $last_kode;
        endif;

        return $new_kode;
    }

    function getKodeKelasBed()
    {
        $query = $this->db->get('sm_kode_kelas_bed')->result();
        $data =  array();
        $data[''] = '--Pilih Kode Kelas Bed';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->kode . ' (RUANG ' . $value->nama . ')';
        endforeach;

        return $data;
    }

    function getAutoProfesi($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from sm_profesi
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    //    function getAutoBarangStok2($search, $start, $limit)
    //    {
    //        $id_unit = $this->getIdUnit();
    //        $select = $this->getSelectQuery();
    //        $pagination = $this->getPaginationQuery($start, $limit);
    //        $sql = $this->getSqlQuery($search, $id_unit);
    //
    //        $result = $this->db->query($select . $sql . $pagination)->result();
    //        $result = $this->resetResults($result, $id_unit);
    //
    //        $data["id_unit"] = $id_unit;
    //        $data["data"] = $result;
    //        $data["total"] = count($result);
    //        return $data;
    //    }

    private function getIdUnit()
    {
        $check = $this->db->query("select id_unit_default from sm_unit where id = '" . $this->session->userdata("id_unit") . "'")->row();
        return $check->id_unit_default === NULL ? $this->session->userdata("id_unit") : $check->id_unit_default;
    }

    private function getSelectQuery()
    {
        return "select b.*, bu.id_unit, b.nama_lengkap as nama,
            COALESCE(s.nama,'') as satuan_kekuatan,
            (b.hpp+(b.hpp*(b.margin_resep/100))) as harga_jual,
            COALESCE(SUM(ss.masuk) - SUM(ss.keluar), 0) as sisa ";
    }

    private function getPaginationQuery($start, $limit)
    {
        $order = " group by b.id, bu.id_unit, s.nama order by (case when COALESCE(SUM(ss.masuk) - SUM(ss.keluar), 0) <= 0 then 1 else 0 end), b.nama";
        $limitation = " limit " . $limit . " offset " . $start;
        return $order . $limitation;
    }

    private function getSqlQuery($search, $id_unit)
    {
        return "from sm_barang b
            join sm_barang_unit bu on (bu.id_barang = b.id)
            join sm_kategori_barang kb on (b.id_kategori = kb.id)
            left join sm_satuan s on (b.satuan_kekuatan = s.id)
            left join sm_stok ss on (b.id = ss.id_barang and ss.ed > '2023-08-04' and ss.id_unit = '295')
            where b.is_active = 'Ya'
            and b.id_kategori != '7'
            and bu.id_unit = '" . $id_unit . "'
            and b.nama ilike ('%" . $search["search"] . "%')";
    }

    private function resetResults($result, $id_unit)
    {
        //		$result = $this->setSisaForResults($result, $id_unit);
        $result = $this->setDisabledForResults($result);
        return $result;
    }

    //	private function setSisaForResults($result, $id_unit)
    //	{
    //		foreach ($result as $key => $value) {
    //			$sql_child = "select COALESCE(SUM(masuk)-SUM(keluar),0) as sisa
    //                      from sm_stok
    //                      where id_barang = '" . $value->id . "'
    //                      and ed > '" . date("Y-m-d") . "'
    //                      and id_unit = '" . $id_unit . "'";
    //			$result[$key]->sisa = $this->db->query($sql_child)->row()->sisa;
    //		}
    //
    //		return $result;
    //	}

    private function setDisabledForResults($result)
    {
        foreach ($result as $val) {
            $val->disabled = 0 >= (float)$val->sisa || $val->sisa === "";
        }

        // order if disabled place in the end
        return $this->sortDisabledToEnd($result);
    }

    private function sortDisabledToEnd($result)
    {
        $disabled = array();
        $enabled = array();
        foreach ($result as $val) {
            if ($val->disabled) {
                $disabled[] = $val;
            } else {
                $enabled[] = $val;
            }
        }

        return array_merge($enabled, $disabled);
    }

    function getAutoSediaan($q, $start, $limit)
    {
        $limitation = " limit " . $limit . " offset " . $start;
        $w = " nama ilike ('%$q%')";
        $sql = "select * from sm_sediaan
            where $w order by nama";
        $data['data'] = $this->db->query($sql . $limitation)->result();
        $data['total'] = $this->db->query(sql_count_auto("sm_sediaan", $w))->row()->count;
        return $data;
    }

    function getKelasRawat()
    {
        $query = $this->db->get('sm_kelas')->result();
        $data =  array();
        $data[''] = 'Semua Kelas';
        foreach ($query as $key => $value) :
            $data[$value->id] = $value->nama;
        endforeach;

        return $data;
    }

    function getAutoPasienKunjungan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;

        $select = " SELECT pd.ID, lp.ID AS id_layanan_pendaftaran, pd.no_register, pd.id_pasien, P.nama, to_char( pd.tanggal_daftar, 'DD-MM-YYYY' ) tanggal, 
                        pd.tanggal_keluar, CASE WHEN s.nama IS NULL THEN lp.jenis_layanan 
                        ELSE concat ( lp.jenis_layanan, ' (', s.nama, ')' ) END jenis_layanan, lp.tindak_lanjut, lp.konsul";
        $count = "select count(*) as count from (";
        $sql = " FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.ID = lp.id_pendaftaran
                JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                LEFT JOIN sm_spesialisasi s ON lp.id_unit_layanan = s.ID 
                WHERE pd.no_register = '$q' OR pd.id_pasien ILIKE'%$q' OR p.nama ILIKE'%$q%'
                GROUP BY pd.ID, lp.ID, tanggal, s.nama,	P.nama 
                ORDER BY pd.tanggal_daftar DESC ";
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $select . $sql . " ) AS subquery ")->row()->count;
        return $data;
    }

    function getAutoPasienKunjunganByRegister($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;

        $select = " SELECT DISTINCT ON (pd.ID) pd.id, lp.ID AS id_layanan_pendaftaran, 
                    pd.no_register, pd.id_pasien, P.nama, to_char( pd.tanggal_daftar, 'DD-MM-YYYY' ) tanggal, pd.tanggal_keluar, 
                    CASE WHEN s.nama IS NULL THEN lp.jenis_layanan ELSE concat ( lp.jenis_layanan, ' (', s.nama, ')' ) END jenis_layanan, 
                    lp.tindak_lanjut, lp.konsul";
        $count = "select count(*) as count from (";
        $sql = " FROM sm_pendaftaran pd
                JOIN sm_layanan_pendaftaran lp ON pd.ID = lp.id_pendaftaran
                JOIN sm_pasien AS P ON pd.id_pasien = P.ID 
                LEFT JOIN sm_spesialisasi s ON lp.id_unit_layanan = s.ID 
                WHERE pd.no_register = '$q' OR pd.id_pasien ILIKE'%$q' OR p.nama ILIKE'%$q%'
                AND lp.status_terlayani != 'Batal' AND pd.status != 'Batal'
                AND lp.jenis_layanan != 'Pemulasaran Jenazah'
                GROUP BY pd.ID, lp.ID, tanggal, s.nama,	P.nama 
                ORDER BY pd.id DESC, lp.id DESC ";
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $select . $sql . " ) AS subquery ")->row()->count;
        return $data;
    }

    function getAutoBarangPKRT($search, $start, $limit)
    {
        $q = NULL;

        $limitation = " limit " . $limit . " offset " . $start;
        $order = " order by pk.nama asc ";
        $select = "select tpk.*, pk.nama ";
        $count = "select count(*) as count ";
        $sql = "from sm_perbekalan_kesehatan pk
                left join sm_tarif_perbekalan_kesehatan as tpk on pk.id = tpk.id_perbekalan_kesehatan
                where tpk.id is not null
                and pk.nama ilike ('" . $search["search"] . "%') " . $q;
        $result = $this->db->query($select . $sql . $order . $limitation)->result();

        $data["data"] = $result;
        $data["total"] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }
	
	function getJenisFileMcu()
    {
        $this->db->select('jenis_file, nama_file')
                ->from('sm_jenis_file_mcu_kirim')
                ->where('is_aktif', '1')
                ->order_by('id', 'asc');
        
        $result = $this->db->get()->result();

        foreach ($result as $row) {
            $data[$row->jenis_file] = $row->nama_file;
        }

        return $data;
    }
	
	function shiftPoli()
    {
        return array("" => "- Semua -", "Pagi" => "Pagi", "Sore" => "Sore");
    }
}
