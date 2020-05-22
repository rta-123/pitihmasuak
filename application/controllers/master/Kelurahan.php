<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Kelurahan',
			'page'  => 'Data Kelurahan',
			'small' => 'List data Data Kelurahan',
			'urls'  => '<li class="active">Data Kelurahan</li>',
			'data'  => $this->Mkelurahan->getall()
		];
		$this->template->display('master/lurah/index', $data);//panggil dari view
	}
	public function create()
	{
		$this->load->view('master/lurah/create');//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Kelurahan', 'required|is_unique[tb_kelurahan.kode_lurah]');
			$this->form_validation->set_rules('nama', 'Nama Kelurahan', 'required');
			$this->form_validation->set_rules('jumlahsd', 'Jumlah SD', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mkelurahan->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Kelurahan berhasil tersimpan.'));
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
		$d['data'] = $this->Mkelurahan->shows($kode);
		$this->load->view('master/lurah/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Kelurahan', 'required');
			$this->form_validation->set_rules('nama', 'Nama Kelurahan', 'required');
			$this->form_validation->set_rules('jumlahsd', 'Jumlah SD', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mkelurahan->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Kelurahan berhasil diupdate.'));
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
		if (!$this->Mkelurahan->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Kelurahan.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Kelurahan.'));
		}
		redirect('lurah');
	}
}
