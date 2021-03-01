<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdb extends CI_Model {

	public function getall($dbs = []){
		if(isset($dbs['from'])){
			$this->db->from($dbs['from']);
			if(isset($dbs['where'])){
				$this->db->where($dbs['where']);
			}
			if(isset($dbs['select'])){
				$this->db->select($dbs['select']);
			}
			if(isset($dbs['join'])){
				foreach ($dbs['join'] as $key => $value) {
					$this->db->join($key, $value, 'left');
				}
			}
			if(isset($dbs['group'])){
				foreach ($dbs['group'] as $key) {
					$this->db->group_by($key);
				}
			}
			if(isset($dbs['sort'])){
				foreach ($dbs['sort'] as $key => $value) {
					$this->db->order_by($key,$value);
				}
			}
			if(isset($dbs['limit'])){
				$this->db->limit($dbs['limit'][0],$dbs['limit'][1]);
			}
			return $this->db->get()->result_array();
		}
	}
	public function insertdb($tabel = "",$data = ""){
		if($tabel != "" and is_array($data)){
			$this->db->insert($tabel, $data);
			return $this->db->insert_id();
		}
	}
	public function insertdbba($tabel = "",$data = ""){
		if($tabel != "" and is_array($data)){
			return $this->db->insert_batch($tabel, $data);
		}
	}
	public function updatedb($tabel = "",$data = "",$id = "",$fwhere = ""){
		if($tabel != "" and is_array($data)){
			if($id and $fwhere){
				$this->db->where($fwhere, $id);
				return $this->db->update($tabel, $data);
			}
		}
	}
	public function deletedb($id = "",$tbl = "",$wh = ""){
		if($id != "" and $tbl != ""){
			$this->db->where($wh, $id);
			$this->db->delete($tbl);
			if ($this->db->affected_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
}

/* End of file Getdb.php */
/* Location: ./application/models/Getdb.php */
