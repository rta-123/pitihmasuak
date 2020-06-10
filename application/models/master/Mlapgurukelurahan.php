<?php
class Mlapgurukelurahan extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("		SELECT kode_sekolah,nama_sekolah,nip_guru,nama_guru,alamat_guru,tmp_lahir_guru,tgl_lahir_guru,
telp_guru,jenkel_guru , `status_pegawai`,`nama_matapelajaran`, `jabatan_guru`
FROM tb_sekolah 
JOIN tb_guru 
ON kode_sekolah=kode_sekolah_guru  
JOIN `tb_kepegawaian` 
ON `tb_kepegawaian`.`kode_pegawai`=`tb_guru`.`kode_pegawai_guru` 
JOIN `tb_jenisguru`
ON `tb_jenisguru`.`kode_matapelajaran`=`tb_guru`.`kode_jenis_guru`
JOIN `tb_kelurahan` 
ON `kode_lurah_sekolah`=tb_kelurahan.`kode_lurah`
ORDER BY kode_sekolah ASC;")->result_array();
	}
public function tampildata_kode($a,$b)
{
	return $this->db->query("
		SELECT kode_sekolah,nama_sekolah,nip_guru,nama_guru,alamat_guru,tmp_lahir_guru,tgl_lahir_guru,
telp_guru,jenkel_guru , `status_pegawai`,`nama_matapelajaran`, `jabatan_guru`
FROM tb_sekolah 
JOIN tb_guru 
ON kode_sekolah=kode_sekolah_guru  
JOIN `tb_kepegawaian` 
ON `tb_kepegawaian`.`kode_pegawai`=`tb_guru`.`kode_pegawai_guru` 
JOIN `tb_jenisguru`
ON `tb_jenisguru`.`kode_matapelajaran`=`tb_guru`.`kode_jenis_guru`
JOIN `tb_kelurahan` 
ON `kode_lurah_sekolah`=tb_kelurahan.`kode_lurah`
WHERE `kode_lurah_sekolah` 
LIKE '%$a%'  ORDER BY kode_sekolah ASC;")->result_array();
}
	


	
	
}
?>