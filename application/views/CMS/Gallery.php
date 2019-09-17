<div class="content-wrapper">
  <section class="content-header">
    <h1>SLIMS Gallery
      <button type="button" class="btn btn-primary" style="margin: 0 0 0 10px;" data-target="#uploadGallery" data-toggle="modal">Upload Image</button>
    </h1>
  </section>
  <div class="box-header with-border">
  </div>

  <?php for ($i=0; $i < count($gallery_imgs) ; $i++) { ?>

    <div class="col-md-3" style="border-style: groove;">
      <a href="#" data-target="#imageView" data-toggle="modal" onclick="imgEnlarge(<?php echo $gallery_imgs[$i]->imgFileID; ?>)">
        <img style="width:100%; margin:auto;" src="<?php echo $gallery_imgs[$i]->imgFilePath . $gallery_imgs[$i]->imgFileName; ?>" alt="">
      </a>
    </div>


  <?php } ?>




  <!-- upload modal -->
  <section>
    <div class="modal fade" tabindex="-1" role="dialog" id="uploadGallery">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title">Upload Images</h2>
          </div>
          <div class="modal-body">

            <?php echo form_open_multipart('Cms_controller/uploadImg');?>

            <input type="file" name="userfile" size="20" id="image-source" onchange="previewImage();">

            <div width="100%"><img width="100%" id="image-preview" alt=""></div>
            <br />
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="float:left;">upload</button> </form><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>
  <!-- end upload modal -->




  <!-- image view modal -->
  <section>
    <div class="modal fade" tabindex="-1" role="dialog" id="imageView">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="" width="100%" id="enlargeImgDiv"></div>

            <div class="modal-footer">
              <input type="text" name="" value="" id="imageDirPath" class="form-control">
              <button type="button" class="btn btn-danger" id="deleteImgBtn" style="margin-top:10px; float: left;">Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:10px; float: right;">Close</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>
  <!-- end image view modal -->




</div><!-- end content wrapper -->




<?php if(isset($msg)){ ?>
  <script type="text/javascript">
  toastr.success('<?php echo $msg; ?>');
  </script>
<?php } ?>

<?php if(isset($error)){ ?>
  <script type="text/javascript">
  toastr.error('<?php echo $error; ?>');
  </script>
<?php } ?>




<script type="text/javascript">


function imgEnlarge(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {imgID: id},
    url: "<?php echo base_url(); ?>Cms_controller/enlargeImg",
    success: function(data){
      $("#enlargeImgDiv").html(data.imgPath);
      $("#imageDirPath").val(data.imgDirPath);
      $("#deleteImgBtn").attr("onclick", "deleteImg('"+id+"');");
    }
  });


}

$('#imageDirPath').click(function (){
  this.select();
  document.execCommand('copy');
  toastr.info('Link Copied!');

});

function previewImage() {
  document.getElementById("image-preview").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result;
  };
};


function deleteImg(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {imgID: id},
    url: "<?php echo base_url(); ?>Cms_controller/deleteImg"
  }).done(function(data){
    swal('Success!', 'Image deleted, page will reload.', 'success');

    setTimeout(function(){
      location.reload();
    }, 1500);

  });

}

</script>
