<div class="content-wrapper">
  <section class="content-header">
    <h1> <span style="color: blue"><?php echo $totalClientFeedback; ?></span> Client Feedbacks</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-lg-4">
    <h2>Ratings:</h2>

    <table style="width:100%;">
      <tr>
        <td><h3>Content:</h3></td> <td><h3><?php echo $q1Score; ?> <span class="fa fa-star-o" style="cursor: pointer;" onclick="individualScore('q1');" data-target="#ScoresModal" data-toggle="modal"></span></h3></td>
      </tr>
      <tr>
        <td><h3>Usefulness / Significance:</h3></td> <td><h3><?php echo $q2Score; ?> <span class="fa fa-star-o" style="cursor: pointer;" onclick="individualScore('q2');" data-target="#ScoresModal" data-toggle="modal"></span></h3></td>
      </tr>
      <tr>
        <td><h3>Overall layout / Design:</h3></td> <td><h3><?php echo $q3Score; ?> <span class="fa fa-star-o" style="cursor: pointer;" onclick="individualScore('q3');" data-target="#ScoresModal" data-toggle="modal"></span></h3></td>
      </tr>
      <tr>
        <td><h3>Response and delivery Time:</h3></td> <td><h3><?php echo $q4Score; ?> <span class="fa fa-star-o" style="cursor: pointer;" onclick="individualScore('q4');" data-target="#ScoresModal" data-toggle="modal"></span></h3></td>
      </tr>
      <tr>
        <td><h3>Overall Experience:</h3></td> <td><h3><?php echo $q5Score; ?> <span class="fa fa-star-o" style="cursor: pointer;" onclick="individualScore('q5');" data-target="#ScoresModal" data-toggle="modal"></span></h3></td>
      </tr>
    </table>

  </div>

  <div class="col-lg-12">

    <table id="optionalTxtsList" class="table table-bordered table-striped table-hover" style="width:100%">
      <thead>
        <tr>
          <th>Patron Full Name</th>
          <th>Suggestion</th>
          <th>Date of suggestion/feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $optionalTxtsList; ?>
      </tbody>
    </table>

  </div>




<!-- individual Score -->
  <section>
    <div class="modal fade" tabindex="-1" role="dialog" id="ScoresModal">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title">Rating Details</h2>
          </div>
          <div class="modal-body">

            <div id="ratingModalContainer">

            </div>

            <div class="modal-footer"> <!-- modal footer -->
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>



<!-- optional suggestion text -->
  <section>
    <div class="modal fade" tabindex="-1" role="dialog" id="txtsModal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title">Suggestion Details</h2>
          </div>
          <div class="modal-body">
            <h3 style="margin:0;">Suggested By: <span id="suggestedBy"></span> </h3>

            <div id="optionalTxtCon" style="margin-top: 20px;">

            </div>

            <p style="margin-top:30px;">Email Address: <span id="patronEmailCon"></span> </p>
            <p>Contact No: <span id="patronContactNoCon"></span> </p>

            <div class="modal-footer"> <!-- modal footer -->
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>








</div>


<script type="text/javascript">

$(document).ready(function(){

  //datatable
  $('#optionalTxtsList').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'excel', 'pdf'
    ],
    ordering:  false
  });

});



function checkDetails(fbID){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {fbID: fbID},
    url: "<?php echo base_url(); ?>Feedback_controller/txtDetails"
  }).done(function(data){
    $("#txtsModal").modal('toggle');
    $("#suggestedBy").html(data.suggestedBy);
    $("#optionalTxtCon").html(data.optionalTxt);
    $("#patronEmailCon").html(data.patronEmailCon);
    $("#patronContactNoCon").html(data.patronContactNoCon);
  });


}




function individualScore(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {rateOf: id},
    url: "<?php echo base_url(); ?>Feedback_controller/ratingsPer"
  }).done(function(data){
    $("#ratingModalContainer").html(data.rateTabulation);
  });


}

</script>
