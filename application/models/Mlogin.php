<?php
class Mlogin extends CI_Model
{
    protected $tabel = 'tb_user';
    public function check_user($username)
    {
        return $this->db->get_where($this->tabel, ['username' => $username]);
    }
    public function check_pass($username, $password)
    {
        return $this->db->get_where($this->tabel, ['username' => $username, 'password' => md5($password)]);
    }
    public function validate($post)
    {
        $username = $post['username'];
        $password = $post['password'];
        return $this->db->get_where($this->tabel, ['username' => $username, 'password' => md5($password)])->row_array();
    }
}
