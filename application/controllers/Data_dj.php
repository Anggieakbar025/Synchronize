<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dj extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('auth');
        }
	}
	
	public function index()
	{
        $data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
        $data['konten']='dj';
		$this->load->view('template_admin',$data);
	}
}
