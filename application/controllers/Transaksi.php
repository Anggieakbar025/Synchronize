<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin','admin');
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
        $data['transaksi']=$this->admin->get_transaksi();
        $data['konten']='transaksi_masuk';
		$this->load->view('template_admin',$data);
	}
}
