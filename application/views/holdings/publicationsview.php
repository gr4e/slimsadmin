<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/PublicationsTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>


<!-- Content Wrapper. Contains page content -->
<div   class="content-wrapper" id="divpublications"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Publications
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
      <li class="active"><i class="fa fa-users"></i>Publications</li>
    </ol>
  </section>
  <br>


  <!-- Data Table -->
  <div class="box box-default" >
    <div class="box-header with-border">
      <h3 class="box-title" ><?php echo $id ?></h3> <h3 class="box-title" > <b> - <?php echo $title ?> </b></h3> 

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box-body">
              <table id="tblPublications" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th rowspan="1">Publication ID</th>
                    <th rowspan="1">Publication</th>
                    <th rowspan="1">Publication Year</th>


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
      <h3 class="box-title">Publication Data Entry</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapseauthor" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

      </div>
    </div>

    <div class="collapsepublications" id="collapseExample">
      <form id="form" >

        <div class="box-body">


          <!-- Publications ID -->
          <input name="PublicationID" id="PublicationID" hidden="hidden">

          <!-- Holdings ID -->
          <input name="HoldingsID" id="HoldingsID" hidden="" value="<?php echo $id ?>"/>




          <div class="box-body">

            <label>List of Imprint</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i>264</i>
              </div>
              <select class="form-control select2" id="cboListForImprint" name="cboListForImprint" style="width: 100%; ">
                <option selected="selected" value="#">Not Applicable/Not provided/Earliest</option>
                <option value="2">Intervening</option>
                <option value="3">Current/Last</option>
              </select>

              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
              </div>


            </div> 
          </div>  

          <div class="box-body">

            <label>List of Type of Imprint</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i>264</i>
              </div>
              <select class="form-control select2" id="cboListForTypeOfImprint" name="cboListForTypeOfImprint"style="width: 100%; ">
                <option value="0">Production</option>
                <option selected="selected" value="1">Publication</option>
              </select>


              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
              </div>


            </div> 
          </div>

          <div class="box-body">

            <label>Place of Production, Publication, Distribution, Manufacture </label>

            <div class="input-group">
              <div class="input-group-addon">
                <i>260a</i>
              </div>
              <input name="PublicationPlace" id="PublicationPlace" type="text" class="form-control" data-mask">

              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
              </div>


            </div> 
          </div>

          <div class="box-body">

            <label>Name of Producer, Publisher, Distributor, Manufacturer  </label>

            <div class="input-group">
              <div class="input-group-addon">
                <i>260b</i>
              </div>
              <input name="Publisher" id="Publisher" type="text" class="form-control redph" data-mask">
              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
              </div>


            </div> 
          </div>

          <div class="box-body">

            <label>Date of Production, Publication, Distribution, Manufacture, or Copyright Notice  </label>

            <div class="input-group">
              <div class="input-group-addon">
                <i>260c</i>
              </div>
              <input name="PublicationDate" id="PublicationDate" type="text" class="form-control" data-mask">
              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++].$tooltipArray[$ctr++].$tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 10%;"></i>
              </div>


            </div> 
          </div>

          <div>
            <div class="form-group pull-right">
              <button type="button" onclick="save_record_publications()" id="btnSubmit" class="btn btn-primary"><label id="lblSubmit">Submit
                </label></button>
              <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
              <button action="cancel" onclick="delete_publication_records()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>







      </form>
    </div>




  </div>


</div>



<script type="text/javascript">



//Load DataTable
$(document).ready(function() {
  $('#tblPublications').DataTable({

    "scrollX": true,
    "ajax": 
    {
      url : "<?php echo site_url("holdings_controller/publications_datatable") ?>",
      type : 'POST',
      data:{id:$('#HoldingsID').val()},
      dataType:"json"
    },
    "dom": 'Bfrtip',
    "buttons": 
    [
    {
      extend: 'copy',
      exportOptions: 
      {
        columns: [':visible :not(:last-child)']
      },
      text:      '',
      titleAttr: 'Copy',
      className:'opt_icon opt_icon1c',
      title: 'Publications'
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
      filename: 'Publications'
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
      filename: 'Publications'
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
      filename: 'Publications'
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
    "columnDefs": 
    [
    {
      "targets": [-1],
      "orderable": false
    }
    ]
  })


  $("input").change(function()
  {
    $(this).parent().parent().removeClass('has-error');
// $(this).next().empty();
});

});

//End Load Datatable



$(document).ready(function(){
  $("#collapseExample").on("hide.bs.collapse", function(){
    $("#divcollapse").html('<i class="fa fa-plus"></i>');
  });
  $("#collapseExample").on("show.bs.collapse", function(){
    $("#divcollapse").html('<i class="fa fa-minus"></i>');
  });
});


//Load record to edit
function edit_publications(id){
  scroll_top();

  $('#lblSubmit').text("Save");

  if(!$( "#form" ).is( ":visible" ))
    $('#divcollapse').click();

  $.ajax({  
    url:"<?php echo site_url("holdings_controller/publications_edit")?>/"+id,
    method:"POST",  
    data:{id:id},  
    dataType:"json",  
    success:function(data){ 

      $('#HoldingsID').val(data.HoldingsID);
      $('#PublicationID').val(data.PublicationID);
      $('#cboListForImprint').val(data.cboListForImprint).change(); 
      $('#cboListForTypeImprint').val(data.cboListForTypeImprint).change();
      $('#PublicationPlace').val(data.PublicationPlace); 
      $('#Publisher').val(data.Publisher);
      $('#PublicationDate').val(data.PublicationDate);  
    }


  });

}


function save_record_publications() {

  $.ajax({

    url:"<?php echo site_url("holdings_controller/publications_create")?>", 
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",  
    success:function(data)




    {

      if(data.status){



        $('#tblPublications').DataTable().ajax.reload(null, false);
        toastr.success("Record saved successfully.");
        clear_fields();
        scroll_top();
        $('input').parent().parent().removeClass('has-error');

      }

      else {


        for (var i = 0; i < data.inputerror.length; i++) {

          $('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);
        }


        toastr.warning("Please fill up all required fields.");

        scroll_top();


      }
    }

  });


}


function delete_publication_records(){

  if(confirm('Are you sure you want to delete this record?')){

    var id = $('#PublicationID').val();
    var hid = $('#HoldingsID').val();


    $.ajax({
      data:{id:id, hid:hid},
      url : "<?php echo site_url('holdings_controller/delete_publications')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data){


        $('#tblPublications').DataTable().ajax.reload(null, false);
        scroll_top();
        clear_fields();
        toastr.success("Record deleted successfully.");

      }
    });
  }
}




//Function to Scroll top
function scroll_top(){
  $('html,body').animate(
  {
    scrollTop: $(".entry").offset().top
  },'slow');

}

function delete_records(){

  if(confirm('Are you sure you want to delete this record?')){

    var id = $('#PublicationID').val();
    $.ajax({
      data:"id="+id,
      url : "<?php echo site_url('holdings_controller/delete_publications')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
        toastr.success("Record deleted successfully.");

      }
    });
  }
}


//Clear fields
function clear_fields(){

  $('#form')[0].reset();
  $('#cboListForImprint').val('0').change();
  $('#cboListForTypeImprint').val('0').change();

  $('#tblPublications').DataTable().ajax.reload(null, false);
  $('#lblSubmit').text("Submit");
  scroll_top();

}


</script>


<style type="text/css">
table tr td:nth-child(2) {
  cursor: pointer;
}
</style>