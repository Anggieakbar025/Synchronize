<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

    public function getDj()
    {
      return $this->db->get('dj')->result_array();
    }
    public function getGaleri()
    {
      return $this->db->get('galeri')->result_array();
    }

    public function getTiket()
    {
        $this->db->select('*');
        $this->db->from('event e');
        $this->db->join('tiket t', 't.id_event = e.id_event');
        return $this->db->get()->result_array();
    }

    public function getAkses($id)
    {
        $this->db->from('akses');
        $this->db->where('id_tiket', $id);
        return $this->db->get()->result_array();
    }

    public function getMaps($id)
    {
        $this->db->from('event');
        $this->db->where('id_event', $id);
        return $this->db->get()->result_array();
    }

    public function getKelasTiket()
    {
        $this->db->select('*');
        $this->db->from('tiket');
        return $this->db->get()->result_array();
    }

    public function getKonten()
    {
        $event = $this->db->query('SELECT MAX(id_event) as event_now FROM event')->result_array();
        foreach ($event as $e ) {
            $id = $e['event_now'];
        }
        
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('status_event', 'aktif');
        return $this->db->get()->result_array();
    }
    
    public function getSponsor()
    {
        return $this->db->get('sponsor')->result_array();
    }

    public function getHistoryPesan()
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.id_user = u.id_user');
        $this->db->where('t.id_user', $_SESSION['id_user']);
        return $this->db->get()->result_array();
    }

    public function getFaq()
    {
        return $this->db->get('faq')->result_array();
    }

    public function getJadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal j');
        $this->db->join('event e', 'j.id_event = e.id_event');
        $this->db->order_by('waktu', 'asc');
        
        return $this->db->get()->result_array();
    }

    public function getTiketCart($id)
    {
        $this->db->select('*');
        $this->db->from('akses a');
        $this->db->join('tiket t', 'a.id_tiket = t.id_tiket');
        $this->db->join('event e', 't.id_event = e.id_event');
        $this->db->where('id_akses', $id);
        $this->db->limit(1);
        return $this->db->get()->row();

        // if ($result->num_rows() > 0) {
        //     return $result->row();
        // } else {
        //     return array();
        // }
    }

    public function pesan()
    {

        foreach ($this->cart->contents() as $items) {
            $qty = $this->cart->total_items();
            $id_akses  = $items['id'];
        }

        $jumlah = $qty;

        $data = array(
            'id_user'           => $this->input->post('id_user'),
            'tanggal'           => time(),
            'qty'               => $this->cart->total_items(),
            'total'             => $this->cart->total(),
            'status'            => 1
        );
        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();
        
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_transaksi'      => $id_transaksi, 
                'id_akses'          => $items['id'],
                'qty'               => $items['qty']
            );
            $this->db->insert('detail_transaksi', $data);
        }
    }

    

}

/* End of file home_model.php */
