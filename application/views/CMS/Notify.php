<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Notifications Management</h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 id="sabCount"></h3>
            <p>Suggestions</p>
          </div>
          <a href="#" class="small-box-footer" onclick="sabCheck();">View All <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3 id="aalCount"></h3>

            <p>General Inquiry/ies</p>
          </div>
          <a href="#" class="small-box-footer" onclick="aalCheck();">View All <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3 id="ciCount"></h3>
            <p>Catalog Inquiry/ies</p>
          </div>
          <a href="#" class="small-box-footer" onclick="ciCheck();">View All <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">

        <!-- TO DO List -->
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">Monitoring Index</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->

            <table id="MonitoredTable" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Subject / Title</th>
                  <th></th>
                </tr>
              </thead>

            </table>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </section>

      <section class="col-lg-5 connectedSortable">

        <!-- TO DO List -->
        <div class="box box-primary" style="display:none;" id="unmonitoredDiv">
          <div class="box-header">
            <i class="fa fa-book" id="MonHead_icon"></i>

            <h3 class="box-title" id="MonHead"></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow:auto; height:50%;">
            <ul class="todo-list" id="monitorList">

            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>

<!-- modal -->
<?php include 'suggestion_modal.php'; ?>
<?php include 'generalinq_modal.php'; ?>
<?php include 'cataloginq_modal.php'; ?>



<!-- ask a lib -->
<script type="text/javascript">


$(document).ready(function(){

  if('<?php echo $directNotifyLink; ?>' == 'aal'){
    aalCheck();
  }
  else if('<?php echo $directNotifyLink; ?>' == 'sab'){
    sabCheck();
  }
  else if('<?php echo $directNotifyLink; ?>' == 'ctl'){
    ciCheck();
  }

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/aalSabCiCount",
    success: function(data){
      $('#aalCount').html(data.aalCount);
      $('#sabCount').html(data.sabCount);
      $("#ciCount").html(data.ciCount);
    }
  });

});




function aalSabCiCount(){
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/aalSabCiCount",
    success: function(data){
      $('#aalCount').html(data.aalCount);
      $('#sabCount').html(data.sabCount);
      $("#ciCount").html(data.ciCount);
    }
  });
}



function ciCheck(){

  $('#unmonitoredDiv').show();
  $('#MonHead').text('Catalog Inquiry/ies');
  $('#MonHead_icon').removeClass('fa-book');
  $('#MonHead_icon').addClass('fa-commenting');

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/catInqNotif",
    success: function(data){
      $('#monitorList').html(data.cataInqList);
      aalSabCiCount();
    }
  });
}


function aalCheck(){

  $('#unmonitoredDiv').show();
  $('#MonHead').text('Ask a Librarian');
  $('#MonHead_icon').removeClass('fa-book');
  $('#MonHead_icon').addClass('fa-commenting');

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/GET_askALibNotif",
    success: function(data){
      $('#monitorList').html(data.askALibList);
      aalSabCiCount();
    }
  });

}


function sabCheck() {

  $('#unmonitoredDiv').show();
  $('#MonHead').text('Suggest a Material');
  $('#MonHead_icon').removeClass('fa-commenting');
  $('#MonHead_icon').addClass('fa-book');


  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/GET_suggestNotif",
    success: function(data){
      $('#monitorList').html(data.SuggestList);
      aalSabCiCount();
    }
  });

}


function monitor(id){
  $.ajax({
    type: "POST",
    data: {subID:id},
    url: "<?php echo base_url(); ?>index.php/Notif_controller/monitorNotif",
    success: function(){
      if(id.substring(0,3) == 'SAB'){
        sabCheck();
        aalSabCiCount();
        $('#MonitoredTable').DataTable().ajax.reload(null, false);
      }
      else if(id.substring(0,3) == 'AAL'){
        aalCheck();
        aalSabCiCount();
        $('#MonitoredTable').DataTable().ajax.reload(null, false);
      }

      else if(id.substring(0,3) == 'CTL'){
        ciCheck();
        aalSabCiCount();
        $('#MonitoredTable').DataTable().ajax.reload(null, false);
      }
    }
  });
}



$('#MonitoredTable').DataTable({
  "ajax": {
    url : "<?php echo base_url(); ?>index.php/Notif_controller/GET_monitoredIndex",
    type : 'POST',
    dataType:"json"
  },
  "columnDefs": [
    { "width": "18%", "targets": 0 },
    { "targets": 2, "width": "30%" }
  ],
  fixedColumns: true,
  "ordering": false
});



function lookup(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>index.php/Notif_controller/lookUp",
    data: {subID: id},
    success: function(data){
      $('#lookUpData').html(data.lookUpData);
    }
  });


}



function unMonitor(id){

  swal({
    title: "Are you sure?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
        url: "<?php echo base_url(); ?>index.php/Notif_controller/unMonitor",
        method: "POST",
        data: {mntrID:id},
        success: function(data) {
          var json = data;
          obj = JSON.parse(json);

          if(obj.mntrType == 1){
            sabCheck();
          }
          else if(obj.mntrType == 2) {
            aalCheck();
          }
          else if(obj.mntrType == 3) {
            ciCheck();
          }
        }
      });

      swal({
        text: "Successfully Un-Monitored!",
        icon: "success",
      }).then((value) => {
        $('#MonitoredTable').DataTable().ajax.reload(null, false);
      });

    }
  });


}


function lookUpMntr(id){
  var prefx = id.substring(0,3);

  if (prefx == 'SAB') {



    $.ajax({
      type: "POST",
      dataType: "json",
      data: {sabID: id},
      url: "<?php echo base_url(); ?>index.php/Notif_controller/SuggestionDetails"
    }).done(function(data){
      $("#SugDetail").modal();

      //fill in table
      $("#subID").html(data.subID);
      $("#sggstdBy").html(data.sggstdBy);
      $("#sbjAreaTd").html(data.sbjAreaTd);
      $("#titleTd").html(data.titleTd);
      $("#authrTd").html(data.authrTd);
      $("#pubshTd").html(data.pubshTd);
      $("#abtTd").html(data.abtTd);
      $("#pts").html(data.pts);

    });


  }else if (prefx == 'AAL'){

    $.ajax({
      type: "POST",
      dataType: "json",
      data: {aalID: id},
      url: "<?php echo base_url(); ?>index.php/Notif_controller/generalInqDetails"
    }).done(function(data){
      $("#GenInqDetail").modal();

      //details
      $("#subAalID").val(data.subAalID);
      $("#inqBy").html(data.inqBy);
      $("#inqText").html(data.inqText);
      $("#inqReplies").html(data.inqReplies);
    });

  }else if (prefx == 'CTL'){

    $.ajax({
      type: "POST",
      dataType: "json",
      data: {CatInqID: id},
      url: "<?php echo base_url(); ?>index.php/Notif_controller/catalogInqDetails"
    }).done(function(data){
      $("#CatInqDetail").modal();


      //details
      $("#catalog_Title").html(data.catalog_Title);
      $("#inqCatTxt").html(data.inqCatTxt);
      $("#catalogSubAalID").html(data.CatInqID);
      $("#catInqReplies").html(data.catInqReplies);


    });


  }else{
    alert('error');
  }

}


</script>
