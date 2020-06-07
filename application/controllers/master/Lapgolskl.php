<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgolskl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgolskl');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Msekolah');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Golongan per Sekolah',
			'page'  => 'Laporan Data berdasarkan Golongan per Sekolah',
			'small' => 'List Laporan Data berdasarkan Golongan per Sekolah',
			'urls'  => '<li class="active">Laporan Data berdasarkan Golongan per Sekolah</li>',
			'data'  => $this->Mlapgolskl->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dsikola'=>$this->Msekolah->getall()
		];
		$this->template->display('master/Lapgolskl/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapgolskl->tampildata()
			
		];
		$this->load->view('master/Lapgolskl/cetak',$data);

	}
	
	
}
