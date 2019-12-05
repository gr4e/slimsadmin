<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IndexMon_controller extends CI_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('IndexMon_model');
  }

  function MonitoringIndex(){

    if(!$this->Accounts_model->get_session_data('UserName'))
    {
      redirect('');
    }

    $modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

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

    $this->load->template('CMS/MonitoringIndex', $data, $page);


  }





  function GET_GenInq(){

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $currentUserID = $this->Accounts_model->get_session_data('UserID');


    $records = $this->IndexMon_model->GET_GenInqMonIndx($currentUserID);

    $data = array();


    foreach($records as $r){
      $sub_array = array();

      $sub_array[] = substr($r->Subject, 0, 20);
      $sub_array[] = substr($r->Inquiry, 0, 60);
      $sub_array[] =  "<button type='button' onclick=showDetails('".$r->subID."'); class='btn btn-info' style='float:right; margin: 5px 0 5px 0;'>Details</button>";

      $data[] = $sub_array;
    }


    $output = array(
      "draw" => $draw,
      "recordsTotal" => count($records),
      "recordsFiltered" => count($records),
      "data" => $data
    );


    echo json_encode($output);
    exit();
  }




  function GenInqDetails(){
    $aalID = $this->input->post('aalID');

    $GenInqDetails = $this->IndexMon_model->GET_genInqDetails($aalID);
    $pinnedDetails = $this->IndexMon_model->GET_geInqPinned($aalID);

    $data['subAalID'] = $GenInqDetails->subAalID;

    if (!empty($pinnedDetails->overRideTitle)) {
      $data['subjectTitle'] = $pinnedDetails->overRideTitle." (*".$GenInqDetails->Subject."*)";
    }else{
      $data['subjectTitle'] = $GenInqDetails->Subject;
    }

    $data['initalInq'] = $GenInqDetails->Inquiry;



    if (!empty($pinnedDetails->subAalID)) {
      $data['pinBtn'] = "<button type='button' class='btn btn-danger' onclick='unPin();'>Unpin</button>";
    }else{
      $data['pinBtn'] = "<button type='button' class='btn btn-primary' onclick='pinPost();'>Pin Post</button>";
    }

    $GenInqReplies = $this->IndexMon_model->GET_GenInqReplies($aalID);
    $GenInqRepliesOutput = "";

    for ($i=count($GenInqReplies)-1; $i >= 0 ; $i--) {

      if ($GenInqReplies[$i]->isPatron == '1') {
        $patronStyle = " style='float: left; border: 1px solid; border-radius: 5px; padding: 10px 20px; word-break: break-word; margin-bottom:10px;' class='col-sm-11' ";
      }else{
        $patronStyle = " style='float: right; border: 1px solid; border-radius: 5px; padding: 10px 20px; word-break: break-word; margin-bottom:10px;' class='col-sm-11' ";
      }

      $GenInqRepliesOutput .= "<div ".$patronStyle." >".$GenInqReplies[$i]->Reply."
      <br class='clear' /><br class='clear' /><i style= 'color:#AAA; font-size:12px; font-weight:300;'  >" . $GenInqReplies[$i]->LibrarianName . " | " . $GenInqReplies[$i]->dateReply . "</i></div>";
    }

    $data['replies'] = $GenInqRepliesOutput;

    echo json_encode($data);

  }



  function pinPost(){
    $subAalID = $this->input->post('subAalID');
    $OrrSubject = $this->input->post('OrrSubject');

    $pinData = array(
      'subAalID' => $subAalID,
      'overRideTitle' => $OrrSubject
    );

    $this->IndexMon_model->INSERT_pinPost($pinData);

    $data['sux'] = '1';

    echo json_encode($data);

  }


function unPinPost(){

  $subAalID = $this->input->post('subAalID');

  $this->IndexMon_model->DELETE_unPinPost($subAalID);

  $data['sux'] = '1';

  echo json_encode($data);

}




}
