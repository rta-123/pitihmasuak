<?php
class Mjenisguru extends CI_Model
{
	protected $tabel = 'tb_jenisguru';
	public function getall()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function store($params)
	{
		$data = [
			'kode_matapelajaran'   => $params['kode'],
			'nama_matapelajaran'   => $params['nama'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('kode_matapelajaran', $kode)->get($this->tabel)->row_array();
	}
	public function update($params)
	{
		$kode = $params['kode'];
		$data = [
			'kode_matapelajaran'   => $params['kode'],
			'nama_matapelajaran'   => $params['nama'],
		];
		return $this->db->where('kode_matapelajaran', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE kode_matapelajaran='$kode'");
	}
}
