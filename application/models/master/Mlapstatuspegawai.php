<?php
class Mlapstatuspegawai extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_pegawai,status_pegawai,tgl_diangkat_guru,no_sk_guru,`nama_diklat_guru`,`thn_diklat_guru` 
FROM tb_kepegawaian 
JOIN tb_guru ON
kode_pegawai=kode_pegawai_guru 
ORDER BY nip_guru ASC;")->result_array();
	}

public function tampildata_kode($a)
{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_pegawai,status_pegawai,tgl_diangkat_guru,no_sk_guru,`nama_diklat_guru`,`thn_diklat_guru` 
FROM tb_kepegawaian 
JOIN tb_guru ON
kode_pegawai=kode_pegawai_guru 
WHERE status_pegawai like '$a'
ORDER BY nip_guru ASC;")->result_array();
}
	


	
	
}
?>