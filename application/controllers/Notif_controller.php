<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Notif_model');
  }

  function test(){
    $user = $this->Accounts_model->get_session_data('UserName');
    $result = $this->Notif_model->get_pvtMessages_notif($user);

    print_r($result);

  }



  function view_privateMsgs(){
    $user = $this->Accounts_model->get_session_data('UserName');
    $pvtMsgs = $this->Notif_model->get_pvtMessages($user);

    if(!$this->Accounts_model->get_session_data('UserName'))
    {
      redirect('');
    }

    $modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

    $data['roles'] = $this->Accounts_model->get_roles_dropdown();

    $data['pvtMsgs'] = $pvtMsgs;

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

    $this->load->template('PrivateMsg/Pmsg', $data, $page);

  }



  function pvt_Msgs(){

    $user = $this->Accounts_model->get_session_data('UserName');

    $result = $this->Notif_model->get_pvtMessages_notif($user);
    $ResultOputput ='';

    for ($i=0; $i < count($result) ; $i++) {

      $date = $result[$i]->pvtSentDate;
      $datetime1 = new DateTime();
      $datetime2 = new DateTime($date);
      $interval = $datetime1->diff($datetime2);

      if($interval->d != 0){
        $elapsed = $interval->format(' %a day/s');
      }
      else if($interval->h != 0){
        $elapsed = $interval->format('%h hour/s');
      }
      else if($interval->i != 0){
        $elapsed = $interval->format(' %i minutes');
      }
      else if($interval->s != 0){
        $elapsed = $interval->format(' %s seconds');
      }

      $ResultOputput .= "<li>
      <a href='". base_url() ."index.php/Notif_controller/specMsg/". $result[$i]->pvtID ."'>
      <div class='pull-left'><img src='http://localhost/elib/". $result[$i]->imgPath."' /></div>
      <h4>" . substr($result[$i]->FullName, 0, 15) . "<small><i class='fa fa-clock-o'></i>" . $elapsed . "</small></h4>
      <p>" . strip_tags($result[$i]->pvtTxt) . "</p>
      </a>
      </li>";
    }


    if(count($result) != 0){$count = count($result);} else{$count = '';};

    $data = array(
      'messages' => $ResultOputput,
      'notifCount' => $count
    );

    echo json_encode($data);

  }// end of pvt_Msgs()



  function specMsg(){

    $user = $this->Accounts_model->get_session_data('UserName');
    $userID = $this->Accounts_model->get_session_data('UserID');
    $threadID = $this->input->post('threadID');
    $output = '';
    $msgList = '';

    $result = $this->Notif_model->GET_pvtSpecMsg($threadID, $user);

    for ($i=0; $i < count($result) ; $i++) {
      if($userID == $result[$i]->msgFrom){
        $classDiv = 'msgBoxLeft';
      }else{
        $classDiv = 'msgBoxRight';
      }
      $msgList .= "<div class='".$classDiv."'>".$result[$i]->msgTxt."<br /><p style='font-weight:300; font-style: italic; float:right;'>Sent: ".$result[$i]->msgDate."</p></div>";
    }

    $output = "<div class='specPvtMsg' id='specPvtMsg'><h3>Subject: ".$result[0]->Subject."</h3><hr />".$msgList."</div>";

    $data['specMsg'] = $output;

    echo json_encode($data);

  }


  function UPDATE_ReadStatus(){
    $id = $this->input->post('pvtDetailID');
    $this->Notif_model->UPDATE_ReadStatus($id);
  }


  function INSERT_replyPvtMsg(){

    $insertData = array(
      'threadID' => $this->input->post('threadID'),
      'msgTxt' => $this->input->post('msgTxt'),
      'msgFrom' => $this->Accounts_model->get_session_data('UserID')
    );

    $this->Notif_model->INSERT_pvtMsg_reply($insertData);

    $data['stat'] = 'Success!';

    echo json_encode($data);

  }


  // OTHER NOTIFICATIONS


  function GET_otherNotif(){

    $notifCount = $this->Notif_model->GET_otherNotif_count();
    $aalCount = $this->Notif_model->GET_aalCount();
    $sabCount = $this->Notif_model->GET_sabCount();
    $ciCount = $this->Notif_model->GET_ciCount();

    if($ciCount != 0){
      if($ciCount > 1){
        $ctlCountResult = "<i class='fa fa-newspaper-o text-aqua'></i>" . $ciCount . " New Catalog Inquiries.";
      }else{
        $ctlCountResult = "<i class='fa fa-users text-aqua'></i>" . $ciCount . " New Inquiry.";
      }
      $cinquiry = "<a href='#'>".$ctlCountResult."</a>";
    }else{
      $cinquiry = "";
    }

    if($aalCount != 0){
      if($aalCount > 1){
        $aalCountResult = "<i class='fa fa-comments-o text-aqua'></i>" . $aalCount . " New General Inquiries.";
      }else{
        $aalCountResult = "<i class='fa fa-users text-aqua'></i>" . $aalCount . " New Inquiry.";
      }
      $ginquiry = "<a href='#'>".$aalCountResult."</a>";
    }else{
      $ginquiry = "";
    }


    if($sabCount != 0){
      if($sabCount > 1){
        $sabCountResult = "<i class='fa fa-users text-aqua'></i>" . $sabCount . " New Material Suggestions.";
      }else{
        $sabCountResult = "<i class='fa fa-users text-aqua'></i>" . $sabCount . " New Suggestion.";
      }
      $suggest = "<a href='#'>".$sabCountResult."</a>";
    }else{
      $suggest = "";
    }

    if($notifCount == 0) {$notifCount = '';}

    $data = array(
      'otherNotifCount' => $notifCount,
      'aal' => $ginquiry,
      'sab' => $suggest,
      'ctl' => $cinquiry
    );

    echo json_encode($data);



  }


  function Notify(){


    $user = $this->Accounts_model->get_session_data('UserName');
    $pvtMsgs = $this->Notif_model->get_pvtMessages($user);

    if(!$this->Accounts_model->get_session_data('UserName'))
    {
      redirect('');
    }

    $modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

    $data['roles'] = $this->Accounts_model->get_roles_dropdown();

    $data['pvtMsgs'] = $pvtMsgs;

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


    $userID = $this->Accounts_model->get_session_data('UserID');
    $data['directNotifyLink'] = $this->uri->segment(3);



    $this->load->template('CMS/Notify', $data, $page);

  }


  function GET_monitoredIndex(){
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $currentUserID = $this->Accounts_model->get_session_data('UserID');

    // Get records
    $records = $this->Notif_model->GET_monitorIndex($currentUserID);

    $data = array();

    // Store records into sub_array
    foreach($records as $r)
    {
      if($r->isAcquired != 1){

        $sub_array = array();

        $sub_array[] = $r->mntrType;
        $sub_array[] = substr($r->Title, 0, 80);
        $sub_array[] =  "<button class='btn btn-danger' style='float:right; margin: 5px 0 5px 5px' onclick = unMonitor('".$r->mntrIndexID."')>Un-Monitor</button>";


        $data[] = $sub_array;
      }
    }

    // Store everything into another array
    $output = array
    (
      "draw" => $draw,
      "recordsTotal" => count($records),
      "recordsFiltered" => count($records),
      "data" => $data
    );

    // Encode data
    echo json_encode($output);
    exit();
  }



  function aalSabCiCount(){
    $aalCount = $this->Notif_model->GET_aalCount();
    $sabCount = $this->Notif_model->GET_sabCount();
    $ciCount = $this->Notif_model->GET_ciCount();

    $data = array(
      'aalCount' => $aalCount,
      'sabCount' => $sabCount,
      'ciCount' => $ciCount
    );

    echo json_encode($data);

  }


  function catInqNotif(){
    $result = $this->Notif_model->GET_catInqNotif();
    $cataInqList = '';

    for ($i=0; $i < count($result); $i++) {
      $cataInqList .= "<li style='height:52px;'><div style='float:left; width:80%; overflow:hidden;'>
      <p style='padding:0; margin:0; text-overflow:clip;overflow: hidden;white-space:nowrap'>" .$result[$i]->HoldingsID. " -- ". $result[$i]->Title . "</p>
      <small>".$result[$i]->FullName. "<i> ".substr($result[$i]->inqCatDate, 0, 10)."</i></small></div>
      <button class='btn btn-info' style = 'float:right;' onclick = monitor('".$result[$i]->CatInqID."')>Monitor</button></li>";
    }

    $data['cataInqList'] = $cataInqList;

    echo json_encode($data);
  }






  function GET_askALibNotif(){
    $result = $this->Notif_model->GET_askALibNotif();
    $askALibList = '';

    for ($i=0; $i < count($result); $i++) {
      $askALibList .= "<li style='height:52px;'><div style='float:left; width:80%; overflow:hidden;'>
      <p style='padding:0; margin:0; text-overflow:clip;overflow: hidden;white-space:nowrap'>" . $result[$i]->Subject . "</p>
      <small>".$result[$i]->FullName. "<i> ".substr($result[$i]->DateofInquiry, 0, 10)."</i></small></div>
      <button class='btn btn-info' style = 'float:right;' onclick = monitor('".$result[$i]->subAalID."')>Monitor</button></li>";
    }

    $data = array('askALibList' => $askALibList);

    echo json_encode($data);
  }



  function GET_suggestNotif(){

    $result = $this->Notif_model->GET_suggestNotif();
    $suggestList = '';

    for ($i=0; $i < count($result); $i++) {
      $suggestList .= "<li style='height:52px;'><div style='float:left; width:80%; overflow:hidden;'>
      <p style='padding:0; margin:0; text-overflow:clip;overflow: hidden;white-space:nowrap'>" . $result[$i]->Title . "</p>
      <small>".$result[$i]->FullName. "<i> ".substr($result[$i]->SuggestedDate, 0, 10)."</i></small></div>
      <button class='btn btn-info' style = 'float:right;' onclick = monitor('".$result[$i]->subSabID."')>Monitor</button></li>";
    }

    $data = array('SuggestList' => $suggestList);

    echo json_encode($data);

  }

  function monitorNotif(){

    $id = $this->input->post('subID');

    if(substr($id, 0 ,3) == 'SAB'){

      $monitorData = array(
        'UserID' => $this->Accounts_model->get_session_data('UserID'),
        'mntrType' => 1,
        'subID' => $id
      );
      $this->Notif_model->INSERT_monitor_SAB($monitorData);

    }

    else if(substr($id, 0 ,3) == 'AAL'){
      $monitorData = array(
        'UserID' => $this->Accounts_model->get_session_data('UserID'),
        'mntrType' => 2,
        'subID' => $id
      );
      $this->Notif_model->INSERT_monitor_AAL($monitorData);
    }

    else if(substr($id, 0 ,3) == 'CTL'){
      $monitorData = array(
        'UserID' => $this->Accounts_model->get_session_data('UserID'),
        'mntrType' => 3,
        'subID' => $id
      );
      $this->Notif_model->INSERT_monitor_CAT($monitorData);
    }

    return;
  }



  function unMonitor(){
    $mntrID = $this->input->post('mntrID');
    $result = $this->Notif_model->GET_subID($mntrID);

    $data = array(
      'mntrType' => $result[0]->mntrType
    );

    $this->Notif_model->unMonitor($mntrID);
    echo json_encode($data);
    exit();
  }



  function lookUp(){

    $subID = $this->input->post('subID');
    $pre = substr($subID, 0, 3);

    $result = $this->Notif_model->GET_lookUp($subID);

    $output = '';

    if($pre == 'AAL'){

      $output .= "<h1>".$result[0]->subAalID."</h1>";

    }
    else if($pre == 'SAB'){

      $output .= "<h1>".$result[0]->subSabID."</h1>";

    }

    $data = array( 'lookUpData' => $output );

    echo json_encode($data);


  }



  //===============LOOK UP=================


  function SuggestionDetails(){
    $id = $this->input->post('sabID');
    $result = $this->Notif_model->GET_SABDetail($id);

    $data['subID'] = $id;
    $data['sggstdBy'] = 'Suggested By: ' . $result->FullName;
    $data['sbjAreaTd'] = $result->Subject;
    $data['titleTd'] = $result->Title;
    $data['authrTd'] = $result->Author;
    $data['pubshTd'] = $result->Publisher;
    $data['abtTd'] = $result->About;
    $data['pts'] = $result->vptPt;

    $data['1'] = '1';


    echo json_encode($data);


  }//end of function SuggestionDetails


  function setAsAvailableSug(){
    $subID = $this->input->post('sabID');
    $UserID = $this->Accounts_model->get_session_data('UserID');

    $updateData = array(
      'statusChngdBy' => $UserID,
      'isAcquired' => 1,
      'DateTagAcquired' => date("Y-m-d H:i:s")
    );

    $this->Notif_model->UPDATE_suggestionAvailable($updateData, $subID);

    $data['msg'] = '1';

    echo json_encode($data);

  }


  //====== Ask a librarian =====

  function generalInqDetails(){
    $aalID = $this->input->post('aalID');
    $output = "";
    $result = $this->Notif_model->GET_askAlibDetail($aalID);

    $replies = $this->Notif_model->GET_askAlibReplies($aalID);

    for ($i=0; $i < count($replies) ; $i++) {
      $styleIsPatron = "border: 1px solid; margin-top: 10px; border-radius:5px; padding:10px 20px; word-break: break-word;";
      $dateReplied = date('M jS, Y', strtotime($replies[$i]->dateReply));

      $output .= "<div style='" . $styleIsPatron . "'>
      " . $replies[$i]->Reply ."
      <div><br class='clear' />
      <i style= 'color:#AAA; font-size:12px; font-weight:300;'  >" . $replies[$i]->replyBy . " | " . $dateReplied . "</i>
      </div>
      </div>";
    }



    $data['subAalID'] = $result->subAalID;
    $data['inqBy'] = $result->FullName;
    $data['inqText'] = $result->Inquiry;

    $data['inqReplies'] = $output;


    $data['msg'] = $aalID;

    echo json_encode($data);
  }



  function GenInqReply(){

    $replyData = array(
      'subAalID' => $this->input->post('subAalID'),
      'Reply' => $this->input->post('replyBox'),
      'repliedBy' => $this->Accounts_model->get_session_data('UserID'),
      'isPatron' => 0
    );

    $this->Notif_model->INSERT_GenInqReply($replyData);

    $data['ids'] = '1';

    echo json_encode($data);

  }


  function closeGenInq(){
    $subAalID = $this->input->post('subAalID');

    $this->Notif_model->UPDATE_clsGenInq($subAalID);

    $data['msg'] = "1";

    echo json_encode($data);

  }



  //===============Catalog Inquiry===============

  function catalogInqDetails(){
    $CatInqID = $this->input->post('CatInqID');

    $catResult = $this->Notif_model->GET_catInqDetails($CatInqID);

    $replyOutput = "";

    for ($i=0; $i < count($catResult) ; $i++) {
      $styleIsPatron = "border: 1px solid; margin-top: 10px; border-radius:5px; padding:10px 20px; word-break: break-word;";
      $dateReplied = date('M jS, Y', strtotime($catResult[$i]->dateReply));

      $replyOutput .= "<div style='" . $styleIsPatron . "'>
      " . $catResult[$i]->reply ."
      <div><br class='clear' />
      <i style= 'color:#AAA; font-size:12px; font-weight:300;'  >" . $catResult[$i]->repliedBy . " | " . $dateReplied . "</i>
      </div>
      </div>";
    }


    $data['catalog_Title'] = $catResult[0]->Title;
    $data['inqCatTxt'] = $catResult[0]->inqCatTxt;
    $data['CatInqID'] = $CatInqID;
    $data['catInqReplies'] = $replyOutput;


    echo json_encode($data);
  }



function catInqReply(){

  $replyData = array(
    'CatInqID' => $this->input->post('subAalID'),
    'reply' => $this->input->post('catalog_replyBox'),
    'repliedBy' => $this->Accounts_model->get_session_data('UserID'),
    'isPatron' => 0
  );

  $this->Notif_model->INSERT_inqCatReply($replyData);

  $data['ids'] = '1';

  echo json_encode($data);

}


















}?>
