<?php

class KontrolHutang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('hutang');
    }

    public function index()
    {
        $data['title'] = 'Debt';
        $id_pengguna = $this->session->userdata('id_pengguna'); //id pengirim
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $username = $this->input->post('username');
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        $data['listfriend'] = $this->hutang->listFriend();
        $data['search'] = null;
        $data['tulisan'] = "";
        if (!isset($username)) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/sidebar', $data);
            $this->load->view('users/topbar', $data);
            $this->load->view('forms/hutang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->search($username);
        }
    }

    public function search($username)
    {
        $data['title'] = 'Search';
        $data['search'] = $this->hutang->showPengguna($username);
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['tulisan'] = "Pengguna tidak ditemukan!";
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('forms/hutang', $data);
        $this->load->view('templates/footer');
    }

    public function sendNotif($username2)
    {
        $data['title'] = 'Debt';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['search'] = $this->hutang->showPengguna($username2);
        $this->hutang->sendNotification($id_pengguna, $data['search']['id_pengguna']); //pengguna 1 = pengirim, pengguna 2 = penerima
        redirect('KontrolHutang');
    }
    public function acceptRequest()
    {
        $this->hutang->acceptRequest();
        redirect('KontrolHutang');
    }
    public function insertHutang()
    {
        $this->hutang->insertHutang();
        redirect('KontrolHutang');
    }
}
