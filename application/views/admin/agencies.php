<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Member Agencies Management
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()."login/logout"; ?>#"><i class="fa fa-home"></i> Home</a></li>
			<li><i class="fa fa-users"></i> Admin</a></li>
			<li class="active"><i class="fa fa-institution"></i> Member Agencies Management</a></li>
		</ol>
	</section>
	<br>


	<!-- Data Table -->
	<div class="box box-default" >
		<div class="box-header with-border">
			<h3 class="box-title">List of Agencies</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
			</div>
		</div>

		<div class="box-header with-border">
			<button type="button" onclick="AddAgency()" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-plus"></i> Add Agency</button>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-body">
							<table id="tblAgency" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="1">Agency Code</th>
										<th rowspan="1">Agency Name</th>
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

	<!-- Main content -->
	<div class="box box-default entry">
		<div class="box-header with-border">
			<h3 class="box-title">Agency Entry Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-toggle="collapse" id="zzz" data-target="#collapseExample"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="collapse" id="collapseExample">
			<form id="form" class="form-horizontal">
				<div class="box-body">

					<div class="form-group">
						<label for="txtAgencyCode" class="col-sm-2 control-label">Agency Code</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-code"></i>
							</div>
							<input type="text" class="form-control redph" id="txtAgencyCode" name="txtAgencyCode">
						</div>
					</div>

					<div class="form-group">
						<label for="txtAgencyName" class="col-sm-2 control-label">Agency Name</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-institution"></i>
							</div>
							<input type="text" class="form-control redph" id="txtAgencyName" name="txtAgencyName">
						</div>
					</div>

					<div class="form-group">
						<label for="txtAgencyAdd" class="col-sm-2 control-label">Agency Address</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-map"></i>
							</div>
							<input type="text" class="form-control redph" id="txtAgencyAdd" name="txtAgencyAdd">
						</div>
					</div>

					<div class="form-group">
						<label for="txtHomePage" class="col-sm-2 control-label">Home Page</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-chrome"></i>
							</div>
							<input type="text" class="form-control" id="txtHomePage" name="txtHomePage">
						</div>
					</div>

					<div class="form-group">
						<label for="txtFaxNo" class="col-sm-2 control-label">Fax No.</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-tty"></i>
							</div>
							<input type="text" class="form-control" id="txtFaxNo" name="txtFaxNo">
						</div>
					</div>

					<div class="form-group">
						<label for="txtTelNo" class="col-sm-2 control-label">Telephone No.</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-phone"></i>
							</div>
							<input type="text" class="form-control" id="txtTelNo" name="txtTelNo">
						</div>
					</div>

					<div class="form-group">
						<label for="txtAgency_ID" class="col-sm-2 control-label">Agency ID</label>
						<div class="input-group col-sm-8"">
							<div class="input-group-addon">
								<i class="fa fa-barcode"></i>
							</div>
							<input type="text" class="form-control redph" id="txtAgency_ID" name="txtAgency_ID">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<font color="red" style="font-style: italic; font-size: 12px">Note: </font><font style="font-style: italic; font-size: 12px ">AgencyID is a unique maximum of ten-alphanumeric reference ID to be used by the agency for its Library Management transactions.</font>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-14" >
							<input type="hidden" name="txtAgencyID" id="txtAgencyID" />
							<button type="button" class="btn btn-info" onclick="save_record()" id="btnSubmit" name="btnSubmit"><label id="lblSubmit">Submit
								</label></button>
							<button type="button" class="btn" onclick="clear_fields()" id="btnClear" name="btnClear">Clear</button> 
							<button type="button" class="btn btn-warning" onclick="delete_record()" id="btnDelete" name="btnDelete">Delete</button> 
						</div>
					</div>
				</div>
			</form>
		</div>

		<!-- /.box-body -->
		<div class="box-footer">
		</div>
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- SCRIPT -->
<script type="text/javascript">
	var save_method = 'add';
	var $agency = $("[name='cboAgency']");

	//Load DataTable
	$(document).ready(function() 
	{
		$('#tblAgency').DataTable(
		{
			"pageLength": 5,
			"scrollX": true,
			"ajax": 
			{
				url : "<?php echo site_url("accounts_controller/load_agency_table") ?>",
				type : 'POST',
				dataType:"json" 
			},
			"dom": 'Bfrtip',
			"order": [[ 0, "asc" ]],
			"buttons": 
			[
			{
				extend: 'copy',
				text:      '',
				titleAttr: 'Copy',
     		 	className:'opt_icon opt_icon1c',
				title: 'Member Agency Management',
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.copyHtml5.action.call(this, e, dt, node, config);
					logThis(5);
				}
			}, 
			{
				extend: 'csv',
				text:      '',
				titleAttr: 'CSV',
     		 	className:'opt_icon opt_icon2c',
				filename: 'Member Agency Management',
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
				filename: 'Member Agency Management',
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
				filename: 'Member Agency Management',
				orientation: 'landscape',
				pageSize: 'LEGAL',
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
				action: function ( e, dt, node, config ) {
					$.fn.dataTable.ext.buttons.print.action.call(this, e, dt, node, config);
					logThis(9);
				}
			}
			],
			"columnDefs": 
			[
			{
				"targets": [1],
				"width": "70%"
			}
			]
		});

		$("input").change(function()
		{
			$(this).parent().parent().removeClass('has-error');
	  	// $(this).next().empty();
		});
	});
	//End Load Datatable

	function AddAgency()
	{
		clear_fields();
		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();
		scroll_top();
		$('#lblSubmit').text("Submit");
	}

	//Load record to edit
	function edit_record(id)
	{
		save_method = 'edit';

		if(!$( "#form" ).is( ":visible" ))
			$('#zzz').click();

		scroll_top();

		$.ajax(
		{  
			url:"<?php echo site_url("accounts_controller/get_agency")?>/"+id,  
			method:"POST",  
			data:{id:id},  
			dataType:"json",  
			success:function(data)  
			{ 
				$('#txtAgencyCode').val(data.AgencyCode);  
				$('#txtAgencyName').val(data.AgencyName);  
				$('#txtAgencyAdd').val(data.AgencyAdd); 
				$('#txtHomePage').val(data.HomePage); 
				$('#txtFaxNo').val(data.FaxNo); 
				$('#txtTelNo').val(data.TelNo);
				$('#txtAgency_ID').val(data.Agency_ID);

				$('#txtAgencyID').val(data.AgencyID); 
				$('#lblSubmit').text("Save"); 
			}  
		});
	}
	//End load record to edit

	//Save new or updated record
	function save_record()
	{
		var url;

		save_method == "add" ? url = "<?php echo site_url('accounts_controller/create_agency')?>"
		: url = "<?php echo site_url('accounts_controller/update_agency')?>";

		$.ajax(
		{  
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status == 'success')
				{
					toastr.success(data.message);
					save_method == 'add' ? logThis(1) : logThis(2);
					clear_fields();
					scroll_top();
					$('input').parent().parent().removeClass('has-error');
					$('input').removeAttr('placeholder');
					save_method = 'add';
				} 
				else if(data.status == 'error')
				{
					toastr.error(data.message);
				}
				else if(data.status == 'validation error')
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[id="'+data.inputerror[i]+'"]').attr("placeholder", data.error_string[i]);  
					}

					scroll_top();
				}

			}  
		});

	}
	//End save new or updated record

	//Delete record
	function delete_record(){
		var id = "";
		id = $('#txtAgencyID').val();

		if(id != "")
		{
			if(confirm('Are you sure you want to delete this record?')){
				$.ajax({
					url : "<?php echo site_url('accounts_controller/delete_agency')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						if(data.status == 'success')
						{
							toastr.success(data.message);
							logThis(3);
							clear_fields();
						} 
						else if(data.status == 'error')
						{
							toastr.error(data.message);
						}
					}
				});
			}
		}
	}
	//End delete record

	function logThis(id)
	{
		var serialize;
		serialize = $('#form').serialize() + "&txtName=" + $('[name="txtAgencyName"]').val() + "&modulefeature=Agency Management" + "&id=" + id;

		$.ajax(
		{  
			url : "<?php echo site_url('accounts_controller/create_log')?>",
			type: "POST",
			data: serialize,
			dataType: "JSON",
			success:function(data)  
			{

			}  
		}); 
	} 

	function toIntArray(string) 
	{
		var array = string.split(',');
		for(var i = 0 ; i < array.length; i++) {
			array[i] = parseInt(array[i], 10)
		}

		return array;
	}



	//Clear fields
	function clear_fields()
	{
		$('#form')[0].reset();
		$('input').parent().parent().removeClass('has-error');
		$('input').removeAttr('placeholder');
		$('#tblAgency').DataTable().ajax.reload(null, false);

		$('#lblSubmit').text("Submit");

		scroll_top();
		save_method = 'add';
	}
	//End clear fields

	//Function to Scroll top
	function scroll_top()
	{
		$('html,body').animate(
		{
			scrollTop: $(".entry").offset().top
		},'slow');
	}
	//End Function to Scroll top

	$(document).ready(function(){
		$("#collapseExample").on("hide.bs.collapse", function(){
			$("#zzz").html('<i class="fa fa-plus"></i>');
		});
		$("#collapseExample").on("show.bs.collapse", function(){
			$("#zzz").html('<i class="fa fa-minus"></i>');
		});
	});

	$(function(){
		var datepicker = $.fn.datepicker.noConflict();
		$.fn.bootstrapDP = datepicker;  
		$("#txtDateAcquired").bootstrapDP();    
	});

	$('.dpyear').datepicker({
		minViewMode: 2,
		format: 'yyyy',
		autoclose: true,
		orientation: "bottom auto"
	});

	$agency.on('change', function(evt, params) {
		console.log(evt, params);
		var $s = $(this);

	});
</script>
<!-- END SCRIPT -->

<style type="text/css">
	table tr td:first-of-type {
		cursor: pointer;
	}
</style>