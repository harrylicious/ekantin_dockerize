<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_siswa');
        $this->load->model('m_belanja');
        $this->load->model('m_topup');
        $this->load->model('m_ssp');
    }

    public function index()
    {
        $data['data_topup'] = $this->m_topup->get_all_riwayat();
        $this->template->load('template', 'v_daftar_riwayat_topup', $data);
    } 

    public function export() 
    {
        $data['data'] = $this->m_topup->get_all_riwayat_export(); 
        $this->load->view('v_export_topup', $data); 
    }

    function get_all_data()
    {
        $search = array('id', 'tgl_top_up', 'jam_top_up', 'nama_siswa', 'nominal_top_up', 'sisa_saldo_terakhir', 'sisa_saldo_terbaru', 'nama_admin');

        $isWhere = null;
        header('Content-Type: application/json');  
        echo $this->m_ssp->get_tables("view_riwayat_top_up", $search,$isWhere);  
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_topup->json();  
    } 


    public function history()
    {
        $data['data_siswa'] = $this->m_siswa->get_all();

        $this->template->load('template', 'v_daftar_riwayat_belanja', $data);
    }

    public function check()
    {
        $data['data_siswa'] = $this->m_siswa->get_by_kode($kode);
        $this->template->load('template', 'v_tambah_topup', $data);
    }
    

    public function add()
    {
        $data['data_topup'] = $this->m_topup->get_all_riwayat();
        $this->template->load('template', 'v_tambah_topup', $data);
    }

    public function edit($id)
    {
        $get_id_siswa = $this->m_belanja->get_detail_by_id($id);

        $data['data'] = $this->m_belanja->get_detail_by_id($id);
        $data['data_siswa'] = $this->m_siswa->get_by_id($get_id_siswa['id_siswa']);

        $this->template->load('template', 'v_edit_belanja', $data);
    }

    public function create()
    {
        $kode = $this->input->post('kode');
        $detail_siswa = $this->m_siswa->get_by_kode($kode);

        $data = array(
                    "id_siswa" => $detail_siswa['id'],
                    "id_admin" => $this->session->userdata('id'),
                    "tgl_top_up" => date("Y-m-d"),
                    "jam_top_up" => jam_sekarang(),
                    "nominal_top_up" => $this->input->post('topup'),
                    "sisa_saldo_terakhir" => $this->input->post('saldo_sebelumnya'),
                    "sisa_saldo_terbaru" => $this->input->post('saldo_terbaru')
                );
        $this->m_topup->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('topup');
    }

    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_siswa = $this->db->get('siswa')->result();
        foreach ($data_siswa as $siswa) {
            $return_arr[] = $siswa->kode;
        }

        echo json_encode($return_arr);
    }

    public function get_detail_siswa()
    {
        $kode = $_GET['kode'];
        $this->db->where('kode', $kode);
        $siswa = $this->db->get('siswa')->row_array();
        $data = array(
                'id' => $siswa['id'],
                'nama_lengkap' => $siswa['nama_lengkap'],
                'kode' => $siswa['kode'],
                'jenis_kelamin' => $siswa['jenis_kelamin'],
                'alamat' => $siswa['alamat'],
                'nama_ayah' => $siswa['nama_ayah'],
                'nama_ibu' => $siswa['nama_ibu'],
                'saldo' => $siswa['saldo']
        );
 
        echo json_encode($data);
    }


    public function delete($id) {
        $this->m_topup->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('topup');
    }
}
