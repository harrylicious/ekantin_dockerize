<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_siswa');
        $this->load->model('m_belanja');
        $this->load->model('m_ssp');
    }

    public function index() 
    {
        $this->template->load('template', 'v_daftar_riwayat_belanja');
    }

    public function export() 
    {
        $data['data'] = $this->m_belanja->get_all_riwayat_export(); 
        $this->load->view('v_export_belanja', $data);
    }

    function get_all_data()
    {
        $search = array('id', 'tgl_belanja', 'jam_belanja', 'kode', 'nama_siswa', 'total_belanja', 'sisa_saldo_terakhir', 'nama_admin');

        $isWhere = null;
        header('Content-Type: application/json');  
        echo $this->m_ssp->get_tables("view_riwayat_belanja", $search,$isWhere);  
    }

    public function history()
    {
        $data['data_siswa'] = $this->m_siswa->get_all();

        $this->template->load('template', 'v_daftar_riwayat_belanja', $data);
    }

    public function check()
    {
        $data['data_siswa'] = $this->m_siswa->get_by_kode($kode);
        $this->template->load('template', 'v_tambah_belanja', $data);
    }

    public function add()
    {
        
        $this->template->load('template', 'v_tambah_belanja');
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
        $detail_belanja = $this->m_belanja->get_by_kode($kode);

        $jenis_pendaftar = $detail_siswa['jenis_pendaftar'];

        $total_belanja_terakhir = 0;

        if (isset($detail_belanja['total'])) {
            $total_belanja_terakhir = $detail_belanja['total'];
        }
        else {
            $total_belanja_terakhir = 0;
        }

       

        if ($jenis_pendaftar == "Siswa") {

            if ($this->input->post('total_belanja') > $this->input->post('saldo')) {

                $this->session->set_flashdata('failed', "Gagal");
                redirect('belanja/add');
            }
            else if ($this->input->post('total_belanja') > 7000) {
                $this->session->set_flashdata('limited', "Gagal");
                redirect('belanja/add');
            }
            else if (($this->input->post('total_belanja') + $total_belanja_terakhir) > 7000) {
                $this->session->set_flashdata('limited', "Gagal");
                redirect('belanja/add');
            }
            else { 

                $data = array(
                    "id_siswa" => $detail_siswa['id'],
                    "id_admin" => $this->session->userdata('id'),
                    "tgl_belanja" => date("Y-m-d"),
                    "jam_belanja" => jam_sekarang(),
                    "total_belanja" => $this->input->post('total_belanja'),
                    "sisa_saldo_terakhir" => $this->input->post('sisa_saldo')
                );
                $this->m_belanja->insert($data);
                $this->session->set_flashdata('success', "Berhasil");
                redirect('belanja');
            }
        }
        else {
            if ($this->input->post('total_belanja') > $this->input->post('saldo')) {

                $this->session->set_flashdata('failed', "Gagal");
                redirect('belanja/add');
            }
            else {
                    
                $data = array(
                    "id_siswa" => $detail_siswa['id'],
                    "id_admin" => $this->session->userdata('id'),
                    "tgl_belanja" => date("Y-m-d"),
                    "jam_belanja" => jam_sekarang(),
                    "total_belanja" => $this->input->post('total_belanja'),
                    "sisa_saldo_terakhir" => $this->input->post('sisa_saldo')
                );
                $this->m_belanja->insert($data);
                $this->session->set_flashdata('success', "Berhasil");
                redirect('belanja');
            }

        }

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
                'jenis_pendaftar' => $siswa['jenis_pendaftar'],
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
        $this->m_belanja->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('belanja');
    }
}
