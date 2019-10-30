<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.checkboxes.min.js"></script>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Material Inventory</h1>
  </section>
  <div class="box-header with-border">
  </div>


  <div class="col-lg-5" style="margin-top: 20px;">
    <form id="barcodeForm">
      <div class="form-group">
        <input type="text" class="form-control" id="barcodeText" name="barcodeText" value="">
      </div>
    </form>
  </div>


  <div class="col-lg-12" style="margin-top: 20px;">
    <table id="tableInv" class="table table-bordered table-striped table-hover" style="width:100%">
      <thead>
        <tr>
          <th></th>
          <th>Holdings ID</th>
          <th>Circulation Number</th>
          <th>Material Title</th>
          <th>Status</th>
          <th>Date of Inventory</th>
        </tr>
      </thead>
    </table>

  </div>

  <div class="col-lg-12" style="margin-top: 20px;">
    <button type="button" class="btn btn-Primary" id="CommitSelected" style="float: left;">Commit selected</button>
    <button type="button" class="btn btn-danger" id="DeleteSelected" style="float: right;">Remove selected</button>
  </div>

  <form id="invStckFrm">

  </form>

  <div class="col-lg-12">
    <pre id="selectdRws" style="display:none;"></pre>
  </div>

</div>


<script type="text/javascript">

$( document ).ready(function() {
  $("#barcodeText").focus();
});

</script>


<script type="text/javascript">


// buttons of tables




$(document).ready(function() {
  var times = {1: 'available', 2: 'missing', 3:'loan', 4:'for repair', 5:'for digitization'}
  var table = $('#tableInv').DataTable({
    "ordering": false,
    "ajax": {url:"<?php echo base_url(); ?>index.php/Inventory_controller/InvStackList" },
    'columnDefs': [
      {
        'targets': 0,
        'checkboxes': {'selectRow': true},
        "data": "CirculationNumber"
      },
      {
        'targets': 1,
        'width': "9%",
        "data": "HoldingsID"
      },
      {
        'targets': 2,
        'width': "15%",
        "data": "CirculationNumber"
      },
      {
        'targets': 3,
        "data": "Title"
      },
      {
        'targets': 4,
        "width": "10%",
        "data": "invStatus",
        "render": function (data, type, row, meta){
          var $select = $("<select class='form-control' name='invStatus' id='invStatus'></select>", {
          });
          $.each(times, function (k, v) {

            var $option = $("<option></option>", {
              "text": v,
              "value": v
            });
            if (data == v) {
              $option.attr("selected", "selected")
            }
            $select.append($option);
          });
          return $select.prop("outerHTML");
        },
        "defaultContent": "<i>Not set</i>"
      },
      {
        'targets': 5,
        "width": "10%",
        "data": "InvDate"
      }
    ],
    'select': {
      'style': 'multi'
    },
    'order': [[1, 'asc']]
  });

  //update status
  $('#tableInv tbody').on( 'change', 'select', function () {
    var data = table.row( $(this).parents('tr') ).data();
    var rowData = table.rows( { selected: true } ).data()[0]['invStatus'];

    //console.log(table.columns().data());
    // console.log($("#tableInv").children("option:selected").val());
    console.log(
     $(this).find(":selected").val()

    );
    //alert(table.columns().data());


    $.ajax({
      type: "POST",
      data: {CirculationNumber: data.CirculationNumber,
              statusChange2: $(this).find(":selected").val()},
      url: "<?php echo base_url(); ?>index.php/Inventory_controller/changeInvStatus"
    });

  });


  $("#CommitSelected").click(function(){
    var rows_selected = table.column(0).checkboxes.selected();

    $.each(rows_selected, function(index, rowId){

      $("#invStckFrm").append(
        $('<input>')
        .attr('type', 'hidden')
        .attr('name', 'id[]')
        .val(rowId)
      );
    });

    $('#selectdRws').text(rows_selected.join(","));

    if ($('#selectdRws').text() == '') {
      toastr.error("Haven't select a material!");
    }else{

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {CircIDs: $("#selectdRws").text()},
        url: "<?php echo base_url(); ?>index.php/Inventory_controller/commit2inventory"
      }).done(function(data){
        if (data.msg == '1') {
          toastr.success('Commited Successfully!');
        }else{
          toastr.error('Error!');
        }
        $('#tableInv').DataTable().ajax.reload(null, false);
      });
    }

  });



  $("#DeleteSelected").click(function(){
    var rows_selected = table.column(0).checkboxes.selected();

    $.each(rows_selected, function(index, rowId){

      $("#invStckFrm").append(
        $('<input>')
        .attr('type', 'hidden')
        .attr('name', 'id[]')
        .val(rowId)
      );
    });

    $('#selectdRws').text(rows_selected.join(","));

    if ($('#selectdRws').text() == '') {
      toastr.error("Haven't select a material!");
    }else{

      $.ajax({
        type: "POST",
        dataType: "json",
        data: {CircIDs: $("#selectdRws").text()},
        url: "<?php echo base_url(); ?>index.php/Inventory_controller/removeFromInvStck"
      }).done(function(data){
        if (data.msg == '1') {
          toastr.warning('Removed Successfully!');
        }else{
          toastr.error('Error!');
        }
        $('#tableInv').DataTable().ajax.reload(null, false);
      });

    }


  });


});



</script>


<script type="text/javascript">

$('#barcodeForm').submit(function(e) {
  e.preventDefault();

  $.ajax({
    type: "POST",
    dataType: "JSON",
    url: '<?php echo base_url(); ?>index.php/Inventory_controller/insert2InvStack',
    data: $(this).serialize()
  }).done(function(data){
    if (data.msg == '1') {
      toastr.success('Material added to list!');
    }else if(data.msg == '2'){
      toastr.error('Material already is in the list!');
    }else{
      toastr.error("error!");
    }
    $('#tableInv').DataTable().ajax.reload(null, false);
  });

  $("#barcodeText").val('');
});




var ctrlDown = false;
var ctrlKey = 17, vKey = 86, cKey = 67, zKey = 90, jKey = 74;

document.body.onkeydown = function(e) {
  if (e.keyCode == 17 || e.keyCode == 91) {
    ctrlDown = true;
  }
  if ((ctrlDown && e.keyCode == zKey) || (ctrlDown && e.keyCode == vKey) || (ctrlDown && e.keyCode == cKey) || (ctrlDown && e.keyCode == jKey)) {
    e.preventDefault();
    return false;
  }
}
document.body.onkeyup = function(e) {
  if (e.keyCode == 17 || e.keyCode == 91) {
    ctrlDown = false;
  };
};


</script>
