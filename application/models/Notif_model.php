<?php
class Notif_model extends CI_Model{


  function get_pvtMessages($user){

    $query = $this->db->query(
      "SELECT a.threadID, a.Subject, d.FullName, b.readStatus FROM pvtmsgheader a
      LEFT JOIN pvtmsgdetail b ON a.threadID = b.threadID
      LEFT JOIN tblusers c ON a.UserIDLb = c.UserID
      LEFT JOIN users d ON a.UserIDPt = d.UserID
      WHERE c.UserName = '".$user."'
      GROUP BY a.threadID
      ORDER BY b.msgDate DESC
      ");

      return $query->result();

    }


    function get_pvtMessages_notif($user){

      $query = $this->db->query(
        "SELECT a.threadID, b.msgID, a.Subject, b.msgTxt, d.FullName, c.UserName, b.msgDate, b.readStatus FROM pvtmsgheader a
        LEFT JOIN pvtmsgdetail b ON a.threadID = b.threadID
        LEFT JOIN tblusers c ON a.UserIDLb = c.UserID
        LEFT JOIN users d ON a.UserIDPt = d.UserID
        WHERE c.UserName = '".$user."'
        ORDER BY b.msgDate DESC
        ");

        return $query->result();

      }



      function GET_lastPvtMsgID($userSender){
        $query = $this->db->query("SELECT pvtDetailID FROM pvtmsg_detail WHERE pvtFrom = '".$userSender."' ORDER BY pvtDetailID DESC LIMIT 1");

        return $query->result();
      }


      function UPDATE_lastPvtMsgID($msgDetailID,$pvtID){
        $this->db->query("UPDATE pvtmsg_header SET LastMsgIDReceiver = '".$msgDetailID."' WHERE pvtID = '".$pvtID."'");
        return;
      }




      function GET_pvtSpecMsg($threadID, $user){

        $query = $this->db->query("SELECT a.threadID, b.msgID, a.Subject, b.msgTxt, d.FullName, b.msgFrom, c.UserName, b.msgDate, b.readStatus FROM pvtmsgheader a
          LEFT JOIN pvtmsgdetail b ON a.threadID = b.threadID
          LEFT JOIN tblusers c ON a.UserIDLb = c.UserID
          LEFT JOIN users d ON a.UserIDPt = d.UserID
          WHERE c.UserName = '".$user."' AND a.threadID = '".$threadID."'
          ORDER BY b.msgDate
          ");
          return $query->result();

        }


        function UPDATE_ReadStatus($id){

          $this->db->query("UPDATE pvtmsg_detail SET readStatus = '1' WHERE pvtDetailID = '".$id."'");
          return;

        }

        function GET_pvtFromMsg($ID){
          $query = $this->db->query("SELECT pvtFrom FROM pvtmsg_detail WHERE pvtID = '". $ID ."' LIMIT 1 ");
          return $query->result();
        }


        function get_pvtNotif_count(){
          $query = $this->db->query("SELECT pvtID FROM pvtmsg_header WHERE ReadStatus = 0");
          return $query->num_rows();
        }//end of query get_pvtNotif_count


        function INSERT_pvtMsg_reply($data){
          $this->db->insert('pvtmsgdetail', $data);
          return;
        }



        function GET_monitorIndex($userID){
          $query = $this->db->query("SELECT a.mntrIndexID, a.UserID, a.subID, a.mntrStrDate, a.mntrEndDate,

            (SELECT mntrName FROM mntrtypes WHERE a.mntrType = mntrType) as mntrType,
            (CASE
              WHEN a.mntrType = 1 THEN (SELECT Title FROM suggest WHERE a.subID = subSabID)
              WHEN a.mntrType = 2 THEN (SELECT Subject FROM askalib WHERE a.subID = subAalID)
              WHEN a.mntrType = 3 THEN (SELECT tblindices.Title FROM inqcat LEFT JOIN tblindices ON inqcat.HoldingsID = tblindices.HoldingsID WHERE a.subID = inqcat.CatInqID)
              END) as Title,

              (CASE
                WHEN a.mntrType = 1 THEN (SELECT users.FullName FROM suggest LEFT JOIN users ON suggest.SuggestedBy = users.UserID WHERE suggest.subSabID = a.subID)
                WHEN a.mntrType = 2 THEN (SELECT users.FullName FROM askalib LEFT JOIN users ON askalib.InquiredBy = users.UserID WHERE askalib.subAalID = a.subID)
                WHEN a.mntrType = 3 THEN (SELECT users.FullName FROM inqcat LEFT JOIN users ON inqcat.inqCatBy = users.UserID WHERE inqcat.CatInqID = a.subID)
                END) as ByName,


                b.isAcquired
                FROM monitorindex a
                LEFT JOIN suggest b
                ON a.subID = b.subSabID
                WHERE UserID = '".$userID."' AND a.isDone = '0'
                ORDER BY a.mntrIndexID DESC");
                return $query->result();
              }


              function GET_subID($mntrID){
                $query = $this->db->query("SELECT mntrType FROM monitorindex WHERE mntrIndexID = '".$mntrID."'");
                return $query->result();
              }



              function GET_otherNotif_count(){
                $aalCount = $this->db->query("SELECT aalID FROM askalib WHERE Monitored = 0");
                $aal = $aalCount->num_rows();
                $sabCount = $this->db->query("SELECT sabID FROM suggest WHERE Monitored = 0");
                $sab = $sabCount->num_rows();
                $ciCount = $this->db->query("SELECT inqCatID FROM inqcat WHERE Monitored = 0");
                $ctl = $ciCount->num_rows();
                return $aal+$sab+$ctl;
              }

              function GET_aalCount(){
                $query = $this->db->query("SELECT aalID FROM askalib WHERE Monitored = 0");
                return $query->num_rows();
              }

              function GET_sabCount(){
                $query = $this->db->query("SELECT sabID FROM suggest WHERE Monitored = 0");
                return $query->num_rows();
              }

              function GET_ciCount(){
                $query = $this->db->query("SELECT inqCatID FROM inqcat WHERE Monitored = 0");
                return $query->num_rows();
              }


              function GET_catInqNotif(){
                $query = $this->db->query("SELECT a.inqCatID, a.CatInqID, a.HoldingsID, b.Title, c.FullName, a.inqCatDate FROM inqcat a
                  LEFT JOIN tblindices b ON a.HoldingsID = b.HoldingsID
                  LEFT JOIN users c ON a.inqCatBy = c.UserID WHERE a.Monitored = 0");
                  return $query->result();
                }


                function GET_askALibNotif(){
                  $query = $this->db->query("SELECT a.aalID, a.subAalID, a.Subject, a.Inquiry, a.DateofInquiry, b.FullName, a.Monitored
                    FROM askalib a
                    LEFT JOIN users b
                    ON a.InquiredBy = b.Username
                    WHERE a.Monitored = 0
                    ORDER BY a.DateofInquiry DESC");
                    return $query->result();
                  }


                  function GET_askAlibDetail($aalID){
                    $query = $this->db->query("SELECT a.aalID, a.subAalID, a.Subject, a.Inquiry, a.DateofInquiry, b.FullName, a.Monitored
                      FROM askalib a
                      LEFT JOIN users b
                      ON a.InquiredBy = b.Username
                      WHERE a.subAalID = '" . $aalID . "'");

                      return $query->row();
                    }


                    function GET_askAlibReplies($aalID){
                      $query = $this->db->query("SELECT aalReplyID, subAalID, Reply, dateReply, isPatron,
                        IF(isPatron = 0, (SELECT LibrarianName FROM tbllibrarian_profile WHERE repliedBy = LibrarianID), (SELECT FullName FROM users WHERE repliedBy = UserID) ) as replyBy
                        FROM askalib_reply
                        WHERE subAalID = '" . $aalID ."'");
                        return $query->result();
                      }

                      function GET_suggestNotif(){
                        $query = $this->db->query("SELECT a.sabID, a.subSabID, a.Title, b.FullName, a.SuggestedDate
                          FROM suggest a
                          LEFT JOIN users b
                          ON a.SuggestedBy = b.Username
                          WHERE a.Monitored = 0
                          ORDER BY a.SuggestedDate DESC");
                          return $query->result();
                        }


                        function UPDATE_clsGenInq($subAalID){
                          $this->db->query("UPDATE monitorindex SET isDone = '1' WHERE subID='".$subAalID."'");
                          return;
                        }



                        function INSERT_monitor_SAB($monitorData){
                          $this->db->insert('monitorindex', $monitorData);
                          $this->db->query("UPDATE suggest SET Monitored = 1 WHERE subSabID = '".$monitorData['subID']."'");
                          return;
                        }


                        function INSERT_monitor_AAL($monitorData){
                          $this->db->insert('monitorindex', $monitorData);
                          $this->db->query("UPDATE askalib SET Monitored = 1 WHERE subAalID = '".$monitorData['subID']."'");
                          return;
                        }

                        function INSERT_monitor_CAT($monitorData){
                          $this->db->insert('monitorindex', $monitorData);
                          $this->db->query("UPDATE inqcat SET Monitored = 1 WHERE catInqID = '".$monitorData['subID']."'");
                          return;
                        }


                        function INSERT_GenInqReply($replyData){
                          $this->db->insert('askalib_reply', $replyData);
                          return;
                        }


                        function unMonitor($mntrID){

                          $this->db->query("SET @QsubID = (SELECT subID FROM monitorindex WHERE mntrIndexID = '".$mntrID."');");

                          $this->db->query("UPDATE askalib SET Monitored = CASE WHEN @QsubID = SUBSTRING('AAL', 0, 3) THEN 0 END WHERE @QsubID = subAalID;");

                          $this->db->query("UPDATE suggest SET Monitored = CASE WHEN @QsubID = SUBSTRING('SAB', 0, 3) THEN 0 END WHERE @QsubID = subsabID;");

                          $this->db->query("UPDATE inqcat SET Monitored = CASE WHEN @QsubID = SUBSTRING('CTL', 0, 3) THEN 0 END WHERE @QsubID = CatInqID;");

                          $this->db->query("DELETE FROM monitorindex WHERE mntrIndexID = '".$mntrID."';");

                        }



                        function GET_lookUp($subID){

                          $pre = substr($subID, 0, 3);

                          if($pre == 'AAL'){
                            $query = $this->db->query("SELECT aalID, subAalID, Subject, Inquiry, DateofInquiry, InquiredBy, Monitored FROM askalib WHERE subAalID = '".$subID."'");
                            return $query->result();
                          }
                          else if($pre == 'SAB'){
                            $query = $this->db->query("SELECT sabID, subSabID, Subject, Title, Author, Publisher, About, SuggestedBy, SuggestedDate, Monitored FROM suggest WHERE subSabID = '".$subID."'");
                            return $query->result();
                          }

                        }


                        //=============look up================

                        function GET_SABDetail($id){
                          $query = $this->db->query("SELECT a.sabID, a.Subject, a.Title, a.Author, a.Publisher, a.About, a.SuggestedDate, b.FullName, b.imgPath,
                            (SELECT count(suID) FROM suggest_upvote WHERE subSabID = a.subSabID) as vptPt
                            FROM suggest a
                            LEFT JOIN users b
                            on a.SuggestedBy = b.Username
                            WHERE a.subSabID ='". $id ."'");
                            return $query->row();

                          }


                          function UPDATE_suggestionAvailable($updateData, $subID){
                            $this->db->where('subSabID', $subID);
                            $this->db->update('suggest', $updateData);

                            return;
                          }


                          function GET_catInqDetails($CatInqID){
                            $query = $this->db->query("SELECT a.inqCatID, a.CatInqID, a.HoldingsID, b.Title, a.inqCatTxt, c.FullName, a.inqCatDate, d.reply, d.dateReply,
                              IF(d.isPatron = 0, (SELECT LibrarianName FROM tbllibrarian_profile WHERE LibrarianID = d.repliedBy), (SELECT FullName FROM users WHERE UserID = d.repliedBy)) as repliedBy
                              FROM inqcat a
                              LEFT JOIN tblindices b
                              ON a.HoldingsID = b.HoldingsID
                              LEFT JOIN users c
                              ON a.inqCatBy = c.UserID
                              LEFT JOIN inqcat_reply d
                              ON a.CatInqID = d.CatInqID
                              WHERE a.CatInqID = '".$CatInqID."'");

                              return $query->result();
                            }


                            function INSERT_inqCatReply($replyData){
                              $this->db->insert('inqcat_reply', $replyData);
                              return;
                            }





                          } ?>
