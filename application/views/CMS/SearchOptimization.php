<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Search Optimization
    </h1>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-lg-5">
    <h4>Search Filter (Irrelevant Words)</h4>

    <form class="form-inline" action="#" style="margin-bottom: 0;">
      <div class="form-group">
        <input type="text" class="form-control" value="" id="newIrrWord" placeholder="Add Word to be Filtered">
      </div>
      <button type="button" class="btn btn-success" onclick="addWordFilter(document.getElementById('newIrrWord').value);" id="addTopicBtn">Add</button>
    </form>

    <table class="table table-hover" style="width: 100%;" id="tableIrrWrds">
      <thead>
        <tr>
          <th>Filtered Words</th>
          <th></th>
        </tr>
      </thead>
      <!-- <tbody>

      <?php for ($i=0; $i < count($IrrelevantWordsList); $i++) { ?>
      <tr>
      <td><?php echo $IrrelevantWordsList[$i]->irrWord; ?>
      <button type="button" class="btn btn-danger" style="float: right;" onclick="DelIrrWrd('<?php echo $IrrelevantWordsList[$i]->irrID; ?>');">DELETE</button>
    </td>
  </tr>
<?php } ?>

</tbody> -->
</table>
</div>


</div><!-- end content wrapper -->

<script type="text/javascript">

$(document).ready( function () {


  var table = $('#tableIrrWrds').DataTable({
    "ordering": false,
    "ajax": {url:"<?php echo base_url(); ?>index.php/Cms_controller/irrWordsList" },
    'columnDefs': [
      {
        'targets': 0,
        "data": "irrWord"
      },
      {
        'targets': 1,
        "width": "10%",
        'data': 'irrID',
        render: function ( data, type, row ) {
          return "<button class='btn btn-danger' onclick=DelIrrWrd('"+data+"'); >Remove</button>";
        }
      }],
      "lengthChange": false
    });


  });



  function DelIrrWrd(id){
    $.ajax({
      type: "POST",
      dataType: "json",
      data: {irrID: id},
      url: "<?php echo base_url(); ?>Cms_controller/DelIrrWrd",
      success: function(data){
        swal('Success!', 'Word deleted', 'success');
        $('#tableIrrWrds').DataTable().ajax.reload(null, false);
      }
    });
  }




  function addWordFilter(irrWrd){

    if (irrWrd != "") {
      $.ajax({
        type: "POST",
        dataType: "json",
        data: {WordFilter: $("#newIrrWord").val()},
        url: "<?php echo base_url(); ?>Cms_controller/addWordFilter",
        success: function(data){
          swal('Success!', 'Added Filtered Word', 'success');
          $('#tableIrrWrds').DataTable().ajax.reload(null, false);
          $("#newIrrWord").text('');
        }
      });
    }else{
      toastr.error('Textbox cannot be empty!');
    }



  }

  </script>
