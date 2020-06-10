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
public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapberdasarkangol->tampildata(),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->load->view('master/lapberdasarkangol/tabel', $data);
		
	}
	public function tabel_kode()
	{
		$a = $this->input->post('a');
		$data=[
			'data'  => $this->Mlapberdasarkangol->tampildata_kode($a),
			'dgolongan'=>$this->Mgolongan->getall()
		];
		$this->load->view('master/lapberdasarkangol/tabel', $data);
	}
	public function cetak()
	{
		$a = $this->uri->segment(4);
		$data = [
			'data'  => $this->Mlapberdasarkangol->tampildata_kode($a)
			
		];
		$this->load->view('master/lapberdasarkangol/cetak',$data);

	}
	
	
}
