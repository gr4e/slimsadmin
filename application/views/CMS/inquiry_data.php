<div class="content-wrapper">
  <section class="content-header">
    <h1>Ask a Librarian - Inquiry</h1>
  </section>
  <div class="box-header with-border">
  </div>
  <div class="" style="margin:auto; width:100%; margin-top:50px;">


    <!-- initial post -->
    <div class="" style="min-height:100px; max-height:300px;  overflow:auto; width:75%; margin:auto; border: 1px solid;">
      <h3>Title: <?php echo $inquiry->Subject; ?></h3>
      <h4>By: <?php echo $inquiry->FullName; ?></h4>
      <hr>
    </div>

    <!-- replies -->
    <div class="" style="min-height:100px; max-height:400px; overflow:auto; width:75%; margin:30px auto;  border: 1px solid;">
      <?php for ($i=0; $i < count($inquiryReply); $i++) { ?>
        <div class="" style="border:1px solid; margin:10px 0 0 10px; width: 500px; min-height:100px;">
          <h4><?php echo $inquiryReply[$i]->repliedBy; ?></h4>
          <i><?php echo $inquiryReply[$i]->dateReply; ?></i> <br>
          <?php echo $inquiryReply[$i]->Reply; ?>
        </div>
      <?php } ?>
    </div>


    <!-- reply input -->
    <div style="margin:3px auto; width:75%; display:block;">
      <form class="" action="<?php echo base_url(); ?>index.php/Cms_controller/inquiryReply" method="post">
        <textarea name="inqTxt" id="inqTxt" name="inqTxt" rows="8" cols="80" style="width:100%;"></textarea>
        <input type="hidden" name="aalID" value="<?php echo $inquiry->aalID; ?>">
        <input type="hidden" name="subAalID" value="<?php echo $inquiry->subAalID; ?>">
        <input type="submit" value="Reply" class="btn btn-success" style="display:block;">
      </form>
    </div>
  </div>



</div><!-- end content wrapper -->




<!-- SCRIPTS -->

<script type="text/javascript">

<?php if(isset($msg)){ ?>
  toastr.success("Successfully Replied Inquiry!");
  <?php } ?>

</script>


<!-- summernote for textarea -->
<script type="text/javascript">
$(document).ready(function() {
  $('#inqTxt').summernote();
  $('.note-editable').css('height', '200px');
});
</script>
