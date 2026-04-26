<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop_model extends CI_Model {

    public function get_all()
    {
        // MODIFIKASI: Mengubah dari order by id menjadi sort_order ASC
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('workshops')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('workshops', ['id' => $id])->row();
    }

    // Mengambil array of ID Tag yang berelasi dengan workshop ini
    public function get_related_tags($workshop_id)
    {
        $this->db->select('tag_id');
        $this->db->where('workshop_id', $workshop_id);
        $result = $this->db->get('workshop_tags')->result_array();
        return array_column($result, 'tag_id');
    }

    // Mengambil array of ID Facilitator yang berelasi dengan workshop ini
    public function get_related_facilitators($workshop_id)
    {
        $this->db->select('facilitator_id');
        $this->db->where('workshop_id', $workshop_id);
        
        // MODIFIKASI: Pastikan data ditarik berdasarkan urutan pilihan di CMS
        $this->db->order_by('sort_order', 'ASC'); 
        
        $result = $this->db->get('workshop_facilitators')->result_array();
        return array_column($result, 'facilitator_id');
    }

    public function insert($data, $tag_ids, $facilitator_ids)
    {
        $this->db->trans_start(); // Memulai transaksi database

        // 1. Insert ke tabel utama
        $this->db->insert('workshops', $data);
        $workshop_id = $this->db->insert_id();

        // 2. Insert ke pivot tabel workshop_tags
        if (!empty($tag_ids)) {
            $tags_data = [];
            foreach ($tag_ids as $t_id) {
                $tags_data[] = [
                    'workshop_id' => $workshop_id,
                    'tag_id' => $t_id
                ];
            }
            $this->db->insert_batch('workshop_tags', $tags_data);
        }

        // 3. Insert ke pivot tabel workshop_facilitators
        if (!empty($facilitator_ids)) {
            $fac_data = [];
            // MODIFIKASI: Menyimpan index array sebagai sort_order
            foreach ($facilitator_ids as $index => $f_id) {
                $fac_data[] = [
                    'workshop_id' => $workshop_id,
                    'facilitator_id' => $f_id,
                    'sort_order' => $index 
                ];
            }
            $this->db->insert_batch('workshop_facilitators', $fac_data);
        }

        $this->db->trans_complete(); // Selesaikan transaksi
        return $this->db->trans_status(); // Return TRUE jika berhasil, FALSE jika rollback
    }

    public function update($id, $data, $tag_ids, $facilitator_ids)
    {
        $this->db->trans_start();

        // 1. Update tabel utama
        $this->db->where('id', $id);
        $this->db->update('workshops', $data);

        // 2. Refresh (Hapus lalu Insert) pivot tabel workshop_tags
        $this->db->where('workshop_id', $id)->delete('workshop_tags');
        if (!empty($tag_ids)) {
            $tags_data = [];
            foreach ($tag_ids as $t_id) {
                $tags_data[] = [
                    'workshop_id' => $id,
                    'tag_id' => $t_id
                ];
            }
            $this->db->insert_batch('workshop_tags', $tags_data);
        }

        // 3. Refresh (Hapus lalu Insert) pivot tabel workshop_facilitators
        $this->db->where('workshop_id', $id)->delete('workshop_facilitators');
        if (!empty($facilitator_ids)) {
            $fac_data = [];
            // MODIFIKASI: Menyimpan index array sebagai sort_order
            foreach ($facilitator_ids as $index => $f_id) {
                $fac_data[] = [
                    'workshop_id' => $id,
                    'facilitator_id' => $f_id,
                    'sort_order' => $index
                ];
            }
            $this->db->insert_batch('workshop_facilitators', $fac_data);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete($id)
    {
        // Berkat pengaturan ON DELETE CASCADE di database, 
        // menghapus data utama akan otomatis menghapus data di pivot tabel
        $this->db->where('id', $id);
        return $this->db->delete('workshops');
    }
}