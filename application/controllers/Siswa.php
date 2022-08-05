<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_siswa');
		$this->load->library('upload'); 
		$this->load->library('form_validation'); 
        
    } 

    public function index()
    {
        $data['data_siswa'] = $this->m_siswa->get_all();
        $this->template->load('template', 'v_daftar_siswa', $data);
    }

    public function import()
    {
        $this->template->load('template', 'v_import_siswa');
    }

    public function add()
    {
        no_kartu_otomatis();
        $this->template->load('template', 'v_tambah_siswa');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_siswa->get_by_id($id);
        $this->template->load('template', 'v_edit_siswa', $data);
    }


   function barcode_print($id) {
       require 'vendor/autoload.php';
       $data['row'] = $this->m_siswa->get_by_id($id);
       $row = $this->m_siswa->get_by_id($id);
       $data['id'] = $id;
       $html = $this->load->view('kartu', $data, true);
       PdfGenerator($html, $row['nama_lengkap'], array(0, 0, 87.87, 124.72), 'landscape');
   }


    public function create()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 2048000;
        $config['max_width']            = 100800;
        $config['max_height']           = 100800;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('avatar')) {
            $error = array('error' => $this->upload->display_errors());

                $data = array(
                    "kode" => $this->input->post('kode'),
                    "jenis_pendaftar" => $this->input->post('jenis_pendaftar'),
                    "nama_lengkap" => $this->input->post('nama_lengkap'),
                    "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                    "alamat" => $this->input->post('alamat'),
                    "tempat_lahir" => $this->input->post('tempat_lahir'),
                    "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                    "nama_ayah" => $this->input->post('nama_ayah'),
                    "nama_ibu" => $this->input->post('nama_ibu'),
                    "saldo" => $this->input->post('saldo')
                );
            
        } else {
            $photos = $this->upload->data();

            $data = array(
                    "kode" => $this->input->post('kode'),
                    "jenis_pendaftar" => $this->input->post('jenis_pendaftar'),
                    "nama_lengkap" => $this->input->post('nama_lengkap'),
                    "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                    "alamat" => $this->input->post('alamat'),
                    "tempat_lahir" => $this->input->post('tempat_lahir'),
                    "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                    "photo" => $photos['file_name'],
                    "nama_ayah" => $this->input->post('nama_ayah'),
                    "nama_ibu" => $this->input->post('nama_ibu'),
                    "saldo" => $this->input->post('saldo')
                );
        }
        $this->m_siswa->insert($data);
        $this->session->set_flashdata('success', "Berhasil"); 
        redirect('siswa');
    }

    public function import_excel(){ 
        try {
      
            $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
            'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
            'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

                if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

                
                    $arr_file = explode('.', $_FILES['file']['name']); 
                    $extension = end($arr_file);
                
                    if('csv' == $extension) {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    } else if('xls' == $extension) {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                    }
                    else {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                    }
                
                    $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
                    
                    $rowData = $spreadsheet->getActiveSheet()->toArray();
                    for($i = 1;$i < count($rowData);$i++)
                        {	
                        
                        $kode = $rowData[$i][1];
                        $nama = $rowData[$i][2];
                        $saldo = $rowData[$i][9];
                        $type = $rowData[$i][10];

                        if ($saldo == "") {
                            $saldo = 0;
                        }
                        if ($kode != "") {

                            $cek = $this->m_siswa->get_by_kode($kode);   

                            if (isset($cek['kode'])) {
                                echo "[Duplicate] Siswa dengan NIS ".$kode." atas nama ".$nama." Gagal diimport.</br>";
                                continue;
                            }

                            else {
                                $data = array(	 
                                    'kode'=>$rowData[$i][1],
                                    'nama_lengkap'=>$rowData[$i][2],
                                    'jenis_kelamin'=>$rowData[$i][3],
                                    'tempat_lahir'=>$rowData[$i][4],
                                    'tanggal_lahir'=>$rowData[$i][5],
                                    'alamat'=>$rowData[$i][6],
                                    'nama_ayah'=>$rowData[$i][7],
                                    'nama_ibu'=>$rowData[$i][8],
                                    'saldo'=>$saldo,
                                    'jenis_pendaftar'=>$type
                                    );
                                    $this->m_siswa->insert($data);
                            }
                        }
                    
                    }
                    echo $this->session->set_flashdata('Import berhasil.','success-success');
                    redirect('siswa');
                }
                      //code...
        } catch (\Throwable $th) {
            //throw $th;
            echo $this->session->set_flashdata('Ada masalah.','success-success');

        }
                
    }

    public function update($id)
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 2048000;
        $config['max_width']            = 10080;
        $config['max_height']           = 10080;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (! $this->upload->do_upload('avatar')) {

            $data = array(
                    "kode" => $this->input->post('kode'),
                    "jenis_pendaftar" => $this->input->post('jenis_pendaftar'),
                    "nama_lengkap" => $this->input->post('nama_lengkap'),
                    "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                    "alamat" => $this->input->post('alamat'),
                    "tempat_lahir" => $this->input->post('tempat_lahir'),
                    "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                    "nama_ayah" => $this->input->post('nama_ayah'),
                    "nama_ibu" => $this->input->post('nama_ibu'),
                    "saldo" => $this->input->post('saldo')
                );
            $this->m_siswa->update($id, $data);
            $this->session->set_flashdata('success', "Berhasil"); 
            redirect('siswa');
        } else {
            $photos = $this->upload->data();

            $data = array(
                    "kode" => $this->input->post('kode'),
                    "jenis_pendaftar" => $this->input->post('jenis_pendaftar'),
                    "nama_lengkap" => $this->input->post('nama_lengkap'),
                    "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                    "alamat" => $this->input->post('alamat'),
                    "tempat_lahir" => $this->input->post('tempat_lahir'),
                    "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                    "photo" => $photos['file_name'],
                    "nama_ayah" => $this->input->post('nama_ayah'),
                    "nama_ibu" => $this->input->post('nama_ibu'),
                    "saldo" => $this->input->post('saldo')
                );
            $this->m_siswa->update($id, $data);
            $this->session->set_flashdata('success', "Berhasil"); 
            redirect('siswa');
        }
    }

    public function delete($id) {
        $data = $this->m_siswa->get_by_id($id);

        $photo = $data['photo'];
        $this->m_siswa->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        unlink("uploads/".$photo);
        redirect('siswa');
    }
}
