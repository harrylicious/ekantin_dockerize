<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_siswa');
        $this->load->model('m_belanja');
        $this->load->model('m_topup');
        $this->load->model('m_laporan');
    }

    public function index() 
    {
        $data['data_topup'] = $this->m_topup->get_all_riwayat();

        $this->template->load('template', 'v_daftar_riwayat_topup', $data);
    }

    public function belanja()
    {
        $data['data_bulan_tahun'] = $this->m_belanja->get_all_group_by_bulan();
        $data['data_petugas'] = $this->m_belanja->get_all_group_by_petugas();
        $data['data_siswa'] = $this->m_belanja->get_all_group_by_siswa();
        
        $bulan_tahun = $this->input->post('bulan_tahun');
        $nama_siswa = $this->input->post('nama_siswa');
        $nama_admin = $this->input->post('nama_admin');

        $data['data'] = $this->m_laporan->get_all_bertingkat_belanja($bulan_tahun, $nama_siswa, $nama_admin);
        $data['data_topup'] = $this->m_laporan->get_all_belanja();

        $this->template->load('template', 'v_laporan_belanja', $data);
    }

    public function topup()
    {
        $data['data_bulan_tahun'] = $this->m_topup->get_all_group_by_bulan();
        $data['data_petugas'] = $this->m_topup->get_all_group_by_petugas();
        $data['data_siswa'] = $this->m_topup->get_all_group_by_siswa();
        
        $bulan_tahun = $this->input->post('bulan_tahun');
        $nama_siswa = $this->input->post('nama_siswa'); 
        $nama_admin = $this->input->post('nama_admin');

        $data['data'] = $this->m_laporan->get_all_bertingkat_topup($bulan_tahun, $nama_siswa, $nama_admin);
        $data['data_topup'] = $this->m_laporan->get_all_topup();

        $this->template->load('template', 'v_laporan_topup', $data);
    }

    public function pemasukkan()
    {
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
 
        $data['data_belanja'] = $this->m_laporan->get_all_belanja_berd_tanggal($tanggal1, $tanggal2);
        $data['data_topup'] = $this->m_laporan->get_all_topup_berd_tanggal($tanggal1, $tanggal2);
        $data['total_pendapatan_belanja'] = get_total_nominal_data_table("riwayat_belanja", "total_belanja");
        $data['total_pendapatan_topup'] = get_total_nominal_data_table("riwayat_top_up", "nominal_top_up");

        $this->template->load('template', 'v_laporan_pemasukkan', $data);
    }


    public function topup_pencarian_bertingkat()
    {

        $bulan_tahun = $this->input->post('bulan_tahun');
        $nama_siswa = $this->input->post('nama_siswa');
        $nama_admin = $this->input->post('nama_admin');

        $data['data'] = $this->m_laporan->get_all_bertingkat_topup($bulan_tahun, $nama_admin, $nama_siswa);


        $data['data_topup'] = $this->m_topup->get_all_riwayat();
        $data['data_bulan_tahun'] = $this->m_topup->get_all_group_by_bulan();
        $data['data_petugas'] = $this->m_topup->get_all_group_by_petugas();
        $data['data_siswa'] = $this->m_topup->get_all_group_by_siswa();
        
        $data['data_topup'] = $this->m_laporan->get_all_topup();

        $this->template->load('template', 'v_laporan_topup', $data);
    }


    public function belanja_pencarian_bertingkat()
    {

        $bulan_tahun = $this->input->post('bulan_tahun');
        $nama_siswa = $this->input->post('nama_siswa');
        $nama_admin = $this->input->post('nama_admin'); 

        $data['data'] = $this->m_laporan->get_all_bertingkat_belanja($bulan_tahun, $nama_admin, $nama_siswa);

        $data['data_belanja'] = $this->m_belanja->get_all_riwayat();
        $data['data_bulan_tahun'] = $this->m_belanja->get_all_group_by_bulan();
        $data['data_petugas'] = $this->m_belanja->get_all_group_by_petugas();
        $data['data_siswa'] = $this->m_belanja->get_all_group_by_siswa();
        
        $data['data_topup'] = $this->m_laporan->get_all_belanja();

        $this->template->load('template', 'v_laporan_belanja', $data);
    }


    public function pemasukkan_pencarian_bertingkat()
    {
        $tanggal1 = format_tgl($this->input->post('tanggal1'));
        $tanggal2 = format_tgl($this->input->post('tanggal2')); 
        

        $data['data_belanja'] = $this->m_laporan->get_all_belanja_berd_tanggal($tanggal1, $tanggal2);
        $data['data_topup'] = $this->m_laporan->get_all_topup_berd_tanggal($tanggal1, $tanggal2);
        $data['total_pendapatan_belanja'] = get_total_nominal_data_table("riwayat_belanja", "total_belanja");
        $data['total_pendapatan_topup'] = get_total_nominal_data_table("riwayat_top_up", "nominal_top_up");

        $this->template->load('template', 'v_laporan_pemasukkan', $data);
    }

    public function pemasukkan_pencarian_semua()
    {

        $data['data_belanja'] = $this->m_laporan->get_all_belanja_semua();
        $data['data_topup'] = $this->m_laporan->get_all_topup_semua();
        $data['total_pendapatan_belanja'] = get_total_nominal_data_table("riwayat_belanja", "total_belanja");
        $data['total_pendapatan_topup'] = get_total_nominal_data_table("riwayat_top_up", "nominal_top_up");

        $this->template->load('template', 'v_laporan_pemasukkan', $data);
    }

    public function pendaftaran()
    {
        $data['data_topup'] = $this->m_laporan->get_all_riwayat();

        $this->template->load('template', 'v_daftar_riwayat_topup', $data);
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
                    "id_admin" => "1",
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
        $this->m_belanja->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('topup');
    }
}
