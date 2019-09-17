<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Return Material</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <!-- Main content -->


<?php if(!empty($returnList)){ ?>

  <div class="col-md-6">

    <table class="table table-hover">
      <thead>
        <th>Reference No.</th>
        <th>Served To</th>
        <th>Served By</th>
      </thead>

      <tbody>
        <?php for ($i=0; $i < count($returnList) ; $i++) { ?>
          <tr>
            <td><?php echo $returnList[$i]->brwdIDHeader; ?></td>
            <td><?php echo $returnList[$i]->FullName; ?></td>
            <td><?php echo $returnList[$i]->LibrarianName; ?></td>
            <td><button class="btn btn-info" onclick="ReturnDetails('<?php echo $returnList[$i]->brwdIDHeader; ?>');">Details</button></td>
          </tr>
        <?php } ?>
      </tbody>

    </table>


    <!-- pagination -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <?php echo $pagination; ?>
      </div>
    </div>
    <!-- end pagination -->

    <div id="testDiv">

    </div>

  </div> <!-- reservation table left -->



  <div class="col-md-6" id="retrnListDiv">

  </div>
<?php }else{ ?>
  <h2>No current material/s for return.</h2>
<?php } ?>

  <!-- /.content -->

</div>



<script type="text/javascript">


function accptRtrn(id){
  var checkedValue = "";
  var inputElements = document.getElementsByClassName('chkBox');
  for(var i=0; inputElements[i]; ++i){
    if(inputElements[i].checked){
      checkedValue += inputElements[i].value+" ";
    }
  }

  if(checkedValue){
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {chckedMats: checkedValue, brwdID:id},
      url: "<?php echo base_url(); ?>Circulations_controller/returnMaterialChngStatus"
    }).done(function(data){
      swal("Success!", "Material/s successfully Returned!", "success");

      setTimeout(function(){
        window.location.href = "<?php echo base_url(); ?>Returns";
      }, 1500);

    });

  }else{
    swal("Please check!", "No material selected to be returned.", "warning");
  }



}


function ReturnDetails(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {brwdID: id},
    url: "<?php echo base_url(); ?>Circulations_controller/returnList"
  }).done(function(data){
    $("#retrnListDiv").html(data.retnList);
  });

}



</script>
