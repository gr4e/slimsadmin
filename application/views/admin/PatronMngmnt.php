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


    <section>
      <div class="modal fade" tabindex="-1" role="dialog" id="resetPassModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">


              <form action="<?php echo base_url() ?>PatronPassReset" method="post">
                  <div class="form-group">
                  <label for="UserPass">New Password</label>
                  <input type="password" class="form-control" id="NewPass" name="NewPass">
                </div>
                <input type="hidden" id="patronUserID" name="patronUserID" value="">
                <button type="submit" class="btn btn-info">Reset</button>
              </form>


            </div>

            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section>



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

  });


  function PtrnDetails(id){

    $.ajax({
      type: "POST",
      data:{UserID: id},
      dataType: "json",
      url: "<?php echo base_url(); ?>index.php/Accounts_controller/PatronDetails"
    }).done(function(data){
      $("#ptrnDtDiv").html(data.ptrnDetail);
      $("#patronUserID").val(data.patronID);
    });

  }


</script>
