<?php
class Hutang extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function showPengguna($username)
    {
        $data = $this->db->get_where('user', ['username' => $username])->row_array();
        return $data;
    }

    public function sendNotification($user1, $user2)
    {
        $notif = $this->db->query("INSERT INTO request (id_pengirim,id_penerima,kategori_request,status_request) VALUES ('$user1','$user2','Permintaan Hutang','requested')");
        return $notif;
    }
    public function countNotif()
    {
        $count = $this->db->where(['id_penerima' => $this->session->userdata('id_pengguna'), 'kategori_request' => "Permintaan Hutang", 'status_request' => "requested"])->from("request")->count_all_results();
        return $count;
    }

    public function listNotif()
    {
        $listnotif = $this->db->get_where('request', ['id_penerima' => $this->session->userdata('id_pengguna')])->row_array();
        return $listnotif;
    }
    public function listFriend()
    {
        $array = array('id_pengirim' => $this->session->userdata('id_pengguna'), 'kategori_request' => "Permintaan Hutang", 'status_request' => "accepted");
        $this->db->where($array);
        $query = $this->db->get('request')->row_array();
        return $query;
    }
    public function acceptRequest()
    {
        $id_penerima = $this->session->userdata('id_pengguna');
        $data = array(
            'status_request' => 'accepted'
        );
        $this->db->update('request', $data, "id_penerima = '$id_penerima'");
    }
    public function insertHutang()
    {
        $data = array(
            'id_pengirim' => $this->session->userdata('id_pengguna'),
            'id_penerima' => $this->input->post('teman'),
            'nama_hutang' => $this->input->post('nama_hutang'),
            'jumlah_hutang' => $this->input->post('jumlah_hutang'),
            'status_bayar' => 'Belum Lunas',
            'tanggal_hutang' => $this->input->post('tanggal_hutang')
        );
        $this->db->insert('hutang', $data);
    }
}
