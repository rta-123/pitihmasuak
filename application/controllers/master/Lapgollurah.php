<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgollurah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgollurah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Golongan per Kelurahan',
			'page'  => 'Laporan Data berdasarkan Golongan per Kelurahan',
			'small' => 'List Laporan Data berdasarkan Golongan per Kelurahan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Golongan per Kelurahan</li>',
			'data'  => $this->Mlapgollurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/Lapgollurah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapgollurah->tampildata()
			
		];
		$this->load->view('master/Lapgollurah/cetak',$data);

	}
	
	
}
