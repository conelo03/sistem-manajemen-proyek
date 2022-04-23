<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	public $table	= 'tb_project';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_project)
	{
		return $this->db->get_where($this->table, ['id_project' => $id_project])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_project', $data['id_project']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_project)
	{
		$this->db->delete($this->table, ['id_project' => $id_project]);
	}
}
