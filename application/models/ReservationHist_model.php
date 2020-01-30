<?php
class ReservationHist_model extends CI_Model
{



  function GET_reservationHistory($dateFrom, $dateTo){
    $query = $this->db->query("SELECT a.ID, a.rsrvID, c.FullName, a.HoldingsID, b.Title, a.rsrvDate, a.servedStatus, e.LibrarianName
      FROM reserve a
      LEFT JOIN tblindices b
      ON a.HoldingsID = b.HoldingsID
      LEFT JOIN users c
      ON a.UserID = c.UserID
      LEFT JOIN tblusers d
      ON d.UserID = a.servedBy
      LEFT JOIN tbllibrarian_profile e
      ON e.LibrarianID = d.UserID
      WHERE a.rsrvDate BETWEEN '".$dateFrom."' AND '".$dateTo."'");

      return $query->result();
    }


  } //end of model
