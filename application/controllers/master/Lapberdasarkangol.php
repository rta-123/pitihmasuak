<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapberdasarkangol extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapberdasarkangol');
		$this->load->model('master/Mgolongan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Golongan',
			'page'  => 'Laporan Data berdasarkan Golongan',
			'small' => 'List Laporan Data berdasarkan Golongan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Golongan</li>',
			'data'  => $this->Mlapberdasarkangol->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->template->display('master/lapberdasarkangol/index', $data);//panggil dari view
	}

	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapberdasarkangol->tampildata()
			
		];
		$this->load->view('master/lapberdasarkangol/cetaklapberdasarkangol',$data);

	}
	
	
}
