<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaction Logs
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-book"></i> Admin</a></li>
			<li class="active"><i class="fa fa-gear"></i> Transaction Logs</a></li>
		</ol>
	</section>
	<br>

	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">List of Transaction Logs</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body">
							<table id="tblTransactionLogs" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<!-- <th></th> -->
										<th rowspan="1">BackEndLogID</th>
										<th rowspan="1">ID</th>
										<th rowspan="1">Admin Username</th>
										<th rowspan="1">Module</th>
										<th rowspan="1">Module Feature</th>
										<th rowspan="1">Transaction</th>
										<th rowspan="1">Log Date</th>
										<th rowspan="1">IP Address</th>
									</tr> 
								</thead>
								<tbody> 
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>
		<div class="box-footer">
		</div>   
	</div>
	<!-- End Data Table -->
</div>
<!-- /.content-wrapper -->

<!-- SCRIPT -->
<script type="text/javascript">

	//Load DataTable
	$(document).ready(function() 
	{
		var table = $('#tblTransactionLogs').DataTable(
		{
			"pageLength": 10,
			"scrollX": true,
			"order": [[ 0, "desc" ]],
			"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }],
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_tlogs_table") ?>",
				type : 'POST'
			},
			"dom": 'Bfrtip',
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '',
				titleAttr: 'Copy',
				className:'opt_icon opt_icon1c',
				title: 'Transaction Logs',
				messageTop: 'Transaction Logs',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '',
				titleAttr: 'CSV',
				filename: 'Transaction Logs',
				className:'opt_icon opt_icon2c',
				messageTop: 'Transaction Logs',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
					logThis(6);
				}
			},  
			{
				extend: 'excel',
				text:      '',
				titleAttr: 'Excel',
				className:'opt_icon opt_icon3c',
				filename: 'Transaction Logs',
				messageTop: 'Transaction Logs',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
					logThis(7);
				}
			},  
			{
				extend: 'pdf',
				text:      '',
				titleAttr: 'PDF',
				className:'opt_icon opt_icon4c',
				filename: 'Transaction Logs',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				messageTop: 'Transaction Logs',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
					logThis(8);
				}
			},  
			{
				extend: 'print',
				text:      '',
				className:'opt_icon opt_icon5',
				titleAttr: 'Print',
				messageTop: 'Transaction Logs',
				exportOptions: {
					columns: ':visible'
				},
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			]
		});
	});
	//End Load Datatable

	function logThis(id)
	{
		var serialize;
		serialize = "txtName=" + "&modulefeature=Transaction Logs" + "&id=" + id;

		$.ajax(
		{
			url : "<?php echo site_url('accounts_controller/create_log')?>/"+id,
			type: "POST",
			data: serialize,
			dataType: "JSON",
			success:function(data)  
			{

			} 
		});
	}

	function scroll_top()
	{
		$('html,body').animate(
		{
			scrollTop: $(".entry").offset().top
		},'slow');
	}
</script>
<!-- END SCRIPT -->

<style>
.main {
	color: #CB4335;
}
</style>
