<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lappangkatlurah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlappangkatlurah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Pangkat per Kelurahan',
			'page'  => 'Laporan Data berdasarkan Pangkat per Kelurahan',
			'small' => 'List Laporan Data berdasarkan Pangkat per Kelurahan',
			'urls'  => '<li class="active">Laporan Data berdasarkan Pangkat per Kelurahan</li>',
			'data'  => $this->Mlappangkatlurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/Lappangkatlurah/index', $data);//panggil dari view
	}
	public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlappangkatlurah->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->load->view('master/Lappangkatlurah/tabel', $data);
		
	}
	public function tabel_kode()
	{
		 $a = $this->input->post('a');
		  $b = $this->input->post('b');
		$data=[
			'data'  => $this->Mlappangkatlurah->tampildata_kode($a,$b),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->load->view('master/Lappangkatlurah/tabel', $data);

	}

public function cetak()
	{
		$a = $this->uri->segment(4);
		$b =$this->uri->segment(5);
		$data=[
			'data'  => $this->Mlappangkatlurah->tampildata_kode($a,$b),
			'dgolongan'=>$this->Mgolongan->getall(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->load->view('master/Lappangkatlurah/cetak',$data);

	}
	
	
}
