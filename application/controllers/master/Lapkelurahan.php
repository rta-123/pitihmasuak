<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapkelurahan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapkelurahan');
	}
	public function index()
	{
		$data = [
			'title' => 'Laporan Data Kelurahan',
			'page'  => 'Laporan Data Kelurahan',
			'small' => 'List Laporan Data Kelurahan',
			'urls'  => '<li class="active">Laporan Data Kelurahan</li>',
			'data'  => $this->Mlapkelurahan->getall()
		];
		$this->template->display('master/laplurah/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapkelurahan->getall()
		];
		$this->load->view('master/laplurah/cetaklaplurah2',$data);

	}
	
	
}
