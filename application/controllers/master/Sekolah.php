<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/Msekolah');
		$this->load->model('master/Mkelurahan');
	}
	public function index()
	{
		$data = [
			'title' => 'Data Sekolah',
			'page'  => 'Data Sekolah',
			'small' => 'List data Data Sekolah',
			'urls'  => '<li class="active">Data Sekolah</li>',
			'data'  => $this->Msekolah->getall()
		];
		$this->template->display('master/sikola/index', $data);//panggil dari view
	}
	public function create()
	{
		$d['dlurah'] = $this->Mkelurahan->getall();

		$this->load->view('master/sikola/create',$d);//panggil dari view
	}
	public function store()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Sekolah', 'required|is_unique[tb_sekolah.kode_sekolah]');
			$this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat Sekolah', 'required');
			$this->form_validation->set_rules('telp', 'Telpon Sekolah', 'required');
			$this->form_validation->set_rules('jmlhonor', 'Jumlah Guru Honor', 'required');
			$this->form_validation->set_rules('jmlpns', 'Jumlah Guru PNS', 'required');
			$this->form_validation->set_rules('jmllk', 'Jumlah Siswa Laki-Laki', 'required');
			$this->form_validation->set_rules('jmlpr', 'Jumlah Siswi Perempuan', 'required');
			$this->form_validation->set_rules('kodelurah', 'Kode Lurah', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '%s sudah digunakan.');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Msekolah->store($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Sekolah berhasil tersimpan.'));
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
		$d['dlurah'] = $this->Mkelurahan->getall();
		$d['data'] = $this->Msekolah->shows($kode);
		$this->load->view('master/sikola/edit', $d);//panggil dari view
	}
	public function update()
	{
		if ($this->input->is_ajax_request() == TRUE) {
			$this->form_validation->set_rules('kode', 'Kode Sekolah', 'required');
			$this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat Sekolah', 'required');
			$this->form_validation->set_rules('telp', 'Telpon Sekolah', 'required');
			$this->form_validation->set_rules('jmlhonor', 'Jumlah Guru Honor', 'required');
			$this->form_validation->set_rules('jmlpns', 'Jumlah Guru PNS', 'required');
			$this->form_validation->set_rules('jmllk', 'Jumlah Siswa Laki-Laki', 'required');
			$this->form_validation->set_rules('jmlpr', 'Jumlah Siswi Perempuan', 'required');
			$this->form_validation->set_rules('kodelurah', 'Kode Lurah', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == TRUE) {
				$params = $this->input->post(null, TRUE);
				$this->Msekolah->update($params);
				$json['status'] = true;
				$this->session->set_flashdata('pesan', sukses('Data Sekolah berhasil diupdate.'));
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
		if (!$this->Msekolah->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data Sekolah.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data Sekolah.'));
		}
		redirect('sikola');
	}
}
