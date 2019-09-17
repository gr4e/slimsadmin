<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/SubjectsTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>


<!-- Content Wrapper. Contains page content -->
<div   class="content-wrapper" id="divauthor"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Subjects
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
      <li class="active"><i class="fa fa-folder-open"></i>Subject</li>
    </ol>
  </section>
  <br>

  <!-- Data Table -->
  <div class="box box-default" >
    <div class="box-header with-border">
      <h3 class="box-title" ><?php echo $id ?></h3> <h3 class="box-title" > <b> - <?php echo $title ?> </b></h3> 

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box-body">
              <table id="tblSubjects" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th rowspan="1">Subject Type</th>
                    <th rowspan="1">Subject Heading</th>
                  </tr> 

                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    </div>
    <div class="box-footer">
    </div>   
  </div>
  <!-- End Data Table -->


  <!-- Main content -->
  <div class="box box-default entry">
    <div class="box-header with-border">
      <h3 class="box-title">Subjects Data Entry</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapsesubject" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

      </div>
    </div>

    <div class="collapsesubjects" id="collapseExample">

      <form id="form" >

        <input name="HoldingsID" id="HoldingsID" hidden="hidden" value="<?php echo $id ?>"/>




        <div class="box-body">


          <label class="col-sm-3">Subject</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-fw fa-file-text"></i>
            </div>
            <select field-type="Select" value="650" name="cboSubject" id="cboSubject" class="form-control select2" style="width: 100%;"> 


              <option value="650">Topical Term</option>
              <option value="600">Personal Name</option>
              <option value="610">Corporate Name</option>
              <option value="611">Meeting/Conference</option>
              <option value="630">Uniform Title</option>
              <option value="651">Geographic</option>



            </select>

            <!-- /.box-body -->
          </div>

        </div>

        <div id="divTopical" style="" class="">
          <div class="box">
            <div class="form-group">

              <!-- Subject Entry -->
              <div class="box-header with-border">

                <input name="SubjectID" id="SubjectID" type="hidden">

                <h4 >Topical Term</h4>
                <div class="box-body">
                  <label class="col-sm-3"> Topical Term Subject Heading </label>
                  <div class="input-group">
                    <div class="input-group-addon" >
                      <i>650a</i>
                    </div>
                    <input name="TopicalTermSubjectHeading650" id="TopicalTermSubjectHeading650" type="text" class="form-control" data-mask">
                    <div class="input-group-addon">
                      <i class="fa fa-lightbulb-o"></i>
                    </div>

                    <!-- /.input group -->
                  </div>
                  <!-- /.box body -->
                </div>

                <div class="box-body">
                  <label class="col-sm-3">Subject Subdivision</label>
                  <div class="input-group">
                    <div class="input-group-addon" >
                      <i>650x</i>
                    </div>
                    <input name="SubjectSubdivision650" id="SubjectSubdivision650" type="text" class="form-control" data-mask">
                    <div class="input-group-addon">
                      <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.box body -->
                </div>

                <div class="box-body">
                  <label class="col-sm-3">Form Subdivision </label>
                  <div class="input-group">
                    <div class="input-group-addon" >
                      <i >650v</i>
                    </div>

                    <input name="FormSubdivision650" id="FormSubdivision650" type="text" class="form-control" data-mask">
                    <div class="input-group-addon">
                      <i class="fa fa-lightbulb-o"></i>
                    </div>



                    <!-- /.input group -->
                  </div>
                  <!-- /.box body -->
                </div>

                <div class="box-body">
                  <label class="col-sm-3">Subject Chronology</label>
                  <div class="input-group">
                    <div class="input-group-addon" >
                      <i>650y</i>
                    </div>

                    <input name="SubjectChronology650" id="SubjectChronology650" type="text" class="form-control" data-mask"> 
                    <div class="input-group-addon">
                      <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.box body -->
                </div>

                <div class="box-body">
                  <label class="col-sm-3">Heading Geography</label>
                  <div class="input-group">
                    <div class="input-group-addon" >
                      <i>650z</i>
                    </div>

                    <input name="HeadingGeography650" id="HeadingGeography650" type="text" class="form-control" data-mask"> 
                    <div class="input-group-addon">
                      <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.box body -->
                </div>



                <!-- /.div drop down-->
              </div>

              <!-- /.collapsible box body-->
            </div>

          </div>

        </div>



        <div id="divPersonal" style="display: none;" class="">

          <div class="box">

            <div class="form-group">



              <div class="box-header with-border">


                <h4 >Personal Name</h4>


                <div class="box-body">


                  <div class="box-body">
                    <label class="col-sm-3">Personal Name Subject Heading</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600a</i>
                      </div>


                      <input name="PersonalNameSubjectHeading600" id="PersonalNameSubjectHeading600" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>

                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Titles and other words associated with a name</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600c</i>
                      </div>
                      <input name="TitlesandOtherWordsAssociatedwithaName600" id="TitlesandOtherWordsAssociatedwithaName600" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Subject Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600x</i>
                      </div>

                      <input name="SubjectSubdivision600"  id="SubjectSubdivision600" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>



                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Form Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600v</i>
                      </div>

                      <input name="FormSubdivision600" id="FormSubdivision600" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Chronological Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600y</i>
                      </div>

                      <input name="ChronologicalSubdivision600" id="ChronologicalSubdivision600" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Geographic Subdivision </label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>600z</i>
                      </div>

                      <input name="GeographicSubdivision600" id="GeographicSubdivision600" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>








                  <!-- /.div drop down-->
                </div>

                <!-- /.collapsible box body-->
              </div>

            </div>

          </div>

        </div>

        <div id="divCorporate" style="display: none;" class="">

          <div class="box">

            <div class="form-group">
              <div class="box-header with-border">


                <h4 >Corporate Name</h4>         



                <div class="box-body">


                  <div class="box-body">
                    <label class="col-sm-3"> Corporate Name Subject Heading</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i >610a</i>
                      </div>


                      <input name="CorporateNameSubjectHeading610" id="CorporateNameSubjectHeading610" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>

                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Corporate Name Subordinate Unit</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>610b</i>
                      </div>
                      <input name="CorporateNameSubordinateUnit610" id="CorporateNameSubordinateUnit610" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">General Subdivision </label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>610x</i>
                      </div>

                      <input name="GeneralSubdivision610" id="GeneralSubdivision610" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>



                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Form Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>610v</i>
                      </div>

                      <input name="FormSubdivision610" id="FormSubdivision610" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Chronological Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>610y</i>
                      </div>

                      <input name="ChronologicalSubdivision610" id="ChronologicalSubdivision610" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Geographic Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>610z</i>
                      </div>

                      <input name="GeographicSubdivision610" id="GeographicSubdivision610" type="text" class="form-control" data-mask"> 
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>


                  <!-- /.div drop down-->
                </div>

                <!-- /.collapsible box body-->
              </div>

            </div>

          </div>
        </div>

        <div id="divMeetingConference" style="display: none;" class="">
          <div class="box">
            <div class="form-group">



              <div class="box-header with-border">


                <h4 >Meeting / Conference</h4>                                      

                <div class="box-body">


                  <div class="box-body">
                    <label class="col-sm-3">Meeting/Conference Name Subject Heading</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>611a</i>
                      </div>


                      <input name="MeetingConferenceNameSubjectHeading611" id="MeetingConferenceNameSubjectHeading611" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>

                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Date</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>611d</i>
                      </div>
                      <input name="Date611" id="Date611" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Location</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>611c</i>
                      </div>

                      <input name="Location611"  id="Location611" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>



                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>


                  <!-- /.div drop down-->
                </div>

                <!-- /.collapsible box body-->
              </div>

            </div>
          </div>

        </div>


        <div id="divUniformTitle" style="display: none;" class="">

          <div class="box">
            <div class="form-group">
              <div class="box-header with-border">




                <h4 >Uniform Title</h4>


                <div class="box-body">


                  <div class="box-body">
                    <label class="col-sm-3">Uniform Title Subject Heading</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>630a</i>
                      </div>


                      <input name="UniformTitleSubjectHeading630" id="UniformTitleSubjectHeading630" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>

                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Subject Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>630x</i>
                      </div>
                      <input name="SubjectSubdivision630" id="SubjectSubdivision630" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Form Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>630v</i>
                      </div>

                      <input name="FormSubdivision630"  id="FormSubdivision630" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>



                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>


                  <!-- /.div drop down-->
                </div>

                <!-- /.collapsible box body-->
              </div>

            </div>

          </div>

        </div>

        <div id="divGeographic" style="display: none;" class="">
          <div class="box">
            <div class="form-group">



              <div class="box-header with-border">


                <h4 >Geographic</h4>


                <div class="box-body">


                  <div class="box-body">
                    <label class="col-sm-3">Geographic Name Subject Heading</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>651a</i>
                      </div>


                      <input name="GeographicNameSubjectHeading651" id="GeographicNameSubjectHeading651" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>

                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Geographic Name Subject Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>651x</i>
                      </div>
                      <input name="GeographicNameSubjectSubdivision651" id="GeographicNameSubjectSubdivision651" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>

                  <div class="box-body">
                    <label class="col-sm-3">Form Subdivision</label>
                    <div class="input-group">
                      <div class="input-group-addon" >
                        <i>651v</i>
                      </div>

                      <input name="FormSubdivision651"  id="FormSubdivision651" type="text" class="form-control" data-mask">
                      <div class="input-group-addon">
                        <i class="fa fa-lightbulb-o"></i>
                      </div>



                      <!-- /.input group -->
                    </div>
                    <!-- /.box body -->
                  </div>


                  <!-- /.div drop down-->
                </div>

                <!-- /.collapsible box body-->
              </div>

            </div>

          </div>

        </div>





      </div>




      <div class="box-body" id="divSubmit" style="">
        <div class="form-group pull-right">

          <button type="button" onclick="save_record_subjects()" id="btnSubmit" class="btn btn-primary"><label id="lblSubmit">Submit</label></button>
          <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
          <button action="cancel" onclick="delete_subjects_records()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
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



// Load DataTable
$(document).ready(function() {
  $('#tblSubjects').DataTable({
    "scrollX": true,
    "ajax": {
      url : "<?php echo site_url("holdings_controller/subjects_datatable") ?>",
      type : 'POST',
      data:{id:$('#HoldingsID').val()},
      dataType:"json" 
    },
    "dom": 'Bfrtip',
    "buttons": [{
      extend: 'copy',
      exportOptions: {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      titleAttr: 'Copy',
      className:'opt_icon opt_icon1c',
      title: 'Holdings'
    }, 
    {
      extend: 'csv',
      exportOptions: 
      {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      titleAttr: 'CSV',
      className:'opt_icon opt_icon2c',
      filename: 'Holdings'
    },  
    {
      extend: 'excel',
      exportOptions: 
      {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      titleAttr: 'Excel',
      className:'opt_icon opt_icon3c',
      filename: 'Holdings'
    },  
    {
      extend: 'pdf',
      exportOptions: 
      {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      titleAttr: 'PDF',
      className:'opt_icon opt_icon4c',
      filename: 'Holdings'
    },  
    {
      extend: 'print',
      exportOptions: 
      {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      className:'opt_icon opt_icon5',
      titleAttr: 'Print'
    }
    ],
    "columnDefs": [{
      "targets": [-1],
      "orderable": false
    }
    ]
  });

  $("input").change(function(){
    $(this).parent().parent().removeClass('has-error');
  });
});
//End Load Datatable

$(document).ready(function(){
  $("#collapseExample").on("hide.bs.collapse", function(){
    $("#divcollapsesubject").html('<i class="fa fa-plus"></i>');
  });
  $("#collapseExample").on("show.bs.collapse", function(){
    $("#divcollapsesubject").html('<i class="fa fa-minus"></i>');
  });
});


//Load record to edit
function edit_subjects(id,iSubjects){
  scroll_top();





  $('#lblSubmit').text("Save");
  if(!$( "#form" ).is( ":visible" ))
    $('#divcollapse').click();




  $.ajax({  

    url:"<?php echo site_url("holdings_controller/subjects_edit")?>/",



    method:"POST",  
    data:{id:id, iSubjects:iSubjects },  
    dataType:"json",  
    success:function(data){
      $('#SubjectID').val(data.SubjectID);
      $('#HoldingsID').val(data.HoldingsID);
      $('#cboSubject').val(data.cboSubject).change();


      if (iSubjects=650){

        $('#TopicalTermSubjectHeading650').val(data.TopicalTermSubjectHeading650);
        $('#SubjectSubdivision650').val(data.SubjectSubdivision650);
        $('#FormSubdivision650').val(data.FormSubdivision650);
        $('#SubjectChronology650').val(data.SubjectChronology650);
        $('#HeadingGeography650').val(data.HeadingGeography650);


      }    


      if (iSubjects=600){

        $('#PersonalNameSubjectHeading600').val(data.PersonalNameSubjectHeading600);
        $('#TitlesandOtherWordsAssociatedwithaName600').val(data.TitlesandOtherWordsAssociatedwithaName600);
        $('#SubjectSubdivision600').val(data.SubjectSubdivision600);
        $('#FormSubdivision600').val(data.FormSubdivision600); 
        $('#ChronologicalSubdivision600').val(data.ChronologicalSubdivision600);
        $('#GeographicSubdivision600').val(data.GeographicSubdivision600);

      }


      if (iSubjects=610){

        $('#CorporateNameSubjectHeading610').val(data.CorporateNameSubjectHeading610);
        $('#CorporateNameSubordinateUnit610').val(data.CorporateNameSubordinateUnit610);
        $('#GeneralSubdivision610').val(data.GeneralSubdivision610);
        $('#FormSubdivision610').val(data.FormSubdivision610);
        $('#ChronologicalSubdivision610').val(data.ChronologicalSubdivision610);
        $('#GeographicSubdivision610').val(data.GeographicSubdivision610);

      }




      if (iSubjects=611){


        $('#MeetingConferenceNameSubjectHeading611').val(data.MeetingConferenceNameSubjectHeading611);
        $('#Date611').val(data.Date611);
        $('#Location611').val(data.Location611);

      }

      if (iSubjects=630){


        $('#UniformTitleSubjectHeading630').val(data.UniformTitleSubjectHeading630);
        $('#SubjectSubdivision630').val(data.SubjectSubdivision630);
        $('#FormSubdivision630').val(data.FormSubdivision630);

      }

      if (iSubjects=651){


        $('#GeographicNameSubjectHeading651').val(data.GeographicNameSubjectHeading651);
        $('#GeographicNameSubjectSubdivision651').val(data.GeographicNameSubjectSubdivision651);
        $('#FormSubdivision651').val(data.FormSubdivision651);

      }



    }


  });

}

function save_record_subjects(){

  $.ajax({

    url:"<?php echo site_url("Holdings_controller/subjects_create")?>", 
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",  
    success:function(data){

      if(data.status){
        $('#tblSubjects').DataTable().ajax.reload(null, false);
        toastr.success("Record saved successfully.");
        scroll_top();
        clear_fields();
        $('input').parent().parent().removeClass('has-error');

      }

      else {

        scroll_top();

        toastr.error('Subject is not successfully saved!')
      }

    }

  });


}


function delete_subjects_records(){


  if($('#SubjectID').val()!=""){ 

    if(confirm('Are you sure you want to delete this record?')){

      var id = $('#SubjectID').val();
      var hid = $('#HoldingsID').val();
      $.ajax({
        data:{id:id, hid:hid},
        url : "<?php echo site_url('Holdings_controller/delete_subjects')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          $('#tblSubjects').DataTable().ajax.reload(null, false);
          clear_fields();
          toastr.success("Record deleted successfully.");

        }
      });
    }
  }

  else{
    alert("Please select a record.");
  }

}

//Clear fields
function clear_fields(){

  $('#form')[0].reset();
  $('#cboSubject').val('650').change();

  $('#lblSubmit').text("Submit");

  scroll_top();

}





$(document).ready(function() {    
  $('#cboSubject').change(function() {
    if($('#cboSubject').val() == 650){
      $('#divSubmit').show();
      $('#divMeetingConference').hide('slow');
      $('#divUniformTitle').hide('slow');
      $('#divCorporate').hide('slow');
      $('#divPersonal').hide('slow');
      $('#divGeographic').hide('slow');
      $('#divTopical').show('slow');



    } 
    else if ($('#cboSubject').val() == 610){   
      $('#divSubmit').show();
      $('#divMeetingConference').hide('slow');
      $('#divUniformTitle').hide('slow');
      $('#divPersonal').hide('slow');
      $('#divTopical').hide('slow');
      $('#divGeographic').hide('slow');
      $('#divCorporate').show('slow');

    }
    else if ($('#cboSubject').val() == 600){   
      $('#divSubmit').show();
      $('#divMeetingConference').hide('slow');
      $('#divUniformTitle').hide('slow');
      $('#divTopical').hide('slow');
      $('#divGeographic').hide('slow');
      $('#divCorporate').hide('slow');
      $('#divPersonal').show('slow');

    }
    else if ($('#cboSubject').val() == 611){   
      $('#divSubmit').show();
      $('#divUniformTitle').hide('slow');
      $('#divPersonal').hide('slow');
      $('#divTopical').hide('slow');
      $('#divCorporate').hide('slow');
      $('#divGeographic').hide('slow');
      $('#divMeetingConference').show('slow');


    }
    else if ($('#cboSubject').val() == 630){    
      $('#divSubmit').show();
      $('#divPersonal').hide('slow');
      $('#divTopical').hide('slow');
      $('#divCorporate').hide('slow');
      $('#divMeetingConference').hide('slow');
      $('#divGeographic').hide('slow');
      $('#divUniformTitle').show('slow');

    }
    else if ($('#cboSubject').val() == 651){    
      $('#divSubmit').show();
      $('#divPersonal').hide('slow');
      $('#divTopical').hide('slow');
      $('#divCorporate').hide('slow');
      $('#divMeetingConference').hide('slow');
      $('#divUniformTitle').hide('slow');
      $('#divGeographic').show('slow');

    }
    else if($('#cboSubject').val() == ''){
      $('#divPersonalAuthor').hide('slow');
      $('#divCorporateAuthor').hide('slow');
      $('#divAddedPersonal').hide('slow');
      $('#divAddedCorporate').hide('slow');
      $('#divSubmit').hide();
    }
  });
});



//Function to Scroll top
function scroll_top(){
  $('html,body').animate({
    scrollTop: $(".entry").offset().top
  },'slow');

}


</script>


<style type="text/css">
table tr td:nth-child(2) {
  cursor: pointer;
}
</style>