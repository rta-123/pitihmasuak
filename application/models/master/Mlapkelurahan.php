<?php
class Mlapkelurahan extends CI_Model
{
	protected $tabel = 'tb_kelurahan';
	public function getall()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function store($params)
	{
		$data = [
			'kode_lurah'   => $params['kode'],
			'nama_lurah'   => $params['nama'],
			'jumlah_sd'   => $params['jumlahsd'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('kode_lurah', $kode)->get($this->tabel)->row_array();
	}
	
	
}
