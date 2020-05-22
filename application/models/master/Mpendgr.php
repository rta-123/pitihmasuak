<?php
class Mpendgr extends CI_Model
{
	protected $tabel = 'tb_pend_guru';
	public function getall()
	{
		$this->db->from($this->tabel);
		$this->db->join('tb_guru', 'nip_guru=nip_pend_guru');
		return $this->db->get()->result_array();
	}
	public function store($params)
	{
		$data = [
			'nip_pend_guru'   => $params['nippend'],
			'instansi_pend_guru'   => $params['instansi'],
			'prodi_pend_guru'   => $params['prodi'],
			'thn_lulus_pend_guru'   => $params['thnlulus'],
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function shows($kode)
	{
		return $this->db->where('nip_pend_guru', $kode)->get($this->tabel)->row_array();
	}
	public function update($params)
	{
		$kode = $params['kode'];
		$data = [
			'nip_pend_guru'   => $params['nippend'],
			'instansi_pend_guru'   => $params['instansi'],
			'prodi_pend_guru'   => $params['prodi'],
			'thn_lulus_pend_guru'   => $params['thnlulus'],
		];
		return $this->db->where('nip_pend_guru', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE nip_pend_guru='$kode'");
	}
}
