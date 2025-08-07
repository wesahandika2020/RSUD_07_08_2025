<?php 

use GuzzleHttp\Client;

defined('BASEPATH') OR exit('No direct script access allowed');

class Opendata_model extends CI_Model {
    private $opendata;
    
    function __construct()
    {
        parent::__construct();
        $this->opendata = new Client(array(
            'base_uri' => 'https://opendatav2.tangerangkota.go.id/services/',
            'auth' => ['r35t51kd4', '5ksnpcua5x6z79yk5xgbtkg89a4zdwc8ym7p2f4z']
        ));
    }

    
    function getProvinsi()
    {
        // $response = $this->opendata->request('GET', 'wilayah/propinsi_all/format/json');
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];

        return $this->db->order_by('NAMA_PROP')->get('sm_opendata_provinsi')->result_array();
    }

    function getKabupatenByNoProp($no_prop)
    {
        // $response = $this->opendata->request('GET', 'wilayah/kabupaten/format/json', [
        //     'query' => [
        //         'no_prop' => $no_prop
        //     ]
        // ]);

        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];

        return $this->db->order_by('NAMA_KAB')->get_where('sm_opendata_kabupaten', ['NO_PROP' => $no_prop])->result_array();
    }

    function getKabupatenByNoKab($no_prop, $no_kab)
    {
        $response = $this->opendata->request('GET', 'wilayah/kabupatenbyidkab/format/json', [
            'query' => [
                'no_prop' => $no_prop,
                'no_kab' => $no_kab
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }

    function getKecamatanByNoPropAndNoKab($no_prop, $no_kab)
    {
        // $response = $this->opendata->request('GET', 'wilayah/kecamatan/format/json', [
        //     'query' => [
        //         'no_prop' => $no_prop,
        //         'no_kab' => $no_kab
        //     ]
        // ]);

        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];

        return $this->db->order_by('NAMA_KEC')->get_where('sm_opendata_kecamatan', ['NO_PROP' => $no_prop, 'NO_KAB' => $no_kab])->result_array();
    }

    function getKelurahanByNoPropAndNoKabAndNoKec($no_prop, $no_kab, $no_kec)
    {
        // $response = $this->opendata->request('GET', 'wilayah/kelurahan/format/json', [
        //     'query' => [
        //         'no_prop' => $no_prop,
        //         'no_kab' => $no_kab,
        //         'no_kec' => $no_kec,
        //     ]
        // ]);

        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];

        return $this->db->order_by('NAMA_KEL')->get_where('sm_opendata_kelurahan', ['NO_PROP' => $no_prop, 'NO_KAB' => $no_kab, 'NO_KEC' => $no_kec])->result_array();
    }

}

/* End of file Opendata_model.php */
