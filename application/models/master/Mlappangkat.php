<?php
class Mlappangkat extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_golongan,pangkat,golongan FROM tb_golongan JOIN tb_guru
ON kode_golongan=kode_golongan_guru ORDER BY nip_guru ASC")->result_array();
	}

	public function tampildata_kode($a)
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_golongan,pangkat,golongan FROM tb_golongan JOIN tb_guru
ON kode_golongan=kode_golongan_guru 
WHERE kode_golongan LIKE '$a' 
ORDER BY nip_guru ASC")->result_array();
	}


	

	
}
?>