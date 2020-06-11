<?php
class Mlapstatuspegawaiskl extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT nip_guru,nama_guru,kode_pegawai,status_pegawai,tgl_diangkat_guru,no_sk_guru,`nama_diklat_guru`,`thn_diklat_guru` 
FROM tb_kepegawaian 
JOIN tb_guru ON
kode_pegawai=kode_pegawai_guru 
JOIN `tb_sekolah` ON `tb_guru`.`kode_sekolah_guru`=`tb_sekolah`.`kode_sekolah`
ORDER BY nip_guru ASC;")->result_array();
	}

	public function tampildata_kode($a,$b)
	{
				return $this->db->query("SELECT nip_guru,nama_guru,kode_pegawai,status_pegawai,tgl_diangkat_guru,no_sk_guru,`nama_diklat_guru`,`thn_diklat_guru` 
FROM tb_kepegawaian 
JOIN tb_guru ON
kode_pegawai=kode_pegawai_guru 
JOIN `tb_sekolah` ON `tb_guru`.`kode_sekolah_guru`=`tb_sekolah`.`kode_sekolah`
WHERE status_pegawai like '$a' AND  kode_sekolah like '$b' 
ORDER BY nip_guru ASC;")->result_array();
	}


	
	
}
?>