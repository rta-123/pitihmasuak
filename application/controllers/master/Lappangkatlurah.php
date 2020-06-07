<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lappangkatlurah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlappangkatlurah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Pangkat per Kelurahan',
			'page'  => 'Laporan Data berdasarkan Pangkat per Kelurahan',
			'small' => 'List Laporan Data berdasarkan Pangkat per Kelurahan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Pangkat per Kelurahan</li>',
			'data'  => $this->Mlappangkatlurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/Lappangkatlurah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlappangkatlurah->tampildata()
			
		];
		$this->load->view('master/Lappangkatlurah/cetak',$data);

	}
	
	
}
