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

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapsekolahkelurahan->tampildata()
			
		];
		$this->load->view('master/lapsklkelurahan/cetaklapsklkelurahan',$data);

	}
	
	
}
