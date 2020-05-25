<?php
class Mlapberdasarkangol extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_golongan,pangkat,golongan FROM tb_golongan JOIN tb_guru
ON kode_golongan=kode_golongan_guru ORDER BY nip_guru ASC")->result_array();
	}

	


	
	
}
?>