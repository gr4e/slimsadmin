<?php class Inventory_model extends CI_Model{

  function GET_invStackList($UserID){
    $query = $this->db->query("SELECT a.InvID, a.CirculationNumber, a.HoldingsID, b.Title, a.UserID, a.InvDate, a.invStatus
      FROM  invstack a
      LEFT JOIN tblindices b
      ON a.HoldingsID = b.HoldingsID
      WHERE UserID = '".$UserID."'");

      return $query->result();
    }


function INSERT_invStck($invStckData){
      $this->db->insert('invstack', $invStckData);
      return;
    }

function GET_matDetails($circNo){
      $query = $this->db->query("SELECT HoldingsID, CirculationNumber FROM tblholdingscopy WHERE CirculationNumber = '".$circNo."' LIMIT 1");
      return $query->row();
    }


function BOOL_ifExistInvStck($circNo){
      $query = $this->db->query("SELECT InvID FROM invstack WHERE CirculationNumber = '".$circNo."' LIMIT 1");

      return $query->num_rows();


    }


function INSERT_inventorytbl($invComData){
      $this->db->insert('tblinventory', $invComData);
      return;
    }

function UPDATE_invStatus($CirculationNumber){
      $this->db->query("UPDATE tblholdingscopy SET InventoryStatus = '1' WHERE CirculationNumber = '".$CirculationNumber."'");
      return;
    }

function GET_InvStckDetails($circNo){
      $query = $this->db->query("SELECT a.InvID, a.CirculationNumber, a.HoldingsID, b.Title, a.UserID, a.invStatus, a.InvDate
        FROM  invstack a
        LEFT JOIN tblindices b
        ON a.HoldingsID = b.HoldingsID
        WHERE CirculationNumber = '".$circNo."' LIMIT 1");

        return $query->row();
      }


function DELETE_CirInvStck($circNo){
        $this->db->where('CirculationNumber', $circNo);
        $this->db->delete('invstack');
        return;
      }


function UPDATE_invStatusRow($invStatus){
  $query = $this->db->query("UPDATE invstack SET invStatus = '".$invStatus['statusChange2']."' WHERE CirculationNumber = '".$invStatus['CirculationNumber']."'");
  return;

}



    }
