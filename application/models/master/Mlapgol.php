<?php
class Mlapgol extends CI_Model
{
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_golongan,pangkat,golongan FROM tb_guru JOIN tb_golongan ON
			kode_golongan_guru=kode_golongan ORDER BY nip_guru ASC")->result_array();
	}

	


	
	
}
?>