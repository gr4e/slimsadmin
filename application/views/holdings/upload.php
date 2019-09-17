<?php
$tooltip = file_get_contents(base_url()."assets/tooltips/MultimediaTooltips.txt");
$tooltipArray = explode("\n", $tooltip);
$ctr = 0;
?>

<!-- Content Wrapper. Contains page content -->
<div   class="content-wrapper" id="divpublications"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Attachments
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('holdings/catalog');?>"><i class="fa fa-folder"></i>Catalog</a></li>
    <li class="active"><i class="fa fa-image"></i>Attachments</li>
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
                <table id="tblMultimedia" class="table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th >Multimedia ID</th>
                         <th >File Name</th>
                         <th >File Type</th> 
                         <th >File Location</th> 
                        <th >Attachment</th> 
                        <th >Action</th> 
                        <th style="width:150px">Restriction</th> 
                        
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
        <h3 class="box-title">Multimedia</h3>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-toggle="collapse" id="divcollapsemultimedia" data-target="#collapseExample"><i class="fa fa-plus"></i></button>

        </div>
      </div>

      <div class="collapsemultimedia" id="collapseExample">
        


        <form method="post" id="form_multimedia" align="" enctype="multipart/form-data">  

           <div class="box-body">

     

                      
                        <input name="MultimediaID" id="MultimediaID" type="hidden">

                      
                        
                        <input name="HoldingsID" id="HoldingsID" value="<?php echo $id ?>" type="hidden"/ >


                             <div class="box-body">
                       
                       
                                      <label>Upload Attachment</label>

                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <i class="fa fa-file-text-o"></i>
                                            </div>
                                          <input name="image_file" id="image_file" type="file" class="form-control" data-mask">
                                          <div class="input-group-addon recolor" rel="tooltip" title="<?php echo $tooltipArray[$ctr++]; ?>">
                                                   <i class="fa fa-lightbulb-o" style="width: 13px;"></i>
                                                </div>

                             
                                      </div> 
                              </div>


                               <div class="box-body">
                       
                                      

                                          <label>Restriction: </label>
                                          <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-check-square"></i>
                                          </div>
                                            <select field-type="Select" name="Restriction" id="Restriction" class="form-control select2" style="width: 25%;">
                         
                                                <option value="1">Restricted</option>
                                                <option value="0">Viewable</option>
                                                <option value="2">Downloadable</option>
                              
                                            </select>

                                            
                                            </div>
  

                                         
                                </div>

                                <input name="Restrict" type="hidden"  class ="form-control" id="Restrict"  />
                                <input name="Exist" type="hidden"  class ="form-control" id="Exist"  />




                        <div>
                         <div class="form-group pull-right">
                          <button type="submit" id="btnSubmit" onclick="" class="btn btn-primary">Submit</button>
                          <button action="cancel" onclick="clear_fields()" type="button" class="btn btn-default" data-dismiss="modal">Clear</button>
                         </div>
                        </div>
                  </div>


                   <br />  
                   <br />  
                   <div id="uploaded_image">  
                  </div> 


                       




        </form>
      </div>




  </div>


</div>




<script type="text/javascript">


        // Load DataTable
        $(document).ready(function() 
        {

          var table = $('#tblMultimedia').DataTable
          (

          {


    //"pageLength": 5,
    "scrollX": true,
    "ajax": 
    {
      url : "<?php echo site_url("holdings_controller/multimedia_datatable") ?>",
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
        title: 'Multimedia'
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
        filename: 'Multimedia'
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
        filename: 'Multimedia'
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
        filename: 'Multimedia'
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
      "orderable": false,
      'checkboxes': {
               'selectRow': true
            }


    }

    
    ],



 });
 


$("input").change(function()
{
$(this).parent().parent().removeClass('has-error');
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



function delete_fulltext_records(id){


  if(confirm('Are you sure you want to remove this attachment?')){

    $.ajax({
        data:{id:id}, 
        url : "<?php echo site_url('Holdings_controller/delete_fulltext')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          
          $('#tblMultimedia').DataTable().ajax.reload(null, false);
          toastr.success("Record deleted successfully.");
       
        }
    });
  }
}

function save_permission(id,restriction)

{

    $.ajax(
  {  
    url:"<?php echo site_url("holdings_controller/multimedia_edit")?>/"+id+restriction,
    method:"POST",  
    data:{id:id,restriction:restriction},  
    dataType:"json",  
    success:function(data)




  {




    $('#UploadName').val(data.UploadName);
    $('#Restrict').val(restriction);
    $('#Restrict').val(data.Restrict);





      if($('#Restrict').val()==1)

      {
        toastr.info("Permission for "+data.UploadName+" is changed to Viewable");
        

      }

       else if($('#Restrict').val()==2)

      {
        toastr.info("Permission for "+data.UploadName+" is changed to Downloadable");
            

      }

      else

      {


        toastr.info("Permission for "+data.UploadName+" is changed to Restricted");
       

      }



  }
    


  });

}




 $(document).ready(function(){  
      $('#form_multimedia').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                 toastr.error("Select file to upload!"); 
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Holdings_controller/multimedia_create",
                     method:"POST",  
                     dataType: 'json',
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,
                     success:function(data)  

                     {  
                        toastr.success("File is successfully uploaded"); 
                          $('#tblMultimedia').DataTable().ajax.reload(null, false); 
                           $('#image_file').val('');

                     },


                       error: function( error )
                      {
                        toastr.error("Please check file type or file size"); 
                      }
                      

                });  

                
           }  
      });  


    
 });  








</script>


