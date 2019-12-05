<?php
class IndexMon_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  function GET_GenInqMonIndx($userID){
    $query = $this->db->query("SELECT a.mntrIndexID, a.subID, a.mntrStrDate, a.mntrEndDate, a.isDone, b.Subject, b.Inquiry, b.DateofInquiry, b.InquiredBy  FROM monitorindex a
      LEFT JOIN askalib b
      ON a.subID = b.subAalID
      WHERE b.isDeleted <> '1' AND b.isClosed <> '1' AND a.isDone <> '1' AND a.UserID = '".$userID."'");
      return $query->result();
    }



    function GET_genInqDetails($aalID){
      $query = $this->db->query("SELECT aalID, subAalID, Subject, Inquiry, DateofInquiry, InquiredBy FROM askalib WHERE subAalID = '".$aalID."'");
      return $query->row();
    }

    function GET_geInqPinned($aalID){
      $query = $this->db->query("SELECT id, subAalID, overRideTitle, pinnedDate FROM askalib_pin WHERE subAalID = '".$aalID."'");
      return $query->row();
    }


    function GET_GenInqReplies($aalID){
      $query = $this->db->query("SELECT a.aalReplyID, a.subAalID, a.Reply, b.LibrarianName , a.dateReply, a.isPatron FROM askalib_reply a
        LEFT JOIN tbllibrarian_profile b
        ON a.repliedBy = b.LibrarianID
        WHERE a.subAalID = '".$aalID."' ORDER BY a.dateReply DESC LIMIT 10");
        return $query->result();
      }


      function INSERT_pinPost($pinData){
        $this->db->insert('askalib_pin', $pinData);
        return;
      }


      function DELETE_unPinPost($subAalID){
        $this->db->where('subAalID', $subAalID);
        $this->db->delete('askalib_pin');
        return;
      }



    }
