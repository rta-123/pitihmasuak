<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgurusekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgurusekolah');
		$this->load->model('master/Msekolah');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data Guru per Sekolah',
			'page'  => 'Laporan Data Guru per Sekolah',
			'small' => 'List Laporan Data Guru per Sekolah',
			'urls'  => '<li class="active">Laporan Data Guru per Sekolah</li>',
			'data'  => $this->Mlapgurusekolah->tampildata(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->template->display('master/lapgrsekolah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapgurusekolah->tampildata()
			
		];
		$this->load->view('master/lapgrsekolah/cetakgrsekolah',$data);

	}
	
	
}
