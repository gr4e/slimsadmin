<?php
class Cms_model extends CI_Model
{


  function isExistServerIP(){
    $query = $this->db->query("SELECT CurrentServeIP FROM server_settings WHERE CurrentServeIP <> 0");
    if($query->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  function INSERT_serverIP($serverIP){
    $this->db->insert('server_settings', $serverIP);
    return;
  }


  function GET_newsList(){
    $query = $this->db->query("SELECT newsID, SubjectTitle, content, dateCreated, dateModified FROM opacnews ORDER BY dateModified DESC");
    return $query->result();
  }



  function INSERT_newNews($insertData){

    $this->db->insert('opacnews', $insertData);
    return;
  }


  function DELETE_news($id){
    $this->db->query("DELETE FROM opacnews WHERE newsID='".$id."'");
  }

  function GET_specificNews($id){

    $query = $this->db->query("SELECT newsID, SubjectTitle, content, dateCreated FROM opacnews WHERE newsID = '".$id."'");
    return $query->result();

  }

  function UPDATE_news($newsID, $SubjectTitle, $content, $dateMod){
    $this->db->query("UPDATE opacnews SET SubjectTitle = '".$SubjectTitle."', content = '".$content."', dateModified = '".$dateMod."' WHERE newsID = '".$newsID."'");
    return;
  }


  function INSERT_imgGallery($insertData){
    $this->db->insert('news_gallery', $insertData);
    return;
  }


  function GET_galleryImages(){

    $query = $this->db->query("SELECT imgFileID, imgFileName, imgFilePath FROM news_gallery ORDER BY imgFileID DESC");
    return $query->result();

  }

  function GET_enlargeImg($imgID){

    $query = $this->db->query("SELECT imgFileID, imgFileName, imgFilePath FROM news_gallery WHERE imgFileID = '".$imgID."'");

    return $query->result();
  }


  function DELETE_galleryImage($imgID){
    $this->db->query("DELETE FROM news_gallery WHERE imgFileID = '".$imgID."'");
    return;
  }


  //=============== ASK A LIBRARIAN ===========================

  function GET_AALlist(){
    $query = $this->db->get('askalib');
    return $query->result();
  }

  function GET_askAlibDetail($aalID){
    $query = $this->db->query("SELECT a.aalID, a.subAalID, a.Subject, a.Inquiry, a.DateofInquiry, b.FullName, a.Monitored
      FROM askalib a
      LEFT JOIN users b
      ON a.InquiredBy = b.Username
      WHERE a.subAalID = '" . $aalID . "'");

      return $query->row();
    }


    function GET_askAlibReplies($aalID){
      $query = $this->db->query("SELECT aalReplyID, subAalID, Reply, dateReply, isPatron,
        IF(isPatron = 0, (SELECT LibrarianName FROM tbllibrarian_profile WHERE repliedBy = LibrarianID), (SELECT FullName FROM users WHERE repliedBy = UserID) ) as replyBy
        FROM askalib_reply
        WHERE subAalID = '" . $aalID ."'");
        return $query->result();
      }

      function GET_isItPinned($aalID){
        $query = $this->db->query("SELECT ID FROM askalib_pin WHERE subAalID = '".$aalID."'");
        if($query->num_rows() > 0){
          return true;
        }else{
          return false;
        }
      }

      function COUNT_pinnedAAL(){
        $query = $this->db->get('askalib_pin');
        return $query->num_rows();
      }


      function INSERT_pinAAL($pinData){
        $this->db->insert('askalib_pin', $pinData);
        return;
      }


      function DELETE_unPinAAL($subAalID){
        $this->db->where('subAalID', $subAalID);
        $this->db->delete('askalib_pin');
        return;
      }


      function GET_pinnedList(){
        $query = $this->db->query("SELECT a.subAalID, b.Subject, c.FullName, b.Inquiry, b.DateofInquiry, a.pinnedDate, b.isDeleted FROM askalib_pin a
          LEFT JOIN askalib b
          ON a.subAalID = b.subAalID
          LEFT JOIN users c
          ON c.Username = b.InquiredBy");

          return $query->result();
        }


        function GET_specificInquiry($subID){
          $query = $this->db->query("SELECT a.aalID, a.subAalID, a.Subject, a.Inquiry, a.DateofInquiry, b.FullName, a.isDeleted FROM askalib a LEFT JOIN users b ON a.InquiredBy = b.Username WHERE a.subAalID = '".$subID."'");
          return $query->row();

        }

        function GET_aalReply($aalID){
          $query = $this->db->query("SELECT aalReplyID, aalID, Reply, repliedBy, dateReply FROM askalib_reply WHERE aalID = '".$aalID."'");
          return $query->result();
        }

        function INSERT_aalReplyInq($replyData){
          $this->db->insert('askalib_reply', $replyData);
          return;
        }


        function GET_topicList(){
          $query = $this->db->query("SELECT BroadClassID, BroadClass FROM tblbroadclass ORDER BY BroadClass");

          return $query->result();
        }

        function GET_carouselList(){
          $query = $this->db->query("SELECT HoldingsID FROM carousel_data");

          return $query->result();
        }

        function INSERT_broadClass($dataTopic){
          $this->db->insert('tblbroadclass', $dataTopic);
          return;
        }


        function DELETE_broadClass($id){
          $this->db->where('BroadClassID', $id);
          $this->db->delete('tblbroadclass');
          return;
        }

        //server SETTINGS

        function GET_serverSettings(){
          $query = $this->db->query("SELECT CurrentServeIP, PublicIP FROM server_settings WHERE ID = '1'");
          return $query->row();
        }

        function UPDATE_serverSettings($CurrentServeIP, $PublicIP){
          $this->db->query("UPDATE server_settings SET CurrentServeIP = '".$CurrentServeIP."', PublicIP = '".$PublicIP."' WHERE ID = '1'");
          return;
        }


        function UPDATE_banner_path($file_path){
          $query = $this->db->query("UPDATE server_settings SET banner_path = '".$file_path."' WHERE id='1'");
          return;
        }


        //carousel data update

        function UPDATE_caroData($caroData, $id){
          $this->db->query("UPDATE carousel_data SET HoldingsID = '".$caroData."' WHERE caroID = '".$id."'");
          return;
        }


        function GET_AboutUsData(){
          $query = $this->db->query("SELECT contentText, dateModified, ModifiedBy FROM cms WHERE id = '1' LIMIT 1");
          return $query->row();
        }

        function GET_ContactUsData(){
          $query = $this->db->query("SELECT contentText, dateModified, ModifiedBy FROM cms WHERE id = '2' LIMIT 1");
          return $query->row();
        }

        function GET_privacyData(){
          $query = $this->db->query("SELECT contentText, dateModified, ModifiedBy FROM cms WHERE id = '3' LIMIT 1");
          return $query->row();
        }


        function UPDATE_AboutUs($insertData){
          $this->db->query("UPDATE cms SET contentText = '".$insertData['contentText']."', dateModified = '".$insertData['dateModified']."', ModifiedBy = '".$insertData['ModifiedBy']."'  WHERE id = '1'");
          return;
        }


        function UPDATE_ContactUs($insertData){
          $this->db->query("UPDATE cms SET contentText = '".$insertData['contentText']."', dateModified = '".$insertData['dateModified']."', ModifiedBy = '".$insertData['ModifiedBy']."'  WHERE id = '2'");
          return;
        }


        function UPDATE_Privacy($insertData){
          $this->db->query("UPDATE cms SET contentText = '".$insertData['contentText']."', dateModified = '".$insertData['dateModified']."', ModifiedBy = '".$insertData['ModifiedBy']."'  WHERE id = '3'");
          return;
        }



      }?>
