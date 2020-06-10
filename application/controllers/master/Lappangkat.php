<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lappangkat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlappangkat');
		$this->load->model('master/Mgolongan');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Pangkat',
			'page'  => 'Laporan Data berdasarkan Pangkat',
			'small' => 'List Laporan Data berdasarkan Pangkat',
			'urls'  => '<li class="active">Laporan Data berdasarkan Pangkat</li>',
			'data'  => $this->Mlappangkat->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->template->display('master/lappangkat/index', $data);//panggil dari view
	}

public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlappangkat->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->load->view('master/lappangkat/tabel', $data);
		
	}
		public function tabel_kode()
	{
		$a = $this->input->post('a');
		$data=[
			'data'  => $this->Mlappangkat->tampildata_kode($a),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->load->view('master/lappangkat/tabel', $data);
	}
	public function cetak()
	{
		$a = $this->uri->segment(4);
		$data = [
			'data'  => $this->Mlappangkat->tampildata_kode($a)
			
		];
		$this->load->view('master/lappangkat/cetak',$data);

	}
	
	
}
