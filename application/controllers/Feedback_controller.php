<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends CI_Controller {



  function __construct() {
    parent::__construct();
    $this->load->model('feedback_model');
  }



  function Feedbacks(){

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

    $data['feedbackData'] = $this->feedback_model->GET_feedbackData();

    $data['q1Score'] = round($this->feedback_model->GET_q1_score()->score, 1);
    $data['q2Score'] = round($this->feedback_model->GET_q2_score()->score, 1);
    $data['q3Score'] = round($this->feedback_model->GET_q3_score()->score, 1);
    $data['q4Score'] = round($this->feedback_model->GET_q4_score()->score, 1);
    $data['q5Score'] = round($this->feedback_model->GET_q5_score()->score, 1);


    $this->load->template('feedback/feedbacks', $data, $page);


  }



  function ratingsPer(){

    $rateOf = $this->input->post('rateOf');
    $counter = "";

    $ratings = $this->feedback_model->GET_rateOf($rateOf);

    for ($i=0; $i < count($ratings); $i++) {

      if ($ratings[$i]->$rateOf) {
        // code...
      }

      $counter .= "";



    }


    $data['ratingsOf'] = "<?php print_r('\$ratings'); ?>";

    echo json_encode($data);


  }




}
