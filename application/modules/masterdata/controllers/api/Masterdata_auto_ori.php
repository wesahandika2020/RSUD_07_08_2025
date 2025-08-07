<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Masterdata_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        // $this->redis = new CI_Redis();
        $this->load->model('Masterdata_model', 'auto');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function jabatan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoJabatan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function provinsi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoProvinsi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '',
                'nama' => 'Silahkan pilih provinsi'
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kotakabupaten_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKotaKabupaten($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('kode' => '', 'nama' => ' ', 'provinsi' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kecamatan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKecamatan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ', 'kabupaten' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kelurahan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoKelurahan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kecamatan' => '',
                'kotakabupaten' => '',
                'provinsi' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function pabrik_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoPabrik($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' '
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function supplier_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoSupplier($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' '
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function farmako_terapi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoFarmakoTerapi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ',
                'kode' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function jenis_pemeriksaan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoJenisPemeriksaan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' '
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function layanan_auto_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');
        $id_jenis = safe_get('id_jenis');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoLayanan($q, $id_jenis, $jenis, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => 'Pilih Layanan', 
                'parent' => '', 
                'layanan_parent' => ' ', 
                'kode' => ''
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function rekening_auto_get()
    {
        $params = array(
            'q'      => safe_get('q'),
            'parent' => safe_get('parent'),
            'jenis'  => safe_get('jenis'),
        );

        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoRekening($params, $start, $this->limit);

        if ((safe_get('page') == 1) & ($params['q'] == '')) :
            $pilih[] = array(
                'id'        => '',
                'nama'      => '',
                'kode'      => '',
                'id_parent' => '',
                'parent'    => ''
            );

            $data['data']  =  array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function pegawai_nadis_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        
        $start = $this->start($page);
        $data = $this->auto->getAutoPegawaiNadis($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'jabatan' => ""
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function profesi_nadis_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoProfesiNadis($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function pegawai_account_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoPegawaiAccount($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
                'jabatan' => ' '
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function account_group_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoAccountGroup($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'name' => ' ');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function unit_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoUnit($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '',
                'nama' => 'Semua Instalasi'
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function instansi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoInstansi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function instalasi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoInstalasi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function spesialisasi_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoSpesialisasi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode' => ' ', 
                'kode_bpjs' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function penjamin_auto_get()
    {
        $q = safe_get('q');
        $jenis = $this->get('jenis');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoPenjamin($q, $jenis, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode' => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function jenis_laboratorium_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getJnsLaboratorium($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'            => '', 
                'id_lab'        => '', 
                'nama'          => '', 
                'total'          => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function ambil_id_lab_get()
    {   
        if (!$this->get('get_id_lab', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $data = $this->auto->getIdLab($this->get('get_id_lab', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tarif_tindakan_lab_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $jenis_pemeriksaan = safe_get('jenis_pemeriksaan');
        $jenis_tindakan = safe_get('jenis_tindakan');
        $id_lab = $this->get('id_lab', true);
        $data = $this->auto->getTarifTindakanLab($q, $id_lab, $jenis_pemeriksaan, $jenis_tindakan, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'             => '', 
                'layanan'        => '', 
                'instalasi'      => '', 
                'jenis'          => '', 
                'bobot'          => '', 
                'total'          => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK); 
    }

    function tarif_pelayanan_auto_get()
    {
        $q = safe_get('q');
        $jenis_pemeriksaan = safe_get('jenis_pemeriksaan');
        $kelas = safe_get('kelas');
        $jenis_tindakan = safe_get('jenis_tindakan');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoTarifPelayanan($q, $jenis_pemeriksaan, $jenis_tindakan, $kelas, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'             => '', 
                'layanan'        => '', 
                'instalasi'      => '', 
                'jenis'          => '', 
                'bobot'          => '', 
                'total'          => '', 
                'kelas'          => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tarif_pemeriksaan_auto_get()
    {
        $q = safe_get('q');
        $penjamin = safe_get('penjamin');
        $kelas = safe_get('kelas');
        $unit = safe_get('unit');
        $jenis = $this->get('jenis');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoTarifPemeriksaanV2($q, $kelas, $penjamin, $jenis, $unit, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'             => '', 
                'layanan'        => '', 
                'layanan_parent' => '', 
                'instalasi'      => '', 
                'jenis'          => '', 
                'bobot'          => '', 
                'total'          => '', 
                'kelas'          => null, 
                'keterangan'     => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tarif_pemeriksaanigd_auto_get()
    {
        $q = safe_get('q');
        $penjamin = safe_get('penjamin');
        $kelas = safe_get('kelas');
        $unit = safe_get('unit');
        $jenis = $this->get('jenis');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoTarifPemeriksaanV2($q, $kelas, $penjamin, $jenis, $unit, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'             => '', 
                'layanan'        => '', 
                'layanan_parent' => '', 
                'instalasi'      => '', 
                'jenis'          => '', 
                'bobot'          => '', 
                'total'          => '', 
                'total'          => '', 
                'kelas'          => null, 
                'keterangan'     => '', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_dokter_spesialisasi_get()
    {
        $id_spesialisasi = $this->get('id_spesialisasi');
        $data = $this->auto->getAutoDokterSpesialisasi($id_spesialisasi);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function dokter_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoDokter($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'spesialisasi' => '-'
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    function dokteru_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoDokterumigd($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'spesialisasi' => '-'
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function golongan_sebab_sakit_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoGolonganSebabSakit($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode_icdx' => NULL,
                'kode_icdx_rinci' => "",

            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function nadis_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));
        $params['jenis'] = safe_get('jenis'); 
        $data = $this->auto->getAutoNadis($params, $start, $this->limit);
        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'spesialisasi' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function masalah_keperawatan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getStandarDiagnosis($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    

    function barang_auto_get()
    {
        $param['search'] = safe_get('q');
        $param["penjamin"] = safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "";
        $param["jenissppb"] = safe_get("jenissppb");
        $param["katastropik"] = safe_get("katastropik");
        $param["golongan"] = safe_get("golongan");
        $param["jenis_barang"] = safe_get("jenis_barang");
        $param["aktif"] = safe_get("aktif");
        $start = $this->start(safe_get('page'));
        $param['jenis'] = safe_get('jenis'); 
        $data = $this->auto->getAutoBarang($param, $start, $this->limit);
        if ((safe_get('page') == 1) & (safe_get('q') == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => 'Semua Barang',
                'kekuatan' => ' ',
                'satuan_kekuatan' => ' ',
                'golongan_darah' => null,
                'rhesus' => null,
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_with_stok_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangStok($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") {
            $pilih[] = array("id" => "",
            "nama" => "-",
            "kekuatan" => "",
            "satuan_kekuatan" => "",
            "sisa" => "",
            "harga_jual" => "",
        );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_with_stok2_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangStok2($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") {
            $pilih[] = array("id" => "",
            "nama" => "-",
            "kekuatan" => "",
            "satuan_kekuatan" => "",
            "sisa" => "",
            "harga_jual" => "",
        );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function barang_darah_auto_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getAutoBarangDarah($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") {
            $pilih[] = array("id" => "",
            "nama" => "-",
            "kekuatan" => "",
            "satuan_kekuatan" => "",
            "sisa" => "",
            "harga_jual" => "",
            'golongan_darah' => null,
            'rhesus' => null,
        );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function obat_untuk_keperawatan_get()
    {
        $param = array(
            "search" => safe_get("q"));
        $start = $this->start(safe_get("page"));
        $data = $this->auto->getObatKeperawatan($param, $start, $this->limit);
        if (safe_get("page") == 1 & $param["search"] == "") {
            $pilih[] = array("id" => "",
            "nama" => "-",
            "kekuatan" => "",
            "satuan_kekuatan" => "");
            $data["data"] = array_merge($pilih, $data["data"]);
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function farmakoterapi_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoFarmakoterapi($params, $start, $this->limit);
        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function aturan_pakai_auto_get()
    {
        $params['search'] = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getAutoAturanPakai($params, $start, $this->limit);
        if ((safe_get('page') == 1) & ($params['search'] == '')) {
            $pilih[] = array(
                "id" => "", "signa" => "Pilih ...", "keterangan" => ""
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    

    function bangsal_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoBangsal($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
                'kode' => ' '
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kamar_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoKamar($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function kamar_operasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoKamarOperasi($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function satuan_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        if (!$this->get("view_on")) :
            $view_on = "";
        else :
            $view_on = $this->get($page);
        endif;

        $start = $this->start($page);
        $data = $this->auto->getAutoSatuan($q, $view_on, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => ' ',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function topik_edukasi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');

        $start = $this->start($page);
        $data = $this->auto->getAutoTopikEdukasi($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => '',
                'keterangan' => '',
                'text_input' => '',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function data_pegawai_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->auto->getDataPegawai($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
}