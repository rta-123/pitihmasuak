<?php
class Mlapsekolahkelurahan extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT kode_sekolah,nama_sekolah,alamat_sekolah,telp_sekolah,jml_guru_honor,jml_guru_pns,jml_siswa_lk,jml_siswa_pr FROM tb_sekolah
ORDER BY kode_sekolah ASC")->result_array();
	}
		public function tampildata_kode($sekolah,$lurah)
	{
		return $this->db->query("SELECT kode_sekolah,nama_sekolah,alamat_sekolah,telp_sekolah,jml_guru_honor,jml_guru_pns,jml_siswa_lk,jml_siswa_pr FROM tb_sekolah WHERE `kode_sekolah`  LIKE '%$sekolah%' AND `kode_lurah_sekolah` LIKE '%$lurah%'
ORDER BY kode_sekolah ASC;")->result_array();
	}


	
	
}
?>