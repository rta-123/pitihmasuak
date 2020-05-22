<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgolongan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgol');
	}
	public function index()
	{
		$data = [
			'title' => 'Laporan Data Pangkat dan Golongan Guru',
			'page'  => 'Laporan Data Pangkat dan Golongan Guru',
			'small' => 'List Laporan Data Pangkat dan Golongan Guru',
			'urls'  => '<li class="active">Laporan Data Pangkat dan Golongan Guru</li>',
			'data'  => $this->Mlapgol->tampildata()
		];
		$this->template->display('master/lapgol/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapgol->tampildata()
		];
		$this->load->view('master/lapgol/cetaklapgol',$data);

	}
	
	
}
