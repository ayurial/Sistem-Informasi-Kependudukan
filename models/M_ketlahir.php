<?php

class M_ketlahir extends CI_Model
{
    public function tampil_data()
    {
        //        $this->db->order_by('NIK');
        return $this->db->from('data_penduduk')
            ->join('surat', 'surat.NIK_pemohon=data_penduduk.NIK')->where('surat.jenis_surat', 'Surat Keterangan Lahir')
            ->get()
            ->result();
        // return $this->db->get('data_penduduk')->result();
    }
    public function lihat($No_surat = NULL)
    {
        // $query = $this->db->get_where('data_penduduk', array('NIK' => $NIK))->row();
        // $query2 = $this->db->get_where('kategori_miskin', array('NIK' => $NIK))->row();
        //$query2 = $this->db->get_where('kategori_miskin', array('NIK' => $NIK))->row();
        return $this->db->from('data_penduduk')
            ->join('surat', 'surat.NIK_pemohon=data_penduduk.NIK')->where('surat.No_surat', $No_surat)
            ->get()
            ->row();

        // return $query ;
    }
    // function result() {
    //     return $this->db->from('data_penduduk')
    //         ->join('surat', 'surat.NIK_pemohon=data_penduduk.NIK')->where('surat.No_surat', $No_surat)
    //         ->get()
    //         ->row();
    //     }
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function sunting($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_keyword($keyword)
    {
        // $this->db->select('*');
        $this->db->from('data_penduduk')
            ->join('surat', 'surat.NIK_pemohon=data_penduduk.NIK');
        $this->db->like('Nama_lahir', $keyword)->where('surat.jenis_surat', 'Surat Keterangan Lahir');
        $this->db->or_like('tanggal_pengajuan', $keyword)->where('surat.jenis_surat', 'Surat Keterangan Lahir');
        $this->db->or_like('tanggal_terima', $keyword)->where('surat.jenis_surat', 'Surat Keterangan Lahir');
        //$this->db->or_like('Jenis_kelamin ', $keyword)->where('surat.jenis_surat', 'Surat Keterangan Lahir');
        $this->db->or_like('NIK_pemohon', $keyword)->where('surat.jenis_surat', 'Surat Keterangan Lahir');
        return $this->db->get()->result();
    }
}
