<div class="content-wrapper">


  <section class="content-header">
    <h1>Private Messages</h1>
  </section>

  <div class="box-header with-border">
  </div>

  <div class="pvtMessages col-sm-6" id="pvtMessages">


    <table id="msgsTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>From</th>
          <th>Subject</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?php for ($i=0; $i < count($pvtMsgs) ; $i++) { ?>
          <tr>
            <td><?php echo $pvtMsgs[$i]->FullName;  ?></td>
            <td><?php echo $pvtMsgs[$i]->Subject;  ?></td>
            <td> <button type="button" class="btn <?php if($pvtMsgs[$i]->readStatus == '0'){echo 'btn-success';}else{echo 'btn-primary';} ?>" name="button" onclick="openConvo('<?php echo $pvtMsgs[$i]->threadID; ?>');">Read</button> </td>
          </tr>
        <?php  } ?>

      </tbody>
    </table>
  </div> <!-- end of message list container -->

  <div id="msgDivContainer" class="col-sm-6" style="display:none;">
    <div id="pvtMsgDiv">
    </div>
    <div class="">
      <input type="hidden" id="msgTo" name="msgTo" value="">
      <textarea name="name" rows="8" cols="80" id="msgReplyTxt"></textarea>
      <button type="button" class="btn btn-primary" id="reply2Msg">Reply</button>
    </div>
  </div>



</div><!-- end content wrapper -->

<script type="text/javascript">


//send reply for specific conversation
$("#reply2Msg").click(function(){
  threadID = $("#msgTo").val();
  msgTxt = $("#msgReplyTxt").val();

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {threadID: threadID, msgTxt:msgTxt},
    url: "<?php echo base_url(); ?>Notif_controller/INSERT_replyPvtMsg"
  }).done(function(data){
    toastr.success('Message Sent!');
    specMsg(threadID);
    $("#msgReplyTxt").summernote('code','');
  });

});

function openConvo(threadID){

  $("#msgDivContainer").hide('fast');
  $("#msgDivContainer").show('slow');
  $("#msgTo").val(threadID);

  specMsg(threadID);

}



//GET specific message conversation
function specMsg(threadID){
  $.ajax({
    type: "POST",
    dataType: "json",
    data: {threadID: threadID},
    url: "<?php echo base_url(); ?>Notif_controller/specMsg"
  }).done(function(data){
    $("#pvtMsgDiv").html(data.specMsg);
    updateScroll();
  });

}



//scroll to bottom of convo
function updateScroll(){
  var element = document.getElementById("specPvtMsg");
  element.scrollTop = element.scrollHeight;
}



$(document).ready( function () {
  $('#msgsTable').DataTable({
    "bLengthChange": false,
    "bInfo": false
  });

  $('#msgReplyTxt').summernote();
  $('.note-editable').css('height', '120px');

});
</script>
