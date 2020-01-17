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




  function PatronStatsReport(){

    if(!$this->Accounts_model->get_session_data('UserName'))
    {
      redirect('');
    }

    $modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

    $data['roles'] = $this->Accounts_model->get_roles_dropdown();
    $data['groups'] = $this->Accounts_model->get_groups_dropdown();
    $data['consortia'] = $this->Accounts_model->get_consortia_dropdown();

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

    $this->load->template('reports/PatronStatistics', $data, $page);
  }

}
