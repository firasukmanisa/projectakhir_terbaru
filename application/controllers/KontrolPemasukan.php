<?php

class KontrolPemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pemasukan');
        $this->load->model('hutang');
    }

    public function harian()
    {
        $data['title'] = 'Pemasukan Harian';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        $data['list'] = $this->db->get_where('pemasukan_harian', ['id_pengguna' => $id_pengguna])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $data['list'] = $this->pemasukan->selectharian();
        $this->load->view('forms/pemasukan_harian', $data);
        $this->load->view('templates/footer');
    }

    public function rutin()
    {
        $data['title'] = 'Pemasukan Rutin';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['list'] = $this->db->get_where('pemasukan_rutin', ['id_pengguna' => $id_pengguna])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        // $this->load->database();
        // $data['m'] = $this->pemasukan->showList($id_pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $data['list'] = $this->pemasukan->selectrutin();
        $this->load->view('forms/pemasukan_rutin', $data);
        $this->load->view('templates/footer');
    }

    public function insertPemasukanHarian()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $kategori = $this->input->post('kategori');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $total = $this->input->post('total');
        $tanggal = $this->input->post('tanggal');
        $this->pemasukan->insertPemasukanHarian($id_pengguna, $kategori, $nama_pemasukan, $total, $tanggal);
        redirect('KontrolPemasukan/harian');
    }

    public function insertPemasukanRutin()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $kategori = $this->input->post('kategori');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $total = $this->input->post('total');
        $tanggal = $this->input->post('tanggal');
        $this->pemasukan->insertPemasukanRutin($id_pengguna, $kategori, $nama_pemasukan, $total, $tanggal);
        redirect('KontrolPemasukan/rutin');
    }

    public function deleteharian()
    {
        $id = $this->uri->segment(3); //this will get the value from the localhost/login/delete/user1
        //$id == 'user1'
        $this->load->model('pemasukan');
        $this->pemasukan->deleteharian($id);
    }

    function editharian()
    {
        $id = $this->uri->segment(3);
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['uwu'] = $this->db->get_where('pemasukan_rutin', ['id_pengguna' => $id_pengguna])->row_array();
        $this->load->model('pemasukan');
        $data['uwu'] = $this->pemasukan->editharian($id);
    }

    public function updateharian()
    {
        $idpengguna = $this->session->userdata('id_pengguna');
        $idpemasukan = $this->uri->segment(3);
        $kategori = $this->input->post('kategori');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $jumlah_pemasukan = $this->input->post('total');
        $tanggal_pemasukan = $this->input->post('tanggal');
        $this->load->model('pemasukan');
        $this->pemasukan->updateharian($idpengguna, $idpemasukan, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan);
    }

    public function deleterutin()
    {
        $id = $this->uri->segment(3); //this will get the value from the localhost/login/delete/user1
        //$id == 'user1'
        $this->load->model('pemasukan');
        $this->pemasukan->deleterutin($id);
    }

    public function updaterutin()
    {
        $idpengguna = $this->session->userdata('id_pengguna');
        $idpemasukan = $this->uri->segment(3);
        $kategori = $this->input->post('kategori');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $jumlah_pemasukan = $this->input->post('total');
        $tanggal_pemasukan = $this->input->post('tanggal');
        $this->load->model('pemasukan');
        $this->pemasukan->updaterutin($idpengguna, $idpemasukan, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan);
    }
}
