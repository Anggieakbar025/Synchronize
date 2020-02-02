<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email anda tidak benar!'
        ]);
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]',[
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        if($this->form_validation->run()==FALSE){
            $this->load->view('auth/login');
        }else{
            $this->proses_login();
        }
    }

    public function proses_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin',['email'=>$email])->row_array();

        if($admin){
            if(password_verify($password,$admin['password'])){
                $data = [
                    'logged_in' => TRUE,
                    'email' => $admin['email'],
                    'password' => $admin['password']
                ];
                $this->session->set_userdata($data);

                if($admin['id_status']==1){
                    redirect('dashboard');
                }else{
                    $this->banned();
                }
            } $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Password Salah!
            </div>');
            redirect('auth');
        }else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Akun Tidak Ditemukan!
            </div>');
            redirect('auth');
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> You Have Been Logged Out!
        </div>');
        redirect('auth');
    }

    public function banned(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> <b>Anda tidak bisa masuk ! HUBUNGI ADMIN!</b>
        </div>');
        redirect('auth');
    }
}
