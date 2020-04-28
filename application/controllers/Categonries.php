<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categonries extends CI_Controller {

    function __construct()
    {
        parent::__construct(); 
        $this->load->model('categonries_model');
        $this->load->model('products_model');
    }

  public function index($categonriesId)
  {
     
      $data['categonries'] = $this->categonries_model->findAll();
      $condition =array(
          'categonries'=>$this->mongo_db->create_document_id($categonriesId)
      );
      $data['products'] = $this->products_model->findAll($condition);
  
      $this->load->view('layout/head');
      $this->load->view('layout/header');
      $this->load->view('categonries/content',$data);
      $this->load->view('layout/left-menu');
      $this->load->view('layout/footer');
      $this->load->view('layout/foot');
  }


}