<div class="content-wrapper">


  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'about')" id="defaultOpen">About Us</button>
    <button class="tablinks" onclick="openTab(event, 'contact'); GETContactUsContent();">Contact Us</button>
    <button class="tablinks" onclick="openTab(event, 'privacy'); GETPrivacyContent();">Privacy Statement</button>
  </div>

  <!-- Tab content -->
  <div id="about" class="tabcontent">

    <div class="col-lg-12" style="margin-top:20px;">
      <form action="#" method="post">
        <textarea name="AboutUsContent" ></textarea>
        <button type="button" onclick="UpdateAboutUs();" class="btn btn-success" style="float:left; margin-top:20px;">Update</button>
      </form>
      <button type="button" class="btn btn-primary" id="galleryBtn" style="float: right;" onclick="openNav()">Gallery</button>
    </div>

  </div>

  <div id="contact" class="tabcontent">
    <div class="col-lg-12" style="margin-top:20px;">
      <form action="#" method="post">
        <textarea name="ContactUsContent" ></textarea>
        <button type="button" onclick="UpdateContactUs();" class="btn btn-success" style="float:left; margin-top:20px;">Update</button>
      </form>
      <button type="button" class="btn btn-primary" id="galleryBtn" style="float: right;" onclick="openNav()">Gallery</button>
    </div>
  </div>


  <div id="privacy" class="tabcontent">
    <div class="col-lg-12" style="margin-top:20px;">
      <form action="#" method="post">
        <textarea name="PrivacyContent" ></textarea>
        <button type="button" onclick="UpdatePrivacy();" class="btn btn-success" style="float:left; margin-top:20px;">Update</button>
      </form>
    </div>
  </div>







  <!-- right side gallery -->

  <div id="mySidenav" class="sidenav-gallery">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <button type="button" class="btn btn-info" data-target="#uploadGallery" data-toggle="modal" style="margin: 15px 0px 27px 22px">Upload Image</button><h3 style="margin-left:10px;" class="glyphicon glyphicon-info-sign" aria-hidden="true" title="Dimension: 1920 x 1080 &#013; Allowed Types: JPG/PNG/GIF &#013; Max Size: 10MB/10,048KB"></h3>

    <div class="">
      <?php for ($i=0; $i < count($gallery_imgs) ; $i++) { ?>
        <a href="#" data-target="#imageView" data-toggle="modal" onclick="imgEnlarge(<?php echo $gallery_imgs[$i]->imgFileID; ?>)"><div style="width:100%;margin:auto; margin-bottom: 10px;"><img style="width:90%; margin:auto;" src="<?php echo $gallery_imgs[$i]->imgFilePath . $gallery_imgs[$i]->imgFileName; ?>" alt=""></div></a>
      <?php } ?>
    </div>

  </div>
  <!-- end gallery -->


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
              <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top:10px;">Close</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>
  <!-- end image view modal -->




</div><!-- end content wrapper -->









<script type="text/javascript">

$(document).ready(function(){
  CKEDITOR.replace('AboutUsContent', {height:500});
  CKEDITOR.replace('ContactUsContent', {height:500});
  CKEDITOR.replace('PrivacyContent', {height:500});

  setTimeout(function(){ GETAboutUsContent(); }, 300);
});

function GETAboutUsContent(){

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/AboutUsContent"
  }).done(function(data){
    CKEDITOR.instances.AboutUsContent.setData(data.AboutUsData);
  });

}

function UpdateAboutUs(){

  $.ajax({
    type: "POST",
    data: {AboutUsContent: CKEDITOR.instances.AboutUsContent.getData()},
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/UpdateAboutUs"
  }).done(function(data){
    toastr.success(data.msg);
  });

}


function GETContactUsContent(){

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/ContactUsContent"
  }).done(function(data){
    CKEDITOR.instances.ContactUsContent.setData(data.ContactUsData);
  });

}


function UpdateContactUs(){

  $.ajax({
    type: "POST",
    data: {ContactUsContent: CKEDITOR.instances.ContactUsContent.getData()},
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/UpdateContactUs"
  }).done(function(data){
    toastr.success(data.msg);
  });

}




function GETPrivacyContent(){

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/PrivacyContent"
  }).done(function(data){
    CKEDITOR.instances.PrivacyContent.setData(data.PrivacyData);
  });

}




function UpdatePrivacy(){

  $.ajax({
    type: "POST",
    data: {PrivacyContent: CKEDITOR.instances.PrivacyContent.getData()},
    dataType: "json",
    url: "<?php echo base_url(); ?>Cms_controller/UpdatePrivacyStatement"
  }).done(function(data){
    toastr.success(data.msg);
  });


}


//========image gallery============

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  $("#galleryBtn").attr("onclick","closeNav()");
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  $("#galleryBtn").attr("onclick","openNav()");
}

$('#addNews').focusin(function(){
  closeNav();
});



function imgEnlarge(id){

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {imgID: id},
    url: "<?php echo base_url(); ?>Cms_controller/enlargeImg",
    success: function(data){
      $("#enlargeImgDiv").html(data.imgPath);
      $("#imageDirPath").val(data.imgDirPath);
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
