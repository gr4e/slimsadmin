<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/FrontpageTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>

<!-- Content Wrapper. Contains page content -->
<div   class="content-wrapper" id="divfrontpage"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cover Page
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
      <li class="active"><i class="fa fa-image"></i>Frontpage</li>
    </ol>
  </section>
  <br>



  <div class="box box-default" id="divRefresh" >
    <div class="box-header with-border">

      <h3 class="box-title" ><?php echo $id ?></h3> <h3 class="box-title" > <b> - <?php echo $title ?> </b></h3>

      <input name="FrontPage1" id="FrontPage1" value="<?php echo $frontpage ?>" type="hidden" ">


      <div id="divFrontPageDisplay">
        <center><embed src="<?php echo base_url().""; ?>/<?php echo $frontpage ?>" class="responsive" height="400px" width="30%"> </embed></center>
      </div>
    </div>

  </div>





  <!-- Upload -->
  <div class="box box-default entry">
    <div class="box-header with-border">
      <h3 class="box-title">Upload Cover Page</h3>


      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapsefrontpage" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

      </div>
    </div>

    <div class="collapsemultimedia" id="collapseExample">
      <form method="post" id="form_frontpage" align="" enctype="multipart/form-data">  

        <div class="box-body">




          <input name="AcquisitionID" id="AcquisitionID" value="<?php echo $aid ?>" type="hidden" "/ >
          <input name="HoldingsID" id="HoldingsID" value="<?php echo $id ?>" type="hidden" "/ >
          <input name="FrontPageID" id="FrontPageID" value="<?php echo $frontpageid ?>" type="hidden" >


          <div class="box-body">


            <label>Upload Cover Page</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-file-text-o"></i>
              </div>
              <input name="FrontPage" id="FrontPage" type="file" multiple class="form-control" data-mask">
              <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
              </div>


            </div> 
          </div>              

          <div>
            <div class="form-group pull-right">
              <button type="submit" id="btnSubmit" onclick="" class="btn btn-primary">Submit</button>
              <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
              <button action="cancel" onclick="delete_frontpage_record()" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>


        <br />  
        <br />  








      </form>
    </div>




  </div>


</div>


<script type="text/javascript">

  function delete_frontpage_record(){

    var id=$('#FrontPageID').val();


    $.ajax({
      data:{id:id}, 
      url : "<?php echo site_url('Holdings_controller/delete_frontpage')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {

        document.location.reload(true)

      }
    });


  }





  if(($('#FrontPage1').val()!=0)){
    $('#divFrontPageDisplay').show();

  }
  else{
    $('#divFrontPageDisplay').hide();
  }

  function display(){

    $('#divFrontPageDisplay').show();

  }
  $(document).ready(function(){  
    $('#form_frontpage').on('submit', function(e){  
      e.preventDefault();  


      if($('#FrontPage').val() == '' )  {  
        toastr.error("Select file to upload!");
      }  
      else  {  
        $.ajax({  
          url:"<?php echo base_url(); ?>Holdings_controller/frontpage_update",
          method:"POST",  
          dataType: 'json',
          data:new FormData(this),  
          contentType: false,  
          cache: false,  
          processData:false,
          success:function(data)  
          {  
            if(data.status == 'success')
            {
              toastr.success(data.message);

              $('#divFrontPageDisplay').load(document.URL +  ' #divFrontPageDisplay');
              display();
              

            } 
            else if(data.status == 'error')
            {
              toastr.error(data.message);
            }
          }




        });  

      }

    });  





  });  


</script>



