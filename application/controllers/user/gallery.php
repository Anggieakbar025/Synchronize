<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

    public function index()
    {
        $data['guest'] = $this->gs_model->getGuest();
        $this->load->view('user/detail_gallery', $data);
    }

}

/* End of file gallery.php */
