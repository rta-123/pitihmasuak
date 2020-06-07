<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapstatuspegawaiskl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapstatuspegawaiskl');
		$this->load->model('master/Mkepegawaian');
		$this->load->model('master/Msekolah');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Status Kepegawaian per Sekolah',
			'page'  => 'Laporan Data berdasarkan Status Kepegawaian per Sekolah',
			'small' => 'List Laporan Data berdasarkan Status Kepegawaian per Sekolah',
			'urls'  => '<li class="active">Laporan Data berdasarkan Status Kepegawaian per Sekolah</li>',
			'data'  => $this->Mlapstatuspegawaiskl->tampildata(),
			'dpegawai'=>$this->Mkepegawaian->getall(),
			'dsikola'=>$this->Msekolah->getall()
		];
		$this->template->display('master/lapstatuspegawaiskl/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapstatuspegawaiskl->tampildata()
			
		];
		$this->load->view('master/lapstatuspegawaiskl/cetak',$data);

	}
	
	
}
