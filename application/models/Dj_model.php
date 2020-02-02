<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dj_model extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		return $this->db->get('dj')->result();
	}
	public function get_dj(){
		return $this->db->get('dj')
						->result();
	}

	// Fungsi untuk melakukan proses upload file
	public function upload(){

		$configVideo['upload_path'] = './assets/videos/';
		$configVideo['allowed_types'] = 'mp4|3gp|flv';
        $configVideo['max_size']	= '0';
        $configVideo['overwrite'] = FALSE;
		$configVideo['remove_space'] = TRUE;

		$this->load->library('upload', $configVideo); // Load konfigurasi uploadnya
    $this->upload->initialize($configVideo);
		if($this->upload->do_upload('video')){ // Lakukan upload dan Cek jika proses upload berhasil
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
			'nama_dj'=>$this->input->post('nama_dj'),
            'genre'=>$this->input->post('genre'),
            'birth'=>$this->input->post('birth'),
            'alamat'=>$this->input->post('alamat'),
            'since'=>$this->input->post('since'),
            'sosmed'=>$this->input->post('sosmed'),
			'video' => $upload['file']['file_name']
		);

		$this->db->insert('dj', $data);
	}
	public function delete($id_guest){
 		 $hapus = $this->db->query("DELETE FROM guest WHERE id_guest = $id_guest");
 		 return $hapus;
  }


}
