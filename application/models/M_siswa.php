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

    function get_tables($tables,$cari,$iswhere)
    { 
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_POST['search']['value']);
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
        // Ambil data start
        $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
        
        $query = $tables;
        
        if(!empty($iswhere)){
            $sql = $this->db->query("SELECT * FROM ".$query." WHERE ".$iswhere);
        }else{
            $sql = $this->db->query("SELECT * FROM ".$query);
        }

        $sql_count = $sql->num_rows();

        $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";

        
        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_field = $_POST['order'][0]['column']; 

        // Untuk menentukan order by "ASC" atau "DESC"
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

        if(!empty($iswhere)){
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }else{
            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
        }

        if(isset($search))
        {
            if(!empty($iswhere)){
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE $iswhere");
            }else{
                $sql_cari =  $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")");
            }
            $sql_filter_count = $sql_cari->num_rows();
        }else{
            if(!empty($iswhere)){
                $sql_filter = $this->db->query("SELECT * FROM ".$query."WHERE ".$iswhere);
            }else{
                $sql_filter = $this->db->query("SELECT * FROM ".$query);
            }
            $sql_filter_count = $sql_filter->num_rows();
        }
        $data = $sql_data->result_array();

        $callback = array(    
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
        return json_encode($callback); // Convert array $callback ke json
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