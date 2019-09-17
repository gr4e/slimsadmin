<div class="content-wrapper">


  <section class="content-header">
    <h1 style="float:left;"><?php echo $msg[0]->Subject ?></h1> <button type="button" class="btn btn-success right" data-toggle="modal" data-target="#pvtmsg" >REPLY</button>
  </section>

  <div class="box-header with-border bck">
  </div>

  <div class="panel-group" id="accordion">

    <?php for ($i=0; $i < count($msg) ; $i++) { ?>

      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i+1 ?>" onclick="changeStatMsg('<?php echo $msg[$i]->pvtDetailID; ?>'); changeColor('pan<?php echo $i; ?>');">
          <div class="panel-heading <?php if($msg[$i]->readStatus == 0){echo 'msgNew';} ?>" id="pan<?php echo $i; ?>">
            <h4 class="panel-title">
              <?php echo strip_tags($msg[$i]->pvtTxt); ?>
            </h4>
          </div></a>
          <div id="collapse<?php echo $i+1 ?>" class="panel-collapse collapse">
            <div class="panel-body"><?php echo $msg[$i]->pvtTxt; ?></div>
            <!-- <div class="panel-footer">Footer</div> -->
          </div>
        </div>

      <?php } ?>


    </div>


  </div><!-- end content wrapper -->


  <section>
    <div class="modal fade" tabindex="-1" role="dialog" id="pvtmsg">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title">Reply To Subject: <?php echo $msg[0]->Subject ?></h2>
          </div>
          <div class="modal-body">
            <form class="" action="<?php echo base_url(); ?>index.php/Notif_controller/INSERT_replyPvtMsg" method="post">
              <!-- <label for="SentTo">SentTo:&nbsp;</label><input type="text" disabled name="SentTo" value="" id="SentTo" style="margin: 0 0 10px 0;"><br />
              <label for="Subject">Subject: </label> <input type="text" name="Subject" value="" style="margin: 0 0 10px 0;" required> -->
              <textarea name="PvtTxt" rows="8" cols="80" id="pvtTxt"></textarea>
              <input type="submit" class=" btn btn-success" name="" value="Send" style="margin: 0 0 20px 0;">
              <input type="hidden" name="pvtID" value="<?php echo $msg[0]->pvtID; ?>">
            </form>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </section>



  <!-- change read status -->
  <script type="text/javascript">
  function changeStatMsg(id){
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/Notif_controller/UPDATE_ReadStatus",
      method: "POST",
      data: {pvtDetailID: id}
    });
  }
  </script>


  <script type="text/javascript">

  function changeColor(pan){
    $("#"+pan).removeClass("msgNew");
  }

  </script>

  <!-- summernote for textarea -->
  <script type="text/javascript">
  $(document).ready(function() {
    $('#pvtTxt').summernote();
    $('.note-editable').css('height', '200px');
  });
  </script>

  <!-- message alert toastr -->
  <script type="text/javascript">

  $(function() {
    <?php if(isset($sent)){ ?>
      toastr.info('Message Sent!');
      <?php }?>

    });

    </script>
