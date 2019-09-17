





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="divreports"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reports
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
      <li class="active"><i class="fa fa-folder-image"></i>Reports</li>
    </ol>
  </section>
  <br>




  <!-- Main content -->
  <div class="box box-default entry">

    <!-- <div class="row"> -->
      <div class="box-header with-border">


        <h3 class="box-title">Inventory</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapseinventory" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

        </div>
      </div>

      <div class="collapsemultimedia" id="collapseExample">


        <form action="<?php echo site_url("Holdings_controller/generate_report")?>" method="post">

          <div class="box">
            <div class="row">
              <div class="col-xs-6">


                <div class="box-body">

                  <label class="col-sm-2" style="font-size:16px; letter-spacing:3px; padding-top:5px;">Report: </label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file "></i>
                    </div>
                    <select field-type="Select" name="cboReport" id="cboReport" onchange="report()" class="form-control select2" style="width: 80%; ">

                      <option value="0">Inventory Report</option>
                      <option value="1">Summary Report</option>
                      <option value="2">List of Publication Title per Series Title</option>
                      <option value="3">Total number of Titles per Broad Classification</option>
                      <option value="4">Total Number of Cataloged / Uncataloged Titles per Material Type</option>


                      

                    </select>

                  </div>
                </div>

                <div id="divInventory" hidden="hidden">
                  <div class="box-body" >

                    <label class="col-sm-2" style="word-spacing:-1px;padding-top:5px;">Inventoried By: </label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <select class="form-control select2" id="listOfUsers" name="listOfUsers"  style="width: 60%; display: none;" >
                        <?php foreach($xxuser as $users): ?>
                          <option value="<?php echo $users['UserID']; ?>"><?php echo $users['UserName']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div> 



                  <div class="box-body">

                    <label style="padding-left:15px;">Date Inventoried</label>


                    <input type="radio" name="GeneratebyDate" value="dateInventoried" checked="checked">


                    &nbsp&nbsp&nbsp&nbsp


                    <label>Date Acquired</label>


                    <input type="radio" name="GeneratebyDate" value="dateAcquired">


                    <!-- /.input group -->
                  </div>


                  <div class="box-body">
                    <label class="col-sm-2">From:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-calendar-plus-o"></i>
                      </div>
                      <input name="fromInventoryDate" id="fromInventoryDate" type="date" 
                      class="form-control " style="width: 25%;" value='<?php echo date('Y-m-d');?>'>


                      <!-- /.input group -->
                    </div>
                  </div>

                  <div class="box-body">
                    <label class="col-sm-2">To:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-calendar-minus-o"></i>
                      </div>
                      <input name="toInventoryDate" id="toInventoryDate" type="date" 
                      class="form-control " style="width: 25%;" value='<?php echo date('Y-m-d');?>'>


                      <!-- /.input group -->
                    </div>
                  </div>

                </div>


              </div>

              <div class="col-xs-6">
                <div id="divInventoryReports" hidden="hidden">


                  <div class="box-header ">
                    <h4 class="box-title" style="font-weight:600; padding-top:5px;">Inventory Report</h4>


                  </div>

                  <br>
                  <br>





                  <div class="box-body">
                    <label class="col-sm-2">Material Type:</label>

                    <div class="input-group">  
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-book"></i>
                      </div>
                      <select class="form-control select2" id="cboMaterialTypeInv" name="cboMaterialTypeInv" style="width: 40%; display: none;" >
                        <?php foreach($types as $type): ?>
                          <option value="<?php echo $type['MaterialTypeID']; ?>"><?php echo $type['MaterialType']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                  </div>

                  <div class="box-body">
                    <label class="col-sm-2">Sorted By:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-sort-alpha-asc"></i>
                      </div>
                      <select field-type="Select" name="SortBy" id="SortBy" class="form-control select2" style="width: 40%;">

                        <option value="0">Call Number</option>
                        <option value="1">Title</option>
                        <option value="2">Broad Class</option>
                        <option value="3">Holdings ID</option>
                        <option value="4">Circulation Number</option>
                        <option value="5">Date of Inventory</option>

                      </select>




                    </div> 

                  </div>  

                  <div class="box-body" >
                    <label class="col-sm-2"></label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon" class="">
                        <i class="fa fa-sort"></i>
                      </div>
                      <select field-type="Select" name="SortOrder" id="SortOrder" class="form-control select2" style="width: 40%;">

                        <option value="0">Ascending</option>
                        <option value="1">Descending</option>


                      </select>
                    </div>
                  </div>







                </div> 


                <div id="divSummaryReports" hidden="hidden" >

                  <div class="box-header">
                    <h4 class="box-title" style="font-weight:600; padding-top:5px;">Summary Report</h4>


                  </div>


                  <br>
                  <br>



                  <div class="box-body">
                    <label class="col-sm-2">Material Type:</label>

                    <div class="input-group col-sm-10">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-book"></i>
                      </div>
                      <select class="form-control select2" id="cboMaterialTypeSum" name="cboMaterialTypeSum[]"  multiple="multiple" style="width:40%; display: none;" >
                        <?php foreach($types as $type): ?>
                          <option value="<?php echo $type['MaterialTypeID']; ?>"><?php echo $type['MaterialType']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                  </div>





                  <div class="box-body">
                    <label class="col-sm-2">Location:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                      </div>
                      <select field-type="Select" name="Location" id="Location" class="form-control select2" style="width: 40%;">

                        <option value="0">F(B)</option>
                        <option value="1">F(R)</option>
                        <option value="2">F(S)</option>
                        <option value="4">Fil(B)</option>
                        <option value="5">Fil(R)</option>
                        <option value="6">Fil(S)</option>
                        <option value="7">IP</option>
                        <option value="8">NP</option>
                        <option value="9">PR</option>
                        <option value="10">T</option>
                        <option value="11">VF</option>

                      </select>
                    </div>

                  </div>

                  <div class="box-body">
                    <label class="col-sm-2">Reported By:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <select field-type="Select" name="ReportedBy" id="ReportedBy" class="form-control select2" style="width: 40%;">

                        <option value="0">Broad Class</option>
                        <option value="1">Mode of Acquisition</option>


                      </select>
                    </div>

                  </div>  

                  <div class="box-body">
                    <label class="col-sm-2">Report:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-file-excel-o"></i>
                      </div>
                      <select field-type="Select" name="ReportType" id="ReportType" class="form-control select2" style="width: 40%;">

                        <option value="0">Summary Report</option>
                        <option value="1">Overall Summary Report</option>
                        <option value="2">Breakdown Report by BroadClass</option>
                        <option value="3">Breakdown Report by Mode of Acquisition</option>


                      </select>
                    </div>

                  </div> 


                </div>



              </div>  


              <div id="divListofPublicationTitle" hidden="hidden">

                <div class="box-body">
                  <label class="col-sm-2">Series Title:</label>

                  <div class="input-group">
                    <!-- <input type="text" id="dateandtime" /> -->
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <select class="form-control select2" id="SeriesTitle" name="cboSeriesTitle"   style="width:70%; display: none;" >
                      <?php foreach($stitles as $stitle): ?>
                        <option value="<?php echo $stitle['Title']; ?>"><?php echo $stitle['Title']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                </div>






              </div>


            <div class="col-xs-6">

             <div class="row">

               <div id="divNumberofTitles" hidden="hidden">

                <div class="box-body">
                  <label class="col-sm-2">Broad Classification:</label>

                  <div class="input-group">
                    <!-- <input type="text" id="dateandtime" /> -->
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                    <select class="form-control select2" id="cboBroadClass" name="cboBroadClass[]" multiple="multiple"   style="width:30%; display: none;" >
                      <?php foreach($bclass as $broadclass): ?>
                        <option value="<?php echo $broadclass['BroadClassID']; ?>"><?php echo $broadclass['BroadClass']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkBroadClass"> Select All</div>
                  </div>

                </div>


                  <div class="box-body">
                    <label class="col-sm-2">To:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-calendar-plus-o"></i>
                      </div>
                      <input name="toPublication" id="toPublication" type="text" 
                      class="form-control " style="width: 30%;">





                      <!-- /.input group -->
                    </div>
                  </div>

                  <div class="box-body">
                    <label class="col-sm-2">From:</label>

                    <div class="input-group">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-calendar-minus-o"></i>
                      </div>
                      <input name="fromPublication" id="fromPublication" type="text" 
                      class="form-control " style="width: 30%;">


                      <!-- /.input group -->
                    </div>
                  </div>

                </div>

              </div>

             

              <div id="divCatalogUncatalog" hidden="hidden">

                <div class="box-body">
                  <label class="col-sm-2">Status:</label>

                  <div class="input-group">
                    <!-- <input type="text" id="dateandtime" /> -->
                    <div class="input-group-addon">
                      <i class="fa fa-book"></i>
                    </div>
                         <select field-type="Select" name="cboCataloged" id="cboCataloged" class="form-control select2" style="width:50%;;">

                      <option value="0">Uncatalog</option>
                      <option value="1">Cataloged</option>
                      
                      

                    </select>
                  </div>

                </div>

                  <div class="box-body">
                    <label class="col-sm-2">Material Type:</label>

                    <div class="input-group col-sm-10">
                      <!-- <input type="text" id="dateandtime" /> -->
                      <div class="input-group-addon">
                        <i class="fa fa-book"></i>
                      </div>
                      <select class="form-control select2" id="cboMaterialTypeCat" name="cboMaterialTypeCat[]"  multiple="multiple" style="width:50%; display: none;" >
                        <?php foreach($types as $type): ?>
                          <option value="<?php echo $type['MaterialTypeID']; ?>"><?php echo $type['MaterialType']; ?></option>
                        <?php endforeach; ?>
                      </select>

                      <div class="input-group-addon"><input type="checkbox" class="chkbox" id="chkMaterialTypeCat"> Select All</div>


                    </div>

                  </div>

              </div>

            </div>





            </div>


            </div>
          </div>






          <div class="box-body" id="divSubmit" style="">
            <div class="form-group pull-right">

              <button type="submit" onclick="" id="btnSubmit" class="btn btn-primary"> Submit</button>
              <button action="cancel" onclick="()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>

            </div>

          </div>








        </form>




      </div>

    </div>

  </div>

  <div class="box-footer">
  </div>


</div>
<!-- /.content -->



</div>
<!-- /.content-wrapper -->



<script type="text/javascript">


  $(document).ready(function(){
    $("#collapseExample").on("hide.bs.collapse", function(){
      $("#divcollapse").html('<i class="fa fa-plus"></i>');
    });
    $("#collapseExample").on("show.bs.collapse", function(){
      $("#divcollapse").html('<i class="fa fa-minus"></i>');
    });
  });





  function download_report()


  {




    $.ajax({
      type:'POST',
      url:"<?php echo site_url("Holdings_controller/generate_report")?>",
      data: {},
      dataType:'json'
    }).done(function(data){
      var $a = $("<a>");
      $a.attr("href",data.file);
      $("body").append($a);
      $a.attr("download","file.xls");
      $a[0].click();
      $a.remove();
    });




  }






  function report() {


    if($('#cboReport').val() == 0)



    {

      $('#divInventory').show('');
      $('#divSummaryReports').hide('');
      $('#divInventoryReports').show('');
      $('#divListofPublicationTitle').hide('');
      $('#divNumberofTitles').hide('');
      $('#divCatalogUncatalog').hide('');
    }

    else if ($('#cboReport').val() == 1)

    {   
      $('#divInventory').show('');
      $('#divSummaryReports').show('');
      $('#divInventoryReports').hide('');
      $('#divListofPublicationTitle').hide('');
      $('#divNumberofTitles').hide('');
      $('#divCatalogUncatalog').hide('');
    }

    else if ($('#cboReport').val() == 2)

    {   
      $('#divInventory').hide('');
      $('#divSummaryReports').hide('');
      $('#divInventoryReports').hide('');
      $('#divListofPublicationTitle').show('');
      $('#divNumberofTitles').hide('');
      $('#divCatalogUncatalog').hide('');
    }

    else if ($('#cboReport').val() == 3)

    {   
      $('#divInventory').hide('');
      $('#divSummaryReports').hide('');
      $('#divInventoryReports').hide('');
      $('#divListofPublicationTitle').hide('');
      $('#divNumberofTitles').show('');
      $('#divCatalogUncatalog').hide('');
    }


    else if ($('#cboReport').val() == 4)

    {   
      $('#divInventory').hide('');
      $('#divSummaryReports').hide('');
      $('#divInventoryReports').hide('');
      $('#divListofPublicationTitle').hide('');
      $('#divNumberofTitles').hide('');
      $('#divCatalogUncatalog').show('');
    }



  }


    $(".chkbox").change(function() 
  {
    if(this.checked) 
    {
      if(this.id == "chkBroadClass")
        $('#cboBroadClass').select2('destroy').find('option').prop('selected', 'selected').end().select2()

      if(this.id == "chkMaterialTypeCat")
        $('#cboMaterialTypeCat').select2('destroy').find('option').prop('selected', 'selected').end().select2()
    } 
    else 
    {
      if(this.id == "chkBroadClass")
        $('#cboBroadClass').select2('destroy').find('option').prop('selected', false).end().select2()

      if(this.id == "chkMaterialTypeCat")
        $('#cboMaterialTypeCat').select2('destroy').find('option').prop('selected', false).end().select2()
    }
  });


  $("#GeneratebyDate").datepicker({
    format: "MM-DD-YYYY",
    viewMode: "day", 
    autoclose: true,
    minViewMode: "day"
  });

  $("#fromPublication").datepicker({
  format: "yyyy",
  viewMode: "years", 
  autoclose: true,
  minViewMode: "years"
});

  $("#toPublication").datepicker({
  format: "yyyy",
  viewMode: "years", 
  autoclose: true,
  minViewMode: "years"
});


</script>



