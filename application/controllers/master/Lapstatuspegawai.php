<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapstatuspegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mlapstatuspegawai');
		$this->load->model('master/Mkepegawaian');
	}
	public function index()
	{
		
		$data = [
			'title' => 'Laporan Data berdasarkan Status Kepegawaian',
			'page'  => 'Laporan Data berdasarkan Status Kepegawaian',
			'small' => 'List Laporan Data berdasarkan Status Kepegawaian',
			'urls'  => '<li class="active">Laporan Data berdasarkan Status Kepegawaian</li>',
			'data'  => $this->Mlapstatuspegawai->tampildata(),
			'dpegawai'=>$this->Mkepegawaian->getall()
		];
		$this->template->display('master/lapstatuspegawai/index', $data);//panggil dari view
	}

public function tabel_kode()
	{
		$a = $this->input->post('a');
		$data=[
			'data'  => $this->Mlapstatuspegawai->tampildata_kode($a)
		];
		$this->load->view('master/lapstatuspegawai/tabel', $data);

	}
public function tabel()
	{
		
		$data=[
			'data'  => $this->Mlapstatuspegawai->tampildata()
		];
		$this->load->view('master/lapstatuspegawai/tabel', $data);
		
	}
public function cetak()
	{
		$a = $this->uri->segment(4);
		$data=[
			'data'  => $this->Mlapstatuspegawai->tampildata_kode($a),
		];
		$this->load->view('master/lapstatuspegawai/cetak',$data);

	}	
}
