<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

    public function getTiket()
    {
        return $this->db->get('tiket')->result_array();
    }

    public function getKonten()
    {
        return $this->db->get('editable')->result_array();
    }
    
    public function getSponsor()
    {
        return $this->db->get('sponsor')->result_array();
    }

    public function getFaq()
    {
        return $this->db->get('faq')->result_array();
    }

    public function getDetailJadwal()
    {
        $this->db->select('*');
        $this->db->from('detail_jadwal j');
        $this->db->join('jadwal dj', 'j.id_jadwal = dj.id_jadwal');
        
        return $this->db->get()->result_array();
    }

    public function getJadwal()
    {
        return $this->db->get('jadwal')->result_array();
        
    }

    public function getTiketCart($id)
    {
        $result = $this->db->where('id_tiket', $id)
                           ->limit(1)
                           ->get('tiket');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function pesan()
    {

        foreach ($this->cart->contents() as $items) {
            $qty = $items['qty'];
            $id_tiket  = $items['id'];
        }

        $jumlah = $qty;

        $data = array(
            'id_user'           => $this->input->post('id_user'),
            'qty'               => $qty,
            'tanggal'           => time(),
            'status'            => 1
        );
        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();
        
        if ($qty != null) {
            for ($qty = 1; $qty <= $jumlah; $qty++) {
                $data = array(
                    'id_transaksi'      => $id_transaksi, 
                    'id_tiket'          => $id_tiket
                );
                $this->db->insert('detail_transaksi', $data);
            }
        }
    }

    

}

/* End of file home_model.php */
