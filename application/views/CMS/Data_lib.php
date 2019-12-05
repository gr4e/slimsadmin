<div class="content-wrapper">
  <section class="content-header">
    <h1>CMS Data Libraries</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'topics');" id="defaultOpen">Topics</button>
    <button class="tablinks" onclick="openTab(event, 'publine');">Publication Line</button>
    <button class="tablinks" onclick="openTab(event, 'mats');">Featured Materials</button>
  </div>

  <div id="topics" class="tabcontent col-lg-7">
    <div class="col-sm-12" style="margin-top:20px;">
      <form class="form-inline" style="margin-bottom: 0;">
        <div class="form-group">
          <input type="text" class="form-control" value="" id="newTopicTxt" placeholder="New Broad Class / Subject">
        </div>
        <button type="button" class="btn btn-success" onclick="addTopic(document.getElementById('newTopicTxt').value);" id="addTopicBtn">Add</button>
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


  <div id="publine" class="tabcontent col-lg-7">

    <h3>Publication Line</h3>
    <div class="col-sm-12">
      <form class="form-inline" style="margin-bottom: 0;">
        <div class="form-group">
          <input type="text" class="form-control" id="newPubLine" placeholder="New Publication Line">
        </div>
        <button type="button" class="btn btn-success" onclick="addPubLine(document.getElementById('newPubLine').value);" id="addPubBtn">Add</button>
      </form>

    </div>

    <table class="table table-hover" style="width: 100%;" id="tablePub">
      <thead>
        <tr>
          <th>Publication Line</th>
        </tr>
      </thead>
      <tbody>

        <?php for ($i=0; $i < count($pubList); $i++) { ?>
          <tr>
            <td><?php echo $pubList[$i]->pubName; ?>
              <button type="button" class="btn btn-danger" style="float: right;" onclick="DelpubLine('<?php echo $pubList[$i]->pubListID; ?>');">DELETE</button>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>


  </div>



  <div id="mats" class="tabcontent">
    <h3>Featured Materials</h3>
    <div class="col-sm-12">
      <form class="" action="<?php echo base_url(); ?>index.php/Cms_controller/changeCarouselData" method="post">


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

        <div class="col-sm-12" style="margin-top:20px;">
          <button type="submit" name="button" class="btn btn-success">APPLY</button>
        </div>
      </form>
    </div>
  </div>



</div><!-- end content wrapper -->

<script type="text/javascript">


function addTopic(topicName){

  if (topicName != "") {
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
  }else{
    toastr.error('Textbox cannot be empty!');
  }



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


function addPubLine(pubLine){

  if (pubLine != "") {
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {newPubLine: $("#newPubLine").val()},
      url: "<?php echo base_url(); ?>Cms_controller/addNewPubLine",
      success: function(data){
        swal('Success!', 'Added new Publication Line', 'success');
        setTimeout(function(){ location.reload(); }, 1500);
      }
    });
  }else{
    toastr.error('Textbox cannot be empty!');
  }

}


function DelpubLine(id){
  $.ajax({
    type: "POST",
    dataType: "json",
    data: {pubListID: id},
    url: "<?php echo base_url(); ?>Cms_controller/delPubLine",
    success: function(data){
      swal('Success!', 'Publication Line Deleted', 'success');
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

    $('#tablePub').DataTable({
      "ordering": false,
      "lengthChange": false
    });


  });

</script>


<script type="text/javascript">
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
