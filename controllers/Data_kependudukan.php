<?php

class Data_kependudukan extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_penduduk');
        $data['kependudukan'] = $this->M_penduduk->tampil_data();

        $this->load->view('templates/header');
        $this->load->view('v_datakependudukan', $data);
        $this->load->view('templates/footer');
    }
    public function btn_tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('v_tambahdatakependudukan');
        $this->load->view('templates/footer');
    }
    public function tambah_data()
    {
        $No_KK = $this->input->post('No_KK');
        $NIK = $this->input->post('NIK');
        $Nama_Lengkap = $this->input->post('Nama_Lengkap');
        $Jenis_Kelamin = $this->input->post('Jenis_Kelamin');
        $Tempat_Lahir = $this->input->post('Tempat_Lahir');
        $Tanggal_Lahir = $this->input->post('Tanggal_Lahir');
        $Agama = $this->input->post('Agama');
        $No_Telp = $this->input->post('No_Telp');
        $Pendidikan = $this->input->post('Pendidikan');
        $Pekerjaan = $this->input->post('Pekerjaan');
        $Gol_darah = $this->input->post('Gol_darah');
        $SHDK = $this->input->post('SHDK');
        $Status_keberadaan = $this->input->post('Status_keberadaan');
        $Status_kawin = $this->input->post('Status_kawin');
        $Tanggal_kawin = $this->input->post('Tanggal_kawin');
        $No_RT = $this->input->post('No_RT');
        $No_RW = $this->input->post('No_RW');
        $Kode_pos = $this->input->post('Kode_pos');
        $Dusun = $this->input->post('Dusun');
        $Luas_lantai = $this->input->post('Luas_lantai');
        $Jenis_lantai = $this->input->post('Jenis_lantai');
        $Jenis_dinding = $this->input->post('Jenis_dinding');
        $Fasilitas_buang_air = $this->input->post('Fasilitas_buang_air');
        $Sumber_penerangan = $this->input->post('Sumber_penerangan');
        $Sumber_air_minum = $this->input->post('Sumber_air_minum');
        $BB_memasak = $this->input->post('BB_memasak');
        $Satu_pakaian_pertahun = $this->input->post('Satu_pakaian_pertahun');
        $Satudua_kali_makan = $this->input->post('Satudua_kali_makan');
        $Bayar_pengobatan = $this->input->post('Bayar_pengobatan');
        $Sumber_penghasilan_Kepala_RT = $this->input->post('Sumber_penghasilan_Kepala_RT');
        $Pendidikan_tertinggi_Kepala_RT = $this->input->post('Pendidikan_tertinggi_Kepala_RT');
        $TabunganBarang_Jual = $this->input->post('TabunganBarang_Jual');


        $data = array(

            'No_KK' => $No_KK,
            'Nama_Lengkap' => $Nama_Lengkap,
            'NIK' => $NIK,
            'Jenis_Kelamin' => $Jenis_Kelamin,
            'No_RT' => $No_RT,
            'No_RW' => $No_RW,
            'Tempat_Lahir' => $Tempat_Lahir,
            'Tanggal_Lahir' => $Tanggal_Lahir,
            'Agama' => $Agama,
            'Pendidikan' => $Pendidikan,
            'Pekerjaan' => $Pekerjaan,
            'Gol_darah' => $Gol_darah,
            'SHDK' => $SHDK,
            'Status_keberadaan' => $Status_keberadaan,
            'Status_kawin' => $Status_kawin,
            'Tanggal_kawin' => $Tanggal_kawin,
            'No_Telp' => $No_Telp,
            'Kode_pos' => $Kode_pos,
            'Dusun' => $Dusun

        );
        $data2 = array(

            'NIK' => $NIK,
            'Luas_lantai' => $Luas_lantai,
            'Jenis_lantai' => $Jenis_lantai,
            'Jenis_dinding' => $Jenis_dinding,
            'Fasilitas_buang_air' => $Fasilitas_buang_air,
            'Sumber_penerangan' => $Sumber_penerangan,
            'Sumber_air_minum' => $Sumber_air_minum,
            'BB_memasak' => $BB_memasak,
            'Satu_pakaian_pertahun' => $Satu_pakaian_pertahun,
            'Satudua_kali_makan' => $Satudua_kali_makan,
            'Bayar_pengobatan' => $Bayar_pengobatan,
            'Sumber_penghasilan_Kepala_RT' => $Sumber_penghasilan_Kepala_RT,
            'Pendidikan_tertinggi_Kepala_RT' => $Pendidikan_tertinggi_Kepala_RT,
            'TabunganBarang_Jual' => $TabunganBarang_Jual

        );

        $this->load->model('M_penduduk');
        $this->M_penduduk->tambah($data, 'data_penduduk');
        $this->M_penduduk->tambah($data2, 'kategori_miskin');
        $this->load->view('v_datakependudukan', $data);
        redirect('Data_kependudukan/index');
    }
    public function hapus_data($NIK)
    {
        $where = array('NIK' => $NIK);
        $this->load->model('M_penduduk');
        $this->M_penduduk->hapus($where, 'data_penduduk');
        redirect('Data_kependudukan/index');
    }
    public function update_data()
    {
        $No_KK = $this->input->post('No_KK');
        $NIK = $this->input->post('NIK');
        $Nama_Lengkap = $this->input->post('Nama_Lengkap');
        $Jenis_Kelamin = $this->input->post('Jenis_Kelamin');
        $Tempat_Lahir = $this->input->post('Tempat_Lahir');
        $Tanggal_Lahir = $this->input->post('Tanggal_Lahir');
        $Agama = $this->input->post('Agama');
        $No_Telp = $this->input->post('No_Telp');
        $Pendidikan = $this->input->post('Pendidikan');
        $Pekerjaan = $this->input->post('Pekerjaan');
        $Gol_darah = $this->input->post('Gol_darah');
        $SHDK = $this->input->post('SHDK');
        $Status_keberadaan = $this->input->post('Status_keberadaan');
        $Status_kawin = $this->input->post('Status_kawin');
        $Tanggal_kawin = $this->input->post('Tanggal_kawin');
        $No_RT = $this->input->post('No_RT');
        $No_RW = $this->input->post('No_RW');
        $Kode_pos = $this->input->post('Kode_pos');
        $Dusun = $this->input->post('Dusun');
        $Luas_lantai = $this->input->post('Luas_lantai');
        $Jenis_lantai = $this->input->post('Jenis_lantai');
        $Jenis_dinding = $this->input->post('Jenis_dinding');
        $Fasilitas_buang_air = $this->input->post('Fasilitas_buang_air');
        $Sumber_penerangan = $this->input->post('Sumber_penerangan');
        $Sumber_air_minum = $this->input->post('Sumber_air_minum');
        $BB_memasak = $this->input->post('BB_memasak');
        $Satu_pakaian_pertahun = $this->input->post('Satu_pakaian_pertahun');
        $Satudua_kali_makan = $this->input->post('Satudua_kali_makan');
        $Bayar_pengobatan = $this->input->post('Bayar_pengobatan');
        $Sumber_penghasilan_Kepala_RT = $this->input->post('Sumber_penghasilan_Kepala_RT');
        $Pendidikan_tertinggi_Kepala_RT = $this->input->post('Pendidikan_tertinggi_Kepala_RT');
        $TabunganBarang_Jual = $this->input->post('TabunganBarang_Jual');


        $data = array(

            'No_KK' => $No_KK,
            'Nama_Lengkap' => $Nama_Lengkap,
            'NIK' => $NIK,
            'Jenis_Kelamin' => $Jenis_Kelamin,
            'No_RT' => $No_RT,
            'No_RW' => $No_RW,
            'Tempat_Lahir' => $Tempat_Lahir,
            'Tanggal_Lahir' => $Tanggal_Lahir,
            'Agama' => $Agama,
            'Pendidikan' => $Pendidikan,
            'Pekerjaan' => $Pekerjaan,
            'Gol_darah' => $Gol_darah,
            'SHDK' => $SHDK,
            'Status_keberadaan' => $Status_keberadaan,
            'Status_kawin' => $Status_kawin,
            'Tanggal_kawin' => $Tanggal_kawin,
            'No_Telp' => $No_Telp,
            'Kode_pos' => $Kode_pos,
            'Dusun' => $Dusun

        );
        $data2 = array(

            'NIK' => $NIK,
            'Luas_lantai' => $Luas_lantai,
            'Jenis_lantai' => $Jenis_lantai,
            'Jenis_dinding' => $Jenis_dinding,
            'Fasilitas_buang_air' => $Fasilitas_buang_air,
            'Sumber_penerangan' => $Sumber_penerangan,
            'Sumber_air_minum' => $Sumber_air_minum,
            'BB_memasak' => $BB_memasak,
            'Satu_pakaian_pertahun' => $Satu_pakaian_pertahun,
            'Satudua_kali_makan' => $Satudua_kali_makan,
            'Bayar_pengobatan' => $Bayar_pengobatan,
            'Sumber_penghasilan_Kepala_RT' => $Sumber_penghasilan_Kepala_RT,
            'Pendidikan_tertinggi_Kepala_RT' => $Pendidikan_tertinggi_Kepala_RT,
            'TabunganBarang_Jual' => $TabunganBarang_Jual

        );
        $where = array('NIK' => $NIK);
        $this->load->model('M_penduduk');
        $this->M_penduduk->update($where, $data, 'data_penduduk');
        $this->M_penduduk->update($where, $data2, 'kategori_miskin');
        //        $this->load->view('v_datakependudukan', $data);
        redirect('Data_kependudukan/index');
    }
    public function sunting_data($NIK)
    {
        // $where = array('NIK' => $NIK);
        $this->load->model('M_penduduk');
        $data['data_penduduk'] = $this->M_penduduk->sunting($NIK);

        $this->load->view('templates/header');
        $this->load->view('v_suntingdatakependudukan', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_data($NIK)
    {
        // $data['kependudukan'] = $this->M_penduduk->tampil_data();

        $this->load->model('M_penduduk');
        //        $detail = $this->M_penduduk->detail($NIK);
        $data['detail'] = $this->M_penduduk->lihat($NIK);
        $this->load->view('templates/header');
        $this->load->view('v_lihatdatakependudukan', $data);
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_penduduk');
        $data['kependudukan'] = $this->M_penduduk->get_keyword($keyword);
        // $data['kependudukan2'] = $this->M_penduduk->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('v_datakependudukan', $data);
        $this->load->view('templates/footer');
    }
}
