<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends CI_Controller {



  function __construct() {
    parent::__construct();
    $this->load->model('Feedback_model');
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

    $data['feedbackData'] = $this->Feedback_model->GET_feedbackData();

    $data['q1Score'] = round($this->Feedback_model->GET_q1_score()->score, 1);
    $data['q2Score'] = round($this->Feedback_model->GET_q2_score()->score, 1);
    $data['q3Score'] = round($this->Feedback_model->GET_q3_score()->score, 1);
    $data['q4Score'] = round($this->Feedback_model->GET_q4_score()->score, 1);
    $data['q5Score'] = round($this->Feedback_model->GET_q5_score()->score, 1);


    $optionalTxtsList = "";
    $OptionalTxts = $this->Feedback_model->GET_optionalTxts();


    for ($i=0; $i < count($OptionalTxts); $i++) {

      if (is_null($OptionalTxts[$i]->FullName)) {
        $patronName = $OptionalTxts[$i]->patronName;
      }else{
        $patronName = $OptionalTxts[$i]->FullName;
      }

      $optionalTxtsList .= "<tr style='cursor: pointer;' onclick=checkDetails('".$OptionalTxts[$i]->fbID."'); ><td>".$patronName."</td><td>".substr($OptionalTxts[$i]->optionalTxt, 0, 50)."</td><td>".$OptionalTxts[$i]->fbDate."</td></tr>";

    }


    $ratingsTable = $this->Feedback_model->GET_ratingsTab();

    $data['ratingsTableData'] = "<tr><td>Content</td><td>".$ratingsTable->s5q1."</td><td>".$ratingsTable->s4q1."</td><td>".$ratingsTable->s3q1."</td><td>".$ratingsTable->s2q1."</td><td>".$ratingsTable->s1q1."</td></tr>
    <tr><td>Usefulness/Significance</td><td>".$ratingsTable->s5q2."</td><td>".$ratingsTable->s4q2."</td><td>".$ratingsTable->s3q2."</td><td>".$ratingsTable->s2q2."</td><td>".$ratingsTable->s1q2."</td></tr>
    <tr><td>Overall Layout/Design</td><td>".$ratingsTable->s5q3."</td><td>".$ratingsTable->s4q3."</td><td>".$ratingsTable->s3q3."</td><td>".$ratingsTable->s2q3."</td><td>".$ratingsTable->s1q3."</td></tr>
    <tr><td>Response and Delivery Time</td><td>".$ratingsTable->s5q4."</td><td>".$ratingsTable->s4q4."</td><td>".$ratingsTable->s3q4."</td><td>".$ratingsTable->s2q4."</td><td>".$ratingsTable->s1q4."</td></tr></tr>";

    $data['optionalTxtsList'] = $optionalTxtsList;

    $data['totalClientFeedback'] = $this->Feedback_model->GET_totalFeedbackCount();


    $this->load->template('feedback/feedbacks', $data, $page);


  }



  function ratingsPer(){

    $rateOf = $this->input->post('rateOf');

    $ratings = $this->Feedback_model->GET_rateOf($rateOf);



    $ratesOutput = "<table class='table hover' style='width:100%;' >
    <tr><th>Stars</th><th>Total Stars</th></tr>
    <tr><td>5 <i class='fa fa-star-o' /></td><td>".$ratings->s5."</td></tr>
    <tr><td>4 <i class='fa fa-star-o' /></td><td>".$ratings->s4."</td></tr>
    <tr><td>3 <i class='fa fa-star-o' /></td><td>".$ratings->s3."</td></tr>
    <tr><td>2 <i class='fa fa-star-o' /></td><td>".$ratings->s2."</td></tr>
    <tr><td>1 <i class='fa fa-star-o' /></td><td>".$ratings->s1."</td></tr>
    </table>";




    $data['rateTabulation'] = $ratesOutput;


    echo json_encode($data);


  }


  function txtDetails(){
    $fbID = $this->input->post('fbID');

    $txtDetails = $this->Feedback_model->GET_optionalTxtsDetails($fbID);


    $data['suggestedBy'] = (is_null($txtDetails->FullName)) ? $txtDetails->patronName : $txtDetails->FullName;
    $data['optionalTxt'] = $txtDetails->optionalTxt;
    $data['patronEmailCon'] = (is_null($txtDetails->email)) ? $txtDetails->patronEmail : $txtDetails->email;
    $data['patronContactNoCon'] = (is_null($txtDetails->contactNo)) ? $txtDetails->patronContactNo : $txtDetails->contactNo;


    $data['TxtDetails'] = $fbID;

    echo json_encode($data);
  }



}
