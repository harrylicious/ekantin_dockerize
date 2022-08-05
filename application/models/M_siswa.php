<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_siswa extends CI_Model {

    public $table = 'siswa';
    public $id = 'id';
    public $kode = 'kode';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    // get data by kode
    public function get_by_kode($kode)
    {
        $this->db->where($this->kode, $kode);
        return $this->db->get($this->table)->row_array(); 
    }
    
    public function insert($data) {
        $this->db->insert($this->table, $data);
    } 

    public function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        
    }

}

?>