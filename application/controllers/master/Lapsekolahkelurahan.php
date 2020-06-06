<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapsekolahkelurahan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapsekolahkelurahan');
		$this->load->model('master/Mkelurahan');
		$this->load->model('master/Msekolah');
	}

	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data Sekolah per Kelurahan',
			'page'  => 'Laporan Data Sekolah per Kelurahan',
			'small' => 'List Laporan Data Sekolah per Kelurahan',
			'urls'  => '<li class="active">Laporan Data Sekolah per Kelurahan</li>',
			'data'  => $this->Mlapsekolahkelurahan->tampildata(),
			'dlurah'=>$this->Mkelurahan->getall(),
			'dsekolah'=>$this->Msekolah->getall()
		];

		$this->template->display('master/lapsklkelurahan/index', $data);//panggil dari view
	}
	public function tabel_kode()
	{
		$kode_sekolah = $this->input->post('sekolah');
		$kode_lurah = $this->input->post('lurah');
		$data=[
			'data'  => $this->Mlapsekolahkelurahan->tampildata_kode($kode_sekolah,$kode_lurah),
			'dlurah'=>$this->Mkelurahan->getall(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->load->view('master/lapsklkelurahan/tabel', $data);
	}
	public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapsekolahkelurahan->tampildata(),
			'dlurah'=>$this->Mkelurahan->getall(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->load->view('master/lapsklkelurahan/tabel', $data);
		
	}

	public function cetak()
	{
		// $kode_sekolah = $this->input->post('sekolah');
		// $kode_lurah = $this->input->post('lurah');
echo 		$kode_sekolah = $this->uri->segment(4);
	echo 	$kode_lurah = $this->uri->segment(5);
		$data=[
			'data'  => $this->Mlapsekolahkelurahan->tampildata_kode($kode_sekolah,$kode_lurah),
			'dlurah'=>$this->Mkelurahan->getall(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->load->view('master/lapsklkelurahan/cetak', $data);


	}
	
	
}
