<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendguru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mpendgr');
		$this->load->model('master/Mguru');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Pendidikan Guru',
			'page'  => 'Data Pendidikan Guru',
			'small' => 'List  Data Pendidikan Guru',
			'urls'  => '<li class="active">Data Pendidikan Guru</li>',
			'data'  => $this->Mpendgr->getall()
		];
		$this->template->display('master/pendgr/index', $data);//panggil dari view
	}
	public function create()
	{
		$d['dguru'] = $this->Mguru->getall();
		$this->load->view('master/pendgr/create',$d);//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('nippend', 'NIP Pend Guru', 'required|is_unique[tb_pend_guru.nip_pend_guru]');
			$this->form_validation->set_rules('instansi', 'Instansi', 'required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('thnlulus', 'Tahun Lulus', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mpendgr->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Pendidikan Guru berhasil tersimpan.'));
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
		$d['dguru'] = $this->Mguru->getall();
		$d['data'] = $this->Mpendgr->shows($kode);
		$this->load->view('master/pendgr/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('nippend', 'NIP Pend Guru', 'required');
			$this->form_validation->set_rules('instansi', 'Instansi', 'required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('thnlulus', 'Tahun Lulus', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mpendgr->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Pendidikan Guru berhasil diupdate.'));
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
		if (!$this->Mpendgr->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Pendidikan Guru.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Pendidikan Guru.'));
		}
		redirect('pendgr');
	}
}
