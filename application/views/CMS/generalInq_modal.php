<section>
  <div class="modal fade" tabindex="-1" role="dialog" id="GenInqDetail">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">General Inquiry Details</h3>
        </div>

        <div class="modal-body">
          <!-- inquiry ID -->
          <span style="display:none;" name="subAalID" id="subAalID"></span>

          <!-- inquiry by -->
          <h4>Inquiry By: <span id="inqBy"></span></h4>

          <!-- conversation -->
          <div class="col-md-10" id="inqText" style="border: 1px solid; border-radius: 5px; padding: 10px 20px; word-break: break-word;">
          </div>

          <!-- replies -->
          <div class="col-md-11" id="inqReplies" style=" float: right;">
          </div>


          <br class="clear" />
          <hr />
          <!-- textbox reply -->
          <div class="col-md-12">
            <textarea  id="replyBox" name="replyBox"></textarea>
          </div>

          <br class="clear" />

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success" style="float:left;" onclick="replyInq();">Reply</button>
          <button type="button" class="btn btn-primary" style="float:left;" onclick="clsInq();">Close Inquiry</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</section>


<script type="text/javascript">

function GenInqConv(id){
  $.ajax({
    type: "POST",
    dataType: "json",
    data: {aalID: id},
    url: "<?php echo base_url(); ?>index.php/Notif_controller/generalInqDetails"
  }).done(function(data){
    //details
    $("#subAalID").val(data.subAalID);
    $("#inqBy").html(data.inqBy);
    $("#inqText").html(data.inqText);
    $("#inqReplies").html(data.inqReplies);
  });
}


function replyInq(){

  var subAalID = $("#subAalID").val();
  var replyBox = CKEDITOR.instances['replyBox'].getData();

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {subAalID: subAalID,
      replyBox: replyBox},
      url: "<?php echo base_url(); ?>index.php/Notif_controller/GenInqReply"
    }).done(function(data){
      CKEDITOR.instances['replyBox'].setData();
      GenInqConv(subAalID);
    });

  }


  function clsInq(){
    var subAalID = $("#subAalID").val();

    swal({
      title: "Are you sure?",
      text: "closing this thread, you will be unable to reply on.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        $.ajax({
          type: "POST",
          dataType: "json",
          data: {subAalID: subAalID},
            url: "<?php echo base_url(); ?>index.php/Notif_controller/closeGenInq"
          }).done(function(data){
            swal('Success!', '', 'success');
            $('#MonitoredTable').DataTable().ajax.reload(null, false);
            $('#GenInqDetail').modal('hide');
          });

      }
    });

  }



  $(document).ready( function () {
    CKEDITOR.replace('replyBox');
  });


</script>
