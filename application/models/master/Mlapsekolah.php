<?php
class Mlapsekolah extends CI_Model
{
	protected $tabel = 'tb_sekolah';
	public function getall()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function store($params)
	{
		$data = [
			'kode_sekolah'   => $params['kode'],
			'nama_sekolah'   => $params['nama'],
			'alamat_sekolah'   => $params['alamat'],
			'telp_sekolah'   => $params['telp'],
			'jml_guru_honor'   => $params['jmlhonor'],
			'jml_guru_pns'   => $params['jmlpns'],
			'jml_siswa_lk'   => $params['jmllk'],
			'jml_siswa_pr'   => $params['jmlpr'],
			'kode_lurah_sekolah'   => $params['kodelurah'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('kode_sekolah', $kode)->get($this->tabel)->row_array();
	}
	
	
}
