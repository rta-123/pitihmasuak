<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgollurah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgollurah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Golongan per Kelurahan',
			'page'  => 'Laporan Data berdasarkan Golongan per Kelurahan',
			'small' => 'List Laporan Data berdasarkan Golongan per Kelurahan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Golongan per Kelurahan</li>',
			'data'  => $this->Mlapgollurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/Lapgollurah/index', $data);//panggil dari view
	}

	public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapgollurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
				];
		$this->load->view('master/Lapgollurah/tabel', $data);
		
	}
		public function tabel_kode()
	{
		 $a = $this->input->post('a');
		  $b = $this->input->post('b');
		 $data=[
			'data'  => $this->Mlapgollurah->tampildata_kode($a,$b)
		];
		$this->load->view('master/Lapgollurah/tabel', $data);

	}
	public function cetak()
	{
		$a = $this->uri->segment(4);
		$b =$this->uri->segment(5);
		 $data=[
			'data'  => $this->Mlapgollurah->tampildata_kode($a,$b)
		];
		$this->load->view('master/Lapgollurah/cetak', $data);

	}
	
	
}
