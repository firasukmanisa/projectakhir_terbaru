<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('hutang');
    }

    public function index()
    {
        $data['title'] = 'Money Survival';
        $data['title2'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $this->session->userdata('id_pengguna')])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }
    public function viewprofile()
    {
        $data['title'] = 'Money Survival';
        $data['title2'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $this->session->userdata('id_pengguna')])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();
        $this->load->view('templates/header', $data);
        $this->load->view('users/sidebar', $data);
        $this->load->view('users/topbar', $data);
        $this->load->view('users/myprofile', $data);
        $this->load->view('templates/footer');
    }
    public function editprofile()
    {
        $data['title'] = 'Money Survival';
        $data['title2'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['id_pengguna' => $this->session->userdata('id_pengguna')])->row_array();
        $data['notif'] = $this->hutang->countNotif();
        $data['listnotif'] = $this->hutang->listNotif();

        $this->form_validation->set_rules('nama', 'Nama', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[3]|max_length[20]|is_unique[user.username]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|min_length[8]|max_length[20]|matches[password3]');
        $this->form_validation->set_rules('password3', 'Password', 'trim|min_length[8]|max_length[20]|matches[password2]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/sidebar', $data);
            $this->load->view('users/topbar', $data);
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $password3 = $this->input->post('password3');
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(
                    $this->input->post('password2'),
                    PASSWORD_DEFAULT
                )
            ];
            //cek jika password lama == baru
            if ($password1 == $password2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password could not same!</div>');
                redirect('user/editprofile');
            } else {
                //jika password lama != baru
                if (password_verify($password3, $data['password'])) {
                    $id = $this->session->userdata('id_pengguna');
                    $this->db->update('user', $data, array('id_pengguna' => $id));
                    $this->session->set_flashdata('message', '<div class="alert alert-success"
                    role="alert">Data change success!</div>');
                    redirect('user/editprofile');
                    //echo "data berhasil diubah   " . $id;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success"
                    role="alert">New password did not match!</div>');
                    redirect('user/editprofile');
                }
            }
        }
    }
}
