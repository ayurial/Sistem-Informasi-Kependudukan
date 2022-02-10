<?php

class Surat_PermohonanKTP extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    public function index()
    {
        //model
        $this->load->model('M_permohonanktp');
        $data['kependudukan'] = $this->M_permohonanktp->tampil_data();
        //view
        $this->load->view('templates/header9');
        $this->load->view('permohonan_ktp/v_permohonan_ktp', $data);
        $this->load->view('templates/footer');
    }
    public function lihat_data($No_surat)
    {
        // $data['kependudukan'] = $this->M_penduduk->tampil_data();

        $this->load->model('M_permohonanktp');
        //        $detail = $this->M_penduduk->detail($NIK);
        $data['detail'] = $this->M_permohonanktp->lihat($No_surat);
        $this->load->view('templates/header9');
        $this->load->view('permohonan_ktp/v_lihatpermohonan_ktp', $data);
        $this->load->view('templates/footer');
    }
    function cetak($No_surat){

        $pdf = new FPDF('p','mm','a4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/assets/img/brand/logomlg.png',25,10,20,25);
        $pdf->Cell(25);
        $pdf->SetFont('times','B','12');
        $pdf->Cell(0,5,'PEMERINTAH KABUPATEN MALANG',0,1,'C');
        $pdf->Cell(25);
        $pdf->Cell(0,5,'KECAMATAN WAGIR',0,1,'C');
        $pdf->Cell(25);
        $pdf->SetFont('times','B','15');
        $pdf->Cell(0,5,'DESA GONDOWANGI',0,1,'C');
        $pdf->Cell(25);
        $pdf->SetFont('times','','10');
        $pdf->Cell(0,5,'Alamat: Jalan Raya Gondowangi No. 15 Kecamatan Wagir Kode Pos: 65158',0,1,'C');
        $pdf->Cell(25);
        $pdf->Cell(0,2,'Website: http://desa-gondowangi.malangkab.go.id/',0,1,'C');
        
        $pdf->SetLineWidth(1);
        $pdf->Line(20,38,190,38);
        $pdf->SetLineWidth(0);
        $pdf->Line(20,39,190,39);

        $pdf->SetFont('times','U','15');
        $pdf->Cell(0,12,'',0,1,'C');
        $pdf->Cell(0,5,'SURAT PERMOHONAN KTP',0,1,'C');
        $pdf->SetFont('times','','12');
        $pdf->Cell(0,5,'Nomor: ...................................................',0,1,'C');

        $pdf->SetFont('times','','12');
        $pdf->Cell(10);
        $pdf->Cell(0,15,'Yang bertanda tangan dibawah ini: ',0,1,'L');
        $pdf->Cell(15);
        $pdf->SetFont('times','',12);
        $pdf->Cell(10);
        $pdf->Cell(10,8,'Nama ',0,0,'L');
        $pdf->Cell(35);
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell(1,8,'X',0,1,'L');
        $pdf->Cell(15);
        $pdf->Cell(10);
        $pdf->Cell(10,8,'Jabatan ',0,0,'L');
        $pdf->Cell(35);
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell(1,8,'Kepala Desa Gondowangi Kecamatan Wagir',0,1,'L');
        $pdf->Cell(75);
        $pdf->Cell(1,5,'Kabupaten Malang Jawa Timur',0,1,'L');
        
        $kependudukan = $this->db->get('surat')->result();

        foreach ($kependudukan as $row){
            if ($row->jenis_surat == "Surat Permohonan KTP" && $row->No_surat == $No_surat) {
            $this->load->model('M_permohonanktp');
            $detail= $this->M_permohonanktp->lihat($No_surat);

            $pdf->SetFont('times','','12');
            $pdf->Cell(10);
            $pdf->Cell(0,15,'Dengan ini menerangkan bahwa:',0,1,'L');
            $pdf->Cell(15);
            $pdf->SetFont('times','',12);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'a.   NIK',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(2,8,':',0,0,'L');
            $pdf->Cell(3);
            $pdf->Cell(1,8,$detail->NIK,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'b.   Nama Lengkap',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(2,8,':',0,0,'L');
            $pdf->Cell(3);
            $pdf->Cell(1,8,$detail->Nama_Lengkap,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'c.   Tempat/Tanggal Lahir',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(2,8,':',0,0,'L');
            $pdf->Cell(3);
            $pdf->Cell(1,8,$detail->Tempat_Lahir.', '.$detail->Tanggal_Lahir,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'d.   Jenis Kelamin',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(2,8,':',0,0,'L');
            $pdf->Cell(3);
            $pdf->Cell(1,8,$detail->Jenis_Kelamin,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'e.   Golongan Darah ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,$detail->Gol_darah,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'f.   Kewarganegaraan ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,'Indonesia',0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'g.   Agama ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,$detail->Agama,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'h.   Status Kawin ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,$detail->Status_kawin,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'i.   Pekerjaan ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,$detail->Pekerjaan,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'j.   Alamat ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,'Dusun '.$detail->Dusun.' RT.00'.$detail->No_RT.' RW.00'.$detail->No_RT,0,1,'L');
            $pdf->Cell(75);
            $pdf->Cell(1,8,'Desa Gondowangi Kecamatan Wagir ',0,1,'L');
            $pdf->Cell(75);
            $pdf->Cell(1,8,'Kabupaten Malang Jawa Timur '.$detail->Kode_pos,0,1,'L');
            $pdf->Cell(15);
            $pdf->Cell(5);
            $pdf->Cell(10,8,'i.   Keperluan ',0,0,'L');
            $pdf->Cell(40);
            $pdf->Cell(5,8,':',0,0,'L');
            $pdf->Cell(1,8,'Permohonan Pengajuan KTP',0,1,'L');

            $pdf->Ln(5);
            $pdf->SetFont('times','','12');
            $pdf->Cell(10);
            $pdf->Cell(0,6,'Demikian surat keterangan wali  dibuat agar dapat  digunakan sebagaimana  mestinya.',0,1,'L');

            $date = date('d M Y');

            $pdf->Ln(15);
            $pdf->Cell(120);
            $pdf->Cell(0,5,'Gondowangi, '.$date,0,1,'L');
            $pdf->Cell(120);
            $pdf->Cell(0,5,'Kepala Desa Gondowangi',0,1,'L');

            $pdf->Ln(20);
		    $pdf->Cell(120);
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(0,5,'NAMA KEPALA DESA',0,1,'L');
            $pdf->SetFont('Times','',12);
            $pdf->Cell(120);
            $pdf->Cell(0,5,'NIP.197308172002121002,',0,1,'L');

            $pdf->Output();
            }
            }
    }
    public function btn_tambah()
    {
        $this->load->view('templates/header9');
        $this->load->view('permohonan_ktp/v_tambahpermohonan_ktp');
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        // $NIK_pemohon = $this->input->post('No_KK');
        $NIK_pemohon = $this->input->post('NIK_pemohon');
        // $Wali_dari = $this->input->post('Wali_dari');
        // $Keperluan = $this->input->post('Keperluan');
        // $Tempat_lahir = $this->input->post('Tempat_lahir');
        // $Tanggal_lahir = $this->input->post('Tanggal_lahir');
        // $Status_perceraian = $this->input->post('Status_perceraian');
        $Keperluan = $this->input->post('Keperluan');
        $jenis_surat = $this->input->post('jenis_surat');

        $data2 = array(

            'NIK_pemohon' => $NIK_pemohon,
            // 'Status_perceraian' => $Status_perceraian,
            // 'Keperluan' => $Keperluan,
            // 'Tempat_lahir' => $Tempat_lahir,
            // 'Tanggal_lahir' => $Tanggal_lahir,
            // 'Jam_lahir' => $Jam_lahir,
            'jenis_surat' => $jenis_surat,
            'Keperluan' => $Keperluan,

        );
        $where = array('NIK_pemohon' => $NIK_pemohon);
        $this->load->model('M_permohonanktp');
        $this->M_permohonanktp->tambah($data2, 'surat');
        $this->load->view('permohonan_ktp/v_permohonan_ktp', $data2);
        redirect('Surat_PermohonanKTP/index');
    }
    public function hapus_data($No_surat)
    {
        $where = array('No_surat' => $No_surat);
        $this->load->model('M_permohonanktp');
        $this->M_permohonanktp->hapus($where, 'surat');
        redirect('Surat_PermohonanKTP/index');
    }
    public function sunting_data($No_surat)
    {
        $where = array('No_surat' => $No_surat);
        $this->load->model('M_permohonanktp');
        $data['surat'] = $this->M_permohonanktp->sunting($where, 'surat')->row();

        $this->load->view('templates/header9');
        $this->load->view('permohonan_ktp/v_suntingpermohonan_ktp', $data);
        $this->load->view('templates/footer');
    }
    public function update_data()
    {
        $No_surat = $this->input->post('No_surat');
        $NIK_pemohon = $this->input->post('NIK_pemohon');

        $data = array(
            'No_surat' => $No_surat,
            'NIK_pemohon' => $NIK_pemohon,

        );
        $where = array('No_surat' => $No_surat);
        $this->load->model('M_permohonanktp');
        $this->M_permohonanktp->update($where, $data, 'surat');
        redirect('Surat_PermohonanKTP/index');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_permohonanktp');
        $data['kependudukan'] = $this->M_permohonanktp->get_keyword($keyword);
        $data['kependudukan2'] = $this->M_permohonanktp->get_keyword($keyword);
        $this->load->view('templates/header9');
        $this->load->view('permohonan_ktp/v_permohonan_ktp', $data);
        $this->load->view('templates/footer');
    }
}
