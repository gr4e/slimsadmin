<?php
class Feedback_model extends CI_Model
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
    $query = $this->db->query("SELECT
      (SELECT COUNT(".$columnNme.") FROM feedback WHERE ".$columnNme." = '1')  as s1,
      (SELECT COUNT(".$columnNme.") FROM feedback WHERE ".$columnNme." = '2')  as s2,
      (SELECT COUNT(".$columnNme.") FROM feedback WHERE ".$columnNme." = '3')  as s3,
      (SELECT COUNT(".$columnNme.") FROM feedback WHERE ".$columnNme." = '4')  as s4,
      (SELECT COUNT(".$columnNme.") FROM feedback WHERE ".$columnNme." = '5')  as s5");
      return $query->row();
    }



    function GET_optionalTxts(){
      $query = $this->db->query("SELECT feedback.fbID, feedback.optionalTxt, feedback.fbBy, users.FullName AS patronName, feedback.FullName, feedback.fbDate FROM  feedback
        LEFT JOIN users
        ON feedback.fbBy = users.UserID
        WHERE optionalTxt <> '' ORDER BY feedback.fbID DESC");
        return $query->result();
      }

      function GET_optionalTxtsDetails($fbID){
        $query = $this->db->query("SELECT feedback.fbID, feedback.optionalTxt, feedback.fbBy, users.FullName AS patronName, feedback.FullName, feedback.fbDate,
          feedback.email, feedback.contactNo, users.Email AS patronEmail, users.contactNo AS patronContactNo
          FROM  feedback
          LEFT JOIN users
          ON feedback.fbBy = users.UserID WHERE feedback.fbID = '".$fbID."'");

          return $query->row();

        }


        function GET_totalFeedbackCount(){
          $query = $this->db->query("SELECT fbID FROM feedback");
          return $query->num_rows();
        }


        function GET_ratingsTab(){
          $query = $this->db->query("SELECT (SELECT COUNT(q1) FROM `feedback` WHERE q1 = '1' GROUP BY q1) as s1q1,
          (SELECT COUNT(q1) FROM `feedback` WHERE q1 = '2' GROUP BY q1) as s2q1,
          (SELECT COUNT(q1) FROM `feedback` WHERE q1 = '3' GROUP BY q1) as s3q1,
          (SELECT COUNT(q1) FROM `feedback` WHERE q1 = '4' GROUP BY q1) as s4q1,
          (SELECT COUNT(q1) FROM `feedback` WHERE q1 = '5' GROUP BY q1) as s5q1,

          (SELECT COUNT(q2) FROM `feedback` WHERE q2 = '1' GROUP BY q2) as s1q2,
          (SELECT COUNT(q2) FROM `feedback` WHERE q2 = '2' GROUP BY q2) as s2q2,
          (SELECT COUNT(q2) FROM `feedback` WHERE q2 = '3' GROUP BY q2) as s3q2,
          (SELECT COUNT(q2) FROM `feedback` WHERE q2 = '4' GROUP BY q2) as s4q2,
          (SELECT COUNT(q2) FROM `feedback` WHERE q2 = '5' GROUP BY q2) as s5q2,

          (SELECT COUNT(q3) FROM `feedback` WHERE q3 = '1' GROUP BY q3) as s1q3,
          (SELECT COUNT(q3) FROM `feedback` WHERE q3 = '2' GROUP BY q3) as s2q3,
          (SELECT COUNT(q3) FROM `feedback` WHERE q3 = '3' GROUP BY q3) as s3q3,
          (SELECT COUNT(q3) FROM `feedback` WHERE q3 = '4' GROUP BY q3) as s4q3,
          (SELECT COUNT(q3) FROM `feedback` WHERE q3 = '5' GROUP BY q3) as s5q3,

          (SELECT COUNT(q4) FROM `feedback` WHERE q4 = '1' GROUP BY q4) as s1q4,
          (SELECT COUNT(q4) FROM `feedback` WHERE q4 = '2' GROUP BY q4) as s2q4,
          (SELECT COUNT(q4) FROM `feedback` WHERE q4 = '3' GROUP BY q4) as s3q4,
          (SELECT COUNT(q4) FROM `feedback` WHERE q4 = '4' GROUP BY q4) as s4q4,
          (SELECT COUNT(q4) FROM `feedback` WHERE q4 = '5' GROUP BY q4) as s5q4");
          return $query->row();
        }

      } ?>
