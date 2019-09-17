<section>
  <div class="modal fade" tabindex="-1" role="dialog" id="CatInqDetail">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Catalog Inquiry Details</h3>
        </div>

        <div class="modal-body">
          <h3 style="margin-top:0;">Subject: <span id="catalog_Title"></span></h3>

          <div class="col-lg-11" id="inqCatTxt" style="border: 1px solid; border-radius: 5px; padding: 10px 20px; word-break: break-word;">
          </div>

          <div class='col-md-10' id="catInqReplies" style="float: right; margin-bottom: 20px;">
          </div>

        </div><!-- end modal-body -->


        <!-- textbox reply -->
        <div class="col-md-12" style="margin-bottom: 20px;">
          <span id="catalogSubAalID" style="display:none;"></span>
          <textarea rows="8" cols="80" id="catalog_replyBox" name="catalog_replyBox"></textarea>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-success" style="float: left;" onclick="replyGenInq();" >Send</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</section>


<script type="text/javascript">


function catInqDetials(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {CatInqID: id},
    url: "<?php echo base_url(); ?>index.php/Notif_controller/catalogInqDetails"
  }).done(function(data){
    //details
    $("#catInqReplies").html(data.catInqReplies);
  });

}



function replyGenInq(){

  var subAalID = $("#catalogSubAalID").text();
  var catalog_replyBox = CKEDITOR.instances['catalog_replyBox'].getData();

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {subAalID: subAalID,
      catalog_replyBox: catalog_replyBox},
      url: "<?php echo base_url(); ?>index.php/Notif_controller/catInqReply"
    }).done(function(data){
      CKEDITOR.instances['catalog_replyBox'].setData();
      catInqDetials(subAalID);
      toastr.success('Reply sent successfully!');
    });

  }



  $(document).ready( function () {
    CKEDITOR.replace('catalog_replyBox');
  });

</script>
