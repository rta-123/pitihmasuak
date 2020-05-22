<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapsekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapsekolah');
	}
	public function index()
	{
		$data = [
			'title' => 'Laporan Data Sekolah',
			'page'  => 'Laporan Data Sekolah',
			'small' => 'List Laporan Data Sekolah',
			'urls'  => '<li class="active">Laporan Data Sekolah</li>',
			'data'  => $this->Mlapsekolah->getall()
		];
		$this->template->display('master/lapsikola/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapsekolah->getall()
		];
		$this->load->view('master/lapsikola/cetaklapsikola',$data);

	}
	
	
}
