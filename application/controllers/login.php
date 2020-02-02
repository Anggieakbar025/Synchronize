<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        
        
        if ($this->form_validation->run() == TRUE) {
            $this->login_model->cekLogin();
        } else {
            $this->load->view('login'); 
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login','refresh');
    }

}

/* End of file login.php */
