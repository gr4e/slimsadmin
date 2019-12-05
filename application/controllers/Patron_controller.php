<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patron_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Patron_model');
  }




function deletePatron(){

$patronID = $this->input->post('patronID');

$this->Patron_model->UPDATE_patronAccountDelete($patronID);

return;
}


}
