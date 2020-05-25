<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapkepegawaian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlappegawai');
	}
	public function index()
	{
		$data = [
			'title' => 'Laporan Data Kepegawaian',
			'page'  => 'Laporan Data Kepegawaian',
			'small' => 'List Laporan Data Kepegawaian',
			'urls'  => '<li class="active">Laporan Data Kepegawaian</li>',
			'data'  => $this->Mlappegawai->tampildata()
		];
		$this->template->display('master/lappegawai/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlappegawai->tampildata()
		];
		$this->load->view('master/lappegawai/cetaklappegawai',$data);

	}
	
	
}
