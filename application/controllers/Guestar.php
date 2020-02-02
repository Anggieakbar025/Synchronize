<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guestar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('guestar_model');
		$data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('auth');
        }
	}

	public function index(){

		$data['data']=$this->db->get_where('admin',['email'=>
    $this->session->userdata('email')])->row_array();

    $data['konten'] = 'data_gs';
		$data['guest'] = $this->guestar_model->get_guest();

			//get_kategori untuk dropdown tambah/edit buku
			$this->load->view('template_admin', $data);

	}

	public function tambah(){

			$data = array();

			if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
				// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
				$upload = $this->guestar_model->upload();

				if($upload['result'] == "success"){ // Jika proses upload sukses
					 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
					$this->guestar_model->save($upload);

					redirect('guestar'); // Redirect kembali ke halaman awal / halaman view data
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				}
			}

	}

	public function delete($id_guest){

			$this->guestar_model->delete($id_guest);
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<i class="fa fa-check-circle"></i> Guest Star Berhasil Dihapus
			</div>');
			redirect('guestar');
	}

	public function get_data($id)
	{

			$data = $this->guestar_model->get_data($id);
			echo json_encode($data);

	}

}
