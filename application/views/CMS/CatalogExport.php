<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.checkboxes.min.js"></script>
<div class="content-wrapper">

  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'export')" id="defaultOpen">Export</button>
    <button class="tablinks" onclick="openTab(event, 'import');">Import</button>
  </div>


  <div id="export" class="tabcontent">

    <div class="col-lg-12">

      <form id="frm-example" action="#" method="post">

        <table id="HoldingsList" class="table table-bordered table-striped table-hover" style="width:100%">
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

      <div class="col-sm-5" id="formContainer" style="margin-top: 20px;">

        <img src="<?php echo base_url(); ?>assets/img/pulse.gif" alt="" id="loading" style="display: none;">
        <?php $attributes = array('id' => 'impForm'); echo form_open_multipart('CatalogImport_controller/do_upload', $attributes);?>

        <input type="file" name="userfile" id="userfile" size="100" class="form-control-file" />

        <br /><br />

        <input type="submit" value="upload" class="btn btn-primary" />

      </form>

    </div>


    <div id="outputCatalogDetails">

    </div>

  </div>

  <div class="col-lg-12">

    <div id="importStatusDiv">

    </div>

  </div>

</div>






</div><!-- end of wrapper -->


<script type="text/javascript">


$(document).ready(function (e) {
  $("#impForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/CatalogImport_controller/uploadImpCatTmp",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      dataType: "JSON",
      beforeSend : function()
      {
        $("#formContainer").fadeOut();
        $("#loading").fadeIn();
      },
      success: function(dataImp)
      {
        if(dataImp=='invalid')
        {
          // invalid file format.
          // $("#err").html("Invalid File !").fadeIn();
        }
        else
        {
          // view uploaded file.
          // $("#preview").html(data).fadeIn();
          $("#impForm")[0].reset();
        }

        // $('#importStatusDiv').html(dataImp.fullLine);

        $.ajax({
          type: "POST",
          dataType: "json",
          data: {
            "txtIsNew": "add",
            "txtHoldingsID": "",
            "txtCopyNum": "c1",
            "txtTitle": dataImp.txtTitle,
            "txtAccessionNum": dataImp.txtAccessionNum,
            "txtCirculationNum": dataImp.txtCirculationNum,
            "txtCost": 0.0,

            "cboMaterialType": dataImp.cboMaterialType,
            "txtISBN": dataImp.txtISBN,
            // "txtISBN": "",
            "txtISSN": dataImp.txtISSN,
            // "txtISSN": "",
            "txtSeriesStmnt": "",
            "txtBibliography": "",
            "txtIssueDate": "",
            "txtDateAcquired": "",
            "txtSeriesStmnt": "",

            "txtEdition": dataImp.txtEdition,
            "txtOtherPhysical": dataImp.txtOtherPhysical,

            "cboPersonal": "",
            "txtPersonal": dataImp.txtPersonal,
            "txtCorporate": dataImp.txtCorporate,
            "txtClassificationNum": dataImp.txtClassificationNum,
            "cboAcquiMode": "6",
            "txtSource": dataImp.txtSource,
            "txtUseRestrictions": "",
            "txtItemStatus": "",
            "txtTempLocation": "",
            "txtCopyNum": "",
            "txtNonpublic": "",
            "txtVolume": "",
            "txtIssueNum": "",
            "txtPublicationDate": "",
            "txtCopyNum": "",
            "txtYear": ""


          },
          url: "<?php echo base_url(); ?>index.php/Acquisitions_controller/create"
        }).done(function(DataCreate){
          $("#loading").hide();
          $("#formContainer").fadeIn();
          if (DataCreate.status == 'success') {
            toastr.success("Catalog imported successfully!");
          }else if(DataCreate.status == 'error'){
            toastr.error(DataCreate.message);
          }else{
            toastr.error("Import Failed.");
          }

        });

      },
      error: function(e)
      {
        // $("#err").html(e).fadeIn();
      }
    });
  }));
});

</script>




<script type="text/javascript">

$(document).ready(function() {
  var table = $('#HoldingsList').DataTable({
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
