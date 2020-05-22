<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mgolongan');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Golongan',
			'page'  => 'Data Golongan',
			'small' => 'List data Data Golongan',
			'urls'  => '<li class="active">Data Golongan</li>',
			'data'  => $this->Mgolongan->getall()
		];
		$this->template->display('master/gol/index', $data);//panggil dari view
	}
	public function create()
	{
		$this->load->view('master/gol/create');//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Golongan', 'required|is_unique[tb_golongan.kode_golongan]');
			$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
			$this->form_validation->set_rules('golongan', 'Golongan', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mgolongan->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Golongan berhasil tersimpan.'));
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
		$d['data'] = $this->Mgolongan->shows($kode);
		$this->load->view('master/gol/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Golongan', 'required');
			$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
			$this->form_validation->set_rules('golongan', 'Golongan', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mgolongan->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Golongan berhasil diupdate.'));
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
		if (!$this->Mgolongan->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Golongan.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Golongan.'));
		}
		redirect('gol');
	}
}
