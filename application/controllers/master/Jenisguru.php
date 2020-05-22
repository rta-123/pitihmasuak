<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisguru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mjenisguru');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Jenis Guru',
			'page'  => 'Data Jenis Guru',
			'small' => 'List Data Jenis Guru',
			'urls'  => '<li class="active">Data Jenis Guru</li>',
			'data'  => $this->Mjenisguru->getall()
		];
		$this->template->display('master/jenisgr/index', $data);//panggil dari view
	}
	public function create()
	{
		$this->load->view('master/jenisgr/create');//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Mata Pelajaran', 'required|is_unique[tb_jenisguru.kode_matapelajaran]');
			$this->form_validation->set_rules('nama', 'Nama Mata Pelajaran', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mjenisguru->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Jenis Guru berhasil tersimpan.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);
		} else {
			exit('data tidak bisa dieksekusi');
		}
	}
	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mjenisguru->shows($kode);
		$this->load->view('master/jenisgr/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Mata Pelajaran', 'required');
			$this->form_validation->set_rules('nama', 'Nama Mata Pelajaran', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mjenisguru->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Jenis Guru berhasil diupdate.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);
		} else {
			exit('data tidak bisa dieksekusi');
		}
	}
	public function destroy($kode)
	{
		if (!$this->Mjenisguru->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Jenis Guru.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Jenis Guru.'));
		}
		redirect('jenisgr');
	}
}
