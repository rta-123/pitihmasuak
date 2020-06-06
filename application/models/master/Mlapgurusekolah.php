<?php
class Mlapgurusekolah extends CI_Model
{
	
		public function tampildata()
	{
		return $this->db->query("SELECT kode_sekolah,nama_sekolah,nip_guru,nama_guru,alamat_guru,tmp_lahir_guru,tgl_lahir_guru,telp_guru,jenkel_guru FROM tb_sekolah JOIN tb_guru ON
kode_sekolah=kode_sekolah_guru ORDER BY kode_sekolah ASC")->result_array();
	}

	public function tampildata_kode($a,$b)
	{
		return $this->db->query("SELECT kode_sekolah,nama_sekolah,nip_guru,nama_guru,alamat_guru,tmp_lahir_guru,tgl_lahir_guru,telp_guru,jenkel_guru FROM tb_sekolah JOIN tb_guru ON
		kode_sekolah=kode_sekolah_guru WHERE `kode_sekolah` LIKE '$a' OR `nama_sekolah` LIKE '$b' ORDER BY kode_sekolah ASC;")->result_array();
	}


	
	
}
?>