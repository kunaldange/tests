<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_model {

	public function check_email_exist($email)
	{
		$query = $this->db->select('*')
		         ->from('user_register')
		         ->where(array("user_email_id"=>$email))
		         ->get();

		return $query->num_rows();
	}

	public function get_count($tbl,$cond)
	{
		$query = $this->db->select('*')
		         ->from($tbl)
		         ->where($cond)
		         ->get();

		return $query->num_rows();
	}

	public function check_login_details($tbl,$cond)
	{
		$query = $this->db->select('*')
		         ->from($tbl)
		         ->where($cond)
		         ->get();

		return $query->row_array();
	}

	public function getUsers()
	{
		$qry = $this->db->select('*')->from('user_register')->get();
		return $qry->num_rows();
	}

		

	public function allCustomers()
	{
		$query = $this->db->select('*')->from('user_register')->get();
		return $query->result_array();
	}

	public function insert_function($tbl_nm,$data)
	{
		$qry = $this->db->insert($tbl_nm,$data);
		return $this->db->insert_id();
	}

	public function update_function($arr,$con,$tbl)
	{
		$query = $this->db->set($arr)->where($con)->update($tbl);
		return $this->db->affected_rows();
	}

}
?>
