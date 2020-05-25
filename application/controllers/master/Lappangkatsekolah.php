<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lappangkatsekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlappangkatsekolah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Msekolah');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Pangkat per Sekolah',
			'page'  => 'Laporan Data berdasarkan Pangkat per Sekolah',
			'small' => 'List Laporan Data berdasarkan Pangkat per Sekolah',
			'urls'  => '<li class="active">Laporan Data berdasarkan Pangkat per Sekolah</li>',
			'data'  => $this->Mlappangkatsekolah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dsikola'=>$this->Msekolah->getall()
		];
		$this->template->display('master/lappangkatsekolah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlappangkatsekolah->tampildata()
			
		];
		$this->load->view('master/lappangkatsekolah/cetaklappangkatsekolah',$data);

	}
	
	
}
