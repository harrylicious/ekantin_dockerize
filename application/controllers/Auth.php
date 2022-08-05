<?php
Class Auth extends CI_Controller{
    
    
    function index(){
        $this->load->view('v_login');
    }
    
    
    function cheklogin(){ 

        $this->rules();
        $email      = $this->input->post('username');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);

            $this->form_validation->set_rules('username', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            // set pesan form validasi error
            $this->form_validation->set_message('required', '{field} wajib diisi');

                // set default prefix (awalan) dan suffix (akhiran) pesan error
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $hashPass = password_hash($password,PASSWORD_DEFAULT);
            $test     = password_verify($password, $password);
            // query chek users
            $this->db->where('username', $email);
            $this->db->where('password',  $password);

            $users       = $this->db->get('admin');
            
            if($users->num_rows()>0){
                $user = $users->row_array();
                if($users->num_rows()>0){
                    // retrive user data to session
                    $this->session->set_userdata($user);
                    redirect('home');
                }else{
                    $this->session->set_flashdata('success', '<div class="alert alert-danger alert">Email atau password salah</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('success', '<div class="alert alert-danger alert">Email atau Password Tidak Ditemukan</div>');
                redirect('auth');
            }
    }
    
    public function rules() 
    {
    $this->form_validation->set_rules('username', 'email', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    
    $this->form_validation->set_message('required', '{field} wajib diisi');


    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
