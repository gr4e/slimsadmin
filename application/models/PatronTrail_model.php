<?php
class Patrontrail_model extends CI_Model{


  function GET_PatronTrailList($dateFrom, $dateTo){
    $query = $this->db->query("SELECT a.TrailPtrnID, a.UserID, b.FullName, a.ip_address, a.Action, a.searched4, a.ActionDate
      FROM audit_trail_patron a
      LEFT JOIN users b
      ON a.UserID = b.UserID
      WHERE a.ActionDate BETWEEN '".$dateFrom."' AND '".$dateTo."'");
      
      return $query->result();
    }


  }
