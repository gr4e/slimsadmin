<?php
class Patron_model extends CI_Model
{


function UPDATE_patronAccountDelete($patronID){
  $this->db->query("UPDATE users SET isDeleted = '1' WHERE UserID = '".$patronID."'");
  return;
}

}
