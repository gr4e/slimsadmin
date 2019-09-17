<div class="content-wrapper">
  <section class="content-header">
    <h1>Patron Trails</h1>
  </section>
  <div class="box-header with-border">
  </div>



  <div class="col-md-12">

    <div class="col-md-5" style="margin-top:10px;">

      <form action="<?php echo base_url(); ?>Reports/GenerateTrail" method="post">
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

  <?php if (!empty($TrailList)) { ?>
    <div class="col-md-10" style="margin-top: 10px; margin-left: 20px;">

      <table id="PatronTrailTable" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
          <tr>
            <th>Patron Name</th>
            <th>IP Address</th>
            <th>Action</th>
            <th>Searched for</th>
            <th>Action Date</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $TrailList; ?>
        </tbody>
      </table>

    </div>
  <?php } ?>






</div><!-- wrapper -->



<script type="text/javascript">

$(document).ready(function(){

  //datatable

  $('#PatronTrailTable').DataTable({
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
