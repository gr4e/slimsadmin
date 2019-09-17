<div class="content-wrapper">

  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'export')" id="defaultOpen">Export</button>
    <button class="tablinks" onclick="openTab(event, 'import');">Import</button>
  </div>


  <div id="export" class="tabcontent">

    <div class="col-lg-12">

      <form id="frm-example" action="#" method="post">

        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
          <thead>
            <tr>
              <th></th>
              <th>Holdings ID</th>
              <th>Material Title</th>
            </tr>
          </thead>
        </table>

      </div>

      <div class="col-lg-12">
        <button type="submit" class="btn btn-primary" id="getSelected">Export</button>
        <p style="margin-top: 20px;"><b>Selected rows to be exported to .mrk file:</b></p>
        <pre id="selectdRws"></pre>
      </div>

      <div class="col-lg-12">
        <a id="downloadBtn" download class="btn btn-default" style="display: none;">Click this if the download didn't start</a>

      </div>

    </form>

  </div>





  <div id="import" class="tabcontent">


    <div class="col-lg-12">


      <!-- <?php echo form_open_multipart('CatalogExport_controller/do_upload');?>

      <input type="file" name="userfile" size="20" />

      <br /><br />

      <input type="submit" value="upload" />

    </form> -->


    <form id="importForm" action="#" method="post">

      <input type="file" name="userfile" size="20" />

      <input type="submit" name="" value="Upload!">

    </form>



  </div>

  <div class="col-lg-12">

    <div id="importStatusDiv">

    </div>

  </div>

</div>






</div><!-- end of wrapper -->


<script type="text/javascript">

$(document).ready(function() {
  var table = $('#example').DataTable({
    "ajax": {url:"<?php echo base_url(); ?>index.php/CatalogExport_controller/CatalogList" },
    'columnDefs': [
      {
        'targets': 0,
        'checkboxes': {'selectRow': true},
        "data": "HoldingsID"
      },
      {
        'targets': 1,
        'width': 100,
        "data": "HoldingsID"
      },
      {
        'targets': 2,
        "data": "Title"
      }
    ],
    'select': {
      'style': 'multi'
    },
    'order': [[1, 'asc']]
  });


  $('#frm-example').on('submit', function(e){
    var form = this;

    var rows_selected = table.column(0).checkboxes.selected();


    $.each(rows_selected, function(index, rowId){

      $(form).append(
        $('<input>')
        .attr('type', 'hidden')
        .attr('name', 'id[]')
        .val(rowId)
      );
    });


    $('#selectdRws').text(rows_selected.join(","));

    $('input[name="id\[\]"]', form).remove();


    e.preventDefault();

    if (rows_selected.count() == 0) {
      toastr.error("Please select at least 1 catalog.");
    }else{
      $.ajax({
        type: "POST",
        dataType: "json",
        data: {CatIDs: $("#selectdRws").text()},
        url: "<?php echo base_url(); ?>index.php/CatalogExport_controller/Export_selectedCatalog"
      }).done(function(data){
        $("#downloadBtn").show();
        $("#downloadBtn").attr("href", data.zelda);
        document.getElementById('downloadBtn').click();
      });
    }


  });
});


</script>



<script type="text/javascript">
function openTab(evt, tabName) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>



<!-- IMPORT -->
<script type="text/javascript">

$(document).ready(function(){

  $('#importForm').submit(function(e){
    e.preventDefault();
    $.ajax({
      url:'<?php echo base_url();?>index.php/CatalogExport_controller/do_upload',
      type:"post",
      dataType: "JSON",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false
    }).done(function(data){

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {FileName: data.FileName},
        url: "<?php echo base_url(); ?>CatalogExport_controller/readFileImport"
      }).done(function(data2){
        $("#importStatusDiv").html(data2.msg);
      });


    });

  });


});

</script>
