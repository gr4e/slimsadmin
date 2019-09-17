<div class="content-wrapper">
  <section class="content-header">
    <h1>Download Statistics</h1>
  </section>
  <div class="box-header with-border">
  </div>

  <div class="col-md-12">

    <div class="col-md-5" style="margin-top:10px;">

      <form action="<?php echo base_url(); ?>Reports_controller/generateDownloadsList" method="post">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input id="daterange" name="daterange" type="text" class="form-control pull-right">
          </div>
        </div>
      </div>

      <div class="col-md-1" style="margin-top:10px;">
        <button type="submit" class="btn btn-success">Generate</button>
      </form>
    </div>

  </div>

  <?php if (!empty($DLlist)) { ?>
  <div class="col-md-10" style="margin-top: 10px; margin-left: 20px;">

    <table id="DLtable" class="table table-bordered table-striped table-hover" style="width:100%">
      <thead>
        <tr>
          <th>Date Downloaded</th>
          <th>Title</th>
          <th>Material Type</th>
          <th>Call Number</th>
        </tr>
      </thead>
      <tbody>
          <?php echo $DLlist; ?>
      </tbody>
    </table>

  </div>
<?php } ?>


  <!-- <div class="box-footer"> -->
</div>


<script type="text/javascript">

$(document).ready(function(){

  //datatable

  $('#DLtable').DataTable({
    dom: 'Bfrtip',
    buttons: [
'excel', 'pdf'
    ]
  });

  //date picker

  $('#daterange').inputmask("99/99/9999 - 99/99/9999");
});

$(function() {
  $('#daterange').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear'
    }
  });

  $('#daterange').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    from = picker.startDate.format('MM/DD/YYYY');
    to = picker.endDate.format('MM/DD/YYYY');
  });

  $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
  });
});

</script>
