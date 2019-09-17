<div class="content-wrapper">
  <section class="content-header">
    <h1>News Management</h1>
  </section>
  <div class="box-header with-border">
  </div>


  <div class="container">
    <div class="panel-group" id="accordion">
      <!-- CREATE -->
      <div class="panel">
        <button type="button" id="addNewBtn" class="btn btn-info" style="margin:10px 0 0 10px;" data-toggle="collapse" href="#addNews" data-parent="#accordion"><span class="glyphicon glyphicon-collapse-down"></span> Add New</button>
        <button type="button" id="galleryBtn" class="btn btn-info" style="margin:10px 0 0 10px;" onclick="openNav()"><span class="glyphicon glyphicon-picture"></span> Gallery</button>

        <div id="addNews" class=" collapse addNewsDiv">
          <form class="" action="<?php echo base_url(); ?>Cms_controller/newNews" method="post">
            <input type="text" name="SubjectTitle" value="" class="form-control" placeholder="Subject Title" style="margin-bottom:15px;" required>
            <textarea name="content"></textarea>
            <input type="submit" name="" value="Create" class="btn btn-success" style="float:right; margin-top:20px;">
          </form>
        </div>
      </div>

      <!-- LIST -->
      <div class="panel">


        <div id="listNews" class=" collapse in div-tableList">
          <table id="newsTable" class="table-hover" style="width:100%">
            <thead>
              <tr>
                <th>Subject Title</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($newsList) ; $i++) { ?>
                <tr style="height:40px;">
                  <td><?php echo $newsList[$i]->SubjectTitle ?>
                    <button type="button" onclick="deleteNews('<?php echo $newsList[$i]->newsID; ?>');" class="btn btn-danger btn-sm but-news" aria-label="Left Align">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
                    </button>
                    <button type="button" id="EditBtn" onclick="editNews('<?php echo $newsList[$i]->newsID; ?>');" class="btn btn-primary btn-sm but-news" aria-label="Left Align" data-toggle="collapse" href="#updateNews" data-parent="#accordion">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="panel">
        <!-- EDIT -->
        <div id="updateNews" class="collapse addNewsDiv" style="margin-top: 20px;">
          <form class="" action="<?php echo base_url(); ?>Cms_controller/updateNews" method="post">
            <input type="hidden" name="newsID" value="" id="newsID">
            <input type="text" id="SubjectTitle" name="SubjectTitle" value="" class="form-control" placeholder="Subject Title" style="margin-bottom:15px;" required>
            <textarea name="editcontent" id="editcontent"></textarea>

            <button type="button" id="BackEdit" class="btn btn-basic" style="float:right; margin-top:20px;  margin-left:10px;" data-toggle="collapse" href="#listNews" data-parent="#accordion">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</button>

              <button type="submit" class="btn btn-success" style="float:right; margin-top:20px;">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</button>

              </form>
            </div>
          </div>
        </div><!-- end container -->
      </div><!-- end group accordion -->


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




    <!-- SCRIPTS -->


    <!-- side gallery -->
    <script>
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
    </script>
    <!-- end side gallery -->



    <!-- toastr creation Success notif -->
    <?php if(isset($msg)){ ?>
      <script type="text/javascript">
      toastr.success('<?php echo $msg; ?>');
      </script>
    <?php } ?>
    <!-- end toastr -->

    <!-- toastr creation Success notif -->
    <?php if(isset($error)){ ?>
      <script type="text/javascript">
      toastr.error('<?php echo $error; ?>');
      </script>
    <?php } ?>
    <!-- end toastr -->





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

    $(document).ready(function(){
      $("#addNews").on("hide.bs.collapse", function(){
        $("#addNewBtn").html('<span class="glyphicon glyphicon-collapse-down"></span> Add New');
        $("#addNewBtn").removeClass('btn-danger');
        $("#addNewBtn").addClass('btn-info');
        $("#addNewBtn").attr("href", "#addNews");
      });

      $("#addNews").on("show.bs.collapse", function(){
        $("#addNewBtn").html('<span class="glyphicon glyphicon-collapse-up"></span> Close');
        $("#addNewBtn").removeClass('btn-info');
        $("#addNewBtn").addClass('btn-danger');
        $("#addNewBtn").attr("href", "#listNews");
      });

      $('#BackEdit').click(function(){
        $("#addNewBtn").show();
      });


    });

    </script>



    <script type="text/javascript">

    function editNews(id){

      $("#addNewBtn").hide();

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {newsID: id},
        url: "<?php echo base_url(); ?>Cms_controller/getSpecNews",
        success: function(data){
          $('#SubjectTitle').val(data.SubjectTitle);
          $('#newsID').val(data.newsID);
          CKEDITOR.instances.editcontent.setData(data.content);
        }
      });
    }

    </script>


    <!-- delete item(news) -->
    <script type="text/javascript">

    function deleteNews(id){
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

          $.ajax({
            url: "<?php echo base_url(); ?>Cms_controller/deleteNews",
            method: "POST",
            data: {newsID: id}
          });

          swal({
            text: "Successfully Deleted!",
            icon: "success",
          }).then((value) => {
            window.location.replace('<?php echo base_url(); ?>CMS/news');

          });

        }
      });
    }

    </script>
    <!-- end delete -->


    <!-- initializations -->
    <script>

    $(document).ready( function () {
      $('#newsTable').DataTable({
        "ordering": false
      });
      CKEDITOR.replace('content');
      CKEDITOR.replace('editcontent');
    } );

    </script>
    <!-- end of initializations -->
