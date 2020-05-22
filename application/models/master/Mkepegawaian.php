<?php
class Mkepegawaian extends CI_Model
{
	protected $tabel = 'tb_kepegawaian';
	public function getall()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function store($params)
	{
		$data = [
			'kode_pegawai'   => $params['kode'],
			'status_pegawai'   => $params['status'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('kode_pegawai', $kode)->get($this->tabel)->row_array();
	}
	public function update($params)
	{
		$kode = $params['kode'];
		$data = [
		    'kode_pegawai'   => $params['kode'],
			'status_pegawai'   => $params['status'],
		];
		return $this->db->where('kode_pegawai', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE kode_pegawai='$kode'");
	}
}
