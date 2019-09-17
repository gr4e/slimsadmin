<div class="content-wrapper">
  <section class="content-header">
    <h1>CMS Data Libraries</h1>
  </section>
  <div class="box-header with-border">
  </div>


  <div class="col-md-5">
    <h3>TOPICS</h3>
    <div class="col-sm-12">
      <form class="form-inline" style="margin-bottom: 0;">
        <div class="form-group">
          <input type="text" class="form-control" id="newTopicTxt" placeholder="New Broad Class / Subject">
        </div>
        <button type="button" class="btn btn-success" onclick="addTopic();" id="addTopicBtn">Add</button>
      </form>

    </div>

    <table class="table table-hover" style="width: 100%;" id="tableBroadClass">
      <thead>
        <tr>
          <th>Broad Class / Subject</th>
        </tr>
      </thead>
      <tbody>

        <?php for ($i=0; $i < count($topicList); $i++) { ?>
          <tr>
            <td><?php echo $topicList[$i]->BroadClass; ?>
              <button type="button" class="btn btn-danger" style="float: right;" onclick="DelTopic('<?php echo $topicList[$i]->BroadClassID; ?>');">DELETE</button>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>

  </div>



  <div class="col-lg-5">
    <h3>Carousel Data</h3>
    <div class="col-sm-12">
      <form class="" action="<?php echo base_url(); ?>index.php/Cms_controller/changeCarouselData" method="post">
        <div class="col-sm-12">
        <button type="submit" name="button" class="btn btn-success">APPLY</button>
        </div>

        <div class="col-sm-4">
          <h4>First Rotation</h4>
          <input type="text" name="caroData0" class="form-control carousel_inputs" value="<?php echo $carouselList['0']->HoldingsID; ?>">
          <input type="text" name="caroData1" class="form-control carousel_inputs" value="<?php echo $carouselList['1']->HoldingsID; ?>">
          <input type="text" name="caroData2" class="form-control carousel_inputs" value="<?php echo $carouselList['2']->HoldingsID; ?>">
          <input type="text" name="caroData3" class="form-control carousel_inputs" value="<?php echo $carouselList['3']->HoldingsID; ?>">
        </div>

        <div class="col-sm-4">
          <h4>Second Rotation</h4>
          <input type="text" name="caroData4" class="form-control carousel_inputs" value="<?php echo $carouselList['4']->HoldingsID; ?>">
          <input type="text" name="caroData5" class="form-control carousel_inputs" value="<?php echo $carouselList['5']->HoldingsID; ?>">
          <input type="text" name="caroData6" class="form-control carousel_inputs" value="<?php echo $carouselList['6']->HoldingsID; ?>">
          <input type="text" name="caroData7" class="form-control carousel_inputs" value="<?php echo $carouselList['7']->HoldingsID; ?>">
        </div>

        <div class="col-sm-4">
          <h4>Third Rotation</h4>
          <input type="text" name="caroData8" class="form-control carousel_inputs" value="<?php echo $carouselList['8']->HoldingsID; ?>">
          <input type="text" name="caroData9" class="form-control carousel_inputs" value="<?php echo $carouselList['9']->HoldingsID; ?>">
          <input type="text" name="caroData10" class="form-control carousel_inputs" value="<?php echo $carouselList['10']->HoldingsID; ?>">
          <input type="text" name="caroData11" class="form-control carousel_inputs" value="<?php echo $carouselList['11']->HoldingsID; ?>">
        </div>


      </form>
    </div>
  </div>



</div><!-- end content wrapper -->

<script type="text/javascript">


$(document).on('keypress',function(e) {
  if(e.which == 13) {
    $('#addTopicBtn').trigger('click');
  }
});


function addTopic(){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {newTopicTxt: $("#newTopicTxt").val()},
    url: "<?php echo base_url(); ?>Cms_controller/addNewTopic",
    success: function(data){
      swal('Success!', 'Added new topic', 'success');
      setTimeout(function(){ location.reload(); }, 1500);
    }
  });
}


function DelTopic(id){
  $.ajax({
    type: "POST",
    dataType: "json",
    data: {topicID: id},
    url: "<?php echo base_url(); ?>Cms_controller/delTopic",
    success: function(data){
      swal('Success!', 'Topic deleted', 'success');
      setTimeout(function(){ location.reload(); }, 1500);
    }
  });
}


$(document).ready( function () {

<?php if(!empty($SuccessMsg)){ ?>
  toastr.success('<?php echo $SuccessMsg; ?>');
<?php } ?>

  //datatable
  $('#tableBroadClass').DataTable({
    "ordering": false,
    "lengthChange": false
  });

});

</script>
