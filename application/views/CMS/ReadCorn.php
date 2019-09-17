<div class="content-wrapper">
  <section class="content-header">
    <h1>Reader's Corner Management</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-lg-12" style="border-bottom: 1px solid; padding: 10px;">
    <button type="button" class="btn btn-primary" onclick="GenInqList();">General Inquiry List</button>
    <button type="button" class="btn btn-warning" onclick="pinnedPostsList();">Pinned Posts</button>
  </div>



  <div class="col-lg-7" id="GenInqListDivContainer" style="display: block; margin-top: 15px;">
    <h4 style="margin-top: 0;">General Inquiry List</h4>
    <table id="AALlist" style="width: 100%;">
      <thead>
        <tr>
          <th>Reference No.</th>
          <th>Subject</th>
          <th>Inquired By</th>
          <th>Date of Inquiry</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i < count($AALlist); $i++) { ?>
          <tr>
            <td><?php echo $AALlist[$i]->subAalID; ?></td>
            <td><?php echo $AALlist[$i]->Subject; ?></td>
            <td><?php echo $AALlist[$i]->InquiredBy; ?></td>
            <td><?php echo $AALlist[$i]->DateofInquiry; ?></td>
            <td><button type="button" class="btn btn-info" style="margin-bottom:5px;" onclick="AALdetails('<?php echo $AALlist[$i]->subAalID; ?>');">Details</button></td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>  <!-- end of GenInqListDivContainer -->



  <div class="col-md-7" id="pinnedAALdivContainer" style="display: none; margin-top: 15px;">
    <h4 style="margin-top: 0;">Pinned Posts</h4>
    <table id="pinnedAALtable" style="width: 100%;">
      <thead>
        <tr>
          <th>Reference No.</th>
          <th>Subject</th>
          <th>Inquired By</th>
          <th>Date pinned</th>
          <th>status</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i < count($pinnedAAL); $i++) { ?>
          <tr>
            <td><?php echo $pinnedAAL[$i]->subAalID; ?></td>
            <td><?php echo $pinnedAAL[$i]->Subject; ?></td>
            <td><?php echo $pinnedAAL[$i]->FullName; ?></td>
            <td><?php echo $pinnedAAL[$i]->pinnedDate; ?></td>
            <td><button type="button" class="btn btn-info" style="margin-bottom:5px;" onclick="AALdetails('<?php echo $pinnedAAL[$i]->subAalID; ?>');">Details</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div> <!-- end of pinnedAALdivContainer -->


  <div class="col-lg-5" style="margin-top: 10px; display: none;" id="AALDetailsDiv">

    <div>
      <span id="subAalID" style="display: none;"></span>
      <button type="button" class="btn btn-default" style="float:right; display:none;" onclick="pinPost();" id="pinBtn">Pin Post</button>
      <button type="button" class="btn btn-danger" style="float:right; display:none;" onclick="unpinPost();" id="unpinBtn">Unpin Post</button>
      <h4 style="margin-bottom: 0;">Subject: <span id="inqSubject"></span> </h4>
      <span style="font-weight:300;">Inquired By: <span id="inqBy"></span></span><br />
      <span style="font-weight:300;">Date of Inquiry: <span id="DateofInquiry"></span></span><br />
      <div id="inqText" style="margin-top:10px; word-break: break-word;">
      </div>
    </div>

    <hr />

    <div id="inqReplies" style="overflow:auto; max-height: 60vh;">
    </div>

  </div><!-- end of AALDetailsDiv -->




</div><!-- end content wrapper -->



<!-- SCRIPTS -->
<script type="text/javascript">

function pinnedPostsList(){

  $("#GenInqListDivContainer").hide('slow');
  $("#AALDetailsDiv").hide('slow');
  setTimeout(function(){
    $("#pinnedAALdivContainer").show('slow');
  }, 500);

}


function GenInqList(){

  $("#pinnedAALdivContainer").hide('slow');
  $("#AALDetailsDiv").hide('slow');
  setTimeout(function(){
    $("#GenInqListDivContainer").show('slow');
  }, 500);

}




function AALdetails(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {aalID: id},
    url: "<?php echo base_url(); ?>index.php/Cms_controller/generalInqDetails"
  }).done(function(data){
    $("#AALDetailsDiv").hide('slow');

    setTimeout(function(){
      $("#AALDetailsDiv").show('slow');
      $("#subAalID").text(data.subAalID);
      $("#DateofInquiry").html(data.DateofInquiry);
      $("#inqSubject").html(data.inqSubject);
      $("#inqBy").html(data.inqBy);
      $("#inqText").html(data.inqText);
      //comments
      $("#inqReplies").html(data.inqReplies);

      if (data.isPinned) {
        $("#unpinBtn").show();
        $("#pinBtn").hide();
      }else{
        $("#pinBtn").show();
        $("#unpinBtn").hide();
      }

    }, 500);

  });

}


function pinPost(){
  var subAalID = $("#subAalID").text();
  var inqSubject = $("#inqSubject").text();
  //
  // $.ajax({
  //   type: "POST",
  //   dataType: "json",
  //   data: {subAalID: subAalID},
  //   url: "<?php echo base_url(); ?>index.php/Cms_controller/pinGeninq"
  // }).done(function(data){
  //   if (data.msg == '1') {
  //     swal("Success!", "Inquiry successfully Pinned!", "success");
  //     AALdetails(subAalID);
  //     setTimeout(function(){
  //       location.reload();
  //     }, 1000);
  //   }else{
  //     toastr.options = {"positionClass": "toast-top-right"};
  //     toastr.error('Pin list is full! maximum of 10 posts.');
  //
  //   }
  //
  // });



  swal("Title for the pinned post:", {
    content: {element: 'input', attributes: {}},
    button: {text: "Set"},
    cancel: {
      text: "Cancel",
      value: false,
      visible: false,
      className: "",
      closeModal: true,
    }
  }).then((value) => {

    if(value){

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {subAalID: subAalID,
          Title: value},
          url: "<?php echo base_url(); ?>index.php/Cms_controller/pinGeninq"
        }).done(function(data){

          if (data.msg) {
            swal("Success!", "Inquiry successfully Pinned!", "success");
            AALdetails(subAalID);
            setTimeout(function(){
              location.reload();
            }, 1000);
          }else{
            toastr.options = {"positionClass": "toast-top-right"};
            toastr.error('Pin list is full! maximum of 10 posts.');
          }

        });

      }else{
        toastr.error("Title can't be blank!");
      }


    });


  }


  function unpinPost(){
    var subAalID = $("#subAalID").text();

    $.ajax({
      type: "POST",
      dataType: "json",
      data: {subAalID: subAalID},
      url: "<?php echo base_url(); ?>index.php/Cms_controller/unPinGeninq"
    }).done(function(data){
      swal("Success!", "Inquiry successfully Unpinned!", "success");
      AALdetails(subAalID);
      setTimeout(function(){
        location.reload();
      }, 1000);
    });
  }



  $(document).ready(function() {

    $('#AALlist').DataTable({
      "order": [[ 0, "desc" ]]
    });

    $('#pinnedAALtable').DataTable({
      "order": [[ 0, "desc" ]],
      "bLengthChange": false,
      "bPaginate": false
    });

  });


</script>
