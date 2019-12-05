<div class="content-wrapper">


  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'GenInq')" id="defaultOpen">Ask a Librarian</button>
    <button class="tablinks" onclick="openTab(event, 'SuggestMat');">Suggested Material</button>
    <button class="tablinks" onclick="openTab(event, 'CatInq');">Catalog Inquiry</button>
  </div>

  <!-- Tab content -->
  <div id="GenInq" class="tabcontent">

    <div class="col-lg-5">
      <table id="GenInqTable" class="table table-hover display" style="width:100%">
        <thead>
          <tr>
            <th>Inquiry Subject</th>
            <th>Initial Inquiry</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="col-lg-7" style="display: none;" id="detailsSide">
      <div class="col-md-11">
        <span style="display:none;" name="subAalID" id="subAalID"></span>
        <h4>Subject: <span id="subjectInq"></span></h4>
      </div>
      <div class="col-md-1" id="pinBtn">

      </div>

      <div id="InitialInq" class="col-md-12" style="white-space: pre-wrap; word-wrap: break-word; white-space: -moz-pre-wrap; overflow-y: auto; height: 20%; border-bottom: 4px solid #5aafe8">
      </div>


      <div class="col-md-12" id="GenInqReplies" style="margin-top: 20px; overflow-y: auto; height: 25%; ">
      </div>

      <div class="col-md-12">
        <textarea rows="8" cols="80" id="replyBox" name="replyBox"></textarea>
        <div style="margin-top:7px;">
          <button type="button" class="btn btn-success" style="float:left;" onclick="replyInq();">Send reply</button>
          <button type="button" class="btn btn-primary" style="float:right;" onclick="clsInq();">Close Inquiry</button>
        </div>
      </div>

    </div>



  </div>


  <div id="SuggestMat" class="tabcontent">



  </div>


  <div id="CatInq" class="tabcontent">




  </div>



</div><!-- end content wrapper -->




<script type="text/javascript">


$('#GenInqTable').DataTable({
  "ajax": {
    url : "<?php echo base_url(); ?>index.php/IndexMon_controller/GET_GenInq",
    type : 'POST',
    dataType:"json"
  },
  "columnDefs": [
    { "width": "18%", "targets": 0 },
    { "targets": 2, "width": "30%" }
  ],
  fixedColumns: true,
  "bLengthChange": false
});

function showDetails(id){
  InqDetails(id);
  $("#detailsSide").hide('slow');
  $("#detailsSide").show('slow');
}


function InqDetails(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {aalID: id},
    url: "<?php echo base_url(); ?>index.php/IndexMon_controller/GenInqDetails"
  }).done(function(data){
    $("#subAalID").val(data.subAalID);
    $("#subjectInq").html(data.subjectTitle);
    $("#InitialInq").html(data.initalInq);
    $("#GenInqReplies").html(data.replies);
    $("#pinBtn").html(data.pinBtn);
  });
  setTimeout(function(){
    $('#GenInqReplies').animate({scrollTop : $('#GenInqReplies')[0].scrollHeight} ,'slow');
  }, 500);

}



function replyInq(){

  var subAalID = $("#subAalID").val();
  var replyBox = CKEDITOR.instances['replyBox'].getData();

  if (replyBox != "") {
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {subAalID: subAalID,
        replyBox: replyBox},
        url: "<?php echo base_url(); ?>index.php/Notif_controller/GenInqReply"
      }).done(function(data){
        CKEDITOR.instances['replyBox'].setData();
        InqDetails(subAalID);
        toastr.success("Reply to Inquiry Sent!");
      });
    }else{
      toastr.error("Failed to send an empty reply.");
    }



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
        });

      }
    });

  }



  function pinPost(){
    var subAalID = $("#subAalID").val();

    swal("Override Subject for a better subject heading; Leave it blank if unnecessary:", {
      content: "input",
      button: {text: "Override!"}
    }).then((value) => {

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {OrrSubject: value,
          subAalID: subAalID},
          url: "<?php echo base_url(); ?>index.php/IndexMon_controller/pinPost"
        }).done(function(data) {
          toastr.success("Inquiry Pinned!");
          InqDetails(subAalID);
        });

      });
    }



    function unPin(){
      var subAalID = $("#subAalID").val();

      swal({
        title: "Unpin post?",
        text: "You can always Pin and Unpin a post.",
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
            url: "<?php echo base_url(); ?>index.php/IndexMon_controller/unPinPost"
          }).done(function(data){
            toastr.success('Post unpinned successfully!');
            InqDetails(subAalID);
          });

        }
      });

    }



    </script>









    <!-- tab navigation -->
    <script type="text/javascript">

    $(document).ready( function () {
      // CKEDITOR.replace('replyBox');

      CKEDITOR.replace( 'replyBox', {
        height : '150',
        uiColor: '#9AB8F3'
      });
    });


    function openTab(evt, tabName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
