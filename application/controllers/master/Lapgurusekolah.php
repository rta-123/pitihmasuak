<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapgurusekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapgurusekolah');
		$this->load->model('master/Msekolah');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data Guru per Sekolah',
			'page'  => 'Laporan Data Guru per Sekolah',
			'small' => 'List Laporan Data Guru per Sekolah',
			'urls'  => '<li class="active">Laporan Data Guru per Sekolah</li>',
			'data'  => $this->Mlapgurusekolah->tampildata(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->template->display('master/lapgrsekolah/index', $data);//panggil dari view
	}
		public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapgurusekolah->tampildata(),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->load->view('master/lapgrsekolah/tabel', $data);
		
	}
	public function tabel_kode()
	{
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$data=[
			'data'  => $this->Mlapgurusekolah->tampildata_kode($a,$b),
			'dsekolah'=>$this->Msekolah->getall()
		];
		$this->load->view('master/lapgrsekolah/tabel', $data);
	}

	public function cetak()
	{
		$a = $this->uri->segment(4);
		$data = [
			'data'  => $this->Mlapgurusekolah->tampildata_kode($a,'')
			
		];
		$this->load->view('master/lapgrsekolah/cetak',$data);

	}
	
	
}
