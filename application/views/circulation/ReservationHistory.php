<div class="content-wrapper">
  <section class="content-header">
    <h1>Reservation History</h1>
  </section>
  <div class="box-header with-border">
  </div>



  <div class="col-md-12">

    <div class="col-md-5" style="margin-top:10px;">

      <form action="<?php echo base_url(); ?>ReservationHistory/GenerateRsvHst" method="post">
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


<div class="col-lg-12">
  <table id="rsrvtnHistTable" class="display" style="width:100%">
          <thead>
              <tr>
                <th>Reservation ID</th>
                  <th>Holdings ID</th>
                  <th>Material Title</th>
                  <th>Reservation Date</th>
                  <th>Status</th>
                  <th>Served By</th>
              </tr>
          </thead>
          <tbody>

            <?php if (isset($RsrvtnHist)) {
              echo $RsrvtnHist;
            } ?>

          </tbody>

      </table>
</div>









</div><!-- wrapper -->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowgroup/1.1.1/js/dataTables.rowGroup.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){

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






<script type="text/javascript">
$(document).ready(function() {
    var groupColumn = 0;
    var table = $('#rsrvtnHistTable').DataTable({
      dom: 'Bfrtip',
      buttons: ['excel'],
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        }
    } );


} );
</script>
