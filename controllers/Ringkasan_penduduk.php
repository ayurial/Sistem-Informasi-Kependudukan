<?php

class Ringkasan_penduduk extends CI_Controller
{
	function index()
	{
		$this->load->model('M_ringkasanpenduduk');
		// $data['penduduk'] = $this->M_ringkasanpenduduk->get_kat_miskin();
		// echo json_encode($data);
		$data['penduduk'] = $this->M_ringkasanpenduduk->get_penduduk();
		$data['jk'] = $this->M_ringkasanpenduduk->get_data();
		$data['agama'] = $this->M_ringkasanpenduduk->get_agama();
		$data['pekerjaan'] = $this->M_ringkasanpenduduk->get_pekerjaan();
		$data['pendidikan'] = $this->M_ringkasanpenduduk->get_pendidikan();
		$data['KK'] = $this->M_ringkasanpenduduk->get_jumlahKK();
		$data['katmiskin'] = $this->M_ringkasanpenduduk->get_kat_miskin();
		$this->load->view('templates/header13');
		$this->load->view('ringkasan_penduduk/v_ringkasanpenduduk', $data);
		$this->load->view('templates/footer');
	}
	// function agama()
	// {
	// 	$this->load->model('M_ringkasanpenduduk');
	// 	$data['penduduk'] = $this->M_ringkasanpenduduk->get_agama();
	// 	// echo json_encode($data);
	// 	$this->load->view('templates/header13');
	// 	$this->load->view('ringkasan_penduduk/v_ringkasanagama', $data);
	// 	$this->load->view('templates/footer');
	// }
}
