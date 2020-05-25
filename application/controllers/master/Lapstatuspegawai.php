<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapstatuspegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapstatuspegawai');
		$this->load->model('master/Mkepegawaian');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Status Kepegawaian',
			'page'  => 'Laporan Data berdasarkan Status Kepegawaian',
			'small' => 'List Laporan Data berdasarkan Status Kepegawaian',
			'urls'  => '<li class="active">Laporan Data berdasarkan Status Kepegawaian</li>',
			'data'  => $this->Mlapstatuspegawai->tampildata(),
			'dpegawai'=>$this->Mkepegawaian->getall()
		];
		$this->template->display('master/lapstatuspegawai/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapstatuspegawai->tampildata()
			
		];
		$this->load->view('master/lapstatuspegawai/cetaklapstatuspegawai',$data);

	}
	
	
}
