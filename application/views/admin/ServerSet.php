<div class="content-wrapper">
  <section class="content-header">
    <h1>Server Settings</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-lg-3" style="margin-top: 20px;">
    <form class="form" action="#" method="post">
      <div class="form-group">
        <label for="serverIP">Server IP Address:</label>
        <input type="text" class="form-control" id="serverIP" value="<?php echo $serSet->CurrentServeIP; ?>">
      </div>
      <div class="form-group">
        <label for="publicIP">Network Public IP Address:</label>
        <input type="text" class="form-control" id="publicIP" value="<?php echo $serSet->PublicIP; ?>">
      </div>

      <button type="button" onclick="SaveSettings();" class="btn btn-success">Save</button>
    </form>
  </div>


  <div class="col-lg-12">
    <section class="content-header" style="margin-bottom: 30px;">
      <h1>OPAC Banner</h1>
    <a href="<?php echo $templatePath; ?>"><span>Template download</span></a>
    </section>


    <?php echo form_open_multipart('Cms_controller/upload_banner');?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

  </form>


</div>


</div><!-- end content wrapper -->

<script type="text/javascript">

function SaveSettings(){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {serverIP: $("#serverIP").val(),
    publicIP: $("#publicIP").val()},
    url: "<?php echo base_url(); ?>index.php/Cms_controller/serverSettingUpdate"
  }).done(function(data){
    swal('Success!', 'Server Settings Updated!', 'success');
  });

}

</script>
