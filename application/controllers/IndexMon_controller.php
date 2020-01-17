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




  //suggested Material

  function GET_suggestedList(){

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $currentUserID = $this->Accounts_model->get_session_data('UserID');


    $records = $this->IndexMon_model->GET_suggestionList($currentUserID);

    $data = array();


    foreach($records as $r){
      $sub_array = array();

      $sub_array[] = substr($r->Title, 0, 40);
      $sub_array[] = substr($r->FullName, 0, 30);
      $sub_array[] = substr($r->SuggestedDate, 0, 20);
      $sub_array[] =  "<button type='button' onclick=suggestionDetails('".$r->subSabID."'); class='btn btn-info' style='float:right; margin: 5px 0 5px 0;'>Details</button>";

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



  function GET_suggestionDetail(){

    $sabID = $this->input->post('sabID');

    $sugDetails = $this->IndexMon_model->GET_sugDetails($sabID);

    $data['sabID'] = $sugDetails->subSabID;
    $data['Subject'] = $sugDetails->Subject;
    $data['Title'] = $sugDetails->Title;
    $data['Author'] = $sugDetails->Author;
    $data['Publisher'] = $sugDetails->Publisher;
    $data['About'] = $sugDetails->About;
    $data['FullName'] = $sugDetails->FullName;
    $data['SuggestedDate'] = $sugDetails->SuggestedDate;
    $data['upvotes'] = $sugDetails->upvotes;

    echo json_encode($data);

  }

  function availableSuggestion(){
    $sabID = $this->input->post('sabID');
    $this->IndexMon_model->UPDATE_availableStatusSuggestMat($sabID);
    exit();
  }


  function deleteSuggestion(){
    $sabID = $this->input->post('sabID');
    $this->IndexMon_model->UPDATE_deleteStatusSuggestMat($sabID);
    exit();

  }



  function GET_catalogInqList(){

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $currentUserID = $this->Accounts_model->get_session_data('UserID');


    $records = $this->Monitoring_model->GET_inqCatList($currentUserID);

    $data = array();


    foreach($records as $r){
      $sub_array = array();

      $sub_array[] = $r->HoldingsID;
      $sub_array[] = $r->FullName;
      $sub_array[] = $r->inqCatDate;
      $sub_array[] =  "<button type='button' onclick=CatInq('".$r->CatInqID."'); class='btn btn-info' style='float:right; margin: 5px 0 5px 0;'>Details</button>";

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


  function catalogInqDetails(){
    $catInqID = $this->input->post('catInqID');

    $catInqDetailsArr = $this->Monitoring_model->GET_catInqDetails($catInqID);

    $output = "";

    for ($i=0; $i < count($catInqDetailsArr) ; $i++) {

      if ($catInqDetailsArr[$i]->isPatron == '1') {
        $styleIfPatron = "border: 1px solid; margin-top: 10px; border-radius:5px; padding:10px 20px; word-break: break-word; background-color:#F2F3F5; float: left;";
        $patronDateReply = "<br/> <br /><i style= 'color:#828282; font-size:12px; font-weight:300;'  >" . $catInqDetailsArr[$i]->dateReply . "</i>";
      }else{
        $styleIfPatron = "border: 1px solid; margin-top: 10px; border-radius:5px; padding:10px 20px; word-break: break-word; background-color:#AAC9FF; float: right;";
        $patronDateReply = "<br/><i style= 'color:#828282; font-size:12px; font-weight:300;'  >" . $catInqDetailsArr[$i]->dateReply . "</i>";
      }
      $output .= "<div style='".$styleIfPatron."' class='col-sm-11'>".$catInqDetailsArr[$i]->reply.$patronDateReply."</div>";

    }

    if ($catInqDetailsArr[0]->reply == NULL) {
      $output = "<h5> No current conversation.</h5>";
    }

    $data['CatInqID'] = $catInqDetailsArr[0]->CatInqID;
    $data['MatTitle'] = $catInqDetailsArr[0]->MatTitle;
    $data['initalInq'] = $catInqDetailsArr[0]->inqCatTxt;
    $data['output'] = $output;


    echo json_encode($data);

  }
















}
