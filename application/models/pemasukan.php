<?php
class Pemasukan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showList($id_pengguna)
    {
        // $this->db->where('id_pengguna', "$id_pengguna");
        // $query = $this->db->get('pemasukan_harian');
        // return $query;

        // $data['list'] = $this->db->get_where('pemasukan_harian', ['id_pengguna' => $id_pengguna])->row_array();
        // return $data['list'];
    }

    public function insertPemasukanHarian($id_pengguna, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan)
    {
        $hasil = $this->db->query("INSERT INTO pemasukan_harian (id_pengguna,kategori,nama_pemasukan,jumlah_pemasukan,tanggal_pemasukan) VALUES ('$id_pengguna','$kategori','$nama_pemasukan','$jumlah_pemasukan','$tanggal_pemasukan')");
        return $hasil;
    }
    public function insertPemasukanRutin($id_pengguna, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan)
    {
        $hasil = $this->db->query("INSERT INTO pemasukan_rutin (id_pengguna,kategori,nama_pemasukan,jumlah_pemasukan,tanggal_pemasukan) VALUES ('$id_pengguna','$kategori','$nama_pemasukan','$jumlah_pemasukan','$tanggal_pemasukan')");
        return $hasil;
    }

    public function selectharian(){
        $query = $this->db->get('pemasukan_harian');
        return $query;
    }

    public function selectrutin(){
        $query = $this->db->get('pemasukan_rutin');
        return $query;
    }

    public function deleteharian ($id) {
        $this->db->where('id_pemasukanharian', $id);
        $this->db->delete('pemasukan_harian'); 
        redirect('KontrolPemasukan/harian', 'refresh');
    }

    public function deleterutin ($id) {
        $this->db->where('id_pemasukanrutin', $id);
        $this->db->delete('pemasukan_rutin'); 
        redirect('KontrolPemasukan/rutin', 'refresh');
    }

    function editharian($id){		
        $this->db->where('id_pemasukanharian', $id);
        $this->db->get('pemasukan_harian');
        redirect('KontrolPemasukan/rutin', 'refresh');
    }

    public function updateharian($idpengguna, $idpemasukan, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan){
        $this->db->where('id_pengguna', $idpengguna);
        $this->db->where('id_pemasukanharian', $idpemasukan);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama_pemasukan', $nama_pemasukan);
        $this->db->set('jumlah_pemasukan', $jumlah_pemasukan);
        $this->db->set('tanggal_pemasukan', $tanggal_pemasukan);
        $this->db->update('pemasukan_harian');
        redirect('KontrolPemasukan/harian', 'refresh');
    }

    public function updaterutin($idpengguna, $idpemasukan, $kategori, $nama_pemasukan, $jumlah_pemasukan, $tanggal_pemasukan){
        $this->db->where('id_pengguna', $idpengguna);
        $this->db->where('id_pemasukanrutin', $idpemasukan);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama_pemasukan', $nama_pemasukan);
        $this->db->set('jumlah_pemasukan', $jumlah_pemasukan);
        $this->db->set('tanggal_pemasukan', $tanggal_pemasukan);
        $this->db->update('pemasukan_rutin');
        redirect('KontrolPemasukan/rutin', 'refresh');
    }
}
