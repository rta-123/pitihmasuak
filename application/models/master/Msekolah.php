<?php
class Msekolah extends CI_Model
{
	protected $tabel = 'tb_sekolah';
	public function getall()
	{
		$this->db->from($this->tabel);
		$this->db->join('tb_kelurahan', 'kode_lurah=kode_lurah_sekolah');
		return $this->db->get()->result_array();
		//return $this->db->get($this->tabel)->result_array();
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
	public function update($params)
	{
		$kode = $params['kode'];
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
		return $this->db->where('kode_sekolah', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE kode_sekolah='$kode'");
	}
}
