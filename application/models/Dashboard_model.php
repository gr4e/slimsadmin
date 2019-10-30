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





}
