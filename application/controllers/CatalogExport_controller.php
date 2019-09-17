<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogExport_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('CatalogExport_model');
    $this->load->helper(array('form', 'url', 'file'));
  }


  function sesPrint(){
    print_r($this->session->userdata());
  }


  function CatalogExport(){

    $user = $this->Accounts_model->get_session_data('UserName');

    if(!$this->Accounts_model->get_session_data('UserName'))
    {
      redirect('');
    }

    $modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

    $data['roles'] = $this->Accounts_model->get_roles_dropdown();

    $page = array(
      'admin'  => $modules['admin'],
      'acquisition'  => $modules['acquisition'],
      'holdings'  => $modules['holdings'],
      'circulation'  => $modules['circulation'],
      'accounts' => $modules['accounts'],
      'others' => $modules['others'],
      'user' => $this->Accounts_model->get_session_data('LibrarianName'),
      'image' => $this->Accounts_model->get_session_data('Image'),
      'notifs' => $this->Accounts_model->get_notifs()
    );

    $this->load->template('CMS/CatalogExport', $data, $page);

  }


  function CatalogList(){
    $data['data'] = $this->CatalogExport_model->GET_CatalogList();
    echo json_encode($data);
  }



  function Export_selectedCatalog(){

    $catIDsRaw = $this->input->post('CatIDs');

    $catIDs = explode(',', $catIDsRaw);

    $dataToWrite = "";

    for ($i=0; $i < count($catIDs); $i++) {
      $dataToWrite .= $this->exMrk_download($catIDs[$i]);
      $dataToWrite .= "\n\n";
    }

    $postNameDate = date("Y-m-d");

    if ( ! write_file("./mrkTemp/CatalogExport_".$postNameDate.".mrk", $dataToWrite)){
      $data['msg'] = 'Failed!';
    }else{
      $data['zelda'] = "mrkTemp/CatalogExport_".$postNameDate.".mrk";
    }


    echo json_encode($data);
  }





  function exMrk_download($HoldingsID){


    $MatDetailResult = $this->CatalogExport_model->GET_MatDetails($HoldingsID);

    //material type
    if (!empty($MatDetailResult->HoldingsID)) {
      $ControlNumber = "\n=001 ".$MatDetailResult->HoldingsID."";
    }else{
      $ControlNumber = "";
    }

    if (!empty($MatDetailResult->CatalogNumber)) {
      $CatalogNumber = "\n=003 ".$MatDetailResult->CatalogNumber."";
    }else{
      $CatalogNumber = "";
    }

    //material type
    if (!empty($MatDetailResult->MaterialType)) {
      $MaterialType = "\n=006 ".$MatDetailResult->MaterialTypeID."";
    }else{
      $MaterialType = "";
    }


    //ISSN
    if (!empty($MatDetailResult->ISSN)) {
      $ISSN = "\n=022 ".$MatDetailResult->ISSN."";
    }else{
      $ISSN = "";
    }
    //ISBN
    if (!empty($MatDetailResult->ISBN)) {
      $ISBN = "\n=020 ".$MatDetailResult->ISBN."";
    }else{
      $ISBN = "";
    }

    //catalog Source
    if (!empty($MatDetailResult->CatalogSource)) {
      $CatalogSource = "\n=040 ".$MatDetailResult->CatalogSource."";
    }else{
      $CatalogSource = "";
    }

    //call number
    if (!empty($MatDetailResult->CallNumber)) {
      $CallNumber = "\n=050 ".substr($MatDetailResult->CallNumber,3)."";
    }else{
      $CallNumber = "";
    }

    //author name
    if (!empty($MatDetailResult->AuthorName)) {
      $AuthorName = "\n=100 ".$MatDetailResult->AuthorName."";
    }else{
      $AuthorName = "";
    }



    //title statement
    if (!empty($MatDetailResult->TitleStatement)) {
      $TitleStatement = "\n=245 ".$MatDetailResult->TitleStatement."";
    }else{
      $TitleStatement = "";
    }

    //Edition
    if (!empty($MatDetailResult->Edition)) {
      $Edition = "\n=250 ".$MatDetailResult->Edition."";
    }else{
      $Edition = "";
    }

    //PhysicalDescription
    if (!empty($MatDetailResult->PhysicalDescriptionEtc)) {
      $PhysicalDescriptionEtc = "\n=300 ".$MatDetailResult->PhysicalDescriptionEtc."";
    }else{
      $PhysicalDescriptionEtc = "";
    }





    //data to be written in mrk file
    $dataToWrite = "=LDR  00000nam  2200000   4500".$ControlNumber.$CatalogNumber.$MaterialType.$ISBN.$CatalogSource.$CallNumber.
    $AuthorName.$ISSN.$TitleStatement.$Edition.$PhysicalDescriptionEtc;

    return $dataToWrite;

  }



  //=================IMPORT======================



  function do_upload(){
    $config['upload_path']          = 'impCatalogTmp/';
    $config['allowed_types']        = '*';
    $config['max_size']             = 10048;
    $config['max_width']            = 1920;
    $config['max_height']           = 1080;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
      $data['msg'] = 'Failed';
    }
    else
    {
      $data['msg'] = 'Success';
    }

    $upload_data = $this->upload->data();
    $data['FileName'] = $upload_data['file_name'];

    echo json_encode($data);
  }



  function readFileImport(){

    $FileName = array( 'importFileName' => $this->input->post('FileName'));

    $this->session->set_userdata($FileName);

    $myfile = fopen("./impCatalogTmp/" . $this->session->userdata('importFileName'), "r") or die("Unable to open file!");

    $importedList = "";
    $duplicateList = "";

    while(!feof($myfile)) {

      $FileLine = fgets($myfile);
      $subsLine = substr($FileLine, 1, 3);

      switch ($subsLine) {
        case '001': $data2Insert['HoldingsID'] = trim(substr($FileLine, 5));
        break;

        case '006': $data2Insert['MaterialTypeID'] = trim(substr($FileLine, 5));
        break;

        case '':
        $HoldingsExist = $this->CatalogExport_model->ifExistHoldings($data2Insert);
        if (!$HoldingsExist) {
          $this->CatalogExport_model->INSERT_ImportCatalog($data2Insert);
          $importedList .= $data2Insert['HoldingsID'] . " added! <br />";
        }else{
          $duplicateList .= "duplicate : ". $data2Insert['HoldingsID'] . "<br />";
        }

        break;

        default:

        break;

      }


    }




    fclose($myfile);

    $x = $importedList.$duplicateList;

    $data['msg'] = $x;

    echo json_encode($data);

  }









}?>
