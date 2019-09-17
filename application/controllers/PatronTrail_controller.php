<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatronTrail_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('PatronTrail_model');
  }


  function PatronTrail($data = NULL){

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

    $this->load->template('reports/Patron_trail', $data, $page);


  }


  function generatePatronTrail(){

    $outputData = "";
    $dateRange = $this->input->post('daterange');

    $dateFrom = date('Y-m-d',strtotime(substr($dateRange, 0, 10)));
    $dateTo = date('Y-m-d',strtotime(substr($dateRange, 13, 10)));

    $PatronTrailResult = $this->PatronTrail_model->GET_PatronTrailList($dateFrom, $dateTo);

    for ($i=0; $i < count($PatronTrailResult) ; $i++) {
      $Patron = is_null($PatronTrailResult[$i]->FullName) ? 'Guest' : $PatronTrailResult[$i]->FullName;
      $ifsearch = is_null($PatronTrailResult[$i]->searched4) ? '-' : $PatronTrailResult[$i]->searched4;
      $outputData .= "<tr><td>".$Patron."</td>
      <td>".$PatronTrailResult[$i]->ip_address."</td>
      <td>".$PatronTrailResult[$i]->Action."</td>
      <td>".$ifsearch."</td>
      <td>".$PatronTrailResult[$i]->ActionDate."</td></tr>";
    }

    $data['TrailList'] = $outputData;

    $this->PatronTrail($data);

  }



} ?>
