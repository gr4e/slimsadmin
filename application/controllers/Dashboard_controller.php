<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Dashboard_model');
  }



  function SystemOverview(){

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


    $data['TotalTitles'] = $this->Dashboard_model->GET_OverAlltotalTitles();

    $data['TotalTitles_book'] = $this->Dashboard_model->GET_totalTitles('1');
    $data['TotalTitles_serials'] = $this->Dashboard_model->GET_totalTitles('2');
    $data['TotalTitles_Theses'] = $this->Dashboard_model->GET_totalTitles('3');
    $data['TotalTitles_NP'] = $this->Dashboard_model->GET_totalTitles('4');
    $data['TotalTitles_VF'] = $this->Dashboard_model->GET_totalTitles('5');
    $data['TotalTitles_IP'] = $this->Dashboard_model->GET_totalTitles('6');
    $data['TotalTitles_TR'] = $this->Dashboard_model->GET_totalTitles('7');
    $data['TotalTitles_reprints'] = $this->Dashboard_model->GET_totalTitles('8');
    $data['TotalTitles_Analytics'] = $this->Dashboard_model->GET_totalTitles('9');

    $data['TotalCopies'] = $this->Dashboard_model->GET_OverAlltotalCopies();

    $data['TotalCopies_book'] = $this->Dashboard_model->GET_totalCopies('1');
    $data['TotalCopies_serials'] = $this->Dashboard_model->GET_totalCopies('2');
    $data['TotalCopies_Theses'] = $this->Dashboard_model->GET_totalCopies('3');
    $data['TotalCopies_NP'] = $this->Dashboard_model->GET_totalCopies('4');
    $data['TotalCopies_VF'] = $this->Dashboard_model->GET_totalCopies('5');
    $data['TotalCopies_IP'] = $this->Dashboard_model->GET_totalCopies('6');
    $data['TotalCopies_TR'] = $this->Dashboard_model->GET_totalCopies('7');
    $data['TotalCopies_reprints'] = $this->Dashboard_model->GET_totalCopies('8');
    $data['TotalCopies_Analytics'] = $this->Dashboard_model->GET_totalCopies('9');

    $data['MostSearchWord'] = $this->Dashboard_model->GET_MostSearchWord()->SrchdWord;

    $mostDL = $this->Dashboard_model->GET_mostDowloadedFile();

    if (!empty($mostDL)) {
    $data['MostDownloadedFile'] = $mostDL->FileName . " | " . $mostDL->HoldingsID;
  }else{
    $data['MostDownloadedFile'] = "No download record.";
  }


    $data['TotalRegisteredPatron'] = $this->Dashboard_model->GET_TotalRegisteredPatron();

    $data['UniqueGuest2Day'] = $this->Dashboard_model->GET_uniqueGuest2Day();



    $this->load->template('dashboard/CollectionOverview', $data, $page);



  }



}
