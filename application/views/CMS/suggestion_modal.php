<section>
  <div class="modal fade" tabindex="-1" role="dialog" id="SugDetail">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Suggestion Details</h3>
        </div>

        <div class="modal-body">
          <h4 id="sggstdBy"></h4>
          <br />
          <div id="SuggestionDetail">
            <table class="table table-hover" style="width:100%;">
              <tr>
                <td class="info" style="width:20%;">Subject Area</td><td id="sbjAreaTd"></td>
              </tr>
              <tr>
                <td class="info">Title</td><td id="titleTd"></td>
              </tr>
              <tr>
                <td class="info">Author</td><td id="authrTd"></td>
              </tr>
              <tr>
                <td class="info">Publisher</td><td id="pubshTd"></td>
              </tr>
              <tr>
                <td class="info">About</td><td id="abtTd"></td>
              </tr>
            </table>
            <h4>UpVotes: <span id="pts"></span></h4>
            <span id="subID" style="display:none;"></span>
          </div>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-primary" style="float:left;" onclick="tagAsAcquired();">Set as Available</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</section>



<script type="text/javascript">


function tagAsAcquired(){
  var id = $("#subID").text();

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {sabID: id},
    url: "<?php echo base_url(); ?>index.php/Notif_controller/setAsAvailableSug"
  }).done(function(data){
    swal('success', 'success', 'success');
    $('#MonitoredTable').DataTable().ajax.reload(null, false);
    setTimeout(function(){ $('#SugDetail').modal('toggle'); }, 1000);
  });



}

</script>
