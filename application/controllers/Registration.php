<?php

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        // if ($this->session->userdata('id_pengguna')) {
        //     redirect('user/index');
        // }
        $data['title'] = 'Money Survival|Registration';
        $this->form_validation->set_rules('fullname', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[20]|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[20]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|max_length[20]|matches[password1]');
        $this->form_validation->set_rules('saldoawal', 'Saldo Awal', 'required|trim|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('t_login/header', $data);
            $this->load->view('auth_user/register');
            $this->load->view('t_login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('fullname', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'saldo_awal' => htmlspecialchars($this->input->post('saldoawal', true)),
                'status' => 'active',
                'foto_profil' => 'default.png'
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Selamat! Akun anda telah dibuat. Silakan masuk ke akun Anda.</div>');
            redirect('auth');
        }
    }
}
