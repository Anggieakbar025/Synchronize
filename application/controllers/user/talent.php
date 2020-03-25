<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class talent extends CI_Controller {

    public function index()
    {
        $data['guest'] = $this->gs_model->getGuest();
        $this->load->view('user/talent', $data);
    }

}

/* End of file talent.php */
