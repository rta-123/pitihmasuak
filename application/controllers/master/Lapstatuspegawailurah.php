<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapstatuspegawailurah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapstatuspegawailurah');
		$this->load->model('master/Mkepegawaian');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Status Kepegawaian per Kelurahan',
			'page'  => 'Laporan Data berdasarkan Status Kepegawaian per Kelurahan',
			'small' => 'List Laporan Data berdasarkan Status Kepegawaian per Kelurahan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Status Kepegawaian per Kelurahan</li>',
			'data'  => $this->Mlapstatuspegawailurah->tampildata(),
			'dpegawai'=>$this->Mkepegawaian->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/Lapstatuspegawailurah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapstatuspegawailurah->tampildata()
			
		];
		$this->load->view('master/Lapstatuspegawailurah/cetaklapstatuspegawailurah',$data);

	}
	
	
}
