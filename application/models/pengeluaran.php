<?php
class Pengeluaran extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showList($id_pengguna)
    {
        $this->db->where('id_pengguna', "$id_pengguna");
        $query = $this->db->get('pengeluaran_harian');
        return $query;
    }

    public function insertPengeluaranHarian($id_pengguna, $kategori, $nama_pengeluaran, $jumlah_pengeluaran, $tanggal_pengeluaran)
    {
        $hasil = $this->db->query("INSERT INTO pengeluaran_harian (id_pengguna,kategori,nama_pengeluaran,jumlah_pengeluaran,tanggal_pengeluaran) VALUES ('$id_pengguna','$kategori','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran')");
        return $hasil;
    }
    public function insertPengeluaranRutin($id_pengguna, $kategori, $nama_pengeluaran, $jumlah_pengeluaran, $tanggal_pengeluaran)
    {
        $hasil = $this->db->query("INSERT INTO pengeluaran_rutin (id_pengguna,kategori,nama_pengeluaran,jumlah_pengeluaran,tanggal_pengeluaran) VALUES ('$id_pengguna','$kategori','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran')");
        return $hasil;
    }

    public function selectharian(){
        $query = $this->db->get('pengeluaran_harian');
        return $query;
    }

    public function selectrutin(){
        $query = $this->db->get('pengeluaran_rutin');
        return $query;
    }

    public function updateharian($idpengguna, $idpengeluaran, $kategori, $namapengeluaran, $jumlahpengeluaran, $tanggalpengeluaran){
        $this->db->where('id_pengguna', $idpengguna);
        $this->db->where('id_pengeluaranharian', $idpengeluaran);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama_pengeluaran', $namapengeluaran);
        $this->db->set('jumlah_pengeluaran', $jumlahpengeluaran);
        $this->db->set('tanggal_pengeluaran', $tanggalpengeluaran);
        $this->db->update('pengeluaran_harian');
        redirect('KontrolPengeluaran/harian','refresh');
    }

    public function deleteharian($id){
        $this->db->where('id_pengeluaranharian', $id);
        $this->db->delete('pengeluaran_harian'); 
        redirect('KontrolPengeluaran/harian', 'refresh');
    }

    public function updaterutin($idpengguna, $idpengeluaran, $kategori, $namapengeluaran, $jumlahpengeluaran, $tanggalpengeluaran){
        $this->db->where('id_pengguna', $idpengguna);
        $this->db->where('id_pengeluaranrutin', $idpengeluaran);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama_pengeluaran', $namapengeluaran);
        $this->db->set('jumlah_pengeluaran', $jumlahpengeluaran);
        $this->db->set('tanggal_pengeluaran', $tanggalpengeluaran);
        $this->db->update('pengeluaran_rutin');
        redirect('KontrolPengeluaran/rutin', 'refresh');
    }

    public function deleterutin($id){
        $this->db->where('id_pengeluaranrutin', $id);
        $this->db->delete('pengeluaran_rutin'); 
        redirect('KontrolPengeluaran/rutin', 'refresh');
    }

}
