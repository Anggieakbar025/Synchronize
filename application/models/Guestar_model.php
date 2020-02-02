<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guestar_model extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		return $this->db->get('guest')->result();
	}
	public function get_guest(){
		return $this->db->get('guest')
						->result();
	}

	// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './assets/images/gs/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
    $this->upload->initialize($config);
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
			'nama'=>$this->input->post('nama'),
			'genre'=>$this->input->post('genre'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'gambar' => $upload['file']['file_name']
		);

		$this->db->insert('guest', $data);
	}
	public function delete($id_guest){
 		 $hapus = $this->db->query("DELETE FROM guest WHERE id_guest = $id_guest");
 		 return $hapus;
  }

	public function get_data($id)
	{
		return $this->db->where('id_guest', $id)
						->get('guest')
						->row();
	}

}
