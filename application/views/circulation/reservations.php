<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Cilent Reservations</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <!-- Main content -->

  <div class="col-md-6">

    <table class="table">
      <thead>
        <th>Reservation No.</th>
        <th>Reserved By</th>
        <th>Reserved Date</th>
      </thead>

      <tbody>
        <?php for ($i=0; $i < count($rsrvtnList) ; $i++) { ?>
          <tr>
            <td><?php echo $rsrvtnList[$i]->rsrvID; ?></td>
            <td><?php echo $rsrvtnList[$i]->FullName; ?></td>
            <td><?php echo $rsrvtnList[$i]->rsrvDate; ?>
              &nbsp;<a class="glyphicon glyphicon-share" style="cursor:pointer;" onclick="stackList('<?php echo $rsrvtnList[$i]->rsrvID; ?>');"></a>
            </td>
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


  </div> <!-- reservation table left -->



<div class="col-md-6" id="stackTest">

</div>






  <!-- /.content -->

</div>



<script type="text/javascript">

<?php if(!empty($msg)){ ?>
swal ( "Success!" ,  "Reservation Served!" ,  "success" )
<?php } ?>


function stackList(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {rsrvtnID: id},
    url: "<?php echo base_url(); ?>Circulations_controller/rsrvtnStackList"
  }).done(function(data){
    $('#stackTest').html(data.rsrvStackList);
  });

}

</script>
