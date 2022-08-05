<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_admin');
        $this->load->model('m_laporan');
        $this->load->model('m_topup');
        $this->load->model('m_belanja');
    }


    public function index()
    {

        $id_admin = $this->session->userdata('id');

        //echo $this->session->userdata('nama_lengkap');

        $data = $this->m_admin->get_by_id($id_admin);
        $this->session->set_userdata($data);


        $data['total_siswa'] = get_total_data_table("siswa");
        $data['total_admin'] = get_total_data_table("admin");
        $data['total_belanja'] = get_total_data_table("riwayat_belanja");
        $data['total_topup'] = get_total_data_table("riwayat_top_up");

        $data['data_belanja_bulanan'] = $this->m_belanja->get_all_laporan_bulanan();
        $data['data_topup_bulanan'] = $this->m_topup->get_all_laporan_bulanan();

        $data['total_saldo_siswa'] = get_total_nominal_data_table("siswa", "saldo");
        $data['total_pendapatan_belanja'] = get_total_nominal_data_table("riwayat_belanja", "total_belanja");
        $data['total_pendapatan_topup'] = get_total_nominal_data_table("riwayat_top_up", "nominal_top_up");
        
        

        $this->template->load('template', 'v_home', $data);
    }
}
