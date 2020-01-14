<?php class Dashboard_model extends CI_Model{

  function GET_OverAlltotalTitles(){
    $query = $this->db->query("SELECT HoldingsID FROM tblholdings");
    return $query->num_rows();
  }


  function GET_OverAlltotalCopies(){
    $query = $this->db->query("SELECT HoldingsID FROM tblholdingscopy");
    return $query->num_rows();
  }


  function GET_totalTitles($MatID){
    $query = $this->db->query("SELECT HoldingsID FROM tblholdings WHERE MaterialTypeID = '".$MatID."'");
    return $query->num_rows();
  }

  function GET_totalCopies($MatID){
    $query = $this->db->query("SELECT a.HoldingsID FROM tblholdingscopy a LEFT JOIN tblholdings b ON a.HoldingsID = b.HoldingsID WHERE b.MaterialTypeID = '".$MatID."'");
    return $query->num_rows();
  }



  function GET_MostSearchWord(){
    $query = $this->db->query("SELECT SrchdWord, COUNT(SrchdWord) as counting FROM searchedwords WHERE SrchdWord NOT IN (SELECT irrWord FROM irrlvntwords) GROUP BY SrchdWord ORDER BY counting DESC LIMIT 1");
    return $query->row();
  }


  function GET_mostDowloadedFile(){
    $query = $this->db->query("SELECT HoldingsID, FileName, COUNT(FileName) as counting FROM stat_dwnldcount GROUP BY FileName, HoldingsID ORDER BY counting DESC LIMIT 1");
    return $query->row();
  }


  function GET_TotalRegisteredPatron(){
    $query = $this->db->query("SELECT UserID FROM users");
    return $query->num_rows();
  }


function GET_uniqueGuest2Day(){
  $query = $this->db->query("SELECT DISTINCT(ip_address) FROM audit_trail_patron WHERE ActionDate BETWEEN (SELECT CURDATE()) AND (SELECT CURDATE()+1)");
  return $query->num_rows();
}


}
