<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CatalogExport_model extends CI_Model{



  function GET_CatalogList(){
    $query = $this->db->query("SELECT HoldingsID,

      CASE WHEN TitleStatement LIKE '%\$a%' THEN (CASE
        WHEN TitleStatement LIKE '%\$b%'
        OR TitleStatement LIKE '%\$c%' THEN SUBSTRING_INDEX((SUBSTRING_INDEX(TitleStatement,'\$a',-1)),'$',1)
        ELSE SUBSTRING_INDEX(TitleStatement,'\$a',-1) END) ELSE '' END AS Title
        FROM tblholdings");
        return $query->result();
      }


      function GET_MatDetails($HoldingsID){
        $query = $this->db->query("SELECT a.HoldingsID, a.MaterialTypeID, a.CatalogNumber, a.CatalogDate, a.CatalogSource, a.ISBN,
          a.ISSN, a.CallNumber, a.TitleStatement, a.PhysicalDescriptionEtc, a.Edition, c.AuthorName FROM tblholdings a
          LEFT JOIN tblmaterials b
          ON a.MaterialTypeID = b.MaterialTypeID
          LEFT JOIN tblauthors c
          ON a.HoldingsID = c.HoldingsID
          WHERE a.HoldingsID = '".$HoldingsID."'");

          return $query->row();
        }



        function INSERT_ImportCatalog($data2Insert){
          $this->db->insert('tmpholdings', $data2Insert);
          return;
        }


        function ifExistHoldings($data2Insert){
          $query = $this->db->query("SELECT HoldingsID FROM tmpholdings WHERE HoldingsID = '".$data2Insert['HoldingsID']."' ");

          if ($query->num_rows() > 0) {
            return true;
          } else {
            return false;
          }


        }



      }?>
