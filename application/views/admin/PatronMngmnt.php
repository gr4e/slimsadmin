<div class="content-wrapper">
  <section class="content-header">
    <h1>Patron Management</h1>
  </section>
  <div class="box-header with-border">
  </div>
  <!-- CONTENT -->

<div class="col-md-6">

  <table id="PatronListTbl" class="display" style="width:100%;">
    <thead>
      <tr>
        <th>Patron full name</th>
        <th>Username</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i=0; $i < count($ptrnList) ; $i++) { ?>
        <tr>
          <td><?php echo $ptrnList[$i]->FullName; ?></td>
          <td><?php echo $ptrnList[$i]->Username; ?>
          <button type="button" style="float: right;" class="btn btn-primary" name="button" onclick="PtrnDetails('<?php echo $ptrnList[$i]->UserID; ?>')">Details</button></td>
        </tr>
      <?php } ?>
    </tbody>

  </table>

</div>


<div class="col-md-6" id="ptrnDtDiv">

</div>


  <!-- END OF CONTENT -->
</div>


<script type="text/javascript">

$(document).ready( function () {
  $('#PatronListTbl').DataTable({
  "columns": [
    { "width": "50%" },
    { "width": "30%" }
  ]
});
} );


  function PtrnDetails(id){

    $.ajax({
      type: "POST",
      data:{UserID: id},
      dataType: "json",
      url: "<?php echo base_url(); ?>index.php/Accounts_controller/PatronDetails"
    }).done(function(data){
      $("#ptrnDtDiv").html(data.ptrnDetail);
    });

  }


</script>
