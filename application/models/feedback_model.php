<?php
class feedback_model extends CI_Model
{

  function GET_feedbackData(){
    $query = $this->db->query("SELECT fbID, q1, q2, q3, q4, q5, optionalTxt, fbBy, FullName, email, contactNo, Gender, birthdate, fbDate FROM feedback");
    return $query->result();
  }


  function GET_q1_score(){
    $query = $this->db->query("SELECT AVG(q1) as score FROM feedback");
    return $query->row();
  }

  function GET_q2_score(){
    $query = $this->db->query("SELECT AVG(q2) as score FROM feedback");
    return $query->row();
  }

  function GET_q3_score(){
    $query = $this->db->query("SELECT AVG(q3) as score FROM feedback");
    return $query->row();
  }

  function GET_q4_score(){
    $query = $this->db->query("SELECT AVG(q4) as score FROM feedback");
    return $query->row();
  }

  function GET_q5_score(){
    $query = $this->db->query("SELECT AVG(q5) as score FROM feedback");
    return $query->row();
  }


  function GET_rateOf($columnNme){
    $query = $this->db->query("SELECT ".$columnNme." FROM feedback");
    return $query->result();
  }


} ?>
