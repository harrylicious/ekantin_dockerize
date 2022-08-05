<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_login(){
    $ci = get_instance(); 
    if(!$ci->session->userdata('id')){
        $ci->session->set_flashdata('failed', '<div class="alert alert-danger alert">Login Terlebih Dahulu.</div>');
        redirect('auth');
    }
}


function PdfGenerator($html, $filename, $paper, $orientation) {
    require 'vendor/autoload.php';
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    $dompdf->stream($filename, array('Attachment' => 0));

}

function get_total_data_table($table)
{
    $ci = get_instance();
    $query = "SELECT *FROM $table";
    $data = $ci->db->query($query)->num_rows();
    if (isset($data)) {
        return $data;
    } else {
        return "";
    }
}

function get_total_nominal_data_table($table, $field)
{
    $ci = get_instance();
    $query = "SELECT sum($field) as total FROM $table";
    $data = $ci->db->query($query)->row_array();
    if (isset($data['total'])) {
        return $data['total'];
    } else {
        return "";
    }
}



if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

        return $result;
    }
}

function no_kartu_otomatis()
{
    $ci = get_instance();
    $today = date('Y-m-d');

    $kodeBaru = 0;
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max(kode) as id FROM siswa";
    $data = $ci->db->query($query)->row_array();
    $kode = (int) $data['id'];

    $kode++;

    // if ($kode >= 1 && $kode <= 8) {
    //     $kode++;
    //     $kodeBaru = "000000000".$kode;
    // } elseif ($kode >= 9 && $kode <= 99) {
    //     $kode++;
    //     $kodeBaru = "00000000".$kode;
    // } elseif ($kode >= 100 && $kode <= 999) {
    //     $kode++;
    //     $kodeBaru = "0000000".$kode;
    // } elseif (strlen($kode) == 4) {
    //     $kode++;
    //     $kodeBaru = "000000".$kode;
    // } elseif ($kode >= 1000) {
    //     $kode++;
    //     $kodeBaru = "00000".$kode;
    // }
    
    return $kode;
}



function tgl_indo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}

function get_bulan($no)
{
    $no = (INT) $no;
    
    $BulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
 
    $result = $BulanIndo[$no];
    return($result);
}

if (!function_exists('jam_indo')) {
    function jam_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');

        $waktu = substr($date, 11, 5);
        $result = $waktu;
  
        return $result;
    }
}

  if (!function_exists('tgl_default')) {
      function tgl_default($date)
      {
          $newdate = date("d-m-Y", strtotime($date));
    
          return $newdate;
      }
  }

function tgl_dan_hari($tgl)
{
    $hari = array( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
           );
 
    // Misal hari ini adalah sabtu
    // echo date('N'); // Hasil 6
    // echo $hari[ date('N') ]; // Sama seperti echo $hari[6], hasil: Sabtu
 
    // Contoh tanggal 20 Maret 2016 adalah hari Minggu
    $num = date('N', strtotime($tgl));
    //echo $num; // Hasil 7
     return $hari[$num]; // Hasil: Minggu
}

 function jam_sekarang()
 {
     date_default_timezone_set("Asia/Jakarta");
     return date("G:i:s");
 }
 
 function format_tgl($date)
 {
     $hasil = date("Y-m-d", strtotime($date));
     return $hasil;
 }

function last_updated_backup($view)
{
    error_reporting(0);
    $ci =& get_instance();
    $data = $ci->db->query("select *FROM time_last_updated_pendaftaran limit 1")->row_array();
    $date = $data['terakhir_update'];
    $second = str_replace("-", "", $date['second']);
    $minute = str_replace("-", "", $date['minute']);
    $hour = str_replace("-", "", $date['hour']);
    $day = str_replace("-", "", $date['day']);

    if (!is_null($second) || !is_null($minute) || !is_null($hour) || !is_null($day)) {
        $second = ((int) $second) % 60;
        $minute = ((int) $minute) % 60;
        $hour = ((int) $hour)  % 24;

        if ($day != 0) {
            return $day." hari, ".$hour." jam yang lalu";
        } elseif ($hour != 0) {
            return $hour." jam, ".$minute." menit yang lalu";
        } elseif ($minute != 0) {
            return $minute." menit, ".$second." detik yang lalu";
        }
    }
    return null;
}

function last_updated($view)
{
    $ci =& get_instance();
    $data = $ci->db->query("select *FROM ".$view)->row_array();
    $awal = $data['terakhir_update'];

    $awal  = new DateTime($awal);
    $akhir = new DateTime(); // Waktu sekarang
    $diff  = $awal->diff($akhir);

    $second = $diff->d;
    $minute = $diff->i;
    $hour = $diff->h;
    $day = $diff->d;

    if (!is_null($second) || !is_null($minute) || !is_null($hour) || !is_null($day)) {
        $second = ((int) $second) % 60;
        $minute = ((int) $minute) % 60;
        $hour = ((int) $hour)  % 24;

        if ($day != 0) {
            return $day." hari, ".$hour." jam lalu";
        } elseif ($hour != 0) {
            return $hour.":".$minute." menit lalu";
        } elseif ($minute != 0) {
            return $minute.":".$second." detik lalu";
        }
    }
    return null;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format(floatval($angka), 2, ',', '.');
    return $hasil_rupiah;
}
