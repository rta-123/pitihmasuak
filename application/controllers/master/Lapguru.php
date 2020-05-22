<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapguru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapguru');
		
	}
	public function index()
	{
		$data = [
			'title' => 'Laporan Data Guru',
			'page'  => 'Laporan Data Guruu',
			'small' => 'List Laporan Data Guru',
			'urls'  => '<li class="active">Laporan Data Guru</li>',
			'data'  => $this->Mlapguru->tampildata()
		];
		$this->template->display('master/lapgr/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapguru->tampildata()
		];
		$this->load->view('master/lapgr/cetaklapguru',$data);

	}
	
	
}
