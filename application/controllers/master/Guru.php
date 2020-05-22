<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Mguru');
		$this->load->model('master/Msekolah');
		$this->load->model('master/Mgolongan');
		$this->load->model('master/Mkepegawaian');
		$this->load->model('master/Mjenisguru');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Guru',
			'page'  => 'Data Guru',
			'small' => 'List data Data Guru',
			'urls'  => '<li class="active">Data Guru</li>',
			'data'  => $this->Mguru->getall()
		];
		$this->template->display('master/gr/index', $data);//panggil dari view
	}
	public function create()
	{
		$d['dsekolah'] = $this->Msekolah->getall();
		$d['dgolongan'] = $this->Mgolongan->getall();
		$d['dkepegawaian'] = $this->Mkepegawaian->getall();
		$d['djenisguru'] = $this->Mjenisguru->getall();
		$d['agama'] = $this->Mguru->agama();

		$this->load->view('master/gr/create',$d);//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('nip', 'Nip Guru', 'required|is_unique[tb_guru.nip_guru]');
			$this->form_validation->set_rules('nama', 'Nama Guru', 'required');
			$this->form_validation->set_rules('tmplahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tgllahir', 'Tangggal Lahir', 'required');
			// $this->form_validation->set_rules('alamat', 'Alamat Guru', 'required');
			$this->form_validation->set_rules('tlp', 'Telp Guru', 'required');
			$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('agama', 'Agama', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('masajabatan', 'Masa Jabatan', 'required');
			$this->form_validation->set_rules('renpensiun', 'Ren Pensiun', 'required');
			$this->form_validation->set_rules('niplama', 'Nip Lama', 'required');
			$this->form_validation->set_rules('namadiklat', 'Nama Diklat', 'required');
			$this->form_validation->set_rules('thndiklat', 'Tahun Diklat', 'required');
			$this->form_validation->set_rules('kodesekolah', 'Kode Sekolah', 'required');
			$this->form_validation->set_rules('kodejenisguru', 'Kode Jenis Guru', 'required');
			$this->form_validation->set_rules('tgldiangkat', 'Tanggal Diangkat', 'required');
			$this->form_validation->set_rules('nosk', 'No SK', 'required');
			$this->form_validation->set_rules('kodegolongan', 'Kode Golongan', 'required');
			$this->form_validation->set_rules('kodekepegawaian', 'Kode Kepegawaian', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mguru->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Guru berhasil tersimpan.'));
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
		$d['dsekolah'] = $this->Msekolah->getall();
		$d['dgolongan'] = $this->Mgolongan->getall();
		$d['dkepegawaian'] = $this->Mkepegawaian->getall();
		$d['djenisguru'] = $this->Mjenisguru->getall();
		$d['data'] = $this->Mguru->shows($kode);
		$d['agama'] = $this->Mguru->agama();
		$this->load->view('master/gr/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			// $this->form_validation->set_rules('nip', 'Nip Guru', 'required');
			$this->form_validation->set_rules('nama', 'Nama Guru', 'required');
			$this->form_validation->set_rules('tmplahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tgllahir', 'Tangggal Lahir', 'required');
			// $this->form_validation->set_rules('alamat', 'Alamat Guru', 'required');
			$this->form_validation->set_rules('tlp', 'Telp Guru', 'required');
			$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('agama', 'Agama', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('masajabatan', 'Masa Jabatan', 'required');
			$this->form_validation->set_rules('renpensiun', 'Ren Pensiun', 'required');
			$this->form_validation->set_rules('niplama', 'Nip Lama', 'required');
			$this->form_validation->set_rules('namadiklat', 'Nama Diklat', 'required');
			$this->form_validation->set_rules('thndiklat', 'Tahun Diklat', 'required');
			$this->form_validation->set_rules('kodesekolah', 'Kode Sekolah', 'required');
			$this->form_validation->set_rules('kodejenisguru', 'Kode Jenis Guru', 'required');
			$this->form_validation->set_rules('tgldiangkat', 'Tanggal Diangkat', 'required');
			$this->form_validation->set_rules('nosk', 'No SK', 'required');
			$this->form_validation->set_rules('kodegolongan', 'Kode Golongan', 'required');
			$this->form_validation->set_rules('kodekepegawaian', 'Kode Kepegawaian', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Mguru->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Guru berhasil diupdate.'));
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
		if (!$this->Mguru->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Guru.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Guru.'));
		}
		redirect('gr');
	}
}
