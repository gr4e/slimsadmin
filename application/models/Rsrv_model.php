<?php
class Rsrv_model extends CI_Model
{


  function GET_rsrvtnList($limit, $start){
    $query = $this->db->query("SELECT a.rsrvID, b.FullName, a.rsrvDate FROM reserve a LEFT JOIN users b ON a.UserID = b.UserID WHERE a.servedStatus = '0' GROUP BY rsrvID ORDER BY a.rsrvID DESC LIMIT ".$start.", ".$limit." ");
    return $query->result();
  }

  function GET_rsrvtnList_count(){
    $query = $this->db->query("SELECT rsrvID FROM reserve WHERE servedStatus = '0' GROUP BY rsrvID");
    return $query->num_rows();
  }



  function GET_rsrvtnStackList($rsrvtnID){
    $query = $this->db->query("SELECT a.rsrvID, a.HoldingsID, b.Title, a.UserID
      FROM reserve a LEFT JOIN tblindices b ON a.HoldingsID = b.HoldingsID
      WHERE rsrvID = '".$rsrvtnID."' AND a.servedStatus = '0' GROUP BY a.HoldingsID");
      return $query->result();
    }

    function GET_HoldingsCopies_Circulation($HoldingsID){
      $query = $this->db->query("SELECT b.CirculationNumber FROM reserve a LEFT JOIN tblholdingscopy b ON a.HoldingsID = b.HoldingsID WHERE a.HoldingsID = '".$HoldingsID."' AND b.isOut ='0' GROUP BY b.CirculationNumber");
      return $query->result();

    }

    function GET_stackListCopies(){
      $query = $this->db->query("SELECT a.HoldingsID, b.CirculationNumber FROM reserve a LEFT JOIN tblholdingscopy b ON a.HoldingsID = b.HoldingsID");
    }



    function INSERT_bwrdMat($UserIDLb, $UserIDPt, $matHdAarray, $matCpArray, $rsrvID){
      $this->db->query("INSERT INTO brwdheader (UserIDLb, UserIDPt) VALUES ($UserIDLb, $UserIDPt) ");

      $que = $this->db->query("SELECT brwdIDHeader FROM brwdheader ORDER BY brwdIDHeader DESC LIMIT 1");

      $brwdIDHeader = $que->result();
      $brwdIDHeaderX = $brwdIDHeader[0]->brwdIDHeader;

      for ($i=0; $i < count($matHdAarray) ; $i++) {
        $this->db->query("INSERT INTO brwddetail (brwdIDHeader, HoldingsID, CirculationNumber) VALUES ($brwdIDHeaderX, '".$matHdAarray[$i]."' , '".$matCpArray[$i]."') ");
        $this->db->query("UPDATE tblholdingscopy SET isOut = '1' WHERE CirculationNumber = '".$matCpArray[$i]."' ");
      }

      $this->db->query("UPDATE reserve SET servedStatus = '1' WHERE rsrvID = '".$rsrvID."'");

    }


    //Returns


    function GET_returnmat_count(){
      $query = $this->db->query("SELECT brwdIDHeader FROM brwdheader WHERE returnedAll='0'");
      return $query->num_rows();
    }

    function GET_returnmat($limit, $start){
      $query = $this->db->query("SELECT a.brwdIDHeader, b.FullName, c.LibrarianName, a.brwdDate FROM brwdheader a
        LEFT JOIN users b ON a.UserIDPt = b.UserID
        LEFT JOIN tbllibrarian_profile c ON a.UserIDLb = c.LibrarianID WHERE a.returnedAll='0' LIMIT ".$start.", ".$limit." ");
        return $query->result();
      }


      function returnList($brwdID){
        $query = $this->db->query("SELECT a.brwdIDHeader, a.HoldingsID, a.CirculationNumber, b.Title FROM brwddetail a
          LEFT JOIN tblindices b ON a.HoldingsID = b.HoldingsID
          WHERE a.brwdIDHeader='".$brwdID."' AND returnStatus ='0'");
          return $query->result();
        }


        function UPDATE_returnMaterial($matArrWhere, $brwdID, $UserID){
          $dateTimeNow = date('Y-m-d H:i:s');
          $this->db->query("UPDATE brwddetail SET returnStatus ='1', returnDate = '".$dateTimeNow."', receivedBy ='".$UserID."' ".$matArrWhere." ");
          $this->db->query("UPDATE tblholdingscopy SET isOUt = 0 ".$matArrWhere);
          $query = $this->db->query("SELECT brwdIDDetail FROM brwddetail WHERE brwdIDHeader = '".$brwdID."' AND returnStatus='0'");

          return $query->num_rows();

        }


        function UPDATE_brwdHdReturnStat($brwdID){
            $this->db->query("UPDATE brwdheader SET returnedAll = '1' WHERE brwdIDHeader = '".$brwdID."'");
          return;
        }




      }//end of class
      ?>
