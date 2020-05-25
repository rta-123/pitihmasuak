<?php
class Mlapstatuspegawai extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_pegawai,status_pegawai FROM tb_kepegawaian JOIN tb_guru ON
kode_pegawai=kode_pegawai_guru ORDER BY nip_guru ASC")->result_array();
	}

	


	
	
}
?>