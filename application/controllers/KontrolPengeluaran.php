<?php

class KontrolPengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pengeluaran');
        $this->load->model('hutang');
    }

    public function harian()
    {
        $data['title'] = 'Pengeluaran Harian';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['list'] = $this->db->get_where('pemasukan_rutin', ['id_pengguna' => $id_pengguna])->row_array();
        $data['list'] = $this->pengeluaran->selectharian();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        // $this->load->database();
        // $data['m'] = $this->pengeluaran->showList($id_pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('forms/pengeluaran_harian', $data);
        $this->load->view('templates/footer');
    }

    public function rutin()
    {
        $data['title'] = 'Pengeluaran Rutin';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $id_pengguna])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['list'] = $this->db->get_where('pengeluaran_rutin', ['id_pengguna' => $id_pengguna])->row_array();
        $data['list'] = $this->pengeluaran->selectrutin();
        $data['listnotif'] = $this->hutang->listNotif();
        // $this->load->database();
        // $data['m'] = $this->pengeluaran->showList($id_pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('forms/pengeluaran_rutin', $data);
        $this->load->view('templates/footer');
    }

    public function insertPengeluaranHarian()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $kategori = $this->input->post('kategori');
        $nama_pengeluaran = $this->input->post('nama_pengeluaran');
        $total = $this->input->post('total');
        $tanggal = $this->input->post('tanggal');
        $this->pengeluaran->insertPengeluaranHarian($id_pengguna, $kategori, $nama_pengeluaran, $total, $tanggal);
        redirect('KontrolPengeluaran/harian');
    }

    public function insertPengeluaranRutin()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $kategori = $this->input->post('kategori');
        $nama_pengeluaran = $this->input->post('nama_pengeluaran');
        $total = $this->input->post('total');
        $tanggal = $this->input->post('tanggal');
        $this->pengeluaran->insertPengeluaranRutin($id_pengguna, $kategori, $nama_pengeluaran, $total, $tanggal);
        redirect('KontrolPengeluaran/rutin');
    }

    public function deleteharian()
    {
        $id = $this->uri->segment(3); //this will get the value from the localhost/login/delete/user1
        //$id == 'user1'
        $this->load->model('pengeluaran');
        $this->pengeluaran->deleteharian($id);
    }

    public function updateharian()
    {
        $idpengguna = $this->session->userdata('id_pengguna');
        $idpengeluaran = $this->uri->segment(3);
        $kategori = $this->input->post('kategori');
        $namapengeluaran = $this->input->post('nama_pengeluaran');
        $jumlahpengeluaran = $this->input->post('total');
        $tanggalpengeluaran = $this->input->post('tanggal');
        $this->load->model('pengeluaran');
        $this->pengeluaran->updateharian($idpengguna, $idpengeluaran, $kategori, $namapengeluaran, $jumlahpengeluaran, $tanggalpengeluaran);
    }

    public function deleterutin()
    {
        $id = $this->uri->segment(3); //this will get the value from the localhost/login/delete/user1
        //$id == 'user1'
        $this->load->model('pengeluaran');
        $this->pengeluaran->deleterutin($id);
    }

    public function updaterutin()
    {
        $idpengguna = $this->session->userdata('id_pengguna');
        $idpengeluaran = $this->uri->segment(3);
        $kategori = $this->input->post('kategori');
        $namapengeluaran = $this->input->post('nama_pengeluaran');
        $jumlahpengeluaran = $this->input->post('total');
        $tanggalpengeluaran = $this->input->post('tanggal');
        $this->load->model('pengeluaran');
        $this->pengeluaran->updaterutin($idpengguna, $idpengeluaran, $kategori, $namapengeluaran, $jumlahpengeluaran, $tanggalpengeluaran);
    }
}
