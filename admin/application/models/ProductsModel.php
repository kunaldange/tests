<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends CI_model {

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

  public function getOrders()
  {
    $qry = $this->db->select('*')->from('buy_history')->get();
    return $qry->num_rows();
  }

	public function getOrdersInfo()
  {
    $qry = $this->db->select('*')->from('buy_history')->get();
    return $qry->result_array();
  }

	public function getCrystal()
	{
		$qry = $this->db->select('*')->from('tbl_crystal')->get();
		return $qry->num_rows();
	}

	public function insertYoutube($vid)
	{
		$tbl = "youtube_video";
		$qry = $this->db->insert($tbl,$vid);
		return $qry;
	}

	public function allCrystals()
	{
		$query = $this->db->select('*')->from('tbl_crystal')->get();
		return $query->result_array();
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

	public function getvices()
	{
		$query = $this->db->select('*')->from('vices')->get();
		return $query->result_array();
	}
	public function getchakra()
	{
		$query = $this->db->select('*')->from('chakra')->get();
		return $query->result_array();
	}
	public function getzodiac()
	{
		$query = $this->db->select('*')->from('tbl_zodic')->get();
		return $query->result_array();
	}
	public function getzodiac_dates()
	{
		$query = $this->db->select('id,zodiac_id,date_range')->from('date_ranges')->get();
		return $query->result_array();
	}
	public function getcolor()
	{
		$query = $this->db->select('*')->from('tbl_color')->get();
		return $query->result_array();
	}
	public function getaspect()
	{
		$query = $this->db->select('*')->from('aspect_of_life')->get();
		return $query->result_array();
	}
	public function getCustomVideos()
	{
		$query = $this->db->select('*')->from('custom_video')->get();
		return $query->result_array();
	}
	public function getYoutubeVideos()
	{
		$query = $this->db->select('*')->from('youtube_video')->get();
		return $query->result_array();
	}

}
?>
