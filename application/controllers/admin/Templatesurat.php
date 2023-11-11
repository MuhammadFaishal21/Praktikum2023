<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templatesurat extends CI_Controller {

      public function __construct(){
        parent::__construct();
        $this->load->model("Template_model");
        cek_login();
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data = array(
            'title' => 'View Data Template Surat',
            'userlog'=> infoLogin(),
            'template' => $this->Template_model->getAll(),
            'content'=> 'Template_surat/index'
        );
        $this->load->view('template_user/main',$data);
    }
   public function add(){
        $data = array(
            'title' => 'Tambah Data Surat Pengajuan',
            'userlog'=> infoLogin(),
            'content'=> 'surat_ajuan/add_form'
        ); 
        $this->load->view('template_user/main',$data);
    }
    
    public function save(){ 
        $this->Masuk_model->saveAjuan();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data Surat Masuk Berhasil DiSimpan");
        } 
        redirect('surat_ajuan');
    }
     function delete($id) {
        $this->Template_model->delete($id);
        redirect('admin/template_surat');

        
     }
    
    
    public function surat_ajuan($id){
        $surat = $this->Masuk_model->getById($id);
        $nama = $surat->nama;
        $perihal = $surat->perihal;
        $date = $surat->tgl_kirim;
        $kepada = $surat->tujuan_surat;
        // memanggil dan membaca template dokumen
        $alamat_file = base_url('assets/lap/contoh_surat.rtf');
        $document = file_get_contents($alamat_file);
        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#PER", $perihal, $document);
        $document = str_replace("#SURAT_TO", $kepada, $document);
        $document = str_replace("#DATE", $date, $document);
        // header untuk membuka file output RTF dengan MS. Word
        
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=Laporan_contoh.doc");
        header("Content-length: ".strlen($document));
        echo $document;
    } 
}