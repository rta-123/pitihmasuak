<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mkepegawaian');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Status Kepegawaian',
			'page'  => 'Data Status Kepegawaian',
			'small' => 'List Data Status Kepegawaian',
			'urls'  => '<li class="active">Data Status Kepegawaian</li>',
			'data'  => $this->Mkepegawaian->getall()
		];
		$this->template->display('master/pegawai/index', $data);//panggil dari view
	}
	public function create()
	{
		$this->load->view('master/pegawai/create');//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Kepegawaian', 'required|is_unique[tb_kepegawaian.kode_pegawai]');
			$this->form_validation->set_rules('status', 'Status Pegawai', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mkepegawaian->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Status Kepegawaian berhasil tersimpan.'));
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
		$d['data'] = $this->Mkepegawaian->shows($kode);
		$this->load->view('master/pegawai/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Kepegawaian', 'required');
			$this->form_validation->set_rules('status', 'Status Pegawai', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mkepegawaian->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Status Kepegawaian berhasil diupdate.'));
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
		if (!$this->Mkepegawaian->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus Data Status Kepegawaian.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus Data Status Kepegawaian.'));
		}
		redirect('pegawai');
	}
}
