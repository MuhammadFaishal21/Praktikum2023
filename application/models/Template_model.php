<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model {
    protected $_table ='tb_template_surat';
    protected $primary = 'id';
    
    public function getAll() {
        return $this->db->where('is_active',1)->get($this->_table)->result();
    }
    
          public function save(){
         $data = [
            'nama' => $this->input->post('Nama Pengirim'),
            'tujuan_surat' => $this->input->post('Tujuan Surat'),
            'tgl_kirim' => $this->input->post('Tanggal Kirim'),
            'perihal' => $this->input->post('Perihal'),
            'keterangan' => $this->input->post('Keterangan'),
            'is_active' => '1',
          ];
         $this->db->insert($this->_table,$data);
    }
        
          public function saveSurat(){
         $data = [
            'nama' => $this->input->post('Nama Pengirim'),
            'tujuan_surat' => $this->input->post('Tujuan Surat'),
            'tgl_kirim' => $this->input->post('Tanggal Kirim'),
            'perihal' => $this->input->post('Perihal'),
            'keterangan' => $this->input->post('Keterangan'),
            'is_active' => '1',
          ];
        $this->db->insert($this->_table,$data);
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
}