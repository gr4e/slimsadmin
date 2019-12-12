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




      function GET_suggestionList($userID){
        $query = $this->db->query("SELECT a.sabID, a.subSabID, a.Subject, a.Title, a.Author, a.Publisher, a.About, a.SuggestedBy, b.FullName, a.SuggestedDate, a.Monitored, a.isAcquired, a.DateTagAcquired, a.statusChngdBy, a.isDeleted
          FROM suggest a
          LEFT JOIN users b
          ON a.SuggestedBy = b.Username
          WHERE a.isDeleted <> '1' AND a.isAcquired <> '1' AND a.subSabID IN (SELECT subID FROM monitorindex WHERE UserID = '".$userID."')
          ORDER BY a.SuggestedDate DESC");
          return $query->result();
        }

        function GET_sugDetails($sabID){
          $query = $this->db->query("SELECT a.subSabID, a.Subject, a.Title, a.Author, a.Publisher, a.About, b.FullName, a.SuggestedDate, (SELECT COUNT(suID) FROM suggest_upvote WHERE suggest_upvote.subSabID = a.subSabID) as upvotes
          FROM suggest a
          LEFT JOIN users b
          ON a.SuggestedBy = b.Username
          WHERE a.subSabID = '".$sabID."'");

          return $query->row();
        }

        function UPDATE_availableStatusSuggestMat($sabID){
          $this->db->query("UPDATE suggest SET isAcquired = '1' WHERE subSabID = '".$sabID."'");
          return;
        }

        function UPDATE_deleteStatusSuggestMat($sabID){
          $this->db->query("UPDATE suggest SET isDeleted = '1' WHERE subSabID = '".$sabID."'");
          return;
        }


      }
