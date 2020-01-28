<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogImport_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url', 'file'));
    $this->load->library('upload');
  }



  function ImportCatalog(){

    $catalogImportFile = $this->input->post('catalogImportFile');



    $fh = fopen('filename.txt','r');
    while ($line = fgets($fh)) {
      // <... Do your work with the line ...>
      // echo($line);
    }
    fclose($fh);


    $data['tests'] = "testingAjax";

    echo json_encode($data);
  }



  public function uploadImpCatTmp(){

    $data = array();

    $config['upload_path']          = './impCatalogTmp';
    $config['allowed_types']        = '*';
    $config['max_size']             = 0;
    $config['max_width']            = 0;
    $config['max_height']           = 0;

    $this->load->library('upload', $config);

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());

      $data['error'] = $error;
    }
    else
    {

      $fullPath = $this->upload->data('full_path');

      $fh = fopen($fullPath,'r');

      $data['fullLine'] = "";

      while ($line = fgets($fh)) {

        $tag = substr($line, 0, 4);
        $tagContent = substr($line, 4);


        switch ($tag) {

          case "=001":
          $data['oldHoldingsID'] = substr($tagContent, 0, -1);
          break;

          case "=006":
          $data['cboMaterialType'] = substr($tagContent, 0, -1);
          break;

          case "=020":
          $data['txtISBN'] = substr($tagContent, 0, -1);
          break;

          case "=022":
          $data['txtISSN'] = substr($tagContent, 0, -1);
          break;

          case "=040":
          $data['txtSource'] = substr($tagContent, 0, -1);
          break;

          case "=050":
          $data['txtClassificationNum'] = substr($tagContent, 0, -1);
          break;

          case "=100":
          $data['txtPersonal'] = substr($tagContent, 0, -1);
          break;

          case "=110":
          $data['txtCorporate'] = substr($tagContent, 0, -1);
          break;

          case "=245":
          $data['txtTitle'] = substr($tagContent, 0, -1);
          break;

          case "=250":
          $data['txtEdition'] = substr($tagContent, 0, -1);
          break;

          case "=300":
          $data['txtOtherPhysical'] = substr($tagContent, 0, -1);
          break;

          case "=650":
          $data['txtSubject'] = substr($tagContent, 0, -1);
          break;

          case "=876":
          $data['txtAccessionNum'] = substr($tagContent, 0, -1);
          break;

          case "=877":
          $data['txtCirculationNum'] = substr($tagContent, 0, -1);
          break;

          case "=878":
          $data['txtCost'] = substr($tagContent, 0, -1);
          break;

          default:
          break;
        }

        $data['fullLine'] .= $line . "<br />";

      }

      if (isset($data['txtPersonal'])) {
        $data['cboPersonal'] = substr($data['txtPersonal'], 4, 1);
      }else{
        $data['cboPersonal'] = "";
      }


      if (isset($data['txtCorporate'])) {
        $data['cboCorporate'] = substr($data['txtCorporate'], 4, 1);
      }else{
        $data['cboCorporate'] = "";
      }

      fclose($fh);
    }

    // print_r($data);


    echo json_encode($data);
  }

}
