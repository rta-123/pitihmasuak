<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgurukelurahan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgurukelurahan');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		

		$data = [
			'title' => 'Laporan Data Guru per Kelurahan',
			'page'  => 'Laporan Data Guru per Kelurahan',
			'small' => 'List Laporan Data Guru per Kelurahan',
			'urls'  => '<li class="active">Laporan Data Guru per Kelurahan</li>',
			'data'  => $this->Mlapgurukelurahan->tampildata(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->template->display('master/lapgrkelurahan/index', $data);//panggil dari view
	}
	public function tabel_kode()
	{
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$data=[
			'data'  => $this->Mlapgurukelurahan->tampildata_kode($a,$b),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->load->view('master/lapgrkelurahan/tabel', $data);
	}
		public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapgurukelurahan->tampildata(),
			'dlurah'=>$this->Mkelurahan->getall()
		];
		$this->load->view('master/lapgrkelurahan/tabel', $data);
		
	}
	public function cetak()
	{
		$data = [
			'data'  => $this->Mlapgurukelurahan->tampildata()
			
		];
		$this->load->view('master/lapgrkelurahan/cetakgrkelurahan',$data);

	}
	
	
}
