<?php
class Mgolongan extends CI_Model
{
	protected $tabel = 'tb_golongan';
	public function getall()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function store($params)
	{
		$data = [
			'kode_golongan'   => $params['kode'],
			'pangkat'   => $params['pangkat'],
			'golongan'   => $params['golongan'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('kode_golongan', $kode)->get($this->tabel)->row_array();
	}
	public function update($params)
	{
		$kode = $params['kode'];
		$data = [
			'kode_golongan'   => $params['kode'],
			'pangkat'   => $params['pangkat'],
			'golongan'   => $params['golongan'],
		];
		return $this->db->where('kode_golongan', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE kode_golongan='$kode'");
	}
}
