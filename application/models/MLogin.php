<?php
use GuzzleHttp\Client;

	class MLogin extends CI_Model
	{
		function __construct()
		{

			 $this->_Client = new Client([
            'base_uri' => 'http://localhost/Rest-ServerSekolahGT/Login/',
            'auth' => ['rama', 'jerapah']


        ]);

			parent::__construct();
		}

		function GoLogin($username,$password, $table)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			$query = $this->db->get();
			
			if($query -> num_rows() == 1)
			{
				$row = $query->row(); 
    			return $row->username;
			}
			else
			{
				return false;
			}
		}


///////////////////////////////////////////////////////////////////////////////
		function auth_staf($username,$password)
		{
		$query=$this->db->query("SELECT * FROM tbl_staf WHERE nis_staf='$username' LIMIT 1");
		return $query;
		}

		function auth_dosen($username,$password)
		{
		$query=$this->db->query("SELECT * FROM tbl_guru WHERE nid='$username'  LIMIT 1");
		return $query;
		}

	//cek nim dan password mahasiswa
		function auth_mahasiswa($username,$password)
		{
		$query=$this->db->query("SELECT * FROM tbl_siswa WHERE nis='$username' LIMIT 1");
		return $query;
		}
		function bawahanstaf($username, $password)
		{
			$query = $this->db->query("SELECT * FROM tbl_stafbawah WHERE nip='$username' LIMIT 1 ");
			return $query;
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////


	}
?>