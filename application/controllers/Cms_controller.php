<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Cms_model');
    $this->load->helper('file');
  }


  function checkCIVs(){
    echo CI_VERSION;
  }

  function checkServerIP(){
    $query = $this->Cms_model->isExistServerIP();

    if(!$query){
      $data['NoIp'] = '1';
    }else{
      $data['NoIp'] = '0';
    }

    echo json_encode($data);
  }


  function setServerIP(){
    $serverIP = $this->input->post('ip');
    $dataIP = array('CurrentServeIP' => $serverIP);
    $this->Cms_model->INSERT_serverIP($dataIP);

    $data['stat'] = '1';

    echo json_encode($data);
  }



  // data library for circulation
  function DataLib($data = NULL){

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


    $data['topicList'] = $this->Cms_model->GET_topicList();
    $data['pubList'] = $this->Cms_model->GET_pubList();
    $data['carouselList'] = $this->Cms_model->GET_carouselList();

    $this->load->template('CMS/Data_lib', $data, $page);

  }



  function Gallery($data = NULL){

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

    $data['gallery_imgs'] = $this->Cms_model->GET_galleryImages();


    $this->load->template('CMS/Gallery', $data, $page);



  }





  //landing for news
  function news($data = NULL){
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

    $data['newsList'] = $this->Cms_model->GET_newsList();

    $data['gallery_imgs'] = $this->Cms_model->GET_galleryImages();


    $this->load->template('CMS/news', $data, $page);

  }


  //============ ASK A LIB (INQUIRIES) ==============================

  function inqDetails($data = NULL){

    if(isset($data)){
      $subID = $data['subAalID'];
    }else{
      $subID = $this->input->post('subID');
    }


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

    $data['inquiry'] = $this->Cms_model->GET_specificInquiry($subID);
    $aalID = $data['inquiry']->aalID;
    $data['inquiryReply'] = $this->Cms_model->GET_aalReply($aalID);

    $this->load->template('CMS/inquiry_data', $data, $page);
  }


  function inquiryReply(){

    $replyData = array(
      "aalID" => $this->input->post("aalID"),
      "Reply" => $this->input->post('inqTxt'),
      "repliedBy" => $this->Accounts_model->get_session_data('LibrarianName')
    );

    $this->Cms_model->INSERT_aalReplyInq($replyData);

    $data['subAalID'] = $this->input->post('subAalID');
    $data['msg'] = 'Success!';

    $this->inqDetails($data);

  }







  //================= NEWS MANAGEMENT FOR OPAC ======================
  function newNews(){

    $insertData = array(
      'SubjectTitle' => $this->input->post('SubjectTitle'),
      'content' => $this->input->post('content'),
      'dateCreated' => date("Y-m-d h:i:sa"),
      'dateModified' => date("Y-m-d h:i:sa")
    );

    $this->Cms_model->INSERT_newNews($insertData);

    $data['msg'] = 'Successfully Created!';

    $this->news($data);

  }


  function deleteNews(){
    $id = $this->input->post('newsID');

    $this->Cms_model->DELETE_news($id);
    return;
  }



  function getSpecNews(){

    $newsID = $this->input->post('newsID');

    $result = $this->Cms_model->GET_specificNews($newsID);

    $data = array(
      'newsID' => $result[0]->newsID,
      'SubjectTitle' => $result[0]->SubjectTitle,
      'content' => $result[0]->content
    );

    echo json_encode($data);


  }


  function updateNews(){
    $newsID = $this->input->post('newsID');
    $SubjectTitle = $this->input->post('SubjectTitle');
    $content = $this->input->post('editcontent');
    $dateMod = date("Y-m-d h:i:sa");

    $this->Cms_model->UPDATE_news($newsID, $SubjectTitle, $content, $dateMod);

    $data['msg'] = 'Successfully updated!';

    $this->news($data);
  }



  function uploadImg(){
    $config['upload_path']          = 'Gallery/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 10048;
    $config['max_width']            = 1920;
    $config['max_height']           = 1080;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
      $data['error'] = 'Failed to upload Image!';

      $this->news($data);
    }
    else
    {
      $imgDet = array(
        'imgFileName' => $this->upload->data('file_name'),
        'imgFilePath' => base_url() . "Gallery/",
        'imgFileType' => $this->upload->data('image_type'),
        'imgFileSize' => $this->upload->data('file_size'),
        'imgFileWidth' => $this->upload->data('image_width'),
        'imgFileHeight' => $this->upload->data('image_height'),
        'dateUploaded' => date("Y-m-d h:i:sa")
      );

      $this->Cms_model->INSERT_imgGallery($imgDet);

      $data['msg'] = 'Successfully Uploaded!';

      $this->Gallery($data);
    }
  }



  function enlargeImg(){
    $imgID = $this->input->post('imgID');

    $result = $this->Cms_model->GET_enlargeImg($imgID);

    $data = array(
      'imgPath' => "<img width='100%' src='".$result[0]->imgFilePath . $result[0]->imgFileName ."'>",
      'imgDirPath' => $result[0]->imgFilePath . $result[0]->imgFileName

    );

    echo json_encode($data);

  }



  function deleteImg(){

    $imgID = $this->input->post('imgID');

    $this->Cms_model->DELETE_galleryImage($imgID);

    $data['msg'] = 'Deleted Successfully!';

    echo json_encode($data);

  }


  //==========================readers corner========================================


  function readCorn(){

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


    $data['AALlist'] = $this->Cms_model->GET_AALlist();
    $data['pinnedAAL'] = $this->Cms_model->GET_pinnedList();


    $this->load->template('CMS/ReadCorn', $data, $page);

  }


  function generalInqDetails(){
    $aalID = $this->input->post('aalID');
    $output = "";
    $result = $this->Cms_model->GET_askAlibDetail($aalID);

    $replies = $this->Cms_model->GET_askAlibReplies($aalID);

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

    $data['isPinned'] = $this->Cms_model->GET_isItPinned($aalID);

    $data['inqSubject'] = $result->Subject;
    $data['DateofInquiry'] = date('M jS, Y', strtotime($result->DateofInquiry));
    $data['subAalID'] = $result->subAalID;
    $data['inqBy'] = $result->FullName;
    $data['inqText'] = $result->Inquiry;

    $data['inqReplies'] = $output;


    $data['msg'] = $aalID;

    echo json_encode($data);
  }



  function pinGeninq(){
    $subAalID = $this->input->post('subAalID');
    $Title = $this->input->post('Title');

    $resultCount = $this->Cms_model->COUNT_pinnedAAL();

    if ($resultCount != 10) {
      $pinData = array(
        'subAalID' => $subAalID,
        'overRideTitle' => $Title
      );
      $this->Cms_model->INSERT_pinAAL($pinData);
      $data['msg'] = true;
    }else{
      $data['msg'] = false;
    }

    echo json_encode($data);
  }


  function unPinGeninq(){
    $subAalID = $this->input->post('subAalID');

    $this->Cms_model->DELETE_unPinAAL($subAalID);

    $data['msg'] = "success";

    echo json_encode($data);
  }




  // function to add new topic in broadclass list
  function addNewTopic(){
    $newTopicTxt = $this->input->post('newTopicTxt');

    $dataTopic = array(
      'BroadClass' => $newTopicTxt
    );

    $this->Cms_model->INSERT_broadClass($dataTopic);

    $data['msg'] = 'Success';

    echo json_encode($data);

  }

  function delTopic(){
    $topicID = $this->input->post('topicID');

    $this->Cms_model->DELETE_broadClass($topicID);

    $data['msg'] = 'Success';

    echo json_encode($data);
  }


  function addNewPubLine(){
    $newTopicTxt = $this->input->post('newPubLine');

    // $lastPubLineID = $this->Cms_model->GET_lastPubID()->pubListID;
    //
    // if (!empty($lastPubLineID)) {
    //   $pubLineIDno = substr($lastPubLineID, 4)+1;
    //   $pubLineID = 'PUB-' . $pubLineIDno;
    // }else{
    //   $pubLineID = 'PUB-0';
    // }

    $dataPubLine = array(
      // 'pubListID' => $pubLineID,
      'pubName' => $newTopicTxt
    );

    $this->Cms_model->INSERT_PubLine($dataPubLine);

    $data['msg'] = 'Success';

    echo json_encode($data);

  }




  function delPubLine(){
    $pubListID = $this->input->post('pubListID');

    $this->Cms_model->DELETE_pubLine($pubListID);

    $data['msg'] = 'Success';

    echo json_encode($data);
  }


  //SERVER SETTINGS

  function ServerSettings(){

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

    $data['serSet'] = $this->Cms_model->GET_serverSettings();

    $this->load->template('admin/ServerSet', $data, $page);

  }


  function serverSettingUpdate(){

    $CurrentServeIP = $this->input->post('serverIP');
    $PublicIP = $this->input->post('publicIP');

    $this->Cms_model->UPDATE_serverSettings($CurrentServeIP, $PublicIP);

    $data['msg'] = 'ok';

    echo json_encode($data);
  }


  function upload_banner(){
    //banner upload path change to OPAC directory
    $config['upload_path']          = '../slims/assets/images/banner';
    $config['allowed_types']        = 'png';
    $config['max_size']             = 1000;
    $config['max_width']            = 111024;
    $config['max_height']           = 11768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {

      header('Location: '.base_url().'admin/ServerSettings');
      // $error = array('error' => $this->upload->display_errors());
      // $this->load->view('admin/ServerSet', $error);
    }
    else
    {
      //banner file path change to OPAC directory
      $upload_data = $this->upload->data();
      $file_name = $upload_data['file_name'];

      $file_path = 'assets/images/banner/'.$file_name;

      $this->Cms_model->UPDATE_banner_path($file_path);

      header('Location: '.base_url().'admin/ServerSettings');
      // $data = array('upload_data' => $this->upload->data());
      // $this->load->view('admin/ServerSet', $data);
    }

  }


  function changeCarouselData(){

    $caroData = array(
      'caroData0' => $this->input->post('caroData0'),
      'caroData1' => $this->input->post('caroData1'),
      'caroData2' => $this->input->post('caroData2'),
      'caroData3' => $this->input->post('caroData3'),
      'caroData4' => $this->input->post('caroData4'),
      'caroData5' => $this->input->post('caroData5'),
      'caroData6' => $this->input->post('caroData6'),
      'caroData7' => $this->input->post('caroData7'),
      'caroData8' => $this->input->post('caroData8'),
      'caroData9' => $this->input->post('caroData9'),
      'caroData10' => $this->input->post('caroData10'),
      'caroData11' => $this->input->post('caroData11')
    );

    for ($i=0; $i < count($caroData) ; $i++) {
      $this->Cms_model->UPDATE_caroData($caroData['caroData'.$i], $i+1);
    }

    $data['SuccessMsg'] = 'Carousel List Successfully Updated!';

    $this->DataLib($data);

  }



  function AboutUs(){
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

    $data['gallery_imgs'] = $this->Cms_model->GET_galleryImages();

    $this->load->template('CMS/AboutUs', $data, $page);
  }


  function AboutUsContent(){

    $data['AboutUsData'] = $this->Cms_model->GET_AboutUsData()->contentText;

    echo json_encode($data);

  }


  function ContactUsContent(){

    $data['ContactUsData'] = $this->Cms_model->GET_ContactUsData()->contentText;

    echo json_encode($data);

  }


  function UpdateAboutUs(){

    $insertData = array(
      'contentText' => $this->input->post('AboutUsContent'),
      'dateModified' => date("Y-m-d h:i:sa"),
      'ModifiedBy' => $this->Accounts_model->get_session_data('UserID')
    );

    $this->Cms_model->UPDATE_AboutUs($insertData);

    $data['msg'] = 'Successfully Updated About Us Section!';

    echo json_encode($data);

  }


  function UpdateContactUs(){

    $insertData = array(
      'contentText' => $this->input->post('ContactUsContent'),
      'dateModified' => date("Y-m-d h:i:sa"),
      'ModifiedBy' => $this->Accounts_model->get_session_data('UserID')
    );

    $this->Cms_model->UPDATE_ContactUs($insertData);

    $data['msg'] = 'Successfully Updated Contact Us Section!';

    echo json_encode($data);

  }





  function PrivacyContent(){

    $data['PrivacyData'] = $this->Cms_model->GET_privacyData()->contentText;

    echo json_encode($data);
  }



  function UpdatePrivacyStatement(){

    $insertData = array(
      'contentText' => $this->input->post('PrivacyContent'),
      'dateModified' => date("Y-m-d h:i:sa"),
      'ModifiedBy' => $this->Accounts_model->get_session_data('UserID')
    );

    $this->Cms_model->UPDATE_Privacy($insertData);

    $data['msg'] = 'Successfully Updated Contact Us Section!';

    echo json_encode($data);

  }



  //irrelevant words


  function SearchOptimization(){

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


    $data['IrrelevantWordsList'] = $this->Cms_model->GET_irrWrdList();

    $this->load->template('CMS/SearchOptimization', $data, $page);

  }


  function irrWordsList(){
    $data['data'] = $this->Cms_model->GET_irrWrdList();
    echo json_encode($data);
  }


  function addWordFilter(){
    $newWordFilter = $this->input->post('WordFilter');

    $dataWord = array(
      'irrWord' => $newWordFilter
    );

    $this->Cms_model->INSERT_irrWord($dataWord);

    $data['msg'] = 'Success';

    echo json_encode($data);

  }


  function DelIrrWrd(){
    $irrID = $this->input->post('irrID');

    $this->Cms_model->DELETE_irrWord($irrID);

    $data['msg'] = 'Success';

    echo json_encode($data);
  }



}?>
