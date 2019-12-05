<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Members extends CI_Model
{

    private $_table = "user";

    public function save($data)
    {
        $this->load->database();
        // $post = $this->input->post();
        // $data = array(
        //     'name' => htmlspecialchars($post['fullname'], true),
        //     'email' => htmlspecialchars($post['email'], true),
        //     'username' => htmlspecialchars($post['username'], true),
        //     'password' => password_hash(
        //         $post['password'],
        //         PASSWORD_DEFAULT
        //     ),
        //     'saldo_awal' => htmlspecialchars($post['saldoawal'], true),
        //     'status' => 'active',
        //     'foto_profil' => 'default.jpg'
        // );
        $this->db->insert($this->_table, $data);
    }
}
