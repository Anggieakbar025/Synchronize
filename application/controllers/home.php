<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {  
        $this->load->view('landing');
    }
    
    public function home()
    {
        $data['tiket'] = $this->home_model->getTiket();
        $data['guest'] = $this->guest_model->getGuest();
        $data['konten'] = $this->home_model->getKonten();
        $data['sponsor'] = $this->home_model->getSponsor();
        $data['jadwal'] = $this->home_model->getJadwal();
        $data['detail_jadwal'] = $this->home_model->getDetailJadwal();
        $data['faq'] = $this->home_model->getFaq();
        $this->load->view('template', $data);
    }
    
    public function detail_gallery()
    {
        $data['guest'] = $this->guest_model->getGuest();
        $this->load->view('detail_gallery', $data);
    }
    
    public function editable_home()
    {
        $data['sponsor'] = $this->home_model->getSponsor();
        $data['faq'] = $this->home_model->getFaq();
        $data['konten'] = $this->home_model->getKonten();
        $data['jadwal'] = $this->home_model->getJadwal();
        $data['detail_jadwal'] = $this->home_model->getDetailJadwal();
        $data['tiket'] = $this->home_model->getTiket();
        $data['guest'] = $this->guest_model->getGuest();
        $this->load->view('editable_template', $data);
    }

    
    public function talent()
    {
        $data['guest'] = $this->guest_model->getGuest();
        $this->load->view('talent', $data);
    }
    
    public function lineup($id)
    {
        $data['guest_detail'] = $this->guest_model->getLineup($id);
        $this->load->view('lineup', $data);
    }

    public function checkout()
    {
        if(!isset($_SESSION['logged_in'])){
            redirect('login','refresh');
        } else {
            $this->load->view('checkout');
        }
    }

    public function add_item($id)
    {
        if(!isset($_SESSION['logged_in'])){
            redirect('login','refresh');
        } else {
            $tiket = $this->home_model->getTiketCart($id);
            $qty = $this->input->post('qty');
            $jumlah = $this->input->post('qty');
            
            if ($qty != null) {
                for ($qty = 1; $qty <= $jumlah; $qty++) {
                    $data = array(
                        'id'      => $id,
                        'qty'     => 1,
                        'price'   => $tiket->harga,
                        'name'    => $tiket->kelas
                    );
            
                    $this->cart->insert($data);
                }
            }
            redirect('home/checkout','refresh');
        }
        
    }

    public function pesan()
    {
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        
        if ($this->form_validation->run() == TRUE) {
            $this->home_model->pesan();
            $this->cart->destroy();
            $this->session->set_flashdata('terbeli','<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> Berhasil membeli tiket!
            </div>');
            redirect('home/profil','refresh');
        } else {
            $this->session->set_flashdata('gagal_pesan', 'Pesanan Gagal Dibuat');
            redirect('home/checkout','refresh');
        }
    }
    
    public function terbeli()
    {
        $this->load->view('terbeli');
    }
    
    public function hapusCart()
    {
        $this->cart->destroy();
        redirect('home/checkout','refresh');
    }

    public function profil()
    {
        $this->load->view('profil');
        
    }

    public function logout()
    {
        session_destroy();
        redirect('home/home','refresh');
    }

}

/* End of file home.php */
