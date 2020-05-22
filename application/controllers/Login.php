<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
    }
    public function index()
    {
        if ($this->session->userdata('status_login') == TRUE) {
            redirect('Home');
        } else {
            $this->load->view('login');
        }
    }
    public function Usernamecek()
    {
        $usrname = trim($this->input->post('username'));
        $check_user = $this->Mlogin->check_user($usrname);
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check[' . $check_user->num_rows() . ']');
        if ($this->form_validation->run() == TRUE) {
            $json['status'] = TRUE;
        } else {
            $json['status'] = FALSE;
        }
        echo json_encode($json);
    }
    public function Passwordcek()
    {
        $usrname = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        $check_user = $this->Mlogin->check_user($usrname);

        $check_pass = $this->Mlogin->check_pass($usrname, $password);
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $check_user->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $check_pass->num_rows() . ']');

        if ($this->form_validation->run() == TRUE) {
            $json['status'] = TRUE;
        } else {
            $json['status'] = FALSE;
        }
        echo json_encode($json);
    }
    public function validate()
    {
        $usrname = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        $check_user = $this->Mlogin->check_user($usrname);
        $check_pass = $this->Mlogin->check_pass($usrname, $password);
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check[' . $check_user->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $check_pass->num_rows() . ']');
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $value = $this->Mlogin->validate($post);
            $this->session->set_userdata('masuk', TRUE);
            if ($this->session->userdata('masuk') == TRUE) {
                $this->session->set_userdata('status_login', TRUE);
                $this->session->set_userdata('kode', $value['username']);
                $this->session->set_flashdata('pesan', sukses('Berhasli Login.'));
            } else {
                $this->session->session_destroy();
            }
            $json['status'] = TRUE;
        } else {
            $json['pesan'] = $this->form_validation->error_array();
        }
        echo json_encode($json);
    }
    public function username_check($username, $recordCount)
    {
        if ($username == null) {
            $this->form_validation->set_message('username_check', 'Username is required.');
            return false;
        } else if ($recordCount == 0) {
            $this->form_validation->set_message('username_check', 'Username is not correct.');
            return FALSE;
        } else {

            return true;
        }
    }
    public function password_check($password, $recordCount)
    {
        if ($password == null) {
            $this->form_validation->set_message('password_check', 'Password is required.');
            return false;
        } else if ($recordCount == 0) {
            $this->form_validation->set_message('password_check', 'Password is not correct.');
            return FALSE;
        } else {

            return true;
        }
    }
    public function logout()
    {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('status_login', FALSE);
        $this->session->unset_userdata('kode');
        redirect('Login');
    }
}
